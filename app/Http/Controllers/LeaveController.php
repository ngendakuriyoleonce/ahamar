<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    const MAX_ANNUAL_LEAVE_DAYS = 20;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show leave request form
     */
    public function create()
    {
        $leaveTypes = LeaveType::all();
        return view('leaves.create', compact('leaveTypes'));
    }

    /**
     * Store leave request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Debut' => 'required|date',
            'Fin' => 'required|date|after:Debut',
            'description' => 'required|string',
            'LeaveType' => 'required|string',
        ]);

        $fromDate = Carbon::parse($validated['Debut']);
        $toDate = Carbon::parse($validated['Fin']);
        $dayNumber = $toDate->diffInDays($fromDate) + 1;

        // Check if days exceed limit for annual leave
        if ($validated['LeaveType'] === 'Annuel' && $dayNumber > self::MAX_ANNUAL_LEAVE_DAYS) {
            return back()->withErrors(['days' => 'You have exceeded 20 days of annual leave']);
        }

        $leave = new Leave();
        $leave->empid = Auth::id();
        $leave->LeaveType = $validated['LeaveType'];
        $leave->FromDate = $validated['Debut'];
        $leave->ToDate = $validated['Fin'];
        $leave->DayNumber = $dayNumber;
        $leave->Description = $validated['description'];
        $leave->Status = Leave::STATUS_PENDING;
        $leave->IsRead = 0;
        $leave->save();

        return redirect()->route('leave.history')->with('success', 'Your leave request has been submitted successfully');
    }

    /**
     * Show leave history
     */
    public function history()
    {
        $leaves = Auth::user()->leaves()->orderBy('PostingDate', 'desc')->paginate(10);
        return view('leaves.history', compact('leaves'));
    }

    /**
     * Show all leave requests (Admin)
     */
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        $leaves = Leave::with('employee')->orderBy('PostingDate', 'desc')->paginate(10);
        return view('leaves.index', compact('leaves'));
    }

    /**
     * Show leave details
     */
    public function show(Leave $leave)
    {
        return view('leaves.show', compact('leave'));
    }

    /**
     * Approve leave request (Admin)
     */
    public function approve(Leave $leave)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        $leave->update(['Status' => Leave::STATUS_APPROVED]);
        return back()->with('success', 'Leave request approved');
    }

    /**
     * Reject leave request (Admin)
     */
    public function reject(Request $request, Leave $leave)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        $validated = $request->validate([
            'AdminRemark' => 'required|string',
        ]);

        $leave->update([
            'Status' => Leave::STATUS_REJECTED,
            'AdminRemark' => $validated['AdminRemark'],
            'AdminRemarkDate' => now(),
        ]);

        return back()->with('success', 'Leave request rejected');
    }
}

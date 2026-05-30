<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show dashboard
     */
    public function index()
    {
        $employee = Auth::user();
        $totalLeaves = Leave::where('empid', $employee->IdEmp)->count();
        $pendingLeaves = Leave::where('empid', $employee->IdEmp)
            ->where('Status', Leave::STATUS_PENDING)
            ->count();
        $approvedLeaves = Leave::where('empid', $employee->IdEmp)
            ->where('Status', Leave::STATUS_APPROVED)
            ->count();
        $recentLeaves = $employee->leaves()
            ->orderBy('PostingDate', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'employee',
            'totalLeaves',
            'pendingLeaves',
            'approvedLeaves',
            'recentLeaves'
        ));
    }
}

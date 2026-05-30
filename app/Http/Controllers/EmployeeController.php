<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show employee profile
     */
    public function showProfile()
    {
        $employee = Auth::user();
        return view('employee.profile', compact('employee'));
    }

    /**
     * Update employee profile
     */
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'Prenom' => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'Email' => 'required|email|unique:tblemployees,EmailId,' . Auth::id() . ',IdEmp',
            'Telephone' => 'required|regex:/^[0-9]{10,11}$/',
            'Sexe' => 'required|in:Male,Female,Other',
            'Adresse' => 'required|string',
        ], [
            'nom.regex' => 'The first name must contain only letters',
            'Prenom.regex' => 'The last name must contain only letters',
            'Telephone.regex' => 'The phone number must be 10-11 digits',
        ]);

        $employee = Auth::user();
        $employee->update([
            'FirstName' => $validated['nom'],
            'LastName' => $validated['Prenom'],
            'EmailId' => $validated['Email'],
            'Phonenumber' => $validated['Telephone'],
            'Gender' => $validated['Sexe'],
            'Address' => $validated['Adresse'],
        ]);

        return back()->with('success', 'Profile updated successfully');
    }

    /**
     * Show change password form
     */
    public function showChangePassword()
    {
        return view('employee.change-password');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $employee = Auth::user();

        if (!Hash::check($validated['current_password'], $employee->Password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $employee->update([
            'Password' => Hash::make($validated['new_password']),
        ]);

        return back()->with('success', 'Password changed successfully');
    }
}

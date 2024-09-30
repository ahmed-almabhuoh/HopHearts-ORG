<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    //
    public function getDailyReportPage()
    {
        return view('report');
    }

    public function submitReport(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'report_content' => 'required|string',
        ]);

        // Attempt to authenticate the staff member
        $staff = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$staff) {
            return redirect()->back()->withErrors(['password' => 'Invalid credentials']);
        }

        // Create the report for the authenticated user
        Report::create([
            'user_id' => Auth::id(), // Assuming the staff are stored in the users table
            'content' => $request->report_content,
        ]);

        return redirect()->back()->with('success', 'Report submitted successfully!');
    }
}

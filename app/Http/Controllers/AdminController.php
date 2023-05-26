<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function allAppointment()
    {
        $appointments = Appointment::with(['user', 'payment'])->orderby('updated_at', 'desc')->paginate(100);
        return view('admin.all_appointment', compact('appointments'));
    }


    function manageUserIndex()
    {
        $users = User::orderby('updated_at')->paginate(150);
        return view('admin.allusers', compact('users'));
    }


    function userProfileIndex($id)
    {
        $user = User::find($id);
        $appointments = Appointment::with('payment')->where('user_id', $id)->limit(100)->get();
        return view('admin.user_profile', compact('user', 'appointments'));
    }

    function todayAppointment()
    {
        return view('admin.today_appointments');
    }
}

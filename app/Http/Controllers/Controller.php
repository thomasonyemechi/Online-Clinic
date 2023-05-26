<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function retDashboard()
    {
        $appointments = Appointment::with(['payment', 'doctor:id,name'])->where(['user_id' => auth()->user()->id ])->orderby('id', 'desc')->paginate(25);

        return view('users.dashboar', compact('appointments'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentMail;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{

    function Sendmail()
    {
        $appointment = Appointment::find(11);
        $user = User::find(3);

        //$send_mail = new AppointmentMail($appointment, $user);
        $send_mail = Mail::to($user->email)->send(new AppointmentMail($appointment, $user));

        //return;
    }


    function bookAppointment(Request $request)
    {
        Validator::make($request->all(), [
            'date' => 'required|date',
            'time' => 'required',
            'symtoms' => 'required|min:3',
            'phone' => 'required|string|min:5'
        ])->validate();

        $apt = Appointment::create([
            'user_id' => auth()->user()->id,
            'date' => $request->date,
            'time' => $request->time,
            'description' => $request->symtoms,
            'status' => 0
        ]);
        
        return Redirect::to('/startpayment/'.$apt->id);
    }


    function win_hashs($length)
    {
        return substr(str_shuffle(str_repeat('123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
    }




    function payForAppointment($id)
    {
        $trno = $this->win_hashs(20);
        $user = auth()->user();
        $amount  = 100000;
        $data = [
            "reference" => $trno,
            "amount" => $amount,
            "currency" => "NGN",
            "callback_url" => 'http://127.0.0.1:8090/verifypayment/'.$id,
            'email' => $user->email,
            'customer' => [
                'phonenumber' => $user->phone,
                'name' => $user->name
            ]
        ];

        $result = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer sk_live_a4df97895ee6f9104a2e9cfe78d1e087c3e366bf'
        ])->post('https://api.paystack.co/transaction/initialize', $data);


        // return $result['data']['authorization_url'];
        if (isset($result['status']) == 1) {
            if (isset($result['data']['authorization_url']) && $result['data']['authorization_url'] != ' ') {
                return Redirect::to($result['data']['authorization_url']);
            }
        }
    }



    // function payForAppointment($id)
    // {
    //     $trno = $this->win_hashs(20);
    //     $user = auth()->user();
    //     $amount  = 1000;
    //     $data = [
    //         "tx_ref" => $trno,
    //         "amount" => $amount,
    //         "currency" => "NGN",
    //         "redirect_url" => 'https://myonlineclinic.ng/verifypayment/'.$id,
    //         'customer' => [
    //             'email' => $user->email,
    //             'phonenumber' => $user->phone,
    //             'name' => $user->name
    //         ],
    //         'customizations' => [
    //             'title' => "Appointment Fees",
    //             'logo' => "http://www.piedpiper.com/app/themes/joystick-v27/images/logo.png"
    //         ]
    //     ];

    //     $result = Http::withHeaders([
    //         'Content-Type' => 'application/json',
    //         'Authorization' => 'Bearer FLWSECK_TEST-83649458fea46c6faf817a95c06b3d38-X'
    //     ])->post('https://api.flutterwave.com/v3/payments', $data);

    //     if (isset($result['status']) && $result['status'] == 'success') {
    //         if (isset($result['data']['link']) && $result['data']['link'] != ' ') {
    //             return Redirect::to($result['data']['link']);
    //         }
    //     }
    // }




    function verifyPayment(Request $request, $appointment_id)
    {
        $apt = Appointment::find($appointment_id);
        $txid = $request->reference;
        $result = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer sk_live_a4df97895ee6f9104a2e9cfe78d1e087c3e366bf'
        ])->get("https://api.paystack.co/transaction/verify/{$txid}");


        if(!$result['status']) {
            return redirect('/dashboard')->with('error', 'An Error Occured While Verifying Your Payment');
        }

        $ck = Payment::where('transaction_id', $txid)->first();
        if($ck) { return redirect('dashboard')->with('error', 'Transaction already Verified'); }        
        Payment::create([
            'user_id' => $apt->user_id,
            'appointment_id' => $apt->id,
            'amount' => $result['data']['amount'] / 100,
            'transaction_id' => $txid
        ]);

        // 1 == paid
        $apt->update([
            'status' => 1
        ]);

        ///que send mail to user
        $user = User::find($apt->user_id);
        Mail::to($user->email)->send(new AppointmentMail($apt, $user));

        return redirect('/dashboard')->with('success', 'Payment Sucessfull <br> Apointment Has Been Booked Successfully <br> Link To Appointment room has been Sent to your Email');
    }



    // function verifyPayment(Request $request, $appointment_id)
    // {
    //     $apt = Appointment::find($appointment_id);
    //     if ($request->status == 'cancelled') {
    //         return redirect('/dashboard')->with('error', 'Transaction was cancelled, pls try again');
    //     }
    //     $txid = $request->transaction_id;
    //     $result = Http::withHeaders([
    //         'Content-Type' => 'application/json',
    //         'Authorization' => 'Bearer FLWSECK_TEST-83649458fea46c6faf817a95c06b3d38-X'
    //     ])->get("https://api.flutterwave.com/v3/transactions/{$txid}/verify");

    //     if(!$result['status'] == 'success') {
    //         return redirect('/dashboard')->with('error', 'An Error Occured While Verifying Your Payment');
    //     }

    //     $ck = Payment::where('transaction_id', $result['data']['tx_ref'])->first();
    //     if($ck) { return redirect('dashboard')->with('error', 'Transaction already Verified'); }

        
    //     Payment::create([
    //         'user_id' => $apt->user_id,
    //         'appointment_id' => $apt->id,
    //         'amount' => $result['data']['amount'],
    //         'transaction_id' => $result['data']['tx_ref']
    //     ]);

    //     // 1 == paid
    //     $apt->update([
    //         'status' => 1
    //     ]);

    //     ///que send mail to user
    //     $user = User::find($apt->user_id);
    //     Mail::to($user->email)->send(new AppointmentMail($apt, $user));

    //     return redirect('/dashboard')->with('success', 'Payment Sucessfull <br> Apointment Has Been Booked Successfully <br> Link To Appointment room has been Sent to your Email');
    // }


}

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\ResetToken;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/login', function () {
    return view('login');
})->name('/login');

Route::get('/register', function () {
    return view('register');
});

Route::get('/recover-password', function () {
    return view('forgotpassword');
});

Route::get('/reset-password/{token}', function ($token) {
    $token = ResetToken::where('token', $token)->first();
    if(!$token) { 
        abort(404);
    }
    return view('resetpassword', compact('token'));
});



Route::post('/register', [AuthController::class, 'UserSignUp']);
Route::post('/password_reset', [AuthController::class, 'SendResetPasswordLink']);
Route::post('/make_password', [AuthController::class, 'makePassword']);
Route::post('/login', [AuthController::class, 'LogUserIn']);
Route::get('/verify/email/{id}/{enc}', [AuthController::class, 'verifyMail']);
Route::get('/verificationmail/{id}', [AuthController::class, 'sendmailGet']);

Route::post('/sendmessage', [ContactController::class, 'sendContactMessage']);

Route::get('/appointment', function () {
    return view('book-apointment');
})->middleware(['make_appointment', 'emailverified']);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [Controller::class, 'retDashboard']);

    Route::get('/startpayment/{id}', [AppointmentController::class, 'payForAppointment']);
    Route::get('/verifypayment/{appointment_id}', [AppointmentController::class, 'verifyPayment']);
    Route::post('/book', [AppointmentController::class, 'bookAppointment']);
    Route::get('/logout', [AuthController::class, 'LogMeOut']);

    Route::get('/mesages/{appointment_id}', [ChatController::class, 'fetchMessages']);
    Route::get('/compare_mesages/{message_id}/{appointment_id}', [ChatController::class, 'compareChat']);
    Route::get('/mesage', [ChatController::class, 'sendMessage']);

    Route::get('/chat/{appointment_id}', function ($appointment_id) {
        return view('chats', compact('appointment_id'));
    });
    Route::get('/appointment/room/{appointment_id}', function ($appointment_id) {
        $appointment = Appointment::find($appointment_id);
        return view('chat2', compact('appointment_id', 'appointment'));
    });

    Route::get('/appointment/room/2/{appointment_id}', function ($appointment_id) {
        $appointment = Appointment::find($appointment_id);
        return view('chat2', compact('appointment_id', 'appointment'));
    });

});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/appointment/all', [AdminController::class, 'allAppointment']);
    Route::get('/today_appointment', [AdminController::class, 'todayAppointment']);
    Route::get('/manage_users', [AdminController::class, 'manageUserIndex']);
    Route::get('/profile/{id}', [AdminController::class, 'userProfileIndex']);

    Route::get('/contact_message', function () {
        return view('admin.contact');
    });

    Route::get('/search', function () {
        return view('admin.search');
    });


    Route::get('/appointment/{appointment_id}', function ($appointment_id) {
        $appointment = Appointment::with(['payment', 'user'])->find($appointment_id);
        return view('admin.chat', compact('appointment_id', 'appointment'));
    });
}); 



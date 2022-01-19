<?php

use App\Jobs\SendReminderEmail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmailMailable;
use Carbon\Carbon;

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
    return view('welcome');
});


Route::get('sendEmail', function () {

    $job = (new SendReminderEmail())->delay(Carbon::now()->addSeconds(5));


    
    dispatch(new SendReminderEmail());



    return "Email is send properly";
});
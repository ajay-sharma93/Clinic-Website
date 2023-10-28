<?php

use App\Models\Appointment;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Ignition\Contracts\Solution;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/service', function () {
    $services = Service::all();
    return view('service', compact("services"));
});

Route::get('/feature', function () {
    return view('feature');
});

Route::get('/contact', function () {

    return view('contact');
});

Route::get('/appointment', function () {
    return view('appointment');
});

Route::get('/testimonial', function () {
    return view('testimonial');
});

Route::get('/team', function () {
    return view('team');
});
Route::post('/contact-save', function (Request $request) {
    contact::create($request->all());
    return redirect()->back()->with('success', 'You have Successfully Registred');
});

Route::post('/appointment-save', function (Request $request) {
    Appointment::create($request->all());
    return redirect()->back()->with('success', 'You have booked your Appointment');
});


Route::get('/admin/dashboard', function () {
    $countsolution = Service::count();
    $countcontact = Contact::count();

    return view('admin.dashboard', compact('countsolution', 'countcontact',));
});

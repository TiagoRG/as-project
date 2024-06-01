<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/provider', function () {
    return view('provider');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact.submit', function (Request $request) {
    $name = $request->input('name');
    $email = $request->input('email');
    $message = $request->input('message');

    $file = fopen('contact_data.csv', 'a');
    $data = array($name, $email, $message);
    fputcsv($file, $data);
    fclose($file);

    return redirect('/contact')->with('status', 'Message sent!');
})->name('contact.submit');

Route::get('/services', function (Request $request) {
    if (!$request->has('id')) {
        return view('services');
    } else {
        return view('services/{id}');
    }
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login.submit', function (Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    $file = fopen('users.csv', 'r');
    while (($data = fgetcsv($file)) !== FALSE) {
        if ($data[1] == $email && $data[2] == $password) {
            setcookie('username', $data[0], time() + 3600);
            return redirect('/')->with('status', 'Login successful!')->with('username', $data[0]);
        }
    }

    return redirect('/login')->with('status', 'Invalid credentials!');
})->name('login.submit');

Route::get('/logout', function () {
    setcookie('username', '', time() - 3600);
    return redirect('/')->with('status', 'Logout successful!');
});

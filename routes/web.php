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

Route::get('/services', function () {
    return view('services');
});

Route::post('/book-service', function (Request $request) {
    $serviceName = $request->input('service');
    $serviceProvider = $request->input('provider');
    $serviceDescription = $request->input('description');
    if (!isset($_COOKIE['email'])) {
        return redirect('/login')->with('error', 'Login required!');
    }
    $bookedBy = $_COOKIE['email'];

    try {
        $file = fopen("bookings.csv", "r");
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($serviceName == $data[0] && $serviceProvider == $data[1] && $serviceDescription == $data[2] && $bookedBy == $data[3])
                return redirect('/services')->with('error', 'You have already booked that service!');
        }
        $file = fopen("bookings.csv", "a");
        $data = array($serviceName, $serviceProvider, $serviceDescription, $bookedBy);
        fputcsv($file, $data);
        fclose($file);
    } catch (Exception $e) {
        return redirect('/services')->with('error', 'An error occurred while booking the service!');
    }

    return redirect('/services')->with('status', 'Service booked!');
})->name('book-service');

Route::get('/login', function (Request $request) {
    if (isset($_COOKIE['email']))
        return redirect('/');
    return view('login')->with('email', $request->has('email') ? $request->input('email') : '');
});

Route::post('/login.submit', function (Request $request) {
    $email = $request->input('email');
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email))
        return redirect('/login')->with('inputError', 'Email must be a valid address!')->with('email', $email);
    $password = $request->input('password');

    $file = fopen('users.csv', 'r');
    while (($data = fgetcsv($file)) !== FALSE) {
        if ($data[1] == $email && $data[2] == $password) {
            setcookie('username', $data[0], time() + 3600);
            setcookie('email', $data[1], time() + 3600);
            return redirect('/')->with('status', 'Login successful!');
        }
    }

    return redirect('/login')->with('inputError', 'Invalid credentials!')->with('email', $email);
})->name('login.submit');

Route::get('/signup', function (Request $request) {
    if (isset($_COOKIE['email']))
        return redirect('/');
    return view('signup')->with('email', $request->has('email') ? $request->input('email') : '')->with('name', $request->has('name') ? $request->input('name') : '');
});

Route::post('/signup.submit', function (Request $request) {
    $username = $request->input('username');
    $email = $request->input('email');
    $password = $request->input('password');
    $cpassword = $request->input('cpassword');

    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email))
        return redirect('/signup')->with('inputError', 'Email must be a valid address!')->with('name', $username);
    if ($password != $cpassword)
        return redirect('/signup')->with('inputError', 'Passwords do not match!')->with('email', $email)->with('name', $username);

    if (empty($username) || empty($email) || empty($password)) {
        return redirect('/signup')->with('error', 'All fields are required!');
    }

    try {
        $file = fopen('users.csv', 'r');
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($data[0] == $username) {
                fclose($file);
                return redirect('/signup')->with('error', 'Username already exists!')->with('email', $email);
            }
            if ($data[1] == $email) {
                fclose($file);
                return redirect('/signup')->with('error', 'Email already exists!')->with('name', $username);
            }
        }
        $file = fopen('users.csv', 'a');
        $data = array($username, $email, $password);
        fputcsv($file, $data);
        fclose($file);
    } catch (Exception $e) {
        return redirect('/signup')->with('error', 'Signup failed!');
    }

    return redirect('/login')->with('status', 'Signup successful!')->with('email', $email);
})->name('signup.submit');

Route::get('/logout', function () {
    setcookie('username', '', time() - 3600);
    setcookie('email', '', time() - 3600);
    return redirect('/')->with('status', 'Logout successful!');
});

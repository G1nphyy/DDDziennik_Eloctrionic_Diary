<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use \App\Models\User;
use \App\Models\schools;
use \App\Models\Post;
use \App\Models\Event;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Password;
use App\Http\Controllers\user_auth\Controller_auth;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\BlogController;
use \App\Models\Newsletter;


// Home
Route::get('/', function () {
    $events = Event::orderBy('date', 'desc')->take(3)->get();
    return view('welcome', ['events' => $events] );
});

//Log In Log Out Register
Route::get('/login', [Controller_auth::class, 'index_login' ]);
Route::post('/login', [Controller_auth::class, 'login' ]);

Route::get('/register', [Controller_auth::class, 'index_register' ]);
Route::post('/register', [Controller_auth::class, 'register' ]);

Route::get('/logout', [Controller_auth::class, 'logout' ]);


// Main Things
Route::view('/blog', 'nav_main_webs/blog');
Route::view('/about', 'nav_main_webs/about');
Route::view('/contact', 'nav_main_webs/contact');


Route::get('/schools', [SchoolController::class, 'index']);
Route::get('/schools/{school}', [SchoolController::class, 'info']);

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{id}', [BlogController::class, 'show']);

Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);

//Newsletter

Route::post('update/newsletter/subscribe', function () {
    $validator = request()->validate([
        'email' => 'required|email|unique:newsletters'
    ]);
    if ($validator){
        Newsletter::create($validator);
        return back()->with('newsletter_success', 'You have successfully subscribed to our newsletter. Stay tuned for updates and exciting news coming your way!');
    }
    return back()->withErrors($validator);

});

//Dashboard

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/grades', [DashboardController::class, 'grades']);
Route::post('/grades/fetch', [DashboardController::class, 'getGrades'])->name('grades.fetch');
Route::get('/dashboard/attendance', [DashboardController::class, 'attendance']);
Route::get('/dashboard/schedule', [DashboardController::class, 'schedule']);
Route::get('/dashboard/testsHomeworks', [DashboardController::class, 'testsHomeworks']);
Route::get('/dashboard/school', [DashboardController::class, 'school']);
Route::get('/dashboard/meetings', [DashboardController::class, 'meetings']);
Route::get('/dashboard/textbooks', [DashboardController::class, 'textbooks']);



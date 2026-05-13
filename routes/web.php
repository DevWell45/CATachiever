<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResendOTPController;
use App\Http\Controllers\Auth\VerifyOTPController;
use App\Http\Controllers\HiddenForms\ExamCategoryController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function(){
    Route::get('/', function () {
        return view('Auth.Log_In');
    })->name('login');

    Route::get('/create_account', function () {
        return view('Auth.Sign_Up');
    })->name('signup');

        
    Route::get('/account_verification', function(){
        if(!session()->has('otp_session')){
            return redirect()->route('login');
        };

        $otp_session = session('otp_session');

        $user = User::findorFail($otp_session['user_id']);
        return view('Auth.OTP_Verification',[
            'email' => $user->email
        ]);
    })->name('account_verification');

    Route::post('/register', [RegisterController::class, 'register'])->middleware('throttle:5,1');
    Route::post('/verify_otp', [VerifyOTPController::class, 'verify_otp'])->middleware('throttle:2,1');
    Route::post('/resend_otp', [ResendOTPController::class, 'new_otp'])->middleware('throttle:2,1');
    Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1');
});

Route::middleware(['auth'])->group(function(){

     Route::get('/home', function(){
        return view('Pages.Home');
    })->name('home_page');

    Route::get('/exam', function(){
        $category = session('category');

        if(!$category){
            return redirect()->route('home_page');
        }
        
        return view('Pages.Exam', compact(
            'category',
        ));
    })->name('exam_page');

    Route::post('/exam_session',[ExamCategoryController::class, 'Category'])->name('exam_url');
    Route::post('/logout', [LogoutController::class, 'logout']);
    
    
});


Route::middleware(['auth', 'admin'])->group(function(){

    Route::get('/dashboard', function(){
        $username = 'Jimwell Raza';

        $users = User::select('name', 'email','role')->get();

        return view('Admin.Pages.Dashboard',compact(
            'username',
            'users',

        ))->with([
            // TABLET and COMPUTER NAVIGATION BAR
            'D_TaC' => 'active', 'U_TaC' => 'inactive', 'Q_TaC' => 'inactive', 'F_TaC' => 'inactive',
            // MOBILE NAVIGATION BAR
            'D_mobile' => 'mobile', 'U_mobile' => 'inactive', 'Q_mobile' => 'inactive', 'F_mobile' => 'inactive',

            // OTHERS
            'Current_Page' => 'Dashboard',

        ]);
    })->name('dashboard_page');

    Route::get('/users', function(){

        $users = User::select('name', 'email','role')->get();

        $total = ([
            'counted' => $users->count(),
            'identifier' => 'TOTAL USERS'
        ]);
        $fixed_number = ([
            'counted' => $users->where('role', 'admin')->count(),
            'identifier' => 'TOTAL ADMINS'
        ]);
        $new = ([
            'counted' => '12',
            'identifier' => 'NEW USERS'
        ]);

        return view('Admin.Pages.Users',compact(
            'users',
            'total', 'fixed_number', 'new'
        ))->with([ 
            // TABLET and COMPUTER NAVIGATION BAR
            'D_TaC' => 'inactive', 'U_TaC' => 'active', 'Q_TaC' => 'inactive', 'F_TaC' => 'inactive',
            // MOBILE NAVIGATION BAR
            'D_mobile' => 'inactive', 'U_mobile' => 'mobile', 'Q_mobile' => 'inactive', 'F_mobile' => 'inactive',

            // OTHERS
            'Current_Page' => 'Users',

        ]);
    })->name('users_page');

    // ==============================================================================================================
    // ==============================================================================================================

    Route::get('/questions', function(){
        $total = ([
            'counted' => '453',
            'identifier' => 'TOTAL QUESTIONS'
        ]);
        $fixed_number = ([
            'counted' => '5',
            'identifier' => 'CATEGORIES'
        ]);
        $new = ([
            'counted' => '12',
            'identifier' => 'NEW QUESTIONS'
        ]);
        return view('Admin.Pages.Questions',compact(
            'total', 'fixed_number', 'new'
        ))->with([ 
            // TABLET and COMPUTER NAVIGATION BAR
            'D_TaC' => 'inactive', 'U_TaC' => 'inactive', 'Q_TaC' => 'active', 'F_TaC' => 'inactive',
            // MOBILE NAVIGATION BAR
            'D_mobile' => 'inactive', 'U_mobile' => 'inactive', 'Q_mobile' => 'mobile', 'F_mobile' => 'inactive',

            // OTHERS
            'Current_Page' => 'Questions',

        ]);
    })->name('questions_page');

    // ==============================================================================================================
    // ==============================================================================================================

    Route::get('/feedbacks', function(){
        $total = ([
            'counted' => '57',
            'identifier' => 'FEEDBACKS'
        ]);
        $fixed_number = ([
            'counted' => '12',
            'identifier' => 'RESOLVED'
        ]);
        $new = ([
            'counted' => '7',
            'identifier' => 'NEW FEEDBACKS'
        ]);
        return view('Admin.Pages.Feedbacks',compact(
            'total', 'fixed_number', 'new',

        ))->with([ 
            // TABLET and COMPUTER NAVIGATION BAR
            'D_TaC' => 'inactive', 'U_TaC' => 'inactive', 'Q_TaC' => 'inactive', 'F_TaC' => 'active',
            // MOBILE NAVIGATION BAR
            'D_mobile' => 'inactive', 'U_mobile' => 'inactive', 'Q_mobile' => 'inactive', 'F_mobile' => 'mobile',

            // OTHERS
            'Current_Page' => 'Feedbacks',

        ]);
    })->name('feedbacks_page');

});




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

Route::get('/questions', function(){
        return view('Admin.Pages.Questions');
    });
Route::middleware(['auth', 'admin'])->group(function(){
    
});




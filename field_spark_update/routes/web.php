<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\InstructorAuthController;




Route::get('/instructor/register', function () {
    return view('instructor.register');
})->name('instructor.register');

Route::get('/instructor/login', function () {
    return view('instructor.login');
})->name('instructor.login');

Route::get('/discussion', function () {
    return view('pages.discussion');
})->name('pages.discussion');

Route::get('/idiscussion', function () {
    return view('pages.idiscussion');
})->name('pages.idiscussion');

Route::get('/api/user', function() {
    return response()->json(Auth::guard('instructor')->user()->name);
});


Route::post('/instructor/register', [InstructorAuthController::class, 'register']);
Route::post('/instructor/login', [InstructorAuthController::class, 'login']);


route::get('/',[TemplateController::class,'index']);
route::get('/register',[TemplateController::class,'index1']);
// route::get('/',[TemplateController::class,'index2']);
// route::get('/instructorregister',[TemplateController::class,'index3']);





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
});

Route::middleware('auth:instructor')->group(function () {
    Route::get('/idashboard', function () {
        return view('pages.instructordashboard');
    })->name('pages.instructordashboard');
    Route::get('/instructor/logout', [InstructorAuthController::class, 'logout'])->name('instructor.logout');
});

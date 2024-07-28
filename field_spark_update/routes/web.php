<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\InstructorAuthController;
use App\Http\Controllers\PlantController;




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

Route::get('/plantinfo', function () {
    return view('pages.plantinfo');
})->name('pages.plantinfo');

Route::get('/instructorplant', function () {
    return view('pages.instructorplant');
})->name('pages.instructorplant');

Route::get('/plant/{id}', [PlantController::class, 'show'])->name('plant.show');

Route::get('/api/user', function() {
    return response()->json(Auth::guard('instructor')->user()->name);
});

Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');


Route::post('/instructor/register', [InstructorAuthController::class, 'register']);
Route::post('/instructor/login', [InstructorAuthController::class, 'login']);


route::post('/login',[UserController::class,'loginUser'])->name('login');
route::get('/register',[TemplateController::class,'index1']);
route::get('/',[TemplateController::class,'index3']);
route::get('/aboutus',[TemplateController::class,'index4']);
route::get('/services',[TemplateController::class,'index5']);
route::get('/plants',[TemplateController::class,'index6']);
route::get('/contactus',[TemplateController::class,'index7']);

Route::post('/plants', [PlantController::class, 'store'])->name('plants.store');
Route::get('/instructorplants', [PlantController::class, 'instructorPlantIndex'])->name('instructor.plants.index');
Route::get('/plantinfo', [PlantController::class, 'index'])->name('pages.plantinfo');
Route::get('/plants', [PlantController::class, 'newPage'])->name('pages.plants');
Route::get('/plants/create', [PlantController::class, 'create'])->name('plants.create');
Route::post('/plants', [PlantController::class, 'store'])->name('plants.store');
Route::get('/plants/{id}', [PlantController::class, 'show'])->name('plants.show');
Route::get('/plants/{id}/edit', [PlantController::class, 'edit'])->name('plants.edit');
Route::put('/plants/{id}', [PlantController::class, 'update'])->name('plants.update');
Route::delete('/plants/{id}', [PlantController::class, 'destroy'])->name('plants.destroy');



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

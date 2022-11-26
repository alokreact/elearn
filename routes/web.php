<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EmployeeController;

use App\Models\Cour;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashBoardController;

 

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
Auth::routes();

Route::get('/', function () {
    return view('eclipse-interface.index');
})->name("home");


Route::get('/dashboard', [DashBoardController::class,'index']);
Route::get('/admincourse', [CourseController::class,'index'])->middleware(['role:admin']);
Route::post('/createcourse', [CourseController::class,'create'])->name('createcourse');


 Route::get('/about',[FrontendController::class,'about'])->name("about");
 Route::get('/course',[FrontendController::class,'course'])->name("course");
 Route::get('/contact', [FrontendController::class,'contact'])->name("contact");
 Route::get('/contact', [FrontendController::class,'features'])->name("features");
 Route::get('cart', [FrontendController::class,'cart'])->name('cart');


// Route::get('/profile', function () {
//     return view('profile');
// })->middleware(['auth'])->name('profile');



Route::get('/getemployee', [EmployeeController::class,'search'])->name('getEmployee');
Route::get('/employee', [EmployeeController::class,'index'])->name('employee');
Route::any('/saveemployee', [EmployeeController::class,'store'])->name('employee.update');


 
// require __DIR__.'./my-routes.php';
 require __DIR__.'./admin.php';
// require __DIR__.'./user_dashboard.php';
// require __DIR__.'./eclipse.php';
// require __DIR__.'./auth.php';



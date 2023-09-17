<?php

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
    return view('welcome');
})->name('home');
/*Route::view('/','welcome');
//get ou post 
Route::match(['get', 'post'],'user/profile',function(){

});
//avec toutes les methodes
Route::any('users/{id}', function ($id) {
    
});
//redirect
//301 home
Route::redirect('/profile', '/', 301);
*/
Route::any('mapage', function () {
    return view("mapage");
});


Route::resource('admin', \App\Http\Controllers\AdminController::class)->except([
    

]);

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('login');
})->name('logout');
Route::group(['prefix'=> 'etudiant' , 'as' => 'etudiant.'] , function () {
   Route::get('profile', '\App\Http\Controllers\StudentController@show')->name('profile');
    Route::view('emplois', 'student.emplois')->name("emplois");
    Route::get('notes', [\App\Http\Controllers\NotesController::class,'index'])->name('notes');
    
});
Auth::routes();


Route::get('/pdf', [\App\Http\Controllers\AdminController::class, 'generatePDF'])->name('admin.pdfGenerator');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
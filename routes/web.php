<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use App\Neuron\MyAgent;
use NeuronAI\Messages\UserMessage;


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
Route::get('/contact', function () {
    return view('pages.Contact');
});
Route::get('/about', function () {
    return view('pages.About');
});
// Route::get('/admin', function () {
//     return view('pages.Admin');
// });





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//admin routes



Route::prefix('admin')->group(function () {

    Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('admin.register.form');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.register');

    Route::get('/', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/', [AdminController::class, 'login'])->name('admin.login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

});
//website uploders routes
    Route::middleware(['auth'])->group( function (){
        Route::get('/webshow',[WebController::class,'show']);
        Route::get('/showWebform',[WebController::class,'index']);
        Route::post('/submitweb',[WebController::class,'addweb']);
      
    });
//chat agent nuron ai routes.
Route::post('ask',[AgentController::class,'ask']);
Route::get('ask-form',[AgentController::class,'ask_form']);
//Posts
Route::get('/posts', [PostController::class, 'viewpost'])->name('posts.viewPost');
Route::get('/posts-form', [PostController::class, 'postform'])->name('posts.postform');
Route::post('/submit-form', [PostController::class, 'addpost'])->name('posts.store');
Route::get('/posts-edit/{id}', [PostController::class, 'editpost'])->name('posts.edit');
Route::patch('/posts-update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts-delete/{id}', [PostController::class, 'deletepost'])->name('posts.delete');

//test

// Route::post('/huggingface', [PostController::class, 'analyze']);

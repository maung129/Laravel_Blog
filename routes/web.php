<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\MustBeAdminMiddleware;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
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



// Route::get('/categories/{category:slug}',function(Category $category){

//     return view('blogs',[
//         'blogs'=>$category->blogs,
//         "categories"=>Category::all(),
//         'currentCategory'=>$category
//     ]);
// });

// Route::get('/users/{user:username}',function(User $user){
//     return view('blogs',[
//         'blogs'=>$user->blogs,
//         "categories"=>Category::all()
//     ]);
// });


Route::middleware(GuestMiddleware::class)->group(function(){
    Route::get('/register',[AuthController::class,'create']);
    Route::post('/register',[AuthController::class,'store']);

    Route::get('/login',[AuthController::class,'login']);
    Route::post('/login',[AuthController::class,'post_login']);

});

Route::middleware(AuthMiddleware::class)->group(function(){
    Route::get('/', [BlogController::class,'index']);


    Route::get('/blogs/{blog:slug}',function(Blog $blog){
        return view('blog',[
            "blog" => $blog->load('comments'),
            'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
        ]);

    }
    );

    Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store']);

    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/blogs/{blog:slug}/subscription',[SubscriptionController::class,'toggleSubscribe']);
});

Route::middleware(['can:admin'])->group(function(){
    Route::get('/admin/blogs/create',[BlogController::class,'create']);
    Route::get('/admin',[BlogController::class,'dashboard']);
    Route::post('/admin/blogs/store',[BlogController::class,'store']);
    Route::delete('/admin/blogs/{blog}/delete',[BlogController::class,'destroy']);
    Route::get('/admin/blogs/{blog}/edit',[BlogController::class,'edit']);
});






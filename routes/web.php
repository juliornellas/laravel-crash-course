<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

//Examples
// Route::get('/hello', function(){
//     // return 'Hello World';
//     return response('<h1>Hello World!</h1>', 200)
//     ->header('Content-Type', 'text/plan')
//     ->header('foo','bar'); //Customize header as you want
// });

// Route::get('/post/{id}', function($id){
//     // dd($id);
//     // ddd($id);
//     return response('Post '.$id);
// })
// ->where('id', '[0-9]+'); //Only numbers

// Route::get('/search', function(Request $request){
//     // dd($request);
//     return $request->name . ' from ' . $request->city;
// });

//All Listings
// Route::get('/', function () {
//     // return view('welcome');
//     return view('listings', [
//         // 'heading' => 'Latest Listings',
//         'listings' => Listing::all()
//         // [
//         //     [
//         //         'id' => 1,
//         //         'title' => 'Listing One',
//         //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur unde quibusdam, a ipsa deserunt rem possimus. Quaerat molestiae laudantium corporis, cupiditate ab aliquid. Quis sapiente voluptas distinctio facilis mollitia perferendis!'
//         //     ],
//         //     [
//         //         'id' => 2,
//         //         'title' => 'Listing Two',
//         //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur unde quibusdam, a ipsa deserunt rem possimus. Quaerat molestiae laudantium corporis, cupiditate ab aliquid. Quis sapiente voluptas distinctio facilis mollitia perferendis!'
//         //     ]
//         // ]
//     ]);
// });

//Single Listings
// Route::get('/listings/{id}', function($id){

//     $listing = Listing::find($id);

//     return view('listing', [
//         'listing' => $listing ?? abort('404')
//     ]);

// });

// Route::get('/listings/{listing}', function(Listing $listing){
//     return view('listing', [
//         'listing' => $listing
//     ]);
// });

//Manage listings
Route::get('/listings/manage',[ListingController::class, 'manage'])->middleware('auth');

Route::get('/', [ListingController::class, 'index']);
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use app\Models\Product;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::post('/products', [ProductController::class, 'store']);
// Route::get('/products/{$id}', [ProductController::class, 'store']);

// Route::post('/products', function () {
//     return Product::create([
//         'name'         => 'product-two',
//         'slug'         => 'product-two',
//         'description'  => 'product-two',
//         'price'        => 21.19,
//     ]);
// });

// resource route 
// Route::resource('products', ProductController::class);

// public route
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);

// Route::get('/products/search/{$name}', function () {

// return "hello test";
// return Product::all();
// return Product::where('name', 'LIKE', '%' . $name . '%')->get();
// });

// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// sanctum
<?php

use App\Http\Livewire\Studios\Show;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Studios\Register;
use App\Http\Livewire\Studios\Dashboard;
use App\Http\Livewire\Contracts\Show as SC;
use App\Http\Livewire\Carts\Dashboard as Cart;
use App\Http\Livewire\Chats\Dashboard as Chat;
use App\Http\Livewire\Studios\ListFreelancers;
use App\Http\Livewire\Payments\Dashboard as Payment;
use App\Http\Livewire\Products\Dashboard as Product;
use App\Http\Livewire\Contracts\Dashboard as Contract;
use App\Http\Livewire\Wishlists\Dashboard as WS;

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

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/wishlists', WS::class)->name('wishlist.dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/payments', Payment::class)->name('payments.dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/contracts', SC::class)->name('contracts.show');
Route::middleware(['auth:sanctum', 'verified'])->get('/contracts/{id}', Contract::class)->name('contracts.dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/chats', Chat::class)->name('chat.dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/user/{id}', Show::class)->name('studio.show');
Route::middleware(['auth:sanctum', 'verified', 'isCustomer'])->get('/studio/register', Register::class)->name('studio.register');
Route::middleware(['auth:sanctum', 'verified', 'isFreelancer'])->get('/user/studio/{id}', Dashboard::class)->name('studio.dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/freelancers', ListFreelancers::class)->name('studio.lists');
Route::middleware(['auth:sanctum', 'verified'])->get('/products', Product::class)->name('product.dashboard');
Route::get('/cart', Cart::class)->name('cart.dashboard');

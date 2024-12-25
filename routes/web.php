<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Wyświetla stronę powitalną (bez middleware ani wymagań uwierzytelniania)
Route::view('/', 'welcome');

// Wyświetla stronę pulpitu, dostępna tylko dla uwierzytelnionych i zweryfikowanych użytkowników
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified']) // Middleware, aby upewnić się, że użytkownik jest uwierzytelniony i zweryfikowany
    ->name('dashboard'); // Nazwa trasy dla łatwego odniesienia

// Trasy produktów
// Wyświetla listę produktów (strona indeksu)
Route::get('/products/index', [ProductController::class, 'index'])->name('products.index');    

// Wyświetla formularz do utworzenia nowego produktu
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');    

// Obsługuje przesłanie formularza w celu zapisania nowego produktu
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');    


Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


// Wyświetla stronę profilu, dostępna tylko dla uwierzytelnionych użytkowników
Route::view('profile', 'profile')
    ->middleware(['auth']) // Middleware, aby upewnić się, że użytkownik jest uwierzytelniony
    ->name('profile'); // Nazwa trasy dla łatwego odniesienia

// Zawiera trasy związane z uwierzytelnianiem (logowanie, rejestracja itp.)
require __DIR__.'/auth.php';

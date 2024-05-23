<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\SpendController;
use App\Http\Controllers\SpendCategoryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/income', [IncomeController::class, 'index'])->name('income.index');
    Route::get('/income/create', [IncomeController::class, 'create'])->name('income.create');
    Route::post('/income', [IncomeController::class, 'store'])->name('income.store');
    Route::get('/income/edit/{incomeId}', [IncomeController::class, 'edit'])->name('income.edit');
    Route::put('/income/edit/{incomeId}', [IncomeController::class, 'update'])->name('income.update');
    Route::delete('/income/{income}', [IncomeController::class, 'destroy'])->name('income.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/incomeCategory', [IncomeCategoryController::class, 'index'])->name('incomeCategory.index');
    Route::get('/incomeCategory/create', [IncomeCategoryController::class, 'create'])->name('incomeCategory.create');
    Route::post('/incomeCategory', [IncomeCategoryController::class, 'store'])->name('incomeCategory.store');
    Route::get('/incomeCategory/edit/{incomeCategoryId}', [IncomeCategoryController::class, 'edit'])->name('incomeCategory.edit');
    Route::put('/incomeCategory/edit/{incomeCategoryId}', [IncomeCategoryController::class, 'update'])->name('incomeCategory.update');
    Route::delete('/incomeCategory/{incomeCategoryId}', [IncomeCategoryController::class, 'destroy'])->name('incomeCategory.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/spend', [SpendController::class, 'index'])->name('spend.index');
    Route::get('/spend/create', [SpendController::class, 'create'])->name('spend.create');
    Route::post('/spend', [SpendController::class, 'store'])->name('spend.store');
    Route::get('/spend/edit/{spendId}', [SpendController::class, 'edit'])->name('spend.edit');
    Route::put('/spend/edit/{spendId}', [SpendController::class, 'update'])->name('spend.update');
    Route::delete('/spend/{spend}', [SpendController::class, 'destroy'])->name('spend.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/spendCategory', [SpendCategoryController::class, 'index'])->name('spendCategory.index');
    Route::get('/spendCategory/create', [SpendCategoryController::class, 'create'])->name('spendCategory.create');
    Route::post('/spendCategory', [SpendCategoryController::class, 'store'])->name('spendCategory.store');
    Route::get('/spendCategory/edit/{spendCategoryId}', [SpendCategoryController::class, 'edit'])->name('spendCategory.edit');
    Route::put('/spendCategory/edit/{spendCategoryId}', [SpendCategoryController::class, 'update'])->name('spendCategory.update');
    Route::delete('/spendCategory/{spendCategoryId}', [SpendCategoryController::class, 'destroy'])->name('spendCategory.destroy');
});

require __DIR__.'/auth.php';

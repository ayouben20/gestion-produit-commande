<?php

use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/commander', [CommandeController::class, 'afficherproduits']);
Route::post('/commander', [CommandeController::class, 'commander'])->name('commande.process');


<?php

use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/commander', [CommandeController::class, 'afficherproduits'])->name('commander');
Route::post('/commander', [CommandeController::class, 'commander'])->name('commande.process');

Route::get('/showcommande', [CommandeController::class, 'indexcommand'])->name('showcommande');
Route::get('/showcommande/{id}', [CommandeController::class, 'supprimercommand'])->name('commande.supprimer');

Route::get('/showcommande/{id}/modifier', [CommandeController::class, 'modifiercommand'])->name('modifier.commande');





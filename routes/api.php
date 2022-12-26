<?php

use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;


Route::get('dictionaries', [DictionaryController::class, 'index']);
Route::get('dictionaries/{dictionary}', [DictionaryController::class, 'show']);
Route::post('dictionaries', [DictionaryController::class, 'store']);
Route::delete('dictionaries/{dictionary}', [DictionaryController::class, 'destroy']);

Route::post('words', [WordController::class, 'store']);
Route::delete('words/{word}', [WordController::class, 'destroy']);
Route::patch('set-word/{dictionary}/{word}', [WordController::class, 'setWord']);
Route::patch('unset-word/{word}', [WordController::class, 'unsetWord']);

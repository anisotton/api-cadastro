<?php

use App\Http\Livewire\{
    AddSeller,
    ShowSales
};
use Illuminate\Support\Facades\Route;


Route::get('/', ShowSales::class);
Route::get('add-seller', AddSeller::class);

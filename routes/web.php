<?php

use Illuminate\Support\Facades\Route;

Route::get('/Note',function(){
    return view('notenest::index');
});
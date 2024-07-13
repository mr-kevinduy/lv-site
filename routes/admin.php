<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

Route::group([
    'prefix'        => 'admin',
    'as'            => 'admin.',
], function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
});

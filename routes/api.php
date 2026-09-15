<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('v1/habitacions', \App\Http\Controllers\Api\V1\HabitacionController::class)->names('api.v1.habitacions');


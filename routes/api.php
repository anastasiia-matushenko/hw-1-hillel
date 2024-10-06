<?php

use App\Controllers\AuthController;
use App\Controllers\V1\FoldersController;
use Core\Router;

Router::post('api/auth')
    ->controller(AuthController::class)
    ->action('login');
Router::post('api/auth/register')
    ->controller(AuthController::class)
    ->action('register');

// Routes for Folders
Router::get('api/v1/folders')
    ->controller(FoldersController::class)
    ->action('index');
Router::get('api/v1/folders/{id:\d+}')
    ->controller(FoldersController::class)
    ->action('show');
Router::post('api/v1/folders/store')
    ->controller(FoldersController::class)
    ->action('store');
Router::put('api/v1/folders/{id:\d+}/update')
    ->controller(FoldersController::class)
    ->action('update');
Router::delete('api/v1/folders/{id:\d+}/delete')
    ->controller(FoldersController::class)
    ->action('delete');
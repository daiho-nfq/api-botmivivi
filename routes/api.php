<?php

use App\Http\Controllers\API\Admin\CreateUserController;
use App\Http\Controllers\API\Admin\DeactivateUserController;
use App\Http\Controllers\API\Admin\EditSingleUserProfileController;
use App\Http\Controllers\API\Admin\GetUserListController;
use App\Http\Controllers\API\Admin\ReactivateUserController;
use App\Http\Controllers\API\Manufacturer\GetManufacturerListController;
use App\Http\Controllers\API\Product\CreateProductController;
use App\Http\Controllers\API\Product\GetProductListController;
use App\Http\Controllers\API\Product\GetSingleProductController;
use App\Http\Controllers\API\Product\UpdateSingleProductController;
use App\Http\Controllers\API\User\GetCurrentUserController;
use App\Http\Controllers\API\User\UpdateCurrentUserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api', 'prevent_request_from_inactive_user'])->group(function () {
    Route::prefix('user')->group(function() {
        Route::get('profile', GetCurrentUserController::class)->name('api.user.profile');
        Route::put('profile', UpdateCurrentUserProfileController::class)->name('api.user.update_profile');

    });

    Route::prefix('employee')->group(function() {
    });

    Route::prefix('admin')->group(function() {
        Route::middleware(['ensure_user_is_admin'])->prefix('user')->group(function() {
            Route::get('/', GetUserListController::class)->name('api.admin.get_user_list');
            Route::post('create-user', CreateUserController::class)->name('api.admin.create');
            Route::middleware(['ensure_user_is_valid'])->group(function () {
                Route::put('/profile', EditSingleUserProfileController::class)->name('api.admin.edit_profile');
                Route::put('/deactivate-user', DeactivateUserController::class)->name('api.admin.deactivate_user');
                Route::put('/reactivate-user', ReactivateUserController::class)->name('api.admin.reactivate_user');
            });
        });
    });

    Route::prefix('manufacturer')->group(function() {
        Route::get('/', GetManufacturerListController::class)->name('api.manufacturer.list');
    });

    Route::prefix('product')->group(function() {
        Route::get('/', GetProductListController::class)->name('api.product.list');
        Route::post('/create-product', CreateProductController::class)->name('api.product.create');
        Route::middleware('ensure_product_is_valid')->group(function () {
            Route::get('/{product_code}', GetSingleProductController::class)->name('api.single_product');
            Route::put('/{product_code}', UpdateSingleProductController::class)->name('api.edit_single_product');

        });
    });
});

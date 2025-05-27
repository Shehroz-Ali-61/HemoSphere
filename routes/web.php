<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{
    DashboardController as AdminDashboardController,
    LoginController as AdminLoginController
};
use App\Http\Controllers\{
    LoginController,
    DashboardController,
    ForgotPasswordController,
    DonorController,
    ChatController,
    MailController
};

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/help', function () {
    return view('helpNeeded');
});


Route::get('send-mail', [MailController::class, 'sendEmail']);

// Regular User Routes
Route::group(['prefix' => 'account', 'middleware' => 'prevent.back'], function () {
    // Guest Routes
    Route::group(['middleware' => 'guest'], function () {
        // Registration
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');

        // Login
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');

        // Password Reset
        Route::prefix('password')->group(function () {
            Route::get('/account/password/request', [ForgotPasswordController::class, 'showForgotPasswordForm'])
                ->name('account.password.request');

            Route::post('/account/password/email', [ForgotPasswordController::class, 'submitForgotPasswordForm'])
                ->name('account.password.email');

            Route::get('/account/password/reset/{token}', [ForgotPasswordController::class, 'showresetPasswordForm'])
                ->name('account.password.reset');

            Route::post('/account/password/update', [ForgotPasswordController::class, 'submitresetPasswordForm'])
                ->name('account.password.update');
        });
    });

    // Authenticated User Routes
    Route::group(['middleware' => 'auth'], function () {
        // Donor Routes
        Route::get('donateForm', [DonorController::class, 'donateForm'])->name('account.donateForm');
        Route::post('processDonate', [DonorController::class, 'processDonate'])->name('account.processDonate');
        Route::get('getBloodPost', [DonorController::class, 'getBloodPost'])->name('account.getBloodPost');
        Route::get('help', [DonorController::class, 'needhelp'])->name('account.help');

        // Dashboard & Logout
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');

        // // Chat
        Route::get('/chat/{user}', [ChatController::class, 'show'])->name('chat.show');
        Route::post('/chat/{user}/send', [ChatController::class, 'send'])->name('chat.send');

        // // Profile
        Route::get('/profile', [DashboardController::class, 'profilePanel'])->name('account.profile');
        // User
        Route::get('/edit-profile/{user}', [DashboardController::class, 'editProfile'])->name('account.editProfile');
        Route::put('/update-profile/{user}', [DashboardController::class, 'editUsersProfile'])->name('account.editUserProfile');
        Route::delete('/delete-profile/{user}', [DashboardController::class, 'deleteProfile'])
            ->name('account.deleteProfile');
        // // Donor
        Route::get('/edit-donor/{donor}', [DashboardController::class, 'editDonor'])
            ->name('account.editDonor');
        Route::put('/update-donor/{donor}', [DashboardController::class, 'editUsersDonor'])
            ->name('account.updateDonor');
        Route::delete('/delete-donor/{donor}', [DashboardController::class, 'deleteDonor'])
            ->name('account.deleteDonor');

        // help    
    });
});

// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => 'prevent.back'], function () {
    // Admin Guest Routes
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    // Admin Authenticated Routes
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        // Editing
        Route::get('adminpanel', [AdminDashboardController::class, 'adminPanel'])->name('admin.panel');
        // User Edit
        Route::get('delete/{id}', [AdminDashboardController::class, 'usersDelete'])->name('admin.delete');

        Route::get('users/edit/{id}', [AdminDashboardController::class, 'usersEdit'])->name('admin.user.edit');
        Route::put('users/update/{id}', [AdminDashboardController::class, 'editUsers'])->name('admin.user.update');

        // Donor Edit
        Route::get('deleteD/{id}', [AdminDashboardController::class, 'donorsDelete'])->name('admin.dDelete');


        Route::get('donors/edit/{id}', [AdminDashboardController::class, 'donorsEdit'])->name('admin.donor.edit');
        Route::put('donors/update/{id}', [AdminDashboardController::class, 'editDonors'])->name('admin.donor.update');


    });
});

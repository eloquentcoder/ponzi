<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\MergeController;
use App\Http\Controllers\User\BrokerController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\SupportController;
use App\Http\Controllers\User\ReferralController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\TestimonyController;
use App\Http\Controllers\User\ActivationController;
use App\Http\Controllers\User\WithdrawalController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\MergeController as AdminMergeController;
use App\Http\Controllers\Admin\DepositController as AdminDepositController;
use App\Http\Controllers\Admin\TestimonyController as AdminTestimonyController;
use App\Http\Controllers\Admin\WithdrawalController as AdminWithdrawalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'indexPage'])->name('home');
// Route::get('/about', [HomeController::class, 'aboutPage'])->name('about');
Route::get('/contact', [HomeController::class, 'contactPage'])->name('contact');

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');

    Route::get('register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('register', [AuthController::class, 'postRegisterPage'])->name('register.post');

    Route::get('forgot-password', [AuthController::class, 'forgotPasswordPage'])->name('forgot-password');
    Route::post('forgot-password', [AuthController::class, 'postForgotPassword'])->name('forgot.post');

    Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset-password');
    Route::post('/reset-password', [AuthController::class, 'postResetPassword'])->name('reset-password.post');

});


Route::group(['prefix' => 'user', 'middleware' => ['auth_user']], function () {
        Route::group(['middleware' => ['updated_profile']], function () {
                Route::group(['middleware' => ['activated']], function () {
                Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
                Route::get('profile', [ProfileController::class, 'index'])->name('profile');
                Route::get('referrals', [ReferralController::class, 'index'])->name('referrals');
                Route::get('merge-list', [MergeController::class, 'mergeList'])->name('merge');
                Route::get('make-investment', [DepositController::class, 'makeDepositPage'])->name('deposit');
                Route::get('investment/{id}', [DepositController::class, 'singleInvestment'])->name('invest.single');
                Route::get('investments', [DepositController::class, 'index'])->name('investments');
                Route::get('withdrawals', [WithdrawalController::class, 'index'])->name('withdrawals');
                Route::get('testimony/make', [TestimonyController::class, 'make'])->name('testimony.make');
                Route::get('broker', [BrokerController::class, 'index'])->name('broker');
                Route::post('broker/apply', [BrokerController::class, 'apply'])->name('broker.apply');
                Route::get('support', [SupportController::class, 'index'])->name('support');
            });
            Route::post('logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('activation', [ActivationController::class, 'activationPage'])->name('activation');
        });
    Route::get('account', [ProfileController::class, 'profilePage'])->name('account');
    Route::post('account', [ProfileController::class, 'postProfile'])->name('account.post');
    Route::get('/email/verify', [VerificationController::class, 'verificationNotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'hashEmailVerification'])->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [VerificationController::class, 'verificationNotification'])->middleware(['throttle:6,1'])->name('verification.send');
});

Route::group(['prefix' => 'secure/admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => ['guest']], function () {
        Route::get('login', [AdminAuthController::class, 'login'])->name('login');
        Route::post('login', [AdminAuthController::class, 'postLogin'])->name('login.post');
    });

    Route::group(['middleware' => ['auth_admin']], function () {
        Route::get('dashboard', [AdminHomeController::class, 'index'])->name('dashboard');
        Route::get('deposits', [AdminDepositController::class, 'index'])->name('deposits');
        Route::get('deposit/make', [AdminDepositController::class, 'make'])->name('deposit.make');
        Route::get('merge-list', [AdminMergeController::class, 'list'])->name('merge-list');
        Route::get('investment/{id}', [AdminDepositController::class, 'singleInvestment'])->name('invest.single');
        Route::get('personal-investments', [AdminDepositController::class, 'personal'])->name('personal.deposits');
        Route::get('withdrawals', [AdminWithdrawalController::class, 'index'])->name('withdrawals');
        Route::get('personal-investments', [AdminWithdrawalController::class, 'personal'])->name('personal.withdrawals');
        Route::get('testimony/make', [AdminTestimonyController::class, 'make'])->name('testimony.make');
    });


});

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
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SupportController as AdminSupportController;
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
Route::get('/about', [HomeController::class, 'aboutPage'])->name('about');
Route::get('/contact', [HomeController::class, 'contactPage'])->name('contact');
Route::post('/contact', [HomeController::class, 'postContact'])->name('contact.post');
Route::get('/terms', [HomeController::class, 'termsPage'])->name('terms');

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');

    Route::get('register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('register', [AuthController::class, 'postRegisterPage'])->name('register.post');

    Route::get('forgot-password', [AuthController::class, 'forgotPasswordPage'])->name('forgot-password');
    Route::post('forgot-password', [AuthController::class, 'postForgotPassword'])->name('forgot.post');

    Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'postResetPassword'])->name('reset-password.post');

});


Route::group(['prefix' => 'user', 'middleware' => ['auth_user']], function () {
        Route::group(['middleware' => ['updated_profile', 'restricted']], function () {
            Route::group(['middleware' => 'activated'], function () {
                Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
                Route::get('profile', [ProfileController::class, 'index'])->name('profile');
                Route::post('profile/post', [ProfileController::class, 'post'])->name('post.profile');
                Route::post('profile/password', [ProfileController::class, 'password'])->name('password.profile');
                Route::get('referrals', [ReferralController::class, 'index'])->name('referrals');
                Route::get('merge-list', [MergeController::class, 'mergeList'])->name('merge');
                Route::get('make-investment', [DepositController::class, 'makeDepositPage'])->name('deposit');
                Route::get('investment/{id}', [DepositController::class, 'singleInvestment'])->name('invest.single');
                Route::get('investments', [DepositController::class, 'index'])->name('investments');
                Route::get('withdrawals', [WithdrawalController::class, 'index'])->name('withdrawals');
                Route::get('withdrawal/{id}', [WithdrawalController::class, 'singleWithdrawal'])->name('withdraw.single');
                Route::get('testimony/make', [TestimonyController::class, 'make'])->name('testimony.make');
                Route::post('testimony/make', [TestimonyController::class, 'post'])->name('post.testimony.make');
                Route::get('broker', [BrokerController::class, 'index'])->name('broker');
                Route::post('broker/apply', [BrokerController::class, 'apply'])->name('broker.apply');
                Route::get('referrals/withdraw', [ReferralController::class, 'withdraw'])->name('referrals.withdraw');
                Route::get('support', [SupportController::class, 'index'])->name('support');
                Route::get('check', [DashboardController::class, 'checkTime'])->name('time');
            });
            Route::get('activation', [ActivationController::class, 'activationPage'])->name('activation');
        });
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('restricted', [HomeController::class, 'restricted'])->name('restricted');
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
        Route::get('my-investments', [AdminDepositController::class, 'personal'])->name('personal.deposits');
        Route::get('withdrawals', [AdminWithdrawalController::class, 'index'])->name('withdrawals');
        Route::get('withdrawal/{id}', [AdminWithdrawalController::class, 'singleWithdrawals'])->name('withdraw.single');
        Route::get('my-withdrawals', [AdminWithdrawalController::class, 'personal'])->name('personal.withdrawals');
        Route::get('testimony/make', [AdminTestimonyController::class, 'make'])->name('testimony.make');
        Route::post('testimony/make', [AdminTestimonyController::class, 'post'])->name('post.testimony.make');
        Route::get('testimonies', [AdminTestimonyController::class, 'index'])->name('testimonies');
        Route::get('support', [AdminSupportController::class, 'index'])->name('support');
        Route::get('profile', [AdminProfileController::class, 'index'])->name('profile');
        Route::post('profile/post', [AdminProfileController::class, 'post'])->name('post.profile');
        Route::post('profile/password', [ProfileController::class, 'password'])->name('password.profile');
        Route::get('users', [AdminHomeController::class, 'users'])->name('users');
        Route::get('pending/withdrawal', [AdminWithdrawalController::class, 'pending'])->name('withdrawal.pending');
        Route::get('admin/remerge/{id}', [AdminHomeController::class, 'remerge'])->name('remerge');
        Route::post('admin/remerge/{id}', [AdminHomeController::class, 'postRemerge'])->name('remerge.post');

        Route::post('users/suspend/{id}', [AdminHomeController::class, 'toggleSuspension'])->name('user.suspend');
        Route::post('admin/ph/delete', [AdminHomeController::class, 'deleteAdminPH'])->name('delete.admin-ph');

        Route::get('payment-stats', [AdminHomeController::class, 'stats'])->name('payment.stats');

        Route::post('logout', [AdminHomeController::class, 'logout'])->name('logout');
        Route::post('amount', [AdminHomeController::class, 'adjustAmount'])->name('amount');
        Route::get('admin', [AdminHomeController::class, 'admins'])->name('admins');
        Route::get('admin/add', [AdminHomeController::class, 'addAdmin'])->name('admins.add');
        Route::post('admin/add', [AdminHomeController::class, 'postAddAdmin'])->name('admins.add.post');
        Route::get('admin/{id}/edit', [AdminHomeController::class, 'editAdmin'])->name('admins.edit');
        Route::post('admin/{id}/edit', [AdminHomeController::class, 'updateAdmin'])->name('admins.update');
        Route::post('admin/gh/{id}', [AdminHomeController::class, 'adminsPost'])->name('admins.gh');
    });

});

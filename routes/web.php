<?php
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

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;


// Social Login
// By: Efriandika
Route::group(['middleware' => ['web'], 'prefix' => 'login', 'as' => 'login.'], function () {
    Route::get('/with/{provider}', 'Auth\SocialLoginController@redirectToProvider')->name('with');
    Route::get('/handle/{provider}', 'Auth\SocialLoginController@handleProviderCallback');
    Route::post('/handle/{provider}', 'Auth\SocialLoginController@handleProviderCallback');
});
// Social Login - End

Route::get('/', function () {
    return view('welcome');
});
Route::get('/get_id/{id}', 'DashboardController@get_id')->name('get_id');
Route::get('/team_dashboard', 'DashboardController@team_dashboard')->name('team_dashboard');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::post('/streaks', 'StreakController@status');
Route::post('/Enabledstreaks', 'StreakController@Enabledstatus');
Auth::routes(['verify' => true]);
Route::get('profile', function () {
    return 'This is profile';
})->middleware('verified');
Route::post('/', function () {
    return view('welcome');
});
Route::view('howitwork', 'front-pages/howitwork');
Route::view('faq', 'front-pages/faq');
Route::view('pricing', 'front-pages/pricing');
Route::view('contact', 'front-pages/contact');
Route::view('privacy', 'front-pages/privacy');
//these pages open after login
//used for submit tasks
Route::post('update', 'TaskController@update');
Route::post('add_task_to_database', 'TaskController@add_task_to_database');
// Route::post('add_task_to_database/{id}', 'TaskController@add_task_to_database');
Route::post('task', 'TaskController@store');
Route::get('take-history', 'TaskController@taskHistory');
Route::get('/account-setting', 'AccountSettingController@index')->name('account-setting');
Route::get('/destroy', 'AccountSettingController@destroy');
Route::post('edit', 'AccountSettingController@edit');
Route::get('team/{team}', 'TeamController@create')->name('team');
Route::get('teamMember{teammember}', 'TeamMemberController@create')->name('teamMember');
Route::get('register/request', 'Auth\RegisterController@requestInvitation')->name('requestInvitation');
Route::post('invitations/{team_id}', 'InvitationController@store')->middleware('guest')->name('storeInvitation');
Route::post('create_team', 'TeamController@create_team')->name('create_team');
View::composer(
    ['pages.header'],
    'App\Http\ViewComposers\NavigationViewComposer'
);
// ['pages.header', 'home', 'team_dashoard'],
//when user click the join team member this route direct to the signup page
Route::get('signup/{id}', 'InvitationController@join_team')->name('signup');
//when user already login then this page open
Route::post('join/{id}', 'InvitationController@team_join');
Route::resource('payment', 'BillingController');
Route::get('paymentprocess/{id}', 'BillingController@paymentprocess');
Route::get('freePackage', 'BillingController@freePackage');
Route::resource('upgradeaccount', 'UpgradeaccountController');
// used to submit task in the database
Route::post('submit_task', 'TaskController@submit_tasks');

//use to delete tasks
Route::post('delete_task', 'TaskController@delete_tasks');
//used to view page of inviation A/c to team id
Route::get('invite/{team_id}', 'InvitationController@invitation_page')->name('invite');
// Route::get('show/{team_id}', 'InvitationController@send_inviation')->name('show');
Route::post('registration', 'RegisterController@invite_member_reg');
Route::view('Howitwork', 'pages/howitwork');
Route::Post('/submit', 'ContactController@store');
Route::get('member', 'TeamMemberController@store')->name('member');
// Route::view('member', 'pages/member');
Route::group(['middleware' => 'auth'], function () {
//this method is used to register invite member
    Route::post('/invite_r/{id}', 'InvitationController@store');
//when user login this works
    Route::view('FAQ', 'pages/faq');
//when user login this works
    Route::view('Pricing', 'pages/pricing');
//when user login this works
    Route::view('Contact', 'pages/contact');
//when user login this works
    Route::view('Privacy', 'pages/privacy');
    Route::Post('update_team', 'TeamController@update_team_name');
//to get the page of team edit
    Route::get('edit_team', 'TeamController@edit_team')->name('edit_team');
// Billing Transition Log
    Route::resource('billing', 'BillingDetailController');
// / used for invite member
    Route::get('show', 'InvitationController@send_inviation')->name('show');
    Route::view('create-team', 'pages/create-team');
    Route::view('pricing-plan', 'pages/pricing-plan');
    Route::view('invite', 'pages/invite');

});
Route::get('test', 'ContactController@mail')->name('test');
Route::get('TaskloadData', 'TaskController@TaskloadData');

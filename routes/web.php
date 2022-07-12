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

Route::get('/', 'PageController@index');
Route::get('/logout', 'PageController@logout');

Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::name('/home')->get('/')->uses('PageController@index');
Route::get('/home', 'PageController@index');
Route::get('home', 'PageController@index');
Route::get('/house', 'PageController@house');
Route::get('/apartment', 'PageController@apartment');
Route::get('/about', 'PageController@about');
Route::get('/contactus', 'PageController@contactus');

// Route::get('/add', 'PageController@addProperty');
// Route::get('/add/house', 'PageController@addHouse');
// Route::post('/add/house', 'PropertyController@addHouse');
// Route::get('/add/apartment', 'PageController@addApartment');
// Route::post('/add/apartment', 'PropertyController@addApartment');

//testing api access
Route::get('/add/map', 'PageController@dismap');

Route::post('/house/{house}/search', 'HouseController@searchHouse');

// House Routes
Route::get('/house/serach', 'PageController@housesearch');
Route::get('/house/{house}', 'HouseController@viewHouse');
Route::post('/house/{house}', 'HouseController@searchHouse');

Route::post('/house/{house}/offer', 'OfferController@houseOffer');

//Mpesa
Route::post('/house/{house}/book', 'MpesaController@mpesaCheckout');

Route::post('/apartment/{apartment}/book', 'MpesaController@mpesaCheckout');

Route::post('/house/{house}/contactowner', 'UserEmailController@houseContact');
Route::post('/house/{house}/report', 'ReportPropertyController@houseReport');
Route::get('/house/{house}/favorite', 'FavoriteController@favoriteHouse');
Route::get('/profile/house/{house}/edit', 'HouseController@showEditHouse')->middleware('auth');
Route::get('/admin/house/{house}/edit', 'AdminController@showAdminEditHouse')->middleware('auth:admin');
Route::post('/admin/house/{house}/edit', 'HouseController@editHouse');
Route::post('/profile/house/{house}/edit', 'HouseController@editHouse');
Route::post('/profile/house/{house}/delete', 'HouseController@deleteHouse');
Route::post('/admin/house/{house}/delete', 'HouseController@deleteHouse')->middleware('auth:admin');

//Apartment Routes
Route::get('/apartment/serach', 'PageController@apartmentsearch');
Route::get('/apartment/{apartment}', 'ApartmentController@viewApartment');
Route::post('/apartment/{apartment}', 'ApartmentController@searchApartment');
Route::post('/apartment/{apartment}/offer', 'OfferController@apartmentOffer');
Route::post('/apartment/{apartment}/contactowner', 'UserEmailController@apartmentContact');
Route::post('/apartment/{apartment}/report', 'ReportPropertyController@apartmentReport');
Route::get('/apartment/{apartment}/favorite', 'FavoriteController@favoriteApartment');
Route::get('/profile/apartment/{apartment}/edit', 'ApartmentController@showEditApartment')->middleware('auth');
Route::get('/admin/apartment/{apartment}/edit', 'AdminController@showAdminEditApartment')->middleware('auth:admin');
Route::post('/admin/apartment/{apartment}/edit', 'ApartmentController@editApartment');
Route::post('/profile/apartment/{apartment}/edit', 'ApartmentController@editApartment');
Route::post('/profile/apartment/{apartment}/delete', 'ApartmentController@deleteApartment');
Route::post('/admin/apartment/{apartment}/delete', 'ApartmentController@deleteApartment')->middleware('auth:admin');

//General Route
Route::post('/sendmessage', 'MessageController@contactUsEmail');

//User Profile Section
Route::get('/profile', 'ProfileController@loadUserDashboard')->middleware('auth');
Route::get('/profile/changepassword', 'PageController@changePassword')->middleware('auth');
Route::get('/profile/editaccount', 'PageController@editAccount')->middleware('auth');
Route::get('/profile/myfavorite', 'ProfileController@viewFavorites')->middleware('auth');
Route::post('/profile/myfavorite/{favorite}/delete', 'ProfileController@deleteFavorites')->middleware('auth');
Route::get('/profile/message', 'ProfileController@myMessage')->middleware('auth');
Route::get('/profile/message/all', 'ProfileController@viewAllMessage')->middleware('auth');
Route::get('/profile/message/{message}/view', 'ProfileController@viewMessage')->middleware('auth');
Route::get('/profile/message/{message}/delete', 'ProfileController@deleteMessage')->middleware('auth');
Route::post('/profile/message/reply', 'UserEmailController@replyMessage')->middleware('auth');
Route::get('/profile/deleteaccount', 'PageController@deleteaccount')->middleware('auth');
Route::get('/profile/myhouse', 'PageController@myHouse')->middleware('auth');
Route::get('/profile/myland', 'PageController@myLand')->middleware('auth');
Route::get('/profile/myapartment', 'PageController@myApartment')->middleware('auth');
Route::get('/profile/mybuilding', 'PageController@myBuilding')->middleware('auth');
Route::get('/profile/mywarehouse', 'PageController@myWarehouse')->middleware('auth');
Route::get('/profile/alloffers', 'ProfileController@allOffers')->middleware('auth');
Route::get('/profile/myoffers', 'ProfileController@myOffers')->middleware('auth');
Route::get('/profile/offers/{offer}/contact', 'ProfileController@contactOffers')->middleware('auth');
Route::post('/profile/offers/contact/send', 'UserEmailController@contactOffersSend')->middleware('auth');
Route::get('/profile/offers/{offer}/contact/owner', 'ProfileController@contactOffersOwner')->middleware('auth');
Route::post('/profile/offers/contact/owner/send', 'UserEmailController@contactOffersOwnerSend')->middleware('auth');
Route::get('/profile/sold', 'ProfileController@showMarkSold')->middleware('auth');
Route::get('/profile/sold/{property}/marksold', 'ProfileController@markSold')->middleware('auth');
Route::get('/profile/sold/{property}/markunsold', 'ProfileController@markUnsold')->middleware('auth');
Route::post('/profile/updateavatar', 'ProfileController@updateAvatar')->middleware('auth');
Route::post('/profile/user/{user}/delete', 'ProfileController@deleteUserAccount')->middleware('auth');
Route::post('/profile/updateAccount', 'ProfileController@updateAccount')->middleware('auth');
Route::post('/profile/updatepassword', 'ProfileController@changePassword')->middleware('auth');

//Admin Panel
Route::post('/admin/updateavatar', 'AdminController@updateAvatar')->middleware('auth:admin');
Route::get('/admin/user/{user}/view', 'AdminController@viewUser')->middleware('auth:admin');
Route::get('/admin/property/all', 'AdminController@viewAllProperty')->middleware('auth:admin');
Route::get('/admin/property/house', 'AdminController@viewAllHouse')->middleware('auth:admin');
Route::get('/admin/property/land', 'AdminController@viewAllLand')->middleware('auth:admin');
Route::get('/admin/property/building', 'AdminController@viewAllBuilding')->middleware('auth:admin');
Route::get('/admin/property/apartment', 'AdminController@viewAllApartment')->middleware('auth:admin');
Route::get('/admin/property/warehouse', 'AdminController@viewAllWarehouse')->middleware('auth:admin');
Route::get('/admin/user/all', 'AdminController@viewAllUsers')->middleware('auth:admin');
Route::get('/admin/user/{user}/contact', 'AdminController@adminContactUser')->middleware('auth:admin');
Route::post('/admin/user/contact', 'AdminController@adminContactUserSend')->middleware('auth:admin');
Route::get('/admin/user/{user}/edit', 'AdminController@showAdminEditUser')->middleware('auth:admin');
Route::post('/admin/user/edit', 'AdminController@adminEditUser')->middleware('auth:admin');
Route::post('/admin/user/{user}/delete', 'AdminController@adminDeleteUser')->middleware('auth:admin');
Route::get('/admin/user/add', 'AdminController@showAdminAddUser')->middleware('auth:admin');
Route::post('/admin/user/add', 'AdminController@adminAddUser')->middleware('auth:admin');

//Admin Add Property
Route::get('/admin/addproperty', 'PageController@addProperty')->middleware('auth:admin');
Route::get('admin/add/house', 'PageController@addHouse')->middleware('auth:admin');
Route::post('admin/add/house', 'PropertyController@addHouse')->middleware('auth:admin');
Route::get('admin/add/apartment', 'PageController@addApartment')->middleware('auth:admin');
Route::post('admin/add/apartment', 'PropertyController@addApartment')->middleware('auth:admin');

//Admin view Property
//Route::get('/admin/property/house', 'HouseController@viewHouse')->middleware('auth:admin');
Route::get('/admin/house/{house}', 'HouseController@viewHouse')->middleware('auth:admin');

Route::get('/admin/admin/all', 'AdminController@viewAllAdmin')->middleware('auth:admin');
Route::get('/admin/admin/add', 'AdminController@showAdminAddAdmin')->middleware('auth:admin');
Route::post('/admin/admin/add', 'AdminController@adminAddAdmin')->middleware('auth:admin');
Route::get('/admin/admin/{admin}/edit', 'AdminController@showAdminEditAdmin')->middleware('auth:admin');
Route::post('/admin/admin/edit', 'AdminController@adminEditAdmin')->middleware('auth:admin');
Route::post('/admin/admin/{admin}/delete', 'AdminController@adminDeleterAdmin')->middleware('auth:admin');
Route::get('/admin/report', 'AdminController@viewReports')->middleware('auth:admin');
Route::post('/admin/report/{property}/lock', 'AdminController@lockProperty')->middleware('auth:admin');
Route::post('/admin/report/{property}/unlock', 'AdminController@unlockProperty')->middleware('auth:admin');
Route::get('/admin/articles', 'AdminController@allArticles')->middleware('auth:admin');
Route::post('/admin/blog/{article}/delete', 'AdminController@deleteArticle')->middleware('auth:admin');
Route::get('/admin/inquery/view', 'AdminController@allInquery')->middleware('auth:admin');
Route::get('/admin/inquery/{message}/reply', 'AdminController@viewReplyInquery')->middleware('auth:admin');
Route::post('/admin/inquery/reply', 'AdminController@replyInquery')->middleware('auth:admin');
Route::post('/admin/inquery/{message}/delete', 'AdminController@deleteInquey')->middleware('auth:admin');

//Book House
// Route::post('/apartment/{apartment}/book', 'BookController@bookApartment');
// Route::post('/apartment/{house}/book', 'BookController@bookHouse');

// Auth::routes();
Auth::routes(['verify' => true]);

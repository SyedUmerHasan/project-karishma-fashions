<?php

use PhpParser\JsonDecoder;

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

// Authentication page Routes
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::post('admin/logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('admin/register', 'Auth\RegisterController@register');

    // Password Reset Routes...
Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');

// Notification
Route::get('/notification/MarkAllAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('MarkAllAsRead');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/home', 'AdminController@index')->name('home');
    Route::get('/admin', 'AdminController@index')->name('home');
    Route::get('/admin/settings', 'AdminController@settings')->name('settings');
    Route::get('/admin/checkpassword', 'AdminController@checkpassword')->name('checkpassword');
    Route::match(['get', 'post'], '/admin/updateusername', 'AdminController@updateusername')->name('updateusername');
    Route::match(['get', 'post'], '/admin/updatepassword', 'AdminController@updatepassword')->name('updatepassword');
});
Route::get('admin/CreateProducts', 'ProductAdminController@CreateProducts')->name('admin.CreateProducts');
Route::post('admin/AddProducts', 'ProductAdminController@AddProducts')->name('admin.AddProducts');
Route::get('admin/EditProduct/{ProductId}', 'ProductAdminController@EditProduct')->name('admin.EditProduct');
Route::get('admin/ListProducts', 'ProductAdminController@ListProducts');
// Route::get('admin/ListProducts/GetListProducts', 'ProductAdminController@GetListProducts')->name('GetListProducts');

// Route::match(['get', 'post'], '/admin/upload', 'ProductAdminController@image_upload')->name('image_upload');


// Ecommerce Pages
Route::get('/', function(){
    return view('welcome');
})->name('home');

Route::get('/products', 'ProductController@showproducts')->name('showproducts');


Route::get('image/upload', 'ProductController@fileCreate');
Route::post('image/upload/store', 'ProductController@fileStore');
Route::post('image/delete', 'ProductController@fileDestroy');
Route::post('image/getproductimages', 'ProductController@GetProductsImages');
Route::get('/admin/GetContactList', [
    'as' => 'GetListProducts',
    'uses' => function () {
        $users = App\Contacts::select('contact_name', 'contact_city', 'contact_province', 'contact_number1', 'contact_number2', 'contact_address')->get();
        return json_decode(Datatables::of($users)->make());
    }
]);
Route::get('/admin/ContactList', 'ContactsController@index')->name('ContactList');
Route::get('/admin/CreateContacts', 'ContactsController@CreateContacts')->name('CreateContacts');
Route::post('/admin/AddContacts', 'ContactsController@AddContacts')->name('AddContacts');
Route::get('/admin/EditContacts/{contactid}', 'ContactsController@EditContacts')->name('EditContacts');
Route::get('/admin/DeleteContact/{contactid}', 'ContactsController@DeleteContact')->name('DeleteContact');

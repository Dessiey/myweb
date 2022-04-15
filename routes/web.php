<?php
use App\Http\Controllers\webhome\HomeController;
use App\Http\Controllers\webhome\RequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;



Route::get('importExportView', [ExcelController::class, 'importExportView'])->name('importExportView');
// Route for export/download tabledata to .csv, .xls or .xlsx
Route::get('exportExcel/{type}', [ExcelController::class, 'exportExcel'])->name('exportExcel');
// Route for import excel data to database.
Route::post('importExcel', [ExcelController::class, 'importExcel'])->name('importExcel');

// Route::get('/', function () {
//     return view('frontend/index'); 
// });
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::redirect('/login', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);
Route::get('facilities', [HomeController::class, 'facilities'])->name('facilities');
Route::get('researches', [HomeController::class, 'researches'])->name('researches');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contactus', [HomeController::class, 'contactus'])->name('contactus');
Route::get('conferences', [HomeController::class, 'conferences'])->name('conferences');
Route::get('trainings', [HomeController::class, 'trainings'])->name('trainings');
Route::post('storecontact', [HomeController::class, 'storecontact'])->name('storecontact');

Route::get('webhome', [HomeController::class, 'webhome'])->name('webhome');
// Route::get('aboutweb', [HomeController::class, 'aboutweb'])->name('aboutweb');
Route::get('signup', [HomeController::class, 'signup'])->name('signup');
Route::get('createrequest', [RequestController::class, 'createrequest'])->name('createrequest');
Route::post('storeapprequest', [RequestController::class, 'storeapprequest'])->name('storeapprequest');
Route::post('storeuser', [HomeController::class, 'storeuser'])->name('storeuser');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    
    
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::get('user/deactivate/{id}', 'UsersController@deactivateUser')->name('user.deactivate');
    Route::get('user/printit/{id}', 'UsersController@printit')->name('user.printit');
    Route::get('users/usermanual', 'UsersController@usermanual')->name('users.usermanual');

    Route::resource('users', 'UsersController');
    Route::resource('contactus', 'ContactusController');
    Route::delete('contactus/destroy', 'ContactusController@massDestroy')->name('contactus.massDestroy');

   
    
     
// Supporters
Route::delete('supporters/destroy', 'SupportersController@massDestroy')->name('supporters.massDestroy');
//Route::post('supporters/media', 'SupportersController@storeMedia')->name('supporters.storeMedia');

Route::get('supporters/print/{id}', 'SupportersController@printcert')->name('supporters.printcert');
// Route::get('supporters/create/{id}', 'SupportersController@create')->name('supporters.create');
Route::resource('supporters', 'SupportersController');



 
    Route::delete('abouts/destroy', 'AboutsController@massDestroy')->name('abouts.massDestroy');
    Route::resource('abouts', 'AboutsController');
   
    Route::delete('facilities/destroy', 'FacilitiesController@massDestroy')->name('facilities.massDestroy');
    Route::resource('facilities', 'FacilitiesController');

   

    Route::delete('teams/destroy', 'TeamsController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamsController');

    Route::resource('publications', 'PublicationsController');
   Route::delete('publications/destroy', 'PublicationsController@massDestroy')->name('publications.massDestroy');
 

    Route::delete('items/destroy', 'itemsController@massDestroy')->name('items.massDestroy');
    Route::resource('items', 'itemsController');
   
    //  Route::get('user-activity', 'UserActivityController@useractivity')->name('user-activity');
});


// Route::get('/print', function () {
//     return redirect('admin/certificates/TempoCert');
// });

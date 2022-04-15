<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Services
    Route::apiResource('services', 'ServicesApiController');

    // OtherCertificates
    Route::post('othercertificates/media', 'OtherCertificatesApiController@storeMedia')->name('othercertificates.storeMedia');
    Route::apiResource('othercertificates', 'OtherCertificatesApiController');
// Tempodegreechains
Route::post('tempodegreechains/media', 'TempodegreechainsApiController@storeMedia')->name('tempodegreechains.storeMedia');
Route::apiResource('tempodegreechains', 'TempodegreechainsApiController');

    // items
    Route::apiResource('items', 'itemsApiController');

    // certificates
    Route::apiResource('certificates', 'certificatesApiController');
});

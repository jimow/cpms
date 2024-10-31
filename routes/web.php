<?php

//Route::view('/', 'welcome');
Route::get('/', [YourController::class, 'index']);

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::post('projects/parse-csv-import', 'ProjectsController@parseCsvImport')->name('projects.parseCsvImport');
    Route::post('projects/process-csv-import', 'ProjectsController@processCsvImport')->name('projects.processCsvImport');
    Route::resource('projects', 'ProjectsController');

    // County
    Route::delete('counties/destroy', 'CountyController@massDestroy')->name('counties.massDestroy');
    Route::post('counties/parse-csv-import', 'CountyController@parseCsvImport')->name('counties.parseCsvImport');
    Route::post('counties/process-csv-import', 'CountyController@processCsvImport')->name('counties.processCsvImport');
    Route::resource('counties', 'CountyController');

    // Sub County
    Route::delete('sub-counties/destroy', 'SubCountyController@massDestroy')->name('sub-counties.massDestroy');
    Route::post('sub-counties/parse-csv-import', 'SubCountyController@parseCsvImport')->name('sub-counties.parseCsvImport');
    Route::post('sub-counties/process-csv-import', 'SubCountyController@processCsvImport')->name('sub-counties.processCsvImport');
    Route::resource('sub-counties', 'SubCountyController');

    // Ward
    Route::delete('wards/destroy', 'WardController@massDestroy')->name('wards.massDestroy');
    Route::post('wards/parse-csv-import', 'WardController@parseCsvImport')->name('wards.parseCsvImport');
    Route::post('wards/process-csv-import', 'WardController@processCsvImport')->name('wards.processCsvImport');
    Route::resource('wards', 'WardController');

    // Ministry
    Route::delete('ministries/destroy', 'MinistryController@massDestroy')->name('ministries.massDestroy');
    Route::post('ministries/parse-csv-import', 'MinistryController@parseCsvImport')->name('ministries.parseCsvImport');
    Route::post('ministries/process-csv-import', 'MinistryController@processCsvImport')->name('ministries.processCsvImport');
    Route::resource('ministries', 'MinistryController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::post('departments/parse-csv-import', 'DepartmentController@parseCsvImport')->name('departments.parseCsvImport');
    Route::post('departments/process-csv-import', 'DepartmentController@processCsvImport')->name('departments.processCsvImport');
    Route::resource('departments', 'DepartmentController');

    // Financial Year
    Route::delete('financial-years/destroy', 'FinancialYearController@massDestroy')->name('financial-years.massDestroy');
    Route::post('financial-years/parse-csv-import', 'FinancialYearController@parseCsvImport')->name('financial-years.parseCsvImport');
    Route::post('financial-years/process-csv-import', 'FinancialYearController@processCsvImport')->name('financial-years.processCsvImport');
    Route::resource('financial-years', 'FinancialYearController');

    // Feedback
    Route::delete('feedbacks/destroy', 'FeedbackController@massDestroy')->name('feedbacks.massDestroy');
    Route::post('feedbacks/media', 'FeedbackController@storeMedia')->name('feedbacks.storeMedia');
    Route::post('feedbacks/ckmedia', 'FeedbackController@storeCKEditorImages')->name('feedbacks.storeCKEditorImages');
    Route::post('feedbacks/parse-csv-import', 'FeedbackController@parseCsvImport')->name('feedbacks.parseCsvImport');
    Route::post('feedbacks/process-csv-import', 'FeedbackController@processCsvImport')->name('feedbacks.processCsvImport');
    Route::resource('feedbacks', 'FeedbackController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {
   // Route::get('/', [HomeController::class, 'index']);

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'ProjectsController@index');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    //Route::resource('projects', 'ProjectsController');
    Route::resource('projects', 'ProjectsController')->only(['index', 'show']);

    // County
    Route::delete('counties/destroy', 'CountyController@massDestroy')->name('counties.massDestroy');
    Route::resource('counties', 'CountyController');

    // Sub County
    Route::delete('sub-counties/destroy', 'SubCountyController@massDestroy')->name('sub-counties.massDestroy');
    Route::resource('sub-counties', 'SubCountyController');

    // Ward
    Route::delete('wards/destroy', 'WardController@massDestroy')->name('wards.massDestroy');
    Route::resource('wards', 'WardController');

    // Ministry
    Route::delete('ministries/destroy', 'MinistryController@massDestroy')->name('ministries.massDestroy');
    Route::resource('ministries', 'MinistryController');

    // Department
    Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
    Route::resource('departments', 'DepartmentController');

    // Financial Year
    Route::delete('financial-years/destroy', 'FinancialYearController@massDestroy')->name('financial-years.massDestroy');
    Route::resource('financial-years', 'FinancialYearController');

    // Feedback
    Route::delete('feedbacks/destroy', 'FeedbackController@massDestroy')->name('feedbacks.massDestroy');
    Route::post('feedbacks/media', 'FeedbackController@storeMedia')->name('feedbacks.storeMedia');
    Route::post('feedbacks/ckmedia', 'FeedbackController@storeCKEditorImages')->name('feedbacks.storeCKEditorImages');
    Route::resource('feedbacks', 'FeedbackController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});

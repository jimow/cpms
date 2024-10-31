<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Projects
    Route::post('projects/media', 'ProjectsApiController@storeMedia')->name('projects.storeMedia');
    Route::apiResource('projects', 'ProjectsApiController');

    // County
    Route::apiResource('counties', 'CountyApiController');

    // Sub County
    Route::apiResource('sub-counties', 'SubCountyApiController');

    // Ward
    Route::apiResource('wards', 'WardApiController');

    // Ministry
    Route::apiResource('ministries', 'MinistryApiController');

    // Department
    Route::apiResource('departments', 'DepartmentApiController');

    // Financial Year
    Route::apiResource('financial-years', 'FinancialYearApiController');

    // Feedback
    Route::post('feedbacks/media', 'FeedbackApiController@storeMedia')->name('feedbacks.storeMedia');
    Route::apiResource('feedbacks', 'FeedbackApiController');
});

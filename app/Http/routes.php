<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

get('test',function(){
    //

});

// Authentication routes...
get('auth/login', 'Auth\AuthController@getLogin');

post('auth/login', 'Auth\AuthController@postLogin');

Route::group(['middleware' => 'guest'], function () {
    get('admissions/apply', 'AdmissionsController@create');
    post('admissions/apply', 'AdmissionsController@store');
});
Route::group(['middleware' => 'auth'], function () {

    get('/auth/logout', 'Auth\AuthController@getLogout');
    //Change Password
    Route::match(['get', 'post'],'/auth/change-password', ['uses'=>'Auth\PasswordController@ChangePassword']);


    //profile
    Route::match(['get', 'post'],'/me', ['uses'=>'UserController@me']);
    Route::match(['get', 'post'],'/application', ['uses'=>'UserController@leaveApplication']);

    //Static Pages
    get('employment/policy',['uses'=>'PagesController@employment_policy','as'=>'employment_policy']);




    //Admin Routes
    get('/',['as'=>'home','uses'=>'HomeController@home']);
    get('/home', 'HomeController@home');


    //teammates
    resource('teammates','TeammatesController',['except' => ['show', 'destroy']]);

    //Group teammates actions
    Route::group(['prefix' => 'teammates'], function()
    {
        resource('payroll','PayrollController',['only' => ['edit', 'update']]);
        resource('{teammate}/leaves' ,'LeavesController', ['only' => ['index', 'create','store']]);
        resource('{teammate}/increments' ,'IncrementsController', ['only' => ['index', 'create','store']]);
    });


    //Approvals
    Route::group(['prefix' => 'approval'], function()
    {
        post('leaves/{leave}' ,['as'=>'approval.leaves.{leave}','uses'=>'LeavesController@approve']);

    });

});







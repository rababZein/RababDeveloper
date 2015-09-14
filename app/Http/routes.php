<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('home');
// });

Route::get('/charts', function()
{
	return View::make('mcharts');
});

Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});

// Route::get('/login', function()
// {
// 	return View::make('login');
// });

Route::get('/documentation', function()
{
	return View::make('documentation');
});


/*********************************Route*******************/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('/', 'HomeController@index');

Route::get('/users/listregular','UsersController@listallregular');

Route::get('/users/listadmin','UsersController@listalladmin');

Route::get('/users/listallsuperadmin','UsersController@listallsuperadmin');

Route::resource('/users','UsersController');

Route::resource('/spots','SpotsController');

Route::resource('/interests','InterestsController');

Route::resource('/activities','ActivitiesController');

Route::resource('/industries','IndustriesController');

Route::resource('/generalinfos','GeneralinfosController');

Route::resource('/professionalinfos','ProfessionalinfosController');

Route::get('/companies/createcompanybyadmin','CompaniesController@createcompanybyadmin');

Route::post('/companies/storecompanybyadmin','CompaniesController@storecompanybyadmin');

Route::resource('/companies','CompaniesController');

Route::get('companies/listallexhibitorsofCompany/{id}','CompaniesController@listallexhibitorsofCompany');

Route::get('/exhibitors/createexhibitorbyadmin','ExhibitorsController@createexhibitorbyadmin');

Route::post('/exhibitors/storeexhibitorbyadmin','ExhibitorsController@storeexhibitorbyadmin');

Route::resource('/exhibitors','ExhibitorsController');

Route::resource('/halls','HallsController');

Route::resource('/modeldesigns','ModeldesignsController');

Route::resource('/types','TypesController');

Route::resource('/booths','BoothsController');

Route::resource('/exhibitions','ExhibitionsController');

Route::resource('/exhibitionevents','ExhibitioneventsController');

Route::resource('/seriesevents','SeriesEventsController');

Route::resource('/events','EventsController');

Route::resource('/rooms','RoomsController');

Route::resource('/sections','SectionsController');

Route::resource('/filestorage','FilesController');
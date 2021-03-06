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

Route::post('/home/outFromSystem','HomeController@outFromSystem');


Route::get('/', 'HomeController@index');

Route::post('users/ajaxsearchForloginhistory','UsersController@ajaxsearchForloginhistory');

Route::get('/users/loginhistoryforall','UsersController@loginhistoryforall');

Route::get('users/loginhistory/{id}','UsersController@loginhistory');

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

Route::get('/companies/listboothsofcompanyinthisevent/{id}','CompaniesController@listboothsofcompanyinthisevent');

Route::get('/companies/showexhibitorsofcompanybyuserid/{id}','CompaniesController@showexhibitorsofcompanybyuserid');

Route::get('/companies/showprofile/{id}','CompaniesController@showprofile');

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

Route::post('/booths/showboothAjax','BoothsController@showboothAjax');

Route::get('/booths/boothsreport','BoothsController@boothsreport');

Route::get('/booths/bookBooth/{id}','BoothsController@bookBooth');

Route::resource('/booths','BoothsController');

Route::resource('/exhibitions','ExhibitionsController');

Route::get('/exhibitionevents/eventsreport','ExhibitioneventsController@eventsreport');

Route::get('/exhibitionevents/listbooths/{id}','ExhibitioneventsController@listbooths');

Route::resource('/exhibitionevents','ExhibitioneventsController');

Route::resource('/seriesevents','SeriesEventsController');

Route::resource('/events','EventsController');

Route::resource('/rooms','RoomsController');

Route::resource('/sections','SectionsController');

Route::resource('/filestorage','FilesController');

Route::resource('/userfiles','UserFilesController');

Route::post('/systemtracks/emailAutocomplete','SystemtracksController@emailAutocomplete');

Route::post('/systemtracks/ajaxSearchForUserHistory','SystemtracksController@ajaxSearchForUserHistory');

Route::get('/systemtracks/userhistory/{id}','SystemtracksController@userhistory');

Route::get('/systemtracks/alluserhistory','SystemtracksController@alluserhistory');

Route::get('/systemtracks/exhibitionevent','SystemtracksController@exhibitionevent');

Route::get('/systemtracks/booth','SystemtracksController@booth');
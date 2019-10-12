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
Auth::routes();
Route::view('/', 'Front/welcome');
Route::view('/profils','Front/profils', [
	'etudiants'=> App\user::where('role',NULL)->get(),
	'count'=> App\user::where('role',NULL)->count(),
]);
Route::get('search','FrontController@search');


Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/home','HomeController@index')->name('home');

	Route::view('myaccount','myaccount.index');
	Route::get('myaccount/profile','FrontController@index');
	Route::get('myaccount/profile/{link}',function($link){
		return view('myaccount.profile.index', ['link' => $link]);
	});
	Route::get('myaccount/{link}',function($link){
		return view('myaccount.index', ['link' => $link]);
	});


	Route::post('saveFormation','FrontController@saveFormation');
	Route::post('saveExperience','FrontController@saveExperience');
	Route::post('saveCompetence','FrontController@saveCompetence');
	Route::post('saveLangue','FrontController@saveLangue');
	Route::post('saveAdresse','FrontController@saveAdresse');
	Route::delete('deleteFormation/{id}','FrontController@deleteFormation');
	Route::delete('deleteLangue/{id}','FrontController@deleteLangue');
	Route::delete('deleteExperience/{id}','FrontController@deleteExperience');
	Route::delete('deleteCompetence/{id}','FrontController@deleteCompetence');

	Route::get('editFormation/{id}', function($id){
        return view('myaccount.profile#formations', [
			'data' => DB::table('formation')->here('id',$id)->get(),
			
        ]);
    });

	
	

	//start inbox
  Route::view('/myaccount/inbox','myaccount.inbox', [
    'data' => App\inbox::where('user_id',3)->get()
    ]);
});

//admin
Route::group(['prefix' => 'admin', 'middleware'=> ['auth' => 'admin']], function(){
	Route::get('/','AdminController@index');
	Route::get('/domaines','AdminController@addDomain');
	Route::get('/addfillieres','AdminController@filieres');
	Route::delete('/deleteDomaines/{id}','AdminController@deleteDomaines');
	Route::delete('/deleteFilieres/{id}','AdminController@deleteFilieres');
	Route::post('/saveDomain','AdminController@saveDomain');
	Route::post('/saveOtherDomain','AdminController@saveOtherDomain');
	Route::view('/domains','admin.domains',[
	    	'data' => App\domains::all()
		]);
	
	Route::view('filieres', 'admin.filieres', [
		'data' => App\filieres::with('doms')->get()
		]);
	Route::get('editDomain/{id}', function($id){
		return view('admin.editDomain', [
			'data'=> App\domains::where('id',$id)->get()
		]);
	});
	Route::get('modifier-filieres/{id}', function($id){
		return view('admin.modifier-filieres', [
			'data'=> App\filieres::where('id',$id)->get()
		]);
	});
	Route::view('/count/countDomaine','admin.count.countDomaine');
});







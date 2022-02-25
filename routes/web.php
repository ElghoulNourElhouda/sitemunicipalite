<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
	if (!Auth::guest() && Auth::User()->admin) {
		return redirect ('dashboard');
	}else if (!Auth::guest() && Auth::User()->agent) {
		return redirect ('listOffres');
	}else{
		return redirect ('offres');
	}
});

// Route::get('recentposts', function () {
// 	return view('sidebar/recent');
// });


// Route::get('/infos','HomeController@infos');
// Route::get('search','SearchDataController@result');


Auth::routes();

// Route::get('search',function(){
// 	return view('articles.search');
// });

Route::get('listOffre', 'ArticlesController@self');

// Route::get('autocomplete-ajax',array('as'=>'autocomplete.ajax','uses'=>'AutoCompleteController@ajaxData'));


Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'HomeController@dash');
Route::get('/espace', 'HomeController@espace');
Route::get('/about', 'AboutController@index');

// Route::get('/contacter', 'ContactController@index');
Route::post('/contact', 'ContactController@contact');

Route::get('/nouveauOffre',function(){
	return view('offres.form');
});

Route::get('/contacter',function(){
	return view('contactUs');
});

Route::get('/manageAbout',function(){
	return view('admin.AboutPage');
});
Route::post('/AddAbout', 'AboutController@create');


// Route::get('/comments','CommentController@comments');
// Route::get('/destroy_all_comments','CommentController@destroy_all');
// Route::get('/likes','LikesController@likes');
// Route::get('/remove_all_likes','LikesController@remove_all_likes');

/*
 * Articles routes
 */
//Route::get('articles', 'ArticlesController@index');
//Route::get('articles/create', 'ArticlesController@create');
//Route::get('articles/{id}', 'ArticlesController@show');
//Route::post('articles', 'ArticlesController@store');
//Route::get('articles/{id}/edit', 'ArticlesController@edit');
//Route::patch('articles/{id}', 'ArticlesController@update');
//Route::delete('articles/{id}', 'ArticlesController@destroy');


Route::get('condidature/{id}', 'OffreController@condidature');
Route::post('postCondidature/{id}', 'OffreController@postcondidature');


Route::get('gerer_condidats', 'UsersController@condidats');
Route::get('gerer_agents', 'UsersController@agents');

Route::get('gererOffre', 'OffreController@gererOffre');


Route::get('listOffres', 'OffreController@self');
Route::get('modif_offre/{id}', 'ArticlesController@edit');
// Route::get('modif_offre',function(){
// 	return view('EspaceEntreprise.editOffre');
// });


Route::resource('offres', 'OffreController');
Route::get('offres/{id}/destroy', 'OffreController@destroy');
Route::get('blockOffre/{id}', 'OffreController@block');


// Route::get('self_articles', 'ArticlesController@self');

// Route::get('my_articles', 'ArticlesController@list');

Route::get('destroy/{id}', 'ArticlesController@destroy');

// Route::post('like_task/{id}', 'LikesController@like');



// Route::post('comment_task/{id}', 'CommentController@comment');
// Route::post('edit_comment/{id}', 'CommentController@update');
// Route::post('delete_comment/{id}', 'CommentController@destroy');
// Route::post('reply_comment/{id}', 'CommentController@reply');
// Route::post('edit_reply/{id}', 'ReplyController@edit');
// Route::post('delete_reply/{id}', 'ReplyController@destroy');

Route::post('read/{id}', 'OffreController@readNotification');
Route::get('read/{id}', 'OffreController@readNotification');

Route::get('/markAsRead',function(){
	auth()->user()->unreadNotifications->markAsRead();
});

/*
 * Datatables routes
 */
Route::get('datatable', 'ArticlesDTController@index');
// Route::get('datatable/ajaxdata', 'ArticlesDTController@getBasicData'); // getBasicData, AddEditRemoveColumn
Route::get('datatable/ajaxdata', 'ArticlesDTController@AddEditRemoveColumn');


/*
 * Datatables routes as Service
 */
Route::resource('datatable2', 'ArticlesDTSController');


/*
 * Profile routes
 */
Route::get('profile', 'ProfileController@profile');
Route::get('password', 'ProfileController@password');
Route::patch('profile', 'ProfileController@update');
Route::patch('profile/change_password', 'ProfileController@change_password');


/*
 * Settings routes
 */
Route::get('settings', 'SettingsController@index');

/*
 * Users routes
 */
Route::get('users', 'UsersController@index');
Route::get('condidats', 'UsersController@condidats');
Route::get('agents', 'UsersController@agents');
Route::get('users/create', 'UsersController@create');
Route::get('users/{id}', 'UsersController@show');
Route::post('users', 'UsersController@store');
Route::get('users/{id}/edit', 'UsersController@edit');
Route::get('block/{id}', 'UsersController@block');

Route::patch('users/{id}', 'UsersController@update');

Route::delete('users/{id}', 'UsersController@destroy');


Route::get('users/{id}/reset_password', 'UsersController@reset_password');
Route::patch('users/{id}/reset_password', 'UsersController@update_password');
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
// use App\Notifications\SubscriptionRenewalFailed;
use Illuminate\Http\Request;
Route::get('/',function(Request $request){
	// session(['name' => 'Abc']);
	// $request->session()->put('foo','baz');
	return $request->session()->get('foo');
	return view('welcome');
	// $user = App\User::first();
	// $user->notify(new SubscriptionRenewalFailed);
	// return 'Done';
});

Route::get('/projects','PagesController@index');
Route::resource('projects','PagesController')->middleware('can:update,project');
Route::post('/projects/{project}/tasks','ProjectTasksController@store');
Route::patch('/tasks/{task}','ProjectTasksController@update');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

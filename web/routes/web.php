<?php

use App\Http\Controllers\Blog\Admin\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function(){
    Route::resource('posts', 'PostController')->names('blog.posts');
});

$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog'
];

Route::group($groupData, function(){
    //BlogCategory
    $methods = ['index', 'edit', 'update', 'create', 'store'];
    Route::resource('categories', 'CategoryController')
    ->only($methods)
    ->names('blog.admin.categories');

    //BlogPost
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.admin.posts');

    Route::get('posts/restore', 'PostController@restore')->name('blog.admin.posts.restore');
});


Route::get('collections', 'DiggingDeeperController@collections');

Route::prefix('fundamendals')->group( function() {
    Route::get('property-container', 'FundamentalPatternsController@PropertyContainer');
    Route::get('delegation', 'FundamentalPatternsController@Delegation');
});
//Route::resource('rest', 'RestTestController')->names('restTest');

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

/* Authentication Routes */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/* Public Routes */
Route::get('/', [
    'uses' => 'PublicController@index', 
    'as' => '/'
]);

/* Admin Routes */
Route::group(['prefix'=>'admin', 'namespace'=>'Admin','middleware'=>['auth','admin']], function(){
    Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');

    /*   Tag Routes   */
    Route::get('/tag/manage-tag', [
        'uses' => 'TagController@manageTag',
        'as' => 'manage-tag'
    ]);
    Route::get('/tag/add-tag', [
        'uses' => 'TagController@addTag',
        'as' => 'add-tag'
    ]);
    Route::post('/tag/new-tag', [
        'uses' => 'TagController@newTag',
        'as' => 'new-tag'
    ]);
    Route::get('/tag/unpublish-tag/{id}', [
        'uses' => 'TagController@unpublishTag',
        'as' => 'unpublish-tag'
    ]);
    Route::get('/tag/publish-tag/{id}', [
        'uses' => 'TagController@publishTag',
        'as' => 'publish-tag'
    ]);
    Route::get('/tag/edit-tag/{id}', [
        'uses' => 'TagController@editTag',
        'as' => 'edit-tag'
    ]);
    Route::post('/tag/update-tag', [
        'uses' => 'TagController@updateTag',
        'as' => 'update-tag'
    ]);
    Route::post('/tag/delete-tag/{id}', [
        'uses' => 'TagController@deleteTag',
        'as' => 'delete-tag'
    ]);

    /* Category Routes */
    Route::get('/category/manage-category', [
        'uses' => 'CategoryController@manageCategory',
        'as' => 'manage-category'
    ]);
    Route::get('/category/add-category', [
        'uses' => 'CategoryController@addCategory',
        'as' => 'add-category'
    ]);
    Route::post('/category/new-category', [
        'uses' => 'CategoryController@newCategory',
        'as' => 'new-category'
    ]); 
    Route::get('/category/unpublish-category/{id}', [
        'uses' => 'CategoryController@unpublishCategory',
        'as' => 'unpublish-category'
    ]);
    Route::get('/category/publish-category/{id}', [
        'uses' => 'CategoryController@publishCategory',
        'as' => 'publish-category'
    ]);
    Route::get('/category/edit-category/{id}', [
        'uses' => 'CategoryController@editCategory',
        'as' => 'edit-category'
    ]);
    Route::post('/category/update-category', [
        'uses' => 'CategoryController@updateCategory',
        'as' => 'update-category'
    ]);
    Route::post('/category/delete-category/{id}', [
        'uses' => 'CategoryController@deleteCategory',
        'as' => 'delete-category'
    ]);
    
    /* Posts routing */
    Route::get('/post/manage-post', 'PostController@managePost')->name('manage-post');
    Route::get('/post/add-post', 'PostController@addPost')->name('add-post');
    Route::post('/post/new-post', 'PostController@newPost')->name('new-post');
    Route::get('/post/unpublish-post/{id}', 'PostController@unpublishPost')->name('unpublish-post');
    Route::get('/post/publish-post/{id}', 'PostController@publishPost')->name('publish-post');
    Route::get('/post/edit-post/{id}', 'PostController@editPost')->name('edit-post');
    Route::post('/post/update-post', 'PostController@updatePost')->name('update-post');
    Route::post('/post/delete-post/{id}', 'PostController@deletePost')->name('delete-post');
    Route::get('/post/details-post/{id}', 'PostController@detailsPost')->name('details-post');



});

/* Author Routes */
Route::group(['prefix'=>'author', 'namespace'=>'Author','middleware'=>['auth','author']], function(){
    Route::get('dashboard', 'AuthorController@index')->name('author.dashboard');

    /* Posts routing */
    Route::get('/post/manage-post', 'PostController@managePost')->name('manage-post');
    Route::get('/post/add-post', 'PostController@addPost')->name('add-post');
    Route::post('/post/new-post', 'PostController@newPost')->name('new-post');
    Route::get('/post/unpublish-post/{id}', 'PostController@unpublishPost')->name('unpublish-post');
    Route::get('/post/publish-post/{id}', 'PostController@publishPost')->name('publish-post');
    Route::get('/post/edit-post/{id}', 'PostController@editPost')->name('edit-post');
    Route::post('/post/update-post', 'PostController@updatePost')->name('update-post');
    Route::post('/post/delete-post/{id}', 'PostController@deletePost')->name('delete-post');
    Route::get('/post/details-post/{id}', 'PostController@detailsPost')->name('details-post');

    
});

/* User Routes */
Route::group(['prefix'=>'user', 'namespace'=>'User','middleware'=>['auth', 'user']], function(){
    Route::get('dashboard', 'UserController@index')->name('user.dashboard');
});





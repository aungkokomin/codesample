<?php

/* ================== Homepage ================== */
Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/service', 'HomeController@service');
Route::get('/company', 'HomeController@company');
Route::get('/contact', 'HomeController@contact');
Route::get('/home', 'HomeController@index');
Route::get('/post/{post}/detail', 'HomeController@post_detail');
Route::get('/post/{tag}','HomeController@categorized_posts');
Route::get('/post/{tag}/{sub}','HomeController@sub_categorized_posts');
Route::auth();

/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	
	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	
	/* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');

	/* ================== Posts ====================== */
	Route::get(config('laraadmin.adminRoute') . '/posts', 'PostController@index');
	Route::get(config('laraadmin.adminRoute') . '/posts/create','PostController@create');
	Route::post(config('laraadmin.adminRoute') . '/posts/create','PostController@store');
	Route::get(config('laraadmin.adminRoute') . '/posts/edit/{post}', 'PostController@edit');
	Route::post(config('laraadmin.adminRoute') . '/posts/edit/{post}', 'PostController@update');
	Route::get(config('laraadmin.adminRoute') . '/posts/delete/{post}', 'PostController@destroy');

	/* ================== Banner Posts ====================== */
	Route::get(config('laraadmin.adminRoute') . '/banner_posts', 'PostController@bannerpostindex');
	Route::get(config('laraadmin.adminRoute') . '/banner_posts/create','PostController@bannerpostcreate');
	Route::post(config('laraadmin.adminRoute') . '/banner_posts/create','PostController@bannerpoststore');
	Route::get(config('laraadmin.adminRoute') . '/banner_posts/edit/{banner}', 'PostController@bannerpostedit');
	Route::post(config('laraadmin.adminRoute') . '/banner_posts/edit/{banner}', 'PostController@bannerpostupdate');
	Route::get(config('laraadmin.adminRoute') . '/banner_posts/delete/{banner}', 'PostController@bannerpostdestroy');

	/* ================== Category =================== */
	
	Route::get(config('laraadmin.adminRoute') . '/categories', 'CategoryController@index');
	Route::get(config('laraadmin.adminRoute') . '/categories/create', 'CategoryController@create');
	Route::post(config('laraadmin.adminRoute') . '/categories/create', 'CategoryController@store');
	Route::get(config('laraadmin.adminRoute') . '/categories/edit/{category}', 'CategoryController@edit');
	Route::post(config('laraadmin.adminRoute') . '/categories/edit/{category}', 'CategoryController@update');
	Route::get(config('laraadmin.adminRoute') . '/categories/delete/{category}', 'CategoryController@destroy');

	/* ================== Sub Category =================== */
	
	Route::get(config('laraadmin.adminRoute') . '/sub-categories', 'SubCategoryController@index');
	Route::get(config('laraadmin.adminRoute') . '/sub-categories/create', 'SubCategoryController@create');
	Route::post(config('laraadmin.adminRoute') . '/sub-categories/create', 'SubCategoryController@store');
	Route::get(config('laraadmin.adminRoute') . '/sub-categories/edit/{sub}', 'SubCategoryController@edit');
	Route::post(config('laraadmin.adminRoute') . '/sub-categories/edit/{sub}', 'SubCategoryController@update');
	Route::get(config('laraadmin.adminRoute') . '/sub-categories/delete/{sub}', 'SubCategoryController@destroy');






});

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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



	Route::get('', 'IndexController@index')->name('index')->middleware(['redirect.to.home']);
	Route::get('index/login', 'IndexController@login')->name('login');
	
	Route::post('auth/login', 'AuthController@login')->name('auth.login');
	Route::any('auth/logout', 'AuthController@logout')->name('logout')->middleware(['auth']);

	Route::get('auth/accountcreated', 'AuthController@accountcreated')->name('accountcreated');
	Route::get('auth/accountpending', 'AuthController@accountpending')->name('accountpending');
	Route::get('auth/accountblocked', 'AuthController@accountblocked')->name('accountblocked');
	Route::get('auth/accountinactive', 'AuthController@accountinactive')->name('accountinactive');


	
	Route::get('index/register', 'AuthController@register')->name('auth.register')->middleware(['redirect.to.home']);
	Route::post('index/register', 'AuthController@register_store')->name('auth.register_store');
		
	Route::post('auth/login', 'AuthController@login')->name('auth.login');
	Route::get('auth/password/forgotpassword', 'AuthController@showForgotPassword')->name('password.forgotpassword');
	Route::post('auth/password/sendemail', 'AuthController@sendPasswordResetLink')->name('password.email');
	Route::get('auth/password/reset', 'AuthController@showResetPassword')->name('password.reset.token');
	Route::post('auth/password/resetpassword', 'AuthController@resetPassword')->name('password.resetpassword');
	Route::get('auth/password/resetcompleted', 'AuthController@passwordResetCompleted')->name('password.resetcompleted');
	Route::get('auth/password/linksent', 'AuthController@passwordResetLinkSent')->name('password.resetlinksent');
	

/**
 * All routes which requires auth
 */
Route::middleware(['auth'])->group(function () {
		
	Route::get('home', 'HomeController@index')->name('home');

	

/* routes for AssetHistory Controller */
	Route::get('assethistory', 'AssetHistoryController@index')->name('assethistory.index');
	Route::get('assethistory/index/{filter?}/{filtervalue?}', 'AssetHistoryController@index')->name('assethistory.index');	
	Route::post('assethistory/importdata', 'AssetHistoryController@importdata');	
	Route::get('assethistory/view/{rec_id}', 'AssetHistoryController@view')->name('assethistory.view');	
	Route::get('assethistory/add', 'AssetHistoryController@add')->name('assethistory.add');
	Route::post('assethistory/add', 'AssetHistoryController@store')->name('assethistory.store');
		
	Route::any('assethistory/edit/{rec_id}', 'AssetHistoryController@edit')->name('assethistory.edit');	
	Route::get('assethistory/delete/{rec_id}', 'AssetHistoryController@delete');

/* routes for Assets Controller */
	Route::get('assets', 'AssetsController@index')->name('assets.index');
	Route::get('assets/index/{filter?}/{filtervalue?}', 'AssetsController@index')->name('assets.index');	
	Route::post('assets/importdata', 'AssetsController@importdata');	
	Route::get('assets/view/{rec_id}', 'AssetsController@view')->name('assets.view');
	Route::get('assets/masterdetail/{rec_id}', 'AssetsController@masterDetail')->name('assets.masterdetail');	
	Route::get('assets/add', 'AssetsController@add')->name('assets.add');
	Route::post('assets/add', 'AssetsController@store')->name('assets.store');
		
	Route::any('assets/edit/{rec_id}', 'AssetsController@edit')->name('assets.edit');	
	Route::get('assets/delete/{rec_id}', 'AssetsController@delete');	
	Route::get('assets/addpagelist', 'AssetsController@addpagelist')->name('assets.addpagelist');
	Route::post('assets/addpagelist', 'AssetsController@addpagelist_store')->name('assets.addpagelist_store');
	

/* routes for AssetType Controller */
	Route::get('assettype', 'AssetTypeController@index')->name('assettype.index');
	Route::get('assettype/index/{filter?}/{filtervalue?}', 'AssetTypeController@index')->name('assettype.index');	
	Route::post('assettype/importdata', 'AssetTypeController@importdata');	
	Route::get('assettype/view/{rec_id}', 'AssetTypeController@view')->name('assettype.view');	
	Route::get('assettype/add', 'AssetTypeController@add')->name('assettype.add');
	Route::post('assettype/add', 'AssetTypeController@store')->name('assettype.store');
		
	Route::any('assettype/edit/{rec_id}', 'AssetTypeController@edit')->name('assettype.edit');	
	Route::get('assettype/delete/{rec_id}', 'AssetTypeController@delete');	
	Route::get('assettype/assettypeaddlist', 'AssetTypeController@assettypeaddlist');
	Route::get('assettype/assettypeaddlist/{filter?}/{filtervalue?}', 'AssetTypeController@assettypeaddlist');

/* routes for Brand Controller */
	Route::get('brand', 'BrandController@index')->name('brand.index');
	Route::get('brand/index/{filter?}/{filtervalue?}', 'BrandController@index')->name('brand.index');	
	Route::post('brand/importdata', 'BrandController@importdata');	
	Route::get('brand/view/{rec_id}', 'BrandController@view')->name('brand.view');	
	Route::get('brand/add', 'BrandController@add')->name('brand.add');
	Route::post('brand/add', 'BrandController@store')->name('brand.store');
		
	Route::any('brand/edit/{rec_id}', 'BrandController@edit')->name('brand.edit');	
	Route::get('brand/delete/{rec_id}', 'BrandController@delete');	
	Route::get('brand/addpagemodal', 'BrandController@addpagemodal')->name('brand.addpagemodal');
	Route::post('brand/addpagemodal', 'BrandController@addpagemodal_store')->name('brand.addpagemodal_store');
		
	Route::get('brand/addbrandmodalonaddasset', 'BrandController@addbrandmodalonaddasset')->name('brand.addbrandmodalonaddasset');
	Route::post('brand/addbrandmodalonaddasset', 'BrandController@addbrandmodalonaddasset_store')->name('brand.addbrandmodalonaddasset_store');
	

/* routes for BrandCategory Controller */
	Route::get('brandcategory', 'BrandCategoryController@index')->name('brandcategory.index');
	Route::get('brandcategory/index/{filter?}/{filtervalue?}', 'BrandCategoryController@index')->name('brandcategory.index');	
	Route::post('brandcategory/importdata', 'BrandCategoryController@importdata');	
	Route::get('brandcategory/view/{rec_id}', 'BrandCategoryController@view')->name('brandcategory.view');	
	Route::get('brandcategory/add', 'BrandCategoryController@add')->name('brandcategory.add');
	Route::post('brandcategory/add', 'BrandCategoryController@store')->name('brandcategory.store');
		
	Route::any('brandcategory/edit/{rec_id}', 'BrandCategoryController@edit')->name('brandcategory.edit');	
	Route::get('brandcategory/delete/{rec_id}', 'BrandCategoryController@delete');

/* routes for Building Controller */
	Route::get('building', 'BuildingController@index')->name('building.index');
	Route::get('building/index/{filter?}/{filtervalue?}', 'BuildingController@index')->name('building.index');	
	Route::post('building/importdata', 'BuildingController@importdata');	
	Route::get('building/view/{rec_id}', 'BuildingController@view')->name('building.view');	
	Route::get('building/add', 'BuildingController@add')->name('building.add');
	Route::post('building/add', 'BuildingController@store')->name('building.store');
		
	Route::any('building/edit/{rec_id}', 'BuildingController@edit')->name('building.edit');	
	Route::get('building/delete/{rec_id}', 'BuildingController@delete');

/* routes for Component Controller */
	Route::get('component', 'ComponentController@index')->name('component.index');
	Route::get('component/index/{filter?}/{filtervalue?}', 'ComponentController@index')->name('component.index');	
	Route::post('component/importdata', 'ComponentController@importdata');	
	Route::get('component/view/{rec_id}', 'ComponentController@view')->name('component.view');
	Route::get('component/masterdetail/{rec_id}', 'ComponentController@masterDetail')->name('component.masterdetail');	
	Route::get('component/add', 'ComponentController@add')->name('component.add');
	Route::post('component/add', 'ComponentController@store')->name('component.store');
		
	Route::any('component/edit/{rec_id}', 'ComponentController@edit')->name('component.edit');	
	Route::get('component/delete/{rec_id}', 'ComponentController@delete');

/* routes for ComponentAssets Controller */
	Route::get('componentassets', 'ComponentAssetsController@index')->name('componentassets.index');
	Route::get('componentassets/index/{filter?}/{filtervalue?}', 'ComponentAssetsController@index')->name('componentassets.index');	
	Route::post('componentassets/importdata', 'ComponentAssetsController@importdata');	
	Route::get('componentassets/view/{rec_id}', 'ComponentAssetsController@view')->name('componentassets.view');	
	Route::get('componentassets/add', 'ComponentAssetsController@add')->name('componentassets.add');
	Route::post('componentassets/add', 'ComponentAssetsController@store')->name('componentassets.store');
		
	Route::any('componentassets/edit/{rec_id}', 'ComponentAssetsController@edit')->name('componentassets.edit');	
	Route::get('componentassets/delete/{rec_id}', 'ComponentAssetsController@delete');

/* routes for CoreGroupPermission Controller */
	Route::get('coregrouppermission', 'CoreGroupPermissionController@index')->name('coregrouppermission.index');
	Route::get('coregrouppermission/index/{filter?}/{filtervalue?}', 'CoreGroupPermissionController@index')->name('coregrouppermission.index');	
	Route::post('coregrouppermission/importdata', 'CoreGroupPermissionController@importdata');	
	Route::get('coregrouppermission/view/{rec_id}', 'CoreGroupPermissionController@view')->name('coregrouppermission.view');	
	Route::get('coregrouppermission/add', 'CoreGroupPermissionController@add')->name('coregrouppermission.add');
	Route::post('coregrouppermission/add', 'CoreGroupPermissionController@store')->name('coregrouppermission.store');
		
	Route::any('coregrouppermission/edit/{rec_id}', 'CoreGroupPermissionController@edit')->name('coregrouppermission.edit');	
	Route::get('coregrouppermission/delete/{rec_id}', 'CoreGroupPermissionController@delete');

/* routes for CoreGroupRole Controller */
	Route::get('coregrouprole', 'CoreGroupRoleController@index')->name('coregrouprole.index');
	Route::get('coregrouprole/index/{filter?}/{filtervalue?}', 'CoreGroupRoleController@index')->name('coregrouprole.index');	
	Route::post('coregrouprole/importdata', 'CoreGroupRoleController@importdata');	
	Route::get('coregrouprole/view/{rec_id}', 'CoreGroupRoleController@view')->name('coregrouprole.view');	
	Route::get('coregrouprole/add', 'CoreGroupRoleController@add')->name('coregrouprole.add');
	Route::post('coregrouprole/add', 'CoreGroupRoleController@store')->name('coregrouprole.store');
		
	Route::any('coregrouprole/edit/{rec_id}', 'CoreGroupRoleController@edit')->name('coregrouprole.edit');	
	Route::get('coregrouprole/delete/{rec_id}', 'CoreGroupRoleController@delete');

/* routes for CoreGroups Controller */
	Route::get('coregroups', 'CoreGroupsController@index')->name('coregroups.index');
	Route::get('coregroups/index/{filter?}/{filtervalue?}', 'CoreGroupsController@index')->name('coregroups.index');	
	Route::post('coregroups/importdata', 'CoreGroupsController@importdata');	
	Route::get('coregroups/view/{rec_id}', 'CoreGroupsController@view')->name('coregroups.view');
	Route::get('coregroups/masterdetail/{rec_id}', 'CoreGroupsController@masterDetail')->name('coregroups.masterdetail');	
	Route::get('coregroups/add', 'CoreGroupsController@add')->name('coregroups.add');
	Route::post('coregroups/add', 'CoreGroupsController@store')->name('coregroups.store');
		
	Route::any('coregroups/edit/{rec_id}', 'CoreGroupsController@edit')->name('coregroups.edit');	
	Route::get('coregroups/delete/{rec_id}', 'CoreGroupsController@delete');

/* routes for CoreGroupUser Controller */
	Route::get('coregroupuser', 'CoreGroupUserController@index')->name('coregroupuser.index');
	Route::get('coregroupuser/index/{filter?}/{filtervalue?}', 'CoreGroupUserController@index')->name('coregroupuser.index');	
	Route::post('coregroupuser/importdata', 'CoreGroupUserController@importdata');	
	Route::get('coregroupuser/view/{rec_id}', 'CoreGroupUserController@view')->name('coregroupuser.view');	
	Route::get('coregroupuser/add', 'CoreGroupUserController@add')->name('coregroupuser.add');
	Route::post('coregroupuser/add', 'CoreGroupUserController@store')->name('coregroupuser.store');
		
	Route::any('coregroupuser/edit/{rec_id}', 'CoreGroupUserController@edit')->name('coregroupuser.edit');	
	Route::get('coregroupuser/delete/{rec_id}', 'CoreGroupUserController@delete');

/* routes for CorePermissions Controller */
	Route::get('corepermissions', 'CorePermissionsController@index')->name('corepermissions.index');
	Route::get('corepermissions/index/{filter?}/{filtervalue?}', 'CorePermissionsController@index')->name('corepermissions.index');	
	Route::post('corepermissions/importdata', 'CorePermissionsController@importdata');

/* routes for CoreRoles Controller */
	Route::get('coreroles', 'CoreRolesController@index')->name('coreroles.index');
	Route::get('coreroles/index/{filter?}/{filtervalue?}', 'CoreRolesController@index')->name('coreroles.index');	
	Route::post('coreroles/importdata', 'CoreRolesController@importdata');	
	Route::get('coreroles/view/{rec_id}', 'CoreRolesController@view')->name('coreroles.view');	
	Route::get('coreroles/add', 'CoreRolesController@add')->name('coreroles.add');
	Route::post('coreroles/add', 'CoreRolesController@store')->name('coreroles.store');
		
	Route::any('coreroles/edit/{rec_id}', 'CoreRolesController@edit')->name('coreroles.edit');	
	Route::get('coreroles/delete/{rec_id}', 'CoreRolesController@delete');

/* routes for CoreUsers Controller */
	Route::get('coreusers', 'CoreUsersController@index')->name('coreusers.index');
	Route::get('coreusers/index/{filter?}/{filtervalue?}', 'CoreUsersController@index')->name('coreusers.index');	
	Route::post('coreusers/importdata', 'CoreUsersController@importdata');	
	Route::get('coreusers/view/{rec_id}', 'CoreUsersController@view')->name('coreusers.view');
	Route::get('coreusers/masterdetail/{rec_id}', 'CoreUsersController@masterDetail')->name('coreusers.masterdetail');	
	Route::any('account/edit', 'AccountController@edit')->name('account.edit');	
	Route::get('account', 'AccountController@index');	
	Route::post('account/changepassword', 'AccountController@changepassword')->name('account.changepassword');	
	Route::get('coreusers/add', 'CoreUsersController@add')->name('coreusers.add');
	Route::post('coreusers/add', 'CoreUsersController@store')->name('coreusers.store');
		
	Route::any('coreusers/edit/{rec_id}', 'CoreUsersController@edit')->name('coreusers.edit');	
	Route::get('coreusers/delete/{rec_id}', 'CoreUsersController@delete');

/* routes for Department Controller */
	Route::get('department', 'DepartmentController@index')->name('department.index');
	Route::get('department/index/{filter?}/{filtervalue?}', 'DepartmentController@index')->name('department.index');	
	Route::post('department/importdata', 'DepartmentController@importdata');	
	Route::get('department/view/{rec_id}', 'DepartmentController@view')->name('department.view');	
	Route::get('department/add', 'DepartmentController@add')->name('department.add');
	Route::post('department/add', 'DepartmentController@store')->name('department.store');
		
	Route::any('department/edit/{rec_id}', 'DepartmentController@edit')->name('department.edit');	
	Route::get('department/delete/{rec_id}', 'DepartmentController@delete');

/* routes for Employees Controller */
	Route::get('employees', 'EmployeesController@index')->name('employees.index');
	Route::get('employees/index/{filter?}/{filtervalue?}', 'EmployeesController@index')->name('employees.index');	
	Route::post('employees/importdata', 'EmployeesController@importdata');	
	Route::get('employees/view/{rec_id}', 'EmployeesController@view')->name('employees.view');	
	Route::get('employees/add', 'EmployeesController@add')->name('employees.add');
	Route::post('employees/add', 'EmployeesController@store')->name('employees.store');
		
	Route::any('employees/edit/{rec_id}', 'EmployeesController@edit')->name('employees.edit');	
	Route::get('employees/delete/{rec_id}', 'EmployeesController@delete');

/* routes for Institution Controller */
	Route::get('institution', 'InstitutionController@index')->name('institution.index');
	Route::get('institution/index/{filter?}/{filtervalue?}', 'InstitutionController@index')->name('institution.index');	
	Route::post('institution/importdata', 'InstitutionController@importdata');	
	Route::get('institution/view/{rec_id}', 'InstitutionController@view')->name('institution.view');	
	Route::get('institution/add', 'InstitutionController@add')->name('institution.add');
	Route::post('institution/add', 'InstitutionController@store')->name('institution.store');
		
	Route::any('institution/edit/{rec_id}', 'InstitutionController@edit')->name('institution.edit');	
	Route::get('institution/delete/{rec_id}', 'InstitutionController@delete');

/* routes for Location Controller */
	Route::get('location', 'LocationController@index')->name('location.index');
	Route::get('location/index/{filter?}/{filtervalue?}', 'LocationController@index')->name('location.index');	
	Route::post('location/importdata', 'LocationController@importdata');	
	Route::get('location/view/{rec_id}', 'LocationController@view')->name('location.view');	
	Route::get('location/add', 'LocationController@add')->name('location.add');
	Route::post('location/add', 'LocationController@store')->name('location.store');
		
	Route::any('location/edit/{rec_id}', 'LocationController@edit')->name('location.edit');	
	Route::get('location/delete/{rec_id}', 'LocationController@delete');

/* routes for Maintenance Controller */
	Route::get('maintenance', 'MaintenanceController@index')->name('maintenance.index');
	Route::get('maintenance/index/{filter?}/{filtervalue?}', 'MaintenanceController@index')->name('maintenance.index');	
	Route::post('maintenance/importdata', 'MaintenanceController@importdata');	
	Route::get('maintenance/view/{rec_id}', 'MaintenanceController@view')->name('maintenance.view');	
	Route::get('maintenance/add', 'MaintenanceController@add')->name('maintenance.add');
	Route::post('maintenance/add', 'MaintenanceController@store')->name('maintenance.store');
		
	Route::any('maintenance/edit/{rec_id}', 'MaintenanceController@edit')->name('maintenance.edit');	
	Route::get('maintenance/delete/{rec_id}', 'MaintenanceController@delete');

/* routes for Room Controller */
	Route::get('room', 'RoomController@index')->name('room.index');
	Route::get('room/index/{filter?}/{filtervalue?}', 'RoomController@index')->name('room.index');	
	Route::post('room/importdata', 'RoomController@importdata');	
	Route::get('room/view/{rec_id}', 'RoomController@view')->name('room.view');	
	Route::get('room/add', 'RoomController@add')->name('room.add');
	Route::post('room/add', 'RoomController@store')->name('room.store');
		
	Route::any('room/edit/{rec_id}', 'RoomController@edit')->name('room.edit');	
	Route::get('room/delete/{rec_id}', 'RoomController@delete');

/* routes for Settings Controller */
	Route::get('settings', 'SettingsController@index')->name('settings.index');
	Route::get('settings/index/{filter?}/{filtervalue?}', 'SettingsController@index')->name('settings.index');	
	Route::post('settings/importdata', 'SettingsController@importdata');	
	Route::get('settings/view/{rec_id}', 'SettingsController@view')->name('settings.view');	
	Route::get('settings/add', 'SettingsController@add')->name('settings.add');
	Route::post('settings/add', 'SettingsController@store')->name('settings.store');
		
	Route::any('settings/edit/{rec_id}', 'SettingsController@edit')->name('settings.edit');	
	Route::get('settings/delete/{rec_id}', 'SettingsController@delete');

/* routes for Supplier Controller */
	Route::get('supplier', 'SupplierController@index')->name('supplier.index');
	Route::get('supplier/index/{filter?}/{filtervalue?}', 'SupplierController@index')->name('supplier.index');	
	Route::post('supplier/importdata', 'SupplierController@importdata');	
	Route::get('supplier/view/{rec_id}', 'SupplierController@view')->name('supplier.view');	
	Route::get('supplier/add', 'SupplierController@add')->name('supplier.add');
	Route::post('supplier/add', 'SupplierController@store')->name('supplier.store');
		
	Route::any('supplier/edit/{rec_id}', 'SupplierController@edit')->name('supplier.edit');	
	Route::get('supplier/delete/{rec_id}', 'SupplierController@delete');

/* routes for Users Controller */
	Route::get('users', 'UsersController@index')->name('users.index');
	Route::get('users/index/{filter?}/{filtervalue?}', 'UsersController@index')->name('users.index');	
	Route::post('users/importdata', 'UsersController@importdata');	
	Route::get('users/view/{rec_id}', 'UsersController@view')->name('users.view');	
	Route::get('users/add', 'UsersController@add')->name('users.add');
	Route::post('users/add', 'UsersController@store')->name('users.store');
		
	Route::any('users/edit/{rec_id}', 'UsersController@edit')->name('users.edit');	
	Route::get('users/delete/{rec_id}', 'UsersController@delete');

/* routes for Migrations Controller */
	Route::get('migrations', 'MigrationsController@index')->name('migrations.index');
	Route::get('migrations/index/{filter?}/{filtervalue?}', 'MigrationsController@index')->name('migrations.index');	
	Route::post('migrations/importdata', 'MigrationsController@importdata');

/* routes for PersonalAccessTokens Controller */
	Route::get('personalaccesstokens', 'PersonalAccessTokensController@index')->name('personalaccesstokens.index');
	Route::get('personalaccesstokens/index/{filter?}/{filtervalue?}', 'PersonalAccessTokensController@index')->name('personalaccesstokens.index');	
	Route::post('personalaccesstokens/importdata', 'PersonalAccessTokensController@importdata');

/* routes for PasswordResetTokens Controller */
	Route::get('passwordresettokens', 'PasswordResetTokensController@index')->name('passwordresettokens.index');
	Route::get('passwordresettokens/index/{filter?}/{filtervalue?}', 'PasswordResetTokensController@index')->name('passwordresettokens.index');	
	Route::post('passwordresettokens/importdata', 'PasswordResetTokensController@importdata');

/* routes for FailedJobs Controller */
	Route::get('failedjobs', 'FailedJobsController@index')->name('failedjobs.index');
	Route::get('failedjobs/index/{filter?}/{filtervalue?}', 'FailedJobsController@index')->name('failedjobs.index');	
	Route::post('failedjobs/importdata', 'FailedJobsController@importdata');

/* routes for Audits Controller */
	Route::get('audits', 'AuditsController@index')->name('audits.index');
	Route::get('audits/index/{filter?}/{filtervalue?}', 'AuditsController@index')->name('audits.index');	
	Route::post('audits/importdata', 'AuditsController@importdata');
});


	
Route::get('componentsdata/assetid_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->assetid_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/supplierid_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->supplierid_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/typeid_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->typeid_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/brandid_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->brandid_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/locationid_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->locationid_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/category_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->category_id_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/componentid_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->componentid_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/group_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->group_id_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/user_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->user_id_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/coreusers_username_value_exist',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->coreusers_username_value_exist($request);
	}
);
	
Route::get('componentsdata/coreusers_email_value_exist',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->coreusers_email_value_exist($request);
	}
);
	
Route::get('componentsdata/institution_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->institution_id_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/maintenance_assetid_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->maintenance_assetid_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/building_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->building_id_option_list($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/getcount_institution',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_institution($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/getcount_department',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_department($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/getcount_location',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_location($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/getcount_assets',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_assets($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/getcount_building',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_building($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/getcount_component',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_component($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/getcount_brand',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_brand($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/getcount_maintenance',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_maintenance($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/getcount_supplier',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_supplier($request);
	}
)->middleware(['auth']);
	
Route::get('componentsdata/getcount_employees',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->getcount_employees($request);
	}
)->middleware(['auth']);


Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');


/**
 * All static content routes
 */
Route::get('info/about',  function(){
		return view("pages.info.about");
	}
);
Route::get('info/faq',  function(){
		return view("pages.info.faq");
	}
);

Route::get('info/contact',  function(){
	return view("pages.info.contact");
}
);
Route::get('info/contactsent',  function(){
	return view("pages.info.contactsent");
}
);

Route::post('info/contact',  function(Request $request){
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		$senderName = $request->name;
		$senderEmail = $request->email;
		$message = $request->message;

		$receiverEmail = config("mail.from.address");

		Mail::send(
			'pages.info.contactemail', [
				'name' => $senderName,
				'email' => $senderEmail,
				'comment' => $message
			],
			function ($mail) use ($senderEmail, $receiverEmail) {
				$mail->from($senderEmail);
				$mail->to($receiverEmail)
					->subject('Contact Form');
			}
		);
		return redirect("info/contactsent");
	}
);


Route::get('info/features',  function(){
		return view("pages.info.features");
	}
);
Route::get('info/privacypolicy',  function(){
		return view("pages.info.privacypolicy");
	}
);
Route::get('info/termsandconditions',  function(){
		return view("pages.info.termsandconditions");
	}
);

Route::get('info/changelocale/{locale}', function ($locale) {
	app()->setlocale($locale);
	session()->put('locale', $locale);
    return redirect()->back();
})->name('info.changelocale');
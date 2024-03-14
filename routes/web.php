<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\branchController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\amountController;
use App\Http\Controllers\warrantyController;
use App\Http\Controllers\returnController;
use App\Http\Controllers\billingController;

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
//Route::get('/', function () { return view('home'); });
Route::get('/', [LoginController::class,'showLoginForm'])->name('login');

Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
Route::post('register', [RegisterController::class,'register']);

Route::get('password/forget',  function () { 
	return view('pages.forgot-password'); 
})->name('password.forget');
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');


Route::group(['middleware' => 'auth'], function(){
	// logout route
	Route::get('/logout', [LoginController::class,'logout']);
	Route::get('/clear-cache', [HomeController::class,'clearCache']);

	// dashboard route  
	Route::get('/dashboard', function () { 
		return view('pages.dashboard'); 
	})->name('dashboard');

	//only those have manage_user permission will get access
	Route::group(['middleware' => 'can:manage_user'], function(){
	Route::get('/users', [UserController::class,'index']);
	Route::get('/user/get-list', [UserController::class,'getUserList']);
		Route::get('/user/create', [UserController::class,'create']);
		Route::post('/user/create', [UserController::class,'store'])->name('create-user');
		Route::get('/user/{id}', [UserController::class,'edit']);
		Route::post('/user/update', [UserController::class,'update']);
		Route::get('/user/delete/{id}', [UserController::class,'delete']);
	});

	//only those have manage_role permission will get access
	Route::group(['middleware' => 'can:manage_roles|manage_user'], function(){
		Route::get('/roles', [RolesController::class,'index']);
		Route::get('/role/get-list', [RolesController::class,'getRoleList']);
		Route::post('/role/create', [RolesController::class,'create']);
		Route::get('/role/edit/{id}', [RolesController::class,'edit']);
		Route::post('/role/update', [RolesController::class,'update']);
		Route::get('/role/delete/{id}', [RolesController::class,'delete']);
	});

	


	//only those have manage_permission permission will get access
	Route::group(['middleware' => 'can:manage_permission|manage_user'], function(){
		Route::get('/permission', [PermissionController::class,'index']);
		Route::get('/permission/get-list', [PermissionController::class,'getPermissionList']);
		Route::post('/permission/create', [PermissionController::class,'create']);
		Route::get('/permission/update', [PermissionController::class,'update']);
		Route::get('/permission/delete/{id}', [PermissionController::class,'delete']);
	});

	// get permissions
	Route::get('get-role-permissions-badge', [PermissionController::class,'getPermissionBadgeByRole']);

	//only those have manage_user permission will get access
	Route::group(['middleware' => 'can:manage_user'], function(){
		Route::get('/branch', [branchController::class,'view']);
		Route::post('/store', [branchController::class,'store']);
		Route::get('/get-list', [branchController::class,'getBranchList']);
		Route::get('/delete/{id}', [branchController::class,'delete']);
		Route::get('/edit/{id}', [branchController::class,'edit']);
		Route::post('/update', [branchController::class,'update']);
		});


		        // UNITS
	Route::group(['middleware' => 'can:manage_product'], function(){
		Route::get('/unit', [UnitController::class,'index']);
		Route::post('/unit/store', [UnitController::class,'store']);
		Route::get('/unit/get-list', [UnitController::class,'getUnitList']);
		Route::get('/unit/delete/{id}', [UnitController::class,'delete']);
		Route::get('/unit/edit/{id}', [UnitController::class,'edit']);
		Route::post('/unit/update', [UnitController::class,'update']);
		});

                // Category
	Route::group(['middleware' => 'can:manage_product'], function(){
		Route::get('/category', [categoryController::class,'view']);
		Route::post('/category/store', [categoryController::class,'store']);
		Route::get('/category/get-list3', [categoryController::class,'getCategoryList']);
		Route::get('/category/delete/{id}', [categoryController::class,'delete']);
		Route::get('/category/edit/{id}', [categoryController::class,'edit']);
		Route::post('/category/update', [categoryController::class,'update']);
		});

        
                // Supplier
	Route::group(['middleware' => 'can:manage_product'], function(){
		Route::get('/supplier', [SupplierController::class,'view']);
		Route::post('/supplier/store', [SupplierController::class,'store']);
		Route::get('/supplier/get-list8', [SupplierController::class,'getSupplierList']);
		Route::get('/supplier/delete/{id}', [SupplierController::class,'delete']);
		Route::get('/supplier/edit/{id}', [SupplierController::class,'edit']);
		Route::post('/supplier/update', [SupplierController::class,'update']);
		});

		             // Customer
	Route::group(['middleware' => 'can:manage_user'], function(){
		Route::get('/customer', [CustomerController::class,'view']);
		Route::post('/customer/store', [CustomerController::class,'store']);
		Route::get('/customer/get-list9', [CustomerController::class,'getCustomerList']);
		Route::get('/customer/delete/{id}', [CustomerController::class,'delete']);
		Route::get('/customer/edit/{id}', [CustomerController::class,'edit']);
		Route::post('/customer/update', [CustomerController::class,'update']);
		});

                        // Product
	Route::group(['middleware' => 'can:manage_product'], function(){
		Route::get('/product', [ProductController::class,'view']);
		Route::post('/product/store', [ProductController::class,'store']);
		Route::get('/product/get-list4', [ProductController::class,'getProductList']);
		Route::get('/product/delete/{id}', [ProductController::class,'delete']);
		Route::get('/product/edit/{id}', [ProductController::class,'edit']);
		Route::post('/product/update', [ProductController::class,'update']);
		});

                      // Brand
	Route::group(['middleware' => 'can:manage_product'], function(){
		Route::get('/brand', [BrandController::class,'view']);
		Route::post('/brand/store', [BrandController::class,'store']);
		Route::get('/brand/get-list2', [BrandController::class,'getBrandList']);
		Route::get('/brand/delete/{id}', [BrandController::class,'delete']);
		Route::get('/brand/edit/{id}', [BrandController::class,'edit']);
		Route::post('/brand/update', [BrandController::class,'update']);
		});

		        // Stock
	Route::group(['middleware' => 'can:manage_stock'], function(){
		Route::get('/stock', [stockController::class,'view']);
		Route::post('/stock/store', [stockController::class,'store']);
		Route::get('/stock/get-list7', [stockController::class,'getStockList']);
		Route::get('/stock/delete/{id}', [stockController::class,'delete']);
		Route::get('/stock/edit/{id}', [stockController::class,'edit']);
		Route::get('/stock/edit1/{id}', [stockController::class,'edit1']);
		Route::post('/stock/update', [stockController::class,'update']);
		Route::get('/stockView/{branch}/{product}', [stockController::class,'viewAllStock']);
		});

				        // Invoice
	Route::group(['middleware' => 'can:manage_pos'], function(){
		Route::get('/invoice', [InvoiceController::class,'view']);
		Route::post('/invoice/store', [InvoiceController::class,'store']);
		Route::get('/invoice/add/{id}', [InvoiceController::class,'add']);
		Route::post('/invoice/update', [InvoiceController::class,'update']);
		Route::get('/invoice/search/{phone}', [InvoiceController::class,'search']);
		Route::post('/invoice/savecustomer', [InvoiceController::class,'saveCustomer']);
		Route::post('/invoice/saveinvoice', [InvoiceController::class,'saveInvoice']);
		Route::get('/invoice/print', [InvoiceController::class,'print']);
		});
	Route::group(['middleware' => 'can:manage_pos'], function(){
		Route::get('/invoice/get-list10', [amountController::class,'getInvoiceList']);
		Route::get('/invoice/delete/{id}', [amountController::class,'delete']);
		Route::get('/invoice/view/{id}', [amountController::class,'invoiceView']);
		Route::get('/search', [amountController::class,'view']);
		});

		                      // Warranty
	Route::group(['middleware' => 'can:manage_warranty'], function(){
		Route::get('/warranty', [warrantyController::class,'view']);
		Route::post('/warranty/store', [warrantyController::class,'store']);
		Route::get('/warranty/get-list', [warrantyController::class,'getWarrantyList12']);
		Route::get('/warranty/delete/{id}', [warrantyController::class,'delete']);
		Route::get('/warranty/edit/{id}', [warrantyController::class,'edit']);
		Route::post('/warranty/update', [warrantyController::class,'update']);
		});

				  // Return
	Route::group(['middleware' => 'can:manage_return'], function(){
		Route::get('/return', [returnController::class,'view']);
		Route::post('/return/store', [returnController::class,'store']);
		Route::post('/return/savecustomer', [returnController::class,'saveCustomer']);
		Route::get('/return/search/{phone}', [returnController::class,'search']);
		Route::get('/return/add/{id}/{branch}', [returnController::class,'add']);
		Route::post('/return/savereturn', [returnController::class,'saveReturn']);
		Route::get('/return/get-list', [returnController::class,'getReturnList12']);
		Route::get('/return/delete/{id}', [returnController::class,'delete']);
		});

			 // Billing
	Route::group(['middleware' => 'can:manage_pos'], function(){
		Route::get('/billing', [billingController::class,'view']);
		Route::post('/billing/store', [billingController::class,'store']);
		Route::get('/billing/add/{id}/{branch}', [billingController::class,'add']);
		Route::post('/billing/update', [billingController::class,'update']);
		Route::get('/billing/search/{phone}', [billingController::class,'search']);
		Route::post('/billing/savesupplier', [billingController::class,'saveSupplier']);
		Route::post('/billing/savebilling', [billingController::class,'saveBilling']);
		Route::get('/billing/print', [billingController::class,'print']);
		});
	Route::group(['middleware' => 'can:manage_pos'], function(){
		Route::get('/billing/get-list10', [amountController::class,'getbillingList']);
		Route::get('/billing/delete/{id}', [amountController::class,'delete']);
		Route::get('/billing/view/{id}', [amountController::class,'billingView']);
		Route::get('/search', [amountController::class,'view']);
		});


	// Basic demo routes
	include('modules/demo.php');
	// Inventory routes
	include('modules/inventory.php');
	// Accounting routes
	include('modules/accounting.php');
});


Route::get('/register', function () { return view('pages.register'); });
Route::get('/login-1', function () { return view('pages.login'); });

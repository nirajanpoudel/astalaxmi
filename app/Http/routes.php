<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@welcome');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/search', 'HomeController@search');
Route::get('fiscal-year','SettingController@create');
Route::post('fiscal-year','SettingController@store');
Route::group(['as' => 'admin::','prefix'=>'{setting_id}'], function () {
		Route::get('dashboard','ReportController@dashboard');
		
		Route::get('/menu', 'ReportController@getMenuByOrder');
		Route::get('/balance', 'ReportController@balanceSheet');
		Route::get('/reports', 'ReportController@report');
		Route::resource('/products', 'ProductController');
		Route::get('/income', 'ReportController@createIncome');
		Route::get('/cash', 'ReportController@cashBook');

		Route::get('notification/{id}/visit','SettingController@visit');

		Route::get('/ledger/{account_id}', 'ReportController@createLedger');
		Route::get('/trial', 'ReportController@createTrialBalance');
		Route::resource('accounts', 'AccountController');
		Route::resource('bills', 'BillController');
		Route::resource('invoices', 'InvoiceController');
		Route::get('bills/{id}/payment', 'BillController@Payment');
		Route::get('invoices/{id}/payment', 'InvoiceController@Payment');
		Route::get('bills/{id}/detail', 'BillController@Detail');
		Route::get('invoices/{id}/detail', 'InvoiceController@Detail');
		Route::post('bills/partials/{id}', 'BillController@PartialPayment');
		Route::post('invoices/partials/{id}', 'InvoiceController@PartialPayment');
		Route::resource('customers', 'CustomerController');
		Route::resource('customers/{id}/transaction', 'CustomerController@transactions');
		Route::resource('vendors', 'VendorController');
		Route::resource('journal', 'JournalController');
		Route::get('journal/status/{journal_id}', 'JournalController@status');
		Route::get('bills/status/{bill_id}', 'BillController@status');
		Route::resource('configs','ConfigController');
		// Route::get('api/journals/lists','JournalController@lists');
		// Route::get('api/accounts/parents','AccountController@parents');

		Route::get('accounts/{account_id}/child/create', 'AccountController@childCreate');
		Route::post('accounts/{account_id}/child', 'AccountController@childStore');

		Route::get('vendors/{id}/payment', 'VendorController@Payment');
		Route::post('vendors/partials/{id}', 'VendorController@PartialPayment');
		Route::get('vendors/{id}/detail', 'VendorController@Detail');

		Route::get('customers/{id}/payment', 'CustomerController@Payment');
		Route::post('customers/partials/{id}', 'CustomerController@PartialPayment');
		Route::get('customers/{id}/detail', 'CustomerController@Detail');

});

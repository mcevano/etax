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

Route::get('/', function () {
	
	if (Auth::check()) {
    	return view('home');
	}else{
		return view('auth/login');
	}
});

Auth::routes(['verify' => true]);

Route::get('/demo', 'Auth\RegisterController@demo');
Route::post('/for_demo', 'CompaniesController@insert_demo');

Route::get('/home', 'HomeController@index');

Route::post('/chat', 'ChatController@store');
Route::get('/chat/fetch', 'ChatController@fetch');

Route::get('/ocr', 'OcrController@index');
Route::post('/ocr/upload', 'OcrController@store');

Route::get('/help/documentary_stamp', 'HelpController@documentary_stamp');
Route::get('/help/excise', 'HelpController@excise');
Route::get('/help/income', 'HelpController@income');
Route::get('/help/onett', 'HelpController@onett');
Route::get('/help/payment', 'HelpController@payment');
Route::get('/help/percentage', 'HelpController@percentage');
Route::get('/help/value_added_tax', 'HelpController@value_added_tax');
Route::get('/help/withholding', 'HelpController@withholding');

Route::get('/account', 'HomeController@account')->middleware('auth');
Route::patch('/account/{user}', 'HomeController@update');
Route::patch('/regular/{user}', 'HomeController@regular');

Route::get('/companies', 'CompaniesController@index');
Route::get('/companies/create', 'CompaniesController@create');
Route::get('/companies/{company}', 'CompaniesController@show');
Route::get('/companies/{company}/forms', 'CompaniesController@forms');
Route::get('/companies/{company}/histories/{form}', 'CompaniesController@histories');
Route::post('/companies', 'CompaniesController@store');
Route::patch('/companies/file/{form}', 'CompaniesController@file');
Route::patch('/companies/{company}', 'CompaniesController@update');
Route::delete('/companies/destroy/{form}', 'CompaniesController@destroy');

Route::get('/invite', 'InviteController@index');
Route::post('/invite', 'InviteController@store');
Route::get('/invite/{user}/resend', 'InviteController@resend');

Route::get('/relief/{company}/histories/{type}', 'ReliefController@index');
Route::get('/relief/download/{type}', 'ReliefController@download');
Route::get('/relief/download_dat/{file}', 'ReliefController@download_dat');
Route::get('/relief/download_excel/{company}/{file}/{filename}', 'ReliefController@download_excel');
Route::get('/relief/{company}/show/{type}/{data_id}', 'ReliefController@show');
Route::get('/relief/{company}/sales', 'ReliefController@sales_form');
Route::post('/relief/sale/{company}', 'ReliefController@sale');
Route::get('/relief/{company}/purchase', 'ReliefController@purchase_form');
Route::post('/relief/purchase/{company}', 'ReliefController@purchase');
Route::get('/relief/{company}/importations', 'ReliefController@importations_form');
Route::post('/relief/importations/{company}', 'ReliefController@importations');

Route::get('/form/0605/{company}/{action}/{form_id}', 'Form0605Controller@index');
Route::get('/form/0605/{company}/show/{action}/{form_id}', 'Form0605Controller@show');
Route::post('/form/0605', 'Form0605Controller@store');
Route::post('/form/0605/update', 'Form0605Controller@update');

Route::get('/form/0619E/{company}/{action}/{form_id}', 'Form0619EController@index');
Route::get('/form/0619E/{company}/show/{action}/{form_id}', 'Form0619EController@show');
Route::post('/form/0619E', 'Form0619EController@store');
Route::post('/form/0619E/update', 'Form0619EController@update');

Route::get('/form/0619F/{company}/{action}/{form_id}', 'Form0619FController@index');
Route::get('/form/0619F/{company}/show/{action}/{form_id}', 'Form0619FController@show');
Route::post('/form/0619F', 'Form0619FController@store');
Route::post('/form/0619F/update', 'Form0619FController@update');

Route::get('/form/1600/{company}/{action}/{form_id}', 'Form1600Controller@index');
Route::get('/form/1600/{company}/show/{action}/{form_id}', 'Form1600Controller@show');
Route::post('/form/1600', 'Form1600Controller@store');
Route::post('/form/1600/update', 'Form1600Controller@update');

Route::get('/form/1600WP/{company}/{action}/{form_id}', 'Form1600WPController@index');
Route::get('/form/1600WP/{company}/show/{action}/{form_id}', 'Form1600WPController@show');
Route::post('/form/1600WP', 'Form1600WPController@store');
Route::post('/form/1600WP/update', 'Form1600WPController@update');

Route::get('/form/1601Cv2018/{company}/{action}/{form_id}', 'Form1601Cv2018Controller@index');
Route::get('/form/1601Cv2018/{company}/show/{action}/{form_id}', 'Form1601Cv2018Controller@show');
Route::post('/form/1601Cv2018', 'Form1601Cv2018Controller@store');
Route::post('/form/1601Cv2018/update', 'Form1601Cv2018Controller@update');

Route::get('/form/1601E/{company}/{action}/{form_id}', 'Form1601EController@index');
Route::get('/form/1601E/{company}/show/{action}/{form_id}', 'Form1601EController@show');
Route::post('/form/1601E', 'Form1601EController@store');
Route::post('/form/1601E/update', 'Form1601EController@update');

Route::get('/form/1601F/{company}/{action}/{form_id}', 'Form1601FController@index');

Route::get('/form/1601EQ/{company}/{action}/{form_id}', 'Form1601EQController@index');
Route::get('/form/1601EQ/{company}/show/{action}/{form_id}', 'Form1601EQController@show');
Route::post('/form/1601EQ', 'Form1601EQController@store');
Route::post('/form/1601EQ/update', 'Form1601EQController@update');

Route::get('/form1601F/{company}/{action}/{form_id}', 'Form1601FController@index');
Route::get('/form1601F/treaty', 'Form1601FController@treaty');
Route::get('/form1601F/atc', 'Form1601FController@atc');
Route::get('/form1601F/{atc}/rate', 'Form1601FController@rate');
Route::post('/form1601F', 'Form1601FController@store');

Route::get('/form/1601FQ/{company}/{action}/{form_id}', 'Form1601FQController@index');
Route::get('/form/1601FQ/{company}/show/{action}/{form_id}', 'Form1601FQController@show');
Route::post('/form/1601FQ', 'Form1601FQController@store');
Route::post('/form/1601FQ/update', 'Form1601FQController@update');

Route::get('/form/1602Qv2018/{company}/{action}/{form_id}', 'Form1602Qv2018Controller@index');
Route::get('/form/1602Qv2018/{company}/show/{action}/{form_id}', 'Form1602Qv2018Controller@show');
Route::post('/form/1602Qv2018', 'Form1602Qv2018Controller@store');
Route::post('/form/1602Qv2018/update', 'Form1602Qv2018Controller@update');

Route::get('/form/1603Qv2018/{company}/{action}/{form_id}', 'Form1603Qv2018Controller@index');
Route::get('/form/1603Qv2018/{company}/show/{action}/{form_id}', 'Form1603Qv2018Controller@show');
Route::post('/form/1603Qv2018', 'Form1603Qv2018Controller@store');
Route::post('/form/1603Qv2018/update', 'Form1603Qv2018Controller@update');

Route::get('/form/1604E/{company}/{action}/{form_id}', 'Form1604EController@index');
Route::get('/form/1604E/{company}/show/{action}/{form_id}', 'Form1604EController@show');
Route::post('/form/1604E', 'Form1604EController@store');
Route::post('/form/1604E/update', 'Form1604EController@update');

Route::get('/form/1604CF/{company}/{action}/{form_id}', 'Form1604CFController@index');
Route::get('/form/1604CF/{company}/show/{action}/{form_id}', 'Form1604CFController@show');
Route::post('/form/1604CF', 'Form1604CFController@store');
Route::post('/form/1604CF/update', 'Form1604CFController@update');

Route::get('/form/1606/{company}/{action}/{form_id}', 'Form1606Controller@index');
Route::get('/form/1606/{company}/show/{action}/{form_id}', 'Form1606Controller@show');
Route::post('/form/1606', 'Form1606Controller@store');
Route::post('/form/1606/update', 'Form1606Controller@update');

Route::get('/form/1701A/{company}/{action}/{form_id}', 'Form1701AController@index');
Route::get('/form/1701A/{company}/show/{action}/{form_id}', 'Form1701AController@show');
Route::post('/form/1701A', 'Form1701AController@store');
Route::post('/form/1701A/update', 'Form1701AController@update');

Route::get('/form/1701v2018/{company}/{action}/{form_id}', 'Form1701v2018Controller@index');
Route::get('/form/1701v2018/{company}/show/{action}/{form_id}', 'Form1701v2018Controller@show');
Route::post('/form/1701v2018', 'Form1701v2018Controller@store');
Route::post('/form/1701v2018/update', 'Form1701v2018Controller@update');

Route::get('/form/1701Qv2018/{company}/{action}/{form_id}', 'Form1701Qv2018Controller@index');
Route::get('/form/1701Qv2018/{company}/show/{action}/{form_id}', 'Form1701Qv2018Controller@show');
Route::post('/form/1701Qv2018', 'Form1701Qv2018Controller@store');
Route::post('/form/1701Qv2018/update', 'Form1701Qv2018Controller@update');

Route::get('/form/1702RT/{company}/{action}/{form_id}', 'Form1702RTController@index');
Route::get('/form/1702RT/{company}/show/{action}/{form_id}', 'Form1702RTController@show');
Route::post('/form/1702RT', 'Form1702RTController@store');
Route::post('/form/1702RT/update', 'Form1702RTController@update');

Route::get('/form/1702EX/{company}/{action}/{form_id}', 'Form1702EXController@index');
Route::get('/form/1702EX/{company}/show/{action}/{form_id}', 'Form1702EXController@show');
Route::post('/form/1702EX', 'Form1702EXController@store');
Route::post('/form/1702EX/update', 'Form1702EXController@update');

Route::get('/form/1702MX/{company}/{action}/{form_id}', 'Form1702MXController@index');
Route::get('/form/1702MX/{company}/show/{action}/{form_id}', 'Form1702MXController@show');
Route::post('/form/1702MX', 'Form1702MXController@store');
Route::post('/form/1702MX/xml', 'Form1702MXController@saveXML');
Route::post('/form/1702MX/update', 'Form1702MXController@update');

Route::get('/form/1702Q/{company}/{action}/{form_id}', 'Form1702QController@index');
Route::get('/form/1702Q/{company}/show/{action}/{form_id}', 'Form1702QController@show');
Route::post('/form/1702Q', 'Form1702QController@store');
Route::post('/form/1702Q/update', 'Form1702QController@update');

Route::get('/form/1704/{company}/{action}/{form_id}', 'Form1704Controller@index');
Route::get('/form/1704/{company}/show/{action}/{form_id}', 'Form1704Controller@show');
Route::post('/form/1704', 'Form1704Controller@store');
Route::post('/form/1704/update', 'Form1704Controller@update');

Route::get('/form/1706/{company}/{action}/{form_id}', 'Form1706Controller@index');
Route::get('/form/1706/{company}/show/{action}/{form_id}', 'Form1706Controller@show');
Route::post('/form/1706', 'Form1706Controller@store');
Route::post('/form/1706/update', 'Form1706Controller@update');

Route::get('/form/1707/{company}/{action}/{form_id}', 'Form1707Controller@index');
Route::get('/form/1707/{company}/show/{action}/{form_id}', 'Form1707Controller@show');
Route::post('/form/1707', 'Form1707Controller@store');
Route::post('/form/1707/update', 'Form1707Controller@update');

Route::get('/form/1707A/{company}/{action}/{form_id}', 'Form1707AController@index');
Route::get('/form/1707A/{company}/show/{action}/{form_id}', 'Form1707AController@show');
Route::post('/form/1707A', 'Form1707AController@store');
Route::post('/form/1707A/xml', 'Form1707AController@saveXML');
Route::post('/form/1707A/update', 'Form1707AController@update');

Route::get('/form/1800/{company}/{action}/{form_id}', 'Form1800Controller@index');
Route::get('/form/1800/{company}/show/{action}/{form_id}', 'Form1800Controller@show');
Route::post('/form/1800', 'Form1800Controller@store');
Route::post('/form/1800/update', 'Form1800Controller@update');

Route::get('/form/1801/{company}/{action}/{form_id}', 'Form1801Controller@index');
Route::get('/form/1801/{company}/show/{action}/{form_id}', 'Form1801Controller@show');
Route::post('/form/1801', 'Form1801Controller@store');
Route::post('/form/1801/update', 'Form1801Controller@update');

Route::get('/form/2000v2018/{company}/{action}/{form_id}', 'Form2000v2018Controller@index');
Route::get('/form/2000v2018/{company}/show/{action}/{form_id}', 'Form2000v2018Controller@show');
Route::post('/form/2000v2018', 'Form2000v2018Controller@store');
Route::post('/form/2000v2018/update', 'Form2000v2018Controller@update');

Route::get('/form/2000OT/{company}/{action}/{form_id}', 'Form2000OTController@index');
Route::get('/form/2000OT/{company}/show/{action}/{form_id}', 'Form2000OTController@show');
Route::post('/form/2000OT', 'Form2000OTController@store');
Route::post('/form/2000OT/update', 'Form2000OTController@update');

Route::get('/form/2200A/{company}/{action}/{form_id}', 'Form2200AController@index');
Route::get('/form/2200A/{company}/show/{action}/{form_id}', 'Form2200AController@show');
Route::post('/form/2200A', 'Form2200AController@store');
Route::post('/form/2200A/update', 'Form2200AController@update');

Route::get('/form/2200AN/{company}/{action}/{form_id}', 'Form2200ANController@index');
Route::get('/form/2200AN/{company}/show/{action}/{form_id}', 'Form2200ANController@show');
Route::post('/form/2200AN', 'Form2200ANController@store');
Route::post('/form/2200AN/update', 'Form2200ANController@update');

Route::get('/form/2200M/{company}/{action}/{form_id}', 'Form2200MController@index');
Route::get('/form/2200M/{company}/show/{action}/{form_id}', 'Form2200MController@show');
Route::post('/form/2200M', 'Form2200MController@store');
Route::post('/form/2200M/update', 'Form2200MController@update');

Route::get('/form/2200P/{company}/{action}/{form_id}', 'Form2200PController@index');
Route::get('/form/2200P/{company}/show/{action}/{form_id}', 'Form2200PController@show');
Route::post('/form/2200P', 'Form2200PController@store');
Route::post('/form/2200P/update', 'Form2200PController@update');

Route::get('/form/2200S/{company}/{action}/{form_id}', 'Form2200SController@index');
Route::get('/form/2200S/{company}/show/{action}/{form_id}', 'Form2200SController@show');
Route::post('/form/2200S', 'Form2200SController@store');
Route::post('/form/2200S/update', 'Form2200SController@update');

Route::get('/form/2200T/{company}/{action}/{form_id}', 'Form2200TController@index');
Route::get('/form/2200T/{company}/show/{action}/{form_id}', 'Form2200TController@show');
Route::post('/form/2200T', 'Form2200TController@store');
Route::post('/form/2200T/update', 'Form2200TController@update');

Route::get('/form/2550M/{company}/{action}/{form_id}', 'Form2550MController@index');
Route::get('/form/2550M/{company}/show/{action}/{form_id}', 'Form2550MController@show');
Route::post('/form/2550M', 'Form2550MController@store');
Route::post('/form/2550M/update', 'Form2550MController@update');

Route::get('/form/2550Q/{company}/{action}/{form_id}', 'Form2550QController@index');
Route::get('/form/2550Q/{company}/show/{action}/{form_id}', 'Form2550QController@show');
Route::post('/form/2550Q', 'Form2550QController@store');
Route::post('/form/2550Q/update', 'Form2550QController@update');

Route::get('/form/2551M/{company}/{action}/{form_id}', 'Form2551MController@index');
Route::get('/form/2551M/{company}/show/{action}/{form_id}', 'Form2551MController@show');
Route::post('/form/2551M', 'Form2551MController@store');
Route::post('/form/2551M/update', 'Form2551MController@update');

Route::get('/form/2551Qv2018/{company}/{action}/{form_id}', 'Form2551Qv2018Controller@index');
Route::get('/form/2551Qv2018/{company}/show/{action}/{form_id}', 'Form2551Qv2018Controller@show');
Route::post('/form/2551Qv2018', 'Form2551Qv2018Controller@store');
Route::post('/form/2551Qv2018/update', 'Form2551Qv2018Controller@update');

Route::get('/form/2552/{company}/{action}/{form_id}', 'Form2552Controller@index');
Route::get('/form/2552/{company}/show/{action}/{form_id}', 'Form2552Controller@show');
Route::post('/form/2552', 'Form2552Controller@store');
Route::post('/form/2552/update', 'Form2552Controller@update');

Route::get('/form/2553/{company}/{action}/{form_id}', 'Form2553Controller@index');
Route::get('/form/2553/{company}/show/{action}/{form_id}', 'Form2553Controller@show');
Route::post('/form/2553', 'Form2553Controller@store');
Route::post('/form/2553/update', 'Form2553Controller@update');








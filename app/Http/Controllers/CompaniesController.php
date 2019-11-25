<?php

namespace App\Http\Controllers;

use App\Rdo;
use App\Xml;
use App\Companies;
use App\tbl_0605;
use App\tbl_0619E;
use App\tbl_0619F;
use App\tbl_1600;
use App\tbl_1601C;
use App\tbl_1601C_schedule;
use App\tbl_1601E;
use App\tbl_1601E_schedule;
use App\tbl_1601EQ;
use App\tbl_1601EQ_schedule;
use App\tbl_1601FQ;
use App\tbl_1601FQ_atc;
use App\tbl_1601FQ_schedules;
use App\tbl_1602Q;
use App\tbl_1604E;
use App\tbl_1701Q;
use App\tbl_1702RT_1;
use App\tbl_1702RT_2;
use App\tbl_1702RT_3;
use App\tbl_1702RT_4;
use App\tbl_1702RT_5;
use App\tbl_1702RT_6;
use App\tbl_1702RT_7;
use App\tbl_1702RT_8;
use App\tbl_1702Q;
use App\tbl_1702Q_schedules;
use App\tbl_2550M;
use App\tbl_2550M_schedule1;
use App\tbl_2550M_schedule2;
use App\tbl_2550M_schedule3a;
use App\tbl_2550M_schedule3b;
use App\tbl_2550M_schedule4;
use App\tbl_2550M_schedule5;
use App\tbl_2550M_schedule6;
use App\tbl_2550M_schedule7;
use App\tbl_2550M_schedule8;
use App\tbl_2550Q;
use App\tbl_2551M;
use App\tbl_2551M_atc;
use App\tbl_2551M_schedules;
use App\tbl_2551Q;
use App\tbl_2552;
use App\Classes\SubmitClass;
use App\Classes\CheckClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$companies = Companies::where('user_id',Auth::user()->id)
                                ->where('type', Auth::user()->user_type)
                                ->get();
        return view('companies.index', compact('companies'));
    }
    public function show($company)
    {   
        $rdo = Rdo::all();
        $getCompany = Companies::find($company);
        return view('companies.profile',['company' => $getCompany, 'rdo' => $rdo ]);
    }
    public function forms($company)
    {
        $getCompany = Companies::find($company);
        return view('companies.forms',['company' => $company, 'name' => $getCompany->registered_name ]);
    }
    public function histories($company,$form)
    {
        $getCompany = Companies::find($company);
    	$forms = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company)
                            ->where('form', $form)
                            ->where('status', '!=' ,'Archived')
                            ->get();
        if (Auth::check()) {
           \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
            $form_no = "1";

            if($form == '0605'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_0605s')){
                    $getForm = tbl_0605::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '0619E'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_0619_es')){
                    $getForm = tbl_0619E::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '0619F'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_0619_fs')){
                    $getForm = tbl_0619F::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '1600'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1600s')){
                    $getForm = tbl_1600::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '1601Cv2018'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1601_cs')){
                    $getForm = tbl_1601C::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '1601E'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1601_es')){
                     $getForm = tbl_1601E::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '1601EQ'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1601_e_qs')){
                     $getForm = tbl_1601EQ::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '1601F'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1601_fs')){
                    $getForm = tbl_1601F::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '1601FQ'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1601_f_qs')){
                    $getForm = tbl_1601FQ::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '1602Qv2018'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1602_qs')){
                    $getForm = tbl_1602Q::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '1604E'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1604_es')){
                    $getForm = tbl_1604E::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '1701Qv2018'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1701_qs')){
                    $getForm = tbl_1701Q::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '1702RT'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1702_r_t_1s')){
                    $getForm = tbl_1702RT_1::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '1702Q'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1702_qs')){
                    $getForm = tbl_1702Q::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '2550M'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2550_ms')){
                    $getForm = tbl_2550M::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '2550Q'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2550_qs')){
                    $getForm = tbl_2550Q::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '2551Qv2018'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2551_qs')){
                    $getForm = tbl_2551Q::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '2551M'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2551_ms')){
                    $getForm = tbl_2551M::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }else if($form == '2552'){
                if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2552s')){
                    $getForm = tbl_2552::where('company_id', $company)->orderBy('id', 'desc')->first();
                }else{
                    $getForm = "";
                }
            }

            $form_no = empty($getForm) ? "1" : $getForm->form_no + 1;
        	return view('companies.form-history', ['company' => $company, 'form' => $form, 'form_no' => $form_no, 'forms' => $forms, 'name' => $getCompany->registered_name]);
        }else{
            return abort(404);
        }
    }
    public function create()
    {
        $rdo = Rdo::all();
    	return view('companies.create', compact('rdo'));
    }
    public function store()
    {

        $attributes = request()->validate([
            'tin1'              => ['required'],
            'tin2'              => ['required'],
            'tin3'              => ['required'],
            'tin4'              => ['required'],
            'business_line'     => ['required'],
            'city'              => ['required'],
            'street'            => ['required'],
            'barangay'          => ['required'],
            'address'           => ['required', 'min:3'],
            'zip'               => ['required'],
            'contact'           => ['required'],
            'email_address'     => ['required', 'email'],
        ]);

        if(request('lastname') == "" && request('registered_name') == ""){
            $attributes = request()->validate([
                'registered_name'              => ['required'],
            ],
            [
                'registered_name.required' => 'You have to fill in either Taxpayers Name for Individual or Registered Name for Non-individual',
            ]);
        }
        
        Companies::create([
        	'user_id' 			=> Auth::user()->id,
        	'tin1'              => $attributes['tin1'],
            'tin2'              => $attributes['tin2'],
            'tin3'              => $attributes['tin3'],
            'tin4'              => $attributes['tin4'],
            'rdo_code'			=> request('rdo_code'),
            'line_business'     => $attributes['business_line'],
            'firstname'         => request('firstname'),
            'middlename'        => request('middlename'),
            'lastname'          => request('lastname'),
            'registered_name'   => request('registered_name'),
            'city'              => $attributes['city'],
            'district'          => request('district'),
            'substreet'         => request('substreet'),
            'street'            => $attributes['street'],
            'barangay'          => $attributes['barangay'],
            'address'			=> $attributes['address'],
            'zip_code'          => $attributes['zip'],
            'tel_number'        => $attributes['contact'],
            'email_address'     => $attributes['email_address'],
            'type'              => Auth::user()->user_type,
        ]);

        return redirect('companies');
    }
    public function update($id)
    {
        $attributes = request()->validate([
            'tin1'              => ['required'],
            'tin2'              => ['required'],
            'tin3'              => ['required'],
            'tin4'              => ['required'],
            'business_line'     => ['required'],
            'city'              => ['required'],
            'street'            => ['required'],
            'barangay'          => ['required'],
            'address'           => ['required', 'min:3'],
            'zip'               => ['required'],
            'contact'           => ['required'],
            'email_address'     => ['required', 'email'],
        ]);

        $data = ([
            'tin1'              => $attributes['tin1'],
            'tin2'              => $attributes['tin2'],
            'tin3'              => $attributes['tin3'],
            'tin4'              => $attributes['tin4'],
            'rdo_code'          => request('rdo_code'),
            'line_business'     => $attributes['business_line'],
            'firstname'         => request('firstname'),
            'middlename'        => request('middlename'),
            'lastname'          => request('lastname'),
            'registered_name'   => request('registered_name'),
            'city'              => $attributes['city'],
            'district'          => request('district'),
            'substreet'         => request('substreet'),
            'street'            => $attributes['street'],
            'barangay'          => $attributes['barangay'],
            'address'           => $attributes['address'],
            'zip_code'          => $attributes['zip'],
            'tel_number'        => $attributes['contact'],
            'email_address'     => $attributes['email_address'],
        ]);

        $getCompany = Companies::find($id);
        $getCompany->update($data);
        return redirect('companies');
    }
    public function file($id)
    {
        $data = ([
            'status'        => 'Filed',
        ]);

        $xml = Xml::find($id);
        $xml->update($data);

        /*for submission of xml file*/
        $submit = new SubmitClass();
        $stat_id = $submit->getData($id);

        /*for checking status of XML*/
        $check = new CheckClass();
        $status = $check->checkFileStatus($stat_id);

        echo $id;
    }
    public function destroy($id)
    {
        $xml = Xml::find($id);

        if (Auth::check()) {
            \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

            $data = ([
                'status'        => 'Archived',
            ]);

            $xml->update($data);

            return $id;
        }else{
            return abort(404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Xml;
use App\tbl_0619F;
use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form0619FController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);

        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_0619_fs')){

            }else{
                Schema::connection('mysql2')->create('tbl_0619_fs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item2A');
                    $table->string('item2B');
                    $table->string('item2C');
                    $table->string('item3')->nullable();
                    $table->string('item4')->nullable();
                    $table->string('item5');
                    $table->string('item11')->nullable();
                    $table->text('item13');
                    $table->text('item14');
                    $table->text('item15');
                    $table->text('item16');
                    $table->text('item17');
                    $table->text('item18A');
                    $table->text('item18B');
                    $table->text('item18C');
                    $table->text('item18D');
                    $table->text('item19');
                    $table->timestamps();
                });
            }
            
        	return view('forms.BIR-Form 0619F',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{
        	$data = tbl_0619F::find($form_id);
            return view('forms.BIR-Form 0619F',['company' => $company, 'data' => $data, 'action' => $action]);
        }
        
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);

    	$data = ([
     		'form_no' 			=> request('form_no'),
    		'company_id' 		=> request('company'),
    		'item1A' 			=> request('frm0619F:txtMonth'), 
    		'item1B' 			=> request('frm0619F:txtYear'),
    		'item2A' 			=> request('frm0619F:txtDueMonth'),
    		'item2B' 			=> request('frm0619F:txtDueDay'),
    		'item2C' 			=> request('frm0619F:txtDueYear'),
    		'item3' 			=> request('frm0619F:optAmend'),
    		'item4' 			=> null !== request('frm0619F:optWithheld') ? request('frm0619F:optWithheld') : '',
    		'item5' 			=> request('frm0619F:txtTaxTypeCode'),
    		'item11' 			=> null !== request('frm0619F:optCategory') ? request('frm0619F:optCategory') : '',
    		'item13' 			=> request('frm0619F:txtTax13'),
    		'item14' 			=> request('frm0619F:txtTax14'),
    		'item15' 			=> request('frm0619F:txtTax15'),
    		'item16' 			=> request('frm0619F:txtTax16'),
    		'item17' 			=> request('frm0619F:txtTax17'),
    		'item18A' 			=> request('frm0619F:txtTax18A'),
    		'item18B' 			=> request('frm0619F:txtTax18B'),
    		'item18C' 			=> request('frm0619F:txtTax18C'),
    		'item18D' 			=> request('frm0619F:txtTax18D'),
    		'item19' 			=> request('frm0619F:txtTax19'),
    	]);

    	$getForm = tbl_0619F::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
        if(request('form_id') != ""){
            $form = tbl_0619F::find(request('form_id'));
            $form->update($data);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_0619F::create($data);
            }else{
                $form = tbl_0619F::find($getForm[0]->id);
                $form->update($data);
            }
        }

        $name = rawurlencode(request('frm0619F:txtTaxpayerName'));

        $address = rawurlencode(request('frm0619F:txtAddress'));

        $lineBus = rawurlencode(request('frm0619F:txtLineBus'));

        $optAmendY = "false";
        $optAmendN = "false";

        if(request('frm0619F:optAmend') == 'Y'){
            $optAmendY = "true";
        }else if(request('frm0619F:optAmend') == 'N'){
            $optAmendN = "true";
        }

        $optWithheldY = "false";
        $optWithheldN = "false";

        if(null !== request('frm0619F:optWithheld')){
            if(request('frm0619F:optWithheld') == 'Y'){
                $optWithheldY = "true";
            }else if(request('frm0619F:optWithheld') == 'N'){
                $optWithheldN = "true";
            }
        }

        $optCategoryP = "false";
        $optCategoryG = "false";

        if(null !== request('frm0619F:optWithheld')){
            if(request('frm0619F:optCategory') == 'P'){
                 $optCategoryP = "true";
            }else if(request('frm0619F:optCategory') == 'G'){
                 $optCategoryG = "true";
            }
        }

        $xmlData = "<?xml version='1.0'?>            <div>frm0619F:txtMonth=".request('frm0619F:txtMonth')."frm0619F:txtMonth=</div>            <div>frm0619F:txtYear=".request('frm0619F:txtYear')."frm0619F:txtYear=</div>            <div>frm0619F:txtDueMonth=".request('frm0619F:txtDueMonth')."frm0619F:txtDueMonth=</div>            <div>frm0619F:txtDueDay=".request('frm0619F:txtDueDay')."frm0619F:txtDueDay=</div>            <div>frm0619F:txtDueYear=".request('frm0619F:txtDueYear')."frm0619F:txtDueYear=</div>            <div>frm0619F:optAmend:Y=".$optAmendY."frm0619F:optAmend:Y=</div>            <div>frm0619F:optAmend:N=".$optAmendN."frm0619F:optAmend:N=</div>            <div>frm0619F:optWithheld:Y=".$optWithheldY."frm0619F:optWithheld:Y=</div>            <div>frm0619F:optWithheld:N=".$optWithheldN."frm0619F:optWithheld:N=</div>            <div>frm0619F:txtTaxTypeCode=".request('frm0619F:txtTaxTypeCode')."frm0619F:txtTaxTypeCode=</div>            <div>frm0619F:txtTIN1=".request('frm0619F:txtTIN1')."frm0619F:txtTIN1=</div>            <div>frm0619F:txtTIN2=".request('frm0619F:txtTIN2')."frm0619F:txtTIN2=</div>            <div>frm0619F:txtTIN3=".request('frm0619F:txtTIN3')."frm0619F:txtTIN3=</div>            <div>frm0619F:txtBranchCode=".request('frm0619F:txtBranchCode')."frm0619F:txtBranchCode=</div>            <div>frm0619F:txtRDOCode=".request('frm0619F:txtRDOCode')."frm0619F:txtRDOCode=</div>            <div>frm0619F:txtTaxpayerName=".rawurlencode(request('frm0619F:txtTaxpayerName'))."frm0619F:txtTaxpayerName=</div>            <div>frm0619F:txtLineBus=".$lineBus."frm0619F:txtLineBus=</div>            <div>frm0619F:txtAddress=".strtoupper($address)."frm0619F:txtAddress=</div>            <div>frm0619F:txtZipCode=".request('frm0619F:txtZipCode')."frm0619F:txtZipCode=</div>            <div>frm0619F:txtTelNum=".request('frm0619F:txtTelNum')."frm0619F:txtTelNum=</div>            <div>frm0619F:optCategory:P=".$optCategoryP."frm0619F:optCategory:P=</div>            <div>frm0619F:optCategory:G=".$optCategoryG."frm0619F:optCategory:G=</div>            <div>txtEmail=".request('txtEmail')."txtEmail=</div>            <div>frm0619F:txtTax13=".request('frm0619F:txtTax13')."frm0619F:txtTax13=</div>            <div>frm0619F:txtTax14=".request('frm0619F:txtTax14')."frm0619F:txtTax14=</div>            <div>frm0619F:txtTax15=".request('frm0619F:txtTax15')."frm0619F:txtTax15=</div>            <div>frm0619F:txtTax16=".request('frm0619F:txtTax16')."frm0619F:txtTax16=</div>            <div>frm0619F:txtTax17=".request('frm0619F:txtTax17')."frm0619F:txtTax17=</div>            <div>frm0619F:txtTax18A=".request('frm0619F:txtTax18A')."frm0619F:txtTax18A=</div>            <div>frm0619F:txtTax18B=".request('frm0619F:txtTax18B')."frm0619F:txtTax18B=</div>            <div>frm0619F:txtTax18C=".request('frm0619F:txtTax18C')."frm0619F:txtTax18C=</div>            <div>frm0619F:txtTax18D=".request('frm0619F:txtTax18D')."frm0619F:txtTax18D=</div>            <div>frm0619F:txtTax19=".request('frm0619F:txtTax19')."frm0619F:txtTax19=</div>            <div>txtTaxAgentNo=txtTaxAgentNo=</div>            <div>txtDateIssue=txtDateIssue=</div>            <div>txtDateExpiry=txtDateExpiry=</div>            <div>txtAgency20=txtAgency20=</div>            <div>txtNumber20=txtNumber20=</div>            <div>txtDate20=txtDate20=</div>            <div>txtAmount20=txtAmount20=</div>            <div>txtAgency21=txtAgency21=</div>            <div>txtNumber21=txtNumber21=</div>            <div>txtDate21=txtDate21=</div>            <div>txtAmount21=txtAmount21=</div>            <div>txtAgency22=txtAgency22=</div>            <div>txtNumber22=txtNumber22=</div>            <div>txtDate22=txtDate22=</div>            <div>txtAmount22=txtAmount22=</div>            <div>txtParticular23=txtParticular23=</div>            <div>txtAgency23=txtAgency23=</div>            <div>txtNumber23=txtNumber23=</div>            <div>txtDate23=txtDate23=</div>            <div>txtAmount23=txtAmount23=</div>            <div>txtFinalFlag=0txtFinalFlag=</div>            <div>txtEnroll=NtxtEnroll=</div>            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>            <div>ebirOnlineUsername=ebirOnlineUsername=</div>            <div>ebirOnlineSecret=ebirOnlineSecret=</div>            <div>driveSelectTPExport=driveSelectTPExport=</div>                        All Rights Reserved BIR 2012.";

            $tin = request('frm0619F:txtTIN1').request('frm0619F:txtTIN2').request('frm0619F:txtTIN3').request('frm0619F:txtBranchCode');

            $getReturnPeriod = tbl_0619F::where('company_id',  request('company'))
                            ->where('item1A', request('frm0619F:txtMonth'))
                            ->where('item1B', request('frm0619F:txtYear'))
                            ->count();

            $returnPeriod = request('frm0619F:txtMonth')."/".request('frm0619F:txtYear');

            if($getReturnPeriod == "1"){
                $xmlReturnPeriod = request('frm0619F:txtMonth').request('frm0619F:txtYear').request('frm0619F:txtTaxTypeCode');
            }else{
                if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '0619F')
                            ->get();
                    if($getXml[0]->return_period == $returnPeriod ){
                        if(substr($getXml[0]->file_name, -6, 1) != 'V'){
                            $ext = "";
                        }else{
                            $ext = 'V'.substr($getXml[0]->file_name, -5, 1);
                        }
                    }else{
                        $ext = 'V'.($getReturnPeriod - 1);
                    }
                }else{
                   $ext = 'V'.($getReturnPeriod - 1);
                }
                $xmlReturnPeriod = request('frm0619F:txtMonth').request('frm0619F:txtYear').request('frm0619F:txtTaxTypeCode').$ext;
            }

            $filename = $tin."-0619F-".$xmlReturnPeriod.'.xml';

            $action = "";
            if(request('form_id') != ""){
                $action ="update";
            }else{
                if($getForm->isEmpty()){
                    $action = "insert";
                }else{
                    $action = "update";
                }
            }

            $data1 = ([
                'user_id'       => Auth::user()->id,
                'company_id'    => request('company'),
                'form_id'       => $form->id,
                'form'          => '0619F',
                'file_name'     => $filename,
                'return_period' => $returnPeriod,
                'status'        => 'Saved',
            ]);

            if($action == "insert"){
                $myXMLFile = fopen("savefile/".$filename, "w");
                fwrite($myXMLFile, $xmlData);
                fclose($myXMLFile);

                $xml_id = Xml::create($data1);

            }else{
                $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '0619F')
                            ->get();

                $path = "savefile/".$getXml[0]->file_name;
                if (file_exists($path)) {
                    unlink($path);
                }

                $myXMLFile = fopen("savefile/".$filename, "w");
                fwrite($myXMLFile, $xmlData);
                fclose($myXMLFile);

                $xml = Xml::find($getXml[0]->id);
                $xml->update($data1);
            }

            echo $filename;
    }
    public function update()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);
       
        $data = ([
            'status'        => 'Filed',
        ]);

        if(request('form_id') != ""){
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', request('form_id'))
                            ->where('form', '0619F')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_0619F::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '0619F')
                            ->get();
            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }
    }
    public function show($company, $action, $form_id)
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);
        
        $company = Companies::find($company);

        $data = tbl_0619F::find($form_id);

        return view('forms.BIR-Form 0619F',['company' => $company, 'data' => $data, 'action' => $action]);
    }
}

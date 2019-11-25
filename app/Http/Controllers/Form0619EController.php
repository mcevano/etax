<?php

namespace App\Http\Controllers;

use App\Xml;
use App\tbl_0619E;
use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form0619EController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);

        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_0619_es')){

            }else{
                Schema::connection('mysql2')->create('tbl_0619_es', function (Blueprint $table) {
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
                    $table->string('item6');
                    $table->string('item12')->nullable();
                    $table->text('item14');
                    $table->text('item15');
                    $table->text('item16');
                    $table->text('item17A');
                    $table->text('item17B');
                    $table->text('item17C');
                    $table->text('item17D');
                    $table->text('item18');
                    $table->timestamps();
                });
            }
	        return view('forms.BIR-Form 0619E',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{
        	$data = tbl_0619E::find($form_id);
            return view('forms.BIR-Form 0619E',['company' => $company, 'data' => $data, 'action' => $action]);
        }
        
    }

    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);

    	$data = ([
     		'form_no' 			=> request('form_no'),
    		'company_id' 		=> request('company'),
    		'item1A' 			=> request('frm0619E:txtMonth'), 
    		'item1B' 			=> request('frm0619E:txtYear'),
    		'item2A' 			=> request('frm0619E:txtDueMonth'),
    		'item2B' 			=> request('frm0619E:txtDueDay'),
    		'item2C' 			=> request('frm0619E:txtDueYear'),
    		'item3' 			=> request('frm0619E:optAmend'),
    		'item4' 			=> null !== request('frm0619E:optWithheld') ? request('frm0619E:optWithheld') : '',
    		'item5' 			=> request('frm0619E:txtAtc'),
    		'item6' 			=> request('frm0619E:txtTaxTypeCode'),
    		'item12' 			=> null !== request('frm0619E:optCategory') ? request('frm0619E:optCategory') : '',
    		'item14' 			=> request('frm0619E:txtTax14'),
    		'item15' 			=> request('frm0619E:txtTax15'),
    		'item16' 			=> request('frm0619E:txtTax16'),
    		'item17A' 			=> request('frm0619E:txtTax17A'),
    		'item17B' 			=> request('frm0619E:txtTax17B'),
    		'item17C' 			=> request('frm0619E:txtTax17C'),
    		'item17D' 			=> request('frm0619E:txtTax17D'),
    		'item18' 			=> request('frm0619E:txtTax18'),
    	]);

    	$getForm = tbl_0619E::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
        if(request('form_id') != ""){
            $form = tbl_0619E::find(request('form_id'));
            $form->update($data);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_0619E::create($data);
            }else{
                $form = tbl_0619E::find($getForm[0]->id);
                $form->update($data);
            }
        }

        $optAmendY = "false";
		$optAmendN = "false";
		if(request('frm0619E:optAmend') == 'Y'){
			$optAmendY = "true";
		}else if(request('frm0619E:optAmend') == 'N'){
			$optAmendN = "true";
		}

		$optWithheldY = "false";
		$optWithheldN = "false";
		if(null !== request('frm0619E:optWithheld')){
			if(request('frm0619E:optWithheld') == 'Y'){
				$optWithheldY = "true";
			}else if(request('frm0619E:optWithheld') == 'N'){
				$optWithheldN = "true";
			}
		}

		$optCategoryP = "";
		$optCategoryG = "";

		if(null !== request('frm0619E:optCategory')){
			if(request('frm0619E:optCategory') == 'P'){
				$optCategoryP = "true";
			}else if(request('frm0619E:optCategory') == 'G'){
				$optCategoryG = "true";
			}
		}

		$taxPayerName =  rawurlencode(request('frm0619E:txtTaxpayerName'));
		$address = rawurlencode(request('frm0619E:txtAddress'));

		$xmlData ="<?xml version='1.0'?>".'            <div>frm0619E:txtMonth='.request('frm0619E:txtMonth').'frm0619E:txtMonth=</div>            <div>frm0619E:txtYear='.request('frm0619E:txtYear').'frm0619E:txtYear=</div>            <div>frm0619E:txtDueMonth='.request('frm0619E:txtDueMonth').'frm0619E:txtDueMonth=</div>            <div>frm0619E:txtDueDay='.request('frm0619E:txtDueDay').'frm0619E:txtDueDay=</div>            <div>frm0619E:txtDueYear='.request('frm0619E:txtDueYear').'frm0619E:txtDueYear=</div>            <div>frm0619E:optAmend:Y='.$optAmendY.'frm0619E:optAmend:Y=</div>            <div>frm0619E:optAmend:N='.$optAmendN.'frm0619E:optAmend:N=</div>            <div>frm0619E:optWithheld:Y='.$optWithheldY.'frm0619E:optWithheld:Y=</div>            <div>frm0619E:optWithheld:N='.$optWithheldN.'frm0619E:optWithheld:N=</div>            <div>frm0619E:txtAtc='.request('frm0619E:txtAtc').'frm0619E:txtAtc=</div>            <div>frm0619E:txtTaxTypeCode='.request('frm0619E:txtTaxTypeCode').'frm0619E:txtTaxTypeCode=</div>            <div>frm0619E:txtTIN1='.request('frm0619E:txtTIN1').'frm0619E:txtTIN1=</div>            <div>frm0619E:txtTIN2='.request('frm0619E:txtTIN2').'frm0619E:txtTIN2=</div>            <div>frm0619E:txtTIN3='.request('frm0619E:txtTIN3').'frm0619E:txtTIN3=</div>            <div>frm0619E:txtBranchCode='.request('frm0619E:txtBranchCode').'frm0619E:txtBranchCode=</div>            <div>frm0619E:txtRDOCode='.request('frm0619E:txtRDOCode').'frm0619E:txtRDOCode=</div>            <div>frm0619E:txtTaxpayerName='.$taxPayerName.'frm0619E:txtTaxpayerName=</div>            <div>frm0619E:txtLineBus='.rawurlencode(request('frm0619E:txtLineBus')).'frm0619E:txtLineBus=</div>            <div>frm0619E:txtAddress='.strtoupper($address).'frm0619E:txtAddress=</div>            <div>frm0619E:txtZipCode='.request('frm0619E:txtZipCode').'frm0619E:txtZipCode=</div>            <div>frm0619E:txtTelNum='.request('frm0619E:txtTelNum').'frm0619E:txtTelNum=</div>            <div>frm0619E:optCategory:P='.$optCategoryP.'frm0619E:optCategory:P=</div>            <div>frm0619E:optCategory:G='.$optCategoryG.'frm0619E:optCategory:G=</div>            <div>txtEmail='.request('txtEmail').'txtEmail=</div>            <div>frm0619E:txtTax14='.request('frm0619E:txtTax14').'frm0619E:txtTax14=</div>            <div>frm0619E:txtTax15='.request('frm0619E:txtTax15').'frm0619E:txtTax15=</div>            <div>frm0619E:txtTax16='.request('frm0619E:txtTax16').'frm0619E:txtTax16=</div>            <div>frm0619E:txtTax17A='.request('frm0619E:txtTax17A').'frm0619E:txtTax17A=</div>            <div>frm0619E:txtTax17B='.request('frm0619E:txtTax17B').'frm0619E:txtTax17B=</div>            <div>frm0619E:txtTax17C='.request('frm0619E:txtTax17C').'frm0619E:txtTax17C=</div>            <div>frm0619E:txtTax17D='.request('frm0619E:txtTax17D').'frm0619E:txtTax17D=</div>            <div>frm0619E:txtTax18='.request('frm0619E:txtTax18').'frm0619E:txtTax18=</div>            <div>txtTaxAgentNo=txtTaxAgentNo=</div>            <div>txtDateIssue=txtDateIssue=</div>            <div>txtDateExpiry=txtDateExpiry=</div>            <div>txtAgency19=txtAgency19=</div>            <div>txtNumber19=txtNumber19=</div>            <div>txtDate19=txtDate19=</div>            <div>txtAmount19=txtAmount19=</div>            <div>txtAgency20=txtAgency20=</div>            <div>txtNumber20=txtNumber20=</div>            <div>txtDate20=txtDate20=</div>            <div>txtAmount20=txtAmount20=</div>            <div>txtAgency21=txtAgency21=</div>            <div>txtNumber21=txtNumber21=</div>            <div>txtDate21=txtDate21=</div>            <div>txtAmount21=txtAmount21=</div>            <div>txtParticular22=txtParticular22=</div>            <div>txtAgency22=txtAgency22=</div>            <div>txtNumber22=txtNumber22=</div>            <div>txtDate22=txtDate22=</div>            <div>txtAmount22=txtAmount22=</div>            <div>txtFinalFlag='.request('txtFinalFlag').'txtFinalFlag=</div>            <div>txtEnroll=NtxtEnroll=</div>            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>            <div>ebirOnlineUsername=ebirOnlineUsername=</div>            <div>ebirOnlineSecret=ebirOnlineSecret=</div>            <div>driveSelectTPExport=driveSelectTPExport=</div>                        All Rights Reserved BIR 2012.';

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

			$tin = request('frm0619E:txtTIN1').request('frm0619E:txtTIN1').request('frm0619E:txtTIN1').request('frm0619E:txtBranchCode');

			$getReturnPeriod = tbl_0619E::where('company_id',  request('company'))
     						->where('item1A', request('frm0619E:txtMonth'))
     						->where('item1B', request('frm0619E:txtYear'))
     						->count();

            $returnPeriod = request('frm0619E:txtMonth')."/".request('frm0619E:txtYear');

     		if($getReturnPeriod == "1"){
     			$xmlReturnPeriod = request('frm0619E:txtMonth').request('frm0619E:txtYear');
     		}else{
                if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '0619E')
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
     			$xmlReturnPeriod = request('frm0619E:txtMonth').request('frm0619E:txtYear').$ext;
     		}

     		$filename = $tin."-0619E-".$xmlReturnPeriod.'.xml';

            $data1 = ([
	     		'user_id'		=> Auth::user()->id,
	     		'company_id'	=> request('company'),
	     		'form_id'		=> $form->id,
	     		'form'			=> '0619E',
	     		'file_name'		=> $filename,
	     		'return_period'	=> $returnPeriod,
	     		'status'		=> 'Saved',
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
     						->where('form', '0619E')
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

        $xml_id = "0";

        if(request('form_id') != ""){
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', request('form_id'))
                            ->where('form', '0619E')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;

            $xml_id = $xml->id;
        }else{
            $getData = tbl_0619E::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '0619E')
                            ->get();
            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;

            $xml_id = $xml->id;
        }

        /*for submission of xml file*/
        $submit = new SubmitClass();
        $stat_id = $submit->getData($xml_id);

        /*for checking status of XML*/
        $check = new CheckClass();
        $status = $check->checkFileStatus($stat_id);
    }
    public function show($company, $action, $form_id)
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);
        
        $company = Companies::find($company);

        $data = tbl_0619E::find($form_id);

        return view('forms.BIR-Form 0619E',['company' => $company, 'data' => $data, 'action' => $action]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1800;
use App\tbl_1800_scheduleA;
use App\tbl_1800_scheduleB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1800Controller extends Controller
{
   	public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1800s')){

            }else{
                Schema::connection('mysql2')->create('tbl_1800s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item1C')->nullable();
                    $table->string('item2');
                    $table->string('item3')->nullable();
                    $table->string('item4')->nullable();
                    $table->string('item10')->nullable();
                    $table->string('item10A')->nullable();
                    $table->string('item11A')->nullable();
                    $table->string('item11B')->nullable();
                    $table->string('item11C')->nullable();
                    $table->string('item11D')->nullable();
                    $table->string('item12')->nullable();
                    $table->text('item13')->nullable();
                    $table->string('item14A')->nullable();
                    $table->string('item14B')->nullable();
                    $table->string('item14C')->nullable();
                    $table->string('item14D')->nullable();
                    $table->string('item15')->nullable();
                    $table->text('item16')->nullable();
                    $table->string('item17')->nullable();
                    $table->string('item17A')->nullable();
                    $table->text('item18A');
                    $table->text('item18B');
                   	$table->text('item19A');
                    $table->text('item19B');
                    $table->text('item20A');
                    $table->text('item20B');
                    $table->text('item21A')->nullable();
                    $table->text('item21B');
                    $table->text('item21C');
                    $table->text('item21D')->nullable();
                    $table->text('item21E');
                    $table->text('item21F');
                    $table->text('item21G')->nullable();
                    $table->text('item21H');
                    $table->text('item21I');
                    $table->text('item21K');
                    $table->text('item21L');
                    $table->text('item22A');
                    $table->text('item22B');
                    $table->text('item23A');
                    $table->text('item23B');
                    $table->text('item24A');
                    $table->text('item24B');
                    $table->text('item25A');
                    $table->text('item25B');
                    $table->text('item25C');
                    $table->text('item26A');
                    $table->text('item26B');
                    $table->text('item26C');
                    $table->text('item26D');
                    $table->text('item27');
                    $table->text('item28A');
                    $table->text('item28B');
                    $table->text('item28C');
                    $table->text('item28D');
                    $table->text('item29');
                    $table->text('overpayment')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1800_schedule_as', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('particulars')->nullable();
					 $table->text('stranger');
					 $table->text('relative');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1800_schedule_bs', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('classification')->nullable();
					 $table->text('area')->nullable();
					 $table->text('location')->nullable();
					 $table->text('property')->nullable();
					 $table->text('stranger');
					 $table->text('relative');
                     $table->timestamps();
                });
            }
           
	       return view('forms.BIR-Form 1800',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_1800::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1800')
                            ->get();
        
        	return view('forms.BIR-Form 1800',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
        
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	$data = ([
    		'form_no'       => request('form_no'),
			'company_id'       => request('company'),
			'item1A'       => request('frm1800:txtDateMonth'),
			'item1B'       => request('frm1800:txtDateDay'),
			'item1C'       => request('frm1800:txtDateYear'),
			'item2'       => request('frm1800:amendedRtn'),
			'item3'       => request('frm1800:txtSheets'),
			'item4'       => request('frm1800:txt4'),
			'item10'       => request('frm1800:txtAddress2'),
			'item10A'       => request('frm1800:txtZipCode2'),
			'item11A'       => request('frm1800:txtDonee1TIN1'),
			'item11B'       => request('frm1800:txtDonee1TIN2'),
			'item11C'       => request('frm1800:txtDonee1TIN3'),
			'item11D'       => request('frm1800:txtDonee1BranchCode'),
			'item12'       => request('frm1800:txtRelationshipDonee1'),
			'item13'       => request('frm1800:txtDonee1Name'),
			'item14A'       => request('frm1800:txtDonee2TIN1'),
			'item14B'       => request('frm1800:txtDonee2TIN2'),
			'item14C'       => request('frm1800:txtDonee2TIN3'),
			'item14D'       => request('frm1800:txtDonee2BranchCode'),
			'item15'       => request('frm1800:txtRelationshipDonee2'),
			'item16'       => request('frm1800:txtDonee2Name'),
			'item17'       => request('frm1800:rdTreaty'),
			'item17A'       => request('frm1800:selTreaty'),
			'item18A'       => request('frm1800:txt18A'),
			'item18B'       => request('frm1800:txt18B'),
			'item19A'       => request('frm1800:txt19A'),
			'item19B'       => request('frm1800:txt19B'),
			'item20A'       => request('frm1800:txt20A'),
			'item20B'       => request('frm1800:txt20B'),
			'item21A'       => request('frm1800:txt21A'),
			'item21B'       => request('frm1800:txt21B'),
			'item21C'       => request('frm1800:txt21C'),
			'item21D'       => request('frm1800:txt21D'),
			'item21E'       => request('frm1800:txt21E'),
			'item21F'       => request('frm1800:txt21F'),
			'item21G'       => request('frm1800:txt21G'),
			'item21H'       => request('frm1800:txt21H'),
			'item21I'       => request('frm1800:txt21I'),
			'item21K'       => request('frm1800:txt21K'),
			'item21L'       => request('frm1800:txt21L'),
			'item22A'       => request('frm1800:txt22A'),
			'item22B'       => request('frm1800:txt22B'),
			'item23A'       => request('frm1800:txt23A'),
			'item23B'       => request('frm1800:txt23B'),
			'item24A'       => request('frm1800:txt24A'),
			'item24B'       => request('frm1800:txt24B'),
			'item25A'       => request('frm1800:txt25A'),
			'item25B'       => request('frm1800:txt25B'),
			'item25C'       => request('frm1800:txt25C'),
			'item26A'       => request('frm1800:txt26A'),
			'item26B'       => request('frm1800:txt26B'),
			'item26C'       => request('frm1800:txt26C'),
			'item26D'       => request('frm1800:txt26D'),
			'item27'       => request('frm1800:txt27'),
			'item28A'       => request('frm1800:txtSurcharge'),
			'item28B'       => request('frm1800:txtInterest'),
			'item28C'       => request('frm1800:txtCompromise'),
			'item28D'       => request('frm1800:txtTotalPenalties'),
			'item29'       => request('frm1800:txt29'),
			'overpayment'       => null !== request('frm1800:opt37') ? request('frm1800:opt37') : '',
    	]);

    	$getForm = tbl_1800::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();
        
        $form = "";
        $trans = "";
        if(request('form_id') != ""){
            $form = tbl_1800::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1800::create($data);
            }else{
                $form = tbl_1800::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_1800_scheduleA::where('form_id', $getForm[0]->id)->delete();
            tbl_1800_scheduleB::where('form_id', $getForm[0]->id)->delete();
        }

        if(null !== request('txtSchedAParticulars')){
        	for ($i=0; $i < count(request('txtSchedAParticulars')) ; $i++) { 
	        	$scheduleA = ([
	        		'form_id'        => $form->id,
					'particulars'    => request('txtSchedAParticulars')[$i],
					'stranger'       => request('txtSchedAStranger')[$i],
					'relative'       => request('txtSchedARelative')[$i],
	        	]);
	        	tbl_1800_scheduleA::create($scheduleA);
	        }
        }

        if(null !== request('txtSchedBClassification')){
        	for ($i=0; $i < count(request('txtSchedBClassification')) ; $i++) { 
	        	$scheduleB = ([
	        		'form_id'       => $form->id,
					'classification'       => request('txtSchedBClassification')[$i],
					'area'       => request('txtSchedBArea')[$i],
					'location'       => request('txtSchedBLocation')[$i],
					'property'       => request('txtSchedBTaxDeclaration')[$i],
					'stranger'       => request('txtSchedBStranger')[$i],
					'relative'       => request('txtSchedBRelative')[$i],
	        	]);
	        	tbl_1800_scheduleB::create($scheduleB);
	        }
        }

        $amendedRtn_1 = "false";
        $amendedRtn_2 = "false";

        if(request('frm1800:amendedRtn') == "Y"){
        	$amendedRtn_1 = "true";
        }else if(request('frm1800:amendedRtn') == "N"){
        	$amendedRtn_2 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm1800:txtDonorName'));

        $address = rawurlencode(request('frm1800:txtAddress1'));

        $rdTreaty_1 = "false";
        $rdTreaty_2 = "false";
        if(request('frm1800:rdTreaty') == "Y"){
        	$rdTreaty_1 = "true";
        }else if(request('frm1800:rdTreaty') == "N"){
        	$rdTreaty_2 = "true";
        }

        $opt37_1 = "false";
        $opt37_2 = "false";

        if(null !==  request('frm1800:opt37')){
        	if(request('frm1800:opt37') == 'R'){
        		$opt37_1 = "true";
        	}else if(request('frm1800:opt37') == 'I'){
        		$opt37_2 = "true";
        	}
        }

        $scheduleA = "";
        if(null !== request('txtSchedAParticulars')){
        	for ($i=0; $i < count(request('txtSchedAParticulars')) ; $i++) { 
	        	$scheduleA .= "<div>chxschedA".$i."=".(null !==  request('chxschedA'.$i.'') ? 'true' : 'false')."chxschedA".$i."=</div>	
            <div>txtSchedAParticulars".$i."=".request('txtSchedAParticulars')[$i]."txtSchedAParticulars".$i."=</div>	
            <div>txtSchedAStranger".$i."=".request('txtSchedAStranger')[$i]."txtSchedAStranger".$i."=</div>	
            <div>txtSchedARelative".$i."=".request('txtSchedARelative')[$i]."txtSchedARelative".$i."=</div>	
           ";
	        }
        }

        $scheduleB = "";
        if(null !== request('txtSchedBClassification')){
        	for ($i=0; $i < count(request('txtSchedBClassification')) ; $i++) { 
	        	$scheduleB .= "<div>chxschedB".$i."=".(null !==  request('chxschedB'.$i.'') ? 'true' : 'false')."chxschedB".$i."=</div>	
            <div>txtSchedBClassification".$i."=".request('txtSchedBClassification')[$i]."txtSchedBClassification".$i."=</div>	
            <div>txtSchedBArea".$i."=".request('txtSchedBArea')[$i]."txtSchedBArea".$i."=</div>	
            <div>txtSchedBLocation".$i."=".request('txtSchedBLocation')[$i]."txtSchedBLocation".$i."=</div>	
            <div>txtSchedBTaxDeclaration".$i."=".request('txtSchedBTaxDeclaration')[$i]."txtSchedBTaxDeclaration".$i."=</div>	
            <div>txtSchedBStranger".$i."=".request('txtSchedBStranger')[$i]."txtSchedBStranger".$i."=</div>	
            <div>txtSchedBRelative".$i."=".request('txtSchedBRelative')[$i]."txtSchedBRelative".$i."=</div>	
            ";
	        }
        }

        $xmlData ="<?xml version='1.0'?>	
            <div>frm1800:txtDateMonth=".request('frm1800:txtDateMonth')."frm1800:txtDateMonth=</div>	
            <div>frm1800:txtDateDay=".request('frm1800:txtDateDay')."frm1800:txtDateDay=</div>	
            <div>frm1800:txtDateYear=".request('frm1800:txtDateYear')."frm1800:txtDateYear=</div>	
            <div>frm1800:amendedRtn_1=".$amendedRtn_1."frm1800:amendedRtn_1=</div>	
            <div>frm1800:amendedRtn_2=".$amendedRtn_2."frm1800:amendedRtn_2=</div>	
            <div>frm1800:txtSheets=".request('frm1800:txtSheets')."frm1800:txtSheets=</div>	
            <div>frm1800:txt4=".request('frm1800:txt4')."frm1800:txt4=</div>	
            <div>frm1800:txtDonorTIN1=".request('frm1800:txtDonorTIN1')."frm1800:txtDonorTIN1=</div>	
            <div>frm1800:txtDonorTIN2=".request('frm1800:txtDonorTIN2')."frm1800:txtDonorTIN2=</div>	
            <div>frm1800:txtDonorTIN3=".request('frm1800:txtDonorTIN3')."frm1800:txtDonorTIN3=</div>	
            <div>frm1800:txtDonorBranchCode=".request('frm1800:txtDonorBranchCode')."frm1800:txtDonorBranchCode=</div>	
            <div>frm1800:txtRDOCode=".request('frm1800:txtRDOCode')."frm1800:txtRDOCode=</div>	
            <div>frm1800:txtTelNum=".request('frm1800:txtTelNum')."frm1800:txtTelNum=</div>	
            <div>frm1800:txtDonorName=".$taxPayerName."frm1800:txtDonorName=</div>	
            <div>frm1800:txtAddress1=".$address."frm1800:txtAddress1=</div>	
            <div>frm1800:txtZipCode1=".request('frm1800:txtZipCode1')."frm1800:txtZipCode1=</div>	
            <div>frm1800:txtAddress2=".rawurlencode(request('frm1800:txtAddress2'))."frm1800:txtAddress2=</div>	
            <div>frm1800:txtZipCode2=".request('frm1800:txtZipCode2')."frm1800:txtZipCode2=</div>	
            <div>frm1800:txtDonee1TIN1=".request('frm1800:txtDonee1TIN1')."frm1800:txtDonee1TIN1=</div>	
            <div>frm1800:txtDonee1TIN2=".request('frm1800:txtDonee1TIN2')."frm1800:txtDonee1TIN2=</div>	
            <div>frm1800:txtDonee1TIN3=".request('frm1800:txtDonee1TIN3')."frm1800:txtDonee1TIN3=</div>	
            <div>frm1800:txtDonee1BranchCode=".request('frm1800:txtDonee1BranchCode')."frm1800:txtDonee1BranchCode=</div>	
            <div>frm1800:txtRelationshipDonee1=".rawurlencode(request('frm1800:txtRelationshipDonee1'))."frm1800:txtRelationshipDonee1=</div>	
            <div>frm1800:txtDonee1Name=".rawurlencode(request('frm1800:txtDonee1Name'))."frm1800:txtDonee1Name=</div>	
            <div>frm1800:txtDonee2TIN1=".request('frm1800:txtDonee2TIN1')."frm1800:txtDonee2TIN1=</div>	
            <div>frm1800:txtDonee2TIN2=".request('frm1800:txtDonee2TIN2')."frm1800:txtDonee2TIN2=</div>	
            <div>frm1800:txtDonee2TIN3=".request('frm1800:txtDonee2TIN3')."frm1800:txtDonee2TIN3=</div>	
            <div>frm1800:txtDonee2BranchCode=".request('frm1800:txtDonee2BranchCode')."frm1800:txtDonee2BranchCode=</div>	
            <div>frm1800:txtRelationshipDonee2=".rawurlencode(request('frm1800:txtRelationshipDonee2'))."frm1800:txtRelationshipDonee2=</div>	
            <div>frm1800:txtDonee2Name=".rawurlencode(request('frm1800:txtDonee2Name'))."frm1800:txtDonee2Name=</div>	
            <div>frm1800:rdTreaty:_1=".$rdTreaty_1."frm1800:rdTreaty:_1=</div>	
            <div>frm1800:rdTreaty:_2=".$rdTreaty_2."frm1800:rdTreaty:_2=</div>	
            <div>frm1800:selTreaty=".request('frm1800:selTreaty')."frm1800:selTreaty=</div>	
            <div>frm1800:txt18A=".request('frm1800:txt18A')."frm1800:txt18A=</div>	
            <div>frm1800:txt18B=".request('frm1800:txt18B')."frm1800:txt18B=</div>	
            <div>frm1800:txt19A=".request('frm1800:txt19A')."frm1800:txt19A=</div>	
            <div>frm1800:txt19B=".request('frm1800:txt19B')."frm1800:txt19B=</div>	
            <div>frm1800:txt20A=".request('frm1800:txt20A')."frm1800:txt20A=</div>	
            <div>frm1800:txt20B=".request('frm1800:txt20B')."frm1800:txt20B=</div>	
            <div>frm1800:txt21A=".request('frm1800:txt21A')."frm1800:txt21A=</div>	
            <div>frm1800:txt21B=".request('frm1800:txt21B')."frm1800:txt21B=</div>	
            <div>frm1800:txt21C=".request('frm1800:txt21C')."frm1800:txt21C=</div>	
            <div>frm1800:txt21D=".request('frm1800:txt21D')."frm1800:txt21D=</div>	
            <div>frm1800:txt21E=".request('frm1800:txt21E')."frm1800:txt21E=</div>	
            <div>frm1800:txt21F=".request('frm1800:txt21F')."frm1800:txt21F=</div>	
            <div>frm1800:txt21G=".request('frm1800:txt21G')."frm1800:txt21G=</div>	
            <div>frm1800:txt21H=".request('frm1800:txt21H')."frm1800:txt21H=</div>	
            <div>frm1800:txt21I=".request('frm1800:txt21I')."frm1800:txt21I=</div>	
            <div>frm1800:txt21K=".request('frm1800:txt21K')."frm1800:txt21K=</div>	
            <div>frm1800:txt21L=".request('frm1800:txt21L')."frm1800:txt21L=</div>	
            <div>frm1800:txt22A=".request('frm1800:txt22A')."frm1800:txt22A=</div>	
            <div>frm1800:txt22B=".request('frm1800:txt22B')."frm1800:txt22B=</div>	
            <div>frm1800:txt23A=".request('frm1800:txt23A')."frm1800:txt23A=</div>	
            <div>frm1800:txt23B=".request('frm1800:txt23B')."frm1800:txt23B=</div>	
            <div>frm1800:txt24A=".request('frm1800:txt24A')."frm1800:txt24A=</div>	
            <div>frm1800:txt24B=".request('frm1800:txt24B')."frm1800:txt24B=</div>	
            <div>frm1800:txt25A=".request('frm1800:txt25A')."frm1800:txt25A=</div>	
            <div>frm1800:txt25B=".request('frm1800:txt25B')."frm1800:txt25B=</div>	
            <div>frm1800:txt25C=".request('frm1800:txt25C')."frm1800:txt25C=</div>	
            <div>frm1800:txt26A=".request('frm1800:txt26A')."frm1800:txt26A=</div>	
            <div>frm1800:txt26B=".request('frm1800:txt26B')."frm1800:txt26B=</div>	
            <div>frm1800:txt26C=".request('frm1800:txt26C')."frm1800:txt26C=</div>	
            <div>frm1800:txt26D=".request('frm1800:txt26D')."frm1800:txt26D=</div>	
            <div>frm1800:txt27=".request('frm1800:txt27')."frm1800:txt27=</div>	
            <div>frm1800:txtSurcharge=".request('frm1800:txtSurcharge')."frm1800:txtSurcharge=</div>	
            <div>frm1800:txtInterest=".request('frm1800:txtInterest')."frm1800:txtInterest=</div>	
            <div>frm1800:txtCompromise=".request('frm1800:txtCompromise')."frm1800:txtCompromise=</div>	
            <div>frm1800:txtTotalPenalties=".request('frm1800:txtTotalPenalties')."frm1800:txtTotalPenalties=</div>	
            <div>frm1800:txt29=".request('frm1800:txt29')."frm1800:txt29=</div>	
            <div>frm1800:opt37:_1=".$opt37_1."frm1800:opt37:_1=</div>	
            <div>frm1800:opt37:_2=".$opt37_2."frm1800:opt37:_2=</div>	
            <div>frm1800:hdnSpsFirstname=".request('frm1800:hdnSpsFirstname')."frm1800:hdnSpsFirstname=</div>	
            <div>frm1800:hdnSpsMidname=".request('frm1800:hdnSpsMidname')."frm1800:hdnSpsMidname=</div>	
            <div>frm1800:hdnSpsLastname=".request('frm1800:hdnSpsLastname')."frm1800:hdnSpsLastname=</div>	
            ".$scheduleA."<div>frm1800:totalStranger=".request('frm1800:totalStranger')."frm1800:totalStranger=</div>	
            <div>frm1800:totalRelative=".request('frm1800:totalRelative')."frm1800:totalRelative=</div>	
            ".$scheduleB."<div>frm1800:totalStrangerB=".request('frm1800:totalStrangerB')."frm1800:totalStrangerB=</div>	
            <div>frm1800:totalRelativeB=".request('frm1800:totalRelativeB')."frm1800:totalRelativeB=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm1800:txtDonorTIN1').request('frm1800:txtDonorTIN2').request('frm1800:txtDonorTIN3').request('frm1800:txtDonorBranchCode');

        $getReturnPeriod = tbl_1800::where('company_id',  request('company'))
                            ->where('item1A', request('frm1800:txtDateMonth'))
                            ->where('item1B', request('frm1800:txtDateDay'))
                            ->where('item1C', request('frm1800:txtDateYear'))
                            ->count();

        $returnPeriod = request('frm1800:txtDateMonth')."/".request('frm1800:txtDateDay')."/".request('frm1800:txtDateYear');
                           
        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm1800:txtDateMonth').request('frm1800:txtDateDay').request('frm1800:txtDateYear');
        }else{
            if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1800')
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

            $xmlReturnPeriod = request('frm1800:txtDateMonth').request('frm1800:txtDateDay').request('frm1800:txtDateYear').$ext;
        }
        $filename = $tin."-1800-".$xmlReturnPeriod.'.xml';

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
                'form'          => '1800',
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
                            ->where('form', '1800')
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
                            ->where('form', '1800')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1800::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1800')
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
        $data = tbl_1800::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1800')
                            ->get();
        
        return view('forms.BIR-Form 1800',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

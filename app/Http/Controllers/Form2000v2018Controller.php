<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2000;
use App\tbl_2000_schedule1;
use App\tbl_2000_schedule2;
use App\tbl_2000_schedule3;
use App\tbl_2000_schedule4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2000v2018Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2000s')){

            }else{
                Schema::connection('mysql2')->create('tbl_2000s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B');
                    $table->string('item2');
                    $table->string('item3')->nullable();
                    $table->string('item10')->nullable();
                    $table->string('item11')->nullable();
                    $table->string('item11_other')->nullable();
                    $table->string('item12')->nullable();
                    $table->string('item13A')->nullable();
                    $table->string('item13B')->nullable();
                    $table->string('item13C')->nullable();
                    $table->text('item14');
                    $table->text('item15A');
                    $table->text('item15B');
                    $table->text('item15C');
                    $table->text('item15D');
                    $table->text('item16');
                    $table->text('item17A');
                    $table->text('item17B');
                    $table->text('item17C');
                    $table->text('item17D');
                    $table->text('item18');
                    $table->text('item19');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2000_schedule1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc')->nullable();
                    $table->text('tax_base')->nullable();
                    $table->text('tax_rate')->nullable();
                    $table->text('tax_due')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2000_schedule2s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date')->nullable();
                    $table->text('receipt')->nullable();
                    $table->text('amount')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2000_schedule3s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date')->nullable();
                    $table->text('receipt')->nullable();
                    $table->text('amount')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2000_schedule4s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('rdo_code')->nullable();
                    $table->text('remittance')->nullable();
                    $table->text('bank')->nullable();
                    $table->text('remitted')->nullable();
                    $table->text('from')->nullable();
                    $table->text('to')->nullable();
                    $table->timestamps();
                });
            }
           
	        return view('forms.BIR-Form 2000v2018',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_2000::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2000v2018')
                            ->get();
        
        	return view('forms.BIR-Form 2000v2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
        
    }

 	public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
        	'form_no'    => request('form_no'),
			'company_id'    => request('company'),
			'item1A'    => request('frm2000:txtMonth'),
			'item1B'    => request('frm2000:txtYear'),
			'item2'    => request('frm2000:AmendedRtn'),
			'item3'    => request('frm2000:txtSheets'),
			'item10'    => null !== request('frm2000:optParty') ? request('frm2000:optParty') : '',
			'item11'    => request('frm2000:txtOtherName'),
			'item11_other'    => request('frm2000:txtOtherName2'),
			'item12'    => request('frm2000:txtOtherTIN'),
			'item13A'    => null !== request('frm2000:optMode_1') ? request('frm2000:optMode_1') : '',
			'item13B'    => null !== request('frm2000:optMode_2') ? request('frm2000:optMode_2') : '',
			'item13C'    => null !== request('frm2000:optMode_3') ? request('frm2000:optMode_3') : '',
			'item14'    => request('frm2000:txtTax14'),
			'item15A'    => request('frm2000:txtTax15A'),
			'item15B'    => request('frm2000:txtTax15B'),
			'item15C'    => request('frm2000:txtTax15C'),
			'item15D'    => request('frm2000:txtTax15D'),
			'item16'    => request('frm2000:txtTax16'),
			'item17A'    => request('frm2000:txtTax17A'),
			'item17B'    => request('frm2000:txtTax17B'),
			'item17C'    => request('frm2000:txtTax17C'),
			'item17D'    => request('frm2000:txtTax17D'),
			'item18'    => request('frm2000:txtTax18'),
			'item19'    => request('frm2000:txtTax19'),
        ]);

        $getForm = tbl_2000::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();
        
        $form = "";
        $trans = "";
        if(request('form_id') != ""){
            $form = tbl_2000::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2000::create($data);
            }else{
                $form = tbl_2000::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_2000_schedule1::where('form_id', $getForm[0]->id)->delete();
            tbl_2000_schedule2::where('form_id', $getForm[0]->id)->delete();
            tbl_2000_schedule3::where('form_id', $getForm[0]->id)->delete();
            tbl_2000_schedule4::where('form_id', $getForm[0]->id)->delete();
        }

        for ($i=0; $i < count(request('drpATCCode')) ; $i++) { 
        	if(request('drpATCCode')[$i] != "-"){
        		$schedule1 = ([
        				"form_id" =>$form->id,
        				"atc"  => request('drpATCCode')[$i],
        				"tax_base"  => request('frm2000:sched1:txtTaxBase')[$i],
        				"tax_rate"  => request('frm2000:sched1:txtTaxRate')[$i],
        				"tax_due"  => request('frm2000:sched1:txtTaxDue')[$i],
        		]);
        		tbl_2000_schedule1::create($schedule1);
        	}
        }

        for ($i=0; $i < count(request('frm2000:sched2:txtPaymentDate')) ; $i++) { 
        	if(request('frm2000:sched2:txtPaymentDate')[$i] != ""){
        		$schedule2 = ([
        				"form_id" =>$form->id,
        				"date"  => request('frm2000:sched2:txtPaymentDate')[$i],
        				"receipt"  => request('frm2000:sched2:txtReceipt')[$i],
        				"amount"  => request('frm2000:sched2:txtAmountPaid')[$i],
        		]);
        		tbl_2000_schedule2::create($schedule2);
        	}
        }

        for ($i=0; $i < count(request('frm2000:sched3:txtPaymentDate')) ; $i++) { 
        	if(request('frm2000:sched3:txtPaymentDate')[$i] != ""){
        		$schedule3 = ([
        				"form_id" =>$form->id,
        				"date"  => request('frm2000:sched3:txtPaymentDate')[$i],
        				"receipt"  => request('frm2000:sched3:txtReceipt')[$i],
        				"amount"  => request('frm2000:sched3:txtAmountPaid')[$i],
        		]);
        		tbl_2000_schedule3::create($schedule3);
        	}
        }

        for ($i=0; $i < count(request('frm2000:sched3:txtPaymentDate')) - 1 ; $i++) { 
        	if(request('frm2000:sched3:txtPaymentDate')[$i] != ""){
        		$schedule4 = ([
        				"form_id" =>$form->id,
        				"rdo_code"  => request('frm2000:sched4:txtRCOCode')[$i],
        				"remittance"  => request('frm2000:sched4:txtRemittanceDate')[$i],
        				"bank"  => request('frm2000:sched4:txtBank')[$i],
        				"remitted"  => request('frm2000:sched4:txtAmountRemitted')[$i],
        				"from"  => request('frm2000:sched4:txtNumberFrom')[$i],
        				"to"  => request('frm2000:sched4:txtNumberTo')[$i],
        		]);
        		tbl_2000_schedule4::create($schedule4);
        	}
        }

        $AmendedRtn_1 = "false";
        $AmendedRtn_2 = "false";

        if(request('frm2000:AmendedRtn') == "Y"){
        	$AmendedRtn_1 = "true";
        }else if(request('frm2000:AmendedRtn') == "N"){
        	$AmendedRtn_2 = "true";
        }

        $lineOfBusiness =  rawurlencode(request('frm2000:txtLineBus'));

        $taxPayerName =  rawurlencode(request('frm2000:txtTaxpayerName'));

        $address = rawurlencode(request('frm2000:txtAddress'));

        $optParty_1 = "false";
        $optParty_2 = "false";
        $optParty_3 = "false";

        if(null !==  request('frm2000:optParty')){
        	if(request('frm2000:optParty') == 'Creditor'){
        		$optParty_1 = "true";
        	}else if(request('frm2000:optParty') == 'Debtor'){
        		$optParty_2 = "true";
        	}else if(request('frm2000:optParty') == 'None'){
        		$optParty_3 = "true";
        	}
        }

        $optMode_1 = "false";
        $optMode_2 = "false";
        $optMode_3 = "false";

        if(null !==  request('frm2000:optMode_1')){
        	$optMode_1 = "true";
        }
        if(null !==  request('frm2000:optMode_2')){
        	$optMode_2 = "true";
        }
        if(null !==  request('frm2000:optMode_3')){
        	$optMode_3 = "true";
        }

        $schedule1 = "";
        if(count(request('drpATCCode')) > 3){
        	$n = "0";
        	for ($i=0; $i < count(request('drpATCCode')) - 3 ; $i++) { 
        		$n = ($i + 3);
        		$schedule1 .= "<div>chkSchedule1Delete".$n."=".(null !==  request('chkSchedule1Delete'.$n.'') ? 'true' : 'false')."chkSchedule1Delete".$n."=</div>	
            <div>drpATCCode".$n."=".request('drpATCCode')[$n]."drpATCCode".$n."=</div>	
            <div>frm2000:sched1:txtTaxBase".$n."=".request('frm2000:sched1:txtTaxBase')[$n]."frm2000:sched1:txtTaxBase".$n."=</div>	
            <div>frm2000:sched1:txtTaxRate".$n."=".request('frm2000:sched1:txtTaxRate')[$n]."frm2000:sched1:txtTaxRate".$n."=</div>	
            <div>frm2000:sched1:txtTaxDue".$n."=".request('frm2000:sched1:txtTaxDue')[$n]."frm2000:sched1:txtTaxDue".$n."=</div>	
            ";
        	}
        }
        
        $schedule2 = "";
        if(count(request('frm2000:sched2:txtPaymentDate')) > 3){
        	$n = "0";
        	for ($i=0; $i < count(request('frm2000:sched2:txtPaymentDate')) - 3 ; $i++) { 
        		$n = ($i + 3);
        		$schedule2 .= "<div>chkSchedule2Delete".$n."=".(null !==  request('chkSchedule2Delete'.$n.'') ? 'true' : 'false')."chkSchedule2Delete".$n."=</div>	
            <div>frm2000:sched2:txtPaymentDate".$n."=".request('frm2000:sched2:txtPaymentDate')[$n]."frm2000:sched2:txtPaymentDate".$n."=</div>	
            <div>frm2000:sched2:txtReceipt".$n."=".request('frm2000:sched2:txtReceipt')[$n]."frm2000:sched2:txtReceipt".$n."=</div>	
            <div>frm2000:sched2:txtAmountPaid".$n."=".request('frm2000:sched2:txtAmountPaid')[$n]."frm2000:sched2:txtAmountPaid".$n."=</div>	
            ";
        	}
        }

        $schedule3 = "";
        if(count(request('frm2000:sched3:txtPaymentDate')) > 3){
        	$n = "0";
        	for ($i=0; $i < count(request('frm2000:sched3:txtPaymentDate')) - 3 ; $i++) { 
        		$n = ($i + 3);
        		$schedule3 .= "<div>chkSchedule3Delete".$n."=".(null !==  request('chkSchedule3Delete'.$n.'') ? 'true' : 'false')."chkSchedule3Delete".$n."=</div>	
            <div>frm2000:sched3:txtPaymentDate".$n."=".request('frm2000:sched3:txtPaymentDate')[$n]."frm2000:sched3:txtPaymentDate".$n."=</div>	
            <div>frm2000:sched3:txtReceipt".$n."=".request('frm2000:sched3:txtReceipt')[$n]."frm2000:sched3:txtReceipt".$n."=</div>	
            <div>frm2000:sched3:txtAmountPaid".$n."=".request('frm2000:sched3:txtAmountPaid')[$n]."frm2000:sched3:txtAmountPaid".$n."=</div>	
            ";
        	}
        }

        $schedule4 = "";
        if(count(request('frm2000:sched4:txtRCOCode')) > 3){
        	$n = "0";
        	for ($i=0; $i < count(request('frm2000:sched4:txtRCOCode')) - 3 ; $i++) { 
        		$n = ($i + 3);
        		$schedule4 .= "<div>chkSchedule4Delete".$n."=".(null !==  request('chkSchedule4Delete'.$n.'') ? 'true' : 'false')."chkSchedule4Delete".$n."=</div>	
            <div>frm2000:sched4:txtRCOCode".$n."=".request('frm2000:sched4:txtRCOCode')[$n]."frm2000:sched4:txtRCOCode".$n."=</div>	
            <div>frm2000:sched4:txtRemittanceDate".$n."=".request('frm2000:sched4:txtRemittanceDate')[$n]."frm2000:sched4:txtRemittanceDate".$n."=</div>	
            <div>frm2000:sched4:txtBank".$n."=".request('frm2000:sched4:txtBank')[$n]."frm2000:sched4:txtBank".$n."=</div>	
            <div>frm2000:sched4:txtAmountRemitted".$n."=".request('frm2000:sched4:txtAmountRemitted')[$n]."frm2000:sched4:txtAmountRemitted".$n."=</div>	
            <div>frm2000:sched4:txtNumberFrom".$n."=".request('frm2000:sched4:txtNumberFrom')[$n]."frm2000:sched4:txtNumberFrom".$n."=</div>	
            <div>frm2000:sched4:txtNumberTo".$n."=".request('frm2000:sched4:txtNumberTo')[$n]."frm2000:sched4:txtNumberTo".$n."=</div>	
            ";
        	}
        }

        $xmlData ="<?xml version='1.0'?>	
            <div>frm2000:txtMonth=".request('frm2000:txtMonth')."frm2000:txtMonth=</div>	
            <div>frm2000:txtYear=".request('frm2000:txtYear')."frm2000:txtYear=</div>	
            <div>frm2000:AmendedRtn_1=".$AmendedRtn_1."frm2000:AmendedRtn_1=</div>	
            <div>frm2000:AmendedRtn_2=".$AmendedRtn_2."frm2000:AmendedRtn_2=</div>	
            <div>frm2000:txtSheets=".request('frm2000:txtSheets')."frm2000:txtSheets=</div>	
            <div>frm2000:txtTIN1=".request('frm2000:txtTIN1')."frm2000:txtTIN1=</div>	
            <div>frm2000:txtTIN2=".request('frm2000:txtTIN2')."frm2000:txtTIN2=</div>	
            <div>frm2000:txtTIN3=".request('frm2000:txtTIN3')."frm2000:txtTIN3=</div>	
            <div>frm2000:txtBranchCode=".request('frm2000:txtBranchCode')."frm2000:txtBranchCode=</div>	
            <div>frm2000:txtRDOCode=".request('frm2000:txtRDOCode')."frm2000:txtRDOCode=</div>	
            <div>frm2000:txtTaxpayerName=".$taxPayerName."frm2000:txtTaxpayerName=</div>	
            <div>frm2000:txtAddress=".$address."frm2000:txtAddress=</div>	
            <div>frm2000:txtZipCode=".request('frm2000:txtZipCode')."frm2000:txtZipCode=</div>	
            <div>frm2000:txtTelNum=".request('frm2000:txtTelNum')."frm2000:txtTelNum=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>frm2000:optParty_1=".$optParty_1."frm2000:optParty_1=</div>	
            <div>frm2000:optParty_2=".$optParty_2."frm2000:optParty_2=</div>	
            <div>frm2000:optParty_3=".$optParty_3."frm2000:optParty_3=</div>	
            <div>frm2000:txtOtherName=".rawurlencode(request('frm2000:txtOtherName'))."frm2000:txtOtherName=</div>	
            <div>frm2000:txtOtherTIN=".request('frm2000:txtOtherTIN')."frm2000:txtOtherTIN=</div>	
            <div>frm2000:optMode_1=".$optMode_1."frm2000:optMode_1=</div>	
            <div>frm2000:optMode_2=".$optMode_2."frm2000:optMode_2=</div>	
            <div>frm2000:optMode_3=".$optMode_3."frm2000:optMode_3=</div>	
            <div>frm2000:txtTax14=".request('frm2000:txtTax14')."frm2000:txtTax14=</div>	
            <div>frm2000:txtTax15A=".request('frm2000:txtTax15A')."frm2000:txtTax15A=</div>	
            <div>frm2000:txtTax15B=".request('frm2000:txtTax15B')."frm2000:txtTax15B=</div>	
            <div>frm2000:txtTax15C=".request('frm2000:txtTax15C')."frm2000:txtTax15C=</div>	
            <div>frm2000:txtTax15D=".request('frm2000:txtTax15D')."frm2000:txtTax15D=</div>	
            <div>frm2000:txtTax16=".request('frm2000:txtTax16')."frm2000:txtTax16=</div>	
            <div>frm2000:txtTax17A=".request('frm2000:txtTax17A')."frm2000:txtTax17A=</div>	
            <div>frm2000:txtTax17B=".request('frm2000:txtTax17B')."frm2000:txtTax17B=</div>	
            <div>frm2000:txtTax17C=".request('frm2000:txtTax17C')."frm2000:txtTax17C=</div>	
            <div>frm2000:txtTax17D=".request('frm2000:txtTax17D')."frm2000:txtTax17D=</div>	
            <div>frm2000:txtTax18=".request('frm2000:txtTax18')."frm2000:txtTax18=</div>	
            <div>frm2000:txtTax19=".request('frm2000:txtTax19')."frm2000:txtTax19=</div>	
            <div>txtTaxAgentNo=txtTaxAgentNo=</div>	
            <div>txtDateIssue=txtDateIssue=</div>	
            <div>txtDateExpiry=txtDateExpiry=</div>	
            <div>frm2000:txtAgency20=frm2000:txtAgency20=</div>	
            <div>frm2000:txtNumber20=frm2000:txtNumber20=</div>	
            <div>frm2000:txtDate20=frm2000:txtDate20=</div>	
            <div>frm2000:txtAmount20=frm2000:txtAmount20=</div>	
            <div>frm2000:txtAgency21=frm2000:txtAgency21=</div>	
            <div>frm2000:txtNumber21=frm2000:txtNumber21=</div>	
            <div>frm2000:txtDate21=frm2000:txtDate21=</div>	
            <div>frm2000:txtAmount21=frm2000:txtAmount21=</div>	
            <div>frm2000:txtAgency22=frm2000:txtAgency22=</div>	
            <div>frm2000:txtNumber22=frm2000:txtNumber22=</div>	
            <div>frm2000:txtDate22=frm2000:txtDate22=</div>	
            <div>frm2000:txtAmount22=frm2000:txtAmount22=</div>	
            <div>frm2000:txtParticular36=frm2000:txtParticular36=</div>	
            <div>frm2000:txtAgency23=frm2000:txtAgency23=</div>	
            <div>frm2000:txtNumber23=frm2000:txtNumber23=</div>	
            <div>frm2000:txtDate23=frm2000:txtDate23=</div>	
            <div>frm2000:txtAmount23=frm2000:txtAmount23=</div>	
            <div>frm2000:txtPg2TIN1=".request('frm2000:txtPg2TIN1')."frm2000:txtPg2TIN1=</div>	
            <div>frm2000:txtPg2TIN2=".request('frm2000:txtPg2TIN2')."frm2000:txtPg2TIN2=</div>	
            <div>frm2000:txtPg2TIN3=".request('frm2000:txtPg2TIN3')."frm2000:txtPg2TIN3=</div>	
            <div>frm2000:txtPg2BranchCode=".request('frm2000:txtPg2BranchCode')."frm2000:txtPg2BranchCode=</div>	
            <div>frm2000:txtPg2TaxpayerName=".request('frm2000:txtPg2TaxpayerName')."frm2000:txtPg2TaxpayerName=</div>	
            <div>chkSchedule1Delete0=".(null !==  request('chkSchedule1Delete0') ? 'true' : 'false')."chkSchedule1Delete0=</div>	
            <div>drpATCCode0=".request('drpATCCode')[0]."drpATCCode0=</div>	
            <div>frm2000:sched1:txtTaxBase0=".request('frm2000:sched1:txtTaxBase')[0]."frm2000:sched1:txtTaxBase0=</div>	
            <div>frm2000:sched1:txtTaxRate0=".request('frm2000:sched1:txtTaxRate')[0]."frm2000:sched1:txtTaxRate0=</div>	
            <div>frm2000:sched1:txtTaxDue0=".request('frm2000:sched1:txtTaxDue')[0]."frm2000:sched1:txtTaxDue0=</div>	
            <div>chkSchedule1Delete1=".(null !==  request('chkSchedule1Delete1') ? 'true' : 'false')."chkSchedule1Delete1=</div>	
            <div>drpATCCode1=".request('drpATCCode')[1]."drpATCCode1=</div>	
            <div>frm2000:sched1:txtTaxBase1=".request('frm2000:sched1:txtTaxBase')[1]."frm2000:sched1:txtTaxBase1=</div>	
            <div>frm2000:sched1:txtTaxRate1=".request('frm2000:sched1:txtTaxRate')[1]."frm2000:sched1:txtTaxRate1=</div>	
            <div>frm2000:sched1:txtTaxDue1=".request('frm2000:sched1:txtTaxDue')[1]."frm2000:sched1:txtTaxDue1=</div>	
            <div>chkSchedule1Delete2=".(null !==  request('chkSchedule1Delete2') ? 'true' : 'false')."chkSchedule1Delete2=</div>	
            <div>drpATCCode2=".request('drpATCCode')[2]."drpATCCode2=</div>	
            <div>frm2000:sched1:txtTaxBase2=".request('frm2000:sched1:txtTaxBase')[2]."frm2000:sched1:txtTaxBase2=</div>	
            <div>frm2000:sched1:txtTaxRate2=".request('frm2000:sched1:txtTaxRate')[2]."frm2000:sched1:txtTaxRate2=</div>	
            <div>frm2000:sched1:txtTaxDue2=".request('frm2000:sched1:txtTaxDue')[2]."frm2000:sched1:txtTaxDue2=</div>	
            ".$schedule1."<div>frm2000:sched1:txtTotalDue1=".request('frm2000:sched1:txtTotalDue1')."frm2000:sched1:txtTotalDue1=</div>	
            <div>chkSchedule2Delete0=".(null !==  request('chkSchedule2Delete0') ? 'true' : 'false')."chkSchedule2Delete0=</div>	
            <div>frm2000:sched2:txtPaymentDate0=".request('frm2000:sched2:txtPaymentDate')[0]."frm2000:sched2:txtPaymentDate0=</div>	
            <div>frm2000:sched2:txtReceipt0=".request('frm2000:sched2:txtReceipt')[0]."frm2000:sched2:txtReceipt0=</div>	
            <div>frm2000:sched2:txtAmountPaid0=".request('frm2000:sched2:txtAmountPaid')[0]."frm2000:sched2:txtAmountPaid0=</div>	
            <div>chkSchedule2Delete1=".(null !==  request('chkSchedule2Delete1') ? 'true' : 'false')."chkSchedule2Delete1=</div>	
            <div>frm2000:sched2:txtPaymentDate1=".request('frm2000:sched2:txtPaymentDate')[1]."frm2000:sched2:txtPaymentDate1=</div>	
            <div>frm2000:sched2:txtReceipt1=".request('frm2000:sched2:txtReceipt')[1]."frm2000:sched2:txtReceipt1=</div>	
            <div>frm2000:sched2:txtAmountPaid1=".request('frm2000:sched2:txtAmountPaid')[1]."frm2000:sched2:txtAmountPaid1=</div>	
            <div>chkSchedule2Delete2=".(null !==  request('chkSchedule2Delete2') ? 'true' : 'false')."chkSchedule2Delete2=</div>	
            <div>frm2000:sched2:txtPaymentDate2=".request('frm2000:sched2:txtPaymentDate')[2]."frm2000:sched2:txtPaymentDate2=</div>	
            <div>frm2000:sched2:txtReceipt2=".request('frm2000:sched2:txtReceipt')[2]."frm2000:sched2:txtReceipt2=</div>	
            <div>frm2000:sched2:txtAmountPaid2=".request('frm2000:sched2:txtAmountPaid')[2]."frm2000:sched2:txtAmountPaid2=</div>	
            ".$schedule2."<div>frm2000:sched2:txtTotalPayment1=".request('frm2000:sched2:txtTotalPayment1')."frm2000:sched2:txtTotalPayment1=</div>	
            <div>chkSchedule3Delete0=".(null !==  request('chkSchedule3Delete0') ? 'true' : 'false')."chkSchedule3Delete0=</div>	
            <div>frm2000:sched3:txtPaymentDate0=".request('frm2000:sched3:txtPaymentDate')[0]."frm2000:sched3:txtPaymentDate0=</div>	
            <div>frm2000:sched3:txtReceipt0=".request('frm2000:sched3:txtReceipt')[0]."frm2000:sched3:txtReceipt0=</div>	
            <div>frm2000:sched3:txtAmountPaid0=".request('frm2000:sched3:txtAmountPaid')[0]."frm2000:sched3:txtAmountPaid0=</div>	
            <div>chkSchedule3Delete1=".(null !==  request('chkSchedule3Delete1') ? 'true' : 'false')."chkSchedule3Delete1=</div>	
            <div>frm2000:sched3:txtPaymentDate1=".request('frm2000:sched3:txtPaymentDate')[1]."frm2000:sched3:txtPaymentDate1=</div>	
            <div>frm2000:sched3:txtReceipt1=".request('frm2000:sched3:txtReceipt')[1]."frm2000:sched3:txtReceipt1=</div>	
            <div>frm2000:sched3:txtAmountPaid1=".request('frm2000:sched3:txtAmountPaid')[1]."frm2000:sched3:txtAmountPaid1=</div>	
            <div>chkSchedule3Delete2=".(null !==  request('chkSchedule3Delete2') ? 'true' : 'false')."chkSchedule3Delete2=</div>	
            <div>frm2000:sched3:txtPaymentDate2=".request('frm2000:sched3:txtPaymentDate')[2]."frm2000:sched3:txtPaymentDate2=</div>	
            <div>frm2000:sched3:txtReceipt2=".request('frm2000:sched3:txtReceipt')[2]."frm2000:sched3:txtReceipt2=</div>	
            <div>frm2000:sched3:txtAmountPaid2=".request('frm2000:sched3:txtAmountPaid')[2]."frm2000:sched3:txtAmountPaid2=</div>	
            ".$schedule3."<div>frm2000:sched3:txtTotalPayment1=".request('frm2000:sched3:txtTotalPayment')."frm2000:sched3:txtTotalPayment1=</div>	
            <div>chkSchedule4Delete0=".(null !==  request('chkSchedule4Delete0') ? 'true' : 'false')."chkSchedule4Delete0=</div>	
            <div>frm2000:sched4:txtRCOCode0=".request('frm2000:sched4:txtRCOCode')[0]."frm2000:sched4:txtRCOCode0=</div>	
            <div>frm2000:sched4:txtRemittanceDate0=".request('frm2000:sched4:txtRemittanceDate')[0]."frm2000:sched4:txtRemittanceDate0=</div>	
            <div>frm2000:sched4:txtBank0=".request('frm2000:sched4:txtBank')[0]."frm2000:sched4:txtBank0=</div>	
            <div>frm2000:sched4:txtAmountRemitted0=".request('frm2000:sched4:txtAmountRemitted')[0]."frm2000:sched4:txtAmountRemitted0=</div>	
            <div>frm2000:sched4:txtNumberFrom0=".request('frm2000:sched4:txtNumberFrom')[0]."frm2000:sched4:txtNumberFrom0=</div>	
            <div>frm2000:sched4:txtNumberTo0=".request('frm2000:sched4:txtNumberTo')[0]."frm2000:sched4:txtNumberTo0=</div>	
            <div>chkSchedule4Delete1=".(null !==  request('chkSchedule4Delete1') ? 'true' : 'false')."chkSchedule4Delete1=</div>	
            <div>frm2000:sched4:txtRCOCode1=".request('frm2000:sched4:txtRCOCode')[1]."frm2000:sched4:txtRCOCode1=</div>	
            <div>frm2000:sched4:txtRemittanceDate1=".request('frm2000:sched4:txtRemittanceDate')[1]."frm2000:sched4:txtRemittanceDate1=</div>	
            <div>frm2000:sched4:txtBank1=".request('frm2000:sched4:txtBank')[1]."frm2000:sched4:txtBank1=</div>	
            <div>frm2000:sched4:txtAmountRemitted1=".request('frm2000:sched4:txtAmountRemitted')[1]."frm2000:sched4:txtAmountRemitted1=</div>	
            <div>frm2000:sched4:txtNumberFrom1=".request('frm2000:sched4:txtNumberFrom')[1]."frm2000:sched4:txtNumberFrom1=</div>	
            <div>frm2000:sched4:txtNumberTo1=".request('frm2000:sched4:txtNumberTo')[1]."frm2000:sched4:txtNumberTo1=</div>	
            <div>chkSchedule4Delete2=".(null !==  request('chkSchedule4Delete2') ? 'true' : 'false')."chkSchedule4Delete2=</div>	
            <div>frm2000:sched4:txtRCOCode2=".request('frm2000:sched4:txtRCOCode')[2]."frm2000:sched4:txtRCOCode2=</div>	
            <div>frm2000:sched4:txtRemittanceDate2=".request('frm2000:sched4:txtRemittanceDate')[2]."frm2000:sched4:txtRemittanceDate2=</div>	
            <div>frm2000:sched4:txtBank2=".request('frm2000:sched4:txtBank')[2]."frm2000:sched4:txtBank2=</div>	
            <div>frm2000:sched4:txtAmountRemitted2=".request('frm2000:sched4:txtAmountRemitted')[2]."frm2000:sched4:txtAmountRemitted2=</div>	
            <div>frm2000:sched4:txtNumberFrom2=".request('frm2000:sched4:txtNumberFrom')[2]."frm2000:sched4:txtNumberFrom2=</div>	
            <div>frm2000:sched4:txtNumberTo2=".request('frm2000:sched4:txtNumberTo')[2]."frm2000:sched4:txtNumberTo2=</div>	
            ".$schedule4."<div>frm2000:sched4:txtTotalRemittance1=".request('frm2000:sched4:txtTotalRemittance1')."frm2000:sched4:txtTotalRemittance1=</div>	
            <div>frm2000:txtCurrentPage=1frm2000:txtCurrentPage=</div>	
            <div>frm2000:txtMaxPage=2frm2000:txtMaxPage=</div>	
            <div>frm2000:txtLineBus=".$lineOfBusiness."frm2000:txtLineBus=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm2000:txtTIN1').request('frm2000:txtTIN2').request('frm2000:txtTIN3').request('frm2000:txtBranchCode');
    	
    	$getReturnPeriod = tbl_2000::where('company_id',  request('company'))
                            ->where('item1A', request('frm2000:txtMonth'))
                            ->where('item1B', request('frm2000:txtYear'))
                            ->count();
        
        $returnPeriod = request('frm2000:txtMonth')."/".request('frm2000:txtYear');
                           
        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm2000:txtMonth').request('frm2000:txtYear');
        }else{
            if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '2000v2018')
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

            $xmlReturnPeriod = request('frm2000:txtMonth').request('frm2000:txtYear').$ext;
        }
        $filename = $tin."-2000v2018-".$xmlReturnPeriod.'.xml';

        

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
                'form'          => '2000v2018',
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
                            ->where('form', '2000v2018')
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
                            ->where('form', '2000v2018')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2000::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2000v2018')
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
        $data = tbl_2000::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2000v2018')
                            ->get();
        
        return view('forms.BIR-Form 2000v2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

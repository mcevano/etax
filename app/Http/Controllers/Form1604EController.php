<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1604E;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1604EController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);

        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1604_es')){

            }else{
                Schema::connection('mysql2')->create('tbl_1604_es', function (Blueprint $table) {
                     $table->increments('id');
                     $table->integer('form_no');
					 $table->integer('company_id'); 
					 $table->string('item1');
					 $table->string('item2');
					 $table->string('item3');
					 $table->string('item11');
					 $table->text('sched1_date1')->nullable();
					 $table->text('sched1_bank1')->nullable();
					 $table->text('sched1_withheld1');
					 $table->text('sched1_penalties1');
					 $table->text('sched1_total1');
					 $table->text('sched1_date2')->nullable();
					 $table->text('sched1_bank2')->nullable();
					 $table->text('sched1_withheld2');
					 $table->text('sched1_penalties2');
					 $table->text('sched1_total2');
					 $table->text('sched1_date3')->nullable();
					 $table->text('sched1_bank3')->nullable();
					 $table->text('sched1_withheld3');
					 $table->text('sched1_penalties3');
					 $table->text('sched1_total3');
					 $table->text('sched1_date4')->nullable();
					 $table->text('sched1_bank4')->nullable();
					 $table->text('sched1_withheld4');
					 $table->text('sched1_penalties4');
					 $table->text('sched1_total4');
					 $table->text('sched1_date5')->nullable();
					 $table->text('sched1_bank5')->nullable();
					 $table->text('sched1_withheld5');
					 $table->text('sched1_penalties5');
					 $table->text('sched1_total5');
					 $table->text('sched1_date6')->nullable();
					 $table->text('sched1_bank6')->nullable();
					 $table->text('sched1_withheld6');
					 $table->text('sched1_penalties6');
					 $table->text('sched1_total6');
					 $table->text('sched1_date7')->nullable();
					 $table->text('sched1_bank7')->nullable();
					 $table->text('sched1_withheld7');
					 $table->text('sched1_penalties7');
					 $table->text('sched1_total7');
					 $table->text('sched1_date8')->nullable();
					 $table->text('sched1_bank8')->nullable();
					 $table->text('sched1_withheld8');
					 $table->text('sched1_penalties8');
					 $table->text('sched1_total8');
					 $table->text('sched1_date9')->nullable();
					 $table->text('sched1_bank9')->nullable();
					 $table->text('sched1_withheld9');
					 $table->text('sched1_penalties9');
					 $table->text('sched1_total9');
					 $table->text('sched1_date10')->nullable();
					 $table->text('sched1_bank10')->nullable();
					 $table->text('sched1_withheld10');
					 $table->text('sched1_penalties10');
					 $table->text('sched1_total10');
					 $table->text('sched1_date11')->nullable();
					 $table->text('sched1_bank11')->nullable();
					 $table->text('sched1_withheld11');
					 $table->text('sched1_penalties11');
					 $table->text('sched1_total11');
					 $table->text('sched1_date12')->nullable();
					 $table->text('sched1_bank12')->nullable();
					 $table->text('sched1_withheld12');
					 $table->text('sched1_penalties12');
					 $table->text('sched1_total12');
					 $table->text('sched1_total_withheld');
					 $table->text('sched1_total_penalties');
					 $table->text('sched1_total_amount');
					 $table->text('sched2_date1')->nullable();
					 $table->text('sched2_bank1')->nullable();
					 $table->text('sched2_withheld1');
					 $table->text('sched2_penalties1');
					 $table->text('sched2_total1');
					 $table->text('sched2_date2')->nullable();
					 $table->text('sched2_bank2')->nullable();
					 $table->text('sched2_withheld2');
					 $table->text('sched2_penalties2');
					 $table->text('sched2_total2');
					 $table->text('sched2_date3')->nullable();
					 $table->text('sched2_bank3')->nullable();
					 $table->text('sched2_withheld3');
					 $table->text('sched2_penalties3');
					 $table->text('sched2_total3');
					 $table->text('sched2_date4')->nullable();
					 $table->text('sched2_bank4')->nullable();
					 $table->text('sched2_withheld4');
					 $table->text('sched2_penalties4');
					 $table->text('sched2_total4');
					 $table->text('sched2_date5')->nullable();
					 $table->text('sched2_bank5')->nullable();
					 $table->text('sched2_withheld5');
					 $table->text('sched2_penalties5');
					 $table->text('sched2_total5');
					 $table->text('sched2_date6')->nullable();
					 $table->text('sched2_bank6')->nullable();
					 $table->text('sched2_withheld6');
					 $table->text('sched2_penalties6');
					 $table->text('sched2_total6');
					 $table->text('sched2_date7')->nullable();
					 $table->text('sched2_bank7')->nullable();
					 $table->text('sched2_withheld7');
					 $table->text('sched2_penalties7');
					 $table->text('sched2_total7');
					 $table->text('sched2_date8')->nullable();
					 $table->text('sched2_bank8')->nullable();
					 $table->text('sched2_withheld8');
					 $table->text('sched2_penalties8');
					 $table->text('sched2_total8');
					 $table->text('sched2_date9')->nullable();
					 $table->text('sched2_bank9')->nullable();
					 $table->text('sched2_withheld9');
					 $table->text('sched2_penalties9');
					 $table->text('sched2_total9');
					 $table->text('sched2_date10')->nullable();
					 $table->text('sched2_bank10')->nullable();
					 $table->text('sched2_withheld10');
					 $table->text('sched2_penalties10');
					 $table->text('sched2_total10');
					 $table->text('sched2_date11')->nullable();
					 $table->text('sched2_bank11')->nullable();
					 $table->text('sched2_withheld11');
					 $table->text('sched2_penalties11');
					 $table->text('sched2_total11');
					 $table->text('sched2_date12')->nullable();
					 $table->text('sched2_bank12')->nullable();
					 $table->text('sched2_withheld12');
					 $table->text('sched2_penalties12');
					 $table->text('sched2_total12');
					 $table->text('sched2_total_withheld');
					 $table->text('sched2_total_penalties');
					 $table->text('sched2_total_amount');
                    $table->timestamps();
                });

            }
            return view('forms.BIR-Form 1604E',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{
        	$data = tbl_1604E::find($form_id);
            return view('forms.BIR-Form 1604E',['company' => $company, 'data' => $data, 'action' => $action]);
        }
    }
    public function store(){

        config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
     		 'form_no' 				=> request('form_no'),
			 'company_id' 			=> request('company'),
			 'item1'				=> request('frm1604e:txtYear'),
			 'item2'				=> request('frm1604e:j_id217'),
			 'item3'				=> request('frm1604e:txtSheets'),
			 'item11'				=> null !== request('frm1604e:j_id392') ? request('frm1604e:j_id392') : '',
			 'sched1_date1'  		=> request('frm1604e:txtSched1Date1'),		
			 'sched1_bank1'  		=> request('frm1604e:txtSched1BankVal1'),
			 'sched1_withheld1'		=> request('frm1604e:txtSched1TaxWheld1'),  
			 'sched1_penalties1'	=> request('frm1604e:txtSched1Pen1'),  
			 'sched1_total1'		=> request('frm1604e:txtSched1TotalAmt1'),  
			 'sched1_date2'  		=> request('frm1604e:txtSched1Date2'),
			 'sched1_bank2'  		=> request('frm1604e:txtSched1BankVal2'),
			 'sched1_withheld2'		=> request('frm1604e:txtSched1TaxWheld2'),  
			 'sched1_penalties2'	=> request('frm1604e:txtSched1Pen2'),
			 'sched1_total2'		=> request('frm1604e:txtSched1TotalAmt2'),		
			 'sched1_date3'  		=> request('frm1604e:txtSched1Date3'),
			 'sched1_bank3'  		=> request('frm1604e:txtSched1BankVal3'),
			 'sched1_withheld3'		=> request('frm1604e:txtSched1TaxWheld3'),  
			 'sched1_penalties3'	=> request('frm1604e:txtSched1Pen3'),
			 'sched1_total3'		=> request('frm1604e:txtSched1TotalAmt3'),
			 'sched1_date4'  		=> request('frm1604e:txtSched1Date4'),
			 'sched1_bank4'  		=> request('frm1604e:txtSched1BankVal4'),
			 'sched1_withheld4'		=> request('frm1604e:txtSched1TaxWheld4'),  
			 'sched1_penalties4'	=> request('frm1604e:txtSched1Pen4'),
			 'sched1_total4'		=> request('frm1604e:txtSched1TotalAmt4'),
			 'sched1_date5'  		=> request('frm1604e:txtSched1Date5'),
			 'sched1_bank5'  		=> request('frm1604e:txtSched1BankVal5'),
			 'sched1_withheld5'		=> request('frm1604e:txtSched1TaxWheld5'),  
			 'sched1_penalties5'	=> request('frm1604e:txtSched1Pen5'),
			 'sched1_total5'		=> request('frm1604e:txtSched1TotalAmt5'),
			 'sched1_date6'  		=> request('frm1604e:txtSched1Date6'),
			 'sched1_bank6'  		=> request('frm1604e:txtSched1BankVal6'),
			 'sched1_withheld6'		=> request('frm1604e:txtSched1TaxWheld6'),  
			 'sched1_penalties6'	=> request('frm1604e:txtSched1Pen6'),
			 'sched1_total6'		=> request('frm1604e:txtSched1TotalAmt6'),
			 'sched1_date7'  		=> request('frm1604e:txtSched1Date7'),
			 'sched1_bank7'  		=> request('frm1604e:txtSched1BankVal7'),
			 'sched1_withheld7'		=> request('frm1604e:txtSched1TaxWheld7'),  
			 'sched1_penalties7'	=> request('frm1604e:txtSched1Pen7'),
			 'sched1_total7'		=> request('frm1604e:txtSched1TotalAmt7'),
			 'sched1_date8'  		=> request('frm1604e:txtSched1Date8'),
			 'sched1_bank8'  		=> request('frm1604e:txtSched1BankVal8'),
			 'sched1_withheld8'		=> request('frm1604e:txtSched1TaxWheld8'),  
			 'sched1_penalties8'	=> request('frm1604e:txtSched1Pen8'),
			 'sched1_total8'		=> request('frm1604e:txtSched1TotalAmt8'),
			 'sched1_date9'  		=> request('frm1604e:txtSched1Date9'),
			 'sched1_bank9'  		=> request('frm1604e:txtSched1BankVal9'),
			 'sched1_withheld9'		=> request('frm1604e:txtSched1TaxWheld9'),  
			 'sched1_penalties9'	=> request('frm1604e:txtSched1Pen9'),
			 'sched1_total9'		=> request('frm1604e:txtSched1TotalAmt9'),
			 'sched1_date10'  		=> request('frm1604e:txtSched1Date10'),
			 'sched1_bank10'  		=> request('frm1604e:txtSched1BankVal10'),
			 'sched1_withheld10'	=> request('frm1604e:txtSched1TaxWheld10'),  
			 'sched1_penalties10'	=> request('frm1604e:txtSched1Pen10'),
			 'sched1_total10'		=> request('frm1604e:txtSched1TotalAmt10'),
			 'sched1_date11'  		=> request('frm1604e:txtSched1Date11'),
			 'sched1_bank11'  		=> request('frm1604e:txtSched1BankVal11'),
			 'sched1_withheld11'  	=> request('frm1604e:txtSched1TaxWheld11'),  
			 'sched1_penalties11'	=> request('frm1604e:txtSched1Pen11'),
			 'sched1_total11'		=> request('frm1604e:txtSched1TotalAmt11'),
			 'sched1_date12'  		=> request('frm1604e:txtSched1Date12'),
			 'sched1_bank12'  		=> request('frm1604e:txtSched1BankVal12'),
			 'sched1_withheld12'  	=> request('frm1604e:txtSched1TaxWheld12'),  
			 'sched1_penalties12'	=> request('frm1604e:txtSched1Pen12'),
			 'sched1_total12'  		=> request('frm1604e:txtSched1TotalAmt12'),
			 'sched1_total_withheld'=> request('frm1604e:txtSched1TaxWheldTotal'),  
			 'sched1_total_penalties'=> request('frm1604e:txtSched1PenTotal'),  
			 'sched1_total_amount'  => request('frm1604e:txtSched1Total'),
			 'sched2_date1'  		=> request('frm1604e:txtSched2Date1'),		
			 'sched2_bank1'  		=> request('frm1604e:txtSched2BankVal1'),
			 'sched2_withheld1'		=> request('frm1604e:txtSched2TaxWheld1'),  
			 'sched2_penalties1'	=> request('frm1604e:txtSched2Pen1'),  
			 'sched2_total1'		=> request('frm1604e:txtSched2TotalAmt1'),  
			 'sched2_date2'  		=> request('frm1604e:txtSched2Date2'),
			 'sched2_bank2'  		=> request('frm1604e:txtSched2BankVal2'),
			 'sched2_withheld2'		=> request('frm1604e:txtSched2TaxWheld2'),  
			 'sched2_penalties2'	=> request('frm1604e:txtSched2Pen2'),
			 'sched2_total2'		=> request('frm1604e:txtSched2TotalAmt2'),		
			 'sched2_date3'  		=> request('frm1604e:txtSched2Date3'),
			 'sched2_bank3'  		=> request('frm1604e:txtSched2BankVal3'),
			 'sched2_withheld3'		=> request('frm1604e:txtSched2TaxWheld3'),  
			 'sched2_penalties3'	=> request('frm1604e:txtSched2Pen3'),
			 'sched2_total3'		=> request('frm1604e:txtSched2TotalAmt3'),
			 'sched2_date4'  		=> request('frm1604e:txtSched2Date4'),
			 'sched2_bank4'  		=> request('frm1604e:txtSched2BankVal4'),
			 'sched2_withheld4'		=> request('frm1604e:txtSched2TaxWheld4'),  
			 'sched2_penalties4'	=> request('frm1604e:txtSched2Pen4'),
			 'sched2_total4'		=> request('frm1604e:txtSched2TotalAmt4'),
			 'sched2_date5'  		=> request('frm1604e:txtSched2Date5'),
			 'sched2_bank5'  		=> request('frm1604e:txtSched2BankVal5'),
			 'sched2_withheld5'		=> request('frm1604e:txtSched2TaxWheld5'),  
			 'sched2_penalties5'	=> request('frm1604e:txtSched2Pen5'),
			 'sched2_total5'		=> request('frm1604e:txtSched2TotalAmt5'),
			 'sched2_date6'  		=> request('frm1604e:txtSched2Date6'),
			 'sched2_bank6'  		=> request('frm1604e:txtSched2BankVal6'),
			 'sched2_withheld6'		=> request('frm1604e:txtSched2TaxWheld6'),  
			 'sched2_penalties6'	=> request('frm1604e:txtSched2Pen6'),
			 'sched2_total6'		=> request('frm1604e:txtSched2TotalAmt6'),
			 'sched2_date7'  		=> request('frm1604e:txtSched2Date7'),
			 'sched2_bank7'  		=> request('frm1604e:txtSched2BankVal7'),
			 'sched2_withheld7'		=> request('frm1604e:txtSched2TaxWheld7'),  
			 'sched2_penalties7'	=> request('frm1604e:txtSched2Pen7'),
			 'sched2_total7'		=> request('frm1604e:txtSched2TotalAmt7'),
			 'sched2_date8'  		=> request('frm1604e:txtSched2Date8'),
			 'sched2_bank8'  		=> request('frm1604e:txtSched2BankVal8'),
			 'sched2_withheld8'		=> request('frm1604e:txtSched2TaxWheld8'),  
			 'sched2_penalties8'	=> request('frm1604e:txtSched2Pen8'),
			 'sched2_total8'		=> request('frm1604e:txtSched2TotalAmt8'),
			 'sched2_date9'  		=> request('frm1604e:txtSched2Date9'),
			 'sched2_bank9'  		=> request('frm1604e:txtSched2BankVal9'),
			 'sched2_withheld9'		=> request('frm1604e:txtSched2TaxWheld9'),  
			 'sched2_penalties9'	=> request('frm1604e:txtSched2Pen9'),
			 'sched2_total9'		=> request('frm1604e:txtSched2TotalAmt9'),
			 'sched2_date10'  		=> request('frm1604e:txtSched2Date10'),
			 'sched2_bank10'  		=> request('frm1604e:txtSched2BankVal10'),
			 'sched2_withheld10'	=> request('frm1604e:txtSched2TaxWheld10'),  
			 'sched2_penalties10'	=> request('frm1604e:txtSched2Pen10'),
			 'sched2_total10'		=> request('frm1604e:txtSched2TotalAmt10'),
			 'sched2_date11'  		=> request('frm1604e:txtSched2Date11'),
			 'sched2_bank11'  		=> request('frm1604e:txtSched2BankVal11'),
			 'sched2_withheld11'  	=> request('frm1604e:txtSched2TaxWheld11'),  
			 'sched2_penalties11'	=> request('frm1604e:txtSched2Pen11'),
			 'sched2_total11'		=> request('frm1604e:txtSched2TotalAmt11'),
			 'sched2_date12'  		=> request('frm1604e:txtSched2Date12'),
			 'sched2_bank12'  		=> request('frm1604e:txtSched2BankVal12'),
			 'sched2_withheld12'  	=> request('frm1604e:txtSched2TaxWheld12'),  
			 'sched2_penalties12'	=> request('frm1604e:txtSched2Pen12'),
			 'sched2_total12'  		=> request('frm1604e:txtSched2TotalAmt12'),
			 'sched2_total_withheld'=> request('frm1604e:txtSched2TaxWheldTotal'),  
			 'sched2_total_penalties'=> request('frm1604e:txtSched2PenTotal'),  
			 'sched2_total_amount'  => request('frm1604e:txtSched2Total'),
    	]);
		
		$getForm = tbl_1604E::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();
		
        $form = "";
        if(request('form_id') != ""){
            $form = tbl_1604E::find(request('form_id'));
            $form->update($data);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1604E::create($data);
            }else{
                $form = tbl_1604E::find($getForm[0]->id);
                $form->update($data);
            }
        }

        $j_id2171 = "false";
        $j_id2172 = "false";

        if(request('frm1604e:j_id217') == "Y"){
            $j_id2171 = "true";
        }else if(request('frm1604e:j_id217') == "N"){
            $j_id2172 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm1604e:txtAgentname'));

        $address = rawurlencode(request('frm1604e:txtAddress'));

        $lineOfBusiness = rawurlencode(request('frm1604e:txtLineBus'));

        $j_id392_1 = "false";
        $j_id392_2 = "false";

        if(null !== request('frm1604e:j_id392')){
            if(request('frm1604e:j_id392') == "P"){
                $j_id392_1 = "true";
            }else if(request('frm1604e:j_id392') == "G"){
                $j_id392_2 = "true";
            }
        }

        $xmlData = "<?xml version='1.0'?>	
            <div>frm1604e:txtYear=".request('frm1604e:txtYear')."frm1604e:txtYear=</div>	
            <div>frm1604e:j_id217:_1=".$j_id2171."frm1604e:j_id217:_1=</div>	
            <div>frm1604e:j_id217:_2=".$j_id2172."frm1604e:j_id217:_2=</div>	
            <div>frm1604e:txtSheets=".request('frm1604e:txtSheets')."frm1604e:txtSheets=</div>	
            <div>frm1604e:txtTIN1=".request('frm1604e:txtTIN1')."frm1604e:txtTIN1=</div>	
            <div>frm1604e:txtTIN2=".request('frm1604e:txtTIN2')."frm1604e:txtTIN2=</div>	
            <div>frm1604e:txtTIN3=".request('frm1604e:txtTIN3')."frm1604e:txtTIN3=</div>	
            <div>frm1604e:txtBranchCode=".request('frm1604e:txtBranchCode')."frm1604e:txtBranchCode=</div>	
            <div>frm1604e:txtRDOCode=".request('frm1604e:txtRDOCode')."frm1604e:txtRDOCode=</div>	
            <div>frm1604e:txtLineBus=".$lineOfBusiness."frm1604e:txtLineBus=</div>	
            <div>frm1604e:txtAgentname=".$taxPayerName."frm1604e:txtAgentname=</div>	
            <div>frm1604e:txtTelNum=".request('frm1604e:txtTelNum')."frm1604e:txtTelNum=</div>	
            <div>frm1604e:txtAddress=".$address."frm1604e:txtAddress=</div>	
            <div>frm1604e:txtZipCode=".request('frm1604e:txtZipCode')."frm1604e:txtZipCode=</div>	
            <div>frm1604e:j_id392:_1=".$j_id392_1."frm1604e:j_id392:_1=</div>	
            <div>frm1604e:j_id392:_2=".$j_id392_2."frm1604e:j_id392:_2=</div>	
            <div>frm1604e:txtSched1Date1=".request('frm1604e:txtSched1Date1')."frm1604e:txtSched1Date1=</div>	
            <div>frm1604e:txtSched1BankVal1=".request('frm1604e:txtSched1BankVal1')."frm1604e:txtSched1BankVal1=</div>	
            <div>frm1604e:txtSched1TaxWheld1=".request('frm1604e:txtSched1TaxWheld1')."frm1604e:txtSched1TaxWheld1=</div>	
            <div>frm1604e:txtSched1Pen1=".request('frm1604e:txtSched1Pen1')."frm1604e:txtSched1Pen1=</div>	
            <div>frm1604e:txtSched1TotalAmt1=".request('frm1604e:txtSched1TotalAmt1')."frm1604e:txtSched1TotalAmt1=</div>	
            <div>frm1604e:txtSched1Date2=".request('frm1604e:txtSched1Date2')."frm1604e:txtSched1Date2=</div>	
            <div>frm1604e:txtSched1BankVal2=".request('frm1604e:txtSched1BankVal2')."frm1604e:txtSched1BankVal2=</div>	
            <div>frm1604e:txtSched1TaxWheld2=".request('frm1604e:txtSched1TaxWheld2')."frm1604e:txtSched1TaxWheld2=</div>	
            <div>frm1604e:txtSched1Pen2=".request('frm1604e:txtSched1Pen2')."frm1604e:txtSched1Pen2=</div>	
            <div>frm1604e:txtSched1TotalAmt2=".request('frm1604e:txtSched1TotalAmt2')."frm1604e:txtSched1TotalAmt2=</div>	
            <div>frm1604e:txtSched1Date3=".request('frm1604e:txtSched1Date3')."frm1604e:txtSched1Date3=</div>	
            <div>frm1604e:txtSched1BankVal3=".request('frm1604e:txtSched1BankVal3')."frm1604e:txtSched1BankVal3=</div>	
            <div>frm1604e:txtSched1TaxWheld3=".request('frm1604e:txtSched1TaxWheld3')."frm1604e:txtSched1TaxWheld3=</div>	
            <div>frm1604e:txtSched1Pen3=".request('frm1604e:txtSched1Pen3')."frm1604e:txtSched1Pen3=</div>	
            <div>frm1604e:txtSched1TotalAmt3=".request('frm1604e:txtSched1TotalAmt3')."frm1604e:txtSched1TotalAmt3=</div>	
            <div>frm1604e:txtSched1Date4=".request('frm1604e:txtSched1Date4')."frm1604e:txtSched1Date4=</div>	
            <div>frm1604e:txtSched1BankVal4=".request('frm1604e:txtSched1BankVal4')."frm1604e:txtSched1BankVal4=</div>	
            <div>frm1604e:txtSched1TaxWheld4=".request('frm1604e:txtSched1TaxWheld4')."frm1604e:txtSched1TaxWheld4=</div>	
            <div>frm1604e:txtSched1Pen4=".request('frm1604e:txtSched1Pen4')."frm1604e:txtSched1Pen4=</div>	
            <div>frm1604e:txtSched1TotalAmt4=".request('frm1604e:txtSched1TotalAmt4')."frm1604e:txtSched1TotalAmt4=</div>	
            <div>frm1604e:txtSched1Date5=".request('frm1604e:txtSched1Date5')."frm1604e:txtSched1Date5=</div>	
            <div>frm1604e:txtSched1BankVal5=".request('frm1604e:txtSched1BankVal5')."frm1604e:txtSched1BankVal5=</div>	
            <div>frm1604e:txtSched1TaxWheld5=".request('frm1604e:txtSched1TaxWheld5')."frm1604e:txtSched1TaxWheld5=</div>	
            <div>frm1604e:txtSched1Pen5=".request('frm1604e:txtSched1Pen5')."frm1604e:txtSched1Pen5=</div>	
            <div>frm1604e:txtSched1TotalAmt5=".request('frm1604e:txtSched1TotalAmt5')."frm1604e:txtSched1TotalAmt5=</div>	
            <div>frm1604e:txtSched1Date6=".request('frm1604e:txtSched1Date6')."frm1604e:txtSched1Date6=</div>	
            <div>frm1604e:txtSched1BankVal6=".request('frm1604e:txtSched1BankVal6')."frm1604e:txtSched1BankVal6=</div>	
            <div>frm1604e:txtSched1TaxWheld6=".request('frm1604e:txtSched1TaxWheld6')."frm1604e:txtSched1TaxWheld6=</div>	
            <div>frm1604e:txtSched1Pen6=".request('frm1604e:txtSched1Pen6')."frm1604e:txtSched1Pen6=</div>	
            <div>frm1604e:txtSched1TotalAmt6=".request('frm1604e:txtSched1TotalAmt6')."frm1604e:txtSched1TotalAmt6=</div>	
            <div>frm1604e:txtSched1Date7=".request('frm1604e:txtSched1Date7')."frm1604e:txtSched1Date7=</div>	
            <div>frm1604e:txtSched1BankVal7=".request('frm1604e:txtSched1BankVal7')."frm1604e:txtSched1BankVal7=</div>	
            <div>frm1604e:txtSched1TaxWheld7=".request('frm1604e:txtSched1TaxWheld7')."frm1604e:txtSched1TaxWheld7=</div>	
            <div>frm1604e:txtSched1Pen7=".request('frm1604e:txtSched1Pen7')."frm1604e:txtSched1Pen7=</div>	
            <div>frm1604e:txtSched1TotalAmt7=".request('frm1604e:txtSched1TotalAmt7')."frm1604e:txtSched1TotalAmt7=</div>	
            <div>frm1604e:txtSched1Date8=".request('frm1604e:txtSched1Date8')."frm1604e:txtSched1Date8=</div>	
            <div>frm1604e:txtSched1BankVal8=".request('frm1604e:txtSched1BankVal8')."frm1604e:txtSched1BankVal8=</div>	
            <div>frm1604e:txtSched1TaxWheld8=".request('frm1604e:txtSched1TaxWheld8')."frm1604e:txtSched1TaxWheld8=</div>	
            <div>frm1604e:txtSched1Pen8=".request('frm1604e:txtSched1Pen8')."frm1604e:txtSched1Pen8=</div>	
            <div>frm1604e:txtSched1TotalAmt8=".request('frm1604e:txtSched1TotalAmt8')."frm1604e:txtSched1TotalAmt8=</div>	
            <div>frm1604e:txtSched1Date9=".request('frm1604e:txtSched1Date9')."frm1604e:txtSched1Date9=</div>	
            <div>frm1604e:txtSched1BankVal9=".request('frm1604e:txtSched1BankVal9')."frm1604e:txtSched1BankVal9=</div>	
            <div>frm1604e:txtSched1TaxWheld9=".request('frm1604e:txtSched1TaxWheld9')."frm1604e:txtSched1TaxWheld9=</div>	
            <div>frm1604e:txtSched1Pen9=".request('frm1604e:txtSched1Pen9')."frm1604e:txtSched1Pen9=</div>	
            <div>frm1604e:txtSched1TotalAmt9=".request('frm1604e:txtSched1TotalAmt9')."frm1604e:txtSched1TotalAmt9=</div>	
            <div>frm1604e:txtSched1Date10=".request('frm1604e:txtSched1Date10')."frm1604e:txtSched1Date10=</div>	
            <div>frm1604e:txtSched1BankVal10=".request('frm1604e:txtSched1BankVal10')."frm1604e:txtSched1BankVal10=</div>	
            <div>frm1604e:txtSched1TaxWheld10=".request('frm1604e:txtSched1TaxWheld10')."frm1604e:txtSched1TaxWheld10=</div>	
            <div>frm1604e:txtSched1Pen10=".request('frm1604e:txtSched1Pen10')."frm1604e:txtSched1Pen10=</div>	
            <div>frm1604e:txtSched1TotalAmt10=".request('frm1604e:txtSched1TotalAmt10')."frm1604e:txtSched1TotalAmt10=</div>	
            <div>frm1604e:txtSched1Date11=".request('frm1604e:txtSched1Date11')."frm1604e:txtSched1Date11=</div>	
            <div>frm1604e:txtSched1BankVal11=".request('frm1604e:txtSched1BankVal11')."frm1604e:txtSched1BankVal11=</div>	
            <div>frm1604e:txtSched1TaxWheld11=".request('frm1604e:txtSched1TaxWheld11')."frm1604e:txtSched1TaxWheld11=</div>	
            <div>frm1604e:txtSched1Pen11=".request('frm1604e:txtSched1Pen11')."frm1604e:txtSched1Pen11=</div>	
            <div>frm1604e:txtSched1TotalAmt11=".request('frm1604e:txtSched1TotalAmt11')."frm1604e:txtSched1TotalAmt11=</div>	
            <div>frm1604e:txtSched1Date12=".request('frm1604e:txtSched1Date12')."frm1604e:txtSched1Date12=</div>	
            <div>frm1604e:txtSched1BankVal12=".request('frm1604e:txtSched1BankVal12')."frm1604e:txtSched1BankVal12=</div>	
            <div>frm1604e:txtSched1TaxWheld12=".request('frm1604e:txtSched1TaxWheld12')."frm1604e:txtSched1TaxWheld12=</div>	
            <div>frm1604e:txtSched1Pen12=".request('frm1604e:txtSched1Pen12')."frm1604e:txtSched1Pen12=</div>	
            <div>frm1604e:txtSched1TotalAmt12=".request('frm1604e:txtSched1TotalAmt12')."frm1604e:txtSched1TotalAmt12=</div>	
            <div>frm1604e:txtSched1TaxWheldTotal=".request('frm1604e:txtSched1TaxWheldTotal')."frm1604e:txtSched1TaxWheldTotal=</div>	
            <div>frm1604e:txtSched1PenTotal=".request('frm1604e:txtSched1PenTotal')."frm1604e:txtSched1PenTotal=</div>	
            <div>frm1604e:txtSched1Total=".request('frm1604e:txtSched1Total')."frm1604e:txtSched1Total=</div>	
            <div>frm1604e:txtSched2Date1=".request('frm1604e:txtSched2Date1')."frm1604e:txtSched2Date1=</div>	
            <div>frm1604e:txtSched2BankVal1=".request('frm1604e:txtSched2BankVal1')."frm1604e:txtSched2BankVal1=</div>	
            <div>frm1604e:txtSched2TaxWheld1=".request('frm1604e:txtSched2TaxWheld1')."frm1604e:txtSched2TaxWheld1=</div>	
            <div>frm1604e:txtSched2Pen1=".request('frm1604e:txtSched2Pen1')."frm1604e:txtSched2Pen1=</div>	
            <div>frm1604e:txtSched2TotalAmt1=".request('frm1604e:txtSched2TotalAmt1')."frm1604e:txtSched2TotalAmt1=</div>	
            <div>frm1604e:txtSched2Date2=".request('frm1604e:txtSched2Date2')."frm1604e:txtSched2Date2=</div>	
            <div>frm1604e:txtSched2BankVal2=".request('frm1604e:txtSched2BankVal2')."frm1604e:txtSched2BankVal2=</div>	
            <div>frm1604e:txtSched2TaxWheld2=".request('frm1604e:txtSched2TaxWheld2')."frm1604e:txtSched2TaxWheld2=</div>	
            <div>frm1604e:txtSched2Pen2=".request('frm1604e:txtSched2Pen2')."frm1604e:txtSched2Pen2=</div>	
            <div>frm1604e:txtSched2TotalAmt2=".request('frm1604e:txtSched2TotalAmt2')."frm1604e:txtSched2TotalAmt2=</div>	
            <div>frm1604e:txtSched2Date3=".request('frm1604e:txtSched2Date3')."frm1604e:txtSched2Date3=</div>	
            <div>frm1604e:txtSched2BankVal3=".request('frm1604e:txtSched2BankVal3')."frm1604e:txtSched2BankVal3=</div>	
            <div>frm1604e:txtSched2TaxWheld3=".request('frm1604e:txtSched2TaxWheld3')."frm1604e:txtSched2TaxWheld3=</div>	
            <div>frm1604e:txtSched2Pen3=".request('frm1604e:txtSched2Pen3')."frm1604e:txtSched2Pen3=</div>	
            <div>frm1604e:txtSched2TotalAmt3=".request('frm1604e:txtSched2TotalAmt3')."frm1604e:txtSched2TotalAmt3=</div>	
            <div>frm1604e:txtSched2Date4=".request('frm1604e:txtSched2Date4')."frm1604e:txtSched2Date4=</div>	
            <div>frm1604e:txtSched2BankVal4=".request('frm1604e:txtSched2BankVal4')."frm1604e:txtSched2BankVal4=</div>	
            <div>frm1604e:txtSched2TaxWheld4=".request('frm1604e:txtSched2TaxWheld4')."frm1604e:txtSched2TaxWheld4=</div>	
            <div>frm1604e:txtSched2Pen4=".request('frm1604e:txtSched2Pen4')."frm1604e:txtSched2Pen4=</div>	
            <div>frm1604e:txtSched2TotalAmt4=".request('frm1604e:txtSched2TotalAmt4')."frm1604e:txtSched2TotalAmt4=</div>	
            <div>frm1604e:txtSched2Date5=".request('frm1604e:txtSched2Date5')."frm1604e:txtSched2Date5=</div>	
            <div>frm1604e:txtSched2BankVal5=".request('frm1604e:txtSched2BankVal5')."frm1604e:txtSched2BankVal5=</div>	
            <div>frm1604e:txtSched2TaxWheld5=".request('frm1604e:txtSched2TaxWheld5')."frm1604e:txtSched2TaxWheld5=</div>	
            <div>frm1604e:txtSched2Pen5=".request('frm1604e:txtSched2Pen5')."frm1604e:txtSched2Pen5=</div>	
            <div>frm1604e:txtSched2TotalAmt5=".request('frm1604e:txtSched2TotalAmt5')."frm1604e:txtSched2TotalAmt5=</div>	
            <div>frm1604e:txtSched2Date6=".request('frm1604e:txtSched2Date6')."frm1604e:txtSched2Date6=</div>	
            <div>frm1604e:txtSched2BankVal6=".request('frm1604e:txtSched2BankVal6')."frm1604e:txtSched2BankVal6=</div>	
            <div>frm1604e:txtSched2TaxWheld6=".request('frm1604e:txtSched2TaxWheld6')."frm1604e:txtSched2TaxWheld6=</div>	
            <div>frm1604e:txtSched2Pen6=".request('frm1604e:txtSched2Pen6')."frm1604e:txtSched2Pen6=</div>	
            <div>frm1604e:txtSched2TotalAmt6=".request('frm1604e:txtSched2TotalAmt6')."frm1604e:txtSched2TotalAmt6=</div>	
            <div>frm1604e:txtSched2Date7=".request('frm1604e:txtSched2Date7')."frm1604e:txtSched2Date7=</div>	
            <div>frm1604e:txtSched2BankVal7=".request('frm1604e:txtSched2BankVal7')."frm1604e:txtSched2BankVal7=</div>	
            <div>frm1604e:txtSched2TaxWheld7=".request('frm1604e:txtSched2TaxWheld7')."frm1604e:txtSched2TaxWheld7=</div>	
            <div>frm1604e:txtSched2Pen7=".request('frm1604e:txtSched2Pen7')."frm1604e:txtSched2Pen7=</div>	
            <div>frm1604e:txtSched2TotalAmt7=".request('frm1604e:txtSched2TotalAmt7')."frm1604e:txtSched2TotalAmt7=</div>	
            <div>frm1604e:txtSched2Date8=".request('frm1604e:txtSched2Date8')."frm1604e:txtSched2Date8=</div>	
            <div>frm1604e:txtSched2BankVal8=".request('frm1604e:txtSched2BankVal8')."frm1604e:txtSched2BankVal8=</div>	
            <div>frm1604e:txtSched2TaxWheld8=".request('frm1604e:txtSched2TaxWheld8')."frm1604e:txtSched2TaxWheld8=</div>	
            <div>frm1604e:txtSched2Pen8=".request('frm1604e:txtSched2Pen8')."frm1604e:txtSched2Pen8=</div>	
            <div>frm1604e:txtSched2TotalAmt8=".request('frm1604e:txtSched2TotalAmt8')."frm1604e:txtSched2TotalAmt8=</div>	
            <div>frm1604e:txtSched2Date9=".request('frm1604e:txtSched2Date9')."frm1604e:txtSched2Date9=</div>	
            <div>frm1604e:txtSched2BankVal9=".request('frm1604e:txtSched2BankVal9')."frm1604e:txtSched2BankVal9=</div>	
            <div>frm1604e:txtSched2TaxWheld9=".request('frm1604e:txtSched2TaxWheld9')."frm1604e:txtSched2TaxWheld9=</div>	
            <div>frm1604e:txtSched2Pen9=".request('frm1604e:txtSched2Pen9')."frm1604e:txtSched2Pen9=</div>	
            <div>frm1604e:txtSched2TotalAmt9=".request('frm1604e:txtSched2TotalAmt9')."frm1604e:txtSched2TotalAmt9=</div>	
            <div>frm1604e:txtSched2Date10=".request('frm1604e:txtSched2Date10')."frm1604e:txtSched2Date10=</div>	
            <div>frm1604e:txtSched2BankVal10=".request('frm1604e:txtSched2BankVal10')."frm1604e:txtSched2BankVal10=</div>	
            <div>frm1604e:txtSched2TaxWheld10=".request('frm1604e:txtSched2TaxWheld10')."frm1604e:txtSched2TaxWheld10=</div>	
            <div>frm1604e:txtSched2Pen10=".request('frm1604e:txtSched2Pen10')."frm1604e:txtSched2Pen10=</div>	
            <div>frm1604e:txtSched2TotalAmt10=".request('frm1604e:txtSched2TotalAmt10')."frm1604e:txtSched2TotalAmt10=</div>	
            <div>frm1604e:txtSched2Date11=".request('frm1604e:txtSched2Date11')."frm1604e:txtSched2Date11=</div>	
            <div>frm1604e:txtSched2BankVal11=".request('frm1604e:txtSched2BankVal11')."frm1604e:txtSched2BankVal11=</div>	
            <div>frm1604e:txtSched2TaxWheld11=".request('frm1604e:txtSched2TaxWheld11')."frm1604e:txtSched2TaxWheld11=</div>	
            <div>frm1604e:txtSched2Pen11=".request('frm1604e:txtSched2Pen11')."frm1604e:txtSched2Pen11=</div>	
            <div>frm1604e:txtSched2TotalAmt11=".request('frm1604e:txtSched2TotalAmt11')."frm1604e:txtSched2TotalAmt11=</div>	
            <div>frm1604e:txtSched2Date12=".request('frm1604e:txtSched2Date12')."frm1604e:txtSched2Date12=</div>	
            <div>frm1604e:txtSched2BankVal12=".request('frm1604e:txtSched2BankVal12')."frm1604e:txtSched2BankVal12=</div>	
            <div>frm1604e:txtSched2TaxWheld12=".request('frm1604e:txtSched2TaxWheld12')."frm1604e:txtSched2TaxWheld12=</div>	
            <div>frm1604e:txtSched2Pen12=".request('frm1604e:txtSched2Pen12')."frm1604e:txtSched2Pen12=</div>	
            <div>frm1604e:txtSched2TotalAmt12=".request('frm1604e:txtSched2TotalAmt12')."frm1604e:txtSched2TotalAmt12=</div>	
            <div>frm1604e:txtSched2TaxWheldTotal=".request('frm1604e:txtSched2TaxWheldTotal')."frm1604e:txtSched2TaxWheldTotal=</div>	
            <div>frm1604e:txtSched2PenTotal=".request('frm1604e:txtSched2PenTotal')."frm1604e:txtSched2PenTotal=</div>	
            <div>frm1604e:txtSched2Total=".request('frm1604e:txtSched2Total')."frm1604e:txtSched2Total=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm1604e:txtTIN1').request('frm1604e:txtTIN2').request('frm1604e:txtTIN3').request('frm1604e:txtBranchCode');

        $getReturnPeriod = tbl_1604E::where('company_id',  request('company'))
     						->where('item1', request('frm1604e:txtYear'))
     						->count();

     	if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm1604e:txtYear');
        }else{
            if(request('form_id') != ""){
					$getXml = Xml::where('user_id', Auth::user()->id)
					        ->where('company_id', request('company'))
					        ->where('form_id', $form->id)
					        ->where('form', '1604E')
					        ->get();
					if($getXml[0]->return_period == request('frm1604e:txtYear')){
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

            $xmlReturnPeriod = request('frm1604e:txtYear').$ext;
        }

        $filename = $tin."-1604E-".$xmlReturnPeriod.'.xml';


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
                'form'          => '1604E',
                'file_name'     => $filename,
                'return_period' =>  request('frm1604e:txtYear'),
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
                            ->where('form', '1604E')
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
                            ->where('form', '1604E')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1604E::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1604E')
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

        $data = tbl_1604E::find($form_id);

        return view('forms.BIR-Form 1604E',['company' => $company, 'data' => $data, 'action' => $action]);
    }
}

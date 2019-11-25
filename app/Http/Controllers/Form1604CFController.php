<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1604CF;
use App\tbl_1604CF_schedule1;
use App\tbl_1604CF_schedule2;
use App\tbl_1604CF_schedule3;
use App\tbl_1604CF_schedule4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1604CFController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);

        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1604_c_fs')){

        	}else{
        		Schema::connection('mysql2')->create('tbl_1604_c_fs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1');
                    $table->string('item2');
                    $table->string('item3')->nullable();
                    $table->string('item11')->nullable();
                    $table->string('item11A')->nullable();
                    $table->string('item11B')->nullable();
                    $table->string('item11C')->nullable();
                    $table->string('item12')->nullable();
                    $table->string('item13')->nullable();
                    $table->string('item14')->nullable();
                    $table->text('sched1_withheld');
                    $table->text('sched1_adjustment');
                    $table->text('sched1_penalties');
                    $table->text('sched1_total');
                    $table->text('sched2_withheld');
                    $table->text('sched2_penalties');
                    $table->text('sched2_total');
                    $table->text('sched3_withheld');
                    $table->text('sched3_penalties');
                    $table->text('sched3_total');
                    $table->text('sched4_withheld');
                    $table->text('sched4_penalties');
                    $table->text('sched4_total');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1604_c_f_schedule1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date')->nullable();
                    $table->text('bank')->nullable();
                    $table->text('withheld');
                    $table->text('adjustment');
                    $table->text('penalties');
                    $table->text('total');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1604_c_f_schedule2s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date')->nullable();
                    $table->text('bank')->nullable();
                    $table->text('withheld');
                    $table->text('penalties');
                    $table->text('total');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1604_c_f_schedule3s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date')->nullable();
                    $table->text('bank')->nullable();
                    $table->text('withheld');
                    $table->text('penalties');
                    $table->text('total');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1604_c_f_schedule4s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date')->nullable();
                    $table->text('bank')->nullable();
                    $table->text('withheld');
                    $table->text('penalties');
                    $table->text('total');
                    $table->timestamps();
                });
        	}
        	return view('forms.BIR-Form 1604CF',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{
            $data = tbl_1604CF::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1604CF')
                            ->get();
        
            return view('forms.BIR-Form 1604CF',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
	}
	
	public function store(){

        config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
        	'form_no'   => request('form_no'),
			'company_id'   => request('company'),
			'item1'   => request('frm1604cf:txtYear'),
			'item2'   => request('frm1604cf:amendedRtn'),
			'item3'   => request('frm1604cf:txtSheets'),
			'item11'   => request('frm1604cf:releasedOfFunds'),
			'item11A'   => request('frm1604cf:txtRefMonth'),
			'item11B'   => request('frm1604cf:txtRefDate'),
			'item11C'   => request('frm1604cf:txtRefYear'),
			'item12'   => request('frm1604cf:txt12'),
			'item13'   => request('frm1604cf:select13'),
			'item14'   => null !== request('frm1604cf:categoryAgent') ? request('frm1604cf:categoryAgent') : '',
			'sched1_withheld'   => request('frm1604cf:txtSched1TaxWheldTotal'),
			'sched1_adjustment'   => request('frm1604cf:txtSched1AdjTotal'),
			'sched1_penalties'   => request('frm1604cf:txtSched1PenTotal'),
			'sched1_total'   => request('frm1604cf:txtSched1Total'),
			'sched2_withheld'   => request('frm1604cf:txtSched2TaxWheldTotal'),
			'sched2_penalties'   => request('frm1604cf:txtSched2PenTotal'),
			'sched2_total'   => request('frm1604cf:txtSched2Total'),
			'sched3_withheld'   => request('frm1604cf:txtSched3TaxWheldTotal'),
			'sched3_penalties'   => request('frm1604cf:txtSched3PenTotal'),
			'sched3_total'   => request('frm1604cf:txtSched3Total'),
			'sched4_withheld'   => request('frm1604cf:txtSched4TaxWheldTotal'),
			'sched4_penalties'   => request('frm1604cf:txtSched4PenTotal'),
			'sched4_total'   => request('frm1604cf:txtSched4Total'),
        ]);

        $getForm = tbl_1604CF::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

        $form = "";
        $trans = "";
        if(request('form_id') != ""){
            $form = tbl_1604CF::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1604CF::create($data);
            }else{
                $form = tbl_1604CF::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_1604CF_schedule1::where('form_id', $getForm[0]->id)->delete();
        	tbl_1604CF_schedule2::where('form_id', $getForm[0]->id)->delete();
        	tbl_1604CF_schedule3::where('form_id', $getForm[0]->id)->delete();
        	tbl_1604CF_schedule4::where('form_id', $getForm[0]->id)->delete();
        }

        for ($i=1; $i < 12 ; $i++) { 
        	if(request('frm1604cf:txtSched1TotalAmt'.$i.'') != '0.00'){
        		$schedule1 = ([
                    'form_id'   => $form->id,
					'date'   => request('frm1604cf:txtSched1Date'.$i.''),
					'bank'   => request('frm1604cf:txtSched1BankVal'.$i.''),
					'withheld'   => request('frm1604cf:txtSched1TaxWheld'.$i.''),
					'adjustment'   => request('frm1604cf:txtSched1Adj'.$i.''),
					'penalties'   => request('frm1604cf:txtSched1Pen'.$i.''),
					'total'   => request('frm1604cf:txtSched1TotalAmt'.$i.''),
                ]);
                tbl_1604CF_schedule1::create($schedule1);
        	}
        }

        for ($x=1; $x < 12 ; $x++) { 
        	if(request('frm1604cf:txtSched2TotalAmt'.$x.'') != '0.00'){
        		$schedule2 = ([
                    'form_id'   => $form->id,
					'date'   => request('frm1604cf:txtSched2Date'.$x.''),
					'bank'   => request('frm1604cf:txtSched2BankVal'.$x.''),
					'withheld'   => request('frm1604cf:txtSched2TaxWheld'.$x.''),
					'penalties'   => request('frm1604cf:txtSched2Pen'.$x.''),
					'total'   => request('frm1604cf:txtSched2TotalAmt'.$x.''),
                ]);
                tbl_1604CF_schedule2::create($schedule2);
        	}
        }

        for ($y=1; $y < 12 ; $y++) { 
        	if(request('frm1604cf:txtSched3TotalAmt'.$y.'') != '0.00'){
        		$schedule3 = ([
                    'form_id'   => $form->id,
					'date'   => request('frm1604cf:txtSched3Date'.$y.''),
					'bank'   => request('frm1604cf:txtSched3BankVal'.$y.''),
					'withheld'   => request('frm1604cf:txtSched3TaxWheld'.$y.''),
					'penalties'   => request('frm1604cf:txtSched3Pen'.$y.''),
					'total'   => request('frm1604cf:txtSched3TotalAmt'.$y.''),
                ]);
                tbl_1604CF_schedule3::create($schedule3);
        	}
        }

        for ($z=1; $z < 4 ; $z++) { 
        	if(request('frm1604cf:txtSched4TotalAmt'.$z.'') != '0.00'){
        		$schedule4 = ([
                    'form_id'   => $form->id,
					'date'   => request('frm1604cf:txtSched4Date'.$z.''),
					'bank'   => request('frm1604cf:txtSched4BankVal'.$z.''),
					'withheld'   => request('frm1604cf:txtSched4TaxWheld'.$z.''),
					'penalties'   => request('frm1604cf:txtSched4Pen'.$z.''),
					'total'   => request('frm1604cf:txtSched4TotalAmt'.$z.''),
                ]);
                tbl_1604CF_schedule4::create($schedule4);
        	}
        }

        $amendedRtn_1 = "false";
        $amendedRtn_2 = "false";

        if(request('frm1604cf:amendedRtn') == "Y"){
			$amendedRtn_1 = "true";
		}else if(request('frm1604cf:amendedRtn') == "N"){
			$amendedRtn_2 = "true";
		}

        $taxPayerName =  rawurlencode(request('frm1604cf:registeredName'));
 
        $address = rawurlencode(request('frm1604cf:registeredAddress'));

        $location = rawurlencode(request('frm1604cf:description'));

        $releasedOfFunds_1 = "false";
        $releasedOfFunds_2 = "false";

        if(request('frm1604cf:releasedOfFunds') == "Y"){
			$releasedOfFunds_1 = "true";
		}else if(request('frm1604cf:releasedOfFunds') == "N"){
			$releasedOfFunds_2 = "true";
		}

		$categoryAgent_1 = "false";
		$categoryAgent_2 = "false";
		if(null !== request('frm1604cf:categoryAgent')){
			if(request('frm1604cf:categoryAgent') == 'P'){
				$categoryAgent_1 = "true";
			}else if(request('frm1604cf:categoryAgent') == 'G'){
				$categoryAgent_2 = "true";
			}
		}

        $xmlData = "<?xml version='1.0'?>	
            <div>frm1604cf:txtYear=".request('frm1604cf:txtYear')."frm1604cf:txtYear=</div>	
            <div>frm1604cf:amendedRtn_1=".$amendedRtn_1."frm1604cf:amendedRtn_1=</div>	
            <div>frm1604cf:amendedRtn_2=".$amendedRtn_2."frm1604cf:amendedRtn_2=</div>	
            <div>frm1604cf:txtSheets=".request('frm1604cf:txtSheets')."frm1604cf:txtSheets=</div>	
            <div>frm1604cf:tinA=".request('frm1604cf:tinA')."frm1604cf:tinA=</div>	
            <div>frm1604cf:tinB=".request('frm1604cf:tinB')."frm1604cf:tinB=</div>	
            <div>frm1604cf:tinC=".request('frm1604cf:tinC')."frm1604cf:tinC=</div>	
            <div>frm1604cf:branchCode=".request('frm1604cf:branchCode')."frm1604cf:branchCode=</div>	
            <div>frm1604cf:rdoCode=".request('frm1604cf:rdoCode')."frm1604cf:rdoCode=</div>	
            <div>frm1604cf:description=".$location."frm1604cf:description=</div>	
            <div>frm1604cf:registeredName=".$taxPayerName."frm1604cf:registeredName=</div>	
            <div>frm1604cf:telephoneNumber=".request('frm1604cf:telephoneNumber')."frm1604cf:telephoneNumber=</div>	
            <div>frm1604cf:registeredAddress=".$address."frm1604cf:registeredAddress=</div>	
            <div>frm1604cf:zipCode=".request('frm1604cf:zipCode')."frm1604cf:zipCode=</div>	
            <div>frm1604cf:releasedOfFunds_1=".$releasedOfFunds_1."frm1604cf:releasedOfFunds_1=</div>	
            <div>frm1604cf:releasedOfFunds_2=".$releasedOfFunds_2."frm1604cf:releasedOfFunds_2=</div>	
            <div>frm1604cf:txtRefMonth=".request('frm1604cf:txtRefMonth')."frm1604cf:txtRefMonth=</div>	
            <div>frm1604cf:txtRefDate=".request('frm1604cf:txtRefDate')."frm1604cf:txtRefDate=</div>	
            <div>frm1604cf:txtRefYear=".request('frm1604cf:txtRefYear')."frm1604cf:txtRefYear=</div>	
            <div>frm1604cf:txt12=".request('frm1604cf:txt12')."frm1604cf:txt12=</div>	
            <div>frm1604cf:select13=".request('frm1604cf:select13')."frm1604cf:select13=</div>	
            <div>frm1604cf:categoryAgent_1=".$categoryAgent_1."frm1604cf:categoryAgent_1=</div>	
            <div>frm1604cf:categoryAgent_2=".$categoryAgent_2."frm1604cf:categoryAgent_2=</div>	
            <div>frm1604cf:txtSched1Date1=".request('frm1604cf:txtSched1Date1')."frm1604cf:txtSched1Date1=</div>	
            <div>frm1604cf:txtSched1BankVal1=".request('frm1604cf:txtSched1BankVal1')."frm1604cf:txtSched1BankVal1=</div>	
            <div>frm1604cf:txtSched1TaxWheld1=".request('frm1604cf:txtSched1TaxWheld1')."frm1604cf:txtSched1TaxWheld1=</div>	
            <div>frm1604cf:txtSched1Adj1=".request('frm1604cf:txtSched1Adj1')."frm1604cf:txtSched1Adj1=</div>	
            <div>frm1604cf:txtSched1Pen1=".request('frm1604cf:txtSched1Pen1')."frm1604cf:txtSched1Pen1=</div>	
            <div>frm1604cf:txtSched1TotalAmt1=".request('frm1604cf:txtSched1TotalAmt1')."frm1604cf:txtSched1TotalAmt1=</div>	
            <div>frm1604cf:txtSched1Date2=".request('frm1604cf:txtSched1Date2')."frm1604cf:txtSched1Date2=</div>	
            <div>frm1604cf:txtSched1BankVal2=".request('frm1604cf:txtSched1BankVal2')."frm1604cf:txtSched1BankVal2=</div>	
            <div>frm1604cf:txtSched1TaxWheld2=".request('frm1604cf:txtSched1TaxWheld2')."frm1604cf:txtSched1TaxWheld2=</div>	
            <div>frm1604cf:txtSched1Adj2=".request('frm1604cf:txtSched1Adj2')."frm1604cf:txtSched1Adj2=</div>	
            <div>frm1604cf:txtSched1Pen2=".request('frm1604cf:txtSched1Pen2')."frm1604cf:txtSched1Pen2=</div>	
            <div>frm1604cf:txtSched1TotalAmt2=".request('frm1604cf:txtSched1TotalAmt2')."frm1604cf:txtSched1TotalAmt2=</div>	
            <div>frm1604cf:txtSched1Date3=".request('frm1604cf:txtSched1Date3')."frm1604cf:txtSched1Date3=</div>	
            <div>frm1604cf:txtSched1BankVal3=".request('frm1604cf:txtSched1BankVal3')."frm1604cf:txtSched1BankVal3=</div>	
            <div>frm1604cf:txtSched1TaxWheld3=".request('frm1604cf:txtSched1TaxWheld3')."frm1604cf:txtSched1TaxWheld3=</div>	
            <div>frm1604cf:txtSched1Adj3=".request('frm1604cf:txtSched1Adj3')."frm1604cf:txtSched1Adj3=</div>	
            <div>frm1604cf:txtSched1Pen3=".request('frm1604cf:txtSched1Pen3')."frm1604cf:txtSched1Pen3=</div>	
            <div>frm1604cf:txtSched1TotalAmt3=".request('frm1604cf:txtSched1TotalAmt3')."frm1604cf:txtSched1TotalAmt3=</div>	
            <div>frm1604cf:txtSched1Date4=".request('frm1604cf:txtSched1Date4')."frm1604cf:txtSched1Date4=</div>	
            <div>frm1604cf:txtSched1BankVal4=".request('frm1604cf:txtSched1BankVal4')."frm1604cf:txtSched1BankVal4=</div>	
            <div>frm1604cf:txtSched1TaxWheld4=".request('frm1604cf:txtSched1TaxWheld4')."frm1604cf:txtSched1TaxWheld4=</div>	
            <div>frm1604cf:txtSched1Adj4=".request('frm1604cf:txtSched1Adj4')."frm1604cf:txtSched1Adj4=</div>	
            <div>frm1604cf:txtSched1Pen4=".request('frm1604cf:txtSched1Pen4')."frm1604cf:txtSched1Pen4=</div>	
            <div>frm1604cf:txtSched1TotalAmt4=".request('frm1604cf:txtSched1TotalAmt4')."frm1604cf:txtSched1TotalAmt4=</div>	
            <div>frm1604cf:txtSched1Date5=".request('frm1604cf:txtSched1Date5')."frm1604cf:txtSched1Date5=</div>	
            <div>frm1604cf:txtSched1BankVal5=".request('frm1604cf:txtSched1BankVal5')."frm1604cf:txtSched1BankVal5=</div>	
            <div>frm1604cf:txtSched1TaxWheld5=".request('frm1604cf:txtSched1TaxWheld5')."frm1604cf:txtSched1TaxWheld5=</div>	
            <div>frm1604cf:txtSched1Adj5=".request('frm1604cf:txtSched1Adj5')."frm1604cf:txtSched1Adj5=</div>	
            <div>frm1604cf:txtSched1Pen5=".request('frm1604cf:txtSched1Pen5')."frm1604cf:txtSched1Pen5=</div>	
            <div>frm1604cf:txtSched1TotalAmt5=".request('frm1604cf:txtSched1TotalAmt5')."frm1604cf:txtSched1TotalAmt5=</div>	
            <div>frm1604cf:txtSched1Date6=".request('frm1604cf:txtSched1Date6')."frm1604cf:txtSched1Date6=</div>	
            <div>frm1604cf:txtSched1BankVal6=".request('frm1604cf:txtSched1BankVal6')."frm1604cf:txtSched1BankVal6=</div>	
            <div>frm1604cf:txtSched1TaxWheld6=".request('frm1604cf:txtSched1TaxWheld6')."frm1604cf:txtSched1TaxWheld6=</div>	
            <div>frm1604cf:txtSched1Adj6=".request('frm1604cf:txtSched1Adj6')."frm1604cf:txtSched1Adj6=</div>	
            <div>frm1604cf:txtSched1Pen6=".request('frm1604cf:txtSched1Pen6')."frm1604cf:txtSched1Pen6=</div>	
            <div>frm1604cf:txtSched1TotalAmt6=".request('frm1604cf:txtSched1TotalAmt6')."frm1604cf:txtSched1TotalAmt6=</div>	
            <div>frm1604cf:txtSched1Date7=".request('frm1604cf:txtSched1Date7')."frm1604cf:txtSched1Date7=</div>	
            <div>frm1604cf:txtSched1BankVal7=".request('frm1604cf:txtSched1BankVal7')."frm1604cf:txtSched1BankVal7=</div>	
            <div>frm1604cf:txtSched1TaxWheld7=".request('frm1604cf:txtSched1TaxWheld7')."frm1604cf:txtSched1TaxWheld7=</div>	
            <div>frm1604cf:txtSched1Adj7=".request('frm1604cf:txtSched1Adj7')."frm1604cf:txtSched1Adj7=</div>	
            <div>frm1604cf:txtSched1Pen7=".request('frm1604cf:txtSched1Pen7')."frm1604cf:txtSched1Pen7=</div>	
            <div>frm1604cf:txtSched1TotalAmt7=".request('frm1604cf:txtSched1TotalAmt7')."frm1604cf:txtSched1TotalAmt7=</div>	
            <div>frm1604cf:txtSched1Date8=".request('frm1604cf:txtSched1Date8')."frm1604cf:txtSched1Date8=</div>	
            <div>frm1604cf:txtSched1BankVal8=".request('frm1604cf:txtSched1BankVal8')."frm1604cf:txtSched1BankVal8=</div>	
            <div>frm1604cf:txtSched1TaxWheld8=".request('frm1604cf:txtSched1TaxWheld8')."frm1604cf:txtSched1TaxWheld8=</div>	
            <div>frm1604cf:txtSched1Adj8=".request('frm1604cf:txtSched1Adj8')."frm1604cf:txtSched1Adj8=</div>	
            <div>frm1604cf:txtSched1Pen8=".request('frm1604cf:txtSched1Pen8')."frm1604cf:txtSched1Pen8=</div>	
            <div>frm1604cf:txtSched1TotalAmt8=".request('frm1604cf:txtSched1TotalAmt8')."frm1604cf:txtSched1TotalAmt8=</div>	
            <div>frm1604cf:txtSched1Date9=".request('frm1604cf:txtSched1Date9')."frm1604cf:txtSched1Date9=</div>	
            <div>frm1604cf:txtSched1BankVal9=".request('frm1604cf:txtSched1BankVal9')."frm1604cf:txtSched1BankVal9=</div>	
            <div>frm1604cf:txtSched1TaxWheld9=".request('frm1604cf:txtSched1TaxWheld9')."frm1604cf:txtSched1TaxWheld9=</div>	
            <div>frm1604cf:txtSched1Adj9=".request('frm1604cf:txtSched1Adj9')."frm1604cf:txtSched1Adj9=</div>	
            <div>frm1604cf:txtSched1Pen9=".request('frm1604cf:txtSched1Pen9')."frm1604cf:txtSched1Pen9=</div>	
            <div>frm1604cf:txtSched1TotalAmt9=".request('frm1604cf:txtSched1TotalAmt9')."frm1604cf:txtSched1TotalAmt9=</div>	
            <div>frm1604cf:txtSched1Date10=".request('frm1604cf:txtSched1Date10')."frm1604cf:txtSched1Date10=</div>	
            <div>frm1604cf:txtSched1BankVal10=".request('frm1604cf:txtSched1BankVal10')."frm1604cf:txtSched1BankVal10=</div>	
            <div>frm1604cf:txtSched1TaxWheld10=".request('frm1604cf:txtSched1TaxWheld10')."frm1604cf:txtSched1TaxWheld10=</div>	
            <div>frm1604cf:txtSched1Adj10=".request('frm1604cf:txtSched1Adj10')."frm1604cf:txtSched1Adj10=</div>	
            <div>frm1604cf:txtSched1Pen10=".request('frm1604cf:txtSched1Pen10')."frm1604cf:txtSched1Pen10=</div>	
            <div>frm1604cf:txtSched1TotalAmt10=".request('frm1604cf:txtSched1TotalAmt10')."frm1604cf:txtSched1TotalAmt10=</div>	
            <div>frm1604cf:txtSched1Date11=".request('frm1604cf:txtSched1Date11')."frm1604cf:txtSched1Date11=</div>	
            <div>frm1604cf:txtSched1BankVal11=".request('frm1604cf:txtSched1BankVal11')."frm1604cf:txtSched1BankVal11=</div>	
            <div>frm1604cf:txtSched1TaxWheld11=".request('frm1604cf:txtSched1TaxWheld11')."frm1604cf:txtSched1TaxWheld11=</div>	
            <div>frm1604cf:txtSched1Adj11=".request('frm1604cf:txtSched1Adj11')."frm1604cf:txtSched1Adj11=</div>	
            <div>frm1604cf:txtSched1Pen11=".request('frm1604cf:txtSched1Pen11')."frm1604cf:txtSched1Pen11=</div>	
            <div>frm1604cf:txtSched1TotalAmt11=".request('frm1604cf:txtSched1TotalAmt11')."frm1604cf:txtSched1TotalAmt11=</div>	
            <div>frm1604cf:txtSched1Date12=".request('frm1604cf:txtSched1Date12')."frm1604cf:txtSched1Date12=</div>	
            <div>frm1604cf:txtSched1BankVal12=".request('frm1604cf:txtSched1BankVal12')."frm1604cf:txtSched1BankVal12=</div>	
            <div>frm1604cf:txtSched1TaxWheld12=".request('frm1604cf:txtSched1TaxWheld12')."frm1604cf:txtSched1TaxWheld12=</div>	
            <div>frm1604cf:txtSched1Adj12=".request('frm1604cf:txtSched1Adj12')."frm1604cf:txtSched1Adj12=</div>	
            <div>frm1604cf:txtSched1Pen12=".request('frm1604cf:txtSched1Pen12')."frm1604cf:txtSched1Pen12=</div>	
            <div>frm1604cf:txtSched1TotalAmt12=".request('frm1604cf:txtSched1TotalAmt12')."frm1604cf:txtSched1TotalAmt12=</div>	
            <div>frm1604cf:txtSched1TaxWheldTotal=".request('frm1604cf:txtSched1TaxWheldTotal')."frm1604cf:txtSched1TaxWheldTotal=</div>	
            <div>frm1604cf:txtSched1AdjTotal=".request('frm1604cf:txtSched1AdjTotal')."frm1604cf:txtSched1AdjTotal=</div>	
            <div>frm1604cf:txtSched1PenTotal=".request('frm1604cf:txtSched1PenTotal')."frm1604cf:txtSched1PenTotal=</div>	
            <div>frm1604cf:txtSched1Total=".request('frm1604cf:txtSched1Total')."frm1604cf:txtSched1Total=</div>	
            <div>frm1604cf:txtSched2Date1=".request('frm1604cf:txtSched2Date1')."frm1604cf:txtSched2Date1=</div>	
            <div>frm1604cf:txtSched2BankVal1=".request('frm1604cf:txtSched2BankVal1')."frm1604cf:txtSched2BankVal1=</div>	
            <div>frm1604cf:txtSched2TaxWheld1=".request('frm1604cf:txtSched2TaxWheld1')."frm1604cf:txtSched2TaxWheld1=</div>	
            <div>frm1604cf:txtSched2Pen1=".request('frm1604cf:txtSched2Pen1')."frm1604cf:txtSched2Pen1=</div>	
            <div>frm1604cf:txtSched2TotalAmt1=".request('frm1604cf:txtSched2TotalAmt1')."frm1604cf:txtSched2TotalAmt1=</div>	
            <div>frm1604cf:txtSched2Date2=".request('frm1604cf:txtSched2Date2')."frm1604cf:txtSched2Date2=</div>	
            <div>frm1604cf:txtSched2BankVal2=".request('frm1604cf:txtSched2BankVal2')."frm1604cf:txtSched2BankVal2=</div>	
            <div>frm1604cf:txtSched2TaxWheld2=".request('frm1604cf:txtSched2TaxWheld2')."frm1604cf:txtSched2TaxWheld2=</div>	
            <div>frm1604cf:txtSched2Pen2=".request('frm1604cf:txtSched2Pen2')."frm1604cf:txtSched2Pen2=</div>	
            <div>frm1604cf:txtSched2TotalAmt2=".request('frm1604cf:txtSched2TotalAmt2')."frm1604cf:txtSched2TotalAmt2=</div>	
            <div>frm1604cf:txtSched2Date3=".request('frm1604cf:txtSched2Date3')."frm1604cf:txtSched2Date3=</div>	
            <div>frm1604cf:txtSched2BankVal3=".request('frm1604cf:txtSched2BankVal3')."frm1604cf:txtSched2BankVal3=</div>	
            <div>frm1604cf:txtSched2TaxWheld3=".request('frm1604cf:txtSched2TaxWheld3')."frm1604cf:txtSched2TaxWheld3=</div>	
            <div>frm1604cf:txtSched2Pen3=".request('frm1604cf:txtSched2Pen3')."frm1604cf:txtSched2Pen3=</div>	
            <div>frm1604cf:txtSched2TotalAmt3=".request('frm1604cf:txtSched2TotalAmt3')."frm1604cf:txtSched2TotalAmt3=</div>	
            <div>frm1604cf:txtSched2Date4=".request('frm1604cf:txtSched2Date4')."frm1604cf:txtSched2Date4=</div>	
            <div>frm1604cf:txtSched2BankVal4=".request('frm1604cf:txtSched2BankVal4')."frm1604cf:txtSched2BankVal4=</div>	
            <div>frm1604cf:txtSched2TaxWheld4=".request('frm1604cf:txtSched2TaxWheld4')."frm1604cf:txtSched2TaxWheld4=</div>	
            <div>frm1604cf:txtSched2Pen4=".request('frm1604cf:txtSched2Pen4')."frm1604cf:txtSched2Pen4=</div>	
            <div>frm1604cf:txtSched2TotalAmt4=".request('frm1604cf:txtSched2TotalAmt4')."frm1604cf:txtSched2TotalAmt4=</div>	
            <div>frm1604cf:txtSched2Date5=".request('frm1604cf:txtSched2Date5')."frm1604cf:txtSched2Date5=</div>	
            <div>frm1604cf:txtSched2BankVal5=".request('frm1604cf:txtSched2BankVal5')."frm1604cf:txtSched2BankVal5=</div>	
            <div>frm1604cf:txtSched2TaxWheld5=".request('frm1604cf:txtSched2TaxWheld5')."frm1604cf:txtSched2TaxWheld5=</div>	
            <div>frm1604cf:txtSched2Pen5=".request('frm1604cf:txtSched2Pen5')."frm1604cf:txtSched2Pen5=</div>	
            <div>frm1604cf:txtSched2TotalAmt5=".request('frm1604cf:txtSched2TotalAmt5')."frm1604cf:txtSched2TotalAmt5=</div>	
            <div>frm1604cf:txtSched2Date6=".request('frm1604cf:txtSched2Date6')."frm1604cf:txtSched2Date6=</div>	
            <div>frm1604cf:txtSched2BankVal6=".request('frm1604cf:txtSched2BankVal6')."frm1604cf:txtSched2BankVal6=</div>	
            <div>frm1604cf:txtSched2TaxWheld6=".request('frm1604cf:txtSched2TaxWheld6')."frm1604cf:txtSched2TaxWheld6=</div>	
            <div>frm1604cf:txtSched2Pen6=".request('frm1604cf:txtSched2Pen6')."frm1604cf:txtSched2Pen6=</div>	
            <div>frm1604cf:txtSched2TotalAmt6=".request('frm1604cf:txtSched2TotalAmt6')."frm1604cf:txtSched2TotalAmt6=</div>	
            <div>frm1604cf:txtSched2Date7=".request('frm1604cf:txtSched2Date7')."frm1604cf:txtSched2Date7=</div>	
            <div>frm1604cf:txtSched2BankVal7=".request('frm1604cf:txtSched2BankVal7')."frm1604cf:txtSched2BankVal7=</div>	
            <div>frm1604cf:txtSched2TaxWheld7=".request('frm1604cf:txtSched2TaxWheld7')."frm1604cf:txtSched2TaxWheld7=</div>	
            <div>frm1604cf:txtSched2Pen7=".request('frm1604cf:txtSched2Pen7')."frm1604cf:txtSched2Pen7=</div>	
            <div>frm1604cf:txtSched2TotalAmt7=".request('frm1604cf:txtSched2TotalAmt7')."frm1604cf:txtSched2TotalAmt7=</div>	
            <div>frm1604cf:txtSched2Date8=".request('frm1604cf:txtSched2Date8')."frm1604cf:txtSched2Date8=</div>	
            <div>frm1604cf:txtSched2BankVal8=".request('frm1604cf:txtSched2BankVal8')."frm1604cf:txtSched2BankVal8=</div>	
            <div>frm1604cf:txtSched2TaxWheld8=".request('frm1604cf:txtSched2TaxWheld8')."frm1604cf:txtSched2TaxWheld8=</div>	
            <div>frm1604cf:txtSched2Pen8=".request('frm1604cf:txtSched2Pen8')."frm1604cf:txtSched2Pen8=</div>	
            <div>frm1604cf:txtSched2TotalAmt8=".request('frm1604cf:txtSched2TotalAmt8')."frm1604cf:txtSched2TotalAmt8=</div>	
            <div>frm1604cf:txtSched2Date9=".request('frm1604cf:txtSched2Date9')."frm1604cf:txtSched2Date9=</div>	
            <div>frm1604cf:txtSched2BankVal9=".request('frm1604cf:txtSched2BankVal9')."frm1604cf:txtSched2BankVal9=</div>	
            <div>frm1604cf:txtSched2TaxWheld9=".request('frm1604cf:txtSched2TaxWheld9')."frm1604cf:txtSched2TaxWheld9=</div>	
            <div>frm1604cf:txtSched2Pen9=".request('frm1604cf:txtSched2Pen9')."frm1604cf:txtSched2Pen9=</div>	
            <div>frm1604cf:txtSched2TotalAmt9=".request('frm1604cf:txtSched2TotalAmt9')."frm1604cf:txtSched2TotalAmt9=</div>	
            <div>frm1604cf:txtSched2Date10=".request('frm1604cf:txtSched2Date10')."frm1604cf:txtSched2Date10=</div>	
            <div>frm1604cf:txtSched2BankVal10=".request('frm1604cf:txtSched2BankVal10')."frm1604cf:txtSched2BankVal10=</div>	
            <div>frm1604cf:txtSched2TaxWheld10=".request('frm1604cf:txtSched2TaxWheld10')."frm1604cf:txtSched2TaxWheld10=</div>	
            <div>frm1604cf:txtSched2Pen10=".request('frm1604cf:txtSched2Pen10')."frm1604cf:txtSched2Pen10=</div>	
            <div>frm1604cf:txtSched2TotalAmt10=".request('frm1604cf:txtSched2TotalAmt10')."frm1604cf:txtSched2TotalAmt10=</div>	
            <div>frm1604cf:txtSched2Date11=".request('frm1604cf:txtSched2Date11')."frm1604cf:txtSched2Date11=</div>	
            <div>frm1604cf:txtSched2BankVal11=".request('frm1604cf:txtSched2BankVal11')."frm1604cf:txtSched2BankVal11=</div>	
            <div>frm1604cf:txtSched2TaxWheld11=".request('frm1604cf:txtSched2TaxWheld11')."frm1604cf:txtSched2TaxWheld11=</div>	
            <div>frm1604cf:txtSched2Pen11=".request('frm1604cf:txtSched2Pen11')."frm1604cf:txtSched2Pen11=</div>	
            <div>frm1604cf:txtSched2TotalAmt11=".request('frm1604cf:txtSched2TotalAmt11')."frm1604cf:txtSched2TotalAmt11=</div>	
            <div>frm1604cf:txtSched2Date12=".request('frm1604cf:txtSched2Date12')."frm1604cf:txtSched2Date12=</div>	
            <div>frm1604cf:txtSched2BankVal12=".request('frm1604cf:txtSched2BankVal12')."frm1604cf:txtSched2BankVal12=</div>	
            <div>frm1604cf:txtSched2TaxWheld12=".request('frm1604cf:txtSched2TaxWheld12')."frm1604cf:txtSched2TaxWheld12=</div>	
            <div>frm1604cf:txtSched2Pen12=".request('frm1604cf:txtSched2Pen12')."frm1604cf:txtSched2Pen12=</div>	
            <div>frm1604cf:txtSched2TotalAmt12=".request('frm1604cf:txtSched2TotalAmt12')."frm1604cf:txtSched2TotalAmt12=</div>	
            <div>frm1604cf:txtSched2TaxWheldTotal=".request('frm1604cf:txtSched2TaxWheldTotal')."frm1604cf:txtSched2TaxWheldTotal=</div>	
            <div>frm1604cf:txtSched2PenTotal=".request('frm1604cf:txtSched2PenTotal')."frm1604cf:txtSched2PenTotal=</div>	
            <div>frm1604cf:txtSched2Total=".request('frm1604cf:txtSched2Total')."frm1604cf:txtSched2Total=</div>	
            <div>frm1604cf:txtSched3Date1=".request('frm1604cf:txtSched3Date1')."frm1604cf:txtSched3Date1=</div>	
            <div>frm1604cf:txtSched3BankVal1=".request('frm1604cf:txtSched3BankVal1')."frm1604cf:txtSched3BankVal1=</div>	
            <div>frm1604cf:txtSched3TaxWheld1=".request('frm1604cf:txtSched3TaxWheld1')."frm1604cf:txtSched3TaxWheld1=</div>	
            <div>frm1604cf:txtSched3Pen1=".request('frm1604cf:txtSched3Pen1')."frm1604cf:txtSched3Pen1=</div>	
            <div>frm1604cf:txtSched3TotalAmt1=".request('frm1604cf:txtSched3TotalAmt1')."frm1604cf:txtSched3TotalAmt1=</div>	
            <div>frm1604cf:txtSched3Date2=".request('frm1604cf:txtSched3Date2')."frm1604cf:txtSched3Date2=</div>	
            <div>frm1604cf:txtSched3BankVal2=".request('frm1604cf:txtSched3BankVal2')."frm1604cf:txtSched3BankVal2=</div>	
            <div>frm1604cf:txtSched3TaxWheld2=".request('frm1604cf:txtSched3TaxWheld2')."frm1604cf:txtSched3TaxWheld2=</div>	
            <div>frm1604cf:txtSched3Pen2=".request('frm1604cf:txtSched3Pen2')."frm1604cf:txtSched3Pen2=</div>	
            <div>frm1604cf:txtSched3TotalAmt2=".request('frm1604cf:txtSched3TotalAmt2')."frm1604cf:txtSched3TotalAmt2=</div>	
            <div>frm1604cf:txtSched3Date3=".request('frm1604cf:txtSched3Date3')."frm1604cf:txtSched3Date3=</div>	
            <div>frm1604cf:txtSched3BankVal3=".request('frm1604cf:txtSched3BankVal3')."frm1604cf:txtSched3BankVal3=</div>	
            <div>frm1604cf:txtSched3TaxWheld3=".request('frm1604cf:txtSched3TaxWheld3')."frm1604cf:txtSched3TaxWheld3=</div>	
            <div>frm1604cf:txtSched3Pen3=".request('frm1604cf:txtSched3Pen3')."frm1604cf:txtSched3Pen3=</div>	
            <div>frm1604cf:txtSched3TotalAmt3=".request('frm1604cf:txtSched3TotalAmt3')."frm1604cf:txtSched3TotalAmt3=</div>	
            <div>frm1604cf:txtSched3Date4=".request('frm1604cf:txtSched3Date4')."frm1604cf:txtSched3Date4=</div>	
            <div>frm1604cf:txtSched3BankVal4=".request('frm1604cf:txtSched3BankVal4')."frm1604cf:txtSched3BankVal4=</div>	
            <div>frm1604cf:txtSched3TaxWheld4=".request('frm1604cf:txtSched3TaxWheld4')."frm1604cf:txtSched3TaxWheld4=</div>	
            <div>frm1604cf:txtSched3Pen4=".request('frm1604cf:txtSched3Pen4')."frm1604cf:txtSched3Pen4=</div>	
            <div>frm1604cf:txtSched3TotalAmt4=".request('frm1604cf:txtSched3TotalAmt4')."frm1604cf:txtSched3TotalAmt4=</div>	
            <div>frm1604cf:txtSched3Date5=".request('frm1604cf:txtSched3Date5')."frm1604cf:txtSched3Date5=</div>	
            <div>frm1604cf:txtSched3BankVal5=".request('frm1604cf:txtSched3BankVal5')."frm1604cf:txtSched3BankVal5=</div>	
            <div>frm1604cf:txtSched3TaxWheld5=".request('frm1604cf:txtSched3TaxWheld5')."frm1604cf:txtSched3TaxWheld5=</div>	
            <div>frm1604cf:txtSched3Pen5=".request('frm1604cf:txtSched3Pen5')."frm1604cf:txtSched3Pen5=</div>	
            <div>frm1604cf:txtSched3TotalAmt5=".request('frm1604cf:txtSched3TotalAmt5')."frm1604cf:txtSched3TotalAmt5=</div>	
            <div>frm1604cf:txtSched3Date6=".request('frm1604cf:txtSched3Date6')."frm1604cf:txtSched3Date6=</div>	
            <div>frm1604cf:txtSched3BankVal6=".request('frm1604cf:txtSched3BankVal6')."frm1604cf:txtSched3BankVal6=</div>	
            <div>frm1604cf:txtSched3TaxWheld6=".request('frm1604cf:txtSched3TaxWheld6')."frm1604cf:txtSched3TaxWheld6=</div>	
            <div>frm1604cf:txtSched3Pen6=".request('frm1604cf:txtSched3Pen6')."frm1604cf:txtSched3Pen6=</div>	
            <div>frm1604cf:txtSched3TotalAmt6=".request('frm1604cf:txtSched3TotalAmt6')."frm1604cf:txtSched3TotalAmt6=</div>	
            <div>frm1604cf:txtSched3Date7=".request('frm1604cf:txtSched3Date7')."frm1604cf:txtSched3Date7=</div>	
            <div>frm1604cf:txtSched3BankVal7=".request('frm1604cf:txtSched3BankVal7')."frm1604cf:txtSched3BankVal7=</div>	
            <div>frm1604cf:txtSched3TaxWheld7=".request('frm1604cf:txtSched3TaxWheld7')."frm1604cf:txtSched3TaxWheld7=</div>	
            <div>frm1604cf:txtSched3Pen7=".request('frm1604cf:txtSched3Pen7')."frm1604cf:txtSched3Pen7=</div>	
            <div>frm1604cf:txtSched3TotalAmt7=".request('frm1604cf:txtSched3TotalAmt7')."frm1604cf:txtSched3TotalAmt7=</div>	
            <div>frm1604cf:txtSched3Date8=".request('frm1604cf:txtSched3Date8')."frm1604cf:txtSched3Date8=</div>	
            <div>frm1604cf:txtSched3BankVal8=".request('frm1604cf:txtSched3BankVal8')."frm1604cf:txtSched3BankVal8=</div>	
            <div>frm1604cf:txtSched3TaxWheld8=".request('frm1604cf:txtSched3TaxWheld8')."frm1604cf:txtSched3TaxWheld8=</div>	
            <div>frm1604cf:txtSched3Pen8=".request('frm1604cf:txtSched3Pen8')."frm1604cf:txtSched3Pen8=</div>	
            <div>frm1604cf:txtSched3TotalAmt8=".request('frm1604cf:txtSched3TotalAmt8')."frm1604cf:txtSched3TotalAmt8=</div>	
            <div>frm1604cf:txtSched3Date9=".request('frm1604cf:txtSched3Date9')."frm1604cf:txtSched3Date9=</div>	
            <div>frm1604cf:txtSched3BankVal9=".request('frm1604cf:txtSched3BankVal9')."frm1604cf:txtSched3BankVal9=</div>	
            <div>frm1604cf:txtSched3TaxWheld9=".request('frm1604cf:txtSched3TaxWheld9')."frm1604cf:txtSched3TaxWheld9=</div>	
            <div>frm1604cf:txtSched3Pen9=".request('frm1604cf:txtSched3Pen9')."frm1604cf:txtSched3Pen9=</div>	
            <div>frm1604cf:txtSched3TotalAmt9=".request('frm1604cf:txtSched3TotalAmt9')."frm1604cf:txtSched3TotalAmt9=</div>	
            <div>frm1604cf:txtSched3Date10=".request('frm1604cf:txtSched3Date10')."frm1604cf:txtSched3Date10=</div>	
            <div>frm1604cf:txtSched3BankVal10=".request('frm1604cf:txtSched3BankVal10')."frm1604cf:txtSched3BankVal10=</div>	
            <div>frm1604cf:txtSched3TaxWheld10=".request('frm1604cf:txtSched3TaxWheld10')."frm1604cf:txtSched3TaxWheld10=</div>	
            <div>frm1604cf:txtSched3Pen10=".request('frm1604cf:txtSched3Pen10')."frm1604cf:txtSched3Pen10=</div>	
            <div>frm1604cf:txtSched3TotalAmt10=".request('frm1604cf:txtSched3TotalAmt10')."frm1604cf:txtSched3TotalAmt10=</div>	
            <div>frm1604cf:txtSched3Date11=".request('frm1604cf:txtSched3Date11')."frm1604cf:txtSched3Date11=</div>	
            <div>frm1604cf:txtSched3BankVal11=".request('frm1604cf:txtSched3BankVal11')."frm1604cf:txtSched3BankVal11=</div>	
            <div>frm1604cf:txtSched3TaxWheld11=".request('frm1604cf:txtSched3TaxWheld11')."frm1604cf:txtSched3TaxWheld11=</div>	
            <div>frm1604cf:txtSched3Pen11=".request('frm1604cf:txtSched3Pen11')."frm1604cf:txtSched3Pen11=</div>	
            <div>frm1604cf:txtSched3TotalAmt11=".request('frm1604cf:txtSched3TotalAmt11')."frm1604cf:txtSched3TotalAmt11=</div>	
            <div>frm1604cf:txtSched3Date12=".request('frm1604cf:txtSched3Date12')."frm1604cf:txtSched3Date12=</div>	
            <div>frm1604cf:txtSched3BankVal12=".request('frm1604cf:txtSched3BankVal12')."frm1604cf:txtSched3BankVal12=</div>	
            <div>frm1604cf:txtSched3TaxWheld12=".request('frm1604cf:txtSched3TaxWheld12')."frm1604cf:txtSched3TaxWheld12=</div>	
            <div>frm1604cf:txtSched3Pen12=".request('frm1604cf:txtSched3Pen12')."frm1604cf:txtSched3Pen12=</div>	
            <div>frm1604cf:txtSched3TotalAmt12=".request('frm1604cf:txtSched3TotalAmt12')."frm1604cf:txtSched3TotalAmt12=</div>	
            <div>frm1604cf:txtSched3TaxWheldTotal=".request('frm1604cf:txtSched3TaxWheldTotal')."frm1604cf:txtSched3TaxWheldTotal=</div>	
            <div>frm1604cf:txtSched3PenTotal=".request('frm1604cf:txtSched3PenTotal')."frm1604cf:txtSched3PenTotal=</div>	
            <div>frm1604cf:txtSched3Total=".request('frm1604cf:txtSched3Total')."frm1604cf:txtSched3Total=</div>	
            <div>frm1604cf:txtSched4Date1=".request('frm1604cf:txtSched4Date1')."frm1604cf:txtSched4Date1=</div>	
            <div>frm1604cf:txtSched4BankVal1=".request('frm1604cf:txtSched4BankVal1')."frm1604cf:txtSched4BankVal1=</div>	
            <div>frm1604cf:txtSched4TaxWheld1=".request('frm1604cf:txtSched4TaxWheld1')."frm1604cf:txtSched4TaxWheld1=</div>	
            <div>frm1604cf:txtSched4Pen1=".request('frm1604cf:txtSched4Pen1')."frm1604cf:txtSched4Pen1=</div>	
            <div>frm1604cf:txtSched4TotalAmt1=".request('frm1604cf:txtSched4TotalAmt1')."frm1604cf:txtSched4TotalAmt1=</div>	
            <div>frm1604cf:txtSched4Date2=".request('frm1604cf:txtSched4Date2')."frm1604cf:txtSched4Date2=</div>	
            <div>frm1604cf:txtSched4BankVal2=".request('frm1604cf:txtSched4BankVal2')."frm1604cf:txtSched4BankVal2=</div>	
            <div>frm1604cf:txtSched4TaxWheld2=".request('frm1604cf:txtSched4TaxWheld2')."frm1604cf:txtSched4TaxWheld2=</div>	
            <div>frm1604cf:txtSched4Pen2=".request('frm1604cf:txtSched4Pen2')."frm1604cf:txtSched4Pen2=</div>	
            <div>frm1604cf:txtSched4TotalAmt2=".request('frm1604cf:txtSched4TotalAmt2')."frm1604cf:txtSched4TotalAmt2=</div>	
            <div>frm1604cf:txtSched4Date3=".request('frm1604cf:txtSched4Date3')."frm1604cf:txtSched4Date3=</div>	
            <div>frm1604cf:txtSched4BankVal3=".request('frm1604cf:txtSched4BankVal3')."frm1604cf:txtSched4BankVal3=</div>	
            <div>frm1604cf:txtSched4TaxWheld3=".request('frm1604cf:txtSched4TaxWheld3')."frm1604cf:txtSched4TaxWheld3=</div>	
            <div>frm1604cf:txtSched4Pen3=".request('frm1604cf:txtSched4Pen3')."frm1604cf:txtSched4Pen3=</div>	
            <div>frm1604cf:txtSched4TotalAmt3=".request('frm1604cf:txtSched4TotalAmt3')."frm1604cf:txtSched4TotalAmt3=</div>	
            <div>frm1604cf:txtSched4Date4=".request('frm1604cf:txtSched4Date4')."frm1604cf:txtSched4Date4=</div>	
            <div>frm1604cf:txtSched4BankVal4=".request('frm1604cf:txtSched4BankVal4')."frm1604cf:txtSched4BankVal4=</div>	
            <div>frm1604cf:txtSched4TaxWheld4=".request('frm1604cf:txtSched4TaxWheld4')."frm1604cf:txtSched4TaxWheld4=</div>	
            <div>frm1604cf:txtSched4Pen4=".request('frm1604cf:txtSched4Pen4')."frm1604cf:txtSched4Pen4=</div>	
            <div>frm1604cf:txtSched4TotalAmt4=".request('frm1604cf:txtSched4TotalAmt4')."frm1604cf:txtSched4TotalAmt4=</div>	
            <div>frm1604cf:txtSched4TaxWheldTotal=".request('frm1604cf:txtSched4TaxWheldTotal')."frm1604cf:txtSched4TaxWheldTotal=</div>	
            <div>frm1604cf:txtSched4PenTotal=".request('frm1604cf:txtSched4PenTotal')."frm1604cf:txtSched4PenTotal=</div>	
            <div>frm1604cf:txtSched4Total=".request('frm1604cf:txtSched4Total')."frm1604cf:txtSched4Total=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm1604cf:tinA').request('frm1604cf:tinB').request('frm1604cf:tinC').request('frm1604cf:branchCode');
            
        $returnPeriod = request('frm1604cf:txtYear');

        $getReturnPeriod = tbl_1604CF::where('company_id',  request('company'))
                            ->where('item1', request('frm1604cf:txtYear'))
                            ->count();

        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm1604cf:txtYear');
        }else{
            if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1604CF')
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

            $xmlReturnPeriod = request('frm1604cf:txtYear').$ext;
        }

        $filename = $tin."-1604CF-".$xmlReturnPeriod.'.xml';

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
                'form'          => '1604CF',
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
                            ->where('form', '1604CF')
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
                            ->where('form', '1604CF')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1604CF::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1604CF')
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
        $data = tbl_1604CF::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1604CF')
                            ->get();
        
        return view('forms.BIR-Form 1604CF',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

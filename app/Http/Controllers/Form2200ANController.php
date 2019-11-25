<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2200AN;
use App\tbl_2200AN_schedule;
use App\tbl_2200AN_schedule_others;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2200ANController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2200_a_ns')){

            }else{
                Schema::connection('mysql2')->create('tbl_2200_a_ns', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item1C')->nullable();
                    $table->string('item2');
                    $table->string('item3');
                    $table->string('item11A')->nullable();
                    $table->string('item11B')->nullable();
                    $table->string('item11C')->nullable();
                    $table->string('item11D')->nullable();
                    $table->string('item12A')->nullable();
                    $table->string('item12B')->nullable();
                    $table->string('item12C')->nullable();
                    $table->string('item12D')->nullable();
                    $table->string('item13')->nullable();
                    $table->string('item14')->nullable();
                    $table->string('item15')->nullable();
                    $table->string('item15_other')->nullable();
                    $table->text('item16');
                    $table->text('item17A');
                    $table->text('item17B');
                    $table->text('item17C');
                    $table->text('item18');
                    $table->text('item19');
                    $table->text('item20');
                    $table->text('item21A');
                    $table->text('item21B');
                    $table->text('item21C');
                    $table->text('item21D');
                    $table->text('item22');
                    $table->text('item23A');
                    $table->text('item23B');
                    $table->text('item23C');
                    $table->text('item24');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_a_n_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('schedB')->nullable();
                    $table->text('schedC')->nullable();
                    $table->text('schedD')->nullable();
                    $table->text('schedE')->nullable();
                    $table->text('tax_due')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_a_n_schedule_others', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc')->nullable();
                    $table->text('description')->nullable();
                    $table->text('schedA')->nullable();
                    $table->text('schedB')->nullable();
                    $table->text('schedC')->nullable();
                    $table->text('schedD')->nullable();
                    $table->text('schedE')->nullable();
                    $table->text('tax_due')->nullable();
                    $table->timestamps();
                });
            }
           
	        return view('forms.BIR-Form 2200AN',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_2200AN::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2200AN')
                            ->get();
        
        	return view('forms.BIR-Form 2200AN',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
        
    }
    public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
        	'form_no'  => request('form_no'),
			'company_id'  => request('company'),
			'item1A'  => request('frm2200AN:txtMonth1'),
			'item1B'  => request('frm2200AN:txtDate'),
			'item1C'  => request('frm2200AN:txtForYr'),
			'item2'  => request('frm2200AN:amendedRtn'),
			'item3'  => request('frm2200AN:txtSheets'),
			'item11A'  => request('frm2200ANoptRegion'),
			'item11B'  => request('frm2200ANoptProvince'),
			'item11C'  => request('frm2200ANoptCity'),
			'item11D'  => request('frm2200AN:txtPlaceofProd'),
			'item12A'  => request('frm2200ANoptRegion1'),
			'item12B'  => request('frm2200ANoptProvince1'),
			'item12C'  => request('frm2200ANoptCity1'),
			'item12D'  => request('frm2200AN:txtPlaceofRem'),
			'item13'  => null !== request('frm2200AN:optTreaty') ? request('frm2200AN:optTreaty') : '',
			'item14'  => request('frm2200AN:lstTaxTreaty'),
			'item15'  => null !== request('frm2200AN:chkPymntManner') ? request('frm2200AN:chkPymntManner') : '',
			'item15_other'  => request('frm2200AN:txtOthMannerofPymnt'),
			'item16'  => request('frm2200AN:txtTax16'),
			'item17A'  => request('frm2200AN:txtTax17A'),
			'item17B'  => request('frm2200AN:txtTax17B'),
			'item17C'  => request('frm2200AN:txtTax17C'),
			'item18'  => request('frm2200AN:txtTax18'),
			'item19'  => request('frm2200AN:txtTax19'),
			'item20'  => request('frm2200AN:txtTax20'),
			'item21A'  => request('frm2200AN:txtTax21A'),
			'item21B'  => request('frm2200AN:txtTax21B'),
			'item21C'  => request('frm2200AN:txtTax21C'),
			'item21D'  => request('frm2200AN:txtTax21D'),
			'item22'  => request('frm2200AN:txtTax22'),
			'item23A'  => request('frm2200AN:txtTax23A'),
			'item23B'  => request('frm2200AN:txtTax23B'),
			'item23C'  => request('frm2200AN:txtTax23C'),
			'item24'  => request('frm2200AN:txtTax24'),
        	]);

        $getForm = tbl_2200AN::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
     	$trans = "";
        if(request('form_id') != ""){
            $form = tbl_2200AN::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2200AN::create($data);
            }else{
                $form = tbl_2200AN::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_2200AN_schedule::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200AN_schedule_others::where('form_id', $getForm[0]->id)->delete();
        }

        for ($i=0; $i < 26 ; $i++) { 
        	if(request('frm2200AN:listSched1x1B'.$i.'') != '0' || request('frm2200AN:listSched1x1B'.$i.'') != '0.00' ){
        		$schedule = ([
        				'form_id'  => $form->id,
        				'schedB'  => request('frm2200AN:listSched1x1B'.$i.''),
        				'schedC'  => request('frm2200AN:listSched1x1C'.$i.''),
        				'schedD'  => request('frm2200AN:listSched1x1D'.$i.''),
        				'schedE'  => request('frm2200AN:listSched1x1E'.$i.''),
        				'tax_due'  => request('frm2200AN:listSched1x1Due'.$i.''),
        			]);
        		tbl_2200AN_schedule::create($schedule);
        	}
        }

        for ($x=0; $x < 3 ; $x++) { 
        	if(request('frm2200AN:listSched1x2B'.$x.'') != '0' || request('frm2200AN:listSched1x2B'.$x.'') != '0.00' ){
        		$schedule = ([
        				'form_id'  => $form->id,
        				'schedB'  => request('frm2200AN:listSched1x2B'.$x.''),
        				'schedC'  => request('frm2200AN:listSched1x2C'.$x.''),
        				'schedD'  => request('frm2200AN:listSched1x2D'.$x.''),
        				'schedE'  => request('frm2200AN:listSched1x2E'.$x.''),
        				'tax_due'  => request('frm2200AN:listSched1x2Due'.$x.''),
        			]);
        		tbl_2200AN_schedule::create($schedule);
        	}
        }

        for ($y=0; $y < count(request('frm2200AN:sched1Atc')) ; $y++) { 
        	if(request('frm2200AN:sched1Atc')[0] != ''){
        		$others = ([
        				'form_id'  => $form->id,
        				'atc'  => request('frm2200AN:sched1Atc')[$y],
        				'description'  => request('frm2200AN:sched1Other'.$y.''),
        				'schedA'  => request('frm2200AN:sched1TaxRate'.$y.''),
        				'schedB'  => request('frm2200AN:sched1ExemptA'.$y.''),
        				'schedC'  => request('frm2200AN:sched1TaxableA'.$y.''),
        				'schedD'  => request('frm2200AN:sched1ExemptB'.$y.''),
        				'schedE'  => request('frm2200AN:sched1TaxableB'.$y.''),
        				'tax_due'  => request('frm2200AN:sched1ExciseTaxDue'.$y.''),
        			]);
        		tbl_2200AN_schedule_others::create($others);
        	}
        }

        $amendedRtn_1 = "false";
        $amendedRtn_2 = "false";

        if( request('frm2200AN:amendedRtn') == "Y"){
          $amendedRtn_1 = "true";
        }else if( request('frm2200AN:amendedRtn') == "N"){
          $amendedRtn_2 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm2200AN:txtTaxpayerName'));

        $address = rawurlencode(request('frm2200AN:txtAddress'));

        $lineOfBusiness =  rawurlencode(request('frm2200AN:txtLineBus'));

        $optTreaty_1 = "false";
        $optTreaty_2 = "false";

        if(null !== request('frm2200AN:optTreaty')){
        	if( request('frm2200AN:optTreaty') == "Y"){
	          $optTreaty_1 = "true";
	        }else if( request('frm2200AN:optTreaty') == "N"){
	          $optTreaty_2 = "true";
	        }
        }

        $chkPymntManner_1 = "false";
        $chkPymntManner_2 = "false";

        if(null !== request('frm2200AN:chkPymntManner')){
        	if( request('frm2200AN:chkPymntManner') == "Removal"){
	          $chkPymntManner_1 = "true";
	        }else if( request('frm2200AN:optTreaty') == "Deposit"){
	          $chkPymntManner_2 = "true";
	        }
        }

        $ext = "";
        for ($y=1; $y < count(request('frm2200AN:sched1Atc')) ; $y++) { 
        	$ext .= "<div>frm2200AN:sched1Chk".$y."=".(null !== request('frm2200AN:sched1Chk'.$y.'') ? 'true' : 'false')."frm2200AN:sched1Chk".$y."=</div>	
            <div>frm2200AN:sched1Atc".$y."=".request('frm2200AN:sched1Atc')[$y]."frm2200AN:sched1Atc".$y."=</div>	
            <div>frm2200AN:sched1Other".$y."=".request('frm2200AN:sched1Other'.$y.'')."frm2200AN:sched1Other".$y."=</div>	
            <div>frm2200AN:sched1TaxRate".$y."=".request('frm2200AN:sched1TaxRate'.$y.'')."frm2200AN:sched1TaxRate".$y."=</div>	
            <div>frm2200AN:sched1ExemptA".$y."=".request('frm2200AN:sched1ExemptA'.$y.'')."frm2200AN:sched1ExemptA".$y."=</div>	
            <div>frm2200AN:sched1TaxableA".$y."=".request('frm2200AN:sched1TaxableA'.$y.'')."frm2200AN:sched1TaxableA".$y."=</div>	
            <div>frm2200AN:sched1ExemptB".$y."=".request('frm2200AN:sched1ExemptB'.$y.'')."frm2200AN:sched1ExemptB".$y."=</div>	
            <div>frm2200AN:sched1TaxableB".$y."=".request('frm2200AN:sched1TaxableB'.$y.'')."frm2200AN:sched1TaxableB".$y."=</div>	
            <div>frm2200AN:sched1ExciseTaxDue".$y."=".request('frm2200AN:sched1ExciseTaxDue'.$y.'')."frm2200AN:sched1ExciseTaxDue".$y."=</div>	
            ";
        }

        $xmlData = "<?xml version='1.0'?>	
            <div>frm2200AN:txtMonth1=".request('frm2200AN:txtMonth1')."frm2200AN:txtMonth1=</div>	
            <div>frm2200AN:txtDate=".request('frm2200AN:txtDate')."frm2200AN:txtDate=</div>	
            <div>frm2200AN:txtForYr=".request('frm2200AN:txtForYr')."frm2200AN:txtForYr=</div>	
            <div>frm2200AN:amendedRtn_1=".$amendedRtn_1."frm2200AN:amendedRtn_1=</div>	
            <div>frm2200AN:amendedRtn_2=".$amendedRtn_2."frm2200AN:amendedRtn_2=</div>	
            <div>frm2200AN:txtSheets=".request('frm2200AN:txtSheets')."frm2200AN:txtSheets=</div>	
            <div>frm2200AN:txtTIN1=".request('frm2200AN:txtTIN1')."frm2200AN:txtTIN1=</div>	
            <div>frm2200AN:txtTIN2=".request('frm2200AN:txtTIN2')."frm2200AN:txtTIN2=</div>	
            <div>frm2200AN:txtTIN3=".request('frm2200AN:txtTIN3')."frm2200AN:txtTIN3=</div>	
            <div>frm2200AN:txtBranchCode=".request('frm2200AN:txtBranchCode')."frm2200AN:txtBranchCode=</div>	
            <div>frm2200AN:txtRDOCode=".request('frm2200AN:txtRDOCode')."frm2200AN:txtRDOCode=</div>	
            <div>frm2200AN:txtLineBus=".$lineOfBusiness."frm2200AN:txtLineBus=</div>	
            <div>frm2200AN:txtTaxpayerName=".$taxPayerName."frm2200AN:txtTaxpayerName=</div>	
            <div>frm2200AN:txtTelNum=".request('frm2200AN:txtTelNum')."frm2200AN:txtTelNum=</div>	
            <div>frm2200AN:txtAddress=".$address."frm2200AN:txtAddress=</div>	
            <div>frm2200AN:txtZipCode=".request('frm2200AN:txtZipCode')."frm2200AN:txtZipCode=</div>	
            <div>frm2200ANoptRegion=".request('frm2200ANoptRegion')."frm2200ANoptRegion=</div>	
            <div>frm2200ANoptProvince=".request('frm2200ANoptProvince')."frm2200ANoptProvince=</div>	
            <div>frm2200ANoptCity=".request('frm2200ANoptCity')."frm2200ANoptCity=</div>	
            <div>frm2200AN:txtPlaceofProd=".request('frm2200AN:txtPlaceofProd')."frm2200AN:txtPlaceofProd=</div>	
            <div>frm2200ANoptRegion1=".request('frm2200ANoptRegion1')."frm2200ANoptRegion1=</div>	
            <div>frm2200ANoptProvince1=".request('frm2200ANoptProvince1')."frm2200ANoptProvince1=</div>	
            <div>frm2200ANoptCity1=".request('frm2200ANoptCity1')."frm2200ANoptCity1=</div>	
            <div>frm2200AN:txtPlaceofRem=".request('frm2200AN:txtPlaceofRem')."frm2200AN:txtPlaceofRem=</div>	
            <div>frm2200AN:optTreaty_1=".$optTreaty_1."frm2200AN:optTreaty_1=</div>	
            <div>frm2200AN:optTreaty_2=".$optTreaty_2."frm2200AN:optTreaty_2=</div>	
            <div>frm2200AN:lstTaxTreaty=".request('frm2200AN:lstTaxTreaty')."frm2200AN:lstTaxTreaty=</div>	
            <div>frm2200AN:chkPymntManner_1=".$chkPymntManner_1."frm2200AN:chkPymntManner_1=</div>	
            <div>frm2200AN:chkPymntManner_2=".$chkPymntManner_2."frm2200AN:chkPymntManner_2=</div>	
            <div>frm2200AN:txtOthMannerofPymnt=".request('frm2200AN:txtOthMannerofPymnt')."frm2200AN:txtOthMannerofPymnt=</div>	
            <div>frm2200AN:txtTax16=".request('frm2200AN:txtTax16')."frm2200AN:txtTax16=</div>	
            <div>frm2200AN:txtTax17A=".request('frm2200AN:txtTax17A')."frm2200AN:txtTax17A=</div>	
            <div>frm2200AN:txtTax17B=".request('frm2200AN:txtTax17B')."frm2200AN:txtTax17B=</div>	
            <div>frm2200AN:txtTax17C=".request('frm2200AN:txtTax17C')."frm2200AN:txtTax17C=</div>	
            <div>frm2200AN:txtTax18=".request('frm2200AN:txtTax18')."frm2200AN:txtTax18=</div>	
            <div>frm2200AN:txtTax19=".request('frm2200AN:txtTax19')."frm2200AN:txtTax19=</div>	
            <div>frm2200AN:txtTax20=".request('frm2200AN:txtTax20')."frm2200AN:txtTax20=</div>	
            <div>frm2200AN:txtTax21A=".request('frm2200AN:txtTax21A')."frm2200AN:txtTax21A=</div>	
            <div>frm2200AN:txtTax21B=".request('frm2200AN:txtTax21B')."frm2200AN:txtTax21B=</div>	
            <div>frm2200AN:txtTax21C=".request('frm2200AN:txtTax21C')."frm2200AN:txtTax21C=</div>	
            <div>frm2200AN:txtTax21D=".request('frm2200AN:txtTax21D')."frm2200AN:txtTax21D=</div>	
            <div>frm2200AN:txtTax22=".request('frm2200AN:txtTax22')."frm2200AN:txtTax22=</div>	
            <div>frm2200AN:txtTax23A=".request('frm2200AN:txtTax23A')."frm2200AN:txtTax23A=</div>	
            <div>frm2200AN:PayPenalties=".(null !== request('frm2200AN:PayPenalties') ? 'true' : 'false')."frm2200AN:PayPenalties=</div>	
            <div>frm2200AN:txtTax23B=".request('frm2200AN:txtTax23B')."frm2200AN:txtTax23B=</div>	
            <div>frm2200AN:txtTax23C=".request('frm2200AN:txtTax23C')."frm2200AN:txtTax23C=</div>	
            <div>frm2200AN:txtTax24=".request('frm2200AN:txtTax24')."frm2200AN:txtTax24=</div>	
            <div>frm2200AN:listSched1x1B0=".request('frm2200AN:listSched1x1B0')."frm2200AN:listSched1x1B0=</div>	
            <div>frm2200AN:listSched1x1C0=".request('frm2200AN:listSched1x1C0')."frm2200AN:listSched1x1C0=</div>	
            <div>frm2200AN:listSched1x1D0=".request('frm2200AN:listSched1x1D0')."frm2200AN:listSched1x1D0=</div>	
            <div>frm2200AN:listSched1x1E0=".request('frm2200AN:listSched1x1E0')."frm2200AN:listSched1x1E0=</div>	
            <div>frm2200AN:listSched1x1Due0=".request('frm2200AN:listSched1x1Due0')."frm2200AN:listSched1x1Due0=</div>	
            <div>frm2200AN:listSched1x1B1=".request('frm2200AN:listSched1x1B1')."frm2200AN:listSched1x1B1=</div>	
            <div>frm2200AN:listSched1x1C1=".request('frm2200AN:listSched1x1C1')."frm2200AN:listSched1x1C1=</div>	
            <div>frm2200AN:listSched1x1D1=".request('frm2200AN:listSched1x1D1')."frm2200AN:listSched1x1D1=</div>	
            <div>frm2200AN:listSched1x1E1=".request('frm2200AN:listSched1x1E1')."frm2200AN:listSched1x1E1=</div>	
            <div>frm2200AN:listSched1x1Due1=".request('frm2200AN:listSched1x1Due1')."frm2200AN:listSched1x1Due1=</div>	
            <div>frm2200AN:listSched1x1B2=".request('frm2200AN:listSched1x1B2')."frm2200AN:listSched1x1B2=</div>	
            <div>frm2200AN:listSched1x1C2=".request('frm2200AN:listSched1x1C2')."frm2200AN:listSched1x1C2=</div>	
            <div>frm2200AN:listSched1x1D2=".request('frm2200AN:listSched1x1D2')."frm2200AN:listSched1x1D2=</div>	
            <div>frm2200AN:listSched1x1E2=".request('frm2200AN:listSched1x1E2')."frm2200AN:listSched1x1E2=</div>	
            <div>frm2200AN:listSched1x1Due2=".request('frm2200AN:listSched1x1Due2')."frm2200AN:listSched1x1Due2=</div>	
            <div>frm2200AN:listSched1x1B3=".request('frm2200AN:listSched1x1B3')."frm2200AN:listSched1x1B3=</div>	
            <div>frm2200AN:listSched1x1C3=".request('frm2200AN:listSched1x1C3')."frm2200AN:listSched1x1C3=</div>	
            <div>frm2200AN:listSched1x1D3=".request('frm2200AN:listSched1x1D3')."frm2200AN:listSched1x1D3=</div>	
            <div>frm2200AN:listSched1x1E3=".request('frm2200AN:listSched1x1E3')."frm2200AN:listSched1x1E3=</div>	
            <div>frm2200AN:listSched1x1Due3=".request('frm2200AN:listSched1x1Due3')."frm2200AN:listSched1x1Due3=</div>	
            <div>frm2200AN:listSched1x1B4=".request('frm2200AN:listSched1x1B4')."frm2200AN:listSched1x1B4=</div>	
            <div>frm2200AN:listSched1x1C4=".request('frm2200AN:listSched1x1C4')."frm2200AN:listSched1x1C4=</div>	
            <div>frm2200AN:listSched1x1D4=".request('frm2200AN:listSched1x1D4')."frm2200AN:listSched1x1D4=</div>	
            <div>frm2200AN:listSched1x1E4=".request('frm2200AN:listSched1x1E4')."frm2200AN:listSched1x1E4=</div>	
            <div>frm2200AN:listSched1x1Due4=".request('frm2200AN:listSched1x1Due4')."frm2200AN:listSched1x1Due4=</div>	
            <div>frm2200AN:listSched1x1B5=".request('frm2200AN:listSched1x1B5')."frm2200AN:listSched1x1B5=</div>	
            <div>frm2200AN:listSched1x1C5=".request('frm2200AN:listSched1x1C5')."frm2200AN:listSched1x1C5=</div>	
            <div>frm2200AN:listSched1x1D5=".request('frm2200AN:listSched1x1D5')."frm2200AN:listSched1x1D5=</div>	
            <div>frm2200AN:listSched1x1E5=".request('frm2200AN:listSched1x1E5')."frm2200AN:listSched1x1E5=</div>	
            <div>frm2200AN:listSched1x1Due5=".request('frm2200AN:listSched1x1Due5')."frm2200AN:listSched1x1Due5=</div>	
            <div>frm2200AN:listSched1x1B6=".request('frm2200AN:listSched1x1B6')."frm2200AN:listSched1x1B6=</div>	
            <div>frm2200AN:listSched1x1C6=".request('frm2200AN:listSched1x1C6')."frm2200AN:listSched1x1C6=</div>	
            <div>frm2200AN:listSched1x1D6=".request('frm2200AN:listSched1x1D6')."frm2200AN:listSched1x1D6=</div>	
            <div>frm2200AN:listSched1x1E6=".request('frm2200AN:listSched1x1E6')."frm2200AN:listSched1x1E6=</div>	
            <div>frm2200AN:listSched1x1Due6=".request('frm2200AN:listSched1x1Due6')."frm2200AN:listSched1x1Due6=</div>	
            <div>frm2200AN:listSched1x1B7=".request('frm2200AN:listSched1x1B7')."frm2200AN:listSched1x1B7=</div>	
            <div>frm2200AN:listSched1x1C7=".request('frm2200AN:listSched1x1C7')."frm2200AN:listSched1x1C7=</div>	
            <div>frm2200AN:listSched1x1D7=".request('frm2200AN:listSched1x1D7')."frm2200AN:listSched1x1D7=</div>	
            <div>frm2200AN:listSched1x1E7=".request('frm2200AN:listSched1x1E7')."frm2200AN:listSched1x1E7=</div>	
            <div>frm2200AN:listSched1x1Due7=".request('frm2200AN:listSched1x1Due7')."frm2200AN:listSched1x1Due7=</div>	
            <div>frm2200AN:listSched1x1B8=".request('frm2200AN:listSched1x1B8')."frm2200AN:listSched1x1B8=</div>	
            <div>frm2200AN:listSched1x1C8=".request('frm2200AN:listSched1x1C8')."frm2200AN:listSched1x1C8=</div>	
            <div>frm2200AN:listSched1x1D8=".request('frm2200AN:listSched1x1D8')."frm2200AN:listSched1x1D8=</div>	
            <div>frm2200AN:listSched1x1E8=".request('frm2200AN:listSched1x1E8')."frm2200AN:listSched1x1E8=</div>	
            <div>frm2200AN:listSched1x1Due8=".request('frm2200AN:listSched1x1Due8')."frm2200AN:listSched1x1Due8=</div>	
            <div>frm2200AN:listSched1x1B9=".request('frm2200AN:listSched1x1B9')."frm2200AN:listSched1x1B9=</div>	
            <div>frm2200AN:listSched1x1C9=".request('frm2200AN:listSched1x1C9')."frm2200AN:listSched1x1C9=</div>	
            <div>frm2200AN:listSched1x1D9=".request('frm2200AN:listSched1x1D9')."frm2200AN:listSched1x1D9=</div>	
            <div>frm2200AN:listSched1x1E9=".request('frm2200AN:listSched1x1E9')."frm2200AN:listSched1x1E9=</div>	
            <div>frm2200AN:listSched1x1Due9=".request('frm2200AN:listSched1x1Due9')."frm2200AN:listSched1x1Due9=</div>	
            <div>frm2200AN:listSched1x1B10=".request('frm2200AN:listSched1x1B10')."frm2200AN:listSched1x1B10=</div>	
            <div>frm2200AN:listSched1x1C10=".request('frm2200AN:listSched1x1C10')."frm2200AN:listSched1x1C10=</div>	
            <div>frm2200AN:listSched1x1D10=".request('frm2200AN:listSched1x1D10')."frm2200AN:listSched1x1D10=</div>	
            <div>frm2200AN:listSched1x1E10=".request('frm2200AN:listSched1x1E10')."frm2200AN:listSched1x1E10=</div>	
            <div>frm2200AN:listSched1x1Due10=".request('frm2200AN:listSched1x1Due10')."frm2200AN:listSched1x1Due10=</div>	
            <div>frm2200AN:listSched1x1B11=".request('frm2200AN:listSched1x1B11')."frm2200AN:listSched1x1B11=</div>	
            <div>frm2200AN:listSched1x1C11=".request('frm2200AN:listSched1x1C11')."frm2200AN:listSched1x1C11=</div>	
            <div>frm2200AN:listSched1x1D11=".request('frm2200AN:listSched1x1D11')."frm2200AN:listSched1x1D11=</div>	
            <div>frm2200AN:listSched1x1E11=".request('frm2200AN:listSched1x1E11')."frm2200AN:listSched1x1E11=</div>	
            <div>frm2200AN:listSched1x1Due11=".request('frm2200AN:listSched1x1Due11')."frm2200AN:listSched1x1Due11=</div>	
            <div>frm2200AN:listSched1x1B12=".request('frm2200AN:listSched1x1B12')."frm2200AN:listSched1x1B12=</div>	
            <div>frm2200AN:listSched1x1C12=".request('frm2200AN:listSched1x1C12')."frm2200AN:listSched1x1C12=</div>	
            <div>frm2200AN:listSched1x1D12=".request('frm2200AN:listSched1x1D12')."frm2200AN:listSched1x1D12=</div>	
            <div>frm2200AN:listSched1x1E12=".request('frm2200AN:listSched1x1E12')."frm2200AN:listSched1x1E12=</div>	
            <div>frm2200AN:listSched1x1Due12=".request('frm2200AN:listSched1x1Due12')."frm2200AN:listSched1x1Due12=</div>	
            <div>frm2200AN:listSched1x1B13=".request('frm2200AN:listSched1x1B13')."frm2200AN:listSched1x1B13=</div>	
            <div>frm2200AN:listSched1x1C13=".request('frm2200AN:listSched1x1C13')."frm2200AN:listSched1x1C13=</div>	
            <div>frm2200AN:listSched1x1D13=".request('frm2200AN:listSched1x1D13')."frm2200AN:listSched1x1D13=</div>	
            <div>frm2200AN:listSched1x1E13=".request('frm2200AN:listSched1x1E13')."frm2200AN:listSched1x1E13=</div>	
            <div>frm2200AN:listSched1x1Due13=".request('frm2200AN:listSched1x1Due13')."frm2200AN:listSched1x1Due13=</div>	
            <div>frm2200AN:listSched1x1B14=".request('frm2200AN:listSched1x1B14')."frm2200AN:listSched1x1B14=</div>	
            <div>frm2200AN:listSched1x1C14=".request('frm2200AN:listSched1x1C14')."frm2200AN:listSched1x1C14=</div>	
            <div>frm2200AN:listSched1x1D14=".request('frm2200AN:listSched1x1D14')."frm2200AN:listSched1x1D14=</div>	
            <div>frm2200AN:listSched1x1E14=".request('frm2200AN:listSched1x1E14')."frm2200AN:listSched1x1E14=</div>	
            <div>frm2200AN:listSched1x1Due14=".request('frm2200AN:listSched1x1Due14')."frm2200AN:listSched1x1Due14=</div>	
            <div>frm2200AN:listSched1x1B15=".request('frm2200AN:listSched1x1B15')."frm2200AN:listSched1x1B15=</div>	
            <div>frm2200AN:listSched1x1C15=".request('frm2200AN:listSched1x1C15')."frm2200AN:listSched1x1C15=</div>	
            <div>frm2200AN:listSched1x1D15=".request('frm2200AN:listSched1x1D15')."frm2200AN:listSched1x1D15=</div>	
            <div>frm2200AN:listSched1x1E15=".request('frm2200AN:listSched1x1E15')."frm2200AN:listSched1x1E15=</div>	
            <div>frm2200AN:listSched1x1Due15=".request('frm2200AN:listSched1x1Due15')."frm2200AN:listSched1x1Due15=</div>	
            <div>frm2200AN:listSched1x1B16=".request('frm2200AN:listSched1x1B16')."frm2200AN:listSched1x1B16=</div>	
            <div>frm2200AN:listSched1x1C16=".request('frm2200AN:listSched1x1C16')."frm2200AN:listSched1x1C16=</div>	
            <div>frm2200AN:listSched1x1D16=".request('frm2200AN:listSched1x1D16')."frm2200AN:listSched1x1D16=</div>	
            <div>frm2200AN:listSched1x1E16=".request('frm2200AN:listSched1x1E16')."frm2200AN:listSched1x1E16=</div>	
            <div>frm2200AN:listSched1x1Due16=".request('frm2200AN:listSched1x1Due16')."frm2200AN:listSched1x1Due16=</div>	
            <div>frm2200AN:listSched1x1B17=".request('frm2200AN:listSched1x1B17')."frm2200AN:listSched1x1B17=</div>	
            <div>frm2200AN:listSched1x1C17=".request('frm2200AN:listSched1x1C17')."frm2200AN:listSched1x1C17=</div>	
            <div>frm2200AN:listSched1x1D17=".request('frm2200AN:listSched1x1D17')."frm2200AN:listSched1x1D17=</div>	
            <div>frm2200AN:listSched1x1E17=".request('frm2200AN:listSched1x1E17')."frm2200AN:listSched1x1E17=</div>	
            <div>frm2200AN:listSched1x1Due17=".request('frm2200AN:listSched1x1Due17')."frm2200AN:listSched1x1Due17=</div>	
            <div>frm2200AN:listSched1x1B18=".request('frm2200AN:listSched1x1B18')."frm2200AN:listSched1x1B18=</div>	
            <div>frm2200AN:listSched1x1C18=".request('frm2200AN:listSched1x1C18')."frm2200AN:listSched1x1C18=</div>	
            <div>frm2200AN:listSched1x1D18=".request('frm2200AN:listSched1x1D18')."frm2200AN:listSched1x1D18=</div>	
            <div>frm2200AN:listSched1x1E18=".request('frm2200AN:listSched1x1E18')."frm2200AN:listSched1x1E18=</div>	
            <div>frm2200AN:listSched1x1Due18=".request('frm2200AN:listSched1x1Due18')."frm2200AN:listSched1x1Due18=</div>	
            <div>frm2200AN:listSched1x1B19=".request('frm2200AN:listSched1x1B19')."frm2200AN:listSched1x1B19=</div>	
            <div>frm2200AN:listSched1x1C19=".request('frm2200AN:listSched1x1C19')."frm2200AN:listSched1x1C19=</div>	
            <div>frm2200AN:listSched1x1D19=".request('frm2200AN:listSched1x1D19')."frm2200AN:listSched1x1D19=</div>	
            <div>frm2200AN:listSched1x1E19=".request('frm2200AN:listSched1x1E19')."frm2200AN:listSched1x1E19=</div>	
            <div>frm2200AN:listSched1x1Due19=".request('frm2200AN:listSched1x1Due19')."frm2200AN:listSched1x1Due19=</div>	
            <div>frm2200AN:listSched1x1B20=".request('frm2200AN:listSched1x1B20')."frm2200AN:listSched1x1B20=</div>	
            <div>frm2200AN:listSched1x1C20=".request('frm2200AN:listSched1x1C20')."frm2200AN:listSched1x1C20=</div>	
            <div>frm2200AN:listSched1x1D20=".request('frm2200AN:listSched1x1D20')."frm2200AN:listSched1x1D20=</div>	
            <div>frm2200AN:listSched1x1E20=".request('frm2200AN:listSched1x1E20')."frm2200AN:listSched1x1E20=</div>	
            <div>frm2200AN:listSched1x1Due20=".request('frm2200AN:listSched1x1Due20')."frm2200AN:listSched1x1Due20=</div>	
            <div>frm2200AN:listSched1x1B21=".request('frm2200AN:listSched1x1B21')."frm2200AN:listSched1x1B21=</div>	
            <div>frm2200AN:listSched1x1C21=".request('frm2200AN:listSched1x1C21')."frm2200AN:listSched1x1C21=</div>	
            <div>frm2200AN:listSched1x1D21=".request('frm2200AN:listSched1x1D21')."frm2200AN:listSched1x1D21=</div>	
            <div>frm2200AN:listSched1x1E21=".request('frm2200AN:listSched1x1E21')."frm2200AN:listSched1x1E21=</div>	
            <div>frm2200AN:listSched1x1Due21=".request('frm2200AN:listSched1x1Due21')."frm2200AN:listSched1x1Due21=</div>	
            <div>frm2200AN:listSched1x1B22=".request('frm2200AN:listSched1x1B22')."frm2200AN:listSched1x1B22=</div>	
            <div>frm2200AN:listSched1x1C22=".request('frm2200AN:listSched1x1C22')."frm2200AN:listSched1x1C22=</div>	
            <div>frm2200AN:listSched1x1D22=".request('frm2200AN:listSched1x1D22')."frm2200AN:listSched1x1D22=</div>	
            <div>frm2200AN:listSched1x1E22=".request('frm2200AN:listSched1x1E22')."frm2200AN:listSched1x1E22=</div>	
            <div>frm2200AN:listSched1x1Due22=".request('frm2200AN:listSched1x1Due22')."frm2200AN:listSched1x1Due22=</div>	
            <div>frm2200AN:listSched1x1B23=".request('frm2200AN:listSched1x1B23')."frm2200AN:listSched1x1B23=</div>	
            <div>frm2200AN:listSched1x1C23=".request('frm2200AN:listSched1x1C23')."frm2200AN:listSched1x1C23=</div>	
            <div>frm2200AN:listSched1x1D23=".request('frm2200AN:listSched1x1D23')."frm2200AN:listSched1x1D23=</div>	
            <div>frm2200AN:listSched1x1E23=".request('frm2200AN:listSched1x1E23')."frm2200AN:listSched1x1E23=</div>	
            <div>frm2200AN:listSched1x1Due23=".request('frm2200AN:listSched1x1Due23')."frm2200AN:listSched1x1Due23=</div>	
            <div>frm2200AN:listSched1x1B24=".request('frm2200AN:listSched1x1B24')."frm2200AN:listSched1x1B24=</div>	
            <div>frm2200AN:listSched1x1C24=".request('frm2200AN:listSched1x1C24')."frm2200AN:listSched1x1C24=</div>	
            <div>frm2200AN:listSched1x1D24=".request('frm2200AN:listSched1x1D24')."frm2200AN:listSched1x1D24=</div>	
            <div>frm2200AN:listSched1x1E24=".request('frm2200AN:listSched1x1E24')."frm2200AN:listSched1x1E24=</div>	
            <div>frm2200AN:listSched1x1Due24=".request('frm2200AN:listSched1x1Due24')."frm2200AN:listSched1x1Due24=</div>	
            <div>frm2200AN:listSched1x1B25=".request('frm2200AN:listSched1x1B25')."frm2200AN:listSched1x1B25=</div>	
            <div>frm2200AN:listSched1x1C25=".request('frm2200AN:listSched1x1C25')."frm2200AN:listSched1x1C25=</div>	
            <div>frm2200AN:listSched1x1D25=".request('frm2200AN:listSched1x1D25')."frm2200AN:listSched1x1D25=</div>	
            <div>frm2200AN:listSched1x1E25=".request('frm2200AN:listSched1x1E25')."frm2200AN:listSched1x1E25=</div>	
            <div>frm2200AN:listSched1x1Due25=".request('frm2200AN:listSched1x1Due25')."frm2200AN:listSched1x1Due25=</div>	
            <div>frm2200AN:listSched1x2B0=".request('frm2200AN:listSched1x2B0')."frm2200AN:listSched1x2B0=</div>	
            <div>frm2200AN:0=".request('frm2200AN:listSched1x2C0')."frm2200AN:0=</div>	
            <div>frm2200AN:listSched1x2D0=".request('frm2200AN:listSched1x2D0')."frm2200AN:listSched1x2D0=</div>	
            <div>frm2200AN:listSched1x2E0=".request('frm2200AN:listSched1x2E0')."frm2200AN:listSched1x2E0=</div>	
            <div>frm2200AN:listSched1x2Due0=".request('frm2200AN:listSched1x2Due0')."frm2200AN:listSched1x2Due0=</div>	
            <div>frm2200AN:listSched1x2B1=".request('frm2200AN:listSched1x2B1')."frm2200AN:listSched1x2B1=</div>	
            <div>frm2200AN:1=".request('frm2200AN:listSched1x2C1')."frm2200AN:1=</div>	
            <div>frm2200AN:listSched1x2D1=".request('frm2200AN:listSched1x2D1')."frm2200AN:listSched1x2D1=</div>	
            <div>frm2200AN:listSched1x2E1=".request('frm2200AN:listSched1x2E1')."frm2200AN:listSched1x2E1=</div>	
            <div>frm2200AN:listSched1x2Due1=".request('frm2200AN:listSched1x2Due1')."frm2200AN:listSched1x2Due1=</div>	
            <div>frm2200AN:listSched1x2B2=".request('frm2200AN:listSched1x2B2')."frm2200AN:listSched1x2B2=</div>	
            <div>frm2200AN:2=".request('frm2200AN:listSched1x2C2')."frm2200AN:2=</div>	
            <div>frm2200AN:listSched1x2D2=".request('frm2200AN:listSched1x2D2')."frm2200AN:listSched1x2D2=</div>	
            <div>frm2200AN:listSched1x2E2=".request('frm2200AN:listSched1x2E2')."frm2200AN:listSched1x2E2=</div>	
            <div>frm2200AN:listSched1x2Due2=".request('frm2200AN:listSched1x2Due2')."frm2200AN:listSched1x2Due2=</div>	
            <div>frm2200AN:sched1Chk0=".(null !== request('frm2200AN:sched1Chk0') ? 'true' : 'false')."frm2200AN:sched1Chk0=</div>	
            <div>frm2200AN:sched1Atc0=".request('frm2200AN:sched1Atc')[0]."frm2200AN:sched1Atc0=</div>	
            <div>frm2200AN:sched1Other0=".request('frm2200AN:sched1Other0')."frm2200AN:sched1Other0=</div>	
            <div>frm2200AN:sched1TaxRate0=".request('frm2200AN:sched1TaxRate0')."frm2200AN:sched1TaxRate0=</div>	
            <div>frm2200AN:sched1ExemptA0=".request('frm2200AN:sched1ExemptA0')."frm2200AN:sched1ExemptA0=</div>	
            <div>frm2200AN:sched1TaxableA0=".request('frm2200AN:sched1TaxableA0')."frm2200AN:sched1TaxableA0=</div>	
            <div>frm2200AN:sched1ExemptB0=".request('frm2200AN:sched1ExemptB0')."frm2200AN:sched1ExemptB0=</div>	
            <div>frm2200AN:sched1TaxableB0=".request('frm2200AN:sched1TaxableB0')."frm2200AN:sched1TaxableB0=</div>	
            <div>frm2200AN:sched1ExciseTaxDue0=".request('frm2200AN:sched1ExciseTaxDue0')."frm2200AN:sched1ExciseTaxDue0=</div>	
            ".$ext."<div>frm2200AN:totalTaxDue=".request('frm2200AN:totalTaxDue')."frm2200AN:totalTaxDue=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

       	$tin = request('frm2200AN:txtTIN1').request('frm2200AN:txtTIN2').request('frm2200AN:txtTIN3').request('frm2200AN:txtBranchCode');
    		
    	$returnPeriod = request('frm2200AN:txtMonth1')."/".request('frm2200AN:txtDate')."/".request('frm2200AN:txtForYr')." ".date('H:i:s');

    	$xmlReturnPeriod = request('frm2200AN:txtMonth1').request('frm2200AN:txtDate').request('frm2200AN:txtForYr').date('His');

        	$filename = $tin."-2200AN-".$xmlReturnPeriod.'.xml';

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
	     		'user_id'		=> Auth::user()->id,
	     		'company_id'	=> request('company'),
	     		'form_id'		=> $form->id,
	     		'form'			=> '2200AN',
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
     						->where('form', '2200AN')
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
                            ->where('form', '2200AN')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2200AN::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2200AN')
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
        $data = tbl_2200AN::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2200AN')
                            ->get();
        
        return view('forms.BIR-Form 2200AN',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

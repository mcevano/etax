<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2200P;
use App\tbl_2200P_schedule;
use App\tbl_2200P_schedule_others;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2200PController extends Controller
{
	public function index($company,$action,$form_id)
    {
	    $company = Companies::find($company);
	        
	    \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

	    if($action == 'new'){
	        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2200_ps')){

	            }else{
	               	Schema::connection('mysql2')->create('tbl_2200_ps', function (Blueprint $table) {
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
	                    $table->text('item15')->nullable();
	                    $table->text('item15_others')->nullable();
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

	                Schema::connection('mysql2')->create('tbl_2200_p_schedules', function (Blueprint $table) {
	                     $table->increments('id');
	                	 $table->integer('form_id');
	                	 $table->text('removal')->nullable();
	                	 $table->text('locally');
	                	 $table->text('imported');
	                	 $table->text('removals');
	                	 $table->text('stocks');
	                	 $table->text('underbond');
	                	 $table->text('exports');
	                	 $table->text('others');
	                	 $table->text('tax-free');
	                	 $table->text('tax_due');
	                     $table->timestamps();
	                });

	                Schema::connection('mysql2')->create('tbl_2200_p_schedule_others', function (Blueprint $table) {
	                     $table->increments('id');
	                	 $table->integer('form_id');
	                	 $table->text('atc')->nullable();
	                	 $table->text('description')->nullable();
	                	 $table->text('measure')->nullable();
	                	 $table->text('applicable_rate');
	                	 $table->text('removal')->nullable();
	                	 $table->text('locally');
	                	 $table->text('imported');
	                	 $table->text('taxable_removals')->nullable();
	                	 $table->text('tax_paid');
	                	 $table->text('underbond');
	                	 $table->text('exports');
	                	 $table->text('others');
	                	 $table->text('tax_free');
	                	 $table->text('tax_due');
	                     $table->timestamps();
	                });
	            }
		        return view('forms.BIR-Form 2200P',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
	    }else{
		        $data = tbl_2200P::find($form_id);
	            $xml = Xml::where('user_id', Auth::user()->id)
	                            ->where('company_id', $company->id)
	                            ->where('form_id', $form_id)
	                            ->where('form', '2200P')
	                            ->get();
	        
	        	return view('forms.BIR-Form 2200P',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
	    }
	}

	public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);

    	$data = ([
    		'form_no'   => request('form_no'),
			'company_id'   => request('company'),
			'item1A'   => request('frm2200P:txtMonth1'),
			'item1B'   => request('frm2200P:txtDate'),
			'item1C'   => request('frm2200P:txtForYr'),
			'item2'   => request('frm2200P:amendedRtn'),
			'item3'   => request('frm2200P:txtSheets'),
			'item11A'   => request('frm2200PoptRegion'),
			'item11B'   => request('frm2200PoptProvince'),
			'item11C'   => request('frm2200PoptCity'),
			'item11D'   => request('frm2200P:txtPlaceofProd'),
			'item12A'   => request('frm2200PoptRegion1'),
			'item12B'   => request('frm2200PoptProvince1'),
			'item12C'   => request('frm2200PoptCity1'),
			'item12D'   => request('frm2200P:txtPlaceofRem'),
			'item13'   => request('frm2200P:optTreaty'),
			'item14'   => request('frm2200P:lstTaxTreaty'),
			'item15'   => null !== request('frm2200P:chkPymntManner') ? request('frm2200P:chkPymntManner') : '',
			'item15_others'   => request('frm2200P:txtOthMannerofPymnt'),
			'item16'   => request('frm2200P:txtTax16'),
			'item17A'   => request('frm2200P:txtTax17A'),
			'item17B'   => request('frm2200P:txtTax17B'),
			'item17C'   => request('frm2200P:txtTax17C'),
			'item18'   => request('frm2200P:txtTax18'),
			'item19'   => request('frm2200P:txtTax19'),
			'item20'   => request('frm2200P:txtTax20'),
			'item21A'   => request('frm2200P:txtTax21A'),
			'item21B'   => request('frm2200P:txtTax21B'),
			'item21C'   => request('frm2200P:txtTax21C'),
			'item21D'   => request('frm2200P:txtTax21D'),
			'item22'   => request('frm2200P:txtTax22'),
			'item23A'   => request('frm2200P:txtTax23A'),
			'item23B'   => request('frm2200P:txtTax23B'),
			'item23C'   => request('frm2200P:txtTax23C'),
			'item24'   => request('frm2200P:txtTax24'),
    	]);

    	$getForm = tbl_2200P::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
     	$trans = "";
        if(request('form_id') != ""){
            $form = tbl_2200P::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2200P::create($data);
            }else{
                $form = tbl_2200P::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_2200P_schedule::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200P_schedule_others::where('form_id', $getForm[0]->id)->delete();
        }

        for ($i=0; $i < 25 ; $i++) { 
        	if(request('frm2200P:txtBasicTaxDue'.$i.'') != '0.00' ){
        		$schedule = ([
        				'form_id'  => $form->id,
        				'removal'   => request('frm2200P:txtPlaceOfRemoval'.$i.''),
						'locally'   => request('frm2200P:txtLocally'.$i.''),
						'imported'   => request('frm2200P:txtImported'.$i.''),
						'removals'   => request('frm2200P:txtTaxRem'.$i.''),
						'stocks'   => request('frm2200P:txtTaxPaid'.$i.''),
						'underbond'   => request('frm2200P:txtUnderbond'.$i.''),
						'exports'   => request('frm2200P:txtExports'.$i.''),
						'others'   => request('frm2200P:txtOthers'.$i.''),
						'tax-free'   => request('frm2200P:txtConditional'.$i.''),
						'tax_due'   => request('frm2200P:txtBasicTaxDue'.$i.''),
        		]);
        		tbl_2200P_schedule::create($schedule);
        	}
        }

        for ($i=0; $i < count(request('frm2200P:txtsched1Atc')) ; $i++) { 
        	if(request('frm2200P:txtsched1Atc')[$i] != '' ){
        		$schedule = ([
        				'form_id'  => $form->id,
        				'atc'   => request('frm2200P:txtsched1Atc')[$i],
						'description'   => request('frm2200P:txtsched1Desc')[$i],
						'measure'   => request('frm2200P:txtsched1UnitOfMeasure')[$i],
						'applicable_rate'   => request('frm2200P:txtsched1AppRate')[$i],
						'removal'   => request('frm2200P:txtsched1PlaceOfRemoval')[$i],
						'locally'   => request('frm2200P:txtsched1Locally')[$i],
						'imported'   => request('frm2200P:txtsched1Imported')[$i],
						'taxable_removals'   => request('frm2200P:txtsched1TaxRem')[$i],
						'tax_paid'   => request('frm2200P:txtsched1TaxPaid')[$i],
						'underbond'   => request('frm2200P:txtsched1Underbond')[$i],
						'exports'   => request('frm2200P:txtsched1Exports')[$i],
						'others'   => request('frm2200P:txtsched1Others')[$i],
						'tax_free'   => request('frm2200P:txtsched1Conditional')[$i],
						'tax_due'   => request('frm2200P:txtsched1BasicTaxDue')[$i],
        		]);
        		tbl_2200P_schedule_others::create($schedule);
        	}
        }

        $amendedRtn_1 = "false";
        $amendedRtn_2 = "false";

        if(request('frm2200P:amendedRtn') == "Y"){
          $amendedRtn_1 = "true";
        }else if( request('frm2200P:amendedRtn') == "N"){
          $amendedRtn_2 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm2200P:taxpayerName'));
        $address = rawurlencode(request('frm2200P:txtAddress'));
        $lineBusiness = rawurlencode(request('frm2200P:txtLineBus'));

        $optTreaty_1 = "false";
        $optTreaty_2 = "false";
        if(request('frm2200P:optTreaty') == "Y"){
          $optTreaty_1 = "true";
        }else if(request('frm2200P:optTreaty') == "N"){
          $optTreaty_2 = "true";
        }

        $chkPymntManner_1 = "false";
        $chkPymntManner_2 = "false";
        if(request('frm2200P:chkPymntManner') == "Y"){
          $chkPymntManner_1 = "true";
        }else if(request('frm2200P:chkPymntManner') == "N"){
          $chkPymntManner_2 = "true";
        }

        $ext = "";
        for ($i=1; $i < count(request('frm2200P:txtsched1Atc')) ; $i++) { 
        	$ext .= "<div>frm2200P:sched1Chk".$i."=".(null !== request('frm2200P:sched1Chk')[$i] ? 'true' : 'false')."frm2200P:sched1Chk".$i."=</div>	
            <div>frm2200P:txtsched1Atc".$i."=".request('frm2200P:txtsched1Atc')[$i]."frm2200P:txtsched1Atc".$i."=</div>	
            <div>frm2200P:txtsched1Desc".$i."=".request('frm2200P:txtsched1Desc')[$i]."frm2200P:txtsched1Desc".$i."=</div>	
            <div>frm2200P:txtsched1UnitOfMeasure".$i."=".request('frm2200P:txtsched1UnitOfMeasure')[$i]."frm2200P:txtsched1UnitOfMeasure".$i."=</div>	
            <div>frm2200P:txtsched1AppRate".$i."=".request('frm2200P:txtsched1AppRate')[$i]."frm2200P:txtsched1AppRate".$i."=</div>	
            <div>frm2200P:txtsched1PlaceOfRemoval".$i."=".request('frm2200P:txtsched1PlaceOfRemoval')[$i]."frm2200P:txtsched1PlaceOfRemoval".$i."=</div>	
            <div>frm2200P:txtsched1Locally".$i."=".request('frm2200P:txtsched1Locally')[$i]."frm2200P:txtsched1Locally".$i."=</div>	
            <div>frm2200P:txtsched1Imported".$i."=".request('frm2200P:txtsched1Imported')[$i]."frm2200P:txtsched1Imported".$i."=</div>	
            <div>frm2200P:txtsched1TaxRem".$i."=".request('frm2200P:txtsched1TaxRem')[$i]."frm2200P:txtsched1TaxRem".$i."=</div>	
            <div>frm2200P:txtsched1TaxPaid".$i."=".request('frm2200P:txtsched1TaxPaid')[$i]."frm2200P:txtsched1TaxPaid".$i."=</div>	
            <div>frm2200P:txtsched1Underbond".$i."=".request('frm2200P:txtsched1Underbond')[$i]."frm2200P:txtsched1Underbond".$i."=</div>	
            <div>frm2200P:txtsched1Exports".$i."=".request('frm2200P:txtsched1Exports')[$i]."frm2200P:txtsched1Exports".$i."=</div>	
            <div>frm2200P:txtsched1Others".$i."=".request('frm2200P:txtsched1Others')[$i]."frm2200P:txtsched1Others".$i."=</div>	
            <div>frm2200P:txtsched1Conditional".$i."=".request('frm2200P:txtsched1Conditional')[$i]."frm2200P:txtsched1Conditional".$i."=</div>	
            <div>frm2200P:txtsched1BasicTaxDue".$i."=".request('frm2200P:txtsched1BasicTaxDue')[$i]."frm2200P:txtsched1BasicTaxDue".$i."=</div>	
            ";
        }

        $xmlData = "<?xml version='1.0'?>	
            <div>frm2200P:txtMonth1=".request('frm2200P:txtMonth1')."frm2200P:txtMonth1=</div>	
            <div>frm2200P:txtDate=".request('frm2200P:txtDate')."frm2200P:txtDate=</div>	
            <div>frm2200P:txtForYr=".request('frm2200P:txtForYr')."frm2200P:txtForYr=</div>	
            <div>frm2200P:amendedRtn_1=".$amendedRtn_1."frm2200P:amendedRtn_1=</div>	
            <div>frm2200P:amendedRtn_2=".$amendedRtn_2."frm2200P:amendedRtn_2=</div>	
            <div>frm2200P:txtSheets=".request('frm2200P:txtSheets')."frm2200P:txtSheets=</div>	
            <div>frm2200P:txtTIN1=".request('frm2200P:txtTIN1')."frm2200P:txtTIN1=</div>	
            <div>frm2200P:txtTIN2=".request('frm2200P:txtTIN2')."frm2200P:txtTIN2=</div>	
            <div>frm2200P:txtTIN3=".request('frm2200P:txtTIN3')."frm2200P:txtTIN3=</div>	
            <div>frm2200P:txtBranchCode=".request('frm2200P:txtBranchCode')."frm2200P:txtBranchCode=</div>	
            <div>frm2200P:txtRDOCode=".request('frm2200P:txtRDOCode')."frm2200P:txtRDOCode=</div>	
            <div>frm2200P:txtLineBus=".$lineBusiness."frm2200P:txtLineBus=</div>	
            <div>frm2200P:taxpayerName=".$taxPayerName."frm2200P:taxpayerName=</div>	
            <div>frm2200P:txtTelNum=".request('frm2200P:txtTelNum')."frm2200P:txtTelNum=</div>	
            <div>frm2200P:txtAddress=".$address."frm2200P:txtAddress=</div>	
            <div>frm2200P:txtZipCode=".request('frm2200P:txtZipCode')."frm2200P:txtZipCode=</div>	
            <div>frm2200PoptRegion=".request('frm2200PoptRegion')."frm2200PoptRegion=</div>	
            <div>frm2200PoptProvince=".request('frm2200PoptProvince')."frm2200PoptProvince=</div>	
            <div>frm2200PoptCity=".request('frm2200PoptCity')."frm2200PoptCity=</div>	
            <div>frm2200P:txtPlaceofProd=".request('frm2200P:txtPlaceofProd')."frm2200P:txtPlaceofProd=</div>	
            <div>frm2200PoptRegion1=".request('frm2200PoptRegion1')."frm2200PoptRegion1=</div>	
            <div>frm2200PoptProvince1=".request('frm2200PoptProvince1')."frm2200PoptProvince1=</div>	
            <div>frm2200PoptCity1=".request('frm2200PoptCity1')."frm2200PoptCity1=</div>	
            <div>frm2200P:txtPlaceofRem=".request('frm2200P:txtPlaceofRem')."frm2200P:txtPlaceofRem=</div>	
            <div>frm2200P:optTreaty_1=".$optTreaty_1."frm2200P:optTreaty_1=</div>	
            <div>frm2200P:optTreaty_2=".$optTreaty_2."frm2200P:optTreaty_2=</div>	
            <div>frm2200P:lstTaxTreaty=".request('frm2200P:lstTaxTreaty')."frm2200P:lstTaxTreaty=</div>	
            <div>frm2200P:chkPymntManner_1=".$chkPymntManner_1."frm2200P:chkPymntManner_1=</div>	
            <div>frm2200P:chkPymntManner_2=".$chkPymntManner_2."frm2200P:chkPymntManner_2=</div>	
            <div>frm2200P:txtOthMannerofPymnt=".request('frm2200P:txtOthMannerofPymnt')."frm2200P:txtOthMannerofPymnt=</div>	
            <div>frm2200P:txtTax16=".request('frm2200P:txtTax16')."frm2200P:txtTax16=</div>	
            <div>frm2200P:txtTax17A=".request('frm2200P:txtTax17A')."frm2200P:txtTax17A=</div>	
            <div>frm2200P:txtTax17B=".request('frm2200P:txtTax17B')."frm2200P:txtTax17B=</div>	
            <div>frm2200P:txtTax17C=".request('frm2200P:txtTax17C')."frm2200P:txtTax17C=</div>	
            <div>frm2200P:txtTax18=".request('frm2200P:txtTax18')."frm2200P:txtTax18=</div>	
            <div>frm2200P:txtTax19=".request('frm2200P:txtTax19')."frm2200P:txtTax19=</div>	
            <div>frm2200P:txtTax20=".request('frm2200P:txtTax20')."frm2200P:txtTax20=</div>	
            <div>frm2200P:txtTax21A=".request('frm2200P:txtTax21A')."frm2200P:txtTax21A=</div>	
            <div>frm2200P:txtTax21B=".request('frm2200P:txtTax21B')."frm2200P:txtTax21B=</div>	
            <div>frm2200P:txtTax21C=".request('frm2200P:txtTax21C')."frm2200P:txtTax21C=</div>	
            <div>frm2200P:txtTax21D=".request('frm2200P:txtTax21D')."frm2200P:txtTax21D=</div>	
            <div>frm2200P:txtTax22=".request('frm2200P:txtTax22')."frm2200P:txtTax22=</div>	
            <div>frm2200P:txtTax23A=".request('frm2200P:txtTax23A')."frm2200P:txtTax23A=</div>	
            <div>frm2200P:PayPenalties=".(null !== request('frm2200P:PayPenalties') ? 'true' : 'false')."frm2200P:PayPenalties=</div>	
            <div>frm2200P:txtTax23B=".request('frm2200P:txtTax23B')."frm2200P:txtTax23B=</div>	
            <div>frm2200P:txtTax23C=".request('frm2200P:txtTax23C')."frm2200P:txtTax23C=</div>	
            <div>frm2200P:txtTax24=".request('frm2200P:txtTax24')."frm2200P:txtTax24=</div>	
            <div>frm2200P:txtPlaceOfRemoval0=".request('frm2200P:txtPlaceOfRemoval0')."frm2200P:txtPlaceOfRemoval0=</div>	
            <div>frm2200P:txtLocally0=".request('frm2200P:txtLocally0')."frm2200P:txtLocally0=</div>	
            <div>frm2200P:txtImported0=".request('frm2200P:txtImported0')."frm2200P:txtImported0=</div>	
            <div>frm2200P:txtTaxRem0=".request('frm2200P:txtTaxRem0')."frm2200P:txtTaxRem0=</div>	
            <div>frm2200P:txtTaxPaid0=".request('frm2200P:txtTaxPaid0')."frm2200P:txtTaxPaid0=</div>	
            <div>frm2200P:txtUnderbond0=".request('frm2200P:txtUnderbond0')."frm2200P:txtUnderbond0=</div>	
            <div>frm2200P:txtExports0=".request('frm2200P:txtExports0')."frm2200P:txtExports0=</div>	
            <div>frm2200P:txtOthers0=".request('frm2200P:txtOthers0')."frm2200P:txtOthers0=</div>	
            <div>frm2200P:txtConditional0=".request('frm2200P:txtConditional0')."frm2200P:txtConditional0=</div>	
            <div>frm2200P:txtBasicTaxDue0=".request('frm2200P:txtBasicTaxDue0')."frm2200P:txtBasicTaxDue0=</div>	
            <div>frm2200P:txtPlaceOfRemoval1=".request('frm2200P:txtPlaceOfRemoval1')."frm2200P:txtPlaceOfRemoval1=</div>	
            <div>frm2200P:txtLocally1=".request('frm2200P:txtLocally1')."frm2200P:txtLocally1=</div>	
            <div>frm2200P:txtImported1=".request('frm2200P:txtImported1')."frm2200P:txtImported1=</div>	
            <div>frm2200P:txtTaxRem1=".request('frm2200P:txtTaxRem1')."frm2200P:txtTaxRem1=</div>	
            <div>frm2200P:txtTaxPaid1=".request('frm2200P:txtTaxPaid1')."frm2200P:txtTaxPaid1=</div>	
            <div>frm2200P:txtUnderbond1=".request('frm2200P:txtUnderbond1')."frm2200P:txtUnderbond1=</div>	
            <div>frm2200P:txtExports1=".request('frm2200P:txtExports1')."frm2200P:txtExports1=</div>	
            <div>frm2200P:txtOthers1=".request('frm2200P:txtOthers1')."frm2200P:txtOthers1=</div>	
            <div>frm2200P:txtConditional1=".request('frm2200P:txtConditional1')."frm2200P:txtConditional1=</div>	
            <div>frm2200P:txtBasicTaxDue1=".request('frm2200P:txtBasicTaxDue1')."frm2200P:txtBasicTaxDue1=</div>	
            <div>frm2200P:txtPlaceOfRemoval2=".request('frm2200P:txtPlaceOfRemoval2')."frm2200P:txtPlaceOfRemoval2=</div>	
            <div>frm2200P:txtLocally2=".request('frm2200P:txtLocally2')."frm2200P:txtLocally2=</div>	
            <div>frm2200P:txtImported2=".request('frm2200P:txtImported2')."frm2200P:txtImported2=</div>	
            <div>frm2200P:txtTaxRem2=".request('frm2200P:txtTaxRem2')."frm2200P:txtTaxRem2=</div>	
            <div>frm2200P:txtTaxPaid2=".request('frm2200P:txtTaxPaid2')."frm2200P:txtTaxPaid2=</div>	
            <div>frm2200P:txtUnderbond2=".request('frm2200P:txtUnderbond2')."frm2200P:txtUnderbond2=</div>	
            <div>frm2200P:txtExports2=".request('frm2200P:txtExports2')."frm2200P:txtExports2=</div>	
            <div>frm2200P:txtOthers2=".request('frm2200P:txtOthers2')."frm2200P:txtOthers2=</div>	
            <div>frm2200P:txtConditional2=".request('frm2200P:txtConditional2')."frm2200P:txtConditional2=</div>	
            <div>frm2200P:txtBasicTaxDue2=".request('frm2200P:txtBasicTaxDue2')."frm2200P:txtBasicTaxDue2=</div>	
            <div>frm2200P:txtPlaceOfRemoval3=".request('frm2200P:txtPlaceOfRemoval3')."frm2200P:txtPlaceOfRemoval3=</div>	
            <div>frm2200P:txtLocally3=".request('frm2200P:txtLocally3')."frm2200P:txtLocally3=</div>	
            <div>frm2200P:txtImported3=".request('frm2200P:txtImported3')."frm2200P:txtImported3=</div>	
            <div>frm2200P:txtTaxRem3=".request('frm2200P:txtTaxRem3')."frm2200P:txtTaxRem3=</div>	
            <div>frm2200P:txtTaxPaid3=".request('frm2200P:txtTaxPaid3')."frm2200P:txtTaxPaid3=</div>	
            <div>frm2200P:txtUnderbond3=".request('frm2200P:txtUnderbond3')."frm2200P:txtUnderbond3=</div>	
            <div>frm2200P:txtExports3=".request('frm2200P:txtExports3')."frm2200P:txtExports3=</div>	
            <div>frm2200P:txtOthers3=".request('frm2200P:txtOthers3')."frm2200P:txtOthers3=</div>	
            <div>frm2200P:txtConditional3=".request('frm2200P:txtConditional3')."frm2200P:txtConditional3=</div>	
            <div>frm2200P:txtBasicTaxDue3=".request('frm2200P:txtBasicTaxDue3')."frm2200P:txtBasicTaxDue3=</div>	
            <div>frm2200P:txtPlaceOfRemoval4=".request('frm2200P:txtPlaceOfRemoval4')."frm2200P:txtPlaceOfRemoval4=</div>	
            <div>frm2200P:txtLocally4=".request('frm2200P:txtLocally4')."frm2200P:txtLocally4=</div>	
            <div>frm2200P:txtImported4=".request('frm2200P:txtImported4')."frm2200P:txtImported4=</div>	
            <div>frm2200P:txtTaxRem4=".request('frm2200P:txtTaxRem4')."frm2200P:txtTaxRem4=</div>	
            <div>frm2200P:txtTaxPaid4=".request('frm2200P:txtTaxPaid4')."frm2200P:txtTaxPaid4=</div>	
            <div>frm2200P:txtUnderbond4=".request('frm2200P:txtUnderbond4')."frm2200P:txtUnderbond4=</div>	
            <div>frm2200P:txtExports4=".request('frm2200P:txtExports4')."frm2200P:txtExports4=</div>	
            <div>frm2200P:txtOthers4=".request('frm2200P:txtOthers4')."frm2200P:txtOthers4=</div>	
            <div>frm2200P:txtConditional4=".request('frm2200P:txtConditional4')."frm2200P:txtConditional4=</div>	
            <div>frm2200P:txtBasicTaxDue4=".request('frm2200P:txtBasicTaxDue4')."frm2200P:txtBasicTaxDue4=</div>	
            <div>frm2200P:txtPlaceOfRemoval5=".request('frm2200P:txtPlaceOfRemoval5')."frm2200P:txtPlaceOfRemoval5=</div>	
            <div>frm2200P:txtLocally5=".request('frm2200P:txtLocally5')."frm2200P:txtLocally5=</div>	
            <div>frm2200P:txtImported5=".request('frm2200P:txtImported5')."frm2200P:txtImported5=</div>	
            <div>frm2200P:txtTaxRem5=".request('frm2200P:txtTaxRem5')."frm2200P:txtTaxRem5=</div>	
            <div>frm2200P:txtTaxPaid5=".request('frm2200P:txtTaxPaid5')."frm2200P:txtTaxPaid5=</div>	
            <div>frm2200P:txtUnderbond5=".request('frm2200P:txtUnderbond5')."frm2200P:txtUnderbond5=</div>	
            <div>frm2200P:txtExports5=".request('frm2200P:txtExports5')."frm2200P:txtExports5=</div>	
            <div>frm2200P:txtOthers5=".request('frm2200P:txtOthers5')."frm2200P:txtOthers5=</div>	
            <div>frm2200P:txtConditional5=".request('frm2200P:txtConditional5')."frm2200P:txtConditional5=</div>	
            <div>frm2200P:txtBasicTaxDue5=".request('frm2200P:txtBasicTaxDue5')."frm2200P:txtBasicTaxDue5=</div>	
            <div>frm2200P:txtPlaceOfRemoval6=".request('frm2200P:txtPlaceOfRemoval6')."frm2200P:txtPlaceOfRemoval6=</div>	
            <div>frm2200P:txtLocally6=".request('frm2200P:txtLocally6')."frm2200P:txtLocally6=</div>	
            <div>frm2200P:txtImported6=".request('frm2200P:txtImported6')."frm2200P:txtImported6=</div>	
            <div>frm2200P:txtTaxRem6=".request('frm2200P:txtTaxRem6')."frm2200P:txtTaxRem6=</div>	
            <div>frm2200P:txtTaxPaid6=".request('frm2200P:txtTaxPaid6')."frm2200P:txtTaxPaid6=</div>	
            <div>frm2200P:txtUnderbond6=".request('frm2200P:txtUnderbond6')."frm2200P:txtUnderbond6=</div>	
            <div>frm2200P:txtExports6=".request('frm2200P:txtExports6')."frm2200P:txtExports6=</div>	
            <div>frm2200P:txtOthers6=".request('frm2200P:txtOthers6')."frm2200P:txtOthers6=</div>	
            <div>frm2200P:txtConditional6=".request('frm2200P:txtConditional6')."frm2200P:txtConditional6=</div>	
            <div>frm2200P:txtBasicTaxDue6=".request('frm2200P:txtBasicTaxDue6')."frm2200P:txtBasicTaxDue6=</div>	
            <div>frm2200P:txtPlaceOfRemoval7=".request('frm2200P:txtPlaceOfRemoval7')."frm2200P:txtPlaceOfRemoval7=</div>	
            <div>frm2200P:txtLocally7=".request('frm2200P:txtLocally7')."frm2200P:txtLocally7=</div>	
            <div>frm2200P:txtImported7=".request('frm2200P:txtImported7')."frm2200P:txtImported7=</div>	
            <div>frm2200P:txtTaxRem7=".request('frm2200P:txtTaxRem7')."frm2200P:txtTaxRem7=</div>	
            <div>frm2200P:txtTaxPaid7=".request('frm2200P:txtTaxPaid7')."frm2200P:txtTaxPaid7=</div>	
            <div>frm2200P:txtUnderbond7=".request('frm2200P:txtUnderbond7')."frm2200P:txtUnderbond7=</div>	
            <div>frm2200P:txtExports7=".request('frm2200P:txtExports7')."frm2200P:txtExports7=</div>	
            <div>frm2200P:txtOthers7=".request('frm2200P:txtOthers7')."frm2200P:txtOthers7=</div>	
            <div>frm2200P:txtConditional7=".request('frm2200P:txtConditional7')."frm2200P:txtConditional7=</div>	
            <div>frm2200P:txtBasicTaxDue7=".request('frm2200P:txtBasicTaxDue7')."frm2200P:txtBasicTaxDue7=</div>	
            <div>frm2200P:txtPlaceOfRemoval8=".request('frm2200P:txtPlaceOfRemoval8')."frm2200P:txtPlaceOfRemoval8=</div>	
            <div>frm2200P:txtLocally8=".request('frm2200P:txtLocally8')."frm2200P:txtLocally8=</div>	
            <div>frm2200P:txtImported8=".request('frm2200P:txtImported8')."frm2200P:txtImported8=</div>	
            <div>frm2200P:txtTaxRem8=".request('frm2200P:txtTaxRem8')."frm2200P:txtTaxRem8=</div>	
            <div>frm2200P:txtTaxPaid8=".request('frm2200P:txtTaxPaid8')."frm2200P:txtTaxPaid8=</div>	
            <div>frm2200P:txtUnderbond8=".request('frm2200P:txtUnderbond8')."frm2200P:txtUnderbond8=</div>	
            <div>frm2200P:txtExports8=".request('frm2200P:txtExports8')."frm2200P:txtExports8=</div>	
            <div>frm2200P:txtOthers8=".request('frm2200P:txtOthers8')."frm2200P:txtOthers8=</div>	
            <div>frm2200P:txtConditional8=".request('frm2200P:txtConditional8')."frm2200P:txtConditional8=</div>	
            <div>frm2200P:txtBasicTaxDue8=".request('frm2200P:txtBasicTaxDue8')."frm2200P:txtBasicTaxDue8=</div>	
            <div>frm2200P:txtPlaceOfRemoval9=".request('frm2200P:txtPlaceOfRemoval9')."frm2200P:txtPlaceOfRemoval9=</div>	
            <div>frm2200P:txtLocally9=".request('frm2200P:txtLocally9')."frm2200P:txtLocally9=</div>	
            <div>frm2200P:txtImported9=".request('frm2200P:txtImported9')."frm2200P:txtImported9=</div>	
            <div>frm2200P:txtTaxRem9=".request('frm2200P:txtTaxRem9')."frm2200P:txtTaxRem9=</div>	
            <div>frm2200P:txtTaxPaid9=".request('frm2200P:txtTaxPaid9')."frm2200P:txtTaxPaid9=</div>	
            <div>frm2200P:txtUnderbond9=".request('frm2200P:txtUnderbond9')."frm2200P:txtUnderbond9=</div>	
            <div>frm2200P:txtExports9=".request('frm2200P:txtExports9')."frm2200P:txtExports9=</div>	
            <div>frm2200P:txtOthers9=".request('frm2200P:txtOthers9')."frm2200P:txtOthers9=</div>	
            <div>frm2200P:txtConditional9=".request('frm2200P:txtConditional9')."frm2200P:txtConditional9=</div>	
            <div>frm2200P:txtBasicTaxDue9=".request('frm2200P:txtBasicTaxDue9')."frm2200P:txtBasicTaxDue9=</div>	
            <div>frm2200P:txtPlaceOfRemoval10=".request('frm2200P:txtPlaceOfRemoval10')."frm2200P:txtPlaceOfRemoval10=</div>	
            <div>frm2200P:txtLocally10=".request('frm2200P:txtLocally10')."frm2200P:txtLocally10=</div>	
            <div>frm2200P:txtImported10=".request('frm2200P:txtImported10')."frm2200P:txtImported10=</div>	
            <div>frm2200P:txtTaxRem10=".request('frm2200P:txtTaxRem10')."frm2200P:txtTaxRem10=</div>	
            <div>frm2200P:txtTaxPaid10=".request('frm2200P:txtTaxPaid10')."frm2200P:txtTaxPaid10=</div>	
            <div>frm2200P:txtUnderbond10=".request('frm2200P:txtUnderbond10')."frm2200P:txtUnderbond10=</div>	
            <div>frm2200P:txtExports10=".request('frm2200P:txtExports10')."frm2200P:txtExports10=</div>	
            <div>frm2200P:txtOthers10=".request('frm2200P:txtOthers10')."frm2200P:txtOthers10=</div>	
            <div>frm2200P:txtConditional10=".request('frm2200P:txtConditional10')."frm2200P:txtConditional10=</div>	
            <div>frm2200P:txtBasicTaxDue10=".request('frm2200P:txtBasicTaxDue10')."frm2200P:txtBasicTaxDue10=</div>	
            <div>frm2200P:txtPlaceOfRemoval11=".request('frm2200P:txtPlaceOfRemoval11')."frm2200P:txtPlaceOfRemoval11=</div>	
            <div>frm2200P:txtLocally11=".request('frm2200P:txtLocally11')."frm2200P:txtLocally11=</div>	
            <div>frm2200P:txtImported11=".request('frm2200P:txtImported11')."frm2200P:txtImported11=</div>	
            <div>frm2200P:txtTaxRem11=".request('frm2200P:txtTaxRem11')."frm2200P:txtTaxRem11=</div>	
            <div>frm2200P:txtTaxPaid11=".request('frm2200P:txtTaxPaid11')."frm2200P:txtTaxPaid11=</div>	
            <div>frm2200P:txtUnderbond11=".request('frm2200P:txtUnderbond11')."frm2200P:txtUnderbond11=</div>	
            <div>frm2200P:txtExports11=".request('frm2200P:txtExports11')."frm2200P:txtExports11=</div>	
            <div>frm2200P:txtOthers11=".request('frm2200P:txtOthers11')."frm2200P:txtOthers11=</div>	
            <div>frm2200P:txtConditional11=".request('frm2200P:txtConditional11')."frm2200P:txtConditional11=</div>	
            <div>frm2200P:txtBasicTaxDue11=".request('frm2200P:txtBasicTaxDue11')."frm2200P:txtBasicTaxDue11=</div>	
            <div>frm2200P:txtPlaceOfRemoval12=".request('frm2200P:txtPlaceOfRemoval12')."frm2200P:txtPlaceOfRemoval12=</div>	
            <div>frm2200P:txtLocally12=".request('frm2200P:txtLocally12')."frm2200P:txtLocally12=</div>	
            <div>frm2200P:txtImported12=".request('frm2200P:txtImported12')."frm2200P:txtImported12=</div>	
            <div>frm2200P:txtTaxRem12=".request('frm2200P:txtTaxRem12')."frm2200P:txtTaxRem12=</div>	
            <div>frm2200P:txtTaxPaid12=".request('frm2200P:txtTaxPaid12')."frm2200P:txtTaxPaid12=</div>	
            <div>frm2200P:txtUnderbond12=".request('frm2200P:txtUnderbond12')."frm2200P:txtUnderbond12=</div>	
            <div>frm2200P:txtExports12=".request('frm2200P:txtExports12')."frm2200P:txtExports12=</div>	
            <div>frm2200P:txtOthers12=".request('frm2200P:txtOthers12')."frm2200P:txtOthers12=</div>	
            <div>frm2200P:txtConditional12=".request('frm2200P:txtConditional12')."frm2200P:txtConditional12=</div>	
            <div>frm2200P:txtBasicTaxDue12=".request('frm2200P:txtBasicTaxDue12')."frm2200P:txtBasicTaxDue12=</div>	
            <div>frm2200P:txtPlaceOfRemoval13=".request('frm2200P:txtPlaceOfRemoval13')."frm2200P:txtPlaceOfRemoval13=</div>	
            <div>frm2200P:txtLocally13=".request('frm2200P:txtLocally13')."frm2200P:txtLocally13=</div>	
            <div>frm2200P:txtImported13=".request('frm2200P:txtImported13')."frm2200P:txtImported13=</div>	
            <div>frm2200P:txtTaxRem13=".request('frm2200P:txtTaxRem13')."frm2200P:txtTaxRem13=</div>	
            <div>frm2200P:txtTaxPaid13=".request('frm2200P:txtTaxPaid13')."frm2200P:txtTaxPaid13=</div>	
            <div>frm2200P:txtUnderbond13=".request('frm2200P:txtUnderbond13')."frm2200P:txtUnderbond13=</div>	
            <div>frm2200P:txtExports13=".request('frm2200P:txtExports13')."frm2200P:txtExports13=</div>	
            <div>frm2200P:txtOthers13=".request('frm2200P:txtOthers13')."frm2200P:txtOthers13=</div>	
            <div>frm2200P:txtConditional13=".request('frm2200P:txtConditional13')."frm2200P:txtConditional13=</div>	
            <div>frm2200P:txtBasicTaxDue13=".request('frm2200P:txtBasicTaxDue13')."frm2200P:txtBasicTaxDue13=</div>	
            <div>frm2200P:txtPlaceOfRemoval14=".request('frm2200P:txtPlaceOfRemoval14')."frm2200P:txtPlaceOfRemoval14=</div>	
            <div>frm2200P:txtLocally14=".request('frm2200P:txtLocally14')."frm2200P:txtLocally14=</div>	
            <div>frm2200P:txtImported14=".request('frm2200P:txtImported14')."frm2200P:txtImported14=</div>	
            <div>frm2200P:txtTaxRem14=".request('frm2200P:txtTaxRem14')."frm2200P:txtTaxRem14=</div>	
            <div>frm2200P:txtTaxPaid14=".request('frm2200P:txtTaxPaid14')."frm2200P:txtTaxPaid14=</div>	
            <div>frm2200P:txtUnderbond14=".request('frm2200P:txtUnderbond14')."frm2200P:txtUnderbond14=</div>	
            <div>frm2200P:txtExports14=".request('frm2200P:txtExports14')."frm2200P:txtExports14=</div>	
            <div>frm2200P:txtOthers14=".request('frm2200P:txtOthers14')."frm2200P:txtOthers14=</div>	
            <div>frm2200P:txtConditional14=".request('frm2200P:txtConditional14')."frm2200P:txtConditional14=</div>	
            <div>frm2200P:txtBasicTaxDue14=".request('frm2200P:txtBasicTaxDue14')."frm2200P:txtBasicTaxDue14=</div>	
            <div>frm2200P:txtPlaceOfRemoval15=".request('frm2200P:txtPlaceOfRemoval15')."frm2200P:txtPlaceOfRemoval15=</div>	
            <div>frm2200P:txtLocally15=".request('frm2200P:txtLocally15')."frm2200P:txtLocally15=</div>	
            <div>frm2200P:txtImported15=".request('frm2200P:txtImported15')."frm2200P:txtImported15=</div>	
            <div>frm2200P:txtTaxRem15=".request('frm2200P:txtTaxRem15')."frm2200P:txtTaxRem15=</div>	
            <div>frm2200P:txtTaxPaid15=".request('frm2200P:txtTaxPaid15')."frm2200P:txtTaxPaid15=</div>	
            <div>frm2200P:txtUnderbond15=".request('frm2200P:txtUnderbond15')."frm2200P:txtUnderbond15=</div>	
            <div>frm2200P:txtExports15=".request('frm2200P:txtExports15')."frm2200P:txtExports15=</div>	
            <div>frm2200P:txtOthers15=".request('frm2200P:txtOthers15')."frm2200P:txtOthers15=</div>	
            <div>frm2200P:txtConditional15=".request('frm2200P:txtConditional15')."frm2200P:txtConditional15=</div>	
            <div>frm2200P:txtBasicTaxDue15=".request('frm2200P:txtBasicTaxDue15')."frm2200P:txtBasicTaxDue15=</div>	
            <div>frm2200P:txtPlaceOfRemoval16=".request('frm2200P:txtPlaceOfRemoval16')."frm2200P:txtPlaceOfRemoval16=</div>	
            <div>frm2200P:txtLocally16=".request('frm2200P:txtLocally16')."frm2200P:txtLocally16=</div>	
            <div>frm2200P:txtImported16=".request('frm2200P:txtImported16')."frm2200P:txtImported16=</div>	
            <div>frm2200P:txtTaxRem16=".request('frm2200P:txtTaxRem16')."frm2200P:txtTaxRem16=</div>	
            <div>frm2200P:txtTaxPaid16=".request('frm2200P:txtTaxPaid16')."frm2200P:txtTaxPaid16=</div>	
            <div>frm2200P:txtUnderbond16=".request('frm2200P:txtUnderbond16')."frm2200P:txtUnderbond16=</div>	
            <div>frm2200P:txtExports16=".request('frm2200P:txtExports16')."frm2200P:txtExports16=</div>	
            <div>frm2200P:txtOthers16=".request('frm2200P:txtOthers16')."frm2200P:txtOthers16=</div>	
            <div>frm2200P:txtConditional16=".request('frm2200P:txtConditional16')."frm2200P:txtConditional16=</div>	
            <div>frm2200P:txtBasicTaxDue16=".request('frm2200P:txtBasicTaxDue16')."frm2200P:txtBasicTaxDue16=</div>	
            <div>frm2200P:txtPlaceOfRemoval17=".request('frm2200P:txtPlaceOfRemoval17')."frm2200P:txtPlaceOfRemoval17=</div>	
            <div>frm2200P:txtLocally17=".request('frm2200P:txtLocally17')."frm2200P:txtLocally17=</div>	
            <div>frm2200P:txtImported17=".request('frm2200P:txtImported17')."frm2200P:txtImported17=</div>	
            <div>frm2200P:txtTaxRem17=".request('frm2200P:txtTaxRem17')."frm2200P:txtTaxRem17=</div>	
            <div>frm2200P:txtTaxPaid17=".request('frm2200P:txtTaxPaid17')."frm2200P:txtTaxPaid17=</div>	
            <div>frm2200P:txtUnderbond17=".request('frm2200P:txtUnderbond17')."frm2200P:txtUnderbond17=</div>	
            <div>frm2200P:txtExports17=".request('frm2200P:txtExports17')."frm2200P:txtExports17=</div>	
            <div>frm2200P:txtOthers17=".request('frm2200P:txtOthers17')."frm2200P:txtOthers17=</div>	
            <div>frm2200P:txtConditional17=".request('frm2200P:txtConditional17')."frm2200P:txtConditional17=</div>	
            <div>frm2200P:txtBasicTaxDue17=".request('frm2200P:txtBasicTaxDue17')."frm2200P:txtBasicTaxDue17=</div>	
            <div>frm2200P:txtPlaceOfRemoval18=".request('frm2200P:txtPlaceOfRemoval18')."frm2200P:txtPlaceOfRemoval18=</div>	
            <div>frm2200P:txtLocally18=".request('frm2200P:txtLocally18')."frm2200P:txtLocally18=</div>	
            <div>frm2200P:txtImported18=".request('frm2200P:txtImported18')."frm2200P:txtImported18=</div>	
            <div>frm2200P:txtTaxRem18=".request('frm2200P:txtTaxRem18')."frm2200P:txtTaxRem18=</div>	
            <div>frm2200P:txtTaxPaid18=".request('frm2200P:txtTaxPaid18')."frm2200P:txtTaxPaid18=</div>	
            <div>frm2200P:txtUnderbond18=".request('frm2200P:txtUnderbond18')."frm2200P:txtUnderbond18=</div>	
            <div>frm2200P:txtExports18=".request('frm2200P:txtExports18')."frm2200P:txtExports18=</div>	
            <div>frm2200P:txtOthers18=".request('frm2200P:txtOthers18')."frm2200P:txtOthers18=</div>	
            <div>frm2200P:txtConditional18=".request('frm2200P:txtConditional18')."frm2200P:txtConditional18=</div>	
            <div>frm2200P:txtBasicTaxDue18=".request('frm2200P:txtBasicTaxDue18')."frm2200P:txtBasicTaxDue18=</div>	
            <div>frm2200P:txtPlaceOfRemoval19=".request('frm2200P:txtPlaceOfRemoval19')."frm2200P:txtPlaceOfRemoval19=</div>	
            <div>frm2200P:txtLocally19=".request('frm2200P:txtLocally19')."frm2200P:txtLocally19=</div>	
            <div>frm2200P:txtImported19=".request('frm2200P:txtImported19')."frm2200P:txtImported19=</div>	
            <div>frm2200P:txtTaxRem19=".request('frm2200P:txtTaxRem19')."frm2200P:txtTaxRem19=</div>	
            <div>frm2200P:txtTaxPaid19=".request('frm2200P:txtTaxPaid19')."frm2200P:txtTaxPaid19=</div>	
            <div>frm2200P:txtUnderbond19=".request('frm2200P:txtUnderbond19')."frm2200P:txtUnderbond19=</div>	
            <div>frm2200P:txtExports19=".request('frm2200P:txtExports19')."frm2200P:txtExports19=</div>	
            <div>frm2200P:txtOthers19=".request('frm2200P:txtOthers19')."frm2200P:txtOthers19=</div>	
            <div>frm2200P:txtConditional19=".request('frm2200P:txtConditional19')."frm2200P:txtConditional19=</div>	
            <div>frm2200P:txtBasicTaxDue19=".request('frm2200P:txtBasicTaxDue19')."frm2200P:txtBasicTaxDue19=</div>	
            <div>frm2200P:txtPlaceOfRemoval20=".request('frm2200P:txtPlaceOfRemoval20')."frm2200P:txtPlaceOfRemoval20=</div>	
            <div>frm2200P:txtLocally20=".request('frm2200P:txtLocally20')."frm2200P:txtLocally20=</div>	
            <div>frm2200P:txtImported20=".request('frm2200P:txtImported20')."frm2200P:txtImported20=</div>	
            <div>frm2200P:txtTaxRem20=".request('frm2200P:txtTaxRem20')."frm2200P:txtTaxRem20=</div>	
            <div>frm2200P:txtTaxPaid20=".request('frm2200P:txtTaxPaid20')."frm2200P:txtTaxPaid20=</div>	
            <div>frm2200P:txtUnderbond20=".request('frm2200P:txtUnderbond20')."frm2200P:txtUnderbond20=</div>	
            <div>frm2200P:txtExports20=".request('frm2200P:txtExports20')."frm2200P:txtExports20=</div>	
            <div>frm2200P:txtOthers20=".request('frm2200P:txtOthers20')."frm2200P:txtOthers20=</div>	
            <div>frm2200P:txtConditional20=".request('frm2200P:txtConditional20')."frm2200P:txtConditional20=</div>	
            <div>frm2200P:txtBasicTaxDue20=".request('frm2200P:txtBasicTaxDue20')."frm2200P:txtBasicTaxDue20=</div>	
            <div>frm2200P:txtPlaceOfRemoval21=".request('frm2200P:txtPlaceOfRemoval21')."frm2200P:txtPlaceOfRemoval21=</div>	
            <div>frm2200P:txtLocally21=".request('frm2200P:txtLocally21')."frm2200P:txtLocally21=</div>	
            <div>frm2200P:txtImported21=".request('frm2200P:txtImported21')."frm2200P:txtImported21=</div>	
            <div>frm2200P:txtTaxRem21=".request('frm2200P:txtTaxRem21')."frm2200P:txtTaxRem21=</div>	
            <div>frm2200P:txtTaxPaid21=".request('frm2200P:txtTaxPaid21')."frm2200P:txtTaxPaid21=</div>	
            <div>frm2200P:txtUnderbond21=".request('frm2200P:txtUnderbond21')."frm2200P:txtUnderbond21=</div>	
            <div>frm2200P:txtExports21=".request('frm2200P:txtExports21')."frm2200P:txtExports21=</div>	
            <div>frm2200P:txtOthers21=".request('frm2200P:txtOthers21')."frm2200P:txtOthers21=</div>	
            <div>frm2200P:txtConditional21=".request('frm2200P:txtConditional21')."frm2200P:txtConditional21=</div>	
            <div>frm2200P:txtBasicTaxDue21=".request('frm2200P:txtBasicTaxDue21')."frm2200P:txtBasicTaxDue21=</div>	
            <div>frm2200P:txtPlaceOfRemoval22=".request('frm2200P:txtPlaceOfRemoval22')."frm2200P:txtPlaceOfRemoval22=</div>	
            <div>frm2200P:txtLocally22=".request('frm2200P:txtLocally22')."frm2200P:txtLocally22=</div>	
            <div>frm2200P:txtImported22=".request('frm2200P:txtImported22')."frm2200P:txtImported22=</div>	
            <div>frm2200P:txtTaxRem22=".request('frm2200P:txtTaxRem22')."frm2200P:txtTaxRem22=</div>	
            <div>frm2200P:txtTaxPaid22=".request('frm2200P:txtTaxPaid22')."frm2200P:txtTaxPaid22=</div>	
            <div>frm2200P:txtUnderbond22=".request('frm2200P:txtUnderbond22')."frm2200P:txtUnderbond22=</div>	
            <div>frm2200P:txtExports22=".request('frm2200P:txtExports22')."frm2200P:txtExports22=</div>	
            <div>frm2200P:txtOthers22=".request('frm2200P:txtOthers22')."frm2200P:txtOthers22=</div>	
            <div>frm2200P:txtConditional22=".request('frm2200P:txtConditional22')."frm2200P:txtConditional22=</div>	
            <div>frm2200P:txtBasicTaxDue22=".request('frm2200P:txtBasicTaxDue22')."frm2200P:txtBasicTaxDue22=</div>	
            <div>frm2200P:txtPlaceOfRemoval23=".request('frm2200P:txtPlaceOfRemoval23')."frm2200P:txtPlaceOfRemoval23=</div>	
            <div>frm2200P:txtLocally23=".request('frm2200P:txtLocally23')."frm2200P:txtLocally23=</div>	
            <div>frm2200P:txtImported23=".request('frm2200P:txtImported23')."frm2200P:txtImported23=</div>	
            <div>frm2200P:txtTaxRem23=".request('frm2200P:txtTaxRem23')."frm2200P:txtTaxRem23=</div>	
            <div>frm2200P:txtTaxPaid23=".request('frm2200P:txtTaxPaid23')."frm2200P:txtTaxPaid23=</div>	
            <div>frm2200P:txtUnderbond23=".request('frm2200P:txtUnderbond23')."frm2200P:txtUnderbond23=</div>	
            <div>frm2200P:txtExports23=".request('frm2200P:txtExports23')."frm2200P:txtExports23=</div>	
            <div>frm2200P:txtOthers23=".request('frm2200P:txtOthers23')."frm2200P:txtOthers23=</div>	
            <div>frm2200P:txtConditional23=".request('frm2200P:txtConditional23')."frm2200P:txtConditional23=</div>	
            <div>frm2200P:txtBasicTaxDue23=".request('frm2200P:txtBasicTaxDue23')."frm2200P:txtBasicTaxDue23=</div>	
            <div>frm2200P:txtPlaceOfRemoval24=".request('frm2200P:txtPlaceOfRemoval24')."frm2200P:txtPlaceOfRemoval24=</div>	
            <div>frm2200P:txtLocally24=".request('frm2200P:txtLocally24')."frm2200P:txtLocally24=</div>	
            <div>frm2200P:txtImported24=".request('frm2200P:txtImported24')."frm2200P:txtImported24=</div>	
            <div>frm2200P:txtTaxRem24=".request('frm2200P:txtTaxRem24')."frm2200P:txtTaxRem24=</div>	
            <div>frm2200P:txtTaxPaid24=".request('frm2200P:txtTaxPaid24')."frm2200P:txtTaxPaid24=</div>	
            <div>frm2200P:txtUnderbond24=".request('frm2200P:txtUnderbond24')."frm2200P:txtUnderbond24=</div>	
            <div>frm2200P:txtExports24=".request('frm2200P:txtExports24')."frm2200P:txtExports24=</div>	
            <div>frm2200P:txtOthers24=".request('frm2200P:txtOthers24')."frm2200P:txtOthers24=</div>	
            <div>frm2200P:txtConditional24=".request('frm2200P:txtConditional24')."frm2200P:txtConditional24=</div>	
            <div>frm2200P:txtBasicTaxDue24=".request('frm2200P:txtBasicTaxDue24')."frm2200P:txtBasicTaxDue24=</div>	
            <div>frm2200P:txtPlaceOfRemoval25=".request('frm2200P:txtPlaceOfRemoval25')."frm2200P:txtPlaceOfRemoval25=</div>	
            <div>frm2200P:txtLocally25=".request('frm2200P:txtLocally25')."frm2200P:txtLocally25=</div>	
            <div>frm2200P:txtImported25=".request('frm2200P:txtImported25')."frm2200P:txtImported25=</div>	
            <div>frm2200P:txtTaxRem25=".request('frm2200P:txtTaxRem25')."frm2200P:txtTaxRem25=</div>	
            <div>frm2200P:txtTaxPaid25=".request('frm2200P:txtTaxPaid25')."frm2200P:txtTaxPaid25=</div>	
            <div>frm2200P:txtUnderbond25=".request('frm2200P:txtUnderbond25')."frm2200P:txtUnderbond25=</div>	
            <div>frm2200P:txtExports25=".request('frm2200P:txtExports25')."frm2200P:txtExports25=</div>	
            <div>frm2200P:txtOthers25=".request('frm2200P:txtOthers25')."frm2200P:txtOthers25=</div>	
            <div>frm2200P:txtConditional25=".request('frm2200P:txtConditional25')."frm2200P:txtConditional25=</div>	
            <div>frm2200P:txtBasicTaxDue25=".request('frm2200P:txtBasicTaxDue25')."frm2200P:txtBasicTaxDue25=</div>	
            <div>frm2200P:sched1Chk0=falsefrm2200P:sched1Chk0=</div>	
            <div>frm2200P:txtsched1Atc0=".request('frm2200P:txtsched1Atc')[0]."frm2200P:txtsched1Atc0=</div>	
            <div>frm2200P:txtsched1Desc0=".request('frm2200P:txtsched1Desc')[0]."frm2200P:txtsched1Desc0=</div>	
            <div>frm2200P:txtsched1UnitOfMeasure0=".request('frm2200P:txtsched1UnitOfMeasure')[0]."frm2200P:txtsched1UnitOfMeasure0=</div>	
            <div>frm2200P:txtsched1AppRate0=".request('frm2200P:txtsched1AppRate')[0]."frm2200P:txtsched1AppRate0=</div>	
            <div>frm2200P:txtsched1PlaceOfRemoval0=".request('frm2200P:txtsched1PlaceOfRemoval')[0]."frm2200P:txtsched1PlaceOfRemoval0=</div>	
            <div>frm2200P:txtsched1Locally0=".request('frm2200P:txtsched1Locally')[0]."frm2200P:txtsched1Locally0=</div>	
            <div>frm2200P:txtsched1Imported0=".request('frm2200P:txtsched1Imported')[0]."frm2200P:txtsched1Imported0=</div>	
            <div>frm2200P:txtsched1TaxRem0=".request('frm2200P:txtsched1TaxRem')[0]."frm2200P:txtsched1TaxRem0=</div>	
            <div>frm2200P:txtsched1TaxPaid0=".request('frm2200P:txtsched1TaxPaid')[0]."frm2200P:txtsched1TaxPaid0=</div>	
            <div>frm2200P:txtsched1Underbond0=".request('frm2200P:txtsched1Underbond')[0]."frm2200P:txtsched1Underbond0=</div>	
            <div>frm2200P:txtsched1Exports0=".request('frm2200P:txtsched1Exports')[0]."frm2200P:txtsched1Exports0=</div>	
            <div>frm2200P:txtsched1Others0=".request('frm2200P:txtsched1Others')[0]."frm2200P:txtsched1Others0=</div>	
            <div>frm2200P:txtsched1Conditional0=".request('frm2200P:txtsched1Conditional')[0]."frm2200P:txtsched1Conditional0=</div>	
            <div>frm2200P:txtsched1BasicTaxDue0=".request('frm2200P:txtsched1BasicTaxDue')[0]."frm2200P:txtsched1BasicTaxDue0=</div>	
            ".$ext."<div>frm2200P:totalTaxDue=".request('frm2200P:totalTaxDue')."frm2200P:totalTaxDue=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm2200P:txtTIN1').request('frm2200P:txtTIN2').request('frm2200P:txtTIN3').request('frm2200P:txtBranchCode');
    		
    	$returnPeriod = request('frm2200P:txtMonth1')."/".request('frm2200P:txtDate')."/".request('frm2200P:txtForYr')." ".date('H:i:s');

    	$xmlReturnPeriod = request('frm2200P:txtMonth1').request('frm2200P:txtDate').request('frm2200P:txtForYr').date('His');

        $filename = $tin."-2200P-".$xmlReturnPeriod.'.xml';

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
	     		'form'			=> '2200P',
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
     						->where('form', '2200P')
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
                            ->where('form', '2200P')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2200P::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2200P')
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
        $data = tbl_2200P::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2200P')
                            ->get();
        
        return view('forms.BIR-Form 2200P',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Xml;
use App\tbl_1600WP;
use App\tbl_1600WP_atc;
use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1600WPController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1600_w_ps')){

            }else{
                Schema::connection('mysql2')->create('tbl_1600_w_ps', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1FromA')->nullable();
                    $table->string('item1FromB')->nullable();
                    $table->string('item1FromC')->nullable();
                    $table->string('item1ToA')->nullable();
                    $table->string('item1ToB')->nullable();
                    $table->string('item1ToC')->nullable();
                    $table->string('item2');
                    $table->string('item3')->nullable();
                    $table->string('item4')->nullable();
                    $table->string('item7')->nullable();
                    $table->string('item11')->nullable();
                    $table->string('item11A')->nullable();
                    $table->text('item12');
                    $table->text('item13');
                    $table->text('item14');
                    $table->text('item15A');
                    $table->text('item15B');
                    $table->text('item15C');
                    $table->text('item15D');
                    $table->text('item16');
                    $table->text('tin1')->nullable();
                    $table->text('name1')->nullable();
                    $table->text('atc1')->nullable();
                    $table->text('payment1')->nullable();
                    $table->text('amount1')->nullable();
                    $table->text('rate1')->nullable();
                    $table->text('withheld1')->nullable();
                    $table->text('tin2')->nullable();
                    $table->text('name2')->nullable();
                    $table->text('atc2')->nullable();
                    $table->text('payment2')->nullable();
                    $table->text('amount2')->nullable();
                    $table->text('rate2')->nullable();
                    $table->text('withheld2')->nullable();
                    $table->text('tin3')->nullable();
                    $table->text('name3')->nullable();
                    $table->text('atc3')->nullable();
                    $table->text('payment3')->nullable();
                    $table->text('amount3')->nullable();
                    $table->text('rate3')->nullable();
                    $table->text('withheld3')->nullable();
                    $table->text('tin4')->nullable();
                    $table->text('name4')->nullable();
                    $table->text('atc4')->nullable();
                    $table->text('payment4')->nullable();
                    $table->text('amount4')->nullable();
                    $table->text('rate4')->nullable();
                    $table->text('withheld4')->nullable();
                    $table->text('tin5')->nullable();
                    $table->text('name5')->nullable();
                    $table->text('atc5')->nullable();
                    $table->text('payment5')->nullable();
                    $table->text('amount5')->nullable();
                    $table->text('rate5')->nullable();
                    $table->text('withheld5')->nullable();
                    $table->text('tin6')->nullable();
                    $table->text('name6')->nullable();
                    $table->text('atc6')->nullable();
                    $table->text('payment6')->nullable();
                    $table->text('amount6')->nullable();
                    $table->text('rate6')->nullable();
                    $table->text('withheld6')->nullable();
                    $table->text('tin7')->nullable();
                    $table->text('name7')->nullable();
                    $table->text('atc7')->nullable();
                    $table->text('payment7')->nullable();
                    $table->text('amount7')->nullable();
                    $table->text('rate7')->nullable();
                    $table->text('withheld7')->nullable();
                    $table->text('tin8')->nullable();
                    $table->text('name8')->nullable();
                    $table->text('atc8')->nullable();
                    $table->text('payment8')->nullable();
                    $table->text('amount8')->nullable();
                    $table->text('rate8')->nullable();
                    $table->text('withheld8')->nullable();
                    $table->text('tin9')->nullable();
                    $table->text('name9')->nullable();
                    $table->text('atc9')->nullable();
                    $table->text('payment9')->nullable();
                    $table->text('amount9')->nullable();
                    $table->text('rate9')->nullable();
                    $table->text('withheld9')->nullable();
                    $table->text('tin10')->nullable();
                    $table->text('name10')->nullable();
                    $table->text('atc10')->nullable();
                    $table->text('payment10')->nullable();
                    $table->text('amount10')->nullable();
                    $table->text('rate10')->nullable();
                    $table->text('withheld10')->nullable();
                    $table->timestamps();
                });

				Schema::connection('mysql2')->create('tbl_1600_w_p_atcs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc')->nullable();
                    $table->text('tax')->nullable();
                    $table->text('rate')->nullable();
                    $table->text('withheld')->nullable();
                    $table->timestamps();
                });

            }
        	return view('forms.BIR-Form 1600WP',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
    	}else{
    		$data = tbl_1600WP::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1600WP')
                            ->get();
        
        	return view('forms.BIR-Form 1600WP',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    	}
    }

    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	$data = ([
    			'form_no' => request('form_no'),
				'company_id' => request('company'),
				'item1FromA' => request('frm1600WP:DateWithholdingMonth'),
				'item1FromB' => request('frm1600WP:DateWithholdingDay'),
				'item1FromC' => request('frm1600WP:DateWithholdingYear'),
				'item1ToA' => request('frm1600WP:DateWithholdingToMonth'),
				'item1ToB' => request('frm1600WP:DateWithholdingToDay'),
				'item1ToC' => request('frm1600WP:DateWithholdingToYear'),
				'item2' => request('frm1600WP:AmendedReturn1'),
				'item3' => request('frm1600WP:txtSheets'),
				'item4' => null !== request('frm1600WP:AnyTaxHeld') ? request('frm1600WP:AnyTaxHeld') : '',
				'item7' => null !== request('frm1600WP:CategoryAgent') ? request('frm1600WP:CategoryAgent') : '',
				'item11' => request('frm1600WP:SpecialLaw'),
				'item11A' => request('frm1600WP:SpecialLawSelect'),
				'item12' => request('frm1600WP:txtTax12'),
				'item13' => request('frm1600WP:txtTax13'),
				'item14' => request('frm1600WP:txtTax14'),
				'item15A' => request('frm1600WP:txtTax15A'),
				'item15B' => request('frm1600WP:txtTax15B'),
				'item15C' => request('frm1600WP:txtTax15C'),
				'item15D' => request('frm1600WP:txtTax15D'),
				'item16' => request('frm1600WP:txtTax16'),
				'tin1' => request('frm1600WP:dtSched:txtTin1'),
				'name1' => request('frm1600WP:dtSched:txtFullname1'),
				'atc1' => request('frm1600WP:dtSched:drpAtcCode1'),
				'payment1' => request('frm1600WP:dtSched:naturePayment1'),
				'amount1' => request('frm1600WP:dtSched:amount1'),
				'rate1' => request('frm1600WP:dtSched:txtRatePercent1'),
				'withheld1' => request('frm1600WP:dtSched:taxWithheld1'),
				'tin2' => request('frm1600WP:dtSched:txtTin2'),
				'name2' => request('frm1600WP:dtSched:txtFullname2'),
				'atc2' => request('frm1600WP:dtSched:drpAtcCode2'),
				'payment2' => request('frm1600WP:dtSched:naturePayment2'),
				'amount2' => request('frm1600WP:dtSched:amount2'),
				'rate2' => request('frm1600WP:dtSched:txtRatePercent2'),
				'withheld2' => request('frm1600WP:dtSched:taxWithheld2'),
				'tin3' => request('frm1600WP:dtSched:txtTin3'),
				'name3' => request('frm1600WP:dtSched:txtFullname3'),
				'atc3' => request('frm1600WP:dtSched:drpAtcCode3'),
				'payment3' => request('frm1600WP:dtSched:naturePayment3'),
				'amount3' => request('frm1600WP:dtSched:amount3'),
				'rate3' => request('frm1600WP:dtSched:txtRatePercent3'),
				'withheld3' => request('frm1600WP:dtSched:taxWithheld3'),
				'tin4' => request('frm1600WP:dtSched:txtTin4'),
				'name4' => request('frm1600WP:dtSched:txtFullname4'),
				'atc4' => request('frm1600WP:dtSched:drpAtcCode4'),
				'payment4' => request('frm1600WP:dtSched:naturePayment4'),
				'amount4' => request('frm1600WP:dtSched:amount4'),
				'rate4' => request('frm1600WP:dtSched:txtRatePercent4'),
				'withheld4' => request('frm1600WP:dtSched:taxWithheld4'),
				'tin5' => request('frm1600WP:dtSched:txtTin5'),
				'name5' => request('frm1600WP:dtSched:txtFullname5'),
				'atc5' => request('frm1600WP:dtSched:drpAtcCode5'),
				'payment5' => request('frm1600WP:dtSched:naturePayment5'),
				'amount5' => request('frm1600WP:dtSched:amount5'),
				'rate5' => request('frm1600WP:dtSched:txtRatePercent5'),
				'withheld5' => request('frm1600WP:dtSched:taxWithheld5'),
				'tin6' => request('frm1600WP:dtSched:txtTin6'),
				'name6' => request('frm1600WP:dtSched:txtFullname6'),
				'atc6' => request('frm1600WP:dtSched:drpAtcCode6'),
				'payment6' => request('frm1600WP:dtSched:naturePayment6'),
				'amount6' => request('frm1600WP:dtSched:amount6'),
				'rate6' => request('frm1600WP:dtSched:txtRatePercent6'),
				'withheld6' => request('frm1600WP:dtSched:taxWithheld6'),
				'tin7' => request('frm1600WP:dtSched:txtTin7'),
				'name7' => request('frm1600WP:dtSched:txtFullname7'),
				'atc7' => request('frm1600WP:dtSched:drpAtcCode7'),
				'payment7' => request('frm1600WP:dtSched:naturePayment7'),
				'amount7' => request('frm1600WP:dtSched:amount7'),
				'rate7' => request('frm1600WP:dtSched:txtRatePercent7'),
				'withheld7' => request('frm1600WP:dtSched:taxWithheld7'),
				'tin8' => request('frm1600WP:dtSched:txtTin8'),
				'name8' => request('frm1600WP:dtSched:txtFullname8'),
				'atc8' => request('frm1600WP:dtSched:drpAtcCode8'),
				'payment8' => request('frm1600WP:dtSched:naturePayment8'),
				'amount8' => request('frm1600WP:dtSched:amount8'),
				'rate8' => request('frm1600WP:dtSched:txtRatePercent8'),
				'withheld8' => request('frm1600WP:dtSched:taxWithheld8'),
				'tin9' => request('frm1600WP:dtSched:txtTin9'),
				'name9' => request('frm1600WP:dtSched:txtFullname9'),
				'atc9' => request('frm1600WP:dtSched:drpAtcCode9'),
				'payment9' => request('frm1600WP:dtSched:naturePayment9'),
				'amount9' => request('frm1600WP:dtSched:amount9'),
				'rate9' => request('frm1600WP:dtSched:txtRatePercent9'),
				'withheld9' => request('frm1600WP:dtSched:taxWithheld9'),
				'tin10' => request('frm1600WP:dtSched:txtTin10'),
				'name10' => request('frm1600WP:dtSched:txtFullname10'),
				'atc10' => request('frm1600WP:dtSched:drpAtcCode10'),
				'payment10' => request('frm1600WP:dtSched:naturePayment10'),
				'amount10' => request('frm1600WP:dtSched:amount10'),
				'rate10' => request('frm1600WP:dtSched:txtRatePercent10'),
				'withheld10' => request('frm1600WP:dtSched:taxWithheld10'),
    		]);

		$getForm = tbl_1600WP::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
        if(request('form_id') != ""){
            $form = tbl_1600WP::find(request('form_id'));
            $form->update($data);
            tbl_1600WP_atc::where('form_id', $getForm[0]->id)->delete();
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1600WP::create($data);
            }else{
                $form = tbl_1600WP::find($getForm[0]->id);
                $form->update($data);
                tbl_1600WP_atc::where('form_id', $getForm[0]->id)->delete();
            }
        }

        if(null !== request('frm1600WP:txtAtcCode')){
        	for ($i=0; $i < count(request('frm1600WP:txtAtcCode')) ; $i++) { 
        		$data = ([
        			'form_id'  => $form->id,
        			'atc'		=> request('frm1600WP:txtAtcCode')[$i],
        			'tax'		=> request('frm1600WP:txtTaxBase')[$i],
        			'rate'		=> request('frm1600WP:txtTaxRate')[$i],
        			'withheld'		=> request('frm1600WP:txtTaxbeWithHeld')[$i],
        			]);
        		tbl_1600WP_atc::create($data);
        	}
        }

        $AmendedReturn_1 = "false";
        $AmendedReturn_2 = "false";

        if(request('frm1600WP:AmendedReturn1') == 'Y'){
        	$AmendedReturn_1 = "true";
        }else if(request('frm1600WP:AmendedReturn1') == 'N'){
        	$AmendedReturn_2 = "true";
        }

        $AnyTaxHeld_1 = "false";
        $AnyTaxHeld_2 = "false";
        if(null !== request('frm1600WP:AnyTaxHeld')){
        	if(request('frm1600WP:AnyTaxHeld') == 'Y'){
	        	$AnyTaxHeld_1 = "true";
	        }else if(request('frm1600WP:AnyTaxHeld') == 'N'){
	        	$AnyTaxHeld_2 = "true";
	        }
        }
        

        $CategoryAgent_P = "false";
        $CategoryAgent_G = "false";

        if(null !== request('frm1600WP:CategoryAgent')){
        	if(request('frm1600WP:CategoryAgent') == 'P'){
        		$CategoryAgent_P = "true";
        	}else if(request('frm1600WP:CategoryAgent') == 'G'){
        		$CategoryAgent_G = "true";
        	}
        }

        $taxPayerName =  rawurlencode(request('frm1600WP:txtTaxpayerName'));

        $address = rawurlencode(request('frm1600WP:txtAddress'));

        $SpecialLaw_1 = "false";
        $SpecialLaw_2 = "false";

        if(request('frm1600WP:SpecialLaw') == 'Y'){
        	$SpecialLaw_1 = "true";
        }else if(request('frm1600WP:SpecialLaw') == 'N'){
        	$SpecialLaw_2 = "true";
        }

        $ext = "";
        if(null !== request('frm1600WP:CategoryAgent')){
        	$ext = "<div>AtcCd1=".(null !== request('AtcCd1') ? 'true' : 'false')."AtcCd1=</div>	
            <div>AtcCd2=".(null !== request('AtcCd2') ? 'true' : 'false')."AtcCd2=</div>	
            <div>SchedIIAtcCde1=".(null !== request('SchedIIAtcCde1') ? 'true' : 'false')."SchedIIAtcCde1=</div>	
            <div>SchedIIAtcCde2=".(null !== request('SchedIIAtcCde2') ? 'true' : 'false')."SchedIIAtcCde2=</div>	
            ";
        }

        $atc = "";
        if(null !== request('frm1600WP:txtAtcCode')){
        	for ($i=0; $i < count(request('frm1600WP:txtAtcCode')) ; $i++) { 
        		$atc .= "<div>frm1600WP:txtAtcCode".($i + 1)."=".request('frm1600WP:txtAtcCode')[$i]."frm1600WP:txtAtcCode".($i + 1)."=</div>	
            <div>frm1600WP:txtTaxBase".($i + 1)."=".request('frm1600WP:txtTaxBase')[$i]."frm1600WP:txtTaxBase".($i + 1)."=</div>	
            <div>frm1600WP:txtTaxRate".($i + 1)."=".request('frm1600WP:txtTaxRate')[$i]."frm1600WP:txtTaxRate".($i + 1)."=</div>	
            <div>frm1600WP:txtTaxbeWithHeld".($i + 1)."=".request('frm1600WP:txtTaxbeWithHeld')[$i]."frm1600WP:txtTaxbeWithHeld".($i + 1)."=</div>	
            ";
        	}
        }

        $xmlData ="<?xml version='1.0'?>	
            <div>frm1600WP:DateWithholdingMonth=".request('frm1600WP:DateWithholdingMonth')."frm1600WP:DateWithholdingMonth=</div>	
            <div>frm1600WP:DateWithholdingDay=".request('frm1600WP:DateWithholdingDay')."frm1600WP:DateWithholdingDay=</div>	
            <div>frm1600WP:DateWithholdingYear=".request('frm1600WP:DateWithholdingYear')."frm1600WP:DateWithholdingYear=</div>	
            <div>frm1600WP:DateWithholdingToMonth=".request('frm1600WP:DateWithholdingToMonth')."frm1600WP:DateWithholdingToMonth=</div>	
            <div>frm1600WP:DateWithholdingToDay=".request('frm1600WP:DateWithholdingToDay')."frm1600WP:DateWithholdingToDay=</div>	
            <div>frm1600WP:DateWithholdingToYear=".request('frm1600WP:DateWithholdingToYear')."frm1600WP:DateWithholdingToYear=</div>	
            <div>frm1600WP:AmendedReturn_1=".$AmendedReturn_1."frm1600WP:AmendedReturn_1=</div>	
            <div>frm1600WP:AmendedReturn_2=".$AmendedReturn_2."frm1600WP:AmendedReturn_2=</div>	
            <div>frm1600WP:txtSheets=".request('frm1600WP:txtSheets')."frm1600WP:txtSheets=</div>	
            <div>frm1600WP:AnyTaxHeld_1=".$AnyTaxHeld_1."frm1600WP:AnyTaxHeld_1=</div>	
            <div>frm1600WP:AnyTaxHeld_2=".$AnyTaxHeld_2."frm1600WP:AnyTaxHeld_2=</div>	
            <div>frm1600WP:txtTIN1=".request('frm1600WP:txtTIN1')."frm1600WP:txtTIN1=</div>	
            <div>frm1600WP:txtTIN2=".request('frm1600WP:txtTIN2')."frm1600WP:txtTIN2=</div>	
            <div>frm1600WP:txtTIN3=".request('frm1600WP:txtTIN3')."frm1600WP:txtTIN3=</div>	
            <div>frm1600WP:txtBranchCode=".request('frm1600WP:txtBranchCode')."frm1600WP:txtBranchCode=</div>	
            <div>frm1600WP:txtRDOCode=".request('frm1600WP:txtRDOCode')."frm1600WP:txtRDOCode=</div>	
            <div>frm1600WP:CategoryAgent_P=".$CategoryAgent_P."frm1600WP:CategoryAgent_P=</div>	
            <div>frm1600WP:CategoryAgent_G=".$CategoryAgent_G."frm1600WP:CategoryAgent_G=</div>	
            <div>frm1600WP:txtTaxpayerName=".$taxPayerName."frm1600WP:txtTaxpayerName=</div>	
            <div>frm1600WP:txtAddress=".$address."frm1600WP:txtAddress=</div>	
            <div>frm1600WP:txtZipCode=".request('frm1600WP:txtZipCode')."frm1600WP:txtZipCode=</div>	
            <div>frm1600WP:SpecialLaw_1=".$SpecialLaw_1."frm1600WP:SpecialLaw_1=</div>	
            <div>frm1600WP:SpecialLaw_2=".$SpecialLaw_2."frm1600WP:SpecialLaw_2=</div>	
            <div>frm1600WP:SpecialLawSelect=".request('frm1600WP:SpecialLawSelect')."frm1600WP:SpecialLawSelect=</div>	
            ".$atc."<div>frm1600WP:txtTax12=".request('frm1600WP:txtTax12')."frm1600WP:txtTax12=</div>	
            <div>frm1600WP:txtTax13=".request('frm1600WP:txtTax13')."frm1600WP:txtTax13=</div>	
            <div>frm1600WP:txtTax14=".request('frm1600WP:txtTax14')."frm1600WP:txtTax14=</div>	
            <div>frm1600WP:txtTax15A=".request('frm1600WP:txtTax15A')."frm1600WP:txtTax15A=</div>	
            <div>frm1600WP:txtTax15B=".request('frm1600WP:txtTax15B')."frm1600WP:txtTax15B=</div>	
            <div>frm1600WP:txtTax15C=".request('frm1600WP:txtTax15C')."frm1600WP:txtTax15C=</div>	
            <div>frm1600WP:txtTax15D=".request('frm1600WP:txtTax15D')."frm1600WP:txtTax15D=</div>	
            <div>frm1600WP:txtTax16=".request('frm1600WP:txtTax16')."frm1600WP:txtTax16=</div>	
            <div>frm1600WP:dtSched:txtTin1=".request('frm1600WP:dtSched:txtTin1')."frm1600WP:dtSched:txtTin1=</div>	
            <div>frm1600WP:dtSched:txtFullname1=".request('frm1600WP:dtSched:txtFullname1')."frm1600WP:dtSched:txtFullname1=</div>	
            <div>frm1600WP:dtSched:drpAtcCode1=".request('frm1600WP:dtSched:drpAtcCode1')."frm1600WP:dtSched:drpAtcCode1=</div>	
            <div>frm1600WP:dtSched:naturePayment1=".request('frm1600WP:dtSched:naturePayment1')."frm1600WP:dtSched:naturePayment1=</div>	
            <div>frm1600WP:dtSched:amount1=".request('frm1600WP:dtSched:amount1')."frm1600WP:dtSched:amount1=</div>	
            <div>frm1600WP:dtSched:txtRatePercent1=".request('frm1600WP:dtSched:txtRatePercent1')."frm1600WP:dtSched:txtRatePercent1=</div>	
            <div>frm1600WP:dtSched:taxWithheld1=".request('frm1600WP:dtSched:taxWithheld1')."frm1600WP:dtSched:taxWithheld1=</div>	
            <div>frm1600WP:dtSched:txtTin2=".request('frm1600WP:dtSched:txtTin2')."frm1600WP:dtSched:txtTin2=</div>	
            <div>frm1600WP:dtSched:txtFullname2=".request('frm1600WP:dtSched:txtFullname2')."frm1600WP:dtSched:txtFullname2=</div>	
            <div>frm1600WP:dtSched:drpAtcCode2=".request('frm1600WP:dtSched:drpAtcCode2')."frm1600WP:dtSched:drpAtcCode2=</div>	
            <div>frm1600WP:dtSched:naturePayment2=".request('frm1600WP:dtSched:naturePayment2')."frm1600WP:dtSched:naturePayment2=</div>	
            <div>frm1600WP:dtSched:amount2=".request('frm1600WP:dtSched:amount2')."frm1600WP:dtSched:amount2=</div>	
            <div>frm1600WP:dtSched:txtRatePercent2=".request('frm1600WP:dtSched:txtRatePercent2')."frm1600WP:dtSched:txtRatePercent2=</div>	
            <div>frm1600WP:dtSched:taxWithheld2=".request('frm1600WP:dtSched:taxWithheld2')."frm1600WP:dtSched:taxWithheld2=</div>	
            <div>frm1600WP:dtSched:txtTin3=".request('frm1600WP:dtSched:txtTin3')."frm1600WP:dtSched:txtTin3=</div>	
            <div>frm1600WP:dtSched:txtFullname3=".request('frm1600WP:dtSched:txtFullname3')."frm1600WP:dtSched:txtFullname3=</div>	
            <div>frm1600WP:dtSched:drpAtcCode3=".request('frm1600WP:dtSched:drpAtcCode3')."frm1600WP:dtSched:drpAtcCode3=</div>	
            <div>frm1600WP:dtSched:naturePayment3=".request('frm1600WP:dtSched:naturePayment3')."frm1600WP:dtSched:naturePayment3=</div>	
            <div>frm1600WP:dtSched:amount3=".request('frm1600WP:dtSched:amount3')."frm1600WP:dtSched:amount3=</div>	
            <div>frm1600WP:dtSched:txtRatePercent3=".request('frm1600WP:dtSched:txtRatePercent3')."frm1600WP:dtSched:txtRatePercent3=</div>	
            <div>frm1600WP:dtSched:taxWithheld3=".request('frm1600WP:dtSched:taxWithheld3')."frm1600WP:dtSched:taxWithheld3=</div>	
            <div>frm1600WP:dtSched:txtTin4=".request('frm1600WP:dtSched:txtTin4')."frm1600WP:dtSched:txtTin4=</div>	
            <div>frm1600WP:dtSched:txtFullname4=".request('frm1600WP:dtSched:txtFullname4')."frm1600WP:dtSched:txtFullname4=</div>	
            <div>frm1600WP:dtSched:drpAtcCode4=".request('frm1600WP:dtSched:drpAtcCode4')."frm1600WP:dtSched:drpAtcCode4=</div>	
            <div>frm1600WP:dtSched:naturePayment4=".request('frm1600WP:dtSched:naturePayment4')."frm1600WP:dtSched:naturePayment4=</div>	
            <div>frm1600WP:dtSched:amount4=".request('frm1600WP:dtSched:amount4')."frm1600WP:dtSched:amount4=</div>	
            <div>frm1600WP:dtSched:txtRatePercent4=".request('frm1600WP:dtSched:txtRatePercent4')."frm1600WP:dtSched:txtRatePercent4=</div>	
            <div>frm1600WP:dtSched:taxWithheld4=".request('frm1600WP:dtSched:taxWithheld4')."frm1600WP:dtSched:taxWithheld4=</div>	
            <div>frm1600WP:dtSched:txtTin5=".request('frm1600WP:dtSched:txtTin5')."frm1600WP:dtSched:txtTin5=</div>	
            <div>frm1600WP:dtSched:txtFullname5=".request('frm1600WP:dtSched:txtFullname5')."frm1600WP:dtSched:txtFullname5=</div>	
            <div>frm1600WP:dtSched:drpAtcCode5=".request('frm1600WP:dtSched:drpAtcCode5')."frm1600WP:dtSched:drpAtcCode5=</div>	
            <div>frm1600WP:dtSched:naturePayment5=".request('frm1600WP:dtSched:naturePayment5')."frm1600WP:dtSched:naturePayment5=</div>	
            <div>frm1600WP:dtSched:amount5=".request('frm1600WP:dtSched:amount5')."frm1600WP:dtSched:amount5=</div>	
            <div>frm1600WP:dtSched:txtRatePercent5=".request('frm1600WP:dtSched:txtRatePercent5')."frm1600WP:dtSched:txtRatePercent5=</div>	
            <div>frm1600WP:dtSched:taxWithheld5=".request('frm1600WP:dtSched:taxWithheld5')."frm1600WP:dtSched:taxWithheld5=</div>	
            <div>frm1600WP:dtSched:txtTin6=".request('frm1600WP:dtSched:txtTin6')."frm1600WP:dtSched:txtTin6=</div>	
            <div>frm1600WP:dtSched:txtFullname6=".request('frm1600WP:dtSched:txtFullname6')."frm1600WP:dtSched:txtFullname6=</div>	
            <div>frm1600WP:dtSched:drpAtcCode6=".request('frm1600WP:dtSched:drpAtcCode6')."frm1600WP:dtSched:drpAtcCode6=</div>	
            <div>frm1600WP:dtSched:naturePayment6=".request('frm1600WP:dtSched:naturePayment6')."frm1600WP:dtSched:naturePayment6=</div>	
            <div>frm1600WP:dtSched:amount6=".request('frm1600WP:dtSched:amount6')."frm1600WP:dtSched:amount6=</div>	
            <div>frm1600WP:dtSched:txtRatePercent6=".request('frm1600WP:dtSched:txtRatePercent6')."frm1600WP:dtSched:txtRatePercent6=</div>	
            <div>frm1600WP:dtSched:taxWithheld6=".request('frm1600WP:dtSched:taxWithheld6')."frm1600WP:dtSched:taxWithheld6=</div>	
            <div>frm1600WP:dtSched:txtTin7=".request('frm1600WP:dtSched:txtTin7')."frm1600WP:dtSched:txtTin7=</div>	
            <div>frm1600WP:dtSched:txtFullname7=".request('frm1600WP:dtSched:txtFullname7')."frm1600WP:dtSched:txtFullname7=</div>	
            <div>frm1600WP:dtSched:drpAtcCode7=".request('frm1600WP:dtSched:drpAtcCode7')."frm1600WP:dtSched:drpAtcCode7=</div>	
            <div>frm1600WP:dtSched:naturePayment7=".request('frm1600WP:dtSched:naturePayment7')."frm1600WP:dtSched:naturePayment7=</div>	
            <div>frm1600WP:dtSched:amount7=".request('frm1600WP:dtSched:amount7')."frm1600WP:dtSched:amount7=</div>	
            <div>frm1600WP:dtSched:txtRatePercent7=".request('frm1600WP:dtSched:txtRatePercent7')."frm1600WP:dtSched:txtRatePercent7=</div>	
            <div>frm1600WP:dtSched:taxWithheld7=".request('frm1600WP:dtSched:taxWithheld7')."frm1600WP:dtSched:taxWithheld7=</div>	
            <div>frm1600WP:dtSched:txtTin8=".request('frm1600WP:dtSched:txtTin8')."frm1600WP:dtSched:txtTin8=</div>	
            <div>frm1600WP:dtSched:txtFullname8=".request('frm1600WP:dtSched:txtFullname8')."frm1600WP:dtSched:txtFullname8=</div>	
            <div>frm1600WP:dtSched:drpAtcCode8=".request('frm1600WP:dtSched:drpAtcCode8')."frm1600WP:dtSched:drpAtcCode8=</div>	
            <div>frm1600WP:dtSched:naturePayment8=".request('frm1600WP:dtSched:naturePayment8')."frm1600WP:dtSched:naturePayment8=</div>	
            <div>frm1600WP:dtSched:amount8=".request('frm1600WP:dtSched:amount8')."frm1600WP:dtSched:amount8=</div>	
            <div>frm1600WP:dtSched:txtRatePercent8=".request('frm1600WP:dtSched:txtRatePercent8')."frm1600WP:dtSched:txtRatePercent8=</div>	
            <div>frm1600WP:dtSched:taxWithheld8=".request('frm1600WP:dtSched:taxWithheld8')."frm1600WP:dtSched:taxWithheld8=</div>	
            <div>frm1600WP:dtSched:txtTin9=".request('frm1600WP:dtSched:txtTin9')."frm1600WP:dtSched:txtTin9=</div>	
            <div>frm1600WP:dtSched:txtFullname9=".request('frm1600WP:dtSched:txtFullname9')."frm1600WP:dtSched:txtFullname9=</div>	
            <div>frm1600WP:dtSched:drpAtcCode9=".request('frm1600WP:dtSched:drpAtcCode9')."frm1600WP:dtSched:drpAtcCode9=</div>	
            <div>frm1600WP:dtSched:naturePayment9=".request('frm1600WP:dtSched:naturePayment9')."frm1600WP:dtSched:naturePayment9=</div>	
            <div>frm1600WP:dtSched:amount9=".request('frm1600WP:dtSched:amount9')."frm1600WP:dtSched:amount9=</div>	
            <div>frm1600WP:dtSched:txtRatePercent9=".request('frm1600WP:dtSched:txtRatePercent9')."frm1600WP:dtSched:txtRatePercent9=</div>	
            <div>frm1600WP:dtSched:taxWithheld9=".request('frm1600WP:dtSched:taxWithheld9')."frm1600WP:dtSched:taxWithheld9=</div>	
            <div>frm1600WP:dtSched:txtTin10=".request('frm1600WP:dtSched:txtTin10')."frm1600WP:dtSched:txtTin10=</div>	
            <div>frm1600WP:dtSched:txtFullname10=".request('frm1600WP:dtSched:txtFullname10')."frm1600WP:dtSched:txtFullname10=</div>	
            <div>frm1600WP:dtSched:drpAtcCode10=".request('frm1600WP:dtSched:drpAtcCode10')."frm1600WP:dtSched:drpAtcCode10=</div>	
            <div>frm1600WP:dtSched:naturePayment10=".request('frm1600WP:dtSched:naturePayment10')."frm1600WP:dtSched:naturePayment10=</div>	
            <div>frm1600WP:dtSched:amount10=".request('frm1600WP:dtSched:amount10')."frm1600WP:dtSched:amount10=</div>	
            <div>frm1600WP:dtSched:txtRatePercent10=".request('frm1600WP:dtSched:txtRatePercent10')."frm1600WP:dtSched:txtRatePercent10=</div>	
            <div>frm1600WP:dtSched:taxWithheld10=".request('frm1600WP:dtSched:taxWithheld10')."frm1600WP:dtSched:taxWithheld10=</div>	
            <div>frm1600WP:dtSched:TotaltaxWithheld=0.00frm1600WP:dtSched:TotaltaxWithheld=</div>	
            ".$ext."<div>hPartIITableSize=".request("hPartIITableSize")."hPartIITableSize=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm1600WP:txtTIN1').request('frm1600WP:txtTIN2').request('frm1600WP:txtTIN3').request('frm1600WP:txtBranchCode');

        $getReturnPeriod = tbl_1600WP::where('company_id',  request('company'))
                            ->where('item1FromA', request('frm1600WP:DateWithholdingMonth'))
                            ->where('item1FromB', request('frm1600WP:DateWithholdingDay'))
                            ->where('item1FromC', request('frm1600WP:DateWithholdingYear'))
                            ->count();

        $returnPeriod = request('frm1600WP:DateWithholdingMonth')."/".request('frm1600WP:DateWithholdingDay')."/".request('frm1600WP:DateWithholdingYear');

        if($getReturnPeriod == "1"){
                $xmlReturnPeriod = request('frm1600WP:DateWithholdingMonth').request('frm1600WP:DateWithholdingDay').request('frm1600WP:DateWithholdingYear');
        }else{
                if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1600WP')
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
                $xmlReturnPeriod = request('frm1600WP:DateWithholdingMonth').request('frm1600WP:DateWithholdingDay').request('frm1600WP:DateWithholdingYear').$ext;
        }

        $filename = $tin."-1600WP-".$xmlReturnPeriod.'.xml';
    	
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
                'form'          => '1600WP',
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
                            ->where('form', '1600WP')
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
                            ->where('form', '1600WP')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1600WP::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1600WP')
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
        $data = tbl_1600WP::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1600WP')
                            ->get();
        
        return view('forms.BIR-Form 1600WP',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

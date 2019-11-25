<?php

namespace App\Http\Controllers;
use App\Xml;
use App\Companies;
use App\tbl_1601F;
use App\tbl_1601F_tax;
use App\tbl_1601F_schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1601FController extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);
    	$atc = DB::table('1601_f_atcs')->get();
    	
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);

    	if($action == 'new'){
    		if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1601_fs')){

            }else{
                Schema::connection('mysql2')->create('tbl_1601_fs', function (Blueprint $table) {
		            $table->increments('id');
		            $table->integer('form_no');
		            $table->integer('company_id');
		            $table->string('item1A');
		            $table->string('item1B');
		            $table->string('item2');
		            $table->string('item3');
		            $table->string('item4')->nullable();
		            $table->string('item12')->nullable();
		            $table->string('item13')->nullable();
		            $table->string('item13A')->nullable();
		            $table->text('item14');
		            $table->text('item15');
		            $table->text('item16');
		            $table->text('item17');
		            $table->text('item18');
		            $table->text('item19A');
		            $table->text('item19B');
		            $table->text('item19C');
		            $table->text('item19D');
		            $table->text('item20');
		            $table->timestamps();
		        });

                Schema::connection('mysql2')->create('tbl_1601_f_schedules', function (Blueprint $table) {
		            $table->increments('id');
		            $table->integer('form_id');
		            $table->text('treaty')->nullable();
		            $table->text('atc')->nullable();
		            $table->text('income');
		            $table->text('rate');
		            $table->text('withheld');
		            $table->timestamps();
		        });

		        Schema::connection('mysql2')->create('tbl_1601_f_taxes', function (Blueprint $table) {
		            $table->increments('id');
		            $table->integer('form_id');
		            $table->text('atc');
		            $table->text('description');
		            $table->text('tax_base')->nullable();
		            $table->text('rate');
		            $table->text('withheld');
		            $table->timestamps();
		        });
            }

            return view('forms.BIR-Form 1601F',['atc' => $atc, 'company' => $company, 'form_no' => $form_id, 'action' => $action]);
    	}else{
    		$data = tbl_1601F::find($form_id);
    		$taxes = tbl_1601F_tax::where('form_id', $form_id)->get();
            $schedules = tbl_1601F_schedule::where('form_id', $form_id)->get();
            $treaty = DB::table('treaty_codes')->get();
            return view('forms.BIR-Form 1601F',['atc' => $atc, 'company' => $company, 'data' => $data, 'taxes' => $taxes, 'schedules' => $schedules, 'treaty' => $treaty, 'action' => $action]);
    	}
    }
    public function treaty()
    {
    	$treaty = DB::table('treaty_codes')->get();

    	echo json_encode($treaty);
    }
    public function atc()
    {
    	$atc = DB::table('1601_f_atcs')->get();

    	echo json_encode($atc);
    }

    public function rate($atc)
    {
    	$atc = DB::table('1601_f_atcs')->where('id', $atc )->get();

    	echo json_encode($atc);
    }

    public function store()
    {
    	$data = ([
     		'form_no' 		=> request('form_no'),
    		'company_id' 	=> request('company'),
    		'item1A' 		=> request('frm1601F:j_id201'),
    		'item1B' 		=> request('frm1601F:txtYear'),
    		'item2' 		=> request('frm1601F:AmendedRtn'),
    		'item3' 		=> request('frm1601F:txtSheets'),
    		'item4' 		=> null !== request('frm1601F:TaxWithheld') ? request('frm1601F:TaxWithheld') : '',
    		'item12' 		=> null !== request('frm1601F:CatAgent') ? request('frm1601F:CatAgent') : '',
    		'item13' 		=> request('frm1601F:SpecialTax'),
    		'item13A' 		=> request('frm1601F:drpSpecialTax'),
    		'item14' 		=> request('frm1601F:txtTax14'),
    		'item15' 		=> request('frm1601F:txtTax15'),
    		'item16' 		=> request('frm1601F:txtTax16'),
    		'item17' 		=> request('frm1601F:txtTax17'),
    		'item18' 		=> request('frm1601F:txtTax18'),
    		'item19A' 		=> request('frm1601F:txtTax19A'),
    		'item19B' 		=> request('frm1601F:txtTax19B'),
    		'item19C' 		=> request('frm1601F:txtTax19C'),
    		'item19D' 		=> request('frm1601F:txtTax19D'),
    		'item20' 		=> request('frm1601F:txtTax20'),
    	]);

    	$getForm = tbl_1601F::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();
		
        $form = "";
        if(request('form_id') != ""){
            $form = tbl_1601F::find(request('form_id'));
            $form->update($data);
            tbl_1601F_tax::where('form_id', $getForm[0]->id)->delete();
            tbl_1601F_schedule::where('form_id', $getForm[0]->id)->delete();
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1601F::create($data);
            }else{
                tbl_1601F_tax::where('form_id', $getForm[0]->id)->delete();
                tbl_1601F_schedule::where('form_id', $getForm[0]->id)->delete();
                $form = tbl_1601F::find($getForm[0]->id);
                $form->update($data);
            }
        }
     	
    	if(null !== request('frm1601F:txtAtcCode')[0]){
    		for ($i=0; $i < count(request('frm1601F:txtAtcCode')) ; $i++) { 
	     		$tax = ([
	     			'form_id'		=> $form->id,
	     			'atc'			=> request('frm1601F:txtAtcCode')[$i],
	     			'description'	=> request('txtNaturePayment')[$i],
	     			'tax_base'		=> request('frm1601F:txtTaxBase')[$i],
	     			'rate'			=> request('frm1601F:txtTaxRate')[$i],
	     			'withheld'		=> request('frm1601F:txtTaxbeWithHeld')[$i],
	     		]);
	     		tbl_1601F_tax::create($tax);
	     	}
    	}

    	if(null !== request('drpTreatyCode')[0]){
    		for ($i=0; $i < count(request('drpTreatyCode')) ; $i++) { 
    			$schedule = ([
    					'form_id'	=> $form->id,
    					'treaty'	=> request('drpTreatyCode')[$i],
    					'atc'		=> request('drpATCCode')[$i],
    					'income'	=> request('txtAmtIncomePay')[$i],
    					'rate'		=> request('txtRate')[$i],
    					'withheld'	=> request('txtReqWithheld')[$i],
    			]);
    			tbl_1601F_schedule::create($schedule);
    		}
    	}

    	$AmendedRtn_1 = "false";
    	$AmendedRtn_2 = "false";

    	if(request('frm1601F:AmendedRtn') == "Y"){
    		$AmendedRtn_1 = "true";
    	}else if(request('frm1601F:AmendedRtn') == "N"){
    		$AmendedRtn_2 = "true";
    	}

    	$TaxWithheld_1 = "false";
    	$TaxWithheld_2 = "false";

    	if(null !== request('frm1601F:TaxWithheld')){
    		if(request('frm1601F:TaxWithheld') == "Y"){
	    		$TaxWithheld_1 = "true";
	    	}else if(request('frm1601F:TaxWithheld') == "N"){
	    		$TaxWithheld_2 = "true";
	    	}
    	}

    	$replaceSpaceName = str_replace(' ', '%20', request('frm1601F:txtTaxpayerName')); 
        $taxPayerName =  str_replace(',', '%2C', $replaceSpaceName);

        $getAddress = str_replace(' ', '%20',request('frm1601F:txtAddress')); 
        $address = str_replace(',', '%2C', $getAddress);

        $replaceSpaceLineBusiness = str_replace(' ', '%20', request('frm1601F:txtLineBus')); 
        $lineOfBusiness =  str_replace(',', '%2C', $replaceSpaceLineBusiness);

        $CatAgent_P = "false";
        $CatAgent_G = "false";

        if(null !== request('frm1601F:CatAgent')){
    		if(request('frm1601F:CatAgent') == "P"){
	    		$CatAgent_P = "true";
	    	}else if(request('frm1601F:CatAgent') == "G"){
	    		$CatAgent_G = "true";
	    	}
    	}

    	$SpecialTax_1 = "false";
    	$SpecialTax_2 = "false";

    	if(request('frm1601F:SpecialTax') == "Y"){
    		$SpecialTax_1 = "true";
    	}else if(request('frm1601F:SpecialTax') == "N"){
    		$SpecialTax_2 = "true";
    	}

    	$xmlATCData = "";
    	if(null !== request('frm1601F:txtAtcCode')[0]){
    		for ($i=0; $i < count(request('frm1601F:txtAtcCode')) ; $i++) { 
    			$xmlATCData .= "	
            <div>frm1601F:txtAtcCode".($i + 1 )."=".request('frm1601F:txtAtcCode')[$i]."frm1601F:txtAtcCode".($i + 1 )."=</div>	
            <div>frm1601F:txtTaxBase".($i + 1 )."=".request('frm1601F:txtTaxBase')[$i]."frm1601F:txtTaxBase".($i + 1 )."=</div>	
            <div>frm1601F:txtTaxRate".($i + 1 )."=".request('frm1601F:txtTaxRate')[$i]."frm1601F:txtTaxRate".($i + 1 )."=</div>	
            <div>frm1601F:txtTaxbeWithHeld".($i + 1 )."=".request('frm1601F:txtTaxbeWithHeld')[$i]."frm1601F:txtTaxbeWithHeld".($i + 1 )."=</div>";
    		}
    	}

    	$xmlATC = "";
    	$xmlATCOther = "";
    	if(null !== request('frm1601F:CatAgent')){
    		$xmlATC = "	
            <div>AtcCd1=".(null !== request('AtcCd1') ? 'true' : 'false')."AtcCd1=</div>	
            <div>AtcCd2=".(null !== request('AtcCd2') ? 'true' : 'false')."AtcCd2=</div>	
            <div>AtcCd3=".(null !== request('AtcCd3') ? 'true' : 'false')."AtcCd3=</div>	
            <div>AtcCd4=".(null !== request('AtcCd4') ? 'true' : 'false')."AtcCd4=</div>	
            <div>AtcCd5=".(null !== request('AtcCd5') ? 'true' : 'false')."AtcCd5=</div>	
            <div>AtcCd6=".(null !== request('AtcCd6') ? 'true' : 'false')."AtcCd6=</div>	
            <div>AtcCd7=".(null !== request('AtcCd7') ? 'true' : 'false')."AtcCd7=</div>	
            <div>AtcCd8=".(null !== request('AtcCd8') ? 'true' : 'false')."AtcCd8=</div>	
            <div>AtcCd9=".(null !== request('AtcCd9') ? 'true' : 'false')."AtcCd9=</div>	
            <div>AtcCd10=".(null !== request('AtcCd10') ? 'true' : 'false')."AtcCd10=</div>	
            <div>AtcCd11=".(null !== request('AtcCd11') ? 'true' : 'false')."AtcCd11=</div>	
            <div>AtcCd12=".(null !== request('AtcCd12') ? 'true' : 'false')."AtcCd12=</div>	
            <div>AtcCd13=".(null !== request('AtcCd13') ? 'true' : 'false')."AtcCd13=</div>	
            <div>AtcCd14=".(null !== request('AtcCd14') ? 'true' : 'false')."AtcCd14=</div>	
            <div>AtcCd15=".(null !== request('AtcCd15') ? 'true' : 'false')."AtcCd15=</div>	
            <div>AtcCd16=".(null !== request('AtcCd16') ? 'true' : 'false')."AtcCd16=</div>	
            <div>AtcCd17=".(null !== request('AtcCd17') ? 'true' : 'false')."AtcCd17=</div>	
            <div>AtcCd18=".(null !== request('AtcCd18') ? 'true' : 'false')."AtcCd18=</div>	
            <div>AtcCd19=".(null !== request('AtcCd19') ? 'true' : 'false')."AtcCd19=</div>	
            <div>AtcCd20=".(null !== request('AtcCd20') ? 'true' : 'false')."AtcCd20=</div>	
            <div>AtcCd21=".(null !== request('AtcCd21') ? 'true' : 'false')."AtcCd21=</div>	
            <div>AtcCd22=".(null !== request('AtcCd22') ? 'true' : 'false')."AtcCd22=</div>	
            <div>AtcCd23=".(null !== request('AtcCd23') ? 'true' : 'false')."AtcCd23=</div>	
            <div>AtcCd24=".(null !== request('AtcCd24') ? 'true' : 'false')."AtcCd24=</div>	
            <div>AtcCd25=".(null !== request('AtcCd25') ? 'true' : 'false')."AtcCd25=</div>	
            <div>AtcCd26=".(null !== request('AtcCd26') ? 'true' : 'false')."AtcCd26=</div>	
            <div>AtcCd27=".(null !== request('AtcCd27') ? 'true' : 'false')."AtcCd27=</div>	
            <div>AtcCd28=".(null !== request('AtcCd28') ? 'true' : 'false')."AtcCd28=</div>	
            <div>AtcCd29=".(null !== request('AtcCd29') ? 'true' : 'false')."AtcCd29=</div>	
            <div>AtcCd30=".(null !== request('AtcCd30') ? 'true' : 'false')."AtcCd30=</div>	
            <div>AtcCd31=".(null !== request('AtcCd31') ? 'true' : 'false')."AtcCd31=</div>	
            <div>AtcCd32=".(null !== request('AtcCd32') ? 'true' : 'false')."AtcCd32=</div>	
            <div>AtcCd33=".(null !== request('AtcCd33') ? 'true' : 'false')."AtcCd33=</div>	
            <div>AtcCd34=".(null !== request('AtcCd34') ? 'true' : 'false')."AtcCd34=</div>	
            <div>AtcCd35=".(null !== request('AtcCd35') ? 'true' : 'false')."AtcCd35=</div>	
            <div>AtcCd36=".(null !== request('AtcCd36') ? 'true' : 'false')."AtcCd36=</div>	
            <div>AtcCd37=".(null !== request('AtcCd37') ? 'true' : 'false')."AtcCd37=</div>	
            <div>AtcCd38=".(null !== request('AtcCd38') ? 'true' : 'false')."AtcCd38=</div>	
            <div>AtcCd39=".(null !== request('AtcCd39') ? 'true' : 'false')."AtcCd39=</div>	
            <div>AtcCd40=".(null !== request('AtcCd40') ? 'true' : 'false')."AtcCd40=</div>	
            <div>AtcCd41=".(null !== request('AtcCd41') ? 'true' : 'false')."AtcCd41=</div>	
            <div>AtcCd42=".(null !== request('AtcCd42') ? 'true' : 'false')."AtcCd42=</div>	
            <div>AtcCd43=".(null !== request('AtcCd43') ? 'true' : 'false')."AtcCd43=</div>	
            <div>AtcCd44=".(null !== request('AtcCd44') ? 'true' : 'false')."AtcCd44=</div>	
            <div>AtcCd45=".(null !== request('AtcCd45') ? 'true' : 'false')."AtcCd45=</div>	
            <div>AtcCd46=".(null !== request('AtcCd46') ? 'true' : 'false')."AtcCd46=</div>	
            <div>AtcCd47=".(null !== request('AtcCd47') ? 'true' : 'false')."AtcCd47=</div>	
            <div>AtcCd48=".(null !== request('AtcCd48') ? 'true' : 'false')."AtcCd48=</div>	
            <div>AtcCd49=".(null !== request('AtcCd49') ? 'true' : 'false')."AtcCd49=</div>	
            <div>AtcCd50=".(null !== request('AtcCd50') ? 'true' : 'false')."AtcCd50=</div>	
            ";
    	}
    	
    	if(request('frm1601F:SpecialTax') == 'Y'){
    		$xmlATCOther = "<div>AtcCd51=falseAtcCd51=</div>	
            ";
    	}

    	$xmlATCTreaty = "";
    	if(null !== request('drpTreatyCode')[0]){
    		for ($i=0; $i < count(request('drpTreatyCode')) ; $i++) { 

    			$atc = DB::table('1601_f_atcs')->where('id', request('drpATCCode')[$i] )->get();

    			$xmlATCTreaty .= "<div>chxSchedI".$i."=falsechxSchedI".$i."=</div>	
            <div>drpTreatyCode".$i."=".request('drpTreatyCode')[$i]."drpTreatyCode".$i."=</div>	
            <div>drpATCCode".$i."=".$atc[0]->atc."drpATCCode".$i."=</div>	
            <div>txtAmtIncomePay".$i."=".request('txtAmtIncomePay')[$i]."txtAmtIncomePay".$i."=</div>	
            <div>txtRate".$i."=".request('txtRate')[$i]."txtRate".$i."=</div>	
            <div>txtReqWithheld".$i."=".request('txtReqWithheld')[$i]."txtReqWithheld".$i."=</div>	
            ";
            }
    	}
    	$xmlData = "<?xml version='1.0'?>	
            <div>frm1601F:j_id201=".request('frm1601F:j_id201')."frm1601F:j_id201=</div>	
            <div>frm1601F:txtYear=".request('frm1601F:txtYear')."frm1601F:txtYear=</div>	
            <div>frm1601F:AmendedRtn_1=".$AmendedRtn_1."frm1601F:AmendedRtn_1=</div>	
            <div>frm1601F:AmendedRtn_2=".$AmendedRtn_2."frm1601F:AmendedRtn_2=</div>	
            <div>frm1601F:txtSheets=".request('frm1601F:txtSheets')."frm1601F:txtSheets=</div>	
            <div>frm1601F:TaxWithheld_1=".$TaxWithheld_1."frm1601F:TaxWithheld_1=</div>	
            <div>frm1601F:TaxWithheld_2=".$TaxWithheld_2."frm1601F:TaxWithheld_2=</div>	
            <div>frm1601F:txtTIN1=".request('frm1601F:txtTIN1')."frm1601F:txtTIN1=</div>	
            <div>frm1601F:txtTIN2=".request('frm1601F:txtTIN2')."frm1601F:txtTIN2=</div>	
            <div>frm1601F:txtTIN3=".request('frm1601F:txtTIN3')."frm1601F:txtTIN3=</div>	
            <div>frm1601F:txtBranchCode=".request('frm1601F:txtBranchCode')."frm1601F:txtBranchCode=</div>	
            <div>frm1601F:txtRDOCode=".request('frm1601F:txtRDOCode')."frm1601F:txtRDOCode=</div>	
            <div>frm1601F:txtLineBus=".$lineOfBusiness."frm1601F:txtLineBus=</div>	
            <div>frm1601F:txtTaxpayerName=".$taxPayerName."frm1601F:txtTaxpayerName=</div>	
            <div>frm1601F:txtTelNum=".request('frm1601F:txtTelNum')."frm1601F:txtTelNum=</div>	
            <div>frm1601F:txtAddress=".$address."frm1601F:txtAddress=</div>	
            <div>frm1601F:txtZipCode=".request('frm1601F:txtZipCode')."frm1601F:txtZipCode=</div>	
            <div>frm1601F:CatAgent_P=".$CatAgent_P."frm1601F:CatAgent_P=</div>	
            <div>frm1601F:CatAgent_G=".$CatAgent_G."frm1601F:CatAgent_G=</div>	
            <div>frm1601F:SpecialTax_1=".$SpecialTax_1."frm1601F:SpecialTax_1=</div>	
            <div>frm1601F:SpecialTax_2=".$SpecialTax_2."frm1601F:SpecialTax_2=</div>	
            <div>frm1601F:drpSpecialTax=".request('frm1601F:drpSpecialTax')."frm1601F:drpSpecialTax=</div>".$xmlATCData."	
            <div>frm1601F:txtTax14=".request('frm1601F:txtTax14')."frm1601F:txtTax14=</div>	
            <div>frm1601F:txtTax15=".request('frm1601F:txtTax15')."frm1601F:txtTax15=</div>	
            <div>frm1601F:txtTax16=".request('frm1601F:txtTax16')."frm1601F:txtTax16=</div>	
            <div>frm1601F:txtTax17=".request('frm1601F:txtTax17')."frm1601F:txtTax17=</div>	
            <div>frm1601F:txtTax18=".request('frm1601F:txtTax18')."frm1601F:txtTax18=</div>	
            <div>frm1601F:txtTax19A=".request('frm1601F:txtTax19A')."frm1601F:txtTax19A=</div>	
            <div>frm1601F:txtTax19B=".request('frm1601F:txtTax19B')."frm1601F:txtTax19B=</div>	
            <div>frm1601F:txtTax19C=".request('frm1601F:txtTax19C')."frm1601F:txtTax19C=</div>	
            <div>frm1601F:txtTax19D=".request('frm1601F:txtTax19D')."frm1601F:txtTax19D=</div>	
            <div>frm1601F:txtTax20=".request('frm1601F:txtTax20')."frm1601F:txtTax20=</div>".$xmlATC.$xmlATCOther.$xmlATCTreaty."<div>txtDvTotalSchedI=".request('frm1601F:txtTax15')."txtDvTotalSchedI=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";


            $tin = request('frm1601F:txtTIN1').request('frm1601F:txtTIN2').request('frm1601F:txtTIN3').request('frm1601F:txtBranchCode');

            $return_period = request('frm1601F:j_id201')."/".request('frm1601F:txtYear');

            $getReturnPeriod = tbl_1601F::where('company_id',  request('company'))
     						->where('item1A', request('frm1601F:j_id201'))
     						->where('item1B', request('frm1601F:txtYear'))
     						->count();
     		
     		$filename = "";
     		if($getReturnPeriod == "1"){
     			$filename = $tin."-1601F-".request('frm1601F:j_id201').request('frm1601F:txtYear').'.xml';
     		}else{
     			$count = $getReturnPeriod - 1;
     			$filename = $tin."-1601F-".request('frm1601F:j_id201').request('frm1601F:txtYear').'V'.$count.'.xml';
     		}
            
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
	     		'form'			=> '1601F',
	     		'file_name'		=> $filename,
	     		'return_period'	=> $return_period,
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
     						->where('form', '1601F')
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
}

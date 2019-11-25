<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1601FQ;
use App\tbl_1601FQ_atc;
use App\tbl_1601FQ_schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1601FQController extends Controller
{
	public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);

        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        if($action == 'new'){

        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1601_f_qs')){

            }else{
                Schema::connection('mysql2')->create('tbl_1601_f_qs', function (Blueprint $table) {
		            $table->increments('id');
		            $table->integer('form_no');
		            $table->integer('company_id');
		            $table->string('item1');
					$table->string('item2')->nullable();
					$table->string('item3');
					$table->string('item4')->nullable();
					$table->string('item5');
					$table->string('item11')->nullable();
					$table->string('item13');
					$table->string('item13A')->nullable();
					$table->text('item_other_atc_total')->nullable();
					$table->text('item20');
					$table->text('item21');
					$table->text('item22');
					$table->text('item23');
					$table->text('item24');
					$table->text('item25');
					$table->text('item26');
					$table->text('item27');
					$table->text('item28');
					$table->text('item29');
					$table->text('item30');
					$table->text('item31');
					$table->text('item32');
		            $table->timestamps();
		        });

                Schema::connection('mysql2')->create('tbl_1601_f_q_atcs', function (Blueprint $table) {
		            $table->increments('id');
		            $table->integer('form_id');
		            $table->text('atc');
		            $table->text('tax_base')->nullable();
		            $table->text('rate');
		            $table->text('withheld');
		            $table->timestamps();
		        });

                Schema::connection('mysql2')->create('tbl_1601_f_q_schedules', function (Blueprint $table) {
		            $table->increments('id');
		            $table->integer('form_id');
		            $table->text('treaty')->nullable();
		            $table->text('atc')->nullable();
		            $table->text('nature')->nullable();
		            $table->text('income');
		            $table->text('rate');
		            $table->text('withheld');
		            $table->timestamps();
		        });
            }

            return view('forms.BIR-Form 1601FQ',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
    	}else{
    		$data = tbl_1601FQ::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1601FQ')
                            ->get();
            return view('forms.BIR-Form 1601FQ',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    	}
	        
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	$data = ([
     		'form_no' 		=> request('form_no'),
    		'company_id' 	=> request('company'),
    		'item1'     => request('frm1601FQ:txtYear'),
			'item2'     => null !== request('frm1601FQ:OptQuarter') ? request('frm1601FQ:OptQuarter') : '',
			'item3'     => request('frm1601FQ:AmendedRtn'),
			'item4'     => null !== request('frm1601FQ:TaxWithheld') ? request('frm1601FQ:TaxWithheld') : '',
			'item5'     => request('frm1601FQ:txtSheets'),
			'item11'     => null !== request('frm1601FQ:CatAgent') ? request('frm1601FQ:CatAgent') : '',
			'item13'     => request('frm1601FQ:SpecialTax'),
			'item13A'     => request('frm1601FQ:drpSpecialTax'),
			'item_other_atc_total'     => request(''),
			'item20'     => request('frm1601FQ:txtTax20'),
			'item21'     => request('frm1601FQ:txtTax21'),
			'item22'     => request('frm1601FQ:txtTax22'),
			'item23'     => request('frm1601FQ:txtTax23'),
			'item24'     => request('frm1601FQ:txtTax24'),
			'item25'     => request('frm1601FQ:txtTax25'),
			'item26'     => request('frm1601FQ:txtTax26'),
			'item27'     => request('frm1601FQ:txtTax27'),
			'item28'     => request('frm1601FQ:txtTax28'),
			'item29'     => request('frm1601FQ:txtTax29'),
			'item30'     => request('frm1601FQ:txtTax30'),
			'item31'     => request('frm1601FQ:txtTax31'),
			'item32'     => request('frm1601FQ:txtTax32'),
    	]);

    	$getForm = tbl_1601FQ::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

        $form = "";
        if(request('form_id') != ""){
            $form = tbl_1601FQ::find(request('form_id'));
            $form->update($data);
            tbl_1601FQ_atc::where('form_id', $getForm[0]->id)->delete();
            tbl_1601FQ_schedules::where('form_id', $getForm[0]->id)->delete();
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1601FQ::create($data);
            }else{
                $form = tbl_1601FQ::find($getForm[0]->id);
                $form->update($data);

                tbl_1601FQ_atc::where('form_id', $getForm[0]->id)->delete();
                tbl_1601FQ_schedules::where('form_id', $getForm[0]->id)->delete();
            }
        }

        for($i=0; $i <= count(request('frm1601FQ:txtAtcCode')) - 1; $i++){
        	if(!empty(request('frm1601FQ:txtAtcCode')[$i])){
        		$data = ([
        			'form_id'		=> $form->id,
        			'atc'			=> request('frm1601FQ:txtAtcCode')[$i],
        			'tax_base'		=> request('frm1601FQ:txtTaxBase')[$i],
        			'rate'			=> request('frm1601FQ:txtTaxRate')[$i],
        			'withheld'		=> request('frm1601FQ:txtTaxbeWithHeld')[$i],
        			]);
        		tbl_1601FQ_atc::create($data);
        	}
        }
        

        for($i=0; $i <= 4; $i++){
        	if(request('drpATCCode'.$i.'') != '-' && request('drpATCCode'.$i.'') != 'NA'){
        		$data = ([
        			'form_id'		=> $form->id,
        			'treaty'		=> request('drpTreatyCode'.$i.''),
        			'atc'			=> request('drpATCCode'.$i.''),
        			'nature'		=> request('txtNatIncPayment'.$i.''),
        			'income'		=> request('txtAmtIncomePay'.$i.''),
        			'rate'			=> request('txtRate'.$i.''),
        			'withheld'		=> request('txtReqWithheld'.$i.''),
        			]);
        		tbl_1601FQ_schedules::create($data);
        	}
        }

        $OptQuarter1 = "false";
		$OptQuarter2 = "false";
		$OptQuarter3 = "false";
		$OptQuarter4 = "false";

		if(null !== request('frm1601FQ:OptQuarter')){
			if(request('frm1601FQ:OptQuarter') == '1'){
				$OptQuarter1 = "true";
			}else if(request('frm1601FQ:OptQuarter') == '2'){
				$OptQuarter2 = "true";
			}else if(request('frm1601FQ:OptQuarter') == '3'){
				$OptQuarter3 = "true";
			}else if(request('frm1601FQ:OptQuarter') == '4'){
				$OptQuarter4 = "true";
			}
		}

		$AmendedRtn_1 = "false";
		$AmendedRtn_2 = "false";

		if(request('frm1601FQ:AmendedRtn') == 'Y'){
			$AmendedRtn_1 = "true";
		}else if(request('frm1601FQ:AmendedRtn') == 'N'){
			$AmendedRtn_2 = "true";
		}

		$TaxWithheld_1 = "false";
		$TaxWithheld_2 = "false";

		if(null !== request('frm1601FQ:TaxWithheld')){
			if(request('frm1601FQ:TaxWithheld') == 'Y'){
				$TaxWithheld_1 = "true";
			}else if(request('frm1601FQ:TaxWithheld') == 'N'){
				$TaxWithheld_2 = "true";
			}
		}

        $taxPayerName =  rawurlencode(request('frm1601FQ:txtTaxpayerName'));

        $address = rawurlencode(request('frm1601FQ:txtAddress'));

        $lineOfBusiness =  rawurlencode(request('frm1601FQ:txtLineBus'));

        $CatAgent_P = "false";
        $CatAgent_G = "false";

        if(null !== request('frm1601FQ:CatAgent')){
        	if(request('frm1601FQ:CatAgent')== "P"){
        		$CatAgent_P = "true";
        	}else if(request('frm1601FQ:CatAgent') == "G"){
        		 $CatAgent_G = "true";
        	}
        }

        $SpecialTax_1 = "false";
        $SpecialTax_2 = "false";

        if(request('frm1601FQ:SpecialTax') == "Y"){
        	$SpecialTax_1 = "true";
        }else if(request('frm1601FQ:SpecialTax') == "N"){
        	$SpecialTax_2 = "true";
        }
		
        $xmlForATC33 = "";
        /*if(!empty(request('frm1601FQ:txtAtcCode')[0])){
            $xmlForATC33 = "
            <div>AtcCd33=".(null !== request('AtcCd33') ? 'true' : 'false')."AtcCd33=</div>	";
        }*/

        $xmlATC = "";
        if(null !==  request('frm1601FQ:CatAgent')){
            $xmlATC = "<div>AtcCd1=".(null !==request('AtcCd1') ? 'true' : 'false')."AtcCd1=</div>	
            <div>AtcCd2=".(null !==request('AtcCd2') ? 'true' : 'false')."AtcCd2=</div>	
            <div>AtcCd3=".(null !==request('AtcCd3') ? 'true' : 'false')."AtcCd3=</div>	
            <div>AtcCd4=".(null !==request('AtcCd4') ? 'true' : 'false')."AtcCd4=</div>	
            <div>AtcCd5=".(null !==request('AtcCd5') ? 'true' : 'false')."AtcCd5=</div>	
            <div>AtcCd6=".(null !==request('AtcCd6') ? 'true' : 'false')."AtcCd6=</div>	
            <div>AtcCd7=".(null !==request('AtcCd7') ? 'true' : 'false')."AtcCd7=</div>	
            <div>AtcCd8=".(null !==request('AtcCd8') ? 'true' : 'false')."AtcCd8=</div>	
            <div>AtcCd9=".(null !==request('AtcCd9') ? 'true' : 'false')."AtcCd9=</div>	
            <div>AtcCd10=".(null !==request('AtcCd10') ? 'true' : 'false')."AtcCd10=</div>	
            <div>AtcCd11=".(null !==request('AtcCd11') ? 'true' : 'false')."AtcCd11=</div>	
            <div>AtcCd12=".(null !==request('AtcCd12') ? 'true' : 'false')."AtcCd12=</div>	
            <div>AtcCd13=".(null !==request('AtcCd13') ? 'true' : 'false')."AtcCd13=</div>	
            <div>AtcCd14=".(null !==request('AtcCd14') ? 'true' : 'false')."AtcCd14=</div>	
            <div>AtcCd15=".(null !==request('AtcCd15') ? 'true' : 'false')."AtcCd15=</div>	
            <div>AtcCd16=".(null !==request('AtcCd16') ? 'true' : 'false')."AtcCd16=</div>	
            <div>AtcCd17=".(null !==request('AtcCd17') ? 'true' : 'false')."AtcCd17=</div>	
            <div>AtcCd18=".(null !==request('AtcCd18') ? 'true' : 'false')."AtcCd18=</div>	
            <div>AtcCd19=".(null !==request('AtcCd19') ? 'true' : 'false')."AtcCd19=</div>	
            <div>AtcCd20=".(null !==request('AtcCd20') ? 'true' : 'false')."AtcCd20=</div>	
            <div>AtcCd21=".(null !==request('AtcCd21') ? 'true' : 'false')."AtcCd21=</div>	
            <div>AtcCd22=".(null !==request('AtcCd22') ? 'true' : 'false')."AtcCd22=</div>	
            <div>AtcCd23=".(null !==request('AtcCd23') ? 'true' : 'false')."AtcCd23=</div>	
            <div>AtcCd24=".(null !==request('AtcCd24') ? 'true' : 'false')."AtcCd24=</div>	
            <div>AtcCd25=".(null !==request('AtcCd25') ? 'true' : 'false')."AtcCd25=</div>	
            <div>AtcCd26=".(null !==request('AtcCd26') ? 'true' : 'false')."AtcCd26=</div>	
            <div>AtcCd27=".(null !==request('AtcCd27') ? 'true' : 'false')."AtcCd27=</div>	
            <div>AtcCd28=".(null !==request('AtcCd28') ? 'true' : 'false')."AtcCd28=</div>	
            <div>AtcCd29=".(null !==request('AtcCd29') ? 'true' : 'false')."AtcCd29=</div>	
            <div>AtcCd30=".(null !==request('AtcCd30') ? 'true' : 'false')."AtcCd30=</div>	
            <div>AtcCd31=".(null !==request('AtcCd31') ? 'true' : 'false')."AtcCd31=</div>	
            <div>AtcCd32=".(null !==request('AtcCd32') ? 'true' : 'false')."AtcCd32=</div>	".$xmlForATC33."
            ";
        }

        $xmlSchedule = "";

        if(count(request('frm1601FQ:txtAtcCode')) > 5){
            $countOtherATC = count(request('frm1601FQ:txtAtcCode'));
            for ($i=6; $i <= $countOtherATC - 1 ; $i++) { 
                $xmlSchedule .= "<div>frm1601FQ:txtAtcCode".($i + 1)."=".request('frm1601FQ:txtAtcCode')[$i]."frm1601FQ:txtAtcCode".($i + 1)."=</div>	
            <div>frm1601FQ:txtTaxBase".($i + 1)."=".request('frm1601FQ:txtTaxBase')[$i]."frm1601FQ:txtTaxBase".($i + 1)."=</div>	
            <div>frm1601FQ:txtTaxRate".($i + 1)."=".request('frm1601FQ:txtTaxRate')[$i]."frm1601FQ:txtTaxRate".($i + 1)."=</div>	
            <div>frm1601FQ:txtTaxbeWithHeld".($i + 1)."=".request('frm1601FQ:txtTaxbeWithHeld')[$i]."frm1601FQ:txtTaxbeWithHeld".($i + 1)."=</div>	
            "; 
            }
        }

        $otherTax = "";
        if(null !== request('frm1601FQ:txtTotalOtherTax')){
            $otherTax = request('frm1601FQ:txtTotalOtherTax');
        }else{
            $otherTax = "";
        }

        $xmlData ="<?xml version='1.0'?>	
            <div>frm1601FQ:txtYear=".request('frm1601FQ:txtYear')."frm1601FQ:txtYear=</div>	
            <div>frm1601FQ:OptQuarter1=".$OptQuarter1."frm1601FQ:OptQuarter1=</div>	
            <div>frm1601FQ:OptQuarter2=".$OptQuarter2."frm1601FQ:OptQuarter2=</div>	
            <div>frm1601FQ:OptQuarter3=".$OptQuarter3."frm1601FQ:OptQuarter3=</div>	
            <div>frm1601FQ:OptQuarter4=".$OptQuarter4."frm1601FQ:OptQuarter4=</div>	
            <div>frm1601FQ:AmendedRtn_1=".$AmendedRtn_1."frm1601FQ:AmendedRtn_1=</div>	
            <div>frm1601FQ:AmendedRtn_2=".$AmendedRtn_2."frm1601FQ:AmendedRtn_2=</div>	
            <div>frm1601FQ:TaxWithheld_1=".$TaxWithheld_1."frm1601FQ:TaxWithheld_1=</div>	
            <div>frm1601FQ:TaxWithheld_2=".$TaxWithheld_2."frm1601FQ:TaxWithheld_2=</div>	
            <div>frm1601FQ:txtSheets=".request('frm1601FQ:txtSheets')."frm1601FQ:txtSheets=</div>	
            <div>frm1601FQ:txtTIN1=".request('frm1601FQ:txtTIN1')."frm1601FQ:txtTIN1=</div>	
            <div>frm1601FQ:txtTIN2=".request('frm1601FQ:txtTIN2')."frm1601FQ:txtTIN2=</div>	
            <div>frm1601FQ:txtTIN3=".request('frm1601FQ:txtTIN3')."frm1601FQ:txtTIN3=</div>	
            <div>frm1601FQ:txtBranchCode=".request('frm1601FQ:txtBranchCode')."frm1601FQ:txtBranchCode=</div>	
            <div>frm1601FQ:txtRDOCode=".request('frm1601FQ:txtRDOCode')."frm1601FQ:txtRDOCode=</div>	
            <div>frm1601FQ:txtTaxpayerName=".$taxPayerName."frm1601FQ:txtTaxpayerName=</div>	
            <div>frm1601FQ:txtAddress=".$address."frm1601FQ:txtAddress=</div>	
            <div>frm1601FQ:txtZipCode=".request('frm1601FQ:txtZipCode')."frm1601FQ:txtZipCode=</div>	
            <div>frm1601FQ:txtTelNum=".request('frm1601FQ:txtTelNum')."frm1601FQ:txtTelNum=</div>	
            <div>frm1601FQ:CatAgent_P=".$CatAgent_P."frm1601FQ:CatAgent_P=</div>	
            <div>frm1601FQ:CatAgent_G=".$CatAgent_G."frm1601FQ:CatAgent_G=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>frm1601FQ:SpecialTax_1=".$SpecialTax_1."frm1601FQ:SpecialTax_1=</div>	
            <div>frm1601FQ:SpecialTax_2=".$SpecialTax_2."frm1601FQ:SpecialTax_2=</div>	
            <div>frm1601FQ:drpSpecialTax=".request('frm1601FQ:drpSpecialTax')."frm1601FQ:drpSpecialTax=</div>	
            <div>frm1601FQ:txtAtcCode1=".request('frm1601FQ:txtAtcCode')[0]."frm1601FQ:txtAtcCode1=</div>	
            <div>frm1601FQ:txtTaxBase1=".request('frm1601FQ:txtTaxBase')[0]."frm1601FQ:txtTaxBase1=</div>	
            <div>frm1601FQ:txtTaxRate1=".request('frm1601FQ:txtTaxRate')[0]."frm1601FQ:txtTaxRate1=</div>	
            <div>frm1601FQ:txtTaxbeWithHeld1=".request('frm1601FQ:txtTaxbeWithHeld')[0]."frm1601FQ:txtTaxbeWithHeld1=</div>	
            <div>frm1601FQ:txtAtcCode2=".request('frm1601FQ:txtAtcCode')[1]."frm1601FQ:txtAtcCode2=</div>	
            <div>frm1601FQ:txtTaxBase2=".request('frm1601FQ:txtTaxBase')[1]."frm1601FQ:txtTaxBase2=</div>	
            <div>frm1601FQ:txtTaxRate2=".request('frm1601FQ:txtTaxRate')[1]."frm1601FQ:txtTaxRate2=</div>	
            <div>frm1601FQ:txtTaxbeWithHeld2=".request('frm1601FQ:txtTaxbeWithHeld')[1]."frm1601FQ:txtTaxbeWithHeld2=</div>	
            <div>frm1601FQ:txtAtcCode3=".request('frm1601FQ:txtAtcCode')[2]."frm1601FQ:txtAtcCode3=</div>	
            <div>frm1601FQ:txtTaxBase3=".request('frm1601FQ:txtTaxBase')[2]."frm1601FQ:txtTaxBase3=</div>	
            <div>frm1601FQ:txtTaxRate3=".request('frm1601FQ:txtTaxRate')[2]."frm1601FQ:txtTaxRate3=</div>	
            <div>frm1601FQ:txtTaxbeWithHeld3=".request('frm1601FQ:txtTaxbeWithHeld')[2]."frm1601FQ:txtTaxbeWithHeld3=</div>	
            <div>frm1601FQ:txtAtcCode4=".request('frm1601FQ:txtAtcCode')[3]."frm1601FQ:txtAtcCode4=</div>	
            <div>frm1601FQ:txtTaxBase4=".request('frm1601FQ:txtTaxBase')[3]."frm1601FQ:txtTaxBase4=</div>	
            <div>frm1601FQ:txtTaxRate4=".request('frm1601FQ:txtTaxRate')[3]."frm1601FQ:txtTaxRate4=</div>	
            <div>frm1601FQ:txtTaxbeWithHeld4=".request('frm1601FQ:txtTaxbeWithHeld')[3]."frm1601FQ:txtTaxbeWithHeld4=</div>	
            <div>frm1601FQ:txtAtcCode5=".request('frm1601FQ:txtAtcCode')[4]."frm1601FQ:txtAtcCode5=</div>	
            <div>frm1601FQ:txtTaxBase5=".request('frm1601FQ:txtTaxBase')[4]."frm1601FQ:txtTaxBase5=</div>	
            <div>frm1601FQ:txtTaxRate5=".request('frm1601FQ:txtTaxRate')[4]."frm1601FQ:txtTaxRate5=</div>	
            <div>frm1601FQ:txtTaxbeWithHeld5=".request('frm1601FQ:txtTaxbeWithHeld')[4]."frm1601FQ:txtTaxbeWithHeld5=</div>	
            <div>frm1601FQ:txtAtcCode6=".request('frm1601FQ:txtAtcCode')[5]."frm1601FQ:txtAtcCode6=</div>	
            <div>frm1601FQ:txtTaxBase6=".request('frm1601FQ:txtTaxBase')[5]."frm1601FQ:txtTaxBase6=</div>	
            <div>frm1601FQ:txtTaxRate6=".request('frm1601FQ:txtTaxRate')[5]."frm1601FQ:txtTaxRate6=</div>	
            <div>frm1601FQ:txtTaxbeWithHeld6=".request('frm1601FQ:txtTaxbeWithHeld')[5]."frm1601FQ:txtTaxbeWithHeld6=</div>	
            <div>frm1601FQ:txtTotalOtherTax=".$otherTax."frm1601FQ:txtTotalOtherTax=</div>	
            <div>frm1601FQ:txtTax20=".request('frm1601FQ:txtTax20')."frm1601FQ:txtTax20=</div>	
            <div>frm1601FQ:txtTax21=".request('frm1601FQ:txtTax21')."frm1601FQ:txtTax21=</div>	
            <div>frm1601FQ:txtTax22=".request('frm1601FQ:txtTax22')."frm1601FQ:txtTax22=</div>	
            <div>frm1601FQ:txtTax23=".request('frm1601FQ:txtTax23')."frm1601FQ:txtTax23=</div>	
            <div>frm1601FQ:txtTax24=".request('frm1601FQ:txtTax24')."frm1601FQ:txtTax24=</div>	
            <div>frm1601FQ:txtTax25=".request('frm1601FQ:txtTax25')."frm1601FQ:txtTax25=</div>	
            <div>frm1601FQ:txtTax26=".request('frm1601FQ:txtTax26')."frm1601FQ:txtTax26=</div>	
            <div>frm1601FQ:txtTax27=".request('frm1601FQ:txtTax27')."frm1601FQ:txtTax27=</div>	
            <div>frm1601FQ:txtTax28=".request('frm1601FQ:txtTax28')."frm1601FQ:txtTax28=</div>	
            <div>frm1601FQ:txtTax29=".request('frm1601FQ:txtTax29')."frm1601FQ:txtTax29=</div>	
            <div>frm1601FQ:txtTax30=".request('frm1601FQ:txtTax30')."frm1601FQ:txtTax30=</div>	
            <div>frm1601FQ:txtTax31=".request('frm1601FQ:txtTax31')."frm1601FQ:txtTax31=</div>	
            <div>frm1601FQ:txtTax32=".request('frm1601FQ:txtTax32')."frm1601FQ:txtTax32=</div>	
            <div>txtTaxAgentNo=txtTaxAgentNo=</div>	
            <div>txtDateIssue=txtDateIssue=</div>	
            <div>txtDateExpiry=txtDateExpiry=</div>	
            <div>frm1601FQ:txtAgency33=frm1601FQ:txtAgency33=</div>	
            <div>frm1601FQ:txtNumber33=frm1601FQ:txtNumber33=</div>	
            <div>frm1601FQ:txtDate33=frm1601FQ:txtDate33=</div>	
            <div>frm1601FQ:txtAmount33=frm1601FQ:txtAmount33=</div>	
            <div>frm1601FQ:txtAgency34=frm1601FQ:txtAgency34=</div>	
            <div>frm1601FQ:txtNumber34=frm1601FQ:txtNumber34=</div>	
            <div>frm1601FQ:txtDate34=frm1601FQ:txtDate34=</div>	
            <div>frm1601FQ:txtAmount34=frm1601FQ:txtAmount34=</div>	
            <div>frm1601FQ:txtAgency35=frm1601FQ:txtAgency35=</div>	
            <div>frm1601FQ:txtNumber35=frm1601FQ:txtNumber35=</div>	
            <div>frm1601FQ:txtDate35=frm1601FQ:txtDate35=</div>	
            <div>frm1601FQ:txtAmount35=frm1601FQ:txtAmount35=</div>	
            <div>frm1601FQ:txtParticular36=frm1601FQ:txtParticular36=</div>	
            <div>frm1601FQ:txtAgency36=frm1601FQ:txtAgency36=</div>	
            <div>frm1601FQ:txtNumber36=frm1601FQ:txtNumber36=</div>	
            <div>frm1601FQ:txtDate36=frm1601FQ:txtDate36=</div>	
            <div>frm1601FQ:txtAmount36=frm1601FQ:txtAmount36=</div>	
            <div>frm1601FQ:txtPg2TIN1=".request('frm1601FQ:txtPg2TIN1')."frm1601FQ:txtPg2TIN1=</div>	
            <div>frm1601FQ:txtPg2TIN2=".request('frm1601FQ:txtPg2TIN2')."frm1601FQ:txtPg2TIN2=</div>	
            <div>frm1601FQ:txtPg2TIN3=".request('frm1601FQ:txtPg2TIN3')."frm1601FQ:txtPg2TIN3=</div>	
            <div>frm1601FQ:txtPg2BranchCode=".request('frm1601FQ:txtPg2BranchCode')."frm1601FQ:txtPg2BranchCode=</div>	
            <div>frm1601FQ:txtPg2TaxpayerName=".request('frm1601FQ:txtPg2TaxpayerName')."frm1601FQ:txtPg2TaxpayerName=</div>	
            <div>drpTreatyCode0=".request('drpTreatyCode0')."drpTreatyCode0=</div>	
            <div>drpATCCode0=".(request('drpATCCode0') == '0' ? '-' : request('drpATCCode0'))."drpATCCode0=</div>	
            <div>txtNatIncPayment0=".request('txtNatIncPayment0')."txtNatIncPayment0=</div>	
            <div>txtAmtIncomePay0=".request('txtAmtIncomePay0')."txtAmtIncomePay0=</div>	
            <div>txtRate0=".request('txtRate0')."txtRate0=</div>	
            <div>txtReqWithheld0=".request('txtReqWithheld0')."txtReqWithheld0=</div>	
            <div>drpTreatyCode1=".request('drpTreatyCode1')."drpTreatyCode1=</div>	
            <div>drpATCCode1=".(request('drpATCCode1') == '0' ? '-' : request('drpATCCode1'))."drpATCCode1=</div>	
            <div>txtNatIncPayment1=".request('txtNatIncPayment1')."txtNatIncPayment1=</div>	
            <div>txtAmtIncomePay1=".request('txtAmtIncomePay1')."txtAmtIncomePay1=</div>	
            <div>txtRate1=".request('txtRate1')."txtRate1=</div>	
            <div>txtReqWithheld1=".request('txtReqWithheld1')."txtReqWithheld1=</div>	
            <div>drpTreatyCode2=".request('drpTreatyCode2')."drpTreatyCode2=</div>	
            <div>drpATCCode2=".(request('drpATCCode2') == '0' ? '-' : request('drpATCCode2'))."drpATCCode2=</div>	
            <div>txtNatIncPayment2=".request('txtNatIncPayment2')."txtNatIncPayment2=</div>	
            <div>txtAmtIncomePay2=".request('txtAmtIncomePay2')."txtAmtIncomePay2=</div>	
            <div>txtRate2=".request('txtRate2')."txtRate2=</div>	
            <div>txtReqWithheld2=".request('txtReqWithheld2')."txtReqWithheld2=</div>	
            <div>drpTreatyCode3=".request('drpTreatyCode3')."drpTreatyCode3=</div>	
            <div>drpATCCode3=".(request('drpATCCode3') == '0' ? '-' : request('drpATCCode3'))."drpATCCode3=</div>	
            <div>txtNatIncPayment3=".request('txtNatIncPayment3')."txtNatIncPayment3=</div>	
            <div>txtAmtIncomePay3=".request('txtAmtIncomePay3')."txtAmtIncomePay3=</div>	
            <div>txtRate3=".request('txtRate3')."txtRate3=</div>	
            <div>txtReqWithheld3=".request('txtReqWithheld3')."txtReqWithheld3=</div>	
            <div>drpTreatyCode4=".request('drpTreatyCode4')."drpTreatyCode4=</div>	
            <div>drpATCCode4=".(request('drpATCCode4') == '0' ? '-' : request('drpATCCode4'))."drpATCCode4=</div>	
            <div>txtNatIncPayment4=".request('txtNatIncPayment4')."txtNatIncPayment4=</div>	
            <div>txtAmtIncomePay4=".request('txtAmtIncomePay4')."txtAmtIncomePay4=</div>	
            <div>txtRate4=".request('txtRate4')."txtRate4=</div>	
            <div>txtReqWithheld4=".request('txtReqWithheld4')."txtReqWithheld4=</div>	
            <div>txtDvTotalSchedI=".request('txtDvTotalSchedI')."txtDvTotalSchedI=</div>	
            <div>frm1601FQ:txtCurrentPage=".request('frm1601FQ:txtCurrentPage')."frm1601FQ:txtCurrentPage=</div>	
            <div>frm1601FQ:txtMaxPage=2frm1601FQ:txtMaxPage=</div>	
            ".$xmlATC."".$xmlSchedule."<div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>frm1601FQ:txtLineBus=".$lineOfBusiness."frm1601FQ:txtLineBus=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm1601FQ:txtTIN1').request('frm1601FQ:txtTIN2').request('frm1601FQ:txtTIN3').request('frm1601FQ:txtBranchCode');

        if(null !== request('frm1601FQ:OptQuarter')){
        	$getReturnPeriod = tbl_1601FQ::where('company_id',  request('company'))
                            ->where('item1', request('frm1601FQ:txtYear'))
                            ->where('item2', request('frm1601FQ:OptQuarter'))
                            ->count();

            $returnPeriod = request('frm1601FQ:txtYear')."-Q".request('frm1601FQ:OptQuarter');

            if($getReturnPeriod == "1"){
	            $xmlReturnPeriod = request('frm1601FQ:txtYear').'Q'.request('frm1601FQ:OptQuarter');
	        }else{
                if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1601FQ')
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

	            $xmlReturnPeriod = request('frm1601FQ:txtYear').'Q'.request('frm1601FQ:OptQuarter').$ext;
	        }
	        
        }else{
        	$getReturnPeriod = tbl_1601FQ::where('company_id',  request('company'))
                            ->where('item1', request('frm1601FQ:txtYear'))
                            ->count();

            $xmlReturnPeriod = request('frm1601FQ:txtYear');

            $splitYear = str_split(request('frm1601FQ:txtYear'), 2);
            $returnPeriod = "Q-".$splitYear[0]."-".$splitYear[1];
        }

        $filename = $tin."-1601FQ-".$xmlReturnPeriod.'.xml'; 
        
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
                'form'          => '1601FQ',
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
                            ->where('form', '1601FQ')
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
                            ->where('form', '1601FQ')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1601FQ::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1601FQ')
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
        $data = tbl_1601FQ::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1601FQ')
                            ->get();
        
        return view('forms.BIR-Form 1601FQ',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
    
}

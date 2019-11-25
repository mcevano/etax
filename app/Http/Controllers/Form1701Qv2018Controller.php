<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1701Q;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1701Qv2018Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1701_qs')){

            }else{
                Schema::connection('mysql2')->create('tbl_1701_qs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1');
					$table->string('item2');
					$table->string('item3');
					$table->string('item4');
					$table->text('item7')->nullable();
					$table->text('item8');
					$table->text('item11A')->nullable();
					$table->text('item11B')->nullable();
					$table->text('item11C')->nullable();
					$table->text('item13')->nullable();
					$table->text('item14')->nullable();
					$table->text('item15')->nullable();
					$table->text('item16')->nullable();
					$table->text('item16A')->nullable();
					$table->text('item17A')->nullable();
					$table->text('item17B')->nullable();
					$table->text('item17C')->nullable();
					$table->text('item17D')->nullable();
					$table->text('item18')->nullable();
					$table->text('item19')->nullable();
					$table->text('item20')->nullable();
					$table->text('item21')->nullable();
					$table->text('item22')->nullable();
					$table->text('item23')->nullable();
					$table->text('item24')->nullable();
					$table->text('item25')->nullable();
					$table->text('item25A')->nullable();
					$table->text('item26A');
					$table->text('item26B');
					$table->text('item27A');
					$table->text('item27B');
					$table->text('item28A');
					$table->text('item28B');
					$table->text('item29A');
					$table->text('item29B');
					$table->text('item30A');
					$table->text('item30B');
					$table->text('item31');
					$table->text('item36A');
					$table->text('item36B');
					$table->text('item37A');
					$table->text('item37B');
					$table->text('item38A');
					$table->text('item38B');
					$table->text('item39A');
					$table->text('item39B');
					$table->text('item40A');
					$table->text('item40B');
					$table->text('item41A');
					$table->text('item41B');
					$table->text('item42A');
					$table->text('item42B');
					$table->text('item43')->nullable();
					$table->text('item43A');
					$table->text('item43B');
					$table->text('item44A');
					$table->text('item44B');
					$table->text('item45A');
					$table->text('item45B');
					$table->text('item46A');
					$table->text('item46B');
					$table->text('item47A');
					$table->text('item47B');
					$table->text('item48')->nullable();
					$table->text('item48A');
					$table->text('item48B');
					$table->text('item49A');
					$table->text('item49B');
					$table->text('item50A');
					$table->text('item50B');
					$table->text('item51A');
					$table->text('item51B');
					$table->text('item52A');
					$table->text('item52B');
					$table->text('item53A');
					$table->text('item53B');
					$table->text('item54A');
					$table->text('item54B');
					$table->text('item55A');
					$table->text('item55B');
					$table->text('item56A');
					$table->text('item56B');
					$table->text('item57A');
					$table->text('item57B');
					$table->text('item58A');
					$table->text('item58B');
					$table->text('item59A');
					$table->text('item59B');
					$table->text('item60A');
					$table->text('item60B');
					$table->text('item61')->nullable();
					$table->text('item61A');
					$table->text('item61B');
					$table->text('item62A');
					$table->text('item62B');
					$table->text('item63A');
					$table->text('item63B');
					$table->text('item64A');
					$table->text('item64B');
					$table->text('item65A');
					$table->text('item65B');
					$table->text('item66A');
					$table->text('item66B');
					$table->text('item67A');
					$table->text('item67B');
					$table->text('item68A');
					$table->text('item68B');
                    $table->timestamps();
                });
            }
           
	        return view('forms.BIR-Form 1701Qv2018',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);

        }else{

        	$data = tbl_1701Q::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1701Qv2018')
                            ->get();
            return view('forms.BIR-Form 1701Qv2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
        	'form_no'      	  =>request('form_no'),
            'company_id'      =>request('company'),
            'item1'    => request('frm1701q:txtYear'),
			'item2'    => request('frm1701q:DateQuarter'),
			'item3'    => request('frm1701q:AmendedRtn'),
			'item4'    => request('frm1701q:txtSheets'),
			'item7'    => null !== request('frm1701q:optTaxpayerType') ? request('frm1701q:optTaxpayerType') : '',
			'item8'    => null !== request('frm1701q:optATC') ? request('frm1701q:optATC') : '',
			'item11A'    => request('frm1701q:txtBirthMonth'),
			'item11B'    => request('frm1701q:txtBirthDay'),
			'item11C'    => request('frm1701q:txtBirthYear'),
			'item13'    => request('frm1701q:txtCitizenship'),
			'item14'    => request('frm1701q:txtForeignTaxNumber'),
			'item15'    => null !== request('frm1701q:optForeignTaxCredits') ? request('frm1701q:optForeignTaxCredits') : '',
			'item16'    => null !== request('frm1701q:optTaxRate') ? request('frm1701q:optTaxRate') : '',
			'item16A'    => null !== request('frm1701q:optMethodOfDeduction') ? request('frm1701q:optMethodOfDeduction') : '',
			'item17A'    => request('frm1701q:txtSpouseTIN1'),
			'item17B'    => request('frm1701q:txtSpouseTIN2'),
			'item17C'    => request('frm1701q:txtSpouseTIN3'),
			'item17D'    => request('frm1701q:txtSpouseBranchCode'),
			'item18'    => request('frm1701q:txtSpouseRDOCode'),
			'item19'    => null !== request('frm1701q:optSpouseType') ? request('frm1701q:optSpouseType') : '',
			'item20'    => null !== request('frm1701q:optSpouseATC') ? request('frm1701q:optSpouseATC') : '',
			'item21'    => request('frm1701q:txtSpouseName'),
			'item22'    => request('frm1701q:txtSpouseCitizenship'),
			'item23'    => request('frm1701q:txtSpouseForeignTaxNum'),
			'item24'    => null !== request('frm1701q:optSpouseForeignTaxCred') ? request('frm1701q:optSpouseForeignTaxCred') : '',
			'item25'    => null !== request('frm1701q:optSpouseTaxRate') ? request('frm1701q:optSpouseTaxRate') : '',
			'item25A'    => null !== request('frm1701q:optSpouseMethod') ? request('frm1701q:optSpouseMethod') : '',
			'item26A'    => request('frm1701q:txt26A'),
			'item26B'    => request('frm1701q:txt26B'),
			'item27A'    => request('frm1701q:txt27A'),
			'item27B'    => request('frm1701q:txt27B'),
			'item28A'    => request('frm1701q:txt28A'),
			'item28B'    => request('frm1701q:txt28B'),
			'item29A'    => request('frm1701q:txt29A'),
			'item29B'    => request('frm1701q:txt29B'),
			'item30A'    => request('frm1701q:txt30A'),
			'item30B'    => request('frm1701q:txt30B'),
			'item31'    => request('frm1701q:txt31'),
			'item36A'    => request('frm1701q:txt36A'),
			'item36B'    => request('frm1701q:txt36B'),
			'item37A'    => request('frm1701q:txt37A'),
			'item37B'    => request('frm1701q:txt37B'),
			'item38A'    => request('frm1701q:txt38A'),
			'item38B'    => request('frm1701q:txt38B'),
			'item39A'    => request('frm1701q:txt39A'),
			'item39B'    => request('frm1701q:txt39B'),
			'item40A'    => request('frm1701q:txt40A'),
			'item40B'    => request('frm1701q:txt40B'),
			'item41A'    => request('frm1701q:txt41A'),
			'item41B'    => request('frm1701q:txt41B'),
			'item42A'    => request('frm1701q:txt42A'),
			'item42B'    => request('frm1701q:txt42B'),
			'item43'    => request('frm1701q:txt43Desc'),
			'item43A'    => request('frm1701q:txt43A'),
			'item43B'    => request('frm1701q:txt43B'),
			'item44A'    => request('frm1701q:txt44A'),
			'item44B'    => request('frm1701q:txt44B'),
			'item45A'    => request('frm1701q:txt45A'),
			'item45B'    => request('frm1701q:txt45B'),
			'item46A'    => request('frm1701q:txt46A'),
			'item46B'    => request('frm1701q:txt46B'),
			'item47A'    => request('frm1701q:txt47A'),
			'item47B'    => request('frm1701q:txt47B'),
			'item48'    => request('frm1701q:txt48Desc'),
			'item48A'    => request('frm1701q:txt48A'),
			'item48B'    => request('frm1701q:txt48B'),
			'item49A'    => request('frm1701q:txt49A'),
			'item49B'    => request('frm1701q:txt49B'),
			'item50A'    => request('frm1701q:txt50A'),
			'item50B'    => request('frm1701q:txt50B'),
			'item51A'    => request('frm1701q:txt51A'),
			'item51B'    => request('frm1701q:txt51B'),
			'item52A'    => request('frm1701q:txt52A'),
			'item52B'    => request('frm1701q:txt52B'),
			'item53A'    => request('frm1701q:txt53A'),
			'item53B'    => request('frm1701q:txt53B'),
			'item54A'    => request('frm1701q:txt54A'),
			'item54B'    => request('frm1701q:txt54B'),
			'item55A'    => request('frm1701q:txt55A'),
			'item55B'    => request('frm1701q:txt55B'),
			'item56A'    => request('frm1701q:txt56A'),
			'item56B'    => request('frm1701q:txt56B'),
			'item57A'    => request('frm1701q:txt57A'),
			'item57B'    => request('frm1701q:txt57B'),
			'item58A'    => request('frm1701q:txt58A'),
			'item58B'    => request('frm1701q:txt58B'),
			'item59A'    => request('frm1701q:txt59A'),
			'item59B'    => request('frm1701q:txt59B'),
			'item60A'    => request('frm1701q:txt60A'),
			'item60B'    => request('frm1701q:txt60B'),
			'item61'    => request('frm1701q:txt61Desc'),
			'item61A'    => request('frm1701q:txt61A'),
			'item61B'    => request('frm1701q:txt61B'),
			'item62A'    => request('frm1701q:txt62A'),
			'item62B'    => request('frm1701q:txt62B'),
			'item63A'    => request('frm1701q:txt63A'),
			'item63B'    => request('frm1701q:txt63B'),
			'item64A'    => request('frm1701q:txt64A'),
			'item64B'    => request('frm1701q:txt64B'),
			'item65A'    => request('frm1701q:txt65A'),
			'item65B'    => request('frm1701q:txt65B'),
			'item66A'    => request('frm1701q:txt66A'),
			'item66B'    => request('frm1701q:txt66B'),
			'item67A'    => request('frm1701q:txt67A'),
			'item67B'    => request('frm1701q:txt67B'),
			'item68A'    => request('frm1701q:txt68A'),
			'item68B'    => request('frm1701q:txt68B'),
        ]);

		$getForm = tbl_1701Q::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

        $form = "";
        if(request('form_id') != ""){
            $form = tbl_1701Q::find(request('form_id'));
            $form->update($data);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1701Q::create($data);
            }else{
                $form = tbl_1701Q::find($getForm[0]->id);
                $form->update($data);
            }
        }

        $dateQuarter1 = "false";
		$dateQuarter2 = "false";
		$dateQuarter3 = "false";

		if(request('frm1701q:DateQuarter') == 1){
			$dateQuarter1 = "true";
		}else if(request('frm1701q:DateQuarter') == 2){
			$dateQuarter2 = "true";
		}else if(request('frm1701q:DateQuarter') == 3){
			$dateQuarter3 = "true";
		}

        $AmendedRtn1 = "false";
		$AmendedRtn2 = "false";

		if(request('frm1701q:AmendedRtn') == "Y"){
			$AmendedRtn1 = "true";
		}else if(request('frm1701q:AmendedRtn') == "N"){
			$AmendedRtn2 = "true";
		}

		$optType1 = "false";
		$optType2 = "false";
		$optType3 = "false";
		$optType4 = "false";

		if(null !== request('frm1701q:optTaxpayerType')){
			if(request('frm1701q:optTaxpayerType') == "Single"){
				$optType1 = "true";
			}else if(request('frm1701q:optTaxpayerType') == "Professional"){
				$optType2 = "true";
			}else if(request('frm1701q:optTaxpayerType') == "Estate"){
				$optType3 = "true";
			}else if(request('frm1701q:optTaxpayerType') == "Trust") {
				$optType4 = "true";
			}
		}

		$optATC1 = "false";
		$optATC2 = "false";
		$optATC3 = "false";
		$optATC4 = "false";
		$optATC5 = "false";
		$optATC6 = "false";

		if(null !== request('frm1701q:optATC')){
			if(request('frm1701q:optATC') == "II012"){
				$optATC1 = "true";
			}else if(request('frm1701q:optATC') == "II014"){
				$optATC2 = "true";
			}else if(request('frm1701q:optATC') == "II013"){
				$optATC3 = "true";
			}else if(request('frm1701q:optATC') == "II015") {
				$optATC4 = "true";
			}else if(request('frm1701q:optATC') == "II017") {
				$optATC5 = "true";
			}else if(request('frm1701q:optATC') == "II016") {
				$optATC6 = "true";
			}
		}

        $taxPayerName =  rawurlencode(request('frm1701q:txtTaxpayerName'));

        $address = rawurlencode(request('frm1701q:txtAddress'));

        $optForeignTaxCredits1 = "false";
        $optForeignTaxCredits2 = "false";

        if(null !==  request('frm1701q:optForeignTaxCredits')){
        	if(request('frm1701q:optForeignTaxCredits') == "Y"){
				$optForeignTaxCredits1 = "true";
			}else if(request('frm1701q:optForeignTaxCredits') == "N"){
				$optForeignTaxCredits2 = "true";
			}
        }

        $optTaxRate1 = "false";
        $optTaxRate2 = "false";

        if(null !== request('frm1701q:optTaxRate')){
        	if(request('frm1701q:optTaxRate') == "Graduated"){
        		$optTaxRate1 = "true";
	        }else if(request('frm1701q:optTaxRate') == "Percentage"){
	        	$optTaxRate2 = "true";
	        }
        }
        	
        $optMethodOfDeduction1 = "false";
        $optMethodOfDeduction2 = "false";

        if(null !== request('frm1701q:optMethodOfDeduction')){
        	if(request('frm1701q:optMethodOfDeduction') == "I"){
        		$optMethodOfDeduction1 = "true";
        	}else if(request('frm1701q:optMethodOfDeduction') == "O"){
        		$optMethodOfDeduction2 = "true";
        	}
        }
        
        $optSpouseType1 = "false";
        $optSpouseType2 = "false";
        $optSpouseType3 = "false";

        if(null !== request('frm1701q:optSpouseType')){
        	if(request('frm1701q:optSpouseType') == "Single"){
				$optSpouseType1 = "true";
			}else if(request('frm1701q:optSpouseType') == "Professional"){
				$optSpouseType2 = "true";
			}else if(request('frm1701q:optSpouseType') == "Compensation"){
				$optSpouseType3 = "true";
			}
        }

        $optSpouseATC1 = "false";
		$optSpouseATC2 = "false";
		$optSpouseATC3 = "false";
		$optSpouseATC4 = "false";
		$optSpouseATC5 = "false";
		$optSpouseATC6 = "false";
		$optSpouseATC7 = "false";

		if( null !==  request('frm1701q:optSpouseATC')){
			if(request('frm1701q:optSpouseATC') == "II012"){
				$optSpouseATC1 = "true";
			}else if(request('frm1701q:optSpouseATC') == "II014"){
				$optSpouseATC2 = "true";
			}else if(request('frm1701q:optSpouseATC') == "II013"){
				$optSpouseATC3 = "true";
			}else if(request('frm1701q:optSpouseATC') == "II011") {
				$optSpouseATC4 = "true";
			}else if(request('frm1701q:optSpouseATC') == "II015") {
				$optSpouseATC5 = "true";
			}else if(request('frm1701q:optSpouseATC') == "II017") {
				$optSpouseATC6 = "true";
			}else if(request('frm1701q:optSpouseATC') == "II016"){
				$optSpouseATC7 = "true";
			}
		}

		$optSpouseForeignTaxCred1 = "false";
		$optSpouseForeignTaxCred2 = "false";

		if(null !==  request('frm1701q:optSpouseForeignTaxCred')){
			if(request('frm1701q:optSpouseForeignTaxCred') == "Y"){
				$optSpouseForeignTaxCred1 = "true";
			}else{
				$optSpouseForeignTaxCred2 = "true";
			}
		}

		$optSpouseTaxRate1 = "false";
		$optSpouseTaxRate2 = "false";

		if(null !== request('frm1701q:optSpouseTaxRate')){
			if(request('frm1701q:optSpouseTaxRate') == "Graduated"){
				$optSpouseTaxRate1 = "true";
			}else if(request('frm1701q:optSpouseTaxRate') == "Percentage"){
				$optSpouseTaxRate2 = "true";
			}
		}

		$optSpouseMethod1 = "false";
		$optSpouseMethod2 = "false";

		if(null !== request('frm1701q:optSpouseMethod')){
			if(request('frm1701q:optSpouseMethod') == "I"){
				$optSpouseMethod1 = "true";
			}else if (request('frm1701q:optSpouseMethod') == "O") {
				$optSpouseMethod2 = "true";
			}
		}

        $lineOfBusiness =  rawurlencode(request('frm1701q:txtLOB'));

        $xmlData ="<?xml version='1.0'?>	
            <div>frm1701q:txtYear=".request('frm1701q:txtYear')."frm1701q:txtYear=</div>	
            <div>frm1701q:DateQuarter_1=".$dateQuarter1."frm1701q:DateQuarter_1=</div>	
            <div>frm1701q:DateQuarter_2=".$dateQuarter2."frm1701q:DateQuarter_2=</div>	
            <div>frm1701q:DateQuarter_3=".$dateQuarter3."frm1701q:DateQuarter_3=</div>	
            <div>frm1701q:AmendedRtn_1=".$AmendedRtn1."frm1701q:AmendedRtn_1=</div>	
            <div>frm1701q:AmendedRtn_2=".$AmendedRtn2."frm1701q:AmendedRtn_2=</div>	
            <div>frm1701q:txtSheets=".request('frm1701q:txtSheets')."frm1701q:txtSheets=</div>	
            <div>frm1701q:txtTIN1=".request('frm1701q:txtTIN1')."frm1701q:txtTIN1=</div>	
            <div>frm1701q:txtTIN2=".request('frm1701q:txtTIN2')."frm1701q:txtTIN2=</div>	
            <div>frm1701q:txtTIN3=".request('frm1701q:txtTIN3')."frm1701q:txtTIN3=</div>	
            <div>frm1701q:txtBranchCode=".request('frm1701q:txtBranchCode')."frm1701q:txtBranchCode=</div>	
            <div>frm1701q:txtRDOCode=".request('frm1701q:txtRDOCode')."frm1701q:txtRDOCode=</div>	
            <div>frm1701q:optType_1=".$optType1."frm1701q:optType_1=</div>	
            <div>frm1701q:optType_2=".$optType2."frm1701q:optType_2=</div>	
            <div>frm1701q:optType_3=".$optType3."frm1701q:optType_3=</div>	
            <div>frm1701q:optType_4=".$optType4."frm1701q:optType_4=</div>	
            <div>frm1701q:optATC_1=".$optATC1."frm1701q:optATC_1=</div>	
            <div>frm1701q:optATC_2=".$optATC2."frm1701q:optATC_2=</div>	
            <div>frm1701q:optATC_3=".$optATC3."frm1701q:optATC_3=</div>	
            <div>frm1701q:optATC_4=".$optATC4."frm1701q:optATC_4=</div>	
            <div>frm1701q:optATC_5=".$optATC5."frm1701q:optATC_5=</div>	
            <div>frm1701q:optATC_6=".$optATC6."frm1701q:optATC_6=</div>	
            <div>frm1701q:txtTaxpayerName=".$taxPayerName."frm1701q:txtTaxpayerName=</div>	
            <div>frm1701q:txtAddress=".$address."frm1701q:txtAddress=</div>	
            <div>frm1701q:txtZipCode=".request('frm1701q:txtZipCode')."frm1701q:txtZipCode=</div>	
            <div>frm1701q:txtBirthMonth=".request('frm1701q:txtBirthMonth')."frm1701q:txtBirthMonth=</div>	
            <div>frm1701q:txtBirthDay=".request('frm1701q:txtBirthDay')."frm1701q:txtBirthDay=</div>	
            <div>frm1701q:txtBirthYear=".request('frm1701q:txtBirthYear')."frm1701q:txtBirthYear=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>frm1701q:txtCitizenship=".request('frm1701q:txtCitizenship')."frm1701q:txtCitizenship=</div>	
            <div>frm1701q:txtForeignTaxNumber=".request('frm1701q:txtForeignTaxNumber')."frm1701q:txtForeignTaxNumber=</div>	
            <div>frm1701q:optForeignTaxCredits_1=".$optForeignTaxCredits1."frm1701q:optForeignTaxCredits_1=</div>	
            <div>frm1701q:optForeignTaxCredits_2=".$optForeignTaxCredits2."frm1701q:optForeignTaxCredits_2=</div>	
            <div>frm1701q:optTaxRate_1=".$optTaxRate1."frm1701q:optTaxRate_1=</div>	
            <div>frm1701q:optMethodOfDeduction:_1=".$optMethodOfDeduction1."frm1701q:optMethodOfDeduction:_1=</div>	
            <div>frm1701q:optMethodOfDeduction:_2=".$optMethodOfDeduction2."frm1701q:optMethodOfDeduction:_2=</div>	
            <div>frm1701q:optTaxRate_2=".$optTaxRate2."frm1701q:optTaxRate_2=</div>	
            <div>frm1701q:txtSpouseTIN1=".request('frm1701q:txtSpouseTIN1')."frm1701q:txtSpouseTIN1=</div>	
            <div>frm1701q:txtSpouseTIN2=".request('frm1701q:txtSpouseTIN2')."frm1701q:txtSpouseTIN2=</div>	
            <div>frm1701q:txtSpouseTIN3=".request('frm1701q:txtSpouseTIN3')."frm1701q:txtSpouseTIN3=</div>	
            <div>frm1701q:txtSpouseBranchCode=".request('frm1701q:txtSpouseBranchCode')."frm1701q:txtSpouseBranchCode=</div>	
            <div>frm1701q:txtSpouseRDOCode=".request('frm1701q:txtSpouseRDOCode')."frm1701q:txtSpouseRDOCode=</div>	
            <div>frm1701q:optSpouseType_1=".$optSpouseType1."frm1701q:optSpouseType_1=</div>	
            <div>frm1701q:optSpouseType_2=".$optSpouseType2."frm1701q:optSpouseType_2=</div>	
            <div>frm1701q:optSpouseType_3=".$optSpouseType3."frm1701q:optSpouseType_3=</div>	
            <div>frm1701q:optSpouseATC_1=".$optSpouseATC1."frm1701q:optSpouseATC_1=</div>	
            <div>frm1701q:optSpouseATC_2=".$optSpouseATC2."frm1701q:optSpouseATC_2=</div>	
            <div>frm1701q:optSpouseATC_3=".$optSpouseATC3."frm1701q:optSpouseATC_3=</div>	
            <div>frm1701q:optSpouseATC_4=".$optSpouseATC4."frm1701q:optSpouseATC_4=</div>	
            <div>frm1701q:optSpouseATC_5=".$optSpouseATC5."frm1701q:optSpouseATC_5=</div>	
            <div>frm1701q:optSpouseATC_6=".$optSpouseATC6."frm1701q:optSpouseATC_6=</div>	
            <div>frm1701q:optSpouseATC_7=".$optSpouseATC7."frm1701q:optSpouseATC_7=</div>	
            <div>frm1701q:txtSpouseName=".request('frm1701q:txtSpouseName')."frm1701q:txtSpouseName=</div>	
            <div>frm1701q:txtSpouseCitizenship=".request('frm1701q:txtSpouseCitizenship')."frm1701q:txtSpouseCitizenship=</div>	
            <div>frm1701q:txtSpouseForeignTaxNum=".request('frm1701q:txtSpouseForeignTaxNum')."frm1701q:txtSpouseForeignTaxNum=</div>	
            <div>frm1701q:optSpouseForeignTaxCred_1=".$optSpouseForeignTaxCred1."frm1701q:optSpouseForeignTaxCred_1=</div>	
            <div>frm1701q:optSpouseForeignTaxCred_2=".$optSpouseForeignTaxCred2."frm1701q:optSpouseForeignTaxCred_2=</div>	
            <div>frm1701q:optSpouseTaxRate_1=".$optSpouseTaxRate1."frm1701q:optSpouseTaxRate_1=</div>	
            <div>frm1701q:optSpouseMethod:_1=".$optSpouseMethod1."frm1701q:optSpouseMethod:_1=</div>	
            <div>frm1701q:optSpouseMethod:_2=".$optSpouseMethod2."frm1701q:optSpouseMethod:_2=</div>	
            <div>frm1701q:optSpouseTaxRate_2=".$optSpouseTaxRate2."frm1701q:optSpouseTaxRate_2=</div>	
            <div>frm1701q:txt26A=".request('frm1701q:txt26A')."frm1701q:txt26A=</div>	
            <div>frm1701q:txt26B=".request('frm1701q:txt26B')."frm1701q:txt26B=</div>	
            <div>frm1701q:txt27A=".request('frm1701q:txt27A')."frm1701q:txt27A=</div>	
            <div>frm1701q:txt27B=".request('frm1701q:txt27B')."frm1701q:txt27B=</div>	
            <div>frm1701q:txt28A=".request('frm1701q:txt28A')."frm1701q:txt28A=</div>	
            <div>frm1701q:txt28B=".request('frm1701q:txt28B')."frm1701q:txt28B=</div>	
            <div>frm1701q:txt29A=".request('frm1701q:txt29A')."frm1701q:txt29A=</div>	
            <div>frm1701q:txt29B=".request('frm1701q:txt29B')."frm1701q:txt29B=</div>	
            <div>frm1701q:txt30A=".request('frm1701q:txt30A')."frm1701q:txt30A=</div>	
            <div>frm1701q:txt30B=".request('frm1701q:txt30B')."frm1701q:txt30B=</div>	
            <div>frm1701q:txt31=".request('frm1701q:txt31')."frm1701q:txt31=</div>	
            <div>frm1701q:txtAgency32=frm1701q:txtAgency32=</div>	
            <div>frm1701q:txtNumber32=frm1701q:txtNumber32=</div>	
            <div>frm1701q:txtDate32=frm1701q:txtDate32=</div>	
            <div>frm1701q:txtAmount32=frm1701q:txtAmount32=</div>	
            <div>frm1701q:txtAgency33=frm1701q:txtAgency33=</div>	
            <div>frm1701q:txtNumber33=frm1701q:txtNumber33=</div>	
            <div>frm1701q:txtDate33=frm1701q:txtDate33=</div>	
            <div>frm1701q:txtAmount33=frm1701q:txtAmount33=</div>	
            <div>frm1701q:txtNumber34=frm1701q:txtNumber34=</div>	
            <div>frm1701q:txtDate34=frm1701q:txtDate34=</div>	
            <div>frm1701q:txtAmount34=frm1701q:txtAmount34=</div>	
            <div>frm1701q:txtParticular35=frm1701q:txtParticular35=</div>	
            <div>frm1701q:txtAgency35=frm1701q:txtAgency35=</div>	
            <div>frm1701q:txtNumber35=frm1701q:txtNumber35=</div>	
            <div>frm1701q:txtDate35=frm1701q:txtDate35=</div>	
            <div>frm1701q:txtAmount35=frm1701q:txtAmount35=</div>	
            <div>frm1701q:txtPg2TIN1=".request('frm1701q:txtPg2TIN1')."frm1701q:txtPg2TIN1=</div>	
            <div>frm1701q:txtPg2TIN2=".request('frm1701q:txtPg2TIN2')."frm1701q:txtPg2TIN2=</div>	
            <div>frm1701q:txtPg2TIN3=".request('frm1701q:txtPg2TIN3')."frm1701q:txtPg2TIN3=</div>	
            <div>frm1701q:txtPg2BranchCode=".request('frm1701q:txtPg2BranchCode')."frm1701q:txtPg2BranchCode=</div>	
            <div>frm1701q:txtPg2TaxpayerName=".request('frm1701q:txtPg2TaxpayerName')."frm1701q:txtPg2TaxpayerName=</div>	
            <div>frm1701q:txt36A=".request('frm1701q:txt36A')."frm1701q:txt36A=</div>	
            <div>frm1701q:txt36B=".request('frm1701q:txt36B')."frm1701q:txt36B=</div>	
            <div>frm1701q:txt37A=".request('frm1701q:txt37A')."frm1701q:txt37A=</div>	
            <div>frm1701q:txt37B=".request('frm1701q:txt37B')."frm1701q:txt37B=</div>	
            <div>frm1701q:txt38A=".request('frm1701q:txt38A')."frm1701q:txt38A=</div>	
            <div>frm1701q:txt38B=".request('frm1701q:txt38B')."frm1701q:txt38B=</div>	
            <div>frm1701q:txt39A=".request('frm1701q:txt39A')."frm1701q:txt39A=</div>	
            <div>frm1701q:txt39B=".request('frm1701q:txt39B')."frm1701q:txt39B=</div>	
            <div>frm1701q:txt40A=".request('frm1701q:txt40A')."frm1701q:txt40A=</div>	
            <div>frm1701q:txt40B=".request('frm1701q:txt40B')."frm1701q:txt40B=</div>	
            <div>frm1701q:txt41A=".request('frm1701q:txt41A')."frm1701q:txt41A=</div>	
            <div>frm1701q:txt41B=".request('frm1701q:txt41B')."frm1701q:txt41B=</div>	
            <div>frm1701q:txt42A=".request('frm1701q:txt42A')."frm1701q:txt42A=</div>	
            <div>frm1701q:txt42B=".request('frm1701q:txt42B')."frm1701q:txt42B=</div>	
            <div>frm1701q:txt43Desc=".request('frm1701q:txt43Desc')."frm1701q:txt43Desc=</div>	
            <div>frm1701q:txt43A=".request('frm1701q:txt43A')."frm1701q:txt43A=</div>	
            <div>frm1701q:txt43B=".request('frm1701q:txt43B')."frm1701q:txt43B=</div>	
            <div>frm1701q:txt44A=".request('frm1701q:txt44A')."frm1701q:txt44A=</div>	
            <div>frm1701q:txt44B=".request('frm1701q:txt44B')."frm1701q:txt44B=</div>	
            <div>frm1701q:txt45A=".request('frm1701q:txt45A')."frm1701q:txt45A=</div>	
            <div>frm1701q:txt45B=".request('frm1701q:txt45B')."frm1701q:txt45B=</div>	
            <div>frm1701q:txt46A=".request('frm1701q:txt46A')."frm1701q:txt46A=</div>	
            <div>frm1701q:txt46B=".request('frm1701q:txt46B')."frm1701q:txt46B=</div>	
            <div>frm1701q:txt47A=".request('frm1701q:txt47A')."frm1701q:txt47A=</div>	
            <div>frm1701q:txt47B=".request('frm1701q:txt47B')."frm1701q:txt47B=</div>	
            <div>frm1701q:txt48Desc=".request('frm1701q:txt48Desc')."frm1701q:txt48Desc=</div>	
            <div>frm1701q:txt48A=".request('frm1701q:txt48A')."frm1701q:txt48A=</div>	
            <div>frm1701q:txt48B=".request('frm1701q:txt48B')."frm1701q:txt48B=</div>	
            <div>frm1701q:txt49A=".request('frm1701q:txt49A')."frm1701q:txt49A=</div>	
            <div>frm1701q:txt49B=".request('frm1701q:txt49B')."frm1701q:txt49B=</div>	
            <div>frm1701q:txt50A=".request('frm1701q:txt50A')."frm1701q:txt50A=</div>	
            <div>frm1701q:txt50B=".request('frm1701q:txt50B')."frm1701q:txt50B=</div>	
            <div>frm1701q:txt51A=".request('frm1701q:txt51A')."frm1701q:txt51A=</div>	
            <div>frm1701q:txt51B=".request('frm1701q:txt51B')."frm1701q:txt51B=</div>	
            <div>frm1701q:txt52A=".request('frm1701q:txt52A')."frm1701q:txt52A=</div>	
            <div>frm1701q:txt52B=".request('frm1701q:txt52B')."frm1701q:txt52B=</div>	
            <div>frm1701q:txt53A=".request('frm1701q:txt53A')."frm1701q:txt53A=</div>	
            <div>frm1701q:txt53B=".request('frm1701q:txt53B')."frm1701q:txt53B=</div>	
            <div>frm1701q:txt54A=".request('frm1701q:txt54A')."frm1701q:txt54A=</div>	
            <div>frm1701q:txt54B=".request('frm1701q:txt54B')."frm1701q:txt54B=</div>	
            <div>frm1701q:txt55A=".request('frm1701q:txt55A')."frm1701q:txt55A=</div>	
            <div>frm1701q:txt55B=".request('frm1701q:txt55B')."frm1701q:txt55B=</div>	
            <div>frm1701q:txt56A=".request('frm1701q:txt56A')."frm1701q:txt56A=</div>	
            <div>frm1701q:txt56B=".request('frm1701q:txt56B')."frm1701q:txt56B=</div>	
            <div>frm1701q:txt57A=".request('frm1701q:txt57A')."frm1701q:txt57A=</div>	
            <div>frm1701q:txt57B=".request('frm1701q:txt57B')."frm1701q:txt57B=</div>	
            <div>frm1701q:txt58A=".request('frm1701q:txt58A')."frm1701q:txt58A=</div>	
            <div>frm1701q:txt58B=".request('frm1701q:txt58B')."frm1701q:txt58B=</div>	
            <div>frm1701q:txt59A=".request('frm1701q:txt59A')."frm1701q:txt59A=</div>	
            <div>frm1701q:txt59B=".request('frm1701q:txt59B')."frm1701q:txt59B=</div>	
            <div>frm1701q:txt60A=".request('frm1701q:txt60A')."frm1701q:txt60A=</div>	
            <div>frm1701q:txt60B=".request('frm1701q:txt60B')."frm1701q:txt60B=</div>	
            <div>frm1701q:txt61Desc=".request('frm1701q:txt61Desc')."frm1701q:txt61Desc=</div>	
            <div>frm1701q:txt61A=".request('frm1701q:txt61A')."frm1701q:txt61A=</div>	
            <div>frm1701q:txt61B=".request('frm1701q:txt61B')."frm1701q:txt61B=</div>	
            <div>frm1701q:txt62A=".request('frm1701q:txt62A')."frm1701q:txt62A=</div>	
            <div>frm1701q:txt62B=".request('frm1701q:txt62B')."frm1701q:txt62B=</div>	
            <div>frm1701q:txt63A=".request('frm1701q:txt63A')."frm1701q:txt63A=</div>	
            <div>frm1701q:txt63B=".request('frm1701q:txt63B')."frm1701q:txt63B=</div>	
            <div>frm1701q:txt64A=".request('frm1701q:txt64A')."frm1701q:txt64A=</div>	
            <div>frm1701q:txt64B=".request('frm1701q:txt64B')."frm1701q:txt64B=</div>	
            <div>frm1701q:txt65A=".request('frm1701q:txt65A')."frm1701q:txt65A=</div>	
            <div>frm1701q:txt65B=".request('frm1701q:txt65B')."frm1701q:txt65B=</div>	
            <div>frm1701q:txt66A=".request('frm1701q:txt66A')."frm1701q:txt66A=</div>	
            <div>frm1701q:txt66B=".request('frm1701q:txt66B')."frm1701q:txt66B=</div>	
            <div>frm1701q:txt67A=".request('frm1701q:txt67A')."frm1701q:txt67A=</div>	
            <div>frm1701q:txt67B=".request('frm1701q:txt67B')."frm1701q:txt67B=</div>	
            <div>frm1701q:txt68A=".request('frm1701q:txt68A')."frm1701q:txt68A=</div>	
            <div>frm1701q:txt68B=".request('frm1701q:txt68B')."frm1701q:txt68B=</div>	
            <div>frm1701q:txtCurrentPage=1frm1701q:txtCurrentPage=</div>	
            <div>frm1701q:txtMaxPage=2frm1701q:txtMaxPage=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>frm1701q:txtLOB=".$replaceSpaceLineBusiness."frm1701q:txtLOB=</div>	
            <div>frm1701q:txtTelno=".request('frm1701q:txtTelno')."frm1701q:txtTelno=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm1701q:txtTIN1').request('frm1701q:txtTIN2').request('frm1701q:txtTIN3').request('frm1701q:txtBranchCode');

        $return_period = request('frm1701q:txtYear')."-Q".request('frm1701q:DateQuarter');

        $getReturnPeriod = tbl_1701Q::where('company_id',  request('company'))
     						->where('item1', request('frm1701q:txtYear'))
     						->where('item2', request('frm1701q:DateQuarter'))
     						->count();

     	$filename = "";
     	if($getReturnPeriod == "1"){
     		$filename = $tin."-1701Qv2018-".request('frm1701q:txtYear')."Q".request('frm1701q:DateQuarter').'.xml';
     	}else{
     		if(request('form_id') != ""){
					$getXml = Xml::where('user_id', Auth::user()->id)
					        ->where('company_id', request('company'))
					        ->where('form_id', $form->id)
					        ->where('form', '1701Qv2018')
					        ->get();
					if($getXml[0]->return_period == $return_period ){
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
				
     		$filename = $tin."-1701Qv2018-".request('frm1701q:txtYear')."Q".request('frm1701q:DateQuarter').$ext.'.xml';
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

            $data_xml = ([
	     		'user_id'		=> Auth::user()->id,
	     		'company_id'	=> request('company'),
	     		'form_id'		=> $form->id,
	     		'form'			=> '1701Qv2018',
	     		'file_name'		=> $filename,
	     		'return_period'	=> $return_period,
	     		'status'		=> 'Saved',
	     	]);

            if($action == "insert"){
	     		$myXMLFile = fopen("savefile/".$filename, "w");
	     		fwrite($myXMLFile, $xmlData);
	            fclose($myXMLFile);

	     		$xml_id = Xml::create($data_xml);

	     	}else{
	     		$getXml = Xml::where('user_id', Auth::user()->id)
     						->where('company_id', request('company'))
     						->where('form_id', $form->id)
     						->where('form', '1701Qv2018')
     						->get();

     			$path = "savefile/".$getXml[0]->file_name;
     			if (file_exists($path)) {
                    unlink($path);
                }

                $myXMLFile = fopen("savefile/".$filename, "w");
	     		fwrite($myXMLFile, $xmlData);
	            fclose($myXMLFile);

	     		$xml = Xml::find($getXml[0]->id);
     			$xml->update($data_xml);
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
                            ->where('form', '1701Qv2018')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1701Q::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1701Qv2018')
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
        $data = tbl_1701Q::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1701Qv2018')
                            ->get();
        
        return view('forms.BIR-Form 1701Qv2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

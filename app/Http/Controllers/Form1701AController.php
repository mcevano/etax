<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1701A;
use App\tbl_1701A_modal1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1701AController extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1701_as')){

            }else{
            	Schema::connection('mysql2')->create('tbl_1701_as', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item2');
                    $table->string('item3')->nullable();
                    $table->string('item6')->nullable();
                    $table->string('item7')->nullable();
                    $table->string('item10')->nullable();
                    $table->string('item12')->nullable();
                    $table->string('item13')->nullable();
                    $table->string('item14')->nullable();
                    $table->string('item16')->nullable();
                    $table->string('item17')->nullable();
                    $table->string('item18')->nullable();
                    $table->string('item19')->nullable();
                    $table->text('item20A')->nullable();
                    $table->text('item20B')->nullable();
                    $table->text('item21A')->nullable();
                    $table->text('item21B')->nullable();
                    $table->text('item22A')->nullable();
                    $table->text('item22B')->nullable();
                    $table->text('item23A')->nullable();
                    $table->text('item23B')->nullable();
                    $table->text('item24A')->nullable();
                    $table->text('item24B')->nullable();
                    $table->text('item25A')->nullable();
                    $table->text('item25B')->nullable();
                    $table->text('item26A')->nullable();
                    $table->text('item26B')->nullable();
                    $table->text('item27A')->nullable();
                    $table->text('item27B')->nullable();
                    $table->text('item28A')->nullable();
                    $table->text('item28B')->nullable();
                    $table->text('item29A')->nullable();
                    $table->text('item29B')->nullable();
                    $table->text('item30')->nullable();
                    $table->text('overpayment')->nullable();
                    $table->text('item31')->nullable();
                    $table->text('item36A')->nullable();
                    $table->text('item36B')->nullable();
                    $table->text('item37A')->nullable();
                    $table->text('item37B')->nullable();
                    $table->text('item38A')->nullable();
                    $table->text('item38B')->nullable();
                    $table->text('item39A')->nullable();
                    $table->text('item39B')->nullable();
                    $table->text('item40A')->nullable();
                    $table->text('item40B')->nullable();
                    $table->text('item41_desc')->nullable();
                    $table->text('item41A')->nullable();
                    $table->text('item41B')->nullable();
                    $table->text('item42_desc')->nullable();
                    $table->text('item42A')->nullable();
                    $table->text('item42B')->nullable();
                    $table->text('item43A')->nullable();
                    $table->text('item43B')->nullable();
                    $table->text('item44A')->nullable();
                    $table->text('item44B')->nullable();
                    $table->text('item45A')->nullable();
                    $table->text('item45B')->nullable();
                    $table->text('item46A')->nullable();
                    $table->text('item46B')->nullable();
                    $table->text('item47A')->nullable();
                    $table->text('item47B')->nullable();
                    $table->text('item48A')->nullable();
                    $table->text('item48B')->nullable();
                    $table->text('item49A')->nullable();
                    $table->text('item49B')->nullable();
                    $table->text('item50_desc')->nullable();
                    $table->text('item50A')->nullable();
                    $table->text('item50B')->nullable();
                    $table->text('item51_desc')->nullable();
                    $table->text('item51A')->nullable();
                    $table->text('item51B')->nullable();
                    $table->text('item52A')->nullable();
                    $table->text('item52B')->nullable();
                    $table->text('item53A')->nullable();
                    $table->text('item53B')->nullable();
                    $table->text('item54A')->nullable();
                    $table->text('item54B')->nullable();
                    $table->text('item55A')->nullable();
                    $table->text('item55B')->nullable();
                    $table->text('item56A')->nullable();
                    $table->text('item56B')->nullable();
                    $table->text('item57A')->nullable();
                    $table->text('item57B')->nullable();
                    $table->text('item58A')->nullable();
                    $table->text('item58B')->nullable();
                    $table->text('item59A')->nullable();
                    $table->text('item59B')->nullable();
                    $table->text('item60A')->nullable();
                    $table->text('item60B')->nullable();
                    $table->text('item61A')->nullable();
                    $table->text('item61B')->nullable();
                    $table->text('item62A')->nullable();
                    $table->text('item62B')->nullable();
                    $table->text('item63_desc')->nullable();
                    $table->text('item63A')->nullable();
                    $table->text('item63B')->nullable();
                    $table->text('item64A')->nullable();
                    $table->text('item64B')->nullable();
                    $table->text('item65A')->nullable();
                    $table->text('item65B')->nullable();
                    $table->text('item66A')->nullable();
                    $table->text('item66B')->nullable();
                    $table->text('item66C')->nullable();
                    $table->text('item66D')->nullable();
                    $table->text('item67')->nullable();
                    $table->text('item68')->nullable();
                    $table->text('item69')->nullable();
                    $table->text('item70')->nullable();
                    $table->text('item71')->nullable();
                    $table->text('item72')->nullable();
                    $table->text('item73')->nullable();
                    $table->text('item74')->nullable();
                    $table->text('item75')->nullable();
                    $table->text('modal1_total_tax')->nullable();
                    $table->text('modal1_total_spouse')->nullable();
                    $table->text('modal2_total_tax')->nullable();
                    $table->text('modal2_total_spouse')->nullable();
                    $table->timestamps();
                });

				Schema::connection('mysql2')->create('tbl_1701_a_modal1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('description')->nullable();
                    $table->text('taxpayer')->nullable();
                    $table->text('spouse')->nullable();
                    $table->timestamps();
               });

            }
            return view('forms.BIR-Form 1701A',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_1701A::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1701A')
                            ->get();
        
        	return view('forms.BIR-Form 1701A',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    	
    }

    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	$data = ([
    		'form_no' => request('form_no'),
			'company_id' => request('company'),
			'item1A' => request('frm1701A:txtMonth'),
			'item1B' => request('frm1701A:txtYear'),
			'item2' => request('frm1701A:optAmendedReturn'),
			'item3' => request('frm1701A:optShortPeriod'),
			'item6' => null !== request('frm1701A:optTaxType') ? request('frm1701A:optTaxType') : '',
			'item7' => null !== request('frm1701A:optATC') ? request('frm1701A:optATC') : '',
			'item10' => request('frm1701A:txtBirthDate'),
			'item12' => request('frm1701A:txtCitizenship'),
			'item13' => request('frm1701A:optForeignTaxCredits'),
			'item14' => request('frm1701A:txtForeignTaxNumber'),
			'item16' => null !== request('frm1701A:optCivilStatus') ? request('frm1701A:optCivilStatus') : '',
			'item17' => null !== request('frm1701A:optSpouseIncome') ? request('frm1701A:optSpouseIncome') : '',
			'item18' => null !== request('frm1701A:optFilingStatus') ? request('frm1701A:optFilingStatus') : '',
			'item19' => null !== request('frm1701A:optTaxRate') ? request('frm1701A:optTaxRate') : '',
			'item20A' => request('frm1701A:txt20A'),
			'item20B' => request('frm1701A:txt20B'),
			'item21A' => request('frm1701A:txt21A'),
			'item21B' => request('frm1701A:txt21B'),
			'item22A' => request('frm1701A:txt22A'),
			'item22B' => request('frm1701A:txt22B'),
			'item23A' => request('frm1701A:txt23A'),
			'item23B' => request('frm1701A:txt23B'),
			'item24A' => request('frm1701A:txt24A'),
			'item24B' => request('frm1701A:txt24B'),
			'item25A' => request('frm1701A:txt25A'),
			'item25B' => request('frm1701A:txt25B'),
			'item26A' => request('frm1701A:txt26A'),
			'item26B' => request('frm1701A:txt26B'),
			'item27A' => request('frm1701A:txt27A'),
			'item27B' => request('frm1701A:txt27B'),
			'item28A' => request('frm1701A:txt28A'),
			'item28B' => request('frm1701A:txt28B'),
			'item29A' => request('frm1701A:txt29A'),
			'item29B' => request('frm1701A:txt29B'),
			'item30' => request('frm1701A:txt30'),
			'overpayment' => null !== request('frm1701A:optRefund') ? request('frm1701A:optRefund') : '',
			'item31' => request('frm1701A:txtNumberAttachments'),
			'item36A' => request('frm1701A:txt36A'),
			'item36B' => request('frm1701A:txt36B'),
			'item37A' => request('frm1701A:txt37A'),
			'item37B' => request('frm1701A:txt37B'),
			'item38A' => request('frm1701A:txt38A'),
			'item38B' => request('frm1701A:txt38B'),
			'item39A' => request('frm1701A:txt39A'),
			'item39B' => request('frm1701A:txt39B'),
			'item40A' => request('frm1701A:txt40A'),
			'item40B' => request('frm1701A:txt40B'),
			'item41_desc' => request('frm1701A:txt41Desc'),
			'item41A' => request('frm1701A:txt41A'),
			'item41B' => request('frm1701A:txt41B'),
			'item42_desc' => request('frm1701A:txt42Desc'),
			'item42A' => request('frm1701A:txt42A'),
			'item42B' => request('frm1701A:txt42B'),
			'item43A' => request('frm1701A:txt43A'),
			'item43B' => request('frm1701A:txt43B'),
			'item44A' => request('frm1701A:txt44A'),
			'item44B' => request('frm1701A:txt44B'),
			'item45A' => request('frm1701A:txt45A'),
			'item45B' => request('frm1701A:txt45B'),
			'item46A' => request('frm1701A:txt46A'),
			'item46B' => request('frm1701A:txt46B'),
			'item47A' => request('frm1701A:txt47A'),
			'item47B' => request('frm1701A:txt47B'),
			'item48A' => request('frm1701A:txt48A'),
			'item48B' => request('frm1701A:txt48B'),
			'item49A' => request('frm1701A:txt49A'),
			'item49B' => request('frm1701A:txt49B'),
			'item50_desc' => request('frm1701A:txt50Desc'),
			'item50A' => request('frm1701A:txt50A'),
			'item50B' => request('frm1701A:txt50B'),
			'item51_desc' => request('frm1701A:txt51Desc'),
			'item51A' => request('frm1701A:txt51A'),
			'item51B' => request('frm1701A:txt51B'),
			'item52A' => request('frm1701A:txt52A'),
			'item52B' => request('frm1701A:txt52B'),
			'item53A' => request('frm1701A:txt53A'),
			'item53B' => request('frm1701A:txt53B'),
			'item54A' => request('frm1701A:txt54A'),
			'item54B' => request('frm1701A:txt54B'),
			'item55A' => request('frm1701A:txt55A'),
			'item55B' => request('frm1701A:txt55B'),
			'item56A' => request('frm1701A:txt56A'),
			'item56B' => request('frm1701A:txt56B'),
			'item57A' => request('frm1701A:txt56A'),
			'item57B' => request('frm1701A:txt56B'),
			'item58A' => request('frm1701A:txt58A'),
			'item58B' => request('frm1701A:txt58B'),
			'item59A' => request('frm1701A:txt59A'),
			'item59B' => request('frm1701A:txt59B'),
			'item60A' => request('frm1701A:txt60A'),
			'item60B' => request('frm1701A:txt60B'),
			'item61A' => request('frm1701A:txt61A'),
			'item61B' => request('frm1701A:txt61B'),
			'item62A' => request('frm1701A:txt62A'),
			'item62B' => request('frm1701A:txt62B'),
			'item63_desc' => request('frm1701A:txt63Desc'),
			'item63A' => request('frm1701A:txt63A'),
			'item63B' => request('frm1701A:txt63B'),
			'item64A' => request('frm1701A:txt64A'),
			'item64B' => request('frm1701A:txt64B'),
			'item65A' => request('frm1701A:txt65A'),
			'item65B' => request('frm1701A:txt65B'),
			'item66A' => request('frm1701A:txtSpouseTIN1'),
			'item66B' => request('frm1701A:txtSpouseTIN2'),
			'item66C' => request('frm1701A:txtSpouseTIN3'),
			'item66D' => request('frm1701A:txtSpouseTIN3'),
			'item67' => request('frm1701A:txtSpouseRDOCode'),
			'item68' => null !== request('frm1701A:optSpouseTaxType') ? request('frm1701A:optSpouseTaxType') : '',
			'item69' => null !== request('frm1701A:optSpouseATC') ? request('frm1701A:optSpouseATC') : '',
			'item70' => request('frm1701A:txtSpouseName'),
			'item71' => request('frm1701A:txtSpouseTelNum'),
			'item72' => request('frm1701A:txtSpouseCitizenship'),
			'item73' => null !== request('frm1701A:optSpouseFTC') ? request('frm1701A:optSpouseFTC') : '',
			'item74' => request('frm1701A:txtSpouseFTN'),
			'item75' => null !== request('frm1701A:optSpouseTaxRate') ? request('frm1701A:optSpouseTaxRate') : '',
			'modal1_total_tax' => request('frm1701A:txtmodalPartIVA_C1'),
			'modal1_total_spouse' => request('frm1701A:txtmodalPartIVA_C2'),
			'modal2_total_tax' => request(''),
			'modal2_total_spouse' => request(''),
    	]);
		
		$getForm = tbl_1701A::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

		$form = "";
        $trans = "";
        if(request('form_id') != ""){
            $form = tbl_1701A::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1701A::create($data);
            }else{
                $form = tbl_1701A::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_1701A_modal1::where('form_id', $getForm[0]->id)->delete();
        }

		if(null !== request('frm1701A:txtmodalPartIVADesc')){
			for ($i=0; $i < count(request('frm1701A:txtmodalPartIVADesc')) ; $i++) { 
				$modal1 = ([
		        	'form_id'   => $form->id,
					'description'   => request('frm1701A:txtmodalPartIVADesc')[$i],
					'taxpayer'   => request('frm1701A:txtmodalPartIVATaxFiler')[$i],
					'spouse'   => request('frm1701A:txtmodalPartIVASpouse')[$i],
		        ]);

		        tbl_1701A_modal1::create($data);
			}
		}

		if(null !== request('frm1701A:txtmodalPartIVBDesc')){
			for ($i=0; $i < count(request('frm1701A:txtmodalPartIVBDesc')) ; $i++) { 
				$modal1 = ([
		        	'form_id'   => $form->id,
					'description'   => request('frm1701A:txtmodalPartIVBDesc')[$i],
					'taxpayer'   => request('frm1701A:txtmodalPartIVBTaxFiler')[$i],
					'spouse'   => request('frm1701A:txtmodalPartIVBSpouse')[$i],
		        ]);

		        tbl_1701A_modal1::create($data);
			}
		}

		$optAmendedReturn_1 = "false";
		$optAmendedReturn_2 = "false";
		if(request('frm1701A:optAmendedReturn') == 'Y'){
			$optAmendedReturn_1 = "true";
		}else if(request('frm1701A:optAmendedReturn') == 'N'){
			$optAmendedReturn_2 = "true";
		}

		$optShortPeriod_1 = "false";
		$optShortPeriod_2 = "false";
		if(request('frm1701A:optShortPeriod') == 'Y'){
			$optShortPeriod_1 = "true";
		}else if(request('frm1701A:optShortPeriod') == 'N'){
			$optShortPeriod_2 = "true";
		}

		$optTaxType_1 = "false";
		$optTaxType_2 = "false";

		if(null !== request('frm1701A:optTaxType')){
			if(request('frm1701A:optTaxType') == 'S'){
				$optTaxType_1 = "true";
			}else if(request('frm1701A:optTaxType') == 'P'){
				$optTaxType_2 = "true";
			}
		}

		$optATC_1 = "false";
		$optATC_2 = "false";
		$optATC_3 = "false";
		$optATC_4 = "false";
		if(null !== request('frm1701A:optATC')){
			if(request('frm1701A:optATC') == 'II012'){
				$optATC_1 = "true";
			}else if(request('frm1701A:optATC') == 'II014'){
				$optATC_2 = "true";
			}else if(request('frm1701A:optATC') == 'II015'){
				$optATC_3 = "true";
			}else if(request('frm1701A:optATC') == 'II017'){
				$optATC_4 = "true";
			}
		}

		$taxPayerName =  rawurlencode(request('frm1701A:txtTaxpayerName'));

		$address = rawurlencode(request('frm1701A:txtAddress'));

		$optForeignTaxCredits_1 = "false";
		$optForeignTaxCredits_2 = "false";

		if(request('frm1701A:optForeignTaxCredits') == 'Y'){
			$optForeignTaxCredits_1 = "true";
		}else if(request('frm1701A:optForeignTaxCredits') == 'N'){
			$optForeignTaxCredits_2 = "true";
		}

		$optCivilStatus_1 = "false";
		$optCivilStatus_2 = "false";
		$optCivilStatus_3 = "false";
		$optCivilStatus_4 = "false";
		if(null !== request('frm1701A:optCivilStatus')){
			if(request('frm1701A:optCivilStatus') == 'Single'){
				$optCivilStatus_1 = "true";
			}else if(request('frm1701A:optCivilStatus') == 'Married'){
				$optCivilStatus_2 = "true";
			}else if(request('frm1701A:optCivilStatus') == 'Separated'){
				$optCivilStatus_3 = "true";
			}else if(request('frm1701A:optCivilStatus') == 'Widow'){
				$optCivilStatus_4 = "true";
			}
		}

		$optSpouseIncome_1 = "false";
		$optSpouseIncome_2 = "false";
		if(null !== request('frm1701A:optSpouseIncome')){
			if(request('frm1701A:optSpouseIncome') == 'Y'){
				$optSpouseIncome_1 = "true";
			}else if(request('frm1701A:optSpouseIncome') == 'N'){
				$optSpouseIncome_2 = "true";
			}
		}

		$optFilingStatus_1 = "false";
		$optFilingStatus_2 = "false";
		if(null !== request('frm1701A:optFilingStatus')){
			if(request('frm1701A:optFilingStatus') == 'Joint'){
				$optFilingStatus_1 = "true";
			}else if(request('frm1701A:optFilingStatus') == 'Separate'){
				$optFilingStatus_2 = "true";
			}
		}

		$optTaxRate_1 = "false";
		$optTaxRate_2 = "false";
		if(null !== request('frm1701A:optTaxRate')){
			if(request('frm1701A:optTaxRate') == 'G'){
				$optTaxRate_1 = "true";
			}else if(request('frm1701A:optTaxRate') == 'E'){
				$optTaxRate_2 = "true";
			}
		}

		$optRefund_1 = "false";
		$optRefund_2 = "false";
		$optRefund_3 = "false";
		if(null !== request('frm1701A:optRefund')){
			if(request('frm1701A:optRefund') == '1'){
				$optRefund_1 = "true";
			}else if(request('frm1701A:optRefund') == '2'){
				$optRefund_2 = "true";
			}else if(request('frm1701A:optRefund') == '3'){
				$optRefund_3 = "true";
			}
		}

		$optSpouseTaxType_1 = "false";
		$optSpouseTaxType_2 = "false";
		if(null !== request('frm1701A:optSpouseTaxType')){
			if(request('frm1701A:optSpouseTaxType') == 'S'){
				$optSpouseTaxType_1 = "true";
			}else if(request('frm1701A:optSpouseTaxType') == 'P'){
				$optSpouseTaxType_2 = "true";
			}
		}

		$optSpouseATC_1 = "false";
		$optSpouseATC_2 = "false";
		$optSpouseATC_3 = "false";
		$optSpouseATC_4 = "false";
		if(null !== request('frm1701A:optSpouseATC')){
			if(request('frm1701A:optSpouseATC') == 'II012'){
				$optSpouseATC_1 = "true";
			}else if(request('frm1701A:optSpouseATC') == 'II014'){
				$optSpouseATC_2 = "true";
			}else if(request('frm1701A:optSpouseATC') == 'II015'){
				$optSpouseATC_3 = "true";
			}else if(request('frm1701A:optSpouseATC') == 'II017'){
				$optSpouseATC_4 = "true";
			}
		}	

		$optSpouseFTC_1 = "false";
		$optSpouseFTC_2 = "false";
		if(null !== request('frm1701A:optSpouseFTC')){
			if(request('frm1701A:optSpouseFTC') == 'Y'){
				$optSpouseFTC_1 = "true";
			}else if(request('frm1701A:optSpouseFTC') == 'N'){
				$optSpouseFTC_2 = "true";
			}
		}	

		$optSpouseTaxRate_1 = "false";
		$optSpouseTaxRate_2 = "false";
		if(null !== request('frm1701A:optSpouseTaxRate')){
			if(request('frm1701A:optSpouseTaxRate') == 'G'){
				$optSpouseTaxRate_1 = "true";
			}else if(request('frm1701A:optSpouseTaxRate') == 'E'){
				$optSpouseTaxRate_2 = "true";
			}
		}

		$modal1 = "";
		if(null !== request('frm1701A:txtmodalPartIVADesc')){
			for ($i=0; $i < count(request('frm1701A:txtmodalPartIVADesc')); $i++) { 
				$modal1 .= "<div>frm1701A:txtmodalPartIVADesc_".($i + 1)."C1=".request('frm1701A:txtmodalPartIVADesc')[$i]."frm1701A:txtmodalPartIVADesc_".($i + 1)."C1=</div>	
            <div>frm1701A:txtmodalPartIVA_".($i + 1)."C2=".request('frm1701A:txtmodalPartIVATaxFiler')[$i]."frm1701A:txtmodalPartIVA_".($i + 1)."C2=</div>	
            <div>frm1701A:txtmodalPartIVA_".($i + 1)."C3=".request('frm1701A:txtmodalPartIVASpouse')[$i]."frm1701A:txtmodalPartIVA_".($i + 1)."C3=</div>	
            ";
			}
		}

		$modal2 = "";
		if(null !== request('frm1701A:txtmodalPartIVBDesc')){
			for ($i=0; $i < count(request('frm1701A:txtmodalPartIVBDesc')) ; $i++) { 
				$modal2 .= "<div>frm1701A:txtmodalPartIVBDesc_".($i + 1)."C1=".request('frm1701A:txtmodalPartIVBDesc')[$i]."frm1701A:txtmodalPartIVBDesc_".($i + 1)."C1=</div>	
            <div>frm1701A:txtmodalPartIVB_".($i + 1)."C2=".request('frm1701A:txtmodalPartIVBTaxFiler')[$i]."frm1701A:txtmodalPartIVB_".($i + 1)."C2=</div>	
            <div>frm1701A:txtmodalPartIVB_".($i + 1)."C3=".request('frm1701A:txtmodalPartIVBSpouse')[$i]."frm1701A:txtmodalPartIVB_".($i + 1)."C3=</div>	
            ";
			}
		}

		$xmlData ="<?xml version='1.0'?>	
            <div>frm1701A:txtMonth=".request('frm1701A:txtMonth')."frm1701A:txtMonth=</div>	
            <div>frm1701A:txtYear=".request('frm1701A:txtYear')."frm1701A:txtYear=</div>	
            <div>frm1701A:optAmendedReturn_1=".$optAmendedReturn_1."frm1701A:optAmendedReturn_1=</div>	
            <div>frm1701A:optAmendedReturn_2=".$optAmendedReturn_2."frm1701A:optAmendedReturn_2=</div>	
            <div>frm1701A:optShortPeriod_1=".$optShortPeriod_1."frm1701A:optShortPeriod_1=</div>	
            <div>frm1701A:optShortPeriod_2=".$optShortPeriod_2."frm1701A:optShortPeriod_2=</div>	
            <div>frm1701A:txtTIN1=".request('frm1701A:txtTIN1')."frm1701A:txtTIN1=</div>	
            <div>frm1701A:txtTIN2=".request('frm1701A:txtTIN2')."frm1701A:txtTIN2=</div>	
            <div>frm1701A:txtTIN3=".request('frm1701A:txtTIN3')."frm1701A:txtTIN3=</div>	
            <div>frm1701A:txtBranchCode=".request('frm1701A:txtBranchCode')."frm1701A:txtBranchCode=</div>	
            <div>frm1701A:txtRDOCode=".request('frm1701A:txtRDOCode')."frm1701A:txtRDOCode=</div>	
            <div>frm1701A:optTaxType_1=".$optTaxType_1."frm1701A:optTaxType_1=</div>	
            <div>frm1701A:optTaxType_2=".$optTaxType_2."frm1701A:optTaxType_2=</div>	
            <div>frm1701A:optATC_1=".$optATC_1."frm1701A:optATC_1=</div>	
            <div>frm1701A:optATC_2=".$optATC_2."frm1701A:optATC_2=</div>	
            <div>frm1701A:optATC_3=".$optATC_3."frm1701A:optATC_3=</div>	
            <div>frm1701A:optATC_4=".$optATC_4."frm1701A:optATC_4=</div>	
            <div>frm1701A:txtTaxpayerName=".$taxPayerName."frm1701A:txtTaxpayerName=</div>	
            <div>frm1701A:txtAddress=".$address."frm1701A:txtAddress=</div>	
            <div>frm1701A:txtZipCode=".request('frm1701A:txtZipCode')."frm1701A:txtZipCode=</div>	
            <div>frm1701A:txtBirthDate=".request('frm1701A:txtBirthDate')."frm1701A:txtBirthDate=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>frm1701A:txtCitizenship=".request('frm1701A:txtCitizenship')."frm1701A:txtCitizenship=</div>	
            <div>frm1701A:optForeignTaxCredits_1=".$optForeignTaxCredits_1."frm1701A:optForeignTaxCredits_1=</div>	
            <div>frm1701A:optForeignTaxCredits_2=".$optForeignTaxCredits_2."frm1701A:optForeignTaxCredits_2=</div>	
            <div>frm1701A:txtForeignTaxNumber=".request('frm1701A:txtForeignTaxNumber')."frm1701A:txtForeignTaxNumber=</div>	
            <div>frm1701A:txtTelNum=".request('frm1701A:txtTelNum')."frm1701A:txtTelNum=</div>	
            <div>frm1701A:optCivilStatus_1=".$optCivilStatus_1."frm1701A:optCivilStatus_1=</div>	
            <div>frm1701A:optCivilStatus_2=".$optCivilStatus_2."frm1701A:optCivilStatus_2=</div>	
            <div>frm1701A:optCivilStatus_3=".$optCivilStatus_3."frm1701A:optCivilStatus_3=</div>	
            <div>frm1701A:optCivilStatus_4=".$optCivilStatus_4."frm1701A:optCivilStatus_4=</div>	
            <div>frm1701A:optSpouseIncome_1=".$optSpouseIncome_1."frm1701A:optSpouseIncome_1=</div>	
            <div>frm1701A:optSpouseIncome_2=".$optSpouseIncome_2."frm1701A:optSpouseIncome_2=</div>	
            <div>frm1701A:optFilingStatus_1=".$optFilingStatus_1."frm1701A:optFilingStatus_1=</div>	
            <div>frm1701A:optFilingStatus_2=".$optFilingStatus_2."frm1701A:optFilingStatus_2=</div>	
            <div>frm1701A:optTaxRate_1=".$optTaxRate_1."frm1701A:optTaxRate_1=</div>	
            <div>frm1701A:optTaxRate_2=".$optTaxRate_2."frm1701A:optTaxRate_2=</div>	
            <div>frm1701A:txt20A=".request('frm1701A:txt20A')."frm1701A:txt20A=</div>	
            <div>frm1701A:txt20B=".request('frm1701A:txt20B')."frm1701A:txt20B=</div>	
            <div>frm1701A:txt21A=".request('frm1701A:txt21A')."frm1701A:txt21A=</div>	
            <div>frm1701A:txt21B=".request('frm1701A:txt21B')."frm1701A:txt21B=</div>	
            <div>frm1701A:txt22A=".request('frm1701A:txt22A')."frm1701A:txt22A=</div>	
            <div>frm1701A:txt22B=".request('frm1701A:txt22B')."frm1701A:txt22B=</div>	
            <div>frm1701A:txt23A=".request('frm1701A:txt23A')."frm1701A:txt23A=</div>	
            <div>frm1701A:txt23B=".request('frm1701A:txt23B')."frm1701A:txt23B=</div>	
            <div>frm1701A:txt24A=".request('frm1701A:txt24A')."frm1701A:txt24A=</div>	
            <div>frm1701A:txt24B=".request('frm1701A:txt24B')."frm1701A:txt24B=</div>	
            <div>frm1701A:txt25A=".request('frm1701A:txt25A')."frm1701A:txt25A=</div>	
            <div>frm1701A:txt25B=".request('frm1701A:txt25B')."frm1701A:txt25B=</div>	
            <div>frm1701A:txt26A=".request('frm1701A:txt26A')."frm1701A:txt26A=</div>	
            <div>frm1701A:txt26B=".request('frm1701A:txt26B')."frm1701A:txt26B=</div>	
            <div>frm1701A:txt27A=".request('frm1701A:txt27A')."frm1701A:txt27A=</div>	
            <div>frm1701A:txt27B=".request('frm1701A:txt27B')."frm1701A:txt27B=</div>	
            <div>frm1701A:txt28A=".request('frm1701A:txt28A')."frm1701A:txt28A=</div>	
            <div>frm1701A:txt28B=".request('frm1701A:txt28B')."frm1701A:txt28B=</div>	
            <div>frm1701A:txt29A=".request('frm1701A:txt29A')."frm1701A:txt29A=</div>	
            <div>frm1701A:txt29B=".request('frm1701A:txt29B')."frm1701A:txt29B=</div>	
            <div>frm1701A:txt30=".request('frm1701A:txt30')."frm1701A:txt30=</div>	
            <div>frm1701A:optRefund_1=".$optRefund_1."frm1701A:optRefund_1=</div>	
            <div>frm1701A:optRefund_2=".$optRefund_2."frm1701A:optRefund_2=</div>	
            <div>frm1701A:optRefund_3=".$optRefund_3."frm1701A:optRefund_3=</div>	
            <div>frm1701A:txtNumberAttachments=".request('frm1701A:txtNumberAttachments')."frm1701A:txtNumberAttachments=</div>	
            <div>frm1701A:txtAgency32=frm1701A:txtAgency32=</div>	
            <div>frm1701A:txtNumber32=frm1701A:txtNumber32=</div>	
            <div>frm1701A:txtDate32=frm1701A:txtDate32=</div>	
            <div>frm1701A:txtAmount32=frm1701A:txtAmount32=</div>	
            <div>frm1701A:txtAgency33=frm1701A:txtAgency33=</div>	
            <div>frm1701A:txtNumber33=frm1701A:txtNumber33=</div>	
            <div>frm1701A:txtDate33=frm1701A:txtDate33=</div>	
            <div>frm1701A:txtAmount33=frm1701A:txtAmount33=</div>	
            <div>frm1701A:txtNumber34=frm1701A:txtNumber34=</div>	
            <div>frm1701A:txtDate34=frm1701A:txtDate34=</div>	
            <div>frm1701A:txtAmount34=frm1701A:txtAmount34=</div>	
            <div>frm1701A:txtParticular35=frm1701A:txtParticular35=</div>	
            <div>frm1701A:txtAgency35=frm1701A:txtAgency35=</div>	
            <div>frm1701A:txtNumber35=frm1701A:txtNumber35=</div>	
            <div>frm1701A:txtDate35=frm1701A:txtDate35=</div>	
            <div>frm1701A:txtAmount35=frm1701A:txtAmount35=</div>	
            <div>frm1701A:txtPg2TIN1=".request('frm1701A:txtPg2TIN1')."frm1701A:txtPg2TIN1=</div>	
            <div>frm1701A:txtPg2TIN2=".request('frm1701A:txtPg2TIN2')."frm1701A:txtPg2TIN2=</div>	
            <div>frm1701A:txtPg2TIN3=".request('frm1701A:txtPg2TIN3')."frm1701A:txtPg2TIN3=</div>	
            <div>frm1701A:txtPg2BranchCode=".request('frm1701A:txtPg2BranchCode')."frm1701A:txtPg2BranchCode=</div>	
            <div>frm1701A:txtPg2TaxpayerName=".request('frm1701A:txtPg2TaxpayerName')."frm1701A:txtPg2TaxpayerName=</div>	
            <div>frm1701A:txt36A=".request('frm1701A:txt36A')."frm1701A:txt36A=</div>	
            <div>frm1701A:txt36B=".request('frm1701A:txt36B')."frm1701A:txt36B=</div>	
            <div>frm1701A:txt37A=".request('frm1701A:txt37A')."frm1701A:txt37A=</div>	
            <div>frm1701A:txt37B=".request('frm1701A:txt37B')."frm1701A:txt37B=</div>	
            <div>frm1701A:txt38A=".request('frm1701A:txt38A')."frm1701A:txt38A=</div>	
            <div>frm1701A:txt38B=".request('frm1701A:txt38B')."frm1701A:txt38B=</div>	
            <div>frm1701A:txt39A=".request('frm1701A:txt39A')."frm1701A:txt39A=</div>	
            <div>frm1701A:txt39B=".request('frm1701A:txt39B')."frm1701A:txt39B=</div>	
            <div>frm1701A:txt40A=".request('frm1701A:txt40A')."frm1701A:txt40A=</div>	
            <div>frm1701A:txt40B=".request('frm1701A:txt40B')."frm1701A:txt40B=</div>	
            <div>frm1701A:txt41Desc=".request('frm1701A:txt41Desc')."frm1701A:txt41Desc=</div>	
            <div>frm1701A:txt41A=".request('frm1701A:txt41A')."frm1701A:txt41A=</div>	
            <div>frm1701A:txt41B=".request('frm1701A:txt41B')."frm1701A:txt41B=</div>	
            <div>frm1701A:txt42Desc=".request('frm1701A:txt42Desc')."frm1701A:txt42Desc=</div>	
            <div>frm1701A:txt42A=".request('frm1701A:txt42A')."frm1701A:txt42A=</div>	
            <div>frm1701A:txt42B=".request('frm1701A:txt42B')."frm1701A:txt42B=</div>	
            <div>frm1701A:txt43A=".request('frm1701A:txt43A')."frm1701A:txt43A=</div>	
            <div>frm1701A:txt43B=".request('frm1701A:txt43B')."frm1701A:txt43B=</div>	
            <div>frm1701A:txt44A=".request('frm1701A:txt44A')."frm1701A:txt44A=</div>	
            <div>frm1701A:txt44B=".request('frm1701A:txt44B')."frm1701A:txt44B=</div>	
            <div>frm1701A:txt45A=".request('frm1701A:txt45A')."frm1701A:txt45A=</div>	
            <div>frm1701A:txt45B=".request('frm1701A:txt45B')."frm1701A:txt45B=</div>	
            <div>frm1701A:txt46A=".request('frm1701A:txt46A')."frm1701A:txt46A=</div>	
            <div>frm1701A:txt46B=".request('frm1701A:txt46B')."frm1701A:txt46B=</div>	
            <div>frm1701A:txt47A=".request('frm1701A:txt47A')."frm1701A:txt47A=</div>	
            <div>frm1701A:txt47B=".request('frm1701A:txt47B')."frm1701A:txt47B=</div>	
            <div>frm1701A:txt48A=".request('frm1701A:txt48A')."frm1701A:txt48A=</div>	
            <div>frm1701A:txt48B=".request('frm1701A:txt48B')."frm1701A:txt48B=</div>	
            <div>frm1701A:txt49A=".request('frm1701A:txt49A')."frm1701A:txt49A=</div>	
            <div>frm1701A:txt49B=".request('frm1701A:txt49B')."frm1701A:txt49B=</div>	
            <div>frm1701A:txt50Desc=".request('frm1701A:txt50Desc')."frm1701A:txt50Desc=</div>	
            <div>frm1701A:txt50A=".request('frm1701A:txt50A')."frm1701A:txt50A=</div>	
            <div>frm1701A:txt50B=".request('frm1701A:txt50B')."frm1701A:txt50B=</div>	
            <div>frm1701A:txt51Desc=".request('frm1701A:txt51Desc')."frm1701A:txt51Desc=</div>	
            <div>frm1701A:txt51A=".request('frm1701A:txt51A')."frm1701A:txt51A=</div>	
            <div>frm1701A:txt51B=".request('frm1701A:txt51B')."frm1701A:txt51B=</div>	
            <div>frm1701A:txt52A=".request('frm1701A:txt52A')."frm1701A:txt52A=</div>	
            <div>frm1701A:txt52B=".request('frm1701A:txt52B')."frm1701A:txt52B=</div>	
            <div>frm1701A:txt53A=".request('frm1701A:txt53A')."frm1701A:txt53A=</div>	
            <div>frm1701A:txt53B=".request('frm1701A:txt53B')."frm1701A:txt53B=</div>	
            <div>frm1701A:txt54A=".request('frm1701A:txt54A')."frm1701A:txt54A=</div>	
            <div>frm1701A:txt54B=".request('frm1701A:txt54B')."frm1701A:txt54B=</div>	
            <div>frm1701A:txt55A=".request('frm1701A:txt55A')."frm1701A:txt55A=</div>	
            <div>frm1701A:txt55B=".request('frm1701A:txt55B')."frm1701A:txt55B=</div>	
            <div>frm1701A:txt56A=".request('frm1701A:txt56A')."frm1701A:txt56A=</div>	
            <div>frm1701A:txt56B=".request('frm1701A:txt56B')."frm1701A:txt56B=</div>	
            <div>frm1701A:txt57A=".request('frm1701A:txt57A')."frm1701A:txt57A=</div>	
            <div>frm1701A:txt57B=".request('frm1701A:txt57B')."frm1701A:txt57B=</div>	
            <div>frm1701A:txt58A=".request('frm1701A:txt58A')."frm1701A:txt58A=</div>	
            <div>frm1701A:txt58B=".request('frm1701A:txt58B')."frm1701A:txt58B=</div>	
            <div>frm1701A:txt59A=".request('frm1701A:txt59A')."frm1701A:txt59A=</div>	
            <div>frm1701A:txt59B=".request('frm1701A:txt59B')."frm1701A:txt59B=</div>	
            <div>frm1701A:txt60A=".request('frm1701A:txt60A')."frm1701A:txt60A=</div>	
            <div>frm1701A:txt60B=".request('frm1701A:txt60B')."frm1701A:txt60B=</div>	
            <div>frm1701A:txt61A=".request('frm1701A:txt61A')."frm1701A:txt61A=</div>	
            <div>frm1701A:txt61B=".request('frm1701A:txt61B')."frm1701A:txt61B=</div>	
            <div>frm1701A:txt62A=".request('frm1701A:txt62A')."frm1701A:txt62A=</div>	
            <div>frm1701A:txt62B=".request('frm1701A:txt62B')."frm1701A:txt62B=</div>	
            <div>frm1701A:txt63Desc=".request('frm1701A:txt63Desc')."frm1701A:txt63Desc=</div>	
            <div>frm1701A:txt63A=".request('frm1701A:txt63A')."frm1701A:txt63A=</div>	
            <div>frm1701A:txt63B=".request('frm1701A:txt63B')."frm1701A:txt63B=</div>	
            <div>frm1701A:txt64A=".request('frm1701A:txt64A')."frm1701A:txt64A=</div>	
            <div>frm1701A:txt64B=".request('frm1701A:txt64B')."frm1701A:txt64B=</div>	
            <div>frm1701A:txt65A=".request('frm1701A:txt65A')."frm1701A:txt65A=</div>	
            <div>frm1701A:txt65B=".request('frm1701A:txt65B')."frm1701A:txt65B=</div>	
            <div>frm1701A:txtSpouseTIN1=".request('frm1701A:txtSpouseTIN1')."frm1701A:txtSpouseTIN1=</div>	
            <div>frm1701A:txtSpouseTIN2=".request('frm1701A:txtSpouseTIN2')."frm1701A:txtSpouseTIN2=</div>	
            <div>frm1701A:txtSpouseTIN3=".request('frm1701A:txtSpouseTIN3')."frm1701A:txtSpouseTIN3=</div>	
            <div>frm1701A:txtSpouseBranchCode=".request('frm1701A:txtSpouseBranchCode')."frm1701A:txtSpouseBranchCode=</div>	
            <div>frm1701A:txtSpouseRDOCode=".request('frm1701A:txtSpouseRDOCode')."frm1701A:txtSpouseRDOCode=</div>	
            <div>frm1701A:optSpouseTaxType_1=".$optSpouseTaxType_1."frm1701A:optSpouseTaxType_1=</div>	
            <div>frm1701A:optSpouseTaxType_2=".$optSpouseTaxType_2."frm1701A:optSpouseTaxType_2=</div>	
            <div>frm1701A:optSpouseATC_1=".$optSpouseATC_1."frm1701A:optSpouseATC_1=</div>	
            <div>frm1701A:optSpouseATC_2=".$optSpouseATC_2."frm1701A:optSpouseATC_2=</div>	
            <div>frm1701A:optSpouseATC_3=".$optSpouseATC_3."frm1701A:optSpouseATC_3=</div>	
            <div>frm1701A:optSpouseATC_4=".$optSpouseATC_4."frm1701A:optSpouseATC_4=</div>	
            <div>frm1701A:txtSpouseName=".request('frm1701A:txtSpouseName')."frm1701A:txtSpouseName=</div>	
            <div>frm1701A:txtSpouseTelNum=".request('frm1701A:txtSpouseTelNum')."frm1701A:txtSpouseTelNum=</div>	
            <div>frm1701A:txtSpouseCitizenship=".request('frm1701A:txtSpouseCitizenship')."frm1701A:txtSpouseCitizenship=</div>	
            <div>frm1701A:optSpouseFTC_1=".$optSpouseFTC_1."frm1701A:optSpouseFTC_1=</div>	
            <div>frm1701A:optSpouseFTC_2=".$optSpouseFTC_2."frm1701A:optSpouseFTC_2=</div>	
            <div>frm1701A:txtSpouseFTN=".request('frm1701A:txtSpouseFTN')."frm1701A:txtSpouseFTN=</div>	
            <div>frm1701A:optSpouseTaxRate_1=".$optSpouseTaxRate_1."frm1701A:optSpouseTaxRate_1=</div>	
            <div>frm1701A:optSpouseTaxRate_2=".$optSpouseTaxRate_2."frm1701A:optSpouseTaxRate_2=</div>	
            <div>frm1701A:txtCurrentPage=1frm1701A:txtCurrentPage=</div>	
            <div>frm1701A:txtMaxPage=2frm1701A:txtMaxPage=</div>	
            <div>frm1701A:txtLineBus=".request('frm1701A:txtLineBus')."frm1701A:txtLineBus=</div>	
            <div>frm1701A:txtCtrmodalPartIVA=".request('partIVAModalLayout()')."frm1701A:txtCtrmodalPartIVA=</div>	
            <div>frm1701A:txtCtrmodalPartIVB=".request('partIVBModalLayout()')."frm1701A:txtCtrmodalPartIVB=</div>	
            <div>frm1701A:txtZIP=".request('frm1701A:Zip')."frm1701A:txtZIP=</div>	
            <div>frm1701A:txtEnabledInputsOnValidation=".request('frm1701A:txtEnabledInputsOnValidation')."frm1701A:txtEnabledInputsOnValidation=</div>	
            <div>frm1701A:txtDisabledInputs=".request('frm1701A:txtDisabledInputs')."frm1701A:txtDisabledInputs=</div>	
            <div>frm1701A:txtEnabledLinks=".request('frm1701A:txtEnabledLinks')."frm1701A:txtEnabledLinks=</div>	
            <div>frm1701A:txtIsSpouseDisabled=".request('frm1701A:txtIsSpouseDisabled')."frm1701A:txtIsSpouseDisabled=</div>	
            <div>frm1701A:txtIsTaxFilerDisabled=".request('frm1701A:txtIsTaxFilerDisabled')."frm1701A:txtIsTaxFilerDisabled=</div>	
            <div>frm1701A:txtAttachmentTypes=".request('frm1701A:txtAttachmentTypes')."frm1701A:txtAttachmentTypes=</div>	
            <div>frm1701A:txtTIN4=".request('frm1701A:txtTIN4')."frm1701A:txtTIN4=</div>	
            <div>frm1701A:txtDisabledOnSave=".request('frm1701A:txtDisabledOnSave')."frm1701A:txtDisabledOnSave=</div>	
            <div>frm1701A:txtEnabledOnSave=".request('frm1701A:txtEnabledOnSave')."frm1701A:txtEnabledOnSave=</div>	
            <div>frm1701A:txtVersion=".request('frm1701A:txtVersion')."frm1701A:txtVersion=</div>	
            <div>frm1701A:txtdisabledID=".request('frm1701A:txtdisabledID')."frm1701A:txtdisabledID=</div>	
            ".$modal1."<div>frm1701A:txtmodalPartIVA_C1=".request('frm1701A:txtmodalPartIVA_C1')."frm1701A:txtmodalPartIVA_C1=</div>	
            <div>frm1701A:txtmodalPartIVA_C2=".request('frm1701A:txtmodalPartIVA_C2')."frm1701A:txtmodalPartIVA_C2=</div>	
            ".$modal2."<div>frm1701A:txtmodalPartIVB_C1=".request('frm1701A:txtmodalPartIVB_C1')."frm1701A:txtmodalPartIVB_C1=</div>	
            <div>frm1701A:txtmodalPartIVB_C2=".request('frm1701A:txtmodalPartIVB_C2')."frm1701A:txtmodalPartIVB_C2=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            	
            All Rights Reserved BIR 2014.";

        $tin = request('frm1701A:txtTIN1').request('frm1701A:txtTIN2').request('frm1701A:txtTIN3').request('frm1701A:txtBranchCode');

        $getReturnPeriod = tbl_1701A::where('company_id',  request('company'))
                            ->where('item1A', request('frm1701A:txtMonth'))
                            ->where('item1B', request('frm1701A:txtYear'))
                            ->count();

       	$returnPeriod = request('frm1701A:txtMonth')."/".request('frm1701A:txtYear');
                           
	        if($getReturnPeriod == "1"){
	            $xmlReturnPeriod = request('frm1701A:txtMonth').request('frm1701A:txtYear');
	        }else{
	            if(request('form_id') != ""){
	                    $getXml = Xml::where('user_id', Auth::user()->id)
	                            ->where('company_id', request('company'))
	                            ->where('form_id', $form->id)
	                            ->where('form', '1701A')
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

	            $xmlReturnPeriod = request('frm1701A:txtMonth').request('frm1701A:txtYear').$ext;
	        }
	        $filename = $tin."-1701A-".$xmlReturnPeriod.'.xml';

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
                'form'          => '1701A',
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
                            ->where('form', '1701A')
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
                            ->where('form', '1701A')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1701A::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1701A')
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
        $data = tbl_1701A::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1701A')
                            ->get();
        
        return view('forms.BIR-Form 1701A',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

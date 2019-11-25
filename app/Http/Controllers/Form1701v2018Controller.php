<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1701_1;
use App\tbl_1701_2;
use App\tbl_1701_3;
use App\tbl_1701_4;
use App\tbl_1701_attachments;
use App\tbl_1701_scheduleA_1;
use App\tbl_1701_scheduleB_1;
use App\tbl_1701_scheduleC_2;
use App\tbl_1701_scheduleD_2;
use App\tbl_1701_schedule3;
use App\tbl_1701_scheduleD_4;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1701v2018Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);

    	if($action == 'new'){

    		if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1701_1s')){

            }else{
               Schema::connection('mysql2')->create('tbl_1701_1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1')->nullable();
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
                    $table->string('item20')->nullable();
                    $table->string('item21')->nullable();
                    $table->string('item21A')->nullable();
                    $table->text('item22A');
                    $table->text('item22B');
                    $table->text('item23A');
                    $table->text('item23B');
                    $table->text('item24A');
                    $table->text('item24B');
                    $table->text('item25A');
                    $table->text('item25B');
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
                    $table->text('item31A');
                    $table->text('item31B');
                    $table->text('item32');
                    $table->text('overpayment')->nullable();
                    $table->timestamps();
                });

               Schema::connection('mysql2')->create('tbl_1701_2s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item1C')->nullable();
                    $table->string('item1D')->nullable();
                    $table->string('item2')->nullable();
                    $table->string('item3')->nullable();
                    $table->string('item4')->nullable();
                    $table->string('item5')->nullable();
                    $table->string('item6')->nullable();
                    $table->string('item7')->nullable();
                    $table->string('item8')->nullable();
                    $table->string('item9')->nullable();
                    $table->string('item10')->nullable();
                    $table->string('item11')->nullable();
                    $table->string('item12')->nullable();
                    $table->string('item12A')->nullable();
                    $table->text('sched1_taxpayer1')->nullable();
                    $table->text('sched1_spouse1')->nullable();
                    $table->text('sched1_tinA1')->nullable();
                    $table->text('sched1_tinB1')->nullable();
                    $table->text('sched1_tinC1')->nullable();
                    $table->text('sched1_tinD1')->nullable();
                    $table->text('sched1_income1')->nullable();
                    $table->text('sched1_withheld1')->nullable();
                    $table->text('sched1_taxpayer2')->nullable();
                    $table->text('sched1_spouse2')->nullable();
                    $table->text('sched1_tinA2')->nullable();
                    $table->text('sched1_tinB2')->nullable();
                    $table->text('sched1_tinC2')->nullable();
                    $table->text('sched1_tinD2')->nullable();
                    $table->text('sched1_income2');
                    $table->text('sched1_withheld2');
                    $table->text('sched1_income_3A');
                    $table->text('sched1_withheld_3A');
                    $table->text('sched1_income_3B');
                    $table->text('sched1_withheld_3B');
                    $table->text('sched2_4A');
                    $table->text('sched2_4B');
                    $table->text('sched2_5A');
                    $table->text('sched2_5B');
                    $table->text('sched2_6A');
                    $table->text('sched2_6B');
                    $table->text('sched2_7A');
                    $table->text('sched2_7B');
                    $table->text('sched3_8A');
                    $table->text('sched3_8B');
                    $table->text('sched3_9A');
                    $table->text('sched3_9B');
                    $table->text('sched3_10A');
                    $table->text('sched3_10B');
                    $table->text('sched3_11A');
                    $table->text('sched3_11B');
                    $table->text('sched3_12A');
                    $table->text('sched3_12B');
                    $table->text('sched3_13A');
                    $table->text('sched3_13B');
                    $table->text('sched3_14A');
                    $table->text('sched3_14B');
                    $table->text('sched3_15A');
                    $table->text('sched3_15B');
                    $table->text('sched3_16A');
                    $table->text('sched3_16B');
                    $table->text('sched3_17A');
                    $table->text('sched3_17B');
                    $table->text('sched3_18A');
                    $table->text('sched3_18B');
                    $table->text('sched3_19A')->nullable();
                    $table->text('sched3_19B');
                    $table->text('sched3_19C');
                    $table->text('sched3_20A')->nullable();
                    $table->text('sched3_20B');
                    $table->text('sched3_20C');
                    $table->text('sched3_21A');
                    $table->text('sched3_21B');
                    $table->text('sched3_22A');
                    $table->text('sched3_22B');
                    $table->text('sched3_23A');
                    $table->text('sched3_23B');
                    $table->text('sched3_24A');
                    $table->text('sched3_24B');
                    $table->text('sched3_25A');
                    $table->text('sched3_25B');
                    $table->timestamps();
                });

			Schema::connection('mysql2')->create('tbl_1701_3s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('sched3_26A');
                    $table->text('sched3_26B');
                    $table->text('sched3_27A')->nullable();
                    $table->text('sched3_27B');
                    $table->text('sched3_27C');
                    $table->text('sched3_28A');
                    $table->text('sched3_28B');
                    $table->text('sched3_29A');
                    $table->text('sched3_29B');
                    $table->text('sched3_30A');
                    $table->text('sched3_30B');
                    $table->text('sched3_31A');
                    $table->text('sched3_31B');
                    $table->text('sched3_32A');
                    $table->text('sched3_32B');
                    $table->text('sched4_1A');
                    $table->text('sched4_1B');
                    $table->text('sched4_2A');
                    $table->text('sched4_2B');
                    $table->text('sched4_3A');
                    $table->text('sched4_3B');
                    $table->text('sched4_4A');
                    $table->text('sched4_4B');
                    $table->text('sched4_5A');
                    $table->text('sched4_5B');
                    $table->text('sched4_6A');
                    $table->text('sched4_6B');
                    $table->text('sched4_7A');
                    $table->text('sched4_7B');
                    $table->text('sched4_8A');
                    $table->text('sched4_8B');
                    $table->text('sched4_9A');
                    $table->text('sched4_9B');
                    $table->text('sched4_10A');
                    $table->text('sched4_10B');
                    $table->text('sched4_11A');
                    $table->text('sched4_11B');
                    $table->text('sched4_12A');
                    $table->text('sched4_12B');
                    $table->text('sched4_13A');
                    $table->text('sched4_13B');
                    $table->text('sched4_14A');
                    $table->text('sched4_14B');
                    $table->text('sched4_15A');
                    $table->text('sched4_15B');
                    $table->text('sched4_16A');
                    $table->text('sched4_16B');
                    $table->text('sched4_17A_1');
                    $table->text('sched4_17A_2');
                    $table->text('sched4_17B_1');
                    $table->text('sched4_17B_2');
                    $table->text('sched4_17C_1');
                    $table->text('sched4_17C_2');
                    $table->text('sched4_17D_1')->nullable();
                    $table->text('sched4_17D_2');
                    $table->text('sched4_17D_3');
                    $table->text('sched4_18A');
                    $table->text('sched4_18B');
                    $table->text('sched5A_desc1')->nullable();
                    $table->text('sched5A_legal1');
                    $table->text('sched5A_amount1');
                    $table->text('sched5A_desc2')->nullable();
                    $table->text('sched5A_legal2');
                    $table->text('sched5A_amount2');
                    $table->text('sched5A_total3');
                    $table->text('sched5B_desc4')->nullable();
                    $table->text('sched5B_legal4');
                    $table->text('sched5B_amount4');
                    $table->text('sched5B_desc5')->nullable();
                    $table->text('sched5B_legal5');
                    $table->text('sched5B_amount5');
                    $table->text('sched5B_total6');
                    $table->text('sched6_taxpayer1A');
                    $table->text('sched6_spouse1B');
                    $table->text('sched6_taxpayer2A');
                    $table->text('sched6_spouse2B');
                    $table->text('sched6_taxpayer3A');
                    $table->text('sched6_spouse3B');
                    $table->text('sched6_year4')->nullable();
                    $table->text('sched6_4A');
                    $table->text('sched6_4B');
                    $table->text('sched6_4C');
                    $table->text('sched6_4D');
                    $table->text('sched6_4E');
                    $table->text('sched6_year5')->nullable();	
                    $table->text('sched6_5A');
                    $table->text('sched6_5B');
                    $table->text('sched6_5C');
                    $table->text('sched6_5D');
                    $table->text('sched6_5E');
                    $table->text('sched6_year6')->nullable();
                    $table->text('sched6_6A');
                    $table->text('sched6_6B');
                    $table->text('sched6_6C');
                    $table->text('sched6_6D');
                    $table->text('sched6_6E');
                    $table->text('sched6_year7')->nullable();
                    $table->text('sched6_7A');
                    $table->text('sched6_7B');
                    $table->text('sched6_7C');
                    $table->text('sched6_7D');
                    $table->text('sched6_7E');
                    $table->text('sched6_8');
                    $table->timestamps();
                });

			Schema::connection('mysql2')->create('tbl_1701_4s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('sched6_year9')->nullable();
                    $table->text('sched6_9A');
                    $table->text('sched6_9B');
                    $table->text('sched6_9C');
                    $table->text('sched6_9D');
                    $table->text('sched6_9E');
                    $table->text('sched6_year10')->nullable();
                    $table->text('sched6_10A');
                    $table->text('sched6_10B');
                    $table->text('sched6_10C');
                    $table->text('sched6_10D');
                    $table->text('sched6_10E');
                    $table->text('sched6_year11')->nullable();
                    $table->text('sched6_11A');
                    $table->text('sched6_11B');
                    $table->text('sched6_11C');
                    $table->text('sched6_11D');
                    $table->text('sched6_11E');
                    $table->text('sched6_year12')->nullable();
                    $table->text('sched6_12A');
                    $table->text('sched6_12B');
                    $table->text('sched6_12C');
                    $table->text('sched6_12D');
                    $table->text('sched6_12E');
                    $table->text('sched6_13');
                    $table->text('item6_1A');
                    $table->text('item6_1B');
                    $table->text('item6_2A');
                    $table->text('item6_2B');
                    $table->text('item6_3A');
                    $table->text('item6_3B');
                    $table->text('item6_4A');
                    $table->text('item6_4B');
                    $table->text('item6_5A');
                    $table->text('item6_5B');
                    $table->text('item7_1A');
                    $table->text('item7_1B');
                    $table->text('item7_2A');
                    $table->text('item7_2B');
                    $table->text('item7_3A');
                    $table->text('item7_3B');
                    $table->text('item7_4A');
                    $table->text('item7_4B');
                    $table->text('item7_5A');
                    $table->text('item7_5B');
                    $table->text('item7_6A');
                    $table->text('item7_6B');
                    $table->text('item7_7A');
                    $table->text('item7_7B');
                    $table->text('item7_8A');
                    $table->text('item7_8B');
                    $table->text('item7_9A')->nullable();
                    $table->text('item7_9B');
                    $table->text('item7_9C');
                    $table->text('item7_10A');
                    $table->text('item7_10B');
                    $table->text('item8_1A');
                    $table->text('item8_1B');
                    $table->text('item8_2A');
                    $table->text('item8_2B');
                    $table->text('item8_3A');
                    $table->text('item8_3B');
                    $table->text('item8_4A');
                    $table->text('item8_4B');
                    $table->text('item8_5A');
                    $table->text('item8_5B');
                    $table->text('item8_6A');
                    $table->text('item8_6B');
                    $table->text('item8_7A');
                    $table->text('item8_7B');
                    $table->text('item8_8A');
                    $table->text('item8_8B');
                    $table->text('item8_9A');
                    $table->text('item8_9B');
                    $table->text('item8_10A');
                    $table->text('item8_10B');
                    $table->text('item9_1A');
                    $table->text('item9_1B');
                    $table->text('item9_2A')->nullable();
                    $table->text('item9_2B');
                    $table->text('item9_2C');
                    $table->text('item9_3A')->nullable();
                    $table->text('item9_3B');
                    $table->text('item9_3C');
                    $table->text('item9_4A')->nullable();
                    $table->text('item9_4B');
                    $table->text('item9_4C');
                    $table->text('item9_5A');
                    $table->text('item9_5B');
                    $table->text('item9_6A')->nullable();
                    $table->text('item9_6B');
                    $table->text('item9_6C');
                    $table->text('item9_7A')->nullable();
                    $table->text('item9_7B');
                    $table->text('item9_7C');
                    $table->text('item9_8A')->nullable();
                    $table->text('item9_8B');
                    $table->text('item9_8C');
                    $table->text('item9_9A')->nullable();
                    $table->text('item9_9B');
                    $table->text('item9_9C');
                    $table->text('item9_10A');
                    $table->text('item9_10B');
                    $table->text('item9_11A');
                    $table->text('item9_11B');
                    $table->timestamps();
                });
               
               Schema::connection('mysql2')->create('tbl_1701_attachments', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('page1_tax_regime')->nullable();
                    $table->text('scheduleA_item4B')->nullable();
                    $table->text('scheduleA_item4E')->nullable();
                    $table->text('scheduleB_item12')->nullable();
                    $table->text('scheduleB_item13')->nullable();
                    $table->text('scheduleC_item17D_description')->nullable();
                    $table->text('scheduleD_totalA')->nullable();
                    $table->text('scheduleD_totalB')->nullable();
                    $table->text('tax_regime')->nullable();
                    $table->text('page3_item10')->nullable();
                    $table->text('page3_item11')->nullable();
                    $table->text('page4_item17D')->nullable();
                    $table->text('page4_item5')->nullable();
                    $table->text('page4_item10')->nullable();
                    $table->timestamps();
               });

               Schema::connection('mysql2')->create('tbl_1701_schedule_a_1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->text('itemE')->nullable();
                    $table->text('itemF')->nullable();
                    $table->timestamps();
               });

               Schema::connection('mysql2')->create('tbl_1701_schedule_b_1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->text('itemE')->nullable();
                    $table->text('itemF')->nullable();
                    $table->text('itemG')->nullable();
                    $table->text('itemH')->nullable();
                    $table->timestamps();
               });

               Schema::connection('mysql2')->create('tbl_1701_schedule_c_2s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->timestamps();
               });

               Schema::connection('mysql2')->create('tbl_1701_schedule_d_2s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('description')->nullable();
                    $table->text('legal')->nullable();
                    $table->text('taxpayer')->nullable();
                    $table->text('spouse')->nullable();
                    $table->timestamps();
               });

               Schema::connection('mysql2')->create('tbl_1701_schedule3s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('taxpayer')->nullable();
                    $table->text('spouse')->nullable();
                    $table->timestamps();
               });

               Schema::connection('mysql2')->create('tbl_1701_schedule_d_4s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('description')->nullable();
                    $table->text('legal_basis')->nullable();
                    $table->text('amount')->nullable();
                    $table->timestamps();
               });
            }
    		return view('forms.BIR-Form 1701v2018',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
    	}else{
    		$data = tbl_1701_1::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1701v2018')
                            ->get();
            return view('forms.BIR-Form 1701v2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }

    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	$data1 = ([
    		'form_no'   => request('form_no'),
			'company_id'   => request('company'),
			'item1'   => request('frm1701:txtPg1I1Year'),
			'item2'   => request('frm1701:rdoPg1I2Amended'),
			'item3'   => request('frm1701:rdoPg1I3ShortPeriod'),
			'item6'   => null !== request('frm1701:rdoPg1I6TaxpayerType') ? request('frm1701:rdoPg1I6TaxpayerType') : '',
			'item7'   => null !== request('frm1701:rdoPg1I7ATC') ? request('frm1701:rdoPg1I7ATC') : '',
			'item10'   => request('frm1701:txtPg1I10BirthDate'),
			'item12'   => request('frm1701:txtPg1I12Citizenship'),
			'item13'   => request('frm1701:rdoPg1I13ForeignTaxCredits'),
			'item14'   => request('frm1701:txtPg1I14ForeignTaxNumber'),
			'item16'   => null !== request('frm1701:rdoPg1I16CivilStatus') ? request('frm1701:rdoPg1I16CivilStatus') : '',
			'item17'   => request('frm1701:rdoPg1I17SpouseIncome'),
			'item18'   => null !== request('frm1701:rdoPg1I18FilingStatus') ? request('frm1701:rdoPg1I18FilingStatus') : '',
			'item19'   => null !== request('frm1701:rdoPg1I19IncomeExempt') ? request('frm1701:rdoPg1I19IncomeExempt') : '',
			'item20'   => null !== request('frm1701:rdoPg1I20IncomeSpecial') ? request('frm1701:rdoPg1I20IncomeSpecial') : '',
			'item21'   => null !== request('frm1701:rdoPg1I21TaxRate') ? request('frm1701:rdoPg1I21TaxRate') : '',
			'item21A'   => null !== request('frm1701:rdoPg1I21AMethodDeduction') ? request('frm1701:rdoPg1I21AMethodDeduction') : '',
			'item22A'   => request('frm1701:txtPg1I22ATaxDue'),
			'item22B'   => request('frm1701:txtPg1I22BTaxDue'),
			'item23A'   => request('frm1701:txtPg1I23A'),
			'item23B'   => request('frm1701:txtPg1I23B'),
			'item24A'   => request('frm1701:txtPg1I24ATaxPayable'),
			'item24B'   => request('frm1701:txtPg1I24BTaxPayable'),
			'item25A'   => request('frm1701:txtPg1I25A'),
			'item25B'   => request('frm1701:txtPg1I25B'),
			'item26A'   => request('frm1701:txtPg1I26A'),
			'item26B'   => request('frm1701:txtPg1I26B'),
			'item27A'   => request('frm1701:txtPg1I27A'),
			'item27B'   => request('frm1701:txtPg1I27B'),
			'item28A'   => request('frm1701:txtPg1I28A'),
			'item28B'   => request('frm1701:txtPg1I28B'),
			'item29A'   => request('frm1701:txtPg1I29A'),
			'item29B'   => request('frm1701:txtPg1I29B'),
			'item30A'   => request('frm1701:txtPg1I30A'),
			'item30B'   => request('frm1701:txtPg1I30B'),
			'item31A'   => request('frm1701:txtPg1I31ATotalAmtPyble'),
			'item31B'   => request('frm1701:txtPg1I31BTotalAmtPyble'),
			'item32'   => request('frm1701:txtPg1I32AggregateAmtPyble'),
			'overpayment'   => null !== request('frm1701:rdoPg1Overpayment') ? request('frm1701:rdoPg1Overpayment') : '',

    	]);

    	     $getForm = tbl_1701_1::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();
     	$trans = "";
          $form = "";
          if(request('form_id') != ""){
            $form = tbl_1701_1::find(request('form_id'));
            $form->update($data1);
            $trans = "update";
          }else{
            if($getForm->isEmpty()){
                $form = tbl_1701_1::create($data1);
            }else{
                $form = tbl_1701_1::find($getForm[0]->id);
                $form->update($data1);
                $trans = "update";
            }
          }

          if($trans == "update"){
               tbl_1701_scheduleA_1::where('form_id', $getForm[0]->id)->delete();
               tbl_1701_scheduleB_1::where('form_id', $getForm[0]->id)->delete();
               tbl_1701_scheduleC_2::where('form_id', $getForm[0]->id)->delete();
               tbl_1701_scheduleD_2::where('form_id', $getForm[0]->id)->delete();
               tbl_1701_schedule3::where('form_id', $getForm[0]->id)->delete();
               tbl_1701_scheduleD_4::where('form_id', $getForm[0]->id)->delete();
          }

         	$data2 = ([
         		'form_id'     => $form->id,
     			'item1A'     => request('frm1701:txtPg2I1TIN1'),
     			'item1B'     => request('frm1701:txtPg2I1TIN2'),
     			'item1C'     => request('frm1701:txtPg2I1TIN3'),
     			'item1D'     => request('frm1701:txtPg2I1BranchCode'),
     			'item2'     => request('frm1701:txtPg2I2SpouseRDOCode'),
     			'item3'     => null !== request('frm1701:rdoPg2I3SpouseType') ? request('frm1701:rdoPg2I3SpouseType') : '',
     			'item4'     => null !== request('frm1701:rdoPg2I4ATC') ? request('frm1701:rdoPg2I4ATC') : '',
     			'item5'     => request('frm1701:txtPg2I5SpouseName'),
     			'item6'     => request('frm1701:txtPg2I6TelNum'),
     			'item7'     => request('frm1701:txtPg2I7Citizenship'),
     			'item8'     => null !== request('frm1701:rdoPg2I8ForeignTaxCredits') ? request('frm1701:rdoPg2I8ForeignTaxCredits') : '',
     			'item9'     => request('frm1701:txtPg2I9ForeignTaxNumber'),
     			'item10'     => null !== request('frm1701:rdoPg2I10IncomeExempt') ? request('frm1701:rdoPg2I10IncomeExempt') : '',
     			'item11'     => null !== request('frm1701:rdoPg2I11IncomeSpecial') ? request('frm1701:rdoPg2I11IncomeSpecial') : '',
     			'item12'     => null !== request('frm1701:rdoPg2I12TaxRate') ? request('frm1701:rdoPg2I12TaxRate') : '',
     			'item12A'     => null !== request('frm1701:rdoPg2I12AMethodDeduction') ? request('frm1701:rdoPg2I12AMethodDeduction') : '',
     			'sched1_taxpayer1'     => request('frm1701:txtPg2IShed1a_1TPName'),
     			'sched1_spouse1'     => request('frm1701:txtPg2IShed1a_1SName'),
     			'sched1_tinA1'     => request('frm1701:txtPg2IShed1a_TIN1'),
     			'sched1_tinB1'     => request('frm1701:txtPg2IShed1a_TIN2'),
     			'sched1_tinC1'     => request('frm1701:txtPg2IShed1a_TIN3'),
     			'sched1_tinD1'     => request('frm1701:txtPg2IShed1a_BranchCode'),
     			'sched1_income1'     => request('frm1701:txtPg2IShed1c_1CI'),
     			'sched1_withheld1'     => request('frm1701:txtPg2IShed1c_1TW'),
     			'sched1_taxpayer2'     => request('rm1701:txtPg2IShed2a_2TPName'),
     			'sched1_spouse2'     => request('frm1701:txtPg2IShed2a_2SName'),
     			'sched1_tinA2'     => request('frm1701:txtPg2IShed2a_TIN1'),
     			'sched1_tinB2'     => request('frm1701:txtPg2IShed2a_TIN2'),
     			'sched1_tinC2'     => request('frm1701:txtPg2IShed2a_TIN3'),
     			'sched1_tinD2'     => request('frm1701:txtPg2IShed2a_BranchCode'),
     			'sched1_income2'     => request('frm1701:txtPg2IShed1c_2CI'),
     			'sched1_withheld2'     => request('frm1701:txtPg2IShed1c_2TW'),
     			'sched1_income_3A'     => request('frm1701:txtPg2IShed1c_3ACI'),
     			'sched1_withheld_3A'     => request('frm1701:txtPg2IShed1c_3ATW'),
     			'sched1_income_3B'     => request('frm1701:txtPg2IShed1c_3BCI'),
     			'sched1_withheld_3B'     => request('frm1701:txtPg2IShed1c_3BTW'),
     			'sched2_4A'     => request('frm1701:txtPg2IShed2_4A'),
     			'sched2_4B'     => request('frm1701:txtPg2IShed2_4B'),
     			'sched2_5A'     => request('frm1701:txtPg2IShed2_5A'),
     			'sched2_5B'     => request('frm1701:txtPg2IShed2_5B'),
     			'sched2_6A'     => request('frm1701:txtPg2IShed2_6A'),
     			'sched2_6B'     => request('frm1701:txtPg2IShed2_6B'),
     			'sched2_7A'     => request('frm1701:txtPg2IShed2_7A'),
     			'sched2_7B'     => request('frm1701:txtPg2IShed2_7B'),
     			'sched3_8A'     => request('frm1701:txtPg2IShed3_8A'),
     			'sched3_8B'     => request('frm1701:txtPg2IShed3_8B'),
     			'sched3_9A'     => request('frm1701:txtPg2IShed3_9A'),
     			'sched3_9B'     => request('frm1701:txtPg2IShed3_9B'),
     			'sched3_10A'     => request('frm1701:txtPg2IShed3_10A'),
     			'sched3_10B'     => request('frm1701:txtPg2IShed3_10B'),
     			'sched3_11A'     => request('frm1701:txtPg2IShed3_11A'),
     			'sched3_11B'     => request('frm1701:txtPg2IShed3_11B'),
     			'sched3_12A'     => request('frm1701:txtPg2IShed3_12A'),
     			'sched3_12B'     => request('frm1701:txtPg2IShed3_12B'),
     			'sched3_13A'     => request('frm1701:txtPg2IShed3_13A'),
     			'sched3_13B'     => request('frm1701:txtPg2IShed3_13B'),
     			'sched3_14A'     => request('frm1701:txtPg2IShed3_14A'),
     			'sched3_14B'     => request('frm1701:txtPg2IShed3_14B'),
     			'sched3_15A'     => request('frm1701:txtPg2IShed3_15A'),
     			'sched3_15B'     => request('frm1701:txtPg2IShed3_15B'),
     			'sched3_16A'     => request('frm1701:txtPg2IShed3_16A'),
     			'sched3_16B'     => request('frm1701:txtPg2IShed3_16B'),
     			'sched3_17A'     => request('frm1701:txtPg2IShed3_17A'),
     			'sched3_17B'     => request('frm1701:txtPg2IShed3_17B'),
     			'sched3_18A'     => request('frm1701:txtPg2IShed3_18A'),
     			'sched3_18B'     => request('frm1701:txtPg2IShed3_18B'),
     			'sched3_19A'     => request('frm1701:txtPg2IShed3_19Desc'),
     			'sched3_19B'     => request('frm1701:txtPg2IShed3_19A'),
     			'sched3_19C'     => request('frm1701:txtPg2IShed3_19B'),
     			'sched3_20A'     => request('frm1701:txtPg2IShed3_20Desc'),
     			'sched3_20B'     => request('frm1701:txtPg2IShed3_20A'),
     			'sched3_20C'     => request('frm1701:txtPg2IShed3_20B'),
     			'sched3_21A'     => request('frm1701:txtPg2IShed3_21A'),
     			'sched3_21B'     => request('frm1701:txtPg2IShed3_21B'),
     			'sched3_22A'     => request('frm1701:txtPg2IShed3_22A'),
     			'sched3_22B'     => request('frm1701:txtPg2IShed3_22B'),
     			'sched3_23A'     => request('frm1701:txtPg2IShed3_23A'),
     			'sched3_23B'     => request('frm1701:txtPg2IShed3_23B'),
     			'sched3_24A'     => request('frm1701:txtPg2IShed3_24A'),
     			'sched3_24B'     => request('frm1701:txtPg2IShed3_24B'),
     			'sched3_25A'     => request('frm1701:txtPg2IShed3_25A'),
     			'sched3_25B'     => request('frm1701:txtPg2IShed3_25B'),
         	]);
     		
     	if(request('form_id') != ""){
                 $page2 = tbl_1701_2::find(request('form_id'));
                 $page2->update($data2);
          }else{
             	$page2 = tbl_1701_2::find($form->id);
                 if(empty($page2)){
                     tbl_1701_2::create($data2);
                 }else{
                     $page2->update($data2);
                 }
          }

     	$data3 = ([
     			'form_id'     => $form->id,
     			'sched3_26A'     => request('frm1701:txtPg3IShed3_26A'),
     			'sched3_26B'     => request('frm1701:txtPg3IShed3_26B'),
     			'sched3_27A'     => request('frm1701:txtPg3IShed3_27Desc'),
     			'sched3_27B'     => request('frm1701:txtPg3IShed3_27A'),
     			'sched3_27C'     => request('frm1701:txtPg3IShed3_27B'),
     			'sched3_28A'     => request('frm1701:txtPg3IShed3_28A'),
     			'sched3_28B'     => request('frm1701:txtPg3IShed3_28B'),
     			'sched3_29A'     => request('frm1701:txtPg3IShed3_29A'),
     			'sched3_29B'     => request('frm1701:txtPg3IShed3_29B'),
     			'sched3_30A'     => request('frm1701:txtPg3IShed3_30A'),
     			'sched3_30B'     => request('frm1701:txtPg3IShed3_30B'),
     			'sched3_31A'     => request('frm1701:txtPg3IShed3_31A'),
     			'sched3_31B'     => request('frm1701:txtPg3IShed3_31B'),
     			'sched3_32A'     => request('frm1701:txtPg3IShed3_32A'),
     			'sched3_32B'     => request('frm1701:txtPg3IShed3_32B'),
     			'sched4_1A'     => request('frm1701:txtPg3IShed4_1A'),
     			'sched4_1B'     => request('frm1701:txtPg3IShed4_1B'),
     			'sched4_2A'     => request('frm1701:txtPg3IShed4_2A'),
     			'sched4_2B'     => request('frm1701:txtPg3IShed4_2B'),
     			'sched4_3A'     => request('frm1701:txtPg3IShed4_3A'),
     			'sched4_3B'     => request('frm1701:txtPg3IShed4_3B'),
     			'sched4_4A'     => request('frm1701:txtPg3IShed4_4A'),
     			'sched4_4B'     => request('frm1701:txtPg3IShed4_4B'),
     			'sched4_5A'     => request('frm1701:txtPg3IShed4_5A'),
     			'sched4_5B'     => request('frm1701:txtPg3IShed4_5B'),
     			'sched4_6A'     => request('frm1701:txtPg3IShed4_6A'),
     			'sched4_6B'     => request('frm1701:txtPg3IShed4_6B'),
     			'sched4_7A'     => request('frm1701:txtPg3IShed4_7A'),
     			'sched4_7B'     => request('frm1701:txtPg3IShed4_7B'),
     			'sched4_8A'     => request('frm1701:txtPg3IShed4_8A'),
     			'sched4_8B'     => request('frm1701:txtPg3IShed4_8B'),
     			'sched4_9A'     => request('frm1701:txtPg3IShed4_9A'),
     			'sched4_9B'     => request('frm1701:txtPg3IShed4_9B'),
     			'sched4_10A'     => request('frm1701:txtPg3IShed4_10A'),
     			'sched4_10B'     => request('frm1701:txtPg3IShed4_10B'),
     			'sched4_11A'     => request('frm1701:txtPg3IShed4_11A'),
     			'sched4_11B'     => request('frm1701:txtPg3IShed4_11B'),
     			'sched4_12A'     => request('frm1701:txtPg3IShed4_12A'),
     			'sched4_12B'     => request('frm1701:txtPg3IShed4_12B'),
     			'sched4_13A'     => request('frm1701:txtPg3IShed4_13A'),
     			'sched4_13B'     => request('frm1701:txtPg3IShed4_13B'),
     			'sched4_14A'     => request('frm1701:txtPg3IShed4_14A'),
     			'sched4_14B'     => request('frm1701:txtPg3IShed4_14B'),
     			'sched4_15A'     => request('frm1701:txtPg3IShed4_15A'),
     			'sched4_15B'     => request('frm1701:txtPg3IShed4_15B'),
     			'sched4_16A'     => request('frm1701:txtPg3IShed4_16A'),
     			'sched4_16B'     => request('frm1701:txtPg3IShed4_16B'),
     			'sched4_17A_1'     => request('frm1701:txtPg3IShed4_17aA'),
     			'sched4_17A_2'     => request('frm1701:txtPg3IShed4_17aB'),
     			'sched4_17B_1'     => request('frm1701:txtPg3IShed4_17bA'),
     			'sched4_17B_2'     => request('frm1701:txtPg3IShed4_17bB'),
     			'sched4_17C_1'     => request('frm1701:txtPg3IShed4_17cA'),
     			'sched4_17C_2'     => request('frm1701:txtPg3IShed4_17cB'),
     			'sched4_17D_1'     => request('frm1701:txtPg3IShed4_17dDesc'),
     			'sched4_17D_2'     => request('frm1701:txtPg3IShed4_17dA'),
     			'sched4_17D_3'     => request('frm1701:txtPg3IShed4_17dB'),
     			'sched4_18A'     => request('frm1701:txtPg3IShed4_18A'),
     			'sched4_18B'     => request('frm1701:txtPg3IShed4_18B'),
     			'sched5A_desc1'     => request('frm1701:txtPg3IShed5_1Desc'),
     			'sched5A_legal1'     => request('frm1701:txtPg3IShed5_1Legal'),
     			'sched5A_amount1'     => request('frm1701:txtPg3IShed5_1Amt'),
     			'sched5A_desc2'     => request('frm1701:txtPg3IShed5_2Desc'),
     			'sched5A_legal2'     => request('frm1701:txtPg3IShed5_2Legal'),
     			'sched5A_amount2'     => request('frm1701:txtPg3IShed5_2Amt'),
     			'sched5A_total3'     => request('frm1701:txtPg3IShed5_3'),
     			'sched5B_desc4'     => request('frm1701:txtPg3IShed5_4Desc'),
     			'sched5B_legal4'     => request('frm1701:txtPg3IShed5_4Legal'),
     			'sched5B_amount4'     => request('frm1701:txtPg3IShed5_4Amt'),
     			'sched5B_desc5'     => request('frm1701:txtPg3IShed5_5Desc'),
     			'sched5B_legal5'     => request('frm1701:txtPg3IShed5_5Legal'),
     			'sched5B_amount5'     => request('frm1701:txtPg3IShed5_5Amt'),
     			'sched5B_total6'     => request('frm1701:txtPg3IShed5_6'),
     			'sched6_taxpayer1A'     => request('frm1701:txtPg3IShed6_1A'),
     			'sched6_spouse1B'     => request('frm1701:txtPg3IShed6_1A'),
     			'sched6_taxpayer2A'     => request('frm1701:txtPg3IShed6_2A'),
     			'sched6_spouse2B'     => request('frm1701:txtPg3IShed6_2B'),
     			'sched6_taxpayer3A'     => request('frm1701:txtPg3IShed6_3A'),
     			'sched6_spouse3B'     => request('frm1701:txtPg3IShed6_3B'),
     			'sched6_year4'     => request('frm1701:txtPg3IShed6_4Year'),
     			'sched6_4A'     => request('frm1701:txtPg3IShed6_4A'),
     			'sched6_4B'     => request('frm1701:txtPg3IShed6_4B'),
     			'sched6_4C'     => request('frm1701:txtPg3IShed6_4C'),
     			'sched6_4D'     => request('frm1701:txtPg3IShed6_4D'),
     			'sched6_4E'     => request('frm1701:txtPg3IShed6_4E'),
     			'sched6_year5'     => request('frm1701:txtPg3IShed6_5Year'),	
     			'sched6_5A'     => request('frm1701:txtPg3IShed6_5A'),
     			'sched6_5B'     => request('frm1701:txtPg3IShed6_5B'),
     			'sched6_5C'     => request('frm1701:txtPg3IShed6_5C'),
     			'sched6_5D'     => request('frm1701:txtPg3IShed6_5D'),
     			'sched6_5E'     => request('frm1701:txtPg3IShed6_5E'),
     			'sched6_year6'     => request('frm1701:txtPg3IShed6_6Year'),
     			'sched6_6A'     => request('frm1701:txtPg3IShed6_6A'),
     			'sched6_6B'     => request('frm1701:txtPg3IShed6_6B'),
     			'sched6_6C'     => request('frm1701:txtPg3IShed6_6C'),
     			'sched6_6D'     => request('frm1701:txtPg3IShed6_6D'),
     			'sched6_6E'     => request('frm1701:txtPg3IShed6_6E'),
     			'sched6_year7'     => request('frm1701:txtPg3IShed6_7Year'),
     			'sched6_7A'     => request('frm1701:txtPg3IShed6_7A'),
     			'sched6_7B'     => request('frm1701:txtPg3IShed6_7B'),
     			'sched6_7C'     => request('frm1701:txtPg3IShed6_7C'),
     			'sched6_7D'     => request('frm1701:txtPg3IShed6_7D'),
     			'sched6_7E'     => request('frm1701:txtPg3IShed6_7E'),
     			'sched6_8'     => request('frm1701:txtPg3IShed6_8D'),
     	]);
     		
     	if(request('form_id') != ""){
                 $page3 = tbl_1701_3::find(request('form_id'));
                 $page3->update($data3);
          }else{
             	$page3 = tbl_1701_3::find($form->id);
                 if(empty($page3)){
                     tbl_1701_3::create($data3);
                 }else{
                     $page2->update($data3);
                 }
          }

     	$data4 = ([
     			'form_id'     => $form->id,
     			'sched6_year9'     => request('frm1701:txtPg4IShed6_9Year'),
     			'sched6_9A'     => request('frm1701:txtPg4IShed6_9A'),
     			'sched6_9B'     => request('frm1701:txtPg4IShed6_9B'),
     			'sched6_9C'     => request('frm1701:txtPg4IShed6_9C'),
     			'sched6_9D'     => request('frm1701:txtPg4IShed6_9D'),
     			'sched6_9E'     => request('frm1701:txtPg4IShed6_9E'),
     			'sched6_year10'     => request('frm1701:txtPg4IShed6_10Year'),
     			'sched6_10A'     => request('frm1701:txtPg4IShed6_10A'),
     			'sched6_10B'     => request('frm1701:txtPg4IShed6_10B'),
     			'sched6_10C'     => request('frm1701:txtPg4IShed6_10C'),
     			'sched6_10D'     => request('frm1701:txtPg4IShed6_10D'),
     			'sched6_10E'     => request('frm1701:txtPg4IShed6_10E'),
     			'sched6_year11'     => request('frm1701:txtPg4IShed6_11Year'),
     			'sched6_11A'     => request('frm1701:txtPg4IShed6_11A'),
     			'sched6_11B'     => request('frm1701:txtPg4IShed6_11B'),
     			'sched6_11C'     => request('frm1701:txtPg4IShed6_11C'),
     			'sched6_11D'     => request('frm1701:txtPg4IShed6_11D'),
     			'sched6_11E'     => request('frm1701:txtPg4IShed6_11E'),
     			'sched6_year12'     => request('frm1701:txtPg4IShed6_12Year'),
     			'sched6_12A'     => request('frm1701:txtPg4IShed6_12A'),
     			'sched6_12B'     => request('frm1701:txtPg4IShed6_12B'),
     			'sched6_12C'     => request('frm1701:txtPg4IShed6_12C'),
     			'sched6_12D'     => request('frm1701:txtPg4IShed6_12D'),
     			'sched6_12E'     => request('frm1701:txtPg4IShed6_12E'),
     			'sched6_13'     => request('frm1701:txtPg3IShed6_8D'),
     			'item6_1A'     => request('frm1701:txtPg4IPart6_1A'),
     			'item6_1B'     => request('frm1701:txtPg4IPart6_1B'),
     			'item6_2A'     => request('frm1701:txtPg4IPart6_2A'),
     			'item6_2B'     => request('frm1701:txtPg4IPart6_2B'),
     			'item6_3A'     => request('frm1701:txtPg4IPart6_3A'),
     			'item6_3B'     => request('frm1701:txtPg4IPart6_3B'),
     			'item6_4A'     => request('frm1701:txtPg4IPart6_4A'),
     			'item6_4B'     => request('frm1701:txtPg4IPart6_4B'),
     			'item6_5A'     => request('frm1701:txtPg4IPart6_5A'),
     			'item6_5B'     => request('frm1701:txtPg4IPart6_5B'),
     			'item7_1A'     => request('frm1701:txtPg4IPart7_1A'),
     			'item7_1B'     => request('frm1701:txtPg4IPart7_1B'),
     			'item7_2A'     => request('frm1701:txtPg4IPart7_2A'),
     			'item7_2B'     => request('frm1701:txtPg4IPart7_2B'),
     			'item7_3A'     => request('frm1701:txtPg4IPart7_3A'),
     			'item7_3B'     => request('frm1701:txtPg4IPart7_3B'),
     			'item7_4A'     => request('frm1701:txtPg4IPart7_4A'),
     			'item7_4B'     => request('frm1701:txtPg4IPart7_4B'),
     			'item7_5A'     => request('frm1701:txtPg4IPart7_5A'),
     			'item7_5B'     => request('frm1701:txtPg4IPart7_5B'),
     			'item7_6A'     => request('frm1701:txtPg4IPart7_6A'),
     			'item7_6B'     => request('frm1701:txtPg4IPart7_6B'),
     			'item7_7A'     => request('frm1701:txtPg4IPart7_7A'),
     			'item7_7B'     => request('frm1701:txtPg4IPart7_7B'),
     			'item7_8A'     => request('frm1701:txtPg4IPart7_8A'),
     			'item7_8B'     => request('frm1701:txtPg4IPart7_8B'),
     			'item7_9A'     => request('frm1701:txtPg4IPart7_9Specify'),
     			'item7_9B'     => request('frm1701:txtPg4IPart7_9A'),
     			'item7_9C'     => request('frm1701:txtPg4IPart7_9B'),
     			'item7_10A'     => request('frm1701:txtPg4IPart7_10A'),
     			'item7_10B'     => request('frm1701:txtPg4IPart7_10B'),
     			'item8_1A'     => request('frm1701:txtPg4IPart8_1A'),
     			'item8_1B'     => request('frm1701:txtPg4IPart8_1B'),
     			'item8_2A'     => request('frm1701:txtPg4IPart8_2A'),
     			'item8_2B'     => request('frm1701:txtPg4IPart8_2B'),
     			'item8_3A'     => request('frm1701:txtPg4IPart8_3A'),
     			'item8_3B'     => request('frm1701:txtPg4IPart8_3B'),
     			'item8_4A'     => request('frm1701:txtPg4IPart8_4A'),
     			'item8_4B'     => request('frm1701:txtPg4IPart8_4B'),
     			'item8_5A'     => request('frm1701:txtPg4IPart8_5A'),
     			'item8_5B'     => request('frm1701:txtPg4IPart8_5B'),
     			'item8_6A'     => request('frm1701:txtPg4IPart8_6A'),
     			'item8_6B'     => request('frm1701:txtPg4IPart8_6B'),
     			'item8_7A'     => request('frm1701:txtPg4IPart8_7A'),
     			'item8_7B'     => request('frm1701:txtPg4IPart8_7B'),
     			'item8_8A'     => request('frm1701:txtPg4IPart8_8A'),
     			'item8_8B'     => request('frm1701:txtPg4IPart8_8B'),
     			'item8_9A'     => request('frm1701:txtPg4IPart8_9A'),
     			'item8_9B'     => request('frm1701:txtPg4IPart8_9B'),
     			'item8_10A'     => request('frm1701:txtPg4IPart8_10A'),
     			'item8_10B'     => request('frm1701:txtPg4IPart8_10B'),
     			'item9_1A'     => request('frm1701:txtPg4IPart9_1A'),
     			'item9_1B'     => request('frm1701:txtPg4IPart9_1B'),
     			'item9_2A'     => request('frm1701:txtPg4IPart9_2Particulars'),
     			'item9_2B'     => request('frm1701:txtPg4IPart9_2A'),
     			'item9_2C'     => request('frm1701:txtPg4IPart9_2B'),
     			'item9_3A'     => request('frm1701:txtPg4IPart9_3Particulars'),
     			'item9_3B'     => request('frm1701:txtPg4IPart9_3A'),
     			'item9_3C'     => request('frm1701:txtPg4IPart9_3B'),
     			'item9_4A'     => request('frm1701:txtPg4IPart9_4Particulars'),
     			'item9_4B'     => request('frm1701:txtPg4IPart9_4A'),
     			'item9_4C'     => request('frm1701:txtPg4IPart9_4B'),
     			'item9_5A'     => request('frm1701:txtPg4IPart9_5A'),
     			'item9_5B'     => request('frm1701:txtPg4IPart9_5B'),
     			'item9_6A'     => request('frm1701:txtPg4IPart9_6Particulars'),
     			'item9_6B'     => request('frm1701:txtPg4IPart9_6A'),
     			'item9_6C'     => request('frm1701:txtPg4IPart9_6B'),
     			'item9_7A'     => request('frm1701:txtPg4IPart9_7Particulars'),
     			'item9_7B'     => request('frm1701:txtPg4IPart9_7A'),
     			'item9_7C'     => request('frm1701:txtPg4IPart9_7B'),
     			'item9_8A'     => request('frm1701:txtPg4IPart9_8Particulars'),
     			'item9_8B'     => request('frm1701:txtPg4IPart9_8A'),
     			'item9_8C'     => request('frm1701:txtPg4IPart9_8B'),
     			'item9_9A'     => request('frm1701:txtPg4IPart9_9Particulars'),
     			'item9_9B'     => request('frm1701:txtPg4IPart9_9A'),
     			'item9_9C'     => request('frm1701:txtPg4IPart9_9B'),
     			'item9_10A'     => request('frm1701:txtPg4IPart9_10A'),
     			'item9_10B'     => request('frm1701:txtPg4IPart9_10B'),
     			'item9_11A'     => request('frm1701:txtPg4IPart9_11A'),
     			'item9_11B'     => request('frm1701:txtPg4IPart9_11B'),
     	]);

     	if(request('form_id') != ""){
                 $page4 = tbl_1701_4::find(request('form_id'));
                 $page4->update($data4);
          }else{
             	$page4 = tbl_1701_4::find($form->id);
                 if(empty($page4)){
                     tbl_1701_4::create($data4);
                 }else{
                     $page4->update($data4);
                 }
          }

          $attachment_data = ([
               'form_id'    => $form->id,
               'page1_tax_regime'    => null !== request('frm1701:rdoPg1mEX1') ? request('frm1701:rdoPg1mEX1') : '',
               'scheduleA_item4B'    => request('frm1701:txtPg1mI4BSchdAEX1'),
               'scheduleA_item4E'    => request('frm1701:txtPg1mI4ESchdAEX1'),
               'scheduleB_item12'    => request('frm1701:txtPg1mI12DescSchdBEX1'),
               'scheduleB_item13'    => request('frm1701:txtPg1mI13DescSchdBEX1'),
               'scheduleC_item17D_description'    => request('frm1701:txtPg2mI17dDescSchdCEX1'),
               'page3_item10'    => request('frm1701:txtPg3mSchedB_10EX1'),
               'page3_item11'    => request('frm1701:txtPg3mSchedB_11EX1'),
               'scheduleD_totalA'    => request('frm1701:txtPg2mI5ASchdDEX1'),
               'scheduleD_totalB'    => request('frm1701:txtPg2mI5BSchdDEX1'),
               'tax_regime'    => null !== request('frm1701:Pg3mTaxRegimeEX1') ? request('frm1701:Pg3mTaxRegimeEX1') : '',
               'page3_item10'    => request('frm1701:txtPg3mSchedB_10EX1'),
               'page3_item11'    => request('frm1701:txtPg3mSchedB_11EX1'),
               'page4_item17D'    => request('frm1701:txtPg4mSchedC_17cEX1'),
               'page4_item5'    => request('frm1701:txtPg4mSchedD1_5BEX1'),
               'page4_item10'    => request('frm1701:txtPg4mSchedD2_10BEX1'),
          ]);

          if(request('form_id') != ""){
                 $attach = tbl_1701_attachments::find(request('form_id'));
                 $attach->update($attachment_data);
          }else{
               $attach = tbl_1701_attachments::find($form->id);
                 if(empty($attach)){
                     tbl_1701_attachments::create($attachment_data);
                 }else{
                     $attach->update($attachment_data);
                 }
          }

          for ($i=1; $i < 7 ; $i++) { 
               if($i != 4){
                    if(request('frm1701:txtPg1mI'.$i.'ASchdAEX1') != ''){
                         $scheduleA = ([
                              'form_id'    => $form->id,
                              'itemA'    => request('frm1701:txtPg1mI'.$i.'ASchdAEX1'),
                              'itemB'    => request('frm1701:txtPg1mI'.$i.'BSchdAEX1'),
                              'itemC'    => request('frm1701:txtPg1mI'.$i.'CSchdAEX1'),
                              'itemD'    => request('frm1701:txtPg1mI'.$i.'DSchdAEX1'),
                              'itemE'     => request('frm1701:txtPg1mI'.$i.'ESchdAEX1'),
                              'itemF'    => request('frm1701:txtPg1mI'.$i.'FSchdAEX1'),
                         ]);
                         tbl_1701_scheduleA_1::create($scheduleA);
                    }
               }
          }

          for ($i=1; $i < 18 ; $i++) { 
               if(request('frm1701:txtPg1mI'.$i.'DSchdBEX1') != '0.00'){
                         $scheduleB = ([
                              'form_id'       => $form->id,
                              'itemA'       => request('frm1701:txtPg1mI'.$i.'ASchdBEX1'),
                              'itemB'       => request('frm1701:txtPg1mI'.$i.'BSchdBEX1'),
                              'itemC'       => request('frm1701:txtPg1mI'.$i.'CSchdBEX1'),
                              'itemD'       => request('frm1701:txtPg1mI'.$i.'DSchdBEX1'),
                              'itemE'       => request('frm1701:txtPg1mI'.$i.'ESchdBEX1'),
                              'itemF'       => request('frm1701:txtPg1mI'.$i.'FSchdBEX1'),
                              'itemG'       => request('frm1701:txtPg1mI'.$i.'GSchdBEX1'),
                              'itemH'       => request('frm1701:txtPg1mI'.$i.'HSchdBEX1'),
                         ]);
                         tbl_1701_scheduleB_1::create($scheduleB);
               }
          }

          for ($i=1; $i < 19 ; $i++) { 
               if($i != 17){
                    if(request('frm1701:txtPg2mI'.$i.'ASchdCEX1') != '0.00' || request('frm1701:txtPg2mI'.$i.'BSchdCEX1') != '0.00' || request('frm1701:txtPg2mI'.$i.'CSchdCEX1') != '0.00' || request('frm1701:txtPg2mI'.$i.'DSchdCEX1') != '0.00'){
                         $scheduleC = ([
                              'form_id'       => $form->id,
                              'itemA'       => request('frm1701:txtPg2mI'.$i.'ASchdCEX1'),
                              'itemB'       => request('frm1701:txtPg2mI'.$i.'BSchdCEX1'),
                              'itemC'       => request('frm1701:txtPg2mI'.$i.'CSchdCEX1'),
                              'itemD'       => request('frm1701:txtPg2mI'.$i.'DSchdCEX1'),
                         ]);
                         tbl_1701_scheduleC_2::create($scheduleC);
                    }
               }else{
                    foreach(range('a','d') as $v){
                        if(request('frm1701:txtPg2mI17'.$v.'ASchdCEX1') != '0.00' || request('frm1701:txtPg2mI17'.$v.'BSchdCEX1') != '0.00' || request('frm1701:txtPg2mI17'.$v.'CSchdCEX1') != '0.00' || request('frm1701:txtPg2mI17'.$v.'DSchdCEX1') != '0.00'){
                              $scheduleC = ([
                                   'form_id'       => $form->id,
                                   'itemA'       => request('frm1701:txtPg2mI17'.$v.'ASchdCEX1'),
                                   'itemB'       => request('frm1701:txtPg2mI17'.$v.'BSchdCEX1'),
                                   'itemC'       => request('frm1701:txtPg2mI17'.$v.'CSchdCEX1'),
                                   'itemD'       => request('frm1701:txtPg2mI17'.$v.'DSchdCEX1'),
                              ]);
                              tbl_1701_scheduleC_2::create($scheduleC);
                         }
                    }
               }
          }

          for ($i=1; $i < 6 ; $i++) {
               if(request('frm1701:txtPg2mI'.$i.'DescSchdDEX1') != '' || request('frm1701:txtPg2mI'.$i.'LBSchdDEX1') != '' || request('frm1701:txtPg2mI'.$i.'ASchdDEX1') != '0.00'){
                    $scheduleD = ([
                         'form_id'       => $form->id,
                         'description'       => request('frm1701:txtPg2mI'.$i.'DescSchdDEX1'),
                         'legal'       => request('frm1701:txtPg2mI'.$i.'LBSchdDEX1'),
                         'taxpayer'       => request('frm1701:txtPg2mI'.$i.'ASchdDEX1'),
                         'spouse'       => request('frm1701:txtPg2mI'.$i.'BSchdDEX1'),
                    ]);
                    tbl_1701_scheduleD_2::create($scheduleD);
               }
          }

          for ($i=1; $i < 7 ; $i++) {
               if(request('frm1701:txtPg3mSchedA_'.$i.'AEX1') != '' || request('frm1701:txtPg3mSchedA_'.$i.'BEX1') != ''){
                    $schedule3A = ([
                         'form_id'       => $form->id,
                         'taxpayer'       => request('frm1701:txtPg3mSchedA_'.$i.'AEX1'),
                         'spouse'       => request('frm1701:txtPg3mSchedA_'.$i.'BEX1'),
                    ]);
                    tbl_1701_schedule3::create($schedule3A);
               }
          }

          for ($i=1; $i < 16 ; $i++) {
               if(request('frm1701:txtPg3mSchedB_'.$i.'AEX1') != '0.00' || request('frm1701:txtPg3mSchedB_'.$i.'BEX1') != '0.00'){
                    $schedule3B = ([
                         'form_id'       => $form->id,
                         'taxpayer'       => request('frm1701:txtPg3mSchedB_'.$i.'AEX1'),
                         'spouse'       => request('frm1701:txtPg3mSchedB_'.$i.'BEX1'),
                    ]);
                    tbl_1701_schedule3::create($schedule3B);
               }
          }

          for ($h = 1; $h < 4 ; $h++) {
               if(request('frm1701:txtPg3mSchedC_'.$h.'AEX1') != '0.00' || request('frm1701:txtPg3mSchedC_'.$h.'BEX1') != '0.00'){
                         $schedule3C = ([
                              'form_id'       => $form->id,
                              'taxpayer'       => request('frm1701:txtPg3mSchedC_'.$h.'AEX1'),
                              'spouse'       => request('frm1701:txtPg3mSchedC_'.$h.'BEX1'),
                         ]);
                         tbl_1701_schedule3::create($schedule3C);
               }
          }

          for ($i=4; $i < 19 ; $i++) {
               if($i != '17'){
                    if(request('frm1701:txtPg4mSchedC_'.$i.'AEX1') != '0.00' || request('frm1701:txtPg4mSchedC_'.$i.'BEX1') != '0.00'){
                              $schedule3C = ([
                                   'form_id'       => $form->id,
                                   'taxpayer'       => request('frm1701:txtPg4mSchedC_'.$i.'AEX1'),
                                   'spouse'       => request('frm1701:txtPg4mSchedC_'.$i.'BEX1'),
                              ]);
                              tbl_1701_schedule3::create($schedule3C);
                    }
               }else{
                    foreach(range('a','d') as $v){
                         if(request('frm1701:txtPg4mSchedC_17'.$v.'AEX1') != '0.00' || request('frm1701:txtPg4mSchedC_17'.$v.'BEX1') != '0.00'){
                              $schedule3C = ([
                                   'form_id'       => $form->id,
                                   'taxpayer'       => request('frm1701:txtPg4mSchedC_17'.$v.'AEX1'),
                                   'spouse'       => request('frm1701:txtPg4mSchedC_17'.$v.'BEX1'),
                              ]);
                              tbl_1701_schedule3::create($schedule3C);
                         }
                    }
               }
          }

          for ($j=1; $j < 5 ; $j++) {
               if(request('frm1701:txtPg4mSchedD1_'.$j.'EX1') != '' || request('frm1701:txtPg4mSchedD1_'.$j.'AEX1') != '' || request('frm1701:txtPg4mSchedD1_'.$j.'BEX1') != ''){
                    $scheduleD1 = ([
                         'form_id'       => $form->id,
                         'description'       => request('frm1701:txtPg4mSchedD1_'.$j.'EX1'),
                         'legal_basis'       => request('frm1701:txtPg4mSchedD1_'.$j.'AEX1'),
                         'amount'       => request('frm1701:txtPg4mSchedD1_'.$j.'BEX1'),
                    ]);
                    tbl_1701_scheduleD_4::create($scheduleD1);
               }
          }

          for ($j=6; $j < 10 ; $j++) {
               if(request('frm1701:txtPg4mSchedD2_'.$j.'EX1') != '' || request('frm1701:txtPg4mSchedD2_'.$j.'AEX1') != '' || request('frm1701:txtPg4mSchedD2_'.$j.'BEX1') != ''){
                    $scheduleD2 = ([
                         'form_id'       => $form->id,
                         'description'       => request('frm1701:txtPg4mSchedD2_'.$j.'EX1'),
                         'legal_basis'       => request('frm1701:txtPg4mSchedD2_'.$j.'AEX1'),
                         'amount'       => request('frm1701:txtPg4mSchedD2_'.$j.'BEX1'),
                    ]);
                    tbl_1701_scheduleD_4::create($scheduleD2);
               }
          }

          $rdoPg1I2AmendedYes = "false";
          $rdoPg1I2AmendedNo = "false";
          if(request('frm1701:rdoPg1I2Amended') == "Yes"){
			$rdoPg1I2AmendedYes = "true";
		}else if(request('frm1701:rdoPg1I2Amended') == "No"){
			$rdoPg1I2AmendedNo = "true";
		}

		$rdoPg1I3ShortPeriodYes = "false";
		$rdoPg1I3ShortPeriodNo = "false";
		if(request('frm1701:rdoPg1I3ShortPeriod') == "Yes"){
			$rdoPg1I3ShortPeriodYes = "true";
		}else if(request('frm1701:rdoPg1I3ShortPeriod') == "No"){
			$rdoPg1I3ShortPeriodNo = "true";
		}

		$rdoPg1I6TaxpayerTypeS = "false";
		$rdoPg1I6TaxpayerTypeP = "false";
		$rdoPg1I6TaxpayerTypeE = "false";
		$rdoPg1I6TaxpayerTypeT = "false";
		$rdoPg1I6TaxpayerTypeC = "false";

		if(null !== request('frm1701:rdoPg1I6TaxpayerType')){
			if(request('frm1701:rdoPg1I6TaxpayerType') == 'SingleProprietor'){
				$rdoPg1I6TaxpayerTypeS = "true";
			}else if(request('frm1701:rdoPg1I6TaxpayerType') == 'Professional'){
				$rdoPg1I6TaxpayerTypeP = "true";
			}else if(request('frm1701:rdoPg1I6TaxpayerType') == 'Estate'){
				$rdoPg1I6TaxpayerTypeE = "true";
			}else if(request('frm1701:rdoPg1I6TaxpayerType') == 'Trust'){
				$rdoPg1I6TaxpayerTypeT = "true";
			}else if(request('frm1701:rdoPg1I6TaxpayerType') == 'CompensationEarner'){
				$rdoPg1I6TaxpayerTypeC = "true";
			}
		}

		$rdoPg1I7ATC_II012 = "false";
		$rdoPg1I7ATC_II014 = "false";
		$rdoPg1I7ATC_II013 = "false";
		$rdoPg1I7ATC_II011 = "false";
		$rdoPg1I7ATC_II015 = "false";
		$rdoPg1I7ATC_II017 = "false";
		$rdoPg1I7ATC_II016 = "false";

		if(null !== request('frm1701:rdoPg1I7ATC')){
			if(request('frm1701:rdoPg1I7ATC') == 'II012'){
				$rdoPg1I7ATC_II012 = "true";
			}else if(request('frm1701:rdoPg1I7ATC') == 'II014'){
				$rdoPg1I7ATC_II014 = "true";
			}else if(request('frm1701:rdoPg1I7ATC') == 'II013'){
				$rdoPg1I7ATC_II013 = "true";
			}else if(request('frm1701:rdoPg1I7ATC') == 'II011'){
				$rdoPg1I7ATC_II011 = "true";
			}else if(request('frm1701:rdoPg1I7ATC') == 'II015'){
				$rdoPg1I7ATC_II015 = "true";
			}else if(request('frm1701:rdoPg1I7ATC') == 'II017'){
				$rdoPg1I7ATC_II017 = "true";
			}else if(request('frm1701:rdoPg1I7ATC') == 'II016'){
				$rdoPg1I7ATC_II016 = "true";
			}
		}

          $taxPayerName =  rawurlencode(request('frm1701:txtPg1I8TaxpayerName'));

          $address = rawurlencode(request('frm1701:txtPg1I9Address'));

          $rdoPg1I13ForeignTaxCreditsYes = "false";
          $rdoPg1I13ForeignTaxCreditsNo = "false";

          if(request('frm1701:rdoPg1I13ForeignTaxCredits') == "Yes"){
			$rdoPg1I13ForeignTaxCreditsYes = "true";
		}else if(request('frm1701:rdoPg1I13ForeignTaxCredits') == "No"){
			$rdoPg1I13ForeignTaxCreditsNo = "true";
		}

		$rdoPg1I16CivilStatusS = "false";
		$rdoPg1I16CivilStatusM = "false";
		$rdoPg1I16CivilStatusLS = "false";
		$rdoPg1I16CivilStatusW = "false";
		if(null !== request('frm1701:rdoPg1I16CivilStatus')){
			if(request('frm1701:rdoPg1I16CivilStatus') == 'Single'){
				$rdoPg1I16CivilStatusS = "true";
			}else if(request('frm1701:rdoPg1I16CivilStatus') == 'Married'){
				$rdoPg1I16CivilStatusM = "true";
			}else if(request('frm1701:rdoPg1I16CivilStatus') == 'LegallySeparated'){
				$rdoPg1I16CivilStatusLS = "true";
			}else if(request('frm1701:rdoPg1I16CivilStatus') == 'Widow'){
				$rdoPg1I16CivilStatusW = "true";
			}
		}

		$rdoPg1I17SpouseIncomeYes = "false";
		$rdoPg1I17SpouseIncomeNo = "false";
		if(request('frm1701:rdoPg1I17SpouseIncome') == "Yes"){
			$rdoPg1I17SpouseIncomeYes = "true";
		}else if(request('frm1701:rdoPg1I17SpouseIncome') == "No"){
			$rdoPg1I17SpouseIncomeNo = "true";
		}

		$rdoPg1I18FilingStatusJ = "false";
		$rdoPg1I18FilingStatusS = "false";
		if(null !== request('frm1701:rdoPg1I18FilingStatus')){
			if(request('frm1701:rdoPg1I18FilingStatus') == 'Joint'){
				$rdoPg1I18FilingStatusJ = "true";
			}else if(request('frm1701:rdoPg1I18FilingStatus') == 'Separate'){
				$rdoPg1I18FilingStatusS = "true";
			}
		}

		$rdoPg1I19IncomeExemptYes = "false";
		$rdoPg1I19IncomeExemptNo = "false";
		if(null !== request('frm1701:rdoPg1I19IncomeExempt')){
			if(request('frm1701:rdoPg1I19IncomeExempt') == 'Yes'){
				$rdoPg1I19IncomeExemptYes = "true";
			}else if(request('frm1701:rdoPg1I19IncomeExempt') == 'No'){
				$rdoPg1I19IncomeExemptNo = "true";
			}
		}

		$rdoPg1I20IncomeSpecialYes = "false";
		$rdoPg1I20IncomeSpecialNo = "false";
		if(null !== request('frm1701:rdoPg1I20IncomeSpecial')){
			if(request('frm1701:rdoPg1I19IncomeExempt') == 'Yes'){
				$rdoPg1I20IncomeSpecialYes = "true";
			}else if(request('frm1701:rdoPg1I20IncomeSpecial') == 'No'){
				$rdoPg1I20IncomeSpecialNo = "true";
			}
		}

		$rdoPg1I21TaxRateG = "false";
		$rdoPg1I21AMethodDeductionI = "false";
		$rdoPg1I21AMethodDeductionO = "false";
		$rdoPg1I21TaxRateP ="false";
		if(null !== request('frm1701:rdoPg1I21TaxRate')){
			if(request('frm1701:rdoPg1I21TaxRate') == 'Graduated'){
				$rdoPg1I21TaxRateG = "true";
			}else if(request('frm1701:rdoPg1I21TaxRate') == 'Percentage'){
				$rdoPg1I21TaxRateP = "true";
			}
		}

		if(null !== request('frm1701:rdoPg1I21AMethodDeduction')){
			if(request('frm1701:rdoPg1I21AMethodDeduction') == 'Itemized'){
				$rdoPg1I21AMethodDeductionI = "true";
			}else if(request('frm1701:rdoPg1I21AMethodDeduction') == 'OSD'){
				$rdoPg1I21AMethodDeductionO = "true";
			}
		}

		$rdoPg1OverpaymentRefund = "false";
		$rdoPg1OverpaymentTCC = "false";
		$rdoPg1OverpaymentCarryOver = "false";
		if(null !== request('frm1701:rdoPg1Overpayment')){
			if(request('frm1701:rdoPg1Overpayment') == 'Refund'){
				$rdoPg1OverpaymentRefund = "true";
			}else if(request('frm1701:rdoPg1Overpayment') == 'TCC'){
				$rdoPg1OverpaymentTCC = "true";
			}else if(request('frm1701:rdoPg1Overpayment') == 'CarryOver'){
				$rdoPg1OverpaymentCarryOver = "true";
			}
		}

		$rdoPg2I3SpouseTypeS = "false";
		$rdoPg2I3SpouseTypeP = "false";
		$rdoPg2I3SpouseTypeC = "false";
		if(null !== request('frm1701:rdoPg2I3SpouseType')){
			if(request('frm1701:rdoPg2I3SpouseType') == 'SingleProprietor'){
				$rdoPg2I3SpouseTypeS = "true";
			}else if(request('frm1701:rdoPg2I3SpouseType') == 'Professional'){
				$rdoPg2I3SpouseTypeP = "true";
			}else if(request('frm1701:rdoPg2I3SpouseType') == 'CompensationEarner'){
				$rdoPg2I3SpouseTypeC = "true";
			}
		}

		$rdoPg2I4ATC_II012 = "false";
		$rdoPg2I4ATC_II014 = "false";
		$rdoPg2I4ATC_II013 = "false";
		$rdoPg2I4ATC_II011 = "false";
		$rdoPg2I4ATC_II015 = "false";
		$rdoPg2I4ATC_II017 = "false";
		$rdoPg2I4ATC_II016 = "false";
		if(null !== request('frm1701:rdoPg2I4ATC')){
			if(request('frm1701:rdoPg2I4ATC') == 'II012'){
				$rdoPg2I4ATC_II012 = "true";
			}else if(request('frm1701:rdoPg2I4ATC') == 'II014'){
				$rdoPg2I4ATC_II014 = "true";
			}else if(request('frm1701:rdoPg2I4ATC') == 'II013'){
				$rdoPg2I4ATC_II013 = "true";
			}else if(request('frm1701:rdoPg2I4ATC') == 'II011'){
				$rdoPg2I4ATC_II011 = "true";
			}else if(request('frm1701:rdoPg2I4ATC') == 'II015'){
				$rdoPg2I4ATC_II015 = "true";
			}else if(request('frm1701:rdoPg2I4ATC') == 'II017'){
				$rdoPg2I4ATC_II017 = "true";
			}else if(request('frm1701:rdoPg2I4ATC') == 'II016'){
				$rdoPg2I4ATC_II016 = "true";
			}
		}

		$rdoPg2I8ForeignTaxCreditsYes = "false";
		$rdoPg2I8ForeignTaxCreditsNo = "false";
		if(null !== request('frm1701:rdoPg2I8ForeignTaxCredits')){
			if(request('frm1701:rdoPg2I8ForeignTaxCredits') == "Yes"){
				$rdoPg2I8ForeignTaxCreditsYes = "true";
			}else if(request('frm1701:rdoPg2I8ForeignTaxCredits') == "No"){
				$rdoPg2I8ForeignTaxCreditsNo = "true";
			}
		}	

		$rdoPg2I10IncomeExemptYes = "false";
		$rdoPg2I10IncomeExemptNo = "false";
		if(null !== request('frm1701:rdoPg2I10IncomeExempt')){
			if(request('frm1701:rdoPg2I10IncomeExempt') == 'Yes'){
				$rdoPg2I10IncomeExemptYes = "true";
			}else if(request('frm1701:rdoPg2I10IncomeExempt') == 'No'){
				$rdoPg2I10IncomeExemptNo = "true";
			}
		}

		$rdoPg2I11IncomeSpecialYes = "false";
		$rdoPg2I11IncomeSpecialNo = "false";
		if(null !== request('frm1701:rdoPg2I11IncomeSpecial')){
			if(request('frm1701:rdoPg2I11IncomeSpecial') == 'Yes'){
				$rdoPg2I11IncomeSpecialYes = "true";
			}else if(request('frm1701:rdoPg2I11IncomeSpecial') == 'No'){
				$rdoPg2I11IncomeSpecialNo = "true";
			}
		}


		$rdoPg2I12TaxRateG = "false";
		$rdoPg2I12AMethodDeductionI = "false";
		$rdoPg2I12AMethodDeductionO = "false";
		$rdoPg2I12TaxRateP = "false";
		if(null !== request('frm1701:rdoPg2I12TaxRate')){
			if(request('frm1701:rdoPg2I12TaxRate') == 'Graduated'){
				$rdoPg2I12TaxRateG = "true";
			}else if(request('frm1701:rdoPg2I12TaxRate') == 'Percentage'){
				$rdoPg2I12TaxRateP = "true";
			}
		}

		if(null !== request('frm1701:rdoPg2I12AMethodDeduction')){
			if(request('frm1701:rdoPg2I12AMethodDeduction') == 'Itemized'){
				$rdoPg2I12AMethodDeductionI = "true";
			}else if(request('frm1701:rdoPg2I12AMethodDeduction') == 'OSD'){
				$rdoPg2I12AMethodDeductionO = "true";
			}
		}

          $lineOfBusiness =  rawurlencode(request('frm1701:txtLineBus'));

          $rdoPg1mOption1EX1 = "false";
          $rdoPg1mOption2EX1 = "false";
          if(null !== request('frm1701:rdoPg1mEX1')){
               if(request('frm1701:rdoPg1mEX1') == '1'){
                    $rdoPg1mOption1EX1 = "true";
               }else if(request('frm1701:rdoPg1mEX1') == '2'){
                    $rdoPg1mOption2EX1 = "true";
               }
          }

          $rdoPg3mExemptEX1 = "false";
          $rdoPg1mSpecialRateEX1 = "false";
          if(null !== request('frm1701:Pg3mTaxRegimeEX1')){
               if(request('frm1701:Pg3mTaxRegimeEX1') == 'Exempt'){
                    $rdoPg3mExemptEX1 = "true";
               }else if(request('frm1701:Pg3mTaxRegimeEX1') == 'SpecialRate'){
                    $rdoPg1mSpecialRateEX1 = "true";
               }
          }

          $attachement = "";

          if(null !== request('frm1701:txtPg1mI4BSchdAEX1')){
          $attachement = "<div>frm1701:txtPg1mTIN1=".request('frm1701:txtPg2TIN1')."frm1701:txtPg1mTIN1=</div>	
            <div>frm1701:txtPg1mTIN2=".request('frm1701:txtPg2TIN2')."frm1701:txtPg1mTIN2=</div>	
            <div>frm1701:txtPg1mTIN3=".request('frm1701:txtPg2TIN3')."frm1701:txtPg1mTIN3=</div>	
            <div>frm1701:txtPg1mBranchCode=".request('frm1701:txtPg2BranchCode')."frm1701:txtPg1mBranchCode=</div>	
            <div>frm1701:txtPg1mTaxpayerName=".request('frm1701:txtPg2TaxpayerName')."frm1701:txtPg1mTaxpayerName=</div>	
            <div>frm1701:rdoPg1mOption1EX1=".$rdoPg1mOption1EX1."frm1701:rdoPg1mOption1EX1=</div>	
            <div>frm1701:rdoPg1mOption2EX1=".$rdoPg1mOption2EX1."frm1701:rdoPg1mOption2EX1=</div>	
            <div>frm1701:txtPg1mI1ASchdAEX1=".request('frm1701:txtPg1mI1ASchdAEX1')."frm1701:txtPg1mI1ASchdAEX1=</div>	
            <div>frm1701:txtPg1mI1BSchdAEX1=".request('frm1701:txtPg1mI1BSchdAEX1')."frm1701:txtPg1mI1BSchdAEX1=</div>	
            <div>frm1701:txtPg1mI1CSchdAEX1=".request('frm1701:txtPg1mI1CSchdAEX1')."frm1701:txtPg1mI1CSchdAEX1=</div>	
            <div>frm1701:txtPg1mI1DSchdAEX1=".request('frm1701:txtPg1mI1DSchdAEX1')."frm1701:txtPg1mI1DSchdAEX1=</div>	
            <div>frm1701:txtPg1mI1ESchdAEX1=".request('frm1701:txtPg1mI1ESchdAEX1')."frm1701:txtPg1mI1ESchdAEX1=</div>	
            <div>frm1701:txtPg1mI1FSchdAEX1=".request('frm1701:txtPg1mI1FSchdAEX1')."frm1701:txtPg1mI1FSchdAEX1=</div>	
            <div>frm1701:txtPg1mI2ASchdAEX1=".request('frm1701:txtPg1mI2ASchdAEX1')."frm1701:txtPg1mI2ASchdAEX1=</div>	
            <div>frm1701:txtPg1mI2BSchdAEX1=".request('frm1701:txtPg1mI2BSchdAEX1')."frm1701:txtPg1mI2BSchdAEX1=</div>	
            <div>frm1701:txtPg1mI2CSchdAEX1=".request('frm1701:txtPg1mI2CSchdAEX1')."frm1701:txtPg1mI2CSchdAEX1=</div>	
            <div>frm1701:txtPg1mI2DSchdAEX1=".request('frm1701:txtPg1mI2DSchdAEX1')."frm1701:txtPg1mI2DSchdAEX1=</div>	
            <div>frm1701:txtPg1mI2ESchdAEX1=".request('frm1701:txtPg1mI2ESchdAEX1')."frm1701:txtPg1mI2ESchdAEX1=</div>	
            <div>frm1701:txtPg1mI2FSchdAEX1=".request('frm1701:txtPg1mI2FSchdAEX1')."frm1701:txtPg1mI2FSchdAEX1=</div>	
            <div>frm1701:txtPg1mI3ASchdAEX1=".request('frm1701:txtPg1mI3ASchdAEX1')."frm1701:txtPg1mI3ASchdAEX1=</div>	
            <div>frm1701:txtPg1mI3BSchdAEX1=".request('frm1701:txtPg1mI3BSchdAEX1')."frm1701:txtPg1mI3BSchdAEX1=</div>	
            <div>frm1701:txtPg1mI3CSchdAEX1=".request('frm1701:txtPg1mI3CSchdAEX1')."frm1701:txtPg1mI3CSchdAEX1=</div>	
            <div>frm1701:txtPg1mI3DSchdAEX1=".request('frm1701:txtPg1mI3DSchdAEX1')."frm1701:txtPg1mI3DSchdAEX1=</div>	
            <div>frm1701:txtPg1mI3ESchdAEX1=".request('frm1701:txtPg1mI3ESchdAEX1')."frm1701:txtPg1mI3ESchdAEX1=</div>	
            <div>frm1701:txtPg1mI3FSchdAEX1=".request('frm1701:txtPg1mI3FSchdAEX1')."frm1701:txtPg1mI3FSchdAEX1=</div>	
            <div>frm1701:txtPg1mI4BSchdAEX1=".request('frm1701:txtPg1mI4BSchdAEX1')."frm1701:txtPg1mI4BSchdAEX1=</div>	
            <div>frm1701:txtPg1mI4ESchdAEX1=".request('frm1701:txtPg1mI4ESchdAEX1')."frm1701:txtPg1mI4ESchdAEX1=</div>	
            <div>frm1701:txtPg1mI5ASchdAEX1=".request('frm1701:txtPg1mI5ASchdAEX1')."frm1701:txtPg1mI5ASchdAEX1=</div>	
            <div>frm1701:txtPg1mI5BSchdAEX1=".request('frm1701:txtPg1mI5BSchdAEX1')."frm1701:txtPg1mI5BSchdAEX1=</div>	
            <div>frm1701:txtPg1mI5CSchdAEX1=".request('frm1701:txtPg1mI5CSchdAEX1')."frm1701:txtPg1mI5CSchdAEX1=</div>	
            <div>frm1701:txtPg1mI5DSchdAEX1=".request('frm1701:txtPg1mI5DSchdAEX1')."frm1701:txtPg1mI5DSchdAEX1=</div>	
            <div>frm1701:txtPg1mI5ESchdAEX1=".request('frm1701:txtPg1mI5ESchdAEX1')."frm1701:txtPg1mI5ESchdAEX1=</div>	
            <div>frm1701:txtPg1mI5FSchdAEX1=".request('frm1701:txtPg1mI5FSchdAEX1')."frm1701:txtPg1mI5FSchdAEX1=</div>	
            <div>frm1701:txtPg1mI6ASchdAEX1=".request('frm1701:txtPg1mI6ASchdAEX1')."frm1701:txtPg1mI6ASchdAEX1=</div>	
            <div>frm1701:txtPg1mI6BSchdAEX1=".request('frm1701:txtPg1mI6BSchdAEX1')."frm1701:txtPg1mI6BSchdAEX1=</div>	
            <div>frm1701:txtPg1mI6CSchdAEX1=".request('frm1701:txtPg1mI6CSchdAEX1')."frm1701:txtPg1mI6CSchdAEX1=</div>	
            <div>frm1701:txtPg1mI6DSchdAEX1=".request('frm1701:txtPg1mI6DSchdAEX1')."frm1701:txtPg1mI6DSchdAEX1=</div>	
            <div>frm1701:txtPg1mI6ESchdAEX1=".request('frm1701:txtPg1mI6ESchdAEX1')."frm1701:txtPg1mI6ESchdAEX1=</div>	
            <div>frm1701:txtPg1mI6FSchdAEX1=".request('frm1701:txtPg1mI6FSchdAEX1')."frm1701:txtPg1mI6FSchdAEX1=</div>	
            <div>frm1701:txtPg1mI1ASchdBEX1=".request('frm1701:txtPg1mI1ASchdBEX1')."frm1701:txtPg1mI1ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI1BSchdBEX1=".request('frm1701:txtPg1mI1BSchdBEX1')."frm1701:txtPg1mI1BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI1CSchdBEX1=".request('frm1701:txtPg1mI1CSchdBEX1')."frm1701:txtPg1mI1CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI1DSchdBEX1=".request('frm1701:txtPg1mI1DSchdBEX1')."frm1701:txtPg1mI1DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI1ESchdBEX1=".request('frm1701:txtPg1mI1ESchdBEX1')."frm1701:txtPg1mI1ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI1FSchdBEX1=".request('frm1701:txtPg1mI1FSchdBEX1')."frm1701:txtPg1mI1FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI1GSchdBEX1=".request('frm1701:txtPg1mI1GSchdBEX1')."frm1701:txtPg1mI1GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI1HSchdBEX1=".request('frm1701:txtPg1mI1HSchdBEX1')."frm1701:txtPg1mI1HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI2ASchdBEX1=".request('frm1701:txtPg1mI2ASchdBEX1')."frm1701:txtPg1mI2ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI2BSchdBEX1=".request('frm1701:txtPg1mI2BSchdBEX1')."frm1701:txtPg1mI2BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI2CSchdBEX1=".request('frm1701:txtPg1mI2CSchdBEX1')."frm1701:txtPg1mI2CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI2DSchdBEX1=".request('frm1701:txtPg1mI2DSchdBEX1')."frm1701:txtPg1mI2DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI2ESchdBEX1=".request('frm1701:txtPg1mI2ESchdBEX1')."frm1701:txtPg1mI2ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI2FSchdBEX1=".request('frm1701:txtPg1mI2FSchdBEX1')."frm1701:txtPg1mI2FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI2GSchdBEX1=".request('frm1701:txtPg1mI2GSchdBEX1')."frm1701:txtPg1mI2GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI2HSchdBEX1=".request('frm1701:txtPg1mI2HSchdBEX1')."frm1701:txtPg1mI2HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI3ASchdBEX1=".request('frm1701:txtPg1mI3ASchdBEX1')."frm1701:txtPg1mI3ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI3BSchdBEX1=".request('frm1701:txtPg1mI3BSchdBEX1')."frm1701:txtPg1mI3BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI3CSchdBEX1=".request('frm1701:txtPg1mI3CSchdBEX1')."frm1701:txtPg1mI3CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI3DSchdBEX1=".request('frm1701:txtPg1mI3DSchdBEX1')."frm1701:txtPg1mI3DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI3ESchdBEX1=".request('frm1701:txtPg1mI3ESchdBEX1')."frm1701:txtPg1mI3ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI3FSchdBEX1=".request('frm1701:txtPg1mI3FSchdBEX1')."frm1701:txtPg1mI3FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI3GSchdBEX1=".request('frm1701:txtPg1mI3GSchdBEX1')."frm1701:txtPg1mI3GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI3HSchdBEX1=".request('frm1701:txtPg1mI3HSchdBEX1')."frm1701:txtPg1mI3HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI4ASchdBEX1=".request('frm1701:txtPg1mI4ASchdBEX1')."frm1701:txtPg1mI4ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI4BSchdBEX1=".request('frm1701:txtPg1mI4BSchdBEX1')."frm1701:txtPg1mI4BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI4CSchdBEX1=".request('frm1701:txtPg1mI4CSchdBEX1')."frm1701:txtPg1mI4CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI4DSchdBEX1=".request('frm1701:txtPg1mI4DSchdBEX1')."frm1701:txtPg1mI4DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI4ESchdBEX1=".request('frm1701:txtPg1mI4ESchdBEX1')."frm1701:txtPg1mI4ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI4FSchdBEX1=".request('frm1701:txtPg1mI4FSchdBEX1')."frm1701:txtPg1mI4FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI4GSchdBEX1=".request('frm1701:txtPg1mI4GSchdBEX1')."frm1701:txtPg1mI4GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI4HSchdBEX1=".request('frm1701:txtPg1mI4HSchdBEX1')."frm1701:txtPg1mI4HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI5ASchdBEX1=".request('frm1701:txtPg1mI5ASchdBEX1')."frm1701:txtPg1mI5ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI5BSchdBEX1=".request('frm1701:txtPg1mI5BSchdBEX1')."frm1701:txtPg1mI5BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI5CSchdBEX1=".request('frm1701:txtPg1mI5CSchdBEX1')."frm1701:txtPg1mI5CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI5DSchdBEX1=".request('frm1701:txtPg1mI5DSchdBEX1')."frm1701:txtPg1mI5DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI5ESchdBEX1=".request('frm1701:txtPg1mI5ESchdBEX1')."frm1701:txtPg1mI5ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI5FSchdBEX1=".request('frm1701:txtPg1mI5FSchdBEX1')."frm1701:txtPg1mI5FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI5GSchdBEX1=".request('frm1701:txtPg1mI5GSchdBEX1')."frm1701:txtPg1mI5GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI5HSchdBEX1=".request('frm1701:txtPg1mI5HSchdBEX1')."frm1701:txtPg1mI5HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI6ASchdBEX1=".request('frm1701:txtPg1mI6ASchdBEX1')."frm1701:txtPg1mI6ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI6BSchdBEX1=".request('frm1701:txtPg1mI6BSchdBEX1')."frm1701:txtPg1mI6BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI6CSchdBEX1=".request('frm1701:txtPg1mI6CSchdBEX1')."frm1701:txtPg1mI6CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI6DSchdBEX1=".request('frm1701:txtPg1mI6DSchdBEX1')."frm1701:txtPg1mI6DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI6ESchdBEX1=".request('frm1701:txtPg1mI6ESchdBEX1')."frm1701:txtPg1mI6ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI6FSchdBEX1=".request('frm1701:txtPg1mI6FSchdBEX1')."frm1701:txtPg1mI6FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI6GSchdBEX1=".request('frm1701:txtPg1mI6GSchdBEX1')."frm1701:txtPg1mI6GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI6HSchdBEX1=".request('frm1701:txtPg1mI6HSchdBEX1')."frm1701:txtPg1mI6HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI7ASchdBEX1=".request('frm1701:txtPg1mI7ASchdBEX1')."frm1701:txtPg1mI7ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI7BSchdBEX1=".request('frm1701:txtPg1mI7BSchdBEX1')."frm1701:txtPg1mI7BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI7CSchdBEX1=".request('frm1701:txtPg1mI7CSchdBEX1')."frm1701:txtPg1mI7CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI7DSchdBEX1=".request('frm1701:txtPg1mI7DSchdBEX1')."frm1701:txtPg1mI7DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI7ESchdBEX1=".request('frm1701:txtPg1mI7ESchdBEX1')."frm1701:txtPg1mI7ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI7FSchdBEX1=".request('frm1701:txtPg1mI7FSchdBEX1')."frm1701:txtPg1mI7FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI7GSchdBEX1=".request('frm1701:txtPg1mI7GSchdBEX1')."frm1701:txtPg1mI7GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI7HSchdBEX1=".request('frm1701:txtPg1mI7HSchdBEX1')."frm1701:txtPg1mI7HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI8CSchdBEX1=".request('frm1701:txtPg1mI8CSchdBEX1')."frm1701:txtPg1mI8CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI8DSchdBEX1=".request('frm1701:txtPg1mI8DSchdBEX1')."frm1701:txtPg1mI8DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI8GSchdBEX1=".request('frm1701:txtPg1mI8GSchdBEX1')."frm1701:txtPg1mI8GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI8HSchdBEX1=".request('frm1701:txtPg1mI8HSchdBEX1')."frm1701:txtPg1mI8HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI9ASchdBEX1=".request('frm1701:txtPg1mI9ASchdBEX1')."frm1701:txtPg1mI9ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI9BSchdBEX1=".request('frm1701:txtPg1mI9BSchdBEX1')."frm1701:txtPg1mI9BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI9CSchdBEX1=".request('frm1701:txtPg1mI9CSchdBEX1')."frm1701:txtPg1mI9CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI9DSchdBEX1=".request('frm1701:txtPg1mI9DSchdBEX1')."frm1701:txtPg1mI9DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI9ESchdBEX1=".request('frm1701:txtPg1mI9ESchdBEX1')."frm1701:txtPg1mI9ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI9FSchdBEX1=".request('frm1701:txtPg1mI9FSchdBEX1')."frm1701:txtPg1mI9FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI9GSchdBEX1=".request('frm1701:txtPg1mI9GSchdBEX1')."frm1701:txtPg1mI9GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI9HSchdBEX1=".request('frm1701:txtPg1mI9HSchdBEX1')."frm1701:txtPg1mI9HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI10CSchdBEX1=".request('frm1701:txtPg1mI10CSchdBEX1')."frm1701:txtPg1mI10CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI10DSchdBEX1=".request('frm1701:txtPg1mI10DSchdBEX1')."frm1701:txtPg1mI10DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI10GSchdBEX1=".request('frm1701:txtPg1mI10GSchdBEX1')."frm1701:txtPg1mI10GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI10HSchdBEX1=".request('frm1701:txtPg1mI10HSchdBEX1')."frm1701:txtPg1mI10HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI11ASchdBEX1=".request('frm1701:txtPg1mI11ASchdBEX1')."frm1701:txtPg1mI11ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI11BSchdBEX1=".request('frm1701:txtPg1mI11BSchdBEX1')."frm1701:txtPg1mI11BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI11CSchdBEX1=".request('frm1701:txtPg1mI11CSchdBEX1')."frm1701:txtPg1mI11CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI11DSchdBEX1=".request('frm1701:txtPg1mI11DSchdBEX1')."frm1701:txtPg1mI11DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI11ESchdBEX1=".request('frm1701:txtPg1mI11ESchdBEX1')."frm1701:txtPg1mI11ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI11FSchdBEX1=".request('frm1701:txtPg1mI11FSchdBEX1')."frm1701:txtPg1mI11FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI11GSchdBEX1=".request('frm1701:txtPg1mI11GSchdBEX1')."frm1701:txtPg1mI11GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI11HSchdBEX1=".request('frm1701:txtPg1mI11HSchdBEX1')."frm1701:txtPg1mI11HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI12DescSchdBEX1=".request('frm1701:txtPg1mI12DescSchdBEX1')."frm1701:txtPg1mI12DescSchdBEX1=</div>	
            <div>frm1701:txtPg1mI12ASchdBEX1=".request('frm1701:txtPg1mI12ASchdBEX1')."frm1701:txtPg1mI12ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI12BSchdBEX1=".request('frm1701:txtPg1mI12BSchdBEX1')."frm1701:txtPg1mI12BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI12CSchdBEX1=".request('frm1701:txtPg1mI12CSchdBEX1')."frm1701:txtPg1mI12CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI12DSchdBEX1=".request('frm1701:txtPg1mI12DSchdBEX1')."frm1701:txtPg1mI12DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI12ESchdBEX1=".request('frm1701:txtPg1mI12ESchdBEX1')."frm1701:txtPg1mI12ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI12FSchdBEX1=".request('frm1701:txtPg1mI12FSchdBEX1')."frm1701:txtPg1mI12FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI12GSchdBEX1=".request('frm1701:txtPg1mI12GSchdBEX1')."frm1701:txtPg1mI12GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI12HSchdBEX1=".request('frm1701:txtPg1mI12HSchdBEX1')."frm1701:txtPg1mI12HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI13DescSchdBEX1=".request('frm1701:txtPg1mI13DescSchdBEX1')."frm1701:txtPg1mI13DescSchdBEX1=</div>	
            <div>frm1701:txtPg1mI13ASchdBEX1=".request('frm1701:txtPg1mI13ASchdBEX1')."frm1701:txtPg1mI13ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI13BSchdBEX1=".request('frm1701:txtPg1mI13BSchdBEX1')."frm1701:txtPg1mI13BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI13CSchdBEX1=".request('frm1701:txtPg1mI13CSchdBEX1')."frm1701:txtPg1mI13CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI13DSchdBEX1=".request('frm1701:txtPg1mI13DSchdBEX1')."frm1701:txtPg1mI13DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI13ESchdBEX1=".request('frm1701:txtPg1mI13ESchdBEX1')."frm1701:txtPg1mI13ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI13FSchdBEX1=".request('frm1701:txtPg1mI13FSchdBEX1')."frm1701:txtPg1mI13FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI13GSchdBEX1=".request('frm1701:txtPg1mI13GSchdBEX1')."frm1701:txtPg1mI13GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI13HSchdBEX1=".request('frm1701:txtPg1mI13HSchdBEX1')."frm1701:txtPg1mI13HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI14CSchdBEX1=".request('frm1701:txtPg1mI14CSchdBEX1')."frm1701:txtPg1mI14CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI14DSchdBEX1=".request('frm1701:txtPg1mI14DSchdBEX1')."frm1701:txtPg1mI14DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI14GSchdBEX1=".request('frm1701:txtPg1mI14GSchdBEX1')."frm1701:txtPg1mI14GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI14HSchdBEX1=".request('frm1701:txtPg1mI14HSchdBEX1')."frm1701:txtPg1mI14HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI15ASchdBEX1=".request('frm1701:txtPg1mI15ASchdBEX1')."frm1701:txtPg1mI15ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI15BSchdBEX1=".request('frm1701:txtPg1mI15BSchdBEX1')."frm1701:txtPg1mI15BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI15CSchdBEX1=".request('frm1701:txtPg1mI15CSchdBEX1')."frm1701:txtPg1mI15CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI15DSchdBEX1=".request('frm1701:txtPg1mI15DSchdBEX1')."frm1701:txtPg1mI15DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI15ESchdBEX1=".request('frm1701:txtPg1mI15ESchdBEX1')."frm1701:txtPg1mI15ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI15FSchdBEX1=".request('frm1701:txtPg1mI15FSchdBEX1')."frm1701:txtPg1mI15FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI15GSchdBEX1=".request('frm1701:txtPg1mI15GSchdBEX1')."frm1701:txtPg1mI15GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI15HSchdBEX1=".request('frm1701:txtPg1mI15HSchdBEX1')."frm1701:txtPg1mI15HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI16ASchdBEX1=".request('frm1701:txtPg1mI16ASchdBEX1')."frm1701:txtPg1mI16ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI16BSchdBEX1=".request('frm1701:txtPg1mI16BSchdBEX1')."frm1701:txtPg1mI16BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI16CSchdBEX1=".request('frm1701:txtPg1mI16CSchdBEX1')."frm1701:txtPg1mI16CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI16DSchdBEX1=".request('frm1701:txtPg1mI16DSchdBEX1')."frm1701:txtPg1mI16DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI16ESchdBEX1=".request('frm1701:txtPg1mI16ESchdBEX1')."frm1701:txtPg1mI16ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI16FSchdBEX1=".request('frm1701:txtPg1mI16FSchdBEX1')."frm1701:txtPg1mI16FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI16GSchdBEX1=".request('frm1701:txtPg1mI16GSchdBEX1')."frm1701:txtPg1mI16GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI16HSchdBEX1=".request('frm1701:txtPg1mI16HSchdBEX1')."frm1701:txtPg1mI16HSchdBEX1=</div>	
            <div>frm1701:txtPg1mI17ASchdBEX1=".request('frm1701:txtPg1mI17ASchdBEX1')."frm1701:txtPg1mI17ASchdBEX1=</div>	
            <div>frm1701:txtPg1mI17BSchdBEX1=".request('frm1701:txtPg1mI17BSchdBEX1')."frm1701:txtPg1mI17BSchdBEX1=</div>	
            <div>frm1701:txtPg1mI17CSchdBEX1=".request('frm1701:txtPg1mI17CSchdBEX1')."frm1701:txtPg1mI17CSchdBEX1=</div>	
            <div>frm1701:txtPg1mI17DSchdBEX1=".request('frm1701:txtPg1mI17DSchdBEX1')."frm1701:txtPg1mI17DSchdBEX1=</div>	
            <div>frm1701:txtPg1mI17ESchdBEX1=".request('frm1701:txtPg1mI17ESchdBEX1')."frm1701:txtPg1mI17ESchdBEX1=</div>	
            <div>frm1701:txtPg1mI17FSchdBEX1=".request('frm1701:txtPg1mI17FSchdBEX1')."frm1701:txtPg1mI17FSchdBEX1=</div>	
            <div>frm1701:txtPg1mI17GSchdBEX1=".request('frm1701:txtPg1mI17GSchdBEX1')."frm1701:txtPg1mI17GSchdBEX1=</div>	
            <div>frm1701:txtPg1mI17HSchdBEX1=".request('frm1701:txtPg1mI17HSchdBEX1')."frm1701:txtPg1mI17HSchdBEX1=</div>	
            <div>frm1701:txtPg2mTIN1=".request('frm1701:txtPg2TIN1')."frm1701:txtPg2mTIN1=</div>	
            <div>frm1701:txtPg2mTIN2=".request('frm1701:txtPg2TIN2')."frm1701:txtPg2mTIN2=</div>	
            <div>frm1701:txtPg2mTIN3=".request('frm1701:txtPg2TIN3')."frm1701:txtPg2mTIN3=</div>	
            <div>frm1701:txtPg2mBranchCode=".request('frm1701:txtPg2BranchCode')."frm1701:txtPg2mBranchCode=</div>	
            <div>frm1701:txtPg2mTaxpayerName=".request('frm1701:txtPg2TaxpayerName')."frm1701:txtPg2mTaxpayerName=</div>	
            <div>frm1701:txtPg2mI1ASchdCEX1=".request('frm1701:txtPg2mI1ASchdCEX1')."frm1701:txtPg2mI1ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI1BSchdCEX1=".request('frm1701:txtPg2mI1BSchdCEX1')."frm1701:txtPg2mI1BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI1CSchdCEX1=".request('frm1701:txtPg2mI1CSchdCEX1')."frm1701:txtPg2mI1CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI1DSchdCEX1=".request('frm1701:txtPg2mI1DSchdCEX1')."frm1701:txtPg2mI1DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI2ASchdCEX1=".request('frm1701:txtPg2mI2ASchdCEX1')."frm1701:txtPg2mI2ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI2BSchdCEX1=".request('frm1701:txtPg2mI2BSchdCEX1')."frm1701:txtPg2mI2BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI2CSchdCEX1=".request('frm1701:txtPg2mI2CSchdCEX1')."frm1701:txtPg2mI2CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI2DSchdCEX1=".request('frm1701:txtPg2mI2DSchdCEX1')."frm1701:txtPg2mI2DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI3ASchdCEX1=".request('frm1701:txtPg2mI3ASchdCEX1')."frm1701:txtPg2mI3ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI3BSchdCEX1=".request('frm1701:txtPg2mI3BSchdCEX1')."frm1701:txtPg2mI3BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI3CSchdCEX1=".request('frm1701:txtPg2mI3CSchdCEX1')."frm1701:txtPg2mI3CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI3DSchdCEX1=".request('frm1701:txtPg2mI3DSchdCEX1')."frm1701:txtPg2mI3DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI4ASchdCEX1=".request('frm1701:txtPg2mI4ASchdCEX1')."frm1701:txtPg2mI4ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI4BSchdCEX1=".request('frm1701:txtPg2mI4BSchdCEX1')."frm1701:txtPg2mI4BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI4CSchdCEX1=".request('frm1701:txtPg2mI4CSchdCEX1')."frm1701:txtPg2mI4CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI4DSchdCEX1=".request('frm1701:txtPg2mI4DSchdCEX1')."frm1701:txtPg2mI4DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI5ASchdCEX1=".request('frm1701:txtPg2mI5ASchdCEX1')."frm1701:txtPg2mI5ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI5BSchdCEX1=".request('frm1701:txtPg2mI5BSchdCEX1')."frm1701:txtPg2mI5BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI5CSchdCEX1=".request('frm1701:txtPg2mI5CSchdCEX1')."frm1701:txtPg2mI5CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI5DSchdCEX1=".request('frm1701:txtPg2mI5DSchdCEX1')."frm1701:txtPg2mI5DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI6ASchdCEX1=".request('frm1701:txtPg2mI6ASchdCEX1')."frm1701:txtPg2mI6ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI6BSchdCEX1=".request('frm1701:txtPg2mI6BSchdCEX1')."frm1701:txtPg2mI6BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI6CSchdCEX1=".request('frm1701:txtPg2mI6CSchdCEX1')."frm1701:txtPg2mI6CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI6DSchdCEX1=".request('frm1701:txtPg2mI6DSchdCEX1')."frm1701:txtPg2mI6DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI7ASchdCEX1=".request('frm1701:txtPg2mI7ASchdCEX1')."frm1701:txtPg2mI7ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI7BSchdCEX1=".request('frm1701:txtPg2mI7BSchdCEX1')."frm1701:txtPg2mI7BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI7CSchdCEX1=".request('frm1701:txtPg2mI7CSchdCEX1')."frm1701:txtPg2mI7CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI7DSchdCEX1=".request('frm1701:txtPg2mI7DSchdCEX1')."frm1701:txtPg2mI7DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI8ASchdCEX1=".request('frm1701:txtPg2mI8ASchdCEX1')."frm1701:txtPg2mI8ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI8BSchdCEX1=".request('frm1701:txtPg2mI8BSchdCEX1')."frm1701:txtPg2mI8BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI8CSchdCEX1=".request('frm1701:txtPg2mI8CSchdCEX1')."frm1701:txtPg2mI8CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI8DSchdCEX1=".request('frm1701:txtPg2mI8DSchdCEX1')."frm1701:txtPg2mI8DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI9ASchdCEX1=".request('frm1701:txtPg2mI9ASchdCEX1')."frm1701:txtPg2mI9ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI9BSchdCEX1=".request('frm1701:txtPg2mI9BSchdCEX1')."frm1701:txtPg2mI9BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI9CSchdCEX1=".request('frm1701:txtPg2mI9CSchdCEX1')."frm1701:txtPg2mI9CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI9DSchdCEX1=".request('frm1701:txtPg2mI9DSchdCEX1')."frm1701:txtPg2mI9DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI10ASchdCEX1=".request('frm1701:txtPg2mI10ASchdCEX1')."frm1701:txtPg2mI10ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI10BSchdCEX1=".request('frm1701:txtPg2mI10BSchdCEX1')."frm1701:txtPg2mI10BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI10CSchdCEX1=".request('frm1701:txtPg2mI10CSchdCEX1')."frm1701:txtPg2mI10CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI10DSchdCEX1=".request('frm1701:txtPg2mI10DSchdCEX1')."frm1701:txtPg2mI10DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI11ASchdCEX1=".request('frm1701:txtPg2mI11ASchdCEX1')."frm1701:txtPg2mI11ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI11BSchdCEX1=".request('frm1701:txtPg2mI11BSchdCEX1')."frm1701:txtPg2mI11BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI11CSchdCEX1=".request('frm1701:txtPg2mI11CSchdCEX1')."frm1701:txtPg2mI11CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI11DSchdCEX1=".request('frm1701:txtPg2mI11DSchdCEX1')."frm1701:txtPg2mI11DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI12ASchdCEX1=".request('frm1701:txtPg2mI12ASchdCEX1')."frm1701:txtPg2mI12ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI12BSchdCEX1=".request('frm1701:txtPg2mI12BSchdCEX1')."frm1701:txtPg2mI12BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI12CSchdCEX1=".request('frm1701:txtPg2mI12CSchdCEX1')."frm1701:txtPg2mI12CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI12DSchdCEX1=".request('frm1701:txtPg2mI12DSchdCEX1')."frm1701:txtPg2mI12DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI13ASchdCEX1=".request('frm1701:txtPg2mI13ASchdCEX1')."frm1701:txtPg2mI13ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI13BSchdCEX1=".request('frm1701:txtPg2mI13BSchdCEX1')."frm1701:txtPg2mI13BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI13CSchdCEX1=".request('frm1701:txtPg2mI13CSchdCEX1')."frm1701:txtPg2mI13CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI13DSchdCEX1=".request('frm1701:txtPg2mI13DSchdCEX1')."frm1701:txtPg2mI13DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI14ASchdCEX1=".request('frm1701:txtPg2mI14ASchdCEX1')."frm1701:txtPg2mI14ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI14BSchdCEX1=".request('frm1701:txtPg2mI14BSchdCEX1')."frm1701:txtPg2mI14BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI14CSchdCEX1=".request('frm1701:txtPg2mI14CSchdCEX1')."frm1701:txtPg2mI14CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI14DSchdCEX1=".request('frm1701:txtPg2mI14DSchdCEX1')."frm1701:txtPg2mI14DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI15ASchdCEX1=".request('frm1701:txtPg2mI15ASchdCEX1')."frm1701:txtPg2mI15ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI15BSchdCEX1=".request('frm1701:txtPg2mI15BSchdCEX1')."frm1701:txtPg2mI15BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI15CSchdCEX1=".request('frm1701:txtPg2mI15CSchdCEX1')."frm1701:txtPg2mI15CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI15DSchdCEX1=".request('frm1701:txtPg2mI15DSchdCEX1')."frm1701:txtPg2mI15DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI16ASchdCEX1=".request('frm1701:txtPg2mI16ASchdCEX1')."frm1701:txtPg2mI16ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI16BSchdCEX1=".request('frm1701:txtPg2mI16BSchdCEX1')."frm1701:txtPg2mI16BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI16CSchdCEX1=".request('frm1701:txtPg2mI16CSchdCEX1')."frm1701:txtPg2mI16CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI16DSchdCEX1=".request('frm1701:txtPg2mI16DSchdCEX1')."frm1701:txtPg2mI16DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17aASchdCEX1=".request('frm1701:txtPg2mI17aASchdCEX1')."frm1701:txtPg2mI17aASchdCEX1=</div>	
            <div>frm1701:txtPg2mI17aBSchdCEX1=".request('frm1701:txtPg2mI17aBSchdCEX1')."frm1701:txtPg2mI17aBSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17aCSchdCEX1=".request('frm1701:txtPg2mI17aCSchdCEX1')."frm1701:txtPg2mI17aCSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17aDSchdCEX1=".request('frm1701:txtPg2mI17aDSchdCEX1')."frm1701:txtPg2mI17aDSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17bASchdCEX1=".request('frm1701:txtPg2mI17bASchdCEX1')."frm1701:txtPg2mI17bASchdCEX1=</div>	
            <div>frm1701:txtPg2mI17bBSchdCEX1=".request('frm1701:txtPg2mI17bBSchdCEX1')."frm1701:txtPg2mI17bBSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17bCSchdCEX1=".request('frm1701:txtPg2mI17bCSchdCEX1')."frm1701:txtPg2mI17bCSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17bDSchdCEX1=".request('frm1701:txtPg2mI17bDSchdCEX1')."frm1701:txtPg2mI17bDSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17cASchdCEX1=".request('frm1701:txtPg2mI17cASchdCEX1')."frm1701:txtPg2mI17cASchdCEX1=</div>	
            <div>frm1701:txtPg2mI17cBSchdCEX1=".request('frm1701:txtPg2mI17cBSchdCEX1')."frm1701:txtPg2mI17cBSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17cCSchdCEX1=".request('frm1701:txtPg2mI17cCSchdCEX1')."frm1701:txtPg2mI17cCSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17cDSchdCEX1=".request('frm1701:txtPg2mI17cDSchdCEX1')."frm1701:txtPg2mI17cDSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17dDescSchdCEX1=".request('frm1701:txtPg2mI17dDescSchdCEX1')."frm1701:txtPg2mI17dDescSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17dASchdCEX1=".request('frm1701:txtPg2mI17dASchdCEX1')."frm1701:txtPg2mI17dASchdCEX1=</div>	
            <div>frm1701:txtPg2mI17dBSchdCEX1=".request('frm1701:txtPg2mI17dBSchdCEX1')."frm1701:txtPg2mI17dBSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17dCSchdCEX1=".request('frm1701:txtPg2mI17dCSchdCEX1')."frm1701:txtPg2mI17dCSchdCEX1=</div>	
            <div>frm1701:txtPg2mI17dDSchdCEX1=".request('frm1701:txtPg2mI17dDSchdCEX1')."frm1701:txtPg2mI17dDSchdCEX1=</div>	
            <div>frm1701:txtPg2mI18ASchdCEX1=".request('frm1701:txtPg2mI17dASchdCEX1')."frm1701:txtPg2mI18ASchdCEX1=</div>	
            <div>frm1701:txtPg2mI18BSchdCEX1=".request('frm1701:txtPg2mI17dBSchdCEX1')."frm1701:txtPg2mI18BSchdCEX1=</div>	
            <div>frm1701:txtPg2mI18CSchdCEX1=".request('frm1701:txtPg2mI17dCSchdCEX1')."frm1701:txtPg2mI18CSchdCEX1=</div>	
            <div>frm1701:txtPg2mI18DSchdCEX1=".request('frm1701:txtPg2mI17dDSchdCEX1')."frm1701:txtPg2mI18DSchdCEX1=</div>	
            <div>frm1701:txtPg2mI1DescSchdDEX1=".request('frm1701:txtPg2mI1DescSchdDEX1')."frm1701:txtPg2mI1DescSchdDEX1=</div>	
            <div>frm1701:txtPg2mI1LBSchdDEX1=".request('frm1701:txtPg2mI1LBSchdDEX1')."frm1701:txtPg2mI1LBSchdDEX1=</div>	
            <div>frm1701:txtPg2mI1ASchdDEX1=".request('frm1701:txtPg2mI1ASchdDEX1')."frm1701:txtPg2mI1ASchdDEX1=</div>	
            <div>frm1701:txtPg2mI1BSchdDEX1=".request('frm1701:txtPg2mI1BSchdDEX1')."frm1701:txtPg2mI1BSchdDEX1=</div>	
            <div>frm1701:txtPg2mI2DescSchdDEX1=".request('frm1701:txtPg2mI2DescSchdDEX1')."frm1701:txtPg2mI2DescSchdDEX1=</div>	
            <div>frm1701:txtPg2mI2LBSchdDEX1=".request('frm1701:txtPg2mI2LBSchdDEX1')."frm1701:txtPg2mI2LBSchdDEX1=</div>	
            <div>frm1701:txtPg2mI2ASchdDEX1=".request('frm1701:txtPg2mI2ASchdDEX1')."frm1701:txtPg2mI2ASchdDEX1=</div>	
            <div>frm1701:txtPg2mI2BSchdDEX1=".request('frm1701:txtPg2mI2BSchdDEX1')."frm1701:txtPg2mI2BSchdDEX1=</div>	
            <div>frm1701:txtPg2mI3DescSchdDEX1=".request('frm1701:txtPg2mI3DescSchdDEX1')."frm1701:txtPg2mI3DescSchdDEX1=</div>	
            <div>frm1701:txtPg2mI3LBSchdDEX1=".request('frm1701:txtPg2mI3LBSchdDEX1')."frm1701:txtPg2mI3LBSchdDEX1=</div>	
            <div>frm1701:txtPg2mI3ASchdDEX1=".request('frm1701:txtPg2mI3ASchdDEX1')."frm1701:txtPg2mI3ASchdDEX1=</div>	
            <div>frm1701:txtPg2mI3BSchdDEX1=".request('frm1701:txtPg2mI3BSchdDEX1')."frm1701:txtPg2mI3BSchdDEX1=</div>	
            <div>frm1701:txtPg2mI4DescSchdDEX1=".request('frm1701:txtPg2mI4DescSchdDEX1')."frm1701:txtPg2mI4DescSchdDEX1=</div>	
            <div>frm1701:txtPg2mI4LBSchdDEX1=".request('frm1701:txtPg2mI4LBSchdDEX1')."frm1701:txtPg2mI4LBSchdDEX1=</div>	
            <div>frm1701:txtPg2mI4ASchdDEX1=".request('frm1701:txtPg2mI4ASchdDEX1')."frm1701:txtPg2mI4ASchdDEX1=</div>	
            <div>frm1701:txtPg2mI4BSchdDEX1=".request('frm1701:txtPg2mI4BSchdDEX1')."frm1701:txtPg2mI4BSchdDEX1=</div>	
            <div>frm1701:txtPg2mI5ASchdDEX1=".request('frm1701:txtPg2mI5ASchdDEX1')."frm1701:txtPg2mI5ASchdDEX1=</div>	
            <div>frm1701:txtPg2mI5BSchdDEX1=".request('frm1701:txtPg2mI5BSchdDEX1')."frm1701:txtPg2mI5BSchdDEX1=</div>	
            <div>frm1701:txtPg3mTIN1=".request('frm1701:txtPg2TIN1')."frm1701:txtPg3mTIN1=</div>	
            <div>frm1701:txtPg3mTIN2=".request('frm1701:txtPg2TIN2')."frm1701:txtPg3mTIN2=</div>	
            <div>frm1701:txtPg3mTIN3=".request('frm1701:txtPg2TIN3')."frm1701:txtPg3mTIN3=</div>	
            <div>frm1701:txtPg3mBranchCode=".request('frm1701:txtPg2BranchCode')."frm1701:txtPg3mBranchCode=</div>	
            <div>frm1701:txtPg3mTaxpayerName=".request('frm1701:txtPg2TaxpayerName')."frm1701:txtPg3mTaxpayerName=</div>	
            <div>frm1701:rdoPg3mExemptEX1=".$rdoPg3mExemptEX1."frm1701:rdoPg3mExemptEX1=</div>	
            <div>frm1701:rdoPg1mSpecialRateEX1=".$rdoPg1mSpecialRateEX1."frm1701:rdoPg1mSpecialRateEX1=</div>	
            <div>frm1701:txtPg3mSchedA_1AEX1=".request('frm1701:txtPg3mSchedA_1AEX1')."frm1701:txtPg3mSchedA_1AEX1=</div>	
            <div>frm1701:txtPg3mSchedA_1BEX1=".request('frm1701:txtPg3mSchedA_1BEX1')."frm1701:txtPg3mSchedA_1BEX1=</div>	
            <div>frm1701:txtPg3mSchedA_2AEX1=".request('frm1701:txtPg3mSchedA_2AEX1')."frm1701:txtPg3mSchedA_2AEX1=</div>	
            <div>frm1701:txtPg3mSchedA_2BEX1=".request('frm1701:txtPg3mSchedA_2BEX1')."frm1701:txtPg3mSchedA_2BEX1=</div>	
            <div>frm1701:txtPg3mSchedA_3AEX1=".request('frm1701:txtPg3mSchedA_3AEX1')."frm1701:txtPg3mSchedA_3AEX1=</div>	
            <div>frm1701:txtPg3mSchedA_3BEX1=".request('frm1701:txtPg3mSchedA_3BEX1')."frm1701:txtPg3mSchedA_3BEX1=</div>	
            <div>frm1701:txtPg3mSchedA_4AEX1=".request('frm1701:txtPg3mSchedA_4AEX1')."frm1701:txtPg3mSchedA_4AEX1=</div>	
            <div>frm1701:txtPg3mSchedA_4BEX1=".request('frm1701:txtPg3mSchedA_4BEX1')."frm1701:txtPg3mSchedA_4BEX1=</div>	
            <div>frm1701:txtPg3mSchedA_5AEX1=".request('frm1701:txtPg3mSchedA_5AEX1')."frm1701:txtPg3mSchedA_5AEX1=</div>	
            <div>frm1701:txtPg3mSchedA_5BEX1=".request('frm1701:txtPg3mSchedA_5BEX1')."frm1701:txtPg3mSchedA_5BEX1=</div>	
            <div>frm1701:txtPg3mSchedA_6AEX1=".request('frm1701:txtPg3mSchedA_6AEX1')."frm1701:txtPg3mSchedA_6AEX1=</div>	
            <div>frm1701:txtPg3mSchedA_6BEX1=".request('frm1701:txtPg3mSchedA_6BEX1')."frm1701:txtPg3mSchedA_6BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_1AEX1=".request('frm1701:txtPg3mSchedB_1AEX1')."frm1701:txtPg3mSchedB_1AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_1BEX1=".request('frm1701:txtPg3mSchedB_1BEX1')."frm1701:txtPg3mSchedB_1BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_2AEX1=".request('frm1701:txtPg3mSchedB_2AEX1')."frm1701:txtPg3mSchedB_2AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_2BEX1=".request('frm1701:txtPg3mSchedB_2BEX1')."frm1701:txtPg3mSchedB_2BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_3AEX1=".request('frm1701:txtPg3mSchedB_3AEX1')."frm1701:txtPg3mSchedB_3AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_3BEX1=".request('frm1701:txtPg3mSchedB_3BEX1')."frm1701:txtPg3mSchedB_3BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_4AEX1=".request('frm1701:txtPg3mSchedB_4AEX1')."frm1701:txtPg3mSchedB_4AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_4BEX1=".request('frm1701:txtPg3mSchedB_4BEX1')."frm1701:txtPg3mSchedB_4BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_5AEX1=".request('frm1701:txtPg3mSchedB_5AEX1')."frm1701:txtPg3mSchedB_5AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_5BEX1=".request('frm1701:txtPg3mSchedB_5BEX1')."frm1701:txtPg3mSchedB_5BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_6AEX1=".request('frm1701:txtPg3mSchedB_6AEX1')."frm1701:txtPg3mSchedB_6AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_6BEX1=".request('frm1701:txtPg3mSchedB_6BEX1')."frm1701:txtPg3mSchedB_6BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_7AEX1=".request('frm1701:txtPg3mSchedB_7AEX1')."frm1701:txtPg3mSchedB_7AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_7BEX1=".request('frm1701:txtPg3mSchedB_7BEX1')."frm1701:txtPg3mSchedB_7BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_8AEX1=".request('frm1701:txtPg3mSchedB_8AEX1')."frm1701:txtPg3mSchedB_8AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_8BEX1=".request('frm1701:txtPg3mSchedB_8AEX1')."frm1701:txtPg3mSchedB_8BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_9AEX1=".request('frm1701:txtPg3mSchedB_9AEX1')."frm1701:txtPg3mSchedB_9AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_9BEX1=".request('frm1701:txtPg3mSchedB_9BEX1')."frm1701:txtPg3mSchedB_9BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_10EX1=".request('frm1701:txtPg3mSchedB_10EX1')."frm1701:txtPg3mSchedB_10EX1=</div>	
            <div>frm1701:txtPg3mSchedB_10AEX1=".request('frm1701:txtPg3mSchedB_10AEX1')."frm1701:txtPg3mSchedB_10AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_10BEX1=".request('frm1701:txtPg3mSchedB_10BEX1')."frm1701:txtPg3mSchedB_10BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_11EX1=".request('frm1701:txtPg3mSchedB_11EX1')."frm1701:txtPg3mSchedB_11EX1=</div>	
            <div>frm1701:txtPg3mSchedB_11AEX1=".request('frm1701:txtPg3mSchedB_11AEX1')."frm1701:txtPg3mSchedB_11AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_11BEX1=".request('frm1701:txtPg3mSchedB_11BEX1')."frm1701:txtPg3mSchedB_11BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_12AEX1=".request('frm1701:txtPg3mSchedB_12AEX1')."frm1701:txtPg3mSchedB_12AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_12BEX1=".request('frm1701:txtPg3mSchedB_12BEX1')."frm1701:txtPg3mSchedB_12BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_13AEX1=".request('frm1701:txtPg3mSchedB_13AEX1')."frm1701:txtPg3mSchedB_13AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_13BEX1=".request('frm1701:txtPg3mSchedB_13BEX1')."frm1701:txtPg3mSchedB_13BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_14AEX1=".request('frm1701:txtPg3mSchedB_14AEX1')."frm1701:txtPg3mSchedB_14AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_14BEX1=".request('frm1701:txtPg3mSchedB_14BEX1')."frm1701:txtPg3mSchedB_14BEX1=</div>	
            <div>frm1701:txtPg3mSchedB_15AEX1=".request('frm1701:txtPg3mSchedB_15AEX1')."frm1701:txtPg3mSchedB_15AEX1=</div>	
            <div>frm1701:txtPg3mSchedB_15BEX1=".request('frm1701:txtPg3mSchedB_15BEX1')."frm1701:txtPg3mSchedB_15BEX1=</div>	
            <div>frm1701:txtPg3mSchedC_1AEX1=".request('frm1701:txtPg3mSchedC_1AEX1')."frm1701:txtPg3mSchedC_1AEX1=</div>	
            <div>frm1701:txtPg3mSchedC_1BEX1=".request('frm1701:txtPg3mSchedC_1BEX1')."frm1701:txtPg3mSchedC_1BEX1=</div>	
            <div>frm1701:txtPg3mSchedC_2AEX1=".request('frm1701:txtPg3mSchedC_2AEX1')."frm1701:txtPg3mSchedC_2AEX1=</div>	
            <div>frm1701:txtPg3mSchedC_2BEX1=".request('frm1701:txtPg3mSchedC_2BEX1')."frm1701:txtPg3mSchedC_2BEX1=</div>	
            <div>frm1701:txtPg3mSchedC_3AEX1=".request('frm1701:txtPg3mSchedC_3AEX1')."frm1701:txtPg3mSchedC_3AEX1=</div>	
            <div>frm1701:txtPg3mSchedC_3BEX1=".request('frm1701:txtPg3mSchedC_3BEX1')."frm1701:txtPg3mSchedC_3BEX1=</div>	
            <div>frm1701:txtPg4mTIN1=".request('frm1701:txtPg2TIN1')."frm1701:txtPg4mTIN1=</div>	
            <div>frm1701:txtPg4mTIN2=".request('frm1701:txtPg2TIN2')."frm1701:txtPg4mTIN2=</div>	
            <div>frm1701:txtPg4mTIN3=".request('frm1701:txtPg2TIN3')."frm1701:txtPg4mTIN3=</div>	
            <div>frm1701:txtPg4mBranchCode=".request('frm1701:txtPg2BranchCode')."frm1701:txtPg4mBranchCode=</div>	
            <div>frm1701:txtPg4mTaxpayerName=".request('frm1701:txtPg2TaxpayerName')."frm1701:txtPg4mTaxpayerName=</div>	
            <div>frm1701:txtPg4mSchedC_4AEX1=".request('frm1701:txtPg4mSchedC_4AEX1')."frm1701:txtPg4mSchedC_4AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_4BEX1=".request('frm1701:txtPg4mSchedC_4BEX1')."frm1701:txtPg4mSchedC_4BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_5AEX1=".request('frm1701:txtPg4mSchedC_5AEX1')."frm1701:txtPg4mSchedC_5AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_5BEX1=".request('frm1701:txtPg4mSchedC_5BEX1')."frm1701:txtPg4mSchedC_5BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_6AEX1=".request('frm1701:txtPg4mSchedC_6AEX1')."frm1701:txtPg4mSchedC_6AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_6BEX1=".request('frm1701:txtPg4mSchedC_6BEX1')."frm1701:txtPg4mSchedC_6BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_7AEX1=".request('frm1701:txtPg4mSchedC_7AEX1')."frm1701:txtPg4mSchedC_7AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_7BEX1=".request('frm1701:txtPg4mSchedC_7BEX1')."frm1701:txtPg4mSchedC_7BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_8AEX1=".request('frm1701:txtPg4mSchedC_8AEX1')."frm1701:txtPg4mSchedC_8AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_8BEX1=".request('frm1701:txtPg4mSchedC_8BEX1')."frm1701:txtPg4mSchedC_8BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_9AEX1=".request('frm1701:txtPg4mSchedC_9AEX1')."frm1701:txtPg4mSchedC_9AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_9BEX1=".request('frm1701:txtPg4mSchedC_9BEX1')."frm1701:txtPg4mSchedC_9BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_10AEX1=".request('frm1701:txtPg4mSchedC_10AEX1')."frm1701:txtPg4mSchedC_10AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_10BEX1=".request('frm1701:txtPg4mSchedC_10BEX1')."frm1701:txtPg4mSchedC_10BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_11AEX1=".request('frm1701:txtPg4mSchedC_11AEX1')."frm1701:txtPg4mSchedC_11AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_11BEX1=".request('frm1701:txtPg4mSchedC_11BEX1')."frm1701:txtPg4mSchedC_11BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_12AEX1=".request('frm1701:txtPg4mSchedC_12AEX1')."frm1701:txtPg4mSchedC_12AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_12BEX1=".request('frm1701:txtPg4mSchedC_12BEX1')."frm1701:txtPg4mSchedC_12BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_13AEX1=".request('frm1701:txtPg4mSchedC_13AEX1')."frm1701:txtPg4mSchedC_13AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_13BEX1=".request('frm1701:txtPg4mSchedC_13BEX1')."frm1701:txtPg4mSchedC_13BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_14AEX1=".request('frm1701:txtPg4mSchedC_14AEX1')."frm1701:txtPg4mSchedC_14AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_14BEX1=".request('frm1701:txtPg4mSchedC_14BEX1')."frm1701:txtPg4mSchedC_14BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_15AEX1=".request('frm1701:txtPg4mSchedC_15AEX1')."frm1701:txtPg4mSchedC_15AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_15BEX1=".request('frm1701:txtPg4mSchedC_15BEX1')."frm1701:txtPg4mSchedC_15BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_16AEX1=".request('frm1701:txtPg4mSchedC_16AEX1')."frm1701:txtPg4mSchedC_16AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_16BEX1=".request('frm1701:txtPg4mSchedC_16BEX1')."frm1701:txtPg4mSchedC_16BEX1=</div>	
            <div>frm1701:txtPg4mSchedC_17aAEX1=".request('frm1701:txtPg4mSchedC_17aAEX1')."frm1701:txtPg4mSchedC_17aAEX1=</div>	
            <div>frm1701:txtPg4mSchedC_17aBEX1=".request('frm1701:txtPg4mSchedC_17aBEX1')."frm1701:txtPg4mSchedC_17aBEX1=</div>	
            <div>frm1701:txtPg4mSchedC_17bAEX1=".request('frm1701:txtPg4mSchedC_17bAEX1')."frm1701:txtPg4mSchedC_17bAEX1=</div>	
            <div>frm1701:txtPg4mSchedC_17bBEX1=".request('frm1701:txtPg4mSchedC_17bBEX1')."frm1701:txtPg4mSchedC_17bBEX1=</div>	
            <div>frm1701:txtPg4mSchedC_17cAEX1=".request('frm1701:txtPg4mSchedC_17dAEX1')."frm1701:txtPg4mSchedC_17cAEX1=</div>	
            <div>frm1701:txtPg4mSchedC_17cBEX1=".request('frm1701:txtPg4mSchedC_17dBEX1')."frm1701:txtPg4mSchedC_17cBEX1=</div>	
            <div>frm1701:txtPg4mSchedC_17cEX1=".request('frm1701:txtPg4mSchedC_17cEX1')."frm1701:txtPg4mSchedC_17cEX1=</div>	
            <div>frm1701:txtPg4mSchedC_17cAEX1=".request('frm1701:txtPg4mSchedC_17cAEX1')."frm1701:txtPg4mSchedC_17cAEX1=</div>	
            <div>frm1701:txtPg4mSchedC_17cBEX1=".request('frm1701:txtPg4mSchedC_17cBEX1')."frm1701:txtPg4mSchedC_17cBEX1=</div>	
            <div>frm1701:txtPg4mSchedC_18AEX1=".request('frm1701:txtPg4mSchedC_18AEX1')."frm1701:txtPg4mSchedC_18AEX1=</div>	
            <div>frm1701:txtPg4mSchedC_18BEX1=".request('frm1701:txtPg4mSchedC_18BEX1')."frm1701:txtPg4mSchedC_18BEX1=</div>	
            <div>frm1701:txtPg4mSchedD1_1EX1=".request('frm1701:txtPg4mSchedD1_1EX1')."frm1701:txtPg4mSchedD1_1EX1=</div>	
            <div>frm1701:txtPg4mSchedD1_1AEX1=".request('frm1701:txtPg4mSchedD1_1AEX1')."frm1701:txtPg4mSchedD1_1AEX1=</div>	
            <div>frm1701:txtPg4mSchedD1_1BEX1=".request('frm1701:txtPg4mSchedD1_1BEX1')."frm1701:txtPg4mSchedD1_1BEX1=</div>	
            <div>frm1701:txtPg4mSchedD1_2EX1=".request('frm1701:txtPg4mSchedD1_2EX1')."frm1701:txtPg4mSchedD1_2EX1=</div>	
            <div>frm1701:txtPg4mSchedD1_2AEX1=".request('frm1701:txtPg4mSchedD1_2AEX1')."frm1701:txtPg4mSchedD1_2AEX1=</div>	
            <div>frm1701:txtPg4mSchedD1_2BEX1=".request('frm1701:txtPg4mSchedD1_2BEX1')."frm1701:txtPg4mSchedD1_2BEX1=</div>	
            <div>frm1701:txtPg4mSchedD1_3EX1=".request('frm1701:txtPg4mSchedD1_3EX1')."frm1701:txtPg4mSchedD1_3EX1=</div>	
            <div>frm1701:txtPg4mSchedD1_3AEX1=".request('frm1701:txtPg4mSchedD1_3AEX1')."frm1701:txtPg4mSchedD1_3AEX1=</div>	
            <div>frm1701:txtPg4mSchedD1_3BEX1=".request('frm1701:txtPg4mSchedD1_3BEX1')."frm1701:txtPg4mSchedD1_3BEX1=</div>	
            <div>frm1701:txtPg4mSchedD1_4EX1=".request('frm1701:txtPg4mSchedD1_4EX1')."frm1701:txtPg4mSchedD1_4EX1=</div>	
            <div>frm1701:txtPg4mSchedD1_4AEX1=".request('frm1701:txtPg4mSchedD1_4AEX1')."frm1701:txtPg4mSchedD1_4AEX1=</div>	
            <div>frm1701:txtPg4mSchedD1_4BEX1=".request('frm1701:txtPg4mSchedD1_4BEX1')."frm1701:txtPg4mSchedD1_4BEX1=</div>	
            <div>frm1701:txtPg4mSchedD1_5BEX1=".request('frm1701:txtPg4mSchedD1_5BEX1')."frm1701:txtPg4mSchedD1_5BEX1=</div>	
            <div>frm1701:txtPg4mSchedD2_6EX1=".request('frm1701:txtPg4mSchedD2_6EX1')."frm1701:txtPg4mSchedD2_6EX1=</div>	
            <div>frm1701:txtPg4mSchedD2_6AEX1=".request('frm1701:txtPg4mSchedD2_6AEX1')."frm1701:txtPg4mSchedD2_6AEX1=</div>	
            <div>frm1701:txtPg4mSchedD2_6BEX1=".request('frm1701:txtPg4mSchedD2_6BEX1')."frm1701:txtPg4mSchedD2_6BEX1=</div>	
            <div>frm1701:txtPg4mSchedD2_7EX1=".request('frm1701:txtPg4mSchedD2_7EX1')."frm1701:txtPg4mSchedD2_7EX1=</div>	
            <div>frm1701:txtPg4mSchedD2_7AEX1=".request('frm1701:txtPg4mSchedD2_7AEX1')."frm1701:txtPg4mSchedD2_7AEX1=</div>	
            <div>frm1701:txtPg4mSchedD2_7BEX1=".request('frm1701:txtPg4mSchedD2_7BEX1')."frm1701:txtPg4mSchedD2_7BEX1=</div>	
            <div>frm1701:txtPg4mSchedD2_8EX1=".request('frm1701:txtPg4mSchedD2_8EX1')."frm1701:txtPg4mSchedD2_8EX1=</div>	
            <div>frm1701:txtPg4mSchedD2_8AEX1=".request('frm1701:txtPg4mSchedD2_8AEX1')."frm1701:txtPg4mSchedD2_8AEX1=</div>	
            <div>frm1701:txtPg4mSchedD2_8BEX1=".request('frm1701:txtPg4mSchedD2_8BEX1')."frm1701:txtPg4mSchedD2_8BEX1=</div>	
            <div>frm1701:txtPg4mSchedD2_9EX1=".request('frm1701:txtPg4mSchedD2_9EX1')."frm1701:txtPg4mSchedD2_9EX1=</div>	
            <div>frm1701:txtPg4mSchedD2_9AEX1=".request('frm1701:txtPg4mSchedD2_9AEX1')."frm1701:txtPg4mSchedD2_9AEX1=</div>	
            <div>frm1701:txtPg4mSchedD2_9BEX1=".request('frm1701:txtPg4mSchedD2_9BEX1')."frm1701:txtPg4mSchedD2_9BEX1=</div>	
            <div>frm1701:txtPg4mSchedD2_10BEX1=".request('frm1701:txtPg4mSchedD2_10BEX1')."frm1701:txtPg4mSchedD2_10BEX1=</div>	
            ";
          }
          $xmlData ="<?xml version='1.0'?>	
            <div>frm1701:txtPg1I1Year=".request('frm1701:txtPg1I1Year')."frm1701:txtPg1I1Year=</div>	
            <div>frm1701:rdoPg1I2AmendedYes=".$rdoPg1I2AmendedYes."frm1701:rdoPg1I2AmendedYes=</div>	
            <div>frm1701:rdoPg1I2AmendedNo=".$rdoPg1I2AmendedNo."frm1701:rdoPg1I2AmendedNo=</div>	
            <div>frm1701:rdoPg1I3ShortPeriodYes=".$rdoPg1I3ShortPeriodYes."frm1701:rdoPg1I3ShortPeriodYes=</div>	
            <div>frm1701:rdoPg1I3ShortPeriodNo=".$rdoPg1I3ShortPeriodNo."frm1701:rdoPg1I3ShortPeriodNo=</div>	
            <div>frm1701:txtPg1I4TIN1=".request('frm1701:txtPg1I4TIN1')."frm1701:txtPg1I4TIN1=</div>	
            <div>frm1701:txtPg1I4TIN2=".request('frm1701:txtPg1I4TIN2')."frm1701:txtPg1I4TIN2=</div>	
            <div>frm1701:txtPg1I4TIN3=".request('frm1701:txtPg1I4TIN3')."frm1701:txtPg1I4TIN3=</div>	
            <div>frm1701:txtPg1I4BranchCode=".request('frm1701:txtPg1I4BranchCode')."frm1701:txtPg1I4BranchCode=</div>	
            <div>frm1701:txtPg1I5RDOCode=".request('frm1701:txtPg1I5RDOCode')."frm1701:txtPg1I5RDOCode=</div>	
            <div>frm1701:rdoPg1I6TaxpayerTypeS=".$rdoPg1I6TaxpayerTypeS."frm1701:rdoPg1I6TaxpayerTypeS=</div>	
            <div>frm1701:rdoPg1I6TaxpayerTypeP=".$rdoPg1I6TaxpayerTypeP."frm1701:rdoPg1I6TaxpayerTypeP=</div>	
            <div>frm1701:rdoPg1I6TaxpayerTypeE=".$rdoPg1I6TaxpayerTypeE."frm1701:rdoPg1I6TaxpayerTypeE=</div>	
            <div>frm1701:rdoPg1I6TaxpayerTypeT=".$rdoPg1I6TaxpayerTypeT."frm1701:rdoPg1I6TaxpayerTypeT=</div>	
            <div>frm1701:rdoPg1I6TaxpayerTypeC=".$rdoPg1I6TaxpayerTypeC."frm1701:rdoPg1I6TaxpayerTypeC=</div>	
            <div>frm1701:rdoPg1I7ATC_II012=".$rdoPg1I7ATC_II012."frm1701:rdoPg1I7ATC_II012=</div>	
            <div>frm1701:rdoPg1I7ATC_II014=".$rdoPg1I7ATC_II014."frm1701:rdoPg1I7ATC_II014=</div>	
            <div>frm1701:rdoPg1I7ATC_II013=".$rdoPg1I7ATC_II013."frm1701:rdoPg1I7ATC_II013=</div>	
            <div>frm1701:rdoPg1I7ATC_II011=".$rdoPg1I7ATC_II011."frm1701:rdoPg1I7ATC_II011=</div>	
            <div>frm1701:rdoPg1I7ATC_II015=".$rdoPg1I7ATC_II015."frm1701:rdoPg1I7ATC_II015=</div>	
            <div>frm1701:rdoPg1I7ATC_II017=".$rdoPg1I7ATC_II017."frm1701:rdoPg1I7ATC_II017=</div>	
            <div>frm1701:rdoPg1I7ATC_II016=".$rdoPg1I7ATC_II016."frm1701:rdoPg1I7ATC_II016=</div>	
            <div>frm1701:txtPg1I8TaxpayerName=".$taxPayerName."frm1701:txtPg1I8TaxpayerName=</div>	
            <div>frm1701:txtPg1I9Address=".$address."frm1701:txtPg1I9Address=</div>	
            <div>frm1701:txtPg1I9AZipCode=".request('frm1701:txtPg1I9AZipCode')."frm1701:txtPg1I9AZipCode=</div>	
            <div>frm1701:txtPg1I10BirthDate=".request('frm1701:txtPg1I10BirthDate')."frm1701:txtPg1I10BirthDate=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>frm1701:txtPg1I12Citizenship=".request('frm1701:txtPg1I12Citizenship')."frm1701:txtPg1I12Citizenship=</div>	
            <div>frm1701:rdoPg1I13ForeignTaxCreditsYes=".$rdoPg1I13ForeignTaxCreditsYes."frm1701:rdoPg1I13ForeignTaxCreditsYes=</div>	
            <div>frm1701:rdoPg1I13ForeignTaxCreditsNo=".$rdoPg1I13ForeignTaxCreditsNo."frm1701:rdoPg1I13ForeignTaxCreditsNo=</div>	
            <div>frm1701:txtPg1I14ForeignTaxNumber=".request('frm1701:txtPg1I14ForeignTaxNumber')."frm1701:txtPg1I14ForeignTaxNumber=</div>	
            <div>frm1701:txtPg1I15TelNum=".request('frm1701:txtPg1I15TelNum')."frm1701:txtPg1I15TelNum=</div>	
            <div>frm1701:rdoPg1I16CivilStatusS=".$rdoPg1I16CivilStatusS."frm1701:rdoPg1I16CivilStatusS=</div>	
            <div>frm1701:rdoPg1I16CivilStatusM=".$rdoPg1I16CivilStatusM."frm1701:rdoPg1I16CivilStatusM=</div>	
            <div>frm1701:rdoPg1I16CivilStatusLS=".$rdoPg1I16CivilStatusLS."frm1701:rdoPg1I16CivilStatusLS=</div>	
            <div>frm1701:rdoPg1I16CivilStatusW=".$rdoPg1I16CivilStatusW."frm1701:rdoPg1I16CivilStatusW=</div>	
            <div>frm1701:rdoPg1I17SpouseIncomeYes=".$rdoPg1I17SpouseIncomeYes."frm1701:rdoPg1I17SpouseIncomeYes=</div>	
            <div>frm1701:rdoPg1I17SpouseIncomeNo=".$rdoPg1I17SpouseIncomeNo."frm1701:rdoPg1I17SpouseIncomeNo=</div>	
            <div>frm1701:rdoPg1I18FilingStatusJ=".$rdoPg1I18FilingStatusJ."frm1701:rdoPg1I18FilingStatusJ=</div>	
            <div>frm1701:rdoPg1I18FilingStatusS=".$rdoPg1I18FilingStatusS."frm1701:rdoPg1I18FilingStatusS=</div>	
            <div>frm1701:rdoPg1I19IncomeExemptYes=".$rdoPg1I19IncomeExemptYes."frm1701:rdoPg1I19IncomeExemptYes=</div>	
            <div>frm1701:rdoPg1I19IncomeExemptNo=".$rdoPg1I19IncomeExemptNo."frm1701:rdoPg1I19IncomeExemptNo=</div>	
            <div>frm1701:rdoPg1I20IncomeSpecialYes=".$rdoPg1I20IncomeSpecialYes."frm1701:rdoPg1I20IncomeSpecialYes=</div>	
            <div>frm1701:rdoPg1I20IncomeSpecialNo=".$rdoPg1I20IncomeSpecialNo."frm1701:rdoPg1I20IncomeSpecialNo=</div>	
            <div>frm1701:rdoPg1I21TaxRateG=".$rdoPg1I21TaxRateG."frm1701:rdoPg1I21TaxRateG=</div>	
            <div>frm1701:rdoPg1I21AMethodDeductionI=".$rdoPg1I21AMethodDeductionI."frm1701:rdoPg1I21AMethodDeductionI=</div>	
            <div>frm1701:rdoPg1I21AMethodDeductionO=".$rdoPg1I21AMethodDeductionO."frm1701:rdoPg1I21AMethodDeductionO=</div>	
            <div>frm1701:rdoPg1I21TaxRateP=".$rdoPg1I21TaxRateP."frm1701:rdoPg1I21TaxRateP=</div>	
            <div>frm1701:txtPg1I22ATaxDue=".request('frm1701:txtPg1I22ATaxDue')."frm1701:txtPg1I22ATaxDue=</div>	
            <div>frm1701:txtPg1I22BTaxDue=".request('frm1701:txtPg1I22BTaxDue')."frm1701:txtPg1I22BTaxDue=</div>	
            <div>frm1701:txtPg1I23A=".request('frm1701:txtPg1I23A')."frm1701:txtPg1I23A=</div>	
            <div>frm1701:txtPg1I23B=".request('frm1701:txtPg1I23B')."frm1701:txtPg1I23B=</div>	
            <div>frm1701:txtPg1I24ATaxPayable=".request('frm1701:txtPg1I24ATaxPayable')."frm1701:txtPg1I24ATaxPayable=</div>	
            <div>frm1701:txtPg1I24BTaxPayable=".request('frm1701:txtPg1I24BTaxPayable')."frm1701:txtPg1I24BTaxPayable=</div>	
            <div>frm1701:txtPg1I25A=".request('frm1701:txtPg1I25A')."frm1701:txtPg1I25A=</div>	
            <div>frm1701:txtPg1I25B=".request('frm1701:txtPg1I25B')."frm1701:txtPg1I25B=</div>	
            <div>frm1701:txtPg1I26A=".request('frm1701:txtPg1I26A')."frm1701:txtPg1I26A=</div>	
            <div>frm1701:txtPg1I26B=".request('frm1701:txtPg1I26B')."frm1701:txtPg1I26B=</div>	
            <div>frm1701:txtPg1I27A=".request('frm1701:txtPg1I27A')."frm1701:txtPg1I27A=</div>	
            <div>frm1701:txtPg1I27B=".request('frm1701:txtPg1I27B')."frm1701:txtPg1I27B=</div>	
            <div>frm1701:txtPg1I28A=".request('frm1701:txtPg1I28A')."frm1701:txtPg1I28A=</div>	
            <div>frm1701:txtPg1I28B=".request('frm1701:txtPg1I28B')."frm1701:txtPg1I28B=</div>	
            <div>frm1701:txtPg1I29A=".request('frm1701:txtPg1I29A')."frm1701:txtPg1I29A=</div>	
            <div>frm1701:txtPg1I29B=".request('frm1701:txtPg1I29B')."frm1701:txtPg1I29B=</div>	
            <div>frm1701:txtPg1I30A=".request('frm1701:txtPg1I30A')."frm1701:txtPg1I30A=</div>	
            <div>frm1701:txtPg1I30B=".request('frm1701:txtPg1I30B')."frm1701:txtPg1I30B=</div>	
            <div>frm1701:txtPg1I31ATotalAmtPyble=".request('frm1701:txtPg1I31ATotalAmtPyble')."frm1701:txtPg1I31ATotalAmtPyble=</div>	
            <div>frm1701:txtPg1I31BTotalAmtPyble=".request('frm1701:txtPg1I31BTotalAmtPyble')."frm1701:txtPg1I31BTotalAmtPyble=</div>	
            <div>frm1701:txtPg1I32AggregateAmtPyble=".request('frm1701:txtPg1I32AggregateAmtPyble')."frm1701:txtPg1I32AggregateAmtPyble=</div>	
            <div>frm1701:rdoPg1OverpaymentRefund=".$rdoPg1OverpaymentRefund."frm1701:rdoPg1OverpaymentRefund=</div>	
            <div>frm1701:rdoPg1OverpaymentTCC=".$rdoPg1OverpaymentTCC."frm1701:rdoPg1OverpaymentTCC=</div>	
            <div>frm1701:rdoPg1OverpaymentCarryOver=".$rdoPg1OverpaymentCarryOver."frm1701:rdoPg1OverpaymentCarryOver=</div>	
            <div>frm1701:txtPg1I33NumberOfAttachments=".request('frm1701:txtPg1I33NumberOfAttachments')."frm1701:txtPg1I33NumberOfAttachments=</div>	
            <div>frm1701:txtPg1I34Agency=frm1701:txtPg1I34Agency=</div>	
            <div>frm1701:txtPg1I34Number=frm1701:txtPg1I34Number=</div>	
            <div>frm1701:txtPg1I34Date=frm1701:txtPg1I34Date=</div>	
            <div>frm1701:txtPg1I34Amount=frm1701:txtPg1I34Amount=</div>	
            <div>frm1701:txtPg1I35Agency=frm1701:txtPg1I35Agency=</div>	
            <div>frm1701:txtPg1I235Number=frm1701:txtPg1I235Number=</div>	
            <div>frm1701:txtPg1I35Date=frm1701:txtPg1I35Date=</div>	
            <div>frm1701:txtPg1I35Amount=frm1701:txtPg1I35Amount=</div>	
            <div>frm1701:txtPg1I36Number=frm1701:txtPg1I36Number=</div>	
            <div>frm1701:txtPg1I36Date=frm1701:txtPg1I36Date=</div>	
            <div>frm1701:txtPg1I36Amount=frm1701:txtPg1I36Amount=</div>	
            <div>frm1701:txtPg1I37Particular=frm1701:txtPg1I37Particular=</div>	
            <div>frm1701:txtPg1I37Agency=frm1701:txtPg1I37Agency=</div>	
            <div>frm1701:txtPg1I37Number=frm1701:txtPg1I37Number=</div>	
            <div>frm1701:txtPg1I37Date=frm1701:txtPg1I37Date=</div>	
            <div>frm1701:txtPg1I37Amount=frm1701:txtPg1I37Amount=</div>	
            <div>frm1701:txtPg2TIN1=".request('frm1701:txtPg2TIN1')."frm1701:txtPg2TIN1=</div>	
            <div>frm1701:txtPg2TIN2=".request('frm1701:txtPg2TIN2')."frm1701:txtPg2TIN2=</div>	
            <div>frm1701:txtPg2TIN3=".request('frm1701:txtPg2TIN3')."frm1701:txtPg2TIN3=</div>	
            <div>frm1701:txtPg2BranchCode=".request('frm1701:txtPg2BranchCode')."frm1701:txtPg2BranchCode=</div>	
            <div>frm1701:txtPg2TaxpayerName=".request('frm1701:txtPg2TaxpayerName')."frm1701:txtPg2TaxpayerName=</div>	
            <div>frm1701:txtPg2I1TIN1=".request('frm1701:txtPg2I1TIN1')."frm1701:txtPg2I1TIN1=</div>	
            <div>frm1701:txtPg2I1TIN2=".request('frm1701:txtPg2I1TIN2')."frm1701:txtPg2I1TIN2=</div>	
            <div>frm1701:txtPg2I1TIN3=".request('frm1701:txtPg2I1TIN3')."frm1701:txtPg2I1TIN3=</div>	
            <div>frm1701:txtPg2I1BranchCode=".request('frm1701:txtPg2I1BranchCode')."frm1701:txtPg2I1BranchCode=</div>	
            <div>frm1701:txtPg2I2SpouseRDOCode=".request('frm1701:txtPg2I2SpouseRDOCode')."frm1701:txtPg2I2SpouseRDOCode=</div>	
            <div>frm1701:rdoPg2I3SpouseTypeS=".$rdoPg2I3SpouseTypeS."frm1701:rdoPg2I3SpouseTypeS=</div>	
            <div>frm1701:rdoPg2I3SpouseTypeP=".$rdoPg2I3SpouseTypeP."frm1701:rdoPg2I3SpouseTypeP=</div>	
            <div>frm1701:rdoPg2I3SpouseTypeC=".$rdoPg2I3SpouseTypeC."frm1701:rdoPg2I3SpouseTypeC=</div>	
            <div>frm1701:rdoPg2I4ATC_II012=".$rdoPg2I4ATC_II012."frm1701:rdoPg2I4ATC_II012=</div>	
            <div>frm1701:rdoPg2I4ATC_II014=".$rdoPg2I4ATC_II014."frm1701:rdoPg2I4ATC_II014=</div>	
            <div>frm1701:rdoPg2I4ATC_II013=".$rdoPg2I4ATC_II013."frm1701:rdoPg2I4ATC_II013=</div>	
            <div>frm1701:rdoPg2I4ATC_II011=".$rdoPg2I4ATC_II011."frm1701:rdoPg2I4ATC_II011=</div>	
            <div>frm1701:rdoPg2I4ATC_II015=".$rdoPg2I4ATC_II015."frm1701:rdoPg2I4ATC_II015=</div>	
            <div>frm1701:rdoPg2I4ATC_II017=".$rdoPg2I4ATC_II017."frm1701:rdoPg2I4ATC_II017=</div>	
            <div>frm1701:rdoPg2I4ATC_II016=".$rdoPg2I4ATC_II016."frm1701:rdoPg2I4ATC_II016=</div>	
            <div>frm1701:txtPg2I5SpouseName=".request('frm1701:txtPg2I5SpouseName')."frm1701:txtPg2I5SpouseName=</div>	
            <div>frm1701:txtPg2I6TelNum=".request('frm1701:txtPg2I6TelNum')."frm1701:txtPg2I6TelNum=</div>	
            <div>frm1701:txtPg2I7Citizenship=".request('frm1701:txtPg2I7Citizenship')."frm1701:txtPg2I7Citizenship=</div>	
            <div>frm1701:rdoPg2I8ForeignTaxCreditsYes=".$rdoPg2I8ForeignTaxCreditsYes."frm1701:rdoPg2I8ForeignTaxCreditsYes=</div>	
            <div>frm1701:rdoPg2I8ForeignTaxCreditsNo=".$rdoPg2I8ForeignTaxCreditsNo."frm1701:rdoPg2I8ForeignTaxCreditsNo=</div>	
            <div>frm1701:txtPg2I9ForeignTaxNumber=".request('frm1701:txtPg2I9ForeignTaxNumber')."frm1701:txtPg2I9ForeignTaxNumber=</div>	
            <div>frm1701:rdoPg2I10IncomeExemptYes=".$rdoPg2I10IncomeExemptYes."frm1701:rdoPg2I10IncomeExemptYes=</div>	
            <div>frm1701:rdoPg2I10IncomeExemptNo=".$rdoPg2I10IncomeExemptNo."frm1701:rdoPg2I10IncomeExemptNo=</div>	
            <div>frm1701:rdoPg2I11IncomeSpecialYes=".$rdoPg2I11IncomeSpecialYes."frm1701:rdoPg2I11IncomeSpecialYes=</div>	
            <div>frm1701:rdoPg2I11IncomeSpecialNo=".$rdoPg2I11IncomeSpecialNo."frm1701:rdoPg2I11IncomeSpecialNo=</div>	
            <div>frm1701:rdoPg2I12TaxRateG=".$rdoPg2I12TaxRateG."frm1701:rdoPg2I12TaxRateG=</div>	
            <div>frm1701:rdoPg2I12AMethodDeductionI=".$rdoPg2I12AMethodDeductionI."frm1701:rdoPg2I12AMethodDeductionI=</div>	
            <div>frm1701:rdoPg2I12AMethodDeductionO=".$rdoPg2I12AMethodDeductionO."frm1701:rdoPg2I12AMethodDeductionO=</div>	
            <div>frm1701:rdoPg2I12TaxRateP=".$rdoPg2I12TaxRateP."frm1701:rdoPg2I12TaxRateP=</div>	
            <div>frm1701:chkPg2IShed1a_1Taxpayer=".(null !==  request('frm1701:chkPg2IShed1a_1Taxpayer') ? 'true' : 'false')."frm1701:chkPg2IShed1a_1Taxpayer=</div>	
            <div>frm1701:txtPg2IShed1a_1TPName=".request('frm1701:txtPg2IShed1a_1TPName')."frm1701:txtPg2IShed1a_1TPName=</div>	
            <div>frm1701:chkPg2IShed1a_1Spouse=".(null !==  request('frm1701:chkPg2IShed1a_1Spouse') ? 'true' : 'false')."frm1701:chkPg2IShed1a_1Spouse=</div>	
            <div>frm1701:txtPg2IShed1a_1SName=".request('frm1701:txtPg2IShed1a_1SName')."frm1701:txtPg2IShed1a_1SName=</div>	
            <div>frm1701:txtPg2IShed1a_TIN1=".request('frm1701:txtPg2IShed1a_TIN1')."frm1701:txtPg2IShed1a_TIN1=</div>	
            <div>frm1701:txtPg2IShed1a_TIN2=".request('frm1701:txtPg2IShed1a_TIN2')."frm1701:txtPg2IShed1a_TIN2=</div>	
            <div>frm1701:txtPg2IShed1a_TIN3=".request('frm1701:txtPg2IShed1a_TIN3')."frm1701:txtPg2IShed1a_TIN3=</div>	
            <div>frm1701:txtPg2IShed1a_BranchCode=".request('frm1701:txtPg2IShed1a_BranchCode')."frm1701:txtPg2IShed1a_BranchCode=</div>	
            <div>frm1701:chkPg2IShed2a_2Taxpayer=".(null !==  request('frm1701:chkPg2IShed2a_2Taxpayer') ? 'true' : 'false')."frm1701:chkPg2IShed2a_2Taxpayer=</div>	
            <div>frm1701:txtPg2IShed2a_2TPName=".request('frm1701:txtPg2IShed2a_2TPName')."frm1701:txtPg2IShed2a_2TPName=</div>	
            <div>frm1701:chkPg2IShed2a_2Spouse=".(null !==  request('frm1701:chkPg2IShed2a_2Spouse') ? 'true' : 'false')."frm1701:chkPg2IShed2a_2Spouse=</div>	
            <div>frm1701:txtPg2IShed2a_2SName=".request('frm1701:txtPg2IShed2a_2SName')."frm1701:txtPg2IShed2a_2SName=</div>	
            <div>frm1701:txtPg2IShed2a_TIN1=".request('frm1701:txtPg2IShed2a_TIN1')."frm1701:txtPg2IShed2a_TIN1=</div>	
            <div>frm1701:txtPg2IShed2a_TIN2=".request('frm1701:txtPg2IShed2a_TIN2')."frm1701:txtPg2IShed2a_TIN2=</div>	
            <div>frm1701:txtPg2IShed2a_TIN3=".request('frm1701:txtPg2IShed2a_TIN3')."frm1701:txtPg2IShed2a_TIN3=</div>	
            <div>frm1701:txtPg2IShed2a_BranchCode=".request('frm1701:txtPg2IShed2a_BranchCode')."frm1701:txtPg2IShed2a_BranchCode=</div>	
            <div>frm1701:txtPg2IShed1c_1CI=".request('frm1701:txtPg2IShed1c_1CI')."frm1701:txtPg2IShed1c_1CI=</div>	
            <div>frm1701:txtPg2IShed1c_1TW=".request('frm1701:txtPg2IShed1c_1TW')."frm1701:txtPg2IShed1c_1TW=</div>	
            <div>frm1701:txtPg2IShed1c_2CI=".request('frm1701:txtPg2IShed1c_2CI')."frm1701:txtPg2IShed1c_2CI=</div>	
            <div>frm1701:txtPg2IShed1c_2TW=".request('frm1701:txtPg2IShed1c_2TW')."frm1701:txtPg2IShed1c_2TW=</div>	
            <div>frm1701:txtPg2IShed1c_3ACI=".request('frm1701:txtPg2IShed1c_3ACI')."frm1701:txtPg2IShed1c_3ACI=</div>	
            <div>frm1701:txtPg2IShed1c_3ATW=".request('frm1701:txtPg2IShed1c_3ATW')."frm1701:txtPg2IShed1c_3ATW=</div>	
            <div>frm1701:txtPg2IShed1c_3BCI=".request('frm1701:txtPg2IShed1c_3BCI')."frm1701:txtPg2IShed1c_3BCI=</div>	
            <div>frm1701:txtPg2IShed1c_3BCI=".request('frm1701:txtPg2IShed1c_3BTW')."frm1701:txtPg2IShed1c_3BCI=</div>	
            <div>frm1701:txtPg2IShed2_4A=".request('frm1701:txtPg2IShed2_4A')."frm1701:txtPg2IShed2_4A=</div>	
            <div>frm1701:txtPg2IShed2_4B=".request('frm1701:txtPg2IShed2_4B')."frm1701:txtPg2IShed2_4B=</div>	
            <div>frm1701:txtPg2IShed2_5A=".request('frm1701:txtPg2IShed2_5A')."frm1701:txtPg2IShed2_5A=</div>	
            <div>frm1701:txtPg2IShed2_5B=".request('frm1701:txtPg2IShed2_5B')."frm1701:txtPg2IShed2_5B=</div>	
            <div>frm1701:txtPg2IShed2_6A=".request('frm1701:txtPg2IShed2_6A')."frm1701:txtPg2IShed2_6A=</div>	
            <div>frm1701:txtPg2IShed2_6B=".request('frm1701:txtPg2IShed2_6B')."frm1701:txtPg2IShed2_6B=</div>	
            <div>frm1701:txtPg2IShed2_7A=".request('frm1701:txtPg2IShed2_7A')."frm1701:txtPg2IShed2_7A=</div>	
            <div>frm1701:txtPg2IShed2_7B=".request('frm1701:txtPg2IShed2_7B')."frm1701:txtPg2IShed2_7B=</div>	
            <div>frm1701:txtPg2IShed3_8A=".request('frm1701:txtPg2IShed3_8A')."frm1701:txtPg2IShed3_8A=</div>	
            <div>frm1701:txtPg2IShed3_8B=".request('frm1701:txtPg2IShed3_8B')."frm1701:txtPg2IShed3_8B=</div>	
            <div>frm1701:txtPg2IShed3_9A=".request('frm1701:txtPg2IShed3_9A')."frm1701:txtPg2IShed3_9A=</div>	
            <div>frm1701:txtPg2IShed3_9B=".request('frm1701:txtPg2IShed3_9B')."frm1701:txtPg2IShed3_9B=</div>	
            <div>frm1701:txtPg2IShed3_10A=".request('frm1701:txtPg2IShed3_10A')."frm1701:txtPg2IShed3_10A=</div>	
            <div>frm1701:txtPg2IShed3_10B=".request('frm1701:txtPg2IShed3_10B')."frm1701:txtPg2IShed3_10B=</div>	
            <div>frm1701:txtPg2IShed3_11A=".request('frm1701:txtPg2IShed3_11A')."frm1701:txtPg2IShed3_11A=</div>	
            <div>frm1701:txtPg2IShed3_11B=".request('frm1701:txtPg2IShed3_11B')."frm1701:txtPg2IShed3_11B=</div>	
            <div>frm1701:txtPg2IShed3_12A=".request('frm1701:txtPg2IShed3_12A')."frm1701:txtPg2IShed3_12A=</div>	
            <div>frm1701:txtPg2IShed3_12B=".request('frm1701:txtPg2IShed3_12B')."frm1701:txtPg2IShed3_12B=</div>	
            <div>frm1701:txtPg2IShed3_13A=".request('frm1701:txtPg2IShed3_13A')."frm1701:txtPg2IShed3_13A=</div>	
            <div>frm1701:txtPg2IShed3_13B=".request('frm1701:txtPg2IShed3_13B')."frm1701:txtPg2IShed3_13B=</div>	
            <div>frm1701:txtPg2IShed3_14A=".request('frm1701:txtPg2IShed3_14A')."frm1701:txtPg2IShed3_14A=</div>	
            <div>frm1701:txtPg2IShed3_14B=".request('frm1701:txtPg2IShed3_14B')."frm1701:txtPg2IShed3_14B=</div>	
            <div>frm1701:txtPg2IShed3_15A=".request('frm1701:txtPg2IShed3_15A')."frm1701:txtPg2IShed3_15A=</div>	
            <div>frm1701:txtPg2IShed3_15B=".request('frm1701:txtPg2IShed3_15B')."frm1701:txtPg2IShed3_15B=</div>	
            <div>frm1701:txtPg2IShed3_16A=".request('frm1701:txtPg2IShed3_16A')."frm1701:txtPg2IShed3_16A=</div>	
            <div>frm1701:txtPg2IShed3_16B=".request('frm1701:txtPg2IShed3_16B')."frm1701:txtPg2IShed3_16B=</div>	
            <div>frm1701:txtPg2IShed3_17A=".request('frm1701:txtPg2IShed3_17A')."frm1701:txtPg2IShed3_17A=</div>	
            <div>frm1701:txtPg2IShed3_17B=".request('frm1701:txtPg2IShed3_17B')."frm1701:txtPg2IShed3_17B=</div>	
            <div>frm1701:txtPg2IShed3_18A=".request('frm1701:txtPg2IShed3_18A')."frm1701:txtPg2IShed3_18A=</div>	
            <div>frm1701:txtPg2IShed3_18B=".request('frm1701:txtPg2IShed3_18B')."frm1701:txtPg2IShed3_18B=</div>	
            <div>frm1701:txtPg2IShed3_19Desc=".request('frm1701:txtPg2IShed3_19Desc')."frm1701:txtPg2IShed3_19Desc=</div>	
            <div>frm1701:txtPg2IShed3_19A=".request('frm1701:txtPg2IShed3_19A')."frm1701:txtPg2IShed3_19A=</div>	
            <div>frm1701:txtPg2IShed3_19B=".request('frm1701:txtPg2IShed3_19B')."frm1701:txtPg2IShed3_19B=</div>	
            <div>frm1701:txtPg2IShed3_20Desc=".request('frm1701:txtPg2IShed3_20Desc')."frm1701:txtPg2IShed3_20Desc=</div>	
            <div>frm1701:txtPg2IShed3_20A=".request('frm1701:txtPg2IShed3_20A')."frm1701:txtPg2IShed3_20A=</div>	
            <div>frm1701:txtPg2IShed3_20B=".request('frm1701:txtPg2IShed3_20B')."frm1701:txtPg2IShed3_20B=</div>	
            <div>frm1701:txtPg2IShed3_21A=".request('frm1701:txtPg2IShed3_21A')."frm1701:txtPg2IShed3_21A=</div>	
            <div>frm1701:txtPg2IShed3_21B=".request('frm1701:txtPg2IShed3_21B')."frm1701:txtPg2IShed3_21B=</div>	
            <div>frm1701:txtPg2IShed3_22A=".request('frm1701:txtPg2IShed3_22A')."frm1701:txtPg2IShed3_22A=</div>	
            <div>frm1701:txtPg2IShed3_22B=".request('frm1701:txtPg2IShed3_22B')."frm1701:txtPg2IShed3_22B=</div>	
            <div>frm1701:txtPg2IShed3_23A=".request('frm1701:txtPg2IShed3_23A')."frm1701:txtPg2IShed3_23A=</div>	
            <div>frm1701:txtPg2IShed3_23B=".request('frm1701:txtPg2IShed3_23B')."frm1701:txtPg2IShed3_23B=</div>	
            <div>frm1701:txtPg2IShed3_24A=".request('frm1701:txtPg2IShed3_24A')."frm1701:txtPg2IShed3_24A=</div>	
            <div>frm1701:txtPg2IShed3_24B=".request('frm1701:txtPg2IShed3_24B')."frm1701:txtPg2IShed3_24B=</div>	
            <div>frm1701:txtPg2IShed3_25A=".request('frm1701:txtPg2IShed3_25A')."frm1701:txtPg2IShed3_25A=</div>	
            <div>frm1701:txtPg2IShed3_25B=".request('frm1701:txtPg2IShed3_25B')."frm1701:txtPg2IShed3_25B=</div>	
            <div>frm1701:txtPg3TIN1=".request('frm1701:txtPg2TIN1')."frm1701:txtPg3TIN1=</div>	
            <div>frm1701:txtPg3TIN2=".request('frm1701:txtPg2TIN2')."frm1701:txtPg3TIN2=</div>	
            <div>frm1701:txtPg3TIN3=".request('frm1701:txtPg2TIN3')."frm1701:txtPg3TIN3=</div>	
            <div>frm1701:txtPg3BranchCode=".request('frm1701:txtPg2BranchCode')."frm1701:txtPg3BranchCode=</div>	
            <div>frm1701:txtPg3TaxpayerName=".request('frm1701:txtPg2TaxpayerName')."frm1701:txtPg3TaxpayerName=</div>	
            <div>frm1701:txtPg3IShed3_26A=".request('frm1701:txtPg3IShed3_26A')."frm1701:txtPg3IShed3_26A=</div>	
            <div>frm1701:txtPg3IShed3_26B=".request('frm1701:txtPg3IShed3_26B')."frm1701:txtPg3IShed3_26B=</div>	
            <div>frm1701:txtPg3IShed3_27Desc=".request('frm1701:txtPg3IShed3_27Desc')."frm1701:txtPg3IShed3_27Desc=</div>	
            <div>frm1701:txtPg3IShed3_27A=".request('frm1701:txtPg3IShed3_27A')."frm1701:txtPg3IShed3_27A=</div>	
            <div>frm1701:txtPg3IShed3_27B=".request('frm1701:txtPg3IShed3_27B')."frm1701:txtPg3IShed3_27B=</div>	
            <div>frm1701:txtPg3IShed3_28A=".request('frm1701:txtPg3IShed3_28A')."frm1701:txtPg3IShed3_28A=</div>	
            <div>frm1701:txtPg3IShed3_28B=".request('frm1701:txtPg3IShed3_28B')."frm1701:txtPg3IShed3_28B=</div>	
            <div>frm1701:txtPg3IShed3_29A=".request('frm1701:txtPg3IShed3_29A')."frm1701:txtPg3IShed3_29A=</div>	
            <div>frm1701:txtPg3IShed3_29B=".request('frm1701:txtPg3IShed3_29B')."frm1701:txtPg3IShed3_29B=</div>	
            <div>frm1701:txtPg3IShed3_30A=".request('frm1701:txtPg3IShed3_30A')."frm1701:txtPg3IShed3_30A=</div>	
            <div>frm1701:txtPg3IShed3_30B=".request('frm1701:txtPg3IShed3_30B')."frm1701:txtPg3IShed3_30B=</div>	
            <div>frm1701:txtPg3IShed3_31A=".request('frm1701:txtPg3IShed3_31A')."frm1701:txtPg3IShed3_31A=</div>	
            <div>frm1701:txtPg3IShed3_31B=".request('frm1701:txtPg3IShed3_31B')."frm1701:txtPg3IShed3_31B=</div>	
            <div>frm1701:txtPg3IShed3_32A=".request('frm1701:txtPg3IShed3_32A')."frm1701:txtPg3IShed3_32A=</div>	
            <div>frm1701:txtPg3IShed3_32B=".request('frm1701:txtPg3IShed3_32B')."frm1701:txtPg3IShed3_32B=</div>	
            <div>frm1701:txtPg3IShed4_1A=".request('frm1701:txtPg3IShed4_1A')."frm1701:txtPg3IShed4_1A=</div>	
            <div>frm1701:txtPg3IShed4_1B=".request('frm1701:txtPg3IShed4_1B')."frm1701:txtPg3IShed4_1B=</div>	
            <div>frm1701:txtPg3IShed4_2A=".request('frm1701:txtPg3IShed4_2A')."frm1701:txtPg3IShed4_2A=</div>	
            <div>frm1701:txtPg3IShed4_2B=".request('frm1701:txtPg3IShed4_2B')."frm1701:txtPg3IShed4_2B=</div>	
            <div>frm1701:txtPg3IShed4_3A=".request('frm1701:txtPg3IShed4_3A')."frm1701:txtPg3IShed4_3A=</div>	
            <div>frm1701:txtPg3IShed4_3B=".request('frm1701:txtPg3IShed4_3B')."frm1701:txtPg3IShed4_3B=</div>	
            <div>frm1701:txtPg3IShed4_4A=".request('frm1701:txtPg3IShed4_4A')."frm1701:txtPg3IShed4_4A=</div>	
            <div>frm1701:txtPg3IShed4_4B=".request('frm1701:txtPg3IShed4_4B')."frm1701:txtPg3IShed4_4B=</div>	
            <div>frm1701:txtPg3IShed4_5A=".request('frm1701:txtPg3IShed4_5A')."frm1701:txtPg3IShed4_5A=</div>	
            <div>frm1701:txtPg3IShed4_5B=".request('frm1701:txtPg3IShed4_5B')."frm1701:txtPg3IShed4_5B=</div>	
            <div>frm1701:txtPg3IShed4_6A=".request('frm1701:txtPg3IShed4_6A')."frm1701:txtPg3IShed4_6A=</div>	
            <div>frm1701:txtPg3IShed4_6B=".request('frm1701:txtPg3IShed4_6B')."frm1701:txtPg3IShed4_6B=</div>	
            <div>frm1701:txtPg3IShed4_7A=".request('frm1701:txtPg3IShed4_7A')."frm1701:txtPg3IShed4_7A=</div>	
            <div>frm1701:txtPg3IShed4_7B=".request('frm1701:txtPg3IShed4_7B')."frm1701:txtPg3IShed4_7B=</div>	
            <div>frm1701:txtPg3IShed4_8A=".request('frm1701:txtPg3IShed4_8A')."frm1701:txtPg3IShed4_8A=</div>	
            <div>frm1701:txtPg3IShed4_8B=".request('frm1701:txtPg3IShed4_8B')."frm1701:txtPg3IShed4_8B=</div>	
            <div>frm1701:txtPg3IShed4_9A=".request('frm1701:txtPg3IShed4_9A')."frm1701:txtPg3IShed4_9A=</div>	
            <div>frm1701:txtPg3IShed4_9B=".request('frm1701:txtPg3IShed4_9B')."frm1701:txtPg3IShed4_9B=</div>	
            <div>frm1701:txtPg3IShed4_10A=".request('frm1701:txtPg3IShed4_10A')."frm1701:txtPg3IShed4_10A=</div>	
            <div>frm1701:txtPg3IShed4_10B=".request('frm1701:txtPg3IShed4_10B')."frm1701:txtPg3IShed4_10B=</div>	
            <div>frm1701:txtPg3IShed4_11A=".request('frm1701:txtPg3IShed4_11A')."frm1701:txtPg3IShed4_11A=</div>	
            <div>frm1701:txtPg3IShed4_11B=".request('frm1701:txtPg3IShed4_11B')."frm1701:txtPg3IShed4_11B=</div>	
            <div>frm1701:txtPg3IShed4_12A=".request('frm1701:txtPg3IShed4_12A')."frm1701:txtPg3IShed4_12A=</div>	
            <div>frm1701:txtPg3IShed4_12B=".request('frm1701:txtPg3IShed4_12B')."frm1701:txtPg3IShed4_12B=</div>	
            <div>frm1701:txtPg3IShed4_13A=".request('frm1701:txtPg3IShed4_13A')."frm1701:txtPg3IShed4_13A=</div>	
            <div>frm1701:txtPg3IShed4_13B=".request('frm1701:txtPg3IShed4_13B')."frm1701:txtPg3IShed4_13B=</div>	
            <div>frm1701:txtPg3IShed4_14A=".request('frm1701:txtPg3IShed4_14A')."frm1701:txtPg3IShed4_14A=</div>	
            <div>frm1701:txtPg3IShed4_14B=".request('frm1701:txtPg3IShed4_14B')."frm1701:txtPg3IShed4_14B=</div>	
            <div>frm1701:txtPg3IShed4_15A=".request('frm1701:txtPg3IShed4_15A')."frm1701:txtPg3IShed4_15A=</div>	
            <div>frm1701:txtPg3IShed4_15B=".request('frm1701:txtPg3IShed4_15B')."frm1701:txtPg3IShed4_15B=</div>	
            <div>frm1701:txtPg3IShed4_16A=".request('frm1701:txtPg3IShed4_16A')."frm1701:txtPg3IShed4_16A=</div>	
            <div>frm1701:txtPg3IShed4_16B=".request('frm1701:txtPg3IShed4_16B')."frm1701:txtPg3IShed4_16B=</div>	
            <div>frm1701:txtPg3IShed4_17aA=".request('frm1701:txtPg3IShed4_17aA')."frm1701:txtPg3IShed4_17aA=</div>	
            <div>frm1701:txtPg3IShed4_17aB=".request('frm1701:txtPg3IShed4_17aB')."frm1701:txtPg3IShed4_17aB=</div>	
            <div>frm1701:txtPg3IShed4_17bA=".request('frm1701:txtPg3IShed4_17bA')."frm1701:txtPg3IShed4_17bA=</div>	
            <div>frm1701:txtPg3IShed4_17bB=".request('frm1701:txtPg3IShed4_17bB')."frm1701:txtPg3IShed4_17bB=</div>	
            <div>frm1701:txtPg3IShed4_17cA=".request('frm1701:txtPg3IShed4_17cA')."frm1701:txtPg3IShed4_17cA=</div>	
            <div>frm1701:txtPg3IShed4_17cB=".request('frm1701:txtPg3IShed4_17cB')."frm1701:txtPg3IShed4_17cB=</div>	
            <div>frm1701:txtPg3IShed4_17dDesc=".request('frm1701:txtPg3IShed4_17dDesc')."frm1701:txtPg3IShed4_17dDesc=</div>	
            <div>frm1701:txtPg3IShed4_17dA=".request('frm1701:txtPg3IShed4_17dA')."frm1701:txtPg3IShed4_17dA=</div>	
            <div>frm1701:txtPg3IShed4_17dB=".request('frm1701:txtPg3IShed4_17dB')."frm1701:txtPg3IShed4_17dB=</div>	
            <div>frm1701:txtPg3IShed4_18A=".request('frm1701:txtPg3IShed4_18A')."frm1701:txtPg3IShed4_18A=</div>	
            <div>frm1701:txtPg3IShed4_18B=".request('frm1701:txtPg3IShed4_18B')."frm1701:txtPg3IShed4_18B=</div>	
            <div>frm1701:txtPg3IShed5_1Desc=".request('frm1701:txtPg3IShed5_1Desc')."frm1701:txtPg3IShed5_1Desc=</div>	
            <div>frm1701:txtPg3IShed5_1Legal=".request('frm1701:txtPg3IShed5_1Legal')."frm1701:txtPg3IShed5_1Legal=</div>	
            <div>frm1701:txtPg3IShed5_1Amt=".request('frm1701:txtPg3IShed5_1Amt')."frm1701:txtPg3IShed5_1Amt=</div>	
            <div>frm1701:txtPg3IShed5_2Desc=".request('frm1701:txtPg3IShed5_2Desc')."frm1701:txtPg3IShed5_2Desc=</div>	
            <div>frm1701:txtPg3IShed5_2Legal=".request('frm1701:txtPg3IShed5_2Legal')."frm1701:txtPg3IShed5_2Legal=</div>	
            <div>frm1701:txtPg3IShed5_2Amt=".request('frm1701:txtPg3IShed5_2Amt')."frm1701:txtPg3IShed5_2Amt=</div>	
            <div>frm1701:txtPg3IShed5_3=".request('frm1701:txtPg3IShed5_3')."frm1701:txtPg3IShed5_3=</div>	
            <div>frm1701:txtPg3IShed5_4Desc=".request('frm1701:txtPg3IShed5_4Desc')."frm1701:txtPg3IShed5_4Desc=</div>	
            <div>frm1701:txtPg3IShed5_4Legal=".request('frm1701:txtPg3IShed5_4Legal')."frm1701:txtPg3IShed5_4Legal=</div>	
            <div>frm1701:txtPg3IShed5_4Amt=".request('frm1701:txtPg3IShed5_4Amt')."frm1701:txtPg3IShed5_4Amt=</div>	
            <div>frm1701:txtPg3IShed5_5Desc=".request('frm1701:txtPg3IShed5_5Desc')."frm1701:txtPg3IShed5_5Desc=</div>	
            <div>frm1701:txtPg3IShed5_5Legal=".request('frm1701:txtPg3IShed5_5Legal')."frm1701:txtPg3IShed5_5Legal=</div>	
            <div>frm1701:txtPg3IShed5_5Amt=".request('frm1701:txtPg3IShed5_5Amt')."frm1701:txtPg3IShed5_5Amt=</div>	
            <div>frm1701:txtPg3IShed5_6=".request('frm1701:txtPg3IShed5_6')."frm1701:txtPg3IShed5_6=</div>	
            <div>frm1701:txtPg3IShed6_1A=".request('frm1701:txtPg3IShed6_1A')."frm1701:txtPg3IShed6_1A=</div>	
            <div>frm1701:txtPg3IShed6_1B=".request('frm1701:txtPg3IShed6_1B')."frm1701:txtPg3IShed6_1B=</div>	
            <div>frm1701:txtPg3IShed6_2A=".request('frm1701:txtPg3IShed6_2A')."frm1701:txtPg3IShed6_2A=</div>	
            <div>frm1701:txtPg3IShed6_2B=".request('frm1701:txtPg3IShed6_2B')."frm1701:txtPg3IShed6_2B=</div>	
            <div>frm1701:txtPg3IShed6_3A=".request('frm1701:txtPg3IShed6_3A')."frm1701:txtPg3IShed6_3A=</div>	
            <div>frm1701:txtPg3IShed6_3B=".request('frm1701:txtPg3IShed6_3B')."frm1701:txtPg3IShed6_3B=</div>	
            <div>frm1701:txtPg3IShed6_4Year=".request('frm1701:txtPg3IShed6_4Year')."frm1701:txtPg3IShed6_4Year=</div>	
            <div>frm1701:txtPg3IShed6_4A=".request('frm1701:txtPg3IShed6_4A')."frm1701:txtPg3IShed6_4A=</div>	
            <div>frm1701:txtPg3IShed6_4B=".request('frm1701:txtPg3IShed6_4B')."frm1701:txtPg3IShed6_4B=</div>	
            <div>frm1701:txtPg3IShed6_4C=".request('frm1701:txtPg3IShed6_4C')."frm1701:txtPg3IShed6_4C=</div>	
            <div>frm1701:txtPg3IShed6_4D=".request('frm1701:txtPg3IShed6_4D')."frm1701:txtPg3IShed6_4D=</div>	
            <div>frm1701:txtPg3IShed6_4E=".request('frm1701:txtPg3IShed6_4E')."frm1701:txtPg3IShed6_4E=</div>	
            <div>frm1701:txtPg3IShed6_5Year=".request('frm1701:txtPg3IShed6_5Year"')."frm1701:txtPg3IShed6_5Year=</div>	
            <div>frm1701:txtPg3IShed6_5A=".request('frm1701:txtPg3IShed6_5A')."frm1701:txtPg3IShed6_5A=</div>	
            <div>frm1701:txtPg3IShed6_5B=".request('frm1701:txtPg3IShed6_5B')."frm1701:txtPg3IShed6_5B=</div>	
            <div>frm1701:txtPg3IShed6_5C=".request('frm1701:txtPg3IShed6_5C')."frm1701:txtPg3IShed6_5C=</div>	
            <div>frm1701:txtPg3IShed6_5D=".request('frm1701:txtPg3IShed6_5D')."frm1701:txtPg3IShed6_5D=</div>	
            <div>frm1701:txtPg3IShed6_5E=".request('frm1701:txtPg3IShed6_5E')."frm1701:txtPg3IShed6_5E=</div>	
            <div>frm1701:txtPg3IShed6_6Year=".request('frm1701:txtPg3IShed6_6Year')."frm1701:txtPg3IShed6_6Year=</div>	
            <div>frm1701:txtPg3IShed6_6A=".request('frm1701:txtPg3IShed6_6A')."frm1701:txtPg3IShed6_6A=</div>	
            <div>frm1701:txtPg3IShed6_6B=".request('frm1701:txtPg3IShed6_6B')."frm1701:txtPg3IShed6_6B=</div>	
            <div>frm1701:txtPg3IShed6_6C=".request('frm1701:txtPg3IShed6_6C')."frm1701:txtPg3IShed6_6C=</div>	
            <div>frm1701:txtPg3IShed6_6D=".request('frm1701:txtPg3IShed6_6D')."frm1701:txtPg3IShed6_6D=</div>	
            <div>frm1701:txtPg3IShed6_6E=".request('frm1701:txtPg3IShed6_6E')."frm1701:txtPg3IShed6_6E=</div>	
            <div>frm1701:txtPg3IShed6_7Year=".request('frm1701:txtPg3IShed6_7Year')."frm1701:txtPg3IShed6_7Year=</div>	
            <div>frm1701:txtPg3IShed6_7A=".request('frm1701:txtPg3IShed6_7A')."frm1701:txtPg3IShed6_7A=</div>	
            <div>frm1701:txtPg3IShed6_7B=".request('frm1701:txtPg3IShed6_7B')."frm1701:txtPg3IShed6_7B=</div>	
            <div>frm1701:txtPg3IShed6_7C=".request('frm1701:txtPg3IShed6_7C')."frm1701:txtPg3IShed6_7C=</div>	
            <div>frm1701:txtPg3IShed6_7D=".request('frm1701:txtPg3IShed6_7D')."frm1701:txtPg3IShed6_7D=</div>	
            <div>frm1701:txtPg3IShed6_7E=".request('frm1701:txtPg3IShed6_7E')."frm1701:txtPg3IShed6_7E=</div>	
            <div>frm1701:txtPg3IShed6_8D=".request('frm1701:txtPg3IShed6_8D')."frm1701:txtPg3IShed6_8D=</div>	
            <div>frm1701:txtPg4TIN1=".request('frm1701:txtPg2TIN1')."frm1701:txtPg4TIN1=</div>	
            <div>frm1701:txtPg4TIN2=".request('frm1701:txtPg2TIN2')."frm1701:txtPg4TIN2=</div>	
            <div>frm1701:txtPg4TIN3=".request('frm1701:txtPg2TIN3')."frm1701:txtPg4TIN3=</div>	
            <div>frm1701:txtPg4BranchCode=".request('frm1701:txtPg2BranchCode')."frm1701:txtPg4BranchCode=</div>	
            <div>frm1701:txtPg4TaxpayerName=".request('frm1701:txtPg2TaxpayerName')."frm1701:txtPg4TaxpayerName=</div>	
            <div>frm1701:txtPg4IShed6_9Year=".request('frm1701:txtPg4IShed6_9Year')."frm1701:txtPg4IShed6_9Year=</div>	
            <div>frm1701:txtPg4IShed6_9A=".request('frm1701:txtPg4IShed6_9A')."frm1701:txtPg4IShed6_9A=</div>	
            <div>frm1701:txtPg4IShed6_9B=".request('frm1701:txtPg4IShed6_9B')."frm1701:txtPg4IShed6_9B=</div>	
            <div>frm1701:txtPg4IShed6_9C=".request('frm1701:txtPg4IShed6_9C')."frm1701:txtPg4IShed6_9C=</div>	
            <div>frm1701:txtPg4IShed6_9D=".request('frm1701:txtPg4IShed6_9D')."frm1701:txtPg4IShed6_9D=</div>	
            <div>frm1701:txtPg4IShed6_9E=".request('frm1701:txtPg4IShed6_9E')."frm1701:txtPg4IShed6_9E=</div>	
            <div>frm1701:txtPg4IShed6_10Year=".request('frm1701:txtPg4IShed6_10Year')."frm1701:txtPg4IShed6_10Year=</div>	
            <div>frm1701:txtPg4IShed6_10A=".request('frm1701:txtPg4IShed6_10A')."frm1701:txtPg4IShed6_10A=</div>	
            <div>frm1701:txtPg4IShed6_10B=".request('frm1701:txtPg4IShed6_10B')."frm1701:txtPg4IShed6_10B=</div>	
            <div>frm1701:txtPg4IShed6_10C=".request('frm1701:txtPg4IShed6_10C')."frm1701:txtPg4IShed6_10C=</div>	
            <div>frm1701:txtPg4IShed6_10D=".request('frm1701:txtPg4IShed6_10D')."frm1701:txtPg4IShed6_10D=</div>	
            <div>frm1701:txtPg4IShed6_10E=".request('frm1701:txtPg4IShed6_10E')."frm1701:txtPg4IShed6_10E=</div>	
            <div>frm1701:txtPg4IShed6_11Year=".request('frm1701:txtPg4IShed6_11Year')."frm1701:txtPg4IShed6_11Year=</div>	
            <div>frm1701:txtPg4IShed6_11A=".request('frm1701:txtPg4IShed6_11A')."frm1701:txtPg4IShed6_11A=</div>	
            <div>frm1701:txtPg4IShed6_11B=".request('frm1701:txtPg4IShed6_11B')."frm1701:txtPg4IShed6_11B=</div>	
            <div>frm1701:txtPg4IShed6_11C=".request('frm1701:txtPg4IShed6_11C')."frm1701:txtPg4IShed6_11C=</div>	
            <div>frm1701:txtPg4IShed6_11D=".request('frm1701:txtPg4IShed6_11D')."frm1701:txtPg4IShed6_11D=</div>	
            <div>frm1701:txtPg4IShed6_11E=".request('frm1701:txtPg4IShed6_11E')."frm1701:txtPg4IShed6_11E=</div>	
            <div>frm1701:txtPg4IShed6_12Year=".request('frm1701:txtPg4IShed6_12Year')."frm1701:txtPg4IShed6_12Year=</div>	
            <div>frm1701:txtPg4IShed6_12A=".request('frm1701:txtPg4IShed6_12A')."frm1701:txtPg4IShed6_12A=</div>	
            <div>frm1701:txtPg4IShed6_12B=".request('frm1701:txtPg4IShed6_12B')."frm1701:txtPg4IShed6_12B=</div>	
            <div>frm1701:txtPg4IShed6_12C=".request('frm1701:txtPg4IShed6_12C')."frm1701:txtPg4IShed6_12C=</div>	
            <div>frm1701:txtPg4IShed6_12D=".request('frm1701:txtPg4IShed6_12D')."frm1701:txtPg4IShed6_12D=</div>	
            <div>frm1701:txtPg4IShed6_12E=".request('frm1701:txtPg4IShed6_12E')."frm1701:txtPg4IShed6_12E=</div>	
            <div>frm1701:txtPg3IShed6_8D=".request('frm1701:txtPg3IShed6_8D')."frm1701:txtPg3IShed6_8D=</div>	
            <div>frm1701:txtPg4IPart6_1A=".request('frm1701:txtPg4IPart6_1A')."frm1701:txtPg4IPart6_1A=</div>	
            <div>frm1701:txtPg4IPart6_1B=".request('frm1701:txtPg4IPart6_1B')."frm1701:txtPg4IPart6_1B=</div>	
            <div>frm1701:txtPg4IPart6_2A=".request('frm1701:txtPg4IPart6_2A')."frm1701:txtPg4IPart6_2A=</div>	
            <div>frm1701:txtPg4IPart6_2B=".request('frm1701:txtPg4IPart6_2B')."frm1701:txtPg4IPart6_2B=</div>	
            <div>frm1701:txtPg4IPart6_3A=".request('frm1701:txtPg4IPart6_3A')."frm1701:txtPg4IPart6_3A=</div>	
            <div>frm1701:txtPg4IPart6_3B=".request('frm1701:txtPg4IPart6_3B')."frm1701:txtPg4IPart6_3B=</div>	
            <div>frm1701:txtPg4IPart6_4A=".request('frm1701:txtPg4IPart6_4A')."frm1701:txtPg4IPart6_4A=</div>	
            <div>frm1701:txtPg4IPart6_4B=".request('frm1701:txtPg4IPart6_4B')."frm1701:txtPg4IPart6_4B=</div>	
            <div>frm1701:txtPg4IPart6_5A=".request('frm1701:txtPg4IPart6_5A')."frm1701:txtPg4IPart6_5A=</div>	
            <div>frm1701:txtPg4IPart6_5B=".request('frm1701:txtPg4IPart6_5B')."frm1701:txtPg4IPart6_5B=</div>	
            <div>frm1701:txtPg4IPart7_1A=".request('frm1701:txtPg4IPart7_1A')."frm1701:txtPg4IPart7_1A=</div>	
            <div>frm1701:txtPg4IPart7_1B=".request('frm1701:txtPg4IPart7_1B')."frm1701:txtPg4IPart7_1B=</div>	
            <div>frm1701:txtPg4IPart7_2A=".request('frm1701:txtPg4IPart7_2A')."frm1701:txtPg4IPart7_2A=</div>	
            <div>frm1701:txtPg4IPart7_2B=".request('frm1701:txtPg4IPart7_2B')."frm1701:txtPg4IPart7_2B=</div>	
            <div>frm1701:txtPg4IPart7_3A=".request('frm1701:txtPg4IPart7_3A')."frm1701:txtPg4IPart7_3A=</div>	
            <div>frm1701:txtPg4IPart7_3B=".request('frm1701:txtPg4IPart7_3B')."frm1701:txtPg4IPart7_3B=</div>	
            <div>frm1701:txtPg4IPart7_4A=".request('frm1701:txtPg4IPart7_4A')."frm1701:txtPg4IPart7_4A=</div>	
            <div>frm1701:txtPg4IPart7_4B=".request('frm1701:txtPg4IPart7_4B')."frm1701:txtPg4IPart7_4B=</div>	
            <div>frm1701:txtPg4IPart7_5A=".request('frm1701:txtPg4IPart7_5A')."frm1701:txtPg4IPart7_5A=</div>	
            <div>frm1701:txtPg4IPart7_5B=".request('frm1701:txtPg4IPart7_5B')."frm1701:txtPg4IPart7_5B=</div>	
            <div>frm1701:txtPg4IPart7_6A=".request('frm1701:txtPg4IPart7_6A')."frm1701:txtPg4IPart7_6A=</div>	
            <div>frm1701:txtPg4IPart7_6B=".request('frm1701:txtPg4IPart7_6B')."frm1701:txtPg4IPart7_6B=</div>	
            <div>frm1701:txtPg4IPart7_7A=".request('frm1701:txtPg4IPart7_7A')."frm1701:txtPg4IPart7_7A=</div>	
            <div>frm1701:txtPg4IPart7_7B=".request('frm1701:txtPg4IPart7_7B')."frm1701:txtPg4IPart7_7B=</div>	
            <div>frm1701:txtPg4IPart7_8A=".request('frm1701:txtPg4IPart7_8A')."frm1701:txtPg4IPart7_8A=</div>	
            <div>frm1701:txtPg4IPart7_8B=".request('frm1701:txtPg4IPart7_8B')."frm1701:txtPg4IPart7_8B=</div>	
            <div>frm1701:txtPg4IPart7_9Specify=".request('frm1701:txtPg4IPart7_9Specify')."frm1701:txtPg4IPart7_9Specify=</div>	
            <div>frm1701:txtPg4IPart7_9A=".request('frm1701:txtPg4IPart7_9A')."frm1701:txtPg4IPart7_9A=</div>	
            <div>frm1701:txtPg4IPart7_9B=".request('frm1701:txtPg4IPart7_9B')."frm1701:txtPg4IPart7_9B=</div>	
            <div>frm1701:txtPg4IPart7_10A=".request('frm1701:txtPg4IPart7_10A')."frm1701:txtPg4IPart7_10A=</div>	
            <div>frm1701:txtPg4IPart7_10B=".request('frm1701:txtPg4IPart7_10B')."frm1701:txtPg4IPart7_10B=</div>	
            <div>frm1701:txtPg4IPart8_1A=".request('frm1701:txtPg4IPart8_1A')."frm1701:txtPg4IPart8_1A=</div>	
            <div>frm1701:txtPg4IPart8_1B=".request('frm1701:txtPg4IPart8_1B')."frm1701:txtPg4IPart8_1B=</div>	
            <div>frm1701:txtPg4IPart8_2A=".request('frm1701:txtPg4IPart8_2A')."frm1701:txtPg4IPart8_2A=</div>	
            <div>frm1701:txtPg4IPart8_2B=".request('frm1701:txtPg4IPart8_2B')."frm1701:txtPg4IPart8_2B=</div>	
            <div>frm1701:txtPg4IPart8_3A=".request('frm1701:txtPg4IPart8_3A')."frm1701:txtPg4IPart8_3A=</div>	
            <div>frm1701:txtPg4IPart8_3B=".request('frm1701:txtPg4IPart8_3B')."frm1701:txtPg4IPart8_3B=</div>	
            <div>frm1701:txtPg4IPart8_4A=".request('frm1701:txtPg4IPart8_4A')."frm1701:txtPg4IPart8_4A=</div>	
            <div>frm1701:txtPg4IPart8_4B=".request('frm1701:txtPg4IPart8_4B')."frm1701:txtPg4IPart8_4B=</div>	
            <div>frm1701:txtPg4IPart8_5A=".request('frm1701:txtPg4IPart8_5A')."frm1701:txtPg4IPart8_5A=</div>	
            <div>frm1701:txtPg4IPart8_5B=".request('frm1701:txtPg4IPart8_5B')."frm1701:txtPg4IPart8_5B=</div>	
            <div>frm1701:txtPg4IPart8_6A=".request('frm1701:txtPg4IPart8_6A')."frm1701:txtPg4IPart8_6A=</div>	
            <div>frm1701:txtPg4IPart8_6B=".request('frm1701:txtPg4IPart8_6B')."frm1701:txtPg4IPart8_6B=</div>	
            <div>frm1701:txtPg4IPart8_7A=".request('frm1701:txtPg4IPart8_7A')."frm1701:txtPg4IPart8_7A=</div>	
            <div>frm1701:txtPg4IPart8_7B=".request('frm1701:txtPg4IPart8_7B')."frm1701:txtPg4IPart8_7B=</div>	
            <div>frm1701:txtPg4IPart8_8A=".request('frm1701:txtPg4IPart8_8A')."frm1701:txtPg4IPart8_8A=</div>	
            <div>frm1701:txtPg4IPart8_8B=".request('frm1701:txtPg4IPart8_8B')."frm1701:txtPg4IPart8_8B=</div>	
            <div>frm1701:txtPg4IPart8_9A=".request('frm1701:txtPg4IPart8_9A')."frm1701:txtPg4IPart8_9A=</div>	
            <div>frm1701:txtPg4IPart8_9B=".request('frm1701:txtPg4IPart8_9B')."frm1701:txtPg4IPart8_9B=</div>	
            <div>frm1701:txtPg4IPart8_10A=".request('frm1701:txtPg4IPart8_10A')."frm1701:txtPg4IPart8_10A=</div>	
            <div>frm1701:txtPg4IPart8_10B=".request('frm1701:txtPg4IPart8_10B')."frm1701:txtPg4IPart8_10B=</div>	
            <div>frm1701:txtPg4IPart9_1A=".request('frm1701:txtPg4IPart9_1A')."frm1701:txtPg4IPart9_1A=</div>	
            <div>frm1701:txtPg4IPart9_1B=".request('frm1701:txtPg4IPart9_1B')."frm1701:txtPg4IPart9_1B=</div>	
            <div>frm1701:txtPg4IPart9_2Particulars=".request('frm1701:txtPg4IPart9_2Particulars')."frm1701:txtPg4IPart9_2Particulars=</div>	
            <div>frm1701:txtPg4IPart9_2A=".request('frm1701:txtPg4IPart9_2A')."frm1701:txtPg4IPart9_2A=</div>	
            <div>frm1701:txtPg4IPart9_2B=".request('frm1701:txtPg4IPart9_2B')."frm1701:txtPg4IPart9_2B=</div>	
            <div>frm1701:txtPg4IPart9_3Particulars=".request('frm1701:txtPg4IPart9_3Particulars')."frm1701:txtPg4IPart9_3Particulars=</div>	
            <div>frm1701:txtPg4IPart9_3A=".request('frm1701:txtPg4IPart9_3A')."frm1701:txtPg4IPart9_3A=</div>	
            <div>frm1701:txtPg4IPart9_3B=".request('frm1701:txtPg4IPart9_3B')."frm1701:txtPg4IPart9_3B=</div>	
            <div>frm1701:txtPg4IPart9_4Particulars=".request('frm1701:txtPg4IPart9_4Particulars')."frm1701:txtPg4IPart9_4Particulars=</div>	
            <div>frm1701:txtPg4IPart9_4A=".request('frm1701:txtPg4IPart9_4A')."frm1701:txtPg4IPart9_4A=</div>	
            <div>frm1701:txtPg4IPart9_4B=".request('frm1701:txtPg4IPart9_4B')."frm1701:txtPg4IPart9_4B=</div>	
            <div>frm1701:txtPg4IPart9_5A=".request('frm1701:txtPg4IPart9_5A')."frm1701:txtPg4IPart9_5A=</div>	
            <div>frm1701:txtPg4IPart9_5B=".request('frm1701:txtPg4IPart9_5B')."frm1701:txtPg4IPart9_5B=</div>	
            <div>frm1701:txtPg4IPart9_6Particulars=".request('frm1701:txtPg4IPart9_6Particulars')."frm1701:txtPg4IPart9_6Particulars=</div>	
            <div>frm1701:txtPg4IPart9_6A=".request('frm1701:txtPg4IPart9_6A')."frm1701:txtPg4IPart9_6A=</div>	
            <div>frm1701:txtPg4IPart9_6B=".request('frm1701:txtPg4IPart9_6B')."frm1701:txtPg4IPart9_6B=</div>	
            <div>frm1701:txtPg4IPart9_7Particulars=".request('frm1701:txtPg4IPart9_7Particulars')."frm1701:txtPg4IPart9_7Particulars=</div>	
            <div>frm1701:txtPg4IPart9_7A=".request('frm1701:txtPg4IPart9_7A')."frm1701:txtPg4IPart9_7A=</div>	
            <div>frm1701:txtPg4IPart9_7B=".request('frm1701:txtPg4IPart9_7B')."frm1701:txtPg4IPart9_7B=</div>	
            <div>frm1701:txtPg4IPart9_8Particulars=".request('frm1701:txtPg4IPart9_8Particulars')."frm1701:txtPg4IPart9_8Particulars=</div>	
            <div>frm1701:txtPg4IPart9_8A=".request('frm1701:txtPg4IPart9_8A')."frm1701:txtPg4IPart9_8A=</div>	
            <div>frm1701:txtPg4IPart9_8B=".request('frm1701:txtPg4IPart9_8B')."frm1701:txtPg4IPart9_8B=</div>	
            <div>frm1701:txtPg4IPart9_9Particulars=".request('frm1701:txtPg4IPart9_9Particulars')."frm1701:txtPg4IPart9_9Particulars=</div>	
            <div>frm1701:txtPg4IPart9_9A=".request('frm1701:txtPg4IPart9_9A')."frm1701:txtPg4IPart9_9A=</div>	
            <div>frm1701:txtPg4IPart9_9B=".request('frm1701:txtPg4IPart9_9B')."frm1701:txtPg4IPart9_9B=</div>	
            <div>frm1701:txtPg4IPart9_10A=".request('frm1701:txtPg4IPart9_10A')."frm1701:txtPg4IPart9_10A=</div>	
            <div>frm1701:txtPg4IPart9_10B=".request('frm1701:txtPg4IPart9_10B')."frm1701:txtPg4IPart9_10B=</div>	
            <div>frm1701:txtPg4IPart9_11A=".request('frm1701:txtPg4IPart9_11A')."frm1701:txtPg4IPart9_11A=</div>	
            <div>frm1701:txtPg4IPart9_11B=".request('frm1701:txtPg4IPart9_11B')."frm1701:txtPg4IPart9_11B=</div>	
            <div>attachmentCurrent=1attachmentCurrent=</div>	
            <div>attachmentTotal=".(null !== request('attachmentTotal') ? request('attachmentTotal') : '0')."attachmentTotal=</div>	
            ".$attachement."<div>frm1701:txtPg1mTIN1=".request('frm1701:txtPg2TIN1')."frm1701:txtPg1mTIN1=</div>	
            <div>frm1701:txtPg1mTIN2=".request('frm1701:txtPg2TIN2')."frm1701:txtPg1mTIN2=</div>	
            <div>frm1701:txtPg1mTIN3=".request('frm1701:txtPg2TIN3')."frm1701:txtPg1mTIN3=</div>	
            <div>frm1701:txtPg1mBranchCode=".request('frm1701:txtPg2BranchCode')."frm1701:txtPg1mBranchCode=</div>	
            <div>frm1701:txtPg1mTaxpayerName=".request('frm1701:txtPg2TaxpayerName')."frm1701:txtPg1mTaxpayerName=</div>	
            <div>frm1701:rdoPg1mOption1TYPE=falsefrm1701:rdoPg1mOption1TYPE=</div>	
            <div>frm1701:rdoPg1mOption2TYPE=falsefrm1701:rdoPg1mOption2TYPE=</div>	
            <div>frm1701:txtPg1mI1ASchdATYPE=frm1701:txtPg1mI1ASchdATYPE=</div>	
            <div>frm1701:txtPg1mI1BSchdATYPE=frm1701:txtPg1mI1BSchdATYPE=</div>	
            <div>frm1701:txtPg1mI1CSchdATYPE=frm1701:txtPg1mI1CSchdATYPE=</div>	
            <div>frm1701:txtPg1mI1DSchdATYPE=frm1701:txtPg1mI1DSchdATYPE=</div>	
            <div>frm1701:txtPg1mI1ESchdATYPE=frm1701:txtPg1mI1ESchdATYPE=</div>	
            <div>frm1701:txtPg1mI1FSchdATYPE=frm1701:txtPg1mI1FSchdATYPE=</div>	
            <div>frm1701:txtPg1mI2ASchdATYPE=frm1701:txtPg1mI2ASchdATYPE=</div>	
            <div>frm1701:txtPg1mI2BSchdATYPE=frm1701:txtPg1mI2BSchdATYPE=</div>	
            <div>frm1701:txtPg1mI2CSchdATYPE=frm1701:txtPg1mI2CSchdATYPE=</div>	
            <div>frm1701:txtPg1mI2DSchdATYPE=frm1701:txtPg1mI2DSchdATYPE=</div>	
            <div>frm1701:txtPg1mI2ESchdATYPE=frm1701:txtPg1mI2ESchdATYPE=</div>	
            <div>frm1701:txtPg1mI2FSchdATYPE=frm1701:txtPg1mI2FSchdATYPE=</div>	
            <div>frm1701:txtPg1mI3ASchdATYPE=frm1701:txtPg1mI3ASchdATYPE=</div>	
            <div>frm1701:txtPg1mI3BSchdATYPE=frm1701:txtPg1mI3BSchdATYPE=</div>	
            <div>frm1701:txtPg1mI3CSchdATYPE=frm1701:txtPg1mI3CSchdATYPE=</div>	
            <div>frm1701:txtPg1mI3DSchdATYPE=frm1701:txtPg1mI3DSchdATYPE=</div>	
            <div>frm1701:txtPg1mI3ESchdATYPE=frm1701:txtPg1mI3ESchdATYPE=</div>	
            <div>frm1701:txtPg1mI3FSchdATYPE=frm1701:txtPg1mI3FSchdATYPE=</div>	
            <div>frm1701:txtPg1mI4BSchdATYPE=0.00frm1701:txtPg1mI4BSchdATYPE=</div>	
            <div>frm1701:txtPg1mI4ESchdATYPE=0.00frm1701:txtPg1mI4ESchdATYPE=</div>	
            <div>frm1701:txtPg1mI5ASchdATYPE=frm1701:txtPg1mI5ASchdATYPE=</div>	
            <div>frm1701:txtPg1mI5BSchdATYPE=frm1701:txtPg1mI5BSchdATYPE=</div>	
            <div>frm1701:txtPg1mI5CSchdATYPE=frm1701:txtPg1mI5CSchdATYPE=</div>	
            <div>frm1701:txtPg1mI5DSchdATYPE=frm1701:txtPg1mI5DSchdATYPE=</div>	
            <div>frm1701:txtPg1mI5ESchdATYPE=frm1701:txtPg1mI5ESchdATYPE=</div>	
            <div>frm1701:txtPg1mI5FSchdATYPE=frm1701:txtPg1mI5FSchdATYPE=</div>	
            <div>frm1701:txtPg1mI6ASchdATYPE=frm1701:txtPg1mI6ASchdATYPE=</div>	
            <div>frm1701:txtPg1mI6BSchdATYPE=frm1701:txtPg1mI6BSchdATYPE=</div>	
            <div>frm1701:txtPg1mI6CSchdATYPE=frm1701:txtPg1mI6CSchdATYPE=</div>	
            <div>frm1701:txtPg1mI6DSchdATYPE=frm1701:txtPg1mI6DSchdATYPE=</div>	
            <div>frm1701:txtPg1mI6ESchdATYPE=frm1701:txtPg1mI6ESchdATYPE=</div>	
            <div>frm1701:txtPg1mI6FSchdATYPE=frm1701:txtPg1mI6FSchdATYPE=</div>	
            <div>frm1701:txtPg1mI1ASchdBTYPE=0.00frm1701:txtPg1mI1ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI1BSchdBTYPE=0.00frm1701:txtPg1mI1BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI1CSchdBTYPE=0.00frm1701:txtPg1mI1CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI1DSchdBTYPE=0.00frm1701:txtPg1mI1DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI1ESchdBTYPE=0.00frm1701:txtPg1mI1ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI1FSchdBTYPE=0.00frm1701:txtPg1mI1FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI1GSchdBTYPE=0.00frm1701:txtPg1mI1GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI1HSchdBTYPE=0.00frm1701:txtPg1mI1HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI2ASchdBTYPE=0.00frm1701:txtPg1mI2ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI2BSchdBTYPE=0.00frm1701:txtPg1mI2BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI2CSchdBTYPE=0.00frm1701:txtPg1mI2CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI2DSchdBTYPE=0.00frm1701:txtPg1mI2DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI2ESchdBTYPE=0.00frm1701:txtPg1mI2ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI2FSchdBTYPE=0.00frm1701:txtPg1mI2FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI2GSchdBTYPE=0.00frm1701:txtPg1mI2GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI2HSchdBTYPE=0.00frm1701:txtPg1mI2HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI3ASchdBTYPE=0.00frm1701:txtPg1mI3ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI3BSchdBTYPE=0.00frm1701:txtPg1mI3BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI3CSchdBTYPE=0.00frm1701:txtPg1mI3CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI3DSchdBTYPE=0.00frm1701:txtPg1mI3DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI3ESchdBTYPE=0.00frm1701:txtPg1mI3ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI3FSchdBTYPE=0.00frm1701:txtPg1mI3FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI3GSchdBTYPE=0.00frm1701:txtPg1mI3GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI3HSchdBTYPE=0.00frm1701:txtPg1mI3HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI4ASchdBTYPE=0.00frm1701:txtPg1mI4ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI4BSchdBTYPE=0.00frm1701:txtPg1mI4BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI4CSchdBTYPE=0.00frm1701:txtPg1mI4CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI4DSchdBTYPE=0.00frm1701:txtPg1mI4DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI4ESchdBTYPE=0.00frm1701:txtPg1mI4ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI4FSchdBTYPE=0.00frm1701:txtPg1mI4FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI4GSchdBTYPE=0.00frm1701:txtPg1mI4GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI4HSchdBTYPE=0.00frm1701:txtPg1mI4HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI5ASchdBTYPE=0.00frm1701:txtPg1mI5ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI5BSchdBTYPE=0.00frm1701:txtPg1mI5BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI5CSchdBTYPE=0.00frm1701:txtPg1mI5CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI5DSchdBTYPE=0.00frm1701:txtPg1mI5DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI5ESchdBTYPE=0.00frm1701:txtPg1mI5ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI5FSchdBTYPE=0.00frm1701:txtPg1mI5FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI5GSchdBTYPE=0.00frm1701:txtPg1mI5GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI5HSchdBTYPE=0.00frm1701:txtPg1mI5HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI6ASchdBTYPE=0.00frm1701:txtPg1mI6ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI6BSchdBTYPE=0.00frm1701:txtPg1mI6BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI6CSchdBTYPE=0.00frm1701:txtPg1mI6CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI6DSchdBTYPE=0.00frm1701:txtPg1mI6DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI6ESchdBTYPE=0.00frm1701:txtPg1mI6ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI6FSchdBTYPE=0.00frm1701:txtPg1mI6FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI6GSchdBTYPE=0.00frm1701:txtPg1mI6GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI6HSchdBTYPE=0.00frm1701:txtPg1mI6HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI7ASchdBTYPE=0.00frm1701:txtPg1mI7ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI7BSchdBTYPE=0.00frm1701:txtPg1mI7BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI7CSchdBTYPE=0.00frm1701:txtPg1mI7CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI7DSchdBTYPE=0.00frm1701:txtPg1mI7DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI7ESchdBTYPE=0.00frm1701:txtPg1mI7ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI7FSchdBTYPE=0.00frm1701:txtPg1mI7FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI7GSchdBTYPE=0.00frm1701:txtPg1mI7GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI7HSchdBTYPE=0.00frm1701:txtPg1mI7HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI8CSchdBTYPE=0.00frm1701:txtPg1mI8CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI8DSchdBTYPE=0.00frm1701:txtPg1mI8DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI8GSchdBTYPE=0.00frm1701:txtPg1mI8GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI8HSchdBTYPE=0.00frm1701:txtPg1mI8HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI9ASchdBTYPE=0.00frm1701:txtPg1mI9ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI9BSchdBTYPE=0.00frm1701:txtPg1mI9BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI9CSchdBTYPE=0.00frm1701:txtPg1mI9CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI9DSchdBTYPE=0.00frm1701:txtPg1mI9DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI9ESchdBTYPE=0.00frm1701:txtPg1mI9ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI9FSchdBTYPE=0.00frm1701:txtPg1mI9FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI9GSchdBTYPE=0.00frm1701:txtPg1mI9GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI9HSchdBTYPE=0.00frm1701:txtPg1mI9HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI10CSchdBTYPE=0.00frm1701:txtPg1mI10CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI10DSchdBTYPE=0.00frm1701:txtPg1mI10DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI10GSchdBTYPE=0.00frm1701:txtPg1mI10GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI10HSchdBTYPE=0.00frm1701:txtPg1mI10HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI11ASchdBTYPE=0.00frm1701:txtPg1mI11ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI11BSchdBTYPE=0.00frm1701:txtPg1mI11BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI11CSchdBTYPE=0.00frm1701:txtPg1mI11CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI11DSchdBTYPE=0.00frm1701:txtPg1mI11DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI11ESchdBTYPE=0.00frm1701:txtPg1mI11ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI11FSchdBTYPE=0.00frm1701:txtPg1mI11FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI11GSchdBTYPE=0.00frm1701:txtPg1mI11GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI11HSchdBTYPE=0.00frm1701:txtPg1mI11HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI12DescSchdBTYPE=frm1701:txtPg1mI12DescSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI12ASchdBTYPE=0.00frm1701:txtPg1mI12ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI12BSchdBTYPE=0.00frm1701:txtPg1mI12BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI12CSchdBTYPE=0.00frm1701:txtPg1mI12CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI12DSchdBTYPE=0.00frm1701:txtPg1mI12DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI12ESchdBTYPE=0.00frm1701:txtPg1mI12ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI12FSchdBTYPE=0.00frm1701:txtPg1mI12FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI12GSchdBTYPE=0.00frm1701:txtPg1mI12GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI12HSchdBTYPE=0.00frm1701:txtPg1mI12HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI13DescSchdBTYPE=frm1701:txtPg1mI13DescSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI13ASchdBTYPE=0.00frm1701:txtPg1mI13ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI13BSchdBTYPE=0.00frm1701:txtPg1mI13BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI13CSchdBTYPE=0.00frm1701:txtPg1mI13CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI13DSchdBTYPE=0.00frm1701:txtPg1mI13DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI13ESchdBTYPE=0.00frm1701:txtPg1mI13ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI13FSchdBTYPE=0.00frm1701:txtPg1mI13FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI13GSchdBTYPE=0.00frm1701:txtPg1mI13GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI13HSchdBTYPE=0.00frm1701:txtPg1mI13HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI14CSchdBTYPE=0.00frm1701:txtPg1mI14CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI14DSchdBTYPE=0.00frm1701:txtPg1mI14DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI14GSchdBTYPE=0.00frm1701:txtPg1mI14GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI14HSchdBTYPE=0.00frm1701:txtPg1mI14HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI15ASchdBTYPE=0.00frm1701:txtPg1mI15ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI15BSchdBTYPE=0.00frm1701:txtPg1mI15BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI15CSchdBTYPE=0.00frm1701:txtPg1mI15CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI15DSchdBTYPE=0.00frm1701:txtPg1mI15DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI15ESchdBTYPE=0.00frm1701:txtPg1mI15ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI15FSchdBTYPE=0.00frm1701:txtPg1mI15FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI15GSchdBTYPE=0.00frm1701:txtPg1mI15GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI15HSchdBTYPE=0.00frm1701:txtPg1mI15HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI16ASchdBTYPE=0.00frm1701:txtPg1mI16ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI16BSchdBTYPE=0.00frm1701:txtPg1mI16BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI16CSchdBTYPE=0.00frm1701:txtPg1mI16CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI16DSchdBTYPE=0.00frm1701:txtPg1mI16DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI16ESchdBTYPE=0.00frm1701:txtPg1mI16ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI16FSchdBTYPE=0.00frm1701:txtPg1mI16FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI16GSchdBTYPE=0.00frm1701:txtPg1mI16GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI16HSchdBTYPE=0.00frm1701:txtPg1mI16HSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI17ASchdBTYPE=0.00frm1701:txtPg1mI17ASchdBTYPE=</div>	
            <div>frm1701:txtPg1mI17BSchdBTYPE=0.00frm1701:txtPg1mI17BSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI17CSchdBTYPE=0.00frm1701:txtPg1mI17CSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI17DSchdBTYPE=0.00frm1701:txtPg1mI17DSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI17ESchdBTYPE=0.00frm1701:txtPg1mI17ESchdBTYPE=</div>	
            <div>frm1701:txtPg1mI17FSchdBTYPE=0.00frm1701:txtPg1mI17FSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI17GSchdBTYPE=0.00frm1701:txtPg1mI17GSchdBTYPE=</div>	
            <div>frm1701:txtPg1mI17HSchdBTYPE=0.00frm1701:txtPg1mI17HSchdBTYPE=</div>	
            <div>frm1701:txtPg2mTIN1=666frm1701:txtPg2mTIN1=</div>	
            <div>frm1701:txtPg2mTIN2=666frm1701:txtPg2mTIN2=</div>	
            <div>frm1701:txtPg2mTIN3=666frm1701:txtPg2mTIN3=</div>	
            <div>frm1701:txtPg2mBranchCode=000frm1701:txtPg2mBranchCode=</div>	
            <div>frm1701:txtPg2mTaxpayerName=TSUfrm1701:txtPg2mTaxpayerName=</div>	
            <div>frm1701:txtPg2mI1ASchdCTYPE=0.00frm1701:txtPg2mI1ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI1BSchdCTYPE=0.00frm1701:txtPg2mI1BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI1CSchdCTYPE=0.00frm1701:txtPg2mI1CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI1DSchdCTYPE=0.00frm1701:txtPg2mI1DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI2ASchdCTYPE=0.00frm1701:txtPg2mI2ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI2BSchdCTYPE=0.00frm1701:txtPg2mI2BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI2CSchdCTYPE=0.00frm1701:txtPg2mI2CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI2DSchdCTYPE=0.00frm1701:txtPg2mI2DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI3ASchdCTYPE=0.00frm1701:txtPg2mI3ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI3BSchdCTYPE=0.00frm1701:txtPg2mI3BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI3CSchdCTYPE=0.00frm1701:txtPg2mI3CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI3DSchdCTYPE=0.00frm1701:txtPg2mI3DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI4ASchdCTYPE=0.00frm1701:txtPg2mI4ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI4BSchdCTYPE=0.00frm1701:txtPg2mI4BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI4CSchdCTYPE=0.00frm1701:txtPg2mI4CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI4DSchdCTYPE=0.00frm1701:txtPg2mI4DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI5ASchdCTYPE=0.00frm1701:txtPg2mI5ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI5BSchdCTYPE=0.00frm1701:txtPg2mI5BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI5CSchdCTYPE=0.00frm1701:txtPg2mI5CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI5DSchdCTYPE=0.00frm1701:txtPg2mI5DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI6ASchdCTYPE=0.00frm1701:txtPg2mI6ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI6BSchdCTYPE=0.00frm1701:txtPg2mI6BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI6CSchdCTYPE=0.00frm1701:txtPg2mI6CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI6DSchdCTYPE=0.00frm1701:txtPg2mI6DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI7ASchdCTYPE=0.00frm1701:txtPg2mI7ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI7BSchdCTYPE=0.00frm1701:txtPg2mI7BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI7CSchdCTYPE=0.00frm1701:txtPg2mI7CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI7DSchdCTYPE=0.00frm1701:txtPg2mI7DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI8ASchdCTYPE=0.00frm1701:txtPg2mI8ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI8BSchdCTYPE=0.00frm1701:txtPg2mI8BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI8CSchdCTYPE=0.00frm1701:txtPg2mI8CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI8DSchdCTYPE=0.00frm1701:txtPg2mI8DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI9ASchdCTYPE=0.00frm1701:txtPg2mI9ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI9BSchdCTYPE=0.00frm1701:txtPg2mI9BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI9CSchdCTYPE=0.00frm1701:txtPg2mI9CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI9DSchdCTYPE=0.00frm1701:txtPg2mI9DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI10ASchdCTYPE=0.00frm1701:txtPg2mI10ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI10BSchdCTYPE=0.00frm1701:txtPg2mI10BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI10CSchdCTYPE=0.00frm1701:txtPg2mI10CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI10DSchdCTYPE=0.00frm1701:txtPg2mI10DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI11ASchdCTYPE=0.00frm1701:txtPg2mI11ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI11BSchdCTYPE=0.00frm1701:txtPg2mI11BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI11CSchdCTYPE=0.00frm1701:txtPg2mI11CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI11DSchdCTYPE=0.00frm1701:txtPg2mI11DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI12ASchdCTYPE=0.00frm1701:txtPg2mI12ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI12BSchdCTYPE=0.00frm1701:txtPg2mI12BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI12CSchdCTYPE=0.00frm1701:txtPg2mI12CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI12DSchdCTYPE=0.00frm1701:txtPg2mI12DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI13ASchdCTYPE=0.00frm1701:txtPg2mI13ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI13BSchdCTYPE=0.00frm1701:txtPg2mI13BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI13CSchdCTYPE=0.00frm1701:txtPg2mI13CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI13DSchdCTYPE=0.00frm1701:txtPg2mI13DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI14ASchdCTYPE=0.00frm1701:txtPg2mI14ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI14BSchdCTYPE=0.00frm1701:txtPg2mI14BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI14CSchdCTYPE=0.00frm1701:txtPg2mI14CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI14DSchdCTYPE=0.00frm1701:txtPg2mI14DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI15ASchdCTYPE=0.00frm1701:txtPg2mI15ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI15BSchdCTYPE=0.00frm1701:txtPg2mI15BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI15CSchdCTYPE=0.00frm1701:txtPg2mI15CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI15DSchdCTYPE=0.00frm1701:txtPg2mI15DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI16ASchdCTYPE=0.00frm1701:txtPg2mI16ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI16BSchdCTYPE=0.00frm1701:txtPg2mI16BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI16CSchdCTYPE=0.00frm1701:txtPg2mI16CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI16DSchdCTYPE=0.00frm1701:txtPg2mI16DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17aASchdCTYPE=0.00frm1701:txtPg2mI17aASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17aBSchdCTYPE=0.00frm1701:txtPg2mI17aBSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17aCSchdCTYPE=0.00frm1701:txtPg2mI17aCSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17aDSchdCTYPE=0.00frm1701:txtPg2mI17aDSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17bASchdCTYPE=0.00frm1701:txtPg2mI17bASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17bBSchdCTYPE=0.00frm1701:txtPg2mI17bBSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17bCSchdCTYPE=0.00frm1701:txtPg2mI17bCSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17bDSchdCTYPE=0.00frm1701:txtPg2mI17bDSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17cASchdCTYPE=0.00frm1701:txtPg2mI17cASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17cBSchdCTYPE=0.00frm1701:txtPg2mI17cBSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17cCSchdCTYPE=0.00frm1701:txtPg2mI17cCSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17cDSchdCTYPE=0.00frm1701:txtPg2mI17cDSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17dDescSchdCTYPE=frm1701:txtPg2mI17dDescSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17dASchdCTYPE=0.00frm1701:txtPg2mI17dASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17dBSchdCTYPE=0.00frm1701:txtPg2mI17dBSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17dCSchdCTYPE=0.00frm1701:txtPg2mI17dCSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI17dDSchdCTYPE=0.00frm1701:txtPg2mI17dDSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI18ASchdCTYPE=0.00frm1701:txtPg2mI18ASchdCTYPE=</div>	
            <div>frm1701:txtPg2mI18BSchdCTYPE=0.00frm1701:txtPg2mI18BSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI18CSchdCTYPE=0.00frm1701:txtPg2mI18CSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI18DSchdCTYPE=0.00frm1701:txtPg2mI18DSchdCTYPE=</div>	
            <div>frm1701:txtPg2mI1DescSchdDTYPE=frm1701:txtPg2mI1DescSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI1LBSchdDTYPE=frm1701:txtPg2mI1LBSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI1ASchdDTYPE=0.00frm1701:txtPg2mI1ASchdDTYPE=</div>	
            <div>frm1701:txtPg2mI1BSchdDTYPE=0.00frm1701:txtPg2mI1BSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI2DescSchdDTYPE=frm1701:txtPg2mI2DescSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI2LBSchdDTYPE=frm1701:txtPg2mI2LBSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI2ASchdDTYPE=0.00frm1701:txtPg2mI2ASchdDTYPE=</div>	
            <div>frm1701:txtPg2mI2BSchdDTYPE=0.00frm1701:txtPg2mI2BSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI3DescSchdDTYPE=frm1701:txtPg2mI3DescSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI3LBSchdDTYPE=frm1701:txtPg2mI3LBSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI3ASchdDTYPE=0.00frm1701:txtPg2mI3ASchdDTYPE=</div>	
            <div>frm1701:txtPg2mI3BSchdDTYPE=0.00frm1701:txtPg2mI3BSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI4DescSchdDTYPE=frm1701:txtPg2mI4DescSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI4LBSchdDTYPE=frm1701:txtPg2mI4LBSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI4ASchdDTYPE=0.00frm1701:txtPg2mI4ASchdDTYPE=</div>	
            <div>frm1701:txtPg2mI4BSchdDTYPE=0.00frm1701:txtPg2mI4BSchdDTYPE=</div>	
            <div>frm1701:txtPg2mI5ASchdDTYPE=0.00frm1701:txtPg2mI5ASchdDTYPE=</div>	
            <div>frm1701:txtPg2mI5BSchdDTYPE=0.00frm1701:txtPg2mI5BSchdDTYPE=</div>	
            <div>frm1701:txtPg3mTIN1=666frm1701:txtPg3mTIN1=</div>	
            <div>frm1701:txtPg3mTIN2=666frm1701:txtPg3mTIN2=</div>	
            <div>frm1701:txtPg3mTIN3=666frm1701:txtPg3mTIN3=</div>	
            <div>frm1701:txtPg3mBranchCode=000frm1701:txtPg3mBranchCode=</div>	
            <div>frm1701:txtPg3mTaxpayerName=TSUfrm1701:txtPg3mTaxpayerName=</div>	
            <div>frm1701:rdoPg3mExemptTYPE=falsefrm1701:rdoPg3mExemptTYPE=</div>	
            <div>frm1701:rdoPg1mSpecialRateTYPE=falsefrm1701:rdoPg1mSpecialRateTYPE=</div>	
            <div>frm1701:txtPg3mSchedA_1ATYPE=frm1701:txtPg3mSchedA_1ATYPE=</div>	
            <div>frm1701:txtPg3mSchedA_1BTYPE=frm1701:txtPg3mSchedA_1BTYPE=</div>	
            <div>frm1701:txtPg3mSchedA_2ATYPE=frm1701:txtPg3mSchedA_2ATYPE=</div>	
            <div>frm1701:txtPg3mSchedA_2BTYPE=frm1701:txtPg3mSchedA_2BTYPE=</div>	
            <div>frm1701:txtPg3mSchedA_3ATYPE=frm1701:txtPg3mSchedA_3ATYPE=</div>	
            <div>frm1701:txtPg3mSchedA_3BTYPE=frm1701:txtPg3mSchedA_3BTYPE=</div>	
            <div>frm1701:txtPg3mSchedA_4ATYPE=00.0frm1701:txtPg3mSchedA_4ATYPE=</div>	
            <div>frm1701:txtPg3mSchedA_4BTYPE=00.0frm1701:txtPg3mSchedA_4BTYPE=</div>	
            <div>frm1701:txtPg3mSchedA_5ATYPE=frm1701:txtPg3mSchedA_5ATYPE=</div>	
            <div>frm1701:txtPg3mSchedA_5BTYPE=frm1701:txtPg3mSchedA_5BTYPE=</div>	
            <div>frm1701:txtPg3mSchedA_6ATYPE=frm1701:txtPg3mSchedA_6ATYPE=</div>	
            <div>frm1701:txtPg3mSchedA_6BTYPE=frm1701:txtPg3mSchedA_6BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_1ATYPE=0.00frm1701:txtPg3mSchedB_1ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_1BTYPE=0.00frm1701:txtPg3mSchedB_1BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_2ATYPE=0.00frm1701:txtPg3mSchedB_2ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_2BTYPE=0.00frm1701:txtPg3mSchedB_2BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_3ATYPE=0.00frm1701:txtPg3mSchedB_3ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_3BTYPE=0.00frm1701:txtPg3mSchedB_3BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_4ATYPE=0.00frm1701:txtPg3mSchedB_4ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_4BTYPE=0.00frm1701:txtPg3mSchedB_4BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_5ATYPE=0.00frm1701:txtPg3mSchedB_5ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_5BTYPE=0.00frm1701:txtPg3mSchedB_5BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_6ATYPE=0.00frm1701:txtPg3mSchedB_6ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_6BTYPE=0.00frm1701:txtPg3mSchedB_6BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_7ATYPE=0.00frm1701:txtPg3mSchedB_7ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_7BTYPE=0.00frm1701:txtPg3mSchedB_7BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_8ATYPE=0.00frm1701:txtPg3mSchedB_8ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_8BTYPE=0.00frm1701:txtPg3mSchedB_8BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_9ATYPE=0.00frm1701:txtPg3mSchedB_9ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_9BTYPE=0.00frm1701:txtPg3mSchedB_9BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_10TYPE=frm1701:txtPg3mSchedB_10TYPE=</div>	
            <div>frm1701:txtPg3mSchedB_10ATYPE=0.00frm1701:txtPg3mSchedB_10ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_10BTYPE=0.00frm1701:txtPg3mSchedB_10BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_11TYPE=frm1701:txtPg3mSchedB_11TYPE=</div>	
            <div>frm1701:txtPg3mSchedB_11ATYPE=0.00frm1701:txtPg3mSchedB_11ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_11BTYPE=0.00frm1701:txtPg3mSchedB_11BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_12ATYPE=0.00frm1701:txtPg3mSchedB_12ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_12BTYPE=0.00frm1701:txtPg3mSchedB_12BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_13ATYPE=0.00frm1701:txtPg3mSchedB_13ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_13BTYPE=0.00frm1701:txtPg3mSchedB_13BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_14ATYPE=00.0frm1701:txtPg3mSchedB_14ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_14BTYPE=00.0frm1701:txtPg3mSchedB_14BTYPE=</div>	
            <div>frm1701:txtPg3mSchedB_15ATYPE=0.00frm1701:txtPg3mSchedB_15ATYPE=</div>	
            <div>frm1701:txtPg3mSchedB_15BTYPE=0.00frm1701:txtPg3mSchedB_15BTYPE=</div>	
            <div>frm1701:txtPg3mSchedC_1ATYPE=0.00frm1701:txtPg3mSchedC_1ATYPE=</div>	
            <div>frm1701:txtPg3mSchedC_1BTYPE=0.00frm1701:txtPg3mSchedC_1BTYPE=</div>	
            <div>frm1701:txtPg3mSchedC_2ATYPE=0.00frm1701:txtPg3mSchedC_2ATYPE=</div>	
            <div>frm1701:txtPg3mSchedC_2BTYPE=0.00frm1701:txtPg3mSchedC_2BTYPE=</div>	
            <div>frm1701:txtPg3mSchedC_3ATYPE=0.00frm1701:txtPg3mSchedC_3ATYPE=</div>	
            <div>frm1701:txtPg3mSchedC_3BTYPE=0.00frm1701:txtPg3mSchedC_3BTYPE=</div>	
            <div>frm1701:txtPg4mTIN1=666frm1701:txtPg4mTIN1=</div>	
            <div>frm1701:txtPg4mTIN2=666frm1701:txtPg4mTIN2=</div>	
            <div>frm1701:txtPg4mTIN3=666frm1701:txtPg4mTIN3=</div>	
            <div>frm1701:txtPg4mBranchCode=000frm1701:txtPg4mBranchCode=</div>	
            <div>frm1701:txtPg4mTaxpayerName=TSUfrm1701:txtPg4mTaxpayerName=</div>	
            <div>frm1701:txtPg4mSchedC_4ATYPE=0.00frm1701:txtPg4mSchedC_4ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_4BTYPE=0.00frm1701:txtPg4mSchedC_4BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_5ATYPE=0.00frm1701:txtPg4mSchedC_5ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_5BTYPE=0.00frm1701:txtPg4mSchedC_5BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_6ATYPE=0.00frm1701:txtPg4mSchedC_6ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_6BTYPE=0.00frm1701:txtPg4mSchedC_6BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_7ATYPE=0.00frm1701:txtPg4mSchedC_7ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_7BTYPE=0.00frm1701:txtPg4mSchedC_7BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_8ATYPE=0.00frm1701:txtPg4mSchedC_8ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_8BTYPE=0.00frm1701:txtPg4mSchedC_8BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_9ATYPE=0.00frm1701:txtPg4mSchedC_9ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_9BTYPE=0.00frm1701:txtPg4mSchedC_9BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_10ATYPE=0.00frm1701:txtPg4mSchedC_10ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_10BTYPE=0.00frm1701:txtPg4mSchedC_10BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_11ATYPE=0.00frm1701:txtPg4mSchedC_11ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_11BTYPE=0.00frm1701:txtPg4mSchedC_11BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_12ATYPE=0.00frm1701:txtPg4mSchedC_12ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_12BTYPE=0.00frm1701:txtPg4mSchedC_12BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_13ATYPE=0.00frm1701:txtPg4mSchedC_13ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_13BTYPE=0.00frm1701:txtPg4mSchedC_13BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_14ATYPE=0.00frm1701:txtPg4mSchedC_14ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_14BTYPE=0.00frm1701:txtPg4mSchedC_14BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_15ATYPE=0.00frm1701:txtPg4mSchedC_15ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_15BTYPE=0.00frm1701:txtPg4mSchedC_15BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_16ATYPE=0.00frm1701:txtPg4mSchedC_16ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_16BTYPE=0.00frm1701:txtPg4mSchedC_16BTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_17aATYPE=0.00frm1701:txtPg4mSchedC_17aATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_17aBTYPE=0.00frm1701:txtPg4mSchedC_17aBTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_17bATYPE=0.00frm1701:txtPg4mSchedC_17bATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_17bBTYPE=0.00frm1701:txtPg4mSchedC_17bBTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_17cATYPE=0.00frm1701:txtPg4mSchedC_17cATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_17cBTYPE=0.00frm1701:txtPg4mSchedC_17cBTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_17cTYPE=frm1701:txtPg4mSchedC_17cTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_17cATYPE=0.00frm1701:txtPg4mSchedC_17cATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_17cBTYPE=0.00frm1701:txtPg4mSchedC_17cBTYPE=</div>	
            <div>frm1701:txtPg4mSchedC_18ATYPE=0.00frm1701:txtPg4mSchedC_18ATYPE=</div>	
            <div>frm1701:txtPg4mSchedC_18BTYPE=0.00frm1701:txtPg4mSchedC_18BTYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_1TYPE=frm1701:txtPg4mSchedD1_1TYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_1ATYPE=frm1701:txtPg4mSchedD1_1ATYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_1BTYPE=frm1701:txtPg4mSchedD1_1BTYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_2TYPE=frm1701:txtPg4mSchedD1_2TYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_2ATYPE=frm1701:txtPg4mSchedD1_2ATYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_2BTYPE=frm1701:txtPg4mSchedD1_2BTYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_3TYPE=frm1701:txtPg4mSchedD1_3TYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_3ATYPE=frm1701:txtPg4mSchedD1_3ATYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_3BTYPE=frm1701:txtPg4mSchedD1_3BTYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_4TYPE=frm1701:txtPg4mSchedD1_4TYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_4ATYPE=frm1701:txtPg4mSchedD1_4ATYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_4BTYPE=frm1701:txtPg4mSchedD1_4BTYPE=</div>	
            <div>frm1701:txtPg4mSchedD1_5BTYPE=frm1701:txtPg4mSchedD1_5BTYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_6TYPE=frm1701:txtPg4mSchedD2_6TYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_6ATYPE=frm1701:txtPg4mSchedD2_6ATYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_6BTYPE=frm1701:txtPg4mSchedD2_6BTYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_7TYPE=frm1701:txtPg4mSchedD2_7TYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_7ATYPE=frm1701:txtPg4mSchedD2_7ATYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_7BTYPE=frm1701:txtPg4mSchedD2_7BTYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_8TYPE=frm1701:txtPg4mSchedD2_8TYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_8ATYPE=frm1701:txtPg4mSchedD2_8ATYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_8BTYPE=frm1701:txtPg4mSchedD2_8BTYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_9TYPE=frm1701:txtPg4mSchedD2_9TYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_9ATYPE=frm1701:txtPg4mSchedD2_9ATYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_9BTYPE=frm1701:txtPg4mSchedD2_9BTYPE=</div>	
            <div>frm1701:txtPg4mSchedD2_10BTYPE=frm1701:txtPg4mSchedD2_10BTYPE=</div>	
            <div>frm1701:txtCurrentPage=1frm1701:txtCurrentPage=</div>	
            <div>frm1701:txtMaxPage=4frm1701:txtMaxPage=</div>	
            <div>frm1701:txtZIP=frm1701:txtZIP=</div>	
            <div>frm1701:txtEnabledInputsOnValidation=frm1701:txtEnabledInputsOnValidation=</div>	
            <div>frm1701:txtDisabledInputs=frm1701:txtDisabledInputs=</div>	
            <div>frm1701:txtEnabledLinks=frm1701:txtEnabledLinks=</div>	
            <div>frm1701:txtIsSpouseDisabled=frm1701:txtIsSpouseDisabled=</div>	
            <div>frm1701:txtIsTaxFilerDisabled=falsefrm1701:txtIsTaxFilerDisabled=</div>	
            <div>frm1701:txtAttachmentTypes=".request('frm1701:txtAttachmentTypes')."frm1701:txtAttachmentTypes=</div>	
            <div>frm1701:txtTIN4=frm1701:txtTIN4=</div>	
            <div>frm1701:txtDisabledOnSave=frm1701:txtDisabledOnSave=</div>	
            <div>frm1701:txtEnabledOnSave=frm1701:txtEnabledOnSave=</div>	
            <div>frm1701:txtVersion=051414frm1701:txtVersion=</div>	
            <div>frm1701:txtdisabledID=frm1701:txtdisabledID=</div>	
            <div>frm1701:rdoEXAttachmentTF=falsefrm1701:rdoEXAttachmentTF=</div>	
            <div>frm1701:rdoEXAttachmentS=falsefrm1701:rdoEXAttachmentS=</div>	
            <div>frm1701:rdoSPAttachmentTF=falsefrm1701:rdoSPAttachmentTF=</div>	
            <div>frm1701:rdoSPAttachmentS=falsefrm1701:rdoSPAttachmentS=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>frm1701:txtLineBus=".$lineOfBusiness."frm1701:txtLineBus=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm1701:txtPg1I4TIN1').request('frm1701:txtPg1I4TIN2').request('frm1701:txtPg1I4TIN3').request('frm1701:txtPg1I4BranchCode');

        $return_period = request('frm1701:txtPg1I1Year');

        $getReturnPeriod = tbl_1701_1::where('company_id',  request('company'))
     						->where('item1', request('frm1701:txtPg1I1Year'))
     						->count();

     	$filename = "";
     	if($getReturnPeriod == "1"){
     		$filename = $tin."-1701v2018-12".request('frm1701:txtPg1I1Year').'.xml';
     	}else{
     		if(request('form_id') != ""){
					$getXml = Xml::where('user_id', Auth::user()->id)
					        ->where('company_id', request('company'))
					        ->where('form_id', $form->id)
					        ->where('form', '1701v2018')
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
				
     		$filename = $tin."-1701v2018-12".request('frm1701:txtPg1I1Year').$ext.'.xml';
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
	     		'form'			=> '1701v2018',
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
     						->where('form', '1701v2018')
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
                            ->where('form', '1701v2018')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1701_1::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1701v2018')
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
        $data = tbl_1701_1::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1701v2018')
                            ->get();
        
        return view('forms.BIR-Form 1701v2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

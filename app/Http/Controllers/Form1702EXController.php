<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1702EX;
use App\tbl_1702EX_schedule4;
use App\tbl_1702EX_schedule5;
use App\tbl_1702EX_schedule6;
use App\tbl_1702EX_schedule8;
use App\tbl_1702EX_schedule9_1;
use App\tbl_1702EX_schedule9_2;
use App\tbl_1702EX_schedule9_3;
use App\tbl_1702EX_schedule9_4;
use App\tbl_1702EX_schedule10_1;
use App\tbl_1702EX_schedule10_2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1702EXController extends Controller
{
    public function index($company,$action,$form_id)
    {

    	$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);
		if($action == 'new'){
			if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1702_e_xes')){

          }else{
               Schema::connection('mysql2')->create('tbl_1702_e_xes', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1')->nullable();
                    $table->string('item2A');
                    $table->string('item2B');
                    $table->string('item3')->nullable();
                    $table->string('item4')->nullable();
                    $table->string('item8')->nullable();
                    $table->string('item14')->nullable();
                    $table->text('item16')->nullable();
                    $table->text('item17')->nullable();
                    $table->text('item18')->nullable();
                    $table->text('item19A')->nullable();
                    $table->text('item19B')->nullable();
                    $table->string('item20')->nullable();
                    $table->string('item21')->nullable();
                    $table->text('item22')->nullable();
                    $table->text('no_pages')->nullable();
                    $table->text('item23')->nullable();
                    $table->text('item23_reg_no')->nullable();
                    $table->text('item24')->nullable();
                    $table->text('item25')->nullable();
                    $table->text('item26')->nullable();
                    $table->text('item31');
                    $table->text('item32');
                    $table->text('item33');
                    $table->text('item34');
                    $table->text('item35');
                    $table->text('item36');
                    $table->text('item37');
                    $table->text('item38');
                    $table->text('item39');
                    $table->text('item41');
                    $table->text('item42');
                    $table->text('item43');
                    $table->text('item44');
                    $table->text('item45')->nullable();
                    $table->text('item46A')->nullable();
                    $table->text('item46B')->nullable();
                    $table->text('item46C')->nullable();
                    $table->text('item46D')->nullable();
                    $table->text('item47')->nullable();
                    $table->text('item48A')->nullable();
                    $table->text('item48B')->nullable();
                    $table->text('item48C')->nullable();
                    $table->text('item48D')->nullable();
                    $table->text('item49A')->nullable();
                    $table->text('item49B')->nullable();
                    $table->text('item49C')->nullable();
                    $table->text('item49D')->nullable();
                    $table->text('item50')->nullable();
                    $table->text('item51')->nullable();
                    $table->text('sched1_1');
                    $table->text('sched1_2');
                    $table->text('sched1_3');
                    $table->text('sched1_4');
                    $table->text('sched1_5');
                    $table->text('sched1_6');
                    $table->text('sched2_1');
                    $table->text('sched2_2');
                    $table->text('sched2_3');
                    $table->text('sched2_4');
                    $table->text('sched2_5');
                    $table->text('sched2_6');
                    $table->text('sched2_7');
                    $table->text('sched2_8');
                    $table->text('sched2_9');
                    $table->text('sched2_10');
                    $table->text('sched2_11');
                    $table->text('sched2_12');
                    $table->text('sched2_13');
                    $table->text('sched2_14');
                    $table->text('sched2_15');
                    $table->text('sched2_16');
                    $table->text('sched2_17');
                    $table->text('sched2_18');
                    $table->text('sched2_19');
                    $table->text('sched2_21');
                    $table->text('sched2_22');
                    $table->text('sched2_23');
                    $table->text('sched2_24');
                    $table->text('sched2_25');
                    $table->text('sched2_26');
                    $table->text('sched2_27');
                    $table->text('sched3_1A')->nullable();
                    $table->text('sched3_1B');
                    $table->text('sched3_2A')->nullable();
                    $table->text('sched3_2B');
                    $table->text('sched3_3A')->nullable();
                    $table->text('sched3_3B');
                    $table->text('sched3_3_subtotal')->nullable();
                    $table->text('sched3_4');
                    $table->text('sched4_1');
                    $table->text('sched4_2A')->nullable();
                    $table->text('sched4_2B');
                    $table->text('sched4_3A')->nullable();
                    $table->text('sched4_3B');
                    $table->text('sched4_4A')->nullable();
                    $table->text('sched4_4B');
                    $table->text('sched4_4_subtotal')->nullable();
                    $table->text('sched4_5');
                    $table->text('sched4_6');
                    $table->text('sched4_7');
                    $table->text('sched4_8');
                    $table->text('sched4_9');
                    $table->text('sched4_10');
                    $table->text('sched4_11');
                    $table->text('sched4_12');
                    $table->text('sched4_13');
                    $table->text('sched4_14');
                    $table->text('sched4_15');
                    $table->text('sched4_16');
                    $table->text('sched4_17');
                    $table->text('sched4_18');
                    $table->text('sched4_19');
                    $table->text('sched4_20');
                    $table->text('sched4_21');
                    $table->text('sched4_22');
                    $table->text('sched4_23');
                    $table->text('sched4_24');
                    $table->text('sched4_25');
                    $table->text('sched4_26');
                    $table->text('sched4_27');
                    $table->text('sched4_28');
                    $table->text('sched4_29');
                    $table->text('sched4_30');
                    $table->text('sched4_31')->nullable();
                    $table->text('sched4_32');
                    $table->text('sched4_33');
                    $table->text('sched4_34');
                    $table->text('sched4_35');
                    $table->text('sched4_36A')->nullable();
                    $table->text('sched4_36B');
                    $table->text('sched4_37A')->nullable();
                    $table->text('sched4_37B');
                    $table->text('sched4_38A')->nullable();
                    $table->text('sched4_38B');
                    $table->text('sched4_39A')->nullable();
                    $table->text('sched4_39B');
                    $table->text('sched4_39_subtotal')->nullable();
                    $table->text('sched4_40');
                    $table->text('sched5_1A')->nullable();
                    $table->text('sched5_1B')->nullable();
                    $table->text('sched5_1C');
                    $table->text('sched5_2A')->nullable();
                    $table->text('sched5_2B')->nullable();
                    $table->text('sched5_2C');
                    $table->text('sched5_3A')->nullable();
                    $table->text('sched5_3B')->nullable();
                    $table->text('sched5_3C');
                    $table->text('sched5_4A')->nullable();
                    $table->text('sched5_4B')->nullable();
                    $table->text('sched5_4C');
                    $table->text('sched5_4_subtotal')->nullable();
                    $table->text('sched5_5');
                    $table->text('sched6_1');
                    $table->text('sched6_2A')->nullable();
                    $table->text('sched6_2B');
                    $table->text('sched6_3A')->nullable();
                    $table->text('sched6_3B');
                    $table->text('sched6_3_subtotal')->nullable();
                    $table->text('sched6_4');
                    $table->text('sched6_5A')->nullable();
                    $table->text('sched6_5B');
                    $table->text('sched6_6A')->nullable();
                    $table->text('sched6_6B');
                    $table->text('sched6_6_subtotal')->nullable();
                    $table->text('sched6_7A')->nullable();
                    $table->text('sched6_7B');
                    $table->text('sched6_8A')->nullable();
                    $table->text('sched6_8B');
                    $table->text('sched6_8_subtotal')->nullable();
                    $table->text('sched6_9');
                    $table->text('sched6_10');
                    $table->text('sched7_1');
                    $table->text('sched7_2');
                    $table->text('sched7_3');
                    $table->text('sched7_4');
                    $table->text('sched7_5');
                    $table->text('sched7_6');
                    $table->text('sched7_7');
                    $table->text('sched7_8');
                    $table->text('sched7_9');
                    $table->text('sched7_10');
                    $table->text('sched7_11');
                    $table->text('sched7_12');
                    $table->text('sched7_13');
                    $table->text('sched7_14');
                    $table->text('sched7_15');
                    $table->text('sched7_16');
                    $table->text('sched7_17');
                    $table->text('sched8')->nullable();
                    $table->text('sched9_1A');
                    $table->text('sched9_1B');
                    $table->text('sched9_1C');
                    $table->text('sched9_2A');
                    $table->text('sched9_2B');
                    $table->text('sched9_2C');
                    $table->text('sched9_3A');
                    $table->text('sched9_3B');
                    $table->text('sched9_3C');
                    $table->text('sched9_4A');
                    $table->text('sched9_4B');
                    $table->text('sched9_4C');
                    $table->text('sched9_4_subtotal')->nullable();
                    $table->text('sched9_5A')->nullable();
                    $table->text('sched9_5B')->nullable();
                    $table->text('sched9_6A')->nullable();
                    $table->text('sched9_6B')->nullable();
                    $table->text('sched9_7A')->nullable();
                    $table->text('sched9_7B')->nullable();
                    $table->text('sched9_8A');
                    $table->text('sched9_8B');
                    $table->text('sched9_9A');
                    $table->text('sched9_9B');
                    $table->text('sched9_10_1A');
                    $table->text('sched9_10_2A')->nullable();
                    $table->text('sched9_10_1B');
                    $table->text('sched9_10_2B')->nullable();
                    $table->text('sched9_11A')->nullable();
                    $table->text('sched9_11B')->nullable();
                    $table->text('sched9_12A');
                    $table->text('sched9_12B');
                    $table->text('sched9_13A')->nullable();
                    $table->text('sched9_13B')->nullable();
                    $table->text('sched9_14A');
                    $table->text('sched9_14B');
                    $table->text('sched9_15A');
                    $table->text('sched9_15B');
                    $table->text('sched9_16A')->nullable();
                    $table->text('sched9_16B')->nullable();
                    $table->text('sched9_17A');
                    $table->text('sched9_17B');
                    $table->text('sched9_18A');
                    $table->text('sched9_18B');
                    $table->text('sched9_19');
                    $table->text('sched10_1');
                    $table->text('sched10_2A')->nullable();
                    $table->text('sched10_2B')->nullable();
                    $table->text('sched10_3A')->nullable();
                    $table->text('sched10_3B')->nullable();
                    $table->text('sched10_4A')->nullable();
                    $table->text('sched10_4B')->nullable();
                    $table->text('sched10_5A');
                    $table->text('sched10_5B');
                    $table->text('sched10_6A')->nullable();
                    $table->text('sched10_6B')->nullable();
                    $table->text('sched10_7A');
                    $table->text('sched10_7B');
                    $table->text('sched10_8');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_e_x_schedule4s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('schedule')->nullable();
                    $table->text('description')->nullable();
                    $table->text('amount')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_e_x_schedule5s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('description')->nullable();
                    $table->text('legal')->nullable();
                    $table->text('amount')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_e_x_schedule6s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('schedule')->nullable();
                    $table->text('description')->nullable();
                    $table->text('amount')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_e_x_schedule8s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('name')->nullable();
                    $table->text('tin1')->nullable();
                    $table->text('tin2')->nullable();
                    $table->text('tin3')->nullable();
                    $table->text('tin4')->nullable();
                    $table->text('capital')->nullable();
                    $table->text('total')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_e_x_schedule9_1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('description')->nullable();
                    $table->text('exempt')->nullable();
                    $table->text('amount')->nullable();
                    $table->text('withheld')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_e_x_schedule9_2s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item5A')->nullable();
                    $table->text('item5B')->nullable();
                    $table->text('item6A')->nullable();
                    $table->text('item6B')->nullable();
                    $table->text('item7A')->nullable();
                    $table->text('item7B')->nullable();
                    $table->text('item8A')->nullable();
                    $table->text('item8B')->nullable();
                    $table->text('item9A')->nullable();
                    $table->text('item9B')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_e_x_schedule9_3s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item10_1C')->nullable();
                    $table->text('item10_2C')->nullable();
                    $table->text('item10_1D')->nullable();
                    $table->text('item10_2D')->nullable();
                    $table->text('item11C')->nullable();
                    $table->text('item11D')->nullable();
                    $table->text('item12C')->nullable();
                    $table->text('item12D')->nullable();
                    $table->text('item13C')->nullable();
                    $table->text('item13D')->nullable();
                    $table->text('item14C')->nullable();
                    $table->text('item14D')->nullable();
                    $table->text('item15C')->nullable();
                    $table->text('item15D')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_e_x_schedule9_4s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item16A')->nullable();
                    $table->text('item16B')->nullable();
                    $table->text('item17A')->nullable();
                    $table->text('item17B')->nullable();
                    $table->text('item18A')->nullable();
                    $table->text('item18B')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_e_x_schedule10_1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item2A')->nullable();
                    $table->text('item2B')->nullable();
                    $table->text('item3A')->nullable();
                    $table->text('item3B')->nullable();
                    $table->text('item4A')->nullable();
                    $table->text('item4B')->nullable();
                    $table->text('item5A')->nullable();
                    $table->text('item5B')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_e_x_schedule10_2s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item6A')->nullable();
                    $table->text('item6B')->nullable();
                    $table->text('item7A')->nullable();
                    $table->text('item7B')->nullable();
                    $table->timestamps();
                });
            }

        	return view('forms.BIR-Form 1702EX',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
		}else{
               $data = tbl_1702EX::find($form_id);
               $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1702EX')
                            ->get();
               return view('forms.BIR-Form 1702EX',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
		}
	}
     public function store()
     {
          config(['database.connections.mysql2.database' => Auth::user()->database_name]);

          $data = ([
               'form_no'  => request('form_no'),
               'company_id'  => request('company'),
               'item1'  => request('frm1702EX:rdoPg1I1'),
               'item2A'  => request('frm1702EX:ddlPg1I2Date'),
               'item2B'  => request('frm1702EX:txtPg1I2YearEnd'),
               'item3'  => request('frm1702EX:rdoPg1I3Amended'),
               'item4'  => request('frm1702EX:rdoPg1I4ShortPeriod'),
               'item8'  => request('frm1702EX:txtPg1Pt1I8DateofIncorporation'),
               'item14'  => request('frm1702EX:txtPg1Pt1I14PSICCode'),
               'item16'  => request('frm1702EX:txtPg1Pt1I16LegalBasis'),
               'item17'  => request('frm1702EX:txtPg1Pt1I17Investment'),
               'item18'  => request('frm1702EX:txtPg1Pt1I18RegisteredActivity'),
               'item19A'  => request('frm1702EX:txtPg1Pt1I19EffectivityFrom'),
               'item19B'  => request('frm1702EX:txtPg1Pt1I19EffectivityTo'),
               'item20'  => request('frm1702EX:txtPg1Pt2I20TotalIncome'),
               'item21'  => request('frm1702EX:txtPg1Pt2I21AddPenalty'),
               'item22'  => request('frm1702EX:txtPg1Pt2I22TotalAmount'),
               'no_pages'  => request('frm1702EX:txtPg1Pt2NumberofPagesFiled'),
               'item23'  => null !== request('CTCorReg') ? request('CTCorReg') : '',
               'item23_reg_no'  => request('frm1702EX:txtPg1Pt2I23CommunityTax'),
               'item24'  => request('frm1702EX:txtPg1Pt1I24DateofIssue'),
               'item25'  => request('frm1702EX:txtPg1Pt1I25PlaceofIssue'),
               'item26'  => request('frm1702EX:txtPg1Pt1I26Amount'),
               'item31'  => request('frm1702EX:txtPg2Pt4I31NetSales'),
               'item32'  => request('frm1702EX:txtPg2Pt4I32LessCost'),
               'item33'  => request('frm1702EX:txtPg2Pt4I33GrossIncome'),
               'item34'  => request('frm1702EX:txtPg2Pt4I34AddOther'),
               'item35'  => request('frm1702EX:txtPg2Pt4I35TotalGross'),
               'item36'  => request('frm1702EX:txtPg2Pt4I36OrdinaryAllowable'),
               'item37'  => request('frm1702EX:txtPg2Pt4I37SpecialAllowable'),
               'item38'  => request('frm1702EX:txtPg2Pt4I38TotalItemized'),
               'item39'  => request('frm1702EX:txtPg2Pt4I39NetTaxable'),
               'item41'  => request('frm1702EX:txtPg2Pt4I41TotalIncome'),
               'item42'  => request('frm1702EX:txtPg2Pt5I42RegularIncome'),
               'item43'  => request('frm1702EX:txtPg2Pt5I43SpecialAllowable'),
               'item44'  => request('frm1702EX:txtPg2Pt5I44TotalTax'),
               'item45'  => request('frm1702EX:txtPg2Pt6I45NameofExternalAuditor'),
               'item46A'  => request('frm1702EX:txtPg2Pt6I46TinC1'),
               'item46B'  => request('frm1702EX:txtPg2Pt6I46TinC2'),
               'item46C'  => request('frm1702EX:txtPg2Pt6I46TinC3'),
               'item46D'  => request('frm1702EX:txtPg2Pt6I46TinC4'),
               'item47'  => request('frm1702EX:txtPg2Pt6I47NameofSigningPartner'),
               'item48A'  => request('frm1702EX:txtPg2Pt6I48TinC1'),
               'item48B'  => request('frm1702EX:txtPg2Pt6I48TinC2'),
               'item48C'  => request('frm1702EX:txtPg2Pt6I48TinC3'),
               'item48D'  => request('frm1702EX:txtPg2Pt6I48TinC4'),
               'item49A'  => request('frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1'),
               'item49B'  => request('frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2'),
               'item49C'  => request('frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3'),
               'item49D'  => request('frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4'),
               'item50'  => request('frm1702EX:txtPg2Pt6I50IssueDate'),
               'item51'  => request('frm1702EX:txtPg2Pt6I51ExpiryDate'),
               'sched1_1'  => request('frm1702EX:txtPg3S1I1GoodsProp'),
               'sched1_2'  => request('frm1702EX:txtPg3S1I2SaleServices'),
               'sched1_3'  => request('frm1702EX:txtPg3S1I3LeaseProp'),
               'sched1_4'  => request('frm1702EX:txtPg3S1I4Total'),
               'sched1_5'  => request('frm1702EX:txtPg3S1I5LessSales'),
               'sched1_6'  => request('frm1702EX:txtPg3S1I6NetSales'),
               'sched2_1'  => request('frm1702EX:txtPg3S2I1MerchInventory'),
               'sched2_2'  => request('frm1702EX:txtPg3S2I2AddPurchases'),
               'sched2_3'  => request('frm1702EX:txtPg3S2I3TotalGoods'),
               'sched2_4'  => request('frm1702EX:txtPg3S2I4LessMerch'),
               'sched2_5'  => request('frm1702EX:txtPg3S2I5CostSales'),
               'sched2_6'  => request('frm1702EX:txtPg3S2I6DirectMaterials'),
               'sched2_7'  => request('frm1702EX:txtPg3S2I7AddPurchases'),
               'sched2_8'  => request('frm1702EX:txtPg3S2I8MaterialsAvailable'),
               'sched2_9'  => request('frm1702EX:txtPg3S2I9DirectMaterials'),
               'sched2_10'  => request('frm1702EX:txtPg3S2I10RawMaterials'),
               'sched2_11'  => request('frm1702EX:txtPg3S2I11DirectLabor'),
               'sched2_12'  => request('frm1702EX:txtPg3S2I12ManOverhead'),
               'sched2_13'  => request('frm1702EX:txtPg3S2I13TotalMan'),
               'sched2_14'  => request('frm1702EX:txtPg3S2I14WorkProcess'),
               'sched2_15'  => request('frm1702EX:txtPg3S2I15LessWork'),
               'sched2_16'  => request('frm1702EX:txtPg3S2I16CostOfGoods'),
               'sched2_17'  => request('frm1702EX:txtPg3S2I17FinishedGoods'),
               'sched2_18'  => request('frm1702EX:txtPg3S2I18LessFinished'),
               'sched2_19'  => request('frm1702EX:txtPg3S2I19GoodsManAndSold'),
               'sched2_20'  => request('frm1702EX:txtPg3S2I20DirectWage"'),
               'sched2_21'  => request('frm1702EX:txtPg3S2I21DirectMaterials'),
               'sched2_22'  => request('frm1702EX:txtPg3S2I22DirectDepreciation'),
               'sched2_23'  => request('frm1702EX:txtPg3S2I23DirectRental'),
               'sched2_24'  => request('frm1702EX:txtPg3S2I24DirectOutside'),
               'sched2_25'  => request('frm1702EX:txtPg3S2I25DirectOthers'),
               'sched2_26'  => request('frm1702EX:txtPg3S2I26TotalCostServices'),
               'sched2_27'  => request('frm1702EX:txtPg3S2I27TotalCostSales'),
               'sched3_1A'  => request('frm1702EX:txtPg4S3I1Col1'),
               'sched3_1B'  => request('frm1702EX:txtPg4S3I1Col2'),
               'sched3_2A'  => request('frm1702EX:txtPg4S3I2Col1'),
               'sched3_2B'  => request('frm1702EX:txtPg4S3I2Col2'),
               'sched3_3A'  => request('frm1702EX:txtPg4S3I3Col1'),
               'sched3_3B'  => request('frm1702EX:txtPg4S3I3Col2'),
               'sched3_3_subtotal'  => request('Pg4S3I3SubTotal'),
               'sched3_4'  => request('frm1702EX:txtPg4S3I4TotalTaxIncome'),
               'sched4_1'  => request('frm1702EX:txtPg4S4I1AdsAndPromotions'),
               'sched4_2A'  => request('frm1702EX:txtPg4S4I2Col1'),
               'sched4_2B'  => request('frm1702EX:txtPg4S4I2Col2'),
               'sched4_3A'  => request('frm1702EX:txtPg4S4I3Col1'),
               'sched4_3B'  => request('frm1702EX:txtPg4S4I3Col2'),
               'sched4_4A'  => request('frm1702EX:txtPg4S4I4Col1'),
               'sched4_4B'  => request('frm1702EX:txtPg4S4I4Col2'),
               'sched4_4_subtotal'  => request('Pg4S4I4SubTotal'),
               'sched4_5'  => request('frm1702EX:txtPg4S4I5BadDebts'),
               'sched4_6'  => request('frm1702EX:txtPg4S4I6CharitableContri'),
               'sched4_7'  => request('frm1702EX:txtPg4S4I7Commissions'),
               'sched4_8'  => request('frm1702EX:txtPg4S4I8Communication'),
               'sched4_9'  => request('frm1702EX:txtPg4S4I9Depletion'),
               'sched4_10'  => request('frm1702EX:txtPg4S4I10Depreciation'),
               'sched4_11'  => request('frm1702EX:txtPg4S4I11DirectorFees'),
               'sched4_12'  => request('frm1702EX:txtPg4S4I12FringeBenefits'),
               'sched4_13'  => request('frm1702EX:txtPg4S4I13FuelAndOil'),
               'sched4_14'  => request('frm1702EX:txtPg4S4I14Insurance'),
               'sched4_15'  => request('frm1702EX:txtPg4S4I15Interest'),
               'sched4_16'  => request('frm1702EX:txtPg4S4I16Janitorial'),
               'sched4_17'  => request('frm1702EX:txtPg4S4I17Losses'),
               'sched4_18'  => request('frm1702EX:txtPg4S4I18Management'),
               'sched4_19'  => request('frm1702EX:txtPg4S4I19Insurance'),
               'sched4_20'  => request('frm1702EX:txtPg4S4I20OfficeSupplies'),
               'sched4_21'  => request('frm1702EX:txtPg4S4I21OtherServices'),
               'sched4_22'  => request('frm1702EX:txtPg4S4I22PersonalFees'),
               'sched4_23'  => request('frm1702EX:txtPg4S4I23Rental'),
               'sched4_24'  => request('frm1702EX:txtPg4S4I24RepairLabor'),
               'sched4_25'  => request('frm1702EX:txtPg4S4I25RepairMaterials'),
               'sched4_26'  => request('frm1702EX:txtPg4S4I26Representation'),
               'sched4_27'  => request('frm1702EX:txtPg4S4I27Research'),
               'sched4_28'  => request('frm1702EX:txtPg4S4I28Royalties'),
               'sched4_29'  => request('frm1702EX:txtPg4S4I29Salaries'),
               'sched4_30'  => request('frm1702EX:txtPg5S4I30SecurityServices'),
               'sched4_31'  => request('frm1702EX:txtPg5S4I31SSS'),
               'sched4_32'  => request('frm1702EX:txtPg5S4I32TaxesAndLicense'),
               'sched4_33'  => request('frm1702EX:txtPg5S4I33TollingFees'),
               'sched4_34'  => request('frm1702EX:txtPg5S4I34Training'),
               'sched4_35'  => request('frm1702EX:txtPg5S4I35Transportation'),
               'sched4_36A'  => request('frm1702EX:txtPg5S4I36Col1'),
               'sched4_36B'  => request('frm1702EX:txtPg5S4I36Col2'),
               'sched4_37A'  => request('frm1702EX:txtPg5S4I37Col1'),
               'sched4_37B'  => request('frm1702EX:txtPg5S4I37Col2'),
               'sched4_38A'  => request('frm1702EX:txtPg5S4I38Col1'),
               'sched4_38B'  => request('frm1702EX:txtPg5S4I38Col2'),
               'sched4_39A'  => request('frm1702EX:txtPg5S4I39Col1'),
               'sched4_39B'  => request('frm1702EX:txtPg5S4I39Col2'),
               'sched4_39_subtotal'  => request('Pg5S4I39SubTotal'),
               'sched4_40'  => request('frm1702EX:txtPg5S4I40TotalAllowableDeduction'),
               'sched5_1A'  => request('frm1702EX:txtPg5S5I1Col1'),
               'sched5_1B'  => request('frm1702EX:txtPg5S5I1Col2'),
               'sched5_1C'  => request('frm1702EX:txtPg5S5I1Col3'),
               'sched5_2A'  => request('frm1702EX:txtPg5S5I2Col1'),
               'sched5_2B'  => request('frm1702EX:txtPg5S5I2Col2'),
               'sched5_2C'  => request('frm1702EX:txtPg5S5I2Col3'),
               'sched5_3A'  => request('frm1702EX:txtPg5S5I3Col1'),
               'sched5_3B'  => request('frm1702EX:txtPg5S5I3Col2'),
               'sched5_3C'  => request('frm1702EX:txtPg5S5I3Col3'),
               'sched5_4A'  => request('frm1702EX:txtPg5S5I4Col1'),
               'sched5_4B'  => request('frm1702EX:txtPg5S5I4Col2'),
               'sched5_4C'  => request('frm1702EX:txtPg5S5I4Col3'),
               'sched5_4_subtotal'  => request('Pg5S5I4SubTotal'),
               'sched5_5'  => request('frm1702EX:txtPg5S5I5TotalAllowable'),
               'sched6_1'  => request('frm1702EX:txtPg5S6I1NetIncomeLoss'),
               'sched6_2A'  => request('frm1702EX:txtPg5S6I2Col1'),
               'sched6_2B'  => request('frm1702EX:txtPg5S6I2Col2'),
               'sched6_3A'  => request('frm1702EX:txtPg5S6I3Col1'),
               'sched6_3B'  => request('frm1702EX:txtPg5S6I3Col2'),
               'sched6_3_subtotal'  => request('Pg5S6I3SubTotal'),
               'sched6_4'  => request('frm1702EX:txtPg5S6I4Total'),
               'sched6_5A'  => request('frm1702EX:txtPg5S6I5Col1'),
               'sched6_5B'  => request('frm1702EX:txtPg5S6I5Col2'),
               'sched6_6A'  => request('frm1702EX:txtPg5S6I6Col1'),
               'sched6_6B'  => request('frm1702EX:txtPg5S6I6Col2'),
               'sched6_6_subtotal'  => request('Pg5S6I6SubTotal'),
               'sched6_7A'  => request('frm1702EX:txtPg5S6I7Col1'),
               'sched6_7B'  => request('frm1702EX:txtPg5S6I7Col2'),
               'sched6_8A'  => request('frm1702EX:txtPg5S6I8Col1'),
               'sched6_8B'  => request('frm1702EX:txtPg5S6I8Col2'),
               'sched6_8_subtotal'  => request('Pg5S6I8SubTotal'),
               'sched6_9'  => request('frm1702EX:txtPg5S6I9Col2'),
               'sched6_10'  => request('frm1702EX:txtPg5S6I10NetTaxable'),
               'sched7_1'  => request('frm1702EX:txtPg6S7I1CurrentAssets'),
               'sched7_2'  => request('frm1702EX:txtPg6S7I2LongInvestment'),
               'sched7_3'  => request('frm1702EX:txtPg6S7I3Property'),
               'sched7_4'  => request('frm1702EX:txtPg6S7I4LongReceivables'),
               'sched7_5'  => request('frm1702EX:txtPg6S7I5IntangibleAssets'),
               'sched7_6'  => request('frm1702EX:txtPg6S7I6OtherAssets'),
               'sched7_7'  => request('frm1702EX:txtPg6S7I7TotalAssets'),
               'sched7_8'  => request('frm1702EX:txtPg6S7I8CurrentLiabilities'),
               'sched7_9'  => request('frm1702EX:txtPg6S7I9LongLiabilities'),
               'sched7_10'  => request('frm1702EX:txtPg6S7I10DefferedCredits'),
               'sched7_11'  => request('frm1702EX:txtPg6S7I11OtherLiablities'),
               'sched7_12'  => request('frm1702EX:txtPg6S7I12TotalLiabilities'),
               'sched7_13'  => request('frm1702EX:txtPg6S7I13CapitalStock'),
               'sched7_14'  => request('frm1702EX:txtPg6S7I14AdditionalCapital'),
               'sched7_15'  => request('frm1702EX:txtPg6S7I15RetainedEarnings'),
               'sched7_16'  => request('frm1702EX:txtPg6S7I16TotalEquity'),
               'sched7_17'  => request('frm1702EX:txtPg6S7I17LiabilitiesAndEquity'),
               'sched8'  => null !== request('frm1702EX:chkPg6S8Radio') ? request('frm1702EX:chkPg6S8Radio') : '',
               'sched9_1A'  => request('frm1702EX:txtPg7Sc9I1InterestsC1'),
               'sched9_1B'  => request('frm1702EX:txtPg7Sc9I1InterestsC2'),
               'sched9_1C'  => request('frm1702EX:txtPg7Sc9I1InterestsC3'),
               'sched9_2A'  => request('frm1702EX:txtPg7Sc9I2RoyaltiesC1'),
               'sched9_2B'  => request('frm1702EX:txtPg7Sc9I2RoyaltiesC2'),
               'sched9_2C'  => request('frm1702EX:txtPg7Sc9I2RoyaltiesC3'),
               'sched9_3A'  => request('frm1702EX:txtPg7Sc9I3DividendsC1'),
               'sched9_3B'  => request('frm1702EX:txtPg7Sc9I3DividendsC2'),
               'sched9_3C'  => request('frm1702EX:txtPg7Sc9I3DividendsC3'),
               'sched9_4A'  => request('frm1702EX:txtPg7Sc9I4PrizesC1'),
               'sched9_4B'  => request('frm1702EX:txtPg7Sc9I4PrizesC2'),
               'sched9_4C'  => request('frm1702EX:txtPg7Sc9I4PrizesC3'),
               'sched9_4_subtotal'  => request('Pg7S9Pt1SubTotal'),
               'sched9_5A'  => request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC1'),
               'sched9_5B'  => request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC2'),
               'sched9_6A'  => request('frm1702EX:txtPg7Sc9I6OCTC1'),
               'sched9_6B'  => request('frm1702EX:txtPg7Sc9I6OCTC2'),
               'sched9_7A'  => request('frm1702EX:txtPg7Sc9I7CARC1'),
               'sched9_7B'  => request('frm1702EX:txtPg7Sc9I7CARC2'),
               'sched9_8A'  => request('frm1702EX:txtPg7Sc9I8ActualAmountC1'),
               'sched9_8B'  => request('frm1702EX:txtPg7Sc9I8ActualAmountC2'),
               'sched9_9A'  => request('frm1702EX:txtPg7Sc9I9FinalTaxC1'),
               'sched9_9B'  => request('frm1702EX:txtPg7Sc9I9FinalTaxC2'),
               'sched9_10_1A'  => request('frm1702EX:ddPg7S9I10C1'),
               'sched9_10_2A'  => request('frm1702EX:txtPg7Sc9I10PSCSC1'),
               'sched9_10_1B'  => request('frm1702EX:ddPg7S9I10C2'),
               'sched9_10_2B'  => request('frm1702EX:txtPg7Sc9I10PSCSC4'),
               'sched9_11A'  => request('frm1702EX:txtPg7Sc9I11CARC1'),
               'sched9_11B'  => request('frm1702EX:txtPg7Sc9I11CARC2'),
               'sched9_12A'  => request('frm1702EX:txtPg7Sc9I12NumberofSharesC1'),
               'sched9_12B'  => request('frm1702EX:txtPg7Sc9I12NumberofSharesC2'),
               'sched9_13A'  => request('frm1702EX:txtPg7Sc9I13DateofIssueC1'),
               'sched9_13B'  => request('frm1702EX:txtPg7Sc9I13DateofIssueC2'),
               'sched9_14A'  => request('frm1702EX:txtPg7Sc9I14ActualAmountC1'),
               'sched9_14B'  => request('frm1702EX:txtPg7Sc9I14ActualAmountC2'),
               'sched9_15A'  => request('frm1702EX:txtPg7Sc9I15FinalTaxC1'),
               'sched9_15B'  => request('frm1702EX:txtPg7Sc9I15FinalTaxC2'),
               'sched9_16A'  => request('frm1702EX:txtPg7Sc9I16OtherIncomeC1'),
               'sched9_16B'  => request('frm1702EX:txtPg7Sc9I16OtherIncomeC2'),
               'sched9_17A'  => request('frm1702EX:txtPg7Sc9I17ActualAmountC1'),
               'sched9_17B'  => request('frm1702EX:txtPg7Sc9I17ActualAmountC2'),
               'sched9_18A'  => request('frm1702EX:txtPg7Sc9I18FinalTaxC1'),
               'sched9_18B'  => request('frm1702EX:txtPg7Sc9I18FinalTaxC2'),
               'sched9_19'  => request('frm1702EX:txtPg7Sc9I19TotalFinalTax'),
               'sched10_1'  => request('frm1702EX:txtPg7Sc10I1ReturnofPremium'),
               'sched10_2A'  => request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC1'),
               'sched10_2B'  => request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC2'),
               'sched10_3A'  => request('frm1702EX:txtPg7Sc10I3ModeofTransferC1'),
               'sched10_3B'  => request('frm1702EX:txtPg7Sc10I3ModeofTransferC2'),
               'sched10_4A'  => request('frm1702EX:txtPg7Sc10I4CARC1'),
               'sched10_4B'  => request('frm1702EX:txtPg7Sc10I4CARC2'),
               'sched10_5A'  => request('frm1702EX:txtPg7Sc10I5ActualAmountC1'),
               'sched10_5B'  => request('frm1702EX:txtPg7Sc10I5ActualAmountC2'),
               'sched10_6A'  => request('frm1702EX:txtPg7Sc10I6OtherExemptC1'),
               'sched10_6B'  => request('frm1702EX:txtPg7Sc10I6OtherExemptC2'),
               'sched10_7A'  => request('frm1702EX:txtPg7Sc10I7ActualAmountC1'),
               'sched10_7B'  => request('frm1702EX:txtPg7Sc10I7ActualAmountC2'),
               'sched10_8'  => request('frm1702EX:txtPg7Sc10I8TotalIncome'),
          ]);
          
          $getForm = tbl_1702EX::where('form_no', request('form_no'))
                                   ->where('company_id', request('company'))->get();
          $trans = "";
          $form = "";
          if(request('form_id') != ""){
               $form = tbl_1702EX::find(request('form_id'));
               $form->update($data);
               $trans = "update";
          }else{
                 if($getForm->isEmpty()){
                     $form = tbl_1702EX::create($data);
                 }else{
                     $form = tbl_1702EX::find($getForm[0]->id);
                     $form->update($data);
                     $trans = "update";
                 }
          }

          if($trans == "update"){
               tbl_1702EX_schedule4::where('form_id', $getForm[0]->id)->delete();
               tbl_1702EX_schedule5::where('form_id', $getForm[0]->id)->delete();
               tbl_1702EX_schedule6::where('form_id', $getForm[0]->id)->delete();
               tbl_1702EX_schedule8::where('form_id', $getForm[0]->id)->delete();
               tbl_1702EX_schedule9_1::where('form_id', $getForm[0]->id)->delete();
               tbl_1702EX_schedule9_2::where('form_id', $getForm[0]->id)->delete();
               tbl_1702EX_schedule9_3::where('form_id', $getForm[0]->id)->delete();
               tbl_1702EX_schedule9_4::where('form_id', $getForm[0]->id)->delete();
               tbl_1702EX_schedule10_1::where('form_id', $getForm[0]->id)->delete();
               tbl_1702EX_schedule10_2::where('form_id', $getForm[0]->id)->delete();
          }

          if(null !== request('frm1702EX:txtPg4S3I3_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg4S3I3_Col1')) ; $i++) { 
                    $schedule3 = ([
                         'form_id'  => $form->id,
                         'schedule'  => '3',
                         'description'  => request('frm1702EX:txtPg4S3I3_Col1')[$i],
                         'amount'  => request('frm1702EX:txtPg4S3I3_Col2')[$i],
                    ]);
                    tbl_1702EX_schedule4::create($schedule3);
               }
          }

          if(null !== request('frm1702EX:txtPg4S4I4_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg4S4I4_Col1')) ; $i++) { 
                    $schedule4 = ([
                         'form_id'  => $form->id,
                         'schedule'  => '4',
                         'description'  => request('frm1702EX:txtPg4S4I4_Col1')[$i],
                         'amount'  => request('frm1702EX:txtPg4S4I4_Col2')[$i],
                    ]);
                    tbl_1702EX_schedule4::create($schedule4);
               }
          }

          if(null !== request('frm1702EX:txtPg5S4I39_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg5S4I39_Col1')) ; $i++) { 
                    $schedule4_39 = ([
                         'form_id'  => $form->id,
                         'schedule'  => '4.39',
                         'description'  => request('frm1702EX:txtPg5S4I39_Col1')[$i],
                         'amount'  => request('frm1702EX:txtPg5S4I39_Col2')[$i],
                    ]);
                    tbl_1702EX_schedule4::create($schedule4_39);
               }
          }

          if(null !== request('frm1702EX:txtPg5S5I4_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg5S5I4_Col1')) ; $i++) { 
                    $schedule5 = ([
                         'form_id'  => $form->id,
                         'description'  => request('frm1702EX:txtPg5S5I4_Col1')[$i],
                         'legal'  => request('frm1702EX:txtPg5S5I4_Col2')[$i],
                         'amount'  => request('frm1702EX:txtPg5S5I4_Col3')[$i],
                    ]);
                    tbl_1702EX_schedule5::create($schedule5);
               }
          }

          if(null !== request('frm1702EX:txtPg5S6I3_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg5S6I3_Col1')) ; $i++) { 
                    $schedule6_3 = ([
                         'form_id'  => $form->id,
                         'schedule'  => "6.3",
                         'description'  => request('frm1702EX:txtPg5S6I3_Col1')[$i],
                         'amount'  => request('frm1702EX:txtPg5S6I3_Col2')[$i],
                    ]);
                    tbl_1702EX_schedule6::create($schedule6_3);
               }
          }

          if(null !== request('frm1702EX:txtPg5S6I6_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg5S6I6_Col1')) ; $i++) { 
                    $schedule6_6 = ([
                         'form_id'  => $form->id,
                         'schedule'  => "6.6",
                         'description'  => request('frm1702EX:txtPg5S6I6_Col1')[$i],
                         'amount'  => request('frm1702EX:txtPg5S6I6_Col2')[$i],
                    ]);
                    tbl_1702EX_schedule6::create($schedule6_6);
               }
          }

          if(null !== request('frm1702EX:txtPg5S6I8_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg5S6I8_Col1')) ; $i++) { 
                    $schedule6_8 = ([
                         'form_id'  => $form->id,
                         'schedule'  => "6.8",
                         'description'  => request('frm1702EX:txtPg5S6I8_Col1')[$i],
                         'amount'  => request('frm1702EX:txtPg5S6I8_Col2')[$i],
                    ]);
                    tbl_1702EX_schedule6::create($schedule6_8);
               }
          }

          for ($y=1; $y < 20 ; $y++) { 
               if(request('frm1702EX:txtPg6S8I'.$y.'Col1Name') != ''){
                    $schedule8 = ([
                         'form_id'  => $form->id,
                         'name'    => request('frm1702EX:txtPg6S8I'.$y.'Col1Name'),
                         'tin1'    => request('frm1702EX:txtPg6S8I'.$y.'Col2TIN1'),
                         'tin2'    => request('frm1702EX:txtPg6S8I'.$y.'Col2TIN2'),
                         'tin3'    => request('frm1702EX:txtPg6S8I'.$y.'Col2TIN3'),
                         'tin4'    => request('frm1702EX:txtPg6S8I'.$y.'Col2TIN4'),
                         'capital' => request('frm1702EX:txtPg6S8I'.$y.'Col3CapContri'),
                         'total'   => request('frm1702EX:txtPg6S8I'.$y.'Col4PTotal'),
                    ]);
                    tbl_1702EX_schedule8::create($schedule8);
               }
          }

          if(null !== request('frm1702EX:txtPg7S9Pt1_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg7S9Pt1_Col1')) ; $i++) { 
                    $schedule9_1 = ([
                         'form_id'  => $form->id,
                         'description'  => request('frm1702EX:txtPg7S9Pt1_Col1')[$i],
                         'exempt'  => request('frm1702EX:txtPg7S9Pt1_Col2')[$i],
                         'amount'  => request('frm1702EX:txtPg7S9Pt1_Col3')[$i],
                         'withheld' => request('frm1702EX:txtPg7S9Pt1_Col4')[$i],
                    ]);
                    tbl_1702EX_schedule9_1::create($schedule9_1);
               }
          }

          if(null !== request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_1')) ; $i++) { 
                    $schedule9_2 = ([
                         'form_id'  => $form->id,
                         'item5A'  => request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_1')[$i],
                         'item5B'  => request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_2')[$i],
                         'item6A'  => request('frm1702EX:txtPg7Sc9I6OCTC_1')[$i],
                         'item6B'  => request('frm1702EX:txtPg7Sc9I6OCTC_2')[$i],
                         'item7A'  => request('frm1702EX:txtPg7Sc9I7CARC_1')[$i],
                         'item7B'  => request('frm1702EX:txtPg7Sc9I7CARC_2')[$i],
                         'item8A'  => request('frm1702EX:txtPg7Sc9I8ActualAmountC_1')[$i],
                         'item8B'  => request('frm1702EX:txtPg7Sc9I8ActualAmountC_2')[$i],
                         'item9A'  => request('frm1702EX:txtPg7Sc9I9FinalTaxC_1')[$i],
                         'item9B'  => request('frm1702EX:txtPg7Sc9I9FinalTaxC_2')[$i],
                    ]);
                    tbl_1702EX_schedule9_2::create($schedule9_2);
               }
          }


          if(null !== request('frm1702EX:ddPg7S9I10C_1')){
               for ($i=0; $i < count(request('frm1702EX:ddPg7S9I10C_1')) ; $i++) { 
                    $schedule9_3 = ([
                         'form_id'  => $form->id,
                         'item10_1C'  => request('frm1702EX:ddPg7S9I10C_1')[$i],
                         'item10_2C'  => request('frm1702EX:txtPg7Sc9I10PSCSC_1')[$i],
                         'item10_1D'  => request('frm1702EX:ddPg7S9I10C_2')[$i],
                         'item10_2D'  => request('frm1702EX:txtPg7Sc9I10PSCSC_2')[$i],
                         'item11C'  => request('frm1702EX:txtPg7Sc9I11CARC_1')[$i],
                         'item11D'  => request('frm1702EX:txtPg7Sc9I11CARC_2')[$i],
                         'item12C'  => request('frm1702EX:txtPg7Sc9I12NumberofSharesC_1')[$i],
                         'item12D'  => request('frm1702EX:txtPg7Sc9I12NumberofSharesC_2')[$i],
                         'item13C'  => request('frm1702EX:txtPg7Sc9I13DateofIssueC_1')[$i],
                         'item13D'  => request('frm1702EX:txtPg7Sc9I13DateofIssueC_2')[$i],
                         'item14C'  => request('frm1702EX:txtPg7Sc9I14ActualAmountC_1')[$i],
                         'item14D'  => request('frm1702EX:txtPg7Sc9I14ActualAmountC_2')[$i],
                         'item15C'  => request('frm1702EX:txtPg7Sc9I15FinalTaxC_1')[$i],
                         'item15D'  => request('frm1702EX:txtPg7Sc9I15FinalTaxC_2')[$i],
                    ]);
                    tbl_1702EX_schedule9_3::create($schedule9_3);
               }
          }


          if(null !== request('frm1702EX:txtPg7Sc9I16OtherIncomeC_1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg7Sc9I16OtherIncomeC_1')) ; $i++) { 
                    $schedule9_4 = ([
                         'form_id'  => $form->id,
                         'item16A'  => request('frm1702EX:txtPg7Sc9I16OtherIncomeC_1')[$i],
                         'item16B'  => request('frm1702EX:txtPg7Sc9I16OtherIncomeC_2')[$i],
                         'item17A'  => request('frm1702EX:txtPg7Sc9I17ActualAmountC_1')[$i],
                         'item17B'  => request('frm1702EX:txtPg7Sc9I17ActualAmountC_2')[$i],
                         'item18A'  => request('frm1702EX:txtPg7Sc9I18FinalTaxC_1')[$i],
                         'item18B'  => request('frm1702EX:txtPg7Sc9I18FinalTaxC_2')[$i],
                    ]);
                    tbl_1702EX_schedule9_4::create($schedule9_4);
               }
          }

          if(null !== request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_1')) ; $i++) { 
                    $schedule10_1 = ([
                         'form_id'  => $form->id,
                         'item2A'  => request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_1')[$i],
                         'item2B'  => request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_2')[$i],
                         'item3A'  => request('frm1702EX:txtPg7Sc10I3ModeofTransferC_1')[$i],
                         'item3B'  => request('frm1702EX:txtPg7Sc10I3ModeofTransferC_2')[$i],
                         'item4A'  => request('frm1702EX:txtPg7Sc10I4CARC_1')[$i],
                         'item4B'  => request('frm1702EX:txtPg7Sc10I4CARC_2')[$i],
                         'item5A'  => request('frm1702EX:txtPg7Sc10I5ActualAmountC_1')[$i],
                         'item5B'  => request('frm1702EX:txtPg7Sc10I5ActualAmountC_2')[$i],
                    ]);
                    tbl_1702EX_schedule10_1::create($schedule10_1);
               }
          }

          if(null !== request('frm1702EX:txtPg7Sc10I6OtherExemptC_1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg7Sc10I6OtherExemptC_1')) ; $i++) { 
                    $schedule10_2 = ([
                         'form_id'  => $form->id,
                         'item6A'  => request('frm1702EX:txtPg7Sc10I6OtherExemptC_1')[$i],
                         'item6B'  => request('frm1702EX:txtPg7Sc10I6OtherExemptC_2')[$i],
                         'item7A'  => request('frm1702EX:txtPg7Sc10I7ActualAmountC_1')[$i],
                         'item7B'  => request('frm1702EX:txtPg7Sc10I7ActualAmountC_2')[$i],
                    ]);
                    tbl_1702EX_schedule10_2::create($schedule10_2);
               }
          }

          $rdoPg1I1Calendar = "false";
          $rdoPg1I1Fiscal = "false";

          if(request('frm1702EX:rdoPg1I1') == 'C'){
               $rdoPg1I1Calendar = "true";
          }else if(request('frm1702EX:rdoPg1I1') == 'F'){
               $rdoPg1I1Fiscal = "true";
          }

          $rdoPg1I3AmendedYes = "false";
          $rdoPg1I3AmendedNo = "false";
          if(request('frm1702EX:rdoPg1I3Amended') == 'Y'){
               $rdoPg1I3AmendedYes = "true";
          }else if(request('frm1702EX:rdoPg1I3Amended') == 'N'){
               $rdoPg1I3AmendedNo = "true";
          }

          $rdoPg1I4ShortPeriodYes = "false";
          $rdoPg1I4ShortPeriodNo = "false";
          if(request('frm1702EX:rdoPg1I4ShortPeriod') == 'Y'){
               $rdoPg1I4ShortPeriodYes = "true";
          }else if(request('frm1702EX:rdoPg1I4ShortPeriod') == 'N'){
               $rdoPg1I4ShortPeriodNo = "true";
          }

          $rdoPg1I5ATCR1C3 = "false";
          $rdoPg1I5ATCR2C3 = "false";
          if(null !== request('frm1702EX:rdoPg1I5ATC')){
                 if(request('frm1702EX:rdoPg1I5ATC') == "IC011"){
                     $rdoPg1I5ATCR1C3 = "true";
                 }else if(request('frm1702EX:rdoPg1I5ATC') == "IC021"){
                     $rdoPg1I5ATCR2C3 = "true";
                 }
          }

          $taxPayerName =  rawurlencode(request('frm1702EX:RegName'));

          $address = rawurlencode(request('frm1702EX:txtPg1Pt1I10RegisteredAddress'));

          $lineOfBusiness = rawurlencode(request('frm1702EX:txtPg1Pt1I13MainLine'));

          $rdoPg1CTC = "false";
          $rdoPg1Reg = "false";
          if(null !== request('CTCorReg')){
                 if(request('CTCorReg') == "CTC"){
                     $rdoPg1CTC = "true";
                 }else if(request('CTCorReg') == "Reg"){
                     $rdoPg1Reg = "true";
                 }
          }

          $chkPg6S8StockHolders = "false";
          $chkPg6S8Partners = "false";
          $chkPg6S8MembersInfo = "false";
          if(null !== request('frm1702EX:chkPg6S8Radio')){
                 if(request('frm1702EX:chkPg6S8Radio') == "Stockholders"){
                     $chkPg6S8StockHolders = "true";
                 }else if(request('frm1702EX:chkPg6S8Radio') == "Partners"){
                     $chkPg6S8Partners = "true";
                 }else if(request('frm1702EX:chkPg6S8Radio') == "Member"){
                     $chkPg6S8MembersInfo = "true";
                 }
          }

          $schedule3 = "";
          if(null !== request('frm1702EX:txtPg4S3I3_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg4S3I3_Col1')) ; $i++) { 
                    $schedule3 .= "<div>frm1702EX:txtPg4S3I3_".($i + 1)."Col1=".request('frm1702EX:txtPg4S3I3_Col1')[$i]."frm1702EX:txtPg4S3I3_".($i + 1)."Col1=</div>	
            <div>frm1702EX:txtPg4S3I3_".($i + 1)."Col2=".request('frm1702EX:txtPg4S3I3_Col2')[$i]."frm1702EX:txtPg4S3I3_".($i + 1)."Col2=</div>	
            ";
               }
          }

          $schedule4 = "";
          if(null !== request('frm1702EX:txtPg4S4I4_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg4S4I4_Col1')) ; $i++) { 
                    $schedule4 .= "<div>frm1702EX:txtPg4S4I4_".($i + 1)."Col1=".request('frm1702EX:txtPg4S4I4_Col1')[$i]."frm1702EX:txtPg4S4I4_".($i + 1)."Col1=</div>	
            <div>frm1702EX:txtPg4S4I4_".($i + 1)."Col2=".request('frm1702EX:txtPg4S4I4_Col2')[$i]."frm1702EX:txtPg4S4I4_".($i + 1)."Col2=</div>	
            ";
               }
          }

          $schedule4_39 = "";
          if(null !== request('frm1702EX:txtPg5S4I39_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg5S4I39_Col1')) ; $i++) { 
                    $schedule4_39 .= "<div>frm1702EX:txtPg5S4I39_".($i + 1)."Col1=".request('frm1702EX:txtPg5S4I39_Col1')[$i]."frm1702EX:txtPg5S4I39_".($i + 1)."Col1=</div>	
            <div>frm1702EX:txtPg5S4I39_".($i + 1)."Col2=".request('frm1702EX:txtPg5S4I39_Col2')[$i]."frm1702EX:txtPg5S4I39_".($i + 1)."Col2=</div>	
            ";
               }
          }

          $schedule5 = "";
          if(null !== request('frm1702EX:txtPg5S5I4_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg5S5I4_Col1')) ; $i++) { 
                    $schedule5 .= "<div>frm1702EX:txtPg5S5I4_".($i + 1)."Col1=".request('frm1702EX:txtPg5S5I4_Col1')[$i]."frm1702EX:txtPg5S5I4_".($i + 1)."Col1=</div>	
            <div>frm1702EX:txtPg5S5I4_".($i + 1)."Col2=".request('frm1702EX:txtPg5S5I4_Col2')[$i]."frm1702EX:txtPg5S5I4_".($i + 1)."Col2=</div>	
            <div>frm1702EX:txtPg5S5I4_".($i + 1)."Col3=".request('frm1702EX:txtPg5S5I4_Col3')[$i]."frm1702EX:txtPg5S5I4_".($i + 1)."Col3=</div>	
            ";
               }
          }

          $schedule6_3 = "";
          if(null !== request('frm1702EX:txtPg5S6I3_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg5S6I3_Col1')) ; $i++) { 
                    $schedule6_3 .= "<div>frm1702EX:txtPg5S6I3_".($i + 1)."Col1=".request('frm1702EX:txtPg5S6I3_Col1')[$i]."frm1702EX:txtPg5S6I3_".($i + 1)."Col1=</div>  
            <div>frm1702EX:txtPg5S6I3_".($i + 1)."Col2=".request('frm1702EX:txtPg5S6I3_Col2')[$i]."frm1702EX:txtPg5S6I3_".($i + 1)."Col2=</div>  
            ";
               }
          }

          $schedule6_6 = "";
          if(null !== request('frm1702EX:txtPg5S6I6_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg5S6I6_Col1')) ; $i++) { 
                    $schedule6_6 .= "<div>frm1702EX:txtPg5S6I6_".($i + 1)."Col1=".request('frm1702EX:txtPg5S6I6_Col1')[$i]."frm1702EX:txtPg5S6I6_".($i + 1)."Col1=</div>	
            <div>frm1702EX:txtPg5S6I6_".($i + 1)."Col2=".request('frm1702EX:txtPg5S6I6_Col2')[$i]."frm1702EX:txtPg5S6I6_".($i + 1)."Col2=</div>	
            ";
               }
          }    

          $schedule6_8 = "";
          if(null !== request('frm1702EX:txtPg5S6I8_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg5S6I8_Col1')) ; $i++) { 
                    $schedule6_8 .= "<div>frm1702EX:txtPg5S6I8_".($i + 1)."Col1=".request('frm1702EX:txtPg5S6I8_Col1')[$i]."frm1702EX:txtPg5S6I8_".($i + 1)."Col1=</div>	
            <div>frm1702EX:txtPg5S6I8_".($i + 1)."Col2=".request('frm1702EX:txtPg5S6I8_Col2')[$i]."frm1702EX:txtPg5S6I8_".($i + 1)."Col2=</div>	
            ";
               }
          }

          $schedule9_1 = "";
          if(null !== request('frm1702EX:txtPg7S9Pt1_Col1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg7S9Pt1_Col1')) ; $i++) { 
                    $schedule9_1 .= "<div>frm1702EX:txtPg7S9Pt1_".($i + 1)."Col1=".request('frm1702EX:txtPg7S9Pt1_Col1')[$i]."frm1702EX:txtPg7S9Pt1_".($i + 1)."Col1=</div>	
            <div>frm1702EX:txtPg7S9Pt1_".($i + 1)."Col2=".request('frm1702EX:txtPg7S9Pt1_Col2')[$i]."frm1702EX:txtPg7S9Pt1_".($i + 1)."Col2=</div>	
            <div>frm1702EX:txtPg7S9Pt1_".($i + 1)."Col3=".request('frm1702EX:txtPg7S9Pt1_Col3')[$i]."frm1702EX:txtPg7S9Pt1_".($i + 1)."Col3=</div>	
            <div>frm1702EX:txtPg7S9Pt1_".($i + 1)."Col4=".request('frm1702EX:txtPg7S9Pt1_Col4')[$i]."frm1702EX:txtPg7S9Pt1_".($i + 1)."Col4=</div>	
            ";
               }
          }

          $schedule9_2 = "";
          if(null !== request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_1')) ; $i++) { 
                    $schedule9_2 .= "<div>frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_1')[$i]."frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_2')[$i]."frm1702EX:txtPg7Sc9I5DescriptionofPropertyC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I6OCTC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I6OCTC_1')[$i]."frm1702EX:txtPg7Sc9I6OCTC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I6OCTC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I6OCTC_2')[$i]."frm1702EX:txtPg7Sc9I6OCTC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I7CARC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I7CARC_1')[$i]."frm1702EX:txtPg7Sc9I7CARC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I7CARC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I7CARC_2')[$i]."frm1702EX:txtPg7Sc9I7CARC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I8ActualAmountC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I8ActualAmountC_1')[$i]."frm1702EX:txtPg7Sc9I8ActualAmountC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I8ActualAmountC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I8ActualAmountC_2')[$i]."frm1702EX:txtPg7Sc9I8ActualAmountC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I9FinalTaxC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I9FinalTaxC_1')[$i]."frm1702EX:txtPg7Sc9I9FinalTaxC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I9FinalTaxC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I9FinalTaxC_2')[$i]."frm1702EX:txtPg7Sc9I9FinalTaxC_".(4 + $i + $i)."=</div>	
            ";
               }
          }

          $schedule9_3 = "";
          if(null !== request('frm1702EX:ddPg7S9I10C_1')){
               for ($i=0; $i < count(request('frm1702EX:ddPg7S9I10C_1')) ; $i++) { 
                    $schedule9_3 .= "<div>frm1702EX:ddPg7S9I10C_".(3 + $i + $i)."=".request('frm1702EX:ddPg7S9I10C_1')[$i]."frm1702EX:ddPg7S9I10C_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I10PSCSC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I10PSCSC_1')[$i]."frm1702EX:txtPg7Sc9I10PSCSC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:ddPg7S9I10C_".(4 + $i + $i)."=".request('frm1702EX:ddPg7S9I10C_2')[$i]."frm1702EX:ddPg7S9I10C_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I10PSCSC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I10PSCSC_2')[$i]."frm1702EX:txtPg7Sc9I10PSCSC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I11CARC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I11CARC_1')[$i]."frm1702EX:txtPg7Sc9I11CARC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I11CARC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I11CARC_2')[$i]."frm1702EX:txtPg7Sc9I11CARC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I12NumberofSharesC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I12NumberofSharesC_1')[$i]."frm1702EX:txtPg7Sc9I12NumberofSharesC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I12NumberofSharesC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I12NumberofSharesC_2')[$i]."frm1702EX:txtPg7Sc9I12NumberofSharesC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I13DateofIssueC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I13DateofIssueC_1')[$i]."frm1702EX:txtPg7Sc9I13DateofIssueC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I13DateofIssueC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I13DateofIssueC_2')[$i]."frm1702EX:txtPg7Sc9I13DateofIssueC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I14ActualAmountC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I14ActualAmountC_1')[$i]."frm1702EX:txtPg7Sc9I14ActualAmountC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I14ActualAmountC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I14ActualAmountC_2')[$i]."frm1702EX:txtPg7Sc9I14ActualAmountC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I15FinalTaxC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I15FinalTaxC_1')[$i]."frm1702EX:txtPg7Sc9I15FinalTaxC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I15FinalTaxC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I15FinalTaxC_2')[$i]."frm1702EX:txtPg7Sc9I15FinalTaxC_".(4 + $i + $i)."=</div>	
            ";
               }
          }

          $schedule9_4 = "";
          if(null !== request('frm1702EX:txtPg7Sc9I16OtherIncomeC_1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg7Sc9I16OtherIncomeC_1')) ; $i++) { 
                    $schedule9_4 .= "<div>frm1702EX:txtPg7Sc9I16OtherIncomeC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I16OtherIncomeC_1')[$i]."frm1702EX:txtPg7Sc9I16OtherIncomeC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I16OtherIncomeC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I16OtherIncomeC_2')[$i]."frm1702EX:txtPg7Sc9I16OtherIncomeC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I17ActualAmountC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I17ActualAmountC_1')[$i]."frm1702EX:txtPg7Sc9I17ActualAmountC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I17ActualAmountC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I17ActualAmountC_2')[$i]."frm1702EX:txtPg7Sc9I17ActualAmountC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I18FinalTaxC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I18FinalTaxC_1')[$i]."frm1702EX:txtPg7Sc9I18FinalTaxC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc9I18FinalTaxC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc9I18FinalTaxC_2')[$i]."frm1702EX:txtPg7Sc9I18FinalTaxC_".(4 + $i + $i)."=</div>	
            ";
               }
          }

          $schedule10_1 = "";
          if(null !== request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_1')) ; $i++) { 
                    $schedule10_1 .= "<div>frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_1')[$i]."frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_2')[$i]."frm1702EX:txtPg7Sc10I2DescriptionofPropertyC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc10I3ModeofTransferC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I3ModeofTransferC_1')[$i]."frm1702EX:txtPg7Sc10I3ModeofTransferC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc10I3ModeofTransferC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I3ModeofTransferC_2')[$i]."frm1702EX:txtPg7Sc10I3ModeofTransferC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc10I4CARC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I4CARC_1')[$i]."frm1702EX:txtPg7Sc10I4CARC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc10I4CARC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I4CARC_2')[$i]."frm1702EX:txtPg7Sc10I4CARC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc10I5ActualAmountC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I5ActualAmountC_1')[$i]."frm1702EX:txtPg7Sc10I5ActualAmountC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc10I5ActualAmountC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I5ActualAmountC_2')[$i]."frm1702EX:txtPg7Sc10I5ActualAmountC_".(4 + $i + $i)."=</div>	
            ";
               }
          }

          $schedule10_2 = "";
          if(null !== request('frm1702EX:txtPg7Sc10I6OtherExemptC_1')){
               for ($i=0; $i < count(request('frm1702EX:txtPg7Sc10I6OtherExemptC_1')) ; $i++) { 
                    $schedule10_2 .= "<div>frm1702EX:txtPg7Sc10I6OtherExemptC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I6OtherExemptC_1')[$i]."frm1702EX:txtPg7Sc10I6OtherExemptC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc10I6OtherExemptC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I6OtherExemptC_2')[$i]."frm1702EX:txtPg7Sc10I6OtherExemptC_".(4 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc10I7ActualAmountC_".(3 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I7ActualAmountC_1')[$i]."frm1702EX:txtPg7Sc10I7ActualAmountC_".(3 + $i + $i)."=</div>	
            <div>frm1702EX:txtPg7Sc10I7ActualAmountC_".(4 + $i + $i)."=".request('frm1702EX:txtPg7Sc10I7ActualAmountC_2')[$i]."frm1702EX:txtPg7Sc10I7ActualAmountC_".(4 + $i + $i)."=</div>	
            ";
               }
          }

          $replaceParenthesis = str_replace('(', '-', request('frm1702EX:txtPg5S6I10NetTaxable')); 
          $netTaxable =  str_replace(')', '', $replaceParenthesis);

          $xmlData = "<?xml version='1.0'?>	
            <div>frm1702EX:rdoPg1I1Calendar=".$rdoPg1I1Calendar."frm1702EX:rdoPg1I1Calendar=</div>	
            <div>frm1702EX:rdoPg1I1Fiscal=".$rdoPg1I1Fiscal."frm1702EX:rdoPg1I1Fiscal=</div>	
            <div>frm1702EX:ddlPg1I2Date=".request('frm1702EX:ddlPg1I2Date')."frm1702EX:ddlPg1I2Date=</div>	
            <div>frm1702EX:txtPg1I2YearEnd=".request('frm1702EX:txtPg1I2YearEnd')."frm1702EX:txtPg1I2YearEnd=</div>	
            <div>frm1702EX:rdoPg1I3AmendedYes=".$rdoPg1I3AmendedYes."frm1702EX:rdoPg1I3AmendedYes=</div>	
            <div>frm1702EX:rdoPg1I3AmendedNo=".$rdoPg1I3AmendedNo."frm1702EX:rdoPg1I3AmendedNo=</div>	
            <div>frm1702EX:rdoPg1I4ShortPeriodYes=".$rdoPg1I4ShortPeriodYes."frm1702EX:rdoPg1I4ShortPeriodYes=</div>	
            <div>frm1702EX:rdoPg1I4ShortPeriodNo=".$rdoPg1I4ShortPeriodNo."frm1702EX:rdoPg1I4ShortPeriodNo=</div>	
            <div>frm1702EX:txtPg1I5ATCR1C1=".request('frm1702EX:rdoPg1I5ATCR1C1')."frm1702EX:txtPg1I5ATCR1C1=</div>	
            <div>frm1702EX:txtPg1I5ATCR1C2= ".request('frm1702EX:rdoPg1I5ATCR1C2')."frm1702EX:txtPg1I5ATCR1C2=</div>	
            <div>frm1702EX:rdoPg1I5ATCR1C3=".$rdoPg1I5ATCR1C3."frm1702EX:rdoPg1I5ATCR1C3=</div>	
            <div>frm1702EX:txtPg1I5ATCR2C1=".request('frm1702EX:rdoPg1I5ATCR2C1')."frm1702EX:txtPg1I5ATCR2C1=</div>	
            <div>frm1702EX:txtPg1I5ATCR2C2= ".request('frm1702EX:rdoPg1I5ATCR2C2')."frm1702EX:txtPg1I5ATCR2C2=</div>	
            <div>frm1702EX:rdoPg1I5ATCR2C3=".$rdoPg1I5ATCR2C3."frm1702EX:rdoPg1I5ATCR2C3=</div>	
            <div>frm1702EX:txtPg1Pt1I6TINC1=".request('frm1702EX:TIN1')."frm1702EX:txtPg1Pt1I6TINC1=</div>	
            <div>frm1702EX:txtPg1Pt1I6TINC2=".request('frm1702EX:TIN2')."frm1702EX:txtPg1Pt1I6TINC2=</div>	
            <div>frm1702EX:txtPg1Pt1I6TINC3=".request('frm1702EX:TIN3')."frm1702EX:txtPg1Pt1I6TINC3=</div>	
            <div>frm1702EX:txtPg1Pt1I6TINC4=".request('frm1702EX:TIN4')."frm1702EX:txtPg1Pt1I6TINC4=</div>	
            <div>BranchMask=".request('BranchMask')."BranchMask=</div>	
            <div>frm1702EX:hdnPg1Pt1I7RDO=".request('frm1702EX:hdnPg1Pt1I7RDO')."frm1702EX:hdnPg1Pt1I7RDO=</div>	
            <div>frm1702EX:rdoPg1Pt1I7RDO=".request('frm1702EX:rdoPg1Pt1I7RDO')."frm1702EX:rdoPg1Pt1I7RDO=</div>	
            <div>frm1702EX:txtPg1Pt1I8DateofIncorporation=".request('frm1702EX:txtPg1Pt1I8DateofIncorporation')."frm1702EX:txtPg1Pt1I8DateofIncorporation=</div>	
            <div>frm1702EX:txtPg1Pt1I9RegisteredName=".$taxPayerName."frm1702EX:txtPg1Pt1I9RegisteredName=</div>	
            <div>frm1702EX:txtPg1Pt1I10RegisteredAddress=".$address."frm1702EX:txtPg1Pt1I10RegisteredAddress=</div>	
            <div>frm1702EX:txtZIP=".request('frm1702EX:txtZIP')."frm1702EX:txtZIP=</div>	
            <div>frm1702EX:txtPg1Pt1I11ContactNumber=".request('frm1702EX:txtPg1Pt1I11ContactNumber')."frm1702EX:txtPg1Pt1I11ContactNumber=</div>	
            <div>frm1702EX:txtPg1Pt1I12Email=".request('frm1702EX:txtPg1Pt1I12Email')."frm1702EX:txtPg1Pt1I12Email=</div>	
            <div>frm1702EX:txtPg1Pt1I13MainLine=".$lineOfBusiness."frm1702EX:txtPg1Pt1I13MainLine=</div>	
            <div>frm1702EX:txtPg1Pt1I14PSICCode=".request('frm1702EX:txtPg1Pt1I14PSICCode')."frm1702EX:txtPg1Pt1I14PSICCode=</div>	
            <div>frm1702EX:rdoPg1Pt1I15ItemizedDeduction=".(null !== request('frm1702EX:rdoPg1Pt1I15MethodofDeduction') ? 'true' : 'false')."frm1702EX:rdoPg1Pt1I15ItemizedDeduction=</div>	
            <div>frm1702EX:txtPg1Pt1I16LegalBasis=".request('frm1702EX:txtPg1Pt1I16LegalBasis')."frm1702EX:txtPg1Pt1I16LegalBasis=</div>	
            <div>frm1702EX:txtPg1Pt1I17Investment=".request('frm1702EX:txtPg1Pt1I17Investment')."frm1702EX:txtPg1Pt1I17Investment=</div>	
            <div>frm1702EX:txtPg1Pt1I18RegisteredActivity=".request('frm1702EX:txtPg1Pt1I18RegisteredActivity')."frm1702EX:txtPg1Pt1I18RegisteredActivity=</div>	
            <div>frm1702EX:txtPg1Pt1I19EffectivityFrom=".request('frm1702EX:txtPg1Pt1I19EffectivityFrom')."frm1702EX:txtPg1Pt1I19EffectivityFrom=</div>	
            <div>frm1702EX:txtPg1Pt1I19EffectivityTo=".request('frm1702EX:txtPg1Pt1I19EffectivityTo')."frm1702EX:txtPg1Pt1I19EffectivityTo=</div>	
            <div>frm1702EX:txtPg1Pt2I20TotalIncome=".request('frm1702EX:txtPg1Pt2I20TotalIncome')."frm1702EX:txtPg1Pt2I20TotalIncome=</div>	
            <div>frm1702EX:txtPg1Pt2I21AddPenalty=".request('frm1702EX:txtPg1Pt2I21AddPenalty')."frm1702EX:txtPg1Pt2I21AddPenalty=</div>	
            <div>frm1702EX:txtPg1Pt2I22TotalAmount=".request('frm1702EX:txtPg1Pt2I22TotalAmount')."frm1702EX:txtPg1Pt2I22TotalAmount=</div>	
            <div>frm1702EX:txtPg1Pt2AuthorizedRepresentative=".request('frm1702EX:txtPg1Pt2AuthorizedRepresentative')."frm1702EX:txtPg1Pt2AuthorizedRepresentative=</div>	
            <div>frm1702EX:txtPg1Pt2Treasurer=".request('frm1702EX:txtPg1Pt2Treasurer')."frm1702EX:txtPg1Pt2Treasurer=</div>	
            <div>frm1702EX:txtPg1Pt2TitleofSignatory=".request('frm1702EX:txtPg1Pt2TitleofSignatory')."frm1702EX:txtPg1Pt2TitleofSignatory=</div>	
            <div>frm1702EX:txtPg1Pt2NumberofPagesFiled=".request('frm1702EX:txtPg1Pt2NumberofPagesFiled')."frm1702EX:txtPg1Pt2NumberofPagesFiled=</div>	
            <div>frm1702EX:rdoPg1CTC=".$rdoPg1CTC."frm1702EX:rdoPg1CTC=</div>	
            <div>frm1702EX:rdoPg1Reg=".$rdoPg1Reg."frm1702EX:rdoPg1Reg=</div>	
            <div>frm1702EX:txtPg1Pt2I23CommunityTax=".request('frm1702EX:txtPg1Pt2I23CommunityTax')."frm1702EX:txtPg1Pt2I23CommunityTax=</div>	
            <div>frm1702EX:txtPg1Pt1I24DateofIssue=".request('frm1702EX:txtPg1Pt1I24DateofIssue')."frm1702EX:txtPg1Pt1I24DateofIssue=</div>	
            <div>frm1702EX:txtPg1Pt1I25PlaceofIssue=".request('frm1702EX:txtPg1Pt1I25PlaceofIssue')."frm1702EX:txtPg1Pt1I25PlaceofIssue=</div>	
            <div>frm1702EX:txtPg1Pt1I26Amount=".request('frm1702EX:txtPg1Pt1I26Amount')."frm1702EX:txtPg1Pt1I26Amount=</div>	
            <div>frm1702EX:txtPg1Pt3I27CashC1=frm1702EX:txtPg1Pt3I27CashC1=</div>	
            <div>frm1702EX:txtPg1Pt3I27CashC2=frm1702EX:txtPg1Pt3I27CashC2=</div>	
            <div>frm1702EX:txtPg1Pt3I27Date=frm1702EX:txtPg1Pt3I27Date=</div>	
            <div>frm1702EX:txtPg1Pt3I27CashC3=0frm1702EX:txtPg1Pt3I27CashC3=</div>	
            <div>frm1702EX:txtPg1Pt3I28CheckC1=frm1702EX:txtPg1Pt3I28CheckC1=</div>	
            <div>frm1702EX:txtPg1Pt3I28CheckC2=frm1702EX:txtPg1Pt3I28CheckC2=</div>	
            <div>frm1702EX:txtPg1Pt3I28Date=frm1702EX:txtPg1Pt3I28Date=</div>	
            <div>frm1702EX:txtPg1Pt3I28CheckC3=0frm1702EX:txtPg1Pt3I28CheckC3=</div>	
            <div>frm1702EX:txtPg1Pt3I29TaxDebitC2=frm1702EX:txtPg1Pt3I29TaxDebitC2=</div>	
            <div>frm1702EX:txtPg1Pt3I29Date=frm1702EX:txtPg1Pt3I29Date=</div>	
            <div>frm1702EX:txtPg1Pt3I29TaxDebitC3=0frm1702EX:txtPg1Pt3I29TaxDebitC3=</div>	
            <div>frm1702EX:txtPg1Pt3I30OthersC1=frm1702EX:txtPg1Pt3I30OthersC1=</div>	
            <div>frm1702EX:txtPg1Pt3I30OthersC2=frm1702EX:txtPg1Pt3I30OthersC2=</div>	
            <div>frm1702EX:txtPg1Pt3I30OthersC3=frm1702EX:txtPg1Pt3I30OthersC3=</div>	
            <div>frm1702EX:txtPg1Pt3I30Date=frm1702EX:txtPg1Pt3I30Date=</div>	
            <div>frm1702EX:txtPg1Pt3I30OthersC4=0frm1702EX:txtPg1Pt3I30OthersC4=</div>	
            <div>frm1702EX:txtPg2TinC1=".request('frm1702EX:TIN1')."frm1702EX:txtPg2TinC1=</div>	
            <div>frm1702EX:txtPg2TinC2=".request('frm1702EX:TIN2')."frm1702EX:txtPg2TinC2=</div>	
            <div>frm1702EX:txtPg2TinC3=".request('frm1702EX:TIN3')."frm1702EX:txtPg2TinC3=</div>	
            <div>frm1702EX:txtPg2TinC4=".request('frm1702EX:TIN4')."frm1702EX:txtPg2TinC4=</div>	
            <div>BrachMask2=".request('BrachMask2')."BrachMask2=</div>	
            <div>frm1702EX:txtPg2RegisteredName=".request('frm1702EX:RegName')."frm1702EX:txtPg2RegisteredName=</div>	
            <div>frm1702EX:txtPg2Pt4I31NetSales=".request('frm1702EX:txtPg2Pt4I31NetSales')."frm1702EX:txtPg2Pt4I31NetSales=</div>	
            <div>frm1702EX:txtPg2Pt4I32LessCost=".request('frm1702EX:txtPg2Pt4I32LessCost')."frm1702EX:txtPg2Pt4I32LessCost=</div>	
            <div>frm1702EX:txtPg2Pt4I33GrossIncome=".request('frm1702EX:txtPg2Pt4I33GrossIncome')."frm1702EX:txtPg2Pt4I33GrossIncome=</div>	
            <div>frm1702EX:txtPg2Pt4I34AddOther=".request('frm1702EX:txtPg2Pt4I34AddOther')."frm1702EX:txtPg2Pt4I34AddOther=</div>	
            <div>frm1702EX:txtPg2Pt4I35TotalGross=".request('frm1702EX:txtPg2Pt4I35TotalGross')."frm1702EX:txtPg2Pt4I35TotalGross=</div>	
            <div>frm1702EX:txtPg2Pt4I36OrdinaryAllowable=".request('frm1702EX:txtPg2Pt4I36OrdinaryAllowable')."frm1702EX:txtPg2Pt4I36OrdinaryAllowable=</div>	
            <div>frm1702EX:txtPg2Pt4I37SpecialAllowable=".request('frm1702EX:txtPg2Pt4I37SpecialAllowable')."frm1702EX:txtPg2Pt4I37SpecialAllowable=</div>	
            <div>frm1702EX:txtPg2Pt4I38TotalItemized=".request('frm1702EX:txtPg2Pt4I38TotalItemized')."frm1702EX:txtPg2Pt4I38TotalItemized=</div>	
            <div>frm1702EX:txtPg2Pt4I39NetTaxable=".request('frm1702EX:txtPg2Pt4I39NetTaxable')."frm1702EX:txtPg2Pt4I39NetTaxable=</div>	
            <div>frm1702EX:txtPg2Pt4I41TotalIncome=".request('frm1702EX:txtPg2Pt4I41TotalIncome')."frm1702EX:txtPg2Pt4I41TotalIncome=</div>	
            <div>frm1702EX:txtPg2Pt5I42RegularIncome=".request('frm1702EX:txtPg2Pt5I42RegularIncome')."frm1702EX:txtPg2Pt5I42RegularIncome=</div>	
            <div>frm1702EX:txtPg2Pt5I43SpecialAllowable=".request('frm1702EX:txtPg2Pt5I43SpecialAllowable')."frm1702EX:txtPg2Pt5I43SpecialAllowable=</div>	
            <div>frm1702EX:txtPg2Pt5I44TotalTax=".request('frm1702EX:txtPg2Pt5I44TotalTax')."frm1702EX:txtPg2Pt5I44TotalTax=</div>	
            <div>frm1702EX:txtPg2Pt6I45NameofExternalAuditor=".request('frm1702EX:txtPg2Pt6I45NameofExternalAuditor')."frm1702EX:txtPg2Pt6I45NameofExternalAuditor=</div>	
            <div>frm1702EX:txtPg2Pt6I46TinC1=".request('frm1702EX:txtPg2Pt6I46TinC1')."frm1702EX:txtPg2Pt6I46TinC1=</div>	
            <div>frm1702EX:txtPg2Pt6I46TinC2=".request('frm1702EX:txtPg2Pt6I46TinC2')."frm1702EX:txtPg2Pt6I46TinC2=</div>	
            <div>frm1702EX:txtPg2Pt6I46TinC3=".request('frm1702EX:txtPg2Pt6I46TinC3')."frm1702EX:txtPg2Pt6I46TinC3=</div>	
            <div>frm1702EX:txtPg2Pt6I46TinC4=".request('frm1702EX:txtPg2Pt6I46TinC4')."frm1702EX:txtPg2Pt6I46TinC4=</div>	
            <div>frm1702EX:txtPg2Pt6I47NameofSigningPartner=".request('frm1702EX:txtPg2Pt6I47NameofSigningPartner')."frm1702EX:txtPg2Pt6I47NameofSigningPartner=</div>	
            <div>frm1702EX:txtPg2Pt6I48TinC1=".request('frm1702EX:txtPg2Pt6I48TinC1')."frm1702EX:txtPg2Pt6I48TinC1=</div>	
            <div>frm1702EX:txtPg2Pt6I48TinC2=".request('frm1702EX:txtPg2Pt6I48TinC2')."frm1702EX:txtPg2Pt6I48TinC2=</div>	
            <div>frm1702EX:txtPg2Pt6I48TinC3=".request('frm1702EX:txtPg2Pt6I48TinC3')."frm1702EX:txtPg2Pt6I48TinC3=</div>	
            <div>frm1702EX:txtPg2Pt6I48TinC4=".request('frm1702EX:txtPg2Pt6I48TinC4')."frm1702EX:txtPg2Pt6I48TinC4=</div>	
            <div>frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1=".request('frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1')."frm1702EX:txtPg2Pt6I49BIRAccreditedNoC1=</div>	
            <div>frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2=".request('frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2')."frm1702EX:txtPg2Pt6I49BIRAccreditedNoC2=</div>	
            <div>frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3=".request('frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3')."frm1702EX:txtPg2Pt6I49BIRAccreditedNoC3=</div>	
            <div>frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4=".request('frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4')."frm1702EX:txtPg2Pt6I49BIRAccreditedNoC4=</div>	
            <div>frm1702EX:txtPg2Pt6I50IssueDate=".request('frm1702EX:txtPg2Pt6I50IssueDate')."frm1702EX:txtPg2Pt6I50IssueDate=</div>	
            <div>frm1702EX:txtPg2Pt6I51ExpiryDate=".request('frm1702EX:txtPg2Pt6I51ExpiryDate')."frm1702EX:txtPg2Pt6I51ExpiryDate=</div>	
            <div>frm1702EX:txtPg3TinC1=".request('frm1702EX:TIN1')."frm1702EX:txtPg3TinC1=</div>	
            <div>frm1702EX:txtPg3TinC2=".request('frm1702EX:TIN2')."frm1702EX:txtPg3TinC2=</div>	
            <div>frm1702EX:txtPg3TinC3=".request('frm1702EX:TIN3')."frm1702EX:txtPg3TinC3=</div>	
            <div>frm1702EX:txtPg3TinC4=".request('frm1702EX:TIN4')."frm1702EX:txtPg3TinC4=</div>	
            <div>BranchMask3=".request('BranchMask3')."BranchMask3=</div>	
            <div>frm1702EX:txtPg3RegisteredName=".request('frm1702EX:RegName')."frm1702EX:txtPg3RegisteredName=</div>	
            <div>frm1702EX:txtPg3S1I1GoodsProp=".request('frm1702EX:txtPg3S1I1GoodsProp')."frm1702EX:txtPg3S1I1GoodsProp=</div>	
            <div>frm1702EX:txtPg3S1I2SaleServices=".request('frm1702EX:txtPg3S1I2SaleServices')."frm1702EX:txtPg3S1I2SaleServices=</div>	
            <div>frm1702EX:txtPg3S1I3LeaseProp=".request('frm1702EX:txtPg3S1I3LeaseProp')."frm1702EX:txtPg3S1I3LeaseProp=</div>	
            <div>frm1702EX:txtPg3S1I4Total=".request('frm1702EX:txtPg3S1I4Total')."frm1702EX:txtPg3S1I4Total=</div>	
            <div>frm1702EX:txtPg3S1I5LessSales=".request('frm1702EX:txtPg3S1I5LessSales')."frm1702EX:txtPg3S1I5LessSales=</div>	
            <div>frm1702EX:txtPg3S1I6NetSales=".request('frm1702EX:txtPg3S1I6NetSales')."frm1702EX:txtPg3S1I6NetSales=</div>	
            <div>frm1702EX:txtPg3S2I1MerchInventory=".request('frm1702EX:txtPg3S2I1MerchInventory')."frm1702EX:txtPg3S2I1MerchInventory=</div>	
            <div>frm1702EX:txtPg3S2I2AddPurchases=".request('frm1702EX:txtPg3S2I2AddPurchases')."frm1702EX:txtPg3S2I2AddPurchases=</div>	
            <div>frm1702EX:txtPg3S2I3TotalGoods=".request('frm1702EX:txtPg3S2I3TotalGoods')."frm1702EX:txtPg3S2I3TotalGoods=</div>	
            <div>frm1702EX:txtPg3S2I4LessMerch=".request('frm1702EX:txtPg3S2I4LessMerch')."frm1702EX:txtPg3S2I4LessMerch=</div>	
            <div>frm1702EX:txtPg3S2I5CostSales=".request('frm1702EX:txtPg3S2I5CostSales')."frm1702EX:txtPg3S2I5CostSales=</div>	
            <div>frm1702EX:txtPg3S2I6DirectMaterials=".request('frm1702EX:txtPg3S2I6DirectMaterials')."frm1702EX:txtPg3S2I6DirectMaterials=</div>	
            <div>frm1702EX:txtPg3S2I7AddPurchases=".request('frm1702EX:txtPg3S2I7AddPurchases')."frm1702EX:txtPg3S2I7AddPurchases=</div>	
            <div>frm1702EX:txtPg3S2I8MaterialsAvailable=".request('frm1702EX:txtPg3S2I8MaterialsAvailable')."frm1702EX:txtPg3S2I8MaterialsAvailable=</div>	
            <div>frm1702EX:txtPg3S2I9DirectMaterials=".request('frm1702EX:txtPg3S2I9DirectMaterials')."frm1702EX:txtPg3S2I9DirectMaterials=</div>	
            <div>frm1702EX:txtPg3S2I10RawMaterials=".request('frm1702EX:txtPg3S2I10RawMaterials')."frm1702EX:txtPg3S2I10RawMaterials=</div>	
            <div>frm1702EX:txtPg3S2I11DirectLabor=".request('frm1702EX:txtPg3S2I11DirectLabor')."frm1702EX:txtPg3S2I11DirectLabor=</div>	
            <div>frm1702EX:txtPg3S2I12ManOverhead=".request('frm1702EX:txtPg3S2I12ManOverhead')."frm1702EX:txtPg3S2I12ManOverhead=</div>	
            <div>frm1702EX:txtPg3S2I13TotalMan=".request('frm1702EX:txtPg3S2I13TotalMan')."frm1702EX:txtPg3S2I13TotalMan=</div>	
            <div>frm1702EX:txtPg3S2I14WorkProcess=".request('frm1702EX:txtPg3S2I14WorkProcess')."frm1702EX:txtPg3S2I14WorkProcess=</div>	
            <div>frm1702EX:txtPg3S2I15LessWork=".request('frm1702EX:txtPg3S2I15LessWork')."frm1702EX:txtPg3S2I15LessWork=</div>	
            <div>frm1702EX:txtPg3S2I16CostOfGoods=".request('frm1702EX:txtPg3S2I16CostOfGoods')."frm1702EX:txtPg3S2I16CostOfGoods=</div>	
            <div>frm1702EX:txtPg3S2I17FinishedGoods=".request('frm1702EX:txtPg3S2I17FinishedGoods')."frm1702EX:txtPg3S2I17FinishedGoods=</div>	
            <div>frm1702EX:txtPg3S2I18LessFinished=".request('frm1702EX:txtPg3S2I18LessFinished')."frm1702EX:txtPg3S2I18LessFinished=</div>	
            <div>frm1702EX:txtPg3S2I19GoodsManAndSold=".request('frm1702EX:txtPg3S2I19GoodsManAndSold')."frm1702EX:txtPg3S2I19GoodsManAndSold=</div>	
            <div>frm1702EX:txtPg3S2I20DirectWage=".request('frm1702EX:txtPg3S2I20DirectWage')."frm1702EX:txtPg3S2I20DirectWage=</div>	
            <div>frm1702EX:txtPg3S2I21DirectMaterials=".request('frm1702EX:txtPg3S2I21DirectMaterials')."frm1702EX:txtPg3S2I21DirectMaterials=</div>	
            <div>frm1702EX:txtPg3S2I22DirectDepreciation=".request('frm1702EX:txtPg3S2I22DirectDepreciation')."frm1702EX:txtPg3S2I22DirectDepreciation=</div>	
            <div>frm1702EX:txtPg3S2I23DirectRental=".request('frm1702EX:txtPg3S2I23DirectRental')."frm1702EX:txtPg3S2I23DirectRental=</div>	
            <div>frm1702EX:txtPg3S2I24DirectOutside=".request('frm1702EX:txtPg3S2I24DirectOutside')."frm1702EX:txtPg3S2I24DirectOutside=</div>	
            <div>frm1702EX:txtPg3S2I25DirectOthers=".request('frm1702EX:txtPg3S2I25DirectOthers')."frm1702EX:txtPg3S2I25DirectOthers=</div>	
            <div>frm1702EX:txtPg3S2I26TotalCostServices=".request('frm1702EX:txtPg3S2I26TotalCostServices')."frm1702EX:txtPg3S2I26TotalCostServices=</div>	
            <div>frm1702EX:txtPg3S2I27TotalCostSales=".request('frm1702EX:txtPg3S2I27TotalCostSales')."frm1702EX:txtPg3S2I27TotalCostSales=</div>	
            <div>frm1702EX:txtPg4TinC1=".request('frm1702EX:TIN1')."frm1702EX:txtPg4TinC1=</div>	
            <div>frm1702EX:txtPg4TinC2=".request('frm1702EX:TIN2')."frm1702EX:txtPg4TinC2=</div>	
            <div>frm1702EX:txtPg4TinC3=".request('frm1702EX:TIN3')."frm1702EX:txtPg4TinC3=</div>	
            <div>frm1702EX:txtPg4TinC4=".request('frm1702EX:TIN4')."frm1702EX:txtPg4TinC4=</div>	
            <div>BranchMask4=".request('BranchMask4')."BranchMask4=</div>	
            <div>frm1702EX:txtPg4RegisteredName=".request('frm1702EX:RegName')."frm1702EX:txtPg4RegisteredName=</div>	
            <div>frm1702EX:txtPg4S3I1Col1=".request('frm1702EX:txtPg4S3I1Col1')."frm1702EX:txtPg4S3I1Col1=</div>	
            <div>frm1702EX:txtPg4S3I1Col2=".request('frm1702EX:txtPg4S3I1Col2')."frm1702EX:txtPg4S3I1Col2=</div>	
            <div>frm1702EX:txtPg4S3I2Col1=".request('frm1702EX:txtPg4S3I2Col1')."frm1702EX:txtPg4S3I2Col1=</div>	
            <div>frm1702EX:txtPg4S3I2Col2=".request('frm1702EX:txtPg4S3I2Col2')."frm1702EX:txtPg4S3I2Col2=</div>	
            <div>frm1702EX:txtPg4S3I3Col1=".request('frm1702EX:txtPg4S3I3Col1')."frm1702EX:txtPg4S3I3Col1=</div>	
            <div>frm1702EX:txtPg4S3I3Col2=".request('frm1702EX:txtPg4S3I3Col2')."frm1702EX:txtPg4S3I3Col2=</div>	
            <div>frm1702EX:txtPg4S3I4TotalTaxIncome=".request('frm1702EX:txtPg4S3I4TotalTaxIncome')."frm1702EX:txtPg4S3I4TotalTaxIncome=</div>	
            <div>frm1702EX:txtPg4S4I1AdsAndPromotions=".request('frm1702EX:txtPg4S4I1AdsAndPromotions')."frm1702EX:txtPg4S4I1AdsAndPromotions=</div>	
            <div>frm1702EX:txtPg4S4I2Col1=".request('frm1702EX:txtPg4S4I2Col1')."frm1702EX:txtPg4S4I2Col1=</div>	
            <div>frm1702EX:txtPg4S4I2Col2=".request('frm1702EX:txtPg4S4I2Col2')."frm1702EX:txtPg4S4I2Col2=</div>	
            <div>frm1702EX:txtPg4S4I3Col1=".request('frm1702EX:txtPg4S4I3Col1')."frm1702EX:txtPg4S4I3Col1=</div>	
            <div>frm1702EX:txtPg4S4I3Col2=".request('frm1702EX:txtPg4S4I3Col2')."frm1702EX:txtPg4S4I3Col2=</div>	
            <div>frm1702EX:txtPg4S4I4Col1=".request('frm1702EX:txtPg4S4I4Col1')."frm1702EX:txtPg4S4I4Col1=</div>	
            <div>frm1702EX:txtPg4S4I4Col2=".request('frm1702EX:txtPg4S4I4Col2')."frm1702EX:txtPg4S4I4Col2=</div>	
            <div>frm1702EX:txtPg4S4I5BadDebts=".request('frm1702EX:txtPg4S4I5BadDebts')."frm1702EX:txtPg4S4I5BadDebts=</div>	
            <div>frm1702EX:txtPg4S4I6CharitableContri=".request('frm1702EX:txtPg4S4I6CharitableContri')."frm1702EX:txtPg4S4I6CharitableContri=</div>	
            <div>frm1702EX:txtPg4S4I7Commissions=".request('frm1702EX:txtPg4S4I7Commissions')."frm1702EX:txtPg4S4I7Commissions=</div>	
            <div>frm1702EX:txtPg4S4I8Communication=".request('frm1702EX:txtPg4S4I8Communication')."frm1702EX:txtPg4S4I8Communication=</div>	
            <div>frm1702EX:txtPg4S4I9Depletion=".request('frm1702EX:txtPg4S4I9Depletion')."frm1702EX:txtPg4S4I9Depletion=</div>	
            <div>frm1702EX:txtPg4S4I10Depreciation=".request('frm1702EX:txtPg4S4I10Depreciation')."frm1702EX:txtPg4S4I10Depreciation=</div>	
            <div>frm1702EX:txtPg4S4I11DirectorFees=".request('frm1702EX:txtPg4S4I11DirectorFees')."frm1702EX:txtPg4S4I11DirectorFees=</div>	
            <div>frm1702EX:txtPg4S4I12FringeBenefits=".request('frm1702EX:txtPg4S4I12FringeBenefits')."frm1702EX:txtPg4S4I12FringeBenefits=</div>	
            <div>frm1702EX:txtPg4S4I13FuelAndOil=".request('frm1702EX:txtPg4S4I13FuelAndOil')."frm1702EX:txtPg4S4I13FuelAndOil=</div>	
            <div>frm1702EX:txtPg4S4I14Insurance=".request('frm1702EX:txtPg4S4I14Insurance')."frm1702EX:txtPg4S4I14Insurance=</div>	
            <div>frm1702EX:txtPg4S4I15Interest=".request('frm1702EX:txtPg4S4I15Interest')."frm1702EX:txtPg4S4I15Interest=</div>	
            <div>frm1702EX:txtPg4S4I16Janitorial=".request('frm1702EX:txtPg4S4I16Janitorial')."frm1702EX:txtPg4S4I16Janitorial=</div>	
            <div>frm1702EX:txtPg4S4I17Losses=".request('frm1702EX:txtPg4S4I17Losses')."frm1702EX:txtPg4S4I17Losses=</div>	
            <div>frm1702EX:txtPg4S4I18Management=".request('frm1702EX:txtPg4S4I18Management')."frm1702EX:txtPg4S4I18Management=</div>	
            <div>frm1702EX:txtPg4S4I19Insurance=".request('frm1702EX:txtPg4S4I19Insurance')."frm1702EX:txtPg4S4I19Insurance=</div>	
            <div>frm1702EX:txtPg4S4I20OfficeSupplies=".request('frm1702EX:txtPg4S4I20OfficeSupplies')."frm1702EX:txtPg4S4I20OfficeSupplies=</div>	
            <div>frm1702EX:txtPg4S4I21OtherServices=".request('frm1702EX:txtPg4S4I21OtherServices')."frm1702EX:txtPg4S4I21OtherServices=</div>	
            <div>frm1702EX:txtPg4S4I22PersonalFees=".request('frm1702EX:txtPg4S4I22PersonalFees')."frm1702EX:txtPg4S4I22PersonalFees=</div>	
            <div>frm1702EX:txtPg4S4I23Rental=".request('frm1702EX:txtPg4S4I23Rental')."frm1702EX:txtPg4S4I23Rental=</div>	
            <div>frm1702EX:txtPg4S4I24RepairLabor=".request('frm1702EX:txtPg4S4I24RepairLabor')."frm1702EX:txtPg4S4I24RepairLabor=</div>	
            <div>frm1702EX:txtPg4S4I25RepairMaterials=".request('frm1702EX:txtPg4S4I25RepairMaterials')."frm1702EX:txtPg4S4I25RepairMaterials=</div>	
            <div>frm1702EX:txtPg4S4I26Representation=".request('frm1702EX:txtPg4S4I26Representation')."frm1702EX:txtPg4S4I26Representation=</div>	
            <div>frm1702EX:txtPg4S4I27Research=".request('frm1702EX:txtPg4S4I27Research')."frm1702EX:txtPg4S4I27Research=</div>	
            <div>frm1702EX:txtPg4S4I28Royalties=".request('frm1702EX:txtPg4S4I28Royalties')."frm1702EX:txtPg4S4I28Royalties=</div>	
            <div>frm1702EX:txtPg4S4I29Salaries=".request('frm1702EX:txtPg4S4I29Salaries')."frm1702EX:txtPg4S4I29Salaries=</div>	
            <div>frm1702EX:txtPg5TinC1=".request('frm1702EX:TIN1')."frm1702EX:txtPg5TinC1=</div>	
            <div>frm1702EX:txtPg5TinC2=".request('frm1702EX:TIN2')."frm1702EX:txtPg5TinC2=</div>	
            <div>frm1702EX:txtPg5TinC3=".request('frm1702EX:TIN3')."frm1702EX:txtPg5TinC3=</div>	
            <div>frm1702EX:txtPg5TinC4=".request('frm1702EX:TIN4')."frm1702EX:txtPg5TinC4=</div>	
            <div>BranchMask5=".request('BranchMask5')."BranchMask5=</div>	
            <div>frm1702EX:txtPg5RegisteredName=".request('frm1702EX:RegName')."frm1702EX:txtPg5RegisteredName=</div>	
            <div>frm1702EX:txtPg5S4I30SecurityServices=".request('frm1702EX:txtPg5S4I30SecurityServices')."frm1702EX:txtPg5S4I30SecurityServices=</div>	
            <div>frm1702EX:txtPg5S4I31SSS=".request('frm1702EX:txtPg5S4I31SSS')."frm1702EX:txtPg5S4I31SSS=</div>	
            <div>frm1702EX:txtPg5S4I32TaxesAndLicense=".request('frm1702EX:txtPg5S4I32TaxesAndLicense')."frm1702EX:txtPg5S4I32TaxesAndLicense=</div>	
            <div>frm1702EX:txtPg5S4I33TollingFees=".request('frm1702EX:txtPg5S4I33TollingFees')."frm1702EX:txtPg5S4I33TollingFees=</div>	
            <div>frm1702EX:txtPg5S4I34Training=".request('frm1702EX:txtPg5S4I34Training')."frm1702EX:txtPg5S4I34Training=</div>	
            <div>frm1702EX:txtPg5S4I35Transportation=".request('frm1702EX:txtPg5S4I35Transportation')."frm1702EX:txtPg5S4I35Transportation=</div>	
            <div>frm1702EX:txtPg5S4I36Col1=".request('frm1702EX:txtPg5S4I36Col1')."frm1702EX:txtPg5S4I36Col1=</div>	
            <div>frm1702EX:txtPg5S4I36Col2=".request('frm1702EX:txtPg5S4I36Col2')."frm1702EX:txtPg5S4I36Col2=</div>	
            <div>frm1702EX:txtPg5S4I37Col1=".request('frm1702EX:txtPg5S4I37Col1')."frm1702EX:txtPg5S4I37Col1=</div>	
            <div>frm1702EX:txtPg5S4I37Col2=".request('frm1702EX:txtPg5S4I37Col2')."frm1702EX:txtPg5S4I37Col2=</div>	
            <div>frm1702EX:txtPg5S4I38Col1=".request('frm1702EX:txtPg5S4I38Col1')."frm1702EX:txtPg5S4I38Col1=</div>	
            <div>frm1702EX:txtPg5S4I38Col2=".request('frm1702EX:txtPg5S4I38Col2')."frm1702EX:txtPg5S4I38Col2=</div>	
            <div>frm1702EX:txtPg5S4I39Col1=".request('frm1702EX:txtPg5S4I39Col1')."frm1702EX:txtPg5S4I39Col1=</div>	
            <div>frm1702EX:txtPg5S4I39Col2=".request('frm1702EX:txtPg5S4I39Col2')."frm1702EX:txtPg5S4I39Col2=</div>	
            <div>frm1702EX:txtPg5S4I40TotalAllowableDeduction=".request('frm1702EX:txtPg5S4I40TotalAllowableDeduction')."frm1702EX:txtPg5S4I40TotalAllowableDeduction=</div>	
            <div>frm1702EX:txtPg5S5I1Col1=".request('frm1702EX:txtPg5S5I1Col1')."frm1702EX:txtPg5S5I1Col1=</div>	
            <div>frm1702EX:txtPg5S5I1Col2=".request('frm1702EX:txtPg5S5I1Col2')."frm1702EX:txtPg5S5I1Col2=</div>	
            <div>frm1702EX:txtPg5S5I1Col3=".request('frm1702EX:txtPg5S5I1Col3')."frm1702EX:txtPg5S5I1Col3=</div>	
            <div>frm1702EX:txtPg5S5I2Col1=".request('frm1702EX:txtPg5S5I2Col1')."frm1702EX:txtPg5S5I2Col1=</div>	
            <div>frm1702EX:txtPg5S5I2Col2=".request('frm1702EX:txtPg5S5I2Col2')."frm1702EX:txtPg5S5I2Col2=</div>	
            <div>frm1702EX:txtPg5S5I2Col3=".request('frm1702EX:txtPg5S5I2Col3')."frm1702EX:txtPg5S5I2Col3=</div>	
            <div>frm1702EX:txtPg5S5I3Col1=".request('frm1702EX:txtPg5S5I3Col1')."frm1702EX:txtPg5S5I3Col1=</div>	
            <div>frm1702EX:txtPg5S5I3Col2=".request('frm1702EX:txtPg5S5I3Col2')."frm1702EX:txtPg5S5I3Col2=</div>	
            <div>frm1702EX:txtPg5S5I3Col3=".request('frm1702EX:txtPg5S5I3Col3')."frm1702EX:txtPg5S5I3Col3=</div>	
            <div>frm1702EX:txtPg5S5I4Col1=".request('frm1702EX:txtPg5S5I4Col1')."frm1702EX:txtPg5S5I4Col1=</div>	
            <div>frm1702EX:txtPg5S5I4Col2=".request('frm1702EX:txtPg5S5I4Col2')."frm1702EX:txtPg5S5I4Col2=</div>	
            <div>frm1702EX:txtPg5S5I4Col3=".request('frm1702EX:txtPg5S5I4Col3')."frm1702EX:txtPg5S5I4Col3=</div>	
            <div>frm1702EX:txtPg5S5I5TotalAllowable=".request('frm1702EX:txtPg5S5I5TotalAllowable')."frm1702EX:txtPg5S5I5TotalAllowable=</div>	
            <div>frm1702EX:txtPg5S6I1NetIncomeLoss=".request('frm1702EX:txtPg5S6I1NetIncomeLoss')."frm1702EX:txtPg5S6I1NetIncomeLoss=</div>	
            <div>frm1702EX:txtPg5S6I2Col1=".request('frm1702EX:txtPg5S6I2Col1')."frm1702EX:txtPg5S6I2Col1=</div>	
            <div>frm1702EX:txtPg5S6I2Col2=".request('frm1702EX:txtPg5S6I2Col2')."frm1702EX:txtPg5S6I2Col2=</div>	
            <div>frm1702EX:txtPg5S6I3Col1=".request('frm1702EX:txtPg5S6I3Col1')."frm1702EX:txtPg5S6I3Col1=</div>	
            <div>frm1702EX:txtPg5S6I3Col2=".request('frm1702EX:txtPg5S6I3Col2')."frm1702EX:txtPg5S6I3Col2=</div>	
            <div>frm1702EX:txtPg5S6I4Total=".request('frm1702EX:txtPg5S6I4Total')."frm1702EX:txtPg5S6I4Total=</div>	
            <div>frm1702EX:txtPg5S6I5Col1=".request('frm1702EX:txtPg5S6I5Col1')."frm1702EX:txtPg5S6I5Col1=</div>	
            <div>frm1702EX:txtPg5S6I5Col2=".request('frm1702EX:txtPg5S6I5Col2')."frm1702EX:txtPg5S6I5Col2=</div>	
            <div>frm1702EX:txtPg5S6I6Col1=".request('frm1702EX:txtPg5S6I6Col1')."frm1702EX:txtPg5S6I6Col1=</div>	
            <div>frm1702EX:txtPg5S6I6Col2=".request('frm1702EX:txtPg5S6I6Col2')."frm1702EX:txtPg5S6I6Col2=</div>	
            <div>frm1702EX:txtPg5S6I7Col1=".request('frm1702EX:txtPg5S6I7Col1')."frm1702EX:txtPg5S6I7Col1=</div>	
            <div>frm1702EX:txtPg5S6I7Col2=".request('frm1702EX:txtPg5S6I7Col2')."frm1702EX:txtPg5S6I7Col2=</div>	
            <div>frm1702EX:txtPg5S6I8Col1=".request('frm1702EX:txtPg5S6I8Col1')."frm1702EX:txtPg5S6I8Col1=</div>	
            <div>frm1702EX:txtPg5S6I8Col2=".request('frm1702EX:txtPg5S6I8Col2')."frm1702EX:txtPg5S6I8Col2=</div>	
            <div>frm1702EX:txtPg5S6I9Col2=".request('frm1702EX:txtPg5S6I9Col2')."frm1702EX:txtPg5S6I9Col2=</div>	
            <div>frm1702EX:txtPg5S6I10NetTaxable=".$netTaxable."frm1702EX:txtPg5S6I10NetTaxable=</div>	
            <div>frm1702EX:txtPg6TinC1=".request('frm1702EX:TIN1')."frm1702EX:txtPg6TinC1=</div>	
            <div>frm1702EX:txtPg6TinC2=".request('frm1702EX:TIN2')."frm1702EX:txtPg6TinC2=</div>	
            <div>frm1702EX:txtPg6TinC3=".request('frm1702EX:TIN3')."frm1702EX:txtPg6TinC3=</div>	
            <div>frm1702EX:txtPg6TinC4=".request('frm1702EX:TIN4')."frm1702EX:txtPg6TinC4=</div>	
            <div>BranchMask6=".request('BranchMask6')."BranchMask6=</div>	
            <div>frm1702EX:txtPg6RegisteredName=".request('frm1702EX:RegName')."frm1702EX:txtPg6RegisteredName=</div>	
            <div>frm1702EX:txtPg6S7I1CurrentAssets=".request('frm1702EX:txtPg6S7I1CurrentAssets')."frm1702EX:txtPg6S7I1CurrentAssets=</div>	
            <div>frm1702EX:txtPg6S7I2LongInvestment=".request('frm1702EX:txtPg6S7I2LongInvestment')."frm1702EX:txtPg6S7I2LongInvestment=</div>	
            <div>frm1702EX:txtPg6S7I3Property=".request('frm1702EX:txtPg6S7I3Property')."frm1702EX:txtPg6S7I3Property=</div>	
            <div>frm1702EX:txtPg6S7I4LongReceivables=".request('frm1702EX:txtPg6S7I4LongReceivables')."frm1702EX:txtPg6S7I4LongReceivables=</div>	
            <div>frm1702EX:txtPg6S7I5IntangibleAssets=".request('frm1702EX:txtPg6S7I5IntangibleAssets')."frm1702EX:txtPg6S7I5IntangibleAssets=</div>	
            <div>frm1702EX:txtPg6S7I6OtherAssets=".request('frm1702EX:txtPg6S7I6OtherAssets')."frm1702EX:txtPg6S7I6OtherAssets=</div>	
            <div>frm1702EX:txtPg6S7I7TotalAssets=".request('frm1702EX:txtPg6S7I7TotalAssets')."frm1702EX:txtPg6S7I7TotalAssets=</div>	
            <div>frm1702EX:txtPg6S7I8CurrentLiabilities=".request('frm1702EX:txtPg6S7I8CurrentLiabilities')."frm1702EX:txtPg6S7I8CurrentLiabilities=</div>	
            <div>frm1702EX:txtPg6S7I9LongLiabilities=".request('frm1702EX:txtPg6S7I9LongLiabilities')."frm1702EX:txtPg6S7I9LongLiabilities=</div>	
            <div>frm1702EX:txtPg6S7I10DefferedCredits=".request('frm1702EX:txtPg6S7I10DefferedCredits')."frm1702EX:txtPg6S7I10DefferedCredits=</div>	
            <div>frm1702EX:txtPg6S7I11OtherLiablities=".request('frm1702EX:txtPg6S7I11OtherLiablities')."frm1702EX:txtPg6S7I11OtherLiablities=</div>	
            <div>frm1702EX:txtPg6S7I12TotalLiabilities=".request('frm1702EX:txtPg6S7I12TotalLiabilities')."frm1702EX:txtPg6S7I12TotalLiabilities=</div>	
            <div>frm1702EX:txtPg6S7I13CapitalStock=".request('frm1702EX:txtPg6S7I13CapitalStock')."frm1702EX:txtPg6S7I13CapitalStock=</div>	
            <div>frm1702EX:txtPg6S7I14AdditionalCapital=".request('frm1702EX:txtPg6S7I14AdditionalCapital')."frm1702EX:txtPg6S7I14AdditionalCapital=</div>	
            <div>frm1702EX:txtPg6S7I15RetainedEarnings=".request('frm1702EX:txtPg6S7I15RetainedEarnings')."frm1702EX:txtPg6S7I15RetainedEarnings=</div>	
            <div>frm1702EX:txtPg6S7I16TotalEquity=".request('frm1702EX:txtPg6S7I16TotalEquity')."frm1702EX:txtPg6S7I16TotalEquity=</div>	
            <div>frm1702EX:txtPg6S7I17LiabilitiesAndEquity=".request('frm1702EX:txtPg6S7I17LiabilitiesAndEquity')."frm1702EX:txtPg6S7I17LiabilitiesAndEquity=</div>	
            <div>frm1702EX:chkPg6S8StockHolders=".$chkPg6S8StockHolders."frm1702EX:chkPg6S8StockHolders=</div>	
            <div>frm1702EX:chkPg6S8Partners=".$chkPg6S8Partners."frm1702EX:chkPg6S8Partners=</div>	
            <div>frm1702EX:chkPg6S8MembersInfo=".$chkPg6S8MembersInfo."frm1702EX:chkPg6S8MembersInfo=</div>	
            <div>frm1702EX:txtPg6S8I1Col1Name=".request('frm1702EX:txtPg6S8I1Col1Name')."frm1702EX:txtPg6S8I1Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I1Col2TIN1=".request('frm1702EX:txtPg6S8I1Col2TIN1')."frm1702EX:txtPg6S8I1Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I1Col2TIN2=".request('frm1702EX:txtPg6S8I1Col2TIN2')."frm1702EX:txtPg6S8I1Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I1Col2TIN3=".request('frm1702EX:txtPg6S8I1Col2TIN3')."frm1702EX:txtPg6S8I1Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I1Col2TIN4=".request('frm1702EX:txtPg6S8I1Col2TIN4')."frm1702EX:txtPg6S8I1Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I1Col3CapContri=".request('frm1702EX:txtPg6S8I1Col3CapContri')."frm1702EX:txtPg6S8I1Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I1Col4PTotal=".request('frm1702EX:txtPg6S8I1Col4PTotal')."frm1702EX:txtPg6S8I1Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I2Col1Name=".request('frm1702EX:txtPg6S8I2Col1Name')."frm1702EX:txtPg6S8I2Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I2Col2TIN1=".request('frm1702EX:txtPg6S8I2Col2TIN1')."frm1702EX:txtPg6S8I2Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I2Col2TIN2=".request('frm1702EX:txtPg6S8I2Col2TIN2')."frm1702EX:txtPg6S8I2Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I2Col2TIN3=".request('frm1702EX:txtPg6S8I2Col2TIN3')."frm1702EX:txtPg6S8I2Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I2Col2TIN4=".request('frm1702EX:txtPg6S8I2Col2TIN4')."frm1702EX:txtPg6S8I2Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I2Col3CapContri=".request('frm1702EX:txtPg6S8I2Col3CapContri')."frm1702EX:txtPg6S8I2Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I2Col4PTotal=".request('frm1702EX:txtPg6S8I2Col4PTotal')."frm1702EX:txtPg6S8I2Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I3Col1Name=".request('frm1702EX:txtPg6S8I3Col1Name')."frm1702EX:txtPg6S8I3Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I3Col2TIN1=".request('frm1702EX:txtPg6S8I3Col2TIN1')."frm1702EX:txtPg6S8I3Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I3Col2TIN2=".request('frm1702EX:txtPg6S8I3Col2TIN2')."frm1702EX:txtPg6S8I3Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I3Col2TIN3=".request('frm1702EX:txtPg6S8I3Col2TIN3')."frm1702EX:txtPg6S8I3Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I3Col2TIN4=".request('frm1702EX:txtPg6S8I3Col2TIN4')."frm1702EX:txtPg6S8I3Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I3Col3CapContri=".request('frm1702EX:txtPg6S8I3Col3CapContri')."frm1702EX:txtPg6S8I3Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I3Col4PTotal=".request('frm1702EX:txtPg6S8I3Col4PTotal')."frm1702EX:txtPg6S8I3Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I4Col1Name=".request('frm1702EX:txtPg6S8I4Col1Name')."frm1702EX:txtPg6S8I4Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I4Col2TIN1=".request('frm1702EX:txtPg6S8I4Col2TIN1')."frm1702EX:txtPg6S8I4Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I4Col2TIN2=".request('frm1702EX:txtPg6S8I4Col2TIN2')."frm1702EX:txtPg6S8I4Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I4Col2TIN3=".request('frm1702EX:txtPg6S8I4Col2TIN3')."frm1702EX:txtPg6S8I4Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I4Col2TIN4=".request('frm1702EX:txtPg6S8I4Col2TIN4')."frm1702EX:txtPg6S8I4Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I4Col3CapContri=".request('frm1702EX:txtPg6S8I4Col3CapContri')."frm1702EX:txtPg6S8I4Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I4Col4PTotal=".request('frm1702EX:txtPg6S8I4Col4PTotal')."frm1702EX:txtPg6S8I4Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I5Col1Name=".request('frm1702EX:txtPg6S8I5Col1Name')."frm1702EX:txtPg6S8I5Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I5Col2TIN1=".request('frm1702EX:txtPg6S8I5Col2TIN1')."frm1702EX:txtPg6S8I5Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I5Col2TIN2=".request('frm1702EX:txtPg6S8I5Col2TIN2')."frm1702EX:txtPg6S8I5Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I5Col2TIN3=".request('frm1702EX:txtPg6S8I5Col2TIN3')."frm1702EX:txtPg6S8I5Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I5Col2TIN4=".request('frm1702EX:txtPg6S8I5Col2TIN4')."frm1702EX:txtPg6S8I5Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I5Col3CapContri=".request('frm1702EX:txtPg6S8I5Col3CapContri')."frm1702EX:txtPg6S8I5Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I5Col4PTotal=".request('frm1702EX:txtPg6S8I5Col4PTotal')."frm1702EX:txtPg6S8I5Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I6Col1Name=".request('frm1702EX:txtPg6S8I6Col1Name')."frm1702EX:txtPg6S8I6Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I6Col2TIN1=".request('frm1702EX:txtPg6S8I6Col2TIN1')."frm1702EX:txtPg6S8I6Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I6Col2TIN2=".request('frm1702EX:txtPg6S8I6Col2TIN2')."frm1702EX:txtPg6S8I6Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I6Col2TIN3=".request('frm1702EX:txtPg6S8I6Col2TIN3')."frm1702EX:txtPg6S8I6Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I6Col2TIN4=".request('frm1702EX:txtPg6S8I6Col2TIN4')."frm1702EX:txtPg6S8I6Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I6Col3CapContri=".request('frm1702EX:txtPg6S8I6Col3CapContri')."frm1702EX:txtPg6S8I6Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I6Col4PTotal=".request('frm1702EX:txtPg6S8I6Col4PTotal')."frm1702EX:txtPg6S8I6Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I7Col1Name=".request('frm1702EX:txtPg6S8I7Col1Name')."frm1702EX:txtPg6S8I7Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I7Col2TIN1=".request('frm1702EX:txtPg6S8I7Col2TIN1')."frm1702EX:txtPg6S8I7Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I7Col2TIN2=".request('frm1702EX:txtPg6S8I7Col2TIN2')."frm1702EX:txtPg6S8I7Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I7Col2TIN3=".request('frm1702EX:txtPg6S8I7Col2TIN3')."frm1702EX:txtPg6S8I7Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I7Col2TIN4=".request('frm1702EX:txtPg6S8I7Col2TIN4')."frm1702EX:txtPg6S8I7Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I7Col3CapContri=".request('frm1702EX:txtPg6S8I7Col3CapContri')."frm1702EX:txtPg6S8I7Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I7Col4PTotal=".request('frm1702EX:txtPg6S8I7Col4PTotal')."frm1702EX:txtPg6S8I7Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I8Col1Name=".request('frm1702EX:txtPg6S8I8Col1Name')."frm1702EX:txtPg6S8I8Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I8Col2TIN1=".request('frm1702EX:txtPg6S8I8Col2TIN1')."frm1702EX:txtPg6S8I8Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I8Col2TIN2=".request('frm1702EX:txtPg6S8I8Col2TIN2')."frm1702EX:txtPg6S8I8Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I8Col2TIN3=".request('frm1702EX:txtPg6S8I8Col2TIN3')."frm1702EX:txtPg6S8I8Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I8Col2TIN4=".request('frm1702EX:txtPg6S8I8Col2TIN4')."frm1702EX:txtPg6S8I8Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I8Col3CapContri=".request('frm1702EX:txtPg6S8I8Col3CapContri')."frm1702EX:txtPg6S8I8Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I8Col4PTotal=".request('frm1702EX:txtPg6S8I8Col4PTotal')."frm1702EX:txtPg6S8I8Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I9Col1Name=".request('frm1702EX:txtPg6S8I9Col1Name')."frm1702EX:txtPg6S8I9Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I9Col2TIN1=".request('frm1702EX:txtPg6S8I9Col2TIN1')."frm1702EX:txtPg6S8I9Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I9Col2TIN2=".request('frm1702EX:txtPg6S8I9Col2TIN2')."frm1702EX:txtPg6S8I9Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I9Col2TIN3=".request('frm1702EX:txtPg6S8I9Col2TIN3')."frm1702EX:txtPg6S8I9Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I9Col2TIN4=".request('frm1702EX:txtPg6S8I9Col2TIN4')."frm1702EX:txtPg6S8I9Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I9Col3CapContri=".request('frm1702EX:txtPg6S8I9Col3CapContri')."frm1702EX:txtPg6S8I9Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I9Col4PTotal=".request('frm1702EX:txtPg6S8I9Col4PTotal')."frm1702EX:txtPg6S8I9Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I10Col1Name=".request('frm1702EX:txtPg6S8I10Col1Name')."frm1702EX:txtPg6S8I10Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I10Col2TIN1=".request('frm1702EX:txtPg6S8I10Col2TIN1')."frm1702EX:txtPg6S8I10Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I10Col2TIN2=".request('frm1702EX:txtPg6S8I10Col2TIN2')."frm1702EX:txtPg6S8I10Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I10Col2TIN3=".request('frm1702EX:txtPg6S8I10Col2TIN3')."frm1702EX:txtPg6S8I10Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I10Col2TIN4=".request('frm1702EX:txtPg6S8I10Col2TIN4')."frm1702EX:txtPg6S8I10Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I10Col3CapContri=".request('frm1702EX:txtPg6S8I10Col3CapContri')."frm1702EX:txtPg6S8I10Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I10Col4PTotal=".request('frm1702EX:txtPg6S8I10Col4PTotal')."frm1702EX:txtPg6S8I10Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I11Col1Name=".request('frm1702EX:txtPg6S8I11Col1Name')."frm1702EX:txtPg6S8I11Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I11Col2TIN1=".request('frm1702EX:txtPg6S8I11Col2TIN1')."frm1702EX:txtPg6S8I11Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I11Col2TIN2=".request('frm1702EX:txtPg6S8I11Col2TIN2')."frm1702EX:txtPg6S8I11Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I11Col2TIN3=".request('frm1702EX:txtPg6S8I11Col2TIN3')."frm1702EX:txtPg6S8I11Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I11Col2TIN4=".request('frm1702EX:txtPg6S8I11Col2TIN4')."frm1702EX:txtPg6S8I11Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I11Col3CapContri=".request('frm1702EX:txtPg6S8I11Col3CapContri')."frm1702EX:txtPg6S8I11Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I11Col4PTotal=".request('frm1702EX:txtPg6S8I11Col4PTotal')."frm1702EX:txtPg6S8I11Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I12Col1Name=".request('frm1702EX:txtPg6S8I12Col1Name')."frm1702EX:txtPg6S8I12Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I12Col2TIN1=".request('frm1702EX:txtPg6S8I12Col2TIN1')."frm1702EX:txtPg6S8I12Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I12Col2TIN2=".request('frm1702EX:txtPg6S8I12Col2TIN2')."frm1702EX:txtPg6S8I12Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I12Col2TIN3=".request('frm1702EX:txtPg6S8I12Col2TIN3')."frm1702EX:txtPg6S8I12Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I12Col2TIN4=".request('frm1702EX:txtPg6S8I12Col2TIN4')."frm1702EX:txtPg6S8I12Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I12Col3CapContri=".request('frm1702EX:txtPg6S8I12Col3CapContri')."frm1702EX:txtPg6S8I12Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I12Col4PTotal=".request('frm1702EX:txtPg6S8I12Col4PTotal')."frm1702EX:txtPg6S8I12Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I13Col1Name=".request('frm1702EX:txtPg6S8I13Col1Name')."frm1702EX:txtPg6S8I13Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I13Col2TIN1=".request('frm1702EX:txtPg6S8I13Col2TIN1')."frm1702EX:txtPg6S8I13Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I13Col2TIN2=".request('frm1702EX:txtPg6S8I13Col2TIN2')."frm1702EX:txtPg6S8I13Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I13Col2TIN3=".request('frm1702EX:txtPg6S8I13Col2TIN3')."frm1702EX:txtPg6S8I13Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I13Col2TIN4=".request('frm1702EX:txtPg6S8I13Col2TIN4')."frm1702EX:txtPg6S8I13Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I13Col3CapContri=".request('frm1702EX:txtPg6S8I13Col3CapContri')."frm1702EX:txtPg6S8I13Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I13Col4PTotal=".request('frm1702EX:txtPg6S8I13Col4PTotal')."frm1702EX:txtPg6S8I13Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I14Col1Name=".request('frm1702EX:txtPg6S8I14Col1Name')."frm1702EX:txtPg6S8I14Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I14Col2TIN1=".request('frm1702EX:txtPg6S8I14Col2TIN1')."frm1702EX:txtPg6S8I14Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I14Col2TIN2=".request('frm1702EX:txtPg6S8I14Col2TIN2')."frm1702EX:txtPg6S8I14Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I14Col2TIN3=".request('frm1702EX:txtPg6S8I14Col2TIN3')."frm1702EX:txtPg6S8I14Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I14Col2TIN4=".request('frm1702EX:txtPg6S8I14Col2TIN4')."frm1702EX:txtPg6S8I14Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I14Col3CapContri=".request('frm1702EX:txtPg6S8I14Col3CapContri')."frm1702EX:txtPg6S8I14Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I14Col4PTotal=".request('frm1702EX:txtPg6S8I14Col4PTotal')."frm1702EX:txtPg6S8I14Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I15Col1Name=".request('frm1702EX:txtPg6S8I15Col1Name')."frm1702EX:txtPg6S8I15Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I15Col2TIN1=".request('frm1702EX:txtPg6S8I15Col2TIN1')."frm1702EX:txtPg6S8I15Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I15Col2TIN2=".request('frm1702EX:txtPg6S8I15Col2TIN2')."frm1702EX:txtPg6S8I15Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I15Col2TIN3=".request('frm1702EX:txtPg6S8I15Col2TIN3')."frm1702EX:txtPg6S8I15Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I15Col2TIN4=".request('frm1702EX:txtPg6S8I15Col2TIN4')."frm1702EX:txtPg6S8I15Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I15Col3CapContri=".request('frm1702EX:txtPg6S8I15Col3CapContri')."frm1702EX:txtPg6S8I15Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I15Col4PTotal=".request('frm1702EX:txtPg6S8I15Col4PTotal')."frm1702EX:txtPg6S8I15Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I16Col1Name=".request('frm1702EX:txtPg6S8I16Col1Name')."frm1702EX:txtPg6S8I16Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I16Col2TIN1=".request('frm1702EX:txtPg6S8I16Col2TIN1')."frm1702EX:txtPg6S8I16Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I16Col2TIN2=".request('frm1702EX:txtPg6S8I16Col2TIN2')."frm1702EX:txtPg6S8I16Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I16Col2TIN3=".request('frm1702EX:txtPg6S8I16Col2TIN3')."frm1702EX:txtPg6S8I16Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I16Col2TIN4=".request('frm1702EX:txtPg6S8I16Col2TIN4')."frm1702EX:txtPg6S8I16Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I16Col3CapContri=".request('frm1702EX:txtPg6S8I16Col3CapContri')."frm1702EX:txtPg6S8I16Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I16Col4PTotal=".request('frm1702EX:txtPg6S8I16Col4PTotal')."frm1702EX:txtPg6S8I16Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I17Col1Name=".request('frm1702EX:txtPg6S8I17Col1Name')."frm1702EX:txtPg6S8I17Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I17Col2TIN1=".request('frm1702EX:txtPg6S8I17Col2TIN1')."frm1702EX:txtPg6S8I17Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I17Col2TIN2=".request('frm1702EX:txtPg6S8I17Col2TIN2')."frm1702EX:txtPg6S8I17Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I17Col2TIN3=".request('frm1702EX:txtPg6S8I17Col2TIN3')."frm1702EX:txtPg6S8I17Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I17Col2TIN4=".request('frm1702EX:txtPg6S8I17Col2TIN4')."frm1702EX:txtPg6S8I17Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I17Col3CapContri=".request('frm1702EX:txtPg6S8I17Col3CapContri')."frm1702EX:txtPg6S8I17Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I17Col4PTotal=".request('frm1702EX:txtPg6S8I17Col4PTotal')."frm1702EX:txtPg6S8I17Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I18Col1Name=".request('frm1702EX:txtPg6S8I18Col1Name')."frm1702EX:txtPg6S8I18Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I18Col2TIN1=".request('frm1702EX:txtPg6S8I18Col2TIN1')."frm1702EX:txtPg6S8I18Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I18Col2TIN2=".request('frm1702EX:txtPg6S8I18Col2TIN2')."frm1702EX:txtPg6S8I18Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I18Col2TIN3=".request('frm1702EX:txtPg6S8I18Col2TIN3')."frm1702EX:txtPg6S8I18Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I18Col2TIN4=".request('frm1702EX:txtPg6S8I18Col2TIN4')."frm1702EX:txtPg6S8I18Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I18Col3CapContri=".request('frm1702EX:txtPg6S8I18Col3CapContri')."frm1702EX:txtPg6S8I18Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I18Col4PTotal=".request('frm1702EX:txtPg6S8I18Col4PTotal')."frm1702EX:txtPg6S8I18Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I19Col1Name=".request('frm1702EX:txtPg6S8I19Col1Name')."frm1702EX:txtPg6S8I19Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I19Col2TIN1=".request('frm1702EX:txtPg6S8I19Col2TIN1')."frm1702EX:txtPg6S8I19Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I19Col2TIN2=".request('frm1702EX:txtPg6S8I19Col2TIN2')."frm1702EX:txtPg6S8I19Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I19Col2TIN3=".request('frm1702EX:txtPg6S8I19Col2TIN3')."frm1702EX:txtPg6S8I19Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I19Col2TIN4=".request('frm1702EX:txtPg6S8I19Col2TIN4')."frm1702EX:txtPg6S8I19Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I19Col3CapContri=".request('frm1702EX:txtPg6S8I19Col3CapContri')."frm1702EX:txtPg6S8I19Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I19Col4PTotal=".request('frm1702EX:txtPg6S8I19Col4PTotal')."frm1702EX:txtPg6S8I19Col4PTotal=</div>	
            <div>frm1702EX:txtPg6S8I20Col1Name=".request('frm1702EX:txtPg6S8I20Col1Name')."frm1702EX:txtPg6S8I20Col1Name=</div>	
            <div>frm1702EX:txtPg6S8I20Col2TIN1=".request('frm1702EX:txtPg6S8I20Col2TIN1')."frm1702EX:txtPg6S8I20Col2TIN1=</div>	
            <div>frm1702EX:txtPg6S8I20Col2TIN2=".request('frm1702EX:txtPg6S8I20Col2TIN2')."frm1702EX:txtPg6S8I20Col2TIN2=</div>	
            <div>frm1702EX:txtPg6S8I20Col2TIN3=".request('frm1702EX:txtPg6S8I20Col2TIN3')."frm1702EX:txtPg6S8I20Col2TIN3=</div>	
            <div>frm1702EX:txtPg6S8I20Col2TIN4=".request('frm1702EX:txtPg6S8I20Col2TIN4')."frm1702EX:txtPg6S8I20Col2TIN4=</div>	
            <div>frm1702EX:txtPg6S8I20Col3CapContri=".request('frm1702EX:txtPg6S8I20Col3CapContri')."frm1702EX:txtPg6S8I20Col3CapContri=</div>	
            <div>frm1702EX:txtPg6S8I20Col4PTotal=".request('frm1702EX:txtPg6S8I20Col4PTotal')."frm1702EX:txtPg6S8I20Col4PTotal=</div>	
            <div>frm1702EX:txtPg7TINC1=".request('frm1702EX:TIN1')."frm1702EX:txtPg7TINC1=</div>	
            <div>frm1702EX:txtPg7TINC2=".request('frm1702EX:TIN2')."frm1702EX:txtPg7TINC2=</div>	
            <div>frm1702EX:txtPg7TINC3=".request('frm1702EX:TIN3')."frm1702EX:txtPg7TINC3=</div>	
            <div>frm1702EX:txtPg7TINC4=".request('frm1702EX:TIN4')."frm1702EX:txtPg7TINC4=</div>	
            <div>BranchMask7=".request('BranchMask7')."BranchMask7=</div>	
            <div>frm1702EX:txtPg7RegisteredName=".request('frm1702EX:RegName')."frm1702EX:txtPg7RegisteredName=</div>	
            <div>frm1702EX:txtPg7Sc9I1InterestsC1=".request('frm1702EX:txtPg7Sc9I1InterestsC1')."frm1702EX:txtPg7Sc9I1InterestsC1=</div>	
            <div>frm1702EX:txtPg7Sc9I1InterestsC2=".request('frm1702EX:txtPg7Sc9I1InterestsC2')."frm1702EX:txtPg7Sc9I1InterestsC2=</div>	
            <div>frm1702EX:txtPg7Sc9I1InterestsC3=".request('frm1702EX:txtPg7Sc9I1InterestsC3')."frm1702EX:txtPg7Sc9I1InterestsC3=</div>	
            <div>frm1702EX:txtPg7Sc9I2RoyaltiesC1=".request('frm1702EX:txtPg7Sc9I2RoyaltiesC1')."frm1702EX:txtPg7Sc9I2RoyaltiesC1=</div>	
            <div>frm1702EX:txtPg7Sc9I2RoyaltiesC2=".request('frm1702EX:txtPg7Sc9I2RoyaltiesC2')."frm1702EX:txtPg7Sc9I2RoyaltiesC2=</div>	
            <div>frm1702EX:txtPg7Sc9I2RoyaltiesC3=".request('frm1702EX:txtPg7Sc9I2RoyaltiesC3')."frm1702EX:txtPg7Sc9I2RoyaltiesC3=</div>	
            <div>frm1702EX:txtPg7Sc9I3DividendsC1=".request('frm1702EX:txtPg7Sc9I3DividendsC1')."frm1702EX:txtPg7Sc9I3DividendsC1=</div>	
            <div>frm1702EX:txtPg7Sc9I3DividendsC2=".request('frm1702EX:txtPg7Sc9I3DividendsC2')."frm1702EX:txtPg7Sc9I3DividendsC2=</div>	
            <div>frm1702EX:txtPg7Sc9I3DividendsC3=".request('frm1702EX:txtPg7Sc9I3DividendsC3')."frm1702EX:txtPg7Sc9I3DividendsC3=</div>	
            <div>frm1702EX:txtPg7Sc9I4PrizesC1=".request('frm1702EX:txtPg7Sc9I4PrizesC1')."frm1702EX:txtPg7Sc9I4PrizesC1=</div>	
            <div>frm1702EX:txtPg7Sc9I4PrizesC2=".request('frm1702EX:txtPg7Sc9I4PrizesC2')."frm1702EX:txtPg7Sc9I4PrizesC2=</div>	
            <div>frm1702EX:txtPg7Sc9I4PrizesC3=".request('frm1702EX:txtPg7Sc9I4PrizesC3')."frm1702EX:txtPg7Sc9I4PrizesC3=</div>	
            <div>frm1702EX:txtPg7Sc9I5DescriptionofPropertyC1=".request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC1')."frm1702EX:txtPg7Sc9I5DescriptionofPropertyC1=</div>	
            <div>frm1702EX:txtPg7Sc9I5DescriptionofPropertyC2=".request('frm1702EX:txtPg7Sc9I5DescriptionofPropertyC2')."frm1702EX:txtPg7Sc9I5DescriptionofPropertyC2=</div>	
            <div>frm1702EX:txtPg7Sc9I6OCTC1=".request('frm1702EX:txtPg7Sc9I6OCTC1')."frm1702EX:txtPg7Sc9I6OCTC1=</div>	
            <div>frm1702EX:txtPg7Sc9I6OCTC2=".request('frm1702EX:txtPg7Sc9I6OCTC2')."frm1702EX:txtPg7Sc9I6OCTC2=</div>	
            <div>frm1702EX:txtPg7Sc9I7CARC1=".request('frm1702EX:txtPg7Sc9I7CARC1')."frm1702EX:txtPg7Sc9I7CARC1=</div>	
            <div>frm1702EX:txtPg7Sc9I7CARC2=".request('frm1702EX:txtPg7Sc9I7CARC2')."frm1702EX:txtPg7Sc9I7CARC2=</div>	
            <div>frm1702EX:txtPg7Sc9I8ActualAmountC1=".request('frm1702EX:txtPg7Sc9I8ActualAmountC1')."frm1702EX:txtPg7Sc9I8ActualAmountC1=</div>	
            <div>frm1702EX:txtPg7Sc9I8ActualAmountC2=".request('frm1702EX:txtPg7Sc9I8ActualAmountC2')."frm1702EX:txtPg7Sc9I8ActualAmountC2=</div>	
            <div>frm1702EX:txtPg7Sc9I9FinalTaxC1=".request('frm1702EX:txtPg7Sc9I9FinalTaxC1')."frm1702EX:txtPg7Sc9I9FinalTaxC1=</div>	
            <div>frm1702EX:txtPg7Sc9I9FinalTaxC2=".request('frm1702EX:txtPg7Sc9I9FinalTaxC2')."frm1702EX:txtPg7Sc9I9FinalTaxC2=</div>	
            <div>frm1702EX:ddPg7S9I10C1=".request('frm1702EX:ddPg7S9I10C1')."frm1702EX:ddPg7S9I10C1=</div>	
            <div>frm1702EX:txtPg7Sc9I10PSCSC1=".request('frm1702EX:txtPg7Sc9I10PSCSC1')."frm1702EX:txtPg7Sc9I10PSCSC1=</div>	
            <div>frm1702EX:ddPg7S9I10C2=".request('frm1702EX:ddPg7S9I10C2')."frm1702EX:ddPg7S9I10C2=</div>	
            <div>frm1702EX:txtPg7Sc9I10PSCSC2=".request('frm1702EX:txtPg7Sc9I10PSCSC4')."frm1702EX:txtPg7Sc9I10PSCSC2=</div>	
            <div>frm1702EX:txtPg7Sc9I11CARC1=".request('frm1702EX:txtPg7Sc9I11CARC1')."frm1702EX:txtPg7Sc9I11CARC1=</div>	
            <div>frm1702EX:txtPg7Sc9I11CARC2=".request('frm1702EX:txtPg7Sc9I11CARC2')."frm1702EX:txtPg7Sc9I11CARC2=</div>	
            <div>frm1702EX:txtPg7Sc9I12NumberofSharesC1=".request('frm1702EX:txtPg7Sc9I12NumberofSharesC1')."frm1702EX:txtPg7Sc9I12NumberofSharesC1=</div>	
            <div>frm1702EX:txtPg7Sc9I12NumberofSharesC2=".request('frm1702EX:txtPg7Sc9I12NumberofSharesC2')."frm1702EX:txtPg7Sc9I12NumberofSharesC2=</div>	
            <div>frm1702EX:txtPg7Sc9I13DateofIssueC1=".request('frm1702EX:txtPg7Sc9I13DateofIssueC1')."frm1702EX:txtPg7Sc9I13DateofIssueC1=</div>	
            <div>frm1702EX:txtPg7Sc9I13DateofIssueC2=".request('frm1702EX:txtPg7Sc9I13DateofIssueC2')."frm1702EX:txtPg7Sc9I13DateofIssueC2=</div>	
            <div>frm1702EX:txtPg7Sc9I14ActualAmountC1=".request('frm1702EX:txtPg7Sc9I14ActualAmountC1')."frm1702EX:txtPg7Sc9I14ActualAmountC1=</div>	
            <div>frm1702EX:txtPg7Sc9I14ActualAmountC2=".request('frm1702EX:txtPg7Sc9I14ActualAmountC2')."frm1702EX:txtPg7Sc9I14ActualAmountC2=</div>	
            <div>frm1702EX:txtPg7Sc9I15FinalTaxC1=".request('frm1702EX:txtPg7Sc9I15FinalTaxC1')."frm1702EX:txtPg7Sc9I15FinalTaxC1=</div>	
            <div>frm1702EX:txtPg7Sc9I15FinalTaxC2=".request('frm1702EX:txtPg7Sc9I15FinalTaxC2')."frm1702EX:txtPg7Sc9I15FinalTaxC2=</div>	
            <div>frm1702EX:txtPg7Sc9I16OtherIncomeC1=".request('frm1702EX:txtPg7Sc9I16OtherIncomeC1')."frm1702EX:txtPg7Sc9I16OtherIncomeC1=</div>	
            <div>frm1702EX:txtPg7Sc9I16OtherIncomeC2=".request('frm1702EX:txtPg7Sc9I16OtherIncomeC2')."frm1702EX:txtPg7Sc9I16OtherIncomeC2=</div>	
            <div>frm1702EX:txtPg7Sc9I17ActualAmountC1=".request('frm1702EX:txtPg7Sc9I17ActualAmountC1')."frm1702EX:txtPg7Sc9I17ActualAmountC1=</div>	
            <div>frm1702EX:txtPg7Sc9I17ActualAmountC2=".request('frm1702EX:txtPg7Sc9I17ActualAmountC2')."frm1702EX:txtPg7Sc9I17ActualAmountC2=</div>	
            <div>frm1702EX:txtPg7Sc9I18FinalTaxC1=".request('frm1702EX:txtPg7Sc9I18FinalTaxC1')."frm1702EX:txtPg7Sc9I18FinalTaxC1=</div>	
            <div>frm1702EX:txtPg7Sc9I18FinalTaxC2=".request('frm1702EX:txtPg7Sc9I18FinalTaxC2')."frm1702EX:txtPg7Sc9I18FinalTaxC2=</div>	
            <div>frm1702EX:txtPg7Sc9I19TotalFinalTax=".request('frm1702EX:txtPg7Sc9I19TotalFinalTax')."frm1702EX:txtPg7Sc9I19TotalFinalTax=</div>	
            <div>frm1702EX:txtPg7Sc10I1ReturnofPremium=".request('frm1702EX:txtPg7Sc10I1ReturnofPremium')."frm1702EX:txtPg7Sc10I1ReturnofPremium=</div>	
            <div>frm1702EX:txtPg7Sc10I2DescriptionofPropertyC1=".request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC1')."frm1702EX:txtPg7Sc10I2DescriptionofPropertyC1=</div>	
            <div>frm1702EX:txtPg7Sc10I2DescriptionofPropertyC2=".request('frm1702EX:txtPg7Sc10I2DescriptionofPropertyC2')."frm1702EX:txtPg7Sc10I2DescriptionofPropertyC2=</div>	
            <div>frm1702EX:txtPg7Sc10I3ModeofTransferC1=".request('frm1702EX:txtPg7Sc10I3ModeofTransferC1')."frm1702EX:txtPg7Sc10I3ModeofTransferC1=</div>	
            <div>frm1702EX:txtPg7Sc10I3ModeofTransferC2=".request('frm1702EX:txtPg7Sc10I3ModeofTransferC2')."frm1702EX:txtPg7Sc10I3ModeofTransferC2=</div>	
            <div>frm1702EX:txtPg7Sc10I4CARC1=".request('frm1702EX:txtPg7Sc10I4CARC1')."frm1702EX:txtPg7Sc10I4CARC1=</div>	
            <div>frm1702EX:txtPg7Sc10I4CARC2=".request('frm1702EX:txtPg7Sc10I4CARC2')."frm1702EX:txtPg7Sc10I4CARC2=</div>	
            <div>frm1702EX:txtPg7Sc10I5ActualAmountC1=".request('frm1702EX:txtPg7Sc10I5ActualAmountC1')."frm1702EX:txtPg7Sc10I5ActualAmountC1=</div>	
            <div>frm1702EX:txtPg7Sc10I5ActualAmountC2=".request('frm1702EX:txtPg7Sc10I5ActualAmountC2')."frm1702EX:txtPg7Sc10I5ActualAmountC2=</div>	
            <div>frm1702EX:txtPg7Sc10I6OtherExemptC1=".request('frm1702EX:txtPg7Sc10I6OtherExemptC1')."frm1702EX:txtPg7Sc10I6OtherExemptC1=</div>	
            <div>frm1702EX:txtPg7Sc10I6OtherExemptC2=".request('frm1702EX:txtPg7Sc10I6OtherExemptC2')."frm1702EX:txtPg7Sc10I6OtherExemptC2=</div>	
            <div>frm1702EX:txtPg7Sc10I7ActualAmountC1=".request('frm1702EX:txtPg7Sc10I7ActualAmountC1')."frm1702EX:txtPg7Sc10I7ActualAmountC1=</div>	
            <div>frm1702EX:txtPg7Sc10I7ActualAmountC2=".request('frm1702EX:txtPg7Sc10I7ActualAmountC2')."frm1702EX:txtPg7Sc10I7ActualAmountC2=</div>	
            <div>frm1702EX:txtPg7Sc10I8TotalIncome=".request('frm1702EX:txtPg7Sc10I8TotalIncome')."frm1702EX:txtPg7Sc10I8TotalIncome=</div>	
            <div>frm1702EX:txtCurrentPage=".request('frm1702EX:txtCurrentPage')."frm1702EX:txtCurrentPage=</div>	
            <div>frm1702EX:txtMaxPage=7frm1702EX:txtMaxPage=</div>	
            ".$schedule3."<div>Pg4S3I3SubTotal=".request('Pg4S3I3SubTotal')."Pg4S3I3SubTotal=</div>	
            ".$schedule4."<div>Pg4S4I4SubTotal=".request('Pg4S4I4SubTotal')."Pg4S4I4SubTotal=</div>	
            ".$schedule4_39."<div>Pg5S4I39SubTotal=".request('Pg5S4I39SubTotal')."Pg5S4I39SubTotal=</div>	
            ".$schedule5."<div>Pg5S5I4SubTotal=".request('Pg5S5I4SubTotal')."Pg5S5I4SubTotal=</div>	
            ".$schedule6_3."<div>Pg5S6I3SubTotal=".request('Pg5S6I3SubTotal')."Pg5S6I3SubTotal=</div>	
            ".$schedule6_6."<div>Pg5S6I6SubTotal=".request('Pg5S6I6SubTotal')."Pg5S6I6SubTotal=</div>	
            ".$schedule6_8."<div>Pg5S6I8SubTotal=".request('Pg5S6I8SubTotal')."Pg5S6I8SubTotal=</div>	
            ".$schedule9_1."<div>Pg7S9Pt1SubTotal=".request('Pg7S9Pt1SubTotal')."Pg7S9Pt1SubTotal=</div>	
            ".$schedule9_2."".$schedule9_3."".$schedule9_4."".$schedule10_1."".$schedule10_2."<div>driveSelectTPExport=0driveSelectTPExport=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>Pg4S3I3PopLength=".request('Pg4S3I3PopLength')."Pg4S3I3PopLength=</div>	
            <div>Pg4S4I4PopLength=".request('Pg4S4I4PopLength')."Pg4S4I4PopLength=</div>	
            <div>Pg5S4I39PopLength=".request('Pg5S4I39PopLength')."Pg5S4I39PopLength=</div>	
            <div>Pg5S5I4PopLength=".request('Pg5S5I4PopLength')."Pg5S5I4PopLength=</div>	
            <div>Pg5S6I3PopLength=".request('Pg5S6I3PopLength')."Pg5S6I3PopLength=</div>	
            <div>Pg5S6I6PopLength=".request('Pg5S6I6PopLength')."Pg5S6I6PopLength=</div>	
            <div>Pg5S6I8PopLength=".request('Pg5S6I8PopLength')."Pg5S6I8PopLength=</div>	
            <div>Pg7S9Pt1PopLength=".request('Pg7S9Pt1PopLength')."Pg7S9Pt1PopLength=</div>	
            <div>Pg7S9Pt2PopLength=".request('Pg7S9Pt2PopLength')."Pg7S9Pt2PopLength=</div>	
            <div>Pg7S9Pt3PopLength=".request('Pg7S9Pt3PopLength')."Pg7S9Pt3PopLength=</div>	
            <div>Pg7S9Pt4PopLength=".request('Pg7S9Pt4PopLength')."Pg7S9Pt4PopLength=</div>	
            <div>Pg7S9Pt5PopLength=".request('Pg7S9Pt5PopLength')."Pg7S9Pt5PopLength=</div>	
            <div>Pg7S9Pt6PopLength=".request('Pg7S9Pt6PopLength')."Pg7S9Pt6PopLength=</div>	
            	
            All Rights Reserved BIR 2014.";

          $tin = request('frm1702EX:TIN1').request('frm1702EX:TIN2').request('frm1702EX:TIN3').request('frm1702EX:TIN4');

          $getReturnPeriod = tbl_1702EX::where('company_id',  request('company'))
                            ->where('item2A', request('frm1702EX:ddlPg1I2Date'))
                            ->where('item2B', request('frm1702EX:txtPg1I2YearEnd'))
                            ->count();

          $returnPeriod = request('frm1702EX:ddlPg1I2Date').request('frm1702EX:txtPg1I2YearEnd');

        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm1702EX:ddlPg1I2Date').request('frm1702EX:txtPg1I2YearEnd');
        }else{
                if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1702EX')
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

            $xmlReturnPeriod = request('frm1702EX:ddlPg1I2Date').request('frm1702EX:txtPg1I2YearEnd').$ext;
        }

        $filename = $tin."-1702EX-".$xmlReturnPeriod.'.xml';

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
                'form'          => '1702EX',
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
                            ->where('form', '1702EX')
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
                            ->where('form', '1702EX')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1702EX::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1702EX')
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
        $data = tbl_1702EX::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1702EX')
                            ->get();
        
        return view('forms.BIR-Form 1702EX',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1702MX;
use App\tbl_1702MX_attachment_schedules;
use App\tbl_1702MX_attachment_schedule_h;
use App\tbl_1702MX_attachments;
use App\tbl_1702MX_description_schedules;
use App\tbl_1702MX_schedules;
use App\tbl_1702MX_schedule1;
use App\tbl_1702MX_schedule6;
use App\tbl_1702MX_schedule7a;
use App\tbl_1702MX_schedule8;
use App\tbl_1702MX_schedule9;
use App\tbl_1702MX_schedule10;
use App\tbl_1702MX_schedule12;
use App\tbl_1702MX_schedule13_1;
use App\tbl_1702MX_schedule13_2;
use App\tbl_1702MX_schedule13_3;
use App\tbl_1702MX_schedule13_4;
use App\tbl_1702MX_schedule14_1;
use App\tbl_1702MX_schedule14_6;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1702MXController extends Controller
{
    public function index($company,$action,$form_id)
    {
		$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);
    	if($action == 'new'){
            if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1702_m_xes')){

            }else{
                Schema::connection('mysql2')->create('tbl_1702_m_xes', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1');
                    $table->string('item2A');
                    $table->string('item2B');
                    $table->string('item3')->nullable();
                    $table->string('item4');
                    $table->string('item5')->nullable();
                    $table->string('item5_atc')->nullable();
                    $table->string('item8')->nullable();
                    $table->string('item14')->nullable();
                    $table->string('item15')->nullable();
                    $table->text('item16');
                    $table->text('item17');
                    $table->text('item18');
                    $table->text('item19');
                    $table->text('item20');
                    $table->text('item21')->nullable();
                    $table->text('item22')->nullable();
                    $table->text('item22_no')->nullable();
                    $table->text('item23')->nullable();
                    $table->text('item24')->nullable();
                    $table->text('item25')->nullable();
                    $table->text('item30')->nullable();
                    $table->text('item31A')->nullable();
                    $table->text('item31B')->nullable();
                    $table->text('item31C')->nullable();
                    $table->text('item32A')->nullable();
                    $table->text('item32B')->nullable();
                    $table->text('item32C')->nullable();
                    $table->text('item33A')->nullable();
                    $table->text('item33B')->nullable();
                    $table->text('item33C')->nullable();
                    $table->text('item34')->nullable();
                    $table->text('item35A')->nullable();
                    $table->text('item35B')->nullable();
                    $table->text('item35C')->nullable();
                    $table->text('item36A')->nullable();
                    $table->text('item36B')->nullable();
                    $table->text('item36C')->nullable();
                    $table->text('item37A')->nullable();
                    $table->text('item37B')->nullable();
                    $table->text('item37C')->nullable();
                    $table->text('item37D')->nullable();
                    $table->text('item38A')->nullable();
                    $table->text('item38B')->nullable();
                    $table->text('item38C')->nullable();
                    $table->text('item38D')->nullable();
                    $table->text('item39A')->nullable();
                    $table->text('item39B')->nullable();
                    $table->text('item39C')->nullable();
                    $table->text('item39D')->nullable();
                    $table->text('item40');
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
                    $table->text('item49')->nullable();
                    $table->text('item50')->nullable();
                    $table->text('item51')->nullable();
                    $table->text('sched4_subtotal_A')->nullable();
                    $table->text('sched4_subtotal_B')->nullable();
                    $table->text('sched4_subtotal_C')->nullable();
                    $table->text('sched4_subtotal_D')->nullable();
                    $table->text('sched5_subtotal_A')->nullable();
                    $table->text('sched5_subtotal_B')->nullable();
                    $table->text('sched5_subtotal_C')->nullable();
                    $table->text('sched5_subtotal_D')->nullable();
                    $table->text('sched5others_subtotal_A')->nullable();
                    $table->text('sched5others_subtotal_B')->nullable();
                    $table->text('sched5others_subtotal_C')->nullable();
                    $table->text('sched5others_subtotal_D')->nullable();
                    $table->text('sched6_subtotal_A')->nullable();
                    $table->text('sched6_subtotal_B')->nullable();
                    $table->text('sched6_subtotal_C')->nullable();
                    $table->text('sched6_subtotal_D')->nullable();
                    $table->text('sched7_1')->nullable();
                    $table->text('sched7_2')->nullable();
                    $table->text('sched7_3')->nullable();
                    $table->text('sched7A_total')->nullable();
                    $table->text('sched8_subtotal_A')->nullable();
                    $table->text('sched8_subtotal_B')->nullable();
                    $table->text('sched8_subtotal_C')->nullable();
                    $table->text('sched8_subtotal_D')->nullable();
                    $table->text('sched9_total')->nullable();
                    $table->text('sched10_subtotal_3A')->nullable();
                    $table->text('sched10_subtotal_3B')->nullable();
                    $table->text('sched10_subtotal_3C')->nullable();
                    $table->text('sched10_subtotal_3D')->nullable();
                    $table->text('sched10_subtotal_6A')->nullable();
                    $table->text('sched10_subtotal_6B')->nullable();
                    $table->text('sched10_subtotal_6C')->nullable();
                    $table->text('sched10_subtotal_6D')->nullable();
                    $table->text('sched10_subtotal_8A')->nullable();
                    $table->text('sched10_subtotal_8B')->nullable();
                    $table->text('sched10_subtotal_8C')->nullable();
                    $table->text('sched10_subtotal_8D')->nullable();
                    $table->text('sched11_1')->nullable();
                    $table->text('sched11_2')->nullable();
                    $table->text('sched11_3')->nullable();
                    $table->text('sched11_4')->nullable();
                    $table->text('sched11_5')->nullable();
                    $table->text('sched11_6')->nullable();
                    $table->text('sched11_7')->nullable();
                    $table->text('sched11_8')->nullable();
                    $table->text('sched11_9')->nullable();
                    $table->text('sched11_10')->nullable();
                    $table->text('sched11_11')->nullable();
                    $table->text('sched11_12')->nullable();
                    $table->text('sched11_13')->nullable();
                    $table->text('sched11_14')->nullable();
                    $table->text('sched11_15')->nullable();
                    $table->text('sched11_16')->nullable();
                    $table->text('sched11_17')->nullable();
                    $table->text('sched12')->nullable();
                    $table->text('sched13_subtotal_4')->nullable();
                    $table->text('sched13_19')->nullable();
                    $table->text('sched14_1')->nullable();
                    $table->text('sched14_8')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('schedule')->nullable();
                    $table->text('item')->nullable();
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_description_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('schedule')->nullable();
                    $table->text('description')->nullable();
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_schedule6s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('description')->nullable();
                    $table->text('legal_basis')->nullable();
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_schedule7as', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('year')->nullable();
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->text('itemE')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_schedule9s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('year')->nullable();
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->text('itemE')->nullable();
                    $table->text('itemF')->nullable();
                    $table->text('itemG')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_schedule12s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('registered_name')->nullable();
                    $table->text('tinA')->nullable();
                    $table->text('tinB')->nullable();
                    $table->text('tinC')->nullable();
                    $table->text('tinD')->nullable();
                    $table->text('contribution')->nullable();
                    $table->text('total')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_schedule13_1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item')->nullable();
                    $table->text('description')->nullable();
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_schedule13_2s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item5_A1')->nullable();
                    $table->text('item5_B2')->nullable();
                    $table->text('item6_A1')->nullable();
                    $table->text('item6_B2')->nullable();
                    $table->text('item7_A1')->nullable();
                    $table->text('item7_B2')->nullable();
                    $table->text('item8_A1')->nullable();
                    $table->text('item8_B2')->nullable();
                    $table->text('item9_A1')->nullable();
                    $table->text('item9_B2')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_schedule13_3s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item10_A1_1')->nullable();
                    $table->text('item10_A1_2')->nullable();
                    $table->text('item10_B2_1')->nullable();
                    $table->text('item10_B2_2')->nullable();
                    $table->text('item11_A1')->nullable();
                    $table->text('item11_B2')->nullable();
                    $table->text('item12_A1')->nullable();
                    $table->text('item12_B2')->nullable();
                    $table->text('item13_A1')->nullable();
                    $table->text('item13_B2')->nullable();
                    $table->text('item14_A1')->nullable();
                    $table->text('item14_B2')->nullable();
                    $table->text('item15_A1')->nullable();
                    $table->text('item15_B2')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_schedule13_4s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item16_A1')->nullable();
                    $table->text('item16_B2')->nullable();
                    $table->text('item17_A1')->nullable();
                    $table->text('item17_B2')->nullable();
                    $table->text('item18_A1')->nullable();
                    $table->text('item18_B2')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_schedule14_1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item2_A1')->nullable();
                    $table->text('item2_B2')->nullable();
                    $table->text('item3_A1')->nullable();
                    $table->text('item3_B2')->nullable();
                    $table->text('item4_A1')->nullable();
                    $table->text('item4_B2')->nullable();
                    $table->text('item5_A1')->nullable();
                    $table->text('item5_B2')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_schedule14_6s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item6_A1')->nullable();
                    $table->text('item6_B2')->nullable();
                    $table->text('item7_A1')->nullable();
                    $table->text('item7_B2')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_attachments', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('schedA_1')->nullable();
                    $table->text('schedA_2')->nullable();
                    $table->text('schedA_3')->nullable();
                    $table->text('schedA_4')->nullable();
                    $table->text('schedA_5A')->nullable();
                    $table->text('schedA_5B')->nullable();
                    $table->text('schedA_6A')->nullable();
                    $table->text('schedA_6B')->nullable();
                    $table->text('schedB_1')->nullable();
                    $table->text('schedB_2')->nullable();
                    $table->text('schedB_3')->nullable();
                    $table->text('schedB_4')->nullable();
                    $table->text('schedB_5')->nullable();
                    $table->text('schedB_6')->nullable();
                    $table->text('schedB_7')->nullable();
                    $table->text('schedB_8')->nullable();
                    $table->text('schedB_9')->nullable();
                    $table->text('schedB_10')->nullable();
                    $table->text('schedB_11')->nullable();
                    $table->text('schedB_12')->nullable();
                    $table->text('schedC_1')->nullable();
                    $table->text('schedC_2')->nullable();
                    $table->text('schedC_3')->nullable();
                    $table->text('schedC_4')->nullable();
                    $table->text('schedC_5')->nullable();
                    $table->text('schedC_6')->nullable();
                    $table->text('schedC_7')->nullable();
                    $table->text('schedD_1')->nullable();
                    $table->text('schedD_2')->nullable();
                    $table->text('schedD_3')->nullable();
                    $table->text('schedD_4')->nullable();
                    $table->text('schedD_5')->nullable();
                    $table->text('schedD_6')->nullable();
                    $table->text('schedE1_1')->nullable();
                    $table->text('schedE1_2')->nullable();
                    $table->text('schedE1_3')->nullable();
                    $table->text('schedE1_4')->nullable();
                    $table->text('schedE1_5')->nullable();
                    $table->text('schedE2_6')->nullable();
                    $table->text('schedE2_7')->nullable();
                    $table->text('schedE2_8')->nullable();
                    $table->text('schedE2_9')->nullable();
                    $table->text('schedE2_10')->nullable();
                    $table->text('schedE2_11')->nullable();
                    $table->text('schedE2_12')->nullable();
                    $table->text('schedE2_13')->nullable();
                    $table->text('schedE2_14')->nullable();
                    $table->text('schedE2_15')->nullable();
                    $table->text('schedE2_16')->nullable();
                    $table->text('schedE2_17')->nullable();
                    $table->text('schedE2_18')->nullable();
                    $table->text('schedE2_19')->nullable();
                    $table->text('schedE3_20')->nullable();
                    $table->text('schedE3_21')->nullable();
                    $table->text('schedE3_22')->nullable();
                    $table->text('schedE3_23')->nullable();
                    $table->text('schedE3_24')->nullable();
                    $table->text('schedE3_25')->nullable();
                    $table->text('schedE3_26')->nullable();
                    $table->text('schedE3_27')->nullable();
                    $table->text('schedF_4')->nullable();
                    $table->text('schedG_1')->nullable();
                    $table->text('schedG_5')->nullable();
                    $table->text('schedG_6')->nullable();
                    $table->text('schedG_7')->nullable();
                    $table->text('schedG_8')->nullable();
                    $table->text('schedG_9')->nullable();
                    $table->text('schedG_10')->nullable();
                    $table->text('schedG_11')->nullable();
                    $table->text('schedG_12')->nullable();
                    $table->text('schedG_13')->nullable();
                    $table->text('schedG_14')->nullable();
                    $table->text('schedG_15')->nullable();
                    $table->text('schedG_16')->nullable();
                    $table->text('schedG_17')->nullable();
                    $table->text('schedG_18')->nullable();
                    $table->text('schedG_19')->nullable();
                    $table->text('schedG_20')->nullable();
                    $table->text('schedG_21')->nullable();
                    $table->text('schedG_22')->nullable();
                    $table->text('schedG_23')->nullable();
                    $table->text('schedG_24')->nullable();
                    $table->text('schedG_25')->nullable();
                    $table->text('schedG_26')->nullable();
                    $table->text('schedG_27')->nullable();
                    $table->text('schedG_28')->nullable();
                    $table->text('schedG_29')->nullable();
                    $table->text('schedG_30')->nullable();
                    $table->text('schedG_31')->nullable();
                    $table->text('schedG_32')->nullable();
                    $table->text('schedG_33')->nullable();
                    $table->text('schedG_34')->nullable();
                    $table->text('schedG_35')->nullable();
                    $table->text('schedG_40')->nullable();
                    $table->text('schedH_5')->nullable();
                    $table->text('schedI_1')->nullable();
                    $table->text('schedI_2')->nullable();
                    $table->text('schedI_3')->nullable();
                    $table->text('schedIA_4_year')->nullable();
                    $table->text('schedIA_4_A')->nullable();
                    $table->text('schedIA_4_B')->nullable();
                    $table->text('schedIA_4_C')->nullable();
                    $table->text('schedIA_4_D')->nullable();
                    $table->text('schedIA_4_E')->nullable();
                    $table->text('schedIA_5_year')->nullable();
                    $table->text('schedIA_5_A')->nullable();
                    $table->text('schedIA_5_B')->nullable();
                    $table->text('schedIA_5_C')->nullable();
                    $table->text('schedIA_5_D')->nullable();
                    $table->text('schedIA_5_E')->nullable();
                    $table->text('schedIA_6_year')->nullable();
                    $table->text('schedIA_6_A')->nullable();
                    $table->text('schedIA_6_B')->nullable();
                    $table->text('schedIA_6_C')->nullable();
                    $table->text('schedIA_6_D')->nullable();
                    $table->text('schedIA_6_E')->nullable();
                    $table->text('schedIA_7_year')->nullable();
                    $table->text('schedIA_7_A')->nullable();
                    $table->text('schedIA_7_B')->nullable();
                    $table->text('schedIA_7_C')->nullable();
                    $table->text('schedIA_7_D')->nullable();
                    $table->text('schedIA_7_E')->nullable();
                    $table->text('schedI_8')->nullable();
                    $table->timestamps();
                });
                
                Schema::connection('mysql2')->create('tbl_1702_m_x_attachment_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('schedule')->nullable();
                    $table->text('item')->nullable();
                    $table->text('description')->nullable();
                    $table->text('amount')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_m_x_attachment_schedule_hs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('item')->nullable();
                    $table->text('description')->nullable();
                    $table->text('legal_basis')->nullable();
                    $table->text('amount')->nullable();
                    $table->timestamps();
                });



            }
    		return view('forms.BIR-Form 1702MX',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
    	}else{
            $data = tbl_1702MX::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1702MX')
                            ->get();
            return view('forms.BIR-Form 1702MX',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }

    public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);
        
        $data = ([
            'form_no'     => request('form_no'),
            'company_id'     => request('company'),
            'item1'     => request('frm1702MX:rdoPg1I1'),
            'item2A'     => request('frm1702MX:ddlPg1I2Date'),
            'item2B'     => request('frm1702MX:txtPg1I2YearEnd'),
            'item3'     => request('frm1702MX:rdoPg1I3Amended'),
            'item4'     => request('frm1702MX:rdoPg1I4ShortPeriod'),
            'item5'     => null !== request('frm1702MX:chkPg1I5ATCR1') ? request('frm1702MX:chkPg1I5ATCR1') : request('frm1702MX:chkPg1I5ATCR2'),
            'item5_atc'     => request('frm1702MX:drpPg1I5ATCR2'),
            'item8'     => request('frm1702MX:txtPg1Pt1I8'),
            'item14'     => request('frm1702MX:txtPg1Pt1I14PSICCode'),
            'item15'     => null !== request('frm1702MX:rdoPg1Pt1I15MethodofDeduction') ? request('frm1702MX:rdoPg1Pt1I15MethodofDeduction') : '',
            'item16'     => request('frm1702MX:txtPg1Pt2I16TotalIncome'),
            'item17'     => request('frm1702MX:txtPg1Pt2I17LessTotalTax'),
            'item18'     => request('frm1702MX:txtPg1Pt2I18NetTaxPayable'),
            'item19'     => request('frm1702MX:txtPg1Pt2I19TotalPenalties'),
            'item20'     => request('frm1702MX:txtPg1Pt2I20TotalAmount'),
            'item21'     => null !== request('frm1702MX:rdoPg1Pt2I21Overpayment') ? request('frm1702MX:rdoPg1Pt2I21Overpayment') : '',
            'item22'     => null !== request('frm1702MX:rdoPg1Pt2I22') ? request('frm1702MX:rdoPg1Pt2I22') : '',
            'item22_no'     => request('frm1702MX:txtPg1Pt2I22'),
            'item23'     => request('frm1702MX:txtPg1Pt2I23Date'),
            'item24'     => request('frm1702MX:txtPg1Pt2I24PlaceofIssue'),
            'item25'     => request('frm1702MX:txtPg1Pt2I25AmountCTC'),
            'item30'     => null !== request('frm1702MX:chkPg2Pt4I30MoreThanOne') ? request('frm1702MX:chkPg2Pt4I30MoreThanOne') : '',
            'item31A'     => request('frm1702MX:txtPg2Pt4I31CA'),
            'item31B'     => request('frm1702MX:txtPg2Pt4I31CB'),
            'item31C'     => request('frm1702MX:txtPg2Pt4I31CC'),
            'item32A'     => request('frm1702MX:txtPg2Pt4I32CA'),
            'item32B'     => request('frm1702MX:txtPg2Pt4I32CB'),
            'item32C'     => request('frm1702MX:txtPg2Pt4I32CC'),
            'item33A'     => request('frm1702MX:txtPg2Pt4I33CA'),
            'item33B'     => request('frm1702MX:txtPg2Pt4I33CB'),
            'item33C'     => request('frm1702MX:txtPg2Pt4I33CC'),
            'item34'     => request('frm1702MX:txtPg2Pt4I34SpecialTaxRate'),
            'item35A'     => request('frm1702MX:txtPg2Pt4I35CA'),
            'item35B'     => request('frm1702MX:txtPg2Pt4I35CB'),
            'item35C'     => request('frm1702MX:txtPg2Pt4I35CC'),
            'item36A'     => request('frm1702MX:txtPg2Pt4I36CA'),
            'item36B'     => request('frm1702MX:txtPg2Pt4I36CB'),
            'item36C'     => request('frm1702MX:txtPg2Pt4I36CC'),
            'item37A'     => request('frm1702MX:txtPg2Pt5I37CA'),
            'item37B'     => request('frm1702MX:txtPg2Pt5I37CB'),
            'item37C'     => request('frm1702MX:txtPg2Pt5I37CC'),
            'item37D'     => request('frm1702MX:txtPg2Pt5I37CD'),
            'item38A'     => request('frm1702MX:txtPg2Pt5I38CA'),
            'item38B'     => request('frm1702MX:txtPg2Pt5I38CB'),
            'item38C'     => request('frm1702MX:txtPg2Pt5I38CC'),
            'item38D'     => request('frm1702MX:txtPg2Pt5I38CD'),
            'item39A'     => request('frm1702MX:txtPg2Pt5I39CA'),
            'item39B'     => request('frm1702MX:txtPg2Pt5I39CB'),
            'item39C'     => request('frm1702MX:txtPg2Pt5I39CC'),
            'item39D'     => request('frm1702MX:txtPg2Pt5I39CD'),
            'item40'     => request('frm1702MX:txtPg2Pt5I40'),
            'item41'     => request('frm1702MX:txtPg2Pt5I41'),
            'item42'     => request('frm1702MX:txtPg2Pt5I42'),
            'item43'     => request('frm1702MX:txtPg2Pt5I43'),
            'item44'     => request('frm1702MX:txtPg2Pt5I44'),
            'item45'     => request('frm1702MX:txtPg2Pt6I45External'),
            'item46A'     => request('frm1702MX:txtPg2Pt6I46TIN1'),
            'item46B'     => request('frm1702MX:txtPg2Pt6I46TIN2'),
            'item46C'     => request('frm1702MX:txtPg2Pt6I46TIN3'),
            'item46D'     => request('frm1702MX:txtPg2Pt6I46TIN4'),
            'item47'     => request('frm1702MX:txtPg2Pt6I47Partner'),
            'item48A'     => request('frm1702MX:txtPg2Pt6I48TIN1'),
            'item48B'     => request('frm1702MX:txtPg2Pt6I48TIN2'),
            'item48C'     => request('frm1702MX:txtPg2Pt6I48TIN3'),
            'item48D'     => request('frm1702MX:txtPg2Pt6I48TIN4'),
            'item49'     => request('frm1702MX:txtPg2Pt6I49BIRAccreditation'),
            'item50'     => request('frm1702MX:txtPg2Pt6I50IssueDate'),
            'item51'     => request('frm1702MX:txtPg2Pt6I51ExpiryDate'),
            'sched4_subtotal_A'  => request('frm1702MX:txtPg5Sc4I3_SubTotalCA'),
            'sched4_subtotal_B'  => request('frm1702MX:txtPg5Sc4I3_SubTotalCB'),
            'sched4_subtotal_C' => request('frm1702MX:txtPg5Sc4I3_SubTotalCC'),
            'sched4_subtotal_D' => request('frm1702MX:txtPg5Sc4I3_SubTotalCD'),
            'sched5_subtotal_A'  => request('frm1702MX:txtPg5Sc5I4_SubTotalCA'),
            'sched5_subtotal_B'  => request('frm1702MX:txtPg5Sc5I4_SubTotalCB'),
            'sched5_subtotal_C' => request('frm1702MX:txtPg5Sc5I4_SubTotalCC'),
            'sched5_subtotal_D' => request('frm1702MX:txtPg5Sc5I4_SubTotalCD'),
            'sched5others_subtotal_A'  => request('frm1702MX:txtPg6Sc5I39_SubTotalCA'),
            'sched5others_subtotal_B'  => request('frm1702MX:txtPg6Sc5I39_SubTotalCB'),
            'sched5others_subtotal_C' => request('frm1702MX:txtPg6Sc5I39_SubTotalCC'),
            'sched5others_subtotal_D' => request('frm1702MX:txtPg6Sc5I39_SubTotalCD'),
            'sched6_subtotal_A'  => request('frm1702MX:txtPg6Sc6_SubTotalCA'),
            'sched6_subtotal_B'  => request('frm1702MX:txtPg6Sc6_SubTotalCB'),
            'sched6_subtotal_C' => request('frm1702MX:txtPg6Sc6_SubTotalCC'),
            'sched6_subtotal_D' => request('frm1702MX:txtPg6Sc6_SubTotalCD'),
            'sched7_1'     => request('frm1702MX:txtPg6Sc7I1'),
            'sched7_2'     => request('frm1702MX:txtPg6Sc7I2'),
            'sched7_3'     => request('frm1702MX:txtPg6Sc7I3'),
            'sched7A_total'     => request('frm1702MX:txtPg6Sc7AI8'),
            'sched8_subtotal_A'  => request('frm1702MX:txtPg7Sc8_SubTotalCA'),
            'sched8_subtotal_B'  => request('frm1702MX:txtPg7Sc8_SubTotalCB'),
            'sched8_subtotal_C' => request('frm1702MX:txtPg7Sc8_SubTotalCC'),
            'sched8_subtotal_D' => request('frm1702MX:txtPg7Sc8_SubTotalCD'),
            'sched9_total'     => request('frm1702MX:txtPg7Sc9I4'),
            'sched10_subtotal_3A'   => request('frm1702MX:txtPg7Sc10I3_SubTotalCA'),
            'sched10_subtotal_3B'   => request('frm1702MX:txtPg7Sc10I3_SubTotalCB'),
            'sched10_subtotal_3C'   => request('frm1702MX:txtPg7Sc10I3_SubTotalCC'),
            'sched10_subtotal_3D'   => request('frm1702MX:txtPg7Sc10I3_SubTotalCD'),
            'sched10_subtotal_6A'   => request('frm1702MX:txtPg7Sc10I6_SubTotalCA'),
            'sched10_subtotal_6B'   => request('frm1702MX:txtPg7Sc10I6_SubTotalCB'),
            'sched10_subtotal_6C'   => request('frm1702MX:txtPg7Sc10I6_SubTotalCC'),
            'sched10_subtotal_6D'   => request('frm1702MX:txtPg7Sc10I6_SubTotalCD'),
            'sched10_subtotal_8A'   => request('frm1702MX:txtPg7Sc10I8_SubTotalCA'),
            'sched10_subtotal_8B'   => request('frm1702MX:txtPg7Sc10I8_SubTotalCB'),
            'sched10_subtotal_8C'   => request('frm1702MX:txtPg7Sc10I8_SubTotalCC'),
            'sched10_subtotal_8D'   => request('frm1702MX:txtPg7Sc10I8_SubTotalCD'),
            'sched11_1'     => request('frm1702MX:txtPg8Sc11I1'),
            'sched11_2'     => request('frm1702MX:txtPg8Sc11I2'),
            'sched11_3'     => request('frm1702MX:txtPg8Sc11I3'),
            'sched11_4'     => request('frm1702MX:txtPg8Sc11I4'),
            'sched11_5'     => request('frm1702MX:txtPg8Sc11I5'),
            'sched11_6'     => request('frm1702MX:txtPg8Sc11I6'),
            'sched11_7'     => request('frm1702MX:txtPg8Sc11I7'),
            'sched11_8'     => request('frm1702MX:txtPg8Sc11I8'),
            'sched11_9'     => request('frm1702MX:txtPg8Sc11I9'),
            'sched11_10'     => request('frm1702MX:txtPg8Sc11I10'),
            'sched11_11'     => request('frm1702MX:txtPg8Sc11I11'),
            'sched11_12'     => request('frm1702MX:txtPg8Sc11I12'),
            'sched11_13'     => request('frm1702MX:txtPg8Sc11I13'),
            'sched11_14'     => request('frm1702MX:txtPg8Sc11I14'),
            'sched11_15'     => request('frm1702MX:txtPg8Sc11I15'),
            'sched11_16'     => request('frm1702MX:txtPg8Sc11I16'),
            'sched11_17'     => request('frm1702MX:txtPg8Sc11I17'),
            'sched12'     => null !== request('frm1702MX:radPg8Sc12') ? request('frm1702MX:radPg8Sc12') : '',
            'sched13_subtotal_4' => request('frm1702MX:txtPg9Sc13I19name-I'),
            'sched13_19'     => request('frm1702MX:txtPg9Sc13I19'),
            'sched14_1'     => request('frm1702MX:txtPg9Sc14I1'),
            'sched14_8'     => request('frm1702MX:txtPg9Sc14I8'),
        ]);
        
        $getForm = tbl_1702MX::where('form_no', request('form_no'))
                                   ->where('company_id', request('company'))->get();
        $trans = "";
        $form = "";
        if(request('form_id') != ""){
                $form = tbl_1702MX::find(request('form_id'));
                $form->update($data);
                $trans = "update";
        }else{
                if($getForm->isEmpty()){
                    $form = tbl_1702MX::create($data);
                }else{
                    $form = tbl_1702MX::find($getForm[0]->id);
                    $form->update($data);
                    $trans = "update";
                }
        }

        if($trans == "update"){
               tbl_1702MX_schedules::where('form_id', $getForm[0]->id)->delete();
               tbl_1702MX_description_schedules::where('form_id', $getForm[0]->id)->delete();
               tbl_1702MX_schedule13_1::where('form_id', $getForm[0]->id)->delete();
               tbl_1702MX_schedule13_2::where('form_id', $getForm[0]->id)->delete();
               tbl_1702MX_schedule13_3::where('form_id', $getForm[0]->id)->delete();
               tbl_1702MX_schedule13_4::where('form_id', $getForm[0]->id)->delete();
               tbl_1702MX_schedule14_1::where('form_id', $getForm[0]->id)->delete();
               tbl_1702MX_schedule14_6::where('form_id', $getForm[0]->id)->delete();
               tbl_1702MX_attachment_schedules::where('form_id', $getForm[0]->id)->delete();
               tbl_1702MX_attachment_schedule_h::where('form_id', $getForm[0]->id)->delete();
        }

        //for schedule 1
        for ($i=1; $i < 16; $i++) { 
            if($i != 11 || $i != 13 || $i != 14 || $i != 15 || $i != 16 ){
                if(request('frm1702MX:txtPg3Sc1I'.$i.'CA') != '0'){
                    $schedule1 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '1',
                        'item'     => $i,
                        'itemA'     => request('frm1702MX:txtPg3Sc1I'.$i.'CA'),
                        'itemB'     => request('frm1702MX:txtPg3Sc1I'.$i.'CB'),
                        'itemC'     => request('frm1702MX:txtPg3Sc1I'.$i.'CC'),
                        'itemD'     => request('frm1702MX:txtPg3Sc1I'.$i.'CD'),
                    ]);
                    tbl_1702MX_schedules::create($schedule1);
                }
            }else if($i == 11){
                if(request('frm1702MX:txtPg3Sc1I11CA') != '0%'){
                    $schedule1 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '1',
                        'item'     => '11',
                        'itemA'     => request('frm1702MX:txtPg3Sc1I11CA'),
                        'itemB'     => request('frm1702MX:drpPg3Sc1I11CB'),
                        'itemC'     => request('frm1702MX:txtPg3Sc1I11CC'),
                        'itemD'     => request('frm1702MX:txtATCSelectedIndex'),
                    ]);
                    tbl_1702MX_schedules::create($schedule1);
                }
            }else if($i == 13 || $i == 14 || $i == 16){
                if(request('frm1702MX:txtPg3Sc1I'.$i.'CB') != '0'){
                    $schedule1 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '1',
                        'item'     => $i,
                        'itemA'     => '',
                        'itemB'     => request('frm1702MX:txtPg3Sc1I'.$i.'CB'),
                        'itemC'     => request('frm1702MX:txtPg3Sc1I'.$i.'CC'),
                        'itemD'     => request('frm1702MX:txtPg3Sc1I'.$i.'CD'),
                    ]);
                    tbl_1702MX_schedules::create($schedule1);
                }
            }else if($i == 15){
                if(request('frm1702MX:txtPg3Sc1I15CC') != '0'){
                    $schedule1 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '1',
                        'item'     => '15',
                        'itemA'     => '',
                        'itemB'     => '',
                        'itemC'     => request('frm1702MX:txtPg3Sc1I'.$i.'CC'),
                        'itemD'     => request('frm1702MX:txtPg3Sc1I'.$i.'CD'),
                    ]);
                    tbl_1702MX_schedules::create($schedule1);
                }
            }
        }
        
        //for schedule 2 
        for ($j=1; $j < 8; $j++) { 
            if(request('frm1702MX:txtPg3Sc2I'.$j.'CA') != '0'){
                $schedule2 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '2',
                        'item'     => $j,
                        'itemA'     => request('frm1702MX:txtPg3Sc2I'.$j.'CA'),
                        'itemB'     => request('frm1702MX:txtPg3Sc2I'.$j.'CB'),
                        'itemC'     => request('frm1702MX:txtPg3Sc2I'.$j.'CC'),
                        'itemD'     => request('frm1702MX:txtPg3Sc2I'.$j.'CD'),
                ]);
                tbl_1702MX_schedules::create($schedule2);
            }
        }

        //for schedule 3
        for ($k=1; $k < 6; $k++) { 
            if(request('frm1702MX:txtPg4Sc3I'.$k.'CA') != '0'){
                $schedule3 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '3',
                        'item'     => $k,
                        'itemA'     => request('frm1702MX:txtPg4Sc3I'.$k.'CA'),
                        'itemB'     => request('frm1702MX:txtPg4Sc3I'.$k.'CB'),
                        'itemC'     => request('frm1702MX:txtPg4Sc3I'.$k.'CC'),
                        'itemD'     => request('frm1702MX:txtPg4Sc3I'.$k.'CD'),
                ]);
                tbl_1702MX_schedules::create($schedule3);
            }
        }

        //for schedule 3a
        for ($l=1; $l < 5; $l++) { 
            if(request('frm1702MX:txtPg4Sc3AI'.$l.'CA') != '0'){
                $schedule3a = ([
                        'form_id'     => $form->id,
                        'schedule'     => '3A',
                        'item'     => $l,
                        'itemA'     => request('frm1702MX:txtPg4Sc3AI'.$l.'CA'),
                        'itemB'     => request('frm1702MX:txtPg4Sc3AI'.$l.'CB'),
                        'itemC'     => request('frm1702MX:txtPg4Sc3AI'.$l.'CC'),
                        'itemD'     => request('frm1702MX:txtPg4Sc3AI'.$l.'CD'),
                ]);
                tbl_1702MX_schedules::create($schedule3a);
            }
        }

        //for schedule 3b
        for ($m=6; $m < 19; $m++) { 
            if(request('frm1702MX:txtPg4Sc3BI6CA') != '0'){
                $schedule3b = ([
                        'form_id'     => $form->id,
                        'schedule'     => '3B',
                        'item'     => $m,
                        'itemA'     => request('frm1702MX:txtPg4Sc3BI'.$m.'CA'),
                        'itemB'     => request('frm1702MX:txtPg4Sc3BI'.$m.'CB'),
                        'itemC'     => request('frm1702MX:txtPg4Sc3BI'.$m.'CC'),
                        'itemD'     => request('frm1702MX:txtPg4Sc3BI'.$m.'CD'),
                ]);
                tbl_1702MX_schedules::create($schedule3b);
            }
        }

        //for schedule 3c
        for ($n=20; $n < 27; $n++) { 
            if(request('frm1702MX:txtPg4Sc3BI6CA') != '0'){
                $schedule3c = ([
                        'form_id'     => $form->id,
                        'schedule'     => '3C',
                        'item'     => $n,
                        'itemA'     => request('frm1702MX:txtPg4Sc3CI'.$n.'CA'),
                        'itemB'     => request('frm1702MX:txtPg4Sc3CI'.$n.'CB'),
                        'itemC'     => request('frm1702MX:txtPg4Sc3CI'.$n.'CC'),
                        'itemD'     => request('frm1702MX:txtPg4Sc3CI'.$n.'CD'),
                ]);
                tbl_1702MX_schedules::create($schedule3c);
            }
        }

        //for schedule 4
        for ($o=0; $o < count(request('frm1702MX:txtPg5Sc4I3_Col1')); $o++) { 
            if(request('frm1702MX:txtPg5Sc4I3_Col1')[$o] != ''){
                $schedule4 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '4',
                        'description'     => request('frm1702MX:txtPg5Sc4I3_Col1')[$o],
                        'itemA'     => request('frm1702MX:txtPg5Sc4I3_Col2')[$o],
                        'itemB'     => request('frm1702MX:txtPg5Sc4I3_Col3')[$o],
                        'itemC'     => request('frm1702MX:txtPg5Sc4I3_Col4')[$o],
                        'itemD'     => request('frm1702MX:txtPg5Sc4I3_Col5')[$o],
                ]);
                tbl_1702MX_description_schedules::create($schedule4);
            }
        }

        //for schedule 4 item 4
        if(request('frm1702MX:txtPg5Sc4I4CA') != '0'){
            $schedule4 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '4',
                        'item'     => '4',
                        'itemA'     => request('frm1702MX:txtPg5Sc4I4CA'),
                        'itemB'     => request('frm1702MX:txtPg5Sc4I4CB'),
                        'itemC'     => request('frm1702MX:txtPg5Sc4I4CC'),
                        'itemD'     => request('frm1702MX:txtPg5Sc4I4CD'),
            ]);
            tbl_1702MX_schedules::create($schedule4);
        }

        //for schedule 5 item 1
        if(request('frm1702MX:txtPg5Sc5I1CA') != '0'){
            $schedule5 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '5',
                        'item'     => '1',
                        'itemA'     => request('frm1702MX:txtPg5Sc5I1CA'),
                        'itemB'     => request('frm1702MX:txtPg5Sc5I1CB'),
                        'itemC'     => request('frm1702MX:txtPg5Sc5I1CC'),
                        'itemD'     => request('frm1702MX:txtPg5Sc5I1CD'),
            ]);
            tbl_1702MX_schedules::create($schedule5);
        }

        //for schedule 5
        for ($p=0; $p < count(request('frm1702MX:txtPg5Sc5I4_Col1')); $p++) { 
            if(request('frm1702MX:txtPg5Sc5I4_Col1')[$p] != ''){
                $schedule5 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '5',
                        'description'     => request('frm1702MX:txtPg5Sc5I4_Col1')[$p],
                        'itemA'     => request('frm1702MX:txtPg5Sc5I4_Col2')[$p],
                        'itemB'     => request('frm1702MX:txtPg5Sc5I4_Col3')[$p],
                        'itemC'     => request('frm1702MX:txtPg5Sc5I4_Col4')[$p],
                        'itemD'     => request('frm1702MX:txtPg5Sc5I4_Col5')[$p],
                ]);
                tbl_1702MX_description_schedules::create($schedule5);
            }
        }

        //for schedule 5 item 5-35
        for ($q=5; $q < 36; $q++) { 
            if(request('frm1702MX:txtPg5Sc5I'.$q.'CA') != '0'){
                $schedule5 = ([
                            'form_id'     => $form->id,
                            'schedule'     => '5',
                            'item'     => $q,
                            'itemA'     => request('frm1702MX:txtPg5Sc5I'.$q.'CA'),
                            'itemB'     => request('frm1702MX:txtPg5Sc5I'.$q.'CB'),
                            'itemC'     => request('frm1702MX:txtPg5Sc5I'.$q.'CC'),
                            'itemD'     => request('frm1702MX:txtPg5Sc5I'.$q.'CD'),
                ]);
                tbl_1702MX_schedules::create($schedule5);
            }
        }

        //for schedule 5 others
        for ($r=0; $r < count(request('frm1702MX:txtPg6Sc5I_Col1')); $r++) { 
            if(request('frm1702MX:txtPg6Sc5I_Col1')[$r] != ''){
                $schedule5_others = ([
                        'form_id'     => $form->id,
                        'schedule'     => '5_others',
                        'description'     => request('frm1702MX:txtPg6Sc5I_Col1')[$r],
                        'itemA'     => request('frm1702MX:txtPg6Sc5I_Col2')[$r],
                        'itemB'     => request('frm1702MX:txtPg6Sc5I_Col3')[$r],
                        'itemC'     => request('frm1702MX:txtPg6Sc5I_Col4')[$r],
                        'itemD'     => request('frm1702MX:txtPg6Sc5I_Col5')[$r],
                ]);
                tbl_1702MX_description_schedules::create($schedule5_others);
            }
        }

        //for schedule 5 item 40
        if(request('frm1702MX:txtPg6Sc5I40CA') != '0'){
            $schedule5 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '5_others',
                        'item'     => '40',
                        'itemA'     => request('frm1702MX:txtPg6Sc5I40CA'),
                        'itemB'     => request('frm1702MX:txtPg6Sc5I40CB'),
                        'itemC'     => request('frm1702MX:txtPg6Sc5I40CC'),
                        'itemD'     => request('frm1702MX:txtPg6Sc5I40CD'),
            ]);
            tbl_1702MX_schedules::create($schedule5);
        }

        //for schedule 6
        for ($s=0; $s < count(request('frm1702MX:txtPg6Sc6_Col1')); $s++) { 
            if(request('frm1702MX:txtPg6Sc6_Col1')[$s] != ''){
                $schedule6 = ([
                        'form_id'     => $form->id,
                        'description'     => request('frm1702MX:txtPg6Sc6_Col1')[$s],
                        'legal_basis'     => request('frm1702MX:txtPg6Sc6_Col2')[$s],
                        'itemA'     => request('frm1702MX:txtPg6Sc6_Col3')[$s],
                        'itemB'     => request('frm1702MX:txtPg6Sc6_Col4')[$s],
                        'itemC'     => request('frm1702MX:txtPg6Sc6_Col5')[$s],
                        'itemD'     => request('frm1702MX:txtPg6Sc6_Col6')[$s],
                ]);
                tbl_1702MX_schedule6::create($schedule6);
            }
        }

        //for schedule 6 item 5
        if(request('frm1702MX:txtPg6Sc5I40CA') != '0'){
            $schedule6 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '6',
                        'item'     => '5',
                        'itemA'     => request('frm1702MX:txtPg6Sc6I5CA'),
                        'itemB'     => request('frm1702MX:txtPg6Sc6I5CB'),
                        'itemC'     => request('frm1702MX:txtPg6Sc6I5CC'),
                        'itemD'     => request('frm1702MX:txtPg6Sc6I5CD'),
            ]);
            tbl_1702MX_schedules::create($schedule6);
        }

        //for schedule 7a 
        for ($t=4; $t < 8; $t++) { 
            if(request('frm1702MX:txtPg6Sc7AI'.$t.'year') != ''){
                $schedule7a = ([
                            'form_id'     => $form->id,
                            'year'     => request('frm1702MX:txtPg6Sc7AI'.$t.'year'),
                            'itemA'     => request('frm1702MX:txtPg6Sc7AI'.$t.'CA'),
                            'itemB'     => request('frm1702MX:txtPg6Sc7AI'.$t.'CB'),
                            'itemC'     => request('frm1702MX:txtPg6Sc7AI'.$t.'CC'),
                            'itemD'     => request('frm1702MX:txtPg6Sc7AI'.$t.'CD'),
                            'itemE'     => request('frm1702MX:txtPg6Sc7AI'.$t.'CE'),
                ]);
                tbl_1702MX_schedule7a::create($schedule7a);
            }
        }

        //for schedule 8
        for ($u=1; $u < 7 ; $u++) { 
            if(request('frm1702MX:txtPg6Sc8I'.$u.'CA') != '0'){
                $schedule8 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '8',
                        'item'     => $u,
                        'itemA'     => request('frm1702MX:txtPg6Sc8I'.$u.'CA'),
                        'itemB'     => request('frm1702MX:txtPg6Sc8I'.$u.'CB'),
                        'itemC'     => request('frm1702MX:txtPg6Sc8I'.$u.'CC'),
                        'itemD'     => request('frm1702MX:txtPg6Sc8I'.$u.'CD'),
                ]);
                tbl_1702MX_schedules::create($schedule8);
            }
        }

        for ($v=7; $v < 11 ; $v++) { 
            if(request('frm1702MX:txtPg7Sc8I7CA') != '0'){
                $schedule8 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '8',
                        'item'     => $v,
                        'itemA'     => request('frm1702MX:txtPg7Sc8I'.$v.'CA'),
                        'itemB'     => request('frm1702MX:txtPg7Sc8I'.$v.'CB'),
                        'itemC'     => request('frm1702MX:txtPg7Sc8I'.$v.'CC'),
                        'itemD'     => request('frm1702MX:txtPg7Sc8I'.$v.'CD'),
                ]);
                tbl_1702MX_schedules::create($schedule8);
            }
        }

        //for schedule 8 item 13
        if(request('frm1702MX:txtPg7Sc8I13CA') != '0'){
            $schedule8 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '8',
                        'item'     => '13',
                        'itemA'     => request('frm1702MX:txtPg7Sc8I13CA'),
                        'itemB'     => request('frm1702MX:txtPg7Sc8I13CB'),
                        'itemC'     => request('frm1702MX:txtPg7Sc8I13CC'),
                        'itemD'     => request('frm1702MX:txtPg7Sc8I13CD'),
            ]);
            tbl_1702MX_schedules::create($schedule8);
        }

        //for schedule 9
        for ($a=1; $a < 3; $a++) { 
            if(request('frm1702MX:txtPg7Sc9I1') != ''){
                $schedule9 = ([
                            'form_id'     => $form->id,
                            'year'     => request('frm1702MX:txtPg7Sc9I'.$i.''),
                            'itemA'     => request('frm1702MX:txtPg7Sc9I'.$i.'CA'),
                            'itemB'     => request('frm1702MX:txtPg7Sc9I'.$i.'CB'),
                            'itemC'     => request('frm1702MX:txtPg7Sc9I'.$i.'CC'),
                            'itemD'     => request('frm1702MX:txtPg7Sc9I'.$i.'CD'),
                            'itemE'     => request('frm1702MX:txtPg7Sc9I'.$i.'CE'),
                            'itemF'     => request('frm1702MX:txtPg7Sc9I'.$i.'CF'),
                            'itemG'     => request('frm1702MX:txtPg7Sc9I'.$i.'CG'),
                ]);
                tbl_1702MX_schedule9::create($schedule9);
            }
        }

        //for schedule 10 item 1
        if(request('frm1702MX:txtPg7Sc10I1CA') != '0'){
            $schedule10 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '10',
                        'item'     => '1',
                        'itemA'     => request('frm1702MX:txtPg7Sc10I1CA'),
                        'itemB'     => request('frm1702MX:txtPg7Sc10I1CB'),
                        'itemC'     => request('frm1702MX:txtPg7Sc10I1CC'),
                        'itemD'     => request('frm1702MX:txtPg7Sc10I1CD'),
            ]);
            tbl_1702MX_schedules::create($schedule10);
        }

        //for schedule 10_3
        for ($b=0; $b < count(request('frm1702MX:txtPg7Sc10I3_Col1')); $b++) { 
            if(request('frm1702MX:txtPg7Sc10I3_Col1')[$b] != ''){
                $schedule10_3 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '10_3',
                        'description'     => request('frm1702MX:txtPg7Sc10I3_Col1')[$b],
                        'itemA'     => request('frm1702MX:txtPg7Sc10I3_Col2')[$b],
                        'itemB'     => request('frm1702MX:txtPg7Sc10I3_Col3')[$b],
                        'itemC'     => request('frm1702MX:txtPg7Sc10I3_Col4')[$b],
                        'itemD'     => request('frm1702MX:txtPg7Sc10I3_Col5')[$b],
                ]);
                tbl_1702MX_description_schedules::create($schedule10_3);
            }
        }

        //for schedule 10 item 4
        if(request('frm1702MX:txtPg7Sc10I4CA') != '0'){
            $schedule10_4 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '10',
                        'item'     => '4',
                        'itemA'     => request('frm1702MX:txtPg7Sc10I4CA'),
                        'itemB'     => request('frm1702MX:txtPg7Sc10I4CB'),
                        'itemC'     => request('frm1702MX:txtPg7Sc10I4CC'),
                        'itemD'     => request('frm1702MX:txtPg7Sc10I4CD'),
            ]);
            tbl_1702MX_schedules::create($schedule10_4);
        }

        //for schedule 10_6
        for ($c=0; $c < count(request('frm1702MX:txtPg7Sc10I3_Col1')); $c++) { 
            if(request('frm1702MX:txtPg7Sc10I3_Col1')[$c] != ''){
                $schedule10_6 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '10_6',
                        'description'     => request('frm1702MX:txtPg7Sc10I6_Col1')[$c],
                        'itemA'     => request('frm1702MX:txtPg7Sc10I6_Col2')[$c],
                        'itemB'     => request('frm1702MX:txtPg7Sc10I6_Col3')[$c],
                        'itemC'     => request('frm1702MX:txtPg7Sc10I6_Col4')[$c],
                        'itemD'     => request('frm1702MX:txtPg7Sc10I6_Col5')[$c],
                ]);
                tbl_1702MX_description_schedules::create($schedule10_6);
            }
        }

        //for schedule 10_8
        for ($d=0; $d < count(request('frm1702MX:txtPg7Sc10I8_Col1')); $d++) { 
            if(request('frm1702MX:txtPg7Sc10I8_Col1')[$d] != ''){
                $schedule10_8 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '10_8',
                        'description'     => request('frm1702MX:txtPg7Sc10I8_Col1')[$d],
                        'itemA'     => request('frm1702MX:txtPg7Sc10I8_Col2')[$d],
                        'itemB'     => request('frm1702MX:txtPg7Sc10I8_Col3')[$d],
                        'itemC'     => request('frm1702MX:txtPg7Sc10I8_Col4')[$d],
                        'itemD'     => request('frm1702MX:txtPg7Sc10I8_Col5')[$d],
                ]);
                tbl_1702MX_description_schedules::create($schedule10_8);
            }
        }

        //for schedule 10 item 9 and 10
        if(request('frm1702MX:txtPg7Sc10I9CA') != '0'){
            $schedule10_9 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '10',
                        'item'     => '9',
                        'itemA'     => request('frm1702MX:txtPg7Sc10I9CA'),
                        'itemB'     => request('frm1702MX:txtPg7Sc10I9CB'),
                        'itemC'     => request('frm1702MX:txtPg7Sc10I9CC'),
                        'itemD'     => request('frm1702MX:txtPg7Sc10I9CD'),
            ]);
            tbl_1702MX_schedules::create($schedule10_9);
        }

        if(request('frm1702MX:txtPg7Sc10I9CA') != '0'){
            $schedule10_10 = ([
                        'form_id'     => $form->id,
                        'schedule'     => '10',
                        'item'     => '10',
                        'itemA'     => request('frm1702MX:txtPg7Sc10I10CA'),
                        'itemB'     => request('frm1702MX:txtPg7Sc10I10CB'),
                        'itemC'     => request('frm1702MX:txtPg7Sc10I10CC'),
                        'itemD'     => request('frm1702MX:txtPg7Sc10I10CD'),
            ]);
            tbl_1702MX_schedules::create($schedule10_10);
        }

        //for schedule 12
        for ($e=1; $e < 21; $e++) { 
            if(request('frm1702MX:txtPg8Sc12I'.$e.'C1') != ''){
                $schedule12 = ([
                    'form_id'   => $form->id,
                    'registered_name'   => request('frm1702MX:txtPg8Sc12I'.$e.'C1'),
                    'tinA'   => request('frm1702MX:txtPg8Sc12I'.$e.'C2tin1'),
                    'tinB'   => request('frm1702MX:txtPg8Sc12I'.$e.'C2tin2'),
                    'tinC'   => request('frm1702MX:txtPg8Sc12I'.$e.'C2tin3'),
                    'tinD'   => request('frm1702MX:txtPg8Sc12I'.$e.'C2tin4'),
                    'contribution'   => request('frm1702MX:txtPg8Sc12I'.$e.'C3'),
                    'total'   => request('frm1702MX:txtPg8Sc12I'.$e.'C4'),
                ]);
                tbl_1702MX_schedule12::create($schedule12);
            }
        }

        //for schedule 13(I)
        if(null !== request('frm1702MX:txtPg9Sc13ICA')){
            for ($f=0; $f < count(request('frm1702MX:txtPg9Sc13ICA')); $f++) { 
          
                    if(request('frm1702MX:txtPg9Sc13ICA')[$f] != '0'){
                        $schedule13_1 = ([
                            'form_id'   => $form->id,
                            'item'   => ($f + 1),
                            'description'   => request('')[$f],
                            'itemA'   => request('frm1702MX:txtPg9Sc13ICA')[$f],
                            'itemB'   => request('frm1702MX:txtPg9Sc13ICB')[$f],
                            'itemC'   => request('frm1702MX:txtPg9Sc13ICB')[$f],
                        ]);
                        tbl_1702MX_schedule13_1::create($schedule13_1);
                    }
                
            }
        }

        if(null !== request('frm1702MX:txtPg9Sc13I4other')){
            for ($g=0; $g < count(request('frm1702MX:txtPg9Sc13I4other')) / 2; $g++) { 
                    if(request('frm1702MX:txtPg9Sc13I4other')[$g] != ''){
                        $schedule13_1= ([
                            'form_id'   => $form->id,
                            'item'   => '4.'.($g + 1),
                            'description'   => request('frm1702MX:txtPg9Sc13I4other')[$g],
                            'itemA'   => request('frm1702MX:txtPg9Sc13I4CA')[$g],
                            'itemB'   => request('frm1702MX:txtPg9Sc13I4CB')[$g],
                            'itemC'   => request('frm1702MX:txtPg9Sc13I4CC')[$g],
                        ]);
                        tbl_1702MX_schedule13_1::create($schedule13_1);
                    }
            }
        }
          
        //for schedule 13(II)
        if(request('frm1702MX:txtPg9Sc13I5CA') != ''){
            $schedule13_2 = ([
                'form_id'   => $form->id,
                'item5_A1'   => request('frm1702MX:txtPg9Sc13I5CA'),
                'item5_B2'   => request('frm1702MX:txtPg9Sc13I5CB'),
                'item6_A1'   => request('frm1702MX:txtPg9Sc13I6CA'),
                'item6_B2'   => request('frm1702MX:txtPg9Sc13I6CB'),
                'item7_A1'   => request('frm1702MX:txtPg9Sc13I7CA'),
                'item7_B2'   => request('frm1702MX:txtPg9Sc13I7CB'),
                'item8_A1'   => request('frm1702MX:txtPg9Sc13I8CA'),
                'item8_B2'   => request('frm1702MX:txtPg9Sc13I8CB'),
                'item9_A1'   => request('frm1702MX:txtPg9Sc13I9CA'),
                'item9_B2'   => request('frm1702MX:txtPg9Sc13I9CB'),
            ]);
            tbl_1702MX_schedule13_2::create($schedule13_2);
        }

        if(null !== request('frm1702MX:txtPg9Sc13I5CA1')){
            for ($i=0; $i < count(request('frm1702MX:txtPg9Sc13I5CA1')) / 2 ; $i++) { 
               $schedule13_2 = ([
                    'form_id'   => $form->id,
                    'item5_A1'   => request('frm1702MX:txtPg9Sc13I5CA1')[$i],
                    'item5_B2'   => request('frm1702MX:txtPg9Sc13I5CB2')[$i],
                    'item6_A1'   => request('frm1702MX:txtPg9Sc13I6CA1')[$i],
                    'item6_B2'   => request('frm1702MX:txtPg9Sc13I6CB2')[$i],
                    'item7_A1'   => request('frm1702MX:txtPg9Sc13I7CA1')[$i],
                    'item7_B2'   => request('frm1702MX:txtPg9Sc13I7CB2')[$i],
                    'item8_A1'   => request('frm1702MX:txtPg9Sc13I8CA1')[$i],
                    'item8_B2'   => request('frm1702MX:txtPg9Sc13I8CB2')[$i],
                    'item9_A1'   => request('frm1702MX:txtPg9Sc13I9CA1')[$i],
                    'item9_B2'   => request('frm1702MX:txtPg9Sc13I9CB2')[$i],
                ]);
                tbl_1702MX_schedule13_2::create($schedule13_2);
            }
        }

        //for schedule 13(III)
        if(request('frm1702MX:txtPg9Sc13I10CA-2') != ''){
            $schedule13_3 = ([
                'form_id'   => $form->id,
                'item10_A1_1' => request('frm1702MX:drpPg9Sc13I10CA-1'),
                'item10_A1_2' => request('frm1702MX:txtPg9Sc13I10CA-2'),
                'item10_B2_1' => request('frm1702MX:drpPg9Sc13I10CB-1'),
                'item10_B2_2' => request('frm1702MX:txtPg9Sc13I10CB-2'),
                'item11_A1' => request('frm1702MX:txtPg9Sc13I11CA'),
                'item11_B2' => request('frm1702MX:txtPg9Sc13I11CB'),
                'item12_A1' => request('frm1702MX:txtPg9Sc13I12CA'),
                'item12_B2' => request('frm1702MX:txtPg9Sc13I12CB'),
                'item13_A1' => request('frm1702MX:txtPg9Sc13I13CA'),
                'item13_B2' => request('frm1702MX:txtPg9Sc13I13CB'),
                'item14_A1' => request('frm1702MX:txtPg9Sc13I14CA'),
                'item14_B2' => request('frm1702MX:txtPg9Sc13I14CB'),
                'item15_A1' => request('frm1702MX:txtPg9Sc13I15CA'),
                'item15_B2' => request('frm1702MX:txtPg9Sc13I15CB'),
            ]);
            tbl_1702MX_schedule13_3::create($schedule13_3);
        }

        if(null !== request('frm1702MX:drpPg9Sc13I10CA1')){
            for ($i=0; $i < count(request('frm1702MX:drpPg9Sc13I10CA1')) / 2; $i++) { 
                $schedule13_3 = ([
                    'form_id'   => $form->id,
                    'item10_A1_1' => request('frm1702MX:drpPg9Sc13I10CA1')[$i],
                    'item10_A1_2' => request('frm1702MX:txtPg9Sc13I10CA2')[$i],
                    'item10_B2_1' => request('frm1702MX:drpPg9Sc13I10CB1')[$i],
                    'item10_B2_2' => request('frm1702MX:txtPg9Sc13I10CB2')[$i],
                    'item11_A1' => request('frm1702MX:txtPg9Sc13I11CA1')[$i],
                    'item11_B2' => request('frm1702MX:txtPg9Sc13I11CB2')[$i],
                    'item12_A1' => request('frm1702MX:txtPg9Sc13I12CA1')[$i],
                    'item12_B2' => request('frm1702MX:txtPg9Sc13I12CB2')[$i],
                    'item13_A1' => request('frm1702MX:txtPg9Sc13I13CA1')[$i],
                    'item13_B2' => request('frm1702MX:txtPg9Sc13I13CB2')[$i],
                    'item14_A1' => request('frm1702MX:txtPg9Sc13I14CA1')[$i],
                    'item14_B2' => request('frm1702MX:txtPg9Sc13I14CB2')[$i],
                    'item15_A1' => request('frm1702MX:txtPg9Sc13I15CA1')[$i],
                    'item15_B2' => request('frm1702MX:txtPg9Sc13I15CB2')[$i],
                ]);
                tbl_1702MX_schedule13_3::create($schedule13_3);
            }
        }

        //for schedule 13(IV)
        if(request('frm1702MX:txtPg9Sc13I16CA') != ''){
            $schedule13_4 = ([
                'form_id'   => $form->id,
                'item16_A1' => request('frm1702MX:txtPg9Sc13I16CA'),
                'item16_B2' => request('frm1702MX:txtPg9Sc13I16CB'),
                'item17_A1' => request('frm1702MX:txtPg9Sc13I17CA'),
                'item17_B2' => request('frm1702MX:txtPg9Sc13I17CB'),
                'item18_A1' => request('frm1702MX:txtPg9Sc13I18CA'),
                'item18_B2' => request('frm1702MX:txtPg9Sc13I18CB'),
            ]);
            tbl_1702MX_schedule13_4::create($schedule13_4);
        }

        if(null !== request('frm1702MX:txtPg9Sc13I16CA1')){
            for ($i=0; $i < count(request('frm1702MX:txtPg9Sc13I16CA1')) /2 ; $i++) { 
                $schedule13_4 = ([
                    'form_id'   => $form->id,
                    'item16_A1' => request('frm1702MX:txtPg9Sc13I16CA1')[$i],
                    'item16_B2' => request('frm1702MX:txtPg9Sc13I16CB2')[$i],
                    'item17_A1' => request('frm1702MX:txtPg9Sc13I17CA1')[$i],
                    'item17_B2' => request('frm1702MX:txtPg9Sc13I17CB2')[$i],
                    'item18_A1' => request('frm1702MX:txtPg9Sc13I18CA1')[$i],
                    'item18_B2' => request('frm1702MX:txtPg9Sc13I18CB2')[$i],
                ]);

                tbl_1702MX_schedule13_4::create($schedule13_4);
            }
        }

        //for schedule 14(I)
        if(request('frm1702MX:txtPg9Sc14I2CA') != ''){
            $schedule14_1 = ([
                'form_id'   => $form->id,
                'item2_A1'  => request('frm1702MX:txtPg9Sc14I2CA'),
                'item2_B2'  => request('frm1702MX:txtPg9Sc14I2CB'),
                'item3_A1'  => request('frm1702MX:txtPg9Sc14I3CA'),
                'item3_B2'  => request('frm1702MX:txtPg9Sc14I3CB'),
                'item4_A1'  => request('frm1702MX:txtPg9Sc14I4CA'),
                'item4_B2'  => request('frm1702MX:txtPg9Sc14I4CB'),
                'item5_A1'  => request('frm1702MX:txtPg9Sc14I5CA'),
                'item5_B2'  => request('frm1702MX:txtPg9Sc14I5CB'),
            ]);
            tbl_1702MX_schedule14_1::create($schedule14_1);
        }

        if(null !== request('frm1702MX:txtPg9Sc14I2CA1')){
            for ($i=0; $i < count(request('frm1702MX:txtPg9Sc14I2CA1')) /2 ; $i++) { 
                $schedule14_1 = ([
                    'form_id'   => $form->id,
                    'item2_A1'  => request('frm1702MX:txtPg9Sc14I2CA1')[$i],
                    'item2_B2'  => request('frm1702MX:txtPg9Sc14I2CB2')[$i],
                    'item3_A1'  => request('frm1702MX:txtPg9Sc14I3CA1')[$i],
                    'item3_B2'  => request('frm1702MX:txtPg9Sc14I3CB2')[$i],
                    'item4_A1'  => request('frm1702MX:txtPg9Sc14I4CA1')[$i],
                    'item4_B2'  => request('frm1702MX:txtPg9Sc14I4CB2')[$i],
                    'item5_A1'  => request('frm1702MX:txtPg9Sc14I5CA1')[$i],
                    'item5_B2'  => request('frm1702MX:txtPg9Sc14I5CB2')[$i],
                ]);
                tbl_1702MX_schedule14_1::create($schedule14_1);
            }
        }

        //for schedule 14(II)
        if(request('frm1702MX:txtPg9Sc14I6CA') != ''){
            $schedule14_6 = ([
                'form_id'   => $form->id,
                'item6_A1'  => request('frm1702MX:txtPg9Sc14I6CA'),
                'item6_B2'  => request('frm1702MX:txtPg9Sc14I6CB'),
                'item7_A1'  => request('frm1702MX:txtPg9Sc14I7CA'),
                'item7_B2'  => request('frm1702MX:txtPg9Sc14I7CB'),
            ]);
            tbl_1702MX_schedule14_6::create($schedule14_6);
        }

        if(null !== request('frm1702MX:txtPg9Sc14I6CA1')){
            for ($i=0; $i < count(request('frm1702MX:txtPg9Sc14I6CA1')) /2 ; $i++) { 
                $schedule14_6 = ([
                    'form_id'   => $form->id,
                    'item6_A1'  => request('frm1702MX:txtPg9Sc14I6CA1')[$i],
                    'item6_B2'  => request('frm1702MX:txtPg9Sc14I6CB2')[$i],
                    'item7_A1'  => request('frm1702MX:txtPg9Sc14I7CA1')[$i],
                    'item7_B2'  => request('frm1702MX:txtPg9Sc14I7CB2')[$i],
                ]);
                tbl_1702MX_schedule14_6::create($schedule14_6);
            }
        }

        $data2 = ([
            'form_id'   => $form->id,
            'schedA_1'     => request('frm1702MX:txtPg1AttMScAI1'),
            'schedA_2'     => request('frm1702MX:txtPg1AttMScAI2'),
            'schedA_3'     => request('frm1702MX:txtPg1AttMScAI3'),
            'schedA_4'     => request('frm1702MX:txtPg1AttMScAI4'),
            'schedA_5A'     => request('frm1702MX:txtPg1AttMScAI5month'),
            'schedA_5B'     => request('frm1702MX:txtPg1AttMScAI5year'),
            'schedA_6A'     => request('frm1702MX:txtPg1AttMScAI6month'),
            'schedA_6B'     => request('frm1702MX:txtPg1AttMScAI6year'),
            'schedB_1'     => request('frm1702MX:txtAttMScBI1'),
            'schedB_2'     => request('frm1702MX:txtAttMScBI2'),
            'schedB_3'     => request('frm1702MX:txtAttMScBI3'),
            'schedB_4'     => request('frm1702MX:txtAttMScBI4'),
            'schedB_5'     => request('frm1702MX:txtAttMScBI5'),
            'schedB_6'     => request('frm1702MX:txtAttMScBI6'),
            'schedB_7'     => request('frm1702MX:txtAttMScBI7'),
            'schedB_8'     => request('frm1702MX:txtAttMScBI8'),
            'schedB_9'     => request('frm1702MX:txtPg1AttMScBI9'),
            'schedB_10'     => request('frm1702MX:txtPg1AttMScBI10'),
            'schedB_11'     => request('frm1702MX:txtPg1AttMScBI11'),
            'schedB_12'     => request('frm1702MX:txtAttMScBI12'),
            'schedC_1'     => request('frm1702MX:txtPg1AttMScCI1'),
            'schedC_2'     => request('frm1702MX:txtPg1AttMScCI2'),
            'schedC_3'     => request('frm1702MX:txtPg1AttMScCI3'),
            'schedC_4'     => request('frm1702MX:txtPg1AttMScCI4'),
            'schedC_5'     => request('frm1702MX:txtPg1AttMScCI5'),
            'schedC_6'     => request('frm1702MX:txtPg1AttMScCI6'),
            'schedC_7'     => request('frm1702MX:txtPg1AttMScCI7'),
            'schedD_1'     => request('frm1702MX:txtPg2AttMScDI1'),
            'schedD_2'     => request('frm1702MX:txtPg2AttMScDI2'),
            'schedD_3'     => request('frm1702MX:txtPg2AttMScDI3'),
            'schedD_4'     => request('frm1702MX:txtPg2AttMScDI4'),
            'schedD_5'     => request('frm1702MX:txtPg2AttMScDI5'),
            'schedD_6'     => request('frm1702MX:txtPg2AttMScDI6'),
            'schedE1_1'     => request('frm1702MX:txtPg2AttMScE1I1'),
            'schedE1_2'     => request('frm1702MX:txtPg2AttMScE1I2'),
            'schedE1_3'     => request('frm1702MX:txtPg2AttMScE1I3'),
            'schedE1_4'     => request('frm1702MX:txtPg2AttMScE1I4'),
            'schedE1_5'     => request('frm1702MX:txtPg2AttMScE1I5'),
            'schedE2_6'     => request('frm1702MX:txtPg2AttMScE2I6'),
            'schedE2_7'     => request('frm1702MX:txtPg2AttMScE2I7'),
            'schedE2_8'     => request('frm1702MX:txtPg2AttMScE2I8'),
            'schedE2_9'     => request('frm1702MX:txtPg2AttMScE2I9'),
            'schedE2_10'     => request('frm1702MX:txtPg2AttMScE2I10'),
            'schedE2_11'     => request('frm1702MX:txtPg2AttMScE2I11'),
            'schedE2_12'     => request('frm1702MX:txtPg2AttMScE2I12'),
            'schedE2_13'     => request('frm1702MX:txtPg2AttMScE2I13'),
            'schedE2_14'     => request('frm1702MX:txtPg2AttMScE2I14'),
            'schedE2_15'     => request('frm1702MX:txtPg2AttMScE2I15'),
            'schedE2_16'     => request('frm1702MX:txtPg2AttMScE2I16'),
            'schedE2_17'     => request('frm1702MX:txtPg2AttMScE2I17'),
            'schedE2_18'     => request('frm1702MX:txtPg2AttMScE2I18'),
            'schedE2_19'     => request('frm1702MX:txtPg2AttMScE2I19'),
            'schedE3_20'     => request('frm1702MX:txtPg2AttMScE3I20'),
            'schedE3_21'     => request('frm1702MX:txtPg2AttMScE3I21'),
            'schedE3_22'     => request('frm1702MX:txtPg2AttMScE3I22'),
            'schedE3_23'     => request('frm1702MX:txtPg2AttMScE3I23'),
            'schedE3_24'     => request('frm1702MX:txtPg2AttMScE3I24'),
            'schedE3_25'     => request('frm1702MX:txtPg2AttMScE3I25'),
            'schedE3_26'     => request('frm1702MX:txtPg2AttMScE3I26'),
            'schedE3_27'     => request('frm1702MX:txtPg2AttMScE3I27'),
            'schedF_4'     => request('frm1702MX:txtPg3EX1ScFI4C1'),
            'schedG_1'     => request('frm1702MX:txtPg3EX1ScGI1'),
            'schedG_5'     => request('frm1702MX:txtPg3EX1ScGI5'),
            'schedG_6'     => request('frm1702MX:txtPg3EX1ScGI6'),
            'schedG_7'     => request('frm1702MX:txtPg3EX1ScGI7'),
            'schedG_8'     => request('frm1702MX:txtPg3EX1ScGI8'),
            'schedG_9'     => request('frm1702MX:txtPg3EX1ScGI9'),
            'schedG_10'     => request('frm1702MX:txtPg3EX1ScGI10'),
            'schedG_11'     => request('frm1702MX:txtPg3EX1ScGI11'),
            'schedG_12'     => request('frm1702MX:txtPg3EX1ScGI12'),
            'schedG_13'     => request('frm1702MX:txtPg3EX1ScGI13'),
            'schedG_14'     => request('frm1702MX:txtPg3EX1ScGI14'),
            'schedG_15'     => request('frm1702MX:txtPg3EX1ScGI15'),
            'schedG_16'     => request('frm1702MX:txtPg3EX1ScGI16'),
            'schedG_17'     => request('frm1702MX:txtPg3EX1ScGI17'),
            'schedG_18'     => request('frm1702MX:txtPg3EX1ScGI18'),
            'schedG_19'     => request('frm1702MX:txtPg3EX1ScGI19'),
            'schedG_20'     => request('frm1702MX:txtPg3EX1ScGI20'),
            'schedG_21'     => request('frm1702MX:txtPg3EX1ScGI21'),
            'schedG_22'     => request('frm1702MX:txtPg3EX1ScGI22'),
            'schedG_23'     => request('frm1702MX:txtPg3EX1ScGI23'),
            'schedG_24'     => request('frm1702MX:txtPg3EX1ScGI24'),
            'schedG_25'     => request('frm1702MX:txtPg3EX1ScGI25'),
            'schedG_26'     => request('frm1702MX:txtPg3EX1ScGI26'),
            'schedG_27'     => request('frm1702MX:txtPg3EX1ScGI27'),
            'schedG_28'     => request('frm1702MX:txtPg3EX1ScGI28'),
            'schedG_29'     => request('frm1702MX:txtPg3EX1ScGI29'),
            'schedG_30'     => request('frm1702MX:txtPg4EX1ScGI30'),
            'schedG_31'     => request('frm1702MX:txtPg4EX1ScGI31'),
            'schedG_32'     => request('frm1702MX:txtPg4EX1ScGI32'),
            'schedG_33'     => request('frm1702MX:txtPg4EX1ScGI33'),
            'schedG_34'     => request('frm1702MX:txtPg4EX1ScGI34'),
            'schedG_35'     => request('frm1702MX:txtPg4EX1ScGI35'),
            'schedG_40'     => request('frm1702MX:txtPg4EX1ScGI40'),
            'schedH_5'     => request('frm1702MX:txtPg4EX1ScHI5'),
            'schedI_1'     => request('frm1702MX:txtPg4EX1ScII1'),
            'schedI_2'     => request('frm1702MX:txtPg4EX1ScII2'),
            'schedI_3'     => request('frm1702MX:txtPg4EX1ScII3'),
            'schedIA_4_year' => request('frm1702MX:txtPg4EX1ScIAI4year'),
            'schedIA_4_A' => request('frm1702MX:txtPg4EX1ScIAI4CA'),
            'schedIA_4_B' => request('frm1702MX:txtPg4EX1ScIAI4CB'),
            'schedIA_4_C' => request('frm1702MX:txtPg4EX1ScIAI4CC'),
            'schedIA_4_D' => request('frm1702MX:txtPg4EX1ScIAI4CD'),
            'schedIA_4_E' => request('frm1702MX:txtPg4EX1ScIAI4CE'),
            'schedIA_5_year' => request('frm1702MX:txtPg4EX1ScIAI5year'),
            'schedIA_5_A' => request('frm1702MX:txtPg4EX1ScIAI5CA'),
            'schedIA_5_B' => request('frm1702MX:txtPg4EX1ScIAI5CB'),
            'schedIA_5_C' => request('frm1702MX:txtPg4EX1ScIAI5CC'),
            'schedIA_5_D' => request('frm1702MX:txtPg4EX1ScIAI5CD'),
            'schedIA_5_E' => request('frm1702MX:txtPg4EX1ScIAI5CE'),
            'schedIA_6_year' => request('frm1702MX:txtPg4EX1ScIAI6year'),
            'schedIA_6_A' => request('frm1702MX:txtPg4EX1ScIAI6CA'),
            'schedIA_6_B' => request('frm1702MX:txtPg4EX1ScIAI6CB'),
            'schedIA_6_C' => request('frm1702MX:txtPg4EX1ScIAI6CC'),
            'schedIA_6_D' => request('frm1702MX:txtPg4EX1ScIAI6CD'),
            'schedIA_6_E' => request('frm1702MX:txtPg4EX1ScIAI6CE'),
            'schedIA_7_year' => request('frm1702MX:txtPg4EX1ScIAI7year'),
            'schedIA_7_A' => request('frm1702MX:txtPg4EX1ScIAI7CA'),
            'schedIA_7_B' => request('frm1702MX:txtPg4EX1ScIAI7CB'),
            'schedIA_7_C' => request('frm1702MX:txtPg4EX1ScIAI7CC'),
            'schedIA_7_D' => request('frm1702MX:txtPg4EX1ScIAI7CD'),
            'schedIA_7_E' => request('frm1702MX:txtPg4EX1ScIAI7CE'),
            'schedI_8'     => request('frm1702MX:txtPg4EX1ScIAI8CD'),
        ]);
        
        if(request('form_id') != ""){
            $page2 = tbl_1702MX_attachments::find(request('form_id'));
            $page2->update($data2);
        }else{
            $page2 = tbl_1702MX_attachments::find($form->id);
            if(empty($page2)){
                tbl_1702MX_attachments::create($data2);
            }else{
                $page2->update($data2);
            }
        }

        //for attachement page 3 Schedule F
        for ($w=1; $w < 4 ; $w++) { 
            if(request('frm1702MX:txtPg3EX1ScFI'.$w.'other') != ''){
                $scheduleF = ([
                    'form_id'   => $form->id,
                    'schedule'  => 'F',
                    'item'  => $w,
                    'description'   => request('frm1702MX:txtPg3EX1ScFI'.$w.'other'),
                    'amount'    => request('frm1702MX:txtPg3EX1ScFI'.$w.'C1'),
                ]);
                tbl_1702MX_attachment_schedules::create($scheduleF);
            }
        }

        if(null !== request('frm1702MX:txtPg3EX1ScF_Col1')){
            for ($i=0; $i < count(request('frm1702MX:txtPg3EX1ScF_Col1')) ; $i++) { 
                $scheduleF = ([
                    'form_id'   => $form->id,
                    'schedule'  => 'F',
                    'item'  => '3.'.($i+1),
                    'description'   => request('frm1702MX:txtPg3EX1ScF_Col1')[$i],
                    'amount'    => request('frm1702MX:txtPg3EX1ScF_Col2')[$i],
                ]);
                tbl_1702MX_attachment_schedules::create($scheduleF);
            }
        }

        //for attachments Page 3 schedule G 
        for ($x=2; $x < 5 ; $x++) { 
            if(request('frm1702MX:txtPg3EX1ScGI'.$x.'other') != ''){
                $scheduleG = ([
                    'form_id'   => $form->id,
                    'schedule'  => 'G',
                    'item'  => $x,
                    'description'   => request('frm1702MX:txtPg3EX1ScGI'.$x.'other'),
                    'amount'    => request('frm1702MX:txtPg3EX1ScGI'.$x.'C1'),
                ]);
                tbl_1702MX_attachment_schedules::create($scheduleG);
            }
        }

        if(null !== request('frm1702MX:txtPg3EX1ScGI4_Col1')){
            for ($i=0; $i < count(request('frm1702MX:txtPg3EX1ScGI4_Col1')) ; $i++) { 
                $scheduleG = ([
                    'form_id'   => $form->id,
                    'schedule'  => 'G',
                    'item'  => '4.'.($i+1),
                    'description'   => request('frm1702MX:txtPg3EX1ScGI4_Col1')[$i],
                    'amount'    => request('frm1702MX:txtPg3EX1ScGI4_Col2')[$i],
                ]);
                tbl_1702MX_attachment_schedules::create($scheduleG);
            }
        }

        //for attachments Page 4 schedule G
        for ($y=36; $y < 40 ; $y++) { 
            if(request('frm1702MX:txtPg4EX1ScGI36other') != ''){
                $scheduleG = ([
                    'form_id'   => $form->id,
                    'schedule'  => 'G',
                    'item'  => $y,
                    'description'   => request('frm1702MX:txtPg4EX1ScGI'.$y.'other'),
                    'amount'    => request('frm1702MX:txtPg4EX1ScGI'.$y.'C1'),
                ]);
                tbl_1702MX_attachment_schedules::create($scheduleG);
            }
        }

        if(null !== request('frm1702MX:txtPg4EX1ScGI39_Col1')){
            for ($i=0; $i < count(request('frm1702MX:txtPg4EX1ScGI39_Col1')) ; $i++) { 
                $scheduleG = ([
                    'form_id'   => $form->id,
                    'schedule'  => 'G',
                    'item'  => '39.'.($i+1),
                    'description'   => request('frm1702MX:txtPg4EX1ScGI39_Col1')[$i],
                    'amount'    => request('frm1702MX:txtPg4EX1ScGI39_Col2')[$i],
                ]);
                tbl_1702MX_attachment_schedules::create($scheduleG);
            }
        }

        //for attachment Page 4 Schedule H
        for ($y=1; $y < 5 ; $y++) { 
            if(request('frm1702MX:txtPg4EX1ScHI'.$y.'C1') != ''){
                $scheduleH = ([
                    'form_id'   => $form->id,
                    'item'  => $y,
                    'description'   => request('frm1702MX:txtPg4EX1ScHI'.$y.'C1'),
                    'legal_basis'   => request('frm1702MX:txtPg4EX1ScHI'.$y.'C2'),
                    'amount'    => request('frm1702MX:txtPg4EX1ScHI'.$y.'C3'),
                ]);
                tbl_1702MX_attachment_schedule_h::create($scheduleH);
            }
        }

        if(null !== request('frm1702MX:txtPg4EX1ScHI4_Col1')){
            for ($i=0; $i < count(request('frm1702MX:txtPg4EX1ScHI4_Col1')) ; $i++) { 
                $scheduleH = ([
                    'form_id'   => $form->id,
                    'schedule'  => 'H',
                    'item'  => '4.'.($i+1),
                    'description'   => request('frm1702MX:txtPg4EX1ScHI4_Col1')[$i],
                    'legal_basis'   => request('frm1702MX:txtPg4EX1ScHI4_Col2')[$i],
                    'amount'    => request('frm1702MX:txtPg4EX1ScHI4_Col3')[$i],
                ]);
                tbl_1702MX_attachment_schedule_h::create($scheduleH);
            }
        }

    }

    public function saveXML()
    {
            config(['database.connections.mysql2.database' => Auth::user()->database_name]);

            

            $getForm = tbl_1702MX::where('form_no', request('form_no'))
                                   ->where('company_id', request('company'))->get();

            $form = "";
            if(request('form_id') != ""){
                $form = tbl_1702MX::find(request('form_id'));
            }else{
                $form = tbl_1702MX::find($getForm[0]->id);
            }

            $tin = request('tin');

            $return_period = request('item2A').request('item2B');

            $getReturnPeriod = tbl_1702MX::where('company_id',  request('company'))
                            ->where('item2A', request('item2A'))
                            ->where('item2B', request('item2B'))
                            ->count();

            $filename = "";
            if($getReturnPeriod == "1"){
                $filename = $tin."-1702MX-".request('item2A').request('item2B').'.xml';
            }else{
                if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1702MX')
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
                $filename = $tin."-1702MX-".request('item2A').request('item2B').$ext.'.xml';
            }

            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1702MX')
                            ->get();

            $action = "";
            if(request('form_id') != ""){
                $action ="update";
            }else{
                if($getXml->isEmpty()){
                    $action = "insert";
                }else{
                    $action = "update";
                }
            }  

            $xmlData = "<?xml version='1.0'?>	
            ".str_replace('\n', '',request('xml'));

            if($action == "insert"){
                $myXMLFile = fopen("savefile/".$filename, "w");
                fwrite($myXMLFile, $xmlData);
                fclose($myXMLFile);

                $data_xml = ([
                    'user_id'       => Auth::user()->id,
                    'company_id'    => request('company'),
                    'form_id'       => $form->id,
                    'form'          => '1702MX',
                    'file_name'     => $filename,
                    'return_period' => $return_period,
                    'status'        => 'Saved',
                ]);

                $xml_id = Xml::create($data_xml);

            }else{
                
                $path = "savefile/".$getXml[0]->file_name;
                if (file_exists($path)) {
                    unlink($path);
                }

                $myXMLFile = fopen("savefile/".$filename, "w");
                fwrite($myXMLFile, $xmlData);
                fclose($myXMLFile);

                $data_xml = ([
                    'user_id'       => Auth::user()->id,
                    'company_id'    => request('company'),
                    'form_id'       => $form->id,
                    'form'          => '1702MX',
                    'file_name'     => $getXml[0]->file_name,
                    'return_period' => $return_period,
                    'status'        => 'Saved',
                ]);
                
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
                            ->where('form', '1702MX')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1702MX::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1702MX')
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

        $data = tbl_1702MX::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1702MX')
                            ->get();
        return view('forms.BIR-Form 1702MX',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2200A;
use App\tbl_2200A_cal1;
use App\tbl_2200A_cal2;
use App\tbl_2200A_cal3;
use App\tbl_2200A_cal4;
use App\tbl_2200A_cal5;
use App\tbl_2200A_schedule1;
use App\tbl_2200A_schedule_others;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2200AController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2200_as')){

            }else{
                Schema::connection('mysql2')->create('tbl_2200_as', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item1C')->nullable();
                    $table->string('item2');
                    $table->string('item3');
                    $table->string('item10')->nullable();
                    $table->string('item12A')->nullable();
                    $table->string('item12B')->nullable();
                    $table->string('item12C')->nullable();
                    $table->string('item13A')->nullable();
                    $table->string('item13B')->nullable();
                    $table->string('item13C')->nullable();
                    $table->string('item14')->nullable();
                    $table->string('item14A')->nullable();
                    $table->string('item15')->nullable();
                    $table->string('item17')->nullable();
                    $table->string('item17_other')->nullable();
                    $table->text('item18');
                    $table->text('item19A');
                    $table->text('item19B');
                    $table->text('item19C');
                    $table->text('item20');
                    $table->text('item21');
                    $table->text('item22');
                    $table->text('item23A');
                    $table->text('item23B');
                    $table->text('item23C');
                    $table->text('item23D');
                    $table->text('item24');
                    $table->text('item25A');
                    $table->text('item25B');
                    $table->text('item25C');
                    $table->text('item26');
                    $table->text('total_due');
                    $table->text('SubTotal_XA035_Bottle');
                    $table->text('SubTotal_XA035_Bulk');
                    $table->text('SubTotal_XA036_Bottle');
                    $table->text('SubTotal_XA036_Bulk');
                    $table->text('SubTotal_XA061');
                    $table->text('SubTotal_XA062');
                    $table->text('SubTotal_XA070');
                    $table->text('SubTotal_XA080');
                    $table->text('SubTotal_XA055');
                    $table->text('SubTotal_XA056');
                    $table->text('SubTotal_XA057');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_a_schedule1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('export')->nullable();
                    $table->text('taxable')->nullable();
                    $table->text('tax_due')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_a_schedule_others', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc')->nullable();
                    $table->text('description')->nullable();
                    $table->text('measure')->nullable();
                    $table->text('tax_rate')->nullable();
                    $table->text('export')->nullable();
                    $table->text('taxable')->nullable();
                    $table->text('tax_due')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_a_cal1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('brand')->nullable();
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->text('itemE')->nullable();
                    $table->text('itemF')->nullable();
                    $table->text('tax_base')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_a_cal2s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('brand')->nullable();
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_a_cal3s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('brand')->nullable();
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->text('itemE')->nullable();
                    $table->text('itemF')->nullable();
                    $table->text('itemG')->nullable();
                    $table->text('tax_base')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_a_cal4s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('brand')->nullable();
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_a_cal5s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc')->nullable();
                    $table->text('description')->nullable();
                    $table->text('itemA')->nullable();
                    $table->text('itemB')->nullable();
                    $table->text('itemC')->nullable();
                    $table->text('itemD')->nullable();
                    $table->text('itemE')->nullable();
                    $table->timestamps();
                });

            }
           
	        return view('forms.BIR-Form 2200A',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_2200A::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2200A')
                            ->get();
        
        	return view('forms.BIR-Form 2200A',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
        
    }
    public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
        	'form_no'   => request('form_no'),
			'company_id'   => request('company'),
			'item1A'   => request('frm2200A:txtMonth1'),
			'item1B'   => request('frm2200A:txtDate'),
			'item1C'   => request('frm2200A:txtForYr'),
			'item2'   => request('frm2200A:amendedRtn'),
			'item3'   => request('frm2200A:txtSheets'),
			'item10'   => request('frm2200A:txtPSIC'),
			'item12A'   => request('frm2200A:txt12optRegion'),
			'item12B'   => request('frm2200A:txt12optProvince'),
			'item12C'   => request('frm2200A:txt12optCity'),
			'item13A'   => request('frm2200A:txt13optRegion1'),
			'item13B'   => request('frm2200A:txt13optProvince1'),
			'item13C'   => request('frm2200A:txt13optCity1'),
			'item14'   => request('frm2200A:optTreaty'),
			'item14A'   => request('frm2200A:lstTaxTreaty'),
			'item15'   => null !== request('frm2200A:chkPymntManner') ? request('frm2200A:chkPymntManner') : '',
			'item17'   => null !== request('frm2200A:chkPymntMannerother') ? request('frm2200A:chkPymntMannerother') : '',
			'item17_other'   => request('frm2200A:txt17OthMannerofPymnt'),
			'item18'   => request('frm2200A:txtTax18'),
			'item19A'   => request('frm2200A:txtTax19A'),
			'item19B'   => request('frm2200A:txtTax19B'),
			'item19C'   => request('frm2200A:txtTax19C'),
			'item20'   => request('frm2200A:txtTax20'),
			'item21'   => request('frm2200A:txtTax21'),
			'item22'   => request('frm2200A:txtTax22'),
			'item23A'   => request('frm2200A:txtTax23A'),
			'item23B'   => request('frm2200A:txtTax23B'),
			'item23C'   => request('frm2200A:txtTax23C'),
			'item23D'   => request('frm2200A:txtTax23D'),
			'item24'   => request('frm2200A:txtTax24'),
			'item25A'   => request('frm2200A:txtTax25A'),
			'item25B'   => request('frm2200A:txtTax25B'),
			'item25C'   => request('frm2200A:txtTax25C'),
			'item26'   => request('frm2200A:txtTax26'),
			'total_due' => request('frm2200A:totalTaxDue'),
			'SubTotal_XA035_Bottle'   => request('CalcSubTotalXA035Bottle'),
			'SubTotal_XA035_Bulk'   => request('CalcSubTotalXA035Bulk'),
			'SubTotal_XA036_Bottle'   => request('CalcSubTotalXA036Bottle'),
			'SubTotal_XA036_Bulk'   => request('CalcSubTotalXA036Bulk'),
			'SubTotal_XA061'   => request('CalcSubTotalXA061'),
			'SubTotal_XA062'   => request('CalcSubTotalXA062'),
			'SubTotal_XA070'   => request('CalcSubTotalXA070'),
			'SubTotal_XA080'   => request('CalcSubTotalXA080'),
			'SubTotal_XA055'   => request('CalcSubTotalXA055'),
			'SubTotal_XA056'   => request('CalcSubTotalXA056'),
			'SubTotal_XA057'   => request('CalcSubTotalXA057'),
        ]);

        $getForm = tbl_2200A::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
     	$trans = "";
        if(request('form_id') != ""){
            $form = tbl_2200A::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2200A::create($data);
            }else{
                $form = tbl_2200A::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_2200A_schedule1::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200A_cal1::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200A_cal2::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200A_cal3::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200A_cal4::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200A_cal5::where('form_id', $getForm[0]->id)->delete();
        }

        for ($i=1; $i < 2 ; $i++) { 
        	if(request('frm2200A:xa1_exempt'.$i.'') != '0.00'){
        		$schedule = ([
        				'form_id'  => $form->id,
        				'export'   => request('frm2200A:xa1_exempt'.$i.''),
						'taxable'   => request('frm2200A:xa1_taxable'.$i.''),
						'tax_due'   => request('frm2200A:xa1_exciseTaxDue'.$i.''),
        			]);
        		tbl_2200A_schedule1::create($schedule);
        	}
        }

        for ($x=1; $x < 5 ; $x++) { 
        	if(request('frm2200A:xa2_exempt'.$x.'') != '0.00'){
        		$schedule = ([
        				'form_id'  => $form->id,
        				'export'   => request('frm2200A:xa2_exempt'.$x.''),
						'taxable'   => request('frm2200A:xa2_taxable'.$x.''),
						'tax_due'   => request('frm2200A:xa2_exciseTaxDue'.$x.''),
        			]);
        		tbl_2200A_schedule1::create($schedule);
        	}
        }

        for ($y=1; $y < 3 ; $y++) { 
        	if(request('frm2200A:xa2_exempt'.$y.'') != '0.00'){
        		$schedule = ([
        				'form_id'  => $form->id,
        				'export'   => request('frm2200A:xa3_exempt'.$y.''),
						'taxable'   => request('frm2200A:xa3_taxable'.$y.''),
						'tax_due'   => request('frm2200A:xa3_exciseTaxDue'.$y.''),
        			]);
        		tbl_2200A_schedule1::create($schedule);
        	}
        }

        for ($z=0; $z < count(request('frm2200A:sched1Atc')) ; $z++) { 
        	if(request('frm2200A:sched1Atc')[$z] != 'XA'){
        		$others = ([
        				'form_id'  => $form->id,
        				'atc'   => request('frm2200A:sched1Atc')[$z],
						'description'   => request('frm2200A:sched1Desc')[$z],
						'measure'   => request('frm2200A:sched1TaxBracket')[$z],
						'tax_rate'   => request('frm2200A:sched1AppRate')[$z],
						'export'   => request('frm2200A:sched1Exempt')[$z],
						'taxable'   => request('frm2200A:sched1Taxable')[$z],
						'tax_due'   => request('frm2200A:sched1ExciseTaxDue')[$z],
        			]);
        		tbl_2200A_schedule_others::create($others);
        	}
        }

        /*XA035 Bottle*/
        if(null !== request('frm2200A:CalXA035Bottle_Col2')){
        	for ($i=0; $i < count(request('frm2200A:CalXA035Bottle_Col2')) ; $i++) { 
        		$cal1 = ([
        				'form_id'  => $form->id,
        				'brand'   => request('frm2200A:CalXA035Bottle_Col2')[$i],
						'itemA'   => request('frm2200A:CalXA035Bottle_Col3')[$i],
						'itemB'   => request('frm2200A:CalXA035Bottle_Col4')[$i],
						'itemC'   => request('frm2200A:CalXA035Bottle_Col5')[$i],
						'itemD'   => request('frm2200A:CalXA035Bottle_Col6')[$i],
						'itemE'   => request('frm2200A:CalXA035Bottle_Col7')[$i],
						'itemF'   => request('frm2200A:CalXA035Bottle_Col8')[$i],
						'tax_base'   => request('frm2200A:CalXA035Bottle_Col9')[$i],
        			]);
        		tbl_2200A_cal1::create($cal1);
        	}
        }

        /*XA035 Bulk*/
        if(null !== request('frm2200A:CalXA035Bulk_Col2')){
        	for ($i=0; $i < count(request('frm2200A:CalXA035Bulk_Col2')) ; $i++) { 
        		$cal2 = ([
        				'form_id'  => $form->id,
        				'brand'   => request('frm2200A:CalXA035Bulk_Col2')[$i],
						'itemA'   => request('frm2200A:CalXA035Bulk_Col3')[$i],
						'itemB'   => request('frm2200A:CalXA035Bulk_Col4')[$i],
						'itemC'   => request('frm2200A:CalXA035Bulk_Col5')[$i],
						'itemD'   => request('frm2200A:CalXA035Bulk_Col6')[$i],
        			]);
        		tbl_2200A_cal2::create($cal2);
        	}
        }

        /*XA036 Bottle*/
        if(null !== request('frm2200A:CalXA036Bottle_Col2')){
        	for ($i=0; $i < count(request('frm2200A:CalXA036Bottle_Col2')) ; $i++) { 
        		$cal3 = ([
        				'form_id'  => $form->id,
        				'brand'   => request('frm2200A:CalXA036Bottle_Col2')[$i],
						'itemA'   => request('frm2200A:CalXA036Bottle_Col3')[$i],
						'itemB'   => request('frm2200A:CalXA036Bottle_Col4')[$i],
						'itemC'   => request('frm2200A:CalXA036Bottle_Col5')[$i],
						'itemD'   => request('frm2200A:CalXA036Bottle_Col6')[$i],
						'itemE'   => request('frm2200A:CalXA036Bottle_Col7')[$i],
						'itemF'   => request('frm2200A:CalXA036Bottle_Col8')[$i],
						'itemG'   => request('frm2200A:CalXA036Bottle_Col9')[$i],
						'tax_base'   => request('frm2200A:CalXA036Bottle_Col10')[$i],
					]);
        		tbl_2200A_cal3::create($cal3);
        	}
        }

        /*XA036 Bulk*/
        if(null !== request('frm2200A:CalXA036Bulk_Col2')){
        	for ($i=0; $i < count(request('frm2200A:CalXA036Bulk_Col2')) ; $i++) { 
        		$cal4 = ([
        				'form_id'  => $form->id,
        				'brand'   => request('frm2200A:CalXA036Bulk_Col2')[$i],
						'itemA'   => request('frm2200A:CalXA036Bulk_Col3')[$i],
						'itemB'   => request('frm2200A:CalXA036Bulk_Col4')[$i],
						'itemC'   => request('frm2200A:CalXA036Bulk_Col5')[$i],
						'itemD'   => request('frm2200A:CalXA036Bulk_Col6')[$i],
        			]);
        		tbl_2200A_cal4::create($cal4);
        	}
        }

        /*XA061*/
        if(null !== request('frm2200A:CalXA061_Col2')){
        	for ($i=0; $i < count(request('frm2200A:CalXA061_Col2')) ; $i++) { 
        		$cal5 = ([
        				'form_id'  => $form->id,
						'atc'   => 'XA061',
						'description'   => request('frm2200A:CalXA061_Col2')[$i],
						'itemA'   => request('frm2200A:CalXA061_Col3')[$i],
						'itemB'   => request('frm2200A:CalXA061_Col4')[$i],
						'itemC'   => request('frm2200A:CalXA061_Col5')[$i],
						'itemD'   => request('frm2200A:CalXA061_Col6')[$i],
						'itemE'   => request('frm2200A:CalXA061_Col7')[$i],
        			]);
        		tbl_2200A_cal5::create($cal5);
        	}
        }

        /*XA062*/
        if(null !== request('frm2200A:CalXA062_Col2')){
        	for ($i=0; $i < count(request('frm2200A:CalXA062_Col2')) ; $i++) { 
        		$cal5 = ([
        				'form_id'  => $form->id,
						'atc'   => 'XA062',
						'description'   => request('frm2200A:CalXA062_Col2')[$i],
						'itemA'   => request('frm2200A:CalXA062_Col3')[$i],
						'itemB'   => request('frm2200A:CalXA062_Col4')[$i],
						'itemC'   => request('frm2200A:CalXA062_Col5')[$i],
						'itemD'   => request('frm2200A:CalXA062_Col6')[$i],
						'itemE'   => request('frm2200A:CalXA062_Col7')[$i],
        			]);
        		tbl_2200A_cal5::create($cal5);
        	}
        }

        /*XA070*/
        if(null !== request('frm2200A:CalXA070_Col2')){
        	for ($i=0; $i < count(request('frm2200A:CalXA070_Col2')) ; $i++) { 
        		$cal5 = ([
        				'form_id'  => $form->id,
						'atc'   => 'XA070',
						'description'   => request('frm2200A:CalXA070_Col2')[$i],
						'itemA'   => request('frm2200A:CalXA070_Col3')[$i],
						'itemB'   => request('frm2200A:CalXA070_Col4')[$i],
						'itemC'   => request('frm2200A:CalXA070_Col5')[$i],
						'itemD'   => request('frm2200A:CalXA070_Col6')[$i],
						'itemE'   => request('frm2200A:CalXA070_Col7')[$i],
        			]);
        		tbl_2200A_cal5::create($cal5);
        	}
        }

        /*XA080*/
        if(null !== request('frm2200A:CalXA080_Col2')){
        	for ($i=0; $i < count(request('frm2200A:CalXA080_Col2')) ; $i++) { 
        		$cal5 = ([
        				'form_id'  => $form->id,
						'atc'   => 'XA080',
						'description'   => request('frm2200A:CalXA080_Col2')[$i],
						'itemA'   => request('frm2200A:CalXA080_Col3')[$i],
						'itemB'   => request('frm2200A:CalXA080_Col4')[$i],
						'itemC'   => request('frm2200A:CalXA080_Col5')[$i],
						'itemD'   => request('frm2200A:CalXA080_Col6')[$i],
						'itemE'   => request('frm2200A:CalXA080_Col7')[$i],
        			]);
        		tbl_2200A_cal5::create($cal5);
        	}
        }

        /*XA055*/
        if(null !== request('frm2200A:CalXA055_Col2')){
        	for ($i=0; $i < count(request('frm2200A:CalXA055_Col2')) ; $i++) { 
        		$cal5 = ([
        				'form_id'  => $form->id,
						'atc'   => 'XA055',
						'description'   => request('frm2200A:CalXA055_Col2')[$i],
						'itemA'   => request('frm2200A:CalXA055_Col3')[$i],
						'itemB'   => request('frm2200A:CalXA055_Col4')[$i],
						'itemC'   => request('frm2200A:CalXA055_Col5')[$i],
						'itemD'   => request('frm2200A:CalXA055_Col6')[$i],
						'itemE'   => request('frm2200A:CalXA055_Col7')[$i],
        			]);
        		tbl_2200A_cal5::create($cal5);
        	}
        }

        /*XA056*/
        if(null !== request('frm2200A:CalXA056_Col2')){
        	for ($i=0; $i < count(request('frm2200A:CalXA056_Col2')) ; $i++) { 
        		$cal5 = ([
        				'form_id'  => $form->id,
						'atc'   => 'XA056',
						'description'   => request('frm2200A:CalXA056_Col2')[$i],
						'itemA'   => request('frm2200A:CalXA056_Col3')[$i],
						'itemB'   => request('frm2200A:CalXA056_Col4')[$i],
						'itemC'   => request('frm2200A:CalXA056_Col5')[$i],
						'itemD'   => request('frm2200A:CalXA056_Col6')[$i],
						'itemE'   => request('frm2200A:CalXA056_Col7')[$i],
        			]);
        		tbl_2200A_cal5::create($cal5);
        	}
        }

        /*XA057*/
        if(null !== request('frm2200A:CalXA057_Col2')){
        	for ($i=0; $i < count(request('frm2200A:CalXA057_Col2')) ; $i++) { 
        		$cal5 = ([
        				'form_id'  => $form->id,
						'atc'   => 'XA057',
						'description'   => request('frm2200A:CalXA057_Col2')[$i],
						'itemA'   => request('frm2200A:CalXA057_Col3')[$i],
						'itemB'   => request('frm2200A:CalXA057_Col4')[$i],
						'itemC'   => request('frm2200A:CalXA057_Col5')[$i],
						'itemD'   => request('frm2200A:CalXA057_Col6')[$i],
						'itemE'   => request('frm2200A:CalXA057_Col7')[$i],
        			]);
        		tbl_2200A_cal5::create($cal5);
        	}
        }

        $amendedRtn_1 = "false";
        $amendedRtn_2 = "false";

        if( request('frm2200A:amendedRtn') == "Y"){
          $amendedRtn_1 = "true";
        }else if( request('frm2200A:amendedRtn') == "N"){
          $amendedRtn_2 = "true";
        }

        $optTreaty_1 = "false";
        $optTreaty_2 = "false";

        if( request('frm2200A:optTreaty') == "Y"){
	          $optTreaty_1 = "true";
	    }else if( request('frm2200A:optTreaty') == "N"){
	          $optTreaty_2 = "true";
	    }

        $taxPayerName =  rawurlencode(request('frm2200A:txtTaxPayerName'));

        $address = rawurlencode(request('frm2200A:txtAddress'));

        $lineOfBusiness =  rawurlencode(request('frm2200A:txtLineBus'));

        $chkPymntManner_1 = "false";
        $chkPymntManner_2 = "false";
        $chkPymntManner_3 = "false";
        if(null !== request('frm2200A:chkPymntManner')){
        	if(request('frm2200A:chkPymntManner') == 'Removal'){
        		$chkPymntManner_1 = "true";
        	}else if(request('frm2200A:chkPymntManner') == 'Deposit'){
        		$chkPymntManner_2 = "true";
        	}
        }

        if(null !== request('frm2200A:chkPymntMannerother')){
        	if(request('frm2200A:chkPymntMannerother') == 'Other'){
        		$chkPymntManner_3 = "true";
        	}
        }

        /*Other Schedules*/
        $other_schedules = "";
        for ($z=1; $z < count(request('frm2200A:sched1Atc')) ; $z++) { 
            if(request('frm2200A:sched1Atc')[$z] != 'XA'){
                $other_schedules .= "<div>frm2200A:sched1Chk".$z."=".(null !== request('frm2200A:sched1Chk'.$z.'') ? 'true' : 'false')."frm2200A:sched1Chk".$z."=</div>    
            <div>frm2200A:sched1Atc".$z."=".request('frm2200A:sched1Atc')[$z]."frm2200A:sched1Atc".$z."=</div>    
            <div>frm2200A:sched1Desc".$z."=".request('frm2200A:sched1Desc')[$z]."frm2200A:sched1Desc".$z."=</div>    
            <div>frm2200A:sched1TaxBracket".$z."=".request('frm2200A:sched1TaxBracket')[$z]."frm2200A:sched1TaxBracket".$z."=</div>    
            <div>frm2200A:sched1AppRate".$z."=".request('frm2200A:sched1AppRate')[$z]."frm2200A:sched1AppRate".$z."=</div>    
            <div>frm2200A:sched1Exempt".$z."=".str_replace(',', '%2C',request('frm2200A:sched1Exempt')[$z])."frm2200A:sched1Exempt".$z."=</div>    
            <div>frm2200A:sched1Taxable".$z."=".str_replace(',', '%2C',request('frm2200A:sched1Taxable')[$z])."frm2200A:sched1Taxable".$z."=</div>    
            <div>frm2200A:sched1ExciseTaxDue".$z."=".str_replace(',', '%2C',request('frm2200A:sched1ExciseTaxDue')[$z])."frm2200A:sched1ExciseTaxDue".$z."=</div>    
            ";
            }
        }

        /*XA035 Bottle*/
        $xa035_bottle = "";
        if(null !== request('frm2200A:CalXA035Bottle_Col2')){
            for ($i=0; $i < count(request('frm2200A:CalXA035Bottle_Col2')) ; $i++) { 
                $xa035_bottle .= "<div>frm2200A:CalXA035Bottle_".($i + 1)."_Col1=".(null !== request('frm2200A:CalXA035Bottle_'.($i + 1).'_Col1') ? 'true' : 'false')."frm2200A:CalXA035Bottle_".($i + 1)."_Col1=</div>    
            <div>frm2200A:CalXA035Bottle_".($i + 1)."_Col2=".request('frm2200A:CalXA035Bottle_Col2')[$i]."frm2200A:CalXA035Bottle_".($i + 1)."_Col2=</div>    
            <div>frm2200A:CalXA035Bottle_".($i + 1)."_Col3=".str_replace(',', '%2C', request('frm2200A:CalXA035Bottle_Col3')[$i])."frm2200A:CalXA035Bottle_".($i + 1)."_Col3=</div>    
            <div>frm2200A:CalXA035Bottle_".($i + 1)."_Col4=".str_replace(',', '%2C', request('frm2200A:CalXA035Bottle_Col4')[$i])."frm2200A:CalXA035Bottle_".($i + 1)."_Col4=</div>    
            <div>frm2200A:CalXA035Bottle_".($i + 1)."_Col5=".str_replace(',', '%2C', request('frm2200A:CalXA035Bottle_Col5')[$i])."frm2200A:CalXA035Bottle_".($i + 1)."_Col5=</div>    
            <div>frm2200A:CalXA035Bottle_".($i + 1)."_Col6=".str_replace(',', '%2C', request('frm2200A:CalXA035Bottle_Col6')[$i])."frm2200A:CalXA035Bottle_".($i + 1)."_Col6=</div>    
            <div>frm2200A:CalXA035Bottle_".($i + 1)."_Col7=".request('frm2200A:CalXA035Bottle_Col7')[$i]."25frm2200A:CalXA035Bottle_".($i + 1)."_Col7=</div>    
            <div>frm2200A:CalXA035Bottle_".($i + 1)."_Col8=".request('frm2200A:CalXA035Bottle_Col8')[$i]."frm2200A:CalXA035Bottle_".($i + 1)."_Col8=</div>    
            <div>frm2200A:CalXA035Bottle_".($i + 1)."_Col9=".str_replace(',', '%2C', request('frm2200A:CalXA035Bottle_Col9')[$i])."frm2200A:CalXA035Bottle_".($i + 1)."_Col9=</div>    
            ";
            }
        }

        /*XA035 Bulk*/
        $xa035_bulk = "";
        if(null !== request('frm2200A:CalXA035Bulk_Col2')){
            for ($i=0; $i < count(request('frm2200A:CalXA035Bulk_Col2')) ; $i++) { 
                $xa035_bulk .= "<div>frm2200A:CalXA035Bulk_".($i + 1)."_Col1=".(null !== request('frm2200A:CalXA035Bulk_'.($i + 1).'_Col1') ? 'true' : 'false')."frm2200A:CalXA035Bulk_".($i + 1)."_Col1=</div>    
            <div>frm2200A:CalXA035Bulk_".($i + 1)."_Col2=".request('frm2200A:CalXA035Bulk_Col2')[$i]."frm2200A:CalXA035Bulk_".($i + 1)."_Col2=</div>    
            <div>frm2200A:CalXA035Bulk_".($i + 1)."_Col3=".str_replace(',', '%2C', request('frm2200A:CalXA035Bulk_Col3')[$i])."frm2200A:CalXA035Bulk_".($i + 1)."_Col3=</div>    
            <div>frm2200A:CalXA035Bulk_".($i + 1)."_Col4=".request('frm2200A:CalXA035Bulk_Col4')[$i]."25frm2200A:CalXA035Bulk_".($i + 1)."_Col4=</div>    
            <div>frm2200A:CalXA035Bulk_".($i + 1)."_Col5=".request('frm2200A:CalXA035Bulk_Col5')[$i]."frm2200A:CalXA035Bulk_".($i + 1)."_Col5=</div>    
            <div>frm2200A:CalXA035Bulk_".($i + 1)."_Col6=".str_replace(',', '%2C', request('frm2200A:CalXA035Bulk_Col6')[$i])."frm2200A:CalXA035Bulk_".($i + 1)."_Col6=</div>    
            ";
            }
        }

        /*XA036 Bottle*/
        $xa036_bottle = "";
        if(null !== request('frm2200A:CalXA036Bottle_Col2')){
            for ($i=0; $i < count(request('frm2200A:CalXA036Bottle_Col2')) ; $i++) { 
                $xa036_bottle .= "<div>frm2200A:CalXA036Bottle_".($i + 1)."_Col1=".(null !== request('frm2200A:CalXA036Bottle_'.($i + 1).'_Col1') ? 'true' : 'false')."frm2200A:CalXA036Bottle_".($i + 1)."_Col1=</div>    
            <div>frm2200A:CalXA036Bottle_".($i + 1)."_Col2=".request('frm2200A:CalXA036Bottle_Col2')[$i]."frm2200A:CalXA036Bottle_".($i + 1)."_Col2=</div>    
            <div>frm2200A:CalXA036Bottle_".($i + 1)."_Col3=".str_replace(',', '%2C', request('frm2200A:CalXA036Bottle_Col3')[$i])."frm2200A:CalXA036Bottle_".($i + 1)."_Col3=</div>    
            <div>frm2200A:CalXA036Bottle_".($i + 1)."_Col4=".str_replace(',', '%2C', request('frm2200A:CalXA036Bottle_Col4')[$i])."frm2200A:CalXA036Bottle_".($i + 1)."_Col4=</div>    
            <div>frm2200A:CalXA036Bottle_".($i + 1)."_Col5=".str_replace(',', '%2C', request('frm2200A:CalXA036Bottle_Col5')[$i])."frm2200A:CalXA036Bottle_".($i + 1)."_Col5=</div>    
            <div>frm2200A:CalXA036Bottle_".($i + 1)."_Col6=".str_replace(',', '%2C', request('frm2200A:CalXA036Bottle_Col6')[$i])."frm2200A:CalXA036Bottle_".($i + 1)."_Col6=</div>    
            <div>frm2200A:CalXA036Bottle_".($i + 1)."_Col7=".request('frm2200A:CalXA036Bottle_Col7')[$i]."25frm2200A:CalXA036Bottle_".($i + 1)."_Col7=</div>    
            <div>frm2200A:CalXA036Bottle_".($i + 1)."_Col8=".request('frm2200A:CalXA036Bottle_Col8')[$i]."frm2200A:CalXA036Bottle_".($i + 1)."_Col8=</div>    
            <div>frm2200A:CalXA036Bottle_".($i + 1)."_Col9=".request('frm2200A:CalXA036Bottle_Col9')[$i]."frm2200A:CalXA036Bottle_".($i + 1)."_Col9=</div>    
            <div>frm2200A:CalXA036Bottle_".($i + 1)."_Col10=".str_replace(',', '%2C', request('frm2200A:CalXA036Bottle_Col10')[$i])."frm2200A:CalXA036Bottle_".($i + 1)."_Col10=</div>    
            ";
            }
        }

        /*XA036 Bulk*/
        $xa036_bulk = "";
        if(null !== request('frm2200A:CalXA036Bulk_Col2')){
            for ($i=0; $i < count(request('frm2200A:CalXA036Bulk_Col2')) ; $i++) { 
                $xa036_bulk .= "<div>frm2200A:CalXA036Bulk_".($i + 1)."_Col1=".(null !== request('frm2200A:CalXA036Bulk_'.($i + 1).'_Col1') ? 'true' : 'false')."frm2200A:CalXA036Bulk_".($i + 1)."_Col1=</div>    
            <div>frm2200A:CalXA036Bulk_".($i + 1)."_Col2=".request('frm2200A:CalXA036Bulk_Col2')[$i]."frm2200A:CalXA036Bulk_".($i + 1)."_Col2=</div>    
            <div>frm2200A:CalXA036Bulk_".($i + 1)."_Col3=".str_replace(',', '%2C', request('frm2200A:CalXA036Bulk_Col3')[$i])."frm2200A:CalXA036Bulk_".($i + 1)."_Col3=</div>    
            <div>frm2200A:CalXA036Bulk_".($i + 1)."_Col4=".request('frm2200A:CalXA036Bulk_Col4')[$i]."25frm2200A:CalXA036Bulk_".($i + 1)."_Col4=</div>    
            <div>frm2200A:CalXA036Bulk_".($i + 1)."_Col5=".request('frm2200A:CalXA036Bulk_Col5')[$i]."frm2200A:CalXA036Bulk_".($i + 1)."_Col5=</div>    
            <div>frm2200A:CalXA036Bulk_".($i + 1)."_Col6=".str_replace(',', '%2C', request('frm2200A:CalXA036Bulk_Col6')[$i])."frm2200A:CalXA036Bulk_".($i + 1)."_Col6=</div>    
            ";
            }
        }
        
        /*XA061*/
        $xa061 = "";
        if(null !== request('frm2200A:CalXA061_Col2')){
            for ($i=0; $i < count(request('frm2200A:CalXA061_Col2')) ; $i++) { 
                $xa061 .= "<div>frm2200A:CalXA061_".($i + 1)."_Col1=".(null !== request('frm2200A:CalXA061_'.($i + 1).'_Col1') ? 'true' : 'false')."frm2200A:CalXA061_".($i + 1)."_Col1=</div>    
            <div>frm2200A:CalXA061_".($i + 1)."_Col2=".request('frm2200A:CalXA061_Col2')[$i]."frm2200A:CalXA061_".($i + 1)."_Col2=</div>    
            <div>frm2200A:CalXA061_".($i + 1)."_Col3=".str_replace(',', '%2C', request('frm2200A:CalXA061_Col3')[$i])."frm2200A:CalXA061_".($i + 1)."_Col3=</div>    
            <div>frm2200A:CalXA061_".($i + 1)."_Col4=".str_replace(',', '%2C', request('frm2200A:CalXA061_Col4')[$i])."frm2200A:CalXA061_".($i + 1)."_Col4=</div>    
            <div>frm2200A:CalXA061_".($i + 1)."_Col5=".str_replace(',', '%2C', request('frm2200A:CalXA061_Col5')[$i])."frm2200A:CalXA061_".($i + 1)."_Col5=</div>    
            <div>frm2200A:CalXA061_".($i + 1)."_Col6=".str_replace(',', '%2C', request('frm2200A:CalXA061_Col6')[$i])."frm2200A:CalXA061_".($i + 1)."_Col6=</div>    
            <div>frm2200A:CalXA061_".($i + 1)."_Col7=".str_replace(',', '%2C', request('frm2200A:CalXA061_Col7')[$i])."frm2200A:CalXA061_".($i + 1)."_Col7=</div>    
            ";
            }
        }

        /*XA062*/
        $xa062 = "";
        if(null !== request('frm2200A:CalXA062_Col2')){
            for ($i=0; $i < count(request('frm2200A:CalXA062_Col2')) ; $i++) { 
                $xa062 .= "<div>frm2200A:CalXA062_".($i + 1)."_Col1=".(null !== request('frm2200A:CalXA062_'.($i + 1).'_Col1') ? 'true' : 'false')."frm2200A:CalXA062_".($i + 1)."_Col1=</div>    
            <div>frm2200A:CalXA062_".($i + 1)."_Col2=".request('frm2200A:CalXA062_Col2')[$i]."frm2200A:CalXA062_".($i + 1)."_Col2=</div>    
            <div>frm2200A:CalXA062_".($i + 1)."_Col3=".str_replace(',', '%2C', request('frm2200A:CalXA062_Col3')[$i])."frm2200A:CalXA062_".($i + 1)."_Col3=</div>    
            <div>frm2200A:CalXA062_".($i + 1)."_Col4=".str_replace(',', '%2C', request('frm2200A:CalXA062_Col4')[$i])."frm2200A:CalXA062_".($i + 1)."_Col4=</div>    
            <div>frm2200A:CalXA062_".($i + 1)."_Col5=".str_replace(',', '%2C', request('frm2200A:CalXA062_Col5')[$i])."frm2200A:CalXA062_".($i + 1)."_Col5=</div>    
            <div>frm2200A:CalXA062_".($i + 1)."_Col6=".str_replace(',', '%2C', request('frm2200A:CalXA062_Col6')[$i])."frm2200A:CalXA062_".($i + 1)."_Col6=</div>    
            <div>frm2200A:CalXA062_".($i + 1)."_Col7=".str_replace(',', '%2C', request('frm2200A:CalXA062_Col7')[$i])."frm2200A:CalXA062_".($i + 1)."_Col7=</div>    
            ";
            }
        }

        /*XA070*/
        $xa070 = "";
        if(null !== request('frm2200A:CalXA070_Col2')){
            for ($i=0; $i < count(request('frm2200A:CalXA070_Col2')) ; $i++) { 
                $xa070 .= "<div>frm2200A:CalXA070_".($i + 1)."_Col1=".(null !== request('frm2200A:CalXA070_'.($i + 1).'_Col1') ? 'true' : 'false')."frm2200A:CalXA070_".($i + 1)."_Col1=</div>    
            <div>frm2200A:CalXA070_".($i + 1)."_Col2=".request('frm2200A:CalXA070_Col2')[$i]."frm2200A:CalXA070_".($i + 1)."_Col2=</div>    
            <div>frm2200A:CalXA070_".($i + 1)."_Col3=".str_replace(',', '%2C', request('frm2200A:CalXA070_Col3')[$i])."frm2200A:CalXA070_".($i + 1)."_Col3=</div>    
            <div>frm2200A:CalXA070_".($i + 1)."_Col4=".str_replace(',', '%2C', request('frm2200A:CalXA070_Col4')[$i])."frm2200A:CalXA070_".($i + 1)."_Col4=</div>    
            <div>frm2200A:CalXA070_".($i + 1)."_Col5=".str_replace(',', '%2C', request('frm2200A:CalXA070_Col5')[$i])."frm2200A:CalXA070_".($i + 1)."_Col5=</div>    
            <div>frm2200A:CalXA070_".($i + 1)."_Col6=".str_replace(',', '%2C', request('frm2200A:CalXA070_Col6')[$i])."frm2200A:CalXA070_".($i + 1)."_Col6=</div>    
            <div>frm2200A:CalXA070_".($i + 1)."_Col7=".str_replace(',', '%2C', request('frm2200A:CalXA070_Col7')[$i])."frm2200A:CalXA070_".($i + 1)."_Col7=</div>    
            ";
            }
        }

        /*XA080*/
        $xa080 = "";
        if(null !== request('frm2200A:CalXA080_Col2')){
            for ($i=0; $i < count(request('frm2200A:CalXA080_Col2')) ; $i++) { 
                $xa080 .= "<div>frm2200A:CalXA080_".($i + 1)."_Col1=".(null !== request('frm2200A:CalXA080_'.($i + 1).'_Col1') ? 'true' : 'false')."frm2200A:CalXA080_".($i + 1)."_Col1=</div>    
            <div>frm2200A:CalXA080_".($i + 1)."_Col2=".request('frm2200A:CalXA080_Col2')[$i]."frm2200A:CalXA080_".($i + 1)."_Col2=</div>    
            <div>frm2200A:CalXA080_".($i + 1)."_Col3=".str_replace(',', '%2C', request('frm2200A:CalXA080_Col3')[$i])."frm2200A:CalXA080_".($i + 1)."_Col3=</div>    
            <div>frm2200A:CalXA080_".($i + 1)."_Col4=".str_replace(',', '%2C', request('frm2200A:CalXA080_Col4')[$i])."frm2200A:CalXA080_".($i + 1)."_Col4=</div>    
            <div>frm2200A:CalXA080_".($i + 1)."_Col5=".str_replace(',', '%2C', request('frm2200A:CalXA080_Col5')[$i])."frm2200A:CalXA080_".($i + 1)."_Col5=</div>    
            <div>frm2200A:CalXA080_".($i + 1)."_Col6=".str_replace(',', '%2C', request('frm2200A:CalXA080_Col6')[$i])."frm2200A:CalXA080_".($i + 1)."_Col6=</div>    
            <div>frm2200A:CalXA080_".($i + 1)."_Col7=".str_replace(',', '%2C', request('frm2200A:CalXA080_Col7')[$i])."frm2200A:CalXA080_".($i + 1)."_Col7=</div>    
            ";
            }
        }

        /*XA055*/
        $xa055 = "";
        if(null !== request('frm2200A:CalXA055_Col2')){
            for ($i=0; $i < count(request('frm2200A:CalXA055_Col2')) ; $i++) { 
                $xa055 .= "<div>frm2200A:CalXA055_".($i + 1)."_Col1=".(null !== request('frm2200A:CalXA055_'.($i + 1).'_Col1') ? 'true' : 'false')."frm2200A:CalXA055_".($i + 1)."_Col1=</div>    
            <div>frm2200A:CalXA055_".($i + 1)."_Col2=".request('frm2200A:CalXA055_Col2')[$i]."frm2200A:CalXA055_".($i + 1)."_Col2=</div>    
            <div>frm2200A:CalXA055_".($i + 1)."_Col3=".str_replace(',', '%2C', request('frm2200A:CalXA055_Col3')[$i])."frm2200A:CalXA055_".($i + 1)."_Col3=</div>    
            <div>frm2200A:CalXA055_".($i + 1)."_Col4=".str_replace(',', '%2C', request('frm2200A:CalXA055_Col4')[$i])."frm2200A:CalXA055_".($i + 1)."_Col4=</div>    
            <div>frm2200A:CalXA055_".($i + 1)."_Col5=".str_replace(',', '%2C', request('frm2200A:CalXA055_Col5')[$i])."frm2200A:CalXA055_".($i + 1)."_Col5=</div>    
            <div>frm2200A:CalXA055_".($i + 1)."_Col6=".str_replace(',', '%2C', request('frm2200A:CalXA055_Col6')[$i])."frm2200A:CalXA055_".($i + 1)."_Col6=</div>    
            <div>frm2200A:CalXA055_".($i + 1)."_Col7=".str_replace(',', '%2C', request('frm2200A:CalXA055_Col7')[$i])."frm2200A:CalXA055_".($i + 1)."_Col7=</div>    
            ";
            }
        }

        /*XA056*/
        $xa056 = "";
        if(null !== request('frm2200A:CalXA056_Col2')){
            for ($i=0; $i < count(request('frm2200A:CalXA056_Col2')) ; $i++) { 
                $xa056 .= "<div>frm2200A:CalXA056_".($i + 1)."_Col1=".(null !== request('frm2200A:CalXA056_'.($i + 1).'_Col1') ? 'true' : 'false')."frm2200A:CalXA056_".($i + 1)."_Col1=</div>    
            <div>frm2200A:CalXA056_".($i + 1)."_Col2=".request('frm2200A:CalXA056_Col2')[$i]."frm2200A:CalXA056_".($i + 1)."_Col2=</div>    
            <div>frm2200A:CalXA056_".($i + 1)."_Col3=".str_replace(',', '%2C',request('frm2200A:CalXA056_Col3')[$i])."frm2200A:CalXA056_".($i + 1)."_Col3=</div>    
            <div>frm2200A:CalXA056_".($i + 1)."_Col4=".str_replace(',', '%2C',request('frm2200A:CalXA056_Col4')[$i])."frm2200A:CalXA056_".($i + 1)."_Col4=</div>    
            <div>frm2200A:CalXA056_".($i + 1)."_Col5=".str_replace(',', '%2C',request('frm2200A:CalXA056_Col5')[$i])."frm2200A:CalXA056_".($i + 1)."_Col5=</div>    
            <div>frm2200A:CalXA056_".($i + 1)."_Col6=".str_replace(',', '%2C',request('frm2200A:CalXA056_Col6')[$i])."frm2200A:CalXA056_".($i + 1)."_Col6=</div>    
            <div>frm2200A:CalXA056_".($i + 1)."_Col7=".str_replace(',', '%2C',request('frm2200A:CalXA056_Col7')[$i])."frm2200A:CalXA056_".($i + 1)."_Col7=</div>    
            ";
            }
        }

        /*XA057*/
        $xa057 = "";
        if(null !== request('frm2200A:CalXA057_Col2')){
            for ($i=0; $i < count(request('frm2200A:CalXA057_Col2')) ; $i++) { 
                $xa057 .= "<div>frm2200A:CalXA057_".($i + 1)."_Col1=".(null !== request('frm2200A:CalXA057_'.($i + 1).'_Col1') ? 'true' : 'false')."frm2200A:CalXA057_".($i + 1)."_Col1=</div>    
            <div>frm2200A:CalXA057_".($i + 1)."_Col2=".request('frm2200A:CalXA057_Col2')[$i]."frm2200A:CalXA057_".($i + 1)."_Col2=</div>    
            <div>frm2200A:CalXA057_".($i + 1)."_Col3=".str_replace(',', '%2C',request('frm2200A:CalXA057_Col3')[$i])."frm2200A:CalXA057_".($i + 1)."_Col3=</div>    
            <div>frm2200A:CalXA057_".($i + 1)."_Col4=".str_replace(',', '%2C',request('frm2200A:CalXA057_Col4')[$i])."frm2200A:CalXA057_".($i + 1)."_Col4=</div>    
            <div>frm2200A:CalXA057_".($i + 1)."_Col5=".str_replace(',', '%2C',request('frm2200A:CalXA057_Col5')[$i])."frm2200A:CalXA057_".($i + 1)."_Col5=</div>    
            <div>frm2200A:CalXA057_".($i + 1)."_Col6=".str_replace(',', '%2C',request('frm2200A:CalXA057_Col6')[$i])."frm2200A:CalXA057_".($i + 1)."_Col6=</div>    
            <div>frm2200A:CalXA057_".($i + 1)."_Col7=".str_replace(',', '%2C',request('frm2200A:CalXA057_Col7')[$i])."frm2200A:CalXA057_".($i + 1)."_Col7=</div>    
            ";
            }
        }

        $xmlData = "<?xml version='1.0'?>    
            <div>frm2200A:txtMonth1=".request('frm2200A:txtMonth1')."frm2200A:txtMonth1=</div>    
            <div>frm2200A:txtDate=".request('frm2200A:txtDate')."frm2200A:txtDate=</div>    
            <div>frm2200A:txtForYr=".request('frm2200A:txtForYr')."frm2200A:txtForYr=</div>    
            <div>frm2200A:amendedRtn_1=".$amendedRtn_1."frm2200A:amendedRtn_1=</div>    
            <div>frm2200A:amendedRtn_2=".$amendedRtn_2."frm2200A:amendedRtn_2=</div>    
            <div>frm2200A:txtSheets=".request('frm2200A:txtSheets')."frm2200A:txtSheets=</div>    
            <div>frm2200A:txtTIN1=".request('frm2200A:txtTIN1')."frm2200A:txtTIN1=</div>    
            <div>frm2200A:txtTIN2=".request('frm2200A:txtTIN2')."frm2200A:txtTIN2=</div>    
            <div>frm2200A:txtTIN3=".request('frm2200A:txtTIN3')."frm2200A:txtTIN3=</div>    
            <div>frm2200A:txtBranchCode=".request('frm2200A:txtBranchCode')."frm2200A:txtBranchCode=</div>    
            <div>frm2200A:txtRDOCode=".request('frm2200A:txtRDOCode')."frm2200A:txtRDOCode=</div>    
            <div>frm2200A:txtTaxPayerName=".$taxPayerName."frm2200A:txtTaxPayerName=</div>    
            <div>frm2200A:txtAddress=".$address."frm2200A:txtAddress=</div>    
            <div>frm2200A:txtZipCode=".request('frm2200A:txtZipCode')."frm2200A:txtZipCode=</div>    
            <div>frm2200A:txtContactNum=".request('frm2200A:txtContactNum')."frm2200A:txtContactNum=</div>    
            <div>frm2200A:txtLineBus=".$lineOfBusiness."frm2200A:txtLineBus=</div>    
            <div>frm2200A:txtPSIC=".request('frm2200A:txtPSIC')."frm2200A:txtPSIC=</div>    
            <div>frm2200A:txtEmailAddress=".request('frm2200A:txtEmailAddress')."frm2200A:txtEmailAddress=</div>    
            <div>frm2200A:txt12optRegion=".request('frm2200A:txt12optRegion')."frm2200A:txt12optRegion=</div>    
            <div>frm2200A:txt12optProvince=".request('frm2200A:txt12optProvince')."frm2200A:txt12optProvince=</div>    
            <div>frm2200A:txt12optCity=".request('frm2200A:txt12optCity')."frm2200A:txt12optCity=</div>    
            <div>frm2200A:txt13optRegion1=".request('frm2200A:txt13optRegion1')."frm2200A:txt13optRegion1=</div>    
            <div>frm2200A:txt13optProvince1=".request('frm2200A:txt13optProvince1')."frm2200A:txt13optProvince1=</div>    
            <div>frm2200A:txt13optCity1=".request('frm2200A:txt13optCity1')."frm2200A:txt13optCity1=</div>    
            <div>frm2200A:optTreaty_1=".$optTreaty_1."frm2200A:optTreaty_1=</div>    
            <div>frm2200A:optTreaty_2=".$optTreaty_2."frm2200A:optTreaty_2=</div>    
            <div>frm2200A:lstTaxTreaty=".request('frm2200A:lstTaxTreaty')."frm2200A:lstTaxTreaty=</div>    
            <div>frm2200A:chkPymntManner_1=".$chkPymntManner_1."frm2200A:chkPymntManner_1=</div>    
            <div>frm2200A:chkPymntManner_2=".$chkPymntManner_2."frm2200A:chkPymntManner_2=</div>    
            <div>frm2200A:chkPymntManner_3=".$chkPymntManner_3."frm2200A:chkPymntManner_3=</div>    
            <div>frm2200A:txt17OthMannerofPymnt=".request('frm2200A:txt17OthMannerofPymnt')."frm2200A:txt17OthMannerofPymnt=</div>    
            <div>frm2200A:txtTax18=".str_replace(',', '%2C', request('frm2200A:txtTax18'))."frm2200A:txtTax18=</div>    
            <div>frm2200A:txtTax19A=".str_replace(',', '%2C', request('frm2200A:txtTax19A'))."frm2200A:txtTax19A=</div>    
            <div>frm2200A:txtTax19B=".str_replace(',', '%2C', request('frm2200A:txtTax19B'))."frm2200A:txtTax19B=</div>    
            <div>frm2200A:txtTax19C=".str_replace(',', '%2C', request('frm2200A:txtTax19C'))."frm2200A:txtTax19C=</div>    
            <div>frm2200A:txtTax20=".str_replace(',', '%2C', request('frm2200A:txtTax20'))."frm2200A:txtTax20=</div>    
            <div>frm2200A:txtTax21=".str_replace(',', '%2C', request('frm2200A:txtTax21'))."frm2200A:txtTax21=</div>    
            <div>frm2200A:txtTax22=".request('frm2200A:txtTax22')."frm2200A:txtTax22=</div>    
            <div>frm2200A:txtTax23A=".request('frm2200A:txtTax23A')."frm2200A:txtTax23A=</div>    
            <div>frm2200A:txtTax23B=".request('frm2200A:txtTax23B')."frm2200A:txtTax23B=</div>    
            <div>frm2200A:txtTax23C=".request('frm2200A:txtTax23C')."frm2200A:txtTax23C=</div>    
            <div>frm2200A:txtTax23D=".request('frm2200A:txtTax23D')."frm2200A:txtTax23D=</div>    
            <div>frm2200A:txtTax24=".str_replace(',', '%2C', request('frm2200A:txtTax24'))."frm2200A:txtTax24=</div>    
            <div>frm2200A:txtTax25A=".str_replace(',', '%2C', request('frm2200A:txtTax25A'))."frm2200A:txtTax25A=</div>    
            <div>frm2200A:chkPenalties=".(null !== request('frm2200A:chkPenalties') ? 'true' : 'false')."frm2200A:chkPenalties=</div>    
            <div>frm2200A:txtTax25B=".str_replace(',', '%2C', request('frm2200A:txtTax25B'))."frm2200A:txtTax25B=</div>    
            <div>frm2200A:txtTax25C=".request('frm2200A:txtTax25C')."frm2200A:txtTax25C=</div>    
            <div>frm2200A:txtTax26=".str_replace(',', '%2C', request('frm2200A:txtTax26'))."frm2200A:txtTax26=</div>    
            <div>frm2200A:xa1_exempt1=".str_replace(',', '%2C', request('frm2200A:xa1_exempt1'))."frm2200A:xa1_exempt1=</div>    
            <div>frm2200A:xa1_taxable1=".str_replace(',', '%2C', request('frm2200A:xa1_taxable1'))."frm2200A:xa1_taxable1=</div>    
            <div>CalcSubTotalXA035=".str_replace(',', '%2C', request('CalcSubTotalXA035'))."CalcSubTotalXA035=</div>    
            <div>frm2200A:xa1_exciseTaxDue1=".str_replace(',', '%2C',request('frm2200A:xa1_exciseTaxDue1') )."frm2200A:xa1_exciseTaxDue1=</div>    
            <div>frm2200A:xa1_exempt2=".str_replace(',', '%2C', request('frm2200A:xa1_exempt2'))."frm2200A:xa1_exempt2=</div>    
            <div>frm2200A:xa1_taxable2=".str_replace(',', '%2C', request('frm2200A:xa1_taxable2'))."frm2200A:xa1_taxable2=</div>    
            <div>CalcSubTotalXA036=".str_replace(',', '%2C', request('CalcSubTotalXA036'))."CalcSubTotalXA036=</div>    
            <div>frm2200A:xa1_exciseTaxDue2=".str_replace(',', '%2C', request('frm2200A:xa1_exciseTaxDue2'))."frm2200A:xa1_exciseTaxDue2=</div>    
            <div>frm2200A:xa2_exempt1=".str_replace(',', '%2C', request('frm2200A:xa2_exempt1'))."frm2200A:xa2_exempt1=</div>    
            <div>frm2200A:xa2_taxable1=".str_replace(',', '%2C',request('frm2200A:xa2_taxable1'))."frm2200A:xa2_taxable1=</div>    
            <div>frm2200A:xa2_exciseTaxDue1=".str_replace(',', '%2C',request('frm2200A:xa2_exciseTaxDue1'))."frm2200A:xa2_exciseTaxDue1=</div>    
            <div>frm2200A:xa2_exempt2=".str_replace(',', '%2C', request('frm2200A:xa2_exempt2'))."frm2200A:xa2_exempt2=</div>    
            <div>frm2200A:xa2_taxable2=".str_replace(',', '%2C',request('frm2200A:xa2_taxable2'))."frm2200A:xa2_taxable2=</div>    
            <div>frm2200A:xa2_exciseTaxDue2=".str_replace(',', '%2C',request('frm2200A:xa2_exciseTaxDue2'))."frm2200A:xa2_exciseTaxDue2=</div>    
            <div>frm2200A:xa2_exempt3=".str_replace(',', '%2C', request('frm2200A:xa2_exempt3'))."frm2200A:xa2_exempt3=</div>    
            <div>frm2200A:xa2_taxable3=".str_replace(',', '%2C',request('frm2200A:xa2_taxable3'))."frm2200A:xa2_taxable3=</div>    
            <div>frm2200A:xa2_exciseTaxDue3=".str_replace(',', '%2C',request('frm2200A:xa2_exciseTaxDue3'))."frm2200A:xa2_exciseTaxDue3=</div>    
            <div>frm2200A:xa2_exempt4=".str_replace(',', '%2C', request('frm2200A:xa2_exempt4'))."frm2200A:xa2_exempt4=</div>    
            <div>frm2200A:xa2_taxable4=".str_replace(',', '%2C',request('frm2200A:xa2_taxable4'))."frm2200A:xa2_taxable4=</div>    
            <div>frm2200A:xa2_exciseTaxDue4=".str_replace(',', '%2C',request('frm2200A:xa2_exciseTaxDue4'))."frm2200A:xa2_exciseTaxDue4=</div>    
            <div>frm2200A:xa2_exempt5=".str_replace(',', '%2C', request('frm2200A:xa2_exempt5'))."frm2200A:xa2_exempt5=</div>    
            <div>frm2200A:xa2_taxable5=".str_replace(',', '%2C', request('frm2200A:xa2_taxable5'))."frm2200A:xa2_taxable5=</div>    
            <div>frm2200A:xa2_exciseTaxDue5=".str_replace(',', '%2C', request('frm2200A:xa2_exciseTaxDue5'))."frm2200A:xa2_exciseTaxDue5=</div>    
            <div>frm2200A:xa3_exempt1=".str_replace(',', '%2C', request('frm2200A:xa3_exempt1'))."frm2200A:xa3_exempt1=</div>    
            <div>frm2200A:xa3_taxable1=".str_replace(',', '%2C',request('frm2200A:xa3_taxable1'))."frm2200A:xa3_taxable1=</div>    
            <div>frm2200A:xa3_exciseTaxDue1=".str_replace(',', '%2C',request('frm2200A:xa3_exciseTaxDue1'))."frm2200A:xa3_exciseTaxDue1=</div>    
            <div>frm2200A:xa3_exempt2=".str_replace(',', '%2C', request('frm2200A:xa3_exempt2'))."frm2200A:xa3_exempt2=</div>    
            <div>frm2200A:xa3_taxable2=".str_replace(',', '%2C',request('frm2200A:xa3_taxable2'))."frm2200A:xa3_taxable2=</div>    
            <div>frm2200A:xa3_exciseTaxDue2=".str_replace(',', '%2C',request('frm2200A:xa3_exciseTaxDue2'))."frm2200A:xa3_exciseTaxDue2=</div>    
            <div>frm2200A:xa3_exempt3=".str_replace(',', '%2C', request('frm2200A:xa3_exempt3'))."frm2200A:xa3_exempt3=</div>    
            <div>frm2200A:xa3_taxable3=".str_replace(',', '%2C', request('frm2200A:xa3_taxable3'))."frm2200A:xa3_taxable3=</div>    
            <div>frm2200A:xa3_exciseTaxDue3=".str_replace(',', '%2C', request('frm2200A:xa3_exciseTaxDue3'))."frm2200A:xa3_exciseTaxDue3=</div>    
            <div>frm2200A:sched1Chk0=falsefrm2200A:sched1Chk0=</div>    
            <div>frm2200A:sched1Atc0=".request('frm2200A:sched1Atc')[0]."frm2200A:sched1Atc0=</div>    
            <div>frm2200A:sched1Desc0=".request('frm2200A:sched1Desc')[0]."frm2200A:sched1Desc0=</div>    
            <div>frm2200A:sched1TaxBracket0=".request('frm2200A:sched1TaxBracket')[0]."frm2200A:sched1TaxBracket0=</div>    
            <div>frm2200A:sched1AppRate0=".request('frm2200A:sched1AppRate')[0]."frm2200A:sched1AppRate0=</div>    
            <div>frm2200A:sched1Exempt0=".str_replace(',', '%2C',request('frm2200A:sched1Exempt')[0])."frm2200A:sched1Exempt0=</div>    
            <div>frm2200A:sched1Taxable0=".str_replace(',', '%2C',request('frm2200A:sched1Taxable')[0])."frm2200A:sched1Taxable0=</div>    
            <div>frm2200A:sched1ExciseTaxDue0=".str_replace(',', '%2C',request('frm2200A:sched1ExciseTaxDue')[0])."frm2200A:sched1ExciseTaxDue0=</div>    
            ".$other_schedules."<div>frm2200A:totalTaxDue=".str_replace(',', '%2C', request('frm2200A:totalTaxDue'))."frm2200A:totalTaxDue=</div>    
            <div>CalcCheckXA035Bottle=".(null !== request('CalcCheckXA035Bottle') ? 'true' : 'false')."CalcCheckXA035Bottle=</div>    
            ".$xa035_bottle."<div>CalcSubTotalXA035Bottle=".str_replace(',', '%2C', request('CalcSubTotalXA035Bottle'))."CalcSubTotalXA035Bottle=</div>    
            <div>CalcCheckXA035Bulk=".(null !== request('CalcCheckXA035Bulk') ? 'true' : 'false')."CalcCheckXA035Bulk=</div>    
            ".$xa035_bulk."<div>CalcSubTotalXA035Bulk=".str_replace(',', '%2C', request('CalcSubTotalXA035Bulk'))."CalcSubTotalXA035Bulk=</div>    
            <div>CalcCheckXA036Bottle=".(null !== request('CalcCheckXA036Bottle') ? 'true' : 'false')."CalcCheckXA036Bottle=</div>    
            ".$xa036_bottle."<div>CalcSubTotalXA036Bottle=".str_replace(',', '%2C', request('CalcSubTotalXA036Bottle'))."CalcSubTotalXA036Bottle=</div>    
            <div>CalcCheckXA036Bulk=".(null !== request('CalcCheckXA036Bulk') ? 'true' : 'false')."CalcCheckXA036Bulk=</div>    
            ".$xa036_bulk."<div>CalcSubTotalXA036Bulk=".str_replace(',', '%2C', request('CalcSubTotalXA036Bulk'))."CalcSubTotalXA036Bulk=</div>    
            <div>CalcCheckXA061=".(null !== request('CalcCheckXA061') ? 'true' : 'false')."CalcCheckXA061=</div>    
            ".$xa061."<div>CalcSubTotalXA061=".str_replace(',', '%2C', request('CalcSubTotalXA061'))."CalcSubTotalXA061=</div>    
            <div>CalcCheckXA062=".(null !== request('CalcCheckXA062') ? 'true' : 'false')."CalcCheckXA062=</div>    
            ".$xa062."<div>CalcSubTotalXA062=".str_replace(',', '%2C', request('CalcSubTotalXA062'))."CalcSubTotalXA062=</div>    
            <div>CalcCheckXA070=".(null !== request('CalcCheckXA070') ? 'true' : 'false')."CalcCheckXA070=</div>    
            ".$xa070."<div>CalcSubTotalXA070=".str_replace(',', '%2C',request('CalcSubTotalXA070'))."CalcSubTotalXA070=</div>    
            <div>CalcCheckXA080=".(null !== request('CalcCheckXA080') ? 'true' : 'false')."CalcCheckXA080=</div>    
            ".$xa080."<div>CalcSubTotalXA080=".str_replace(',', '%2C', request('CalcSubTotalXA080'))."CalcSubTotalXA080=</div>    
            <div>CalcCheckXA055=".(null !== request('CalcCheckXA055') ? 'true' : 'false')."CalcCheckXA055=</div>    
            ".$xa055."<div>CalcSubTotalXA055=".str_replace(',', '%2C', request('CalcSubTotalXA055'))."CalcSubTotalXA055=</div>    
            <div>CalcCheckXA0552=falseCalcCheckXA0552=</div>    
            <div>CalcSubTotalXA0552=".request('CalcSubTotalXA0552')."CalcSubTotalXA0552=</div>    
            <div>CalcCheckXA056=".(null !== request('CalcCheckXA056') ? 'true' : 'false')."CalcCheckXA056=</div>    
            ".$xa056."<div>CalcSubTotalXA056=".str_replace(',', '%2C',request('CalcSubTotalXA056'))."CalcSubTotalXA056=</div>    
            <div>CalcCheckXA0562=falseCalcCheckXA0562=</div>    
            <div>CalcSubTotalXA0562=".request('CalcSubTotalXA0562')."CalcSubTotalXA0562=</div>    
            <div>CalcCheckXA057=".(null !== request('CalcCheckXA057') ? 'true' : 'false')."CalcCheckXA057=</div>    
            ".$xa057."<div>CalcSubTotalXA057=".str_replace(',', '%2C',request('CalcSubTotalXA057'))."CalcSubTotalXA057=</div>    
            <div>txtFinalFlag=0txtFinalFlag=</div>    
            <div>txtEnroll=NtxtEnroll=</div>    
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>    
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>    
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>    
            <div>driveSelectTPExport=0driveSelectTPExport=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA035Bottle=".request('frm2200A:txtCtrmodalCalculatorXA035Bottle')."frm2200A:txtCtrmodalCalculatorXA035Bottle=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA035Bulk=".request('frm2200A:txtCtrmodalCalculatorXA035Bulk')."frm2200A:txtCtrmodalCalculatorXA035Bulk=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA036Bottle=".request('frm2200A:txtCtrmodalCalculatorXA036Bottle')."frm2200A:txtCtrmodalCalculatorXA036Bottle=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA036Bulk=".request('frm2200A:txtCtrmodalCalculatorXA036Bulk')."frm2200A:txtCtrmodalCalculatorXA036Bulk=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA061=".request('frm2200A:txtCtrmodalCalculatorXA061')."frm2200A:txtCtrmodalCalculatorXA061=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA062=".request('frm2200A:txtCtrmodalCalculatorXA062')."frm2200A:txtCtrmodalCalculatorXA062=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA070=".request('frm2200A:txtCtrmodalCalculatorXA070')."frm2200A:txtCtrmodalCalculatorXA070=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA080=".request('frm2200A:txtCtrmodalCalculatorXA080')."frm2200A:txtCtrmodalCalculatorXA080=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA055=".request('frm2200A:txtCtrmodalCalculatorXA055')."frm2200A:txtCtrmodalCalculatorXA055=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA0552=".request('frm2200A:txtCtrmodalCalculatorXA0552')."frm2200A:txtCtrmodalCalculatorXA0552=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA056=".request('frm2200A:txtCtrmodalCalculatorXA056')."frm2200A:txtCtrmodalCalculatorXA056=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA0562=".request('frm2200A:txtCtrmodalCalculatorXA0562')."frm2200A:txtCtrmodalCalculatorXA0562=</div>    
            <div>frm2200A:txtCtrmodalCalculatorXA057=".request('frm2200A:txtCtrmodalCalculatorXA057')."frm2200A:txtCtrmodalCalculatorXA057=</div>    
                
            All Rights Reserved BIR 2014.";

            $tin = request('frm2200A:txtTIN1').request('frm2200A:txtTIN2').request('frm2200A:txtTIN3').request('frm2200A:txtBranchCode');
                
            $returnPeriod = request('frm2200A:txtMonth1')."/".request('frm2200A:txtDate')."/".request('frm2200A:txtForYr')." ".date('H:i:s');

            $xmlReturnPeriod = request('frm2200A:txtMonth1').request('frm2200A:txtDate').request('frm2200A:txtDate').date('His');

            $filename = $tin."-2200A-".$xmlReturnPeriod.'.xml';

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
                'form'          => '2200A',
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
                            ->where('form', '2200A')
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
                            ->where('form', '2200A')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2200A::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2200A')
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
        $data = tbl_2200A::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2200A')
                            ->get();
        
        return view('forms.BIR-Form 2200A',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

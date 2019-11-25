<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1600;
use App\tbl_1600_atc;
use App\tbl_1600_schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1600Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);

        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1600s')){

            }else{
                Schema::connection('mysql2')->create('tbl_1600s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item2');
                    $table->string('item3');
                    $table->string('item4')->nullable();
                    $table->string('item12')->nullable();
                    $table->string('item13')->nullable();
                    $table->string('item13_others')->nullable();
                    $table->text('item14');
                    $table->text('item15');
                    $table->text('item16');
                    $table->text('item17A');
                    $table->text('item17B');
                    $table->text('item17C');
                    $table->text('item17D');
                    $table->text('item18');
                    $table->text('total_sched');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1600_atcs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc')->nullable();
                    $table->text('base')->nullable();
                    $table->text('rate')->nullable();
                    $table->text('withheld')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1600_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('tin')->nullable();
                    $table->text('name')->nullable();
                    $table->text('atc')->nullable();
                    $table->text('description')->nullable();
                    $table->text('amount')->nullable();
                    $table->text('rate')->nullable();
                    $table->text('withheld');
                    $table->timestamps();
                });
            }
           
	        return view('forms.BIR-Form 1600',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{
        	$data = tbl_1600::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1600')
                            ->get();
            return view('forms.BIR-Form 1600',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);

    	$data = ([
    		'form_no'   => request('form_no'),
			'company_id'   => request('company'),
			'item1A'   => request('frm1600:j_id201'),
			'item1B'   => request('frm1600:txtYear'),
			'item2'   => request('frm1600:j_id217'),
			'item3'   => request('frm1600:txtSheets'),
			'item4'   => null !== request('frm1600:j_id252') ? request('frm1600:j_id252') : '',
			'item12'   => null !== request('frm1600:j_id392') ? request('frm1600:j_id392') : '',
			'item13'   => request('frm1600:rdTreaty'),
			'item13_others'   => request('frm1600:selTreaty'),
			'item14'   => request('frm1600:txtTax14'),
			'item15'   => request('frm1600:txtTax15'),
			'item16'   => request('frm1600:txtTax16'),
			'item17A'   => request('frm1600:txtTax17A'),
			'item17B'   => request('frm1600:txtTax17B'),
			'item17C'   => request('frm1600:txtTax17C'),
			'item17D'   => request('frm1600:txtTax17D'),
			'item18'   => request('frm1600:txtTax18'),
			'total_sched'   => request('frm1600:dtSched:TotaltaxWithheld'),
    	]);

    	$getForm = tbl_1600::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
     	$trans = "";
        if(request('form_id') != ""){
            $form = tbl_1600::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1600::create($data);
            }else{
                $form = tbl_1600::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == 'update'){
        	tbl_1600_atc::where('form_id', $getForm[0]->id)->delete();
        	tbl_1600_schedules::where('form_id', $getForm[0]->id)->delete();
        }

        if(null !== request('frm1600:txtAtcCd')){
        	for ($i=0; $i < count(request('frm1600:txtAtcCd')); $i++) { 
        		$atc = ([
        			'form_id'   => $form->id,
        			'atc'		=> request('frm1600:txtAtcCd')[$i],
        			'base'		=> request('frm1600:txtTaxBase')[$i],
        			'rate'		=> request('frm1600:txtTaxRate')[$i],
        			'withheld'	=> request('frm1600:txtTaxbeWithHeld')[$i],
        		]);

        		tbl_1600_atc::create($atc);
        	}
        }

        for ($i=1; $i < 10; $i++) { 
        	if(request('frm1600:dtSched:drpAtcCode'.$i.'') != ''){
        		$schedules = ([
        			'form_id'   	=> $form->id,
        			'tin'			=> request('frm1600:dtSched:txtTin'.$i.''),
        			'name'			=> request('frm1600:dtSched:txtFullname'.$i.''),
        			'atc'			=> request('frm1600:dtSched:drpAtcCode'.$i.''),
        			'description'	=> request('frm1600:dtSched:naturePayment'.$i.''),
        			'amount'		=> request('frm1600:dtSched:amount'.$i.''),
        			'rate'			=> request('frm1600:dtSched:txtRatePercent'.$i.''),
        			'withheld'		=> request('frm1600:dtSched:taxWithheld'.$i.''),
        		]);

        		tbl_1600_schedules::create($schedules);
        	}
        }

        $j_id217_1 = "false";
        $j_id217_2 = "false";

        if(request('frm1600:j_id217') == 'Y'){
            $j_id217_1 = "true";
        }else if(request('frm1600:j_id217') == 'N'){
            $j_id217_2 = "true";
        }

        $j_id252_1 = "false";
        $j_id252_2 = "false";

        if(null !== request('frm1600:j_id252')){
        	if(request('frm1600:j_id252') == 'Y'){
	            $j_id252_1 = "true";
	        }else if(request('frm1600:j_id252') == 'N'){
	            $j_id252_2 = "true";
	        }
        }
        
        $taxPayerName =  rawurlencode(request('frm1600:txtPayerName'));
        $address = rawurlencode(request('frm1600:txtAddress'));
        $lineOfBusiness =  rawurlencode(request('frm1600:txtLineBus'));

        $j_id392_1 = "false";
        $j_id392_2 = "false";
        if(null !== request('frm1600:j_id392')){
        	if(request('frm1600:j_id392') == 'P'){
	            $j_id392_1 = "true";
	        }else if(request('frm1600:j_id392') == 'G'){
	            $j_id392_2 = "true";
	        }
        }

        $rdTreaty_1 = "false";
        $rdTreaty_2 = "false";
        if(request('frm1600:rdTreaty') == 'Y'){
            $rdTreaty_1 = "true";
        }else if(request('frm1600:rdTreaty') == 'N'){
            $rdTreaty_2 = "true";
        }

        $atc = "";
        if(null !== request('frm1600:txtAtcCd')){
        	for ($i=0; $i < count(request('frm1600:txtAtcCd')); $i++) { 
        		$atc .= "<div>frm1600:txtAtcCd".($i+1)."=".request('frm1600:txtAtcCd')[$i]."frm1600:txtAtcCd".($i+1)."=</div>	
            <div>frm1600:txtTaxBase".($i+1)."=".request('frm1600:txtTaxBase')[$i]."frm1600:txtTaxBase".($i+1)."=</div>	
            <div>frm1600:txtTaxRate".($i+1)."=".request('frm1600:txtTaxRate')[$i]."frm1600:txtTaxRate".($i+1)."=</div>	
            <div>frm1600:txtTaxbeWithHeld".($i+1)."=".request('frm1600:txtTaxbeWithHeld')[$i]."frm1600:txtTaxbeWithHeld".($i+1)."=</div>	
            ";
        	}
        }

        $ext_atc = "";
        if(null !== request('frm1600:j_id392')){
        	$ext_atc = "<div>AtcCode1=".(null !== request('AtcCode1') ? 'true' : 'false')."AtcCode1=</div>	
            <div>AtcCode2=".(null !== request('AtcCode2') ? 'true' : 'false')."AtcCode2=</div>	
            <div>AtcCode3=".(null !== request('AtcCode3') ? 'true' : 'false')."AtcCode3=</div>	
            <div>AtcCode4=".(null !== request('AtcCode4') ? 'true' : 'false')."AtcCode4=</div>	
            <div>AtcCode5=".(null !== request('AtcCode5') ? 'true' : 'false')."AtcCode5=</div>	
            <div>AtcCode6=".(null !== request('AtcCode6') ? 'true' : 'false')."AtcCode6=</div>	
            <div>AtcCode7=".(null !== request('AtcCode7') ? 'true' : 'false')."AtcCode7=</div>	
            <div>AtcCode8=".(null !== request('AtcCode8') ? 'true' : 'false')."AtcCode8=</div>	
            <div>AtcCode9=".(null !== request('AtcCode9') ? 'true' : 'false')."AtcCode9=</div>	
            <div>AtcCode10=".(null !== request('AtcCode10') ? 'true' : 'false')."AtcCode10=</div>	
            <div>SchedIIAtcCde1=".(null !== request('SchedIIAtcCde') ? (request('SchedIIAtcCde') == 'WV040' ? 'true' : 'false' ) : 'false')."SchedIIAtcCde1=</div>	
            <div>SchedIIAtcCde2=".(null !== request('SchedIIAtcCde') ? (request('SchedIIAtcCde') == 'WV050' ? 'true' : 'false' ) : 'false')."SchedIIAtcCde2=</div>	
            <div>SchedIIAtcCde3=".(null !== request('SchedIIAtcCde') ? (request('SchedIIAtcCde') == 'WV012' ? 'true' : 'false' ) : 'false')."SchedIIAtcCde3=</div>	
            <div>SchedIIAtcCde4=".(null !== request('SchedIIAtcCde') ? (request('SchedIIAtcCde') == 'WV014' ? 'true' : 'false' ) : 'false')."SchedIIAtcCde4=</div>	
            <div>SchedIIAtcCde5=".(null !== request('SchedIIAtcCde') ? (request('SchedIIAtcCde') == 'WV022' ? 'true' : 'false' ) : 'false')."SchedIIAtcCde5=</div>	
            <div>SchedIIAtcCde6=".(null !== request('SchedIIAtcCde') ? (request('SchedIIAtcCde') == 'WV024' ? 'true' : 'false' ) : 'false')."SchedIIAtcCde6=</div>	
            <div>SchedIIAtcCde7=".(null !== request('SchedIIAtcCde') ? (request('SchedIIAtcCde') == 'WB080' ? 'true' : 'false' ) : 'false')."SchedIIAtcCde7=</div>	
            <div>SchedIIAtcCde8=".(null !== request('SchedIIAtcCde') ? (request('SchedIIAtcCde') == 'WB082' ? 'true' : 'false' ) : 'false')."SchedIIAtcCde8=</div>	
            <div>SchedIIAtcCde9=".(null !== request('SchedIIAtcCde') ? (request('SchedIIAtcCde') == 'WB084' ? 'true' : 'false' ) : 'false')."SchedIIAtcCde9=</div>	
            <div>SchedIIAtcCde10=".(null !== request('SchedIIAtcCde') ? (request('SchedIIAtcCde') == 'WV070' ? 'true' : 'false' ) : 'false')."SchedIIAtcCde10=</div>	
            ";
        }

        $xmlData ="<?xml version='1.0'?>	
            <div>frm1600:j_id201=".request('frm1600:j_id201')."frm1600:j_id201=</div>	
            <div>frm1600:txtYear=".request('frm1600:txtYear')."frm1600:txtYear=</div>	
            <div>frm1600:j_id217:_1=".$j_id217_1."frm1600:j_id217:_1=</div>	
            <div>frm1600:j_id217:_2=".$j_id217_2."frm1600:j_id217:_2=</div>	
            <div>frm1600:txtSheets=".request('frm1600:txtSheets')."frm1600:txtSheets=</div>	
            <div>frm1600:j_id252:_1=".$j_id252_1."frm1600:j_id252:_1=</div>	
            <div>frm1600:j_id252:_2=".$j_id252_2."frm1600:j_id252:_2=</div>	
            <div>frm1600:txtTIN1=".request('frm1600:txtTIN1')."frm1600:txtTIN1=</div>	
            <div>frm1600:txtTIN2=".request('frm1600:txtTIN2')."frm1600:txtTIN2=</div>	
            <div>frm1600:txtTIN3=".request('frm1600:txtTIN3')."frm1600:txtTIN3=</div>	
            <div>frm1600:txtBranchCode=".request('frm1600:txtBranchCode')."frm1600:txtBranchCode=</div>	
            <div>frm1600:txtRDOCode=".request('frm1600:txtRDOCode')."frm1600:txtRDOCode=</div>	
            <div>frm1600:txtLineBus=".$lineOfBusiness."frm1600:txtLineBus=</div>	
            <div>frm1600:txtPayerName=".$taxPayerName."frm1600:txtPayerName=</div>	
            <div>frm1600:txtTelNum=".request('frm1600:txtTelNum')."frm1600:txtTelNum=</div>	
            <div>frm1600:txtAddress=".$address."frm1600:txtAddress=</div>	
            <div>frm1600:txtZipCode=".request('frm1600:txtZipCode')."frm1600:txtZipCode=</div>	
            <div>frm1600:j_id392:_1=".$j_id392_1."frm1600:j_id392:_1=</div>	
            <div>frm1600:j_id392:_2=".$j_id392_2."frm1600:j_id392:_2=</div>	
            <div>frm1600:rdTreaty:_1=".$rdTreaty_1."frm1600:rdTreaty:_1=</div>	
            <div>frm1600:rdTreaty:_2=".$rdTreaty_2."frm1600:rdTreaty:_2=</div>	
            <div>frm1600:selTreaty=".request('frm1600:selTreaty')."frm1600:selTreaty=</div>	
            ".$atc."<div>frm1600:txtTax14=".request('frm1600:txtTax14')."frm1600:txtTax14=</div>	
            <div>frm1600:txtTax15=".request('frm1600:txtTax15')."frm1600:txtTax15=</div>	
            <div>frm1600:txtTax16=".request('frm1600:txtTax16')."frm1600:txtTax16=</div>	
            <div>frm1600:txtTax17A=".request('frm1600:txtTax17A')."frm1600:txtTax17A=</div>	
            <div>frm1600:txtTax17B=".request('frm1600:txtTax17B')."frm1600:txtTax17B=</div>	
            <div>frm1600:txtTax17C=".request('frm1600:txtTax17C')."frm1600:txtTax17C=</div>	
            <div>frm1600:txtTax17D=".request('frm1600:txtTax17D')."frm1600:txtTax17D=</div>	
            <div>frm1600:txtTax18=".request('frm1600:txtTax18')."frm1600:txtTax18=</div>	
            <div>frm1600:dtSched:txtTin1=".request('frm1600:dtSched:txtTin1')."frm1600:dtSched:txtTin1=</div>	
            <div>frm1600:dtSched:txtFullname1=".request('frm1600:dtSched:txtFullname1')."frm1600:dtSched:txtFullname1=</div>	
            <div>frm1600:dtSched:drpAtcCode:1=".request('frm1600:dtSched:drpAtcCode1')."frm1600:dtSched:drpAtcCode:1=</div>	
            <div>frm1600:dtSched:naturePayment1=".request('frm1600:dtSched:naturePayment1')."frm1600:dtSched:naturePayment1=</div>	
            <div>frm1600:dtSched:amount1=".request('frm1600:dtSched:amount1')."frm1600:dtSched:amount1=</div>	
            <div>frm1600:dtSched:txtRatePercent1=".request('frm1600:dtSched:txtRatePercent1')."frm1600:dtSched:txtRatePercent1=</div>	
            <div>frm1600:dtSched:taxWithheld1=".request('frm1600:dtSched:taxWithheld1')."frm1600:dtSched:taxWithheld1=</div>	
            <div>frm1600:dtSched:txtTin2=".request('frm1600:dtSched:txtTin2')."frm1600:dtSched:txtTin2=</div>	
            <div>frm1600:dtSched:txtFullname2=".request('frm1600:dtSched:txtFullname2')."frm1600:dtSched:txtFullname2=</div>	
            <div>frm1600:dtSched:drpAtcCode:2=".request('frm1600:dtSched:drpAtcCode2')."frm1600:dtSched:drpAtcCode:2=</div>	
            <div>frm1600:dtSched:naturePayment2=".request('frm1600:dtSched:naturePayment2')."frm1600:dtSched:naturePayment2=</div>	
            <div>frm1600:dtSched:amount2=".request('frm1600:dtSched:amount2')."frm1600:dtSched:amount2=</div>	
            <div>frm1600:dtSched:txtRatePercent2=".request('frm1600:dtSched:txtRatePercent2')."frm1600:dtSched:txtRatePercent2=</div>	
            <div>frm1600:dtSched:taxWithheld2=".request('frm1600:dtSched:taxWithheld2')."frm1600:dtSched:taxWithheld2=</div>	
            <div>frm1600:dtSched:txtTin3=".request('frm1600:dtSched:txtTin3')."frm1600:dtSched:txtTin3=</div>	
            <div>frm1600:dtSched:txtFullname3=".request('frm1600:dtSched:txtFullname3')."frm1600:dtSched:txtFullname3=</div>	
            <div>frm1600:dtSched:drpAtcCode:3=".request('frm1600:dtSched:drpAtcCode3')."frm1600:dtSched:drpAtcCode:3=</div>	
            <div>frm1600:dtSched:naturePayment3=".request('frm1600:dtSched:naturePayment3')."frm1600:dtSched:naturePayment3=</div>	
            <div>frm1600:dtSched:amount3=".request('frm1600:dtSched:amount3')."frm1600:dtSched:amount3=</div>	
            <div>frm1600:dtSched:txtRatePercent3=".request('frm1600:dtSched:txtRatePercent3')."frm1600:dtSched:txtRatePercent3=</div>	
            <div>frm1600:dtSched:taxWithheld3=".request('frm1600:dtSched:taxWithheld3')."frm1600:dtSched:taxWithheld3=</div>	
            <div>frm1600:dtSched:txtTin4=".request('frm1600:dtSched:txtTin4')."frm1600:dtSched:txtTin4=</div>	
            <div>frm1600:dtSched:txtFullname4=".request('frm1600:dtSched:txtFullname4')."frm1600:dtSched:txtFullname4=</div>	
            <div>frm1600:dtSched:drpAtcCode:4=".request('frm1600:dtSched:drpAtcCode4')."frm1600:dtSched:drpAtcCode:4=</div>	
            <div>frm1600:dtSched:naturePayment4=".request('frm1600:dtSched:naturePayment4')."frm1600:dtSched:naturePayment4=</div>	
            <div>frm1600:dtSched:amount4=".request('frm1600:dtSched:amount4')."frm1600:dtSched:amount4=</div>	
            <div>frm1600:dtSched:txtRatePercent4=".request('frm1600:dtSched:txtRatePercent4')."frm1600:dtSched:txtRatePercent4=</div>	
            <div>frm1600:dtSched:taxWithheld4=".request('frm1600:dtSched:taxWithheld4')."frm1600:dtSched:taxWithheld4=</div>	
            <div>frm1600:dtSched:txtTin5=".request('frm1600:dtSched:txtTin5')."frm1600:dtSched:txtTin5=</div>	
            <div>frm1600:dtSched:txtFullname5=".request('frm1600:dtSched:txtFullname5')."frm1600:dtSched:txtFullname5=</div>	
            <div>frm1600:dtSched:drpAtcCode:5=".request('frm1600:dtSched:drpAtcCode5')."frm1600:dtSched:drpAtcCode:5=</div>	
            <div>frm1600:dtSched:naturePayment5=".request('frm1600:dtSched:naturePayment5')."frm1600:dtSched:naturePayment5=</div>	
            <div>frm1600:dtSched:amount5=".request('frm1600:dtSched:amount5')."frm1600:dtSched:amount5=</div>	
            <div>frm1600:dtSched:txtRatePercent5=".request('frm1600:dtSched:txtRatePercent5')."frm1600:dtSched:txtRatePercent5=</div>	
            <div>frm1600:dtSched:taxWithheld5=".request('frm1600:dtSched:taxWithheld5')."frm1600:dtSched:taxWithheld5=</div>	
            <div>frm1600:dtSched:txtTin6=".request('frm1600:dtSched:txtTin6')."frm1600:dtSched:txtTin6=</div>	
            <div>frm1600:dtSched:txtFullname6=".request('frm1600:dtSched:txtFullname6')."frm1600:dtSched:txtFullname6=</div>	
            <div>frm1600:dtSched:drpAtcCode:6=".request('frm1600:dtSched:drpAtcCode6')."frm1600:dtSched:drpAtcCode:6=</div>	
            <div>frm1600:dtSched:naturePayment6=".request('frm1600:dtSched:naturePayment6')."frm1600:dtSched:naturePayment6=</div>	
            <div>frm1600:dtSched:amount6=".request('frm1600:dtSched:amount6')."frm1600:dtSched:amount6=</div>	
            <div>frm1600:dtSched:txtRatePercent6=".request('frm1600:dtSched:txtRatePercent6')."frm1600:dtSched:txtRatePercent6=</div>	
            <div>frm1600:dtSched:taxWithheld6=".request('frm1600:dtSched:taxWithheld6')."frm1600:dtSched:taxWithheld6=</div>	
            <div>frm1600:dtSched:txtTin7=".request('frm1600:dtSched:txtTin7')."frm1600:dtSched:txtTin7=</div>	
            <div>frm1600:dtSched:txtFullname7=".request('frm1600:dtSched:txtFullname7')."frm1600:dtSched:txtFullname7=</div>	
            <div>frm1600:dtSched:drpAtcCode:7=".request('frm1600:dtSched:drpAtcCode7')."frm1600:dtSched:drpAtcCode:7=</div>	
            <div>frm1600:dtSched:naturePayment7=".request('frm1600:dtSched:naturePayment7')."frm1600:dtSched:naturePayment7=</div>	
            <div>frm1600:dtSched:amount7=".request('frm1600:dtSched:amount7')."frm1600:dtSched:amount7=</div>	
            <div>frm1600:dtSched:txtRatePercent7=".request('frm1600:dtSched:txtRatePercent7')."frm1600:dtSched:txtRatePercent7=</div>	
            <div>frm1600:dtSched:taxWithheld7=".request('frm1600:dtSched:taxWithheld7')."frm1600:dtSched:taxWithheld7=</div>	
            <div>frm1600:dtSched:txtTin8=".request('frm1600:dtSched:txtTin8')."frm1600:dtSched:txtTin8=</div>	
            <div>frm1600:dtSched:txtFullname8=".request('frm1600:dtSched:txtFullname8')."frm1600:dtSched:txtFullname8=</div>	
            <div>frm1600:dtSched:drpAtcCode:8=".request('frm1600:dtSched:drpAtcCode8')."frm1600:dtSched:drpAtcCode:8=</div>	
            <div>frm1600:dtSched:naturePayment8=".request('frm1600:dtSched:naturePayment8')."frm1600:dtSched:naturePayment8=</div>	
            <div>frm1600:dtSched:amount8=".request('frm1600:dtSched:amount8')."frm1600:dtSched:amount8=</div>	
            <div>frm1600:dtSched:txtRatePercent8=".request('frm1600:dtSched:txtRatePercent8')."frm1600:dtSched:txtRatePercent8=</div>	
            <div>frm1600:dtSched:taxWithheld8=".request('frm1600:dtSched:taxWithheld8')."frm1600:dtSched:taxWithheld8=</div>	
            <div>frm1600:dtSched:txtTin9=".request('frm1600:dtSched:txtTin9')."frm1600:dtSched:txtTin9=</div>	
            <div>frm1600:dtSched:txtFullname9=".request('frm1600:dtSched:txtFullname9')."frm1600:dtSched:txtFullname9=</div>	
            <div>frm1600:dtSched:drpAtcCode:9=".request('frm1600:dtSched:drpAtcCode9')."frm1600:dtSched:drpAtcCode:9=</div>	
            <div>frm1600:dtSched:naturePayment9=".request('frm1600:dtSched:naturePayment9')."frm1600:dtSched:naturePayment9=</div>	
            <div>frm1600:dtSched:amount9=".request('frm1600:dtSched:amount9')."frm1600:dtSched:amount9=</div>	
            <div>frm1600:dtSched:txtRatePercent9=".request('frm1600:dtSched:txtRatePercent9')."frm1600:dtSched:txtRatePercent9=</div>	
            <div>frm1600:dtSched:taxWithheld9=".request('frm1600:dtSched:taxWithheld9')."frm1600:dtSched:taxWithheld9=</div>	
            <div>frm1600:dtSched:txtTin10=".request('frm1600:dtSched:txtTin10')."frm1600:dtSched:txtTin10=</div>	
            <div>frm1600:dtSched:txtFullname10=".request('frm1600:dtSched:txtFullname10')."frm1600:dtSched:txtFullname10=</div>	
            <div>frm1600:dtSched:drpAtcCode:10=".request('frm1600:dtSched:drpAtcCode10')."frm1600:dtSched:drpAtcCode:10=</div>	
            <div>frm1600:dtSched:naturePayment10=".request('frm1600:dtSched:naturePayment10')."frm1600:dtSched:naturePayment10=</div>	
            <div>frm1600:dtSched:amount10=".request('frm1600:dtSched:amount10')."frm1600:dtSched:amount10=</div>	
            <div>frm1600:dtSched:txtRatePercent10=".request('frm1600:dtSched:txtRatePercent10')."frm1600:dtSched:txtRatePercent10=</div>	
            <div>frm1600:dtSched:taxWithheld10=".request('frm1600:dtSched:taxWithheld10')."frm1600:dtSched:taxWithheld10=</div>	
            <div>frm1600:dtSched:TotaltaxWithheld=".request('frm1600:dtSched:TotaltaxWithheld')."frm1600:dtSched:TotaltaxWithheld=</div>	
            ".$ext_atc."<div>adminUser=adminUser=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            <div>hPartIITableSize=".request('hPartIITableSize')."hPartIITableSize=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm1600:txtTIN1').request('frm1600:txtTIN2').request('frm1600:txtTIN3').request('frm1600:txtBranchCode');

        $return_period = request('frm1600:j_id201')."/".request('frm1600:txtYear');

        $getReturnPeriod = tbl_1600::where('company_id',  request('company'))
     						->where('item1A', request('frm1600:j_id201'))
     						->where('item1B', request('frm1600:txtYear'))
     						->count();

     	$filename = "";
     	if($getReturnPeriod == "1"){
     		$filename = $tin."-1600-".request('frm1600:j_id201').request('frm1600:txtYear').'.xml';
     	}else{
     		if(request('form_id') != ""){
					$getXml = Xml::where('user_id', Auth::user()->id)
					        ->where('company_id', request('company'))
					        ->where('form_id', $form->id)
					        ->where('form', '1600')
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
				
     		$filename = $tin."-1600-".request('frm1600:j_id201').request('frm1600:txtYear').$ext.'.xml';
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
	     		'form'			=> '1600',
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
     						->where('form', '1600')
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
                            ->where('form', '1600')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1600::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1600')
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
        $data = tbl_1600::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1600')
                            ->get();
        
        return view('forms.BIR-Form 1600',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

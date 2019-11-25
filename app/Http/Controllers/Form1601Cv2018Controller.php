<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1601C;
use App\tbl_1601C_schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1601Cv2018Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);

        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1601_cs')){

            }else{
                Schema::connection('mysql2')->create('tbl_1601_cs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item2');
                    $table->string('item3')->nullable();
                    $table->string('item4');
                    $table->string('item5');
                    $table->string('item11')->nullable();
                    $table->text('item13');
                    $table->text('item13A')->nullable();
                    $table->text('item14');
                    $table->text('item15');
                    $table->text('item16');
                    $table->text('item17');
                    $table->text('item18');
                    $table->text('item19');
                    $table->text('item20');
                    $table->text('item20_other')->nullable();
                    $table->text('item21');
                    $table->text('item22');
                    $table->text('item23');
                    $table->text('item24');
                    $table->text('item25');
                    $table->text('item26');
                    $table->text('item27');
                    $table->text('item28');
                    $table->text('item29');
                    $table->text('item29_other')->nullable();
                    $table->text('item30');
                    $table->text('item31');
                    $table->text('item32');
                    $table->text('item33');
                    $table->text('item34');
                    $table->text('item35');
                    $table->text('item36');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1601_c_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('previous')->nullable();
                    $table->text('paid')->nullable();
                    $table->text('code')->nullable();
                    $table->text('number')->nullable();
                    $table->text('tax_paid');
                    $table->text('tax_due');
                    $table->text('adjustment');
                    $table->timestamps();
                });
            }
            
        	return view('forms.BIR-Form 1601Cv2018',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{
        	$data = tbl_1601C::find($form_id);
            $schedules = tbl_1601C_schedule::where('form_id', $form_id)->get();

            return view('forms.BIR-Form 1601Cv2018',['company' => $company, 'data' => $data, 'schedules' => $schedules, 'action' => $action]);
        }
    }
    public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
                    'form_no'               => request('form_no'),
                    'company_id'            => request('company'),
                    'item1A'                => request('frm1601c:txtMonth'),
                    'item1B'                => request('frm1601c:txtYear'),
                    'item2'                 => request('frm1601c:AmendedRtn'),
                    'item3'                 => null !== request('frm1601c:TaxWithheld') ? request('frm1601c:TaxWithheld') : '',
                    'item4'                 => request('frm1601c:txtSheets'),
                    'item5'                 => request('frm1601c:txtATC'),
                    'item11'                => null !== request('frm1601c:CatAgent') ? request('frm1601c:CatAgent') : '',
                    'item13'                => request('frm1601c:SpecialTax'),
                    'item13A'               => request('frm1601c:selTreaty'),
                    'item14'                => request('frm1601c:txtTax14'),
                    'item15'                => request('frm1601c:txtTax15'),
                    'item16'                => request('frm1601c:txtTax16'),
                    'item17'                => request('frm1601c:txtTax17'),
                    'item18'                => request('frm1601c:txtTax18'),
                    'item19'                => request('frm1601c:txtTax19'),
                    'item20'                => request('frm1601c:txtTax20'),
                    'item20_other'          => request('frm1601c:txt20Other'),
                    'item21'                => request('frm1601c:txtTax21'),
                    'item22'                => request('frm1601c:txtTax22'),
                    'item23'                => request('frm1601c:txtTax23'),
                    'item24'                => request('frm1601c:txtTax24'),
                    'item25'                => request('frm1601c:txtTax25'),
                    'item26'                => request('frm1601c:txtTax26'),
                    'item27'                => request('frm1601c:txtTax27'),
                    'item28'                => request('frm1601c:txtTax28'),
                    'item29'                => request('frm1601c:txtTax29'),
                    'item29_other'          => request('frm1601c:txt29Other'),
                    'item30'                => request('frm1601c:txtTax30'),
                    'item31'                => request('frm1601c:txtTax31'),
                    'item32'                => request('frm1601c:txtTax32'),
                    'item33'                => request('frm1601c:txtTax33'),
                    'item34'                => request('frm1601c:txtTax34'),
                    'item35'                => request('frm1601c:txtTax35'),
                    'item36'                => request('frm1601c:txtTax36'),
                ]);

        $getForm = tbl_1601C::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

        $form = "";
        if(request('form_id') != ""){
            $form = tbl_1601C::find(request('form_id'));
            $form->update($data);
            tbl_1601C_schedule::where('form_id', $getForm[0]->id)->delete();
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1601C::create($data);
            }else{
                tbl_1601C_schedule::where('form_id', $getForm[0]->id)->delete();
                $form = tbl_1601C::find($getForm[0]->id);
                $form->update($data);
            }
        }

        $sched1 = count(request('frm1601c:sched1:txtTaxPaid')) - 1;
        for($i=0;$i <= $sched1; $i++ ){
            if(request('frm1601c:sched1:txtDatePaid')[$i] != "" || request('frm1601c:sched1:txtAdjustments')[$i] != '0.00'){
                $schedule = ([
                    'form_id'       => $form->id,
                    'previous'      => request('frm1601c:sched1:txtMonthYear')[$i],
                    'paid'          => request('frm1601c:sched1:txtDatePaid')[$i],
                    'code'          => request('frm1601c:sched1:txtBankCode')[$i],
                    'number'        => request('frm1601c:sched1:txtNumber')[$i],
                    'tax_paid'      => request('frm1601c:sched1:txtTaxPaid')[$i],
                    'tax_due'       => request('frm1601c:sched1:txtShouldTaxDue')[$i],
                    'adjustment'    => request('frm1601c:sched1:txtAdjustments')[$i],
                ]);

                tbl_1601C_schedule::create($schedule);
            }
        }

        $AmendedRtn1 = "false";
        $AmendedRtn2 = "false";
        if(request('frm1601c:AmendedRtn') == 'Y'){
            $AmendedRtn1 = "true";
        }else if(request('frm1601c:AmendedRtn') == 'N'){
            $AmendedRtn2 = "true";
        }

        $taxWithheld1 = "false";
        $taxWithheld2 = "false";
        if(null !== request('frm1601c:TaxWithheld')){
            if(request('frm1601c:TaxWithheld') == 'Y'){
                $taxWithheld1 = "true";
            }else if(request('frm1601c:TaxWithheld') == 'N'){
                $taxWithheld2 = "true";
            }
        }

        $CatAgentP = "false";
        $CatAgentG = "false";

        if(null !== request('frm1601c:CatAgent')){
            if(request('frm1601c:CatAgent') == 'P'){
                $CatAgentP = "true";
            }else if(request('frm1601c:CatAgent') == 'G'){
                $CatAgentG = "true";
            }
        }

        $specialTax1 = "false";
        $specialTax2 = "false";

        if(request('frm1601c:SpecialTax') == 'Y'){
            $specialTax1 = "true";
        }else if(request('frm1601c:SpecialTax') == 'N'){
            $specialTax2 = "true";
        }

        /*for Schedule 1*/
        $schedule1Part1 = "";
        $schedule1Part2 = "";
        $totalSchedule = count(request('frm1601c:sched1:txtMonthYear')) - 1;
        for($i=0;$i <= $totalSchedule; $i++ ){

    		$chkSchedule = (null !== request('chkScheduleDelete'.$i.'') ? request('chkScheduleDelete'.$i.'') : "false");

    		$schedule1Part1 .= "<div>chkScheduleDelete".$i."=".$chkSchedule."chkScheduleDelete".$i."=</div>	
            <div>frm1601c:sched1:txtMonthYear".$i."=".request('frm1601c:sched1:txtMonthYear')[$i]."frm1601c:sched1:txtMonthYear".$i."=</div>	
            <div>frm1601c:sched1:txtDatePaid".$i."=".request('frm1601c:sched1:txtDatePaid')[$i]."frm1601c:sched1:txtDatePaid".$i."=</div>	
            <div>frm1601c:sched1:txtBankCode".$i."=".request('frm1601c:sched1:txtBankCode')[$i]."frm1601c:sched1:txtBankCode".$i."=</div>	
            <div>frm1601c:sched1:txtNumber".$i."=".request('frm1601c:sched1:txtNumber')[$i]."frm1601c:sched1:txtNumber".$i."=</div>	
            <div>frm1601c:sched1:txtTaxPaid".$i."=".request('frm1601c:sched1:txtTaxPaid')[$i]."frm1601c:sched1:txtTaxPaid".$i."=</div>	
            ";
			$schedule1Part2 .= "<div>frm1601c:sched1:txtShouldTaxDue".$i."=".request('frm1601c:sched1:txtShouldTaxDue')[$i]."frm1601c:sched1:txtShouldTaxDue".$i."=</div>	
            <div>frm1601c:sched1:txtAdjustments".$i."=".request('frm1601c:sched1:txtAdjustments')[$i]."frm1601c:sched1:txtAdjustments".$i."=</div>	
            ";
    			
    	}

        $taxPayerName =  rawurlencode(request('frm1601c:txtTaxpayerName'));

        $address = rawurlencode(request('frm1601c:txtAddress'));

        $xmlData ="<?xml version='1.0'?>	
            <div>frm1601c:txtMonth=".request('frm1601c:txtMonth')."frm1601c:txtMonth=</div>	
            <div>frm1601c:txtYear=".request('frm1601c:txtYear')."frm1601c:txtYear=</div>	
            <div>frm1601c:AmendedRtn_1=".$AmendedRtn1."frm1601c:AmendedRtn_1=</div>	
            <div>frm1601c:AmendedRtn_2=".$AmendedRtn2."frm1601c:AmendedRtn_2=</div>	
            <div>frm1601c:TaxWithheld_1=".$taxWithheld1."frm1601c:TaxWithheld_1=</div>	
            <div>frm1601c:TaxWithheld_2=".$taxWithheld2."frm1601c:TaxWithheld_2=</div>	
            <div>frm1601c:txtSheets=".request('frm1601c:txtSheets')."frm1601c:txtSheets=</div>	
            <div>frm1601c:txtATC=WW010frm1601c:txtATC=</div>	
            <div>frm1601c:txtTIN1=".request('frm1601c:txtTIN1')."frm1601c:txtTIN1=</div>	
            <div>frm1601c:txtTIN2=".request('frm1601c:txtTIN2')."frm1601c:txtTIN2=</div>	
            <div>frm1601c:txtTIN3=".request('frm1601c:txtTIN3')."frm1601c:txtTIN3=</div>	
            <div>frm1601c:txtBranchCode=".request('frm1601c:txtBranchCode')."frm1601c:txtBranchCode=</div>	
            <div>frm1601c:txtRDOCode=".request('frm1601c:txtRDOCode')."frm1601c:txtRDOCode=</div>	
            <div>frm1601c:txtTaxpayerName=".$taxPayerName."frm1601c:txtTaxpayerName=</div>	
            <div>frm1601c:txtAddress=".$address."frm1601c:txtAddress=</div>	
            <div>frm1601c:txtZipCode=".request('frm1601c:txtZipCode')."frm1601c:txtZipCode=</div>	
            <div>frm1601c:txtTelNum=".request('frm1601c:txtTelNum')."frm1601c:txtTelNum=</div>	
            <div>frm1601c:CatAgent_P=".$CatAgentP."frm1601c:CatAgent_P=</div>	
            <div>frm1601c:CatAgent_G=".$CatAgentG."frm1601c:CatAgent_G=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>frm1601c:SpecialTax_1=".$specialTax1."frm1601c:SpecialTax_1=</div>	
            <div>frm1601c:SpecialTax_2=".$specialTax2."frm1601c:SpecialTax_2=</div>	
            <div>frm1601c:selTreaty=".request('frm1601c:selTreaty')."frm1601c:selTreaty=</div>	
            <div>frm1601c:txtTax14=".request('frm1601c:txtTax14')."frm1601c:txtTax14=</div>	
            <div>frm1601c:txtTax15=".request('frm1601c:txtTax15')."frm1601c:txtTax15=</div>	
            <div>frm1601c:txtTax16=".request('frm1601c:txtTax16')."frm1601c:txtTax16=</div>	
            <div>frm1601c:txtTax17=".request('frm1601c:txtTax17')."frm1601c:txtTax17=</div>	
            <div>frm1601c:txtTax18=".request('frm1601c:txtTax18')."frm1601c:txtTax18=</div>	
            <div>frm1601c:txtTax19=".request('frm1601c:txtTax19')."frm1601c:txtTax19=</div>	
            <div>frm1601c:txt20Other=".request('frm1601c:txt20Other')."frm1601c:txt20Other=</div>	
            <div>frm1601c:txtTax20=".request('frm1601c:txtTax20')."frm1601c:txtTax20=</div>	
            <div>frm1601c:txtTax21=".request('frm1601c:txtTax21')."frm1601c:txtTax21=</div>	
            <div>frm1601c:txtTax22=".request('frm1601c:txtTax22')."frm1601c:txtTax22=</div>	
            <div>frm1601c:txtTax23=".request('frm1601c:txtTax23')."frm1601c:txtTax23=</div>	
            <div>frm1601c:txtTax24=".request('frm1601c:txtTax24')."frm1601c:txtTax24=</div>	
            <div>frm1601c:txtTax25=".request('frm1601c:txtTax25')."frm1601c:txtTax25=</div>	
            <div>frm1601c:txtTax26=".request('frm1601c:txtTax26')."frm1601c:txtTax26=</div>	
            <div>frm1601c:txtTax27=".request('frm1601c:txtTax27')."frm1601c:txtTax27=</div>	
            <div>frm1601c:txtTax28=".request('frm1601c:txtTax28')."frm1601c:txtTax28=</div>	
            <div>frm1601c:txt29Other=".request('frm1601c:txt29Other')."frm1601c:txt29Other=</div>	
            <div>frm1601c:txtTax29=".request('frm1601c:txtTax29')."frm1601c:txtTax29=</div>	
            <div>frm1601c:txtTax30=".request('frm1601c:txtTax30')."frm1601c:txtTax30=</div>	
            <div>frm1601c:txtTax31=".request('frm1601c:txtTax31')."frm1601c:txtTax31=</div>	
            <div>frm1601c:txtTax32=".request('frm1601c:txtTax32')."frm1601c:txtTax32=</div>	
            <div>frm1601c:txtTax33=".request('frm1601c:txtTax33')."frm1601c:txtTax33=</div>	
            <div>frm1601c:txtTax34=".request('frm1601c:txtTax34')."frm1601c:txtTax34=</div>	
            <div>frm1601c:txtTax35=".request('frm1601c:txtTax35')."frm1601c:txtTax35=</div>	
            <div>frm1601c:txtTax36=".request('frm1601c:txtTax36')."frm1601c:txtTax36=</div>	
            <div>txtTaxAgentNo=txtTaxAgentNo=</div>	
            <div>txtDateIssue=txtDateIssue=</div>	
            <div>txtDateExpiry=txtDateExpiry=</div>	
            <div>frm1601c:txtAgency37=frm1601c:txtAgency37=</div>	
            <div>frm1601c:txtNumber37=frm1601c:txtNumber37=</div>	
            <div>frm1601c:txtDate37=frm1601c:txtDate37=</div>	
            <div>frm1601c:txtAmount37=frm1601c:txtAmount37=</div>	
            <div>frm1601c:txtAgency38=frm1601c:txtAgency38=</div>	
            <div>frm1601c:txtNumber38=frm1601c:txtNumber38=</div>	
            <div>frm1601c:txtDate38=frm1601c:txtDate38=</div>	
            <div>frm1601c:txtAmount38=frm1601c:txtAmount38=</div>	
            <div>frm1601c:txtNumber39=frm1601c:txtNumber39=</div>	
            <div>frm1601c:txtDate39=frm1601c:txtDate39=</div>	
            <div>frm1601c:txtAmount39=frm1601c:txtAmount39=</div>	
            <div>frm1601c:txtParticular40=frm1601c:txtParticular40=</div>	
            <div>frm1601c:txtAgency40=frm1601c:txtAgency40=</div>	
            <div>frm1601c:txtNumber40=frm1601c:txtNumber40=</div>	
            <div>frm1601c:txtDate40=frm1601c:txtDate40=</div>	
            <div>frm1601c:txtAmount40=frm1601c:txtAmount40=</div>	
            <div>frm1601c:txtPg2TIN1=".request('frm1601c:txtPg2TIN1')."frm1601c:txtPg2TIN1=</div>	
            <div>frm1601c:txtPg2TIN2=".request('frm1601c:txtPg2TIN2')."frm1601c:txtPg2TIN2=</div>	
            <div>frm1601c:txtPg2TIN3=".request('frm1601c:txtPg2TIN3')."frm1601c:txtPg2TIN3=</div>	
            <div>frm1601c:txtPg2BranchCode=".request('frm1601c:txtPg2BranchCode')."frm1601c:txtPg2BranchCode=</div>	
            <div>frm1601c:txtPg2TaxpayerName=".request('frm1601c:txtPg2TaxpayerName')."frm1601c:txtPg2TaxpayerName=</div>	
            ".$schedule1Part1."".$schedule1Part2."<div>frm1601c:sched1:txtTotal1=".request('frm1601c:sched1:txtTotal1')."frm1601c:sched1:txtTotal1=</div>	
            <div>frm1601c:txtCurrentPage=1frm1601c:txtCurrentPage=</div>	
            <div>frm1601c:txtMaxPage=2frm1601c:txtMaxPage=</div>	
            <div>frm1601c:txtLineBus=".rawurlencode(request('frm1601c:txtLineBus'))."frm1601c:txtLineBus=</div>	
            	
            All Rights Reserved BIR 2012.";


            $tin = request('frm1601c:txtTIN1').request('frm1601c:txtTIN2').request('frm1601c:txtTIN3').request('frm1601c:txtBranchCode');

            $getReturnPeriod = tbl_1601C::where('company_id',  request('company'))
                            ->where('item1A', request('frm1601c:txtMonth'))
                            ->where('item1B', request('frm1601c:txtYear'))
                            ->count();

            $returnPeriod = request('frm1601c:txtMonth')."/".request('frm1601c:txtYear');

            if($getReturnPeriod == "1"){
                $xmlReturnPeriod = request('frm1601c:txtMonth').request('frm1601c:txtYear');
            }else{
                if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1601Cv2018')
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
                $xmlReturnPeriod = request('frm1601c:txtMonth').request('frm1601c:txtYear').$ext;
            }

            $filename = $tin."-1601Cv2018-".$xmlReturnPeriod.'.xml';

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
                'form'          => '1601Cv2018',
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
                            ->where('form', '1601Cv2018')
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
                            ->where('form', '1601Cv2018')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1601C::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1601Cv2018')
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

        $data = tbl_1601C::find($form_id);
        $schedules = tbl_1601C_schedule::where('form_id', $form_id)->get();

        return view('forms.BIR-Form 1601Cv2018',['company' => $company, 'data' => $data, 'schedules' => $schedules, 'action' => $action]);
    }
}

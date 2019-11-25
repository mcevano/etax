<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2551M;
use App\tbl_2551M_atc;
use App\tbl_2551M_schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2551MController extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);

    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);
    	if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2551_ms')){

            }else{
                Schema::connection('mysql2')->create('tbl_2551_ms', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1')->nullable();
                    $table->string('item2A');
                    $table->string('item2B');
                    $table->string('item3A')->nullable();
                    $table->string('item3B')->nullable();
                    $table->string('item4')->nullable();
                    $table->string('item5');
                    $table->string('item13A');
                    $table->string('item13B')->nullable();
                    $table->text('item19');
                    $table->text('item20A');
                    $table->text('item20B');
                    $table->text('item21');
                    $table->text('item22');
                    $table->text('item23A');
                    $table->text('item23B');
                    $table->text('item23C');
                    $table->text('item23D');
                    $table->text('item24');
                    $table->text('item_overpayment')->nullable();
                    $table->text('total_amount')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2551_m_atcs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc')->nullable();
                    $table->text('description')->nullable();
                    $table->text('taxable_amount')->nullable();
                    $table->text('tax_rate')->nullable();
                    $table->text('tax_due');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2551_m_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('period')->nullable();
                    $table->text('agent')->nullable();
                    $table->text('payments')->nullable();
                    $table->text('withheld')->nullable();
                    $table->text('applied');
                    $table->timestamps();
                });
            }
           
	        return view('forms.BIR-Form 2551M',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{
            $data = tbl_2551M::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2551M')
                            ->get();
            return view('forms.BIR-Form 2551M',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }	
    }
    public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);
        
        $data = ([
            'form_no'           => request('form_no'),
            'company_id'        => request('company'),
            'item1'             => null !== request('frm2551M:optYrType') ? request('frm2551M:optYrType') : '',
            'item2A'            => request('frm2551m:YearEndedMonth'),
            'item2B'            => request('frm2551m:txtYear'),
            'item3A'             => request('frm2551m:ReturnMonth'),
            'item3B'             => request('frm2551m:txtNo3Year'),
            'item4'             => request('frm2551m:ctypeCode'),
            'item5'             => request('frm2551m:txtSheets'),
            'item13A'           => request('frm2551m:j_id217'),
            'item13B'           => request('frm2551m:txtTaxRelief25'),
            'item19'            => request('frm2551m:txtTotalTaxDue'),
            'item20A'           => request('frm2551m:txt20A'),
            'item20B'           => request('frm2551m:txt20B'),
            'item21'            => request('frm2551m:txt21'),
            'item22'            => request('frm2551m:txt22'),
            'item23A'           => request('frm2551m:txtSurcharge'),
            'item23B'           => request('frm2551m:txtInterest'),
            'item23C'           => request('frm2551m:txtCompromise'),
            'item23D'           => request('frm2551m:txt23D'),
            'item24'            => request('frm2551m:txtTotalAmountPayable_24'),
            'item_overpayment'  => null !== request('frm2551m:overPayment') ? request('frm2551m:overPayment') : '',
            'total_amount'      => request('frm2551m:txtTax15'),
        ]);

        $getForm = tbl_2551M::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

        $form = "";
        if(request('form_id') != ""){
            $form = tbl_2551M::find(request('form_id'));
            $form->update($data);
            tbl_2551M_atc::where('form_id', $getForm[0]->id)->delete();
            tbl_2551M_schedules::where('form_id', $getForm[0]->id)->delete();
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2551M::create($data);
            }else{
                $form = tbl_2551M::find($getForm[0]->id);
                $form->update($data);
                tbl_2551M_atc::where('form_id', $getForm[0]->id)->delete();
                tbl_2551M_schedules::where('form_id', $getForm[0]->id)->delete();
            }
        }

        if(null !== request('atcSelectedNaturePayment')){
            for($i=0;$i <= count(request('atcSelectedNaturePayment')) - 1; $i++ ){
                $atc = ([
                    'form_id'           => $form->id,
                    'atc'               => request('ATCnameCode')[$i],
                    'description'       => request('atcSelectedNaturePayment')[$i],
                    'taxable_amount'    => request('txtTaxableAmount')[$i],
                    'tax_rate'          => request('txtTaxRate')[$i],
                    'tax_due'           => request('txtTaxDue')[$i],
                ]);

                tbl_2551M_atc::create($atc);
            }
        }

        if(null !== request('frm2551m:txtPeriodCovered')){
            for($i=0;$i <= count(request('frm2551m:txtPeriodCovered')) - 1; $i++ ){
                if(request('frm2551m:txtTax15') != ''){
                    $schedules = ([
                        'form_id'     => $form->id,
                        'period'      => request('frm2551m:txtPeriodCovered')[$i],
                        'agent'       => request('frm2551m:txtNameOfWithAgent')[$i],
                        'payments'    => request('frm2551m:txtIncomePayments')[$i],
                        'withheld'    => request('frm2551m:txtTaxWithheld')[$i],
                        'applied'     => request('frm2551m:txtApplied')[$i],
                    ]);
                    tbl_2551M_schedules::create($schedules);
                }
            }
        }

        $optYrType1 = "false";
        $optYrType2 = "false";
        if(null !== request('frm2551M:optYrType')){
            if(request('frm2551M:optYrType') == "Y"){
                $optYrType1 = "true";
            }else if(request('frm2551M:optYrType') == "N"){
                $optYrType2 = "true";
            }
        }

        $ctypeCode_1 = "false";
        $ctypeCode_2 = "false";

        if(request('frm2551m:ctypeCode') == 'Y'){
            $ctypeCode_1 = "true";
        }else if(request('frm2551m:ctypeCode') == 'N'){
            $ctypeCode_2 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm2551m:txtTaxPayerName'));

        $address = rawurlencode(request('frm2551m:txtAddress'));

        $lineBusiness = rawurlencode(request('frm2551m:txtLineOfBusiness'));

        $j_id2171 = "false";
        $j_id2172 = "false";
        if(request('frm2551m:j_id217') == 'Y'){
            $j_id2171 = "true";
        }else if(request('frm2551m:j_id217') == 'N'){
            $j_id2172 = "true";
        }

        $optToBeRefunded1 = "false";
        $optToBeRefunded2 = "false";

        if(null !== request('frm2551m:overPayment')){
            if(request('frm2551m:overPayment') == 'I'){
                $optToBeRefunded1 = "true";
            }else if(request('frm2551m:overPayment') == 'C'){
                $optToBeRefunded2 = "true";
            }
        }

        $xml_atc = "";
        if(null !== request('atcSelectedNaturePayment')){
            for($i=0;$i <= count(request('atcSelectedNaturePayment')) - 1; $i++ ){
                $xml_atc .= "<div>txtTaxableAmount".($i+1)."=".request('txtTaxableAmount')[$i]."txtTaxableAmount".($i+1)."=</div>	
            <div>txtTaxRate".($i+1)."=".request('txtTaxRate')[$i]."txtTaxRate".($i+1)."=</div>	
            <div>txtTaxDue".($i+1)."=".request('txtTaxDue')[$i]."txtTaxDue".($i+1)."=</div>	
            ";
            }
        }
		
		$xml_schedule = "";
		if(null !== request('frm2551m:txtPeriodCovered')){
            for($i=0;$i <= count(request('frm2551m:txtPeriodCovered')) - 1; $i++ ){
                $xml_schedule .= "<div>frm2551m:txtPeriodCovered".$i."=".request('frm2551m:txtPeriodCovered')[$i]."frm2551m:txtPeriodCovered".$i."=</div>	
            <div>frm2551m:txtNameOfWithAgent".$i."=".request('frm2551m:txtNameOfWithAgent')[$i]."frm2551m:txtNameOfWithAgent".$i."=</div>	
            <div>frm2551m:txtIncomePayments".$i."=".request('frm2551m:txtIncomePayments')[$i]."frm2551m:txtIncomePayments".$i."=</div>	
            <div>frm2551m:txtTaxWithheld".$i."=".request('frm2551m:txtTaxWithheld')[$i]."frm2551m:txtTaxWithheld".$i."=</div>	
            <div>frm2551m:txtApplied".$i."=".request('frm2551m:txtApplied')[$i]."frm2551m:txtApplied".$i."=</div>	
            ";
            }
        }
		
        $xmlData ="<?xml version='1.0'?>	
            <div>frm2551M:optYrType:_1=".$optYrType1."frm2551M:optYrType:_1=</div>	
            <div>frm2551M:optYrType:_2=".$optYrType2."frm2551M:optYrType:_2=</div>	
            <div>frm2551m:YearEndedMonth=".request('frm2551m:YearEndedMonth')."frm2551m:YearEndedMonth=</div>	
            <div>frm2551m:txtYear=".request('frm2551m:txtYear')."frm2551m:txtYear=</div>	
            <div>frm2551m:ReturnMonth=".request('frm2551m:ReturnMonth')."frm2551m:ReturnMonth=</div>	
            <div>frm2551m:txtNo3Year=".request('frm2551m:txtNo3Year')."frm2551m:txtNo3Year=</div>	
            <div>frm2551m:ctypeCode_1=".$ctypeCode_1."frm2551m:ctypeCode_1=</div>	
            <div>frm2551m:ctypeCode_2=".$ctypeCode_2."frm2551m:ctypeCode_2=</div>	
            <div>frm2551m:txtSheets=".request('frm2551m:txtSheets')."frm2551m:txtSheets=</div>	
            <div>frm2551m:txtTIN1=".request('frm2551m:txtTIN1')."frm2551m:txtTIN1=</div>	
            <div>frm2551m:txtTIN2=".request('frm2551m:txtTIN2')."frm2551m:txtTIN2=</div>	
            <div>frm2551m:txtTIN3=".request('frm2551m:txtTIN3')."frm2551m:txtTIN3=</div>	
            <div>frm2551m:txtBranchCode=".request('frm2551m:txtBranchCode')."frm2551m:txtBranchCode=</div>	
            <div>frm2551m:txtRDOCode=".request('frm2551m:txtRDOCode')."frm2551m:txtRDOCode=</div>	
            <div>frm2551m:txtLineOfBusiness=".$lineBusiness."frm2551m:txtLineOfBusiness=</div>	
            <div>frm2551m:txtTaxPayerName=".$taxPayerName."frm2551m:txtTaxPayerName=</div>	
            <div>frm2551m:txtTelNum=".request('frm2551m:txtTelNum')."frm2551m:txtTelNum=</div>	
            <div>frm2551m:txtAddress=".$address."frm2551m:txtAddress=</div>	
            <div>frm2551m:txtZipCode=".request('frm2551m:txtZipCode')."frm2551m:txtZipCode=</div>	
            <div>frm2551m:j_id217:_1=".$j_id2171."frm2551m:j_id217:_1=</div>	
            <div>frm2551m:j_id217:_2=".$j_id2172."frm2551m:j_id217:_2=</div>	
            <div>frm2551m:txtTaxRelief25=".request('frm2551m:txtTaxRelief25')."frm2551m:txtTaxRelief25=</div>	
            ".$xml_atc."<div>frm2551m:txtTotalTaxDue=".request('frm2551m:txtTotalTaxDue')."frm2551m:txtTotalTaxDue=</div>	
            <div>frm2551m:txt20A=".request('frm2551m:txt20A')."frm2551m:txt20A=</div>	
            <div>frm2551m:txt20B=".request('frm2551m:txt20B')."frm2551m:txt20B=</div>	
            <div>frm2551m:txt21=".request('frm2551m:txt21')."frm2551m:txt21=</div>	
            <div>frm2551m:txt22=".request('frm2551m:txt22')."frm2551m:txt22=</div>	
            <div>frm2551m:txtSurcharge=".request('frm2551m:txtSurcharge')."frm2551m:txtSurcharge=</div>	
            <div>frm2551m:txtInterest=".request('frm2551m:txtInterest')."frm2551m:txtInterest=</div>	
            <div>frm2551m:txtCompromise=".request('frm2551m:txtCompromise')."frm2551m:txtCompromise=</div>	
            <div>frm2551m:txt23D=".request('frm2551m:txt23D')."frm2551m:txt23D=</div>	
            <div>frm2551m:txtTotalAmountPayable_24=".request('frm2551m:txtTotalAmountPayable_24')."frm2551m:txtTotalAmountPayable_24=</div>	
            <div>frm2551m:optToBeRefunded:_1=".$optToBeRefunded1."frm2551m:optToBeRefunded:_1=</div>	
            <div>frm2551m:optToBeIssued:_2=".$optToBeRefunded2."frm2551m:optToBeIssued:_2=</div>	
            ".$xml_schedule."<div>frm2551m:txtTotalAmount=".request('frm2551m:txtTax15')."frm2551m:txtTotalAmount=</div>	
            <div>AtcCode1=".(null !== request('AtcCode1') ? 'true' : 'false')."AtcCode1=</div>	
            <div>AtcCode2=".(null !== request('AtcCode2') ? 'true' : 'false')."AtcCode2=</div>	
            <div>AtcCode3=".(null !== request('AtcCode3') ? 'true' : 'false')."AtcCode3=</div>	
            <div>AtcCode4=".(null !== request('AtcCode4') ? 'true' : 'false')."AtcCode4=</div>	
            <div>AtcCode5=".(null !== request('AtcCode5') ? 'true' : 'false')."AtcCode5=</div>	
            <div>AtcCode6=".(null !== request('AtcCode6') ? 'true' : 'false')."AtcCode6=</div>	
            <div>AtcCode7=".(null !== request('AtcCode7') ? 'true' : 'false')."AtcCode7=</div>	
            <div>AtcCode8=".(null !== request('AtcCode8') ? 'true' : 'false')."AtcCode8=</div>	
            <div>AtcCode9=".(null !== request('AtcCode9') ? 'true' : 'false')."AtcCode9=</div>	
            <div>AtcCode10=".(null !== request('AtcCode10') ? 'true' : 'false')."AtcCode10=</div>	
            <div>AtcCode11=".(null !== request('AtcCode11') ? 'true' : 'false')."AtcCode11=</div>	
            <div>AtcCode12=".(null !== request('AtcCode12') ? 'true' : 'false')."AtcCode12=</div>	
            <div>AtcCode13=".(null !== request('AtcCode13') ? 'true' : 'false')."AtcCode13=</div>	
            <div>AtcCode14=".(null !== request('AtcCode14') ? 'true' : 'false')."AtcCode14=</div>	
            <div>AtcCode15=".(null !== request('AtcCode15') ? 'true' : 'false')."AtcCode15=</div>	
            <div>AtcCode16=".(null !== request('AtcCode16') ? 'true' : 'false')."AtcCode16=</div>	
            <div>AtcCode17=".(null !== request('AtcCode17') ? 'true' : 'false')."AtcCode17=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm2551m:txtTIN1').request('frm2551m:txtTIN2').request('frm2551m:txtTIN3').request('frm2551m:txtBranchCode');

        $getReturnPeriod = tbl_2551M::where('company_id',  request('company'))
                            ->where('item3A', request('frm2551m:ReturnMonth'))
                            ->where('item3B', request('frm2551m:txtNo3Year'))
                            ->count();

        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm2551m:ReturnMonth').request('frm2551m:txtNo3Year');
        }else{
            $count = $getReturnPeriod - 1;
            $xmlReturnPeriod = request('frm2551m:ReturnMonth').request('frm2551m:txtNo3Year').'V'.$count;
        }

        $returnPeriod = request('frm2551m:ReturnMonth')."/".request('frm2551m:txtNo3Year');

        $filename = $tin."-2551M-".$xmlReturnPeriod.'.xml';

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
                'form'          => '2551M',
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
                            ->where('form', '2551M')
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
                            ->where('form', '2551M')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2551M::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2551M')
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

        $data = tbl_2551M::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2551M')
                            ->get();

        return view('forms.BIR-Form 2551M',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

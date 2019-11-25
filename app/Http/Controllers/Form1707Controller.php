<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1707;
use App\tbl_1707_schedule1;
use App\tbl_1707_schedule2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class Form1707Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1707s')){

            }else{
            	Schema::connection('mysql2')->create('tbl_1707s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item1C')->nullable();
                    $table->string('item2');
                    $table->string('item3')->nullable();
                    $table->string('item4')->nullable();
                    $table->string('item7A')->nullable();
                    $table->string('item7B')->nullable();
                    $table->string('item7C')->nullable();
                    $table->string('item7D')->nullable();
                    $table->string('item8')->nullable();
                    $table->string('item10')->nullable();
                    $table->string('item12')->nullable();
                    $table->string('item14')->nullable();
                    $table->string('item15')->nullable();
                    $table->string('item15A')->nullable();
                    $table->string('item16')->nullable();
                    $table->string('item16A')->nullable();
                    $table->string('item17A')->nullable();
                    $table->string('item17B')->nullable();
                    $table->string('item17C')->nullable();
                    $table->string('item17D')->nullable();
                    $table->string('item17E')->nullable();
                    $table->string('item17FA')->nullable();
                    $table->string('item17FB')->nullable();
                    $table->string('item17FC')->nullable();
                    $table->string('item17G')->nullable();
                    $table->text('item18');
                   	$table->text('item19');
                    $table->text('item20');
                    $table->text('item21');
                    $table->text('item22');
                    $table->text('item22A')->nullable();
                    $table->text('item23');
                    $table->text('item24');
                    $table->text('item25A');
                    $table->text('item25B');
                    $table->text('item25C');
                    $table->text('item25D');
                    $table->text('item26');
                    $table->text('item27');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1707_schedule1s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('name')->nullable();
					 $table->text('certificate_no')->nullable();
					 $table->text('shares');
					 $table->text('price');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1707_schedule2s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('particulars')->nullable();
					 $table->text('amount');
                     $table->timestamps();
                });
            }
        	return view('forms.BIR-Form 1707',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_1707::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1707')
                            ->get();
        
        	return view('forms.BIR-Form 1707',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);

    	$data = ([
    		'form_no'     => request('form_no'),
			'company_id'     => request('company'),
			'item1A'     => request('frm1707:txtDateMonth'),
			'item1B'     => request('frm1707:txtDateDay'),
			'item1C'     => request('frm1707:txtDateYear'),
			'item2'     => null !== request('frm1707:j_id217') ? request('frm1707:j_id217') : '',
			'item3'     => request('frm1707:txtSheets'),
			'item4'     => null !== request('frm1707:opt4') ? request('frm1707:opt4') : '',
			'item7A'     => request('frm1707:txtTINB1'),
			'item7B'     => request('frm1707:txtTINB2'),
			'item7C'     => request('frm1707:txtTINB3'),
			'item7D'     => request('frm1707:txtBranchCodeB'),
			'item8'     => request('frm1707:txtRDOCodeB'),
			'item10'     => request('frm1707:txtBuyerName'),
			'item12'     => request('frm1707:txtBuyerAddress'),
			'item14'     => request('frm1707:txtBuyerZipCode'),
			'item15'     => request('frm1707:TaxRelief'),
			'item15A'     => request('frm1707:txtSpecify'),
			'item16'     => null !== request('frm1707:Transaction') ? request('frm1707:Transaction') : '',
			'item16A'     => request('frm1707:txt16Specify'),
			'item17A'     => request('frm1707:txt17SellingPrice'),
			'item17B'     => request('frm1707:txt17Cost'),
			'item17C'     => request('frm1707:txt17Mortgage'),
			'item17D'     => request('frm1707:txt17NumberInstallment'),
			'item17E'     => request('frm1707:txt17Amount'),
			'item17FA'     => request('frm1707:txt17DateMonth'),
			'item17FB'     => request('frm1707:txt17DateDay'),
			'item17FC'     => request('frm1707:txt17DateYear'),
			'item17G'     => request('frm1707:txt17Total'),
			'item18'     => request('frm1707:txtTax'),
			'item19'     => request('frm1707:txtLess'),
			'item20'     => request('frm1707:txtNetCap'),
			'item21'     => request('frm1707:txtTaxDue'),
			'item22'     => request('frm1707:txtTaxDue2'),
			'item22A'     => request('frm1707:txt22CompTaxDue'),
			'item23'     => request('frm1707:txtLess2'),
			'item24'     => request('frm1707:txtTaxPayable'),
			'item25A'     => request('frm1707:txtSurcharge'),
			'item25B'     => request('frm1707:txtInterest'),
			'item25C'     => request('frm1707:txtCompromise'),
			'item25D'     => request('frm1707:txtTotalPenalties'),
			'item26'     => request('frm1707:txtTotal'),
			'item27'     => request('frm1707:totalAmount1'),
    	]);

    	$getForm = tbl_1707::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();
        
        $form = "";
        $trans = "";
        if(request('form_id') != ""){
            $form = tbl_1707::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1707::create($data);
            }else{
                $form = tbl_1707::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_1707_schedule1::where('form_id', $getForm[0]->id)->delete();
            tbl_1707_schedule2::where('form_id', $getForm[0]->id)->delete();
        }

        if(null !== request('txtSched1CorpStockName')){
        	for ($i=0; $i < count(request('txtSched1CorpStockName')) ; $i++) { 
        		$schedule1 = ([
        			'form_id'     => $form->id,
					'name'     => request('txtSched1CorpStockName')[$i],
					'certificate_no'     => request('txtSched1StockCertNum')[$i],
					'shares'     => request('txtSched1NumOfShares')[$i],
					'price'     => request('txtSched1TaxableBase')[$i],
        		]);
        		tbl_1707_schedule1::create($schedule1);
        	}
        }

        if(null !== request('txtSched2Particulars')){
        	for ($i=0; $i < count(request('txtSched2Particulars')) ; $i++) { 
        		$schedule2 = ([
        			'form_id'     => $form->id,
					'particulars'     => request('txtSched2Particulars')[$i],
					'amount'     => request('txtSched2Amt')[$i],
        		]);
        		tbl_1707_schedule2::create($schedule2);
        	}
        }

        $j_id217_1 = "false";
        $j_id217_2 = "false";

        if(null !== request('frm1707:j_id217')){
        	if(request('frm1707:j_id217') == 'Y'){
        		$j_id217_1 = "true";
        	}else if(request('frm1707:j_id217') == 'N'){
        		$j_id217_2 = "true";
        	}
        }

        $opt4 = "false";
        $opt4C = "false";

        if(null !== request('frm1707:opt4')){
        	if(request('frm1707:opt4') == 'II030'){
        		$opt4 = "true";
        	}else if(request('frm1707:opt4') == 'IC110'){
        		$opt4C = "true";
        	}
        }

        $sellerName =  rawurlencode(request('frm1707:txtSellerName'));

        $buyerName =  rawurlencode(request('frm1707:txtBuyerName'));

        $sellerAddress = rawurlencode(request('frm1707:txtSellerAddress'));

        $buyerAddress = rawurlencode(request('frm1707:txtBuyerAddress'));

        $TaxRelief_Y = "false";
        $TaxRelief_N = "false";

        if(request('frm1707:TaxRelief') == 'Y'){
        	$TaxRelief_Y = "true";
        }else if(request('frm1707:TaxRelief') == 'N'){
        	$TaxRelief_N = "true";
        }

        $TaxRelief_CS = "false";
        $TaxRelief_IS = "false";
        $TaxRelief_FS = "false";
        $TaxRelief_O = "false";

        if(null !== request('frm1707:Transaction')){
        	if(request('frm1707:Transaction') == 'CS'){
        		$TaxRelief_CS = "true";
        	}else if(request('frm1707:Transaction') == 'IS'){
        		$TaxRelief_IS = "true";
        	}else if(request('frm1707:Transaction') == 'FS'){
        		$TaxRelief_FS = "true";
        	}else if(request('frm1707:Transaction') == 'O'){
        		$TaxRelief_O = "true";
        	}
        }

        $schedule1 = "";
        if(null !== request('txtSched1CorpStockName')){
        	for ($i=0; $i < count(request('txtSched1CorpStockName')) ; $i++) { 
        		$schedule1 .= "<div>chxSched1".$i."=".(null !== request('chxSched1'.$i.'') ? 'true' : 'false')."chxSched1".$i."=</div>	
            <div>txtSched1CorpStockName".$i."=".request('txtSched1CorpStockName')[$i]."txtSched1CorpStockName".$i."=</div>	
            <div>txtSched1StockCertNum".$i."=".request('txtSched1StockCertNum')[$i]."txtSched1StockCertNum".$i."=</div>	
            <div>txtSched1NumOfShares".$i."=".request('txtSched1NumOfShares')[$i]."txtSched1NumOfShares".$i."=</div>	
            <div>txtSched1TaxableBase".$i."=".request('txtSched1TaxableBase')[$i]."txtSched1TaxableBase".$i."=</div>	
            ";
        	}
        }

        $schedule2 = "";
        if(null !== request('txtSched2Particulars')){
        	for ($i=0; $i < count(request('txtSched2Particulars')) ; $i++) { 
        		$schedule2 .= "<div>chxSched2".$i."=".(null !== request('chxSched2'.$i.'') ? 'true' : 'false')."chxSched2".$i."=</div>	
            <div>txtSched2Particulars".$i."=".request('txtSched2Particulars')[$i]."txtSched2Particulars".$i."=</div>	
            <div>txtSched2Amt".$i."=".request('txtSched2Amt')[$i]."txtSched2Amt".$i."=</div>	
            ";
        	}
        }
        $xmlData ="<?xml version='1.0'?>	
            <div>frm1707:txtDateMonth=".request('frm1707:txtDateMonth')."frm1707:txtDateMonth=</div>	
            <div>frm1707:txtDateDay=".request('frm1707:txtDateDay')."frm1707:txtDateDay=</div>	
            <div>frm1707:txtDateYear=".request('frm1707:txtDateYear')."frm1707:txtDateYear=</div>	
            <div>frm1707:j_id217:_1=".$j_id217_1."frm1707:j_id217:_1=</div>	
            <div>frm1707:j_id217:_2=".$j_id217_2."frm1707:j_id217:_2=</div>	
            <div>frm1707:txtSheets=".request('frm1707:txtSheets')."frm1707:txtSheets=</div>	
            <div>frm1707:txt4=".request('frm1707:txt4')."frm1707:txt4=</div>	
            <div>frm1707:opt4=".$opt4."frm1707:opt4=</div>	
            <div>frm1707:txt4C=".request('frm1707:txt4C')."frm1707:txt4C=</div>	
            <div>frm1707:opt4C=".$opt4C."frm1707:opt4C=</div>	
            <div>frm1707:txtTIN1=".request('frm1707:txtTIN1')."frm1707:txtTIN1=</div>	
            <div>frm1707:txtTIN2=".request('frm1707:txtTIN2')."frm1707:txtTIN2=</div>	
            <div>frm1707:txtTIN3=".request('frm1707:txtTIN3')."frm1707:txtTIN3=</div>	
            <div>frm1707:txtBranchCode=".request('frm1707:txtBranchCode')."frm1707:txtBranchCode=</div>	
            <div>frm1707:txtRDOCode=".request('frm1707:txtRDOCode')."frm1707:txtRDOCode=</div>	
            <div>frm1707:txtTINB1=".request('frm1707:txtTINB1')."frm1707:txtTINB1=</div>	
            <div>frm1707:txtTINB2=".request('frm1707:txtTINB2')."frm1707:txtTINB2=</div>	
            <div>frm1707:txtTINB3=".request('frm1707:txtTINB3')."frm1707:txtTINB3=</div>	
            <div>frm1707:txtBranchCodeB=".request('frm1707:txtBranchCodeB')."frm1707:txtBranchCodeB=</div>	
            <div>frm1707:txtRDOCodeB=".request('frm1707:txtRDOCodeB')."frm1707:txtRDOCodeB=</div>	
            <div>frm1707:txtSellerName=".$sellerName."frm1707:txtSellerName=</div>	
            <div>frm1707:txtBuyerName=".$buyerName."frm1707:txtBuyerName=</div>	
            <div>frm1707:txtSellerAddress=".$sellerAddress."frm1707:txtSellerAddress=</div>	
            <div>frm1707:txtBuyerAddress=".$buyerAddress."frm1707:txtBuyerAddress=</div>	
            <div>frm1707:txtSellerZipCode=".request('frm1707:txtSellerZipCode')."frm1707:txtSellerZipCode=</div>	
            <div>frm1707:txtBuyerZipCode=".request('frm1707:txtBuyerZipCode')."frm1707:txtBuyerZipCode=</div>	
            <div>frm1707:TaxRelief_Y=".$TaxRelief_Y."frm1707:TaxRelief_Y=</div>	
            <div>frm1707:TaxRelief_N=".$TaxRelief_N."frm1707:TaxRelief_N=</div>	
            <div>frm1707:txtSpecify=".request('frm1707:txtSpecify')."frm1707:txtSpecify=</div>	
            <div>frm1707:TaxRelief_CS=".$TaxRelief_CS."frm1707:TaxRelief_CS=</div>	
            <div>frm1707:TaxRelief_IS=".$TaxRelief_IS."frm1707:TaxRelief_IS=</div>	
            <div>frm1707:TaxRelief_FS=".$TaxRelief_FS."frm1707:TaxRelief_FS=</div>	
            <div>frm1707:TaxRelief_O=".$TaxRelief_O."frm1707:TaxRelief_O=</div>	
            <div>frm1707:txt16Specify=".request('frm1707:txt16Specify')."frm1707:txt16Specify=</div>	
            <div>frm1707:txt17SellingPrice=".request('frm1707:txt17SellingPrice')."frm1707:txt17SellingPrice=</div>	
            <div>frm1707:txt17Cost=".request('frm1707:txt17Cost')."frm1707:txt17Cost=</div>	
            <div>frm1707:txt17Mortgage=".request('frm1707:txt17Mortgage')."frm1707:txt17Mortgage=</div>	
            <div>frm1707:txt17NumberInstallment=".request('frm1707:txt17NumberInstallment')."frm1707:txt17NumberInstallment=</div>	
            <div>frm1707:txt17Amount=".request('frm1707:txt17Amount')."frm1707:txt17Amount=</div>	
            <div>frm1707:txt17DateMonth=".request('frm1707:txt17DateMonth')."frm1707:txt17DateMonth=</div>	
            <div>frm1707:txt17DateDay=".request('frm1707:txt17DateDay')."frm1707:txt17DateDay=</div>	
            <div>frm1707:txt17DateYear=".request('frm1707:txt17DateYear')."frm1707:txt17DateYear=</div>	
            <div>frm1707:txt17Total=".request('frm1707:txt17Total')."frm1707:txt17Total=</div>	
            <div>frm1707:txtTax=".request('frm1707:txtTax')."frm1707:txtTax=</div>	
            <div>frm1707:txtLess=".request('frm1707:txtLess')."frm1707:txtLess=</div>	
            <div>frm1707:txtNetCap=".request('frm1707:txtNetCap')."frm1707:txtNetCap=</div>	
            <div>frm1707:txtTaxDue=".request('frm1707:txtTaxDue')."frm1707:txtTaxDue=</div>	
            <div>frm1707:txtTaxDue2=".request('frm1707:txtTaxDue2')."frm1707:txtTaxDue2=</div>	
            <div>frm1707:txt22CompTaxDue=".request('frm1707:txt22CompTaxDue')."frm1707:txt22CompTaxDue=</div>	
            <div>frm1707:txtLess2=".request('frm1707:txtLess2')."frm1707:txtLess2=</div>	
            <div>frm1707:txtTaxPayable=".request('frm1707:txtTaxPayable')."frm1707:txtTaxPayable=</div>	
            <div>frm1707:txtSurcharge=".request('frm1707:txtSurcharge')."frm1707:txtSurcharge=</div>	
            <div>frm1707:txtInterest=".request('frm1707:txtInterest')."frm1707:txtInterest=</div>	
            <div>frm1707:txtCompromise=".request('frm1707:txtCompromise')."frm1707:txtCompromise=</div>	
            <div>frm1707:txtTotalPenalties=".request('frm1707:txtTotalPenalties')."frm1707:txtTotalPenalties=</div>	
            <div>frm1707:txtTotal=".request('frm1707:txtTotal')."frm1707:txtTotal=</div>	
            ".$schedule1."<div>frm1707:totalAmount1=".request('frm1707:totalAmount1')."frm1707:totalAmount1=</div>	
            ".$schedule2."<div>frm1707:totalAmount=".request('frm1707:totalAmount')."frm1707:totalAmount=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm1707:txtTIN1').request('frm1707:txtTIN2').request('frm1707:txtTIN3').request('frm1707:txtBranchCode');

        $getReturnPeriod = tbl_1707::where('company_id',  request('company'))
                            ->where('item1A', request('frm1707:txtDateMonth'))
                            ->where('item1B', request('frm1707:txtDateDay'))
                            ->where('item1C', request('frm1707:txtDateYear'))
                            ->count();

        $returnPeriod = request('frm1707:txtDateMonth')."/".request('frm1707:txtDateDay')."/".request('frm1707:txtDateYear');
                           
        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm1707:txtDateMonth').request('frm1707:txtDateDay').request('frm1707:txtDateYear')."_".request('frm1707:txtTINB1').request('frm1707:txtTINB2').request('frm1707:txtTINB3').request('frm1707:txtBranchCodeB');
        }else{
            if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1707')
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

            $xmlReturnPeriod = request('frm1707:txtDateMonth').request('frm1707:txtDateDay').request('frm1707:txtDateYear')."_".request('frm1707:txtTINB1').request('frm1707:txtTINB2').request('frm1707:txtTINB3').request('frm1707:txtBranchCodeB').$ext;
        }
        $filename = $tin."-1707-".$xmlReturnPeriod.'.xml';

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
                'form'          => '1707',
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
                            ->where('form', '1707')
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
                            ->where('form', '1707')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1707::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1707')
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
        $data = tbl_1707::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1707')
                            ->get();
        
        return view('forms.BIR-Form 1707',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

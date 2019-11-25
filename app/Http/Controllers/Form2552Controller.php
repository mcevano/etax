<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2552;
use App\tbl_2552_schedules;
use App\tbl_2552_percentages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2552Controller extends Controller
{
    public function index($company,$action,$form_id)
    {

    	$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);

    	if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2552s')){

            }else{
                Schema::connection('mysql2')->create('tbl_2552s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item1C')->nullable();
                    $table->string('item2');
                    $table->string('item3');
                    $table->string('item9')->nullable();
                    $table->string('item9A')->nullable();
                    $table->string('item10A')->nullable();
                    $table->string('item10B')->nullable();
                    $table->string('item11A')->nullable();
                    $table->string('item11B')->nullable();
                    $table->text('item12B');
                    $table->text('item12D');
                    $table->text('item13B');
                    $table->text('item13D');
                    $table->text('item13E');
                    $table->text('item13G');
                    $table->text('item13H');
                    $table->text('item13J');
                    $table->text('item14B');
                    $table->text('item14D');
                    $table->text('item14E');
                    $table->text('item14G');
                    $table->text('item14H');
                    $table->text('item14J');
                    $table->text('item15');
                    $table->text('item16A');
                    $table->text('item16B');
                    $table->text('item16C');
                    $table->text('item17');
                    $table->text('item18A');
                    $table->text('item18B');
                    $table->text('item18C');
                    $table->text('item18D');
                    $table->text('item19');
                    $table->text('item_approved')->nullable();
                    $table->text('taxable_total')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2552_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date')->nullable();
                    $table->text('seller')->nullable();
                    $table->text('buyer')->nullable();
                    $table->text('corporation')->nullable();
                    $table->text('shares');
                    $table->text('base');
                    $table->text('rate');
                    $table->text('tax_due');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2552_percentages', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date')->nullable();
                    $table->text('seller')->nullable();
                    $table->text('buyer')->nullable();
                    $table->text('corporation')->nullable();
                    $table->text('shares');
                    $table->timestamps();
                });
    		}
    		return view('forms.BIR-Form 2552',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
   	 	}else{
            $data = tbl_2552::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2552')
                            ->get();
        
            return view('forms.BIR-Form 2552',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }
    public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);
        
        $data = ([
            'form_no'     => request('form_no'),
            'company_id'     => request('company'),
            'item1A'     => request('frm2552:txtMonth1'),
            'item1B'     => request('frm2552:txtDate'),
            'item1C'     => request('frm2552:txtForYr'),
            'item2'     => request('frm2552AmendedRtn'),
            'item3'     => request('frm2552:txtSheets'),
            'item9'     => request('frm2552OptSpecialTax'),
            'item9A'     => request('frm2552:lstTaxTreaty'),
            'item10A'     => null !== request('frm2552:PayPenalties') ? request('frm2552:PayPenalties') : '',
            'item10B'     => null !== request('frm2552:OptTransaction') ? request('frm2552:OptTransaction') : '',
            'item11A'     => request('frm2552:txt11A'),
            'item11B'     => request('frm2552:txt11B'),
            'item12B'     => request('frm2552:txtTaxBase12B'),
            'item12D'     => request('frm2552:txtTaxDue12D'),
            'item13B'     => request('frm2552:txtTaxBase13B'),
            'item13D'     => request('frm2552:txtTaxDue13D'),
            'item13E'     => request('frm2552:txtTaxBase13E'),
            'item13G'     => request('frm2552:txtTaxDue13G'),
            'item13H'     => request('frm2552:txtTaxBase13H'),
            'item13J'     => request('frm2552:txtTaxDue13J'),
            'item14B'     => request('frm2552:txtTaxBase14B'),
            'item14D'     => request('frm2552:txtTaxDue14D'),
            'item14E'     => request('frm2552:txtTaxBase14E'),
            'item14G'     => request('frm2552:txtTaxDue14G'),
            'item14H'     => request('frm2552:txtTaxBase14H'),
            'item14J'     => request('frm2552:txtTaxDue14J'),
            'item15'     => request('frm2552:txt15'),
            'item16A'     => request('frm2552:txt16A'),
            'item16B'     => request('frm2552:txt16B'),
            'item16C'     => request('frm2552:txt16C'),
            'item17'     => request('frm2552:txt17'),
            'item18A'     => request('frm2552:txt18A'),
            'item18B'     => request('frm2552:txt18B'),
            'item18C'     => request('frm2552:txt18C'),
            'item18D'     => request('frm2552:txt18D'),
            'item19'     => request('frm2552:txt19'),
            'item_approved'     => null !== request('frm2552:txt19ifoverpay') ? request('frm2552:txt19ifoverpay') : '',
            'taxable_total'     => request('TaxabletxtTotal'),
        ]);

        $getForm = tbl_2552::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

        $form = "";
        $trans = "";
        if(request('form_id') != ""){
            $form = tbl_2552::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2552::create($data);
            }else{
                $form = tbl_2552::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
            tbl_2552_schedules::where('form_id', $getForm[0]->id)->delete();
            tbl_2552_percentages::where('form_id', $getForm[0]->id)->delete();
        }

        if(null !== request('txtDateNoTax')){
            for ($i=0; $i < count(request('txtDateNoTax')) ; $i++) { 
                $percentages = ([
                    'form_id'     => $form->id,
                    'date'     => request('txtDateNoTax')[$i],
                    'seller'     => request('txtSellerNoTax')[$i],
                    'buyer'     => request('txtBuyerNoTax')[$i],
                    'corporation'     => request('txtIssuingCorpNoTax')[$i],
                    'shares'     => request('txtNumberSharesNoTax')[$i],
                ]);
                tbl_2552_percentages::create($percentages);
            }
        }

        if(null !== request('txtDate')){
            for ($i=0; $i < count(request('txtDate')) ; $i++) { 
                $schedule = ([
                    'form_id'     => $form->id,
                    'date'     => request('txtDate')[$i],
                    'seller'     => request('txtSeller')[$i],
                    'buyer'     => request('txtBuyer')[$i],
                    'corporation'     => request('txtIssuingCorp')[$i],
                    'shares'     => request('txtNumberShares')[$i],
                    'base'     => request('txtTaxableBase')[$i],
                    'rate'     => request('selTaxRate')[$i],
                    'tax_due'     => request('txtTaxDue')[$i],
                ]);
                tbl_2552_schedules::create($schedule);
            }
        }

        $AmendedRtn1 = "false";
        $AmendedRtn2 = "false";

        if( request('frm2552AmendedRtn') == "Y"){
          $AmendedRtn1 = "true";
        }else if( request('frm2552AmendedRtn') == "N"){
          $AmendedRtn2 = "true";
        }
 
        $taxPayerName =  rawurlencode(request('frm2552:txtNameStockBrocker'));
 
        $address = rawurlencode(request('frm2552:txtAddress'));

        $OptSpecialTax1 = "false";
        $OptSpecialTax2 = "false";
        if( request('frm2552OptSpecialTax') == "Y"){
          $OptSpecialTax1 = "true";
        }else if( request('frm2552OptSpecialTax') == "N"){
          $OptSpecialTax2 = "true";
        }

        $OptTransaction1 = "false";
        $OptTransaction2 = "false";
        if(null !== request('frm2552:OptTransaction')){
            if( request('frm2552:OptTransaction') == "P"){
              $OptTransaction1 = "true";
            }else if( request('frm2552:OptTransaction') == "S"){
              $OptTransaction2 = "true";
            }
        }
        
        $ifoverpay1 = "false";
        $ifoverpay2 = "false";
        $ifoverpay3 = "false";

        if(null !== request('frm2552:txt19ifoverpay')){
            if( request('frm2552:txt19ifoverpay') == "R"){
              $ifoverpay1 = "true";
            }else if( request('frm2552:txt19ifoverpay') == "I"){
              $ifoverpay2 = "true";
            }else if( request('frm2552:txt19ifoverpay') == "C"){
              $ifoverpay3 = "true";
            }
        }

        $schedule = "";
        if(null !== request('txtDate')){
            for ($i=0; $i < count(request('txtDate')) ; $i++) { 
                $schedule .= "<div>chkTaxTrans".($i + 1)."=".(null !== request('chkTaxTrans')[$i] ? 'true' : 'false')."chkTaxTrans".($i + 1)."=</div>	
            <div>txtDate".($i + 1)."=".request('txtDate')[$i]."txtDate".($i + 1)."=</div>	
            <div>txtSeller".($i + 1)."=".request('txtSeller')[$i]."txtSeller".($i + 1)."=</div>	
            <div>txtBuyer".($i + 1)."=".request('txtBuyer')[$i]."txtBuyer".($i + 1)."=</div>	
            <div>txtIssuingCorp".($i + 1)."=".request('txtIssuingCorp')[$i]."txtIssuingCorp".($i + 1)."=</div>	
            <div>txtNumberShares".($i + 1)."=".request('txtNumberShares')[$i]."txtNumberShares".($i + 1)."=</div>	
            <div>txtTaxableBase".($i + 1)."=".request('txtTaxableBase')[$i]."txtTaxableBase".($i + 1)."=</div>	
            <div>selTaxRate".($i + 1)."=".request('selTaxRate')[$i]."selTaxRate".($i + 1)."=</div>	
            <div>txtTaxDue".($i + 1)."=".request('txtTaxDue')[$i]."txtTaxDue".($i + 1)."=</div>	
            ";
            }
        }

        $percentages = "";
        if(null !== request('txtDateNoTax')){
            for ($i=0; $i < count(request('txtDateNoTax')) ; $i++) { 
                $percentages .= "<div>chkTaxTransModal".($i + 1)."=".(null !== request('chkTaxTransModal')[$i] ? 'true' : 'false')."chkTaxTransModal".($i + 1)."=</div>	
            <div>txtDateNoTax".($i + 1)."=".request('txtDateNoTax')[$i]."txtDateNoTax".($i + 1)."=</div>	
            <div>txtSellerNoTax".($i + 1)."=".request('txtSellerNoTax')[$i]."txtSellerNoTax".($i + 1)."=</div>	
            <div>txtBuyerNoTax".($i + 1)."=".request('txtBuyerNoTax')[$i]."txtBuyerNoTax".($i + 1)."=</div>	
            <div>txtIssuingCorpNoTax".($i + 1)."=".request('txtIssuingCorpNoTax')[$i]."txtIssuingCorpNoTax".($i + 1)."=</div>	
            <div>txtNumberSharesNoTax".($i + 1)."=".request('txtNumberSharesNoTax')[$i]."txtNumberSharesNoTax".($i + 1)."=</div>	
            ";
            }
        }      

        $xmlData = "<?xml version='1.0'?>	
            <div>frm2552:txtMonth1=".request('frm2552:txtMonth1')."frm2552:txtMonth1=</div>	
            <div>frm2552:txtDate=".request('frm2552:txtDate')."frm2552:txtDate=</div>	
            <div>frm2552:txtForYr=".request('frm2552:txtForYr')."frm2552:txtForYr=</div>	
            <div>frm2552AmendedRtn1=".$AmendedRtn1."frm2552AmendedRtn1=</div>	
            <div>frm2552AmendedRtn2=".$AmendedRtn2."frm2552AmendedRtn2=</div>	
            <div>frm2552:txtSheets=".request('frm2552:txtSheets')."frm2552:txtSheets=</div>	
            <div>frm2552:txtTIN1=".request('frm2552:txtTIN1')."frm2552:txtTIN1=</div>	
            <div>frm2552:txtTIN2=".request('frm2552:txtTIN2')."frm2552:txtTIN2=</div>	
            <div>frm2552:txtTIN3=".request('frm2552:txtTIN3')."frm2552:txtTIN3=</div>	
            <div>frm2552:txtBranchCode=".request('frm2552:txtBranchCode')."frm2552:txtBranchCode=</div>	
            <div>frm2552:txtRDOCode=".request('frm2552:txtRDOCode')."frm2552:txtRDOCode=</div>	
            <div>frm2552:txtTelNum=".request('frm2552:txtTelNum')."frm2552:txtTelNum=</div>	
            <div>frm2552:txtNameStockBrocker=".$taxPayerName."frm2552:txtNameStockBrocker=</div>	
            <div>frm2552:txtAddress=".$address."frm2552:txtAddress=</div>	
            <div>frm2552:txtZipCode=".request('frm2552:txtZipCode')."frm2552:txtZipCode=</div>	
            <div>frm2552OptSpecialTax1=".$OptSpecialTax1."frm2552OptSpecialTax1=</div>	
            <div>frm2552OptSpecialTax2=".$OptSpecialTax2."frm2552OptSpecialTax2=</div>	
            <div>frm2552:lstTaxTreaty=".request('frm2552:lstTaxTreaty')."frm2552:lstTaxTreaty=</div>	
            <div>frm2552:PayPenalties=".(null !== request('frm2552:PayPenalties') ? 'true' : 'false')."frm2552:PayPenalties=</div>	
            <div>frm2552:OptTransaction1=".$OptTransaction1."frm2552:OptTransaction1=</div>	
            <div>frm2552:OptTransaction2=".$OptTransaction2."frm2552:OptTransaction2=</div>	
            <div>frm2552:txt11A=".request('frm2552:txt11A')."frm2552:txt11A=</div>	
            <div>frm2552:txt11B=".request('frm2552:txt11B')."frm2552:txt11B=</div>	
            <div>frm2552:txtATC12A=".request('frm2552:txtATC12A')."frm2552:txtATC12A=</div>	
            <div>frm2552:txtTaxBase12B=".request('frm2552:txtTaxBase12B')."frm2552:txtTaxBase12B=</div>	
            <div>frm2552:txtTaxDue12D=".request('frm2552:txtTaxDue12D')."frm2552:txtTaxDue12D=</div>	
            <div>frm2552:txtATC13A=".request('frm2552:txtATC13A')."frm2552:txtATC13A=</div>	
            <div>frm2552:txtTaxBase13B=".request('frm2552:txtTaxBase13B')."frm2552:txtTaxBase13B=</div>	
            <div>frm2552:txtTaxDue13D=".request('frm2552:txtTaxDue13D')."frm2552:txtTaxDue13D=</div>	
            <div>frm2552:txtTaxBase13E=".request('frm2552:txtTaxBase13E')."frm2552:txtTaxBase13E=</div>	
            <div>frm2552:txtTaxDue13G=".request('frm2552:txtTaxDue13G')."frm2552:txtTaxDue13G=</div>	
            <div>frm2552:txtTaxBase13H=".request('frm2552:txtTaxBase13H')."frm2552:txtTaxBase13H=</div>	
            <div>frm2552:txtTaxDue13J=".request('frm2552:txtTaxDue13J')."frm2552:txtTaxDue13J=</div>	
            <div>frm2552:txtATC14A=".request('frm2552:txtATC14A')."frm2552:txtATC14A=</div>	
            <div>frm2552:txtTaxBase14B=".request('frm2552:txtTaxBase14B')."frm2552:txtTaxBase14B=</div>	
            <div>frm2552:txtTaxDue14D=".request('frm2552:txtTaxDue14D')."frm2552:txtTaxDue14D=</div>	
            <div>frm2552:txtTaxBase14E=".request('frm2552:txtTaxBase14E')."frm2552:txtTaxBase14E=</div>	
            <div>frm2552:txtTaxDue14G=".request('frm2552:txtTaxDue14G')."frm2552:txtTaxDue14G=</div>	
            <div>frm2552:txtTaxBase14H=".request('frm2552:txtTaxBase14H')."frm2552:txtTaxBase14H=</div>	
            <div>frm2552:txtTaxDue14J=".request('frm2552:txtTaxDue14J')."frm2552:txtTaxDue14J=</div>	
            <div>frm2552:txt15=".request('frm2552:txt15')."frm2552:txt15=</div>	
            <div>frm2552:txt16A=".request('frm2552:txt16A')."frm2552:txt16A=</div>	
            <div>frm2552:txt16B=".request('frm2552:txt16B')."frm2552:txt16B=</div>	
            <div>frm2552:txt16C=".request('frm2552:txt16C')."frm2552:txt16C=</div>	
            <div>frm2552:txt17=".request('frm2552:txt17')."frm2552:txt17=</div>	
            <div>frm2552:txt18A=".request('frm2552:txt18A')."frm2552:txt18A=</div>	
            <div>frm2552:txt18B=".request('frm2552:txt18B')."frm2552:txt18B=</div>	
            <div>frm2552:txt18C=".request('frm2552:txt18C')."frm2552:txt18C=</div>	
            <div>frm2552:txt18D=".request('frm2552:txt18D')."frm2552:txt18D=</div>	
            <div>frm2552:txt19=".request('frm2552:txt19')."frm2552:txt19=</div>	
            <div>frm2552:txt19ifoverpay:_1=".$ifoverpay1."frm2552:txt19ifoverpay:_1=</div>	
            <div>frm2552:txt19ifoverpay:_2=".$ifoverpay2."frm2552:txt19ifoverpay:_2=</div>	
            <div>frm2552:txt19ifoverpay:_3=".$ifoverpay3."frm2552:txt19ifoverpay:_3=</div>	
            ".$schedule."<div>TaxabletxtTotal=".request('TaxabletxtTotal')."TaxabletxtTotal=</div>	
            ".$percentages."<div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm2552:txtTIN1').request('frm2552:txtTIN2').request('frm2552:txtTIN3').request('frm2552:txtBranchCode');
            
        $returnPeriod = request('frm2552:txtMonth1')."/".request('frm2552:txtDate')."/".request('frm2552:txtForYr');

        $ext_file = "";
            
        if(null !== request('frm2552:PayPenalties')){
            $ext_file = "LSE";
        }

        if(null !== request('frm2552:OptTransaction')){
            if(request('frm2552:OptTransaction') == 'P'){
                $ext_file = "PRI";
            }else if(request('frm2552:OptTransaction') == 'S'){
                $ext_file = "SEC";
            }
        }

        if($ext_file == 'LSE'){
            $getReturnPeriod = tbl_2552::where('company_id',  request('company'))
                            ->where('item1A', request('frm2552:txtMonth1'))
                            ->where('item1B', request('frm2552:txtDate'))
                            ->where('item1C', request('frm2552:txtForYr'))
                            ->where('item10A', "LSE")
                            ->count();
        }else{
            $getReturnPeriod = tbl_2552::where('company_id',  request('company'))
                            ->where('item1A', request('frm2552:txtMonth1'))
                            ->where('item1B', request('frm2552:txtDate'))
                            ->where('item1C', request('frm2552:txtForYr'))
                            ->where('item10B', request('frm2552:OptTransaction'))
                            ->count();
        }

        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm2552:txtMonth1').request('frm2552:txtDate').request('frm2552:txtForYr').'_'.$ext_file;
        }else{
            if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '2552')
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

            $xmlReturnPeriod = request('frm2552:txtMonth1').request('frm2552:txtDate').request('frm2552:txtForYr').'_'.$ext_file.$ext;
        }
        
        $filename = $tin."-2552-".$xmlReturnPeriod.'.xml';

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
                'form'          => '2552',
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
                            ->where('form', '2552')
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
                            ->where('form', '2552')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2552::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2552')
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
        $data = tbl_2552::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2552')
                            ->get();
        
        return view('forms.BIR-Form 2552',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

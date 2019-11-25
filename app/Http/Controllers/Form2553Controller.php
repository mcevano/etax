<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2553;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class Form2553Controller extends Controller
{
    public function index($company,$action,$form_id)
    {

    	$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);

    	if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2553s')){

            }else{
         		Schema::connection('mysql2')->create('tbl_2553s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1')->nullable();
                    $table->string('item2A');
                    $table->string('item2B');
                    $table->string('item3');
                    $table->string('item4')->nullable();
                    $table->string('item5')->nullable();
                    $table->text('item13');
                    $table->text('item13A')->nullable();
                    $table->text('item14A')->nullable();
                    $table->text('item14B')->nullable();
                    $table->text('item14C');
                    $table->text('item14D');
                    $table->text('item14E');
                    $table->text('item15A')->nullable();
                    $table->text('item15B')->nullable();
                    $table->text('item15C');
                    $table->text('item15D');
                    $table->text('item15E');
                    $table->text('item16A')->nullable();
                    $table->text('item16B')->nullable();
                    $table->text('item16C');
                    $table->text('item16D');
                    $table->text('item16E');
                    $table->text('item17A')->nullable();
                    $table->text('item17B')->nullable();
                    $table->text('item17C');
                    $table->text('item17D');
                    $table->text('item17E');
                    $table->text('item18A')->nullable();
                    $table->text('item18B')->nullable();
                    $table->text('item18C');
                    $table->text('item18D');
                    $table->text('item18E');
                    $table->text('item19');
                    $table->text('item20A');
                    $table->text('item20B');
                    $table->text('item20C');
                    $table->text('item21');
                    $table->text('item22A');
                    $table->text('item22B');
                    $table->text('item22C');
                    $table->text('item22D');
                    $table->text('item23');
                    $table->text('overpayment')->nullable();
                    $table->timestamps();
                });
            }
            return view('forms.BIR-Form 2553',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
            $data = tbl_2553::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2553')
                            ->get();
        
            return view('forms.BIR-Form 2553',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    	
    }
    public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);
        
        $data = ([
        	'form_no'   => request('form_no'),
			'company_id'   => request('company'),
			'item1'   => null !== request('frm2553:itemFiscalStartMonth') ? request('frm2553:itemFiscalStartMonth') : '',
			'item2A'   => request('frm2553:itemYearEndMonth'),
			'item2B'   => request('frm2553:txtYearEnded'),
			'item3'   => request('frm2553:optQtr'),
			'item4'   => request('frm2553:optAmended'),
			'item5'   => request('frm2553:txtSheets'),
			'item13'   => request('frm2553:optTreaty'),
			'item13A'   => request('frm2553:lstTaxTreaty'),
			'item14A'   => request('frm2553:txt14A'),
			'item14B'   => request('frm2553:txt14B'),
			'item14C'   => request('frm2553:txt14C'),
			'item14D'   => request('frm2553:txt14D'),
			'item14E'   => request('frm2553:txt14E'),
			'item15A'   => request('frm2553:txt15A'),
			'item15B'   => request('frm2553:txt15B'),
			'item15C'   => request('frm2553:txt15C'),
			'item15D'   => request('frm2553:txt15D'),
			'item15E'   => request('frm2553:txt15E'),
			'item16A'   => request('frm2553:txt16A'),
			'item16B'   => request('frm2553:txt16B'),
			'item16C'   => request('frm2553:txt16C'),
			'item16D'   => request('frm2553:txt16D'),
			'item16E'   => request('frm2553:txt16E'),
			'item17A'   => request('frm2553:txt17A'),
			'item17B'   => request('frm2553:txt17B'),
			'item17C'   => request('frm2553:txt17C'),
			'item17D'   => request('frm2553:txt17D'),
			'item17E'   => request('frm2553:txt17E'),
			'item18A'   => request('frm2553:txt18A'),
			'item18B'   => request('frm2553:txt18B'),
			'item18C'   => request('frm2553:txt18C'),
			'item18D'   => request('frm2553:txt18D'),
			'item18E'   => request('frm2553:txt18E'),
			'item19'   => request('frm2553:txt19'),
			'item20A'   => request('frm2553:txt20A'),
			'item20B'   => request('frm2553:txt20B'),
			'item20C'   => request('frm2553:txt20C'),
			'item21'   => request('frm2553:txt21'),
			'item22A'   => request('frm2553:txt22A'),
			'item22B'   => request('frm2553:txt22B'),
			'item22C'   => request('frm2553:txt22C'),
			'item22D'   => request('frm2553:txt22D'),
			'item23'   => request('frm2553:txt23'),
			'overpayment'   => null !== request('frm2552:ifoverpay') ? request('frm2552:ifoverpay') : '',
        ]);

        $getForm = tbl_2553::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

        $form = "";
        if(request('form_id') != ""){
            $form = tbl_2553::find(request('form_id'));
            $form->update($data);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2553::create($data);
            }else{
                $form = tbl_2553::find($getForm[0]->id);
                $form->update($data);
            }
        }

        $itemFiscalStartMonth_1 = "false";
        $itemFiscalStartMonth_2 = "false";

        if(null !== request('frm2553:itemFiscalStartMonth')){
            if( request('frm2553:itemFiscalStartMonth') == "C"){
              $itemFiscalStartMonth_1 = "true";
            }else if( request('frm2553:itemFiscalStartMonth') == "F"){
              $itemFiscalStartMonth_2 = "true";
            }
        }

        $optQtr_1 = "false";
        $optQtr_2 = "false";
        $optQtr_3 = "false";
        $optQtr_4 = "false";

        if( request('frm2553:optQtr') == "1"){
          $optQtr_1 = "true";
        }else if( request('frm2553:optQtr') == "2"){
          $optQtr_2 = "true";
        }else if( request('frm2553:optQtr') == "3"){
          $optQtr_3 = "true";
        }else if( request('frm2553:optQtr') == "4"){
          $optQtr_4 = "true";
        }

        $optAmended_1 = "false";
        $optAmended_2 = "false";
        if( request('frm2553:optAmended') == "Y"){
          $optAmended_1 = "true";
        }else if( request('frm2553:optAmended') == "N"){
          $optAmended_2 = "true";
        }
 
        $taxPayerName =  rawurlencode(request('frm2553:txtTPName'));

        $address = rawurlencode(request('frm2553:txtAddress'));

        $optTreaty_1 = "false";
        $optTreaty_2 = "false";
        if( request('frm2553:optTreaty') == "Y"){
          $optTreaty_1 = "true";
        }else if( request('frm2553:optTreaty') == "N"){
          $optTreaty_2 = "true";
        }

        $ifoverpay_1 = "false";
        $ifoverpay_2 = "false";
        if(null !== request('frm2552:ifoverpay')){
            if( request('frm2552:ifoverpay') == "R"){
              $ifoverpay_1 = "true";
            }else if( request('frm2552:ifoverpay') == "I"){
              $ifoverpay_2 = "true";
            }
        }

        $optATC0 = "false";
        $optATC1 = "false";
        $optATC2 = "false";
        $optATC3 = "false";
        $optATC4 = "false";

        for ($i=14; $i < 18; $i++) { 
        	if(request('frm2553:txt'.$i.'D') == '0.0'){
        		$optATC0 = "true";
        	}

        	if(request('frm2553:txt'.$i.'A') == 'PAGCOR' && request('frm2553:txt'.$i.'B') == 'OT010'){
        		$optATC1 = "true";
        	}

        	if(request('frm2553:txt'.$i.'A') == 'OTHERS' && request('frm2553:txt'.$i.'B') == 'OT012'){
        		$optATC2 = "true";
        	}

        	if(request('frm2553:txt'.$i.'A') == 'CLARK DEVELOPMENT CORPORATIONS' && request('frm2553:txt'.$i.'B') == 'OT011'){
        		$optATC3 = "true";
        	}

        	if(request('frm2553:txt'.$i.'A') == 'SPECIAL/REGULAR/ECONOMIC FREE PORT ZONE ENTERPRISES' && request('frm2553:txt'.$i.'B') == 'OT011'){
        		$optATC4 = "true";
        	}
        }

        $xmlData = "<?xml version='1.0'?>	
            <div>frm2553:itemFiscalStartMonth:_1=".$itemFiscalStartMonth_1."frm2553:itemFiscalStartMonth:_1=</div>	
            <div>frm2553:itemFiscalStartMonth:_2=".$itemFiscalStartMonth_2."frm2553:itemFiscalStartMonth:_2=</div>	
            <div>frm2553:itemYearEndMonth=".request('frm2553:itemYearEndMonth')."frm2553:itemYearEndMonth=</div>	
            <div>frm2553:txtYearEnded=".request('frm2553:txtYearEnded')."frm2553:txtYearEnded=</div>	
            <div>frm2553:optQtr:_1=".$optQtr_1."frm2553:optQtr:_1=</div>	
            <div>frm2553:optQtr:_2=".$optQtr_2."frm2553:optQtr:_2=</div>	
            <div>frm2553:optQtr:_3=".$optQtr_3."frm2553:optQtr:_3=</div>	
            <div>frm2553:optQtr:_4=".$optQtr_4."frm2553:optQtr:_4=</div>	
            <div>frm2553:optAmended_1=".$optAmended_1."frm2553:optAmended_1=</div>	
            <div>frm2553:optAmended_2=".$optAmended_2."frm2553:optAmended_2=</div>	
            <div>frm2553:txtSheets=".request('frm2553:txtSheets')."frm2553:txtSheets=</div>	
            <div>frm2553:txtTIN1=".request('frm2553:txtTIN1')."frm2553:txtTIN1=</div>	
            <div>frm2553:txtTIN2=".request('frm2553:txtTIN2')."frm2553:txtTIN2=</div>	
            <div>frm2553:txtTIN3=".request('frm2553:txtTIN3')."frm2553:txtTIN3=</div>	
            <div>frm2553:txtBranchCode=".request('frm2553:txtBranchCode')."frm2553:txtBranchCode=</div>	
            <div>frm2553:txtRDOCode=".request('frm2553:txtRDOCode')."frm2553:txtRDOCode=</div>	
            <div>frm2553:txtDescription=".request('frm2553:txtDescription')."frm2553:txtDescription=</div>	
            <div>frm2553:txtTPName=".$taxPayerName."frm2553:txtTPName=</div>	
            <div>frm2553:txtTelNum=".request('frm2553:txtTelNum')."frm2553:txtTelNum=</div>	
            <div>frm2553:txtAddress=".$address."frm2553:txtAddress=</div>	
            <div>frm2553:txtZipCode=".request('frm2553:txtZipCode')."frm2553:txtZipCode=</div>	
            <div>frm2553:optTreaty_1=".$optTreaty_1."frm2553:optTreaty_1=</div>	
            <div>frm2553:optTreaty_2=".$optTreaty_2."frm2553:optTreaty_2=</div>	
            <div>frm2553:lstTaxTreaty=".request('frm2553:lstTaxTreaty')."frm2553:lstTaxTreaty=</div>	
            <div>frm2553:txt14A=".request('frm2553:txt14A')."frm2553:txt14A=</div>	
            <div>frm2553:txt14B=".request('frm2553:txt14B')."frm2553:txt14B=</div>	
            <div>frm2553:txt14C=".request('frm2553:txt14C')."frm2553:txt14C=</div>	
            <div>frm2553:txt14D=".request('frm2553:txt14D')."frm2553:txt14D=</div>	
            <div>frm2553:txt14E=".request('frm2553:txt14E')."frm2553:txt14E=</div>	
            <div>frm2553:txt15A=".request('frm2553:txt15A')."frm2553:txt15A=</div>	
            <div>frm2553:txt15B=".request('frm2553:txt15B')."frm2553:txt15B=</div>	
            <div>frm2553:txt15C=".request('frm2553:txt15C')."frm2553:txt15C=</div>	
            <div>frm2553:txt15D=".request('frm2553:txt15D')."frm2553:txt15D=</div>	
            <div>frm2553:txt15E=".request('frm2553:txt15E')."frm2553:txt15E=</div>	
            <div>frm2553:txt16A=".request('frm2553:txt16A')."frm2553:txt16A=</div>	
            <div>frm2553:txt16B=".request('frm2553:txt16B')."frm2553:txt16B=</div>	
            <div>frm2553:txt16C=".request('frm2553:txt16C')."frm2553:txt16C=</div>	
            <div>frm2553:txt16D=".request('frm2553:txt16D')."frm2553:txt16D=</div>	
            <div>frm2553:txt16E=".request('frm2553:txt16E')."frm2553:txt16E=</div>	
            <div>frm2553:txt17A=".request('frm2553:txt17A')."frm2553:txt17A=</div>	
            <div>frm2553:txt17B=".request('frm2553:txt17B')."frm2553:txt17B=</div>	
            <div>frm2553:txt17C=".request('frm2553:txt17C')."frm2553:txt17C=</div>	
            <div>frm2553:txt17D=".request('frm2553:txt17D')."frm2553:txt17D=</div>	
            <div>frm2553:txt17E=".request('frm2553:txt17E')."frm2553:txt17E=</div>	
            <div>frm2553:txt18A=".request('frm2553:txt18A')."frm2553:txt18A=</div>	
            <div>frm2553:txt18B=".request('frm2553:txt18B')."frm2553:txt18B=</div>	
            <div>frm2553:txt18C=".request('frm2553:txt18C')."frm2553:txt18C=</div>	
            <div>frm2553:txt18D=".request('frm2553:txt18D')."frm2553:txt18D=</div>	
            <div>frm2553:txt18E=".request('frm2553:txt18E')."frm2553:txt18E=</div>	
            <div>frm2553:txt19=".request('frm2553:txt19')."frm2553:txt19=</div>	
            <div>frm2553:txt20A=".request('frm2553:txt20A')."frm2553:txt20A=</div>	
            <div>frm2553:txt20B=".request('frm2553:txt20B')."frm2553:txt20B=</div>	
            <div>frm2553:txt20C=".request('frm2553:txt20C')."frm2553:txt20C=</div>	
            <div>frm2553:txt21=".request('frm2553:txt21')."frm2553:txt21=</div>	
            <div>frm2553:txt22A=".request('frm2553:txt22A')."frm2553:txt22A=</div>	
            <div>frm2553:txt22B=".request('frm2553:txt22B')."frm2553:txt22B=</div>	
            <div>frm2553:txt22C=".request('frm2553:txt22C')."frm2553:txt22C=</div>	
            <div>frm2553:txt22D=".request('frm2553:txt22D')."frm2553:txt22D=</div>	
            <div>frm2553:txt23=".request('frm2553:txt23')."frm2553:txt23=</div>	
            <div>frm2553:ifoverpay_1=".$ifoverpay_1."frm2553:ifoverpay_1=</div>	
            <div>frm2553:ifoverpay_2=".$ifoverpay_2."frm2553:ifoverpay_2=</div>	
            <div>frm2553:optATC0=".$optATC0."frm2553:optATC0=</div>	
            <div>frm2553:optATC1=".$optATC1."frm2553:optATC1=</div>	
            <div>frm2553:optATC2=".$optATC2."frm2553:optATC2=</div>	
            <div>frm2553:optATC3=".$optATC3."frm2553:optATC3=</div>	
            <div>frm2553:optATC4=".$optATC4."frm2553:optATC4=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";


        $tin = request('frm2553:txtTIN1').request('frm2553:txtTIN2').request('frm2553:txtTIN3').request('frm2553:txtBranchCode');
            
        $return_period = request('frm2553:itemYearEndMonth')."/".request('frm2553:txtYearEnded')."-Q".request('frm2553:optQtr');

        $getReturnPeriod = tbl_2553::where('company_id',  request('company'))
                            ->where('item2A', request('frm2553:itemYearEndMonth'))
                            ->where('item2B', request('frm2553:txtYearEnded'))
                            ->where('item3', request('frm2553:optQtr'))
                            ->count();
        $filename = "";
        if($getReturnPeriod == "1"){
            $filename = $tin."-2553-".request('frm2553:itemYearEndMonth').request('frm2553:txtYearEnded').'Q'.request('frm2553:optQtr').'.xml';
        }else{
            if(request('form_id') != ""){
                $getXml = Xml::where('user_id', Auth::user()->id)
                        ->where('company_id', request('company'))
                        ->where('form_id', $form->id)
                        ->where('form', '2553')
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
            $filename = $tin."-2553-".request('frm2553:itemYearEndMonth').request('frm2553:txtYearEnded').'Q'.request('frm2553:optQtr').$ext.'.xml';
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

        $data1 = ([
            'user_id'       => Auth::user()->id,
            'company_id'    => request('company'),
            'form_id'       => $form->id,
            'form'          => '2553',
            'file_name'     => $filename,
            'return_period' => $return_period,
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
                            ->where('form', '2553')
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
                            ->where('form', '2553')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2553::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2553')
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
        $data = tbl_2553::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2553')
                            ->get();
        return view('forms.BIR-Form 2553',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }

}

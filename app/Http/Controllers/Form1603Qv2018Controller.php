<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1603Q;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1603Qv2018Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);

    	if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1603_qs')){

            }else{
                Schema::connection('mysql2')->create('tbl_1603_qs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1')->nullable();
					$table->string('item2')->nullable();
					$table->string('item3')->nullable();
					$table->string('item4')->nullable();
					$table->string('item5');
					$table->string('item11')->nullable();
					$table->string('item13')->nullable();
					$table->string('item13A')->nullable();
					$table->text('item14');
					$table->text('item15');
					$table->text('item16');
					$table->text('item16_other')->nullable();
					$table->text('item17');
					$table->text('item18');
					$table->text('item19');
					$table->text('item20');
					$table->text('item21');
					$table->text('item22');
					$table->text('item23');
					$table->text('sched1_item1C');
					$table->text('sched1_item1D');
					$table->text('sched1_item1E');
					$table->text('sched1_item1F');
					$table->text('sched1_item1G');
					$table->text('sched1_item2C');
					$table->text('sched1_item2D');
					$table->text('sched1_item2E');
					$table->text('sched1_item2F');
					$table->text('sched1_item2G');
					$table->text('sched1_item3');
                    $table->timestamps();
                });

            }
            
        	return view('forms.BIR-Form 1603Qv2018',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_1603Q::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1603Qv2018')
                            ->get();
            return view('forms.BIR-Form 1603Qv2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    	
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
        	'form_no'		  => request('form_no'),
			'company_id'      => request('company'),
			'item1'    => request('frm1603Q:txtYear'),
			'item2'    => request('frm1603Q:optQuarter'),
			'item3'    => request('frm1603Q:AmendedRtn'),
			'item4'    => null !== request('frm1603Q:TaxWithheld') ? request('frm1603Q:TaxWithheld') : '',
			'item5'    => request('frm1603Q:txtSheets'),
			'item11'    => null !== request('frm1603Q:CatAgent') ? request('frm1603Q:CatAgent') : '',
			'item13'    => request('frm1603Q:SpecialTax'),
			'item13A'    => request('frm1603Q:selTreaty'),
			'item14'    => request('frm1603Q:txtTax14'),
			'item15'    => request('frm1603Q:txtTax15'),
			'item16'    => request('frm1603Q:txtTax16'),
			'item17'    => request('frm1603Q:txtTax17'),
			'item18'    => request('frm1603Q:txtTax18'),
			'item19'    => request('frm1603Q:txtTax19'),
			'item20'    => request('frm1603Q:txtTax20'),
			'item21'    => request('frm1603Q:txtTax21'),
			'item22'    => request('frm1603Q:txtTax22'),
			'item23'    => request('frm1603Q:txtTax23'),
			'sched1_item1C'    => request('frm1603Q:Sched1:txtValue1'),
			'sched1_item1D'    => request('frm1603Q:Sched1:txtDivisor1'),
			'sched1_item1E'    => request('frm1603Q:Sched1:txtTaxBase1'),
			'sched1_item1F'    => request('frm1603Q:Sched1:txtTaxRate1'),
			'sched1_item1G'    => request('frm1603Q:Sched1:txtTaxWithheld1'),
			'sched1_item2C'    => request('frm1603Q:Sched1:txtValue2'),
			'sched1_item2D'    => request('frm1603Q:Sched1:txtDivisor2'),
			'sched1_item2E'    => request('frm1603Q:Sched1:txtTaxBase2'),
			'sched1_item2F'    => request('frm1603Q:Sched1:txtTaxRate2'),
			'sched1_item2G'    => request('frm1603Q:Sched1:txtTaxWithheld2'),
			'sched1_item3'    => request('frm1603Q:Sched1:txtTotalTax'),
        ]);

        $getForm = tbl_1603Q::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

        $form = "";
        if(request('form_id') != ""){
            $form = tbl_1603Q::find(request('form_id'));
            $form->update($data);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1603Q::create($data);
            }else{
                $form = tbl_1603Q::find($getForm[0]->id);
                $form->update($data);
            }
        }

        $optQuarter1 = "false";
        $optQuarter2 = "false";
        $optQuarter3 = "false";
        $optQuarter4 = "false";

        if(null !== request('frm1603Q:optQuarter')){
            if(request('frm1603Q:optQuarter') == "1"){
                $optQuarter1 = "true";
            }else if(request('frm1603Q:optQuarter') == "2"){
                $optQuarter2 = "true";
            }else if(request('frm1603Q:optQuarter') == "3"){
                $optQuarter3 = "true";
            }else if(request('frm1603Q:optQuarter') == "4"){
                $optQuarter4 = "true";
            }
        }

        $AmendedRtn_1 = "false";
        $AmendedRtn_2 = "false";

        if(null !== request('frm1603Q:AmendedRtn')){
            if(request('frm1603Q:AmendedRtn')== "Y"){
                $AmendedRtn_1 = "true";
            }else if(request('frm1603Q:AmendedRtn') == "N"){
                $AmendedRtn_2 = "true";
            }
        }

        $TaxWithheld_1 = "false";
        $TaxWithheld_2 = "false";

        if(null !== request('frm1603Q:TaxWithheld')){
            if(request('frm1603Q:TaxWithheld') == "Y"){
                $TaxWithheld_1 = "true";
            }else if(request('frm1603Q:TaxWithheld') == "N"){
                $TaxWithheld_2 = "true";
            }
        }

        $taxPayerName =  rawurlencode(request('frm1603Q:txtTaxpayerName'));

        $address = rawurlencode(request('frm1603Q:txtAddress'));

        $lineOfBusiness =  rawurlencode(request('frm1603Q:txtLineBus'));

        $CatAgent_P = "false";
        $CatAgent_G = "false";

        if(null !== request('frm1603Q:CatAgent')){
            if(request('frm1603Q:CatAgent') == "P"){
                $CatAgent_P = "true";
            }else if(request('frm1603Q:CatAgent') == "G"){
                $CatAgent_G = "true";
            }
        }

        $SpecialTax_1 = "false";
        $SpecialTax_2 = "false";

        if(null !== request('frm1603Q:SpecialTax')){
            if(request('frm1603Q:SpecialTax') == "Y"){
                $SpecialTax_1 = "true";
            }else if(request('frm1603Q:SpecialTax') == "N"){
                $SpecialTax_2 = "true";
            }
        }

        $xmlData = "<?xml version='1.0'?>	
            <div>frm1603Q:txtYear=".request('frm1603Q:txtYear')."frm1603Q:txtYear=</div>	
            <div>frm1603Q:optQuarter1=".$optQuarter1."frm1603Q:optQuarter1=</div>	
            <div>frm1603Q:optQuarter2=".$optQuarter2."frm1603Q:optQuarter2=</div>	
            <div>frm1603Q:optQuarter3=".$optQuarter3."frm1603Q:optQuarter3=</div>	
            <div>frm1603Q:optQuarter4=".$optQuarter4."frm1603Q:optQuarter4=</div>	
            <div>frm1603Q:AmendedRtn_1=".$AmendedRtn_1."frm1603Q:AmendedRtn_1=</div>	
            <div>frm1603Q:AmendedRtn_2=".$AmendedRtn_2."frm1603Q:AmendedRtn_2=</div>	
            <div>frm1603Q:TaxWithheld_1=".$TaxWithheld_1."frm1603Q:TaxWithheld_1=</div>	
            <div>frm1603Q:TaxWithheld_2=".$TaxWithheld_2."frm1603Q:TaxWithheld_2=</div>	
            <div>frm1603Q:txtSheets=".request('frm1603Q:txtSheets')."frm1603Q:txtSheets=</div>	
            <div>frm1603Q:txtTIN1=".request('frm1603Q:txtTIN1')."frm1603Q:txtTIN1=</div>	
            <div>frm1603Q:txtTIN2=".request('frm1603Q:txtTIN2')."frm1603Q:txtTIN2=</div>	
            <div>frm1603Q:txtTIN3=".request('frm1603Q:txtTIN3')."frm1603Q:txtTIN3=</div>	
            <div>frm1603Q:txtBranchCode=".request('frm1603Q:txtBranchCode')."frm1603Q:txtBranchCode=</div>	
            <div>frm1603Q:rdoCode=".request('frm1603Q:rdoCode')."frm1603Q:rdoCode=</div>	
            <div>frm1603Q:txtTaxpayerName=".$taxPayerName."frm1603Q:txtTaxpayerName=</div>	
            <div>frm1603Q:txtAddress=".$address."frm1603Q:txtAddress=</div>	
            <div>frm1603Q:txtZipCode=".request('frm1603Q:txtZipCode')."frm1603Q:txtZipCode=</div>	
            <div>frm1603Q:txtTelNum=".request('frm1603Q:txtTelNum')."frm1603Q:txtTelNum=</div>	
            <div>frm1603Q:CatAgent_P=".$CatAgent_P."frm1603Q:CatAgent_P=</div>	
            <div>frm1603Q:CatAgent_G=".$CatAgent_G."frm1603Q:CatAgent_G=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>frm1603Q:SpecialTax_1=".$SpecialTax_1."frm1603Q:SpecialTax_1=</div>	
            <div>frm1603Q:SpecialTax_2=".$SpecialTax_2."frm1603Q:SpecialTax_2=</div>	
            <div>frm1603Q:selTreaty=".request('frm1603Q:selTreaty')."frm1603Q:selTreaty=</div>	
            <div>frm1603Q:txtTax14=".request('frm1603Q:txtTax14')."frm1603Q:txtTax14=</div>	
            <div>frm1603Q:txtTax15=".request('frm1603Q:txtTax15')."frm1603Q:txtTax15=</div>	
            <div>frm1603Q:txt16Other=".request('frm1603Q:txt16Other')."frm1603Q:txt16Other=</div>	
            <div>frm1603Q:txtTax16=".request('frm1603Q:txtTax16')."frm1603Q:txtTax16=</div>	
            <div>frm1603Q:txtTax17=".request('frm1603Q:txtTax17')."frm1603Q:txtTax17=</div>	
            <div>frm1603Q:txtTax18=".request('frm1603Q:txtTax18')."frm1603Q:txtTax18=</div>	
            <div>frm1603Q:txtTax19=".request('frm1603Q:txtTax19')."frm1603Q:txtTax19=</div>	
            <div>frm1603Q:txtTax20=".request('frm1603Q:txtTax20')."frm1603Q:txtTax20=</div>	
            <div>frm1603Q:txtTax21=".request('frm1603Q:txtTax21')."frm1603Q:txtTax21=</div>	
            <div>frm1603Q:txtTax22=".request('frm1603Q:txtTax22')."frm1603Q:txtTax22=</div>	
            <div>frm1603Q:txtTax23=".request('frm1603Q:txtTax23')."frm1603Q:txtTax23=</div>	
            <div>txtTaxAgentNo=txtTaxAgentNo=</div>	
            <div>txtDateIssue=txtDateIssue=</div>	
            <div>txtDateExpiry=txtDateExpiry=</div>	
            <div>frm1603Q:txtAgency24=frm1603Q:txtAgency24=</div>	
            <div>frm1603Q:txtNumber24=frm1603Q:txtNumber24=</div>	
            <div>frm1603Q:txtDate24=frm1603Q:txtDate24=</div>	
            <div>frm1603Q:txtAmount24=frm1603Q:txtAmount24=</div>	
            <div>frm1603Q:txtAgency25=frm1603Q:txtAgency25=</div>	
            <div>frm1603Q:txtNumber25=frm1603Q:txtNumber25=</div>	
            <div>frm1603Q:txtDate25=frm1603Q:txtDate25=</div>	
            <div>frm1603Q:txtAmount25=frm1603Q:txtAmount25=</div>	
            <div>frm1603Q:txtNumber26=frm1603Q:txtNumber26=</div>	
            <div>frm1603Q:txtDate26=frm1603Q:txtDate26=</div>	
            <div>frm1603Q:txtAmount26=frm1603Q:txtAmount26=</div>	
            <div>frm1603Q:txtParticular27=frm1603Q:txtParticular27=</div>	
            <div>frm1603Q:txtAgency27=frm1603Q:txtAgency27=</div>	
            <div>frm1603Q:txtNumber27=frm1603Q:txtNumber27=</div>	
            <div>frm1603Q:txtDate27=frm1603Q:txtDate27=</div>	
            <div>frm1603Q:txtAmount27=frm1603Q:txtAmount27=</div>	
            <div>frm1603Q:txtPg2TIN1=".request('frm1603Q:txtPg2TIN1')."frm1603Q:txtPg2TIN1=</div>	
            <div>frm1603Q:txtPg2TIN2=".request('frm1603Q:txtPg2TIN2')."frm1603Q:txtPg2TIN2=</div>	
            <div>frm1603Q:txtPg2TIN3=".request('frm1603Q:txtPg2TIN3')."frm1603Q:txtPg2TIN3=</div>	
            <div>frm1603Q:txtPg2BranchCode=".request('frm1603Q:txtPg2BranchCode')."frm1603Q:txtPg2BranchCode=</div>	
            <div>frm1603Q:txtPg2TaxpayerName=".request('frm1603Q:txtPg2TaxpayerName')."frm1603Q:txtPg2TaxpayerName=</div>	
            <div>frm1603Q:Sched1:txtATC1=".request('frm1603Q:Sched1:txtATC1')."frm1603Q:Sched1:txtATC1=</div>	
            <div>frm1603Q:Sched1:txtValue1=".request('frm1603Q:Sched1:txtValue1')."frm1603Q:Sched1:txtValue1=</div>	
            <div>frm1603Q:Sched1:txtATC2=".request('frm1603Q:Sched1:txtATC2')."frm1603Q:Sched1:txtATC2=</div>	
            <div>frm1603Q:Sched1:txtValue2=".request('frm1603Q:Sched1:txtValue2')."frm1603Q:Sched1:txtValue2=</div>	
            <div>frm1603Q:Sched1:txtDivisor1=".request('frm1603Q:Sched1:txtDivisor1')."frm1603Q:Sched1:txtDivisor1=</div>	
            <div>frm1603Q:Sched1:txtTaxBase1=".request('frm1603Q:Sched1:txtTaxBase1')."frm1603Q:Sched1:txtTaxBase1=</div>	
            <div>frm1603Q:Sched1:txtTaxRate1=".request('frm1603Q:Sched1:txtTaxRate1')."frm1603Q:Sched1:txtTaxRate1=</div>	
            <div>frm1603Q:Sched1:txtTaxWithheld1=".request('frm1603Q:Sched1:txtTaxWithheld1')."frm1603Q:Sched1:txtTaxWithheld1=</div>	
            <div>frm1603Q:Sched1:txtDivisor2=".request('frm1603Q:Sched1:txtDivisor2')."frm1603Q:Sched1:txtDivisor2=</div>	
            <div>frm1603Q:Sched1:txtTaxBase2=".request('frm1603Q:Sched1:txtTaxBase2')."frm1603Q:Sched1:txtTaxBase2=</div>	
            <div>frm1603Q:Sched1:txtTaxRate2=".request('frm1603Q:Sched1:txtTaxRate2')."frm1603Q:Sched1:txtTaxRate2=</div>	
            <div>frm1603Q:Sched1:txtTaxWithheld2=".request('frm1603Q:Sched1:txtTaxWithheld2')."frm1603Q:Sched1:txtTaxWithheld2=</div>	
            <div>frm1603Q:Sched1:txtTotalTax=".request('frm1603Q:Sched1:txtTotalTax')."frm1603Q:Sched1:txtTotalTax=</div>	
            <div>frm1603Q:txtCurrentPage=1frm1603Q:txtCurrentPage=</div>	
            <div>frm1603Q:txtMaxPage=2frm1603Q:txtMaxPage=</div>	
            <div>frm1603Q:txtLineBus=".$lineOfBusiness."frm1603Q:txtLineBus=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm1603Q:txtTIN1').request('frm1603Q:txtTIN2').request('frm1603Q:txtTIN3').request('frm1603Q:txtBranchCode');

        $return_period = request('frm1603Q:txtYear')."-Q".request('frm1603Q:optQuarter');

        $getReturnPeriod = tbl_1603Q::where('company_id',  request('company'))
     						->where('item1', request('frm1603Q:txtYear'))
     						->where('item2', request('frm1603Q:optQuarter'))
     						->count();

     	$filename = "";
     	if($getReturnPeriod == "1"){
     		$filename = $tin."-1603Qv2018-".request('frm1603Q:txtYear')."Q".request('frm1603Q:optQuarter').'.xml';
     	}else{
     		if(request('form_id') != ""){
					$getXml = Xml::where('user_id', Auth::user()->id)
					        ->where('company_id', request('company'))
					        ->where('form_id', $form->id)
					        ->where('form', '1603Qv2018')
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
				
     		$filename = $tin."-1603Qv2018-".request('frm1603Q:txtYear')."Q".request('frm1603Q:optQuarter').$ext.'.xml';
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
	     		'form'			=> '1603Qv2018',
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
     						->where('form', '1603Qv2018')
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
                            ->where('form', '1603Qv2018')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1603Q::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1603Qv2018')
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
        $data = tbl_1603Q::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1603Qv2018')
                            ->get();
        
        return view('forms.BIR-Form 1603Qv2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

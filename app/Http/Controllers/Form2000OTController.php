<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2000OT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2000OTController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2000_o_ts')){

            }else{
                Schema::connection('mysql2')->create('tbl_2000_o_ts', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item1C')->nullable();
                    $table->string('item2');
                    $table->string('item3')->nullable();
                    $table->string('item4')->nullable();
                    $table->string('item11A')->nullable();
                    $table->string('item11B')->nullable();
                    $table->string('item11C')->nullable();
                    $table->string('item11D')->nullable();
                    $table->string('item11E')->nullable();
                    $table->string('item12')->nullable();
                    $table->string('item12_1')->nullable();
                    $table->string('item12_2')->nullable();
                    $table->string('item12A')->nullable();
                    $table->string('item12A_others')->nullable();
                    $table->string('item12B')->nullable();
                    $table->string('item12C')->nullable();
                    $table->string('item12D')->nullable();
                    $table->string('item12E')->nullable();
                    $table->text('item12F')->nullable();
                    $table->string('item12G')->nullable();
                    $table->string('item12G_stock')->nullable();
                    $table->string('item12H')->nullable();
                    $table->string('item12I')->nullable();
                    $table->string('item12J')->nullable();
                    $table->string('item12K')->nullable();
                    $table->string('item12L')->nullable();
                    $table->text('item13');
                    $table->text('item14');
                    $table->text('item15');
                    $table->text('item16');
                    $table->text('item17');
                    $table->text('item18');
                    $table->text('item19A');
                    $table->text('item19B');
                    $table->text('item19C');
                    $table->text('item19D');
                    $table->text('item20');
                    $table->text('item_overpayment');
                    $table->text('1A')->nullable();
                    $table->text('1B')->nullable();
                    $table->text('1C')->nullable();
                    $table->text('2A')->nullable();
                    $table->text('2B')->nullable();
                    $table->text('2C')->nullable();
                    $table->text('3A')->nullable();
                    $table->text('4A')->nullable();
                    $table->text('5A')->nullable();
                    $table->timestamps();
                });
            }
           
	       return view('forms.BIR-Form 2000OT',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_2000OT::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2000OT')
                            ->get();
        
        	return view('forms.BIR-Form 2000OT',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }

    }
    public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
        	'form_no'   => request('form_no'),
			'company_id'   => request('company'),
			'item1A'   => request('frm2000OT:txtDateMonth'),
			'item1B'   => request('frm2000OT:txtDateDay'),
			'item1C'   => request('frm2000OT:txtDateYear'),
			'item2'   => request('frm2000OT:AmendedRtn'),
			'item3'   => request('frm2000OT:txtSheets'),
			'item4'   => request('frm2000OT:txtATC'),
			'item11A'   => null !== request('frm2000OT:NatureOfTrans') ? request('frm2000OT:NatureOfTrans') : '',
			'item11B'   => request('frm2000OT:txtSeller'),
			'item11C'   => request('frm2000OT:txtBuyer'),
			'item11D'   => request('frm2000OT:txtTINS'),
			'item11E'   => request('frm2000OT:txtTINB'),
			'item12'   => null !== request('frm2000OT:opt12') ? request('frm2000OT:opt12') : '',
			'item12_1'   => request('frm2000OT:txtLRP'),
			'item12_2'   => request('frm2000OT:txtRDOLP'),
			'item12A'   => null !== request('frm2000OT:ClassRealProp') ? request('frm2000OT:ClassRealProp') : '',
			'item12A_others'   => request('frm2000OT:ClassRealProptxt'),
			'item12B'   => request('frm2000OT:txt12B'),
			'item12C'   => request('frm2000OT:txt12C'),
			'item12D'   => request('frm2000OT:txt12D'),
			'item12E'   => request('frm2000OT:txt12E'),
			'item12F'   => request('frm2000OT:txt12F'),
			'item12G'   => null !== request('frm2000OT:opt12G') ? request('frm2000OT:opt12G') : '',
			'item12G_stock'   => request('frm2000OT:txt12G'),
			'item12H'   => request('frm2000OT:txt12H'),
			'item12I'   => request('frm2000OT:txt12I'),
			'item12J'   => request('frm2000OT:txt12J'),
			'item12K'   => request('frm2000OT:txt12K'),
			'item12L'   => request('frm2000OT:txt12L'),
			'item13'   => request('frm2000OT:txtTax13'),
			'item14'   => request('frm2000OT:txtTax14'),
			'item15'   => request('frm2000OT:txtTax15'),
			'item16'   => request('frm2000OT:txtTax16'),
			'item17'   => request('frm2000OT:txtLess'),
			'item18'   => request('frm2000OT:txtTaxDue'),
			'item19A'   => request('frm2000OT:txtTax19A'),
			'item19B'   => request('frm2000OT:txtTax19B'),
			'item19C'   => request('frm2000OT:txtTax19C'),
			'item19D'   => request('frm2000OT:txtTax19D'),
			'item20'   => request('frm2000OT:txtTax20'),
			'item_overpayment'   => null !== request('frm2000OT:opt21') ? request('frm2000OT:opt21') : '',
			'1A'   => request('frm2000OT:txtSched1A'),
	        '1B' 	=> request('frm2000OT:txtSched1B'),
	        '1C'   => request('frm2000OT:txtSched1C'),
	        '2A'   => request('frm2000OT:txtSched2A'),
	        '2B'   => request('frm2000OT:txtSched2B'),
	        '2C'   => request('frm2000OT:txtSched2C'),
	        '3A'   => request('frm2000OT:txtSched3A'),
	        '4A'   => request('frm2000OT:txtSched4A'),
	        '5A'   => request('frm2000OT:txtSched5A'),
        	]);

        $getForm = tbl_2000OT::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();
        
        $form = "";
        if(request('form_id') != ""){
            $form = tbl_2000OT::find(request('form_id'));
            $form->update($data);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2000OT::create($data);
            }else{
                $form = tbl_2000OT::find($getForm[0]->id);
                $form->update($data);
            }
        }

        $AmendedRtn_1 = "false";
        $AmendedRtn_2 = "false";

        if(request('frm2000OT:AmendedRtn') == "Y"){
        	$AmendedRtn_1 = "true";
        }else if(request('frm2000OT:AmendedRtn') == "N"){
        	$AmendedRtn_2 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm2000OT:txtTaxpayerName'));

        $address = rawurlencode(request('frm2000OT:txtAddress'));

        $NatureOfTrans_1 = "false";
        $NatureOfTrans_2 = "false";
        $NatureOfTrans_3 = "false";

        if(null !== request('frm2000OT:NatureOfTrans')){
        	if(request('frm2000OT:NatureOfTrans') == "C"){
        		$NatureOfTrans_1 = "true";
        	}else if(request('frm2000OT:NatureOfTrans') == "S"){
        		$NatureOfTrans_3 = "true";
        	}else if(request('frm2000OT:NatureOfTrans') == "O"){
        		$NatureOfTrans_2 = "true";
        	}
        }

        $ClassRealProp_1 = "false";
        $ClassRealProp_3 = "false";
        $ClassRealProp_5 = "false";
        $ClassRealProp_7 = "false";

        $ClassRealProp_2 = "false";
        $ClassRealProp_4 = "false";
        $ClassRealProp_6 = "false";

        if(null !== request('frm2000OT:ClassRealProp')){
        	if(request('frm2000OT:ClassRealProp') == "R"){
        		$ClassRealProp_1 = "true";
        	}else if(request('frm2000OT:ClassRealProp') == "C"){
        		$ClassRealProp_3 = "true";
        	}else if(request('frm2000OT:ClassRealProp') == "CR"){
        		$ClassRealProp_5 = "true";
        	}else if(request('frm2000OT:ClassRealProp') == "1"){
        		$ClassRealProp_7 = "true";
        	}else if(request('frm2000OT:ClassRealProp') == "A"){
        		$ClassRealProp_2 = "true";
        	}else if(request('frm2000OT:ClassRealProp') == "I"){
        		$ClassRealProp_4 = "true";
        	}else if(request('frm2000OT:ClassRealProp') == "CC"){
        		$ClassRealProp_6 = "true";
        	}
        }

        $opt21_1 = "false";
        $opt21_2 = "false";
        
        if(null !== request('frm2000OT:ClassRealProp')){
        	if(request('frm2000OT:opt21') == 'R'){
        		$opt21_1 = "true";
        	}else if(request('frm2000OT:opt21') == 'I'){
        		$opt21_2 = "true";
        	}
        }

        $xmlData ="<?xml version='1.0'?>	
            <div>frm2000_OT:txtDateMonth=".request('frm2000OT:txtDateMonth')."frm2000_OT:txtDateMonth=</div>	
            <div>frm2000_OT:txtDateDay=".request('frm2000OT:txtDateDay')."frm2000_OT:txtDateDay=</div>	
            <div>frm2000_OT:txtDateYear=".request('frm2000OT:txtDateYear')."frm2000_OT:txtDateYear=</div>	
            <div>frm2000OT:AmendedRtn_1=".$AmendedRtn_1."frm2000OT:AmendedRtn_1=</div>	
            <div>frm2000OT:AmendedRtn_2=".$AmendedRtn_2."frm2000OT:AmendedRtn_2=</div>	
            <div>frm2000OT:txtSheets=".request('frm2000OT:txtSheets')."frm2000OT:txtSheets=</div>	
            <div>frm2000OT:txtATC=".request('frm2000OT:txtATC')."frm2000OT:txtATC=</div>	
            <div>frm2000OT:txtTIN1=".request('frm2000OT:txtTIN1')."frm2000OT:txtTIN1=</div>	
            <div>frm2000OT:txtTIN2=".request('frm2000OT:txtTIN2')."frm2000OT:txtTIN2=</div>	
            <div>frm2000OT:txtTIN3=".request('frm2000OT:txtTIN3')."frm2000OT:txtTIN3=</div>	
            <div>frm2000OT:txtBranchCode=".request('frm2000OT:txtBranchCode')."frm2000OT:txtBranchCode=</div>	
            <div>frm2000OT:txtRDOCode=".request('frm2000OT:txtRDOCode')."frm2000OT:txtRDOCode=</div>	
            <div>frm2000OT:txtTelNum=".request('frm2000OT:txtTelNum')."frm2000OT:txtTelNum=</div>	
            <div>frm2000OT:txtTaxpayerName=".$taxPayerName."frm2000OT:txtTaxpayerName=</div>	
            <div>frm2000OT:txtAddress=".$address."frm2000OT:txtAddress=</div>	
            <div>frm2000OT:txtZipCode=".request('frm2000OT:txtZipCode')."frm2000OT:txtZipCode=</div>	
            <div>frm2000OT:NatureOfTrans_1=".$NatureOfTrans_1."frm2000OT:NatureOfTrans_1=</div>	
            <div>frm2000OT:NatureOfTrans_3=".$NatureOfTrans_3."frm2000OT:NatureOfTrans_3=</div>	
            <div>frm2000OT:NatureOfTrans_2=".$NatureOfTrans_2."frm2000OT:NatureOfTrans_2=</div>	
            <div>frm2000OT:txtSeller=".request('frm2000OT:txtSeller')."frm2000OT:txtSeller=</div>	
            <div>frm2000OT:txtBuyer=".request('frm2000OT:txtBuyer')."frm2000OT:txtBuyer=</div>	
            <div>frm2000OT:txtTINS=".request('frm2000OT:txtTINS')."frm2000OT:txtTINS=</div>	
            <div>frm2000OT:txtTINB=".request('frm2000OT:txtTINB')."frm2000OT:txtTINB=</div>	
            <div>frm2000OT:opt12_1=".(null !== request('frm2000OT:opt12') ? 'true' : 'false')."frm2000OT:opt12_1=</div>	
            <div>frm2000OT:txtLRP=".request('frm2000OT:txtLRP')."frm2000OT:txtLRP=</div>	
            <div>frm2000OT:txtRDOLP=".request('frm2000OT:txtRDOLP')."frm2000OT:txtRDOLP=</div>	
            <div>frm2000OT:ClassRealProp_1=".$ClassRealProp_1."frm2000OT:ClassRealProp_1=</div>	
            <div>frm2000OT:ClassRealProp_3=".$ClassRealProp_3."frm2000OT:ClassRealProp_3=</div>	
            <div>frm2000OT:ClassRealProp_5=".$ClassRealProp_5."frm2000OT:ClassRealProp_5=</div>	
            <div>frm2000OT:ClassRealProp_7=".$ClassRealProp_7."frm2000OT:ClassRealProp_7=</div>	
            <div>frm2000OT:ClassRealProptxt=".request('frm2000OT:ClassRealProptxt')."frm2000OT:ClassRealProptxt=</div>	
            <div>frm2000OT:ClassRealProp_2=".$ClassRealProp_2."frm2000OT:ClassRealProp_2=</div>	
            <div>frm2000OT:ClassRealProp_4=".$ClassRealProp_4."frm2000OT:ClassRealProp_4=</div>	
            <div>frm2000OT:ClassRealProp_6=".$ClassRealProp_6."frm2000OT:ClassRealProp_6=</div>	
            <div>frm2000OT:txt12B=".request('frm2000OT:txt12B')."frm2000OT:txt12B=</div>	
            <div>frm2000OT:txt12C=".request('frm2000OT:txt12C')."frm2000OT:txt12C=</div>	
            <div>frm2000OT:txt12D=".request('frm2000OT:txt12D')."frm2000OT:txt12D=</div>	
            <div>frm2000OT:txt12E=".request('frm2000OT:txt12E')."frm2000OT:txt12E=</div>	
            <div>frm2000OT:txt12F=".request('frm2000OT:txt12F')."frm2000OT:txt12F=</div>	
            <div>frm2000OT:opt12_2=".(null !== request('frm2000OT:opt12G') ? 'true' : 'false')."frm2000OT:opt12_2=</div>	
            <div>frm2000OT:txt12G=".request('frm2000OT:txt12G')."frm2000OT:txt12G=</div>	
            <div>frm2000OT:txt12H=".request('frm2000OT:txt12H')."frm2000OT:txt12H=</div>	
            <div>frm2000OT:txt12I=".request('frm2000OT:txt12I')."frm2000OT:txt12I=</div>	
            <div>frm2000OT:txt12J=".request('frm2000OT:txt12J')."frm2000OT:txt12J=</div>	
            <div>frm2000OT:txt12K=".request('frm2000OT:txt12K')."frm2000OT:txt12K=</div>	
            <div>frm2000OT:txt12L=".request('frm2000OT:txt12L')."frm2000OT:txt12L=</div>	
            <div>frm2000OT:txtTax13=".request('frm2000OT:txtTax13')."frm2000OT:txtTax13=</div>	
            <div>frm2000OT:txtTax14=".request('frm2000OT:txtTax14')."frm2000OT:txtTax14=</div>	
            <div>frm2000OT:txtTax15=".request('frm2000OT:txtTax15')."frm2000OT:txtTax15=</div>	
            <div>frm2000OT:txtTax16=".request('frm2000OT:txtTax16')."frm2000OT:txtTax16=</div>	
            <div>frm2000OT:txtLess=".request('frm2000OT:txtLess')."frm2000OT:txtLess=</div>	
            <div>frm2000OT:txtTaxDue=".request('frm2000OT:txtTaxDue')."frm2000OT:txtTaxDue=</div>	
            <div>frm2000OT:txtTax19A=".request('frm2000OT:txtTax19A')."frm2000OT:txtTax19A=</div>	
            <div>frm2000OT:txtTax19B=".request('frm2000OT:txtTax19B')."frm2000OT:txtTax19B=</div>	
            <div>frm2000OT:txtTax19C=".request('frm2000OT:txtTax19C')."frm2000OT:txtTax19C=</div>	
            <div>frm2000OT:txtTax19D=".request('frm2000OT:txtTax19D')."frm2000OT:txtTax19D=</div>	
            <div>frm2000OT:txtTax20=".request('frm2000OT:txtTax20')."frm2000OT:txtTax20=</div>	
            <div>frm2000OT:opt21:_1=".$opt21_1."frm2000OT:opt21:_1=</div>	
            <div>frm2000OT:opt21:_2=".$opt21_2."frm2000OT:opt21:_2=</div>	
            <div>AtcCode1=".(null !== request('AtcCode') ? (request('AtcCode') == 'DS102' ? 'true' : 'false') : 'false')."AtcCode1=</div>	
            <div>AtcCode2=".(null !== request('AtcCode') ? (request('AtcCode') == 'DS125' ? 'true' : 'false') : 'false')."AtcCode2=</div>	
            <div>AtcCode3=".(null !== request('AtcCode') ? (request('AtcCode') == 'DS122' ? 'true' : 'false') : 'false')."AtcCode3=</div>	
            <div>frm2000OT:txtSched1A=".request('frm2000OT:txtSched1A')."frm2000OT:txtSched1A=</div>	
            <div>frm2000OT:txtSched1B=".request('frm2000OT:txtSched1B')."frm2000OT:txtSched1B=</div>	
            <div>frm2000OT:txtSched1C=".request('frm2000OT:txtSched1C')."frm2000OT:txtSched1C=</div>	
            <div>frm2000OT:txtSched2A=".request('frm2000OT:txtSched2A')."frm2000OT:txtSched2A=</div>	
            <div>frm2000OT:txtSched2B=".request('frm2000OT:txtSched2B')."frm2000OT:txtSched2B=</div>	
            <div>frm2000OT:txtSched2C=".request('frm2000OT:txtSched2C')."frm2000OT:txtSched2C=</div>	
            <div>frm2000OT:txtSched3A=".request('frm2000OT:txtSched3A')."frm2000OT:txtSched3A=</div>	
            <div>frm2000OT:txtSched4A=".request('frm2000OT:txtSched4A')."frm2000OT:txtSched4A=</div>	
            <div>frm2000OT:txtSched5A=".request('frm2000OT:txtSched5A')."frm2000OT:txtSched5A=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm2000OT:txtTIN1').request('frm2000OT:txtTIN2').request('frm2000OT:txtTIN3').request('frm2000OT:txtBranchCode');
    	
    	$getReturnPeriod = tbl_2000OT::where('company_id',  request('company'))
                            ->where('item1A', request('frm2000OT:txtDateMonth'))
                            ->where('item1B', request('frm2000OT:txtDateDay'))
                            ->where('item1C', request('frm2000OT:txtDateYear'))
                            ->count();

        $returnPeriod = request('frm2000OT:txtDateMonth')."/".request('frm2000OT:txtDateDay')."/".request('frm2000OT:txtDateYear');
        
        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm2000OT:txtDateMonth').request('frm2000OT:txtDateDay').request('frm2000OT:txtDateYear');
        }else{
            if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '2000OT')
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
            $xmlReturnPeriod = request('frm2000OT:txtDateMonth').request('frm2000OT:txtDateDay').request('frm2000OT:txtDateYear').$ext;
        }
        $filename = $tin."-2000OT-".$xmlReturnPeriod.'.xml';

        

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
                'form'          => '2000OT',
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
                            ->where('form', '2000OT')
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
                            ->where('form', '2000OT')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2000OT::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2000OT')
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
        $data = tbl_2000OT::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2000OT')
                            ->get();
        
        return view('forms.BIR-Form 2000OT',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

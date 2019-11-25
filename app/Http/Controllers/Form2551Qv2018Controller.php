<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2551Q;
use App\tbl_2551Q_schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2551Qv2018Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);

    	if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2551_qs')){

            }else{
                Schema::connection('mysql2')->create('tbl_2551_qs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1')->nullable();
					$table->string('item2A')->nullable();
					$table->string('item2B')->nullable();
					$table->string('item3')->nullable();
					$table->string('item4')->nullable();
					$table->string('item5');
					$table->string('item12');
					$table->string('item12A')->nullable();
					$table->string('item13')->nullable();
					$table->text('item14');
					$table->text('item15');
					$table->text('item16');
					$table->text('item17');
					$table->text('item17A')->nullable();
					$table->text('item18');
					$table->text('item19');
					$table->text('item20');
					$table->text('item21');
					$table->text('item22');
					$table->text('item23');
					$table->text('item24');
					$table->text('item24A');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2551_q_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc')->nullable();
                    $table->text('amount')->nullable();
                    $table->text('tax_rate')->nullable();
                    $table->text('tax_due')->nullable();
                    $table->timestamps();
                });
            }
           
	        return view('forms.BIR-Form 2551Qv2018',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_2551Q::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2551Qv2018')
                            ->get();
            return view('forms.BIR-Form 2551Qv2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    	
    }

    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	
    	$data = ([
     		'form_no' 			=> request('form_no'),
    		'company_id' 		=> request('company'),
    		'item1'      => request('frm2551Qv2018:forThe'),
			'item2A'      => request('frm2551Qv2018:rtnMonth'),
			'item2B'      => request('frm2551Qv2018:txtYear'),
			'item3'      => request('frm2551Qv2018:qtr'),
			'item4'      => request('frm2551Qv2018:amendedRtn'),
			'item5'      => request('frm2551Qv2018:txtSheets'),
			'item12'      => request('frm2551Qv2018:taxTreaty'),
			'item12A'      => request('frm2551Qv2018:txtTaxReliefSpecify'),
			'item13'      => null !== request('frm2551Qv2018:taxRate') ? request('frm2551Qv2018:taxRate') : '',
			'item14'      => request('frm2551Qv2018:txt14'),
			'item15'      => request('frm2551Qv2018:txt15'),
			'item16'      => request('frm2551Qv2018:txt16'),
			'item17'      => request('frm2551Qv2018:txt17'),
			'item17A'      => request('frm2551Qv2018:txt17Specify'),
			'item18'      => request('frm2551Qv2018:txt18'),
			'item19'      => request('frm2551Qv2018:txt19'),
			'item20'      => request('frm2551Qv2018:txt20'),
			'item21'      => request('frm2551Qv2018:txt21'),
			'item22'      => request('frm2551Qv2018:txt22'),
			'item23'      => request('frm2551Qv2018:txt23'),
			'item24'      => request('frm2551Qv2018:txt24'),
			'item24A'      => null !== request('frm2551Qv2018:overPayment') ? request('frm2551Qv2018:overPayment') : '',
    	]);

    	$getForm = tbl_2551Q::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

       	$form = "";
        if(request('form_id') != ""){
            $form = tbl_2551Q::find(request('form_id'));
            $form->update($data);
            tbl_2551Q_schedules::where('form_id', $getForm[0]->id)->delete();
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2551Q::create($data);
            }else{
                $form = tbl_2551Q::find($getForm[0]->id);
                $form->update($data);
                tbl_2551Q_schedules::where('form_id', $getForm[0]->id)->delete();
            }
        }

        for($i=1;$i <= 6; $i++){
        	if(request('drpATC'.$i.'') != '0'){
        		$data = ([
        			'form_id'	=> $form->id,
        			'atc'		=> request('drpATC'.$i.''),
        			'amount'		=> request('txtATCAmt'.$i.''),
        			'tax_rate'		=> request('txtATCRate'.$i.''),
        			'tax_due'		=> request('txtATCDue'.$i.''),

        			]);
        		tbl_2551Q_schedules::create($data);
        	}
        }

        $forThe_1 = "false";
		$forThe_2 = "false";

		if(request('frm2551Qv2018:forThe') == 'Y'){
			$forThe_1 = "true";
		}else if(request('frm2551Qv2018:forThe') == 'N'){
			$forThe_2 = "true";
		}

		$qtr_1 = "false";
		$qtr_2 = "false";
		$qtr_3 = "false";
		$qtr_4 = "false";
		
		if(request('frm2551Qv2018:qtr') == "1"){
			$qtr_1 = "true";
		}else if(request('frm2551Qv2018:qtr') == "2"){
			$qtr_2 = "true";
		}else if(request('frm2551Qv2018:qtr') == "3"){
			$qtr_3 = "true";
		}else if(request('frm2551Qv2018:qtr') == "4"){
			$qtr_4 = "true";
		}

		$amendedRtn_1 = "false";
		$amendedRtn_2 = "false";
		
		if(request('frm2551Qv2018:amendedRtn')== "Y"){
			$amendedRtn_1 = "true";
		}else if(request('frm2551Qv2018:amendedRtn') == "N"){
			$amendedRtn_2 = "true";
		}
		
        $taxPayerName =  rawurlencode(request('frm2551Qv2018:registeredName'));

        $address = rawurlencode(request('frm2551Qv2018:registeredAddress'));
		
		$taxTreaty_1 = "false";
		$taxTreaty_2 = "false";
		
		if(request('frm2551Qv2018:taxTreaty') == "Y"){
			$taxTreaty_1 = "true";
		}else if(request('frm2551Qv2018:taxTreaty') == "N"){
			$taxTreaty_2 = "true";
		}

		$taxRate1 = "false";
		$taxRate2 = "false";
		
		if(null !== request('frm2551Qv2018:taxRate')){
			if(request('frm2551Qv2018:taxRate') == "G"){
				$taxRate1 = "true";
			}else if(request('frm2551Qv2018:taxRate') == "I"){
				$taxRate2 = "true";
			}
		}

		$overPayment1 = "false";
		$overPayment2 = "false";
		
		if(null !== request('frm2551Qv2018:overPayment')){
			if(request('frm2551Qv2018:overPayment') == "R"){
				$overPayment1 = "true";
			}else if(request('frm2551Qv2018:overPayment') == "T"){
				$overPayment2 = "true";
			}
		}

		$xmlData ="<?xml version='1.0'?>		<div>frm2551Qv2018:forThe_1=".$forThe_1."frm2551Qv2018:forThe_1=</div>		<div>frm2551Qv2018:forThe_2=".$forThe_2."frm2551Qv2018:forThe_2=</div>		<div>frm2551Qv2018:rtnMonth=".request('frm2551Qv2018:rtnMonth')."frm2551Qv2018:rtnMonth=</div>		<div>frm2551Qv2018:txtYear=".request('frm2551Qv2018:txtYear')."frm2551Qv2018:txtYear=</div>		<div>frm2551Qv2018:qtr_1=".$qtr_1."frm2551Qv2018:qtr_1=</div>		<div>frm2551Qv2018:qtr_2=".$qtr_2."frm2551Qv2018:qtr_2=</div>		<div>frm2551Qv2018:qtr_3=".$qtr_3."frm2551Qv2018:qtr_3=</div>		<div>frm2551Qv2018:qtr_4=".$qtr_4."frm2551Qv2018:qtr_4=</div>		<div>frm2551Qv2018:amendedRtn_1=".$amendedRtn_1."frm2551Qv2018:amendedRtn_1=</div>		<div>frm2551Qv2018:amendedRtn_2=".$amendedRtn_2."frm2551Qv2018:amendedRtn_2=</div>		<div>frm2551Qv2018:txtSheets=".request('frm2551Qv2018:txtSheets')."frm2551Qv2018:txtSheets=</div>		<div>frm2551Qv2018:txtTIN1=".request('frm2551Qv2018:txtTIN1')."frm2551Qv2018:txtTIN1=</div>		<div>frm2551Qv2018:txtTIN2=".request('frm2551Qv2018:txtTIN2')."frm2551Qv2018:txtTIN2=</div>		<div>frm2551Qv2018:txtTIN3=".request('frm2551Qv2018:txtTIN3')."frm2551Qv2018:txtTIN3=</div>		<div>frm2551Qv2018:txtBranchCode=".request('frm2551Qv2018:txtBranchCode')."frm2551Qv2018:txtBranchCode=</div>		<div>frm2551Qv2018:txtRDOCode=".request('frm2551Qv2018:txtRDOCode')."frm2551Qv2018:txtRDOCode=</div>		<div>frm2551Qv2018:registeredName=".$taxPayerName."frm2551Qv2018:registeredName=</div>		<div>frm2551Qv2018:registeredAddress=".$address."frm2551Qv2018:registeredAddress=</div>		<div>frm2551Qv2018:zipCode=".request('frm2551Qv2018:zipCode')."frm2551Qv2018:zipCode=</div>		<div>frm2551Qv2018:telNo=".request('frm2551Qv2018:telNo')."frm2551Qv2018:telNo=</div>		<div>txtEmail=".request('txtEmail')."txtEmail=</div>		<div>frm2551Qv2018:taxTreaty_1=".$taxTreaty_1."frm2551Qv2018:taxTreaty_1=</div>		<div>frm2551Qv2018:taxTreaty_2=".$taxTreaty_2."frm2551Qv2018:taxTreaty_2=</div>		<div>frm2551Qv2018:txtTaxReliefSpecify=".request('frm2551Qv2018:txtTaxReliefSpecify')."frm2551Qv2018:txtTaxReliefSpecify=</div>		<div>frm2551Qv2018:taxRate1=".$taxRate1."frm2551Qv2018:taxRate1=</div>		<div>frm2551Qv2018:taxRate2=".$taxRate2."frm2551Qv2018:taxRate2=</div>		<div>frm2551Qv2018:txt14=".request('frm2551Qv2018:txt14')."frm2551Qv2018:txt14=</div>		<div>frm2551Qv2018:txt15=".request('frm2551Qv2018:txt15')."frm2551Qv2018:txt15=</div>		<div>frm2551Qv2018:txt16=".request('frm2551Qv2018:txt16')."frm2551Qv2018:txt16=</div>		<div>frm2551Qv2018:txt17Specify=".request('frm2551Qv2018:txt17Specify')."frm2551Qv2018:txt17Specify=</div>		<div>frm2551Qv2018:txt17=".request('frm2551Qv2018:txt17')."frm2551Qv2018:txt17=</div>		<div>frm2551Qv2018:txt18=".request('frm2551Qv2018:txt18')."frm2551Qv2018:txt18=</div>		<div>frm2551Qv2018:txt19=".request('frm2551Qv2018:txt19')."frm2551Qv2018:txt19=</div>		<div>frm2551Qv2018:txt20=".request('frm2551Qv2018:txt20')."frm2551Qv2018:txt20=</div>		<div>frm2551Qv2018:txt21=".request('frm2551Qv2018:txt21')."frm2551Qv2018:txt21=</div>		<div>frm2551Qv2018:txt22=".request('frm2551Qv2018:txt22')."frm2551Qv2018:txt22=</div>		<div>frm2551Qv2018:txt23=".request('frm2551Qv2018:txt23')."frm2551Qv2018:txt23=</div>		<div>frm2551Qv2018:txt24=".request('frm2551Qv2018:txt24')."frm2551Qv2018:txt24=</div>		<div>frm2551Qv2018:overPayment1=".$overPayment1."frm2551Qv2018:overPayment1=</div>		<div>frm2551Qv2018:overPayment2=".$overPayment2."frm2551Qv2018:overPayment2=</div>		<div>txtTaxAgentNo=txtTaxAgentNo=</div>		<div>txtDateIssue=txtDateIssue=</div>		<div>txtDateExpiry=txtDateExpiry=</div>		<div>frm2551Qv2018:txtAgency25=frm2551Qv2018:txtAgency25=</div>		<div>frm2551Qv2018:txtNumber25=frm2551Qv2018:txtNumber25=</div>		<div>frm2551Qv2018:txtDate25=frm2551Qv2018:txtDate25=</div>		<div>frm2551Qv2018:txtAmount25=frm2551Qv2018:txtAmount25=</div>		<div>frm2551Qv2018:txtAgency26=frm2551Qv2018:txtAgency26=</div>		<div>frm2551Qv2018:txtNumber26=frm2551Qv2018:txtNumber26=</div>		<div>frm2551Qv2018:txtDate26=frm2551Qv2018:txtDate26=</div>		<div>frm2551Qv2018:txtAmount26=frm2551Qv2018:txtAmount26=</div>		<div>frm2551Qv2018:txtAgency27=frm2551Qv2018:txtAgency27=</div>		<div>frm2551Qv2018:txtNumber27=frm2551Qv2018:txtNumber27=</div>		<div>frm2551Qv2018:txtDate27=frm2551Qv2018:txtDate27=</div>		<div>frm2551Qv2018:txtAmount27=frm2551Qv2018:txtAmount27=</div>		<div>frm2551Qv2018:txtParticular28=frm2551Qv2018:txtParticular28=</div>		<div>frm2551Qv2018:txtAgency28=frm2551Qv2018:txtAgency28=</div>		<div>frm2551Qv2018:txtNumber28=frm2551Qv2018:txtNumber28=</div>		<div>frm2551Qv2018:txtDate28=frm2551Qv2018:txtDate28=</div>		<div>frm2551Qv2018:txtAmount28=frm2551Qv2018:txtAmount28=</div>		<div>frm2551Qv2018:txtPg2TIN1=".request('frm2551Qv2018:txtPg2TIN1')."frm2551Qv2018:txtPg2TIN1=</div>		<div>frm2551Qv2018:txtPg2TIN2=".request('frm2551Qv2018:txtPg2TIN2')."frm2551Qv2018:txtPg2TIN2=</div>		<div>frm2551Qv2018:txtPg2TIN3=".request('frm2551Qv2018:txtPg2TIN3')."frm2551Qv2018:txtPg2TIN3=</div>		<div>frm2551Qv2018:txtPg2BranchCode=".request('frm2551Qv2018:txtPg2BranchCode')."frm2551Qv2018:txtPg2BranchCode=</div>		<div>frm2551Qv2018:txtPg2TaxpayerName=".request('frm2551Qv2018:txtPg2TaxpayerName')."frm2551Qv2018:txtPg2TaxpayerName=</div>		<div>drpATC1=".request('drpATC1')."drpATC1=</div>		<div>txtATCAmt1=".request('txtATCAmt1')."txtATCAmt1=</div>		<div>txtATCRate1=".request('txtATCRate1')."txtATCRate1=</div>		<div>txtATCDue1=".request('txtATCDue1')."txtATCDue1=</div>		<div>drpATC2=".request('drpATC2')."drpATC2=</div>		<div>txtATCAmt2=".request('txtATCAmt2')."txtATCAmt2=</div>		<div>txtATCRate2=".request('txtATCRate2')."txtATCRate2=</div>		<div>txtATCDue2=".request('txtATCDue2')."txtATCDue2=</div>		<div>drpATC3=".request('drpATC3')."drpATC3=</div>		<div>txtATCAmt3=".request('txtATCAmt3')."txtATCAmt3=</div>		<div>txtATCRate3=".request('txtATCAmt3')."txtATCRate3=</div>		<div>txtATCDue3=".request('txtATCDue3')."txtATCDue3=</div>		<div>drpATC4=".request('drpATC4')."drpATC4=</div>		<div>txtATCAmt4=".request('txtATCAmt4')."txtATCAmt4=</div>		<div>txtATCRate4=".request('txtATCRate4')."txtATCRate4=</div>		<div>txtATCDue4=".request('txtATCDue4')."txtATCDue4=</div>		<div>drpATC5=".request('drpATC5')."drpATC5=</div>		<div>txtATCAmt5=".request('txtATCAmt5')."txtATCAmt5=</div>		<div>txtATCRate5=".request('txtATCRate5')."txtATCRate5=</div>		<div>txtATCDue5=".request('txtATCDue5')."txtATCDue5=</div>		<div>drpATC6=".request('drpATC6')."drpATC6=</div>		<div>txtATCAmt6=0.00txtATCAmt6=</div>		<div>txtATCRate6=".request('txtATCRate6')."txtATCRate6=</div>		<div>txtATCDue6=".request('txtATCDue6')."txtATCDue6=</div>		<div>txtTotalSched1=".request('txtTotalSched1')."txtTotalSched1=</div>		<div>frm2551Qv2018:txtCurrentPage=".request('frm2551Qv2018:txtCurrentPage')."frm2551Qv2018:txtCurrentPage=</div>		<div>frm2551Qv2018:txtMaxPage=2frm2551Qv2018:txtMaxPage=</div>		<div>txtFinalFlag=0txtFinalFlag=</div>		<div>txtEnroll=NtxtEnroll=</div>		<div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>		<div>ebirOnlineUsername=ebirOnlineUsername=</div>		<div>ebirOnlineSecret=ebirOnlineSecret=</div>		<div>driveSelectTPExport=0driveSelectTPExport=</div>				All Rights Reserved BIR 2012.";

		$tin = request('frm2551Qv2018:txtTIN1').request('frm2551Qv2018:txtTIN2').request('frm2551Qv2018:txtTIN3').request('frm2551Qv2018:txtBranchCode');

        $getReturnPeriod = tbl_2551Q::where('company_id',  request('company'))
                            ->where('item2A', request('frm2551Qv2018:rtnMonth'))
                            ->where('item2B', request('frm2551Qv2018:txtYear'))
                            ->where('item3', request('frm2551Qv2018:qtr'))
                            ->count();
		
        $returnPeriod = request('frm2551Qv2018:rtnMonth')."/".request('frm2551Qv2018:txtYear').'-Q'.request('frm2551Qv2018:qtr');


		if($getReturnPeriod == "1"){
                $xmlReturnPeriod = request('frm2551Qv2018:rtnMonth').request('frm2551Qv2018:txtYear').'Q'.request('frm2551Qv2018:qtr');
        }else{
            if(request('form_id') != ""){
                $getXml = Xml::where('user_id', Auth::user()->id)
                        ->where('company_id', request('company'))
                        ->where('form_id', $form->id)
                        ->where('form', '2551Qv2018')
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
            
            $xmlReturnPeriod = request('frm2551Qv2018:rtnMonth').request('frm2551Qv2018:txtYear').'Q'.request('frm2551Qv2018:qtr').$ext;
        }

        $filename = $tin."-2551Qv2018-".$xmlReturnPeriod.'.xml';

        
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
                'form'          => '2551Qv2018',
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
                            ->where('form', '2551Qv2018')
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
                            ->where('form', '2551Qv2018')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2551Q::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2551Qv2018')
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

        $data = tbl_2551Q::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2551Qv2018')
                            ->get();
        return view('forms.BIR-Form 2551Qv2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

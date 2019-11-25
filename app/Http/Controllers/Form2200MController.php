<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2200M;
use App\tbl_2200M_schedules;
use App\tbl_2200M_schedule_others;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2200MController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
    	if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2200_ms')){

            }else{
                Schema::connection('mysql2')->create('tbl_2200_ms', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
					$table->string('item1A');
					$table->string('item1B');
					$table->string('item1C');
					$table->string('item2');
					$table->string('item3');
					$table->string('item4')->nullable();
					$table->string('item12A')->nullable();
					$table->string('item12B')->nullable();
					$table->string('item12C')->nullable();
					$table->string('item12D')->nullable();
					$table->string('item13A')->nullable();
					$table->string('item13B')->nullable();
					$table->string('item13C')->nullable();
					$table->string('item13D')->nullable();
					$table->string('item14')->nullable();
					$table->string('item15')->nullable();
					$table->string('item16')->nullable();
					$table->string('item16_other')->nullable();
					$table->text('item17');
					$table->text('item18A');
					$table->text('item18B');
					$table->text('item18C');
					$table->text('item19');
					$table->text('item20');
					$table->text('item21');
					$table->text('item22A');
					$table->text('item22B');
					$table->text('item22C');
					$table->text('item22D');
					$table->text('item23');
					$table->text('item24A');
					$table->text('item24B');
					$table->text('item24C');
					$table->text('item25');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_m_schedules', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('removal')->nullable();
                	 $table->text('itemA');
                	 $table->text('itemB');
                	 $table->text('itemC');
                	 $table->text('itemD');
                	 $table->text('itemF');
                	 $table->text('itemG');
                	 $table->text('itemH');
                	 $table->text('itemJ');
                	 $table->text('itemK');
                	 $table->text('itemL');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_m_schedule_others', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('atc')->nullable();
                	 $table->text('description')->nullable();
                	 $table->text('removal')->nullable();
                	 $table->text('itemA');
                	 $table->text('itemB');
                	 $table->text('itemC');
                	 $table->text('itemD');
                	 $table->text('itemE');
                	 $table->text('itemF');
                	 $table->text('itemG');
                	 $table->text('itemH');
                	 $table->text('itemI');
                	 $table->text('itemJ');
                	 $table->text('itemK');
                	 $table->text('itemL');
                     $table->timestamps();
                });
            }
           
	        return view('forms.BIR-Form 2200M',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_2200M::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2200M')
                            ->get();
        
        	return view('forms.BIR-Form 2200M',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }    
    }

    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	$data = ([
    		'form_no'   => request('form_no'),
			'company_id'   => request('company'),
			'item1A'   => request('frm2200M:txtMonth1'),
			'item1B'   => request('frm2200M:txtDate'),
			'item1C'   => request('frm2200M:txtForYr'),
			'item2'   => request('frm2200M:amendedRtn'),
			'item3'   => request('frm2200M:quarterlyRtn'),
			'item4'   => request('frm2200M:txtSheets'),
			'item12A'   => request('frm2200MoptRegion'),
			'item12B'   => request('frm2200MoptProvince'),
			'item12C'   => request('frm2200MoptCity'),
			'item12D'   => request('frm2200M:txtPlaceofProd'),
			'item13A'   => request('frm2200MoptRegion1'),
			'item13B'   => request('frm2200MoptProvince1'),
			'item13C'   => request('frm2200MoptCity1'),
			'item13D'   => request('frm2200M:txtPlaceofRem'),
			'item14'   => request('frm2200M:optTreaty'),
			'item15'   => request('frm2200M:lstTaxTreaty'),
			'item16'   => null !== request('frm2200M:chkPymntManner') ? request('frm2200M:chkPymntManner') : '',
			'item16_other'   => request('frm2200M:txtOthMannerofPymnt'),
			'item17'   => request('frm2200M:txtTax17'),
			'item18A'   => request('frm2200M:txtTax18A'),
			'item18B'   => request('frm2200M:txtTax18B'),
			'item18C'   => request('frm2200M:txtTax18C'),
			'item19'   => request('frm2200M:txtTax19'),
			'item20'   => request('frm2200M:txtTax20'),
			'item21'   => request('frm2200M:txtTax21'),
			'item22A'   => request('frm2200M:txtTax22A'),
			'item22B'   => request('frm2200M:txtTax22B'),
			'item22C'   => request('frm2200M:txtTax22C'),
			'item22D'   => request('frm2200M:txtTax22D'),
			'item23'   => request('frm2200M:txtTax23'),
			'item24A'   => request('frm2200M:txtTax24A'),
			'item24B'   => request('frm2200M:txtTax24B'),
			'item24C'   => request('frm2200M:txtTax24C'),
			'item25'   => request('frm2200M:txtTax25'),
    		]);

    	$getForm = tbl_2200M::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
     	$trans = "";
        if(request('form_id') != ""){
            $form = tbl_2200M::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2200M::create($data);
            }else{
                $form = tbl_2200M::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_2200M_schedules::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200M_schedule_others::where('form_id', $getForm[0]->id)->delete();
        }

        for ($i=1; $i < 6 ; $i++) { 
        	if(request('frm2200M:txtA'.$i.'') != '0.00' ){
        		$schedule = ([
        				'form_id'  => $form->id,
        				'removal'  => request('frm2200M:txtPlaceOfExtract'.$i.''),
        				'itemA'  => request('frm2200M:txtA'.$i.''),
        				'itemB'  => request('frm2200M:txtB'.$i.''),
        				'itemC'  => request('frm2200M:txtC'.$i.''),
        				'itemD'  => request('frm2200M:txtD'.$i.''),
        				'itemF'  => request('frm2200M:txtF'.$i.''),
        				'itemG'  => request('frm2200M:txtG'.$i.''),
        				'itemH'  => request('frm2200M:txtH'.$i.''),
        				'itemJ'  => request('frm2200M:txtJ'.$i.''),
        				'itemK'  => request('frm2200M:txtK'.$i.''),
        				'itemL'  => request('frm2200M:txtL'.$i.''),
        			]);
        		tbl_2200M_schedules::create($schedule);
        	}
        }

        for ($y=0; $y < count(request('frm2200M:txtsched1Atc')) ; $y++) { 
        	if(request('frm2200M:txtsched1Atc')[$y] != ''){
        		$others = ([
        				'form_id'  => $form->id,
        				'atc'  => request('frm2200M:txtsched1Atc')[$y],
        				'description'  => request('frm2200M:txtsched1Desc'.$y.''),
        				'removal'  => request('frm2200M:txtsched1PlaceOfExtract'.$y.''),
        				'itemA'  => request('frm2200M:txtsched1A'.$y.''),
        				'itemB'  => request('frm2200M:txtsched1B'.$y.''),
        				'itemC'  => request('frm2200M:txtsched1C'.$y.''),
        				'itemD'  => request('frm2200M:txtsched1D'.$y.''),
        				'itemE'  => request('frm2200M:txtsched1E'.$y.''),
        				'itemF'  => request('frm2200M:txtsched1F'.$y.''),
        				'itemG'  => request('frm2200M:txtsched1G'.$y.''),
        				'itemH'  => request('frm2200M:txtsched1H'.$y.''),
        				'itemI'  => request('frm2200M:txtsched1I'.$y.''),
        				'itemJ'  => request('frm2200M:txtsched1J'.$y.''),
        				'itemK'  => request('frm2200M:txtsched1K'.$y.''),
        				'itemL'  => request('frm2200M:txtsched1L'.$y.''),
        			]);
        		tbl_2200M_schedule_others::create($others);
        	}
        }

        $amendedRtn_1 = "false";
        $amendedRtn_2 = "false";

        if( request('frm2200M:amendedRtn') == "Y"){
          $amendedRtn_1 = "true";
        }else if( request('frm2200M:amendedRtn') == "N"){
          $amendedRtn_2 = "true";
        }

       	$quarterlyRtn_1 = "false";
       	$quarterlyRtn_2 = "false";

       	if( request('frm2200M:quarterlyRtn') == "Y"){
          $quarterlyRtn_1 = "true";
        }else if( request('frm2200M:quarterlyRtn') == "N"){
          $quarterlyRtn_2 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm2200M:txtTaxpayerName'));

        $address = rawurlencode(request('frm2200M:txtAddress'));

        $lineOfBusiness =  rawurlencode(request('frm2200M:txtLineBus'));

        $optTreaty_1 = "false";
        $optTreaty_2 = "false";

        if( request('frm2200M:optTreaty') == "Y"){
	          $optTreaty_1 = "true";
	    }else if( request('frm2200M:optTreaty') == "N"){
	          $optTreaty_2 = "true";
	    }

	    $chkPymntManner_1 = "false";
        $chkPymntManner_2 = "false";

        if(null !== request('frm2200M:chkPymntManner')){
        	if( request('frm2200M:chkPymntManner') == "Y"){
	          $chkPymntManner_1 = "true";
	        }else if( request('frm2200M:chkPymntManner') == "N"){
	          $chkPymntManner_2 = "true";
	        }
        }

        $ext = "";
        for ($y=1; $y < count(request('frm2200M:txtsched1Atc')) ; $y++) { 
        	$ext .= "<div>frm2200M:sched1Chk".$y."=".(null !== request('frm2200M:sched1Chk'.$y.'') ? 'true' : 'false')."frm2200M:sched1Chk".$y."=</div>	
            <div>frm2200M:txtsched1Atc".$y."=".request('frm2200M:txtsched1Atc')[$y]."frm2200M:txtsched1Atc".$y."=</div>	
            <div>frm2200M:txtsched1Desc".$y."=".request('frm2200M:txtsched1Desc'.$y.'')."frm2200M:txtsched1Desc".$y."=</div>	
            <div>frm2200M:txtsched1PlaceOfExtract".$y."=".request('frm2200M:txtsched1PlaceOfExtract'.$y.'')."frm2200M:txtsched1PlaceOfExtract".$y."=</div>	
            <div>frm2200M:txtsched1A".$y."=".request('frm2200M:txtsched1A'.$y.'')."frm2200M:txtsched1A".$y."=</div>	
            <div>frm2200M:txtsched1B".$y."=".request('frm2200M:txtsched1B'.$y.'')."frm2200M:txtsched1B".$y."=</div>	
            <div>frm2200M:txtsched1C".$y."=".request('frm2200M:txtsched1C'.$y.'')."frm2200M:txtsched1C".$y."=</div>	
            <div>frm2200M:txtsched1D".$y."=".request('frm2200M:txtsched1D'.$y.'')."frm2200M:txtsched1D".$y."=</div>	
            <div>frm2200M:txtsched1E".$y."=".request('frm2200M:txtsched1E'.$y.'')."frm2200M:txtsched1E".$y."=</div>	
            <div>frm2200M:txtsched1F".$y."=".request('frm2200M:txtsched1F'.$y.'')."frm2200M:txtsched1F".$y."=</div>	
            <div>frm2200M:txtsched1G".$y."=".request('frm2200M:txtsched1G'.$y.'')."frm2200M:txtsched1G".$y."=</div>	
            <div>frm2200M:txtsched1H".$y."=".request('frm2200M:txtsched1H'.$y.'')."frm2200M:txtsched1H".$y."=</div>	
            <div>frm2200M:txtsched1I".$y."=".request('frm2200M:txtsched1I'.$y.'')."frm2200M:txtsched1I".$y."=</div>	
            <div>frm2200M:txtsched1J".$y."=".request('frm2200M:txtsched1J'.$y.'')."frm2200M:txtsched1J".$y."=</div>	
            <div>frm2200M:txtsched1K".$y."=".request('frm2200M:txtsched1K'.$y.'')."frm2200M:txtsched1K".$y."=</div>	
            <div>frm2200M:txtsched1L".$y."=".request('frm2200M:txtsched1L'.$y.'')."frm2200M:txtsched1L".$y."=</div>	
            ";
        }

        $xmlData = "<?xml version='1.0'?>	
            <div>frm2200M:txtMonth1=".request('frm2200M:txtMonth1')."frm2200M:txtMonth1=</div>	
            <div>frm2200M:txtDate=".request('frm2200M:txtDate')."frm2200M:txtDate=</div>	
            <div>frm2200M:txtForYr=".request('frm2200M:txtForYr')."frm2200M:txtForYr=</div>	
            <div>frm2200M:amendedRtn_1=".$amendedRtn_1."frm2200M:amendedRtn_1=</div>	
            <div>frm2200M:amendedRtn_2=".$amendedRtn_2."frm2200M:amendedRtn_2=</div>	
            <div>frm2200M:quarterlyRtn_1=".$quarterlyRtn_1."frm2200M:quarterlyRtn_1=</div>	
            <div>frm2200M:quarterlyRtn_2=".$quarterlyRtn_2."frm2200M:quarterlyRtn_2=</div>	
            <div>frm2200M:txtSheets=".request('frm2200M:txtSheets')."frm2200M:txtSheets=</div>	
            <div>frm2200M:txtTIN1=".request('frm2200M:txtTIN1')."frm2200M:txtTIN1=</div>	
            <div>frm2200M:txtTIN2=".request('frm2200M:txtTIN2')."frm2200M:txtTIN2=</div>	
            <div>frm2200M:txtTIN3=".request('frm2200M:txtTIN3')."frm2200M:txtTIN3=</div>	
            <div>frm2200M:txtBranchCode=".request('frm2200M:txtBranchCode')."frm2200M:txtBranchCode=</div>	
            <div>frm2200M:txtRDOCode=".request('frm2200M:txtRDOCode')."frm2200M:txtRDOCode=</div>	
            <div>frm2200M:txtLineBus=".$lineOfBusiness."frm2200M:txtLineBus=</div>	
            <div>frm2200M:txtTaxpayerName=".$taxPayerName."frm2200M:txtTaxpayerName=</div>	
            <div>frm2200M:txtTelNum=".request('frm2200M:txtTelNum')."frm2200M:txtTelNum=</div>	
            <div>frm2200M:txtAddress=".$address."frm2200M:txtAddress=</div>	
            <div>frm2200M:txtZipCode=".request('frm2200M:txtZipCode')."frm2200M:txtZipCode=</div>	
            <div>frm2200MoptRegion=".request('frm2200MoptRegion')."frm2200MoptRegion=</div>	
            <div>frm2200MoptProvince=".request('frm2200MoptProvince')."frm2200MoptProvince=</div>	
            <div>frm2200MoptCity=".request('frm2200MoptCity')."frm2200MoptCity=</div>	
            <div>frm2200M:txtPlaceofProd=".request('frm2200M:txtPlaceofProd')."frm2200M:txtPlaceofProd=</div>	
            <div>frm2200MoptRegion1=".request('frm2200MoptRegion1')."frm2200MoptRegion1=</div>	
            <div>frm2200MoptProvince1=".request('frm2200MoptProvince1')."frm2200MoptProvince1=</div>	
            <div>frm2200MoptCity1=".request('frm2200MoptCity1')."frm2200MoptCity1=</div>	
            <div>frm2200M:txtPlaceofRem=".request('frm2200M:txtPlaceofRem')."frm2200M:txtPlaceofRem=</div>	
            <div>frm2200M:optTreaty_1=".$optTreaty_1."frm2200M:optTreaty_1=</div>	
            <div>frm2200M:optTreaty_2=".$optTreaty_2."frm2200M:optTreaty_2=</div>	
            <div>frm2200M:lstTaxTreaty=".request('frm2200M:lstTaxTreaty')."frm2200M:lstTaxTreaty=</div>	
            <div>frm2200M:chkPymntManner_1=".$chkPymntManner_1."frm2200M:chkPymntManner_1=</div>	
            <div>frm2200M:chkPymntManner_2=".$chkPymntManner_2."frm2200M:chkPymntManner_2=</div>	
            <div>frm2200M:txtOthMannerofPymnt=".request('frm2200M:txtOthMannerofPymnt')."frm2200M:txtOthMannerofPymnt=</div>	
            <div>frm2200M:txtTax17=".request('frm2200M:txtTax17')."frm2200M:txtTax17=</div>	
            <div>frm2200M:txtTax18A=".request('frm2200M:txtTax18A')."frm2200M:txtTax18A=</div>	
            <div>frm2200M:txtTax18B=".request('frm2200M:txtTax18B')."frm2200M:txtTax18B=</div>	
            <div>frm2200M:txtTax18C=".request('frm2200M:txtTax18C')."frm2200M:txtTax18C=</div>	
            <div>frm2200M:txtTax19=".request('frm2200M:txtTax19')."frm2200M:txtTax19=</div>	
            <div>frm2200M:txtTax20=".request('frm2200M:txtTax20')."frm2200M:txtTax20=</div>	
            <div>frm2200M:txtTax21=".request('frm2200M:txtTax21')."frm2200M:txtTax21=</div>	
            <div>frm2200M:txtTax22A=".request('frm2200M:txtTax22A')."frm2200M:txtTax22A=</div>	
            <div>frm2200M:txtTax22B=".request('frm2200M:txtTax22B')."frm2200M:txtTax22B=</div>	
            <div>frm2200M:txtTax22C=".request('frm2200M:txtTax22C')."frm2200M:txtTax22C=</div>	
            <div>frm2200M:txtTax22D=".request('frm2200M:txtTax22D')."frm2200M:txtTax22D=</div>	
            <div>frm2200M:txtTax23=".request('frm2200M:txtTax23')."frm2200M:txtTax23=</div>	
            <div>frm2200M:txtTax24A=".request('frm2200M:txtTax24A')."frm2200M:txtTax24A=</div>	
            <div>frm2200M:PayPenalties=".(null !== request('frm2200M:PayPenalties') ? 'true' : 'false')."frm2200M:PayPenalties=</div>	
            <div>frm2200M:txtTax24B=".request('frm2200M:txtTax24B')."frm2200M:txtTax24B=</div>	
            <div>frm2200M:txtTax24C=".request('frm2200M:txtTax24C')."frm2200M:txtTax24C=</div>	
            <div>frm2200M:txtTax25=".request('frm2200M:txtTax25')."frm2200M:txtTax25=</div>	
            <div>frm2200M:txtPlaceOfExtract1=".request('frm2200M:txtPlaceOfExtract1')."frm2200M:txtPlaceOfExtract1=</div>	
            <div>frm2200M:txtA1=".request('frm2200M:txtA1')."frm2200M:txtA1=</div>	
            <div>frm2200M:txtB1=".request('frm2200M:txtB1')."frm2200M:txtB1=</div>	
            <div>frm2200M:txtC1=".request('frm2200M:txtC1')."frm2200M:txtC1=</div>	
            <div>frm2200M:txtD1=".request('frm2200M:txtD1')."frm2200M:txtD1=</div>	
            <div>frm2200M:txtF1=".request('frm2200M:txtF1')."frm2200M:txtF1=</div>	
            <div>frm2200M:txtG1=".request('frm2200M:txtG1')."frm2200M:txtG1=</div>	
            <div>frm2200M:txtH1=".request('frm2200M:txtH1')."frm2200M:txtH1=</div>	
            <div>frm2200M:txtJ1=".request('frm2200M:txtJ1')."frm2200M:txtJ1=</div>	
            <div>frm2200M:txtK1=".request('frm2200M:txtK1')."frm2200M:txtK1=</div>	
            <div>frm2200M:txtL1=".request('frm2200M:txtL1')."frm2200M:txtL1=</div>	
            <div>frm2200M:txtPlaceOfExtract2=".request('frm2200M:txtPlaceOfExtract2')."frm2200M:txtPlaceOfExtract2=</div>	
            <div>frm2200M:txtA2=".request('frm2200M:txtA2')."frm2200M:txtA2=</div>	
            <div>frm2200M:txtB2=".request('frm2200M:txtB2')."frm2200M:txtB2=</div>	
            <div>frm2200M:txtC2=".request('frm2200M:txtC2')."frm2200M:txtC2=</div>	
            <div>frm2200M:txtD2=".request('frm2200M:txtD2')."frm2200M:txtD2=</div>	
            <div>frm2200M:txtF2=".request('frm2200M:txtF2')."frm2200M:txtF2=</div>	
            <div>frm2200M:txtG2=".request('frm2200M:txtG2')."frm2200M:txtG2=</div>	
            <div>frm2200M:txtH2=".request('frm2200M:txtH2')."frm2200M:txtH2=</div>	
            <div>frm2200M:txtJ2=".request('frm2200M:txtJ2')."frm2200M:txtJ2=</div>	
            <div>frm2200M:txtK2=".request('frm2200M:txtK2')."frm2200M:txtK2=</div>	
            <div>frm2200M:txtL2=".request('frm2200M:txtL2')."frm2200M:txtL2=</div>	
            <div>frm2200M:txtPlaceOfExtract3=".request('frm2200M:txtPlaceOfExtract3')."frm2200M:txtPlaceOfExtract3=</div>	
            <div>frm2200M:txtA3=".request('frm2200M:txtA3')."frm2200M:txtA3=</div>	
            <div>frm2200M:txtB3=".request('frm2200M:txtB3')."frm2200M:txtB3=</div>	
            <div>frm2200M:txtC3=".request('frm2200M:txtC4')."frm2200M:txtC3=</div>	
            <div>frm2200M:txtD3=".request('frm2200M:txtD3')."frm2200M:txtD3=</div>	
            <div>frm2200M:txtF3=".request('frm2200M:txtF3')."frm2200M:txtF3=</div>	
            <div>frm2200M:txtG3=".request('frm2200M:txtG3')."frm2200M:txtG3=</div>	
            <div>frm2200M:txtH3=".request('frm2200M:txtH3')."frm2200M:txtH3=</div>	
            <div>frm2200M:txtJ3=".request('frm2200M:txtJ3')."frm2200M:txtJ3=</div>	
            <div>frm2200M:txtK3=".request('frm2200M:txtK3')."frm2200M:txtK3=</div>	
            <div>frm2200M:txtL3=".request('frm2200M:txtL3')."frm2200M:txtL3=</div>	
            <div>frm2200M:txtPlaceOfExtract4=".request('frm2200M:txtPlaceOfExtract4')."frm2200M:txtPlaceOfExtract4=</div>	
            <div>frm2200M:txtA4=".request('frm2200M:txtA4')."frm2200M:txtA4=</div>	
            <div>frm2200M:txtB4=".request('frm2200M:txtB4')."frm2200M:txtB4=</div>	
            <div>frm2200M:txtC4=".request('frm2200M:txtC4')."frm2200M:txtC4=</div>	
            <div>frm2200M:txtD4=".request('frm2200M:txtD4')."frm2200M:txtD4=</div>	
            <div>frm2200M:txtF4=".request('frm2200M:txtF4')."frm2200M:txtF4=</div>	
            <div>frm2200M:txtG4=".request('frm2200M:txtG4')."frm2200M:txtG4=</div>	
            <div>frm2200M:txtH4=".request('frm2200M:txtH4')."frm2200M:txtH4=</div>	
            <div>frm2200M:txtJ4=".request('frm2200M:txtJ4')."frm2200M:txtJ4=</div>	
            <div>frm2200M:txtK4=".request('frm2200M:txtK4')."frm2200M:txtK4=</div>	
            <div>frm2200M:txtL4=".request('frm2200M:txtL4')."frm2200M:txtL4=</div>	
            <div>frm2200M:txtPlaceOfExtract5=".request('frm2200M:txtPlaceOfExtract5')."frm2200M:txtPlaceOfExtract5=</div>	
            <div>frm2200M:txtA5=".request('frm2200M:txtA5')."frm2200M:txtA5=</div>	
            <div>frm2200M:txtB5=".request('frm2200M:txtB5')."frm2200M:txtB5=</div>	
            <div>frm2200M:txtC5=".request('frm2200M:txtC5')."frm2200M:txtC5=</div>	
            <div>frm2200M:txtD5=".request('frm2200M:txtD5')."frm2200M:txtD5=</div>	
            <div>frm2200M:txtF5=".request('frm2200M:txtF5')."frm2200M:txtF5=</div>	
            <div>frm2200M:txtG5=".request('frm2200M:txtG5')."frm2200M:txtG5=</div>	
            <div>frm2200M:txtH5=".request('frm2200M:txtH5')."frm2200M:txtH5=</div>	
            <div>frm2200M:txtJ5=".request('frm2200M:txtJ5')."frm2200M:txtJ5=</div>	
            <div>frm2200M:txtK5=".request('frm2200M:txtK5')."frm2200M:txtK5=</div>	
            <div>frm2200M:txtL5=".request('frm2200M:txtL5')."frm2200M:txtL5=</div>	
            <div>frm2200M:txtPlaceOfExtract6=".request('frm2200M:txtPlaceOfExtract6')."frm2200M:txtPlaceOfExtract6=</div>	
            <div>frm2200M:txtA6=".request('frm2200M:txtA6')."frm2200M:txtA6=</div>	
            <div>frm2200M:txtB6=".request('frm2200M:txtB6')."frm2200M:txtB6=</div>	
            <div>frm2200M:txtC6=".request('frm2200M:txtC6')."frm2200M:txtC6=</div>	
            <div>frm2200M:txtD6=".request('frm2200M:txtD6')."frm2200M:txtD6=</div>	
            <div>frm2200M:txtF6=".request('frm2200M:txtF6')."frm2200M:txtF6=</div>	
            <div>frm2200M:txtG6=".request('frm2200M:txtG6')."frm2200M:txtG6=</div>	
            <div>frm2200M:txtH6=".request('frm2200M:txtH6')."frm2200M:txtH6=</div>	
            <div>frm2200M:txtJ6=".request('frm2200M:txtJ6')."frm2200M:txtJ6=</div>	
            <div>frm2200M:txtK6=".request('frm2200M:txtK6')."frm2200M:txtK6=</div>	
            <div>frm2200M:txtL6=".request('frm2200M:txtL6')."frm2200M:txtL6=</div>	
            <div>frm2200M:sched1Chk0=".(null !== request('frm2200M:sched1Chk0') ? 'true' : 'false')."frm2200M:sched1Chk0=</div>	
            <div>frm2200M:txtsched1Atc0=".request('frm2200M:txtsched1Atc')[0]."frm2200M:txtsched1Atc0=</div>	
            <div>frm2200M:txtsched1Desc0=".request('frm2200M:txtsched1Desc0')."frm2200M:txtsched1Desc0=</div>	
            <div>frm2200M:txtsched1PlaceOfExtract0=".request('frm2200M:txtsched1PlaceOfExtract0')."frm2200M:txtsched1PlaceOfExtract0=</div>	
            <div>frm2200M:txtsched1A0=".request('frm2200M:txtsched1A0')."frm2200M:txtsched1A0=</div>	
            <div>frm2200M:txtsched1B0=".request('frm2200M:txtsched1B0')."frm2200M:txtsched1B0=</div>	
            <div>frm2200M:txtsched1C0=".request('frm2200M:txtsched1C0')."frm2200M:txtsched1C0=</div>	
            <div>frm2200M:txtsched1D0=".request('frm2200M:txtsched1D0')."frm2200M:txtsched1D0=</div>	
            <div>frm2200M:txtsched1E0=".request('frm2200M:txtsched1E0')."frm2200M:txtsched1E0=</div>	
            <div>frm2200M:txtsched1F0=".request('frm2200M:txtsched1F0')."frm2200M:txtsched1F0=</div>	
            <div>frm2200M:txtsched1G0=".request('frm2200M:txtsched1G0')."frm2200M:txtsched1G0=</div>	
            <div>frm2200M:txtsched1H0=".request('frm2200M:txtsched1H0')."frm2200M:txtsched1H0=</div>	
            <div>frm2200M:txtsched1I0=".request('frm2200M:txtsched1I0')."frm2200M:txtsched1I0=</div>	
            <div>frm2200M:txtsched1J0=".request('frm2200M:txtsched1J0')."frm2200M:txtsched1J0=</div>	
            <div>frm2200M:txtsched1K0=".request('frm2200M:txtsched1K0')."frm2200M:txtsched1K0=</div>	
            <div>frm2200M:txtsched1L0=".request('frm2200M:txtsched1L0')."frm2200M:txtsched1L0=</div>	
            ".$ext."<div>frm2200M:totalTaxDue=".request('frm2200M:totalTaxDue')."frm2200M:totalTaxDue=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm2200M:txtTIN1').request('frm2200M:txtTIN2').request('frm2200M:txtTIN3').request('frm2200M:txtBranchCode');
    		
    	$returnPeriod = request('frm2200M:txtMonth1')."/".request('frm2200M:txtDate')."/".request('frm2200M:txtForYr')." ".date('H:i:s');

    	$xmlReturnPeriod = request('frm2200M:txtMonth1').request('frm2200M:txtDate').request('frm2200M:txtForYr').date('His');

        $filename = $tin."-2200M-".$xmlReturnPeriod.'.xml';

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
	     		'user_id'		=> Auth::user()->id,
	     		'company_id'	=> request('company'),
	     		'form_id'		=> $form->id,
	     		'form'			=> '2200M',
	     		'file_name'		=> $filename,
	     		'return_period'	=> $returnPeriod,
	     		'status'		=> 'Saved',
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
     						->where('form', '2200M')
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
                            ->where('form', '2200M')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2200M::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2200M')
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
        $data = tbl_2200M::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2200M')
                            ->get();
        
        return view('forms.BIR-Form 2200M',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

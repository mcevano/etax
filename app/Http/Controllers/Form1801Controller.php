<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1801;
use App\tbl_1801_schedule1;
use App\tbl_1801_schedule2;
use App\tbl_1801_schedule3;
use App\tbl_1801_schedule4;
use App\tbl_1801_schedule5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1801Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1801s')){

            }else{
            	Schema::connection('mysql2')->create('tbl_1801s', function (Blueprint $table) {
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
                    $table->string('item9')->nullable();
                    $table->string('item11')->nullable();
                    $table->string('item12')->nullable();
                    $table->string('item13')->nullable();
                    $table->string('item14')->nullable();
                    $table->string('item15')->nullable();
                    $table->string('item15A')->nullable();
                    $table->string('item16A')->nullable();
                    $table->string('item16B')->nullable();
                    $table->string('item16C')->nullable();
                    $table->string('item16D')->nullable();
                    $table->text('item17A');
                    $table->text('item17B');
                    $table->text('item17C');
                    $table->text('item18A');
                    $table->text('item18B');
                   	$table->text('item18C');
                   	$table->text('item19A');
                    $table->text('item19B');
                   	$table->text('item19C');
                   	$table->text('item20A');
                    $table->text('item20B');
                   	$table->text('item20C');
                   	$table->text('item21A');
                    $table->text('item21B');
                   	$table->text('item21C');
                   	$table->text('item22A');
                    $table->text('item22B');
                   	$table->text('item22C');
                   	$table->text('item23A');
                    $table->text('item23B');
                   	$table->text('item23C');
                   	$table->text('item24');
                   	$table->text('item25');
                   	$table->text('item26');
                   	$table->text('item27_others_a')->nullable();
                   	$table->text('item27_others_b')->nullable();
                   	$table->text('item27A');
                   	$table->text('item27B');
                   	$table->text('item28');
                   	$table->text('item29');
                   	$table->text('item30');
                   	$table->text('item31');
                   	$table->text('item32A');
                   	$table->text('item32B');
                   	$table->text('item32C');
                   	$table->text('item33');
                   	$table->text('item34A');
                   	$table->text('item34B');
                   	$table->text('item34C');
                   	$table->text('item34D');
                   	$table->text('item35');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1801_schedule1s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('oct')->nullable();
					 $table->text('td')->nullable();
					 $table->text('location')->nullable();
					 $table->text('class')->nullable();
					 $table->text('area')->nullable();
					 $table->text('zonal')->nullable();
					 $table->text('fair')->nullable();
					 $table->text('conjugal')->nullable();
					 $table->text('exclusive')->nullable();
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1801_schedule2s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('name')->nullable();
					 $table->text('stock')->nullable();
					 $table->text('shares')->nullable();
					 $table->text('fair')->nullable();
					 $table->text('conjugal')->nullable();
					 $table->text('exclusive')->nullable();
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1801_schedule3s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('particulars')->nullable();
					 $table->text('exclusive')->nullable();
					 $table->text('conjugal')->nullable();
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1801_schedule4s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('particulars')->nullable();
					 $table->text('exclusive')->nullable();
					 $table->text('conjugal')->nullable();
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1801_schedule5s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('exclusiveA1');
					 $table->text('conjugalB1');
					 $table->text('exclusiveA2');
					 $table->text('conjugalB2');
					 $table->text('exclusiveA3');
					 $table->text('conjugalB3');
					 $table->text('exclusiveA4');
					 $table->text('conjugalB4');
					 $table->text('exclusiveA5');
					 $table->text('conjugalB5');
					 $table->text('exclusiveA6');
					 $table->text('conjugalB6');
					 $table->text('exclusiveA7');
					 $table->text('conjugalB7');
					 $table->text('exclusiveA8');
					 $table->text('conjugalB8');
					 $table->text('desc')->nullable();
					 $table->text('exclusiveTotalA');
					 $table->text('conjugalTotalB');
                     $table->timestamps();
                });

            }
            return view('forms.BIR-Form 1801',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_1801::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1801')
                            ->get();
        
        	return view('forms.BIR-Form 1801',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
        
    }

    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	
    	$data = ([
    		'form_no'       => request('form_no'),
			'company_id'       => request('company'),
			'item1A'       => request('frm1801:txtDateMonth'),
			'item1B'       => request('frm1801:txtDateDay'),
			'item1C'       => request('frm1801:txtDateYear'),
			'item2'       => request('frm1801:amendedRtn'),
			'item3'       => request('frm1801:txtSheets'),
			'item4'       => request('frm1801:txt4'),
			'item7A'       => request('frm1801:txtTINE1'),
			'item7B'       => request('frm1801:txtTINE2'),
			'item7C'       => request('frm1801:txtTINE3'),
			'item7D'       => request('frm1801:txtBranchCodeE'),
			'item9'       => request('frm1801:txtExecutor'),
			'item11'       => request('frm1801:txtAddress'),
			'item12'       => request('frm1801:txtZip'),
			'item13'       => request('frm1801:txtTelephone'),
			'item14'       => request('frm1801:txtRAddress'),
			'item15'       => request('frm1801:optTreaty'),
			'item15A'       => request('frm1801:lstTaxTreaty'),
			'item16A'       => null !== request('frm1801:Notice') ? request('frm1801:Notice') : '',
			'item16B'       => null !== request('frm1801:Return') ? request('frm1801:Return') : '',
			'item16C'       => null !== request('frm1801:Judicially') ? request('frm1801:Judicially') : '',
			'item16D'       => null !== request('frm1801:PayTax') ? request('frm1801:PayTax') : '',
			'item17A'       => request('frm1801:txt17A'),
			'item17B'       => request('frm1801:txt17B'),
			'item17C'       => request('frm1801:txt17C'),
			'item18A'       => request('frm1801:txt18A'),
			'item18B'       => request('frm1801:txt18B'),
			'item18C'       => request('frm1801:txt18C'),
			'item19A'       => request('frm1801:txt19A'),
			'item19B'       => request('frm1801:txt19B'),
			'item19C'       => request('frm1801:txt19C'),
			'item20A'       => request('frm1801:txt20A'),
			'item20B'       => request('frm1801:txt20B'),
			'item20C'       => request('frm1801:txt20C'),
			'item21A'       => request('frm1801:txt21A'),
			'item21B'       => request('frm1801:txt21B'),
			'item21C'       => request('frm1801:txt21C'),
			'item22A'       => request('frm1801:txt22A'),
			'item22B'       => request('frm1801:txt22B'),
			'item22C'       => request('frm1801:txt22C'),
			'item23A'       => request('frm1801:txt23A'),
			'item23B'       => request('frm1801:txt23B'),
			'item23C'       => request('frm1801:txt23C'),
			'item24'       => request('frm1801:txt24'),
			'item25'       => request('frm1801:txt25'),
			'item26'       => request('frm1801:txt26'),
			'item27_others_a'       => request('frm1801:txtOthers27a'),
			'item27_others_b'       => request('frm1801:txtOthers27b'),
			'item27A'       => request('frm1801:txt27A'),
			'item27B'       => request('frm1801:txt27B'),
			'item28'       => request('frm1801:txt28'),
			'item29'       => request('frm1801:txt29'),
			'item30'       => request('frm1801:txt30'),
			'item31'       => request('frm1801:txt31'),
			'item32A'       => request('frm1801:txt32A'),
			'item32B'       => request('frm1801:txt32B'),
			'item32C'       => request('frm1801:txt32C'),
			'item33'       => request('frm1801:txt33'),
			'item34A'       => request('frm1801:txtSurcharge'),
			'item34B'       => request('frm1801:txtCompromise'),
			'item34C'       => request('frm1801:txtInterest'),
			'item34D'       => request('frm1801:txtTotalPenalties'),
			'item35'       => request('frm1801:txt35'),
    	]);

    	$getForm = tbl_1801::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();
        
        $form = "";
        $trans = "";
        if(request('form_id') != ""){
            $form = tbl_1801::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1801::create($data);
            }else{
                $form = tbl_1801::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_1801_schedule1::where('form_id', $getForm[0]->id)->delete();
        	tbl_1801_schedule2::where('form_id', $getForm[0]->id)->delete();
        	tbl_1801_schedule3::where('form_id', $getForm[0]->id)->delete();
        	tbl_1801_schedule4::where('form_id', $getForm[0]->id)->delete();
        	tbl_1801_schedule5::where('form_id', $getForm[0]->id)->delete();
        }

        if(null !== request('txtOCTSched1')){
        	for ($i=0; $i < count(request('txtOCTSched1')) ; $i++) {
        		$schedule1 = ([
        			'form_id'       => $form->id,
					'oct'       => request('txtOCTSched1')[$i],
					'td'       => request('txtSched1TaxDeclaration')[$i],
					'location'       => request('txtSched1Location')[$i],
					'class'       => request('txtClass')[$i],
					'area'       => request('txtArea')[$i],
					'zonal'       => request('txtZV')[$i],
					'fair'       => request('txtFMV')[$i],
					'conjugal'       => request('txtFMVConjugal')[$i],
					'exclusive'       => request('txtFMVExclusive')[$i],
        		]);

        		tbl_1801_schedule1::create($schedule1);
        	}
        }

        if(null !== request('txtOCTSched1X')){
        	for ($i=0; $i < count(request('txtOCTSched1X')) ; $i++) {
        		$schedule1X = ([
        			'form_id'       => $form->id,
					'oct'       => request('txtOCTSched1X')[$i],
					'td'       => request('txtSched1XTaxDeclaration')[$i],
					'location'       => request('txtSched1XLocation')[$i],
					'class'       => request('txtClassX')[$i],
					'area'       => request('txtAreaX')[$i],
					'zonal'       => request('txtZVX')[$i],
					'fair'       => request('txtFMVX')[$i],
					'conjugal'       => request('txtFMVConjugalX')[$i],
					'exclusive'       => request('txtFMVExclusiveX')[$i],
        		]);

        		tbl_1801_schedule1::create($schedule1X);
        	}
        }

        if(null !== request('txtNameCorp')){
        	for ($i=0; $i < count(request('txtNameCorp')) ; $i++) {
        		$schedule2 = ([
        			'form_id'       => $form->id,
					'name'       => request('txtNameCorp')[$i],
					'stock'       => request('txtStockCert')[$i],
					'shares'       => request('txtShares')[$i],
					'fair'       => request('txtFMVS')[$i],
					'conjugal'       => request('txtFMVConjugal2')[$i],
					'exclusive'       => request('txtFMVExclusive2')[$i],
        		]);
        		tbl_1801_schedule2::create($schedule2);
        	}
        }

        if(null !== request('txtParticulars')){
        	for ($i=0; $i < count(request('txtParticulars')) ; $i++) {
        		$schedule3 = ([
        			'form_id'       => $form->id,
					'particulars'       => request('txtParticulars')[$i],
					'exclusive'       => request('txtFMVExclusive3')[$i],
					'conjugal'       => request('txtFMVConjugal3')[$i],
        		]);
        		tbl_1801_schedule3::create($schedule3);
        	}
        }

        if(null !== request('txtParticulars4')){
        	for ($i=0; $i < count(request('txtParticulars4')) ; $i++) {
        		$schedule4 = ([
        			'form_id'       => $form->id,
					'particulars'       => request('txtParticulars4')[$i],
					'exclusive'       => request('txtFMVExclusive4')[$i],
					'conjugal'       => request('txtFMVConjugal4')[$i],
        		]);
        		tbl_1801_schedule4::create($schedule4);
        	}
        }

        if(request('frm1801:txtSc5TotalConjugal') != '0.00'){
        	$schedule5 = ([
        		'form_id'       => $form->id,
				'exclusiveA1'       => request('frm1801:txtSc5Conjugal1'),
				'conjugalB1'       => request('frm1801:txtSc5Exclusive1'),
				'exclusiveA2'       => request('frm1801:txtSc5Conjugal2'),
				'conjugalB2'       => request('frm1801:txtSc5Exclusive2'),
				'exclusiveA3'       => request('frm1801:txtSc5Conjugal3'),
				'conjugalB3'       => request('frm1801:txtSc5Exclusive3'),
				'exclusiveA4'       => request('frm1801:txtSc5Conjugal4'),
				'conjugalB4'       => request('frm1801:txtSc5Exclusive4'),
				'exclusiveA5'       => request('frm1801:txtSc5Conjugal5'),
				'conjugalB5'       => request('frm1801:txtSc5Exclusive5'),
				'exclusiveA6'       => request('frm1801:txtSc5Conjugal6'),
				'conjugalB6'       => request('frm1801:txtSc5Exclusive6'),
				'exclusiveA7'       => request('frm1801:txtSc5Conjugal7'),
				'conjugalB7'       => request('frm1801:txtSc5Exclusive7'),
				'desc'				=> request('frm1801:txtSc5Desc8'),
				'exclusiveA8'       => request('frm1801:txtSc5Conjugal8'),
				'conjugalB8'       => request('frm1801:txtSc5Exclusive8'),
				'exclusiveTotalA'       => request('frm1801:txtSc5TotalConjugal'),
				'conjugalTotalB'       => request('frm1801:txtSc5TotalExclusive'),
        	]);
        	tbl_1801_schedule5::create($schedule5);
        }

        $amendedRtn_1 = "false";
        $amendedRtn_2 = "false";

        if(request('frm1801:amendedRtn') == "Y"){
        	$amendedRtn_1 = "true";
        }else if(request('frm1801:amendedRtn') == "N"){
        	$amendedRtn_2 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm1801:txtTaxpayer'));

        $executorName =  rawurlencode(request('frm1801:txtExecutor'));
 
        $residence = rawurlencode(request('frm1801:txtResidence'));

        $address = rawurlencode(request('frm1801:txtAddress'));

        $rAddress = rawurlencode(request('frm1801:txtRAddress'));

        $optTreaty1 = "false";
        $optTreaty2 = "false";

        if(request('frm1801:optTreaty') == "Y"){
        	$optTreaty1 = "true";
        }else if(request('frm1801:optTreaty') == "N"){
        	$optTreaty2 = "true";
        }

        $Notice1 = "false";
        $Notice2 = "false";
        if(null !==  request('frm1801:Notice')){
        	if(request('frm1801:Notice') == "Y"){
	        	$Notice1 = "true";
	        }else if(request('frm1801:Notice') == "N"){
	        	$Notice2 = "true";
	        }
        }

        $Return1 = "false";
        $Return2 = "false";
        if(null !==  request('frm1801:Return')){
        	if(request('frm1801:Return') == "Y"){
	        	$Return1 = "true";
	        }else if(request('frm1801:Return') == "N"){
	        	$Return2 = "true";
	        }
        }

        $Judicially1 = "false";
        $Judicially2 = "false";
        if(null !==  request('frm1801:Judicially')){
        	if(request('frm1801:Judicially') == "Y"){
	        	$Judicially1 = "true";
	        }else if(request('frm1801:Judicially') == "N"){
	        	$Judicially2 = "true";
	        }
        }

        $PayTax1 = "false";
        $PayTax2 = "false";
        if(null !==  request('frm1801:PayTax')){
        	if(request('frm1801:PayTax') == "Y"){
	        	$PayTax1 = "true";
	        }else if(request('frm1801:PayTax') == "N"){
	        	$PayTax2 = "true";
	        }
        }

        $schedule1 = "";
        if(null !== request('txtOCTSched1')){
        	for ($i=0; $i < count(request('txtOCTSched1')) ; $i++) {
        		$schedule1 .="<div>chxSched1".$i."=".(null !== request('chxSched1'.$i.'') ? 'true' : 'false')."chxSched1".$i."=</div>	
            <div>txtOCTSched1".$i."=".request('txtOCTSched1')[$i]."txtOCTSched1".$i."=</div>	
            <div>txtSched1TaxDeclaration".$i."=".request('txtSched1TaxDeclaration')[$i]."txtSched1TaxDeclaration".$i."=</div>	
            <div>txtSched1Location".$i."=".request('txtSched1Location')[$i]."txtSched1Location".$i."=</div>	
            <div>txtClass".$i."=".request('txtClass')[$i]."txtClass".$i."=</div>	
            <div>txtArea".$i."=".request('txtArea')[$i]."txtArea".$i."=</div>	
            <div>txtZV".$i."=".request('txtZV')[$i]."txtZV".$i."=</div>	
            <div>txtFMV".$i."=".request('txtFMV')[$i]."txtFMV".$i."=</div>	
            <div>txtFMVConjugal".$i."=".request('txtFMVConjugal')[$i]."txtFMVConjugal".$i."=</div>	
            <div>txtFMVExclusive".$i."=".request('txtFMVExclusive')[$i]."txtFMVExclusive".$i."=</div>	
            "; 
        	}
        }

        $schedule2 = "";
        if(null !== request('txtNameCorp')){
        	for ($i=0; $i < count(request('txtNameCorp')) ; $i++) {
        		$schedule2 .= "<div>chxSched2".$i."=".(null !== request('chxSched2'.$i.'') ? 'true' : 'false')."chxSched2".$i."=</div>	
            <div>txtNameCorp".$i."=".request('txtNameCorp')[$i]."txtNameCorp".$i."=</div>	
            <div>txtStockCert".$i."=".request('txtStockCert')[$i]."txtStockCert".$i."=</div>	
            <div>txtShares".$i."=".request('txtShares')[$i]."txtShares".$i."=</div>	
            <div>txtFMVS".$i."=".request('txtFMVS')[$i]."txtFMVS".$i."=</div>	
            <div>txtFMVConjugal2".$i."=".request('txtFMVConjugal2')[$i]."txtFMVConjugal2".$i."=</div>	
            <div>txtFMVExclusive2".$i."=".request('txtFMVExclusive2')[$i]."txtFMVExclusive2".$i."=</div>	
            ";
        	}
        }

        $schedule3 = "";
        if(null !== request('txtParticulars')){
        	for ($i=0; $i < count(request('txtParticulars')) ; $i++) {
        		$schedule3 .= "<div>chxSched3".$i."=".(null !== request('chxSched3'.$i.'') ? 'true' : 'false')."chxSched3".$i."=</div>	
            <div>txtParticulars".$i."=".request('txtParticulars')[$i]."txtParticulars".$i."=</div>	
            <div>txtFMVExclusive3".$i."=".request('txtFMVExclusive3')[$i]."txtFMVExclusive3".$i."=</div>	
            <div>txtFMVConjugal3".$i."=".request('txtFMVConjugal3')[$i]."txtFMVConjugal3".$i."=</div>	
            ";
        	}
        }

        $schedule1X = "";
        if(null !== request('txtOCTSched1X')){
        	for ($i=0; $i < count(request('txtOCTSched1X')) ; $i++) {
        		$schedule1X .= "<div>chxSched1X".$i."=".(null !== request('chxSched1X'.$i.'') ? 'true' : 'false')."chxSched1X".$i."=</div>	
            <div>txtOCTSched1X".$i."=".request('txtOCTSched1X')[$i]."txtOCTSched1X".$i."=</div>	
            <div>txtSched1XTaxDeclaration".$i."=".request('txtSched1XTaxDeclaration')[$i]."txtSched1XTaxDeclaration".$i."=</div>	
            <div>txtSched1XLocation".$i."=".request('txtSched1XLocation')[$i]."txtSched1XLocation".$i."=</div>	
            <div>txtClassX".$i."=".request('txtClassX')[$i]."txtClassX".$i."=</div>	
            <div>txtAreaX".$i."=".request('txtAreaX')[$i]."txtAreaX".$i."=</div>	
            <div>txtZVX".$i."=".request('txtZVX')[$i]."txtZVX".$i."=</div>	
            <div>txtFMVX".$i."=".request('txtFMVX')[$i]."txtFMVX".$i."=</div>	
            <div>txtFMVConjugalX".$i."=".request('txtFMVConjugalX')[$i]."txtFMVConjugalX".$i."=</div>	
            <div>txtFMVExclusiveX".$i."=".request('txtFMVExclusiveX')[$i]."txtFMVExclusiveX".$i."=</div>	
            ";
        	}
        }

        $schedule4 = "";
        if(null !== request('txtParticulars4')){
        	for ($i=0; $i < count(request('txtParticulars4')) ; $i++) {
        		$schedule4 .= "<div>chxSched4".$i."=".(null !== request('chxSched4'.$i.'') ? 'true' : 'false')."chxSched4".$i."=</div>	
            <div>txtParticulars4".$i."=".request('txtParticulars4')[$i]."txtParticulars4".$i."=</div>	
            <div>txtFMVExclusive4".$i."=".request('txtFMVExclusive4')[$i]."txtFMVExclusive4".$i."=</div>	
            <div>txtFMVConjugal4".$i."=".request('txtFMVConjugal4')[$i]."txtFMVConjugal4".$i."=</div>	
            ";
        	}
        }
        $xmlData ="<?xml version='1.0'?>	
            <div>frm1801:txtDateMonth=".request('frm1801:txtDateMonth')."frm1801:txtDateMonth=</div>	
            <div>frm1801:txtDateDay=".request('frm1801:txtDateDay')."frm1801:txtDateDay=</div>	
            <div>frm1801:txtDateYear=".request('frm1801:txtDateYear')."frm1801:txtDateYear=</div>	
            <div>frm1801:amendedRtn_1=".$amendedRtn_1."frm1801:amendedRtn_1=</div>	
            <div>frm1801:amendedRtn_2=".$amendedRtn_2."frm1801:amendedRtn_2=</div>	
            <div>frm1801:txtSheets=".request('frm1801:txtSheets')."frm1801:txtSheets=</div>	
            <div>frm1801:txt4=".request('frm1801:txt4')."frm1801:txt4=</div>	
            <div>frm1801:txtTIN1=".request('frm1801:txtTIN1')."frm1801:txtTIN1=</div>	
            <div>frm1801:txtTIN2=".request('frm1801:txtTIN2')."frm1801:txtTIN2=</div>	
            <div>frm1801:txtTIN3=".request('frm1801:txtTIN3')."frm1801:txtTIN3=</div>	
            <div>frm1801:txtBranchCode=".request('frm1801:txtBranchCode')."frm1801:txtBranchCode=</div>	
            <div>frm1801:txtRDOCode=".request('frm1801:txtRDOCode')."frm1801:txtRDOCode=</div>	
            <div>frm1801:txtTINE1=".request('frm1801:txtTINE1')."frm1801:txtTINE1=</div>	
            <div>frm1801:txtTINE2=".request('frm1801:txtTINE2')."frm1801:txtTINE2=</div>	
            <div>frm1801:txtTINE3=".request('frm1801:txtTINE3')."frm1801:txtTINE3=</div>	
            <div>frm1801:txtBranchCodeE=".request('frm1801:txtBranchCodeE')."frm1801:txtBranchCodeE=</div>	
            <div>frm1801:txtTaxpayer=".$taxPayerName."frm1801:txtTaxpayer=</div>	
            <div>frm1801:txtExecutor=".$executorName."frm1801:txtExecutor=</div>	
            <div>frm1801:txtResidence=".$residence."frm1801:txtResidence=</div>	
            <div>frm1801:txtAddress=".$address."frm1801:txtAddress=</div>	
            <div>frm1801:txtZip=".request('frm1801:txtZip')."frm1801:txtZip=</div>	
            <div>frm1801:txtTelephone=".request('frm1801:txtTelephone')."frm1801:txtTelephone=</div>	
            <div>frm1801:txtRAddress=".$rAddress."frm1801:txtRAddress=</div>	
            <div>frm1801:optTreaty:_1=".$optTreaty1."frm1801:optTreaty:_1=</div>	
            <div>frm1801:optTreaty:_2=".$optTreaty2."frm1801:optTreaty:_2=</div>	
            <div>frm1801:lstTaxTreaty=".request('frm1801:lstTaxTreaty')."frm1801:lstTaxTreaty=</div>	
            <div>frm1801:Notice:_1=".$Notice1."frm1801:Notice:_1=</div>	
            <div>frm1801:Notice:_2=".$Notice2."frm1801:Notice:_2=</div>	
            <div>frm1801:Judicially:_1=".$Judicially1."frm1801:Judicially:_1=</div>	
            <div>frm1801:Judicially:_2=".$Judicially2."frm1801:Judicially:_2=</div>	
            <div>frm1801:Return:_1=".$Return1."frm1801:Return:_1=</div>	
            <div>frm1801:Return:_2=".$Return2."frm1801:Return:_2=</div>	
            <div>frm1801:PayTax:_1=".$PayTax1."frm1801:PayTax:_1=</div>	
            <div>frm1801:PayTax:_2=".$PayTax2."frm1801:PayTax:_2=</div>	
            <div>frm1801:txt17A=".request('frm1801:txt17A')."frm1801:txt17A=</div>	
            <div>frm1801:txt17B=".request('frm1801:txt17B')."frm1801:txt17B=</div>	
            <div>frm1801:txt17C=".request('frm1801:txt17C')."frm1801:txt17C=</div>	
            <div>frm1801:txt18A=".request('frm1801:txt18A')."frm1801:txt18A=</div>	
            <div>frm1801:txt18B=".request('frm1801:txt18B')."frm1801:txt18B=</div>	
            <div>frm1801:txt18C=".request('frm1801:txt18C')."frm1801:txt18C=</div>	
            <div>frm1801:txt19A=".request('frm1801:txt19A')."frm1801:txt19A=</div>	
            <div>frm1801:txt19B=".request('frm1801:txt19B')."frm1801:txt19B=</div>	
            <div>frm1801:txt19C=".request('frm1801:txt19C')."frm1801:txt19C=</div>	
            <div>frm1801:txt20A=".request('frm1801:txt20A')."frm1801:txt20A=</div>	
            <div>frm1801:txt20B=".request('frm1801:txt20B')."frm1801:txt20B=</div>	
            <div>frm1801:txt20C=".request('frm1801:txt20C')."frm1801:txt20C=</div>	
            <div>frm1801:txt21A=".request('frm1801:txt21A')."frm1801:txt21A=</div>	
            <div>frm1801:txt21B=".request('frm1801:txt21B')."frm1801:txt21B=</div>	
            <div>frm1801:txt21C=".request('frm1801:txt21C')."frm1801:txt21C=</div>	
            <div>frm1801:txt22A=".request('frm1801:txt22A')."frm1801:txt22A=</div>	
            <div>frm1801:txt22B=".request('frm1801:txt22B')."frm1801:txt22B=</div>	
            <div>frm1801:txt22C=".request('frm1801:txt22C')."frm1801:txt22C=</div>	
            <div>frm1801:txt23A=".request('frm1801:txt23A')."frm1801:txt23A=</div>	
            <div>frm1801:txt23B=".request('frm1801:txt23B')."frm1801:txt23B=</div>	
            <div>frm1801:txt23C=".request('frm1801:txt23C')."frm1801:txt23C=</div>	
            <div>frm1801:txt24=".request('frm1801:txt24')."frm1801:txt24=</div>	
            <div>frm1801:txt25=".request('frm1801:txt25')."frm1801:txt25=</div>	
            <div>frm1801:txt26=".request('frm1801:txt26')."frm1801:txt26=</div>	
            <div>frm1801:txtOthers27a=".request('frm1801:txtOthers27a')."frm1801:txtOthers27a=</div>	
            <div>frm1801:txt27A=".request('frm1801:txt27A')."frm1801:txt27A=</div>	
            <div>frm1801:txtOthers27b=".request('frm1801:txtOthers27b')."frm1801:txtOthers27b=</div>	
            <div>frm1801:txt27B=".request('frm1801:txt27B')."frm1801:txt27B=</div>	
            <div>frm1801:txt28=".request('frm1801:txt28')."frm1801:txt28=</div>	
            <div>frm1801:txt29=".request('frm1801:txt29')."frm1801:txt29=</div>	
            <div>frm1801:txt30=".request('frm1801:txt30')."frm1801:txt30=</div>	
            <div>frm1801:txt31=".request('frm1801:txt31')."frm1801:txt31=</div>	
            <div>frm1801:txt32A=".request('frm1801:txt32A')."frm1801:txt32A=</div>	
            <div>frm1801:txt32B=".request('frm1801:txt32B')."frm1801:txt32B=</div>	
            <div>frm1801:txt32C=".request('frm1801:txt32C')."frm1801:txt32C=</div>	
            <div>frm1801:txt33=".request('frm1801:txt33')."frm1801:txt33=</div>	
            <div>frm1801:txtSurcharge=".request('frm1801:txtSurcharge')."frm1801:txtSurcharge=</div>	
            <div>frm1801:txtCompromise=".request('frm1801:txtCompromise')."frm1801:txtCompromise=</div>	
            <div>frm1801:txtInterest=".request('frm1801:txtInterest')."frm1801:txtInterest=</div>	
            <div>frm1801:txtTotalPenalties=".request('frm1801:txtTotalPenalties')."frm1801:txtTotalPenalties=</div>	
            <div>frm1801:txt35=".request('frm1801:txt35')."frm1801:txt35=</div>	
            ".$schedule1."<div>frm1801:totalSch1AmountConj=".request('frm1801:totalSch1AmountConj')."frm1801:totalSch1AmountConj=</div>	
            <div>frm1801:totalSch1AmountExc=".request('frm1801:totalSch1AmountExc')."frm1801:totalSch1AmountExc=</div>	
            ".$schedule1X."<div>frm1801:totalSch1XAmountConj=".request('frm1801:totalSch1XAmountConj')."frm1801:totalSch1XAmountConj=</div>	
            <div>frm1801:totalSch1XAmountExc=".request('frm1801:totalSch1XAmountExc')."frm1801:totalSch1XAmountExc=</div>	
            ".$schedule2."<div>frm1801:totalSch2AmountConj=".request('frm1801:totalSch2AmountConj')."frm1801:totalSch2AmountConj=</div>	
            <div>frm1801:totalSch2AmountExc=".request('frm1801:totalSch2AmountExc')."frm1801:totalSch2AmountExc=</div>	
            ".$schedule3."<div>frm1801:totalSch3AmountExc=".request('frm1801:totalSch3AmountExc')."frm1801:totalSch3AmountExc=</div>	
            <div>frm1801:totalSch3AmountConj=".request('frm1801:totalSch3AmountConj')."frm1801:totalSch3AmountConj=</div>	
            ".$schedule4."<div>frm1801:totalSch4AmountExc=".request('frm1801:totalSch4AmountExc')."frm1801:totalSch4AmountExc=</div>	
            <div>frm1801:totalSch4AmountConj=".request('frm1801:totalSch4AmountConj')."frm1801:totalSch4AmountConj=</div>	
            <div>frm1801:txtSc5Conjugal1=".request('frm1801:txtSc5Conjugal1')."frm1801:txtSc5Conjugal1=</div>	
            <div>frm1801:txtSc5Exclusive1=".request('frm1801:txtSc5Exclusive1')."frm1801:txtSc5Exclusive1=</div>	
            <div>frm1801:txtSc5Conjugal2=".request('frm1801:txtSc5Conjugal2')."frm1801:txtSc5Conjugal2=</div>	
            <div>frm1801:txtSc5Exclusive2=".request('frm1801:txtSc5Exclusive2')."frm1801:txtSc5Exclusive2=</div>	
            <div>frm1801:txtSc5Conjugal3=".request('frm1801:txtSc5Conjugal3')."frm1801:txtSc5Conjugal3=</div>	
            <div>frm1801:txtSc5Exclusive3=".request('frm1801:txtSc5Exclusive3')."frm1801:txtSc5Exclusive3=</div>	
            <div>frm1801:txtSc5Conjugal4=".request('frm1801:txtSc5Conjugal4')."frm1801:txtSc5Conjugal4=</div>	
            <div>frm1801:txtSc5Exclusive4=".request('frm1801:txtSc5Exclusive4')."frm1801:txtSc5Exclusive4=</div>	
            <div>frm1801:txtSc5Conjugal5=".request('frm1801:txtSc5Conjugal5')."frm1801:txtSc5Conjugal5=</div>	
            <div>frm1801:txtSc5Exclusive5=".request('frm1801:txtSc5Exclusive5')."frm1801:txtSc5Exclusive5=</div>	
            <div>frm1801:txtSc5Conjugal6=".request('frm1801:txtSc5Conjugal6')."frm1801:txtSc5Conjugal6=</div>	
            <div>frm1801:txtSc5Exclusive6=".request('frm1801:txtSc5Exclusive6')."frm1801:txtSc5Exclusive6=</div>	
            <div>frm1801:txtSc5Conjugal7=".request('frm1801:txtSc5Conjugal7')."frm1801:txtSc5Conjugal7=</div>	
            <div>frm1801:txtSc5Exclusive7=".request('frm1801:txtSc5Exclusive7')."frm1801:txtSc5Exclusive7=</div>	
            <div>frm1801:txtSc5Desc8=".request('frm1801:txtSc5Desc8')."frm1801:txtSc5Desc8=</div>	
            <div>frm1801:txtSc5Conjugal8=".request('frm1801:txtSc5Conjugal8')."frm1801:txtSc5Conjugal8=</div>	
            <div>frm1801:txtSc5Exclusive8=".request('frm1801:txtSc5Exclusive8')."frm1801:txtSc5Exclusive8=</div>	
            <div>frm1801:txtSc5TotalConjugal=".request('frm1801:txtSc5TotalConjugal')."frm1801:txtSc5TotalConjugal=</div>	
            <div>frm1801:txtSc5TotalExclusive=".request('frm1801:txtSc5TotalExclusive')."frm1801:txtSc5TotalExclusive=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

       	$tin = request('frm1801:txtTIN1').request('frm1801:txtTIN2').request('frm1801:txtTIN3').request('frm1801:txtBranchCode');

        $getReturnPeriod = tbl_1801::where('company_id',  request('company'))
                            ->where('item1A', request('frm1801:txtDateMonth'))
                            ->where('item1B', request('frm1801:txtDateDay'))
                            ->where('item1C', request('frm1801:txtDateYear'))
                            ->count();

        $returnPeriod = request('frm1801:txtDateMonth')."/".request('frm1801:txtDateDay')."/".request('frm1801:txtDateYear');
                           
        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm1801:txtDateMonth').request('frm1801:txtDateDay').request('frm1801:txtDateYear');
        }else{
            if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1801')
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

            $xmlReturnPeriod = request('frm1801:txtDateMonth').request('frm1801:txtDateDay').request('frm1801:txtDateYear').$ext;
        }
        $filename = $tin."-1801-".$xmlReturnPeriod.'.xml';

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
                'form'          => '1801',
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
                            ->where('form', '1801')
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
                            ->where('form', '1801')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1801::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1801')
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
        $data = tbl_1801::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1801')
                            ->get();
        
        return view('forms.BIR-Form 1801',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

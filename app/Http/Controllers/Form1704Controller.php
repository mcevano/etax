<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1704;
use App\tbl_1704_schedule1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1704Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1704s')){

            }else{
            	Schema::connection('mysql2')->create('tbl_1704s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1')->nullable();
                    $table->string('item2A')->nullable();
                    $table->string('item2B')->nullable();
                    $table->string('item3')->nullable();
                    $table->string('item4')->nullable();
                    $table->string('item5')->nullable();
                    $table->string('item12A_1')->nullable();
                    $table->string('item12A_2')->nullable();
                    $table->string('item12A_3')->nullable();
                    $table->string('item12B_1')->nullable();
                    $table->string('item12B_2')->nullable();
                    $table->string('item12B_3')->nullable();
                    $table->text('item13');
                    $table->text('item14A')->nullable();
                    $table->text('item14B');
                    $table->text('item14C')->nullable();
                    $table->text('item14D');
                    $table->text('item14E')->nullable();
                    $table->text('item14F');
                    $table->text('item14G')->nullable();
                    $table->text('item14H');
                    $table->text('item14I')->nullable();
                    $table->text('item14J');
                    $table->text('item14K')->nullable();
                    $table->text('item14L');
                    $table->text('item14M')->nullable();
                    $table->text('item14N');
                    $table->text('item14O')->nullable();
                    $table->text('item14P');
                    $table->text('item14Q')->nullable();
                    $table->text('item14R');
                    $table->text('item14S')->nullable();
                    $table->text('item14T');
                    $table->text('item15A')->nullable();
                    $table->text('item15B');
                    $table->text('item15C')->nullable();
                    $table->text('item15D');
                    $table->text('item15E')->nullable();
                    $table->text('item15F');
                    $table->text('item15G')->nullable();
                    $table->text('item15H');
                    $table->text('item15I')->nullable();
                    $table->text('item15J');
                    $table->text('item15K')->nullable();
                    $table->text('item15L');
                    $table->text('item15M')->nullable();
                    $table->text('item15N');
                    $table->text('item15O')->nullable();
                    $table->text('item15P');
                    $table->text('item15Q')->nullable();
                    $table->text('item15R');
                    $table->text('item15S')->nullable();
                    $table->text('item15T');
                    $table->text('item16A')->nullable();
                    $table->text('item16B');
                    $table->text('item16C')->nullable();
                    $table->text('item16D');
                    $table->text('item16E')->nullable();
                    $table->text('item16F');
                    $table->text('item16G')->nullable();
                    $table->text('item16H');
                    $table->text('item16I')->nullable();
                    $table->text('item16J');
                    $table->text('item16K')->nullable();
                    $table->text('item16L');
                    $table->text('item16M')->nullable();
                    $table->text('item16N');
                    $table->text('item16O')->nullable();
                    $table->text('item16P');
                    $table->text('item16Q')->nullable();
                    $table->text('item16R');
                    $table->text('item16S')->nullable();
                    $table->text('item16T');
                    $table->text('item17A');
                    $table->text('item17B');
                    $table->text('item18');
                    $table->text('item19');
                    $table->text('item20');
                    $table->text('item21A');
                    $table->text('item21B');
                    $table->text('item22');
                    $table->text('item23');
                    $table->text('item24');
                    $table->text('item25');
                    $table->text('item26');
                    $table->text('item27A');
                    $table->text('item27B');
                    $table->text('item27C');
                    $table->text('item27D');
                    $table->text('item28');
                   	$table->text('item31')->nullable();
                    $table->text('item32')->nullable();
                    $table->text('item33A')->nullable();
                    $table->text('item33B')->nullable();
                    $table->text('item33C')->nullable();
                    $table->text('item34')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1704_schedule1s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item1');
					 $table->text('item2');
					 $table->text('item3');
					 $table->text('item4');
					 $table->text('item5');
					 $table->text('item6');
					 $table->text('item7');
					 $table->text('item8');
					 $table->text('item9');
                     $table->timestamps();
                });

            }
        	return view('forms.BIR-Form 1704',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_1704::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1704')
                            ->get();
        
        	return view('forms.BIR-Form 1704',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);

    	$data = ([
    		'form_no'   => request('form_no'),
			'company_id'   => request('company'),
			'item1'   => request('frm1704:itemFiscalStartMonth'),
			'item2A'   => request('frm1704:monthEnd'),
			'item2B'   => request('frm1704:txtYearEnded'),
			'item3'   => request('frm1704:amendedRtn'),
			'item4'   => request('frm1704:txtSheets'),
			'item5'   => request('frm1704:txtAtc'),
			'item12A_1'   => request('frm1704:txt12AMM'),
			'item12A_2'   => request('frm1704:txt12ADD'),
			'item12A_3'   => request('frm1704:txt12AYYYY'),
			'item12B_1'   => request('frm1704:txt12BMM'),
			'item12B_2'   => request('frm1704:txt12BDD'),
			'item12B_3'   => request('frm1704:txt12BYYYY'),
			'item13'   => request('frm1704:txt13'),
			'item14A'   => request('frm1704:txt14A'),
			'item14B'   => request('frm1704:txt14B'),
			'item14C'   => request('frm1704:txt14C'),
			'item14D'   => request('frm1704:txt14D'),
			'item14E'   => request('frm1704:txt14E'),
			'item14F'   => request('frm1704:txt14F'),
			'item14G'   => request('frm1704:txt14G'),
			'item14H'   => request('frm1704:txt14H'),
			'item14I'   => request('frm1704:txt14I'),
			'item14J'   => request('frm1704:txt14J'),
			'item14K'   => request('frm1704:txt14K'),
			'item14L'   => request('frm1704:txt14L'),
			'item14M'   => request('frm1704:txt14M'),
			'item14N'   => request('frm1704:txt14N'),
			'item14O'   => request('frm1704:txt14O'),
			'item14P'   => request('frm1704:txt14P'),
			'item14Q'   => request('frm1704:txt14Q'),
			'item14R'   => request('frm1704:txt14R'),
			'item14S'   => request('frm1704:txt14S'),
			'item14T'   => request('frm1704:txt14T'),
			'item15A'   => request('frm1704:txt15A'),
			'item15B'   => request('frm1704:txt15B'),
			'item15C'   => request('frm1704:txt15C'),
			'item15D'   => request('frm1704:txt15D'),
			'item15E'   => request('frm1704:txt15E'),
			'item15F'   => request('frm1704:txt15F'),
			'item15G'   => request('frm1704:txt15G'),
			'item15H'   => request('frm1704:txt15H'),
			'item15I'   => request('frm1704:txt15I'),
			'item15J'   => request('frm1704:txt15J'),
			'item15K'   => request('frm1704:txt15K'),
			'item15L'   => request('frm1704:txt15L'),
			'item15M'   => request('frm1704:txt15M'),
			'item15N'   => request('frm1704:txt15N'),
			'item15O'   => request('frm1704:txt15O'),
			'item15P'   => request('frm1704:txt15P'),
			'item15Q'   => request('frm1704:txt15Q'),
			'item15R'   => request('frm1704:txt15R'),
			'item15S'   => request('frm1704:txt15S'),
			'item15T'   => request('frm1704:txt15T'),
			'item16A'   => request('frm1704:txt16A'),
			'item16B'   => request('frm1704:txt16B'),
			'item16C'   => request('frm1704:txt16C'),
			'item16D'   => request('frm1704:txt16D'),
			'item16E'   => request('frm1704:txt16E'),
			'item16F'   => request('frm1704:txt16F'),
			'item16G'   => request('frm1704:txt16G'),
			'item16H'   => request('frm1704:txt16H'),
			'item16I'   => request('frm1704:txt16I'),
			'item16J'   => request('frm1704:txt16J'),
			'item16K'   => request('frm1704:txt16K'),
			'item16L'   => request('frm1704:txt16L'),
			'item16M'   => request('frm1704:txt16M'),
			'item16N'   => request('frm1704:txt16N'),
			'item16O'   => request('frm1704:txt16O'),
			'item16P'   => request('frm1704:txt16P'),
			'item16Q'   => request('frm1704:txt16Q'),
			'item16R'   => request('frm1704:txt16R'),
			'item16S'   => request('frm1704:txt16S'),
			'item16T'   => request('frm1704:txt16T'),
			'item17A'   => request('frm1704:txt17A'),
			'item17B'   => request('frm1704:txt17B'),
			'item18'   => request('frm1704:txt18'),
			'item19'   => request('frm1704:txt19'),
			'item20'   => request('frm1704:txt20'),
			'item21A'   => request('frm1704:txt21A'),
			'item21B'   => request('frm1704:txt21B'),
			'item22'   => request('frm1704:txt22'),
			'item23'   => request('frm1704:txt23'),
			'item24'   => request('frm1704:txt24'),
			'item25'   => request('frm1704:txt25'),
			'item26'   => request('frm1704:txt26'),
			'item27A'   => request('frm1704:txt27A'),
			'item27B'   => request('frm1704:txt27B'),
			'item27C'   => request('frm1704:txt27C'),
			'item27D'   => request('frm1704:txt27D'),
			'item28'   => request('frm1704:txt28'),
			'item31'   => request('frm1704:txt29'),
			'item32'   => request('frm1704:txt30'),
			'item33A'   => request('frm1704:txt31Day'),
			'item33B'   => request('frm1704:txt31Month'),
			'item33C'   => request('frm1704:txt31Year'),
			'item34'   => request('frm1704:txt32'),
    	]);

		$getForm = tbl_1704::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();
        
        $form = "";
        $trans = "";
        if(request('form_id') != ""){
            $form = tbl_1704::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1704::create($data);
            }else{
                $form = tbl_1704::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_1704_schedule1::where('form_id', $getForm[0]->id)->delete();
        }

        $schedule1 = ([
        	'form_id'   => $form->id,
			'item1'   => request('frm1704:sched1Txt1'),
			'item2'   => request('frm1704:sched1Txt2'),
			'item3'   => request('frm1704:sched1Txt3'),
			'item4'   => request('frm1704:sched1Txt4'),
			'item5'   => request('frm1704:sched1Txt5'),
			'item6'   => request('frm1704:sched1Txt6'),
			'item7'   => request('frm1704:sched1Txt7'),
			'item8'   => request('frm1704:sched1Txt8'),
			'item9'   => request('frm1704:sched1Txt9'),
        ]);

        tbl_1704_schedule1::create($schedule1);

        $itemFiscalStartMonth_1 = "false";
        $itemFiscalStartMonth_2 = "false";
        if(request('frm1704:itemFiscalStartMonth') == 'C'){
        	$itemFiscalStartMonth_1 = "true";
        }else if(request('frm1704:itemFiscalStartMonth') == 'F'){
        	$itemFiscalStartMonth_2 = "true";
        }

        $amendedRtn_1 = "false";
        $amendedRtn_2 = "false";
        if(request('frm1704:amendedRtn') == 'Y'){
        	$amendedRtn_1 = "true";
        }else if(request('frm1704:amendedRtn') == 'N'){
        	$amendedRtn_2 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm1704:txtName'));

        $address = rawurlencode(request('frm1704:txtAddress'));

        $lineOfBusiness =  rawurlencode(request('frm1704:txtLineBus'));

        $xmlData = "<?xml version='1.0'?>	
            <div>frm1704:itemFiscalStartMonth:_1=".$itemFiscalStartMonth_1."frm1704:itemFiscalStartMonth:_1=</div>	
            <div>frm1704:itemFiscalStartMonth:_2=".$itemFiscalStartMonth_2."frm1704:itemFiscalStartMonth:_2=</div>	
            <div>frm1704:amendedRtn_1=".$amendedRtn_1."frm1704:amendedRtn_1=</div>	
            <div>frm1704:amendedRtn_2=".$amendedRtn_2."frm1704:amendedRtn_2=</div>	
            <div>frm1704:txtSheets=".request('frm1704:txtSheets')."frm1704:txtSheets=</div>	
            <div>frm1704:txtAtc=".request('frm1704:txtAtc')."frm1704:txtAtc=</div>	
            <div>frm1704:monthEnd=".request('frm1704:monthEnd')."frm1704:monthEnd=</div>	
            <div>frm1704:txtYearEnded=".request('frm1704:txtYearEnded')."frm1704:txtYearEnded=</div>	
            <div>frm1704:txtTin1=".request('frm1704:txtTin1')."frm1704:txtTin1=</div>	
            <div>frm1704:txtTin2=".request('frm1704:txtTin2')."frm1704:txtTin2=</div>	
            <div>frm1704:txtTin3=".request('frm1704:txtTin3')."frm1704:txtTin3=</div>	
            <div>frm1704:txtBranch=".request('frm1704:txtBranch')."frm1704:txtBranch=</div>	
            <div>frm1704:txtRDOCode=".request('frm1704:txtRDOCode')."frm1704:txtRDOCode=</div>	
            <div>frm1704:txtLineBus=".$lineOfBusiness."frm1704:txtLineBus=</div>	
            <div>frm1704:txtName=".$taxPayerName."frm1704:txtName=</div>	
            <div>frm1704:txtAddress=".$address."frm1704:txtAddress=</div>	
            <div>frm1704:txtZipCode=".request('frm1704:txtZipCode')."frm1704:txtZipCode=</div>	
            <div>frm1704:txt12AMM=".request('frm1704:txt12AMM')."frm1704:txt12AMM=</div>	
            <div>frm1704:txt12ADD=".request('frm1704:txt12ADD')."frm1704:txt12ADD=</div>	
            <div>frm1704:txt12AYYYY=".request('frm1704:txt12AYYYY')."frm1704:txt12AYYYY=</div>	
            <div>frm1704:txt12BMM=".request('frm1704:txt12BMM')."frm1704:txt12BMM=</div>	
            <div>frm1704:txt12BDD=".request('frm1704:txt12BDD')."frm1704:txt12BDD=</div>	
            <div>frm1704:txt12BYYYY=".request('frm1704:txt12BYYYY')."frm1704:txt12BYYYY=</div>	
            <div>frm1704:txt13=".request('frm1704:txt13')."frm1704:txt13=</div>	
            <div>frm1704:txt14A=".request('frm1704:txt14A')."frm1704:txt14A=</div>	
            <div>frm1704:txt14B=".request('frm1704:txt14B')."frm1704:txt14B=</div>	
            <div>frm1704:txt14C=".request('frm1704:txt14C')."frm1704:txt14C=</div>	
            <div>frm1704:txt14D=".request('frm1704:txt14D')."frm1704:txt14D=</div>	
            <div>frm1704:txt14E=".request('frm1704:txt14E')."frm1704:txt14E=</div>	
            <div>frm1704:txt14F=".request('frm1704:txt14F')."frm1704:txt14F=</div>	
            <div>frm1704:txt14G=".request('frm1704:txt14G')."frm1704:txt14G=</div>	
            <div>frm1704:txt14H=".request('frm1704:txt14H')."frm1704:txt14H=</div>	
            <div>frm1704:txt14I=".request('frm1704:txt14I')."frm1704:txt14I=</div>	
            <div>frm1704:txt14J=".request('frm1704:txt14J')."frm1704:txt14J=</div>	
            <div>frm1704:txt14K=".request('frm1704:txt14K')."frm1704:txt14K=</div>	
            <div>frm1704:txt14L=".request('frm1704:txt14L')."frm1704:txt14L=</div>	
            <div>frm1704:txt14M=".request('frm1704:txt14M')."frm1704:txt14M=</div>	
            <div>frm1704:txt14N=".request('frm1704:txt14N')."frm1704:txt14N=</div>	
            <div>frm1704:txt14O=".request('frm1704:txt14O')."frm1704:txt14O=</div>	
            <div>frm1704:txt14P=".request('frm1704:txt14P')."frm1704:txt14P=</div>	
            <div>frm1704:txt14Q=".request('frm1704:txt14Q')."frm1704:txt14Q=</div>	
            <div>frm1704:txt14R=".request('frm1704:txt14R')."frm1704:txt14R=</div>	
            <div>frm1704:txt14S=".request('frm1704:txt14S')."frm1704:txt14S=</div>	
            <div>frm1704:txt14T=".request('frm1704:txt14T')."frm1704:txt14T=</div>	
            <div>frm1704:txt15A=".request('frm1704:txt15A')."frm1704:txt15A=</div>	
            <div>frm1704:txt15B=".request('frm1704:txt15B')."frm1704:txt15B=</div>	
            <div>frm1704:txt15C=".request('frm1704:txt15C')."frm1704:txt15C=</div>	
            <div>frm1704:txt15D=".request('frm1704:txt15D')."frm1704:txt15D=</div>	
            <div>frm1704:txt15E=".request('frm1704:txt15E')."frm1704:txt15E=</div>	
            <div>frm1704:txt15F=".request('frm1704:txt15F')."frm1704:txt15F=</div>	
            <div>frm1704:txt15G=".request('frm1704:txt15G')."frm1704:txt15G=</div>	
            <div>frm1704:txt15H=".request('frm1704:txt15H')."frm1704:txt15H=</div>	
            <div>frm1704:txt15I=".request('frm1704:txt15I')."frm1704:txt15I=</div>	
            <div>frm1704:txt15J=".request('frm1704:txt15J')."frm1704:txt15J=</div>	
            <div>frm1704:txt15K=".request('frm1704:txt15K')."frm1704:txt15K=</div>	
            <div>frm1704:txt15L=".request('frm1704:txt15L')."frm1704:txt15L=</div>	
            <div>frm1704:txt15M=".request('frm1704:txt15M')."frm1704:txt15M=</div>	
            <div>frm1704:txt15N=".request('frm1704:txt15N')."frm1704:txt15N=</div>	
            <div>frm1704:txt15O=".request('frm1704:txt15O')."frm1704:txt15O=</div>	
            <div>frm1704:txt15P=".request('frm1704:txt15P')."frm1704:txt15P=</div>	
            <div>frm1704:txt15Q=".request('frm1704:txt15Q')."frm1704:txt15Q=</div>	
            <div>frm1704:txt15R=".request('frm1704:txt15R')."frm1704:txt15R=</div>	
            <div>frm1704:txt15S=".request('frm1704:txt15S')."frm1704:txt15S=</div>	
            <div>frm1704:txt15T=".request('frm1704:txt15T')."frm1704:txt15T=</div>	
            <div>frm1704:txt16A=".request('frm1704:txt16A')."frm1704:txt16A=</div>	
            <div>frm1704:txt16B=".request('frm1704:txt16B')."frm1704:txt16B=</div>	
            <div>frm1704:txt16C=".request('frm1704:txt16C')."frm1704:txt16C=</div>	
            <div>frm1704:txt16D=".request('frm1704:txt16D')."frm1704:txt16D=</div>	
            <div>frm1704:txt16E=".request('frm1704:txt16E')."frm1704:txt16E=</div>	
            <div>frm1704:txt16F=".request('frm1704:txt16F')."frm1704:txt16F=</div>	
            <div>frm1704:txt16G=".request('frm1704:txt16G')."frm1704:txt16G=</div>	
            <div>frm1704:txt16H=".request('frm1704:txt16H')."frm1704:txt16H=</div>	
            <div>frm1704:txt16I=".request('frm1704:txt16I')."frm1704:txt16I=</div>	
            <div>frm1704:txt16J=".request('frm1704:txt16J')."frm1704:txt16J=</div>	
            <div>frm1704:txt16K=".request('frm1704:txt16K')."frm1704:txt16K=</div>	
            <div>frm1704:txt16L=".request('frm1704:txt16L')."frm1704:txt16L=</div>	
            <div>frm1704:txt16M=".request('frm1704:txt16M')."frm1704:txt16M=</div>	
            <div>frm1704:txt16N=".request('frm1704:txt16N')."frm1704:txt16N=</div>	
            <div>frm1704:txt16O=".request('frm1704:txt16O')."frm1704:txt16O=</div>	
            <div>frm1704:txt16P=".request('frm1704:txt16P')."frm1704:txt16P=</div>	
            <div>frm1704:txt16Q=".request('frm1704:txt16Q')."frm1704:txt16Q=</div>	
            <div>frm1704:txt16R=".request('frm1704:txt16R')."frm1704:txt16R=</div>	
            <div>frm1704:txt16S=".request('frm1704:txt16S')."frm1704:txt16S=</div>	
            <div>frm1704:txt16T=".request('frm1704:txt16T')."frm1704:txt16T=</div>	
            <div>frm1704:txt17A=".request('frm1704:txt17A')."frm1704:txt17A=</div>	
            <div>frm1704:txt17B=".request('frm1704:txt17B')."frm1704:txt17B=</div>	
            <div>frm1704:txt18=".request('frm1704:txt18')."frm1704:txt18=</div>	
            <div>frm1704:txt19=".request('frm1704:txt19')."frm1704:txt19=</div>	
            <div>frm1704:txt20=".request('frm1704:txt20')."frm1704:txt20=</div>	
            <div>frm1704:txt21A=".request('frm1704:txt21A')."frm1704:txt21A=</div>	
            <div>frm1704:txt21B=".request('frm1704:txt21B')."frm1704:txt21B=</div>	
            <div>frm1704:txt22=".request('frm1704:txt22')."frm1704:txt22=</div>	
            <div>frm1704:txt23=".request('frm1704:txt23')."frm1704:txt23=</div>	
            <div>frm1704:txt24=".request('frm1704:txt24')."frm1704:txt24=</div>	
            <div>frm1704:txt25=".request('frm1704:txt25')."frm1704:txt25=</div>	
            <div>frm1704:txt26=".request('frm1704:txt26')."frm1704:txt26=</div>	
            <div>frm1704:txt27A=".request('frm1704:txt27A')."frm1704:txt27A=</div>	
            <div>frm1704:txt27B=".request('frm1704:txt27B')."frm1704:txt27B=</div>	
            <div>frm1704:txt27C=".request('frm1704:txt27C')."frm1704:txt27C=</div>	
            <div>frm1704:txt27D=".request('frm1704:txt27D')."frm1704:txt27D=</div>	
            <div>frm1704:txt28=".request('frm1704:txt28')."frm1704:txt28=</div>	
            <div>frm1704:txt29=".request('frm1704:txt29')."frm1704:txt29=</div>	
            <div>frm1704:txt30=".request('frm1704:txt30')."frm1704:txt30=</div>	
            <div>frm1704:txt31Day=".request('frm1704:txt31Day')."frm1704:txt31Day=</div>	
            <div>frm1704:txt31Month=".request('frm1704:txt31Month')."frm1704:txt31Month=</div>	
            <div>frm1704:txt31Year=".request('frm1704:txt31Year')."frm1704:txt31Year=</div>	
            <div>frm1704:txt32=".request('frm1704:txt32')."frm1704:txt32=</div>	
            <div>frm1704:sched1Txt1=".request('frm1704:sched1Txt1')."frm1704:sched1Txt1=</div>	
            <div>frm1704:sched1Txt2=".request('frm1704:sched1Txt2')."frm1704:sched1Txt2=</div>	
            <div>frm1704:sched1Txt3=".request('frm1704:sched1Txt3')."frm1704:sched1Txt3=</div>	
            <div>frm1704:sched1Txt4=".request('frm1704:sched1Txt4')."frm1704:sched1Txt4=</div>	
            <div>frm1704:sched1Txt5=".request('frm1704:sched1Txt5')."frm1704:sched1Txt5=</div>	
            <div>frm1704:sched1Txt6=".request('frm1704:sched1Txt6')."frm1704:sched1Txt6=</div>	
            <div>frm1704:sched1Txt7=".request('frm1704:sched1Txt7')."frm1704:sched1Txt7=</div>	
            <div>frm1704:sched1Txt8=".request('frm1704:sched1Txt8')."frm1704:sched1Txt8=</div>	
            <div>frm1704:sched1Txt9=".request('frm1704:sched1Txt9')."frm1704:sched1Txt9=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";


        $tin = request('frm1704:txtTin1').request('frm1704:txtTin2').request('frm1704:txtTin3').request('frm1704:txtBranch');

        $getReturnPeriod = tbl_1704::where('company_id',  request('company'))
                            ->where('item2A', request('frm1704:monthEnd'))
                            ->where('item2B', request('frm1704:txtYearEnded'))
                            ->count();

        $returnPeriod = request('frm1704:monthEnd')."/".request('frm1704:txtYearEnded');
                           
        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm1704:monthEnd').request('frm1704:txtYearEnded');
        }else{
            if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1704')
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

            $xmlReturnPeriod = request('frm1704:monthEnd').request('frm1704:txtYearEnded').$ext;
        }
        $filename = $tin."-1704-".$xmlReturnPeriod.'.xml';

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
                'form'          => '1704',
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
                            ->where('form', '1704')
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
                            ->where('form', '1704')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1704::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1704')
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
        $data = tbl_1704::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1704')
                            ->get();
        
        return view('forms.BIR-Form 1704',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

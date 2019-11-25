<?php

namespace App\Http\Controllers;

use App\Xml;
use App\tbl_2200S;
use App\tbl_2200S_other_schedules;
use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2200SController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2200_ss')){

            }else{
                Schema::connection('mysql2')->create('tbl_2200_ss', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
					$table->string('item1A');
					$table->string('item1B');
					$table->string('item1C');
					$table->string('item2');
					$table->string('item3');
					$table->string('item10')->nullable();
					$table->string('item12A')->nullable();
					$table->string('item12B')->nullable();
					$table->string('item12C')->nullable();
					$table->string('item13A')->nullable();
					$table->string('item13B')->nullable();
					$table->string('item13C')->nullable();
					$table->string('item14');
					$table->string('item14A');
					$table->string('item15')->nullable();
					$table->string('item17')->nullable();
					$table->string('item17_others')->nullable();
					$table->text('item18');
					$table->text('item19A');
					$table->text('item19B');
					$table->text('item19C');
					$table->text('item20');
					$table->text('item21');
					$table->text('item22');
					$table->text('item23A');
					$table->text('item23B');
					$table->text('item23C');
					$table->text('item23D');
					$table->text('item24');
					$table->text('item25A');
					$table->text('item25B');
					$table->text('item25B_penalties')->nullable();
					$table->text('item25C');
					$table->text('item26');
					$table->text('item_sales1');
					$table->text('item_removals1');
					$table->text('item_tax1');
					$table->text('item_sales2');
					$table->text('item_removals2');
					$table->text('item_tax2');
					$table->text('item_sales3');
					$table->text('item_removals3');
					$table->text('item_tax3');
					$table->text('item_sales4');
					$table->text('item_removals4');
					$table->text('item_tax4');
					$table->text('item_sales5');
					$table->text('item_removals5');
					$table->text('item_tax5');
					$table->text('item_sales6');
					$table->text('item_removals6');
					$table->text('item_tax6');
					$table->text('item_sales7');
					$table->text('item_removals7');
					$table->text('item_tax7');
					$table->text('item_sales8');
					$table->text('item_removals8');
					$table->text('item_tax8');
					$table->text('item_sales9');
					$table->text('item_removals9');
					$table->text('item_tax9');
					$table->text('item_sales10');
					$table->text('item_removals10');
					$table->text('item_tax10');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_s_other_schedules', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('atc')->nullable();
                	 $table->text('description')->nullable();
                	 $table->text('unit')->nullable();
                	 $table->text('rate');
                	 $table->text('sales');
                	 $table->text('removals');
                	 $table->text('tax_due');
                     $table->timestamps();
                });
            }
	        return view('forms.BIR-Form 2200S',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
	        $data = tbl_2200S::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2200S')
                            ->get();
        
        	return view('forms.BIR-Form 2200S',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
        
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	$data = ([
    		'form_no'   => request('form_no'),
			'company_id'     => request('company'),
			'item1A'     => request('frm2200S:txtMonth1'),
			'item1B'     => request('frm2200S:txtDate'),
			'item1C'     => request('frm2200S:txtForYr'),
			'item2'     => request('frm2200S:amendedRtn'),
			'item3'     => request('frm2200S:txtSheets'),
			'item10'     => request('frm2200S:txtPSIC'),
			'item12A'     => request('frm2200SoptRegion'),
			'item12B'     => request('frm2200SoptProvince'),
			'item12C'     => request('frm2200SoptCity'),
			'item13A'     => request('frm2200SoptRegion1'),
			'item13B'     => request('frm2200SoptProvince1'),
			'item13C'     => request('frm2200SoptCity1'),
			'item14'     => request('frm2200S:optTreaty'),
			'item14A'     => request('frm2200S:lstTaxTreaty'),
			'item15'     => null !== request('frm2200S:chkPymntManner') ? request('frm2200S:chkPymntManner') : '',
			'item17'     => null !== request('frm2200S:txtOthMannerofPymnt') ? request('frm2200S:txtOthMannerofPymnt') : '',
			'item17_others'     => request('frm2200S:txtOthMannerofPymnt'),
			'item18'     => request('frm2200S:txtTax16'),
			'item19A'     => request('frm2200S:txtTax17A'),
			'item19B'     => request('frm2200S:txtTax17B'),
			'item19C'     => request('frm2200S:txtTax17C'),
			'item20'    => request('frm2200S:txtTax18'),
			'item21'    => request('frm2200S:txtTax19'),
			'item22'    => request('frm2200S:txtTax20'),
			'item23A'    => request('frm2200S:txtTax21A'),
			'item23B'    => request('frm2200S:txtTax21B'),
			'item23C'    => request('frm2200S:txtTax21C'),
			'item23D'    => request('frm2200S:txtTax21D'),
			'item24'    => request('frm2200S:txtTax22'),
			'item25A'    => request('frm2200S:txtTax23A'),
			'item25B'    => request('frm2200S:txtTax23B'),
			'item25C'    => request('frm2200S:txtTax23C'),
			'item26'    => request('frm2200S:txtTax24'),
			'item_sales1'    => request('frm2200S:txtSalesValue0'),
			'item_removals1'    => request('frm2200S:txtVolumeRemovals0'),
			'item_tax1'    => request('frm2200S:txtBasicTaxDue0'),
			'item_sales2'    => request('frm2200S:txtSalesValue1'),
			'item_removals2'    => request('frm2200S:txtVolumeRemovals1'),
			'item_tax2'    => request('frm2200S:txtBasicTaxDue1'),
			'item_sales3'    => request('frm2200S:txtSalesValue2'),
			'item_removals3'    => request('frm2200S:txtVolumeRemovals2'),
			'item_tax3'    => request('frm2200S:txtBasicTaxDue2'),
			'item_sales4'    => request('frm2200S:txtSalesValue3'),
			'item_removals4'    => request('frm2200S:txtVolumeRemovals3'),
			'item_tax4'    => request('frm2200S:txtBasicTaxDue3'),
			'item_sales5'    => request('frm2200S:txtSalesValue4'),
			'item_removals5'    => request('frm2200S:txtVolumeRemovals4'),
			'item_tax5'    => request('frm2200S:txtBasicTaxDue4'),
			'item_sales6'    => request('frm2200S:txtSalesValue5'),
			'item_removals6'    => request('frm2200S:txtVolumeRemovals5'),
			'item_tax6'    => request('frm2200S:txtBasicTaxDue5'),
			'item_sales7'    => request('frm2200S:txtSalesValue6'),
			'item_removals7'    => request('frm2200S:txtVolumeRemovals6'),
			'item_tax7'    => request('frm2200S:txtBasicTaxDue6'),
			'item_sales8'    => request('frm2200S:txtSalesValue7'),
			'item_removals8'    => request('frm2200S:txtVolumeRemovals7'),
			'item_tax8'    => request('frm2200S:txtBasicTaxDue7'),
			'item_sales9'    => request('frm2200S:txtSalesValue8'),
			'item_removals9'    => request('frm2200S:txtVolumeRemovals8'),
			'item_tax9'    => request('frm2200S:txtBasicTaxDue8'),
			'item_sales10'    => request('frm2200S:txtSalesValue9'),
			'item_removals10'    => request('frm2200S:txtVolumeRemovals9'),
			'item_tax10'    => request('frm2200S:txtBasicTaxDue9'),
    		]);

    	$getForm = tbl_2200S::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
        if(request('form_id') != ""){
            $form = tbl_2200S::find(request('form_id'));
            $form->update($data);
            tbl_2200S_other_schedules::where('form_id', $getForm[0]->id)->delete();
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2200S::create($data);
            }else{
                $form = tbl_2200S::find($getForm[0]->id);
                $form->update($data);
                tbl_2200S_other_schedules::where('form_id', $getForm[0]->id)->delete();
            }
        }

    	for ($i=0; $i < count(request('frm2200S:txtsched1Atc')) ; $i++) { 
    		if(request('frm2200S:txtsched1Atc')[$i] != 'XB'){
    			$schedules = ([
    				'form_id' => $form->id,
    				'atc'  => request('frm2200S:txtsched1Atc')[$i],
    				'description' =>  request('frm2200S:txtsched1Desc')[$i],
    				'unit' =>  request('frm2200S:txtsched1TaxBracket')[$i],
    				'rate' => request('frm2200S:txtsched1AppTaxRate')[$i],
    				'sales' =>  request('frm2200S:txtsched1SalesValue')[$i],
    				'removals' => request('frm2200S:txtsched1VolumeRemovals')[$i],
    				'tax_due' => request('frm2200S:txtsched1BasicTaxDue')[$i],
    			]);

    			tbl_2200S_other_schedules::create($schedules);
    		}
    	}

    	$amendedRtn_1 = "false";
        $amendedRtn_2 = "false";

        if( request('frm2200S:amendedRtn') == "Y"){
          $amendedRtn_1 = "true";
        }else if( request('frm2200S:amendedRtn') == "N"){
          $amendedRtn_2 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm2200S:taxpayerName'));

        $address = rawurlencode(request('frm2200S:txtAddress'));

        $lineOfBusiness =  rawurlencode(request('frm2200S:txtLineBus'));

        $optTreaty_1 = "false";
        $optTreaty_2 = "false";

        if( request('frm2200S:optTreaty') == "Y"){
          $optTreaty_1 = "true";
        }else if( request('frm2200S:optTreaty') == "N"){
          $optTreaty_2 = "true";
        }

        $chkPymntManner_1 = "false";
        $chkPymntManner_2 = "false";
        $chkPymntManner_3 = "false";

        $txtSched1TIN1 = "";
        $txtSched1TIN2 = "";
        $txtSched1TIN3 = "";
        $txtSched1BranchCode = "";
        $txtSched1TaxpayerName = "";

        if(null !== request('frm2200S:chkPymntManner')){

          if(request('frm2200S:chkPymntManner') == "Removal"){
            $txtSched1TIN1 =  request('frm2200S:txtSched1TIN1');
            $txtSched1TIN2 =  request('frm2200S:txtSched1TIN2');
            $txtSched1TIN3 =  request('frm2200S:txtSched1TIN3');
            $txtSched1BranchCode =  request('frm2200S:txtSched1BranchCode');
            $txtSched1TaxpayerName =  request('frm2200S:txtSched1TaxpayerName');
            
            $chkPymntManner_1 = "true";
          }else if( request('frm2200S:chkPymntManner') == "Deposit"){
            $chkPymntManner_2 = "true";
          }
        }

        if(null !==  request('frm2200S:chkPymntMannerOther')){
          $chkPymntManner_3 = "true";
        }
		  
        $PayPenalties = "false";

        if(null !==  request('frm2200S:PayPenalties')){
          $PayPenalties = "true";
        }

        $xmlSchedule = "";

        for ($i=1; $i < count( request('frm2200S:txtsched1Atc')) ; $i++) { 
              
            if(null !== request('frm2200S:txtsched1Atc')[$i]){

              $sched1Chk = "false";
              if(null !== request('frm2200S:sched1Chk'.$i.'')){
                $sched1Chk = "true";
              }

               $xmlSchedule.="<div>frm2200S:sched1Chk".$i."=".$sched1Chk."frm2200S:sched1Chk".$i."=</div>	
            <div>frm2200S:txtsched1Atc".$i."=". request('frm2200S:txtsched1Atc')[$i]."frm2200S:txtsched1Atc".$i."=</div>	
            <div>frm2200S:txtsched1Desc".$i."=". request('frm2200S:txtsched1Desc')[$i]."frm2200S:txtsched1Desc".$i."=</div>	
            <div>frm2200S:txtsched1TaxBracket".$i."=". request('frm2200S:txtsched1TaxBracket')[$i]."frm2200S:txtsched1TaxBracket".$i."=</div>	
            <div>frm2200S:txtsched1AppTaxRate".$i."=". request('frm2200S:txtsched1AppTaxRate')[$i]."frm2200S:txtsched1AppTaxRate".$i."=</div>	
            <div>frm2200S:txtsched1SalesValue".$i."=". request('frm2200S:txtsched1SalesValue')[$i]."frm2200S:txtsched1SalesValue".$i."=</div>	
            <div>frm2200S:txtsched1VolumeRemovals".$i."=". request('frm2200S:txtsched1VolumeRemovals')[$i]."frm2200S:txtsched1VolumeRemovals".$i."=</div>	
            <div>frm2200S:txtsched1BasicTaxDue".$i."=". request('frm2200S:txtsched1BasicTaxDue')[$i]."frm2200S:txtsched1BasicTaxDue".$i."=</div>	
            ";
            }
        }

        $xmlData = "<?xml version='1.0'?>	
            <div>frm2200S:txtMonth1=".request('frm2200S:txtMonth1')."frm2200S:txtMonth1=</div>	
            <div>frm2200S:txtDate=".request('frm2200S:txtDate')."frm2200S:txtDate=</div>	
            <div>frm2200S:txtForYr=".request('frm2200S:txtForYr')."frm2200S:txtForYr=</div>	
            <div>frm2200S:amendedRtn_1=".$amendedRtn_1."frm2200S:amendedRtn_1=</div>	
            <div>frm2200S:amendedRtn_2=".$amendedRtn_2."frm2200S:amendedRtn_2=</div>	
            <div>frm2200S:txtSheets=".request('frm2200S:txtSheets')."frm2200S:txtSheets=</div>	
            <div>frm2200S:txtTIN1=".request('frm2200S:txtTIN1')."frm2200S:txtTIN1=</div>	
            <div>frm2200S:txtTIN2=".request('frm2200S:txtTIN2')."frm2200S:txtTIN2=</div>	
            <div>frm2200S:txtTIN3=".request('frm2200S:txtTIN3')."frm2200S:txtTIN3=</div>	
            <div>frm2200S:txtBranchCode=".request('frm2200S:txtBranchCode')."frm2200S:txtBranchCode=</div>	
            <div>frm2200S:txtRDOCode=".request('frm2200S:txtRDOCode')."frm2200S:txtRDOCode=</div>	
            <div>frm2200S:taxpayerName=".$taxPayerName."frm2200S:taxpayerName=</div>	
            <div>frm2200S:txtAddress=".$address."frm2200S:txtAddress=</div>	
            <div>frm2200S:txtZipCode=".request('frm2200S:txtZipCode')."frm2200S:txtZipCode=</div>	
            <div>frm2200S:txtTelNum=".request('frm2200S:txtTelNum')."frm2200S:txtTelNum=</div>	
            <div>frm2200S:txtLineBus=".$lineOfBusiness."frm2200S:txtLineBus=</div>	
            <div>frm2200S:txtPSIC=".request('frm2200S:txtPSIC')."frm2200S:txtPSIC=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>frm2200SoptRegion=".request('frm2200SoptRegion')."frm2200SoptRegion=</div>	
            <div>frm2200SoptProvince=".request('frm2200SoptProvince')."frm2200SoptProvince=</div>	
            <div>frm2200SoptCity=".request('frm2200SoptCity')."frm2200SoptCity=</div>	
            <div>frm2200SoptRegion1=".request('frm2200SoptRegion1')."frm2200SoptRegion1=</div>	
            <div>frm2200SoptProvince1=".request('frm2200SoptProvince1')."frm2200SoptProvince1=</div>	
            <div>frm2200SoptCity1=".request('frm2200SoptCity1')."frm2200SoptCity1=</div>	
            <div>frm2200S:optTreaty_1=".$optTreaty_1."frm2200S:optTreaty_1=</div>	
            <div>frm2200S:optTreaty_2=".$optTreaty_2."frm2200S:optTreaty_2=</div>	
            <div>frm2200S:lstTaxTreaty=".request('frm2200S:lstTaxTreaty')."frm2200S:lstTaxTreaty=</div>	
            <div>frm2200S:chkPymntManner_1=".$chkPymntManner_1."frm2200S:chkPymntManner_1=</div>	
            <div>frm2200S:chkPymntManner_2=".$chkPymntManner_2."frm2200S:chkPymntManner_2=</div>	
            <div>frm2200S:chkPymntManner_3=".$chkPymntManner_3."frm2200S:chkPymntManner_3=</div>	
            <div>frm2200S:txtOthMannerofPymnt=".request('frm2200S:txtOthMannerofPymnt')."frm2200S:txtOthMannerofPymnt=</div>	
            <div>frm2200S:txtTax16=".request('frm2200S:txtTax16')."frm2200S:txtTax16=</div>	
            <div>frm2200S:txtTax17A=".request('frm2200S:txtTax17A')."frm2200S:txtTax17A=</div>	
            <div>frm2200S:txtTax17B=".request('frm2200S:txtTax17B')."frm2200S:txtTax17B=</div>	
            <div>frm2200S:txtTax17C=".request('frm2200S:txtTax17C')."frm2200S:txtTax17C=</div>	
            <div>frm2200S:txtTax18=".request('frm2200S:txtTax18')."frm2200S:txtTax18=</div>	
            <div>frm2200S:txtTax19=".request('frm2200S:txtTax19')."frm2200S:txtTax19=</div>	
            <div>frm2200S:txtTax20=".request('frm2200S:txtTax20')."frm2200S:txtTax20=</div>	
            <div>frm2200S:txtTax21A=".request('frm2200S:txtTax21A')."frm2200S:txtTax21A=</div>	
            <div>frm2200S:txtTax21B=".request('frm2200S:txtTax21B')."frm2200S:txtTax21B=</div>	
            <div>frm2200S:txtTax21C=".request('frm2200S:txtTax21C')."frm2200S:txtTax21C=</div>	
            <div>frm2200S:txtTax21D=".request('frm2200S:txtTax21D')."frm2200S:txtTax21D=</div>	
            <div>frm2200S:txtTax22=".request('frm2200S:txtTax22')."frm2200S:txtTax22=</div>	
            <div>frm2200S:txtTax23A=".request('frm2200S:txtTax23A')."frm2200S:txtTax23A=</div>	
            <div>frm2200S:PayPenalties=".$PayPenalties."frm2200S:PayPenalties=</div>	
            <div>frm2200S:txtTax23B=".request('frm2200S:txtTax23B')."frm2200S:txtTax23B=</div>	
            <div>frm2200S:txtTax23C=".request('frm2200S:txtTax23C')."frm2200S:txtTax23C=</div>	
            <div>frm2200S:txtTax24=".request('frm2200S:txtTax24')."frm2200S:txtTax24=</div>	
            <div>txtTaxAgentNo=txtTaxAgentNo=</div>	
            <div>txtDateIssue=txtDateIssue=</div>	
            <div>txtDateExpiry=txtDateExpiry=</div>	
            <div>frm1601EQ:txtAgency33=frm1601EQ:txtAgency33=</div>	
            <div>frm1601EQ:txtNumber33=frm1601EQ:txtNumber33=</div>	
            <div>frm1601EQ:txtDate33=frm1601EQ:txtDate33=</div>	
            <div>frm1601EQ:txtAmount33=frm1601EQ:txtAmount33=</div>	
            <div>frm1601EQ:txtAgency34=frm1601EQ:txtAgency34=</div>	
            <div>frm1601EQ:txtNumber34=frm1601EQ:txtNumber34=</div>	
            <div>frm1601EQ:txtDate34=frm1601EQ:txtDate34=</div>	
            <div>frm1601EQ:txtAmount34=frm1601EQ:txtAmount34=</div>	
            <div>frm1601EQ:txtAgency35=frm1601EQ:txtAgency35=</div>	
            <div>frm1601EQ:txtNumber35=frm1601EQ:txtNumber35=</div>	
            <div>frm1601EQ:txtDate35=frm1601EQ:txtDate35=</div>	
            <div>frm1601EQ:txtAmount35=frm1601EQ:txtAmount35=</div>	
            <div>frm1601EQ:txtParticular36=frm1601EQ:txtParticular36=</div>	
            <div>frm1601EQ:txtAgency36=frm1601EQ:txtAgency36=</div>	
            <div>frm1601EQ:txtNumber36=frm1601EQ:txtNumber36=</div>	
            <div>frm1601EQ:txtDate36=frm1601EQ:txtDate36=</div>	
            <div>frm1601EQ:txtAmount36=frm1601EQ:txtAmount36=</div>	
            <div>frm2200S:txtSched1TIN1=".$txtSched1TIN1."frm2200S:txtSched1TIN1=</div>	
            <div>frm2200S:txtSched1TIN2=".$txtSched1TIN2."frm2200S:txtSched1TIN2=</div>	
            <div>frm2200S:txtSched1TIN3=".$txtSched1TIN3."frm2200S:txtSched1TIN3=</div>	
            <div>frm2200S:txtSched1BranchCode=".$txtSched1BranchCode."frm2200S:txtSched1BranchCode=</div>	
            <div>frm2200S:txtSched1TaxpayerName=".$txtSched1TaxpayerName."frm2200S:txtSched1TaxpayerName=</div>	
            <div>frm2200S:txtSalesValue0=".request('frm2200S:txtSalesValue0')."frm2200S:txtSalesValue0=</div>	
            <div>frm2200S:txtVolumeRemovals0=".request('frm2200S:txtVolumeRemovals0')."frm2200S:txtVolumeRemovals0=</div>	
            <div>frm2200S:txtBasicTaxDue0=".request('frm2200S:txtBasicTaxDue0')."frm2200S:txtBasicTaxDue0=</div>	
            <div>frm2200S:txtSalesValue1=".request('frm2200S:txtSalesValue1')."frm2200S:txtSalesValue1=</div>	
            <div>frm2200S:txtVolumeRemovals1=".request('frm2200S:txtVolumeRemovals1')."frm2200S:txtVolumeRemovals1=</div>	
            <div>frm2200S:txtBasicTaxDue1=".request('frm2200S:txtBasicTaxDue1')."frm2200S:txtBasicTaxDue1=</div>	
            <div>frm2200S:txtSalesValue2=".request('frm2200S:txtSalesValue2')."frm2200S:txtSalesValue2=</div>	
            <div>frm2200S:txtVolumeRemovals2=".request('frm2200S:txtVolumeRemovals2')."frm2200S:txtVolumeRemovals2=</div>	
            <div>frm2200S:txtBasicTaxDue2=".request('frm2200S:txtBasicTaxDue2')."frm2200S:txtBasicTaxDue2=</div>	
            <div>frm2200S:txtSalesValue3=".request('frm2200S:txtSalesValue3')."frm2200S:txtSalesValue3=</div>	
            <div>frm2200S:txtVolumeRemovals3=".request('frm2200S:txtVolumeRemovals3')."frm2200S:txtVolumeRemovals3=</div>	
            <div>frm2200S:txtBasicTaxDue3=".request('frm2200S:txtBasicTaxDue3')."frm2200S:txtBasicTaxDue3=</div>	
            <div>frm2200S:txtSalesValue4=".request('frm2200S:txtSalesValue4')."frm2200S:txtSalesValue4=</div>	
            <div>frm2200S:txtVolumeRemovals4=".request('frm2200S:txtVolumeRemovals4')."frm2200S:txtVolumeRemovals4=</div>	
            <div>frm2200S:txtBasicTaxDue4=".request('frm2200S:txtBasicTaxDue4')."frm2200S:txtBasicTaxDue4=</div>	
            <div>frm2200S:txtSalesValue5=".request('frm2200S:txtSalesValue5')."frm2200S:txtSalesValue5=</div>	
            <div>frm2200S:txtVolumeRemovals5=".request('frm2200S:txtVolumeRemovals5')."frm2200S:txtVolumeRemovals5=</div>	
            <div>frm2200S:txtBasicTaxDue5=".request('frm2200S:txtBasicTaxDue5')."frm2200S:txtBasicTaxDue5=</div>	
            <div>frm2200S:txtSalesValue6=".request('frm2200S:txtSalesValue6')."frm2200S:txtSalesValue6=</div>	
            <div>frm2200S:txtVolumeRemovals6=".request('frm2200S:txtVolumeRemovals6')."frm2200S:txtVolumeRemovals6=</div>	
            <div>frm2200S:txtBasicTaxDue6=".request('frm2200S:txtBasicTaxDue6')."frm2200S:txtBasicTaxDue6=</div>	
            <div>frm2200S:txtSalesValue7=".request('frm2200S:txtSalesValue7')."frm2200S:txtSalesValue7=</div>	
            <div>frm2200S:txtVolumeRemovals7=".request('frm2200S:txtVolumeRemovals7')."frm2200S:txtVolumeRemovals7=</div>	
            <div>frm2200S:txtBasicTaxDue7=".request('frm2200S:txtBasicTaxDue7')."frm2200S:txtBasicTaxDue7=</div>	
            <div>frm2200S:txtSalesValue8=".request('frm2200S:txtSalesValue8')."frm2200S:txtSalesValue8=</div>	
            <div>frm2200S:txtVolumeRemovals8=".request('frm2200S:txtVolumeRemovals8')."frm2200S:txtVolumeRemovals8=</div>	
            <div>frm2200S:txtBasicTaxDue8=".request('frm2200S:txtBasicTaxDue8')."frm2200S:txtBasicTaxDue8=</div>	
            <div>frm2200S:txtSalesValue9=".request('frm2200S:txtSalesValue9')."frm2200S:txtSalesValue9=</div>	
            <div>frm2200S:txtVolumeRemovals9=".request('frm2200S:txtVolumeRemovals9')."frm2200S:txtVolumeRemovals9=</div>	
            <div>frm2200S:txtBasicTaxDue9=".request('frm2200S:txtBasicTaxDue9')."frm2200S:txtBasicTaxDue9=</div>	
            <div>frm2200S:sched1Chk0=falsefrm2200S:sched1Chk0=</div>	
            <div>frm2200S:txtsched1Atc0=".request('frm2200S:txtsched1Atc')[0]."frm2200S:txtsched1Atc0=</div>	
            <div>frm2200S:txtsched1Desc0=".request('frm2200S:txtsched1Desc')[0]."frm2200S:txtsched1Desc0=</div>	
            <div>frm2200S:txtsched1TaxBracket0=".request('frm2200S:txtsched1TaxBracket')[0]."frm2200S:txtsched1TaxBracket0=</div>	
            <div>frm2200S:txtsched1AppTaxRate0=".request('frm2200S:txtsched1AppTaxRate')[0]."frm2200S:txtsched1AppTaxRate0=</div>	
            <div>frm2200S:txtsched1SalesValue0=".request('frm2200S:txtsched1SalesValue')[0]."frm2200S:txtsched1SalesValue0=</div>	
            <div>frm2200S:txtsched1VolumeRemovals0=".request('frm2200S:txtsched1VolumeRemovals')[0]."frm2200S:txtsched1VolumeRemovals0=</div>	
            <div>frm2200S:txtsched1BasicTaxDue0=".request('frm2200S:txtsched1BasicTaxDue')[0]."frm2200S:txtsched1BasicTaxDue0=</div>	
            ".$xmlSchedule."<div>frm2200S:totalTaxDue=".request('frm2200S:totalTaxDue')."frm2200S:totalTaxDue=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2014.";

        $tin = request('frm2200S:txtTIN1').request('frm2200S:txtTIN2').request('frm2200S:txtTIN3').request('frm2200S:txtBranchCode');
    		
    	$returnPeriod = request('frm2200S:txtMonth1')."/".request('frm2200S:txtDate')."/".request('frm2200S:txtForYr')." ".date('H:i:s');

    	$xmlReturnPeriod = request('frm2200S:txtMonth1').request('frm2200S:txtDate').request('frm2200S:txtForYr').date('His');

        $filename = $tin."-2200S-".$xmlReturnPeriod.'.xml';

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
	     		'form'			=> '2200S',
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
     						->where('form', '2200S')
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
                            ->where('form', '2200S')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2200S::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2200S')
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
        $data = tbl_2200S::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2200S')
                            ->get();
        
        return view('forms.BIR-Form 2200S',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }

}

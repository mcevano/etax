<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1602Q;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1602Qv2018Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);

    	if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1602_qs')){

            }else{
                Schema::connection('mysql2')->create('tbl_1602_qs', function (Blueprint $table) {
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
					$table->text('item17');
					$table->text('item18');
					$table->text('item19');
					$table->text('item20');
					$table->text('item21');
					$table->text('item22');
					$table->text('item23');
					$table->text('item24');
					$table->text('item25');
					$table->text('item26');
					$table->text('item27');
					$table->text('item28');
					$table->text('item_over_remittance')->nullable();
					$table->text('item_sched1_amount1');
					$table->text('item_sched1_tax1');
					$table->text('item_sched1_amount2');
					$table->text('item_sched1_tax2');
					$table->text('item_sched1_amount3');
					$table->text('item_sched1_tax3');
					$table->text('item_sched1_amount4');
					$table->text('item_sched1_tax4');
					$table->text('item_sched1_amount5');
					$table->text('item_sched1_tax5');
					$table->text('item_sched1_amount6');
					$table->text('item_sched1_tax6');
					$table->text('item_sched1_amount7');
					$table->text('item_sched1_tax7');
					$table->text('item_sched1_amount8');
					$table->text('item_sched1_tax8');
					$table->text('item_sched1_amount9');
					$table->text('item_sched1_tax9');
					$table->text('item_sched1_amount10');
					$table->text('item_sched1_tax10');
					$table->text('item_sched1_amount11');
					$table->text('item_sched1_tax11');
					$table->text('item_sched1_amount12');
					$table->text('item_sched1_tax12');
					$table->text('item_sched1_amount13');
					$table->text('item_sched1_rate13');
					$table->text('item_sched1_tax13');
					$table->text('item_sched1_amount14');
					$table->text('item_sched1_rate14');
					$table->text('item_sched1_tax14');
					$table->text('item_sched1_amount15');
					$table->text('item_sched1_tax15');
					$table->text('item_sched1_total');
					$table->text('item_sched2_treaty1')->nullable();
					$table->text('item_sched2_atc1')->nullable();
					$table->text('item_sched2_interest1');
					$table->text('item_sched2_rate1');
					$table->text('item_sched2_withheld1');
					$table->text('item_sched2_treaty2')->nullable();
					$table->text('item_sched2_atc2')->nullable();
					$table->text('item_sched2_interest2')->nullable();
					$table->text('item_sched2_rate2');
					$table->text('item_sched2_withheld2');
					$table->text('item_sched2_total');
					$table->text('item_sched3_PA1')->nullable();
					$table->text('item_sched3_interest1');
					$table->text('item_sched3_rate1');
					$table->text('item_sched3_withheld1');
					$table->text('item_sched3_PA2')->nullable();
					$table->text('item_sched3_interest2');
					$table->text('item_sched3_rate2');
					$table->text('item_sched3_withheld2');
					$table->text('item_sched3_total');
                    $table->timestamps();
                });

            }
            
        	return view('forms.BIR-Form 1602Qv2018',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_1602Q::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1602Qv2018')
                            ->get();
            return view('forms.BIR-Form 1602Qv2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }

    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
        	'form_no'		=> request('form_no'),
			'company_id'      => request('company'),
			'item1'      => request('frm1602Q:txtYear'),
			'item2'      => null !== request('frm1602Q:qtr') ? request('frm1602Q:qtr') : '',
			'item3'      => null !== request('frm1602Q:AmendedRtn') ? request('frm1602Q:AmendedRtn') : '',
			'item4'      => null !== request('frm1602Q:OptTaxWithheld') ? request('frm1602Q:OptTaxWithheld') : '',
			'item5'      => request('frm1602Q:txtSheets'),
			'item11'      => null !== request('frm1602Q:OptCategoryAgent') ? request('frm1602Q:OptCategoryAgent') : '',
			'item13'      => null !== request('frm1602Q:OptSpecialTax') ? request('frm1602Q:OptSpecialTax') : '',
			'item13A'      => request('frm1602Q:lstSpecialTax'),
			'item14'      => request('frm1602Q:txt14'),
			'item15'      => request('frm1602Q:txt15'),
			'item16'      => request('frm1602Q:txt16'),
			'item17'      => request('frm1602Q:txt17'),
			'item18'      => request('frm1602Q:txt18'),
			'item19'      => request('frm1602Q:txt19'),
			'item20'      => request('frm1602Q:txt20'),
			'item21'      => request('frm1602Q:txt21'),
			'item22'      => request('frm1602Q:txt22'),
			'item23'      => request('frm1602Q:txt23'),
			'item24'      => request('frm1602Q:txt24'),
			'item25'      => request('frm1602Q:txt25'),
			'item26'      => request('frm1602Q:txt26'),
			'item27'      => request('frm1602Q:txt27'),
			'item28'      => request('frm1602Q:txt28'),
			'item_over_remittance'      => null !== request('frm1602Q:OverRemittance') ? request('frm1602Q:OverRemittance') : '',
			'item_sched1_amount1'      => request('frm1602Q:txtSched1Amount1'),
			'item_sched1_tax1'      => request('frm1602Q:txtSched1Tax1'),
			'item_sched1_amount2'      => request('frm1602Q:txtSched1Amount2'),
			'item_sched1_tax2'      => request('frm1602Q:txtSched1Tax2'),
			'item_sched1_amount3'      => request('frm1602Q:txtSched1Amount3'),
			'item_sched1_tax3'      => request('frm1602Q:txtSched1Tax3'),
			'item_sched1_amount4'      => request('frm1602Q:txtSched1Amount4'),
			'item_sched1_tax4'      => request('frm1602Q:txtSched1Tax4'),
			'item_sched1_amount5'      => request('frm1602Q:txtSched1Amount5'),
			'item_sched1_tax5'      => request('frm1602Q:txtSched1Tax5'),
			'item_sched1_amount6'      => request('frm1602Q:txtSched1Amount6'),
			'item_sched1_tax6'      => request('frm1602Q:txtSched1Tax6'),
			'item_sched1_amount7'      => request('frm1602Q:txtSched1Amount7'),
			'item_sched1_tax7'      => request('frm1602Q:txtSched1Tax7'),
			'item_sched1_amount8'      => request('frm1602Q:txtSched1Amount8'),
			'item_sched1_tax8'      => request('frm1602Q:txtSched1Tax8'),
			'item_sched1_amount9'      => request('frm1602Q:txtSched1Amount9'),
			'item_sched1_tax9'      => request('frm1602Q:txtSched1Tax9'),
			'item_sched1_amount10'      => request('frm1602Q:txtSched1Amount10'),
			'item_sched1_tax10'      => request('frm1602Q:txtSched1Tax10'),
			'item_sched1_amount11'      => request('frm1602Q:txtSched1Amount11'),
			'item_sched1_tax11'      => request('frm1602Q:txtSched1Tax11'),
			'item_sched1_amount12'      => request('frm1602Q:txtSched1Amount12'),
			'item_sched1_tax12'      => request('frm1602Q:txtSched1Tax12'),
			'item_sched1_amount13'      => request('frm1602Q:txtSched1Amount13'),
			'item_sched1_rate13'      => request('frm1602Q:txtSched1Tax13'),
			'item_sched1_tax13'      => request('frm1602Q:txtSched1Tax13'),
			'item_sched1_amount14'      => request('frm1602Q:txtSched1Amount14'),
			'item_sched1_rate14'      => request('frm1602Q:txtSched1Rate14'),
			'item_sched1_tax14'      => request('frm1602Q:txtSched1Tax14'),
			'item_sched1_amount15'      => request('frm1602Q:txtSched1Amount15'),
			'item_sched1_tax15'      => request('frm1602Q:txtSched1Tax15'),
			'item_sched1_total'      => request('frm1602Q:txtSched1Total'),
			'item_sched2_treaty1'      => request('frm1602Q:txtSched2TreatyCode1'),
			'item_sched2_atc1'      => request('frm1602Q:txtSched2ATC1'),
			'item_sched2_interest1'      => request('frm1602Q:txtSched2Interest1'),
			'item_sched2_rate1'      => request('frm1602Q:txtSched2TaxRate1'),
			'item_sched2_withheld1'      => request('frm1602Q:txtSched2TaxesWithheld1'),
			'item_sched2_treaty2'      => request('frm1602Q:txtSched2TreatyCode2'),
			'item_sched2_atc2'      => request('frm1602Q:txtSched2ATC2'),
			'item_sched2_interest2'      => request('frm1602Q:txtSched2Interest2'),
			'item_sched2_rate2'      => request('frm1602Q:txtSched2TaxRate2'),
			'item_sched2_withheld2'      => request('frm1602Q:txtSched2TaxesWithheld2'),
			'item_sched2_total'      => request('frm1602Q:txtSched2Total'),
			'item_sched3_PA1'      => request('frm1602Q:txtSched3IPA1'),
			'item_sched3_interest1'      => request('frm1602Q:txtSched3TotInterest1'),
			'item_sched3_rate1'      => request('frm1602Q:txtSched3TaxRate1'),
			'item_sched3_withheld1'      => request('frm1602Q:txtSched3TaxWithheld1'),
			'item_sched3_PA2'      => request('frm1602Q:txtSched3IPA2'),
			'item_sched3_interest2'      => request('frm1602Q:txtSched3TotInterest2'),
			'item_sched3_rate2'      => request('frm1602Q:txtSched3TaxRate2'),
			'item_sched3_withheld2'      => request('frm1602Q:txtSched3TaxWithheld2'),
			'item_sched3_total'      => request('frm1602Q:txtSched3Total'),
        	]);
    	
    	$getForm = tbl_1602Q::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

        $form = "";
        if(request('form_id') != ""){
            $form = tbl_1602Q::find(request('form_id'));
            $form->update($data);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1602Q::create($data);
            }else{
                $form = tbl_1602Q::find($getForm[0]->id);
                $form->update($data);
            }
        }

        $qtr_1 = "false";
        $qtr_2 = "false";
        $qtr_3 = "false";
        $qtr_4 = "false";

        if(null !== request('frm1602Q:qtr')){
            if(request('frm1602Q:qtr') == "1"){
                $qtr_1 = "true";
            }else if(request('frm1602Q:qtr') == "2"){
                $qtr_2 = "true";
            }else if(request('frm1602Q:qtr') == "3"){
                $qtr_3 = "true";
            }else if(request('frm1602Q:qtr') == "4"){
                $qtr_4 = "true";
            }
        }

        $AmendedRtn1 = "false";
        $AmendedRtn2 = "false";

        if(null !== request('frm1602Q:AmendedRtn')){
            if(request('frm1602Q:AmendedRtn')== "Y"){
                $AmendedRtn1 = "true";
            }else if(request('frm1602Q:AmendedRtn') == "N"){
                $AmendedRtn2 = "true";
            }
        }

        $OptTaxWithheld1 = "false";
        $OptTaxWithheld2 = "false";

        if(null !== request('frm1602Q:OptTaxWithheld')){
            if(request('frm1602Q:OptTaxWithheld') == "Y"){
                $OptTaxWithheld1 = "true";
            }else if(request('frm1602Q:OptTaxWithheld') == "N"){
                $OptTaxWithheld2 = "true";
            }
        }
 
        $taxPayerName = rawurlencode(request('frm1602Q:txtTaxpayerName'));

        $address = rawurlencode(request('frm1602Q:txtAddress'));

        $OptCategoryAgent1 = "false";
        $OptCategoryAgent2 = "false";

        if(null !== request('frm1602Q:OptCategoryAgent')){
            if(request('frm1602Q:OptCategoryAgent') == "P"){
                $OptCategoryAgent1 = "true";
            }else if(request('frm1602Q:OptCategoryAgent') == "G"){
                $OptCategoryAgent2 = "true";
            }
        }

        $OptSpecialTax1 = "false";
        $OptSpecialTax2 = "false";

        if(null !== request('frm1602Q:OptSpecialTax')){
            if(request('frm1602Q:OptSpecialTax') == "Y"){
                $OptSpecialTax1 = "true";
            }else if(request('frm1602Q:OptSpecialTax') == "N"){
                $OptSpecialTax2 = "true";
            }
        }

        $OverRemittance1 = "false";
        $OverRemittance2 = "false";
        $OverRemittance3 = "false";

        if(null !== request('frm1602Q:OverRemittance')){
            if(request('frm1602Q:OverRemittance') == "Refunded"){
                $OverRemittance1 = "true";
            }else if(request('frm1602Q:OverRemittance') == "Certificate"){
                $OverRemittance2 = "true";
            }else if(request('frm1602Q:OverRemittance') == "Calendar"){
                $OverRemittance3 = "true";
            }
        }

        $xmlData = "<?xml version='1.0'?> 
            <div>frm1602Q:txtYear=".request('frm1602Q:txtYear')."frm1602Q:txtYear=</div> 
            <div>frm1602Q:qtr_1=".$qtr_1."frm1602Q:qtr_1=</div> 
            <div>frm1602Q:qtr_2=".$qtr_2."frm1602Q:qtr_2=</div> 
            <div>frm1602Q:qtr_3=".$qtr_3."frm1602Q:qtr_3=</div> 
            <div>frm1602Q:qtr_4=".$qtr_4."frm1602Q:qtr_4=</div> 
            <div>frm1602Q:AmendedRtn1=".$AmendedRtn1."frm1602Q:AmendedRtn1=</div> 
            <div>frm1602Q:AmendedRtn2=".$AmendedRtn2."frm1602Q:AmendedRtn2=</div> 
            <div>frm1602Q:OptTaxWithheld1=".$OptTaxWithheld1."frm1602Q:OptTaxWithheld1=</div> 
            <div>frm1602Q:OptTaxWithheld2=".$OptTaxWithheld2."frm1602Q:OptTaxWithheld2=</div> 
            <div>frm1602Q:txtSheets=".request('frm1602Q:txtSheets')."frm1602Q:txtSheets=</div> 
            <div>frm1602Q:txtTIN1=".request('frm1602Q:txtTIN1')."frm1602Q:txtTIN1=</div> 
            <div>frm1602Q:txtTIN2=".request('frm1602Q:txtTIN2')."frm1602Q:txtTIN2=</div> 
            <div>frm1602Q:txtTIN3=".request('frm1602Q:txtTIN3')."frm1602Q:txtTIN3=</div> 
            <div>frm1602Q:txtBranchCode=".request('frm1602Q:txtBranchCode')."frm1602Q:txtBranchCode=</div> 
            <div>frm1602Q:txtRDOCode=".request('frm1602Q:txtRDOCode')."frm1602Q:txtRDOCode=</div>  
            <div>frm1602Q:txtTaxpayerName=".$taxPayerName."frm1602Q:txtTaxpayerName=</div>  
            <div>frm1602Q:txtAddress=".$address."frm1602Q:txtAddress=</div> 
            <div>frm1602Q:txtZipCode=".request('frm1602Q:txtZipCode')."frm1602Q:txtZipCode=</div>  
            <div>frm1602Q:txtTelNum=".request('frm1602Q:txtTelNum')."frm1602Q:txtTelNum=</div> 
            <div>frm1602Q:OptCategoryAgent1=".$OptCategoryAgent1."frm1602Q:OptCategoryAgent1=</div> 
            <div>frm1602Q:OptCategoryAgent2=".$OptCategoryAgent2."frm1602Q:OptCategoryAgent2=</div> 
            <div>txtEmail=".request('txtEmail')."txtEmail=</div> 
            <div>frm1602Q:OptSpecialTax1=".$OptSpecialTax1."frm1602Q:OptSpecialTax1=</div>  
            <div>frm1602Q:OptSpecialTax2=".$OptSpecialTax2."frm1602Q:OptSpecialTax2=</div>  
            <div>frm1602Q:lstSpecialTax=".request('frm1602Q:lstSpecialTax')."frm1602Q:lstSpecialTax=</div> 
            <div>frm1602Q:txt14=".request('frm1602Q:txt14')."frm1602Q:txt14=</div> 
            <div>frm1602Q:txt15=".request('frm1602Q:txt15')."frm1602Q:txt15=</div> 
            <div>frm1602Q:txt16=".request('frm1602Q:txt16')."frm1602Q:txt16=</div> 
            <div>frm1602Q:txt17=".request('frm1602Q:txt17')."frm1602Q:txt17=</div> 
            <div>frm1602Q:txt18=".request('frm1602Q:txt18')."frm1602Q:txt18=</div> 
            <div>frm1602Q:txt19=".request('frm1602Q:txt19')."frm1602Q:txt19=</div> 
            <div>frm1602Q:txt20=".request('frm1602Q:txt20')."frm1602Q:txt20=</div> 
            <div>frm1602Q:txt21=".request('frm1602Q:txt21')."frm1602Q:txt21=</div> 
            <div>frm1602Q:txt22=".request('frm1602Q:txt22')."frm1602Q:txt22=</div> 
            <div>frm1602Q:txt23=".request('frm1602Q:txt23')."frm1602Q:txt23=</div> 
            <div>frm1602Q:txt24=".request('frm1602Q:txt24')."frm1602Q:txt24=</div> 
            <div>frm1602Q:txt25=".request('frm1602Q:txt25')."frm1602Q:txt25=</div> 
            <div>frm1602Q:txt26=".request('frm1602Q:txt26')."frm1602Q:txt26=</div> 
            <div>frm1602Q:txt27=".request('frm1602Q:txt27')."frm1602Q:txt27=</div> 
            <div>frm1602Q:txt28=".request('frm1602Q:txt28')."frm1602Q:txt28=</div> 
            <div>frm1602Q:OverRemittance1=".$OverRemittance1."frm1602Q:OverRemittance1=</div> 
            <div>frm1602Q:OverRemittance2=".$OverRemittance2."frm1602Q:OverRemittance2=</div> 
            <div>frm1602Q:OverRemittance3=".$OverRemittance3."frm1602Q:OverRemittance3=</div> 
            <div>frm1602Q:txtPage2TIN=".request('frm1602Q:txtPage2TIN')."frm1602Q:txtPage2TIN=</div> 
            <div>frm1602Q:txtPage2Agent=".request('frm1602Q:txtPage2Agent')."frm1602Q:txtPage2Agent=</div> 
            <div>frm1602Q:txtSched1Amount1=".request('frm1602Q:txtSched1Amount1')."frm1602Q:txtSched1Amount1=</div>  
            <div>frm1602Q:txtSched1Tax1=".request('frm1602Q:txtSched1Tax1')."frm1602Q:txtSched1Tax1=</div> 
            <div>frm1602Q:txtSched1Amount2=".request('frm1602Q:txtSched1Amount2')."frm1602Q:txtSched1Amount2=</div>  
            <div>frm1602Q:txtSched1Tax2=".request('frm1602Q:txtSched1Tax2')."frm1602Q:txtSched1Tax2=</div> 
            <div>frm1602Q:txtSched1Amount3=".request('frm1602Q:txtSched1Amount3')."frm1602Q:txtSched1Amount3=</div>  
            <div>frm1602Q:txtSched1Tax3=".request('frm1602Q:txtSched1Tax3')."frm1602Q:txtSched1Tax3=</div> 
            <div>frm1602Q:txtSched1Amount4=".request('frm1602Q:txtSched1Amount4')."frm1602Q:txtSched1Amount4=</div>  
            <div>frm1602Q:txtSched1Tax4=".request('frm1602Q:txtSched1Tax4')."frm1602Q:txtSched1Tax4=</div> 
            <div>frm1602Q:txtSched1Amount5=".request('frm1602Q:txtSched1Amount5')."frm1602Q:txtSched1Amount5=</div>  
            <div>frm1602Q:txtSched1Tax5=".request('frm1602Q:txtSched1Tax5')."frm1602Q:txtSched1Tax5=</div> 
            <div>frm1602Q:txtSched1Amount6=".request('frm1602Q:txtSched1Amount6')."frm1602Q:txtSched1Amount6=</div>  
            <div>frm1602Q:txtSched1Tax6=".request('frm1602Q:txtSched1Tax6')."frm1602Q:txtSched1Tax6=</div> 
            <div>frm1602Q:txtSched1Amount7=".request('frm1602Q:txtSched1Amount7')."frm1602Q:txtSched1Amount7=</div>  
            <div>frm1602Q:txtSched1Tax7=".request('frm1602Q:txtSched1Tax7')."frm1602Q:txtSched1Tax7=</div> 
            <div>frm1602Q:txtSched1Amount8=".request('frm1602Q:txtSched1Amount8')."frm1602Q:txtSched1Amount8=</div>  
            <div>frm1602Q:txtSched1Tax8=".request('frm1602Q:txtSched1Tax8')."frm1602Q:txtSched1Tax8=</div> 
            <div>frm1602Q:txtSched1Amount9=".request('frm1602Q:txtSched1Amount9')."frm1602Q:txtSched1Amount9=</div>  
            <div>frm1602Q:txtSched1Tax9=".request('frm1602Q:txtSched1Tax9')."frm1602Q:txtSched1Tax9=</div> 
            <div>frm1602Q:txtSched1Amount10=".request('frm1602Q:txtSched1Amount10')."frm1602Q:txtSched1Amount10=</div> 
            <div>frm1602Q:txtSched1Tax10=".request('frm1602Q:txtSched1Tax10')."frm1602Q:txtSched1Tax10=</div>  
            <div>frm1602Q:txtSched1Amount11=".request('frm1602Q:txtSched1Amount11')."frm1602Q:txtSched1Amount11=</div> 
            <div>frm1602Q:txtSched1Tax11=".request('frm1602Q:txtSched1Tax11')."frm1602Q:txtSched1Tax11=</div>  
            <div>frm1602Q:txtSched1Amount12=".request('frm1602Q:txtSched1Amount12')."frm1602Q:txtSched1Amount12=</div> 
            <div>frm1602Q:txtSched1Tax12=".request('frm1602Q:txtSched1Tax12')."frm1602Q:txtSched1Tax12=</div>  
            <div>frm1602Q:txtSched1Amount13=".request('frm1602Q:txtSched1Amount13')."frm1602Q:txtSched1Amount13=</div> 
            <div>frm1602Q:txtSched1Rate13=".request('frm1602Q:txtSched1Rate13')."frm1602Q:txtSched1Rate13=</div> 
            <div>frm1602Q:txtSched1Tax13=".request('frm1602Q:txtSched1Tax13')."frm1602Q:txtSched1Tax13=</div>  
            <div>frm1602Q:txtSched1Amount14=".request('frm1602Q:txtSched1Amount14')."frm1602Q:txtSched1Amount14=</div> 
            <div>frm1602Q:txtSched1Rate14=".request('frm1602Q:txtSched1Rate14')."frm1602Q:txtSched1Rate14=</div> 
            <div>frm1602Q:txtSched1Tax14=".request('frm1602Q:txtSched1Tax14')."frm1602Q:txtSched1Tax14=</div>  
            <div>frm1602Q:txtSched1Amount15=".request('frm1602Q:txtSched1Amount15')."frm1602Q:txtSched1Amount15=</div> 
            <div>frm1602Q:txtSched1Tax15=".request('frm1602Q:txtSched1Tax15')."frm1602Q:txtSched1Tax15=</div>  
            <div>frm1602Q:txtSched1Total=".request('frm1602Q:txtSched1Total')."frm1602Q:txtSched1Total=</div>  
            <div>frm1602Q:txtSched2TreatyCode1=".request('frm1602Q:txtSched2TreatyCode1')."frm1602Q:txtSched2TreatyCode1=</div>  
            <div>frm1602Q:txtSched2ATC1=".request('frm1602Q:txtSched2ATC1')."frm1602Q:txtSched2ATC1=</div> 
            <div>frm1602Q:txtSched2Interest1=".request('frm1602Q:txtSched2Interest1')."frm1602Q:txtSched2Interest1=</div>  
            <div>frm1602Q:txtSched2TaxRate1=".request('frm1602Q:txtSched2TaxRate1')."frm1602Q:txtSched2TaxRate1=</div> 
            <div>frm1602Q:txtSched2TaxesWithheld1=".request('frm1602Q:txtSched2TaxesWithheld1')."frm1602Q:txtSched2TaxesWithheld1=</div> 
            <div>frm1602Q:txtSched2TreatyCode2=".request('frm1602Q:txtSched2TreatyCode2')."frm1602Q:txtSched2TreatyCode2=</div>  
            <div>frm1602Q:txtSched2ATC2=".request('frm1602Q:txtSched2ATC2')."frm1602Q:txtSched2ATC2=</div> 
            <div>frm1602Q:txtSched2Interest2=".request('frm1602Q:txtSched2Interest2')."frm1602Q:txtSched2Interest2=</div>  
            <div>frm1602Q:txtSched2TaxRate2=".request('frm1602Q:txtSched2TaxRate1')."frm1602Q:txtSched2TaxRate2=</div> 
            <div>frm1602Q:txtSched2TaxesWithheld2=".request('frm1602Q:txtSched2TaxesWithheld2')."frm1602Q:txtSched2TaxesWithheld2=</div> 
            <div>frm1602Q:txtSched2Total=".request('frm1602Q:txtSched2Total')."frm1602Q:txtSched2Total=</div>  
            <div>frm1602Q:txtSched3IPA1=".request('frm1602Q:txtSched3IPA1')."frm1602Q:txtSched3IPA1=</div> 
            <div>frm1602Q:txtSched3TotInterest1=".request('frm1602Q:txtSched3TotInterest1')."frm1602Q:txtSched3TotInterest1=</div> 
            <div>frm1602Q:txtSched3TaxRate1=".request('frm1602Q:txtSched3TaxRate1')."frm1602Q:txtSched3TaxRate1=</div> 
            <div>frm1602Q:txtSched3TaxWithheld1=".request('frm1602Q:txtSched3TaxWithheld1')."frm1602Q:txtSched3TaxWithheld1=</div> 
            <div>frm1602Q:txtSched3IPA2=".request('frm1602Q:txtSched3IPA2')."frm1602Q:txtSched3IPA2=</div> 
            <div>frm1602Q:txtSched3TotInterest2=".request('frm1602Q:txtSched3TotInterest2')."frm1602Q:txtSched3TotInterest2=</div> 
            <div>frm1602Q:txtSched3TaxRate2=".request('frm1602Q:txtSched3TaxRate2')."frm1602Q:txtSched3TaxRate2=</div> 
            <div>frm1602Q:txtSched3TaxWithheld2=".request('frm1602Q:txtSched3TaxWithheld2')."frm1602Q:txtSched3TaxWithheld2=</div> 
            <div>frm1602Q:txtSched3Total=".request('frm1602Q:txtSched3Total')."frm1602Q:txtSched3Total=</div>  
            <div>frm1602Q:txtPage3TIN=".request('frm1602Q:txtPage3TIN')."frm1602Q:txtPage3TIN=</div> 
            <div>frm1602Q:txtPage3Agent=".request('frm1602Q:txtPage3Agent')."frm1602Q:txtPage3Agent=</div> 
            <div>frm1602Q:txtCurrentPage=".request('frm1602Q:txtCurrentPage')."frm1602Q:txtCurrentPage=</div>  
            <div>frm1602Q:txtMaxPage=3frm1602Q:txtMaxPage=</div>  
            <div>txtFinalFlag=0txtFinalFlag=</div>  
            <div>txtEnroll=NtxtEnroll=</div>  
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div> 
            <div>ebirOnlineUsername=ebirOnlineUsername=</div> 
            <div>ebirOnlineSecret=ebirOnlineSecret=</div> 
            <div>driveSelectTPExport=0driveSelectTPExport=</div>  
              
            All Rights Reserved BIR 2012.";


        $tin = request('frm1602Q:txtTIN1').request('frm1602Q:txtTIN2').request('frm1602Q:txtTIN3').request('frm1602Q:txtBranchCode');

        if(request('frm1602Q:txtYear') != '' && null !== request('frm1602Q:qtr')){
        	$getReturnPeriod = tbl_1602Q::where('company_id',  request('company'))
                            ->where('item1', request('frm1602Q:txtYear'))
                            ->where('item2', request('frm1602Q:qtr'))
                            ->count();
            
            $returnPeriod = request('frm1602Q:txtYear')."-Q".request('frm1602Q:qtr');

            if($getReturnPeriod == "1"){
                $xmlReturnPeriod = request('frm1602Q:txtYear')."Q".request('frm1602Q:qtr');
            }else{
                if(request('form_id') != ""){
					$getXml = Xml::where('user_id', Auth::user()->id)
					        ->where('company_id', request('company'))
					        ->where('form_id', $form->id)
					        ->where('form', '1602Qv2018')
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

                $xmlReturnPeriod = request('frm1602Q:txtYear')."Q".request('frm1602Q:qtr').$ext;
            }

            
        }else{
        	$qtr = (null !== request('frm1602Q:qtr') ? request('frm1602Q:qtr') : '');
        
        	if($qtr != "" && request('frm1602Q:txtYear') == ''){
        		$xmlReturnPeriod = $qtr;
        		$returnPeriod = "018--Q".$qtr;
        	}else if(request('frm1602Q:txtYear') != '' && $qtr == '' ){
        		$xmlReturnPeriod = request('frm1602Q:txtYear');
        		$splitYear = str_split(request('frm1602Q:txtYear'), 2);
        		$returnPeriod = "8-".$splitYear[0]."-".$splitYear[1];
        	}else{
        		$xmlReturnPeriod = "-";
        		$returnPeriod = "v201-8-";
        	}
        }
        
        $filename = $tin."-1602Qv2018-".$xmlReturnPeriod.'.xml';

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
                'form'          => '1602Qv2018',
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
                            ->where('form', '1602Qv2018')
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
                            ->where('form', '1602Qv2018')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1602Q::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1602Qv2018')
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
        $data = tbl_1602Q::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1602Qv2018')
                            ->get();
        
        return view('forms.BIR-Form 1602Qv2018',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

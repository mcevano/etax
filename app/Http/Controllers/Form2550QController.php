<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2550Q;
use App\tbl_2550Q_schedule1;
use App\tbl_2550Q_schedule2;
use App\tbl_2550Q_schedule3a;
use App\tbl_2550Q_schedule3b;
use App\tbl_2550Q_schedule4;
use App\tbl_2550Q_schedule5;
use App\tbl_2550Q_schedule6;
use App\tbl_2550Q_schedule7;
use App\tbl_2550Q_schedule8;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class Form2550QController extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);

    	if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2550_qs')){

            }else{
                Schema::connection('mysql2')->create('tbl_2550_qs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item1C')->nullable();
                    $table->string('item2');
                    $table->string('item3A')->nullable();
                    $table->string('item3B')->nullable();
                    $table->string('item4')->nullable();
                    $table->string('item5')->nullable();
                    $table->string('item8')->nullable();
                    $table->string('item14A')->nullable();
                    $table->string('item14B')->nullable();
                    $table->text('item15A');
                    $table->text('item15B');
                    $table->text('item16A');
                    $table->text('item16B');
                    $table->text('item17');
                    $table->text('item18');
                    $table->text('item19A');
                    $table->text('item19B');
                    $table->text('item20A');
                    $table->text('item20B');
                    $table->text('item20C');
                    $table->text('item20D');
                    $table->text('item20E');
                    $table->text('item20F');
                    $table->text('item21A');
                    $table->text('item21B');
                    $table->text('item21C');
                    $table->text('item21D');
                    $table->text('item21E');
                    $table->text('item21F');
                    $table->text('item21G');
                    $table->text('item21H');
                    $table->text('item22I');
                    $table->text('item21J');
                    $table->text('item21K');
                    $table->text('item21L');
                    $table->text('item21M');
                    $table->text('item21N');
                    $table->text('item21O');
                    $table->text('item21P');
                    $table->text('item22');
                    $table->text('item23A');
                    $table->text('item23B');
                    $table->text('item23C');
                    $table->text('item23D');
                    $table->text('item23E');
                    $table->text('item23F');
                    $table->text('item24');
                    $table->text('item25');
                    $table->text('item26A');
                    $table->text('item26B');
                    $table->text('item26C');
                    $table->text('item26D');
                    $table->text('item26E');
                    $table->text('item26F');
                    $table->text('item26G');
                    $table->text('item26H');
                    $table->text('item27');
                    $table->text('item28A');
                    $table->text('item28B');
                    $table->text('item28C');
                    $table->text('item28D');
                    $table->text('item29');
                    $table->text('item_balance_sched3A');
                    $table->text('item_balance_sched3B');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_q_schedule1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc')->nullable();
                    $table->text('amount')->nullable();
                    $table->text('output')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_q_schedule2s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date_purchased')->nullable();
                    $table->text('description')->nullable();
                    $table->text('amount')->nullable();
                    $table->text('tax')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_q_schedule3as', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date_purchased')->nullable();
                    $table->text('description')->nullable();
                    $table->text('amount')->nullable();
                    $table->text('tax')->nullable();
                    $table->text('estimate')->nullable();
                    $table->text('recognized')->nullable();
                    $table->text('allowed_tax')->nullable();
                    $table->text('balance')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_q_schedule3bs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date_purchased')->nullable();
                    $table->text('description')->nullable();
                    $table->text('amount')->nullable();
                    $table->text('tax')->nullable();
                    $table->text('estimate')->nullable();
                    $table->text('recognized')->nullable();
                    $table->text('allowed_tax')->nullable();
                    $table->text('balance')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_q_schedule4s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('input_tax')->nullable();
                    $table->text('taxable_sales')->nullable();
                    $table->text('total_sales')->nullable();
                    $table->text('tax_not_direct')->nullable();
                    $table->text('total_not_direct')->nullable();
                    $table->text('government')->nullable();
                    $table->text('standard_tax')->nullable();
                    $table->text('total')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_q_schedule5s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('tax')->nullable();
                    $table->text('taxable_sales')->nullable();
                    $table->text('input_not_direct')->nullable();
                    $table->text('product_not_direct')->nullable();
                    $table->text('total_sum')->nullable();
                    $table->text('total')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_q_schedule6s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('period')->nullable();
                    $table->text('witholding')->nullable();
                    $table->text('income')->nullable();
                    $table->text('withheld')->nullable();
                    $table->text('previous')->nullable();
                    $table->text('current')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_q_schedule7s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('period')->nullable();
                    $table->text('miller')->nullable();
                    $table->text('taxpayer')->nullable();
                    $table->text('receipt')->nullable();
                    $table->text('amount')->nullable();
                    $table->text('previous')->nullable();
                    $table->text('current')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_q_schedule8s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('period')->nullable();
                    $table->text('witholding')->nullable();
                    $table->text('income')->nullable();
                    $table->text('tax')->nullable();
                    $table->text('previous')->nullable();
                    $table->text('current')->nullable();
                    $table->timestamps();
                });
            }
           
	        return view('forms.BIR-Form 2550Q',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{
            $data = tbl_2550Q::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                                ->where('company_id', $company->id)
                                ->where('form_id', $form_id)
                                ->where('form', '2550Q')
                                ->get();
            return view('forms.BIR-Form 2550Q',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }

    	
    }

    public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
        	'form_no'     => request('form_no'),
			'company_id'     => request('company'),
			'item1A'     => request('frm2550q:optAmend'),
			'item1B'     => request('frm2550q:RtnMonth'),
			'item1C'     => request('frm2550q:txtYear'),
			'item2'     => request('frm2550q:OptQuarter'),
			'item3A'     => request('frm2550q:RtnPeriodFrom'),
			'item3B'     => request('frm2550q:RtnPeriodTo'),
			'item4'     => request('frm2550q:AmendedRtn'),
			'item5'     => request('frm2550q:OptShortPrd'),
			'item8'     => request('frm2550q:txtSheets'),
			'item14A'     => request('frm2550q:OptTreaty'),
			'item14B'     => request('frm2550q:lstTaxTreaty'),
			'item15A'     => request('frm2550q:txtTax15A'),
			'item15B'     => request('frm2550q:txtTax15B'),
			'item16A'     => request('frm2550q:txtTax16A'),
			'item16B'     => request('frm2550q:txtTax16B'),
			'item17'     => request('frm2550q:txtTax17'),
			'item18'     => request('frm2550q:txtTax18'),
			'item19A'     => request('frm2550q:txtTax19A'),
			'item19B'     => request('frm2550q:txtTax19B'),
			'item20A'     => request('frm2550q:txtTax20A'),
			'item20B'     => request('frm2550q:txtTax20B'),
			'item20C'     => request('frm2550q:txtTax20C'),
			'item20D'     => request('frm2550q:txtTax20D'),
			'item20E'     => request('frm2550q:txtTax20E'),
			'item20F'     => request('frm2550q:txtTax20F'),
			'item21A'     => request('frm2550q:txtTax21A'),
			'item21B'     => request('frm2550q:txtTax21B'),
			'item21C'     => request('frm2550q:txtTax21C'),
			'item21D'     => request('frm2550q:txtTax21D'),
			'item21E'     => request('frm2550q:txtTax21E'),
			'item21F'     => request('frm2550q:txtTax21F'),
			'item21G'     => request('frm2550q:txtTax21G'),
			'item21H'     => request('frm2550q:txtTax21H'),
			'item22I'     => request('frm2550q:txtTax21I'),
			'item21J'     => request('frm2550q:txtTax21J'),
			'item21K'     => request('frm2550q:txtTax21K'),
			'item21L'     => request('frm2550q:txtTax21L'),
			'item21M'     => request('frm2550q:txtTax21M'),
			'item21N'     => request('frm2550q:txtTax21N'),
			'item21O'     => request('frm2550q:txtTax21O'),
			'item21P'     => request('frm2550q:txtTax21P'),
			'item22'     => request('frm2550q:txtTax22'),
			'item23A'     => request('frm2550q:txtTax23A'),
			'item23B'     => request('frm2550q:txtTax23B'),
			'item23C'     => request('frm2550q:txtTax23C'),
			'item23D'     => request('frm2550q:txtTax23D'),
			'item23E'     => request('frm2550q:txtTax23E'),
			'item23F'     => request('frm2550q:txtTax23F'),
			'item24'     => request('frm2550q:txtTax24'),
			'item25'     => request('frm2550q:txtTax25'),
			'item26A'     => request('frm2550q:txtTax26A'),
			'item26B'     => request('frm2550q:txtTax26B'),
			'item26C'     => request('frm2550q:txtTax26C'),
			'item26D'     => request('frm2550q:txtTax26D'),
			'item26E'     => request('frm2550q:txtTax26E'),
			'item26F'     => request('frm2550q:txtTax26F'),
			'item26G'     => request('frm2550q:txtTax26G'),
			'item26H'     => request('frm2550q:txtTax26H'),
			'item27'     => request('frm2550q:txtTax27'),
			'item28A'     => request('frm2550q:txtTax28A'),
			'item28B'     => request('frm2550q:txtTax28B'),
			'item28C'     => request('frm2550q:txtTax28C'),
			'item28D'     => request('frm2550q:txtTax28D'),
			'item29'     => request('frm2550q:txtTax29'),
			'item_balance_sched3A' => request('txtmodalTotalBalanceSched3A'),
			'item_balance_sched3B' => request('txtmodalTotalBalanceSched3B'),
        ]);

        $getForm = tbl_2550Q::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();
        
        $form = "";
        $trans = "";
        if(request('form_id') != ""){
            $form = tbl_2550Q::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2550Q::create($data);
                $trans = "insert";
            }else{
                $form = tbl_2550Q::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
            tbl_2550Q_schedule1::where('form_id', $getForm[0]->id)->delete();
            tbl_2550Q_schedule2::where('form_id', $getForm[0]->id)->delete();
            tbl_2550Q_schedule3a::where('form_id', $getForm[0]->id)->delete();
            tbl_2550Q_schedule3b::where('form_id', $getForm[0]->id)->delete();
            tbl_2550Q_schedule4::where('form_id', $getForm[0]->id)->delete();
            tbl_2550Q_schedule5::where('form_id', $getForm[0]->id)->delete();
            tbl_2550Q_schedule6::where('form_id', $getForm[0]->id)->delete();
            tbl_2550Q_schedule7::where('form_id', $getForm[0]->id)->delete();
            tbl_2550Q_schedule8::where('form_id', $getForm[0]->id)->delete();
        }

        if( null !== request('frm2550q:txtAtcCde')){
            for ($i=0; $i < count(request('frm2550q:txtAtcCde')) ; $i++) { 
                $sched1 = ([
                    'form_id'    => $form->id,
                    'atc'       => request('frm2550q:txtAtcCde')[$i],
                    'amount' 	=> request('frm2550q:txtAmountSales')[$i],
                    'output'    => request('frm2550q:txtOutputTax')[$i],
                ]);

                tbl_2550Q_schedule1::create($sched1);
            }
        }

        if(null !== request('txtDatePurchased')){
            for ($i=0; $i < count(request('txtDatePurchased')) ; $i++) { 
                $sched2 = ([
                    'form_id'           => $form->id,
                    'date_purchased'     => request('txtDatePurchased')[$i],
                    'description'       => request('txtDescription')[$i],
                    'amount'            => request('txtAmt')[$i],
                    'tax'               => request('txtInputTax')[$i],
                ]);

                tbl_2550Q_schedule2::create($sched2);  
            }
        }

        if(null !==  request('txtDatePurchased3A')){
            for ($i=0; $i < count(request('txtDatePurchased3A')) ; $i++) { 
                $sched3a = ([
                    'form_id'           =>  $form->id,
                    'date_purchased'     =>  request('txtDatePurchased3A')[$i],
                    'description'       =>  request('txtDescription3A')[$i],
                    'amount'            =>  request('txtAmt3A')[$i],
                    'tax'               =>  request('txtInputTax3A')[$i],
                    'estimate'          =>  request('txtEstLife3A')[$i],
                    'recognized'        =>  request('txtRecogLife3A')[$i],
                    'allowed_tax'        =>  request('txtAllowInputTax3A')[$i],
                    'balance'           =>  request('txtBalInputTax3A')[$i],
                ]);

                tbl_2550Q_schedule3a::create($sched3a);  
            }
        }

        if(null !==  request('txtDatePurchased3B')){
            for ($i=0; $i < count(request('txtDatePurchased3B')) ; $i++) { 
                $sched3b = ([
                    'form_id'           =>  $form->id,
                    'date_purchased'     =>  request('txtDatePurchased3B')[$i],
                    'description'       =>  request('txtDescription3B')[$i],
                    'amount'            =>  request('txtAmt3B')[$i],
                    'tax'               =>  request('txtBalInputTaxPrevious3B')[$i],
                    'estimate'          =>  request('txtEstLife3B')[$i],
                    'recognized'        =>  request('txtRecogLife3B')[$i],
                    'allowed_tax'        =>  request('txtAllowInputTax3B')[$i],
                    'balance'           =>  request('txtBalInputTax3B')[$i],
                ]);

                tbl_2550Q_schedule3b::create($sched3b);
            }
        }

        $sched4 = ([
                'form_id'        => $form->id,
                'input_tax'      => request('txtinputtaxSched4'),
                'taxable_sales'  => request('txtTaxableSaleSched4'),
                'total_sales'    => request('txtTotalSaleSched4'),
                'tax_not_direct'  => request('txtInputTaxnotDirectSched4'),
                'total_not_direct'=> request('txtTotalInputTaxnotDirectSched4'),
                'government'    => request('txtTotalInputSaletoGovernmentSched4'),
                'standard_tax'   => request('txtlessStdTaxSched4'),
                'total'         => request('txtTotal20BSched4'),
        ]);

        tbl_2550Q_schedule4::create($sched4);

        $sched5 = ([
                'form_id'            => $form->id,
                'tax'               => request('txtinputtaxSched5'),
                'taxable_sales'      => request('txtTotSaleSched5'),
                'input_not_direct'    => request('txtAmountInputnotDirectSched5'),
                'product_not_direct'  => request('txtProductnotDirectSched5'),
                'total_sum'          => request('txtSumTotalSaleSched5'),
                'total'             => request('txtTotal20CSched5'),
        ]);

        tbl_2550Q_schedule5::create($sched5);

        if(null !==  request('txtNameAgent')){
            for ($i=0; $i < count(request('txtNameAgent')) ; $i++) { 
                $sched6 = ([
                    'form_id'    => $form->id,
                    'period'    => request('txtPeriodCovered')[$i],
                    'witholding'=> request('txtNameAgent')[$i],
                    'income'    => request('txtIncomePayment')[$i],
                    'withheld'   => request('txtTotalWithheld')[$i],
                    'previous'		=> request('txtPrevious2Mo')[$i],
                    'current'   => request('txtAppliedCurr')[$i],
                ]);

                tbl_2550Q_schedule6::create($sched6);
            }
        }

        if(null !==  request('txtPeriodCoveredSch7')){
            for ($i=0; $i < count(request('txtPeriodCoveredSch7')) ; $i++) { 
                $sched7 = ([
                    'form_id'    => $form->id,
                    'period'    => request('txtPeriodCoveredSch7')[$i],
                    'miller'    => request('txtNameMillerSch7')[$i],
                    'taxpayer'  => request('txtNameTaxPayerSch7')[$i],
                    'receipt'   => request('txtORNumSch7')[$i],
                    'amount'    => request('txtAmountPaidSch7')[$i],
                    'previous'	=> request('txtPrevious2MoSch7')[$i],
                    'current'   => request('txtAppliedCurrSch7')[$i],
                ]);

                tbl_2550Q_schedule7::create($sched7);
            }
        }

        if(null !==  request('txtPeriodCoveredSch8')){
            for ($i=0; $i < count(request('txtPeriodCoveredSch8')) ; $i++) { 
                $sched8 = ([
                    'form_id'    => $form->id,
                    'period'    => request('txtPeriodCoveredSch8')[$i],
                    'witholding'=> request('txtNameAgentSch8')[$i],
                    'income'    => request('txtIncomePaymentSch8')[$i],
                    'tax'       => request('txtTotalWithheldSch8')[$i],
                    'previous'	=> request('txtPrevious2MoSch8')[$i],
                    'current'   => request('txtAppliedCurrSch8')[$i],
                ]);

                tbl_2550Q_schedule8::create($sched8);
            }
        }

        $optAmend1 = "false";
        $optAmend2 = "false";

        if(request('frm2550q:optAmend') == 'Y'){
            $optAmend1 = "true";
        }else if(request('frm2550q:optAmend') == 'N'){
            $optAmend2 = "true";
        }

        $OptQuarter1 = "false";
        $OptQuarter2 = "false";
        $OptQuarter3 = "false";
        $OptQuarter4 = "false";

        if(request('frm2550q:OptQuarter') == '1'){
        	$OptQuarter1 = "true";
        }else if(request('frm2550q:OptQuarter') == '2'){
        	$OptQuarter2 = "true";
        }else if(request('frm2550q:OptQuarter') == '3'){
        	$OptQuarter3 = "true";
        }else if(request('frm2550q:OptQuarter') == '4'){
        	$OptQuarter4 = "true";
        }

        $AmendedRtnY = "false";
        $AmendedRtnN = "false";

        if(request('frm2550q:AmendedRtn') == 'Y'){
        	$AmendedRtnY = "true";
        }else if(request('frm2550q:AmendedRtn') == 'N'){
        	$AmendedRtnN = "true";
        }	

        $OptShortPrd1 = "false";
        $OptShortPrd2 = "false";

        if(request('frm2550q:OptShortPrd') == 'Y'){
        	$OptShortPrd1 = "true";
        }else if(request('frm2550q:OptShortPrd') == 'N'){
        	$OptShortPrd2 = "true";
        }	

        $taxPayerName =  rawurlencode(request('frm2550q:TaxPayer'));

        $address = rawurlencode(request('frm2550q:txtAddress'));

        $lineOfBusiness =  rawurlencode(request('frm2550q:txtLineBus'));

        $OptTreaty1 = "false";
        $OptTreaty2 = "false";

        if(request('frm2550q:OptTreaty') == 'Y'){
        	$OptTreaty1 = "true";
        }else if(request('frm2550q:OptTreaty') == 'N'){
        	$OptTreaty2 = "true";
        }

        $sched1 = "";
        if(null !==  request('frm2550q:txtAtcCde')[0]){
            $countATC = count(request('frm2550q:txtAtcCde'));
            for ($i=0; $i <= $countATC - 1 ; $i++) { 
                $sched1 .= "<div>frm2550q:txtAtcCde".($i + 1)."=".request('frm2550q:txtAtcCde')[$i]."frm2550q:txtAtcCde".($i + 1)."=</div>	
            <div>frm2550q:txtAmountSales".($i + 1)."=".request('frm2550q:txtAmountSales')[$i]."frm2550q:txtAmountSales".($i + 1)."=</div>	
            <div>frm2550q:txtOutputTax".($i + 1)."=".request('frm2550q:txtOutputTax')[$i]."frm2550q:txtOutputTax".($i + 1)."=</div>	
            ";
            }
        }

        $sched2 = "";
        if(null !==  request('txtDatePurchased')[0]){
            $countRow = count(request('txtDatePurchased'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched2 .= "<div>chxSched2".$i."=".(null !==  request('chxSched2'.$i.'') ? 'true' : 'false')."chxSched2".$i."=</div>	
            <div>txtDatePurchased".$i."=".request('txtDatePurchased')[$i]."txtDatePurchased".$i."=</div>	
            <div>txtDescription".$i."=".request('txtDescription')[$i]."txtDescription".$i."=</div>	
            <div>txtAmt".$i."=".request('txtAmt')[$i]."txtAmt".$i."=</div>	
            <div>txtInputTax".$i."=".request('txtInputTax')[$i]."txtInputTax".$i."=</div>	
            ";
            }
        }

        $sched3A = "";
        if(null !==  request('txtDatePurchased3A')[0]){
            $countRow = count(request('txtDatePurchased3A'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched3A .= "<div>chxSched3A".$i."=".(null !==  request('chxSched3A')[$i] ? 'true' : 'false')."chxSched3A".$i."=</div>	
            <div>txtDatePurchased3A".$i."=".request('txtDatePurchased3A')[$i]."txtDatePurchased3A".$i."=</div>	
            <div>txtDescription3A".$i."=".request('txtDescription3A')[$i]."txtDescription3A".$i."=</div>	
            <div>txtAmt3A".$i."=".request('txtAmt3A')[$i]."txtAmt3A".$i."=</div>	
            <div>txtInputTax3A".$i."=".request('txtInputTax3A')[$i]."txtInputTax3A".$i."=</div>	
            <div>txtEstLife3A".$i."=".request('txtEstLife3A')[$i]."txtEstLife3A".$i."=</div>	
            <div>txtRecogLife3A".$i."=".request('txtRecogLife3A')[$i]."txtRecogLife3A".$i."=</div>	
            <div>txtAllowInputTax3A".$i."=".request('txtAllowInputTax3A')[$i]."txtAllowInputTax3A".$i."=</div>	
            <div>txtBalInputTax3A".$i."=".request('txtBalInputTax3A')[$i]."txtBalInputTax3A".$i."=</div>	
            ";
            }
        }

        $sched3B = "";
        if(null !==  request('txtDatePurchased3B')[0]){
            $countRow = count(request('txtDatePurchased3B'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched3B .= "<div>chxSched3B".$i."=".(null !==  request('chxSched3B')[$i] ? 'true' : 'false')."chxSched3B".$i."=</div>	
            <div>txtDatePurchased3B".$i."=".request('txtDatePurchased3B')[$i]."txtDatePurchased3B".$i."=</div>	
            <div>txtDescription3B".$i."=".request('txtDescription3B')[$i]."txtDescription3B".$i."=</div>	
            <div>txtAmt3B".$i."=".request('txtAmt3B')[$i]."txtAmt3B".$i."=</div>	
            <div>txtBalInputTaxPrevious3B".$i."=".request('txtBalInputTaxPrevious3B')[$i]."txtBalInputTaxPrevious3B".$i."=</div>	
            <div>txtEstLife3B".$i."=".request('txtEstLife3B')[$i]."txtEstLife3B".$i."=</div>	
            <div>txtRecogLife3B".$i."=".request('txtRecogLife3B')[$i]."txtRecogLife3B".$i."=</div>	
            <div>txtAllowInputTax3B".$i."=".request('txtAllowInputTax3B')[$i]."txtAllowInputTax3B".$i."=</div>	
            <div>txtBalInputTax3B".$i."=".request('txtBalInputTax3B')[$i]."txtBalInputTax3B".$i."=</div>	
            ";
            }
        }

        $sched6 = "";
        if(null !==  request('txtPeriodCovered')[0]){
            $countRow = count(request('txtPeriodCovered'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched6 .= "<div>chxSched6".$i."=".(null !==  request('chxSched6')[$i] ? 'true' : 'false')."chxSched6".$i."=</div>	
            <div>txtPeriodCovered".$i."=".request('txtPeriodCovered')[$i]."txtPeriodCovered".$i."=</div>	
            <div>txtNameAgent".$i."=".request('txtNameAgent')[$i]."txtNameAgent".$i."=</div>	
            <div>txtIncomePayment".$i."=".request('txtIncomePayment')[$i]."txtIncomePayment".$i."=</div>	
            <div>txtTotalWithheld".$i."=".request('txtTotalWithheld')[$i]."txtTotalWithheld".$i."=</div>	
            <div>txtPrevious2Mo".$i."=".request('txtPrevious2Mo')[$i]."txtPrevious2Mo".$i."=</div>	
            <div>txtAppliedCurr".$i."=".request('txtAppliedCurr')[$i]."txtAppliedCurr".$i."=</div>	
            ";
            }
        }

        $sched7 = "";
        if(null !==  request('txtPeriodCoveredSch7')[0]){
            $countRow = count(request('txtPeriodCoveredSch7'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched7 .= "<div>chxSched7".$i."=".(null !==  request('chxSched7')[$i] ? 'true' : 'false')."chxSched7".$i."=</div>	
            <div>txtPeriodCoveredSch7".$i."=".request('txtPeriodCoveredSch7')[$i]."txtPeriodCoveredSch7".$i."=</div>	
            <div>txtNameMillerSch7".$i."=".request('txtNameMillerSch7')[$i]."txtNameMillerSch7".$i."=</div>	
            <div>txtNameTaxPayerSch7".$i."=".request('txtNameTaxPayerSch7')[$i]."txtNameTaxPayerSch7".$i."=</div>	
            <div>txtORNumSch7".$i."=".request('txtORNumSch7')[$i]."txtORNumSch7".$i."=</div>	
            <div>txtAmountPaidSch7".$i."=".request('txtAmountPaidSch7')[$i]."txtAmountPaidSch7".$i."=</div>	
            <div>txtPrevious2MoSch7".$i."=".request('txtPrevious2MoSch7')[$i]."txtPrevious2MoSch7".$i."=</div>	
            <div>txtAppliedCurrSch7".$i."=".request('txtAppliedCurrSch7')[$i]."txtAppliedCurrSch7".$i."=</div>	
            ";
            }
        }
	
		$sched8 = "";
        if(null !==  request('txtPeriodCoveredSch8')[0]){
            $countRow = count(request('txtPeriodCoveredSch8'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched8 .= "<div>chxSched8".$i."=".(null !==  request('chxSched8')[$i] ? 'true' : 'false')."chxSched8".$i."=</div>	
            <div>txtPeriodCoveredSch8".$i."=".request('txtPeriodCoveredSch8')[$i]."txtPeriodCoveredSch8".$i."=</div>	
            <div>txtNameAgentSch8".$i."=".request('txtNameAgentSch8')[$i]."txtNameAgentSch8".$i."=</div>	
            <div>txtIncomePaymentSch8".$i."=".request('txtIncomePaymentSch8')[$i]."txtIncomePaymentSch8".$i."=</div>	
            <div>txtTotalWithheldSch8".$i."=".request('txtTotalWithheldSch8')[$i]."txtTotalWithheldSch8".$i."=</div>	
            <div>txtPrevious2MoSch8".$i."=".request('txtPrevious2MoSch8')[$i]."txtPrevious2MoSch8".$i."=</div>	
            <div>txtAppliedCurrSch8".$i."=".request('txtAppliedCurrSch8')[$i]."txtAppliedCurrSch8".$i."=</div>	
            ";
            }
        }

        $xmlData ="<?xml version='1.0'?>	
            <div>frm2550q:optAmend:_1=".$optAmend1."frm2550q:optAmend:_1=</div>	
            <div>frm2550q:optAmend:_2=".$optAmend2."frm2550q:optAmend:_2=</div>	
            <div>frm2550q:RtnMonth=".request('frm2550q:RtnMonth')."frm2550q:RtnMonth=</div>	
            <div>frm2550q:txtYear=".request('frm2550q:txtYear')."frm2550q:txtYear=</div>	
            <div>frm2550q:OptQuarter1=".$OptQuarter1."frm2550q:OptQuarter1=</div>	
            <div>frm2550q:OptQuarter2=".$OptQuarter2."frm2550q:OptQuarter2=</div>	
            <div>frm2550q:OptQuarter3=".$OptQuarter3."frm2550q:OptQuarter3=</div>	
            <div>frm2550q:OptQuarter4=".$OptQuarter4."frm2550q:OptQuarter4=</div>	
            <div>frm2550q:RtnPeriodFrom=".request('frm2550q:RtnPeriodFrom')."frm2550q:RtnPeriodFrom=</div>	
            <div>frm2550q:RtnPeriodTo=".request('frm2550q:RtnPeriodTo')."frm2550q:RtnPeriodTo=</div>	
            <div>frm2550q:AmendedRtnY=".$AmendedRtnY."frm2550q:AmendedRtnY=</div>	
            <div>frm2550q:AmendedRtnN=".$AmendedRtnN."frm2550q:AmendedRtnN=</div>	
            <div>frm2550q:OptShortPrd1=".$OptShortPrd1."frm2550q:OptShortPrd1=</div>	
            <div>frm2550q:OptShortPrd2=".$OptShortPrd2."frm2550q:OptShortPrd2=</div>	
            <div>frm2550q:txtTIN1=".request('frm2550q:txtTIN1')."frm2550q:txtTIN1=</div>	
            <div>frm2550q:txtTIN2=".request('frm2550q:txtTIN2')."frm2550q:txtTIN2=</div>	
            <div>frm2550q:txtTIN3=".request('frm2550q:txtTIN3')."frm2550q:txtTIN3=</div>	
            <div>frm2550q:txtBranchCode=".request('frm2550q:txtBranchCode')."frm2550q:txtBranchCode=</div>	
            <div>frm2550q:txtRDOCode=".request('frm2550q:txtRDOCode')."frm2550q:txtRDOCode=</div>	
            <div>frm2550q:txtSheets=".request('frm2550q:txtSheets')."frm2550q:txtSheets=</div>	
            <div>frm2550q:txtLineBus=".$lineOfBusiness."frm2550q:txtLineBus=</div>	
            <div>frm2550q:TaxPayer=".$taxPayerName."frm2550q:TaxPayer=</div>	
            <div>frm2550q:txtTelNum=".request('frm2550q:txtTelNum')."frm2550q:txtTelNum=</div>	
            <div>frm2550q:txtAddress=".$address."frm2550q:txtAddress=</div>	
            <div>frm2550q:txtZipCode=".request('frm2550q:txtZipCode')."frm2550q:txtZipCode=</div>	
            <div>frm2550q:OptTreaty1=".$OptTreaty1."frm2550q:OptTreaty1=</div>	
            <div>frm2550q:OptTreaty2=".$OptTreaty2."frm2550q:OptTreaty2=</div>	
            <div>frm2550q:lstTaxTreaty=".request('frm2550q:lstTaxTreaty')."frm2550q:lstTaxTreaty=</div>	
            <div>frm2550q:txtTax15A=".request('frm2550q:txtTax15A')."frm2550q:txtTax15A=</div>	
            <div>frm2550q:txtTax15B=".request('frm2550q:txtTax15B')."frm2550q:txtTax15B=</div>	
            <div>frm2550q:txtTax16A=".request('frm2550q:txtTax16A')."frm2550q:txtTax16A=</div>	
            <div>frm2550q:txtTax16B=".request('frm2550q:txtTax16B')."frm2550q:txtTax16B=</div>	
            <div>frm2550q:txtTax17=".request('frm2550q:txtTax17')."frm2550q:txtTax17=</div>	
            <div>frm2550q:txtTax18=".request('frm2550q:txtTax18')."frm2550q:txtTax18=</div>	
            <div>frm2550q:txtTax19A=".request('frm2550q:txtTax19A')."frm2550q:txtTax19A=</div>	
            <div>frm2550q:txtTax19B=".request('frm2550q:txtTax19B')."frm2550q:txtTax19B=</div>	
            <div>frm2550q:txtTax20A=".request('frm2550q:txtTax20A')."frm2550q:txtTax20A=</div>	
            <div>frm2550q:txtTax20B=".request('frm2550q:txtTax20B')."frm2550q:txtTax20B=</div>	
            <div>frm2550q:txtTax20C=".request('frm2550q:txtTax20C')."frm2550q:txtTax20C=</div>	
            <div>frm2550q:txtTax20D=".request('frm2550q:txtTax20D')."frm2550q:txtTax20D=</div>	
            <div>frm2550q:txtTax20E=".request('frm2550q:txtTax20E')."frm2550q:txtTax20E=</div>	
            <div>frm2550q:txtTax20F=".request('frm2550q:txtTax20F')."frm2550q:txtTax20F=</div>	
            <div>frm2550q:txtTax21A=".request('frm2550q:txtTax21A')."frm2550q:txtTax21A=</div>	
            <div>frm2550q:txtTax21B=".request('frm2550q:txtTax21B')."frm2550q:txtTax21B=</div>	
            <div>frm2550q:txtTax21C=".request('frm2550q:txtTax21C')."frm2550q:txtTax21C=</div>	
            <div>frm2550q:txtTax21D=".request('frm2550q:txtTax21D')."frm2550q:txtTax21D=</div>	
            <div>frm2550q:txtTax21E=".request('frm2550q:txtTax21E')."frm2550q:txtTax21E=</div>	
            <div>frm2550q:txtTax21F=".request('frm2550q:txtTax21F')."frm2550q:txtTax21F=</div>	
            <div>frm2550q:txtTax21G=".request('frm2550q:txtTax21G')."frm2550q:txtTax21G=</div>	
            <div>frm2550q:txtTax21H=".request('frm2550q:txtTax21H')."frm2550q:txtTax21H=</div>	
            <div>frm2550q:txtTax21I=".request('frm2550q:txtTax21I')."frm2550q:txtTax21I=</div>	
            <div>frm2550q:txtTax21J=".request('frm2550q:txtTax21J')."frm2550q:txtTax21J=</div>	
            <div>frm2550q:txtTax21K=".request('frm2550q:txtTax21K')."frm2550q:txtTax21K=</div>	
            <div>frm2550q:txtTax21L=".request('frm2550q:txtTax21L')."frm2550q:txtTax21L=</div>	
            <div>frm2550q:txtTax21M=".request('frm2550q:txtTax21M')."frm2550q:txtTax21M=</div>	
            <div>frm2550q:txtTax21N=".request('frm2550q:txtTax21N')."frm2550q:txtTax21N=</div>	
            <div>frm2550q:txtTax21O=".request('frm2550q:txtTax21O')."frm2550q:txtTax21O=</div>	
            <div>frm2550q:txtTax21P=".request('frm2550q:txtTax21P')."frm2550q:txtTax21P=</div>	
            <div>frm2550q:txtTax22=".request('frm2550q:txtTax22')."frm2550q:txtTax22=</div>	
            <div>frm2550q:txtTax23A=".request('frm2550q:txtTax23A')."frm2550q:txtTax23A=</div>	
            <div>frm2550q:txtTax23B=".request('frm2550q:txtTax23B')."frm2550q:txtTax23B=</div>	
            <div>frm2550q:txtTax23C=".request('frm2550q:txtTax23C')."frm2550q:txtTax23C=</div>	
            <div>frm2550q:txtTax23D=".request('frm2550q:txtTax23D')."frm2550q:txtTax23D=</div>	
            <div>frm2550q:txtTax23E=".request('frm2550q:txtTax23E')."frm2550q:txtTax23E=</div>	
            <div>frm2550q:txtTax23F=".request('frm2550q:txtTax23F')."frm2550q:txtTax23F=</div>	
            <div>frm2550q:txtTax24=".request('frm2550q:txtTax24')."frm2550q:txtTax24=</div>	
            <div>frm2550q:txtTax25=".request('frm2550q:txtTax25')."frm2550q:txtTax25=</div>	
            <div>frm2550q:txtTax26A=".request('frm2550q:txtTax26A')."frm2550q:txtTax26A=</div>	
            <div>frm2550q:txtTax26B=".request('frm2550q:txtTax26B')."frm2550q:txtTax26B=</div>	
            <div>frm2550q:txtTax26C=".request('frm2550q:txtTax26C')."frm2550q:txtTax26C=</div>	
            <div>frm2550q:txtTax26D=".request('frm2550q:txtTax26D')."frm2550q:txtTax26D=</div>	
            <div>frm2550q:txtTax26E=".request('frm2550q:txtTax26E')."frm2550q:txtTax26E=</div>	
            <div>frm2550q:txtTax26F=".request('frm2550q:txtTax26F')."frm2550q:txtTax26F=</div>	
            <div>frm2550q:txtTax26G=".request('frm2550q:txtTax26G')."frm2550q:txtTax26G=</div>	
            <div>frm2550q:txtTax26H=".request('frm2550q:txtTax26H')."frm2550q:txtTax26H=</div>	
            <div>frm2550q:txtTax27=".request('frm2550q:txtTax27')."frm2550q:txtTax27=</div>	
            <div>frm2550q:txtTax28A=".request('frm2550q:txtTax28A')."frm2550q:txtTax28A=</div>	
            <div>frm2550q:txtTax28B=".request('frm2550q:txtTax28B')."frm2550q:txtTax28B=</div>	
            <div>frm2550q:txtTax28C=".request('frm2550q:txtTax28C')."frm2550q:txtTax28C=</div>	
            <div>frm2550q:txtTax28D=".request('frm2550q:txtTax28D')."frm2550q:txtTax28D=</div>	
            <div>frm2550q:txtTax29=".request('frm2550q:txtTax29')."frm2550q:txtTax29=</div>	
            ".$sched1."<div>txtmodaltxtTotal15A=".request('txtmodaltxtTotal15A')."txtmodaltxtTotal15A=</div>	
            <div>txtmodaltxtTotal15B=".request('txtmodaltxtTotal15B')."txtmodaltxtTotal15B=</div>	
            <div>AtcCode1=".(null !==  request('AtcCode1') ? 'true' : 'false')."AtcCode1=</div>	
            <div>AtcCode2=".(null !==  request('AtcCode2') ? 'true' : 'false')."AtcCode2=</div>	
            <div>AtcCode3=".(null !==  request('AtcCode3') ? 'true' : 'false')."AtcCode3=</div>	
            <div>AtcCode4=".(null !==  request('AtcCode4') ? 'true' : 'false')."AtcCode4=</div>	
            <div>AtcCode5=".(null !==  request('AtcCode5') ? 'true' : 'false')."AtcCode5=</div>	
            <div>AtcCode6=".(null !==  request('AtcCode6') ? 'true' : 'false')."AtcCode6=</div>	
            <div>AtcCode7=".(null !==  request('AtcCode7') ? 'true' : 'false')."AtcCode7=</div>	
            <div>AtcCode8=".(null !==  request('AtcCode8') ? 'true' : 'false')."AtcCode8=</div>	
            <div>AtcCode9=".(null !==  request('AtcCode9') ? 'true' : 'false')."AtcCode9=</div>	
            <div>AtcCode10=".(null !==  request('AtcCode10') ? 'true' : 'false')."AtcCode10=</div>	
            <div>AtcCode11=".(null !==  request('AtcCode11') ? 'true' : 'false')."AtcCode11=</div>	
            <div>AtcCode12=".(null !==  request('AtcCode12') ? 'true' : 'false')."AtcCode12=</div>	
            <div>AtcCode13=".(null !==  request('AtcCode13') ? 'true' : 'false')."AtcCode13=</div>	
            <div>AtcCode14=".(null !==  request('AtcCode14') ? 'true' : 'false')."AtcCode14=</div>	
            <div>AtcCode15=".(null !==  request('AtcCode15') ? 'true' : 'false')."AtcCode15=</div>	
            <div>AtcCode16=".(null !==  request('AtcCode16') ? 'true' : 'false')."AtcCode16=</div>	
            <div>AtcCode17=".(null !==  request('AtcCode17') ? 'true' : 'false')."AtcCode17=</div>	
            <div>AtcCode18=".(null !==  request('AtcCode18') ? 'true' : 'false')."AtcCode18=</div>	
            <div>AtcCode19=".(null !==  request('AtcCode19') ? 'true' : 'false')."AtcCode19=</div>	
            <div>AtcCode20=".(null !==  request('AtcCode20') ? 'true' : 'false')."AtcCode20=</div>	
            <div>AtcCode21=".(null !==  request('AtcCode21') ? 'true' : 'false')."AtcCode21=</div>	
            <div>AtcCode22=".(null !==  request('AtcCode22') ? 'true' : 'false')."AtcCode22=</div>	
            <div>AtcCode23=".(null !==  request('AtcCode23') ? 'true' : 'false')."AtcCode23=</div>	
            <div>AtcCode24=".(null !==  request('AtcCode24') ? 'true' : 'false')."AtcCode24=</div>	
            <div>AtcCode25=".(null !==  request('AtcCode25') ? 'true' : 'false')."AtcCode25=</div>	
            <div>AtcCode26=".(null !==  request('AtcCode26') ? 'true' : 'false')."AtcCode26=</div>	
            <div>AtcCode27=".(null !==  request('AtcCode27') ? 'true' : 'false')."AtcCode27=</div>	
            <div>AtcCode28=".(null !==  request('AtcCode28') ? 'true' : 'false')."AtcCode28=</div>	
            <div>AtcCode29=".(null !==  request('AtcCode29') ? 'true' : 'false')."AtcCode29=</div>	
            <div>AtcCode30=".(null !==  request('AtcCode30') ? 'true' : 'false')."AtcCode30=</div>	
            <div>AtcCode31=".(null !==  request('AtcCode31') ? 'true' : 'false')."AtcCode31=</div>	
            <div>AtcCode32=".(null !==  request('AtcCode32') ? 'true' : 'false')."AtcCode32=</div>	
            <div>AtcCode33=".(null !==  request('AtcCode33') ? 'true' : 'false')."AtcCode33=</div>	
            <div>AtcCode34=".(null !==  request('AtcCode34') ? 'true' : 'false')."AtcCode34=</div>	
            <div>AtcCode35=".(null !==  request('AtcCode35') ? 'true' : 'false')."AtcCode35=</div>	
            <div>AtcCode36=".(null !==  request('AtcCode36') ? 'true' : 'false')."AtcCode36=</div>	
            <div>AtcCode37=".(null !==  request('AtcCode37') ? 'true' : 'false')."AtcCode37=</div>	
            <div>AtcCode38=".(null !==  request('AtcCode38') ? 'true' : 'false')."AtcCode38=</div>	
            <div>AtcCode39=".(null !==  request('AtcCode39') ? 'true' : 'false')."AtcCode39=</div>	
            <div>AtcCode40=".(null !==  request('AtcCode40') ? 'true' : 'false')."AtcCode40=</div>	
            <div>AtcCode41=".(null !==  request('AtcCode41') ? 'true' : 'false')."AtcCode41=</div>	
            <div>AtcCode42=".(null !==  request('AtcCode42') ? 'true' : 'false')."AtcCode42=</div>	
            <div>AtcCode43=".(null !==  request('AtcCode43') ? 'true' : 'false')."AtcCode43=</div>	
            ".$sched2."<div>txtmodalTotalAmt=".request('txtmodalTotalAmt')."txtmodalTotalAmt=</div>	
            <div>txtmodalTotalInputTax=".request('txtmodalTotalInputTax')."txtmodalTotalInputTax=</div>	
            ".$sched3A."<div>txtmodalTotalAmountSched3=".request('txtmodalTotalAmountSched3')."txtmodalTotalAmountSched3=</div>	
            <div>txtmodalTotalInputTaxSched3=".request('txtmodalTotalInputTaxSched3')."txtmodalTotalInputTaxSched3=</div>	
            <div>txtmodalTotalBalanceSched3A=".request('txtmodalTotalBalanceSched3A')."txtmodalTotalBalanceSched3A=</div>	
            ".$sched3B."<div>txtmodalTotalBalanceSched3B=".request('txtmodalTotalBalanceSched3B')."txtmodalTotalBalanceSched3B=</div>	
            <div>txtmodalTotalInputTax20ASched3=".request('txtmodalTotalInputTax20ASched3')."txtmodalTotalInputTax20ASched3=</div>	
            <div>txtinputtaxSched4=".request('txtinputtaxSched4')."txtinputtaxSched4=</div>	
            <div>txtTaxableSaleSched4=".request('txtTaxableSaleSched4')."txtTaxableSaleSched4=</div>	
            <div>txtInputTaxnotDirectSched4=".request('txtInputTaxnotDirectSched4')."txtInputTaxnotDirectSched4=</div>	
            <div>txtTotalInputTaxnotDirectSched4=".request('txtTotalInputTaxnotDirectSched4')."txtTotalInputTaxnotDirectSched4=</div>	
            <div>txtTotalSaleSched4=".request('txtTotalSaleSched4')."txtTotalSaleSched4=</div>	
            <div>txtTotalInputSaletoGovernmentSched4=".request('txtTotalInputSaletoGovernmentSched4')."txtTotalInputSaletoGovernmentSched4=</div>	
            <div>txtlessStdTaxSched4=".request('txtlessStdTaxSched4')."txtlessStdTaxSched4=</div>	
            <div>txtTotal20BSched4=".request('txtTotal20BSched4')."txtTotal20BSched4=</div>	
            <div>txtinputtaxSched5=".request('txtinputtaxSched5')."txtinputtaxSched5=</div>	
            <div>txtTotSaleSched5=".request('txtTotSaleSched5')."txtTotSaleSched5=</div>	
            <div>txtAmountInputnotDirectSched5=".request('txtAmountInputnotDirectSched5')."txtAmountInputnotDirectSched5=</div>	
            <div>txtProductnotDirectSched5=".request('txtProductnotDirectSched5')."txtProductnotDirectSched5=</div>	
            <div>txtSumTotalSaleSched5=".request('txtSumTotalSaleSched5')."txtSumTotalSaleSched5=</div>	
            <div>txtTotal20CSched5=".request('txtTotal20CSched5')."txtTotal20CSched5=</div>	
            ".$sched6."<div>txtmodalTotal23A=".request('txtmodalTotal23A')."txtmodalTotal23A=</div>	
            <div>txtmodalTotalSched6AppliedCurrent=".request('txtmodalTotalSched6AppliedCurrent')."txtmodalTotalSched6AppliedCurrent=</div>	
            ".$sched7."<div>txtmodalTotal23B=".request('txtmodalTotal23B')."txtmodalTotal23B=</div>	
            <div>txtmodalTotalSched7AppliedCurrent=".request('txtmodalTotalSched7AppliedCurrent')."txtmodalTotalSched7AppliedCurrent=</div>	
            ".$sched8."<div>txtmodalTotal23C=".request('txtmodalTotal23C')."txtmodalTotal23C=</div>	
            <div>txtmodalTotalSched8AppliedCurrent=".request('txtmodalTotalSched8AppliedCurrent')."txtmodalTotalSched8AppliedCurrent=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=mcevano1996@sjcgroup.phtxtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm2550q:txtTIN1').request('frm2550q:txtTIN2').request('frm2550q:txtTIN3').request('frm2550q:txtBranchCode');

        $return_period = request('frm2550q:RtnMonth')."/".request('frm2550q:txtYear')."-Q".request('frm2550q:OptQuarter');

        $getReturnPeriod = tbl_2550Q::where('company_id',  request('company'))
                            ->where('item1B', request('frm2550q:RtnMonth'))
                            ->where('item1C', request('frm2550q:txtYear'))
                            ->where('item2', request('frm2550q:OptQuarter'))
                            ->count();
            
        $filename = "";
        if($getReturnPeriod == "1"){
            $filename = $tin."-2550Q-".request('frm2550q:RtnMonth').request('frm2550q:txtYear').'Q'.request('frm2550q:OptQuarter').'.xml';
        }else{
            if(request('form_id') != ""){
                $getXml = Xml::where('user_id', Auth::user()->id)
                        ->where('company_id', request('company'))
                        ->where('form_id', $form->id)
                        ->where('form', '2550Q')
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
            $filename = $tin."-2550Q-".request('frm2550q:RtnMonth').request('frm2550q:txtYear').'Q'.request('frm2550q:OptQuarter').$ext.'.xml';
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
            'form'          => '2550Q',
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
                            ->where('form', '2550Q')
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
                            ->where('form', '2550Q')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2550Q::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2550Q')
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
        $data = tbl_2550Q::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2550Q')
                            ->get();
        return view('forms.BIR-Form 2550Q',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

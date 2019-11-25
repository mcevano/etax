<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2550M;
use App\tbl_2550M_schedule1;
use App\tbl_2550M_schedule2;
use App\tbl_2550M_schedule3a;
use App\tbl_2550M_schedule3b;
use App\tbl_2550M_schedule4;
use App\tbl_2550M_schedule5;
use App\tbl_2550M_schedule6;
use App\tbl_2550M_schedule7;
use App\tbl_2550M_schedule8;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2550MController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        $atc = DB::table('2550m_atcs')->get();
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
            if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2550_ms')){

            }else{
                Schema::connection('mysql2')->create('tbl_2550_ms', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A');
                    $table->string('item1B');
                    $table->string('item2');
                    $table->string('item3');
                    $table->string('item11');
                    $table->string('item11_others')->nullable();
                    $table->text('item12A');
                    $table->text('item12B');
                    $table->text('item13A');
                    $table->text('item13B');
                    $table->text('item14');
                    $table->text('item15');
                    $table->text('item16A');
                    $table->text('item16B');
                    $table->text('item17A');
                    $table->text('item17B');
                    $table->text('item17C');
                    $table->text('item17D');
                    $table->text('item17E');
                    $table->text('item17F');
                    $table->text('item18A');
                    $table->text('item18B');
                    $table->text('item18C');
                    $table->text('item18D');
                    $table->text('item18E');
                    $table->text('item18F');
                    $table->text('item18G');
                    $table->text('item18H');
                    $table->text('item18I');
                    $table->text('item18J');
                    $table->text('item18K');
                    $table->text('item18L');
                    $table->text('item18M');
                    $table->text('item18N');
                    $table->text('item18O');
                    $table->text('item18P');
                    $table->text('item19');
                    $table->text('item20A');
                    $table->text('item20B');
                    $table->text('item20C');
                    $table->text('item20D');
                    $table->text('item20E');
                    $table->text('item20F');
                    $table->text('item21');
                    $table->text('item22');
                    $table->text('item23A');
                    $table->text('item_total23A');
                    $table->text('item23B');
                    $table->text('item_total23B');
                    $table->text('item23C');
                    $table->text('item_total23C');
                    $table->text('item23D');
                    $table->text('item23E');
                    $table->text('item23F');
                    $table->text('item23G');
                    $table->text('item24');
                    $table->text('item25A');
                    $table->text('item25B');
                    $table->text('item25C');
                    $table->text('item25D');
                    $table->text('item26');
                    $table->text('item_balance_sched3A');
                    $table->text('item_balance_sched3B');
                    $table->text('tsp');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_m_schedule1s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc')->nullable();
                    $table->text('description')->nullable();
                    $table->text('amount')->nullable();
                    $table->text('output')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_m_schedule2s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('date_purchased')->nullable();
                    $table->text('description')->nullable();
                    $table->text('amount')->nullable();
                    $table->text('tax')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_m_schedule3as', function (Blueprint $table) {
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

                Schema::connection('mysql2')->create('tbl_2550_m_schedule3bs', function (Blueprint $table) {
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

                Schema::connection('mysql2')->create('tbl_2550_m_schedule4s', function (Blueprint $table) {
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

                Schema::connection('mysql2')->create('tbl_2550_m_schedule5s', function (Blueprint $table) {
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

                Schema::connection('mysql2')->create('tbl_2550_m_schedule6s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('period')->nullable();
                    $table->text('witholding')->nullable();
                    $table->text('income')->nullable();
                    $table->text('withheld')->nullable();
                    $table->text('current')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_m_schedule7s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('period')->nullable();
                    $table->text('miller')->nullable();
                    $table->text('taxpayer')->nullable();
                    $table->text('receipt')->nullable();
                    $table->text('amount')->nullable();
                    $table->text('current')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2550_m_schedule8s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('period')->nullable();
                    $table->text('witholding')->nullable();
                    $table->text('income')->nullable();
                    $table->text('tax')->nullable();
                    $table->text('current')->nullable();
                    $table->timestamps();
                });

            }
        	return view('forms.BIR-Form 2550M',['company' => $company, 'atc' => $atc, 'form_no' => $form_id, 'action' => $action]);
        }else{
            $data = tbl_2550M::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2550M')
                            ->get();
                            
            return view('forms.BIR-Form 2550M',['company' => $company, 'data' => $data, 'xml' => $xml, 'action' => $action]);
        }
    }
    public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
            'form_no'      => request('form_no'),
            'company_id'   => request('company'),
            'item1A'       =>  request('frm2550m:RtnYear'),
            'item1B'       =>  request('frm2550m:txtYear'),
            'item2'        =>  request('frm2550m:OptAmendedYN'),
            'item3'        =>  request('frm2550m:txtSheets'),
            'item11'       =>  request('frm2550m:OptSpecialTax'),
            'item11_others'=>  request('frm2550m:lstSpecialTax'),
            'item12A'      =>  request('frm2550m:txtTax12A'),
            'item12B'      =>  request('frm2550m:txtTax12B'),
            'item13A'      =>  request('frm2550m:txtTax13A'),
            'item13B'      =>  request('frm2550m:txtTax13B'),
            'item14'       =>  request('frm2550m:txtTax14'),
            'item15'       =>  request('frm2550m:txtTax15'),
            'item16A'      =>  request('frm2550m:txtTax16A'),
            'item16B'      =>  request('frm2550m:txtTax16B'),
            'item17A'      =>  request('frm2550m:txtTax17A'),
            'item17B'      =>  request('frm2550m:txtTax17B'),
            'item17C'      =>  request('frm2550m:txtTax17C'),
            'item17D'      =>  request('frm2550m:txtTax17D'),
            'item17E'      =>  request('frm2550m:txtTax17E'),
            'item17F'      =>  request('frm2550m:txtTax17F'),
            'item18A'      =>  request('frm2550m:txtTax18A'),
            'item18B'      =>  request('frm2550m:txtTax18B'),
            'item18C'      =>  request('frm2550m:txtTax18C'),
            'item18D'      =>  request('frm2550m:txtTax18D'),
            'item18E'      =>  request('frm2550m:txtTax18E'),
            'item18F'      =>  request('frm2550m:txtTax18F'),
            'item18G'      =>  request('frm2550m:txtTax18G'),
            'item18H'      =>  request('frm2550m:txtTax18H'),
            'item18I'      =>  request('frm2550m:txtTax18I'),
            'item18J'      =>  request('frm2550m:txtTax18J'),
            'item18K'      =>  request('frm2550m:txtTax18K'),
            'item18L'      =>  request('frm2550m:txtTax18L'),
            'item18M'      =>  request('frm2550m:txtTax18M'),
            'item18N'      =>  request('frm2550m:txtTax18N'),
            'item18O'      =>  request('frm2550m:txtTax18O'),
            'item18P'      =>  request('frm2550m:txtTax18P'),
            'item19'       =>  request('frm2550m:txtTax19'),
            'item20A'      =>  request('frm2550m:txtTax20A'),
            'item20B'      =>  request('frm2550m:txtTax20B'),
            'item20C'      =>  request('frm2550m:txtTax20C'),
            'item20D'      =>  request('frm2550m:txtTax20D'),
            'item20E'      =>  request('frm2550m:txtTax20E'),
            'item20F'      =>  request('frm2550m:txtTax20F'),
            'item21'       =>  request('frm2550m:txtTax21'),
            'item22'       =>  request('frm2550m:txtTax22'),
            'item23A'      =>  request('frm2550m:txtTax23A'),
            'item_total23A'=>  request('txtmodalTotal23A'),
            'item23B'      =>  request('frm2550m:txtTax23B'),
            'item_total23B'=>  request('txtmodalTotal23B'),
            'item23C'      =>  request('frm2550m:txtTax23C'),
            'item_total23C'=>  request('txtmodalTotal23C'),
            'item23D'      =>  request('frm2550m:txtTax23D'),
            'item23E'      =>  request('frm2550m:txtTax23E'),
            'item23F'      =>  request('frm2550m:txtTax23F'),
            'item23G'      =>  request('frm2550m:txtTax23G'),
            'item24'       =>  request('frm2550m:txtTax24'),
            'item25A'      =>  request('frm2550m:txtTax25A'),
            'item25B'      =>  request('frm2550m:txtTax25B'),
            'item25C'      =>  request('frm2550m:txtTax25C'),
            'item25D'      =>  request('frm2550m:txtTax25D'),
            'item26'       =>  request('frm2550m:txtTax26'),
            'item_balance_sched3A' =>  request('txtmodalTotalBalanceSched3A'),
            'item_balance_sched3B' =>  request('txtmodalTotalBalanceSched3B'),
        ]);
        
        $getForm = tbl_2550M::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();
        
        $form = "";
        $trans = "";
        if(request('form_id') != ""){
            $form = tbl_2550M::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2550M::create($data);
                $trans = "insert";
            }else{
                $form = tbl_2550M::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }
        
        if($trans == "update"){
            tbl_2550M_schedule1::where('form_id', $getForm[0]->id)->delete();
            tbl_2550M_schedule2::where('form_id', $getForm[0]->id)->delete();
            tbl_2550M_schedule3a::where('form_id', $getForm[0]->id)->delete();
            tbl_2550M_schedule3b::where('form_id', $getForm[0]->id)->delete();
            tbl_2550M_schedule4::where('form_id', $getForm[0]->id)->delete();
            tbl_2550M_schedule5::where('form_id', $getForm[0]->id)->delete();
            tbl_2550M_schedule6::where('form_id', $getForm[0]->id)->delete();
            tbl_2550M_schedule7::where('form_id', $getForm[0]->id)->delete();
            tbl_2550M_schedule8::where('form_id', $getForm[0]->id)->delete();
        }

        if( null !== request('frm2550m:txtAtcCde')){
            for ($i=0; $i < count(request('frm2550m:txtAtcCde')) ; $i++) { 
                $sched1 = ([
                    'form_id'    => $form->id,
                    'atc'       => request('frm2550m:txtAtcCde')[$i],
                    'description' => request('txtNaturePayment')[$i],
                    'amount'    => request('frm2550m:txtAmountSales')[$i],
                    'output'    => request('frm2550m:txtOutputTax')[$i],
                ]);

                tbl_2550M_schedule1::create($sched1);
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

                tbl_2550M_schedule2::create($sched2);  
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

                tbl_2550M_schedule3a::create($sched3a);  
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

                tbl_2550M_schedule3b::create($sched3b);
            }
        }

        if(null !==  request('txtinputtaxSched4')){
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

            tbl_2550M_schedule4::create($sched4);
        }

        if(null !==  request('txtinputtaxSched5')){
            $sched5 = ([
                'form_id'            => $form->id,
                'tax'               => request('txtinputtaxSched5'),
                'taxable_sales'      => request('txtTotSaleSched5'),
                'input_not_direct'    => request('txtAmountInputnotDirectSched5'),
                'product_not_direct'  => request('txtProductnotDirectSched5'),
                'total_sum'          => request('txtSumTotalSaleSched5'),
                'total'             => request('txtTotal20CSched5'),
            ]);

            tbl_2550M_schedule5::create($sched5);
        }

        if(null !==  request('txtNameAgent')){
            for ($i=0; $i < count(request('txtNameAgent')) ; $i++) { 
                $sched6 = ([
                    'form_id'    => $form->id,
                    'period'    => request('txtPeriodCovered')[$i],
                    'witholding'=> request('txtNameAgent')[$i],
                    'income'    => request('txtIncomePayment')[$i],
                    'withheld'   => request('txtTotalWithheld')[$i],
                    'current'   => request('txtAppliedCurr')[$i],
                ]);

                tbl_2550M_schedule6::create($sched6);
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
                    'current'   => request('txtAppliedCurrSch7')[$i],
                ]);

                tbl_2550M_schedule7::create($sched7);
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
                    'current'   => request('txtAppliedCurrSch8')[$i],
                ]);

                tbl_2550M_schedule8::create($sched8);
            }
        }

        $OptAmendedYN1 = "false";
        $OptAmendedYN2 = "false";
        if(request('frm2550m:OptAmendedYN') == 'Y'){
            $OptAmendedYN1 = "true";
        }else if(request('frm2550m:OptAmendedYN') == 'N'){
            $OptAmendedYN2 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm2550m:txtTaxPayerName'));

        $address = rawurlencode(request('frm2550m:txtAddress'));

        $lineOfBusiness =  rawurlencode(request('frm2550m:txtLineBus'));

        $OptSpecialTax1 = "false";
        $OptSpecialTax2 = "false";
        if(request('frm2550m:OptSpecialTax') == 'Y'){
            $OptSpecialTax1 = "true";
        }else if(request('frm2550m:OptSpecialTax') == 'N'){
            $OptSpecialTax2 = "true";
        }

        $sched1 = "";
        if(null !==  request('frm2550m:txtAtcCde')[0]){
            $countATC = count(request('frm2550m:txtAtcCde'));
            for ($i=0; $i <= $countATC - 1 ; $i++) { 
                $sched1 .= "<div>frm2550m:txtAtcCde".($i + 1)."=".request('frm2550m:txtAtcCde')[$i]."frm2550m:txtAtcCde".($i + 1)."=</div>	
            <div>frm2550m:txtAmountSales".($i + 1)."=".request('frm2550m:txtAmountSales')[$i]."frm2550m:txtAmountSales".($i + 1)."=</div>	
            <div>frm2550m:txtOutputTax".($i + 1)."=".request('frm2550m:txtOutputTax')[$i]."frm2550m:txtOutputTax".($i + 1)."=</div>	
            ";
            }
        }
        
        $sched2 = "";
        if(null !==  request('txtDatePurchased')[0]){
            $countRow = count(request('txtDatePurchased'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched2 .= "
            <div>chxSched2".$i."=".(null !==  request('chxSched2'.$i.'') ? 'true' : 'false')."chxSched2".$i."=</div>	
            <div>txtDatePurchased".$i."=".request('txtDatePurchased')[$i]."txtDatePurchased".$i."=</div>	
            <div>txtDescription".$i."=".request('txtDescription')[$i]."txtDescription".$i."=</div>	
            <div>txtAmt".$i."=".request('txtAmt')[$i]."txtAmt".$i."=</div>	
            <div>txtInputTax".$i."=".request('txtInputTax')[$i]."txtInputTax".$i."=</div>	";
            }
        }
        
        $sched3A = "";
        if(null !==  request('txtDatePurchased3A')[0]){
            $countRow = count(request('txtDatePurchased3A'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched3A .= "
            <div>chxSched3A".$i."=".(null !==  request('chxSched3A'.$i.'') ? 'true' : 'false')."chxSched3A".$i."=</div>	
            <div>txtDatePurchased3A".$i."=".request('txtDatePurchased3A')[$i]."txtDatePurchased3A".$i."=</div>	
            <div>txtDescription3A".$i."=".request('txtDescription3A')[$i]."txtDescription3A".$i."=</div>	
            <div>txtAmt3A".$i."=".request('txtAmt3A')[$i]."txtAmt3A".$i."=</div>	
            <div>txtInputTax3A".$i."=".request('txtInputTax3A')[$i]."txtInputTax3A".$i."=</div>	
            <div>txtEstLife3A".$i."=".request('txtEstLife3A')[$i]."txtEstLife3A".$i."=</div>	
            <div>txtRecogLife3A".$i."=".request('txtRecogLife3A')[$i]."txtRecogLife3A".$i."=</div>	
            <div>txtAllowInputTax3A".$i."=".request('txtAllowInputTax3A')[$i]."txtAllowInputTax3A".$i."=</div>	
            <div>txtBalInputTax3A".$i."=".request('txtBalInputTax3A')[$i]."txtBalInputTax3A".$i."=</div>	";
            }
        }
        
        $sched3B = "";
        if(null !==  request('txtDatePurchased3B')[0]){
            $countRow = count(request('txtDatePurchased3B'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched3B .= "
            <div>chxSched3B".$i."=".(null !==  request('chxSched3B'.$i.'') ? 'true' : 'false')."chxSched3B".$i."=</div>	
            <div>txtDatePurchased3B".$i."=".request('txtDatePurchased3B')[$i]."txtDatePurchased3B".$i."=</div>	
            <div>txtDescription3B".$i."=".request('txtDescription3B')[$i]."txtDescription3B".$i."=</div>	
            <div>txtAmt3B".$i."=".request('txtAmt3B')[$i]."txtAmt3B".$i."=</div>	
            <div>txtBalInputTaxPrevious3B".$i."=".request('txtBalInputTaxPrevious3B')[$i]."txtBalInputTaxPrevious3B".$i."=</div>	
            <div>txtEstLife3B".$i."=".request('txtEstLife3B')[$i]."txtEstLife3B".$i."=</div>	
            <div>txtRecogLife3B".$i."=".request('txtRecogLife3B')[$i]."txtRecogLife3B".$i."=</div>	
            <div>txtAllowInputTax3B".$i."=".request('txtAllowInputTax3B')[$i]."txtAllowInputTax3B".$i."=</div>	
            <div>txtBalInputTax3B".$i."=".request('txtBalInputTax3B')[$i]."txtBalInputTax3B".$i."=</div>	";
            }
        }
        
        $sched6 = "";
        if(null !==  request('txtPeriodCovered')[0]){
            $countRow = count(request('txtPeriodCovered'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched6 .= "
            <div>chxSched6".$i."=".(null !==  request('chxSched6'.$i.'') ? 'true' : 'false')."chxSched6".$i."=</div>	
            <div>txtPeriodCovered".$i."=".request('txtPeriodCovered')[$i]."txtPeriodCovered".$i."=</div>	
            <div>txtNameAgent".$i."=".request('txtNameAgent')[$i]."txtNameAgent".$i."=</div>	
            <div>txtIncomePayment".$i."=".request('txtIncomePayment')[$i]."txtIncomePayment".$i."=</div>	
            <div>txtTotalWithheld".$i."=".request('txtTotalWithheld')[$i]."txtTotalWithheld".$i."=</div>	
            <div>txtAppliedCurr".$i."=".request('txtAppliedCurr')[$i]."txtAppliedCurr".$i."=</div>	";
            }
        }
        
        $sched7 = "";
        if(null !==  request('txtPeriodCoveredSch7')[0]){
            $countRow = count(request('txtPeriodCoveredSch7'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched7 .= "
            <div>chxSched7".$i."=".(null !==  request('chxSched7'.$i.'') ? 'true' : 'false')."chxSched7".$i."=</div>	
            <div>txtPeriodCoveredSch7".$i."=".request('txtPeriodCoveredSch7')[$i]."txtPeriodCoveredSch7".$i."=</div>	
            <div>txtNameMillerSch7".$i."=".request('txtNameMillerSch7')[$i]."txtNameMillerSch7".$i."=</div>	
            <div>txtNameTaxPayerSch7".$i."=".request('txtNameTaxPayerSch7')[$i]."txtNameTaxPayerSch7".$i."=</div>	
            <div>txtORNumSch7".$i."=".request('txtORNumSch7')[$i]."txtORNumSch7".$i."=</div>	
            <div>txtAmountPaidSch7".$i."=".request('txtAmountPaidSch7')[$i]."txtAmountPaidSch7".$i."=</div>	
            <div>txtAppliedCurrSch7".$i."=".request('txtAppliedCurrSch7')[$i]."txtAppliedCurrSch7".$i."=</div>	";
            }
        }
	
		$sched8 = "";
        if(null !==  request('txtPeriodCoveredSch8')[0]){
            $countRow = count(request('txtPeriodCoveredSch8'));
            for ($i=0; $i <= $countRow - 1 ; $i++) { 
                $sched8 .= "
            <div>chxSched8".$i."=".(null !==  request('chxSched8'.$i.'') ? 'true' : 'false')."chxSched8".$i."=</div>	
            <div>txtPeriodCoveredSch8".$i."=".request('txtPeriodCoveredSch8')[$i]."txtPeriodCoveredSch8".$i."=</div>	
            <div>txtNameAgentSch8".$i."=".request('txtNameAgentSch8')[$i]."txtNameAgentSch8".$i."=</div>	
            <div>txtIncomePaymentSch8".$i."=".request('txtIncomePaymentSch8')[$i]."txtIncomePaymentSch8".$i."=</div>	
            <div>txtTotalWithheldSch8".$i."=".request('txtTotalWithheldSch8')[$i]."txtTotalWithheldSch8".$i."=</div>	
            <div>txtAppliedCurrSch8".$i."=".request('txtAppliedCurrSch8')[$i]."txtAppliedCurrSch8".$i."=</div>	";
            }
        }
        
        $xmlData ="<?xml version='1.0'?>	
            <div>frm2550m:RtnYear=".request('frm2550m:RtnYear')."frm2550m:RtnYear=</div>	
            <div>frm2550m:txtYear=".request('frm2550m:txtYear')."frm2550m:txtYear=</div>	
            <div>frm2550m:OptAmendedYN1=".$OptAmendedYN1."frm2550m:OptAmendedYN1=</div>	
            <div>frm2550m:OptAmendedYN2=".$OptAmendedYN2."frm2550m:OptAmendedYN2=</div>	
            <div>frm2550m:txtSheets=".request('frm2550m:txtSheets')."frm2550m:txtSheets=</div>	
            <div>frm2550m:txtTIN1=".request('frm2550m:txtTIN1')."frm2550m:txtTIN1=</div>	
            <div>frm2550m:txtTIN2=".request('frm2550m:txtTIN2')."frm2550m:txtTIN2=</div>	
            <div>frm2550m:txtTIN3=".request('frm2550m:txtTIN3')."frm2550m:txtTIN3=</div>	
            <div>frm2550m:txtBranchCode=".request('frm2550m:txtBranchCode')."frm2550m:txtBranchCode=</div>	
            <div>frm2550m:txtRDOCode=".request('frm2550m:txtRDOCode')."frm2550m:txtRDOCode=</div>	
            <div>frm2550m:txtLineBus=".$lineOfBusiness."frm2550m:txtLineBus=</div>	
            <div>frm2550m:txtTaxPayerName=".$taxPayerName."frm2550m:txtTaxPayerName=</div>	
            <div>frm2550m:txtTelephoneNum=".request('frm2550m:txtTelephoneNum')."frm2550m:txtTelephoneNum=</div>	
            <div>frm2550m:txtAddress=".$address."frm2550m:txtAddress=</div>	
            <div>frm2550m:txtZipCode=".request('frm2550m:txtZipCode')."frm2550m:txtZipCode=</div>	
            <div>frm2550m:OptSpecialTax1=".$OptSpecialTax1."frm2550m:OptSpecialTax1=</div>	
            <div>frm2550m:OptSpecialTax2=".$OptSpecialTax2."frm2550m:OptSpecialTax2=</div>	
            <div>frm2550m:lstSpecialTax=".request('frm2550m:lstSpecialTax')."frm2550m:lstSpecialTax=</div>	
            <div>frm2550m:txtTax12A=".request('frm2550m:txtTax12A')."frm2550m:txtTax12A=</div>	
            <div>frm2550m:txtTax12B=".request('frm2550m:txtTax12B')."frm2550m:txtTax12B=</div>	
            <div>frm2550m:txtTax13A=".request('frm2550m:txtTax13A')."frm2550m:txtTax13A=</div>	
            <div>frm2550m:txtTax13B=".request('frm2550m:txtTax13B')."frm2550m:txtTax13B=</div>	
            <div>frm2550m:txtTax14=".request('frm2550m:txtTax14')."frm2550m:txtTax14=</div>	
            <div>frm2550m:txtTax15=".request('frm2550m:txtTax15')."frm2550m:txtTax15=</div>	
            <div>frm2550m:txtTax16A=".request('frm2550m:txtTax16A')."frm2550m:txtTax16A=</div>	
            <div>frm2550m:txtTax16B=".request('frm2550m:txtTax16B')."frm2550m:txtTax16B=</div>	
            <div>frm2550m:txtTax17A=".request('frm2550m:txtTax17A')."frm2550m:txtTax17A=</div>	
            <div>frm2550m:txtTax17B=".request('frm2550m:txtTax17B')."frm2550m:txtTax17B=</div>	
            <div>frm2550m:txtTax17C=".request('frm2550m:txtTax17C')."frm2550m:txtTax17C=</div>	
            <div>frm2550m:txtTax17D=".request('frm2550m:txtTax17D')."frm2550m:txtTax17D=</div>	
            <div>frm2550m:txtTax17E=".request('frm2550m:txtTax17E')."frm2550m:txtTax17E=</div>	
            <div>frm2550m:txtTax17F=".request('frm2550m:txtTax17F')."frm2550m:txtTax17F=</div>	
            <div>frm2550m:txtTax18A=".request('frm2550m:txtTax18A')."frm2550m:txtTax18A=</div>	
            <div>frm2550m:txtTax18B=".request('frm2550m:txtTax18B')."frm2550m:txtTax18B=</div>	
            <div>frm2550m:txtTax18C=".request('frm2550m:txtTax18C')."frm2550m:txtTax18C=</div>	
            <div>frm2550m:txtTax18D=".request('frm2550m:txtTax18D')."frm2550m:txtTax18D=</div>	
            <div>frm2550m:txtTax18E=".request('frm2550m:txtTax18E')."frm2550m:txtTax18E=</div>	
            <div>frm2550m:txtTax18F=".request('frm2550m:txtTax18F')."frm2550m:txtTax18F=</div>	
            <div>frm2550m:txtTax18G=".request('frm2550m:txtTax18G')."frm2550m:txtTax18G=</div>	
            <div>frm2550m:txtTax18H=".request('frm2550m:txtTax18H')."frm2550m:txtTax18H=</div>	
            <div>frm2550m:txtTax18I=".request('frm2550m:txtTax18I')."frm2550m:txtTax18I=</div>	
            <div>frm2550m:txtTax18J=".request('frm2550m:txtTax18J')."frm2550m:txtTax18J=</div>	
            <div>frm2550m:txtTax18K=".request('frm2550m:txtTax18K')."frm2550m:txtTax18K=</div>	
            <div>frm2550m:txtTax18L=".request('frm2550m:txtTax18L')."frm2550m:txtTax18L=</div>	
            <div>frm2550m:txtTax18M=".request('frm2550m:txtTax18M')."frm2550m:txtTax18M=</div>	
            <div>frm2550m:txtTax18N=".request('frm2550m:txtTax18N')."frm2550m:txtTax18N=</div>	
            <div>frm2550m:txtTax18O=".request('frm2550m:txtTax18O')."frm2550m:txtTax18O=</div>	
            <div>frm2550m:txtTax18P=".request('frm2550m:txtTax18P')."frm2550m:txtTax18P=</div>	
            <div>frm2550m:txtTax19=".request('frm2550m:txtTax19')."frm2550m:txtTax19=</div>	
            <div>frm2550m:txtTax20A=".request('frm2550m:txtTax20A')."frm2550m:txtTax20A=</div>	
            <div>frm2550m:txtTax20B=".request('frm2550m:txtTax20B')."frm2550m:txtTax20B=</div>	
            <div>frm2550m:txtTax20C=".request('frm2550m:txtTax20C')."frm2550m:txtTax20C=</div>	
            <div>frm2550m:txtTax20D=".request('frm2550m:txtTax20D')."frm2550m:txtTax20D=</div>	
            <div>frm2550m:txtTax20E=".request('frm2550m:txtTax20E')."frm2550m:txtTax20E=</div>	
            <div>frm2550m:txtTax20F=".request('frm2550m:txtTax20F')."frm2550m:txtTax20F=</div>	
            <div>frm2550m:txtTax21=".request('frm2550m:txtTax21')."frm2550m:txtTax21=</div>	
            <div>frm2550m:txtTax22=".request('frm2550m:txtTax22')."frm2550m:txtTax22=</div>	
            <div>frm2550m:txtTax23A=".request('frm2550m:txtTax23A')."frm2550m:txtTax23A=</div>	
            <div>frm2550m:txtTax23B=".request('frm2550m:txtTax23B')."frm2550m:txtTax23B=</div>	
            <div>frm2550m:txtTax23C=".request('frm2550m:txtTax23C')."frm2550m:txtTax23C=</div>	
            <div>frm2550m:txtTax23D=".request('frm2550m:txtTax23D')."frm2550m:txtTax23D=</div>	
            <div>frm2550m:txtTax23E=".request('frm2550m:txtTax23E')."frm2550m:txtTax23E=</div>	
            <div>frm2550m:txtTax23F=".request('frm2550m:txtTax23F')."frm2550m:txtTax23F=</div>	
            <div>frm2550m:txtTax23G=".request('frm2550m:txtTax23G')."frm2550m:txtTax23G=</div>	
            <div>frm2550m:txtTax24=".request('frm2550m:txtTax24')."frm2550m:txtTax24=</div>	
            <div>frm2550m:txtTax25A=".request('frm2550m:txtTax25A')."frm2550m:txtTax25A=</div>	
            <div>frm2550m:txtTax25B=".request('frm2550m:txtTax25B')."frm2550m:txtTax25B=</div>	
            <div>frm2550m:txtTax25C=".request('frm2550m:txtTax25C')."frm2550m:txtTax25C=</div>	
            <div>frm2550m:txtTax25D=".request('frm2550m:txtTax25D')."frm2550m:txtTax25D=</div>	
            <div>frm2550m:txtTax26=".request('frm2550m:txtTax26')."frm2550m:txtTax26=</div>	
            ".$sched1."<div>frm2550M:txtmodaltxtTotal12A=".request('frm2550M:txtmodaltxtTotal12A')."frm2550M:txtmodaltxtTotal12A=</div>	
            <div>frm2550M:txtmodaltxtTotal12B=".request('frm2550M:txtmodaltxtTotal12B')."frm2550M:txtmodaltxtTotal12B=</div>	
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
            <div>AtcCode36=".(null !==  request('AtcCode36') ? 'true' : 'false')."AtcCode36=</div>	".$sched2."
            <div>txtmodalTotalAmt=".request('txtmodalTotalAmt')."txtmodalTotalAmt=</div>	
            <div>txtmodalTotalInputTax=".request('txtmodalTotalInputTax')."txtmodalTotalInputTax=</div>	".$sched3A."
            <div>txtmodalTotalAmountSched3=".request('txtmodalTotalAmountSched3')."txtmodalTotalAmountSched3=</div>	
            <div>txtmodalTotalInputTaxSched3=".request('txtmodalTotalInputTaxSched3')."txtmodalTotalInputTaxSched3=</div>	
            <div>txtmodalTotalBalanceSched3A=".request('txtmodalTotalBalanceSched3A')."txtmodalTotalBalanceSched3A=</div>	".$sched3B."
            <div>txtmodalTotalBalanceSched3B=".request('txtmodalTotalBalanceSched3B')."txtmodalTotalBalanceSched3B=</div>	
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
            <div>txtTotal20CSched5=".request('txtTotal20CSched5')."txtTotal20CSched5=</div>	".$sched6."
            <div>txtmodalTotal23A=".request('txtmodalTotal23A')."txtmodalTotal23A=</div>	
            <div>txtmodalTotalSched6AppliedCurrent=".request('txtmodalTotalSched6AppliedCurrent')."txtmodalTotalSched6AppliedCurrent=</div>	".$sched7."
            <div>txtmodalTotal23B=".request('txtmodalTotal23B')."txtmodalTotal23B=</div>	
            <div>txtmodalTotalSched7AppliedCurrent=".request('txtmodalTotalSched7AppliedCurrent')."txtmodalTotalSched7AppliedCurrent=</div>	".$sched8."
            <div>txtmodalTotal23C=".request('txtmodalTotal23C')."txtmodalTotal23C=</div>	
            <div>txtmodalTotalSched8AppliedCurrent=".request('txtmodalTotalSched8AppliedCurrent')."txtmodalTotalSched8AppliedCurrent=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm2550m:txtTIN1').request('frm2550m:txtTIN2').request('frm2550m:txtTIN3').request('frm2550m:txtBranchCode');

        $return_period = request('frm2550m:RtnYear')."/".request('frm2550m:txtYear');

        $getReturnPeriod = tbl_2550M::where('company_id',  request('company'))
                            ->where('item1A', request('frm2550m:RtnYear'))
                            ->where('item1B', request('frm2550m:txtYear'))
                            ->count();
            
        $filename = "";
        if($getReturnPeriod == "1"){
            $filename = $tin."-2550M-".request('frm2550m:RtnYear').request('frm2550m:txtYear').'.xml';
        }else{
            if(request('form_id') != ""){
                $getXml = Xml::where('user_id', Auth::user()->id)
                        ->where('company_id', request('company'))
                        ->where('form_id', $form->id)
                        ->where('form', '2550M')
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
            $filename = $tin."-2550M-".request('frm2550m:RtnYear').request('frm2550m:txtYear').$ext.'.xml';
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
            'form'          => '2550M',
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
                            ->where('form', '2550M')
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
                            ->where('form', '2550M')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2550M::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2550M')
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
        $data = tbl_2550M::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2550M')
                            ->get();
                            
        return view('forms.BIR-Form 2550M',['company' => $company, 'data' => $data, 'xml' => $xml, 'action' => $action]);
    }
}

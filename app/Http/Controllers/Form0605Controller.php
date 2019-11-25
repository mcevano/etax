<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_0605;
use App\Classes\SubmitClass;
use App\Classes\CheckClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form0605Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        $atc = DB::table('0605_atcs')->get();
        $taxes = DB::table('0605_taxes')->get();

        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_0605s')){

            }else{
                Schema::connection('mysql2')->create('tbl_0605s', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1')->nullable();
                    $table->string('item2A');
                    $table->string('item2B');
                    $table->string('item3')->nullable();
                    $table->string('item4A')->nullable();
                    $table->string('item4B')->nullable();
                    $table->string('item4C')->nullable();
                    $table->string('item5');
                    $table->string('item6')->nullable();
                    $table->string('item7A');
                    $table->string('item7B');
                    $table->string('item7C');
                    $table->string('item8')->nullable();
                    $table->string('item11')->nullable();
                    $table->string('item17')->nullable();
                    $table->string('item17Others')->nullable();
                    $table->string('item18')->nullable();
                    $table->string('item18_installment')->nullable();
                    $table->text('item19');
                    $table->text('item20A');
                    $table->text('item20B');
                    $table->text('item20C');
                    $table->text('item20D');
                    $table->text('item21');
                    $table->text('item_approved')->nullable();
                    $table->timestamps();
                });
            }
           
	        return view('forms.BIR-Form 0605',['company' => $company, 'atc' => $atc, 'taxes' => $taxes, 'form_no' => $form_id, 'action' => $action]);
        }else{
        	$data = tbl_0605::find($form_id);
            return view('forms.BIR-Form 0605',['company' => $company, 'atc' => $atc, 'taxes' => $taxes, 'data' => $data, 'action' => $action]);
        }
        
    }

    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	$data = ([
     		'form_no' 			=> request('form_no'),
    		'company_id' 		=> request('company'),
    		'item1' 			=> null !== request('frm0605:itemFiscalStartMonth') ? request('frm0605:itemFiscalStartMonth') : '',
    		'item2A' 			=> request('frm0605:itemYearEndMonth'),
    		'item2B' 			=> request('frm0605:txtYearEnded'),
    		'item3' 			=> null !== request('itemQuarter') ? request('itemQuarter') : '',
    		'item4A' 			=> request('frm0605:txtDueDateMonth'),
    		'item4B'			=> request('frm0605:txtDueDateDay'),
    		'item4C'			=> request('frm0605:txtDueDateYear'),
    		'item5'				=> request('frm0605:txtNoOfSheets'),
    		'item6'				=> request('txtATCCode'),
    		'item7A'			=> request('frm0605:txtReturnPeriodMonth'),
    		'item7B'			=> request('frm0605:txtReturnPeriodDay'),
    		'item7C'			=> request('frm0605:txtReturnPeriodYear'),
    		'item8'				=> request('txtTaxTypeCode'),	
    		'item11'			=> null !== request('frm0605:txtClassification') ? request('frm0605:txtClassification') : '',
            'item17'			=> null !== request('frm0605:itemMannerOfPayment') ? request('frm0605:itemMannerOfPayment') : '',
            'item17Others'		=> request('frm0605:txtOthersName'),
            'item18'			=> null !== request('frm0605:itemModeOfPayment') ? request('frm0605:itemModeOfPayment') : '',
            'item18_installment'=> request('frm0605:txtNumOfInstallment'),
            'item19'			=> request('frm0605:txtTax19'),
            'item20A'			=> request('frm0605:txtTax20A'),
            'item20B'			=> request('frm0605:txtTax20B'),
            'item20C'			=> request('frm0605:txtTax20C'),
            'item20D'			=> request('frm0605:txtTax20D'),
            'item21'			=> request('frm0605:txtTax21'),	
            'item_approved'		=> null !== request('frm0605:itemApprovedYN') ? request('frm0605:itemApprovedYN') : '',
    	]);

    	$getForm = tbl_0605::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
        if(request('form_id') != ""){
            $form = tbl_0605::find(request('form_id'));
            $form->update($data);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_0605::create($data);
            }else{
                $form = tbl_0605::find($getForm[0]->id);
                $form->update($data);
            }
        }

        $itemFiscalStartMonth1 = "false";
        $itemFiscalStartMonth2 = "false";

        if(null !== request('frm0605:itemFiscalStartMonth')){
            if (request('frm0605:itemFiscalStartMonth') == 'C') {
                $itemFiscalStartMonth1 = "true";
            }else if(request('frm0605:itemFiscalStartMonth') == 'F'){
                $itemFiscalStartMonth2 = "true";
            }
        }

        $itemQuarter_1 = "false";
        $itemQuarter_2 = "false";
        $itemQuarter_3 = "false";
        $itemQuarter_4 = "false";

        if(null !== request('itemQuarter')){
            if(request('itemQuarter') == "1"){
                $itemQuarter_1 = "true";
            }else if(request('itemQuarter') == "2"){
                $itemQuarter_2 = "true";
            }else if(request('itemQuarter') == "3"){
                $itemQuarter_3 = "true";
            }else if(request('itemQuarter') == "4"){
                $itemQuarter_4 = "true";
            }
        }

        $txtClassification1 = "false";
        $txtClassification2 = "false";

        if(null !== request('frm0605:txtClassification')){
            if(request('frm0605:txtClassification') == "I"){
                $txtClassification1 = "true";
            }else if(request('frm0605:txtClassification') == "N"){
                $txtClassification2 = "true";
            }
        }

        $taxPayerName =  rawurlencode(request('frm0605:txtTaxPayerName'));

        $address = rawurlencode(request('frm0605:txtAddress'));

        $lineBusiness = rawurlencode(request('frm0605:txtLineBus'));

        $itemModeOfPayment1 = "false";
        $itemModeOfPayment2 = "false";
        $itemModeOfPayment3 = "false";

        if(null !== request('frm0605:itemModeOfPayment')){
            if(request('frm0605:itemModeOfPayment') == "1"){
                $itemModeOfPayment1 = "true";
            }else if(request('frm0605:itemModeOfPayment') == "2"){
                $itemModeOfPayment2 = "true";
            }else if(request('frm0605:itemModeOfPayment') == "3"){
                $itemModeOfPayment3 = "true";
            }
        }

        $itemMannerOfPayment1 = "false";
        $itemMannerOfPayment2 = "false";
        $itemMannerOfPayment3 = "false";
        $itemMannerOfPayment4 = "false";
        $itemMannerOfPayment5 = "false";
        $itemMannerOfPayment6 = "false";
        $itemMannerOfPayment7 = "false";

        if(null !== request('frm0605:itemMannerOfPayment')){
            if(request('frm0605:itemMannerOfPayment') == "1"){
                $itemMannerOfPayment1 = "true";
            }else if(request('frm0605:itemMannerOfPayment') == "5"){
                $itemMannerOfPayment2 = "true";
            }else if(request('frm0605:itemMannerOfPayment') == "2"){
                $itemMannerOfPayment3 = "true";
            }else if(request('frm0605:itemMannerOfPayment') == "3"){
                $itemMannerOfPayment4 = "true";
            }else if(request('frm0605:itemMannerOfPayment') == "4"){
                $itemMannerOfPayment5 = "true";
            }else if(request('frm0605:itemMannerOfPayment') == "6"){
                $itemMannerOfPayment6 = "true";
            }else if(request('frm0605:itemMannerOfPayment') == "7"){
                $itemMannerOfPayment7 = "true";
            }
        }

        $itemApprovedYN1 = "false";
        $itemApprovedYN2 = "false";

        if(null !== request('frm0605:itemApprovedYN')){
            if(request('frm0605:itemApprovedYN') == "Y"){
                $itemApprovedYN1 = "true";
            }else if(request('frm0605:itemApprovedYN') == "N"){
                $itemApprovedYN2 = "true";
            }
        }

        $xmlData = "<?xml version='1.0'?>	
            <div>frm0605:itemFiscalStartMonth:_1=".$itemFiscalStartMonth1."frm0605:itemFiscalStartMonth:_1=</div>	
            <div>frm0605:itemFiscalStartMonth:_2=".$itemFiscalStartMonth2."frm0605:itemFiscalStartMonth:_2=</div>	
            <div>itemQuarter_1=".$itemQuarter_1."itemQuarter_1=</div>	
            <div>itemQuarter_2=".$itemQuarter_2."itemQuarter_2=</div>	
            <div>itemQuarter_3=".$itemQuarter_3."itemQuarter_3=</div>	
            <div>itemQuarter_4=".$itemQuarter_4."itemQuarter_4=</div>	
            <div>frm0605:txtDueDateMonth=".request('frm0605:txtDueDateMonth')."frm0605:txtDueDateMonth=</div>	
            <div>frm0605:txtDueDateDay=".request('frm0605:txtDueDateDay')."frm0605:txtDueDateDay=</div>	
            <div>frm0605:txtDueDateYear=".request('frm0605:txtDueDateYear')."frm0605:txtDueDateYear=</div>	
            <div>frm0605:txtNoOfSheets=".request('frm0605:txtNoOfSheets')."frm0605:txtNoOfSheets=</div>	
            <div>txtATCCode=".request('txtATCCode')."txtATCCode=</div>	
            <div>frm0605:itemYearEndMonth=".request('frm0605:itemYearEndMonth')."frm0605:itemYearEndMonth=</div>	
            <div>frm0605:txtYearEnded=".request('frm0605:txtYearEnded')."frm0605:txtYearEnded=</div>	
            <div>frm0605:txtReturnPeriodMonth=".request('frm0605:txtReturnPeriodMonth')."frm0605:txtReturnPeriodMonth=</div>	
            <div>frm0605:txtReturnPeriodDay=".request('frm0605:txtReturnPeriodDay')."frm0605:txtReturnPeriodDay=</div>	
            <div>frm0605:txtReturnPeriodYear=".request('frm0605:txtReturnPeriodYear')."frm0605:txtReturnPeriodYear=</div>	
            <div>txtTaxTypeCode=".request('txtTaxTypeCode')."txtTaxTypeCode=</div>	
            <div>frm0605:txtTIN1=".request('frm0605:txtTIN1')."frm0605:txtTIN1=</div>	
            <div>frm0605:txtTIN2=".request('frm0605:txtTIN2')."frm0605:txtTIN2=</div>	
            <div>frm0605:txtTIN3=".request('frm0605:txtTIN3')."frm0605:txtTIN3=</div>	
            <div>frm0605:txtBranchCode=".request('frm0605:txtBranchCode')."frm0605:txtBranchCode=</div>	
            <div>frm0605:txtRDOCode=".request('frm0605:txtRDOCode')."frm0605:txtRDOCode=</div>	
            <div>frm0605:txtClassification:_1=".$txtClassification1."frm0605:txtClassification:_1=</div>	
            <div>frm0605:txtClassification:_2=".$txtClassification2."frm0605:txtClassification:_2=</div>	
            <div>frm0605:txtLineBus=".$lineBusiness."frm0605:txtLineBus=</div>	
            <div>frm0605:txtTaxPayerName=".$taxPayerName."frm0605:txtTaxPayerName=</div>	
            <div>frm0605:txtTelNum=".request('frm0605:txtTelNum')."frm0605:txtTelNum=</div>	
            <div>frm0605:txtAddress=".$address."frm0605:txtAddress=</div>	
            <div>frm0605:txtZipCode=".request('frm0605:txtZipCode')."frm0605:txtZipCode=</div>	
            <div>frm0605:itemModeOfPayment:_1=".$itemModeOfPayment1."frm0605:itemModeOfPayment:_1=</div>	
            <div>frm0605:txtNumOfInstallment=".request('frm0605:txtNumOfInstallment')."frm0605:txtNumOfInstallment=</div>	
            <div>frm0605:itemModeOfPayment:_2=".$itemModeOfPayment2."frm0605:itemModeOfPayment:_2=</div>	
            <div>frm0605:itemModeOfPayment:_3=".$itemModeOfPayment3."frm0605:itemModeOfPayment:_3=</div>	
            <div>frm0605:itemMannerOfPayment:_1=".$itemMannerOfPayment1."frm0605:itemMannerOfPayment:_1=</div>	
            <div>frm0605:itemMannerOfPayment:_2=".$itemMannerOfPayment2."frm0605:itemMannerOfPayment:_2=</div>	
            <div>frm0605:itemMannerOfPayment:_3=".$itemMannerOfPayment3."frm0605:itemMannerOfPayment:_3=</div>	
            <div>frm0605:itemMannerOfPayment:_4=".$itemMannerOfPayment4."frm0605:itemMannerOfPayment:_4=</div>	
            <div>frm0605:itemMannerOfPayment:_5=".$itemMannerOfPayment5."frm0605:itemMannerOfPayment:_5=</div>	
            <div>frm0605:txtOthersName=".request('frm0605:txtOthersName')."frm0605:txtOthersName=</div>	
            <div>frm0605:itemMannerOfPaymentB:_1=".$itemMannerOfPayment6."frm0605:itemMannerOfPaymentB:_1=</div>	
            <div>frm0605:itemMannerOfPaymentB:_2=".$itemMannerOfPayment7."frm0605:itemMannerOfPaymentB:_2=</div>	
            <div>frm0605:txtTax19=".request('frm0605:txtTax19')."frm0605:txtTax19=</div>	
            <div>frm0605:txtTax20A=".request('frm0605:txtTax20A')."frm0605:txtTax20A=</div>	
            <div>frm0605:txtTax20B=".request('frm0605:txtTax20B')."frm0605:txtTax20B=</div>	
            <div>frm0605:txtTax20C=".request('frm0605:txtTax20C')."frm0605:txtTax20C=</div>	
            <div>frm0605:txtTax20D=".request('frm0605:txtTax20D')."frm0605:txtTax20D=</div>	
            <div>frm0605:txtTax21=".request('frm0605:txtTax21')."frm0605:txtTax21=</div>	
            <div>frm0605:itemApprovedYN:_1=".$itemApprovedYN1."frm0605:itemApprovedYN:_1=</div>	
            <div>frm0605:itemApprovedYN:_2=".$itemApprovedYN2."frm0605:itemApprovedYN:_2=</div>	
            <div>AtcCode1=".(request('txtATCCode') == "FP010" ? "true" : "false")."AtcCode1=</div>	
            <div>AtcCode2=".(request('txtATCCode') == "FP020" ? "true" : "false")."AtcCode2=</div>	
            <div>AtcCode3=".(request('txtATCCode') == "FP030" ? "true" : "false")."AtcCode3=</div>	
            <div>AtcCode4=".(request('txtATCCode') == "FP040" ? "true" : "false")."AtcCode4=</div>	
            <div>AtcCode5=".(request('txtATCCode') == "FP042" ? "true" : "false")."AtcCode5=</div>	
            <div>AtcCode6=".(request('txtATCCode') == "FP050" ? "true" : "false")."AtcCode6=</div>	
            <div>AtcCode7=".(request('txtATCCode') == "FP051" ? "true" : "false")."AtcCode7=</div>	
            <div>AtcCode8=".(request('txtATCCode') == "FP060" ? "true" : "false")."AtcCode8=</div>	
            <div>AtcCode9=".(request('txtATCCode') == "FP070" ? "true" : "false")."AtcCode9=</div>	
            <div>AtcCode10=".(request('txtATCCode') == "FP071" ? "true" : "false")."AtcCode10=</div>	
            <div>AtcCode11=".(request('txtATCCode') == "FP090" ? "true" : "false")."AtcCode11=</div>	
            <div>AtcCode12=".(request('txtATCCode') == "FP100" ? "true" : "false")."AtcCode12=</div>	
            <div>AtcCode13=".(request('txtATCCode') == "FP110" ? "true" : "false")."AtcCode13=</div>	
            <div>AtcCode14=".(request('txtATCCode') == "FP120" ? "true" : "false")."AtcCode14=</div>	
            <div>AtcCode15=".(request('txtATCCode') == "FP130" ? "true" : "false")."AtcCode15=</div>	
            <div>AtcCode16=".(request('txtATCCode') == "FP140" ? "true" : "false")."AtcCode16=</div>	
            <div>AtcCode17=".(request('txtATCCode') == "FP141" ? "true" : "false")."AtcCode17=</div>	
            <div>AtcCode18=".(request('txtATCCode') == "FP150" ? "true" : "false")."AtcCode18=</div>	
            <div>AtcCode19=".(request('txtATCCode') == "FP160" ? "true" : "false")."AtcCode19=</div>	
            <div>AtcCode20=".(request('txtATCCode') == "FP170" ? "true" : "false")."AtcCode20=</div>	
            <div>AtcCode21=".(request('txtATCCode') == "FP180" ? "true" : "false")."AtcCode21=</div>	
            <div>AtcCode22=".(request('txtATCCode') == "FP190" ? "true" : "false")."AtcCode22=</div>	
            <div>AtcCode23=".(request('txtATCCode') == "FP930" ? "true" : "false")."AtcCode23=</div>	
            <div>AtcCode24=".(request('txtATCCode') == "II011" ? "true" : "false")."AtcCode24=</div>	
            <div>AtcCode25=".(request('txtATCCode') == "II012" ? "true" : "false")."AtcCode25=</div>	
            <div>AtcCode26=".(request('txtATCCode') == "II013" ? "true" : "false")."AtcCode26=</div>	
            <div>AtcCode27=".(request('txtATCCode') == "MC010" ? "true" : "false")."AtcCode27=</div>	
            <div>AtcCode28=".(request('txtATCCode') == "MC020" ? "true" : "false")."AtcCode28=</div>	
            <div>AtcCode29=".(request('txtATCCode') == "MC030" ? "true" : "false")."AtcCode29=</div>	
            <div>AtcCode30=".(request('txtATCCode') == "MC031" ? "true" : "false")."AtcCode30=</div>	
            <div>AtcCode31=".(request('txtATCCode') == "MC040" ? "true" : "false")."AtcCode31=</div>	
            <div>AtcCode32=".(request('txtATCCode') == "MC050" ? "true" : "false")."AtcCode32=</div>	
            <div>AtcCode33=".(request('txtATCCode') == "MC060" ? "true" : "false")."AtcCode33=</div>	
            <div>AtcCode34=".(request('txtATCCode') == "MC090" ? "true" : "false")."AtcCode34=</div>	
            <div>AtcCode35=".(request('txtATCCode') == "MC180" ? "true" : "false")."AtcCode35=</div>	
            <div>AtcCode36=".(request('txtATCCode') == "MC190" ? "true" : "false")."AtcCode36=</div>	
            <div>AtcCode37=".(request('txtATCCode') == "MC200" ? "true" : "false")."AtcCode37=</div>	
            <div>AtcCode38=".(request('txtATCCode') == "MC210" ? "true" : "false")."AtcCode38=</div>	
            <div>AtcCode39=".(request('txtATCCode') == "MC220" ? "true" : "false")."AtcCode39=</div>	
            <div>AtcCode40=".(request('txtATCCode') == "MC230" ? "true" : "false")."AtcCode40=</div>	
            <div>AtcCode41=".(request('txtATCCode') == "MC240" ? "true" : "false")."AtcCode41=</div>	
            <div>AtcCode42=".(request('txtATCCode') == "VM160" ? "true" : "false")."AtcCode42=</div>	
            <div>AtcCode43=".(request('txtATCCode') == "XA010" ? "true" : "false")."AtcCode43=</div>	
            <div>AtcCode44=".(request('txtATCCode') == "XA020" ? "true" : "false")."AtcCode44=</div>	
            <div>AtcCode45=".(request('txtATCCode') == "XA031" ? "true" : "false")."AtcCode45=</div>	
            <div>AtcCode46=".(request('txtATCCode') == "XA032" ? "true" : "false")."AtcCode46=</div>	
            <div>AtcCode47=".(request('txtATCCode') == "XA033" ? "true" : "false")."AtcCode47=</div>	
            <div>AtcCode48=".(request('txtATCCode') == "XA040" ? "true" : "false")."AtcCode48=</div>	
            <div>AtcCode49=".(request('txtATCCode') == "XA051" ? "true" : "false")."AtcCode49=</div>	
            <div>AtcCode50=".(request('txtATCCode') == "XA052" ? "true" : "false")."AtcCode50=</div>	
            <div>AtcCode51=".(request('txtATCCode') == "XA053" ? "true" : "false")."AtcCode51=</div>	
            <div>AtcCode52=".(request('txtATCCode') == "XA061" ? "true" : "false")."AtcCode52=</div>	
            <div>AtcCode53=".(request('txtATCCode') == "XA062" ? "true" : "false")."AtcCode53=</div>	
            <div>AtcCode54=".(request('txtATCCode') == "XA070" ? "true" : "false")."AtcCode54=</div>	
            <div>AtcCode55=".(request('txtATCCode') == "XA080" ? "true" : "false")."AtcCode55=</div>	
            <div>AtcCode56=".(request('txtATCCode') == "XA090" ? "true" : "false")."AtcCode56=</div>	
            <div>AtcCode57=".(request('txtATCCode') == "XB010" ? "true" : "false")."AtcCode57=</div>	
            <div>AtcCode58=".(request('txtATCCode') == "XB020" ? "true" : "false")."AtcCode58=</div>	
            <div>AtcCode59=".(request('txtATCCode') == "XB030" ? "true" : "false")."AtcCode59=</div>	
            <div>AtcCode60=".(request('txtATCCode') == "XB040" ? "true" : "false")."AtcCode60=</div>	
            <div>AtcCode61=".(request('txtATCCode') == "XB050" ? "true" : "false")."AtcCode61=</div>	
            <div>AtcCode62=".(request('txtATCCode') == "XB060" ? "true" : "false")."AtcCode62=</div>	
            <div>AtcCode63=".(request('txtATCCode') == "XB070" ? "true" : "false")."AtcCode63=</div>	
            <div>AtcCode64=".(request('txtATCCode') == "XB080" ? "true" : "false")."AtcCode64=</div>	
            <div>AtcCode65=".(request('txtATCCode') == "XB090" ? "true" : "false")."AtcCode65=</div>	
            <div>AtcCode66=".(request('txtATCCode') == "XB100" ? "true" : "false")."AtcCode66=</div>	
            <div>AtcCode67=".(request('txtATCCode') == "XC010" ? "true" : "false")."AtcCode67=</div>	
            <div>AtcCode68=".(request('txtATCCode') == "XG020" ? "true" : "false")."AtcCode68=</div>	
            <div>AtcCode69=".(request('txtATCCode') == "XG030" ? "true" : "false")."AtcCode69=</div>	
            <div>AtcCode70=".(request('txtATCCode') == "XG040" ? "true" : "false")."AtcCode70=</div>	
            <div>AtcCode71=".(request('txtATCCode') == "XG050" ? "true" : "false")."AtcCode71=</div>	
            <div>AtcCode72=".(request('txtATCCode') == "XG060" ? "true" : "false")."AtcCode72=</div>	
            <div>AtcCode73=".(request('txtATCCode') == "XG070" ? "true" : "false")."AtcCode73=</div>	
            <div>AtcCode74=".(request('txtATCCode') == "XG080" ? "true" : "false")."AtcCode74=</div>	
            <div>AtcCode75=".(request('txtATCCode') == "XG090" ? "true" : "false")."AtcCode75=</div>	
            <div>AtcCode76=".(request('txtATCCode') == "XG100" ? "true" : "false")."AtcCode76=</div>	
            <div>AtcCode77=".(request('txtATCCode') == "XG110" ? "true" : "false")."AtcCode77=</div>	
            <div>AtcCode78=".(request('txtATCCode') == "XG120" ? "true" : "false")."AtcCode78=</div>	
            <div>AtcCode79=".(request('txtATCCode') == "XM010" ? "true" : "false")."AtcCode79=</div>	
            <div>AtcCode80=".(request('txtATCCode') == "XM020" ? "true" : "false")."AtcCode80=</div>	
            <div>AtcCode81=".(request('txtATCCode') == "XM030" ? "true" : "false")."AtcCode81=</div>	
            <div>AtcCode82=".(request('txtATCCode') == "XM040" ? "true" : "false")."AtcCode82=</div>	
            <div>AtcCode83=".(request('txtATCCode') == "XM050" ? "true" : "false")."AtcCode83=</div>	
            <div>AtcCode84=".(request('txtATCCode') == "XM051" ? "true" : "false")."AtcCode84=</div>	
            <div>AtcCode85=".(request('txtATCCode') == "XP010" ? "true" : "false")."AtcCode85=</div>	
            <div>AtcCode86=".(request('txtATCCode') == "XP020" ? "true" : "false")."AtcCode86=</div>	
            <div>AtcCode87=".(request('txtATCCode') == "XP030" ? "true" : "false")."AtcCode87=</div>	
            <div>AtcCode88=".(request('txtATCCode') == "XP040" ? "true" : "false")."AtcCode88=</div>	
            <div>AtcCode89=".(request('txtATCCode') == "XP060" ? "true" : "false")."AtcCode89=</div>	
            <div>AtcCode90=".(request('txtATCCode') == "XP070" ? "true" : "false")."AtcCode90=</div>	
            <div>AtcCode91=".(request('txtATCCode') == "XP080" ? "true" : "false")."AtcCode91=</div>	
            <div>AtcCode92=".(request('txtATCCode') == "XP090" ? "true" : "false")."AtcCode92=</div>	
            <div>AtcCode93=".(request('txtATCCode') == "XP100" ? "true" : "false")."AtcCode93=</div>	
            <div>AtcCode94=".(request('txtATCCode') == "XP110" ? "true" : "false")."AtcCode94=</div>	
            <div>AtcCode95=".(request('txtATCCode') == "XP120" ? "true" : "false")."AtcCode95=</div>	
            <div>AtcCode96=".(request('txtATCCode') == "XP130" ? "true" : "false")."AtcCode96=</div>	
            <div>AtcCode97=".(request('txtATCCode') == "XP131" ? "true" : "false")."AtcCode97=</div>	
            <div>AtcCode98=".(request('txtATCCode') == "XP140" ? "true" : "false")."AtcCode98=</div>	
            <div>AtcCode99=".(request('txtATCCode') == "XP150" ? "true" : "false")."AtcCode99=</div>	
            <div>AtcCode100=".(request('txtATCCode') == "XP160" ? "true" : "false")."AtcCode100=</div>	
            <div>AtcCode101=".(request('txtATCCode') == "XP170" ? "true" : "false")."AtcCode101=</div>	
            <div>AtcCode102=".(request('txtATCCode') == "XP180" ? "true" : "false")."AtcCode102=</div>	
            <div>AtcCode103=".(request('txtATCCode') == "XP190" ? "true" : "false")."AtcCode103=</div>	
            <div>AtcCode104=".(request('txtATCCode') == "XT010" ? "true" : "false")."AtcCode104=</div>	
            <div>AtcCode105=".(request('txtATCCode') == "XT020" ? "true" : "false")."AtcCode105=</div>	
            <div>AtcCode106=".(request('txtATCCode') == "XT030" ? "true" : "false")."AtcCode106=</div>	
            <div>AtcCode107=".(request('txtATCCode') == "XT040" ? "true" : "false")."AtcCode107=</div>	
            <div>AtcCode108=".(request('txtATCCode') == "XT050" ? "true" : "false")."AtcCode108=</div>	
            <div>AtcCode109=".(request('txtATCCode') == "XT060" ? "true" : "false")."AtcCode109=</div>	
            <div>AtcCode110=".(request('txtATCCode') == "XT070" ? "true" : "false")."AtcCode110=</div>	
            <div>AtcCode111=".(request('txtATCCode') == "XT080" ? "true" : "false")."AtcCode111=</div>	
            <div>AtcCode112=".(request('txtATCCode') == "XT090" ? "true" : "false")."AtcCode112=</div>	
            <div>AtcCode113=".(request('txtATCCode') == "XT100" ? "true" : "false")."AtcCode113=</div>	
            <div>AtcCode114=".(request('txtATCCode') == "XT110" ? "true" : "false")."AtcCode114=</div>	
            <div>AtcCode115=".(request('txtATCCode') == "XT120" ? "true" : "false")."AtcCode115=</div>	
            <div>AtcCode116=".(request('txtATCCode') == "XT130" ? "true" : "false")."AtcCode116=</div>	
            <div>TaxTypeCode1=".(request('txtTaxTypeCode') == "CG" ? "true" : "false")."TaxTypeCode1=</div>	
            <div>TaxTypeCode2=".(request('txtTaxTypeCode') == "CS" ? "true" : "false")."TaxTypeCode2=</div>	
            <div>TaxTypeCode3=".(request('txtTaxTypeCode') == "DN" ? "true" : "false")."TaxTypeCode3=</div>	
            <div>TaxTypeCode4=".(request('txtTaxTypeCode') == "DO" ? "true" : "false")."TaxTypeCode4=</div>	
            <div>TaxTypeCode5=".(request('txtTaxTypeCode') == "DS" ? "true" : "false")."TaxTypeCode5=</div>	
            <div>TaxTypeCode6=".(request('txtTaxTypeCode') == "ES" ? "true" : "false")."TaxTypeCode6=</div>	
            <div>TaxTypeCode7=".(request('txtTaxTypeCode') == "ET" ? "true" : "false")."TaxTypeCode7=</div>	
            <div>TaxTypeCode8=".(request('txtTaxTypeCode') == "IE" ? "true" : "false")."TaxTypeCode8=</div>	
            <div>TaxTypeCode9=".(request('txtTaxTypeCode') == "IT" ? "true" : "false")."TaxTypeCode9=</div>	
            <div>TaxTypeCode10=".(request('txtTaxTypeCode') == "MC" ? "true" : "false")."TaxTypeCode10=</div>	
            <div>TaxTypeCode11=".(request('txtTaxTypeCode') == "PM" ? "true" : "false")."TaxTypeCode11=</div>	
            <div>TaxTypeCode12=".(request('txtTaxTypeCode') == "PT" ? "true" : "false")."TaxTypeCode12=</div>	
            <div>TaxTypeCode13=".(request('txtTaxTypeCode') == "QP" ? "true" : "false")."TaxTypeCode13=</div>	
            <div>TaxTypeCode14=".(request('txtTaxTypeCode') == "RF" ? "true" : "false")."TaxTypeCode14=</div>	
            <div>TaxTypeCode15=".(request('txtTaxTypeCode') == "SL" ? "true" : "false")."TaxTypeCode15=</div>	
            <div>TaxTypeCode16=".(request('txtTaxTypeCode') == "SO" ? "true" : "false")."TaxTypeCode16=</div>	
            <div>TaxTypeCode17=".(request('txtTaxTypeCode') == "ST" ? "true" : "false")."TaxTypeCode17=</div>	
            <div>TaxTypeCode18=".(request('txtTaxTypeCode') == "TR" ? "true" : "false")."TaxTypeCode18=</div>	
            <div>TaxTypeCode19=".(request('txtTaxTypeCode') == "VT" ? "true" : "false")."TaxTypeCode19=</div>	
            <div>TaxTypeCode20=".(request('txtTaxTypeCode') == "WB" ? "true" : "false")."TaxTypeCode20=</div>	
            <div>TaxTypeCode21=".(request('txtTaxTypeCode') == "WC" ? "true" : "false")."TaxTypeCode21=</div>	
            <div>TaxTypeCode22=".(request('txtTaxTypeCode') == "WE" ? "true" : "false")."TaxTypeCode22=</div>	
            <div>TaxTypeCode23=".(request('txtTaxTypeCode') == "WF" ? "true" : "false")."TaxTypeCode23=</div>	
            <div>TaxTypeCode24=".(request('txtTaxTypeCode') == "WG" ? "true" : "false")."TaxTypeCode24=</div>	
            <div>TaxTypeCode25=".(request('txtTaxTypeCode') == "WO" ? "true" : "false")."TaxTypeCode25=</div>	
            <div>TaxTypeCode26=".(request('txtTaxTypeCode') == "WR" ? "true" : "false")."TaxTypeCode26=</div>	
            <div>TaxTypeCode27=".(request('txtTaxTypeCode') == "WW" ? "true" : "false")."TaxTypeCode27=</div>	
            <div>TaxTypeCode28=".(request('txtTaxTypeCode') == "XA" ? "true" : "false")."TaxTypeCode28=</div>	
            <div>TaxTypeCode29=".(request('txtTaxTypeCode') == "XB" ? "true" : "false")."TaxTypeCode29=</div>	
            <div>TaxTypeCode30=".(request('txtTaxTypeCode') == "XF" ? "true" : "false")."TaxTypeCode30=</div>	
            <div>TaxTypeCode31=".(request('txtTaxTypeCode') == "XG" ? "true" : "false")."TaxTypeCode31=</div>	
            <div>TaxTypeCode32=".(request('txtTaxTypeCode') == "XM" ? "true" : "false")."TaxTypeCode32=</div>	
            <div>TaxTypeCode33=".(request('txtTaxTypeCode') == "XP" ? "true" : "false")."TaxTypeCode33=</div>	
            <div>TaxTypeCode34=".(request('txtTaxTypeCode') == "XS" ? "true" : "false")."TaxTypeCode34=</div>	
            <div>TaxTypeCode35=".(request('txtTaxTypeCode') == "XT" ? "true" : "false")."TaxTypeCode35=</div>	
            <div>TaxTypeCode36=".(request('txtTaxTypeCode') == "XV" ? "true" : "false")."TaxTypeCode36=</div>	
            <div>TaxTypeCode37=".(request('txtTaxTypeCode') == "XC" ? "true" : "false")."TaxTypeCode37=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

            $tin = request('frm0605:txtTIN1').request('frm0605:txtTIN2').request('frm0605:txtTIN3').request('frm0605:txtBranchCode');

            $returnPeriod = request('frm0605:txtReturnPeriodMonth')."/".request('frm0605:txtReturnPeriodDay')."/".request('frm0605:txtReturnPeriodYear')." ".date('H:i:s');

            $xmlReturnPeriod = request('frm0605:txtReturnPeriodMonth').request('frm0605:txtReturnPeriodDay').request('frm0605:txtReturnPeriodYear').date('His');

            $filename = $tin."-0605-".$xmlReturnPeriod.'.xml';

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
	     		'form'			=> '0605',
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
     						->where('form', '0605')
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

        $xml_id = "0";

        if(request('form_id') != ""){
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', request('form_id'))
                            ->where('form', '0605')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;

            $xml_id = $xml->id;
        }else{
            $getData = tbl_0605::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '0605')
                            ->get();
            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;

            $xml_id = $xml->id;
        }

        /*for submission of xml file*/
        $submit = new SubmitClass();
        $stat_id = $submit->getData($xml_id);

        /*for checking status of XML*/
        $check = new CheckClass();
        $status = $check->checkFileStatus($stat_id);

    }
    public function show($company, $action, $form_id)
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);
        
        $company = Companies::find($company);
        $atc = DB::table('0605_atcs')->get();
        $taxes = DB::table('0605_taxes')->get();

        $data = tbl_0605::find($form_id);

        return view('forms.BIR-Form 0605',['atc' => $atc, 'taxes' => $taxes, 'company' => $company, 'data' => $data, 'action' => $action]);
    }

}

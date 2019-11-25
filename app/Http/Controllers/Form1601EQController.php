<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1601EQ;
use App\tbl_1601EQ_schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1601EQController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);

        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1601_e_qs')){

            }else{
                Schema::connection('mysql2')->create('tbl_1601_e_qs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1');
                    $table->string('item2')->nullable();
                    $table->string('item3');
                    $table->string('item4')->nullable();
                    $table->string('item5')->nullable();
                    $table->string('item11')->nullable();
                    $table->text('item_other_tax')->nullable();
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
                    $table->text('item29');
                    $table->text('item30');
                    $table->text('item_refund');
                    $table->text('item_certificate');
                    $table->text('item_carried');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1601_e_q_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc');
                    $table->text('tax_base')->nullable();
                    $table->text('rate');
                    $table->text('withheld');
                    $table->timestamps();
                });
            }
            
        	return view('forms.BIR-Form 1601EQ',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{
           

            $data = tbl_1601EQ::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1601EQ')
                            ->get();
            return view('forms.BIR-Form 1601EQ',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        	
        }
    }
    public function store(){
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
     	$data = ([
     		'form_no' 		=> request('form_no'),
    		'company_id' 	=> request('company'),
    		'item1'			=> request('frm1601EQ:txtYear'),
            'item2'			=> null !== request('frm1601EQ:optQuarter') ? request('frm1601EQ:optQuarter') : '',
            'item3'			=> request('frm1601EQ:optAmend'),
            'item4'			=> null !== request('frm1601EQ:optWithheld') ? request('frm1601EQ:optWithheld') : '',
            'item5'			=> request('frm1601EQ:txtNoSheets'),
            'item11'		=> null !== request('frm1601EQ:optCategory') ? request('frm1601EQ:optCategory') : '',
            'item_other_tax' => null !== request('frm1601EQ:txtTotalOtherTax')[0] ? request('frm1601EQ:txtTotalOtherTax')[0] : '',
            'item19'		=> request('frm1601EQ:txtTax19'),
            'item20'		=> request('frm1601EQ:txtTax20'),
            'item21'		=> request('frm1601EQ:txtTax21'),
            'item22'		=> request('frm1601EQ:txtTax22'),
            'item23'		=> request('frm1601EQ:txtTax23'),
            'item24'		=> request('frm1601EQ:txtTax24'),
            'item25'		=> request('frm1601EQ:txtTax25'),
            'item26'		=> request('frm1601EQ:txtTax26'),
            'item27'		=> request('frm1601EQ:txtTax27'),
            'item28'		=> request('frm1601EQ:txtTax28'),
            'item29'		=> request('frm1601EQ:txtTax29'),
            'item30'		=> request('frm1601EQ:txtTax30'),
            'item_refund'	=> null !== request('frm1601EQ:ifRefund') ? request('frm1601EQ:ifRefund') : '',
            'item_certificate'	=> null !== request('frm1601EQ:ifIssueCert') ? request('frm1601EQ:ifIssueCert') : '',
            'item_carried'	=> null !== request('frm1601EQ:ifCarriedOver') ? request('frm1601EQ:ifCarriedOver') : '',
    	]);

    	$getForm = tbl_1601EQ::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
        if(request('form_id') != ""){
            tbl_1601EQ_schedule::where('form_id', $getForm[0]->id)->delete();
            $form = tbl_1601EQ::find(request('form_id'));
            $form->update($data);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1601EQ::create($data);
            }else{
                tbl_1601EQ_schedule::where('form_id', $getForm[0]->id)->delete();
                $form = tbl_1601EQ::find($getForm[0]->id);
                $form->update($data);
            }
        }

        if(null !== request('frm1601EQ:txtAtcCd')[0]){
            for ($i=0; $i < count(request('frm1601EQ:txtAtcCd')) ; $i++) {
                if(null !== request('frm1601EQ:txtAtcCd')[$i]){
                    $atc = ([
                        'form_id'       => $form->id,
                        'atc'           => request('frm1601EQ:txtAtcCd')[$i],
                        'tax_base'      => request('frm1601EQ:txtTaxBase')[$i],
                        'rate'          => request('frm1601EQ:txtTaxRate')[$i],
                        'withheld'      => request('frm1601EQ:txtTaxbeWithHeld')[$i],
                    ]);

                    tbl_1601EQ_schedule::create($atc);
                }
            }
        }

        $optQuarter1 = 'false';
        $optQuarter2 = 'false';
        $optQuarter3 = 'false';
        $optQuarter4 = 'false';

        if(null !== request('frm1601EQ:optQuarter')){
            if(request('frm1601EQ:optQuarter') == '1'){
                $optQuarter1 = 'true';
            }else if(request('frm1601EQ:optQuarter') == '2'){
                $optQuarter2 = 'true';
            }else if(request('frm1601EQ:optQuarter') == '3'){
                $optQuarter3 = 'true';
            }else if(request('frm1601EQ:optQuarter') == '4'){
                $optQuarter4 = 'true';
            }
        }

        $optAmendY = "false";
        $optAmendN = "false";

        if(request('frm1601EQ:optAmend') == 'Y'){
            $optAmendY = "true";
        }else if(request('frm1601EQ:optAmend') == 'N'){
            $optAmendN = "true";
        }

        $optWithheldY = "false";
        $optWithheldN = "false";

        if (null !== request('frm1601EQ:optWithheld')) {
            if(request('frm1601EQ:optWithheld') == 'Y'){
                $optWithheldY = "true";
            }else if(request('frm1601EQ:optWithheld') == 'N'){
                $optWithheldN = "true";
            }
        }
        
        $taxPayerName =  rawurlencode(request('frm1601EQ:txtTaxpayerName'));

        $address = rawurlencode(request('frm1601EQ:txtAddress'));

        $lineBusiness = rawurlencode(request('frm1601EQ:txtLineBus'));

        $optCategoryP = "false";
        $optCategoryG = "false";

        if(null !== request('frm1601EQ:optCategory')){
            if(request('frm1601EQ:optCategory') == 'P'){
                $optCategoryP = "true";
            }else if(request('frm1601EQ:optCategory') == 'G'){
                $optCategoryG = "true";
            }
        }

        $ifRefund = "false";
        if(null !==  request('frm1601EQ:ifRefund')){
            $ifRefund = "true";
        }else{
            $ifRefund = "false";
        }

        $ifIssueCert = "false";
        if(null !==  request('frm1601EQ:ifIssueCert')){
            $ifIssueCert = "true";
        }else{
            $ifIssueCert = "false";
        }

        $ifCarriedOver = "false";
        if(null !==  request('frm1601EQ:ifCarriedOver')){
            $ifCarriedOver = "true";
        }else{
            $ifCarriedOver = "false";
        }

    
        $xmlATC = "";
        if(null !==  request('frm1601EQ:optCategory')){
            $xmlATC = "            <div>AtcCode1=".(null !==  request('AtcCode1') ? 'true' : 'false')."AtcCode1=</div>            <div>AtcCode2=".(null !==  request('AtcCode2') ? 'true' : 'false')."AtcCode2=</div>            <div>AtcCode3=".(null !==  request('AtcCode3') ? 'true' : 'false')."AtcCode3=</div>            <div>AtcCode4=".(null !==  request('AtcCode4') ? 'true' : 'false')."AtcCode4=</div>            <div>AtcCode5=".(null !==  request('AtcCode5') ? 'true' : 'false')."AtcCode5=</div>            <div>AtcCode6=".(null !==  request('AtcCode6') ? 'true' : 'false')."AtcCode6=</div>            <div>AtcCode7=".(null !==  request('AtcCode7') ? 'true' : 'false')."AtcCode7=</div>            <div>AtcCode8=".(null !==  request('AtcCode8') ? 'true' : 'false')."AtcCode8=</div>            <div>AtcCode9=".(null !==  request('AtcCode9') ? 'true' : 'false')."AtcCode9=</div>            <div>AtcCode10=".(null !==  request('AtcCode10') ? 'true' : 'false')."AtcCode10=</div>            <div>AtcCode11=".(null !==  request('AtcCode11') ? 'true' : 'false')."AtcCode11=</div>            <div>AtcCode12=".(null !==  request('AtcCode12') ? 'true' : 'false')."AtcCode12=</div>            <div>AtcCode13=".(null !==  request('AtcCode13') ? 'true' : 'false')."AtcCode13=</div>            <div>AtcCode14=".(null !==  request('AtcCode14') ? 'true' : 'false')."AtcCode14=</div>            <div>AtcCode15=".(null !==  request('AtcCode15') ? 'true' : 'false')."AtcCode15=</div>            <div>AtcCode16=".(null !==  request('AtcCode16') ? 'true' : 'false')."AtcCode16=</div>            <div>AtcCode17=".(null !==  request('AtcCode17') ? 'true' : 'false')."AtcCode17=</div>            <div>AtcCode18=".(null !==  request('AtcCode18') ? 'true' : 'false')."AtcCode18=</div>            <div>AtcCode19=".(null !==  request('AtcCode19') ? 'true' : 'false')."AtcCode19=</div>            <div>AtcCode20=".(null !==  request('AtcCode20') ? 'true' : 'false')."AtcCode20=</div>            <div>AtcCode21=".(null !==  request('AtcCode21') ? 'true' : 'false')."AtcCode21=</div>            <div>AtcCode22=".(null !==  request('AtcCode22') ? 'true' : 'false')."AtcCode22=</div>            <div>AtcCode23=".(null !==  request('AtcCode23') ? 'true' : 'false')."AtcCode23=</div>            <div>AtcCode24=".(null !==  request('AtcCode24') ? 'true' : 'false')."AtcCode24=</div>            <div>AtcCode25=".(null !==  request('AtcCode25') ? 'true' : 'false')."AtcCode25=</div>            <div>AtcCode26=".(null !==  request('AtcCode26') ? 'true' : 'false')."AtcCode26=</div>            <div>AtcCode27=".(null !==  request('AtcCode27') ? 'true' : 'false')."AtcCode27=</div>            <div>AtcCode28=".(null !==  request('AtcCode28') ? 'true' : 'false')."AtcCode28=</div>            <div>AtcCode29=".(null !==  request('AtcCode29') ? 'true' : 'false')."AtcCode29=</div>            <div>AtcCode30=".(null !==  request('AtcCode30') ? 'true' : 'false')."AtcCode30=</div>            <div>AtcCode31=".(null !==  request('AtcCode31') ? 'true' : 'false')."AtcCode31=</div>            <div>AtcCode32=".(null !==  request('AtcCode32') ? 'true' : 'false')."AtcCode32=</div>            <div>AtcCode33=".(null !==  request('AtcCode33') ? 'true' : 'false')."AtcCode33=</div>            <div>AtcCode34=".(null !==  request('AtcCode34') ? 'true' : 'false')."AtcCode34=</div>            <div>AtcCode35=".(null !==  request('AtcCode35') ? 'true' : 'false')."AtcCode35=</div>            <div>AtcCode36=".(null !==  request('AtcCode36') ? 'true' : 'false')."AtcCode36=</div>            <div>AtcCode37=".(null !==  request('AtcCode37') ? 'true' : 'false')."AtcCode37=</div>            <div>AtcCode38=".(null !==  request('AtcCode38') ? 'true' : 'false')."AtcCode38=</div>            <div>AtcCode39=".(null !==  request('AtcCode39') ? 'true' : 'false')."AtcCode39=</div>            <div>AtcCode40=".(null !==  request('AtcCode40') ? 'true' : 'false')."AtcCode40=</div>            <div>AtcCode41=".(null !==  request('AtcCode41') ? 'true' : 'false')."AtcCode41=</div>            <div>AtcCode42=".(null !==  request('AtcCode42') ? 'true' : 'false')."AtcCode42=</div>            <div>AtcCode43=".(null !==  request('AtcCode43') ? 'true' : 'false')."AtcCode43=</div>            <div>AtcCode44=".(null !==  request('AtcCode44') ? 'true' : 'false')."AtcCode44=</div>            <div>AtcCode45=".(null !==  request('AtcCode45') ? 'true' : 'false')."AtcCode45=</div>            <div>AtcCode46=".(null !==  request('AtcCode46') ? 'true' : 'false')."AtcCode46=</div>            <div>AtcCode47=".(null !==  request('AtcCode47') ? 'true' : 'false')."AtcCode47=</div>            <div>AtcCode48=".(null !==  request('AtcCode48') ? 'true' : 'false')."AtcCode48=</div>            <div>AtcCode49=".(null !==  request('AtcCode49') ? 'true' : 'false')."AtcCode49=</div>            <div>AtcCode50=".(null !==  request('AtcCode50') ? 'true' : 'false')."AtcCode50=</div>            <div>AtcCode51=".(null !==  request('AtcCode51') ? 'true' : 'false')."AtcCode51=</div>            <div>AtcCode52=".(null !==  request('AtcCode52') ? 'true' : 'false')."AtcCode52=</div>            <div>AtcCode53=".(null !==  request('AtcCode53') ? 'true' : 'false')."AtcCode53=</div>            <div>AtcCode54=".(null !==  request('AtcCode54') ? 'true' : 'false')."AtcCode54=</div>            <div>AtcCode55=".(null !==  request('AtcCode55') ? 'true' : 'false')."AtcCode55=</div>            <div>AtcCode56=".(null !==  request('AtcCode56') ? 'true' : 'false')."AtcCode56=</div>            <div>AtcCode57=".(null !==  request('AtcCode57') ? 'true' : 'false')."AtcCode57=</div>            <div>AtcCode58=".(null !==  request('AtcCode58') ? 'true' : 'false')."AtcCode58=</div>            <div>AtcCode59=".(null !==  request('AtcCode59') ? 'true' : 'false')."AtcCode59=</div>            <div>AtcCode60=".(null !==  request('AtcCode60') ? 'true' : 'false')."AtcCode60=</div>            <div>AtcCode61=".(null !==  request('AtcCode61') ? 'true' : 'false')."AtcCode61=</div>            <div>AtcCode62=".(null !==  request('AtcCode62') ? 'true' : 'false')."AtcCode62=</div>            <div>AtcCode63=".(null !==  request('AtcCode63') ? 'true' : 'false')."AtcCode63=</div>            <div>AtcCode64=".(null !==  request('AtcCode64') ? 'true' : 'false')."AtcCode64=</div>            <div>AtcCode65=".(null !==  request('AtcCode65') ? 'true' : 'false')."AtcCode65=</div>            <div>AtcCode66=".(null !==  request('AtcCode66') ? 'true' : 'false')."AtcCode66=</div>            <div>AtcCode67=".(null !==  request('AtcCode67') ? 'true' : 'false')."AtcCode67=</div>            <div>AtcCode68=".(null !==  request('AtcCode68') ? 'true' : 'false')."AtcCode68=</div>            <div>AtcCode69=".(null !==  request('AtcCode69') ? 'true' : 'false')."AtcCode69=</div>            <div>AtcCode70=".(null !==  request('AtcCode70') ? 'true' : 'false')."AtcCode70=</div>            <div>AtcCode71=".(null !==  request('AtcCode71') ? 'true' : 'false')."AtcCode71=</div>            <div>AtcCode72=".(null !==  request('AtcCode72') ? 'true' : 'false')."AtcCode72=</div>            <div>AtcCode73=".(null !==  request('AtcCode73') ? 'true' : 'false')."AtcCode73=</div>            <div>AtcCode74=".(null !==  request('AtcCode74') ? 'true' : 'false')."AtcCode74=</div>            <div>AtcCode75=".(null !==  request('AtcCode75') ? 'true' : 'false')."AtcCode75=</div>            <div>AtcCode76=".(null !==  request('AtcCode76') ? 'true' : 'false')."AtcCode76=</div>            <div>AtcCode77=".(null !==  request('AtcCode77') ? 'true' : 'false')."AtcCode77=</div>            <div>AtcCode78=".(null !==  request('AtcCode78') ? 'true' : 'false')."AtcCode78=</div>            <div>AtcCode79=".(null !==  request('AtcCode79') ? 'true' : 'false')."AtcCode79=</div>            <div>AtcCode80=".(null !==  request('AtcCode80') ? 'true' : 'false')."AtcCode80=</div>            <div>AtcCode81=".(null !==  request('AtcCode81') ? 'true' : 'false')."AtcCode81=</div>            <div>AtcCode82=".(null !==  request('AtcCode82') ? 'true' : 'false')."AtcCode82=</div>            <div>AtcCode83=".(null !==  request('AtcCode83') ? 'true' : 'false')."AtcCode83=</div>            <div>AtcCode84=".(null !==  request('AtcCode84') ? 'true' : 'false')."AtcCode84=</div>            <div>AtcCode85=".(null !==  request('AtcCode85') ? 'true' : 'false')."AtcCode85=</div>            <div>AtcCode86=".(null !==  request('AtcCode86') ? 'true' : 'false')."AtcCode86=</div>            <div>AtcCode87=".(null !==  request('AtcCode87') ? 'true' : 'false')."AtcCode87=</div>            <div>AtcCode88=".(null !==  request('AtcCode88') ? 'true' : 'false')."AtcCode88=</div>            <div>AtcCode89=".(null !==  request('AtcCode89') ? 'true' : 'false')."AtcCode89=</div>            <div>AtcCode90=".(null !==  request('AtcCode90') ? 'true' : 'false')."AtcCode90=</div>            <div>AtcCode91=".(null !==  request('AtcCode91') ? 'true' : 'false')."AtcCode91=</div>            <div>AtcCode92=".(null !==  request('AtcCode92') ? 'true' : 'false')."AtcCode92=</div>            <div>AtcCode93=".(null !==  request('AtcCode93') ? 'true' : 'false')."AtcCode93=</div>            <div>AtcCode94=".(null !==  request('AtcCode94') ? 'true' : 'false')."AtcCode94=</div>            <div>AtcCode95=".(null !==  request('AtcCode95') ? 'true' : 'false')."AtcCode95=</div>            <div>AtcCode96=".(null !==  request('AtcCode96') ? 'true' : 'false')."AtcCode96=</div>";
        }

        $xmlOtherAtc = "";
        if(null !== request('frm1601EQ:txtAtcCd')[0]){
            for ($i=6; $i < count(request('frm1601EQ:txtAtcCd')) ; $i++) {
                $xmlOtherAtc .= "            <div>frm1601EQ:txtAtcCd".($i + 1)."=".request('frm1601EQ:txtAtcCd')[$i]."frm1601EQ:txtAtcCd".($i + 1)."=</div>            <div>frm1601EQ:txtTaxBase".($i + 1)."=".request('frm1601EQ:txtTaxBase')[$i]."frm1601EQ:txtTaxBase".($i + 1)."=</div>            <div>frm1601EQ:txtTaxRate".($i + 1)."=".request('frm1601EQ:txtTaxRate')[$i]."frm1601EQ:txtTaxRate".($i + 1)."=</div>            <div>frm1601EQ:txtTaxbeWithHeld".($i + 1)."=".request('frm1601EQ:txtTaxbeWithHeld')[$i]."frm1601EQ:txtTaxbeWithHeld".($i + 1)."=</div>";
            }
        }

        $xmlData ="<?xml version='1.0'?>            <div>frm1601EQ:txtYear=".request('frm1601EQ:txtYear')."frm1601EQ:txtYear=</div>            <div>frm1601EQ:optQuarter:1=".$optQuarter1."frm1601EQ:optQuarter:1=</div>            <div>frm1601EQ:optQuarter:2=".$optQuarter2."frm1601EQ:optQuarter:2=</div>            <div>frm1601EQ:optQuarter:3=".$optQuarter3."frm1601EQ:optQuarter:3=</div>            <div>frm1601EQ:optQuarter:4=".$optQuarter4."frm1601EQ:optQuarter:4=</div>            <div>frm1601EQ:optAmend:Y=".$optAmendY."frm1601EQ:optAmend:Y=</div>            <div>frm1601EQ:optAmend:N=".$optAmendN."frm1601EQ:optAmend:N=</div>            <div>frm1601EQ:optWithheld:Y=".$optWithheldY."frm1601EQ:optWithheld:Y=</div>            <div>frm1601EQ:optWithheld:N=".$optWithheldN."frm1601EQ:optWithheld:N=</div>            <div>frm1601EQ:txtNoSheets=".request('frm1601EQ:txtNoSheets')."frm1601EQ:txtNoSheets=</div>            <div>frm1601EQ:txtTIN1=".request('frm1601EQ:txtTIN1')."frm1601EQ:txtTIN1=</div>            <div>frm1601EQ:txtTIN2=".request('frm1601EQ:txtTIN2')."frm1601EQ:txtTIN2=</div>            <div>frm1601EQ:txtTIN3=".request('frm1601EQ:txtTIN3')."frm1601EQ:txtTIN3=</div>            <div>frm1601EQ:txtBranchCode=".request('frm1601EQ:txtBranchCode')."frm1601EQ:txtBranchCode=</div>            <div>frm1601EQ:txtRDOCode=".request('frm1601EQ:txtRDOCode')."frm1601EQ:txtRDOCode=</div>            <div>frm1601EQ:txtTaxpayerName=".$taxPayerName."frm1601EQ:txtTaxpayerName=</div>            <div>frm1601EQ:txtLineBus=".$lineBusiness."frm1601EQ:txtLineBus=</div>            <div>frm1601EQ:txtAddress=".$address."frm1601EQ:txtAddress=</div>            <div>frm1601EQ:txtZipCode=".request('frm1601EQ:txtZipCode')."frm1601EQ:txtZipCode=</div>            <div>frm1601EQ:txtTelNum=".request('frm1601EQ:txtTelNum')."frm1601EQ:txtTelNum=</div>            <div>frm1601EQ:optCategory:P=".$optCategoryP."frm1601EQ:optCategory:P=</div>            <div>frm1601EQ:optCategory:G=".$optCategoryG."frm1601EQ:optCategory:G=</div>            <div>txtEmail=".request('txtEmail')."txtEmail=</div>            <div>frm1601EQ:txtAtcCd1=".request('frm1601EQ:txtAtcCd')[0]."frm1601EQ:txtAtcCd1=</div>            <div>frm1601EQ:txtTaxBase1=".request('frm1601EQ:txtTaxBase')[0]."frm1601EQ:txtTaxBase1=</div>            <div>frm1601EQ:txtTaxRate1=".request('frm1601EQ:txtTaxRate')[0]."frm1601EQ:txtTaxRate1=</div>            <div>frm1601EQ:txtTaxbeWithHeld1=".request('frm1601EQ:txtTaxbeWithHeld')[0]."frm1601EQ:txtTaxbeWithHeld1=</div>            <div>frm1601EQ:txtAtcCd2=".request('frm1601EQ:txtAtcCd')[1]."frm1601EQ:txtAtcCd2=</div>            <div>frm1601EQ:txtTaxBase2=".request('frm1601EQ:txtTaxBase')[1]."frm1601EQ:txtTaxBase2=</div>            <div>frm1601EQ:txtTaxRate2=".request('frm1601EQ:txtTaxRate')[1]."frm1601EQ:txtTaxRate2=</div>            <div>frm1601EQ:txtTaxbeWithHeld2=".request('frm1601EQ:txtTaxbeWithHeld')[1]."frm1601EQ:txtTaxbeWithHeld2=</div>            <div>frm1601EQ:txtAtcCd3=".request('frm1601EQ:txtAtcCd')[2]."frm1601EQ:txtAtcCd3=</div>            <div>frm1601EQ:txtTaxBase3=".request('frm1601EQ:txtTaxBase')[2]."frm1601EQ:txtTaxBase3=</div>            <div>frm1601EQ:txtTaxRate3=".request('frm1601EQ:txtTaxRate')[2]."frm1601EQ:txtTaxRate3=</div>            <div>frm1601EQ:txtTaxbeWithHeld3=".request('frm1601EQ:txtTaxbeWithHeld')[2]."frm1601EQ:txtTaxbeWithHeld3=</div>            <div>frm1601EQ:txtAtcCd4=".request('frm1601EQ:txtAtcCd')[3]."frm1601EQ:txtAtcCd4=</div>            <div>frm1601EQ:txtTaxBase4=".request('frm1601EQ:txtTaxBase')[3]."frm1601EQ:txtTaxBase4=</div>            <div>frm1601EQ:txtTaxRate4=".request('frm1601EQ:txtTaxRate')[3]."frm1601EQ:txtTaxRate4=</div>            <div>frm1601EQ:txtTaxbeWithHeld4=".request('frm1601EQ:txtTaxbeWithHeld')[3]."frm1601EQ:txtTaxbeWithHeld4=</div>            <div>frm1601EQ:txtAtcCd5=".request('frm1601EQ:txtAtcCd')[4]."frm1601EQ:txtAtcCd5=</div>            <div>frm1601EQ:txtTaxBase5=".request('frm1601EQ:txtTaxBase')[4]."frm1601EQ:txtTaxBase5=</div>            <div>frm1601EQ:txtTaxRate5=".request('frm1601EQ:txtTaxRate')[4]."frm1601EQ:txtTaxRate5=</div>            <div>frm1601EQ:txtTaxbeWithHeld5=".request('frm1601EQ:txtTaxbeWithHeld')[4]."frm1601EQ:txtTaxbeWithHeld5=</div>            <div>frm1601EQ:txtAtcCd6=".request('frm1601EQ:txtAtcCd')[5]."frm1601EQ:txtAtcCd6=</div>            <div>frm1601EQ:txtTaxBase6=".request('frm1601EQ:txtTaxBase')[5]."frm1601EQ:txtTaxBase6=</div>            <div>frm1601EQ:txtTaxRate6=".request('frm1601EQ:txtTaxRate')[5]."frm1601EQ:txtTaxRate6=</div>            <div>frm1601EQ:txtTaxbeWithHeld6=".request('frm1601EQ:txtTaxbeWithHeld')[5]."frm1601EQ:txtTaxbeWithHeld6=</div>            <div>frm1601EQ:txtTotalOtherTax=".request('frm1601EQ:txtTotalOtherTax')[0]."frm1601EQ:txtTotalOtherTax=</div>            <div>frm1601EQ:txtTax19=".request('frm1601EQ:txtTax19')."frm1601EQ:txtTax19=</div>            <div>frm1601EQ:txtTax20=".request('frm1601EQ:txtTax20')."frm1601EQ:txtTax20=</div>            <div>frm1601EQ:txtTax21=".request('frm1601EQ:txtTax21')."frm1601EQ:txtTax21=</div>            <div>frm1601EQ:txtTax22=".request('frm1601EQ:txtTax22')."frm1601EQ:txtTax22=</div>            <div>frm1601EQ:txtTax23=".request('frm1601EQ:txtTax23')."frm1601EQ:txtTax23=</div>            <div>frm1601EQ:txtTax24=".request('frm1601EQ:txtTax24')."frm1601EQ:txtTax24=</div>            <div>frm1601EQ:txtTax25=".request('frm1601EQ:txtTax25')."frm1601EQ:txtTax25=</div>            <div>frm1601EQ:txtTax26=".request('frm1601EQ:txtTax26')."frm1601EQ:txtTax26=</div>            <div>frm1601EQ:txtTax27=".request('frm1601EQ:txtTax27')."frm1601EQ:txtTax27=</div>            <div>frm1601EQ:txtTax28=".request('frm1601EQ:txtTax28')."frm1601EQ:txtTax28=</div>            <div>frm1601EQ:txtTax29=".request('frm1601EQ:txtTax29')."frm1601EQ:txtTax29=</div>            <div>frm1601EQ:txtTax30=".request('frm1601EQ:txtTax30')."frm1601EQ:txtTax30=</div>            <div>frm1601EQ:ifRefund=".$ifRefund."frm1601EQ:ifRefund=</div>            <div>frm1601EQ:ifIssueCert=".$ifIssueCert."frm1601EQ:ifIssueCert=</div>            <div>frm1601EQ:ifCarriedOver=".$ifCarriedOver."frm1601EQ:ifCarriedOver=</div>            <div>txtTaxAgentNo=txtTaxAgentNo=</div>            <div>txtDateIssue=txtDateIssue=</div>            <div>txtDateExpiry=txtDateExpiry=</div>            <div>frm1601EQ:txtAgency33=frm1601EQ:txtAgency33=</div>            <div>frm1601EQ:txtNumber33=frm1601EQ:txtNumber33=</div>            <div>frm1601EQ:txtDate33=frm1601EQ:txtDate33=</div>            <div>frm1601EQ:txtAmount33=frm1601EQ:txtAmount33=</div>            <div>frm1601EQ:txtAgency34=frm1601EQ:txtAgency34=</div>            <div>frm1601EQ:txtNumber34=frm1601EQ:txtNumber34=</div>            <div>frm1601EQ:txtDate34=frm1601EQ:txtDate34=</div>            <div>frm1601EQ:txtAmount34=frm1601EQ:txtAmount34=</div>            <div>frm1601EQ:txtAgency35=frm1601EQ:txtAgency35=</div>            <div>frm1601EQ:txtNumber35=frm1601EQ:txtNumber35=</div>            <div>frm1601EQ:txtDate35=frm1601EQ:txtDate35=</div>            <div>frm1601EQ:txtAmount35=frm1601EQ:txtAmount35=</div>            <div>frm1601EQ:txtParticular36=frm1601EQ:txtParticular36=</div>            <div>frm1601EQ:txtAgency36=frm1601EQ:txtAgency36=</div>            <div>frm1601EQ:txtNumber36=frm1601EQ:txtNumber36=</div>            <div>frm1601EQ:txtDate36=frm1601EQ:txtDate36=</div>            <div>frm1601EQ:txtAmount36=frm1601EQ:txtAmount36=</div>".$xmlATC."            <div>hPartIITableSize=".request('hPartIITableSize')."hPartIITableSize=</div>".$xmlOtherAtc."            <div>txtFinalFlag=0txtFinalFlag=</div>            <div>txtEnroll=NtxtEnroll=</div>            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>            <div>ebirOnlineUsername=ebirOnlineUsername=</div>            <div>ebirOnlineSecret=ebirOnlineSecret=</div>            <div>driveSelectTPExport=driveSelectTPExport=</div>                        All Rights Reserved BIR 2012.";

        $tin = request('frm1601EQ:txtTIN1').request('frm1601EQ:txtTIN2').request('frm1601EQ:txtTIN3').request('frm1601EQ:txtBranchCode');

        if(null !== request('frm1601EQ:optQuarter')){
            $getReturnPeriod = tbl_1601EQ::where('company_id',  request('company'))
                            ->where('item1', request('frm1601EQ:txtYear'))
                            ->where('item2', request('frm1601EQ:optQuarter'))
                            ->count();
        }else{
            $getReturnPeriod = tbl_1601EQ::where('company_id',  request('company'))
                            ->where('item1', request('frm1601EQ:txtYear'))
                            ->where('item2', "")
                            ->count();
        }

        if(null !== request('frm1601EQ:optQuarter')){
            $returnPeriod = request('frm1601EQ:txtYear')."-Q".request('frm1601EQ:optQuarter');
        }else{
            $splitYear = str_split(request('frm1601EQ:txtYear'), 2);
         
            $returnPeriod = "Q-".$splitYear[0]."-".$splitYear[1];
        }

        if($getReturnPeriod == "1"){
            if(null !== request('frm1601EQ:optQuarter')){
                $xmlReturnPeriod = request('frm1601EQ:txtYear')."Q".request('frm1601EQ:optQuarter');
            }else{
                $xmlReturnPeriod = request('frm1601EQ:txtYear');
            }
        }else{
                if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1601EQ')
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

            if(null !== request('frm1601EQ:optQuarter')){
                $xmlReturnPeriod = request('frm1601EQ:txtYear').'Q'.request('frm1601EQ:optQuarter').$ext;
            }else{
                $xmlReturnPeriod = request('frm1601EQ:txtYear');
            }
        }

        $filename = $tin."-1601EQ-".$xmlReturnPeriod.'.xml';

        

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
                'form'          => '1601EQ',
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
                            ->where('form', '1601EQ')
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
                            ->where('form', '1601EQ')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1601EQ::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1601EQ')
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
        $atc = DB::table('1601_eq_atcs')->get();

        $data = tbl_1601EQ::find($form_id);
        $selected = tbl_1601EQ_schedule::where('form_id', $form_id)->get();

        return view('forms.BIR-Form 1601EQ',['atc' => $atc, 'company' => $company, 'data' => $data, 'selected' => $selected, 'action' => $action]);
    }
}

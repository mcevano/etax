<?php

namespace App\Http\Controllers;
use App\Xml;
use App\Companies;
use App\tbl_1601E;
use App\tbl_1601E_schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1601EController extends Controller
{

    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        $atc = DB::table('1601_e_atcs')->get();

        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){

            if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1601_es')){

            }else{
                Schema::connection('mysql2')->create('tbl_1601_es', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A');
                    $table->string('item1B');
                    $table->string('item2');
                    $table->string('item3');
                    $table->string('item4')->nullable();
                    $table->string('item12')->nullable();
                    $table->string('item13')->nullable();
                    $table->string('item13A')->nullable();
                    $table->text('item14');
                    $table->text('item15A');
                    $table->text('item15B');
                    $table->text('item15C');
                    $table->text('item16');
                    $table->text('item17A');
                    $table->text('item17B');
                    $table->text('item17C');
                    $table->text('item17D');
                    $table->text('item18');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1601_e_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('atc');
                    $table->text('description');
                    $table->text('tax_base')->nullable();
                    $table->text('rate');
                    $table->text('withheld');
                    $table->timestamps();
                });
            }
            
            return view('forms.BIR-Form 1601E',['atc' => $atc, 'company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{

            $data = tbl_1601E::find($form_id);
            $schedules = tbl_1601E_schedule::where('form_id', $form_id)->get();
            return view('forms.BIR-Form 1601E',['atc' => $atc, 'company' => $company, 'data' => $data, 'schedules' => $schedules, 'action' => $action]);
        }
    }

    public function store(){

        config(['database.connections.mysql2.database' => Auth::user()->database_name]);
     	$data = ([
     		'form_no' 		=> request('form_no'),
    		'company_id' 	=> request('company'),
    		'item1A' 		=> request('frm1601E:j_id201'),
    		'item1B' 		=> request('frm1601E:txtYear'),
    		'item2' 		=> request('frm1601E:j_id217'),
    		'item3' 		=> request('frm1601E:txtSheets'),
    		'item4' 		=> null !== request('frm1601E:j_id252') ? request('frm1601E:j_id252') : '',
    		'item12' 		=> null !== request('frm1601E:j_id392') ? request('frm1601E:j_id392') : '',
    		'item13' 		=> request('frm1601E:j_id398'),
    		'item13A' 		=> request('frm1601E:j_id402'),
    		'item14' 		=> request('frm1601E:txtTax14'),
    		'item15A' 		=> request('frm1601E:txtTax15A'),
    		'item15B' 		=> request('frm1601E:txtTax15B'),
    		'item15C' 		=> request('frm1601E:txtTax15C'),
    		'item16' 		=> request('frm1601E:txtTax16'),
    		'item17A' 		=> request('frm1601E:txtTax17A'),
    		'item17B' 		=> request('frm1601E:txtTax17B'),
    		'item17C' 		=> request('frm1601E:txtTax17C'),
    		'item17D' 		=> request('frm1601E:txtTax17D'),
    		'item18' 		=> request('frm1601E:txtTax18'),
    	]);

     	$getForm = tbl_1601E::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();
		
        $form = "";
        if(request('form_id') != ""){
            $form = tbl_1601E::find(request('form_id'));
            $form->update($data);
            tbl_1601E_schedule::where('form_id', $getForm[0]->id)->delete();
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1601E::create($data);
            }else{
                tbl_1601E_schedule::where('form_id', $getForm[0]->id)->delete();
                $form = tbl_1601E::find($getForm[0]->id);
                $form->update($data);
            }
        }
     	
     
     	if(null !== request('frm1601E:txtAtcCd')[0]){
     		for ($i=0; $i < count(request('frm1601E:txtAtcCd')) ; $i++) { 
	     		$atc = ([
	     			'form_id'		=> $form->id,
	     			'atc'			=> request('frm1601E:txtAtcCd')[$i],
	     			'description'	=> request('txtNaturePayment')[$i],
	     			'tax_base'		=> request('frm1601E:txtTaxBase')[$i],
	     			'rate'			=> request('frm1601E:txtTaxRate')[$i],
	     			'withheld'		=> request('frm1601E:txtTaxbeWithHeld')[$i],
	     		]);

	     		tbl_1601E_schedule::create($atc);
	     	}
     	}

     	$j_id2171 = "false";
     	$j_id2172 = "false";

     	if(request('frm1601E:j_id217') == 'Y'){
     		$j_id2171 = "true";
     	}else if(request('frm1601E:j_id217') == 'N'){
     		$j_id2172 = "true";
     	}

     	$j_id2521 = "false";
     	$j_id2522 = "false";

     	if(null !== request('frm1601E:j_id252')){
     		if(request('frm1601E:j_id252') == "Y"){
     			$j_id2521 = "true";
     		}else if(request('frm1601E:j_id252') == "N"){
     			$j_id2522 = "true";
     		}
     	}

     	$j_id3921 = "false";
     	$j_id3922 = "false";

     	if(null !== request('frm1601E:j_id392')){
     		if(request('frm1601E:j_id392') == "P"){
     			$j_id3921 = "true";
     		}else if(request('frm1601E:j_id392') == "G"){
     			$j_id3922 = "true";
     		}
     	}

     	$replaceSpaceName = str_replace(' ', '%20', request('frm1601E:txtTaxpayerName')); 
        $taxPayerName =  str_replace(',', '%2C', $replaceSpaceName);

        $getAddress = str_replace(' ', '%20',request('frm1601E:txtAddress')); 
        $address = str_replace(',', '%2C', $getAddress);

        $replaceSpaceLineBusiness = str_replace(' ', '%20', request('frm1601E:txtLineBus')); 
        $lineOfBusiness =  str_replace(',', '%2C', $replaceSpaceLineBusiness);

        $j_id3981 = "false";
        $j_id3982 = "false";

        if(request('frm1601E:j_id398') == 'Y'){
        	$j_id3981 = "true";
        }else if(request('frm1601E:j_id398') == 'N'){
        	$j_id3982 = "true";
        }

        $xml_atc ="";
        if(null !== request('frm1601E:j_id252')){
     		for ($i=0; $i < count(request('frm1601E:txtAtcCd')) ; $i++) { 
	     		$xml_atc .= "<div>frm1601E:txtAtcCd".($i + 1 )."=".request('frm1601E:txtAtcCd')[$i]."frm1601E:txtAtcCd".($i + 1 )."=</div>	
            <div>frm1601E:txtTaxBase".($i + 1 )."=".request('frm1601E:txtTaxBase')[$i]."frm1601E:txtTaxBase".($i + 1 )."=</div>	
            <div>frm1601E:txtTaxRate".($i + 1 )."=".request('frm1601E:txtTaxRate')[$i]."frm1601E:txtTaxRate".($i + 1 )."=</div>	
            <div>frm1601E:txtTaxbeWithHeld".($i + 1 )."=".request('frm1601E:txtTaxbeWithHeld')[$i]."frm1601E:txtTaxbeWithHeld".($i + 1 )."=</div>	
            ";
	     	}
     	}
     	$selected_atc = "";
     	if(null !== request('frm1601E:j_id392')){
     		$selected_atc ="
            <div>AtcCode1=".(null !== request('AtcCode1') ? 'true' : 'false')."AtcCode1=</div>	
            <div>AtcCode2=".(null !== request('AtcCode2') ? 'true' : 'false')."AtcCode2=</div>	
            <div>AtcCode3=".(null !== request('AtcCode3') ? 'true' : 'false')."AtcCode3=</div>	
            <div>AtcCode4=".(null !== request('AtcCode4') ? 'true' : 'false')."AtcCode4=</div>	
            <div>AtcCode5=".(null !== request('AtcCode5') ? 'true' : 'false')."AtcCode5=</div>	
            <div>AtcCode6=".(null !== request('AtcCode6') ? 'true' : 'false')."AtcCode6=</div>	
            <div>AtcCode7=".(null !== request('AtcCode7') ? 'true' : 'false')."AtcCode7=</div>	
            <div>AtcCode8=".(null !== request('AtcCode8') ? 'true' : 'false')."AtcCode8=</div>	
            <div>AtcCode9=".(null !== request('AtcCode9') ? 'true' : 'false')."AtcCode9=</div>	
            <div>AtcCode10=".(null !== request('AtcCode10') ? 'true' : 'false')."AtcCode10=</div>	
            <div>AtcCode11=".(null !== request('AtcCode11') ? 'true' : 'false')."AtcCode11=</div>	
            <div>AtcCode12=".(null !== request('AtcCode12') ? 'true' : 'false')."AtcCode12=</div>	
            <div>AtcCode13=".(null !== request('AtcCode13') ? 'true' : 'false')."AtcCode13=</div>	
            <div>AtcCode14=".(null !== request('AtcCode14') ? 'true' : 'false')."AtcCode14=</div>	
            <div>AtcCode15=".(null !== request('AtcCode15') ? 'true' : 'false')."AtcCode15=</div>	
            <div>AtcCode16=".(null !== request('AtcCode16') ? 'true' : 'false')."AtcCode16=</div>	
            <div>AtcCode17=".(null !== request('AtcCode17') ? 'true' : 'false')."AtcCode17=</div>	
            <div>AtcCode18=".(null !== request('AtcCode18') ? 'true' : 'false')."AtcCode18=</div>	
            <div>AtcCode19=".(null !== request('AtcCode19') ? 'true' : 'false')."AtcCode19=</div>	
            <div>AtcCode20=".(null !== request('AtcCode20') ? 'true' : 'false')."AtcCode20=</div>	
            <div>AtcCode21=".(null !== request('AtcCode21') ? 'true' : 'false')."AtcCode21=</div>	
            <div>AtcCode22=".(null !== request('AtcCode22') ? 'true' : 'false')."AtcCode22=</div>	
            <div>AtcCode23=".(null !== request('AtcCode23') ? 'true' : 'false')."AtcCode23=</div>	
            <div>AtcCode24=".(null !== request('AtcCode24') ? 'true' : 'false')."AtcCode24=</div>	
            <div>AtcCode25=".(null !== request('AtcCode25') ? 'true' : 'false')."AtcCode25=</div>	
            <div>AtcCode26=".(null !== request('AtcCode26') ? 'true' : 'false')."AtcCode26=</div>	
            <div>AtcCode27=".(null !== request('AtcCode27') ? 'true' : 'false')."AtcCode27=</div>	
            <div>AtcCode28=".(null !== request('AtcCode28') ? 'true' : 'false')."AtcCode28=</div>	
            <div>AtcCode29=".(null !== request('AtcCode29') ? 'true' : 'false')."AtcCode29=</div>	
            <div>AtcCode30=".(null !== request('AtcCode30') ? 'true' : 'false')."AtcCode30=</div>	
            <div>AtcCode31=".(null !== request('AtcCode31') ? 'true' : 'false')."AtcCode31=</div>	
            <div>AtcCode32=".(null !== request('AtcCode32') ? 'true' : 'false')."AtcCode32=</div>	
            <div>AtcCode33=".(null !== request('AtcCode33') ? 'true' : 'false')."AtcCode33=</div>	
            <div>AtcCode34=".(null !== request('AtcCode34') ? 'true' : 'false')."AtcCode34=</div>	
            <div>AtcCode35=".(null !== request('AtcCode35') ? 'true' : 'false')."AtcCode35=</div>	
            <div>AtcCode36=".(null !== request('AtcCode36') ? 'true' : 'false')."AtcCode36=</div>	
            <div>AtcCode37=".(null !== request('AtcCode37') ? 'true' : 'false')."AtcCode37=</div>	
            <div>AtcCode38=".(null !== request('AtcCode38') ? 'true' : 'false')."AtcCode38=</div>	
            <div>AtcCode39=".(null !== request('AtcCode39') ? 'true' : 'false')."AtcCode39=</div>	
            <div>AtcCode40=".(null !== request('AtcCode40') ? 'true' : 'false')."AtcCode40=</div>	
            <div>AtcCode41=".(null !== request('AtcCode41') ? 'true' : 'false')."AtcCode41=</div>	
            <div>AtcCode42=".(null !== request('AtcCode42') ? 'true' : 'false')."AtcCode42=</div>	
            <div>AtcCode43=".(null !== request('AtcCode43') ? 'true' : 'false')."AtcCode43=</div>	
            <div>AtcCode44=".(null !== request('AtcCode44') ? 'true' : 'false')."AtcCode44=</div>	
            <div>AtcCode45=".(null !== request('AtcCode45') ? 'true' : 'false')."AtcCode45=</div>	
            <div>AtcCode46=".(null !== request('AtcCode46') ? 'true' : 'false')."AtcCode46=</div>	
            <div>AtcCode47=".(null !== request('AtcCode47') ? 'true' : 'false')."AtcCode47=</div>	
            <div>AtcCode48=".(null !== request('AtcCode48') ? 'true' : 'false')."AtcCode48=</div>	
            <div>AtcCode49=".(null !== request('AtcCode49') ? 'true' : 'false')."AtcCode49=</div>	
            <div>AtcCode50=".(null !== request('AtcCode50') ? 'true' : 'false')."AtcCode50=</div>	
            <div>AtcCode51=".(null !== request('AtcCode51') ? 'true' : 'false')."AtcCode51=</div>	
            <div>AtcCode52=".(null !== request('AtcCode52') ? 'true' : 'false')."AtcCode52=</div>	
            <div>AtcCode53=".(null !== request('AtcCode53') ? 'true' : 'false')."AtcCode53=</div>	
            <div>AtcCode54=".(null !== request('AtcCode54') ? 'true' : 'false')."AtcCode54=</div>	
            <div>AtcCode55=".(null !== request('AtcCode55') ? 'true' : 'false')."AtcCode55=</div>	
            <div>AtcCode56=".(null !== request('AtcCode56') ? 'true' : 'false')."AtcCode56=</div>	
            <div>AtcCode57=".(null !== request('AtcCode57') ? 'true' : 'false')."AtcCode57=</div>	
            <div>AtcCode58=".(null !== request('AtcCode58') ? 'true' : 'false')."AtcCode58=</div>	
            <div>AtcCode59=".(null !== request('AtcCode59') ? 'true' : 'false')."AtcCode59=</div>	
            <div>AtcCode60=".(null !== request('AtcCode60') ? 'true' : 'false')."AtcCode60=</div>	
            <div>AtcCode61=".(null !== request('AtcCode61') ? 'true' : 'false')."AtcCode61=</div>	
            <div>AtcCode62=".(null !== request('AtcCode62') ? 'true' : 'false')."AtcCode62=</div>	
            <div>AtcCode63=".(null !== request('AtcCode63') ? 'true' : 'false')."AtcCode63=</div>	
            <div>AtcCode64=".(null !== request('AtcCode64') ? 'true' : 'false')."AtcCode64=</div>	
            <div>AtcCode65=".(null !== request('AtcCode65') ? 'true' : 'false')."AtcCode65=</div>	
            <div>AtcCode66=".(null !== request('AtcCode66') ? 'true' : 'false')."AtcCode66=</div>	
            <div>AtcCode67=".(null !== request('AtcCode67') ? 'true' : 'false')."AtcCode67=</div>	
            <div>AtcCode68=".(null !== request('AtcCode68') ? 'true' : 'false')."AtcCode68=</div>	
            <div>AtcCode69=".(null !== request('AtcCode69') ? 'true' : 'false')."AtcCode69=</div>	
            <div>AtcCode70=".(null !== request('AtcCode70') ? 'true' : 'false')."AtcCode70=</div>	
            <div>AtcCode71=".(null !== request('AtcCode71') ? 'true' : 'false')."AtcCode71=</div>	
            <div>AtcCode72=".(null !== request('AtcCode72') ? 'true' : 'false')."AtcCode72=</div>	
            <div>AtcCode73=".(null !== request('AtcCode73') ? 'true' : 'false')."AtcCode73=</div>	
            <div>AtcCode74=".(null !== request('AtcCode74') ? 'true' : 'false')."AtcCode74=</div>	
            <div>AtcCode75=".(null !== request('AtcCode75') ? 'true' : 'false')."AtcCode75=</div>	
            <div>AtcCode76=".(null !== request('AtcCode76') ? 'true' : 'false')."AtcCode76=</div>	
            <div>AtcCode77=".(null !== request('AtcCode77') ? 'true' : 'false')."AtcCode77=</div>	
            <div>AtcCode78=".(null !== request('AtcCode78') ? 'true' : 'false')."AtcCode78=</div>	
            <div>AtcCode79=".(null !== request('AtcCode79') ? 'true' : 'false')."AtcCode79=</div>	
            <div>AtcCode80=".(null !== request('AtcCode80') ? 'true' : 'false')."AtcCode80=</div>	
            <div>AtcCode81=".(null !== request('AtcCode81') ? 'true' : 'false')."AtcCode81=</div>	
            <div>AtcCode82=".(null !== request('AtcCode82') ? 'true' : 'false')."AtcCode82=</div>	
            <div>AtcCode83=".(null !== request('AtcCode83') ? 'true' : 'false')."AtcCode83=</div>	
            <div>AtcCode84=".(null !== request('AtcCode84') ? 'true' : 'false')."AtcCode84=</div>	
            <div>AtcCode85=".(null !== request('AtcCode85') ? 'true' : 'false')."AtcCode85=</div>	
            <div>AtcCode86=".(null !== request('AtcCode86') ? 'true' : 'false')."AtcCode86=</div>	
            <div>AtcCode87=".(null !== request('AtcCode87') ? 'true' : 'false')."AtcCode87=</div>	
            <div>AtcCode88=".(null !== request('AtcCode88') ? 'true' : 'false')."AtcCode88=</div>	
            <div>AtcCode89=".(null !== request('AtcCode89') ? 'true' : 'false')."AtcCode89=</div>	
            <div>AtcCode90=".(null !== request('AtcCode90') ? 'true' : 'false')."AtcCode90=</div>	
            <div>AtcCode91=".(null !== request('AtcCode91') ? 'true' : 'false')."AtcCode91=</div>	
            <div>AtcCode92=".(null !== request('AtcCode92') ? 'true' : 'false')."AtcCode92=</div>	
            <div>AtcCode93=".(null !== request('AtcCode93') ? 'true' : 'false')."AtcCode93=</div>	
            <div>AtcCode94=".(null !== request('AtcCode94') ? 'true' : 'false')."AtcCode94=</div>	
            <div>AtcCode95=".(null !== request('AtcCode95') ? 'true' : 'false')."AtcCode95=</div>	
            <div>AtcCode96=".(null !== request('AtcCode96') ? 'true' : 'false')."AtcCode96=</div>	
            <div>AtcCode97=".(null !== request('AtcCode97') ? 'true' : 'false')."AtcCode97=</div>	
            <div>AtcCode98=".(null !== request('AtcCode98') ? 'true' : 'false')."AtcCode98=</div>	
            <div>AtcCode99=".(null !== request('AtcCode99') ? 'true' : 'false')."AtcCode99=</div>	
            <div>AtcCode100=".(null !== request('AtcCode100') ? 'true' : 'false')."AtcCode100=</div>	
            <div>AtcCode101=".(null !== request('AtcCode101') ? 'true' : 'false')."AtcCode101=</div>	
            <div>AtcCode102=".(null !== request('AtcCode102') ? 'true' : 'false')."AtcCode102=</div>	
            <div>AtcCode103=".(null !== request('AtcCode103') ? 'true' : 'false')."AtcCode103=</div>	
            <div>AtcCode104=".(null !== request('AtcCode104') ? 'true' : 'false')."AtcCode104=</div>	
            <div>AtcCode105=".(null !== request('AtcCode105') ? 'true' : 'false')."AtcCode105=</div>	
            <div>AtcCode106=".(null !== request('AtcCode106') ? 'true' : 'false')."AtcCode106=</div>	
            <div>AtcCode107=".(null !== request('AtcCode107') ? 'true' : 'false')."AtcCode107=</div>	
            <div>AtcCode108=".(null !== request('AtcCode108') ? 'true' : 'false')."AtcCode108=</div>	
            <div>AtcCode109=".(null !== request('AtcCode109') ? 'true' : 'false')."AtcCode109=</div>	
            <div>AtcCode110=".(null !== request('AtcCode110') ? 'true' : 'false')."AtcCode110=</div>	
            <div>AtcCode111=".(null !== request('AtcCode111') ? 'true' : 'false')."AtcCode111=</div>	
            <div>AtcCode112=".(null !== request('AtcCode112') ? 'true' : 'false')."AtcCode112=</div>	
            <div>AtcCode113=".(null !== request('AtcCode113') ? 'true' : 'false')."AtcCode113=</div>	
            <div>AtcCode114=".(null !== request('AtcCode114') ? 'true' : 'false')."AtcCode114=</div>	
            <div>AtcCode115=".(null !== request('AtcCode115') ? 'true' : 'false')."AtcCode115=</div>	
            <div>AtcCode116=".(null !== request('AtcCode116') ? 'true' : 'false')."AtcCode116=</div>	
            <div>AtcCode117=".(null !== request('AtcCode117') ? 'true' : 'false')."AtcCode117=</div>	
            <div>AtcCode118=".(null !== request('AtcCode118') ? 'true' : 'false')."AtcCode118=</div>	
            <div>AtcCode119=".(null !== request('AtcCode119') ? 'true' : 'false')."AtcCode119=</div>	
            <div>AtcCode120=".(null !== request('AtcCode120') ? 'true' : 'false')."AtcCode120=</div>	
            <div>AtcCode121=".(null !== request('AtcCode121') ? 'true' : 'false')."AtcCode121=</div>	
            <div>AtcCode122=".(null !== request('AtcCode112') ? 'true' : 'false')."AtcCode122=</div>	
            <div>AtcCode123=".(null !== request('AtcCode123') ? 'true' : 'false')."AtcCode123=</div>	
            <div>AtcCode124=".(null !== request('AtcCode124') ? 'true' : 'false')."AtcCode124=</div>	
            <div>AtcCode125=".(null !== request('AtcCode125') ? 'true' : 'false')."AtcCode125=</div>	
            <div>AtcCode126=".(null !== request('AtcCode126') ? 'true' : 'false')."AtcCode126=</div>	
            <div>AtcCode127=".(null !== request('AtcCode127') ? 'true' : 'false')."AtcCode127=</div>	
            <div>AtcCode128=".(null !== request('AtcCode128') ? 'true' : 'false')."AtcCode128=</div>	
            <div>AtcCode129=".(null !== request('AtcCode129') ? 'true' : 'false')."AtcCode129=</div>	
            <div>AtcCode130=".(null !== request('AtcCode130') ? 'true' : 'false')."AtcCode130=</div>	
            <div>AtcCode131=".(null !== request('AtcCode131') ? 'true' : 'false')."AtcCode131=</div>	
            <div>AtcCode132=".(null !== request('AtcCode132') ? 'true' : 'false')."AtcCode132=</div>	
            <div>AtcCode133=".(null !== request('AtcCode133') ? 'true' : 'false')."AtcCode133=</div>	
            <div>AtcCode134=".(null !== request('AtcCode134') ? 'true' : 'false')."AtcCode134=</div>	
            <div>AtcCode135=".(null !== request('AtcCode135') ? 'true' : 'false')."AtcCode135=</div>	
            <div>AtcCode136=".(null !== request('AtcCode136') ? 'true' : 'false')."AtcCode136=</div>	
            <div>AtcCode137=".(null !== request('AtcCode137') ? 'true' : 'false')."AtcCode137=</div>	
            <div>AtcCode138=".(null !== request('AtcCode138') ? 'true' : 'false')."AtcCode138=</div>	
            <div>AtcCode139=".(null !== request('AtcCode139') ? 'true' : 'false')."AtcCode139=</div>	
            <div>AtcCode140=".(null !== request('AtcCode140') ? 'true' : 'false')."AtcCode140=</div>	
            <div>AtcCode141=".(null !== request('AtcCode141') ? 'true' : 'false')."AtcCode141=</div>	
            <div>AtcCode142=".(null !== request('AtcCode142') ? 'true' : 'false')."AtcCode142=</div>	
            <div>AtcCode143=".(null !== request('AtcCode143') ? 'true' : 'false')."AtcCode143=</div>	
            <div>AtcCode144=".(null !== request('AtcCode144') ? 'true' : 'false')."AtcCode144=</div>	
            <div>AtcCode145=".(null !== request('AtcCode145') ? 'true' : 'false')."AtcCode145=</div>	
            <div>AtcCode146=".(null !== request('AtcCode146') ? 'true' : 'false')."AtcCode146=</div>	
            <div>AtcCode147=".(null !== request('AtcCode147') ? 'true' : 'false')."AtcCode147=</div>	
            <div>AtcCode148=".(null !== request('AtcCode148') ? 'true' : 'false')."AtcCode148=</div>	
            <div>AtcCode149=".(null !== request('AtcCode149') ? 'true' : 'false')."AtcCode149=</div>	
            <div>AtcCode150=".(null !== request('AtcCode150') ? 'true' : 'false')."AtcCode150=</div>	
            <div>AtcCode151=".(null !== request('AtcCode151') ? 'true' : 'false')."AtcCode151=</div>	
            <div>AtcCode152=".(null !== request('AtcCode152') ? 'true' : 'false')."AtcCode152=</div>	
            <div>AtcCode153=".(null !== request('AtcCode153') ? 'true' : 'false')."AtcCode153=</div>	
            <div>AtcCode154=".(null !== request('AtcCode154') ? 'true' : 'false')."AtcCode154=</div>	
            <div>AtcCode155=".(null !== request('AtcCode155') ? 'true' : 'false')."AtcCode155=</div>	
            <div>AtcCode156=".(null !== request('AtcCode156') ? 'true' : 'false')."AtcCode156=</div>	
            <div>AtcCode157=".(null !== request('AtcCode157') ? 'true' : 'false')."AtcCode157=</div>	
            <div>AtcCode158=".(null !== request('AtcCode158') ? 'true' : 'false')."AtcCode158=</div>	
            <div>AtcCode159=".(null !== request('AtcCode159') ? 'true' : 'false')."AtcCode159=</div>	
            <div>AtcCode160=".(null !== request('AtcCode160') ? 'true' : 'false')."AtcCode160=</div>	
            <div>AtcCode161=".(null !== request('AtcCode161') ? 'true' : 'false')."AtcCode161=</div>	
            <div>AtcCode162=".(null !== request('AtcCode162') ? 'true' : 'false')."AtcCode162=</div>	
            <div>AtcCode163=".(null !== request('AtcCode163') ? 'true' : 'false')."AtcCode163=</div>	
            <div>AtcCode164=".(null !== request('AtcCode164') ? 'true' : 'false')."AtcCode164=</div>	
            <div>AtcCode165=".(null !== request('AtcCode165') ? 'true' : 'false')."AtcCode165=</div>	
            <div>AtcCode166=".(null !== request('AtcCode166') ? 'true' : 'false')."AtcCode166=</div>	
            <div>AtcCode167=".(null !== request('AtcCode167') ? 'true' : 'false')."AtcCode167=</div>	
            <div>AtcCode168=".(null !== request('AtcCode168') ? 'true' : 'false')."AtcCode168=</div>	
            <div>AtcCode169=".(null !== request('AtcCode169') ? 'true' : 'false')."AtcCode169=</div>	
            <div>AtcCode170=".(null !== request('AtcCode170') ? 'true' : 'false')."AtcCode170=</div>	
            <div>AtcCode171=".(null !== request('AtcCode171') ? 'true' : 'false')."AtcCode171=</div>	
            <div>AtcCode172=".(null !== request('AtcCode172') ? 'true' : 'false')."AtcCode172=</div>	
            <div>AtcCode173=".(null !== request('AtcCode173') ? 'true' : 'false')."AtcCode173=</div>	
            <div>AtcCode174=".(null !== request('AtcCode174') ? 'true' : 'false')."AtcCode174=</div>	
            <div>AtcCode175=".(null !== request('AtcCode175') ? 'true' : 'false')."AtcCode175=</div>	
            <div>AtcCode176=".(null !== request('AtcCode176') ? 'true' : 'false')."AtcCode176=</div>	
            <div>AtcCode177=".(null !== request('AtcCode177') ? 'true' : 'false')."AtcCode177=</div>	
            <div>AtcCode178=".(null !== request('AtcCode178') ? 'true' : 'false')."AtcCode178=</div>	
            <div>AtcCode179=".(null !== request('AtcCode179') ? 'true' : 'false')."AtcCode179=</div>	
            <div>AtcCode180=".(null !== request('AtcCode180') ? 'true' : 'false')."AtcCode180=</div>	
            <div>AtcCode181=".(null !== request('AtcCode181') ? 'true' : 'false')."AtcCode181=</div>	
            <div>AtcCode182=".(null !== request('AtcCode182') ? 'true' : 'false')."AtcCode182=</div>	
            <div>AtcCode183=".(null !== request('AtcCode183') ? 'true' : 'false')."AtcCode183=</div>	
            <div>AtcCode184=".(null !== request('AtcCode184') ? 'true' : 'false')."AtcCode184=</div>	
            <div>AtcCode185=".(null !== request('AtcCode185') ? 'true' : 'false')."AtcCode185=</div>	
            <div>AtcCode186=".(null !== request('AtcCode186') ? 'true' : 'false')."AtcCode186=</div>	
            <div>AtcCode187=".(null !== request('AtcCode187') ? 'true' : 'false')."AtcCode187=</div>	
            <div>AtcCode188=".(null !== request('AtcCode188') ? 'true' : 'false')."AtcCode188=</div>	
            <div>AtcCode189=".(null !== request('AtcCode189') ? 'true' : 'false')."AtcCode189=</div>	";
     	}

     	$xmlData = "<?xml version='1.0'?>	
            <div>frm1601E:j_id201=".request('frm1601E:j_id201')."frm1601E:j_id201=</div>	
            <div>frm1601E:txtYear=".request('frm1601E:txtYear')."frm1601E:txtYear=</div>	
            <div>frm1601E:j_id217:_1=".$j_id2171."frm1601E:j_id217:_1=</div>	
            <div>frm1601E:j_id217:_2=".$j_id2172."frm1601E:j_id217:_2=</div>	
            <div>frm1601E:txtSheets=".request('frm1601E:txtSheets')."frm1601E:txtSheets=</div>	
            <div>frm1601E:j_id252:_1=".$j_id2521."frm1601E:j_id252:_1=</div>	
            <div>frm1601E:j_id252:_2=".$j_id2522."frm1601E:j_id252:_2=</div>	
            <div>frm1601E:txtTIN1=".request('frm1601E:txtTIN1')."frm1601E:txtTIN1=</div>	
            <div>frm1601E:txtTIN2=".request('frm1601E:txtTIN2')."frm1601E:txtTIN2=</div>	
            <div>frm1601E:txtTIN3=".request('frm1601E:txtTIN3')."frm1601E:txtTIN3=</div>	
            <div>frm1601E:txtBranchCode=".request('frm1601E:txtBranchCode')."frm1601E:txtBranchCode=</div>	
            <div>frm1601E:txtRDOCode=".request('frm1601E:txtRDOCode')."frm1601E:txtRDOCode=</div>	
            <div>frm1601E:txtLineBus=".$lineOfBusiness."frm1601E:txtLineBus=</div>	
            <div>frm1601E:txtTaxpayerName=".$taxPayerName."frm1601E:txtTaxpayerName=</div>	
            <div>frm1601E:txtTelNum=".request('frm1601E:txtTelNum')."frm1601E:txtTelNum=</div>	
            <div>frm1601E:txtAddress=".$address."frm1601E:txtAddress=</div>	
            <div>frm1601E:txtZipCode=".request('frm1601E:txtZipCode')."frm1601E:txtZipCode=</div>	
            <div>frm1601E:j_id392:_1=".$j_id3921."frm1601E:j_id392:_1=</div>	
            <div>frm1601E:j_id392:_2=".$j_id3922."frm1601E:j_id392:_2=</div>	
            <div>frm1601E:j_id398:_1=".$j_id3981."frm1601E:j_id398:_1=</div>	
            <div>frm1601E:j_id398:_2=".$j_id3982."frm1601E:j_id398:_2=</div>	
            <div>frm1601E:j_id402=".request('frm1601E:j_id402')."frm1601E:j_id402=</div>	
            ".$xml_atc."<div>frm1601E:txtTax14=".request('frm1601E:txtTax14')."frm1601E:txtTax14=</div>	
            <div>frm1601E:txtTax15A=".request('frm1601E:txtTax15A')."frm1601E:txtTax15A=</div>	
            <div>frm1601E:txtTax15B=".request('frm1601E:txtTax15B')."frm1601E:txtTax15B=</div>	
            <div>frm1601E:txtTax15C=".request('frm1601E:txtTax15C')."frm1601E:txtTax15C=</div>	
            <div>frm1601E:txtTax16=".request('frm1601E:txtTax16')."frm1601E:txtTax16=</div>	
            <div>frm1601E:txtTax17A=".request('frm1601E:txtTax17A')."frm1601E:txtTax17A=</div>	
            <div>frm1601E:txtTax17B=".request('frm1601E:txtTax17B')."frm1601E:txtTax17B=</div>	
            <div>frm1601E:txtTax17C=".request('frm1601E:txtTax17C')."frm1601E:txtTax17C=</div>	
            <div>frm1601E:txtTax17D=".request('frm1601E:txtTax17D')."frm1601E:txtTax17D=</div>	
            <div>frm1601E:txtTax18=".request('frm1601E:txtTax18')."frm1601E:txtTax18=</div>	".$selected_atc."
            <div>hPartIITableSize=".request('hPartIITableSize')."hPartIITableSize=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

            $tin = request('frm1601E:txtTIN1').request('frm1601E:txtTIN2').request('frm1601E:txtTIN3').request('frm1601E:txtBranchCode');

            $return_period = request('frm1601E:j_id201')."/".request('frm1601E:txtYear');

            $getReturnPeriod = tbl_1601E::where('company_id',  request('company'))
     						->where('item1A', request('frm1601E:j_id201'))
     						->where('item1B', request('frm1601E:txtYear'))
     						->count();
     		
     		$filename = "";
     		if($getReturnPeriod == "1"){
     			$filename = $tin."-1601E-".request('frm1601E:j_id201').request('frm1601E:txtYear').'.xml';
     		}else{
     			$count = $getReturnPeriod - 1;
     			$filename = $tin."-1601E-".request('frm1601E:j_id201').request('frm1601E:txtYear').'V'.$count.'.xml';
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
	     		'user_id'		=> Auth::user()->id,
	     		'company_id'	=> request('company'),
	     		'form_id'		=> $form->id,
	     		'form'			=> '1601E',
	     		'file_name'		=> $filename,
	     		'return_period'	=> $return_period,
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
     						->where('form', '1601E')
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
                            ->where('form', '1601E')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1601E::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1601E')
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
        $atc = DB::table('1601_e_atcs')->get();

        $data = tbl_1601E::find($form_id);
        $schedules = tbl_1601E_schedule::where('form_id', $form_id)->get();

        return view('forms.BIR-Form 1601E',['atc' => $atc, 'company' => $company, 'data' => $data, 'schedules' => $schedules, 'action' => $action]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1702Q;
use App\tbl_1702Q_schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1702QController extends Controller
{
    public function index($company,$action,$form_id)
    {

    	$company = Companies::find($company);
    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1702_qs')){

            }else{
                Schema::connection('mysql2')->create('tbl_1702_qs', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1');
                    $table->string('item2A');
                    $table->string('item2B');
                    $table->string('item3')->nullable();
                    $table->string('item4');
                    $table->string('item5');
                    $table->string('item13');
                    $table->string('item14A');
                    $table->string('item14B')->nullable();
                    $table->string('item15')->nullable();
                    $table->text('item16A');
                    $table->text('item16B');
                    $table->text('item16C');
                    $table->text('item17A');
                    $table->text('item17B');
                    $table->text('item17C');
                    $table->text('item18A');
                    $table->text('item18B');
                    $table->text('item18C');
                    $table->text('item19A');
                    $table->text('item19B');
                    $table->text('item20A');
                    $table->text('item20B');
                    $table->text('item20C');
                    $table->text('item21A');
                    $table->text('item21B');
                    $table->text('item21C');
                    $table->text('item22A');
                    $table->text('item22B');
                    $table->text('item23A');
                    $table->text('item23B');
                    $table->text('item24A');
                    $table->text('item24B');
                    $table->text('item25A');
                    $table->text('item25B');
                    $table->text('item26A');
                    $table->text('item26B');
                    $table->text('item27');
                    $table->text('item28');
                    $table->text('item29A');
                    $table->text('item29B');
                    $table->text('item29C');
                    $table->text('item29D');
                    $table->text('item30');
                    $table->text('item31A');
                    $table->text('item31B');
                    $table->text('item31C');
                    $table->text('item31D');
                    $table->text('item31E');
                    $table->text('item31F');
                    $table->text('item31G');
                    $table->text('item31G_others')->nullable();
                    $table->text('item31H');
                    $table->text('item32');
                    $table->text('item33A');
                    $table->text('item33B');
                    $table->text('item33C');
                    $table->text('item33D');
                    $table->text('item34');
                    $table->text('item_approved')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_q_schedules', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_id');
                    $table->text('q1')->nullable();
                    $table->text('q2')->nullable();
                    $table->text('q3')->nullable();
                    $table->text('total_gross')->nullable();
                    $table->text('total_income');
                    $table->timestamps();
                });
        	}
    	   return view('forms.BIR-Form 1702Q',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
   	 	}else{
            $data = tbl_1702Q::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1702Q')
                            ->get();
            return view('forms.BIR-Form 1702Q',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
	}
    public function store()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
            'form_no'      =>request('form_no'),
            'company_id'      =>request('company'),
            'item1'      =>request('frm1702q:itemFiscalStartMonth'),
            'item2A'      =>request('frm1702q:itemYearEndMonth'),
            'item2B'      =>request('frm1702q:txtYearEnded'),
            'item3'      =>request('frm1702q:optQtr'),
            'item4'      =>request('frm1702q:optRemenderRtn'),
            'item5'      =>request('frm1702q:txtSheets'),
            'item13'      =>request('1702q:OptMethodDeduct'),
            'item14A'      =>request('frm1702q:optTreaty'),
            'item14B'      =>request('frm1702q:lstTaxTreaty'),
            'item15'      =>request('frm1702q:txtAtc'),
            'item16A'      =>request('frm1702q:txt16A'),
            'item16B'      =>request('frm1702q:txt16B'),
            'item16C'      =>request('frm1702q:txt16C'),
            'item17A'      =>request('frm1702q:txt17A'),
            'item17B'      =>request('frm1702q:txt17B'),
            'item17C'      =>request('frm1702q:txt17C'),
            'item18A'      =>request('frm1702q:txt18A'),
            'item18B'      =>request('frm1702q:txt18B'),
            'item18C'      =>request('frm1702q:txt18C'),
            'item19A'      =>request('frm1702q:txt19A'),
            'item19B'      =>request('frm1702q:txt19B'),
            'item20A'      =>request('frm1702q:txt20A'),
            'item20B'      =>request('frm1702q:txt20B'),
            'item20C'      =>request('frm1702q:txt20C'),
            'item21A'      =>request('frm1702q:txt21A'),
            'item21B'      =>request('frm1702q:txt21B'),
            'item21C'      =>request('frm1702q:txt21C'),
            'item22A'      =>request('frm1702q:txt22A'),
            'item22B'      =>request('frm1702q:txt22B'),
            'item23A'      =>request('frm1702q:txt23A'),
            'item23B'      =>request('frm1702q:txt23B'),
            'item24A'      =>request('frm1702q:txt24A'),
            'item24B'      =>request('frm1702q:txt24B'),
            'item25A'      =>request('frm1702q:txt25A'),
            'item25B'      =>request('frm1702q:txt25B'),
            'item26A'      =>request('frm1702q:txt26A'),
            'item26B'      =>request('frm1702q:txt26B'),
            'item27'      =>request('frm1702q:txt27'),
            'item28'      =>request('frm1702q:txt28'),
            'item29A'      =>request('frm1702q:txt29A'),
            'item29B'      =>request('frm1702q:txt29B'),
            'item29C'      =>request('frm1702q:txt29C'),
            'item29D'      =>request('frm1702q:txt29D'),
            'item30'      =>request('frm1702q:txt30'),
            'item31A'      =>request('frm1702q:txt31A'),
            'item31B'      =>request('frm1702q:txt31B'),
            'item31C'      =>request('frm1702q:txt31C'),
            'item31D'      =>request('frm1702q:txt31D'),
            'item31E'      =>request('frm1702q:txt31E'),
            'item31F'      =>request('frm1702q:txt31F'),
            'item31G'      =>request('frm1702q:txt31G'),
            'item31G_others'      =>request('frm1702q:txt31Gothers'),
            'item31H'      =>request('frm1702q:txt31H'),
            'item32'      =>request('frm1702q:txt32'),
            'item33A'      =>request('frm1702q:txt33A'),
            'item33B'      =>request('frm1702q:txt33B'),
            'item33C'      =>request('frm1702q:txt33C'),
            'item33D'      =>request('frm1702q:txt33D'),
            'item34'      =>request('frm1702q:txt34'),
            ]);

        $getForm = tbl_1702Q::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();
        
        $form = "";
        if(request('form_id') != ""){
            $form = tbl_1702Q::find(request('form_id'));
            $form->update($data);
            tbl_1702Q_schedules::where('form_id', $getForm[0]->id)->delete();
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1702Q::create($data);
            }else{
                $form = tbl_1702Q::find($getForm[0]->id);
                $form->update($data);
                tbl_1702Q_schedules::where('form_id', $getForm[0]->id)->delete();
            }
        }

        if(request('txtTotal') != "0.00"){
            $data1 = ([
                'form_id'       => $form->id,
                'q1'            => request('txt1stQtr'),
                'q2'            => request('txt2ndQtr'),
                'q3'            => request('txt3rdQtr'),
                'total_gross'   => request('txtTotal'),
                'total_income'  => request('txtMinCorpIncomeTax'),
                ]);
            tbl_1702Q_schedules::create($data1);
        }

        $itemFiscalStartMonth1 = "false";
        $itemFiscalStartMonth2 = "false";

        if(request('frm1702q:itemFiscalStartMonth') == 'C'){
            $itemFiscalStartMonth1 = "true";
        }else if(request('frm1702q:itemFiscalStartMonth') == 'F'){
            $itemFiscalStartMonth2 = "true";
        }

        $optQtr1 = "false";
        $optQtr2 = "false";
        $optQtr3 = "false";

        if(request('frm1702q:optQtr') == 1){
            $optQtr1 = "true";
        }else if(request('frm1702q:optQtr') == 2){
            $optQtr2 = "true";
        }else if(request('frm1702q:optQtr') == 3){
            $optQtr3 = "true";
        }

        $optRemenderRtn1 = "false";
        $optRemenderRtn2 = "false";

        if(request('frm1702q:optRemenderRtn') == "Y"){
            $optRemenderRtn1 = "true";
        }else if(request('frm1702q:optRemenderRtn') == "N"){
            $optRemenderRtn2 = "true";
        }

        $OptMethodDeduct1 = "false";
        $OptMethodDeduct2 = "false";

        if(request('1702q:OptMethodDeduct') == "I"){
            $OptMethodDeduct1 = "true";
        }else if(request('1702q:OptMethodDeduct') == "O"){
            $OptMethodDeduct2 = "true";
        }

        $optTreaty1 = "false";
        $optTreaty2 = "false";

        if(request('frm1702q:optTreaty') == "Y"){
            $optTreaty1 = "true";
        }else if(request('frm1702q:optTreaty') == "N"){
            $optTreaty2 = "true";
        }

        $lineOfBusiness =  rawurlencode(request('frm1702q:txtDescription'));

        $taxPayerName =  rawurlencode(request('frm1702q:txtTaxpayerName'));

        $address = rawurlencode(request('frm1702q:txtTaxPayerAdd'));

        $xmlData ="<?xml version='1.0'?>	
            <div>frm1702q:itemFiscalStartMonth:_1=".$itemFiscalStartMonth1."frm1702q:itemFiscalStartMonth:_1=</div>	
            <div>frm1702q:itemFiscalStartMonth:_2=".$itemFiscalStartMonth2."frm1702q:itemFiscalStartMonth:_2=</div>	
            <div>frm1702q:optQtr:_1=".$optQtr1."frm1702q:optQtr:_1=</div>	
            <div>frm1702q:optQtr:_2=".$optQtr2."frm1702q:optQtr:_2=</div>	
            <div>frm1702q:optQtr:_3=".$optQtr3."frm1702q:optQtr:_3=</div>	
            <div>frm1702q:optRemenderRtn_1=".$optRemenderRtn1."frm1702q:optRemenderRtn_1=</div>	
            <div>frm1702q:optRemenderRtn_2=".$optRemenderRtn2."frm1702q:optRemenderRtn_2=</div>	
            <div>frm1702q:txtSheets=".request('frm1702q:txtSheets')."frm1702q:txtSheets=</div>	
            <div>frm1702q:itemYearEndMonth=".request('frm1702q:itemYearEndMonth')."frm1702q:itemYearEndMonth=</div>	
            <div>frm1702q:txtYearEnded=".request('frm1702q:txtYearEnded')."frm1702q:txtYearEnded=</div>	
            <div>frm1702q:txtTin1=".request('frm1702q:txtTin1')."frm1702q:txtTin1=</div>	
            <div>frm1702q:txtTin2=".request('frm1702q:txtTin2')."frm1702q:txtTin2=</div>	
            <div>frm1702q:txtTin3=".request('frm1702q:txtTin3')."frm1702q:txtTin3=</div>	
            <div>frm1702q:txtBranchCode=".request('frm1702q:txtBranchCode')."frm1702q:txtBranchCode=</div>	
            <div>frm1702q:txtRdoCode=".request('frm1702q:txtRdoCode')."frm1702q:txtRdoCode=</div>	
            <div>frm1702q:txtDescription=".$lineOfBusiness."frm1702q:txtDescription=</div>	
            <div>frm1702q:txtTaxpayerName=".$taxPayerName."frm1702q:txtTaxpayerName=</div>	
            <div>frm1702q:txtTelNum=".request('frm1702q:txtTelNum')."frm1702q:txtTelNum=</div>	
            <div>frm1702q:txtTaxPayerAdd=".$address."frm1702q:txtTaxPayerAdd=</div>	
            <div>frm1702q:txtTaxPayerZip=".request('frm1702q:txtTaxPayerZip')."frm1702q:txtTaxPayerZip=</div>	
            <div>1702q:OptMethodDeduct_1=".$OptMethodDeduct1."1702q:OptMethodDeduct_1=</div>	
            <div>1702q:OptMethodDeduct_2=".$OptMethodDeduct2."1702q:OptMethodDeduct_2=</div>	
            <div>frm1702q:optTreaty:_1=".$optTreaty1."frm1702q:optTreaty:_1=</div>	
            <div>frm1702q:optTreaty:_2=".$optTreaty2."frm1702q:optTreaty:_2=</div>	
            <div>frm1702q:lstTaxTreaty=".request('frm1702q:lstTaxTreaty')."frm1702q:lstTaxTreaty=</div>	
            <div>frm1702q:txtAtc=".request('frm1702q:txtAtc')." frm1702q:txtAtc=</div>	
            <div>frm1702q:txt16A=".request('frm1702q:txt16A')."frm1702q:txt16A=</div>	
            <div>frm1702q:txt16B=".request('frm1702q:txt16B')."frm1702q:txt16B=</div>	
            <div>frm1702q:txt16C=".request('frm1702q:txt16C')."frm1702q:txt16C=</div>	
            <div>frm1702q:txt17A=".request('frm1702q:txt17A')."frm1702q:txt17A=</div>	
            <div>frm1702q:txt17B=".request('frm1702q:txt17B')."frm1702q:txt17B=</div>	
            <div>frm1702q:txt17C=".request('frm1702q:txt17C')."frm1702q:txt17C=</div>	
            <div>frm1702q:txt18A=".request('frm1702q:txt18A')."frm1702q:txt18A=</div>	
            <div>frm1702q:txt18B=".request('frm1702q:txt18B')."frm1702q:txt18B=</div>	
            <div>frm1702q:txt18C=".request('frm1702q:txt18C')."frm1702q:txt18C=</div>	
            <div>frm1702q:txt19A=".request('frm1702q:txt19A')."frm1702q:txt19A=</div>	
            <div>frm1702q:txt19B=".request('frm1702q:txt19B')."frm1702q:txt19B=</div>	
            <div>frm1702q:txt20A=".request('frm1702q:txt20A')."frm1702q:txt20A=</div>	
            <div>frm1702q:txt20B=".request('frm1702q:txt20B')."frm1702q:txt20B=</div>	
            <div>frm1702q:txt20C=".request('frm1702q:txt20C')."frm1702q:txt20C=</div>	
            <div>frm1702q:txt21A=".request('frm1702q:txt21A')."frm1702q:txt21A=</div>	
            <div>frm1702q:txt21B=".request('frm1702q:txt21B')."frm1702q:txt21B=</div>	
            <div>frm1702q:txt21C=".request('frm1702q:txt21C')."frm1702q:txt21C=</div>	
            <div>frm1702q:txt22A=".request('frm1702q:txt22A')."frm1702q:txt22A=</div>	
            <div>frm1702q:txt22B=".request('frm1702q:txt22B')."frm1702q:txt22B=</div>	
            <div>frm1702q:txt23A=".request('frm1702q:txt23A')."frm1702q:txt23A=</div>	
            <div>frm1702q:txt23B=".request('frm1702q:txt23B')."frm1702q:txt23B=</div>	
            <div>frm1702q:txt24A=".request('frm1702q:txt24A')."frm1702q:txt24A=</div>	
            <div>frm1702q:txt24B=".request('frm1702q:txt24B')."frm1702q:txt24B=</div>	
            <div>frm1702q:txt25A=".request('frm1702q:txt25A')."frm1702q:txt25A=</div>	
            <div>frm1702q:txt25B=".request('frm1702q:txt25B')."frm1702q:txt25B=</div>	
            <div>frm1702q:txt26A=".request('frm1702q:txt26A')."frm1702q:txt26A=</div>	
            <div>frm1702q:txt26B=".request('frm1702q:txt26B')."frm1702q:txt26B=</div>	
            <div>frm1702q:txt27=".request('frm1702q:txt27')."frm1702q:txt27=</div>	
            <div>frm1702q:txt28=".request('frm1702q:txt28')."frm1702q:txt28=</div>	
            <div>frm1702q:txt29A=".request('frm1702q:txt29A')."frm1702q:txt29A=</div>	
            <div>frm1702q:txt29B=".request('frm1702q:txt29B')."frm1702q:txt29B=</div>	
            <div>frm1702q:txt29C=".request('frm1702q:txt29C')."frm1702q:txt29C=</div>	
            <div>frm1702q:txt29D=".request('frm1702q:txt29D')."frm1702q:txt29D=</div>	
            <div>frm1702q:txt30=".request('frm1702q:txt30')."frm1702q:txt30=</div>	
            <div>frm1702q:txt31A=".request('frm1702q:txt31A')."frm1702q:txt31A=</div>	
            <div>frm1702q:txt31B=".request('frm1702q:txt31B')."frm1702q:txt31B=</div>	
            <div>frm1702q:txt31C=".request('frm1702q:txt31C')."frm1702q:txt31C=</div>	
            <div>frm1702q:txt31D=".request('frm1702q:txt31D')."frm1702q:txt31D=</div>	
            <div>frm1702q:txt31E=".request('frm1702q:txt31E')."frm1702q:txt31E=</div>	
            <div>frm1702q:txt31F=".request('frm1702q:txt31F')."frm1702q:txt31F=</div>	
            <div>frm1702q:txt31Gothers=".request('frm1702q:txt31Gothers')."frm1702q:txt31Gothers=</div>	
            <div>frm1702q:txt31G=".request('frm1702q:txt31G')."frm1702q:txt31G=</div>	
            <div>frm1702q:txt31H=".request('frm1702q:txt31H')."frm1702q:txt31H=</div>	
            <div>frm1702q:txt32=".request('frm1702q:txt32')."frm1702q:txt32=</div>	
            <div>frm1702q:txt33A=".request('frm1702q:txt33A')."frm1702q:txt33A=</div>	
            <div>frm1702q:txt33B=".request('frm1702q:txt33B')."frm1702q:txt33B=</div>	
            <div>frm1702q:txt33C=".request('frm1702q:txt33C')."frm1702q:txt33C=</div>	
            <div>frm1702q:txt33D=".request('frm1702q:txt33D')."frm1702q:txt33D=</div>	
            <div>frm1702q:txt34=".request('frm1702q:txt34')."frm1702q:txt34=</div>	
            <div>Codename1=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC010') ? 'true' : 'false')."Codename1=</div>	
            <div>Codename2=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC020') ? 'true' : 'false')."Codename2=</div>	
            <div>Codename3=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC030') ? 'true' : 'false')."Codename3=</div>	
            <div>Codename4=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC031') ? 'true' : 'false')."Codename4=</div>	
            <div>Codename5=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC040') ? 'true' : 'false')."Codename5=</div>	
            <div>Codename6=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC041') ? 'true' : 'false')."Codename6=</div>	
            <div>Codename7=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC070') ? 'true' : 'false')."Codename7=</div>	
            <div>Codename8=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC190') ? 'true' : 'false')."Codename8=</div>	
            <div>Codename9=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC191') ? 'true' : 'false')."Codename9=</div>	
            <div>Codename10=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC011') ? 'true' : 'false')."Codename10=</div>	
            <div>Codename11=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC055') ? 'true' : 'false')."Codename11=</div>	
            <div>Codename12=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC080') ? 'true' : 'false')."Codename12=</div>	
            <div>Codename13=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC101') ? 'true' : 'false')."Codename13=</div>	
            <div>Codename14=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC021') ? 'true' : 'false')."Codename14=</div>	
            <div>Codename15=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC030') ? 'true' : 'false')."Codename15=</div>	
            <div>Codename16=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC031') ? 'true' : 'false')."Codename16=</div>	
            <div>Codename17=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC190') ? 'true' : 'false')."Codename17=</div>	
            <div>Codename18=".((null !== request('AtcCodename') && request('AtcCodename')[0] == 'IC191') ? 'true' : 'false')."Codename18=</div>	
            <div>txt1stQtr=".request('txt1stQtr')."txt1stQtr=</div>	
            <div>txt2ndQtr=".request('txt2ndQtr')."txt2ndQtr=</div>	
            <div>txt3rdQtr=".request('txt3rdQtr')."txt3rdQtr=</div>	
            <div>txtTotal=".request('txtTotal')."txtTotal=</div>	
            <div>txtTaxRate=2%txtTaxRate=</div>	
            <div>txtMinCorpIncomeTax=".request('txtMinCorpIncomeTax')."txtMinCorpIncomeTax=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";


        $tin = request('frm1702q:txtTin1').request('frm1702q:txtTin2').request('frm1702q:txtTin3').request('frm1702q:txtBranchCode');

        $getReturnPeriod = tbl_1702Q::where('company_id',  request('company'))
                            ->where('item2B', request('frm1702q:txtYearEnded'))
                            ->where('item3', request('frm1702q:optQtr'))
                            ->count();
        
        $returnPeriod = request('frm1702q:txtYearEnded')."-Q".request('frm1702q:optQtr');

        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm1702q:txtYearEnded')."Q".request('frm1702q:optQtr');
        }else{
                if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1702Q')
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

            $xmlReturnPeriod = request('frm1702q:txtYearEnded')."Q".request('frm1702q:optQtr').$ext;
        }

        $filename = $tin."-1702Q-".$xmlReturnPeriod.'.xml';

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
                'form'          => '1702Q',
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
                            ->where('form', '1702Q')
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
                            ->where('form', '1702Q')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1702Q::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1702Q')
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
        $data = tbl_1702Q::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1702Q')
                            ->get();
        
        return view('forms.BIR-Form 1702Q',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

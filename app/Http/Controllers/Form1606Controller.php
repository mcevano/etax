<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1606;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1606Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1606s')){

            }else{
                Schema::connection('mysql2')->create('tbl_1606s', function (Blueprint $table) {
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
                    $table->string('item8')->nullable();
                    $table->string('item10')->nullable();
                    $table->string('item12')->nullable();
                    $table->string('item13')->nullable();
                    $table->string('item14')->nullable();
                    $table->string('item15')->nullable();
                    $table->string('item15_others')->nullable();
                    $table->string('item16')->nullable();
                    $table->string('item16A')->nullable();
                    $table->string('item17A')->nullable();
                    $table->string('item17B')->nullable();
                    $table->string('item17C')->nullable();
                    $table->string('item17D')->nullable();
                    $table->string('item18')->nullable();
                    $table->text('item19')->nullable();
                    $table->text('item19_others')->nullable();
                    $table->text('item20')->nullable();
                    $table->text('item20_others')->nullable();
                    $table->text('item21')->nullable();
                    $table->text('item22')->nullable();
                    $table->text('item23')->nullable();
                    $table->text('item24')->nullable();
                    $table->text('item25')->nullable();
                    $table->text('item26')->nullable();
                    $table->text('item27A_1')->nullable();
                    $table->text('item27A_2')->nullable();
                    $table->text('item27B_1')->nullable();
                    $table->text('item27B_2')->nullable();
                    $table->text('item27C_1')->nullable();
                    $table->text('item27C_2')->nullable();
                    $table->text('item27D_1')->nullable();
                    $table->text('item27D_2')->nullable();
                    $table->text('item28')->nullable();
                    $table->text('item28A_1')->nullable();
                    $table->text('item28B_1')->nullable();
                    $table->text('item28C_1')->nullable();
                    $table->text('item28D_1')->nullable();
                    $table->text('item28E_1')->nullable();
                    $table->text('item28E_2')->nullable();
                    $table->text('item29')->nullable();
                    $table->text('item30');
                    $table->text('item31')->nullable();
                    $table->text('item32');
                    $table->text('item33');
                    $table->text('item34');
                    $table->text('item35A');
                    $table->text('item35B');
                    $table->text('item35C');
                    $table->text('item35D');
                    $table->text('item36');
                    $table->text('item_approved')->nullable();
                    $table->timestamps();
                });
            }
	        return view('forms.BIR-Form 1606',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
	        $data = tbl_1606::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1606')
                            ->get();
        
        	return view('forms.BIR-Form 1606',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	$data = ([
    			'form_no'   => request('form_no'),
				'company_id'   => request('company'),
				'item1A'   => request('frm1606:txtDateMonth'),
				'item1B'   => request('frm1606:txtDateDay'),
				'item1C'   => request('frm1606:txtDateYear'),
				'item2'   => request('frm1606:j_id217'),
				'item3'   => request('frm1606:txtSheets'),
				'item4'   => null !== request('frm1606:j_id252') ? request('frm1606:j_id252') : '',
				'item7A'   => request('frm1606:txtTINS1'),
				'item7B'   => request('frm1606:txtTINS2'),
				'item7C'   => request('frm1606:txtTINS3'),
				'item7D'   => request('frm1606:txtBranchCodeS'),
				'item8'   => request('frm1606:txtRDOCodeS'),
				'item10'   => request('frm1606:txtSellerName'),
				'item12'   => request('frm1606:txtSellerAddress'),
				'item13'   => null !== request('frm1606:optATC13') ? request('frm1606:optATC13') : '',
				'item14'   => null !== request('frm1606:j_id392') ? request('frm1606:j_id392') : '',
				'item15'   => null !== request('frm1606:j_id393') ? request('frm1606:j_id393') : '',
				'item15_others'   => request('frm1606:j_id393_other'),
				'item16'   => request('frm1606:txtLocation'),
				'item16A'   => request('frm1606:txtRDOCode16A'),
				'item17A'   => request('frm1606:txtTCT'),
				'item17B'   => request('frm1606:txtArea'),
				'item17C'   => request('frm1606:txtTaxDC'),
				'item17D'   => request('frm1606:txtOthers'),
				'item18'   => null !== request('frm1606:j_id394') ? request('frm1606:j_id394') : '',
				'item19'   => request('frm1606:rdTreaty'),
				'item19_others'   => request('frm1606:selTreaty'),
				'item20'   => null !== request('frm1606:j_id395') ? request('frm1606:j_id395') : '',
				'item20_others'   => request('frm1606:txtOthers20'),
				'item21'   => request('frm1606:txtSelling'),
				'item22'   => request('frm1606:txtCost'),
				'item23'   => request('frm1606:txtMortgage'),
				'item24'   => request('frm1606:txtTotalP'),
				'item25'   => request('frm1606:txtAmount'),
				'item26'   => request('frm1606:txtTotalN'),
				'item27A_1'   => null !== request('frm1606:opt27A') ? 'true' : 'false',
				'item27A_2'   => request('frm1606:txtFMVLand'),
				'item27B_1'   => null !== request('frm1606:opt27B') ? 'true' : 'false',
				'item27B_2'   => request('frm1606:txtFMVImprovements'),
				'item27C_1'   => null !== request('frm1606:opt27C') ? 'true' : 'false',
				'item27C_2'   => request('frm1606:txtFMVZonal'),
				'item27D_1'   => null !== request('frm1606:opt27D') ? 'true' : 'false',
				'item27D_1'   => request('frm1606:txtFMVBIR'),
                'item28'      => null !== request('frm1606:opt28') ? request('frm1606:opt28') : '',
				'item28A_1'   => request('frm1606:txtGross'),
				'item28B_1'   => request('frm61606:txtFMVLI'),
				'item28C_1'   => request('frm1606:txtBid'),
				'item28D_1'   => request('frm1606:txtInstallment'),
				'item28E_1'   => request('frm1606:txtOtherss28E'),
				'item28E_2'   => request('frm1606:txtOthers28E'),
				'item29'   => null !== request('frm1606:SpecialLaw') ? request('frm1606:SpecialLaw') : '',
				'item30'   => request('frm1606:txtTax'),
				'item31'   => request('frm1606:txtTaxRate'),
				'item32'   => request('frm1606:txtTaxR'),
				'item33'   => request('frm1606:txtLess'),
				'item34'   => request('frm1606:txtTaxDue'),
				'item35A'   => request('frm1606:txtSurcharge'),
				'item35B'   => request('frm1606:txtInterest'),
				'item35C'   => request('frm1606:txtCompromise'),
				'item35D'   => request('frm1606:txtTotalPenalties'),
				'item36'   => request('frm1606:txtTotal'),
				'item_approved'   =>null !== request('frm1606:opt37') ? request('frm1606:opt37') : '',
    		]);
		
		$getForm = tbl_1606::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
        if(request('form_id') != ""){
            $form = tbl_1606::find(request('form_id'));
            $form->update($data);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1606::create($data);
            }else{
                $form = tbl_1606::find($getForm[0]->id);
                $form->update($data);
            }
        }

        $j_id217_1 = "false";
        $j_id217_2 = "false";

        if(request('frm1606:j_id217') == 'Y'){
        	$j_id217_1 = "true";
        }else if(request('frm1606:j_id217') == 'N'){
        	$j_id217_2 = "true";
        }

        $j_id252_1 = "false";
        $j_id252_2 = "false";

        if(null !== request('frm1606:j_id252')){
            if(request('frm1606:j_id252') == "Y"){
                $j_id252_1 = "true";
            }else if(request('frm1606:j_id252') == "N"){
                $j_id252_2 = "true";
            }
        }

        $taxPayerName =  rawurlencode(request('frm1606:txtBuyerName'));

        $address = rawurlencode(request('frm1606:txtBuyerAddress'));
 
        $taxPayerName1 =  rawurlencode(request('frm1606:txtSellerName'));

        $address1 = rawurlencode(request('frm1606:txtSellerAddress'));

        $optATC13_2 = "false";
        $optATC13_3 = "false";

        if(null !== request('frm1606:optATC13')){
        	if(request('frm1606:optATC13') == 'WI155'){
        		$optATC13_2 = "true";
        	}else if(request('frm1606:optATC13') == 'WC155'){
        		$optATC13_3 = "true";
        	}
        }

       	$j_id392_1 = "false";
       	$j_id392_2 = "false";

       	if(null !== request('frm1606:j_id392')){
        	if(request('frm1606:j_id392') == 'P'){
        		$j_id392_1 = "true";
        	}else if(request('frm1606:j_id392') == 'G'){
        		$j_id392_2 = "true";
        	}
        }

       	$j_id393_1 = "false";
       	$j_id393_3 = "false";
       	$j_id393_5 = "false";
       	$j_id393_8 = "false";
       	$j_id393_2 = "false";
       	$j_id393_4 = "false";
       	$j_id393_6 = "false";

       	if(null !== request('frm1606:j_id393')){
        	if(request('frm1606:j_id393') == 'R'){
        		$j_id393_1 = "true";
        	}else if(request('frm1606:j_id393') == 'C'){
        		$j_id393_3 = "true";
        	}else if(request('frm1606:j_id393') == 'CR'){
        		$j_id393_5 = "true";
        	}else if(request('frm1606:j_id393') == 'O'){
        		$j_id393_8 = "true";
        	}else if(request('frm1606:j_id393') == 'A'){
        		$j_id393_2 = "true";
        	}else if(request('frm1606:j_id393') == 'I'){
        		$j_id393_4 = "true";
        	}else if(request('frm1606:j_id393') == 'CC'){
        		$j_id393_6 = "true";
        	}
        }

        $j_id394_1 = "false";
        $j_id394_2 = "false";

        if(null !== request('frm1606:j_id394')){
        	if(request('frm1606:j_id394') == 'Y'){
        		$j_id394_1 = "true";
        	}else if(request('frm1606:j_id394') == 'N'){
        		$j_id394_2 = "true";
        	}
        }

        $rdTreaty_1 = "false";
        $rdTreaty_2 = "false";
        if(null !== request('frm1606:rdTreaty')){
        	if(request('frm1606:rdTreaty') == 'Y'){
        		$rdTreaty_1 = "true";
        	}else if(request('frm1606:rdTreaty') == 'N'){
        		$rdTreaty_2 = "true";
        	}
        }

        $j_id395_1 = "false";
        $j_id395_4 = "false";
        $j_id395_2 = "false";
        $j_id395_5 = "false";
        $j_id395_3 = "false";

        if(null !== request('frm1606:j_id395')){
        	if(request('frm1606:j_id395') == 'CS'){
        		$j_id395_1 = "true";
        	}else if(request('frm1606:j_id395') == 'FS'){
        		$j_id395_4 = "true";
        	}else if(request('frm1606:j_id395') == 'E'){
        		$j_id395_2 = "true";
        	}else if(request('frm1606:j_id395') == 'O'){
        		$j_id395_5 = "true";
        	}else if(request('frm1606:j_id395') == 'IS'){
        		$j_id395_3 = "true";
        	}
        }

        $Habitual_1 = "false";
        $Habitual_2 = "false";
        if(null !== request('frm1606:SpecialLaw')){
        	if(request('frm1606:SpecialLaw') == 'Y'){
        		$Habitual_1 = "true";
        	}else if(request('frm1606:SpecialLaw') == 'N'){
        		$Habitual_2 = "true";
        	}
        }

        $opt37_1 = "false";
        $opt37_2 = "false";

        if(null !== request('frm1606:opt37')){
        	if(request('frm1606:opt37') == 'R'){
        		$opt37_1 = "true";
        	}else if(request('frm1606:opt37') == 'I'){
        		$opt37_2 = "true";
        	}
        }

        $opt28A = "false";
        $opt28B = "false";
        $opt28C = "false";
        $opt28D = "false";
        $opt28E = "false";
        if(null !== request('frm1606:opt28')){
            if(request('frm1606:opt28') == 'Gross'){
                $opt28A = "true";
            }else if(request('frm1606:opt28') == 'Fair'){
                $opt28B = "true";
            }else if(request('frm1606:opt28') == 'Bid'){
                $opt28C = "true";
            }else if(request('frm1606:opt28') == 'Installment'){
                $opt28D = "true";
            }else if(request('frm1606:opt28') == 'Others'){
                $opt28E = "true";
            }
        }


        $xmlData = "<?xml version='1.0'?>	
            <div>frm1606:txtDateMonth=".request('frm1606:txtDateMonth')."frm1606:txtDateMonth=</div>	
            <div>frm1606:txtDateDay=".request('frm1606:txtDateDay')."frm1606:txtDateDay=</div>	
            <div>frm1606:txtDateYear=".request('frm1606:txtDateYear')."frm1606:txtDateYear=</div>	
            <div>frm1606:j_id217:_1=".$j_id217_1."frm1606:j_id217:_1=</div>	
            <div>frm1606:j_id217:_2=".$j_id217_2."frm1606:j_id217:_2=</div>	
            <div>frm1606:txtSheets=".request('frm1606:txtSheets')."frm1606:txtSheets=</div>	
            <div>frm1606:j_id252:_1=".$j_id252_1."frm1606:j_id252:_1=</div>	
            <div>frm1606:j_id252:_2=".$j_id252_2."frm1606:j_id252:_2=</div>	
            <div>frm1606:txtTIN1=".request('frm1606:txtTIN1')."frm1606:txtTIN1=</div>	
            <div>frm1606:txtTIN2=".request('frm1606:txtTIN2')."frm1606:txtTIN2=</div>	
            <div>frm1606:txtTIN3=".request('frm1606:txtTIN3')."frm1606:txtTIN3=</div>	
            <div>frm1606:txtBranchCode=".request('frm1606:txtBranchCode')."frm1606:txtBranchCode=</div>	
            <div>frm1606:txtRDOCode=".request('frm1606:txtRDOCode')."frm1606:txtRDOCode=</div>	
            <div>frm1606:txtTINS1=".request('frm1606:txtTINS1')."frm1606:txtTINS1=</div>	
            <div>frm1606:txtTINS2=".request('frm1606:txtTINS2')."frm1606:txtTINS2=</div>	
            <div>frm1606:txtTINS3=".request('frm1606:txtTINS3')."frm1606:txtTINS3=</div>	
            <div>frm1606:txtBranchCodeS=".request('frm1606:txtBranchCodeS')."frm1606:txtBranchCodeS=</div>	
            <div>frm1606:txtRDOCodeS=".request('frm1606:txtRDOCodeS')."frm1606:txtRDOCodeS=</div>	
            <div>frm1606:txtBuyerName=".$taxPayerName."frm1606:txtBuyerName=</div>	
            <div>frm1606:txtSellerName=".$taxPayerName1."frm1606:txtSellerName=</div>	
            <div>frm1606:txtBuyerAddress=".$address."frm1606:txtBuyerAddress=</div>	
            <div>frm1606:txtSellerAddress=".$address1."frm1606:txtSellerAddress=</div>	
            <div>frm1606:txt13=WI155frm1606:txt13=</div>	
            <div>frm1606:optATC13_2=".$optATC13_2."frm1606:optATC13_2=</div>	
            <div>frm1606:txt13C=WC155frm1606:txt13C=</div>	
            <div>frm1606:optATC13_3=".$optATC13_3."frm1606:optATC13_3=</div>	
            <div>frm1606:j_id392:_1=".$j_id392_1."frm1606:j_id392:_1=</div>	
            <div>frm1606:j_id392:_2=".$j_id392_2."frm1606:j_id392:_2=</div>	
            <div>frm1606:j_id393:_1=".$j_id393_1."frm1606:j_id393:_1=</div>	
            <div>frm1606:j_id393:_3=".$j_id393_3."frm1606:j_id393:_3=</div>	
            <div>frm1606:j_id393:_5=".$j_id393_5."frm1606:j_id393:_5=</div>	
            <div>frm1606:j_id393_8=".$j_id393_8."frm1606:j_id393_8=</div>	
            <div>frm1606:j_id393_7=".request('frm1606:j_id393_other')."frm1606:j_id393_7=</div>	
            <div>frm1606:j_id393:_2=".$j_id393_2."frm1606:j_id393:_2=</div>	
            <div>frm1606:j_id393:_4=".$j_id393_4."frm1606:j_id393:_4=</div>	
            <div>frm1606:j_id393:_6=".$j_id393_6."frm1606:j_id393:_6=</div>	
            <div>frm1606:txtLocation=".request('frm1606:txtLocation')."frm1606:txtLocation=</div>	
            <div>frm1606:txtRDOCode16A=".request('frm1606:txtRDOCode16A')."frm1606:txtRDOCode16A=</div>	
            <div>frm1606:txtTCT=".request('frm1606:txtTCT')."frm1606:txtTCT=</div>	
            <div>frm1606:txtArea=".request('frm1606:txtArea')."frm1606:txtArea=</div>	
            <div>frm1606:txtTaxDC=".request('frm1606:txtTaxDC')."frm1606:txtTaxDC=</div>	
            <div>frm1606:txtOthers=".request('frm1606:txtOthers')."frm1606:txtOthers=</div>	
            <div>frm1606:j_id394:_1=".$j_id394_1."frm1606:j_id394:_1=</div>	
            <div>frm1606:j_id394:_2=".$j_id394_2."frm1606:j_id394:_2=</div>	
            <div>frm1606:rdTreaty:_1=".$rdTreaty_1."frm1606:rdTreaty:_1=</div>	
            <div>frm1606:rdTreaty:_2=".$rdTreaty_2."frm1606:rdTreaty:_2=</div>	
            <div>frm1606:selTreaty=".request('frm1606:selTreaty')."frm1606:selTreaty=</div>	
            <div>frm1606:j_id395:_1=".$j_id395_1."frm1606:j_id395:_1=</div>	
            <div>frm1606:j_id395:_4=".$j_id395_4."frm1606:j_id395:_4=</div>	
            <div>frm1606:j_id395:_2=".$j_id395_2."frm1606:j_id395:_2=</div>	
            <div>frm1606:j_id395:_5=".$j_id395_5."frm1606:j_id395:_5=</div>	
            <div>frm1606:j_id395:_3=".$j_id395_3."frm1606:j_id395:_3=</div>	
            <div>frm1606:txtOthers20=".request('frm1606:txtOthers20')."frm1606:txtOthers20=</div>	
            <div>frm1606:txtSelling=".request('frm1606:txtSelling')."frm1606:txtSelling=</div>	
            <div>frm1606:txtCost=".request('frm1606:txtCost')."frm1606:txtCost=</div>	
            <div>frm1606:txtMortgage=".request('frm1606:txtMortgage')."frm1606:txtMortgage=</div>	
            <div>frm1606:txtTotalP=".request('frm1606:txtTotalP')."frm1606:txtTotalP=</div>	
            <div>frm1606:txtAmount=".request('frm1606:txtAmount')."frm1606:txtAmount=</div>	
            <div>frm1606:txtTotalN=".request('frm1606:txtTotalN')."frm1606:txtTotalN=</div>	
            <div>frm1606:opt27A=".(null !== request('frm1606:opt27A') ? 'true' : 'false')."frm1606:opt27A=</div>	
            <div>frm1606:txtFMVLand=".request('frm1606:txtFMVLand')."frm1606:txtFMVLand=</div>	
            <div>frm1606:opt27C=".(null !== request('frm1606:opt27C') ? 'true' : 'false')."frm1606:opt27C=</div>	
            <div>frm1606:txtFMVZonal=".request('frm1606:txtFMVZonal')."frm1606:txtFMVZonal=</div>	
            <div>frm1606:opt27B=".(null !== request('frm1606:opt27B') ? 'true' : 'false')."frm1606:opt27B=</div>	
            <div>frm1606:txtFMVImprovements=".request('frm1606:txtFMVImprovements')."frm1606:txtFMVImprovements=</div>	
            <div>frm1606:opt27D=".(null !== request('frm1606:opt27D') ? 'true' : 'false')."frm1606:opt27D=</div>	
            <div>frm1606:txtFMVBIR=".request('frm1606:txtFMVBIR')."frm1606:txtFMVBIR=</div>	
            <div>frm1606:opt28A=".$opt28A."frm1606:opt28A=</div>	
            <div>frm1606:txtGross=".request('frm1606:txtGross')."frm1606:txtGross=</div>	
            <div>frm1606:opt28D=".$opt28D."frm1606:opt28D=</div>	
            <div>frm1606:txtInstallment=".request('frm1606:txtInstallment')."frm1606:txtInstallment=</div>	
            <div>frm1606:opt28B=".$opt28B."frm1606:opt28B=</div>	
            <div>frm1606:txtFMVLI=".request('frm61606:txtFMVLI')."frm1606:txtFMVLI=</div>	
            <div>frm1606:opt28E=".$opt28E."frm1606:opt28E=</div>	
            <div>frm1606:txtOtherss28E=".request('frm1606:txtOtherss28E')."frm1606:txtOtherss28E=</div>	
            <div>frm1606:txtOthers28E=".request('frm1606:txtOthers28E')."frm1606:txtOthers28E=</div>	
            <div>frm1606:opt28C=".$opt28C."frm1606:opt28C=</div>	
            <div>frm1606:txtBid=".request('frm1606:txtBid')."frm1606:txtBid=</div>	
            <div>frm1606:Habitual_1=".$Habitual_1."frm1606:Habitual_1=</div>	
            <div>frm1606:Habitual_2=".$Habitual_2."frm1606:Habitual_2=</div>	
            <div>frm1606:txtTax=".request('frm1606:txtTax')."frm1606:txtTax=</div>	
            <div>frm1606:txtTaxRate=".request('frm1606:txtTaxRate')."frm1606:txtTaxRate=</div>	
            <div>frm1606:txtTaxR=".request('frm1606:txtTaxR')."frm1606:txtTaxR=</div>	
            <div>frm1606:txtLess=".request('frm1606:txtLess')."frm1606:txtLess=</div>	
            <div>frm1606:txtTaxDue=".request('frm1606:txtTaxDue')."frm1606:txtTaxDue=</div>	
            <div>frm1606:txtSurcharge=".request('frm1606:txtSurcharge')."frm1606:txtSurcharge=</div>	
            <div>frm1606:txtInterest=".request('frm1606:txtInterest')."frm1606:txtInterest=</div>	
            <div>frm1606:txtCompromise=".request('frm1606:txtCompromise')."frm1606:txtCompromise=</div>	
            <div>frm1606:txtTotalPenalties=".request('frm1606:txtTotalPenalties')."frm1606:txtTotalPenalties=</div>	
            <div>frm1606:txtTotal=".request('frm1606:txtTotal')."frm1606:txtTotal=</div>	
            <div>frm1606:opt37:_1=".$opt37_1."frm1606:opt37:_1=</div>	
            <div>frm1606:opt37:_2=".$opt37_2."frm1606:opt37:_2=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

        $tin = request('frm1606:txtTIN1').request('frm1606:txtTIN2').request('frm1606:txtTIN3').request('frm1606:txtBranchCode');
    		
    	$returnPeriod = request('frm1606:txtDateMonth')."/".request('frm1606:txtDateDay')."/".request('frm1606:txtDateYear');

    	$getReturnPeriod = tbl_1606::where('company_id',  request('company'))
                            ->where('item1A', request('frm1606:txtDateMonth'))
                            ->where('item1B', request('frm1606:txtDateDay'))
                            ->where('item1C', request('frm1606:txtDateYear'))
                            ->where('item17A', request('frm1606:txtTCT'))
                            ->count();
                            
        if($getReturnPeriod == "1"){
            $xmlReturnPeriod = request('frm1606:txtDateMonth').request('frm1606:txtDateDay').request('frm1606:txtDateYear')."_".request('frm1606:txtTCT');
        }else{
            if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1606')
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

            $xmlReturnPeriod = request('frm1606:txtDateMonth').request('frm1606:txtDateDay').request('frm1606:txtDateYear')."_".request('frm1606:txtTCT').$ext;
        }

    	$filename = $tin."-1606-".$xmlReturnPeriod.'.xml';

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
	     		'form'			=> '1606',
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
     						->where('form', '1606')
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
                            ->where('form', '1606')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1606::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1606')
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
        $data = tbl_1606::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1606')
                            ->get();
        
        return view('forms.BIR-Form 1606',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1706;
use App\tbl_1706_schedule1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1706Controller extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1706s')){

            }else{
            	Schema::connection('mysql2')->create('tbl_1706s', function (Blueprint $table) {
					$table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item1C')->nullable();
                    $table->string('item2')->nullable();
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
                    $table->string('item14A')->nullable();
                    $table->string('item15')->nullable();
                    $table->string('item15_other')->nullable();
                    $table->string('item16A')->nullable();
                    $table->string('item16B')->nullable();
                    $table->string('item16C')->nullable();
                    $table->string('item16D')->nullable();
                    $table->string('item17')->nullable();
                    $table->string('item18')->nullable();
                    $table->string('item19')->nullable();
                    $table->string('item20')->nullable();
                    $table->string('item20_other')->nullable();
                    $table->string('item21')->nullable();
                    $table->string('item21_other')->nullable();
                    $table->string('item22')->nullable();
                    $table->string('item23')->nullable();
                    $table->string('item24')->nullable();
                    $table->string('item25')->nullable();
                    $table->string('item26')->nullable();
                    $table->string('item27')->nullable();
                    $table->string('item28A')->nullable();
                    $table->string('item28B')->nullable();
                    $table->string('item28C')->nullable();
                    $table->string('item29A_1')->nullable();
                    $table->string('item29A_2')->nullable();
                    $table->string('item29B_1')->nullable();
                    $table->string('item29B_2')->nullable();
                    $table->string('item29C_1')->nullable();
                    $table->string('item29C_2')->nullable();
                    $table->string('item29D_1')->nullable();
                    $table->string('item29D_2')->nullable();
                    $table->string('item30')->nullable();
                    $table->string('item30A')->nullable();
                    $table->string('item30B')->nullable();
                    $table->string('item30C')->nullable();
                    $table->string('item30D')->nullable();
                    $table->string('item30E')->nullable();
                    $table->string('item30F')->nullable();
                    $table->string('item30F_others')->nullable();
                	$table->text('item31');
					$table->text('item32');
					$table->text('item33');
					$table->text('item34');
					$table->text('item35A');
					$table->text('item35B');
					$table->text('item35C');
					$table->text('item35D');
					$table->text('item36');
					$table->text('overpayment')->nullable();
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1706_schedule1s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item');
                     $table->timestamps();
                });
            }
            return view('forms.BIR-Form 1706',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
        	$data = tbl_1706::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1706')
                            ->get();
        
        	return view('forms.BIR-Form 1706',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);

    	$data = ([
    		'form_no'   => request('form_no'),
			'company_id'   => request('company'),
			'item1A'   => request('frm1706:txtDateMonth'),
			'item1B'   => request('frm1706:txtDateDay'),
			'item1C'   => request('frm1706:txtDateYear'),
			'item2'   => request('frm1706:j_id217'),
			'item3'   => request('frm1706:txtSheets'),
			'item4'   => null !== request('frm1706:opt4') ? request('frm1706:opt4') : '',
			'item7A'   => request('frm1706:txtTINB1'),
			'item7B'   => request('frm1706:txtTINB2'),
			'item7C'   => request('frm1706:txtTINB3'),
			'item7D'   => request('frm1706:txtBranchCodeB'),
			'item8'   => request('frm1706:txtRDOCodeB'),
			'item10'   => request('frm1706:txtBuyerName'),
			'item12'   => request('frm1706:txtBuyerAddress'),
			'item13'   => request('frm1706:txtSellerRAddress'),
			'item14'   => request('frm1706:txtLocation'),
			'item14A'   => request('frm1706:txtRDOCode14A'),
			'item15'   => null !== request('frm1706:j_id391') ? request('frm1706:j_id391') : '',
			'item15_other'   => request('frm1706:j_id391:_7'),
			'item16A'   => request('frm1706:txtTCT'),
			'item16B'   => request('frm1706:txtArea'),
			'item16C'   => request('frm1706:txtTaxDC'),
			'item16D'   => request('frm1706:txtOthers'),
			'item17'   => null !== request('frm1706:j_id392') ? request('frm1706:j_id392') : '',
			'item18'   => null !== request('frm1706:j_id393') ? request('frm1706:j_id393') : '',
			'item19'   => null !== request('frm1706:j_id394') ? request('frm1706:j_id394') : '',
			'item20'   => request('frm1706:rdTreaty'),
			'item20_other'   => request('frm1706:selTreaty'),
			'item21'   => null !== request('frm1706:j_id395') ? request('frm1706:j_id395') : '',
			'item21_other'   => request('frm1706:txtOthers21'),
			'item22'   => request('frm1706:txtSelling'),
			'item23'   => request('frm1706:txtCost'),
			'item24'   => request('frm1706:txtMortgage'),
			'item25'   => request('frm1706:txtTotalP'),
			'item26'   => request('frm1706:txtAmount'),
			'item27'   => request('frm1706:txtTotalN'),
			'item28A'   => request('frm1706:txtDateMonthI'),
			'item28B'   => request('frm1706:txtDateDayI'),
			'item28C'   => request('frm1706:txtDateYearI'),
			'item29A_1'   => null !== request('frm1706:opt29A') ? request('frm1706:opt29A') : '',
			'item29A_2'   => request('frm1706:txtFMVLand'),
			'item29B_1'   => null !== request('frm1706:opt29B') ? request('frm1706:opt29B') : '',
			'item29B_2'   => request('frm1706:txtFMVImprovements'),
			'item29C_1'   => null !== request('frm1706:opt29C') ? request('frm1706:opt29C') : '',
			'item29C_2'   => request('frm1706:txtFMVZonal'),
			'item29D_1'   => null !== request('frm1706:opt29D') ? request('frm1706:opt29D') : '',
			'item29D_2'   => request('frm1706:txtFMVBIR'),
			'item30'   => null !== request('frm1706:opt30') ? request('frm1706:opt30') : '',
			'item30A'   => request('frm1706:txtGross'),
			'item30B'   => request('frm1706:txtBid'),
			'item30C'   => request('frm61706:txtFMVLI'),
			'item30D'   => request('frm1706:txtInstallment'),
			'item30E'   => request('frm1706:txtOthers30E'),
			'item30F'   => request('frm1706:txtOtherss30F'),
			'item30F_others'   => request('frm1706:txtOthers30F'),
			'item31'   => request('frm1706:txtTax'),
			'item32'   => request('frm1706:txtRate'),
			'item33'   => request('frm1706:txtLess'),
			'item34'   => request('frm1706:txtTaxDue'),
			'item35A'   => request('frm1706:txtSurcharge'),
			'item35B'   => request('frm1706:txtInterest'),
			'item35C'   => request('frm1706:txtCompromise'),
			'item35D'   => request('frm1706:txtTotalPenalties'),
			'item36'   => request('frm1706:txtTotal'),
			'overpayment'   => null !== request('frm1706:opt37') ? request('frm1706:opt37') : '',
    	]);

    	$getForm = tbl_1706::where('form_no', request('form_no'))
                            ->where('company_id', request('company'))->get();

        $form = "";
        $trans = "";
        if(request('form_id') != ""){
            $form = tbl_1706::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1706::create($data);
            }else{
                $form = tbl_1706::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_1706_schedule1::where('form_id', $getForm[0]->id)->delete();
        }

    	for ($i=1; $i < 20 ; $i++) { 
    		if(request('frm1706:txtSchedModal'.$i.'') != ''){
    			$schedule1 = ([
		        	'form_id'   => $form->id,
					'item'   => request('frm1706:txtSchedModal'.$i.''),
		        ]);
		        tbl_1706_schedule1::create($schedule1);
    		}
    	}

    	$j_id217_1 = "false";
    	$j_id217_2 = "false";

    	if(request('frm1706:j_id217') == 'Y'){
        	$j_id217_1 = "true";
        }else if(request('frm1706:j_id217') == 'N'){
        	$j_id217_2 = "true";
        }

        $opt4 = "false";
        $opt4C = "false";

        if(null !== request('frm1706:opt4')){
        	if(request('frm1706:opt4') == 'II420'){
        		$opt4 = "true";
        	}else if(request('frm1706:opt4') == 'IC420'){
        		$opt4C = "true";
        	}
        }

        $sellerName =  rawurlencode(request('frm1706:txtSellerName'));

        $buyerName =  rawurlencode(request('frm1706:txtBuyerName'));

        $sellerAddress = rawurlencode(request('frm1706:txtSellerAddress'));

        $buyerAddress = rawurlencode(request('frm1706:txtBuyerAddress'));

        $sellerRAddress = rawurlencode(request('frm1706:txtSellerRAddress'));

        $location = rawurlencode(request('frm1706:txtLocation'));

        $j_id391_1 = "false";
        $j_id391_3 = "false";
        $j_id391_5 = "false";
        $j_id391_8 = "false";
        $j_id391_2 = "false";
        $j_id391_4 = "false";
        $j_id391_6 = "false";

        if(null !== request('frm1706:j_id391')){
        	if(request('frm1706:j_id391') == 'R'){
        		$j_id391_1 = "true";
        	}else if(request('frm1706:j_id391') == 'C'){
        		$j_id391_3 = "true";
        	}else if(request('frm1706:j_id391') == 'CR'){
        		$j_id391_5 = "true";
        	}else if(request('frm1706:j_id391') == 'O'){
        		$j_id391_8 = "true";
        	}else if(request('frm1706:j_id391') == 'A'){
        		$j_id391_2 = "true";
        	}else if(request('frm1706:j_id391') == 'I'){
        		$j_id391_4 = "true";
        	}else if(request('frm1706:j_id391') == 'CC'){
        		$j_id391_6 = "true";
        	}
        }

        $j_id392_1 = "false";
        $j_id392_2 = "false";
        if(null !== request('frm1706:j_id392')){
        	if(request('frm1706:j_id392') == 'Y'){
        		$j_id392_1 = "true";
        	}else if(request('frm1706:j_id392') == 'N'){
        		$j_id392_2 = "true";
        	}
        }

        $j_id393_1 = "false";
        $j_id393_2 = "false";
        if(null !== request('frm1706:j_id393')){
        	if(request('frm1706:j_id393') == 'Y'){
        		$j_id393_1 = "true";
        	}else if(request('frm1706:j_id393') == 'N'){
        		$j_id393_2 = "true";
        	}
        }

        $j_id394_1 = "false";
        $j_id394_2 = "false";
        if(null !== request('frm1706:j_id394')){
        	if(request('frm1706:j_id394') == 'Y'){
        		$j_id394_1 = "true";
        	}else if(request('frm1706:j_id394') == 'N'){
        		$j_id394_2 = "true";
        	}
        }

        $rdTreaty_1 = "false";
        $rdTreaty_2 = "false";
        if(request('frm1706:rdTreaty') == 'Y'){
        		$rdTreaty_1 = "true";
        }else if(request('frm1706:rdTreaty') == 'N'){
        		$rdTreaty_2 = "true";
        }
        
        $j_id395_1 = "false";
        $j_id395_4 = "false";
        $j_id395_2 = "false";
        $j_id395_5 = "false";
        $j_id395_3 = "false";
        if(null !== request('frm1706:j_id395')){
        	if(request('frm1706:j_id395') == 'CS'){
        		$j_id395_1 = "true";
        	}else if(request('frm1706:j_id395') == 'FS'){
        		$j_id395_4 = "true";
        	}else if(request('frm1706:j_id395') == 'E'){
        		$j_id395_2 = "true";
        	}else if(request('frm1706:j_id395') == 'O'){
        		$j_id395_5 = "true";
        	}else if(request('frm1706:j_id395') == 'IS'){
        		$j_id395_3 = "true";
        	}
        }

        $opt30A = "false";
        $opt30B = "false";
        $opt30C = "false";
        $opt30D = "false";
        $opt30E = "false";
        $opt30F = "false";
        if(null !== request('frm1706:opt30')){
        	if(request('frm1706:opt30') == 'A'){
        		$opt30A = "true";
        	}else if(request('frm1706:opt30') == 'B'){
        		$opt30B = "true";
        	}else if(request('frm1706:opt30') == 'C'){
        		$opt30C = "true";
        	}else if(request('frm1706:opt30') == 'D'){
        		$opt30D = "true";
        	}else if(request('frm1706:opt30') == 'E'){
        		$opt30E = "true";
        	}else if(request('frm1706:opt30') == 'F'){
        		$opt30F = "true";
        	}
        }

        $opt37_1 = "false";
        $opt37_2 = "false";
        if(null !== request('frm1706:opt37')){
        	if(request('frm1706:opt37') == 'A'){
        		$opt37_1 = "true";
        	}else if(request('frm1706:opt37') == 'B'){
        		$opt37_2 = "true";
        	}
        }

    	$xmlData = "<?xml version='1.0'?>	
            <div>frm1706:txtDateMonth=".request('frm1706:txtDateMonth')."frm1706:txtDateMonth=</div>	
            <div>frm1706:txtDateDay=".request('frm1706:txtDateDay')."frm1706:txtDateDay=</div>	
            <div>frm1706:txtDateYear=".request('frm1706:txtDateYear')."frm1706:txtDateYear=</div>	
            <div>frm1706:j_id217:_1=".$j_id217_1."frm1706:j_id217:_1=</div>	
            <div>frm1706:j_id217:_2=".$j_id217_2."frm1706:j_id217:_2=</div>	
            <div>frm1706:txtSheets=".request('frm1706:txtSheets')."frm1706:txtSheets=</div>	
            <div>frm1706:txt4=".request('frm1706:txt4')."frm1706:txt4=</div>	
            <div>frm1706:opt4=".$opt4."frm1706:opt4=</div>	
            <div>frm1706:txt4C=".request('frm1706:txt4C')."frm1706:txt4C=</div>	
            <div>frm1706:opt4C=".$opt4C."frm1706:opt4C=</div>	
            <div>frm1706:txtTIN1=".request('frm1706:txtTIN1')."frm1706:txtTIN1=</div>	
            <div>frm1706:txtTIN2=".request('frm1706:txtTIN2')."frm1706:txtTIN2=</div>	
            <div>frm1706:txtTIN3=".request('frm1706:txtTIN3')."frm1706:txtTIN3=</div>	
            <div>frm1706:txtBranchCode=".request('frm1706:txtBranchCode')."frm1706:txtBranchCode=</div>	
            <div>frm1706:txtRDOCode=".request('frm1706:txtRDOCode')."frm1706:txtRDOCode=</div>	
            <div>frm1706:txtTINB1=".request('frm1706:txtTINB1')."frm1706:txtTINB1=</div>	
            <div>frm1706:txtTINB2=".request('frm1706:txtTINB2')."frm1706:txtTINB2=</div>	
            <div>frm1706:txtTINB3=".request('frm1706:txtTINB3')."frm1706:txtTINB3=</div>	
            <div>frm1706:txtBranchCodeB=".request('frm1706:txtBranchCodeB')."frm1706:txtBranchCodeB=</div>	
            <div>frm1706:txtRDOCodeB=".request('frm1706:txtRDOCodeB')."frm1706:txtRDOCodeB=</div>	
            <div>frm1706:txtSellerName=".$sellerName."frm1706:txtSellerName=</div>	
            <div>frm1706:txtBuyerName=".$buyerName."frm1706:txtBuyerName=</div>	
            <div>frm1706:txtSellerAddress=".$sellerAddress."frm1706:txtSellerAddress=</div>	
            <div>frm1706:txtBuyerAddress=".$buyerAddress."frm1706:txtBuyerAddress=</div>	
            <div>frm1706:txtSellerRAddress=".$sellerRAddress."frm1706:txtSellerRAddress=</div>	
            <div>frm1706:txtLocation=".$location."frm1706:txtLocation=</div>	
            <div>frm1706:txtRDOCode14A=".request('frm1706:txtRDOCode14A')."frm1706:txtRDOCode14A=</div>	
            <div>frm1706:j_id391:_1=".$j_id391_1."frm1706:j_id391:_1=</div>	
            <div>frm1706:j_id391:_3=".$j_id391_3."frm1706:j_id391:_3=</div>	
            <div>frm1706:j_id391:_5=".$j_id391_5."frm1706:j_id391:_5=</div>	
            <div>frm1706:j_id391:_8=".$j_id391_8."frm1706:j_id391:_8=</div>	
            <div>frm1706:j_id391:_7=".request('frm1706:j_id391:_7')."frm1706:j_id391:_7=</div>	
            <div>frm1706:j_id391:_2=".$j_id391_2."frm1706:j_id391:_2=</div>	
            <div>frm1706:j_id391:_4=".$j_id391_4."frm1706:j_id391:_4=</div>	
            <div>frm1706:j_id391:_6=".$j_id391_6."frm1706:j_id391:_6=</div>	
            <div>frm1706:txtTCT=".request('frm1706:txtTCT')."frm1706:txtTCT=</div>	
            <div>frm1706:txtArea=".request('frm1706:txtArea')."frm1706:txtArea=</div>	
            <div>frm1706:txtTaxDC=".request('frm1706:txtTaxDC')."frm1706:txtTaxDC=</div>	
            <div>frm1706:txtOthers=".request('frm1706:txtOthers')."frm1706:txtOthers=</div>	
            <div>frm1706:j_id392:_1=".$j_id392_1."frm1706:j_id392:_1=</div>	
            <div>frm1706:j_id392:_2=".$j_id392_2."frm1706:j_id392:_2=</div>	
            <div>frm1706:j_id393:_1=".$j_id393_1."frm1706:j_id393:_1=</div>	
            <div>frm1706:j_id393:_2=".$j_id393_2."frm1706:j_id393:_2=</div>	
            <div>frm1706:j_id394:_1=".$j_id394_1."frm1706:j_id394:_1=</div>	
            <div>frm1706:j_id394:_2=".$j_id394_2."frm1706:j_id394:_2=</div>	
            <div>frm1706:rdTreaty:_1=".$rdTreaty_1."frm1706:rdTreaty:_1=</div>	
            <div>frm1706:rdTreaty:_2=".$rdTreaty_2."frm1706:rdTreaty:_2=</div>	
            <div>frm1706:selTreaty=".request('frm1706:selTreaty')."frm1706:selTreaty=</div>	
            <div>frm1706:j_id395:_1=".$j_id395_1."frm1706:j_id395:_1=</div>	
            <div>frm1706:j_id395:_4=".$j_id395_4."frm1706:j_id395:_4=</div>	
            <div>frm1706:j_id395:_2=".$j_id395_2."frm1706:j_id395:_2=</div>	
            <div>frm1706:j_id395:_5=".$j_id395_5."frm1706:j_id395:_5=</div>	
            <div>frm1706:j_id395:_3=".$j_id395_3."frm1706:j_id395:_3=</div>	
            <div>frm1706:txtOthers21=".request('frm1706:txtOthers21')."frm1706:txtOthers21=</div>	
            <div>frm1706:txtSelling=".request('frm1706:txtSelling')."frm1706:txtSelling=</div>	
            <div>frm1706:txtCost=".request('frm1706:txtCost')."frm1706:txtCost=</div>	
            <div>frm1706:txtMortgage=".request('frm1706:txtMortgage')."frm1706:txtMortgage=</div>	
            <div>frm1706:txtTotalP=".request('frm1706:txtTotalP')."frm1706:txtTotalP=</div>	
            <div>frm1706:txtAmount=".request('frm1706:txtAmount')."frm1706:txtAmount=</div>	
            <div>frm1706:txtTotalN=".request('frm1706:txtTotalN')."frm1706:txtTotalN=</div>	
            <div>frm1706:txtDateMonthI=".request('frm1706:txtDateMonthI')."frm1706:txtDateMonthI=</div>	
            <div>frm1706:txtDateDayI=".request('frm1706:txtDateDayI')."frm1706:txtDateDayI=</div>	
            <div>frm1706:txtDateYearI=".request('frm1706:txtDateYearI')."frm1706:txtDateYearI=</div>	
            <div>frm1706:opt29A=".(null !== request('frm1706:opt29A') ? 'true' : 'false')."frm1706:opt29A=</div>	
            <div>frm1706:txtFMVLand=".request('frm1706:txtFMVLand')."frm1706:txtFMVLand=</div>	
            <div>frm1706:opt29C=".(null !== request('frm1706:opt29C') ? 'true' : 'false')."frm1706:opt29C=</div>	
            <div>frm1706:txtFMVZonal=".request('frm1706:txtFMVZonal')."frm1706:txtFMVZonal=</div>	
            <div>frm1706:opt29B=".(null !== request('frm1706:opt29B') ? 'true' : 'false')."frm1706:opt29B=</div>	
            <div>frm1706:txtFMVImprovements=".request('frm1706:txtFMVImprovements')."frm1706:txtFMVImprovements=</div>	
            <div>frm1706:opt29D=".(null !== request('frm1706:opt29D') ? 'true' : 'false')."frm1706:opt29D=</div>	
            <div>frm1706:txtFMVBIR=".request('frm1706:txtFMVBIR')."frm1706:txtFMVBIR=</div>	
            <div>frm1706:opt30A=".$opt30A."frm1706:opt30A=</div>	
            <div>frm1706:txtGross=".request('frm1706:txtGross')."frm1706:txtGross=</div>	
            <div>frm1706:opt30B=".$opt30B."frm1706:opt30B=</div>	
            <div>frm1706:txtBid=".request('frm1706:txtBid')."frm1706:txtBid=</div>	
            <div>frm1706:opt30C=".$opt30C."frm1706:opt30C=</div>	
            <div>frm1706:txtFMVLI=".request('frm61706:txtFMVLI')."frm1706:txtFMVLI=</div>	
            <div>frm1706:opt30D=".$opt30D."frm1706:opt30D=</div>	
            <div>frm1706:txtInstallment=".request('frm1706:txtInstallment')."frm1706:txtInstallment=</div>	
            <div>frm1706:opt30E=".$opt30E."frm1706:opt30E=</div>	
            <div>frm1706:txtOthers30E=".request('frm1706:txtOthers30E')."frm1706:txtOthers30E=</div>	
            <div>frm1706:opt30F=".$opt30F."frm1706:opt30F=</div>	
            <div>frm1706:txtOtherss30F=".request('frm1706:txtOtherss30F')."frm1706:txtOtherss30F=</div>	
            <div>frm1706:txtOthers30F=".request('frm1706:txtOthers30F')."frm1706:txtOthers30F=</div>	
            <div>frm1706:txtTax=".request('frm1706:txtTax')."frm1706:txtTax=</div>	
            <div>frm1706:txtRate=".request('frm1706:txtRate')."frm1706:txtRate=</div>	
            <div>frm1706:txtLess=".request('frm1706:txtLess')."frm1706:txtLess=</div>	
            <div>frm1706:txtTaxDue=".request('frm1706:txtTaxDue')."frm1706:txtTaxDue=</div>	
            <div>frm1706:txtSurcharge=".request('frm1706:txtSurcharge')."frm1706:txtSurcharge=</div>	
            <div>frm1706:txtInterest=".request('frm1706:txtInterest')."frm1706:txtInterest=</div>	
            <div>frm1706:txtCompromise=".request('frm1706:txtCompromise')."frm1706:txtCompromise=</div>	
            <div>frm1706:txtTotalPenalties=".request('frm1706:txtTotalPenalties')."frm1706:txtTotalPenalties=</div>	
            <div>frm1706:txtTotal=".request('frm1706:txtTotal')."frm1706:txtTotal=</div>	
            <div>frm1706:opt37:_1=".$opt37_1."frm1706:opt37:_1=</div>	
            <div>frm1706:opt37:_2=".$opt37_2."frm1706:opt37:_2=</div>	
            <div>frm1706:txtSchedModal1=".request('frm1706:txtSchedModal1')."frm1706:txtSchedModal1=</div>	
            <div>frm1706:txtSchedModal2=".request('frm1706:txtSchedModal2')."frm1706:txtSchedModal2=</div>	
            <div>frm1706:txtSchedModal3=".request('frm1706:txtSchedModal3')."frm1706:txtSchedModal3=</div>	
            <div>frm1706:txtSchedModal4=".request('frm1706:txtSchedModal4')."frm1706:txtSchedModal4=</div>	
            <div>frm1706:txtSchedModal5=".request('frm1706:txtSchedModal5')."frm1706:txtSchedModal5=</div>	
            <div>frm1706:txtSchedModal6=".request('frm1706:txtSchedModal6')."frm1706:txtSchedModal6=</div>	
            <div>frm1706:txtSchedModal7=".request('frm1706:txtSchedModal7')."frm1706:txtSchedModal7=</div>	
            <div>frm1706:txtSchedModal8=".request('frm1706:txtSchedModal8')."frm1706:txtSchedModal8=</div>	
            <div>frm1706:txtSchedModal9=".request('frm1706:txtSchedModal9')."frm1706:txtSchedModal9=</div>	
            <div>frm1706:txtSchedModal10=".request('frm1706:txtSchedModal10')."frm1706:txtSchedModal10=</div>	
            <div>frm1706:txtSchedModal11=".request('frm1706:txtSchedModal11')."frm1706:txtSchedModal11=</div>	
            <div>frm1706:txtSchedModal12=".request('frm1706:txtSchedModal12')."frm1706:txtSchedModal12=</div>	
            <div>frm1706:txtSchedModal13=".request('frm1706:txtSchedModal13')."frm1706:txtSchedModal13=</div>	
            <div>frm1706:txtSchedModal14=".request('frm1706:txtSchedModal14')."frm1706:txtSchedModal14=</div>	
            <div>frm1706:txtSchedModal15=".request('frm1706:txtSchedModal15')."frm1706:txtSchedModal15=</div>	
            <div>frm1706:txtSchedModal16=".request('frm1706:txtSchedModal16')."frm1706:txtSchedModal16=</div>	
            <div>frm1706:txtSchedModal17=".request('frm1706:txtSchedModal17')."frm1706:txtSchedModal17=</div>	
            <div>frm1706:txtSchedModal18=".request('frm1706:txtSchedModal18')."frm1706:txtSchedModal18=</div>	
            <div>frm1706:txtSchedModal19=".request('frm1706:txtSchedModal19')."frm1706:txtSchedModal19=</div>	
            <div>frm1706:txtSchedModal20=".request('frm1706:txtSchedModal20')."frm1706:txtSchedModal20=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>txtEmail=".request('txtEmail')."txtEmail=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2012.";

            $tin = request('frm1706:txtTIN1').request('frm1706:txtTIN2').request('frm1706:txtTIN3').request('frm1706:txtBranchCode');

        	$getReturnPeriod = tbl_1706::where('company_id',  request('company'))
                            ->where('item1A', request('frm1706:txtDateMonth'))
                            ->where('item1B', request('frm1706:txtDateDay'))
                            ->where('item1C', request('frm1706:txtDateYear'))
                            ->count();

            $returnPeriod = request('frm1706:txtDateMonth')."/".request('frm1706:txtDateDay')."/".request('frm1706:txtDateYear');
                           
	        if($getReturnPeriod == "1"){
	            $xmlReturnPeriod = request('frm1706:txtDateMonth').request('frm1706:txtDateDay').request('frm1706:txtDateYear')."_".request('frm1706:txtTCT');
	        }else{
	            if(request('form_id') != ""){
	                    $getXml = Xml::where('user_id', Auth::user()->id)
	                            ->where('company_id', request('company'))
	                            ->where('form_id', $form->id)
	                            ->where('form', '1706')
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

	            $xmlReturnPeriod = request('frm1706:txtDateMonth').request('frm1706:txtDateDay').request('frm1706:txtDateYear')."_".request('frm1706:txtTCT').$ext;
	        }
	        $filename = $tin."-1706-".$xmlReturnPeriod.'.xml';

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
                'form'          => '1706',
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
                            ->where('form', '1706')
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
                            ->where('form', '1706')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1706::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1706')
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
        $data = tbl_1706::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1706')
                            ->get();
        
        return view('forms.BIR-Form 1706',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

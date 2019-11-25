<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_2200T;
use App\tbl_2200T_schedules;
use App\tbl_2200T_other_schedules;
use App\tbl_2200T_calculator1;
use App\tbl_2200T_calculator2;
use App\tbl_2200T_calculator3;
use App\tbl_2200T_calculator4;
use App\tbl_2200T_calculator5;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form2200TController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);
        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_2200_ts')){

            }else{
            	Schema::connection('mysql2')->create('tbl_2200_ts', function (Blueprint $table) {
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
					$table->string('item14A')->nullable();
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
					$table->text('item25C');
					$table->text('item26');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_t_schedules', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('export')->nullable();
                	 $table->text('taxable')->nullable();
                	 $table->text('tax_due')->nullable();
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_t_other_schedules', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('atc')->nullable();
                	 $table->text('description')->nullable();
                	 $table->text('measure')->nullable();
                	 $table->text('rate');
                	 $table->text('exempt');
                	 $table->text('taxable');
                	 $table->text('tax_due');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_t_calculator1s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('description')->nullable();
                	 $table->text('total_cigars')->nullable();
                	 $table->text('nrp')->nullable();
                	 $table->text('tax_base')->nullable();
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_t_calculator2s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('description')->nullable();
                	 $table->text('total_cigars')->nullable();
                     $table->timestamps();
                });


                Schema::connection('mysql2')->create('tbl_2200_t_calculator3s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('description')->nullable();
                	 $table->text('cases')->nullable();
                	 $table->text('reams_case');
                	 $table->text('reams');
                	 $table->text('packs_reams');
                	 $table->text('packs');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_t_calculator4s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('description')->nullable();
                	 $table->text('cases')->nullable();
                	 $table->text('reams_case');
                	 $table->text('reams');
                	 $table->text('packs_reams');
                	 $table->text('packs');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_2200_t_calculator5s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('description')->nullable();
                	 $table->text('cases')->nullable();
                	 $table->text('reams_case');
                	 $table->text('reams');
                	 $table->text('packs_reams');
                	 $table->text('packs');
                     $table->timestamps();
                });
            }
        	return view('forms.BIR-Form 2200T',['company' => $company, 'form_no' => $form_id,  'action' => $action ]);
        }else{
            $data = tbl_2200T::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2200T')
                            ->get();
        
            return view('forms.BIR-Form 2200T',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }
    public function store()
    {
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);
    	$data = ([
    		'form_no'      => request('form_no'),
			'company_id'      => request('company'),
			'item1A'      => request('frm2200T:txtMonth1'),
			'item1B'      => request('frm2200T:txtDate'),
			'item1C'      => request('frm2200T:txtForYr'),
			'item2'      => request('frm2200T:amendedRtn'),
			'item3'      => request('frm2200T:txtSheets'),
			'item10'      => request('frm2200T:txtPSIC'),
			'item12A'      => request('frm2200ToptRegion'),
			'item12B'      => request('frm2200ToptProvince'),
			'item12C'      => request('frm2200ToptCity'),
			'item13A'      => request('frm2200ToptRegion1'),
			'item13B'      => request('frm2200ToptProvince1'),
			'item13C'      => request('frm2200ToptCity1'),
			'item14'      => request('frm2200T:optTreaty'),
			'item14A'      => request('frm2200T:lstTaxTreaty'),
			'item15'      => null !== request('frm2200T:chkPymntManner') ? request('frm2200T:chkPymntManner') : '',
			'item17'      => null !== request('frm2200T:chkPymntMannerOther') ? request('frm2200T:chkPymntMannerOther') : '',
			'item17_others'      => request('frm2200T:txtOthMannerofPymnt'),
			'item18'      => request('frm2200T:txtTax18'),
			'item19A'      => request('frm2200T:txtTax19A'),
			'item19B'      => request('frm2200T:txtTax19B'),
			'item19C'      => request('frm2200T:txtTax19C'),
			'item20'      => request('frm2200T:txtTax20'),
			'item21'      => request('frm2200T:txtTax21'),
			'item22'      => request('frm2200T:txtTax22'),
			'item23A'      => request('frm2200T:txtTax23A'),
			'item23B'      => request('frm2200T:txtTax23B'),
			'item23C'      => request('frm2200T:txtTax23C'),
			'item23D'      => request('frm2200T:txtTax23D'),
			'item24'      => request('frm2200T:txtTax24'),
			'item25A'      => request('frm2200T:txtTax25A'),
			'item25B'      => request('frm2200T:txtTax25B'),
			'item25C'      => request('frm2200T:txtTax25C'),
			'item26'      => request('frm2200T:txtTax26'),
    	]);

    	$getForm = tbl_2200T::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();

     	$form = "";
     	$trans = "";
        if(request('form_id') != ""){
            $form = tbl_2200T::find(request('form_id'));
            $form->update($data);
            $trans = "update";
        }else{
            if($getForm->isEmpty()){
                $form = tbl_2200T::create($data);
            }else{
                $form = tbl_2200T::find($getForm[0]->id);
                $form->update($data);
                $trans = "update";
            }
        }

        if($trans == "update"){
        	tbl_2200T_schedules::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200T_other_schedules::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200T_calculator1::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200T_calculator2::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200T_calculator3::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200T_calculator4::where('form_id', $getForm[0]->id)->delete();
        	tbl_2200T_calculator5::where('form_id', $getForm[0]->id)->delete();
        }

        for ($i=0; $i < 8 ; $i++) { 
        	if(request('frm2200T:txtProExempt'.$i.'') != '0.00'){
        		$schedule = ([
	        		'form_id'      => $form->id,
					'export'      => request('frm2200T:txtProExempt'.$i.''),
					'taxable'      => request('frm2200T:txtProTaxable'.$i.''),
					'tax_due'      => request('frm2200T:txtProBasicTaxDue'.$i.''),
				]);
				tbl_2200T_schedules::create($schedule);
        	}
        	
        }

        for ($x=0; $x < 5 ; $x++) { 
        	if(request('frm2200T:txtInsExempt'.$x.'') != '0.00'){
        		$schedule = ([
        		'form_id'      => $form->id,
				'export'      => request('frm2200T:txtInsExempt'.$x.''),
				'taxable'      => request('frm2200T:txtInsTaxable'.$x.''),
				'tax_due'      => request('frm2200T:txtInsBasicTaxDue'.$x.''),
				]);
				tbl_2200T_schedules::create($schedule);
        	}
        }

        for ($y=0; $y < count(request('frm2200T:txtsched1Atc')) ; $y++) { 
        	if(request('frm2200T:txtsched1Atc')[$y] != 'XT'){
        		$others = ([
        				'form_id'  => $form->id,
        				'atc'      => request('frm2200T:txtsched1Atc')[$y],
						'description'      => request('frm2200T:txtsched1Desc'.$y.''),
						'measure'      => request('frm2200T:txtsched1TaxBracket'.$y.''),
						'rate'      => request('frm2200T:txtsched1AppTaxRate'.$y.''),
						'exempt'      => request('frm2200T:txtsched1Exempt'.$y.''),
						'taxable'      => request('frm2200T:txtsched1Taxable'.$y.''),
						'tax_due'      => request('frm2200T:txtsched1BasicTaxDue'.$y.''),
        		]);
        		tbl_2200T_other_schedules::create($others);
        	}
        }

        if(null !== request('frm2200T:txtXT35_desc')){
        	for ($y=0; $y < count(request('frm2200T:txtXT35_desc')) ; $y++) { 
        		$calculator1 = ([
        			'form_id'   => $form->id,
					'description'   => request('frm2200T:txtXT35_desc')[$y],
					'total_cigars'   => request('frm2200T:txtXT35_cigars')[$y],
					'nrp'   => request('frm2200T:txtXT35_nrp')[$y],
					'tax_base'   => request('frm2200T:txtXT35_base')[$y],
        		]);
        		tbl_2200T_calculator1::create($calculator1);
        	}
        }

        if(null !== request('frm2200T:txtXT36_desc')){
        	for ($y=0; $y < count(request('frm2200T:txtXT36_desc')) ; $y++) { 
        		$calculator2 = ([
        			'form_id'   => $form->id,
					'description'   => request('frm2200T:txtXT36_desc')[$y],
					'total_cigars'   => request('frm2200T:txtXT36_cigars')[$y],
        		]);
        		tbl_2200T_calculator2::create($calculator2);
        	}
        }

        if(null !== request('frm2200T:txtXT40_desc')){
        	for ($y=0; $y < count(request('frm2200T:txtXT40_desc')) ; $y++) { 
        		$calculator3 = ([
        			'form_id'   => $form->id,
					'description'   => request('frm2200T:txtXT40_desc')[$y],
					'cases'   => request('frm2200T:txtXT40_cases')[$y],
					'reams_case'   => request('frm2200T:txtXT40_r_case')[$y],
					'reams'   => request('frm2200T:txtXT40_reams')[$y],
					'packs_reams'   => request('frm2200T:txtXT40_p_reams')[$y],
					'packs'   => request('frm2200T:txtXT40_packs')[$y],
        		]);
        		tbl_2200T_calculator3::create($calculator3);
        	}
        }

        if(null !== request('frm2200T:txtXT140_desc')){
        	for ($y=0; $y < count(request('frm2200T:txtXT140_desc')) ; $y++) { 
        		$calculator4 = ([
        			'form_id'   => $form->id,
					'description'   => request('frm2200T:txtXT140_desc')[$y],
					'cases'   => request('frm2200T:txtXT140_cases')[$y],
					'reams_case'   => request('frm2200T:txtXT140_r_cases')[$y],
					'reams'   => request('frm2200T:txtXT140_reams')[$y],
					'packs_reams'   => request('frm2200T:txtXT140_p_reams')[$y],
					'packs'   => request('frm2200T:txtXT140_packs')[$y],
        		]);
        		tbl_2200T_calculator4::create($calculator4);
        	}
        }

        if(null !== request('frm2200T:txtXT150_desc')){
        	for ($y=0; $y < count(request('frm2200T:txtXT150_desc')) ; $y++) { 
        		$calculator5 = ([
        			'form_id'   => $form->id,
					'description'   => request('frm2200T:txtXT150_desc')[$y],
					'cases'   => request('frm2200T:txtXT150_cases')[$y],
					'reams_case'   => request('frm2200T:txtXT150_r_case')[$y],
					'reams'   => request('frm2200T:txtXT150_reams')[$y],
					'packs_reams'   => request('frm2200T:txtXT150_p_reams')[$y],
					'packs'   => request('frm2200T:txtXT150_packs')[$y],
        		]);
        		tbl_2200T_calculator5::create($calculator5);
        	}
        }

        $amendedRtn_1 = "false";
        $amendedRtn_2 = "false";

        if( request('frm2200T:amendedRtn') == "Y"){
          $amendedRtn_1 = "true";
        }else if( request('frm2200T:amendedRtn') == "N"){
          $amendedRtn_2 = "true";
        }

        $taxPayerName =  rawurlencode(request('frm2200T:taxpayerName'));

        $address = rawurlencode(request('frm2200T:txtAddress'));

        $lineOfBusiness =  rawurlencode(request('frm2200T:txtLineBus'));

        $optTreaty_1 = "false";
        $optTreaty_2 = "false";

        if( request('frm2200T:optTreaty') == "Y"){
	          $optTreaty_1 = "true";
	    }else if( request('frm2200T:optTreaty') == "N"){
	          $optTreaty_2 = "true";
	    }

	    $chkPymntManner_1 = "false";
        $chkPymntManner_2 = "false";
        $chkPymntManner_3 = "false";

        if(null !== request('frm2200T:chkPymntManner')){
        	if( request('frm2200T:chkPymntManner') == "Y"){
	          $chkPymntManner_1 = "true";
	        }else if( request('frm2200T:chkPymntManner') == "N1"){
	          $chkPymntManner_2 = "true";
	        }
        }

        if(null !== request('frm2200T:chkPymntMannerOther')){
        	$chkPymntManner_3 = "true";
        }

        $xml_schedules = "";
        if(count(request('frm2200T:txtsched1Atc')) > 1){
        	for ($y=1; $y < count(request('frm2200T:txtsched1Atc')) ; $y++) { 
	        $xml_schedules .= "<div>frm2200T:sched1Chk".$y."=".(null !== request('frm2200T:sched1Chk'.$y.'')? 'true' : 'false')."frm2200T:sched1Chk".$y."=</div>    
            <div>frm2200T:txtsched1Atc".$y."=".request('frm2200T:txtsched1Atc')[$y]."frm2200T:txtsched1Atc".$y."=</div>  
            <div>frm2200T:txtsched1Desc".$y."=".request('frm2200T:txtsched1Desc'.$y.'')."frm2200T:txtsched1Desc".$y."=</div>  
            <div>frm2200T:txtsched1TaxBracket".$y."=".request('frm2200T:txtsched1TaxBracket'.$y.'')."frm2200T:txtsched1TaxBracket".$y."=</div>  
            <div>frm2200T:txtsched1AppTaxRate".$y."=".request('frm2200T:txtsched1AppTaxRate'.$y.'')."frm2200T:txtsched1AppTaxRate".$y."=</div>   
            <div>frm2200T:txtsched1Exempt".$y."=".request('frm2200T:txtsched1Exempt'.$y.'')."frm2200T:txtsched1Exempt".$y."=</div>   
            <div>frm2200T:txtsched1Taxable".$y."=".request('frm2200T:txtsched1Taxable'.$y.'')."frm2200T:txtsched1Taxable".$y."=</div> 
            <div>frm2200T:txtsched1BasicTaxDue".$y."=".request('frm2200T:txtsched1BasicTaxDue'.$y.'')."frm2200T:txtsched1BasicTaxDue".$y."=</div> 
            ";
	        }
        }
        

        $xml_calculator1 = "";
        if(null !== request('frm2200T:txtXT35_desc')){
        	for ($i=0; $i < count(request('frm2200T:txtXT35_desc')) ; $i++) { 
        		$xml_calculator1 .= "<div>frm2200T:chkXT35Delete_".($i + 1)."C1=".(null !== request('frm2200T:chkXT35Delete')[$i] ? 'true' : 'false')."frm2200T:chkXT35Delete_".($i + 1)."C1=</div>	
            <div>frm2200T:txtXT35_".($i + 1)."C2=".request('frm2200T:txtXT35_desc')[$i]."frm2200T:txtXT35_".($i + 1)."C2=</div>	
            <div>frm2200T:txtXT35_".($i + 1)."C3=".request('frm2200T:txtXT35_cigars')[$i]."frm2200T:txtXT35_".($i + 1)."C3=</div>	
            <div>frm2200T:txtXT35_".($i + 1)."C4=".request('frm2200T:txtXT35_nrp')[$i]."frm2200T:txtXT35_".($i + 1)."C4=</div>	
            <div>frm2200T:txtXT35_".($i + 1)."C5=".request('frm2200T:txtXT35_base')[$i]."frm2200T:txtXT35_".($i + 1)."C5=</div>	
            ";
        	}
        }

        $xml_calculator2 = "";
        if(null !== request('frm2200T:txtXT36_desc')){
        	for ($i=0; $i < count(request('frm2200T:txtXT36_desc')) ; $i++) { 
        		$xml_calculator2 .= "<div>frm2200T:chkXT36Delete_".($i + 1)."C1=".(null !== request('frm2200T:chkXT36Delete')[$i] ? 'true' : 'false')."frm2200T:chkXT36Delete_".($i + 1)."C1=</div>	
            <div>frm2200T:txtXT36_".($i + 1)."C2=".request('frm2200T:txtXT36_desc')[$i]."frm2200T:txtXT36_".($i + 1)."C2=</div>	
            <div>frm2200T:txtXT36_".($i + 1)."C3=".request('frm2200T:txtXT36_cigars')[$i]."frm2200T:txtXT36_".($i + 1)."C3=</div>	
            ";
        	}
        }

        $xml_calculator3 = "";
        if(null !== request('frm2200T:txtXT40_desc')){
        	for ($y=0; $y < count(request('frm2200T:txtXT40_desc')) ; $y++) { 
        		$xml_calculator3 .= "<div>frm2200T:chkXT40Delete_".($y + 1)."C1=".(null !== request('frm2200T:chkXT40Delete')[$y] ? 'true' : 'false')."frm2200T:chkXT40Delete_".($y + 1)."C1=</div>	
            <div>frm2200T:txtXT40_".($y + 1)."C2=".request('frm2200T:txtXT40_desc')[$y]."frm2200T:txtXT40_".($y + 1)."C2=</div>	
            <div>frm2200T:txtXT40_".($y + 1)."C3=".request('frm2200T:txtXT40_cases')[$y]."frm2200T:txtXT40_".($y + 1)."C3=</div>	
            <div>frm2200T:txtXT40_".($y + 1)."C4=".request('frm2200T:txtXT40_r_case')[$y]."frm2200T:txtXT40_".($y + 1)."C4=</div>	
            <div>frm2200T:txtXT40_".($y + 1)."C5=".request('frm2200T:txtXT40_reams')[$y]."frm2200T:txtXT40_".($y + 1)."C5=</div>	
            <div>frm2200T:txtXT40_".($y + 1)."C6=".request('frm2200T:txtXT40_p_reams')[$y]."frm2200T:txtXT40_".($y + 1)."C6=</div>	
            <div>frm2200T:txtXT40_".($y + 1)."C7=".request('frm2200T:txtXT40_packs')[$y]."frm2200T:txtXT40_".($y + 1)."C7=</div>	
            ";
        	}
        }

        $xml_calculator4 = "";
        if(null !== request('frm2200T:txtXT140_desc')){
        	for ($y=0; $y < count(request('frm2200T:txtXT140_desc')) ; $y++) { 
        		$xml_calculator4 .= "<div>frm2200T:chkXT140Delete_".($y + 1)."C1=".(null !== request('frm2200T:chkXT140Delete')[$y] ? 'true' : 'false')."frm2200T:chkXT140Delete_".($y + 1)."C1=</div>	
            <div>frm2200T:txtXT140_".($y + 1)."C2=".request('frm2200T:txtXT140_desc')[$y]."frm2200T:txtXT140_".($y + 1)."C2=</div>	
            <div>frm2200T:txtXT140_".($y + 1)."C3=".request('frm2200T:txtXT140_cases')[$y]."frm2200T:txtXT140_".($y + 1)."C3=</div>	
            <div>frm2200T:txtXT140_".($y + 1)."C4=".request('frm2200T:txtXT140_r_cases')[$y]."frm2200T:txtXT140_".($y + 1)."C4=</div>	
            <div>frm2200T:txtXT140_".($y + 1)."C5=".request('frm2200T:txtXT140_reams')[$y]."frm2200T:txtXT140_".($y + 1)."C5=</div>	
            <div>frm2200T:txtXT140_".($y + 1)."C6=".request('frm2200T:txtXT140_p_reams')[$y]."frm2200T:txtXT140_".($y + 1)."C6=</div>	
            <div>frm2200T:txtXT140_".($y + 1)."C7=".request('frm2200T:txtXT140_packs')[$y]."frm2200T:txtXT140_".($y + 1)."C7=</div>	
            ";
        	}
        }

        $xml_calculator5 = "";
        if(null !== request('frm2200T:txtXT150_desc')){
        	for ($y=0; $y < count(request('frm2200T:txtXT150_desc')) ; $y++) { 
        		$xml_calculator5 .= "<div>frm2200T:chkXT150Delete_".($y + 1)."C1=".(null !== request('frm2200T:chkXT150Delete')[$y] ? 'true' : 'false')."frm2200T:chkXT150Delete_".($y + 1)."C1=</div>	
            <div>frm2200T:txtXT150_".($y + 1)."C2=".request('frm2200T:txtXT150_desc')[$y]."frm2200T:txtXT150_".($y + 1)."C2=</div>	
            <div>frm2200T:txtXT150_".($y + 1)."C3=".request('frm2200T:txtXT150_cases')[$y]."frm2200T:txtXT150_".($y + 1)."C3=</div>	
            <div>frm2200T:txtXT150_".($y + 1)."C4=".request('frm2200T:txtXT150_r_case')[$y]."frm2200T:txtXT150_".($y + 1)."C4=</div>	
            <div>frm2200T:txtXT150_".($y + 1)."C5=".request('frm2200T:txtXT150_reams')[$y]."frm2200T:txtXT150_".($y + 1)."C5=</div>	
            <div>frm2200T:txtXT150_".($y + 1)."C6=".request('frm2200T:txtXT150_p_reams')[$y]."frm2200T:txtXT150_".($y + 1)."C6=</div>	
            <div>frm2200T:txtXT150_".($y + 1)."C7=".request('frm2200T:txtXT150_packs')[$y]."frm2200T:txtXT150_".($y + 1)."C7=</div>	
            ";
        	}
        }

        $xmlData = "<?xml version='1.0'?>	
            <div>frm2200T:txtMonth1=".request('frm2200T:txtMonth1')."frm2200T:txtMonth1=</div>	
            <div>frm2200T:txtDate=".request('frm2200T:txtDate')."frm2200T:txtDate=</div>	
            <div>frm2200T:txtForYr=".request('frm2200T:txtForYr')."frm2200T:txtForYr=</div>	
            <div>frm2200T:amendedRtn_1=".$amendedRtn_1."frm2200T:amendedRtn_1=</div>	
            <div>frm2200T:amendedRtn_2=".$amendedRtn_2."frm2200T:amendedRtn_2=</div>	
            <div>frm2200T:txtSheets=".request('frm2200T:txtSheets')."frm2200T:txtSheets=</div>	
            <div>frm2200T:txtTIN1=".request('frm2200T:txtTIN1')."frm2200T:txtTIN1=</div>	
            <div>frm2200T:txtTIN2=".request('frm2200T:txtTIN2')."frm2200T:txtTIN2=</div>	
            <div>frm2200T:txtTIN3=".request('frm2200T:txtTIN3')."frm2200T:txtTIN3=</div>	
            <div>frm2200T:txtBranchCode=".request('frm2200T:txtBranchCode')."frm2200T:txtBranchCode=</div>	
            <div>frm2200T:txtRDOCode=".request('frm2200T:txtRDOCode')."frm2200T:txtRDOCode=</div>	
            <div>frm2200T:taxpayerName=".$taxPayerName."frm2200T:taxpayerName=</div>	
            <div>frm2200T:txtAddress=".$address."frm2200T:txtAddress=</div>	
            <div>frm2200T:txtZipCode=".request('frm2200T:txtZipCode')."frm2200T:txtZipCode=</div>	
            <div>frm2200T:txtTelNum=".request('frm2200T:txtTelNum')."frm2200T:txtTelNum=</div>	
            <div>frm2200T:txtLineBus=".$lineOfBusiness."frm2200T:txtLineBus=</div>	
            <div>frm2200T:txtPSIC=".request('frm2200T:txtPSIC')."frm2200T:txtPSIC=</div>	
            <div>frm2200T:txtEmailAddress=".request('frm2200T:txtEmailAddress')."frm2200T:txtEmailAddress=</div>	
            <div>frm2200ToptRegion=".request('frm2200ToptRegion')."frm2200ToptRegion=</div>	
            <div>frm2200ToptProvince=".request('frm2200ToptProvince')."frm2200ToptProvince=</div>	
            <div>frm2200ToptCity=".request('frm2200ToptCity')."frm2200ToptCity=</div>	
            <div>frm2200ToptRegion1=".request('frm2200ToptRegion1')."frm2200ToptRegion1=</div>	
            <div>frm2200ToptProvince1=".request('frm2200ToptProvince1')."frm2200ToptProvince1=</div>	
            <div>frm2200ToptCity1=".request('frm2200ToptCity1')."frm2200ToptCity1=</div>	
            <div>frm2200T:optTreaty_1=".$optTreaty_1."frm2200T:optTreaty_1=</div>	
            <div>frm2200T:optTreaty_2=".$optTreaty_2."frm2200T:optTreaty_2=</div>	
            <div>frm2200T:lstTaxTreaty=".request('frm2200T:lstTaxTreaty')."frm2200T:lstTaxTreaty=</div>	
            <div>frm2200T:chkPymntManner_1=".$chkPymntManner_1."frm2200T:chkPymntManner_1=</div>	
            <div>frm2200T:chkPymntManner_2=".$chkPymntManner_2."frm2200T:chkPymntManner_2=</div>	
            <div>frm2200T:chkPymntManner_3=".$chkPymntManner_3."frm2200T:chkPymntManner_3=</div>	
            <div>frm2200T:txtOthMannerofPymnt=".request('frm2200T:txtOthMannerofPymnt')."frm2200T:txtOthMannerofPymnt=</div>	
            <div>frm2200T:txtTax16=".request('frm2200T:txtTax18')."frm2200T:txtTax16=</div>	
            <div>frm2200T:txtTax17A=".request('frm2200T:txtTax19A')."frm2200T:txtTax17A=</div>	
            <div>frm2200T:txtTax17B=".request('frm2200T:txtTax19B')."frm2200T:txtTax17B=</div>	
            <div>frm2200T:txtTax17C=".request('frm2200T:txtTax19C')."frm2200T:txtTax17C=</div>	
            <div>frm2200T:txtTax18=".request('frm2200T:txtTax20')."frm2200T:txtTax18=</div>	
            <div>frm2200T:txtTax19=".request('frm2200T:txtTax21')."frm2200T:txtTax19=</div>	
            <div>frm2200T:txtTax20=".request('frm2200T:txtTax22')."frm2200T:txtTax20=</div>	
            <div>frm2200T:txtTax21A=".request('frm2200T:txtTax23A')."frm2200T:txtTax21A=</div>	
            <div>frm2200T:txtTax21B=".request('frm2200T:txtTax23B')."frm2200T:txtTax21B=</div>	
            <div>frm2200T:txtTax21C=".request('frm2200T:txtTax23C')."frm2200T:txtTax21C=</div>	
            <div>frm2200T:txtTax21D=".request('frm2200T:txtTax23D')."frm2200T:txtTax21D=</div>	
            <div>frm2200T:txtTax22=".request('frm2200T:txtTax24')."frm2200T:txtTax22=</div>	
            <div>frm2200T:txtTax23A=".request('frm2200T:txtTax25A')."frm2200T:txtTax23A=</div>	
            <div>frm2200T:PayPenalties=".(null !== request('frm2200T:PayPenalties') ? 'true' : 'false')."frm2200T:PayPenalties=</div>	
            <div>frm2200T:txtTax23B=".request('frm2200T:txtTax25B')."frm2200T:txtTax23B=</div>	
            <div>frm2200T:txtTax23C=".request('frm2200T:txtTax25C')."frm2200T:txtTax23C=</div>	
            <div>frm2200T:txtTax24=".request('frm2200T:txtTax26')."frm2200T:txtTax24=</div>	
            <div>frm2200T:txtProExempt0=".request('frm2200T:txtProExempt0')."frm2200T:txtProExempt0=</div>	
            <div>frm2200T:txtProTaxable0=".request('frm2200T:txtProTaxable0')."frm2200T:txtProTaxable0=</div>	
            <div>frm2200T:txtProBasicTaxDue0=".request('frm2200T:txtProBasicTaxDue0')."frm2200T:txtProBasicTaxDue0=</div>	
            <div>frm2200T:txtProExempt1=".request('frm2200T:txtProExempt1')."frm2200T:txtProExempt1=</div>	
            <div>frm2200T:txtProTaxable1=".request('frm2200T:txtProTaxable1')."frm2200T:txtProTaxable1=</div>	
            <div>frm2200T:txtProBasicTaxDue1=".request('frm2200T:txtProBasicTaxDue1')."frm2200T:txtProBasicTaxDue1=</div>	
            <div>frm2200T:txtProExempt2=".request('frm2200T:txtProExempt2')."frm2200T:txtProExempt2=</div>	
            <div>frm2200T:txtProTaxable2=".request('frm2200T:txtProTaxable2')."frm2200T:txtProTaxable2=</div>	
            <div>frm2200T:txtProBasicTaxDue2=".request('frm2200T:txtProBasicTaxDue2')."frm2200T:txtProBasicTaxDue2=</div>	
            <div>frm2200T:txtProExempt3=".request('frm2200T:txtProExempt3')."frm2200T:txtProExempt3=</div>	
            <div>frm2200T:txtProTaxable3=".request('frm2200T:txtProTaxable3')."frm2200T:txtProTaxable3=</div>	
            <div>frm2200T:txtProBasicTaxDue3=".request('frm2200T:txtProBasicTaxDue3')."frm2200T:txtProBasicTaxDue3=</div>	
            <div>frm2200T:txtProExempt4=".request('frm2200T:txtProExempt4')."frm2200T:txtProExempt4=</div>	
            <div>frm2200T:txtProTaxable4=".request('frm2200T:txtProTaxable4')."frm2200T:txtProTaxable4=</div>	
            <div>frm2200T:txtProBasicTaxDue4=".request('frm2200T:txtProBasicTaxDue4')."frm2200T:txtProBasicTaxDue4=</div>	
            <div>frm2200T:txtProExempt5=".request('frm2200T:txtProExempt5')."frm2200T:txtProExempt5=</div>	
            <div>frm2200T:txtProTaxable5=".request('frm2200T:txtProTaxable5')."frm2200T:txtProTaxable5=</div>	
            <div>frm2200T:txtProBasicTaxDue5=".request('frm2200T:txtProBasicTaxDue5')."frm2200T:txtProBasicTaxDue5=</div>	
            <div>frm2200T:txtProExempt6=".request('frm2200T:txtProExempt6')."frm2200T:txtProExempt6=</div>	
            <div>frm2200T:txtProTaxable6=".request('frm2200T:txtProTaxable6')."frm2200T:txtProTaxable6=</div>	
            <div>frm2200T:txtProBasicTaxDue6=".request('frm2200T:txtProBasicTaxDue6')."frm2200T:txtProBasicTaxDue6=</div>	
            <div>frm2200T:txtProExempt7=".request('frm2200T:txtProExempt7')."frm2200T:txtProExempt7=</div>	
            <div>frm2200T:txtProTaxable7=".request('frm2200T:txtProTaxable7')."frm2200T:txtProTaxable7=</div>	
            <div>frm2200T:txtProBasicTaxDue7=".request('frm2200T:txtProBasicTaxDue7')."frm2200T:txtProBasicTaxDue7=</div>	
            <div>frm2200T:txtProExempt8=".request('frm2200T:txtProExempt8')."frm2200T:txtProExempt8=</div>	
            <div>frm2200T:txtProTaxable8=".request('frm2200T:txtProTaxable8')."frm2200T:txtProTaxable8=</div>	
            <div>frm2200T:txtProBasicTaxDue8=".request('frm2200T:txtProBasicTaxDue8')."frm2200T:txtProBasicTaxDue8=</div>	
            <div>frm2200T:txtInsExempt0=".request('frm2200T:txtInsExempt0')."frm2200T:txtInsExempt0=</div>	
            <div>frm2200T:txtInsTaxable0=".request('frm2200T:txtInsTaxable0')."frm2200T:txtInsTaxable0=</div>	
            <div>frm2200T:txtInsBasicTaxDue0=".request('frm2200T:txtInsBasicTaxDue0')."frm2200T:txtInsBasicTaxDue0=</div>	
            <div>frm2200T:txtInsExempt1=".request('frm2200T:txtInsExempt1')."frm2200T:txtInsExempt1=</div>	
            <div>frm2200T:txtInsTaxable1=".request('frm2200T:txtInsTaxable1')."frm2200T:txtInsTaxable1=</div>	
            <div>frm2200T:txtInsBasicTaxDue1=".request('frm2200T:txtInsBasicTaxDue1')."frm2200T:txtInsBasicTaxDue1=</div>	
            <div>frm2200T:txtInsExempt2=".request('frm2200T:txtInsExempt2')."frm2200T:txtInsExempt2=</div>	
            <div>frm2200T:txtInsTaxable2=".request('frm2200T:txtInsTaxable2')."frm2200T:txtInsTaxable2=</div>	
            <div>frm2200T:txtInsBasicTaxDue2=".request('frm2200T:txtInsBasicTaxDue2')."frm2200T:txtInsBasicTaxDue2=</div>	
            <div>frm2200T:txtInsExempt3=".request('frm2200T:txtInsExempt3')."frm2200T:txtInsExempt3=</div>	
            <div>frm2200T:txtInsTaxable3=".request('frm2200T:txtInsTaxable3')."frm2200T:txtInsTaxable3=</div>	
            <div>frm2200T:txtInsBasicTaxDue3=".request('frm2200T:txtInsBasicTaxDue3')."frm2200T:txtInsBasicTaxDue3=</div>	
            <div>frm2200T:txtInsExempt4=".request('frm2200T:txtInsExempt4')."frm2200T:txtInsExempt4=</div>	
            <div>frm2200T:txtInsTaxable4=".request('frm2200T:txtInsTaxable4')."frm2200T:txtInsTaxable4=</div>	
            <div>frm2200T:txtInsBasicTaxDue4=".request('frm2200T:txtInsBasicTaxDue4')."frm2200T:txtInsBasicTaxDue4=</div>	
            <div>frm2200T:txtInsExempt5=".request('frm2200T:txtInsExempt5')."frm2200T:txtInsExempt5=</div>	
            <div>frm2200T:txtInsTaxable5=".request('frm2200T:txtInsTaxable5')."frm2200T:txtInsTaxable5=</div>	
            <div>frm2200T:txtInsBasicTaxDue5=".request('frm2200T:txtInsBasicTaxDue5')."frm2200T:txtInsBasicTaxDue5=</div>	
            <div>frm2200T:sched1Chk0=falsefrm2200T:sched1Chk0=</div>	
            <div>frm2200T:txtsched1Atc0=".request('frm2200T:txtsched1Atc')[0]."frm2200T:txtsched1Atc0=</div>	
            <div>frm2200T:txtsched1Desc0=".request('frm2200T:txtsched1Desc0')."frm2200T:txtsched1Desc0=</div>	
            <div>frm2200T:txtsched1TaxBracket0=".request('frm2200T:txtsched1TaxBracket0')."frm2200T:txtsched1TaxBracket0=</div>	
            <div>frm2200T:txtsched1AppTaxRate0=".request('frm2200T:txtsched1AppTaxRate0')."frm2200T:txtsched1AppTaxRate0=</div>	
            <div>frm2200T:txtsched1Exempt0=".request('frm2200T:txtsched1Exempt0')."frm2200T:txtsched1Exempt0=</div>	
            <div>frm2200T:txtsched1Taxable0=".request('frm2200T:txtsched1Taxable0')."frm2200T:txtsched1Taxable0=</div>	
            <div>frm2200T:txtsched1BasicTaxDue0=".request('frm2200T:txtsched1BasicTaxDue0')."frm2200T:txtsched1BasicTaxDue0=</div>	
            ".$xml_schedules."<div>frm2200T:totalTaxDue=".request('frm2200T:totalTaxDue')."frm2200T:totalTaxDue=</div>	
            <div>frm2200T:txtmodalCalculatorXT35DateComputed=".request('frm2200T:txtmodalCalculatorXT35DateComputed')."frm2200T:txtmodalCalculatorXT35DateComputed=</div>	
            <div>frm2200T:txtmodalCalculatorXT36DateComputed=".request('frm2200T:txtmodalCalculatorXT36DateComputed')."frm2200T:txtmodalCalculatorXT36DateComputed=</div>	
            <div>frm2200T:txtmodalCalculatorXT40DateComputed=".request('frm2200T:txtmodalCalculatorXT40DateComputed')."frm2200T:txtmodalCalculatorXT40DateComputed=</div>	
            <div>frm2200T:txtmodalCalculatorXT140DateComputed=".request('frm2200T:txtmodalCalculatorXT140DateComputed')."frm2200T:txtmodalCalculatorXT140DateComputed=</div>	
            <div>frm2200T:txtmodalCalculatorXT150DateComputed=".request('frm2200T:txtmodalCalculatorXT150DateComputed')."frm2200T:txtmodalCalculatorXT150DateComputed=</div>	
            <div>frm2200T:txtCtrmodalCalculatorXT35=".request('calculatorXT35ModalLayout()')."frm2200T:txtCtrmodalCalculatorXT35=</div>	
            <div>frm2200T:txtCtrmodalCalculatorXT36=".request('calculatorXT36ModalLayout()')."frm2200T:txtCtrmodalCalculatorXT36=</div>	
            <div>frm2200T:txtCtrmodalCalculatorXT40=".request('calculatorXT40ModalLayout()')."frm2200T:txtCtrmodalCalculatorXT40=</div>	
            <div>frm2200T:txtCtrmodalCalculatorXT140=".request('calculatorXT140ModalLayout()')."frm2200T:txtCtrmodalCalculatorXT140=</div>	
            <div>frm2200T:txtCtrmodalCalculatorXT150=".request('calculatorXT150ModalLayout()')."frm2200T:txtCtrmodalCalculatorXT150=</div>	
            <div>frm2200T:chkXT35SelectAll=".(null !== request('frm2200T:chkXT35SelectAll') ? 'true' : 'false')."frm2200T:chkXT35SelectAll=</div>	
            ".$xml_calculator1."<div>frm2200T:txtXT35Total=".request('frm2200T:txtXT35Total')."frm2200T:txtXT35Total=</div>	
            <div>frm2200T:chkXT36SelectAll=".(null !== request('frm2200T:chkXT36SelectAll') ? 'true' : 'false')."frm2200T:chkXT36SelectAll=</div>	
            ".$xml_calculator2."<div>frm2200T:txtXT36Total=".request('frm2200T:txtXT36Total')."frm2200T:txtXT36Total=</div>	
            <div>frm2200T:chkXT40SelectAll=".(null !== request('frm2200T:chkXT40SelectAll') ? 'true' : 'false')."frm2200T:chkXT40SelectAll=</div>	
            ".$xml_calculator3."<div>frm2200T:txtXT40Total=".request('frm2200T:txtXT40Total')."frm2200T:txtXT40Total=</div>	
            <div>frm2200T:chkXT140SelectAll=".(null !== request('frm2200T:chkXT140SelectAll') ? 'true' : 'false')."frm2200T:chkXT140SelectAll=</div>	
            ".$xml_calculator4."<div>frm2200T:txtXT140Total=".request('frm2200T:txtXT140Total')."frm2200T:txtXT140Total=</div>	
            <div>frm2200T:chkXT150SelectAll=".(null !== request('frm2200T:chkXT150SelectAll') ? 'true' : 'false')."frm2200T:chkXT150SelectAll=</div>	
            ".$xml_calculator5."<div>frm2200T:txtXT150Total=".request('frm2200T:txtXT150Total')."frm2200T:txtXT150Total=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            <div>driveSelectTPExport=0driveSelectTPExport=</div>	
            	
            All Rights Reserved BIR 2014.";

        $tin = request('frm2200T:txtTIN1').request('frm2200T:txtTIN2').request('frm2200T:txtTIN3').request('frm2200T:txtBranchCode');
    		
    	$returnPeriod = request('frm2200T:txtMonth1')."/".request('frm2200T:txtDate')."/".request('frm2200T:txtForYr')." ".date('H:i:s');

    	$xmlReturnPeriod = request('frm2200T:txtMonth1').request('frm2200T:txtDate').request('frm2200T:txtForYr').date('His');

        $filename = $tin."-2200T-".$xmlReturnPeriod.'.xml';

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
	     		'form'			=> '2200T',
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
     						->where('form', '2200T')
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
                            ->where('form', '2200T')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_2200T::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '2200T')
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
        $data = tbl_2200T::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '2200T')
                            ->get();
        
        return view('forms.BIR-Form 2200T',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}

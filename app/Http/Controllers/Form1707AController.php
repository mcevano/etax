<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1707A;
use App\tbl_1707A_schedule1;
use App\tbl_1707A_schedule2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1707AController extends Controller
{
    public function index($company,$action,$form_id)
    {
        $company = Companies::find($company);
        
        \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1707_as')){

            }else{
               Schema::connection('mysql2')->create('tbl_1707_as', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('form_no');
                    $table->integer('company_id');
                    $table->string('item1A')->nullable();
                    $table->string('item1B')->nullable();
                    $table->string('item1C')->nullable();
                    $table->string('item1D')->nullable();
                    $table->string('item2');
                    $table->string('item3')->nullable();
                    $table->string('item4')->nullable();
                    $table->string('item11')->nullable();
                    $table->string('item11A')->nullable();
                    $table->text('item12');
                    $table->text('item13');
                    $table->text('item14');
                    $table->text('item15');
                    $table->text('item16A');
                    $table->text('item16B');
                    $table->text('item16C');
                    $table->text('item17');
                    $table->text('item18A');
                    $table->text('item18B');
                    $table->text('item18C');
                    $table->text('item18D');
                    $table->text('item19');
                    $table->text('overpayment');
                    $table->text('sched1_total20A');
                    $table->text('sched1_total20B');
                    $table->text('sched1_total20C');
                    $table->text('sched1_total20D');
                    $table->text('sched2_total21A');
                    $table->text('sched2_total21B');
                    $table->text('sched2_total21C');
                    $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1707_a_schedule1s', function (Blueprint $table) {
                     $table->increments('id');
                     $table->integer('form_id');
                     $table->text('date_transaction')->nullable();
                     $table->text('stock')->nullable();
                     $table->text('price');
                     $table->text('cost');
                     $table->text('gains');
                     $table->text('paid');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1707_a_schedule2s', function (Blueprint $table) {
                     $table->increments('id');
                     $table->integer('form_id');
                     $table->text('date_transaction')->nullable();
                     $table->text('stock')->nullable();
                     $table->text('price');
                     $table->text('cost');
                     $table->text('loss');
                     $table->timestamps();
                });

            }
           
	        return view('forms.BIR-Form 1707A',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{
        	$data = tbl_1707A::find($form_id);
            $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1707A')
                            ->get();
            return view('forms.BIR-Form 1707A',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }

    public function store(){
        
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);

        $data = ([
            'form_no'   => request('form_no'),
            'company_id'   => request('company'),
            'item1A'   => request('frm1707A:rdoYearEnded'),
            'item1B'   => request('frm1707A:txtI1YearEndMonth'),
            'item1C'   => request('frm1707A:txtI1YearEndDay'),
            'item1D'   => request('frm1707A:txtI1YearEndYear'),
            'item2'   => request('frm1707A:rdoAmended'),
            'item3'   => request('frm1707A:txtI3Sheets'),
            'item4'   => null !== request('frm1707A:ATC') ? request('frm1707A:ATC') : '',
            'item11'   => request('frm1707A:rdoI11TaxTreaty'),
            'item11A'   => request('frm1707A:txtI11ASpecify'),
            'item12'   => request('frm1707A:txtI12TotalCapitalGains'),
            'item13'   => request('frm1707A:txtI13TotalCapitalLoss'),
            'item14'   => request('frm1707A:txtI14NetCapitalGainLoss'),
            'item15'   => request('frm1707A:txtI15TaxDue'),
            'item16A'   => request('frm1707A:txtI16ATotalTaxPaid'),
            'item16B'   => request('frm1707A:txtI16BTotalTaxPaid'),
            'item16C'   => request('frm1707A:txtI16CTotalTaxPaid'),
            'item17'   => request('frm1707A:txtI17TaxStillPayable'),
            'item18A'   => request('frm1707A:txtI18ASurcharge'),
            'item18B'   => request('frm1707A:txtI18BInterest'),
            'item18C'   => request('frm1707A:txtI18CCompromise'),
            'item18D'   => request('frm1707A:txtI18DPenalties'),
            'item19'   => request('frm1707A:txtI19TotalAmountPayable'),
            'overpayment'   => null !== request('frm1707A:rdoI19Overpayment') ? request('frm1707A:rdoI19Overpayment') : '',
            'sched1_total20A'   => request('frm1707A:txtS1I20TotalSellingPrice'),
            'sched1_total20B'   => request('frm1707A:txtS1I20TotalCost'),
            'sched1_total20C'   => request('frm1707A:txtS1I20TotalCapitalGains'),
            'sched2_total20D'   => request('frm1707A:txtS1I20TotalTaxPaid'),
            'sched2_total21A'   => request('frm1707A:txtS2I21TotalSellingPrice'),
            'sched2_total21B'   => request('frm1707A:txtS2I21TotalCost'),
            'sched2_total21C'   => request('frm1707A:txtS2I21TotalCapitalLoss'),
        ]);

        $getForm = tbl_1707A::where('form_no', request('form_no'))
                                   ->where('company_id', request('company'))->get();
        $trans = "";
        $form = "";
        if(request('form_id') != ""){
                $form = tbl_1707A::find(request('form_id'));
                $form->update($data);
                $trans = "update";
        }else{
                if($getForm->isEmpty()){
                    $form = tbl_1707A::create($data);
                }else{
                    $form = tbl_1707A::find($getForm[0]->id);
                    $form->update($data);
                    $trans = "update";
                }
        }

        for ($i=1; $i < 8 ; $i++) { 
            if(request('frm1707A:txtS1C1DateOfTransactionI'.$i.'') != ''){
                $schedule1 = ([
                    'form_id'  => $form->id,
                    'date_transaction'  => request('frm1707A:txtS1C1DateOfTransactionI'.$i.''),
                    'stock'  => request('frm1707A:txtS1C2NameOfCorporateStockI'.$i.''),
                    'price'  => request('frm1707A:txtS1C3SellingPriceI'.$i.''),
                    'cost'  => request('frm1707A:txtS1C4CostI'.$i.''),
                    'gains'  => request('frm1707A:txtS1C5CapitalGainsI'.$i.''),
                    'paid'  => request('frm1707A:txtS1C6TaxPaidI'.$i.''),
                ]);
                tbl_1707A_schedule1::create($schedule1);
            }
        }

        for ($y=1; $y < 4; $y++) { 
            if(request('frm1707A:txtS2C1DateOfTransactionI'.$y.'') != ''){
                $schedule2 = ([
                    'form_id'  => $form->id,
                    'date_transaction'  => request('frm1707A:txtS2C1DateOfTransactionI'.$y.''),
                    'stock'  => request('frm1707A:txtS2C2NameOfCorporateStockI'.$y.''),
                    'price'  => request('frm1707A:txtS2C3SellingPriceI'.$y.''),
                    'cost'  => request('frm1707A:txtS2C4CostI'.$y.''),
                    'loss'  => request('frm1707A:txtS2C5CapitalLossI'.$y.''),
                ]);
                tbl_1707A_schedule2::create($schedule2);
            }
        }
    }

    public function saveXML()
    {
            config(['database.connections.mysql2.database' => Auth::user()->database_name]);

            $getForm = tbl_1707A::where('form_no', request('form_no'))
                                   ->where('company_id', request('company'))->get();

            $form = "";
            if(request('form_id') != ""){
                $form = tbl_1707A::find(request('form_id'));
            }else{
                $form = tbl_1707A::find($getForm[0]->id);
            }

            $tin = request('tin');

            $return_period = request('item1B').'/'.request('item1C').'/'.request('item1D');

            $getReturnPeriod = tbl_1707A::where('company_id',  request('company'))
                            ->where('item1B', request('item1B'))
                            ->where('item1C', request('item1C'))
                            ->where('item1D', request('item1D'))
                            ->count();

            $filename = "";
            if($getReturnPeriod == "1"){
                $filename = $tin."-1707A-".request('item1B').request('item1C').request('item1D').'.xml';
            }else{
                if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1707A')
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
                $filename = $tin."-1707A-".request('item1B').request('item1C').request('item1D').$ext.'.xml';
            }

            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1707A')
                            ->get();

            $action = "";
            if(request('form_id') != ""){
                $action ="update";
            }else{
                if($getXml->isEmpty()){
                    $action = "insert";
                }else{
                    $action = "update";
                }
            }  

            $xmlData = "<?xml version='1.0'?>    
                ".str_replace('\n', '',request('xml'));

            if($action == "insert"){
                $myXMLFile = fopen("savefile/".$filename, "w");
                fwrite($myXMLFile, $xmlData);
                fclose($myXMLFile);

                $data_xml = ([
                    'user_id'       => Auth::user()->id,
                    'company_id'    => request('company'),
                    'form_id'       => $form->id,
                    'form'          => '1707A',
                    'file_name'     => $filename,
                    'return_period' => $return_period,
                    'status'        => 'Saved',
                ]);

                $xml_id = Xml::create($data_xml);

            }else{
                
                $path = "savefile/".$getXml[0]->file_name;
                if (file_exists($path)) {
                    unlink($path);
                }

                $myXMLFile = fopen("savefile/".$filename, "w");
                fwrite($myXMLFile, $xmlData);
                fclose($myXMLFile);

                $data_xml = ([
                    'user_id'       => Auth::user()->id,
                    'company_id'    => request('company'),
                    'form_id'       => $form->id,
                    'form'          => '1707A',
                    'file_name'     => $getXml[0]->file_name,
                    'return_period' => $return_period,
                    'status'        => 'Saved',
                ]);
                
                $xml = Xml::find($getXml[0]->id);
                $xml->update($data_xml);
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
                            ->where('form', '1707A')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1707A::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1707A')
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

        $data = tbl_1707A::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', $company->id)
                            ->where('form_id', $form_id)
                            ->where('form', '1707A')
                            ->get();
        return view('forms.BIR-Form 1707A',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }

}

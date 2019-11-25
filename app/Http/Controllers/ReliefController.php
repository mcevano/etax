<?php

namespace App\Http\Controllers;

use Response;
use Session;
use App\Rdo;
use App\Companies;
use App\Reliefs;
use App\tbl_sales;
use App\tbl_purchases;
use App\tbl_importations;
use App\Classes\ReliefClass;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Maatwebsite\Excel\Facades\Excel;

class ReliefController extends Controller
{   

    public function index($company,$type)
    {
        $getCompany = Companies::find($company);

        $files = Reliefs::where('user_id', Auth::user()->id)
                            ->where('company_id', $company)
                            ->where('type', $type)
                            ->get();

        return view('relief.index', ['company' => $getCompany, 'type' => $type, 'files' => $files,]); 
    }
    public function download($type)
    {
        if($type == 'sale'){
            $file = public_path()."/bir/Sales.xlsx";
            $file_name = 'Sales.xlsx';
        }else if($type == 'purchases'){
            $file = public_path()."/bir/Purchases.xlsx";
            $file_name = 'Purchases.xlsx';
        }else{
            $file = public_path()."/bir/Importations.xlsx";
            $file_name = 'Importations.xlsx';
        }
        return Response::download($file,$file_name);
        
    }
    public function download_dat($file)
    {

        $path = public_path()."/relief/".$file;
        return Response::download($path,$file);
    }
    public function download_excel($company,$file_id,$filename)
    {
        
        $getCompany = Companies::find($company);
        $relief = Reliefs::find($file_id);
     
        Excel::load(storage_path()."/app/relief/".$relief->excel_file, function($file) use($getCompany,$relief)  {
            $sheet = $file->getActiveSheet();

            $sheet->setCellValue('B6', $getCompany->tin1.$getCompany->tin2.$getCompany->tin3);
            $sheet->setCellValue('B7',($getCompany->registered_name == '' ?  $getCompany->lastname.','.$getCompany->firstname.' '.$getCompany->middlename : $getCompany->registered_name));

            if($relief->type != 'importations'){
                $sheet->setCellValue('B9', $getCompany->address);
            }else{
                $sheet->setCellValue('B8', $getCompany->address);
            }

        })
        ->setFilename(substr($filename, 0, -4))
        ->export('xlsx');
        
    }
    public function show($company, $type, $id)
    {
        if (Auth::check()) {
            config(['database.connections.mysql2.database' => Auth::user()->database_name]);
            $getCompany = Companies::find($company);
            if($type == "sales"){
                $data = tbl_sales::where('data_id', $id)
                                ->where('company_id', $company)
                                ->get();
            }else if($type == "purchase"){
                $data = tbl_purchases::where('data_id', $id)
                                ->where('company_id', $company)
                                ->get();
            }else if($type == "importations"){
                $data = tbl_importations::where('data_id', $id)
                                ->where('company_id', $company)
                                ->get();
            }

            return view('relief.show', ['company' => $getCompany, 'type' => $type, 'data' => $data,]); 
        }else{
            return abort(404);
        }
    }
    public function sales_form($company)
    {	
    	$rdo = Rdo::all();
    	$company = Companies::find($company);

        if (Auth::check()) {
            \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

            if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_sales')){

            }else{
                Schema::connection('mysql2')->create('tbl_sales', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('data_id');
                    $table->integer('company_id');
                    $table->string('tin')->nullable();
                    $table->string('reg_name')->nullable();
                    $table->string('lastname')->nullable();
                    $table->string('firstname')->nullable();
                    $table->string('middlename')->nullable();
                    $table->string('address')->nullable();
                    $table->text('gross_sales')->nullable();
                    $table->text('exempt')->nullable();
                    $table->text('zero_rated')->nullable();
                    $table->text('taxable_sales')->nullable();
                    $table->text('output_tax')->nullable();
                    $table->text('gross_taxable_sales')->nullable();
                    $table->timestamps();
                });
            }

            return view('relief.sales', ['company' => $company, 'rdo' => $rdo ]);
        }else{
            return abort(404);
        }
    }
    public function sale(Request $request, $company)
    {
        if (Auth::check()) {
            config(['database.connections.mysql2.database' => Auth::user()->database_name]);
            
            $input = $request->all();

            $validated = request()->validate([
                'date'      => ['required'],
                'fiscal'    => ['required'],
                'excel'     => ['required'],
            ]);

            $path = request()->file('excel')->getRealPath();
            
            $excel = new ReliefClass();
            
            if(!empty($path)){
                
                $excel_path = request()->file('excel')->store('relief');

                $excel_data = $this->reader('Sales',$path);
               
                if(!empty($excel_data[0])){
                    $file = $excel->convert_sales($company,$input, $excel_data);
                    $data = ([
                        'user_id'       => Auth::user()->id,
                        'company_id'    => $company,
                        'file_name'     => $file,
                        'ext'           => date('m/Y',strtotime($validated['date'])),
                        'date'          => $validated['date'],
                        'fiscal'        => $validated['fiscal'],
                        'excel_file'    => basename($excel_path),
                        'type'          => 'sales',
                    ]);

                    $id = Reliefs::create($data);

                    foreach ($excel_data as $each) {
                        $data1 = ([
                            'data_id'       => $id->id,
                            'company_id'    => $company,
                            'tin'           => isset($each['tin']) ? $each['tin'] : '',
                            'reg_name'      => isset($each['reg_name']) ? $each['reg_name'] : '',
                            'lastname'      => isset($each['lastname']) ? $each['lastname'] : '',
                            'firstname'     => isset($each['firstname']) ? $each['firstname'] : '',
                            'middlename'    => isset($each['middlename']) ? $each['middlename'] : '',
                            'address'        => isset($each['address']) ? $each['address'] : '',
                            'gross_sales'   => isset($each['gross_sales']) ? $each['gross_sales'] : '',
                            'exempt'        => isset($each['exempt']) ? $each['exempt'] : '',
                            'zero_rated'    => isset($each['zero_rated']) ? $each['zero_rated'] : '',
                            'taxable_sales'    => isset($each['taxable_sales']) ? $each['taxable_sales'] : '',
                            'output_tax'       => isset($each['output_tax']) ? $each['output_tax'] : '',
                            'gross_taxable_sales'     => isset($each['gross_taxable_sales']) ? $each['gross_taxable_sales'] : '',
                        ]);

                        tbl_sales::create($data1);
                    }
                    exit;
                }else{
                    return redirect('/relief/'.$company.'/sales')->with('warning', "Sorry it seems that you uploaded an empty file.Please follow the format.");
                }
            }
        }else{
            return abort(404);
        }
    }
    public function purchase_form($company)
    {
        $company = Companies::find($company);

        if (Auth::check()) {

            \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

            if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_purchases')){

            }else{
                Schema::connection('mysql2')->create('tbl_purchases', function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('data_id');
                    $table->integer('company_id');
                    $table->string('tin')->nullable();
                    $table->string('reg_name')->nullable();
                    $table->string('lastname')->nullable();
                    $table->string('firstname')->nullable();
                    $table->string('middlename')->nullable();
                    $table->string('address')->nullable();
                    $table->string('city')->nullable();
                    $table->text('gross_purchase')->nullable();
                    $table->text('exempt_purchase')->nullable();
                    $table->text('zero_rated')->nullable();
                    $table->text('taxable_purchase')->nullable();
                    $table->text('services')->nullable();
                    $table->text('capital_goods')->nullable();
                    $table->text('other_goods')->nullable();
                    $table->text('input_tax')->nullable();
                    $table->text('gross_taxable_purchase')->nullable();
                    $table->timestamps();
                });
            }

            return view('relief.purchase', ['company' => $company]);
        }else{
            return abort(404);
        }
    }
    public function purchase(Request $request, $company)
    {
        if (Auth::check()) {
            config(['database.connections.mysql2.database' => Auth::user()->database_name]);
            $input = $request->all();
            $excel_path = request()->file('excel')->store('relief');

            $validated = request()->validate([
                'date'      => ['required'],
                'fiscal'    => ['required'],
                'excel'     => ['required'],
            ]);

            $path = request()->file('excel')->getRealPath();

            $excel = new ReliefClass();

            if(!empty($path)){
                $excel_data = $this->reader('Purchase',$path);

                if(!empty($excel_data[0])){
                    $file = $excel->convert_purchase($company,$input, $excel_data);
                    
                    $data = ([
                        'user_id'       => Auth::user()->id,
                        'company_id'    => $company,
                        'file_name'     => $file,
                        'date'          => $validated['date'],
                        'ext'           => date('m/Y',strtotime($validated['date'])),
                        'fiscal'        => $validated['fiscal'],
                        'excel_file'    => basename($excel_path),
                        'creditable'    => request('creditable'),
                        'non_creditable'    => request('non-creditable'),
                        'type'          => 'purchase',
                    ]);
                    
                    $id = Reliefs::create($data);

                    foreach ($excel_data as $each) {
                        $data1 = ([
                            'data_id'       => $id->id,
                            'company_id'    => $company,
                            'tin'           => isset($each['tin']) ? $each['tin'] : '',
                            'reg_name'      => isset($each['reg_name']) ? $each['reg_name'] : '',
                            'lastname'      => isset($each['lastname']) ? $each['lastname'] : '',
                            'firstname'     => isset($each['firstname']) ? $each['firstname'] : '',
                            'middlename'    => isset($each['middlename']) ? $each['middlename'] : '',
                            'address'        => isset($each['address']) ? $each['address'] : '',
                            'city'          => isset($each['city']) ? $each['city'] : '',
                            'gross_purchase'     => isset($each['gross_purchase']) ? $each['gross_purchase'] : '',
                            'exempt_purchase'      => isset($each['exempt_purchase']) ? $each['exempt_purchase'] : '',
                            'zero_rated'    => isset($each['zero_rated']) ? $each['zero_rated'] : '',
                            'taxable_purchase'        => isset($each['taxable_purchase']) ? $each['taxable_purchase'] : '',
                            'services'        => isset($each['services']) ? $each['services'] : '',
                            'capital_goods'       => isset($each['capital_goods']) ? $each['capital_goods'] : '',
                            'other_goods'   => isset($each['other_goods']) ? $each['other_goods'] : '',
                            'input_tax'     => isset($each['input_tax']) ? $each['input_tax'] : '',
                            'gross_taxable_purchase'     => isset($each['gross_taxable_purchase']) ? $each['gross_taxable_purchase'] : '',
                        ]);

                        tbl_purchases::create($data1);
                    }

                    exit;
                }else{
                    return redirect('/relief/'.$company.'/purchase')->with('warning', "Sorry it seems that you uploaded an empty file.Please follow the format.");
                }

            }
        }else{
            return abort(404);
        }
    }
    public function importations_form($company)
    {
        $rdo = Rdo::all();
        $company = Companies::find($company);

        if (Auth::check()) {
            \Config::set('database.connections.mysql2.database',Auth::user()->database_name);

            if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_importations')){

            }else{
                    Schema::connection('mysql2')->create('tbl_importations', function (Blueprint $table) {
                        $table->increments('id');
                        $table->integer('data_id');
                        $table->integer('company_id');
                        $table->string('entry_no')->nullable();
                        $table->string('release_date')->nullable();
                        $table->string('seller_name')->nullable();
                        $table->string('import_date')->nullable();
                        $table->string('country_origin')->nullable();
                        $table->string('landed_cost')->nullable();
                        $table->string('dutiable_value')->nullable();
                        $table->string('charges_before_custom')->nullable();
                        $table->text('taxable_imports')->nullable();
                        $table->string('exempt')->nullable();
                        $table->text('vat')->nullable();
                        $table->text('or_number')->nullable();
                        $table->text('vat_date')->nullable();
                        $table->timestamps();
                    });
            }
            return view('relief.importations', ['company' => $company, 'rdo' => $rdo ]);
        }else{
            return abort(404);
        }
    }
    public function importations(Request $request, $company)
    {
        if (Auth::check()) {
            config(['database.connections.mysql2.database' => Auth::user()->database_name]);
            $input = $request->all();
            $excel_path = request()->file('excel')->store('relief');

            $validated = request()->validate([
                'date'      => ['required'],
                'fiscal'    => ['required'],
                'excel'     => ['required'],
            ]);

            $path = request()->file('excel')->getRealPath();
            $excel = new ReliefClass();

            if(!empty($path)){
                $excel_data = $this->reader('Importations',$path);
                if($excel_data != ""){
                    $file = $excel->convert_importations($company, $input, $excel_data);
                
                    $data = ([
                        'user_id'       => Auth::user()->id,
                        'company_id'    => $company,
                        'file_name'     => $file,
                        'date'          => $validated['date'],
                        'ext'           => date('m/Y',strtotime($validated['date'])),
                        'excel_file'    => basename($excel_path),
                        'fiscal'        => $validated['fiscal'],
                        'type'          => 'importations',
                    ]);

                    $id = Reliefs::create($data);

                    foreach ($excel_data as $each) {
                        $data1 = ([
                            'data_id'       => $id->id,
                            'company_id'    => $company,
                            'entry_no'      =>isset( $each['entry_no']) ?  $each['entry_no'] : '',
                            'release_date'   => isset($each['release_date']) ? $each['release_date'] : '',
                            'seller_name'    => isset($each['seller_name']) ? $each['seller_name'] : '',
                            'import_date'    => isset($each['import_date']) ? $each['import_date'] : '',
                            'country_origin' => isset($each['country_origin']) ? $each['country_origin'] : '',
                            'landed_cost'    => isset($each['landed_cost']) ? $each['landed_cost'] : '',
                            'dutiable_value' => isset($each['dutiable_value']) ? $each['dutiable_value'] : '',
                            'charges_before_custom' => isset($each['charges_before_custom']) ? $each['charges_before_custom'] : '',
                            'taxable_imports' => isset($each['taxable_imports']) ? $each['taxable_imports'] : '',
                            'exempt'        => isset($each['exempt']) ? $each['exempt'] : '',
                            'vat'           => isset($each['vat']) ? $each['vat'] : '',
                            'or_number'     => isset($each['or_number']) ? $each['or_number'] : '',
                            'vat_date'      => isset($each['vat_date']) ? $each['vat_date'] :'',
                        ]);
                        tbl_importations::create($data1);
                    }
                    exit;
                }else{
                     return redirect('/relief/'.$company.'/importations')->with('warning', "Sorry it seems that you uploaded an empty file.Please follow the format.");
                }
            }
        }else{
            return abort(404);
        }
    }
    public function reader($type,$path)
    {
        if($type == 'Sales'){
            $read = Excel::load($path, function ($reader) {
                $reader->noHeading();
                $reader->skipRows(13);
            })->get();

            $value = [];
            $sales = [];

            
            foreach ($read as $row){
                
                if($row[0] != 'Grand Total :' && $row[0] != 'END OF REPORT' && $row[0] != ''){
                    $value['tin'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['1'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['1']) : '';
                    $value['reg_name'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['2'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['2']) : '';
                    $value['lastname'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['3'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['3']) : '';
                    $value['firstname'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['4'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['4']) : '';
                    $value['middlename'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['5'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['5']) : '';
                    $value['address'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['6'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['6']) : '';
                    $value['gross_sales'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['7'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['7']) : '';
                    $value['exempt'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['8'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['8']) : '';
                    $value['zero_rated'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['9'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['9']) : '';
                    $value['taxable_sales'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['10'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['10']) : '';
                    $value['output_tax'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['11'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['11']) : '';
                    $value['gross_taxable_sales'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['12'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['12']) : '';

                    $sales[] = $value;
                }
            }
            $data = $sales;
            return $data;
        }else if($type == 'Purchase'){
            $read = Excel::load($path, function ($reader) {
                $reader->noHeading();
                $reader->skipRows(13);
            })->get();
            $value = [];
            $purchase = [];
            foreach ($read as $row){
                if($row[0] != 'Grand Total :' && $row[0] != 'END OF REPORT' && $row[0] != ''){
                    $value['tin'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['1'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['1']) : '';
                    $value['reg_name'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['2'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['2']) : '';
                    $value['lastname'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['3'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['3']) : '';
                    $value['firstname'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['4'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['4']) : '';
                    $value['middlename'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['5'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['5']) : '';
                    $value['address'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['6'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['6']) : '';
                    $value['city'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['7'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['7']) : '';
                    $value['gross_purchase'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['8'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['8']) : '';
                    $value['exempt_purchase'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['9'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['9']) : '';
                    $value['zero_rated'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['10'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['10']) : '';
                    $value['taxable_purchase'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['11'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['11']) : '';
                    $value['services'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['12'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['12']) : '';
                    $value['capital_goods'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['13'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['13']) : '';
                    $value['other_goods'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['14'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['14']) : '';
                    $value['input_tax'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['15'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['15']) : '';
                    $value['gross_taxable_purchase'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['16'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['16']) : '';

                    $purchase[] = $value;
                }
                
            }

            $data = $purchase;
            return $data;
        }else if($type == 'Importations'){
            $read = Excel::load($path, function ($reader) {
                $reader->noHeading();
                $reader->skipRows(12);
            })->get();

            $value = [];
            $importation = [];

            foreach ($read as $row){
                if($row[0] != 'Grand Total :' && $row[0] != 'END OF REPORT' && $row[0] != ''){
                    $value['entry_no'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['1'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['1']) : '';
                    $value['release_date'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['2'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['2']) : '';
                    $value['seller_name'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['3'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['3']) : '';
                    $value['import_date'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['4'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['4']) : '';
                    $value['country_origin'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['5'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['5']) : '';
                    $value['landed_cost'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['6'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['6']) : '';
                    $value['dutiable_value'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['7'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['7']) : '';
                    $value['charges_before_custom'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['8'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['8']) : '';
                    $value['taxable_imports'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['9'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['9']) : '';
                    $value['exempt'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['10'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['10']) : '';
                    $value['vat'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['11'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['11']) : '';
                    $value['or_number'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['12'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['12']) : '';
                    $value['vat_date'] = is_string(iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['13'])) ? iconv("ISO-8859-15", "ASCII//TRANSLIT", $row['13']) : '';
                    
                    $importation[] = $value;
                }
                
            }

            $data = $importation;
            return $data;
        }
    }
}

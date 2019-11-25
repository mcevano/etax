<?php 
namespace App\Classes;
use Illuminate\Support\Facades\DB;

class ReliefClass {
	
	function convert_sales($company,$input, $data)
	{
		if(!empty($data)){
			$excel_data = $data;
			foreach ($excel_data as $key => $value) {
	           $sheet_data[$key] = (array)$value;
	        }
	       	
	        $sanitize_sales = $this->sanitize_sales($sheet_data);
	        $header = $this->sales_header($input);
	       	$file = $this->datfile($company,$header,$sanitize_sales);
	       	return $file;
		}
	}

	private function sanitize_sales($data)
	{
		
		$cdata = [];
		
		for ($i=0; $i <= count($data) - 1; $i++) {
			$cdata['tin'] = sprintf("%'09d", preg_replace('/[^0-9]/', '', isset($data[$i]['tin']) ? $data[$i]['tin'] : ''));
			$cdata['reg_name'] = preg_replace('/[^a-zA-Z0-9\s]/','',isset($data[$i]['reg_name']) ? $data[$i]['reg_name'] : '');
			$cdata['lastname'] = preg_replace('/[^a-zA-Z0-9\s]/', '', isset($data[$i]['lastname']) ? $data[$i]['lastname'] : '');
			$cdata['firstname'] = preg_replace('/[^a-zA-Z0-9\s]/', '', isset($data[$i]['firstname']) ? $data[$i]['firstname'] : '');
			$cdata['middlename'] = preg_replace('/[^a-zA-Z0-9\s]/', '', isset($data[$i]['middlename']) ? $data[$i]['middlename'] : '');
			$cdata['address'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', isset($data[$i]['address']) ? $data[$i]['address'] : '');
			$cdata['gross_sales'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.]/', '', isset($data[$i]['gross_sales']) ? $data[$i]['gross_sales'] : '')), 2, '.', '');
			$cdata['exempt'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.]/', '', isset($data[$i]['exempt']) ? $data[$i]['exempt'] : '')), 2, '.', '');
			$cdata['zero_rated'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['zero_rated']) ? $data[$i]['zero_rated'] : '')), 2, '.', '');
			$cdata['taxable_sales'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['taxable_sales']) ? $data[$i]['taxable_sales'] : '')), 2, '.', '');
			$cdata['output_tax'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['output_tax']) ? $data[$i]['output_tax'] : '')), 2, '.', '');
			$cdata['gross_taxable_sales'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['gross_taxable_sales']) ? $data[$i]['gross_taxable_sales'] : '')), 2, '.', '');
			$sales[$i] = $cdata;
		}
		$sales = !empty($sales) ? $sales : null;
		return $sales;
	}
	private function sales_header($data)
	{
		
		$cdata['date'] =  date('m/d/Y',strtotime($data['date']));
		$cdata['fiscal'] =  preg_replace('/[^0-9]/', '', $data['fiscal']);
		$cdata['tin'] = sprintf("%'09d", preg_replace('/[^0-9]/', '', $data['tin']));
		$cdata['rdo'] = sprintf("%'03d", preg_replace('/[^0-9]/', '', $data['rdo']));
		$cdata['reg_name'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['registered_name']);
		$cdata['lastname'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['lastname']);
		$cdata['firstname'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['firstname']);
		$cdata['middlename'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['middlename']);
		$cdata['tradename'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['business_line']);
		$cdata['substreet'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['substreet']);
		$cdata['street'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['street']);
		$cdata['brgy'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['barangay']);
		$cdata['district'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['district']);
		$cdata['city'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['city']);
		$cdata['zip_code'] = preg_replace('/[^0-9]/', '', $data['zip_code']);
		$cdata['type'] = preg_replace('/[^a-zA-Z]/', '', $data['type']);

		return $cdata;
	}
	public function convert_purchase($company, $input, $data)
    {
        if(!empty($data)){
			
			$excel_data = $data;
			
			foreach ($excel_data as $key => $value) {
	           $sheet_data[$key] = (array)$value;
	        }
	       
	        $sanitize_purchase = $this->sanitize_purchase($sheet_data);
	        $header = $this->purchase_header($input);
	        $file = $this->datfile($company,$header,$sanitize_purchase);
	        return $file;
	      	
		}
    }
    private function sanitize_purchase($data)
    {
    	$cdata = [];
		
		for ($i=0; $i <= count($data) - 1; $i++) {
			$cdata['tin'] = sprintf("%'09d", preg_replace('/[^0-9]/', '', isset($data[$i]['tin']) ? $data[$i]['tin'] : ''));
			$cdata['reg_name'] = preg_replace('/[^a-zA-Z0-9\s]/', '', isset($data[$i]['reg_name']) ? $data[$i]['reg_name'] : '');
			$cdata['lastname'] = preg_replace('/[^a-zA-Z0-9\s]/', '', isset($data[$i]['lastname']) ? $data[$i]['lastname'] : '');
			$cdata['firstname'] = preg_replace('/[^a-zA-Z0-9\s]/', '', isset($data[$i]['firstname']) ? $data[$i]['firstname'] : '');
			$cdata['middlename'] = preg_replace('/[^a-zA-Z0-9\s]/', '', isset($data[$i]['middlename']) ? $data[$i]['middlename'] : '');
			$cdata['address'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', isset($data[$i]['address']) ? $data[$i]['address'] : '');
			$cdata['city'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', isset($data[$i]['city']) ? $data[$i]['city'] :'');
			$cdata['gross_purchase'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['gross_purchase']) ? $data[$i]['gross_purchase'] : '')), 2, '.', '');
			$cdata['exempt_purchase'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['exempt_purchase']) ? $data[$i]['exempt_purchase'] : '')), 2, '.', '');
			$cdata['zero_rated'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['zero_rated']) ? $data[$i]['zero_rated'] : '')), 2, '.', '');
			$cdata['taxable_purchase'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '',isset( $data[$i]['taxable_purchase']) ?  $data[$i]['taxable_purchase'] : '')), 2, '.', '');
			$cdata['services'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['services']) ? $data[$i]['services'] : '')), 2, '.', '');
			$cdata['capital_goods'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['capital_goods']) ? $data[$i]['capital_goods'] : '')), 2, '.', '');
			$cdata['other_goods'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['other_goods']) ? $data[$i]['other_goods'] : '')), 2, '.', '');
			$cdata['input_tax'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['input_tax']) ? $data[$i]['input_tax'] : '')), 2, '.', '');
			$cdata['gross_taxable_purchase'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['gross_taxable_purchase']) ? $data[$i]['gross_taxable_purchase'] : '')), 2, '.', '');

			$purchase[$i] = $cdata;
		}
		$purchase = !empty($purchase) ? $purchase : null;
		return $purchase;
    }
    private function purchase_header($data)
    {
    	$cdata['date'] =  date('m/d/Y',strtotime($data['date']));
		$cdata['fiscal'] =  preg_replace('/[^0-9]/', '', $data['fiscal']);
		$cdata['tin'] = sprintf("%'09d", preg_replace('/[^0-9]/', '', $data['tin']));
		$cdata['rdo'] = preg_replace('/[^A-Z0-9]/', '', $data['rdo']);
		$cdata['reg_name'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['registered_name']);
		$cdata['lastname'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['lastname']);
		$cdata['firstname'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['firstname']);
		$cdata['middlename'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['middlename']);
		$cdata['tradename'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['business_line']);
		$cdata['substreet'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['substreet']);
		$cdata['street'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['street']);
		$cdata['brgy'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['barangay']);
		$cdata['district'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['district']);
		$cdata['city'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['city']);
		$cdata['zip_code'] = preg_replace('/[^0-9]/', '', $data['zip_code']);
		$cdata['type'] = preg_replace('/[^a-zA-Z]/', '', $data['type']);
		$cdata['non_creditable'] = preg_replace('/[^0-9\.\-]/', '', $data['non-creditable']);
		$cdata['creditable'] = preg_replace('/[^0-9\.\-]/', '', $data['creditable']);

		return $cdata;
    }
    function convert_importations($company, $input, $data)
    {
    	if(!empty($data)){
			
			$excel_data = $data;
			foreach ($excel_data as $key => $value) {
	           $sheet_data[$key] = (array)$value;
	        }
	       
	        $sanitize_importations = $this->sanitize_importations($sheet_data);
	        $header = $this->importations_header($input);
	        $file = $this->datfile($company,$header,$sanitize_importations);
	      	return $file;
		}
    }
    private function sanitize_importations($data)
    {

    	$cdata = [];
		for ($i=0; $i <= count($data) - 1; $i++) {
			$cdata['entry_no'] = preg_replace('/[^a-zA-Z0-9\s]/', '', isset($data[$i]['entry_no']) ? $data[$i]['entry_no'] : '');
			$cdata['release_date'] = date('m/d/Y',strtotime(isset($data[$i]['release_date']) ? $data[$i]['release_date'] : ''));
			$cdata['seller_name'] = preg_replace('/[^a-zA-Z0-9\s]/', '', isset($data[$i]['seller_name']) ? $data[$i]['seller_name'] : '');
			$cdata['import_date'] = date('m/d/Y',strtotime(isset($data[$i]['import_date']) ? $data[$i]['import_date'] : ''));
			$cdata['country_origin'] = preg_replace('/[^a-zA-Z0-9\s]/', '', isset($data[$i]['country_origin']) ? $data[$i]['country_origin'] : '');
			$cdata['landed_cost'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['landed_cost']) ? $data[$i]['landed_cost'] : '')), 2, '.', '');
			$cdata['dutiable_value'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['dutiable_value']) ? $data[$i]['dutiable_value'] : '')), 2, '.', '');
			$cdata['charges_before_custom'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['charges_before_custom']) ? $data[$i]['charges_before_custom'] : '')), 2, '.', '');
			$cdata['taxable_imports'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['taxable_imports']) ? $data[$i]['taxable_imports'] : '')), 2, '.', '');
			$cdata['exempt'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['exempt']) ? $data[$i]['exempt'] : '')), 2, '.', '');
			$cdata['vat'] = number_format(sprintf("%02.2f", preg_replace('/[^0-9\.\-]/', '', isset($data[$i]['vat']) ? $data[$i]['vat'] : '')), 2, '.', '');
			$cdata['or_number'] = preg_replace('/[^0-9\.\-]/', '', isset( $data[$i]['or_number']) ?  $data[$i]['or_number'] : '');
			$cdata['vat_date'] = date('m/d/Y',strtotime(isset($data[$i]['vat_date']) ? $data[$i]['vat_date'] : ''));
			
			$importation[$i] = $cdata;
		}

		$importation = !empty($importation) ? $importation : null;
		return $importation;
    }
    private function importations_header($data)
    {
    	$cdata['date'] =  date('m/d/Y',strtotime($data['date']));
		$cdata['fiscal'] =  preg_replace('/[^0-9]/', '', $data['fiscal']);
		$cdata['tin'] = sprintf("%'09d", preg_replace('/[^0-9]/', '', $data['tin']));
		$cdata['rdo'] = preg_replace('/[^A-Z0-9]/', '', $data['rdo']);
		$cdata['reg_name'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['registered_name']);
		$cdata['lastname'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['lastname']);
		$cdata['firstname'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['firstname']);
		$cdata['middlename'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['middlename']);
		$cdata['tradename'] = preg_replace('/[^a-zA-Z0-9\s]/', '', $data['business_line']);
		$cdata['substreet'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['substreet']);
		$cdata['street'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['street']);
		$cdata['brgy'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['barangay']);
		$cdata['district'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['district']);
		$cdata['city'] = preg_replace('/[^a-zA-Z0-9\s\.\-\_\#]/', '', $data['city']);
		$cdata['zip_code'] = preg_replace('/[^0-9]/', '', $data['zip_code']);
		$cdata['type'] = preg_replace('/[^a-zA-Z]/', '', $data['type']);

		return $cdata;
    }
	private function datfile($company,$header,$data = []){
		$hdata = $header;
		$edata = (array)$data;
		$print = '';
		$exempt = 0;$zero_rated = 0;$taxable = 0;$total_tax = 0;$services = 0;$capital = 0;$other_goods = 0;$dutiable_value = 0;$charges_before_custody = 0;$exempt = 0;$taxable_goods = 0;$vat = 0;
		
		switch (strtolower($hdata['type'])) {
			case 'sales':

				$filename = strtoupper(preg_replace('/[^a-zA-Z0-9]/', '', $hdata['tin'].'S'.date('m/Y',strtotime($hdata['date']))).'.DAT');
				header("Content-Disposition: attachment; filename=".$filename);

				for ($i=0; $i <= count($edata) - 1; $i++) { 
					
					$address = explode( " ", rtrim($edata[$i]['address']));

					$street = array_slice( $address, 0, count($address) - 2 );
					$city = array_slice( $address, count($address) - 2, 2 );
					
					$print .= 'D,S,'.$edata[$i]['tin'].',"'.rtrim($edata[$i]['reg_name']).'","'.rtrim($edata[$i]['lastname']).'","'.rtrim($edata[$i]['firstname']).'","'.rtrim($edata[$i]['middlename']).'","'.implode(" ",$street).'","'.implode(" ",$city).'",'.$edata[$i]['exempt'].','.$edata[$i]['zero_rated'].','.$edata[$i]['taxable_sales'].','.$edata[$i]['output_tax'].','.$hdata['tin'].','.$hdata['date']."\n";
					
					$exempt += (double)$edata[$i]['exempt'];
					$zero_rated += (double)$edata[$i]['zero_rated'];
					$taxable += (double)$edata[$i]['taxable_sales'];
					$total_tax += (double)$edata[$i]['output_tax'];
				}
					$dat_file = 'H,S,'.$hdata['tin'].',"'.rtrim($hdata['reg_name']).'","'.rtrim($hdata['lastname']).'","'.rtrim($hdata['firstname']).'","'.rtrim($hdata['middlename']).'","'.$hdata['tradename'].'","'.$hdata['substreet'].' '.$hdata['street'].' '.$hdata['brgy'].'","'.$hdata['district'].' '.$hdata['city'].' '.$hdata['zip_code'].'",'.$exempt.','.$zero_rated.','.$taxable.','.$total_tax.','.$hdata['rdo'].','.$hdata['date'].','.$hdata['fiscal']."\n".$print;
					echo $dat_file;
					
					
					$count = DB::table('reliefs')
					->where('company_id', $company)
					->where('ext', date('m/Y',strtotime($hdata['date'])))
					->where('type', 'sales')->count();

					$ext = "";
					if($count == "0"){
						$ext = "";
					}else{
						$ext = "(".$count.")";
					}

					$file_name = strtoupper(preg_replace('/[^a-zA-Z0-9]/', '', $hdata['tin'].'S'.date('m/Y',strtotime($hdata['date']))).$ext.'.DAT');

					$file = fopen("relief/".$file_name, "w");
		     		fwrite($file, $dat_file);
		            fclose($file);

				return $file_name;
			break;

			case 'purchase':
				$filename = strtoupper(preg_replace('/[^a-zA-Z0-9]/', '', $hdata['tin'].'P'.date('m/Y',strtotime($hdata['date']))).'.DAT');
				header("Content-Disposition: attachment; filename=".$filename);

				for ($i=0; $i <= count($edata) - 1; $i++) { 
					if($edata[$i]['tin'] != '000000000'){
						
						$print .= 'D,P,"'.$edata[$i]['tin'].'","'.rtrim($edata[$i]['reg_name']).'","'.rtrim($edata[$i]['lastname']).'","'.rtrim($edata[$i]['firstname']).'","'.rtrim($edata[$i]['middlename']).'","'.rtrim($edata[$i]['address']).'","'.rtrim($edata[$i]['city']).'",'.$edata[$i]['exempt_purchase'].','.$edata[$i]['zero_rated'].','.$edata[$i]['services'].','.$edata[$i]['capital_goods'].','.$edata[$i]['other_goods'].','.$edata[$i]['input_tax'].','.$hdata['tin'].','.$hdata['date']."\n";
						
						$exempt += (double)$edata[$i]['exempt_purchase'];
						$zero_rated += (double)$edata[$i]['zero_rated'];
						$services += (double)$edata[$i]['services'];
						$capital += (double)$edata[$i]['capital_goods'];
						$other_goods += (double)$edata[$i]['other_goods'];
						$total_tax += (double)$edata[$i]['input_tax'];

					}
				}
				$dat_file = 'H,P,"'.$hdata['tin'].'","'.$hdata['reg_name'].'","'.$hdata['lastname'].'","'.$hdata['firstname'].'","'.$hdata['middlename'].'","'.$hdata['tradename'].'","'.$hdata['substreet'].' '.$hdata['street'].' '.$hdata['brgy'].'","'.$hdata['district'].' '.$hdata['city'].' '.$hdata['zip_code'].'",'.$exempt.','.$zero_rated.','.$services.','.$capital.','.$other_goods.','.$total_tax.','.$total_tax.','.($hdata['non_creditable'] != '' ? $hdata['non_creditable'] : $hdata['creditable']).','.$hdata['rdo'].','.$hdata['date'].','.$hdata['fiscal']."\n".$print;
			
					echo $dat_file;

					$count = DB::table('reliefs')
					->where('company_id', $company)
					->where('ext', date('m/Y',strtotime($hdata['date'])))
					->where('type', 'purchase')->count();
					
					$ext = "";
					if($count == "0"){
						$ext = "";
					}else{
						$ext = "(".$count.")";
					}

					$file_name = strtoupper(preg_replace('/[^a-zA-Z0-9]/', '', $hdata['tin'].'P'.date('m/Y',strtotime($hdata['date']))).$ext.'.DAT');

					$file = fopen("relief/".$file_name, "w");
		     		fwrite($file, $dat_file);
		            fclose($file);
		          	
		          	return $file_name;
			break;

			case 'importations':

				$filename = strtoupper(preg_replace('/[^a-zA-Z0-9]/', '', $hdata['tin'].'I'.date('m/Y',strtotime($hdata['date']))).'.DAT');
				header("Content-Disposition: attachment; filename=".$filename);

				for ($i=0; $i <= count($edata) - 1; $i++) { 
					if($edata[$i]['entry_no'] != ''){
						$print .= 'D,I,"'.rtrim($edata[$i]['entry_no']).'",'.$edata[$i]['release_date'].',"'.rtrim($edata[$i]['seller_name']).'",'.$edata[$i]['import_date'].',"'.rtrim($edata[$i]['country_origin']).'",'.$edata[$i]['dutiable_value'].','.$edata[$i]['charges_before_custom'].','.$edata[$i]['exempt'].','.$edata[$i]['taxable_imports'].','.$edata[$i]['vat'].',"'.$edata[$i]['or_number'].'",'.$edata[$i]['vat_date'].','.$hdata['tin'].','.$hdata['date']."\n";
					
						$dutiable_value += (double)$edata[$i]['dutiable_value'];
						$charges_before_custody += (double)$edata[$i]['charges_before_custom'];
						$exempt += (double)$edata[$i]['exempt'];
						$taxable_goods += (double)$edata[$i]['taxable_imports'];
						$vat += (double)$edata[$i]['vat'];
					}
				}
				$dat_file = 'H,I,"'.$hdata['tin'].'","'.$hdata['reg_name'].'","'.$hdata['lastname'].'","'.$hdata['firstname'].'","'.$hdata['middlename'].'","'.$hdata['tradename'].'","'.$hdata['substreet'].' '.$hdata['street'].' '.$hdata['brgy'].'","'.$hdata['district'].' '.$hdata['city'].' '.$hdata['zip_code'].'",'.$dutiable_value.','.$charges_before_custody.','.$exempt.','.$taxable_goods.','.$vat.','.$hdata['rdo'].','.$hdata['date'].','.$hdata['fiscal']."\n".$print;

				echo $dat_file;

				$count = DB::table('reliefs')
					->where('company_id', $company)
					->where('ext', date('m/Y',strtotime($hdata['date'])))
					->where('type', 'importations')->count();
					
				$ext = "";
				if($count == "0"){
						$ext = "";
				}else{
						$ext = "(".$count.")";
				}

				$file_name = strtoupper(preg_replace('/[^a-zA-Z0-9]/', '', $hdata['tin'].'I'.date('m/Y',strtotime($hdata['date']))).$ext.'.DAT');

				$file = fopen("relief/".$file_name, "w");
		     	fwrite($file, $dat_file);
		        fclose($file);
		          	
		        return $file_name;

			break;

			default:
			
			break;
		}

	}
}
?>
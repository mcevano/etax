<?php 
namespace App\Classes;
use App\User;
use App\Companies;
use App\Submit_stats;
use Illuminate\Support\Facades\DB;

class SubmitClass {
	public function __construct()
	{
		//define('SVRLINK','http://wdk7d7f6we5b9d7gl23yt5kjflwdu7f5g6d9gd0kj32hk4ge3j4qudfvyvbjkd.walapaki.com/index/');
		//define('SVRKEY','lH35d8Khdje6=jd!idksP6X3b4j%');
	}

	function getData($id){
		$xml = DB::table('xmls')->where('id', $id)->where('status','Filed')->get();

		if(!$xml->isEmpty()){
			$verify = DB::table('submit_stats')->where('xml_id', $id)->get();
			if($verify->isEmpty()){

				$company = Companies::find($xml[0]->company_id);
				$user = User::find($xml[0]->user_id);

				$cacheFile =  public_path().'/savefile/'.$xml[0]->file_name;
				$xmlData = file_get_contents($cacheFile);

				$form = strtolower($xml[0]->form);
				
				$filename = $xml[0]->file_name;

			    if($form == '1601Cv2018') {
			        $form = '1601c';
			    }

			    $getTinNumber = $company->tin1."-".$company->tin2."-".$company->tin3."-".$company->tin4;
			    $xmlContent = ($xmlData);

			    $array = array();
				$array['tin'] = $getTinNumber; 
				$array['rdo'] = $company->rdo_code; 
			    $array['business'] = $company->line_business;
				$array['name'] = $company->registered_name;
				$array['address'] = $company->registeredAddress;
				$array['zip'] = $company->zip_code;
				$array['telephone'] = $company->tel_number;
				$array['email'] = $company->email_address;
				$array['taxable_period'] = $xml[0]->return_period;
				$array['file_name'] = $filename;
				$array['xml_content'] = $xmlData;
				$array['form'] = $form;

				//$result = $this->sendToFile($array);
				$stat = $this->submitStat($id, '002');
				return $stat->id;
			}else{
				exit;
			}
		}else{
			exit;
		}
	}

	function sendToFile($data){
			
		// $curl_connection = curl_init('http://30598ed131eafe31148d0ab0842325de469bbc30.walapaki.com/index/setData');
		$curl_connection = curl_init(SVRLINK.'/setData');
			
		curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
			
		// $post_string = '&data=true';
		$post_string = '';
		foreach($data as $var=>$each){
				$post_string .= '&'.$var.'='.$each;
		}
			
		$post_string .= '&form='.$data['form'].'&key='.SVRKEY;
		curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
		$result = curl_exec($curl_connection);
		curl_close( $curl_connection);
			
		return json_decode($result);
			
	}

	function submitStat($id, $result){
		/*insert data to submit_stat table*/

		$data = ([
			'xml_id'		=> $id,
			'ref_no'		=> $result,
			'status'        => 'pending',
		]);

		$id = Submit_stats::create($data);

		return $id;
	}
}
?>
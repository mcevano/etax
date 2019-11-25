<?php 
namespace App\Classes;

use App\Xml;
use App\Billings;
use App\Submit_stats;
use Illuminate\Support\Facades\DB;

class CheckClass {
	public function __construct()
	{
		//define('SVRLINK','http://wdk7d7f6we5b9d7gl23yt5kjflwdu7f5g6d9gd0kj32hk4ge3j4qudfvyvbjkd.walapaki.com/index/');
		//define('SVRKEY','lH35d8Khdje6=jd!idksP6X3b4j%');
	}

	function checkFileStatus($id)
	{
		$stat = DB::table('submit_stats')->where('id', $id)->where('status','pending')->get();

		if(!$stat->isEmpty()){
			$xml = Xml::find($stat[0]->xml_id);
			return $xml->file_name;

			$form = strtolower($xml->form);
		    if($form == '1601Cv2018') {
		        $form = '1601c';
		    }

		    $array = array();
			$array['data'] = $stat[0]->ref_no;
			$array['form'] = $form;

			$result = sendToFile($array);

			if($result == 'filed'){

				$data = ([
		            'status'        => 'Submitted',
		        ]);
				$billing = Xml::find($billings);
				$billing->update($data);

				$data2 = ([
		            'status'        => 'filed',
		        ]);
		        $stats = Submit_stats::find($id);
            	$stats->update($data2);

			}

		}else{
			exit;
		}
	}

	function sendToFile($data){
			
		// $curl_connection = curl_init('http://30598ed131eafe31148d0ab0842325de469bbc30.walapaki.com/index/setData');
		//$curl_connection = curl_init(SVRLINK.'/setData');
			
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
}
?>
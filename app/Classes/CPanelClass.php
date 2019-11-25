<?php 
namespace App\Classes;

class CPanelClass {
	public function __construct()
	{
		
		define("CPANELAPIURL",'http://kabayantax.com/secured/db_updater/');
	}

	function execute($post_data)
	{
		$curl_connection = curl_init(CPANELAPIURL);
		curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
		
		$post_items = array();
		foreach ( $post_data as $key => $value) 
		{
			$post_items[] = $key . '=' . $value;
		}
		$post_string = implode ('&', $post_items);
		
		curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
		$result = curl_exec($curl_connection);
		
		curl_close($curl_connection);

		if($result != "")
			return json_decode($result);

		return false;
	}
}
?>
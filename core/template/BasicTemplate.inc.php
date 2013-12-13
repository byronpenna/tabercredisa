<?php 

class BasicTemplate{
	function getJson($url){
		$json = file_get_contents($url);
		$json = json_decode($json);
		return $json;
	}	
	
}

?>
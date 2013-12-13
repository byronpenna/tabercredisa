<?php 
class ParentWork
{
	private $jsonObject;
	private $rootDirectory;
	function __set($var,$valor){
		if(property_exists('ParentWork', $var)){
			$this->setvalues($valor);
		}else{
			echo "Propiedad no existe";
		}
	}
	function __get($var){
		if(property_exists('ParentWork', $var)){
			return $this->$var;
		}
	}
	function __construct(){
		$this->jsonObject = file_get_contents(dirname(__FILE__)."/route.json");
		$this->jsonObject = json_decode($this->jsonObject);
		$this->rootDirectory = $_SERVER['DOCUMENT_ROOT']."/".$this->jsonObject->proyectFolder."/";
	}
}
?>
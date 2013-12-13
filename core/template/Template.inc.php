<?php 
require_once "BasicTemplate.inc.php";
class Template extends BasicTemplate
{
	// private $template_definition = "map/template_definition.json";
	private $objJson;
	private $defaultLang;
	private $parentJson;
	function __construct($template_definition,$lang = "",$parent=""){
		// GET JSON 
			$json = file_get_contents("map/".$template_definition.".json");
			$this->objJson = json_decode($json);
			if($parent != ""){
				$this->parentJson = file_get_contents("map/".$parent.".json");
				$this->parentJson = json_decode($this->parentJson);
				$this->objJson = $this->combine($this->parentJson,$this->objJson);
			}
			// $this->objJson = (object) array_merge((array)$this->parentJson,(array)$this->objJson);
			// echo "<br>------------------------------------------<br>";
			// print_r($this->objJson);			
		$defaultLanguage = $this->objJson->definition[0]->defaultLang;	
		if($lang != ""){
			setcookie("lang", $lang);
			$this->defaultLang = $lang;
		}else{
			if(isset($_COOKIE['lang'])){
				$this->defaultLang = $_COOKIE['lang'];
			}else{
				$this->defaultLang = $defaultLanguage;	
			}
		}
	}
	function combine($arr1,$arr2){
		if($arr2->definition[0]->defaultLang != ""){
			$arr1->definition[0]->defaultLang = $arr2->definition[0]->defaultLang;
		}
		for ($i=0; $i < count($arr2->definition[0]->index) ; $i++) { 
			foreach ((array)$arr2->definition[0]->index[$i] as $key => $value) {
				if($value != ""){
					$arr1->definition[0]->index[$i]->$key = $value;
				}
			}	
		}
		return $arr1;
	}
	function __call($method,$arguments){
		$action = "".$method."(";
		foreach ($arguments as $key => $value) {
			if(!is_numeric($value)){
				$value = "'".$value."'";
			}
			if($key == 0){
				$action .= $value;
			}else{
				$action .= ",".$value."";
			}
		}
		$action .=")";
		echo $action;
	}
	function __set($var,$valor){
		if(property_exists('Template', $var)){
			$this->setvalues($valor);
		}else{
			echo "Propiedad no existe";
		}
	}
	function __get($var){
		if(property_exists('Template', $var)){
			return $this->$var;
		}
	}
	function replaceDinamicVars($vars,$template,$key=""){
		if(is_array($vars)){
			foreach ($vars as $key => $value) {
				$template = str_replace("{#".$key."}", $value,$template);
			}
		}else{
			
			$template = str_replace("{#".$key."}", $vars,$template);
		}
		return $template;
	}
	function replaceSection($template,$arr){
		foreach ($arr as $key => $value) {
			$tile = "";
			if($value != ""){
				$tile = file_get_contents($value);	
			}
			$template = str_replace("{@@".$key."}", $tile, $template);
		}
		return $template;
	}
	function replaceKeys($template,$arr){
		foreach ($arr as $key => $value) {
			$template = str_replace("{@".$key."}",$value, $template);
		}
		return $template;
	}
	function getTemplate($nameTemplate){
		$template = $this->objJson->definition[0]->$nameTemplate;
		return $template;
	}
	function getContent($obj){
		return file_get_contents($obj[0]->path);
	}
	function setKeys($obj,$template){
		$lang = $this->defaultLang;
		$keys = $obj[2]->$lang;
		$keys = $this->getJson($keys);
		foreach ($keys as $key => $value) {
			$template = str_replace("{@".$key."}", $value, $template);
		}
		return $template;
	}
	function setPieceHTML($obj,$template){
		$parts = $obj[1];
		foreach ($parts as $key => $value) {
			if($value != ""){
				$template = str_replace("{@@".$key."}",file_get_contents($value), $template);	
			}
		}
		return $template;
	}
}
?>
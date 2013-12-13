<?php	
require_once "ParentWork.inc.php";
$parentWork = new ParentWork();
require_once $parentWork->rootDirectory."core/sql/Sql.inc.php";
class IndexWork
{
	private $jsonObject;
	private $rootDirectory;
	function getSliderImages(){
		$dir = opendir($this->rootDirectory."site_media/img/index/slider");
		$return = "";
		while ($file = readdir($dir)) {
			if(!is_dir($file)){
				$ext = substr($file,strpos($file,".")+1,strlen($file));
				if($ext == "jpg" || $ext == "png"){
					$return .= "
					<li>
		    			<img src=\"site_media/img/index/slider/".$file."\" class=\"imgslide\" alt=".$file.">
		    		</li>
		    		";	
				}
				
			}
		}
		return $return;
	}
	function __set($var,$valor){
		if(property_exists('IndexWork', $var)){
			$this->setvalues($valor);
		}else{
			echo "Propiedad no existe";
		}
	}
	function __get($var){
		if(property_exists('IndexWork', $var)){
			return $this->$var;
		}
	}
	function __construct(){
		// $parentWork = new ParentWork();
		GLOBAL $parentWork;
		$this->rootDirectory = $parentWork->rootDirectory;
	}
}
?>
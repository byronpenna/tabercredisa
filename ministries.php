<?php 
	// $obj = new stdClass();
	// $obj->nombre = "hola<br>";
	// $obj->apellido = "mundito";
	// $ob = new stdClass();
	// $ob->apellido = "mundo";
	// $super = array_merge((array)$obj,(array)$ob);
	// print_r($super);
	//REQUIRED 		
		require_once "core/template/Template.inc.php";
	//TEMPLATE 
		@$lang = $_GET['lang'];
		if(isset($lang)){
			$classTemplate = new Template("ministries_definition",$lang,"index_definition");	
		}else{
			$classTemplate = new Template("ministries_definition","","index_definition");	
		}
		$index = $classTemplate->getTemplate("index");
		$template = $classTemplate->getContent($index);
		$template = $classTemplate->setPieceHtml($index,$template);
		$template = $classTemplate->setKeys($index,$template);
		echo $template;
?>
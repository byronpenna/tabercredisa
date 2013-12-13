<?php 
	//REQUIRED 		
		require_once "core/template/Template.inc.php";
	//TEMPLATE 
		@$lang = $_GET['lang'];
		if(isset($lang)){
			$classTemplate = new Template("register_definition",$lang,"index_definition");	
		}else{
			$classTemplate = new Template("register_definition","","index_definition");	
		}
		$index = $classTemplate->getTemplate("index");
		$template = $classTemplate->getContent($index);
		$template = $classTemplate->setPieceHtml($index,$template);
		$template = $classTemplate->replaceDinamicVars(@$_GET['message'],$template,"messageRegister");
		$template = $classTemplate->replaceDinamicVars(@$_GET['message2'],$template,"messageRegister2");
		
		$template = $classTemplate->setKeys($index,$template);
		echo $template;
?>
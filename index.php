<?php 
	//REQUIRED 		
		require_once "core/template/Template.inc.php";
		require_once "models/IndexWork.inc.php";
	//TEMPLATE 
		@$lang = $_GET['lang'];
		$indexWork = new IndexWork();
		if(isset($lang)){
			$classTemplate = new Template("index_definition",$lang);	
		}else{
			$classTemplate = new Template("index_definition");	
		}
		$index = $classTemplate->getTemplate("index");
		$template = $classTemplate->getContent($index);
		$template = $classTemplate->setPieceHtml($index,$template);// {@@variable}
		$template = $classTemplate->setKeys($index,$template);
		$sliderImg = $indexWork->getSliderImages();
		$template = $classTemplate->replaceDinamicVars($sliderImg,$template,"sliderImg");
		echo $template;
?>
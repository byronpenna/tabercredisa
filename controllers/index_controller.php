<?php 
	require_once "../core/work/Work.inc.php";
	@$method = $_POST['method'];
	if(isset($method)){
		$method();
	}
	function changeLang(){
		$work = new Work($_POST);
		$frm = $work->getVars();
		// echo $frm->hiddenLocation."?lang=".$frm->language."";
		header("Location: ".$frm->hiddenLocation."?lang=".$frm->language."");
		// echo $_COOKIE['prueba'];
		// echo $frm->language;
		// setcookie("lang",$frm->language);
		// echo $_COOKIE['lang'];
		// if(isset($frm->language)){
		// 	echo "entro";
		// }
		// echo $_COOKIE['lang'];
		// setcookie("lang","english");
	}
	function login(){
		echo "listo para loguea";
	}
?>
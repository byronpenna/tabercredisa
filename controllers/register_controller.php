<?php 
	require_once "../core/work/Work.inc.php";
	function __autoload($className){
		require_once "../models/".$className.".inc.php";
	}
	@$method = $_POST['method'];
	if(isset($method)){
		$method();
	}
	function register(){
		$work = new Work($_POST);
		$frm = $work->getVars();
		$regWork = new RegisterWork();
		if($regWork->registered($frm)){
			header("location: ../register.php?message={@successReg}&message2={@messageRegister2}");
		}else{
			header("location: ../register.php?message={@failReg}&message2=");
		}
	}
?>
<?php 
	require_once "../core/work/Work.inc.php";
	@$method = $_POST['method'];
	if(isset($method)){
		$method();
	}
	function register(){
		echo "register successful";
	}
?>
<?php 
class Work
{
	private $request;
	private $vars;
	function __construct($request=""){
		if($request != ""){
			$this->request = $request;
			$this->vars = new stdClass();
			foreach ($request as $key => $value) {
				$this->vars->$key = $value;
			}	
		}
	}
	function getVars(){
		return $this->vars;
	}
	function setVarSession($obj){
		session_start(true);
		foreach ($obj as $key => $value) {
			$_SESSION[$key] = $value;
		}
	}
}
?>
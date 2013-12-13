<?php 
	require_once "ParentWork.inc.php";
	$parentWork = new ParentWork();
	require_once $parentWork->rootDirectory."core/sql/Sql.inc.php";
	class RegisterWork
	{
		function registered($frm){
			$sql = new Sql("config");
			$confirmationCode = rand(0000000000,9999999999);
			$estado = true;
			while($estado){
				$query = "SELECT COUNT(*) as Existe FROM users where confirmation_code = ".$confirmationCode." ";
				// echo $query."<br>";
				$sql->query = $query;
				$obj = $sql->executeReader();
				if(@$obj->Existe == 0){
					$estado = false;
				}else{
					$confirmationCode = rand(0000000001,9999999999);
				}
			}
			$url = "http://www.tabernaculocredisa.com/confirmation.php?code=".$confirmationCode."";
			$this->sendConfirmation($url,$frm->email);
			$query = "INSERT INTO users VALUES(NULL,'".$frm->name."','".$frm->last_name."','".$frm->email."','".$frm->user_name."',MD5('".$frm->pass."'),".$confirmationCode.",0)";
			$sql->query = $query;
			// echo $query;
			if($sql->executeQuery()){
				return true;	
			}else{
				return false;
			}
		}
		function sendConfirmation($url,$email){
			$head = "FROM: info@tabernaculocredisa.com";
			$menssage ="Usted solicito un registro en tabernaculocredisa.com \n para confirmarlo favor hacer click al 
			siguiente enlace ".$url." ";
			@mail($email,"CONFIRMACION REGISTRO",$menssage,$head);
		}
	}
?>
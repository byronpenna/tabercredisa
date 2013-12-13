<?php 
require_once "core/sql/Sql.inc.php";
@$code = $_GET['code'];
$sql = new Sql("config","s");
$query = "UPDATE users SET confirm = 1, confirmation_code = 0 WHERE confirmation_code = ".$code." ";
$sql->query = $query;
if($sql->executeQuery()){
	echo "confirmado exitosamente";
}else{
	echo "gay";
}
?>
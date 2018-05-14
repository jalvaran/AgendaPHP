<?php
include_once 'php_mysql.php';
$obCon=new ConectorBD();

$Mensaje["msg"]=$obCon->initConexion("agenda");

if($Mensaje["msg"]=="OK"){
    $idDelete=$_REQUEST["id"];

    $sql="DELETE FROM eventos WHERE ID='$idDelete'";
    $obCon->Query($sql);
    print(json_encode($Mensaje));
}else{
    $Mensaje["msg"]="No se pudo conectar a la Base de datos";
    print(json_encode($Mensaje));
}


 ?>

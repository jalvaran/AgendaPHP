<?php
 
include_once 'php_mysql.php';
$obCon=new ConectorBD();

$Mensaje["msg"]=$obCon->initConexion("agenda");

if($Mensaje["msg"]=="OK"){
    $id=$_REQUEST["id"];
    $FechaInicial=$_REQUEST["start_date"];
    $FechaFin=$_REQUEST["end_date"];
    $HoraInicial=$_REQUEST["start_hour"];
    $HoraFin=$_REQUEST["end_hour"];
    
    $sql="UPDATE eventos SET FechaInicio = '$FechaInicial',FechaFin='$FechaFin',"
            . "HoraInicio='$HoraInicial',HoraFin='$HoraFin' WHERE ID='$id'";
    $obCon->Query($sql);
    print(json_encode($Mensaje));
}else{
    $Mensaje["msg"]="No se pudo conectar a la Base de datos";
    print(json_encode($Mensaje));
}



 ?>

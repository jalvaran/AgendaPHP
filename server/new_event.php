<?php
session_start();  
include_once 'php_mysql.php';

$obCon= new ConectorBD();
$Mensaje["msg"]=$obCon->initConexion("agenda");

if($Mensaje["msg"]=="OK"){
    if($_REQUEST["allDay"]==true){
        $TodoElDia=1;
    }else{
        $TodoElDia=0;
    }
    $Datos["Titulo"]=$_REQUEST["titulo"];
    $Datos["FechaInicio"]=$_REQUEST["start_date"];
    $Datos["FechaFin"]=$_REQUEST["end_date"];
    $Datos["EventoDia"]=$TodoElDia;
    $Datos["HoraInicio"]=$_REQUEST["start_hour"];
    $Datos["HoraFin"]=$_REQUEST["end_hour"];
    $Datos["idUser"]=$_SESSION["idUser"];
    $sql=$obCon->getSQLInsert("eventos", $Datos);
    $obCon->Query($sql);
    echo json_encode($Mensaje);
    
}else{
    $Mensaje["msg"]="No se pudo conectar a la Base de datos";
    print(json_encode($Mensaje));
}

$obCon->cerrarConexion();
 ?>

<?php
session_start();  
include_once 'php_mysql.php';

$obCon= new ConectorBD();
$Mensaje["msg"]=$obCon->initConexion("agenda");

if($Mensaje["msg"]=="OK"){
    $Datos["Titulo"]=$_REQUEST["titulo"];
    $Datos["FechaInicio"]=$_REQUEST["start_date"];
    
    if($_REQUEST["allDay"]==true){
        $Datos["EventoDia"]=1;
        $Datos["FechaFin"]=$_REQUEST["start_date"];
        $Datos["HoraInicio"]="";
        $Datos["HoraFin"]="23:59:59";
    }else{
        $Datos["EventoDia"]=0;
        $Datos["FechaFin"]=$_REQUEST["end_date"];
        $Datos["HoraInicio"]=$_REQUEST["start_hour"];
        $Datos["HoraFin"]=$_REQUEST["end_hour"];
    }
   
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

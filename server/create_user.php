<?php

include_once 'php_mysql.php';

$obCon=new ConectorBD();

$Mensaje=$obCon->initConexion("agenda");

if($Mensaje=="OK"){
    $Tabla="usuarios";
    $Datos["Nombre"]="JULIAN ANDRES ALVARAN";
    $Datos["Email"]="jalvaran@gmail.com";
    $Datos["Password"]=md5("pirlo1985");
    $Datos["FechaNacimiento"]="1985-01-05";
    $Datos["Updated"]=date("Y-m-d H:i:s");
    $sql=$obCon->getSQLInsert($Tabla, $Datos); 
    try{
        $Mensaje=$obCon->Query($sql);
    } catch (Exception $e){
        print($e->getMessage());
    }
      
    $Tabla="usuarios";
    $Datos["Nombre"]="GLORIA LICETH JARAMILLO";
    $Datos["Email"]="glorita@gmail.com";
    $Datos["Password"]=md5("gloria");
    $Datos["FechaNacimiento"]="1984-06-17";
    
    $sql=$obCon->getSQLInsert($Tabla, $Datos);
    try{
        $Mensaje=$obCon->Query($sql);
    } catch (Exception $e){
        print($e->getMessage());
    }
    
    $Tabla="usuarios";
    $Datos["Nombre"]="SEBASTIAN ALVARAN JARAMILLO";
    $Datos["Email"]="sebastian@gmail.com";
    $Datos["Password"]=md5("sebastian");
    $Datos["FechaNacimiento"]="2010-07-19";
    
    $sql=$obCon->getSQLInsert($Tabla, $Datos);
    try{
        $Mensaje=$obCon->Query($sql);
    } catch (Exception $e){
        print($e->getMessage());
    }
    $obCon->cerrarConexion();
}else{
    print($Mensaje);
}

 ?>

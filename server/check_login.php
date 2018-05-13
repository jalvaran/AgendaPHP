<?php
session_start();
include_once 'php_mysql.php';

$obCon=new ConectorBD();

$Mensaje["msg"]=$obCon->initConexion("agenda");

if($Mensaje["msg"]=="OK"){
    
    $User=$_REQUEST["username"];
    $Password=md5($_REQUEST["password"]);
    $sql="SELECT ID, Nombre FROM usuarios WHERE Email = '$User' AND Password='$Password'";
    $Consulta=$obCon->Query($sql);
    $DatosUsuario=$Consulta->fetch_assoc();
    if($DatosUsuario["Nombre"]){
        $_SESSION["idUser"]=$DatosUsuario["ID"];
        $_SESSION["NombreUser"]=$DatosUsuario["Nombre"];
        $Mensaje["msg"]="OK";
        print(json_encode($Mensaje));
    }else{
        $Mensaje["msg"]="El usuario o la contraseña no son correctos";
        print(json_encode($Mensaje));
    }
    
    
}else{
    $Mensaje["msg"]="No se pudo conectar a la Base de datos";
    print(json_encode($Mensaje));
}


?>

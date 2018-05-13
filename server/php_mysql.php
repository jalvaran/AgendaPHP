<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //Habilito el reporte de errores

  class ConectorBD
  {
    private $host = 'localhost';
    private $user = 'techno';
    private $password = 'techno';
    private $conexion;

    function initConexion($nombre_db){
      $this->conexion = new mysqli($this->host, $this->user, $this->password, $nombre_db);
      if ($this->conexion->connect_error) {
        return "Error:" . $this->conexion->connect_error;
      }else {
        return "OK";
      }
    }

    //Esta Funcion devuelve el sql para la insercion de datos.
    function getSQLInsert($Tabla,$Datos){
      $sqlCampos = "INSERT INTO $Tabla (";
      $sqlValores= ' VALUES (';
      $length_array = count($Datos);
      $i = 1;
      foreach ($Datos as $key => $value) {
        $sqlCampos .= "`$key`";
        $sqlValores .= "'$value'";
        if ($i!= $length_array) {
          $sqlCampos .= ", " ;
          $sqlValores .= ", " ;
        }else {
          $sqlCampos .= ')';
          $sqlValores .= ');';
        }
        $i++;
      }
      $sql=$sqlCampos.$sqlValores;
      return $sql;
    }

    //Ejecutar un query.
    function Query($query){
        
        return $this->conexion->query($query); 
        
    }
    
   
    //Borrar esta función antes de hacer la captura.
    function cerrarConexion(){
      $this->conexion->close();
    }


  }





 ?>

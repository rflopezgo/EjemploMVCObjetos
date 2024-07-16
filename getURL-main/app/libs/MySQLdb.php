<?php
/**
 * Abre la base de datos de tipo MySQL
 */
class MySQLdb{
  private $host = "localhost";
  private $usuario = "root";
  private $clave = ""; //XAMPP esta vacio, en MAMP root
  private $db = "mvc";
  private $puerto = ""; //MAMP necesitamos el puerto
  private $conn;
  
  function __construct()
  {
    $conn = mysqli_connect($this->host,$this->usuario,$this->clave,$this->db);
    if (mysqli_connect_errno()) {
      printf("Error en la conexión con la base de datos: %s",
        mysqli_connect_errno()); 
      exit();
    } else {
      //print "Conexión exitosa";
    }

    if (!mysqli_set_charset($conn,"utf8")) {
      printf("Error en la conversión de caracteres: %s",
        mysqli_error($conn)); 
      exit();
    } else {
      //print "El conjunto de caracteres es: ".mysqli_character_set_name($conn);
    }
  }
}
?>
<?php
/*index.php
Renderiza registro-atributos estáticos de objeto tipo Coche
vía componentes de petición URL, donde:
Caso Descripción
     1de6      2de6     3de6        4de6      5de6    6de6
 I   http://localhost/EjemploMvc/ 
 II  http://localhost/EjemploMvc/index.php/verRegistro/1
 
Donde:								tipo de petición	
1de6: define tipo de protocolo    \
2de6: define Ipv4 de servidor      |- petición general
3de6: define carpeta de proyecto  /
4de6: define controlador principal\
5de6: define método				   |- petición especializada 			   	
6de6: define argumento            /
 
Descripción. 
	01 genera un objeto tipo coche con sus 4 atributos estáticos
	02 enruta cualquier petición hacia el frontController
	03 remueve componente de petición: servidor <home/raiz>
    04 serializa los componentes de	petición
	05 filtra y enruta tipo de petición...
*/

/*fromController/controlador principal importa recursos*/
require_once("model/Coche.php");
require_once("controller/CocheController.php");
error_reporting(0);
//*00 Variables generales
$develop = FALSE;

/*01 controller es un objeto tipo: coche con 4 atributos estáticos*/
$controller = new CocheController;

/*02 enruta cualquier petición URL, hacia controlador principal index.php  */
$home="http://localhost/EjemploMVCObjetos/index.php/";
// enruta una petición URL hacia un componente de petición
if ($develop){
    echo "componetes de petición: ",$home;
    echo "<br>";
    echo "http://localhost/EjemploMVCObjetos/index.php/verRegistro/1";
    echo "<br>";
}

/*03 remueve raiz/home de la petición url */
$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);
if ($develop){
    echo "ruta: ", $ruta;
    echo "<br>";
}
/*04 serializa la petición */
$array_ruta = array_filter(explode("/", $ruta));
if ($develop){
    echo "Array_ruta::App: ", $array_ruta[1];
    echo "<br>";
    echo "Array_ruta::Componente: ", $array_ruta[2];
    echo "<br>";
    echo "Array_ruta::Metodo: ", $array_ruta[3];
    echo "<br>";
    echo "Array_ruta::Registro: ", $array_ruta[4];
    echo "<br>";
}
/*05 filtra y enruta tipo de petición*/
if ( $array_ruta[3]=="verRegistro" && is_numeric($array_ruta[4]) )
{
	/*petición especializada*/
    $controller->verRegistro($array_ruta[4]);
}
else
{
    /*petición general*/
    $controller->index();
} 
?>
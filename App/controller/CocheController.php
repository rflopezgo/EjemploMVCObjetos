<?php
class CocheController
{
    var $coches;
    /**define un objeto tipo coche con 5 atributos*/
    function __construct()
    {
        $this->coches = [
            1 => new Coche("1","Wolkswagen","Polo","negro","Leonardo"),
            2 => new Coche("2","Toyota","Corolla","blanco","Marcos"),
            3 => new Coche("3","Renault","Stepway","negro","Laura"),
            4 => new Coche("4","Kia","Rio","azul","Jazmin")
        ];
    }
    /**asigna atributos de un objeto tipo coche a rowset
     *renderiza 5 atributos de un objeto tipo coche en una tabla
     */
    public function index()
    {
        $rowset = $this->coches;
        require("view/todosRegistros.php");
    }

    /**
	*renderiza un registro pasado por valor,
     * sino renderiza vista principal
    */
    //public function verRegistro($id)
	public function verRegistro($id)
    {
        if (array_key_exists($id,$this->coches))
        {
            $row = $this->coches[$id];
            require("view/unRegistro.php");
        }
        else
        {
            $this->index();
        }
    }
}

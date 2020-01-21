<?php
class Posteo
{
    private $contenido;
    private $titulo;
    private $fecha;

    
    public function editarPosteo($contenido = null,$titulo = null,$fecha = null)
    {
    //Cheque que valores se le pasaron y con ellos modifica el posteo, deberia de modificarlo de alguna manera en BBDD
        if ($contenido) 
        {
        $this->setContenido = $contenido;
        }
        if ($titulo) 
        {
        $this->setTitulo = $titulo;
        }
        if ($fecha) 
        {
        $this->setFecha = $fecha;
        }
    }
    
    public function postear()
    {
        $this->setContenido = $_POST["contenido"];
        $this->setTitulo = $_POST["titulo"];
        $this->setFecha = $_POST["fecha"];
    }

    public function eliminarPosteo()
    {
        // Deberia ir a la BBDD a eliminar el posteo creado
    }
    public function mostrarPosteoPropio()
    {
        // Abrir la BBDD y hacer una consulta filtrado con el id del usuario de los posteos
    }
    public function mostrarPosteoAmigos()
    {
        // Abrir la BBDD y hacer una consulta de los posteos
    }

    public function getContenido()
    {
        return $this->contenido;
    }
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
}

?>
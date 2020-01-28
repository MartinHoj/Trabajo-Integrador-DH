<?php

require_once("../controladores/config.php");

class Posteo
{
    private $contenido;
    private $titulo;
    private $fecha;
    private $nombreImg;

    
    public function editarPosteo()
    {
    //Cheque que valores se le pasaron y con ellos modifica el posteo, deberia de modificarlo de alguna manera en BBDD
    //Viene de un formulario, primero chequeo que valores se quieren modificar y despues se lo modifico
        if (isset($_POST["contenido"])) 
        {
        $this->setContenido($_POST["contenido"]);
        }
        if (isset($_POST["titulo"])) 
        {
        $this->setTitulo($_POST["titulo"]);
        }
        if (isset($_POST["fecha"])) 
        {
        $this->setFecha($_POST["fecha"]);
        }
        $link = BBDD::conectarse();
        //Aca se va a hacer el UPDATE pero tendria que diferenciar que columnas actualizar segun si son o no null

    }
    
    public function postear()
    {
        $this->setContenido = $_POST["contenido"];
        $this->setTitulo = $_POST["titulo"];
        $this->setFecha = $_POST["fecha"]; //Hay que poner la fecha en el formato adecuado antes
        $this->setNombreImg = $_POST["nombreImg"];
        //id_cl_posteo es un valor que se obtiene por $_SESSION
        $link = BBDD::conectarse();
        $sql = "INSERT INTO posteos VALUES (NULL,:contenido,:titulo,:fecha,:nombre_img,:id_cl_posteo)";
        $link->prepare($sql);
        $sql->bindValue(':contenido',$this->getContenido());
        $sql->bindValue(':titulo',$this->getTitulo());
        $sql->bindValue(':fecha',$this->getFecha());
        $sql->bindValue(':nombre_img',$this->getNombreImg());
        $sql->bindValue(':id_cl_posteo',1); //Este valor en realidad sale de $_SESSION, se busca en BBDD el id_cliente del usuario

        $confirmacion = $sql->execute();
        return $confirmacion;
    }

    public function eliminarPosteo()
    {
        // Deberia ir a la BBDD a eliminar el posteo creado
    }
    public function mostrarPosteoPropio()
    {
        // Abrir la BBDD y hacer una consulta filtrado con el id del usuario de los posteos
        $id_usuario = 1; //id_usuario sale de $_SESSION porque es el usuario actual
        $link = BBDD::conectarse();
        $sql = "SELECT contenido,titulo,fecha,nombre_img FROM posteos WHERE id_cl_posteo = :id_usuario";
        $link->prepare($sql);
        $sql->bindValue(':id_usuario',$id_usuario);
        $sql->execute();
        $posteos = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $posteos;
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

    /**
     * Get the value of nombreImg
     */ 
    public function getNombreImg()
    {
        return $this->nombreImg;
    }

    /**
     * Set the value of nombreImg
     */ 
    public function setNombreImg($nombreImg)
    {
        $this->nombreImg = $nombreImg;

        return $this;
    }
}

?>
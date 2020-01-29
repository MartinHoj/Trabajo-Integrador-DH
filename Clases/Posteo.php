<?php

require_once("../controladores/config.php");

class Posteo
{
    private $contenido;
    private $titulo;
    private $fecha;
    private $nombreImg;

    
    public function editarPosteo($id_posteo)
    {
    //Cheque que valores se le pasaron y con ellos modifica el posteo, deberia de modificarlo de alguna manera en BBDD
    //Viene de un formulario, primero chequeo que valores se quieren modificar y despues se lo modifico
        if (isset($_POST["contenido"])) 
        {
        $this->setContenido($_POST["contenido"]);
        $contenido = $this->getContenido();
        $columnas = "contenido = $contenido";
        }
        if (isset($_POST["titulo"])) 
        {
        $this->setTitulo($_POST["titulo"]);
        $titulo = $this->getTitulo();
        if (isset($columnas)) {
            $columnas .= " ,titulo = $titulo";
        } else {
            $columnas = "titulo = $titulo";
        }
        }
        if (isset($_POST["fecha"])) 
        {
        $this->setFecha($_POST["fecha"]);
        $fecha = $this->getFecha();
        if (isset($columnas)) {
            $columnas .= " ,fecha = $fecha";
        } else {
            $columnas = "fecha = $fecha";
        }
        }
        if (isset($_POST["nombreImg"])) {
        $this->setNombreImg($_POST["nombreImg"]);
        $nombreImg = $this->getNombreImg();
        }
        if (isset($columnas)) {
            $columnas .= " ,nombre_img = $nombreImg";
        } else {
            $columnas = "nombre_img = $nombreImg";
        }
        
        $link = BBDD::conectarse();
        //Aca se va a hacer el UPDATE pero tendria que diferenciar que columnas actualizar segun si son o no null
        $sql = "UPDATE posteos SET $columnas WHERE id_posteo = :id_posteo";
        $stmt = $link->prepare($sql);
        $stmt->bindValue(':id_posteo',$id_posteo);
        $chequeo = $stmt->execute();
        return $chequeo;
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
        $stmt = $link->prepare($sql);
        $stmt->bindValue(':contenido',$this->getContenido());
        $stmt->bindValue(':titulo',$this->getTitulo());
        $stmt->bindValue(':fecha',$this->getFecha());
        $stmt->bindValue(':nombre_img',$this->getNombreImg());
        $stmt->bindValue(':id_cl_posteo',1); //Este valor en realidad sale de $_SESSION, se busca en BBDD el id_cliente del usuario

        $confirmacion = $stmt->execute();
        return $confirmacion;
    }

    public function eliminarPosteo($id_posteo)
    {
        // Deberia ir a la BBDD a eliminar el posteo creado
        $link = BBDD::conectarse();
        $sql = "DELETE FROM posteos WHERE id_posteo = :id_posteo AND id_cl_posteo = :id_cl_posteo"; //Este segundo valor en realidad sale de $_SESSION
        //La segunda condicion es para que unicamente puedo borrar un posteo propio y no uno de otro cliente
        $stmt = $link->prepare($sql);
        $stmt->bindValue(':id_posteo',$id_posteo);
        $stmt->bindValue(':id_cl_posteo',1);

        $chequeo = $stmt->execute();
        return $chequeo;
    }

    public function mostrarPosteoPropio()
    {
        // Abrir la BBDD y hacer una consulta filtrado con el id del usuario de los posteos
        $id_usuario = 1; //id_usuario sale de $_SESSION porque es el usuario actual
        $link = BBDD::conectarse();
        $sql = "SELECT contenido,titulo,fecha,nombre_img FROM posteos WHERE id_cl_posteo = :id_usuario";
        $stmt = $link->prepare($sql);
        $stmt->bindValue(':id_usuario',$id_usuario);
        $stmt->execute();
        $posteos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        //Ademas tiene que cambiar el formato de la fecha para que sea el que utiliza la BBDD
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
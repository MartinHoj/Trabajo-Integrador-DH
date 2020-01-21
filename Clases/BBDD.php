<?php
class BBDD
{
    private $usuario;
    private $contraseña;
    private $puerto;

    public function guardarUsuario(Usuario $usuario)
    {
        // INSERT en BBDD
    }
    public function guardarPosteo(Posteo $posteo)
    {
        // INSERT en BBDD
    }
    public function guardarImagen(Posteo $posteo)
    {
        //INSERT en BBDD
    }
    public function consultar($consulta)
    {
        // SELECT filtrado en BBDD
    }


    /*
    Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /*
    Set the value of usuario
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /*
    Get the value of contraseña
    */ 
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /*
    Set the value of contraseña
     */ 
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;

        return $this;
    }

    /*
    Get the value of puerto
     */ 
    public function getPuerto()
    {
        return $this->puerto;
    }

    /*
    Set the value of puerto
     */ 
    public function setPuerto($puerto)
    {
        $this->puerto = $puerto;

        return $this;
    }
}



?>
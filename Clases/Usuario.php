<?php

require_once("../controladores/config.php");

abstract class Usuario
{
    protected $nombre;
    protected $apellido;
    protected $contraseña;
    protected $nombreUsuario;
    protected $telefono;
    protected $pais;
    protected $email;
    
    protected function desloguearse()
    {
        header("Location:../deslogueo.php");
    }
    protected function loguearse()
    {
        // Debe de utilizar la validacion de login y la informacion del formulario
    }
    protected function eliminarMiCuenta()
    {
        // Debe eliminar la informacion del usuario de la BBDD
    }


    //Getters y Setters
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nuevoNombre)
    {
        $this->nombre = $nuevoNombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($nuevoApellido)
    {
        $this->apellido = $nuevoApellido;
    }
    protected function getContraseña()
    {
        return "Eso es privado";
    }
    protected function setContraseña($nuevaContraseña)
    {
        $this->contraseña = password_hash($nuevaContraseña, PASSWORD_DEFAULT);
    }
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }
    public function setNombreUsuario($nuevonombreUsuario)
    {
        $this->nombreUsuario = $nuevonombreUsuario;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($nuevotelefono)
    {
        $this->telefono = $nuevotelefono;
    }
    public function getPais()
    {
        return $this->pais;
    }
    public function setPais($nuevopais)
    {
        $this->pais = $nuevopais;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($nuevoemail)
    {
        $this->email = $nuevoemail;
    }
}


?>
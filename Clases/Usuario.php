<?php
class Usuario
{
    protected $nombre;
    protected $apellido;
    protected $contraseña;
    
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
    public function getContraseña()
    {
        return "Eso es privado";
    }
    public function setContraseña($nuevaContraseña)
    {
        $this->contraseña = password_hash($nuevaContraseña, PASSWORD_DEFAULT);
    }
    public function postear ()
    {
        echo "Hola, estoy posteando";
    }
}


?>
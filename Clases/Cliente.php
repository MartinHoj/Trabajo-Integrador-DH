<?php
require_once(Usuario.php);

class Cliente extends Usuario
{
    private $hobbie;
    private $amigos;

    public function getHobbie()
    {
        return $this->hobbie;
    }
    public function setHobbie($hobbie)
    {
        $this->hobbie = $hobbie;
    }
    public function agregarAmigo(Usuario $amigo)
    {
        $this->amigos[] = $amigo;
    }
    public function buscarAmigo()
    {
        // La informacion le va a estar llegando de un input de busqueda
    }
    public function eliminarAmigo(Usuario $malAmigo)
    {
        foreach ($this->amigos as $key->$amigo) {
            if ($amigo == $malAmigo) {
                unset($this->amigos[$key]);
            }
        }
    }
    public function mostrarMiPerfil()
    {
        # code...
    }
    public function editarMiPerfil()
    {
        # code...
    }




}



?>
<?php
require_once("../controladores/config.php");

class Cliente extends Usuario
{
    

    public function eliminarUsuario(Usuario $malUsuario)
    {
        // Entrar a la BBDD y borrarlo con un DELETE filtrado por nombre de usuario
    }
    public function elminarPosteo(Posteo $malPosteo)
    {
        // Entrar a la BBDD y borrarlo con un DELETE filtrado por Id de Posteo
    }
}



?>
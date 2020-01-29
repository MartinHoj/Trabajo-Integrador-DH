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
        $link = BBDD::conectarse();
        $sql = "DELETE FROM posteos WHERE id_posteo = :id_posteo";  
        $stmt = $link->prepare($sql);
        $stmt->bindValue(':id_posteo',$id_posteo);
        
        $chequeo = $stmt->execute();
        return $chequeo;
    }
}



?>
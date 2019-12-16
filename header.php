

<?php
 //Abro la base de datos
 session_start();
 $base = file_get_contents("usuarios.json");
 $baseDeDatos = json_decode($base,true);
 if (isset($_SESSION["email"])) {
     foreach ($baseDeDatos as $usuario) {
         if ($usuario["email"] == $_SESSION["email"]) {
             $_SESSION["name"] = $usuario["name"];
             $_SESSION["apellido"] = $usuario["apellido"];
             $_SESSION["email"] = $usuario["email"];
             $_SESSION["tel"] = $usuario["tel"];
             $_SESSION["hobbies"] = $usuario["hobbies"];
             $_SESSION["pais"] = $usuario["pais"];
             $_SESSION["genero"] = $usuario["genero"];
         }
     }
 }


 "<pre>";
 var_dump($_SESSION["hobbies"]);
 "</pre> <br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<header>
            <nav>
                <ul>
                <li >    
                    <?php if (!isset($_SESSION["name"])) { ?>
                        <a href="login.php">Login</a>
                    <?php } else {?><span >Usuario: </span>
                        <?php echo $_SESSION["name"];
                     } ?>
                    
                    </li>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <li>
                        <a href="misPosteos.php">Mis Posteos</a>
                    </li>
                    <li>
                        <a href="amigos.php">Mis amigos</a>
                    </li>
                    <li>
                        <a href="miPerfil.php">Mi perfil</a>
                    </li>
                    <li>
                        <a href="preguntasFrecuentes.php">Preguntas frecuentes</a>
                    </li> 
                   
                    <li>
                        <a href="contacto.php">Contacto</a>
                    </li>
                    <li>
                        <a href="formulario.php">Registro</a>
                    </li>
                    <li>
                        <a href="deslogueo.php">Deslogueo</a>
                        
                    </li>

                </ul>
            </nav>
        </header>
</html>


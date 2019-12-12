<?php
 //Abro la base de datos
 session_start();
 $base = file_get_contents("usuarios.json");
 $baseDeDatos = json_decode($base,true);
 if (isset($_SESSION["email"])) {
     foreach ($baseDeDatos as $usuario) {
         if ($usuario["email"] == $_SESSION["email"]) {
             $_SESSION["name"] = $usuario["name"];
         }
     }
 }
?>

<header>
            <nav>
                <ul>
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
                    <?php if (!isset($_SESSION["name"])) { ?>
                        <a href="login.php">Login</a>
                    <?php } else {
                        echo $_SESSION["name"];
                     } ?>
                    </li>
                    <li>
                        <a href="contacto.php">Contacto</a>
                    </li>
                    <li>
                        <a href="registro.php">Registro</a>
                    </li>

                </ul>
            </nav>
        </header>
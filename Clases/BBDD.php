<?php

require_once("../controladores/config.php");


class BBDD
{
    private $usuario;
    private $contraseña;
    private $puerto;

    static function conectarse()
    {
        $link = new PDO
        (
            'mysql:host=localhost;dbname=redsocial', 
					'root', 
					'root'
        );
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $link;
    }

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
/*
//$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

	$link = new PDO(
					'mysql:host=localhost;dbname=nombreBBDD', 
					'usuario', 
					'clave'
					);
    //$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
    ###				GUIA para operar con PDO			###
#######################################################


	1.- Conectar				new PDO()
	2.- SQL						$sql = "";
	3.- preparar statement		prepare($sql)
	4.- ejecutar statement		execute()
	[5.- traer datos				fetch() || fetchAll()]


	###				ejemplo				###

	$link = new PDO(----);
	$sql = "SELECT ---- ";
	$stmt = $link->prepare($sql);
	$stmt = execute();

	$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

#######################################################
*/




?>
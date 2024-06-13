<?php

/**NO PUEDO USAR ESTE CODIGO POR QUE ES PARA BASE DE DATOS POSTGRES */
/*
$host='localhost';
$bd='empresafetch';
$user='root';
$pass='';

$conexion= pg_connect("host=$host dbname=$bd user=$user password=$pass");

$query=("INSERT INTO clientes(nombre,correo,telefono,direccion)
	VALUES('$_REQUEST[nombre]','$_REQUEST[correo]',
	'$_REQUEST[tel]','$_REQUEST[direccion]')");

$consulta=pg_query($conexion,$query);
pg_close();
echo 'El cliente fue dado de alta';
*/ 


define("HOST", "localhost"); // Constante 1
define("USER", "root"); // Constante 2, normalmente es root
define("PASSWORD", ""); // Constante de contraseña
define("BDNAME", "empresafetch"); // Conecto a la base de datos en XAMPP

$conexion = new mysqli(HOST, USER, PASSWORD, BDNAME);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$query = "INSERT INTO clientes (nombre, correo, telefono, direccion)
          VALUES ('" . $conexion->real_escape_string($_REQUEST['nombre']) . "', 
                  '" . $conexion->real_escape_string($_REQUEST['correo']) . "', 
                  '" . $conexion->real_escape_string($_REQUEST['tel']) . "', 
                  '" . $conexion->real_escape_string($_REQUEST['direccion']) . "')";

if ($conexion->query($query) === TRUE) {
    echo 'El cliente fue dado de alta';
} else {
    echo 'Error al insertar el cliente: ' . $conexion->error;
}

$conexion->close();


?>
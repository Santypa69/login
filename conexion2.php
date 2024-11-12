<?php
$servidor='localhost';
$basedatos='compania';
$usuario='paquito';
$contrasena='';

$conexion2 = new mysqli($servidor,$usuario,$contrasena,$basedatos);
if ($conexion2->connect_errno)
{
	echo"error de conexion verifique sus datos ";
}
else 
{
	echo "<h1>Conectado listo para usar la base de datos de almacen</h1>";
}
?>
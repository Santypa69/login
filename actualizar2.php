<html>
	<html>
	<head>
		<title>Ejercicio 70</title>
		<meta charset="UTF-8" />
		<style>
			th{
				border : 5px solid gray;
				background : blue;
                text-shadow: black;  
                width: 10%;
				 }

	    </style>
	</head>
	<body>
	<?php
include 'conexion2.php'; 
$consulta = $conexion2 -> query("SELECT nombre, Edad FROM compania WHERE Edad > 21 order by Edad asc;") or die ("Ha fallado la conexión");
	while ( $registro = $consulta -> fetch_assoc() ) {
		echo '<table>'.
		"<th>nombre</th>
		 <th>Edad</th>".

		"<tr>".
		"<td>".$registro['nombre']."</td>".
		"<td>".$registro['Edad']."</td>".
		"</tr>".
		"</table>";
	   }
		$conexion2=null;
?>

<br>

</body>
</html>


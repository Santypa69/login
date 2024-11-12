<html>
<html>

<head>
	<title>Ejercicio 70</title>
	<meta charset="UTF-8" />
	<style>

¡Claro! Te puedo ayudar a mejorar el diseño de tu código HTML y PHP. Para hacerlo más atractivo y organizado, agregaré algunos estilos CSS adicionales para que la tabla se vea más profesional. Aquí tienes una versión mejorada:

php
Copiar código
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 70</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2em;
        }

        /* Styling the table */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
            font-size: 16px;
        }

        td {
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e1e1e1;
        }

        /* Add some spacing below the table */
        .table-container {
            margin-top: 30px;
        }

        /* Add some padding to the container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
	</style>
</head>

<body>
	<?php
	$host = "localhost";
	$user = "paquito";
	$password = "";
	$database = "compania";

	include 'conexion2.php';
	$consulta = $conexion2->query("SELECT nombre,Edad,Fecha,VIP,Provincia FROM compania") or die("Ha fallado la conexión");
	while ($registro = $consulta->fetch_assoc()) {
		echo '<table>' .
			"<th>nombre</th>
				 <th>Edad</th>
				 <th>Fecha</th>
				 <th>VIP</th>
				 <th>Provincia</th>" .

			"<tr>" .
			"<td>" . $registro['nombre'] . "</td>" .
			"<td>" . $registro['Edad'] . "</td>" .
			"<td>" . $registro['Fecha'] . "</td>" .
			"<td>" . $registro['VIP'] . "</td>" .
			"<td>" . $registro['Provincia'] . "</td>" .
			"</tr>" .
			"</table>";
	}
	$conexion2 = null;
	?>

	<br>

</body>

</html>
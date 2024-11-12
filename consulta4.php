<html>	
<head>
	<title>Ejercicio 70</title>
	<meta charset="UTF-8" />
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			padding: 20px;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
		}

		th {
			border: 2px solid gray;
			background-color: #007bff;
			color: white;
			padding: 12px;
			text-align: left;
			text-shadow: 1px 1px 2px black;  
		}

		td {
			border: 1px solid #ddd;
			padding: 10px;
			background-color: white;
			color: #333;
		}

		tr:nth-child(even) {
			background-color: #f9f9f9;
		}

		tr:hover {
			background-color: #e2e2e2;
		}

		h1 {
			text-align: center;
			color: #007bff;
		}

		.container {
			max-width: 800px;
			margin: auto;
			padding: 20px;
			background-color: white;
			border-radius: 8px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Lista de Compañías</h1>
		<?php
			include 'conexion2.php'; 
			$consulta = $conexion2->query("SELECT * FROM compania WHERE Edad > 18;") or die("Ha fallado la conexión");

			echo '<table>';
			echo "<tr>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Provincia</th>
				  </tr>";

			while ($registro = $consulta->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $registro['nombre'] . "</td>";
				echo "<td>" . $registro['Edad'] . "</td>";
				echo "<td>" . $registro['Provincia'] . "</td>";
				echo "</tr>";
			}
			echo '</table>';

			$conexion2 = null;
		?>
	</div>
</body>
</html>

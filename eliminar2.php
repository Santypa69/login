<html>
	<head>
		<title>Ejercicio - DELETE</title>
		<meta charset="UTF-8" />
	</head>
	<style>
		        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
        }

        /* Contenedor principal */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Estilo para el formulario */
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Estilo para el select */
        select {
            padding: 10px;
            font-size: 16px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            max-width: 400px;
            background-color: #fafafa;
        }

        /* Estilo para el botón */
        input[type="submit"] {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #d32f2f;
        }

        /* Estilo para el mensaje de confirmación */
        .message {
            text-align: center;
            margin-top: 20px;
            color: green;
        }
	</style>
	<body>
		<form action="eliminar3.php" method="post">
			<select name="nombreOriginal">
			<?php
				include 'conexion2.php';
				$consulta = $conexion2 -> query ("SELECT nombre FROM compania ORDER BY nombre ASC") or die ("Ha fallado la conexión");
					while ( $registro = $consulta -> fetch_assoc()) {
						echo'<option>'.$registro['nombre'].'</option>';
					}
			?>
			</select>			
			<input type="submit" value="Borrar!!" />
		</form>
	</body>
</html>
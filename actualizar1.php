<html>
<head>
    <title>Ejercicio - Update</title>
    <meta charset="UTF-8" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #80deea);
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            margin-bottom: 20px;
            color: #00796b;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        form {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 300px;
            transition: transform 0.2s;
        }

        form:hover {
            transform: translateY(-5px);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            border: 2px solid #80deea;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 15px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, select:focus {
            border-color: #00796b;
            outline: none;
        }

        input[type="submit"] {
            background-color: #00796b;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #004d40;
            transform: translateY(-2px);
        }

        input[type="submit"]:active {
            transform: translateY(1px);
        }

        @media (max-width: 400px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <h1>Actualizar Datos</h1>
    <form action="" method="post">
        <label for="nombre">Nombre Actual:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="nuevo_nombre">Nuevo Nombre:</label>
        <input type="text" name="nuevo_nombre" id="nuevo_nombre" required>

        <label for="provincia">Nueva Provincia:</label>
        <select name="provincia" id="provincia" required>
            <option value="Madrid">Madrid</option>
            <option value="Sevilla">Sevilla</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Barcelona">Barcelona</option>
        </select>

        <input type="submit" value="Actualizar">
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include 'conexion2.php';

            // Obtener datos del formulario
            $nombre = $_POST['nombre'];
            $nuevo_nombre = $_POST['nuevo_nombre'];
            $provincia = $_POST['provincia'];

            // Preparar y ejecutar la consulta para actualizar el nombre
            try {
                // Actualizar el nombre
                $consulta = $conexion2->prepare("UPDATE compania SET nombre = ? WHERE nombre = ?");
                $consulta->bind_param("ss", $nuevo_nombre, $nombre); // 'ss' indica que son dos cadenas
                $consulta->execute();

                // Verificar si se actualizaron filas
                if ($consulta->affected_rows > 0) {
                    echo '<p style="color: green;">El nombre se ha actualizado correctamente.</p>';
                } else {
                    echo '<p style="color: orange;">No se encontraron registros para actualizar o el nuevo nombre ya está establecido.</p>';
                }
            } catch (mysqli_sql_exception $e) {
                echo '<p style="color: red;">Error al actualizar el registro: ' . $e->getMessage() . '</p>';
            } finally {
                $consulta->close(); // Cerrar la consulta
            }

            // Preparar y ejecutar la consulta para actualizar la provincia
            try {
                $consulta = $conexion2->prepare("UPDATE compania SET provincia = ? WHERE nombre = ?");
                $consulta->bind_param("ss", $provincia, $nuevo_nombre); // Actualizar la provincia con el nuevo nombre
                $consulta->execute();

                // Verificar si se actualizaron filas
                if ($consulta->affected_rows > 0) {
                    echo '<p style="color: green;">La provincia se ha actualizado correctamente.</p>';
                } else {
                    echo '<p style="color: orange;">No se encontraron registros para actualizar la provincia.</p>';
                }
            } catch (mysqli_sql_exception $e) {
                echo '<p style="color: red;">Error al actualizar la provincia: ' . $e->getMessage() . '</p>';
            } finally {
                $conexion2->close(); // Cerrar la conexión
            }
        }
    ?>
</body>
</html>

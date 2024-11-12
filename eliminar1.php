<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Ejercicio - Eliminar Nombres</title>
    <style>
        /* Estilos básicos para la página y tabla */
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
        }

        table {
            width: 80%;
            margin: 0 auto;
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
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Estilo para el botón de eliminación */
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

    <h1>Lista de Nombres de la Tabla "Users"</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                include 'conexion2.php';

                // Si hay un nombre a eliminar, lo procesamos
                if (isset($_GET['delete'])) {
                    $nombre_a_eliminar = $_GET['delete'];

                    // Ejecutar la consulta DELETE para eliminar el registro
                    $consulta_delete = $conexion2->query("DELETE FROM users WHERE nombre = '$nombre_a_eliminar'");

                    if ($consulta_delete) {
                        echo "<p>El nombre '$nombre_a_eliminar' ha sido eliminado correctamente.</p>";
                    } else {
                        echo "<p>Hubo un error al eliminar el nombre.</p>";
                    }
                }

                // Realizamos la consulta para obtener los nombres de la tabla "users"
                $consulta = $conexion2->query("SELECT nombre FROM users ORDER BY nombre ASC") or die("Ha fallado la conexión");

                // Comprobamos si hay registros en la tabla
                if ($consulta->num_rows > 0) {
                    // Iteramos a través de los resultados
                    while ($registro = $consulta->fetch_assoc()) {
                        $nombre = htmlspecialchars($registro['nombre']);
                        echo "<tr>
                                <td>$nombre</td>
                                <td><a href='?delete=$nombre' class='delete-btn' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este registro?\");'>Eliminar</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No se encontraron registros.</td></tr>";
                }

                // Cerramos la conexión
                $conexion2 = null;
            ?>

        </tbody>
    </table>

</body>
</html>

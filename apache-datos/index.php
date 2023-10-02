<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Alumnos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Consulta de Alumnos</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>DNI</th>
    </tr>

    <?php
    $servername = "servicio-mysql"; 
    $username = "root";
    $password = 1234;
    $dbname = "prueba";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta SQL
    $sql = "SELECT id, apellidos, nombres, dni FROM alumnos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los datos en la tabla HTML
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["apellidos"] . "</td>";
            echo "<td>" . $row["nombres"] . "</td>";
            echo "<td>" . $row["dni"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "No se encontraron resultados.";
    }

    // Cerrar conexión
    $conn->close();
    ?>

</table>

<h2>Insertar Nuevo Alumno</h2>
<form method="post">
    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" required><br><br>
    <label for="nombres">Nombres:</label>
    <input type="text" id="nombres" name="nombres" required><br><br>
    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" required><br><br>
    <input type="submit" value="Insertar Alumno">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesar el formulario de inserción
    $apellidos = $_POST["apellidos"];
    $nombres = $_POST["nombres"];
    $dni = $_POST["dni"];

    // Crear una nueva conexión para la inserción
    $conn_insert = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn_insert->connect_error) {
        die("Conexión fallida: " . $conn_insert->connect_error);
    }

    // Consulta SQL para insertar un nuevo alumno
    $sql_insert = "INSERT INTO alumnos (apellidos, nombres, dni) VALUES ('$apellidos', '$nombres', '$dni')";

    if ($conn_insert->query($sql_insert) === TRUE) {
        echo "<p>Alumno insertado con éxito.</p>";
    } else {
        echo "Error al insertar alumno: " . $conn_insert->error;
    }

    // Cerrar conexión de inserción
    $conn_insert->close();
}
?>

</body>
</html>

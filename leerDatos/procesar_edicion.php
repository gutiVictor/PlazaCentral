<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $numero_caja = $_POST['numero_caja'];
    $ref = $_POST['ref']; // Agregar campo Ref

    // Conectarse a la base de datos desde PHP
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "plaza";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Preparar SQL para actualizar los datos usando consultas preparadas
    $sql = "UPDATE tiendaempaques 
            SET codigo_barras = ?, des_Item = ?, cantidad = ?, `num-caja` = ?, ref = ? 
            WHERE id = ?";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("ssiisi", $codigo, $descripcion, $cantidad, $numero_caja, $ref, $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header("Location: leerDatos.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>

<?php
// Conectarse a la base de datos desde PHP
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plaza"; // Nombre base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir y limpiar los datos del formulario
$codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
$descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
$cantidad = (int)$_POST['cantidad'];
$numero_caja = (int)$_POST['numero_caja'];
$ref = mysqli_real_escape_string($conn, $_POST['ref']); // Recibir el dato del campo Ref

// Preparar SQL para insertar los datos, incluyendo la fecha y hora
$sql = "INSERT INTO tiendaempaques (codigo_barras, des_Item, cantidad, `num-caja`, Ref, fecha_registro)
        VALUES ('$codigo', '$descripcion', $cantidad, $numero_caja, '$ref', CURRENT_TIMESTAMP)";

// Ejecutar la consulta 
if ($conn->query($sql) === TRUE) {
    // Redirigir a ingreso_datos.html
    header("Location: ../ingresoDatos/ingresoDatos.html");
    exit(); // Asegurarse de que el script termine aquí para prevenir cualquier salida adicional
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la base de datos
$conn->close();
?>

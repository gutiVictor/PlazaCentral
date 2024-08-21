<?php
// Conectarse a la base de datos

$servername="localhost";
$username="root";
$password="";
$dbname="plaza"; // nombre de la base de datos
// crear la conexión

$conn=new mysqli($servername,$username,$password,$dbname);

// Verificar la coneccion

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Recibir y limpiar los datos  del formulario

$codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
$descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
$cantidad = (int)$_POST['cantidad'];
$numero_caja = (int)$_POST['numero_caja'];
$ref = mysqli_real_escape_string($conn, $_POST['ref']); // Recibir el dato del campo Ref


// Prepara SQL para insertar los datos , incluyendo la fecha y la hora actual

$sql = "INSERT INTO tiendaempaques (codigo_barras, des_Item, cantidad, `num-caja`, Ref, fecha_registro)
        VALUES ('$codigo', '$descripcion', $cantidad, $numero_caja, '$ref', CURRENT_TIMESTAMP)";

       // Ejecutar la consulta 
if ($conn->query($sql) === TRUE) {
    // Redirigir a ingresoDatos.html
    header("Location: ../ingresoDatos/ingresoDatos.html");
    exit(); // Asegurarse de que el script termine aquí para prevenir cualquier salida adicional
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la base de datos
$conn->close();
?>

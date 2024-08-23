<?php
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

//Eliminar  los datos mas antiguos que la fecha de inicio en este caso 10 dias hacia atras

$daysToKeep = 10;  // dias acontar para borrar los datos antiguos
$sqlDelete = "DELETE FROM tiendaempaques WHERE fecha_registro < NOW() - INTERVAL ? DAY";
$stmtDelete = $conn->prepare($sqlDelete);
$stmtDelete->bind_param("i", $daysToKeep);
$stmtDelete->execute();
$stmtDelete->close();


// Obtener parámetros de filtro
$box = isset($_GET['box']) ? $_GET['box'] : '';
$barcode = isset($_GET['barcode']) ? $_GET['barcode'] : '';
$ref = isset($_GET['ref']) ? $_GET['ref'] : '';
$fecha_inicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '';
$fecha_fin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';

// Construir la consulta SQL con filtros
$sql = "SELECT `num-caja` AS box, codigo_barras AS barcode, Ref AS ref, des_Item AS des_Item, SUM(cantidad) AS total 
        FROM tiendaempaques";

$conditions = [];
if (!empty($box)) {
    $conditions[] = "`num-caja` LIKE '%" . $conn->real_escape_string($box) . "%'";
}
if (!empty($barcode)) {
    $conditions[] = "codigo_barras LIKE '%" . $conn->real_escape_string($barcode) . "%'";
}
if (!empty($ref)) {
    $conditions[] = "Ref LIKE '%" . $conn->real_escape_string($ref) . "%'";
}
if (!empty($fecha_inicio) && !empty($fecha_fin)) {
    $conditions[] = "fecha_registro BETWEEN '" . $conn->real_escape_string($fecha_inicio) . " 00:00:00' AND '" . $conn->real_escape_string($fecha_fin) . " 23:59:59'";
}

if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(' AND ', $conditions);
}

$sql .= " GROUP BY `num-caja`, codigo_barras, Ref, des_Item"; // Incluir des_Item en GROUP BY

$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data['message'] = "No se encontraron datos.";
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>

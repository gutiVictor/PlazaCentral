<?php
if (isset($_POST["export"])) {
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "plaza"; // Nombre de la base de datos

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consultar los datos, incluyendo la nueva columna Ref
    $sql = "SELECT id, codigo_barras, des_Item, cantidad, `num-caja`, Ref, fecha_registro FROM tiendaempaques";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="plaza.csv"'); // Nombre del archivo Excel
        header('Cache-Control: max-age=0');

        // Añadir un BOM (Byte Order Mark) para UTF-8
        echo "\xEF\xBB\xBF";

        // Escribir los datos en el archivo CSV
        $output = fopen('php://output', 'w');

        // Escribir los encabezados de la tabla, incluyendo Ref
        fputcsv($output, array('ID', 'Codigo/Barras', 'Descripción', 'Cantidad', 'Número de Caja', 'Ref', 'Fecha Registro'), "\t");

        // Escribir cada fila de datos
        while($row = $result->fetch_assoc()) {
            fputcsv($output, $row, "\t");
        }

        fclose($output);
    } else {
        echo "No se encontraron datos.";
    }

    $conn->close();
    exit;
}
?>

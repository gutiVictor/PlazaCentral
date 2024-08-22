<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

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

    // Preparar SQL para leer los datos específicos, incluyendo Ref
    $sql = "SELECT codigo_barras, des_Item, cantidad, `num-caja`, Ref FROM tiendaempaques WHERE id = $id";
    $result = $conn->query($sql);

// verificar si hay resultados
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No se encontraron datos.";
    exit();
}

//cerrar la conexión
$conn->close();
}else {
    echo "ID no proporcionado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="EditarDatos.css">
    <link rel="icon" href="../logo/PlasticosFenix.png" type="image/png">
    <title>Editar Datos</title>
</head>
<body>
    <div class="container">
        <header>
            <img src="../logo/PlasticosFenixBlanco.png" alt="Plasticos Fenix" class="logo"/>
        </header>

        <main>
            <h1>Editar Datos</h1>
            <form action="procesar_edicion.php" method="post" class="edit-form">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <div class="form-group">
                    <label for="codigo">Codigo/Barras:</label>
                    <input type="text" id="codigo" name="codigo" value="<?php echo htmlspecialchars($row['codigo_barras']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="ref">Ref:</label>
                    <input type="text" id="ref" name="ref" value="<?php echo htmlspecialchars($row['Ref']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción del ítem:</label>
                    <input type="text" id="descripcion" name="descripcion" value="<?php echo htmlspecialchars($row['des_Item']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($row['cantidad']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="numero_caja">Número de caja:</label>
                    <input type="number" id="numero_caja" name="numero_caja" value="<?php echo htmlspecialchars($row['num-caja']); ?>" required>
                </div>

                <div class="button-container">
                    <button type="submit">Actualizar</button>
                    <button type="button" onclick="navigateTo('leerDatos.php')">Cancelar</button>
                </div>
            </form>
        </main>
    </div>

    <script>
        function navigateTo(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>






<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
    <link rel="icon" href="LOGO-BOY-TOYS.png" type="image/png">
    <link rel="stylesheet" href="form_productos.css">
</head>
<body>
    <h1>Agregar Codigo/<br>Descripcion/<br>Referencia</h1>
    <!-- Formulario para agregar o editar un producto -->
    <form id="productForm" method="POST" action="manage_productos.php">
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required>
        <br><br>
        
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" required>
        <br><br>
        
        <label for="ref">Referencia:</label>
        <input type="text" id="ref" name="ref" required>
        <br><br>
        
        <button type="submit" name="action" value="add">Guardar</button>
        <button type="button" onclick="location.href='index.html'">Volver a Inicio</button>
    </form>

    <h2>Lista de Productos</h2>
    <ul id="productList">
        <?php
        $productos = json_decode(file_get_contents('../productos/productos.json'), true);
        foreach ($productos as $codigo => $producto) {
            echo "<li>";
            echo "Código: $codigo, Descripción: {$producto['descripcion']}, Referencia: {$producto['ref']}";
            echo " <a class='edit' href='form_productos.php?action=edit&codigo=$codigo'>Editar</a>";
            /* echo " <a href='manage_productos.php?action=delete&codigo=$codigo'>Eliminar</a>"; */
            echo "</li>";
        }
        ?>
    </ul>

    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['codigo'])) {
        $codigo = $_GET['codigo'];
        $producto = $productos[$codigo];
        echo "<script>
            document.getElementById('codigo').value = '$codigo';
            document.getElementById('descripcion').value = '{$producto['descripcion']}';
            document.getElementById('ref').value = '{$producto['ref']}';
        </script>";
    }
    ?>
</body>
</html>

# Proyecto PlazaCentral

## Descripción

Este proyecto es una aplicación web para la gestión de productos y datos, incluyendo funcionalidades para agregar productos, leer y editar datos, validar cantidades, y exportar información a Excel. Está estructurado en varias carpetas que contienen los diferentes módulos del sistema.

## Estructura del Proyecto

### 1. Carpeta `agregarProductos`
- **`form_productos.php`**: Formulario para agregar productos.
- **`form_productos.css`**: Estilos para el formulario de productos.

### 2. Carpeta `conecction`
- **`conecction.php`**: Archivo de conexión a la base de datos.

### 3. Carpeta `export_excel`
- **`export_excel.php`**: Script para exportar datos a un archivo Excel.

### 4. Carpeta `iconos`
- **Iconos**: Contiene los iconos utilizados en la aplicación.

### 5. Carpeta `informacion`
- **`informacion.html`**: Página de información general.
- **`informacion.css`**: Estilos para la página de información.

### 6. Carpeta `ingresoDatos`
- **`ingresoDatos.html`**: Formulario para el ingreso de datos.
- **`ingresoDatos.css`**: Estilos para el formulario de ingreso de datos.

### 7. Carpeta `leerDatos`
- **`leerDatos.php`**: Script para leer y mostrar los datos almacenados.
- **`leerDatos.css`**: Estilos para la vista de datos.
- **`editar_datos.php`**: Script para editar los datos existentes.
- **`EditarDatos.css`**: Estilos para el formulario de edición de datos.
- **`procesar_edicion.php`**: Script para procesar la edición de los datos.

### 8. Carpeta `lo`
- Carpeta vacía o pendiente de asignación de archivos.

### 9. Carpeta `productos`
- **`productos.json`**: Archivo JSON que contiene información de los productos.

### 10. Carpeta `validacionCantidad`
- **`validacionCantidad.html`**: Página para validar la cantidad de productos.
- **`validacionCantidad.css`**: Estilos para la página de validación de cantidades.
- **`validacionCantidad.php`**: Script para procesar la validación de cantidades.

## Archivos en la Raíz del Proyecto

- **`index.html`**: Página principal del proyecto.
- **`style.css`**: Archivo de estilos principal.
- **`jcript.js`**: Archivo JavaScript con la lógica de la aplicación.
- **`PlazaCentral.sql`**: Script SQL para la creación y configuración de la base de datos.

## Instrucciones de Instalación

1. Clona este repositorio en tu máquina local.
2. Importa el archivo `PlazaCentral.sql` en tu base de datos MySQL.
3. Configura las credenciales de la base de datos en `conecction/conecction.php`.
4. Asegúrate de que tu servidor web esté configurado para servir el proyecto correctamente.
5. Abre `index.html` en tu navegador para comenzar a utilizar la aplicación.

## Uso

- Utiliza el formulario en `agregarProductos/form_productos.php` para agregar nuevos productos a la base de datos.
- Navega a `leerDatos/leerDatos.php` para visualizar, editar o eliminar productos existentes.
- Usa `validacionCantidad/validacionCantidad.html` para validar y verificar cantidades de productos.
- Puedes exportar los datos a un archivo Excel usando el script `export_excel/export_excel.php`.

## Créditos

- Proyecto desarrollado por **Víctor Raúl Gutiérrez Sanabria**.
- Contacto: [gutierrezsanabria@gmail.com](mailto:gutierrezsanabria@gmail.com)

## Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo LICENSE para más detalles.

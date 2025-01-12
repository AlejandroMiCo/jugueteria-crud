<?php
require_once "../modelo/modelo.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $proveedor = $_POST['proveedor'];
    $descuento = isset($_POST['descuento']) ? "Si" : "No";
    $imagen = $_FILES['imagen']['name'];

    $juguete = new Juguete();
    $resultado = $juguete->actualizar($id, $nombre, $precio, $proveedor, $descuento, $imagen);

    if ($resultado) {
        header("Location: ../vistas/vista_actualizar.php?id=$id&update=success");
    } else {
        header("Location: ../vistas/vista_actualizar.php?id=$id&update=fail");
    }
}

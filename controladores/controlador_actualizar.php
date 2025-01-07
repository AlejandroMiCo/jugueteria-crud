<?php
if (
    isset($_POST['id']) && is_numeric($_POST['id']) &&
    isset($_POST['nombre']) && (!empty($_POST['nombre'])) &&
    isset($_POST['precio']) && (!empty($_POST['precio'])) &&
    isset($_POST['proveedor']) && (!empty($_POST['proveedor']))
) {

    require_once "../modelo/modelo.php";
    $juguete = new Juguete();
    $datos = $juguete->actualizar(
        $_POST['id'],
        $_POST['nombre'],
        $_POST['precio'],
        $_POST['proveedor'],
        isset($_POST['descuento']) ? "Si" : "No",
        $_POST['imagen']
    );
}

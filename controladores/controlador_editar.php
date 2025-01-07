<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    require_once "../modelo/modelo.php";
    $juguete = new Juguete();
    $datos = $juguete->editar($_GET['id']);
    require_once "../vistas/vista_actualizar.php";
}
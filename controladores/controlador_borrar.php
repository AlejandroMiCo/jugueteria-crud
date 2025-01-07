<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        require_once "../modelo/modelo.php";
        $juguete = new Juguete();
        $resultado2 = $juguete->borrar($_GET['id']);
    }
}
require "../controladores/controlador.php";

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/estilos.css" type="text/css">
    <link rel="icon" href="../componentes/icon/toys.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header class="bg-primary p-3 fixed-top d-flex align-items-center">
        <div>
            <img src="../componentes/img/logo.webp" alt="" class="img-fluid" width="64" height="64">
        </div>
        <div class="ms-auto">
            <a class="btn align-self-end p-0" href="../controladores/controlador_borrar.php?id={$datos[$i]['id']}">
                <img class="retu" src="../componentes/img/return.png" width="32" height="32"/>
            </a>
        </div>
    </header>
    <div class="container mt-5 pt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4 p-2 mt-2">
            <?php
            for ($i = 0; $i < count($datos); $i++) {
                $flag = $datos[$i]['descuento'] == "Si";
                $precioConDescuento = $datos[$i]['precio'] * 0.75;
                echo "<div class=\"col\">";
                echo "<div class=\"card h-100 card-hover\">";
                echo "<img src=\"{$datos[$i]['imagen']}\" class=\"card-img-top\" alt=\"Imagen del juguete\" height=\"200\">";
                echo "<div class=\"card-body\">";
                echo "<h5 class=\"card-title text-primary\">{$datos[$i]['nombre']}</h5>";
                echo "<p class=\"card-text\">Proveedor: {$datos[$i]['proveedor']}</p>";
                echo "<div style=\"display: flex; align-items: center\">";
                if ($flag) {
                    echo "<h3 class=\"card-text text-danger p-2\">{$precioConDescuento}€</h3>";
                }
                echo "<p class=\"card-text ";
                if ($flag) {
                    echo "text-decoration-line-through text-muted";
                }
                echo "\">{$datos[$i]['precio']}€</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
<style>
    .retu{
        transition: 0.5s;
    }
    .retu:hover{
        transition: 0.5s;
        transform: scale(1.25);
    }
    .card-hover {
        border: 1px solid transparent;
        transition: 0.3s;

        &:hover {
            border: 1px solid #0d6efd;
            transform: scale(1.05);
            transition: 0.3s;
        }
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Juguetes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/estilos.css">

</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Catálogo de Juguetes</h1>
        <div class="d-flex justify-content-end p-2 ">
            <a class="btn bg-success text-white" href="../index.php">Añadir juguete</a>
        </div>
        <div>
            <table class="table table-hover table-borderless align-middle bg-white rounded">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Proveedor</th>
                        <th>Descuento</th>
                        <th>Imagen</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($datos); $i++) {
                        echo "<tr class=\"align-items-middle\">";
                        echo "<td class=\"align-middle\">{$datos[$i]['nombre']}</td>";
                        echo "<td>{$datos[$i]['precio']}</td>";
                        echo "<td>{$datos[$i]['proveedor']}</td>";
                        echo "<td>{$datos[$i]['descuento']}</td>";
                        echo "<td><img src=\"{$datos[$i]['imagen']}\" alt=\"Not found\"></td>";
                        echo "<td class=\"align-items-middle\">
                    <a class=\"btn edit\" href=\"../controladores/controlador_editar.php?id={$datos[$i]['id']}\"><img src=\"../img/boton-editar.png\"></a>
                    </td>";
                        echo "<td class=\"align-items-middle\">
                    <a class=\"btn delete\" href=\"../controladores/controlador_borrar.php?id={$datos[$i]['id']}\"><img src=\"../img/boton-borrar.png\"</a>
                    </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('update')) {
                var updateStatus = urlParams.get('update');
                var toastEl;
                if (updateStatus === 'success') {
                    toastEl = document.getElementById('toastSuccessUpdate');
                } else if (updateStatus === 'fail') {
                    toastEl = document.getElementById('toastFailUpdates');
                }
                if (toastEl) {
                    var toast = new bootstrap.Toast(toastEl);
                    toast.show();
                }
            }
        });
    </script>
</body>

</html>

<style>
</style>
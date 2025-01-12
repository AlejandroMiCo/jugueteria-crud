
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Juguete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/estilos.css" type="text/css">
    <link rel="icon" href="../componentes/icon/toys.png" type="image/x-icon">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <form class="bg-white p-3 bg-opacity-10 rounded-3" action="../controladores/controlador_actualizar.php" method="post" enctype="multipart/form-data">
                <h1 class="d-flex justify-content-center mb-4">Juguete a actualizar</h1>
                <?php
                require_once "../modelo/modelo.php";
                $juguete = new Juguete();
                $datos = $juguete->editar($_GET['id']);
                ?>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="nombre" placeholder="" required value="<?php echo $datos['nombre'] ?>">
                    <label for="name">Nombre del juguete</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" required placeholder="" value="<?php echo $datos['precio'] ?>">
                    <label for="precio">Precio del juguete</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="" required value="<?php echo $datos['proveedor'] ?>">
                    <label for="proveedor">Proveedor del juguete</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="descuento" name="descuento" <?php echo $datos['descuento'] ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="descuento">Descuento del juguete</label>
                </div>

                <div class="form mb-3">
                    <label for="imagen" class="form-label">Imagen del juguete</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                    <input type="hidden" name="imagen_actual" value="<?php echo $datos['imagen']; ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"><br>
                <div class="d-flex justify-content-end">
                    <a href="../controladores/controlador.php" type="button" class="btn btn-outline-danger me-2">Regresar</a>
                    <button type="submit" class="btn btn-primary">Actualizar juguete</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Toast -->
    <div id="toastSuccessUpdate" class="toast text-white bg-success position-fixed top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Juguete actualizado con éxito
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    <div id="toastFailUpdates" class="toast text-white bg-danger position-fixed top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Error al actualizar el juguete
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
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
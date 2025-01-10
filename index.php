<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controlador primario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/estilos.css" type="text/css">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <form action="#" method="post" class="bg-white p-3 bg-opacity-10 rounded-3 shadow-lg">
                <h2 class="d-flex justify-content-center mb-4">Solicitud para añadir un juguete</h2>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="nombre" placeholder="" required>
                    <label for="name">Nombre del juguete</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01" required placeholder="">
                    <label for="precio">Precio del juguete</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="" required>
                    <label for="proveedor">Proveedor del juguete</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="descuento" id="descuento">
                    <label class="form-check-label" for="descuento">Descuento del juguete</label>
                </div>
                <div class="form mb-3">
                    <label for="imagen" class="form-label">Imagen del juguete</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>
                <div class="d-flex justify-content-end">
                    <a href="controladores/controlador.php" type="button" class="btn btn-outline-danger me-2">Regresar</a>
                    <button type="submit" class="btn btn-primary">Añadir juguete</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Toast -->
    <!-- Exito -->
    <div id="toastSuccess" class="toast text-white bg-success position-fixed top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Juguete añadido con exito
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    
    <!-- Error -->
    <div id="toastFail" class="toast text-white bg-danger position-fixed top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Error al añadir el juguete

            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (
            isset($_POST['nombre']) && (!empty($_POST['nombre'])) &&
            isset($_POST['precio']) && (!empty($_POST['precio'])) &&
            isset($_POST['proveedor']) && (!empty($_POST['proveedor'])) &&
            isset($_POST['imagen']) && (!empty($_POST['imagen']))
        ) {
            require_once "modelo/modelo.php";
            $juguete = new Juguete();
     
            $resultado = $juguete->setJuguete(
                $_POST['nombre'],
                $_POST['precio'],
                $_POST['proveedor'],
                isset($_POST['descuento']) ? "Si" : "No",
                $_POST['imagen']
            );
            
            if ($resultado) {
                echo "<script>
                var toastEl = document.getElementById('toastSuccess');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
              </script>";
            }
        } else {
            echo "<script>
            var toastEl = document.getElementById('toastFail');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
          </script>";
        }
    }
    ?>

</body>

</html>
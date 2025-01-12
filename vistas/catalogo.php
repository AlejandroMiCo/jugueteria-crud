<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Juguetes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/estilos.css">
    <link rel="icon" href="../componentes/icon/toys.png" type="image/x-icon">

</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Catálogo de Juguetes</h1>
        <div class="d-flex justify-content-end pb-2 gap-1">
            <a class="btn bg-warning text-white gap" href="../controladores/controlador_clientes.php">Catalogo cliente</a>
            <a class="btn bg-success text-white" href="../index.php">Añadir juguete</a>
        </div>

        <div>
            <table class="table table-borderless align-middle bg-white rounded p-3">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Proveedor</th>
                        <th>Descuento</th>
                        <th>Imagen</th>
                        <th class="d-flex justify-content-end">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($datos); $i++) {
                        echo "<tr class=\"align-items-middle\">";
                        echo "<td>{$datos[$i]['nombre']}</td>";
                        echo "<td>{$datos[$i]['precio']}</td>";
                        echo "<td>{$datos[$i]['proveedor']}</td>";
                        echo "<td>{$datos[$i]['descuento']}</td>";
                        echo "<td><img src=\"{$datos[$i]['imagen']}\" alt=\"Not found\"></td>";    //TODO conseguir una imagen alternativa
                        echo "<td>
                        <div class=\"d-flex justify-content-end gap-2\">
                    <a class=\"btn edit\" href=\"../controladores/controlador_editar.php?id={$datos[$i]['id']}\">
                    
                     <span>Editar</span>  <img src=\"../componentes/img/boton-editar.png\"/></a>
                   
                    <a class=\"btn delete\" href=\"../controladores/controlador_borrar.php?id={$datos[$i]['id']}\">
                        <span>Eliminar</span>
                    <img src=\"../componentes/img/boton-borrar.png\"/></a>
                    </div>
                    </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
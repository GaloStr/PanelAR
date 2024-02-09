<!-- Agrega la biblioteca de SweetAlert -->


<?php

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros
        case 'editar':
            editar();
            break;
    }
}

function editar()
{

    extract($_POST);
    require_once("db.php");

    $consulta = "UPDATE documento SET nombre = '$nombre', descripcion = '$descripcion', 
    apellido = '$apellido' WHERE id = '$id' ";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../views/index.php');
              });
    });
        </script>";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../views/index.php');
              });
    });
        </script>";
    }
}

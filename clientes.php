<?php
require('connect.php');
include 'files/sidebar.php';
include 'files/nav.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["borrarCliente"])) {
        $clienteID = $_POST["clienteID"];
        
        $deleteSql = "DELETE FROM usuario WHERE id = $clienteID";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Cliente eliminado con éxito";
        } 
		else {
            echo "Error al eliminar el cliente: " . $conn->error;
        }
    } elseif (isset($_POST["nombre"]) && isset($_POST["dni"])) {
        $nombre = $_POST["nombre"];
        $dni = $_POST["dni"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];

        $insertSql = "INSERT INTO usuario (nombre,dni, email, telefono) VALUES ('$nombre', '$dni', '$correo', '$telefono')";

        if ($conn->query($insertSql) === TRUE) {
            echo "Cliente insertado con éxito";
        } else {
            echo "Error al insertar el cliente: " . $conn->error;
        }
    }
}

$sql = "SELECT * FROM usuario";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<title>IphoneAR</title>
</head>
<style>
  body, p, a, h1, h2, h3, h4, h5, h6 {
    text-decoration: none;
}
</style>
<body>
	<section id="content">
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Clientes</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Clientes</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Inicio</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Descargar PDF</span>
				</a>
			</div>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Clientes</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Usuario</th>
								<th>DNI</th>
                                <th>Telefono</th>
                                <th>Correo</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
                        <?php
								$result = $conn->query($sql);
								while ($fila = $result->fetch_assoc()) :
						?>
							<tr>
								<td><?php echo $fila['Nombre']; ?></td>
								<td><?php echo $fila['DNI']; ?></td>
                                <td><?php echo $fila['Telefono']?></td>
                                <td><?php echo $fila['email']?></td>
								<td>
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#borrar<?php echo $fila['DNI']; ?>">
                                        <i class="bi bi-trash"></i>
                                    </button>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $fila['DNI']; ?>">
                                        <i class="fa fa-edit "></i>
                                    </button>
                                </td>
								<?php include "files/editar.php"; ?>
								<?php endwhile; ?>
							</tr>
						</tbody>
					</table>
				</div>
                <div class="table-carga">
                    <div class="todo">
                        <div class="head">
                            <h3>Cargar Cliente</h3>
                        </div>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <table>
                                <tr>
                                    <td>
                                        <label for="nombre">Nombre:</label>
                                    </td>
                                    <td>
                                        <input style="border: 0px" type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="dni">DNI:</label>
                                    </td>
                                    <td>
                                        <input style="border: 0px" type="number" name="dni" id="dni" placeholder="Ingrese el DNI" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Telefono:</label>
                                    </td>
                                    <td>
                                        <input style="border: 0px" type="text" name="telefono" id="telefono" placeholder="Ingrese el telefono" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Correo:</label>
                                    </td>
                                    <td>
                                        <input style="border: 0px" type="text" name="correo" id="correo" placeholder="Ingrese el correo" required>
                                    </td>
                              </tr>
                                <tr>
                                    <td colspan="2">
										<br><br>
                                        <button style="border: 0px" type="submit" class="btn-cargar">Cargar</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>	
				</div>
			</div>
		</main>
	</section>

	<script src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
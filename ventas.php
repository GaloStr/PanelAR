<?php
include 'connect.php';
include 'files/nav.php';
include 'files/sidebar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["borrarVenta"])) {
        $ventaid = $_POST["ventaID"];
        
        $deleteSql = "DELETE FROM ventas WHERE id = $ventaid";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Venta eliminada con éxito";
        } else {
            echo "Error al eliminar la venta: " . $conn->error;
        }
    } elseif (isset($_POST["ventasid"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["idproducto"]) && isset($_POST["fecha"])) {
		$ventasid = $_POST["ventasid"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $idproducto = $_POST["idproducto"];
        $fecha = $_POST["fecha"];

        $insertSql = "INSERT INTO ventas (ventasid, nombre, apellido, idproducto, fecha) VALUES ( '$ventasid', '$nombre', '$apellido', '$idproducto', '$fecha')";

        if ($conn->query($insertSql) === TRUE) {
            echo "Venta insertada con éxito";
        } else {
            echo "Error al insertar la venta: " . $conn->error;
        }
    }
}

$sql = "SELECT * FROM ventas INNER JOIN usuario ON ventas.DNI = usuario.DNI GROUP BY ventas.Id";
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
		<main>
			<div class="head-title">
			<div class="left">
					<h1>Ventas</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Ventas</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="index.php">Inicio</a>
						</li>
					</ul>
				</div>
				<div class="table-data" >
				<div class="order shadow-lg p-3">
				<table>
					<thead>
						<tr>
						<th scope="col">ID Venta</th>
						<th scope="col">Nombre</th>
						<th scope="col">Fecha de Venta</th>
						<th scope="col">DNI</th>
						<th scope="col">Acciones</th>
						</tr>
					</thead>
					<tbody>
					<?php
                        while ($fila = $result->fetch_assoc()) :
                            ?>
                            <tr>
                                <td><?php echo $fila['Id']; ?></td>
                                <td><?php echo $fila['Nombre']; ?></td>
                                <td><?php echo $fila["Fecha"]; ?></td>
                                <td><?php echo $fila["DNI"]; ?></td>
                                <td>
									<a href="../includes/download.php?id=<?php echo $fila['Id']; ?>" class="btn btn-primary">
                                        <i class="fas fa-download"></i></a>

                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo $fila['Id']; ?>">
                                        <i class="fa fa-edit "></i>
                                    </button>
                                </td>
                                <?php include "files/editar.php"; ?>
                            </tr>
                        <?php endwhile;
                    ?>
					</tbody>
				</table>
                </div>				
			<div class="table-carga shadow-lg p-3">
				<div class="todo">
					<div class="head">
						<h3>Cargar Venta</h3>
					</div>
					<table>
						<tr>
							<td>
								<label for="nombre">Nº Venta:</label>
							</td>
							<td>
								<input style="border: 0px" type="text" id="ventasid" placeholder="Ingrese el nº de venta...">
							</td>
						</tr>
						<tr>
							<td>
								<label style="border: 0px" for="nombre" require>Nombre:</label>
							</td>
							<td>
								<input style="border: 0px" type="text" id="nombre" placeholder="Ingrese el nombre...">
							</td>
						</tr>
						<tr>
							<td>
								<label for="apellido" require>Apellido:</label>
							</td>
							<td>
								<input style="border: 0px" type="text" id="apellido" placeholder="Ingrese el apellido...">
							</td>
						</tr>
						<tr>
							<td>
								<label for="Producto" require>Producto:</label>
							</td>
							<td>
							<select class="form-select" aria-label="Default select example">
								<option selected>Open this select menu</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
							</td>
						</tr>
						<tr>
							<td>
								<label for="fecha" require>Fecha:</label>
							</td>
							<td>
								<input style="border: 0px" type="date" id="fecha">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<br><br>
								<button type="submit" class="btn btn-outline-primary">Cargar</button>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</main>
	</section>
	<script src="script.js"></script>
<?php include "files/agregar.php"; ?>
</body>
</html>
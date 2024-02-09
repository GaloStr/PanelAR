<?php
include 'connect.php';
include 'files/nav.php';
include 'files/sidebar.php';


// CLIENTES
$sqlClientes = "SELECT COUNT(*) AS cantidadClientes FROM Usuario";
$resultClientes = $conn->query($sqlClientes);
$rowClientes = $resultClientes->fetch_assoc();
$cantidadClientes = $rowClientes['cantidadClientes'];

// VENTAS
$sqlVentas = "SELECT COUNT(*) AS totalVentas FROM Ventas";
$resultVentas = $conn->query($sqlVentas);
$rowVentas = $resultVentas->fetch_assoc();
$totalVentas = $rowVentas['totalVentas'];

// INGRESOS
$sqlIngresos = "SELECT SUM(Monto) AS ingresosTotales FROM Ventas";
$resultIngresos = $conn->query($sqlIngresos);
$rowIngresos = $resultIngresos->fetch_assoc();
$ingresosTotales = $rowIngresos['ingresosTotales'];

// PRODUCTOS
$sqlProductos = "SELECT SUM(Cantidad) AS cantidadTotalProductos FROM Productos";
$resultProductos = $conn->query($sqlProductos);
$rowProductos = $resultProductos->fetch_assoc();
$cantidadTotalProductos = $rowProductos['cantidadTotalProductos'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<title>IphoneAR</title>
</head>
<body>
<main>
	<div class="head-title">
		<div class="left">
			<h1>Panel</h1>
			<ul class="breadcrumb">
				<li>
					<a href="#">Panel</a>
				</li>
				<li><i class='bx bx-chevron-right'></i></li>
				<li>
					<a class="active" href="#">Inicio</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="analytics">
            <div class="card">
                <div class="card-head">
                    <h2 class="cantidadcliente"><?php echo $cantidadClientes; ?></h2>
                    <span class="las la-user-friends"></span>
                </div>
                <div class="card-progress">
                    <small>Clientes</small>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2 class="totalventas"><?php echo $totalVentas; ?></h2>
                    <span class="las la-store"></span>
                </div>
                <div class="card-progress">
                    <small>Ventas</small>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2 class="ingresosdeventas">$<?php echo $ingresosTotales; ?></h2>
                    <span class="las la-shopping-cart"></span>
                </div>
                <div class="card-progress">
                    <small>Ingresos</small>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2 class="cantidadproductos"><?php echo $cantidadTotalProductos; ?></h2>
                    <span class="las la-laptop"></span>
                </div>
                <div class="card-progress">
                    <small>Productos en Stock</small>
                </div>
            </div>
        </div>
		</main>
	</section>
	<script src="script.js"></script>
</body>
</html>
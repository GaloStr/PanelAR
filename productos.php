<?php
require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["borrarProducto"])) {
    if (isset($_POST["productoID"])) {
        $productoID = $_POST["productoID"];
        
        $deleteSql = "DELETE FROM Productos WHERE Id = $productoID";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Producto eliminado con éxito";
            header("Location: productos.php");
            exit();
        } else {
            echo "Error al eliminar el producto: " . $conn->error;
        }
    }
}

$sql = "SELECT Id, Nombre, Precio, Cantidad FROM Productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">

	<title>IphoneAR</title>
</head>
<body>
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">IphoneAR</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text" id="panel-link">Panel</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text" id="clientes-link">Clientes</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text" id="ventas-link">Ventas</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text" id="productos-link">Productos</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Ajustes</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Cerrar Sesion</span>
				</a>
			</li>
		</ul>
	</section>

	<section id="content">
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categorias</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Buscar...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">1</span>
			</a>
			<a href="#" class="profile">
				<img src=img/people.png></a>

			</a>
		</nav>

		<main>
			<div class="head-title">
				<div class="left">
					<h1>Producto</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Producto</a>
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
                                <th>Cod Producto</th>
								<th>Producto</th>
								<th>Precio</th>
								<th>Stock</th>
								<th>Acciones</th>
							</tr>
						</thead>
						
						<tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Id"] . "</td>";
                            echo "<td>" . $row["Nombre"] . "</td>";
                            echo "<td>" . $row["Precio"] . "</td>";
                            echo "<td>" . $row["Cantidad"] . "</td>";
                            echo "<td>
                                <button class='btn-modify' data-productid='" . $row["Id"] . "'>Modificar</button>
                                <form method='post' action='" . $_SERVER['PHP_SELF'] . "' style='display: inline;'>
                                    <input type='hidden' name='productoID' value='" . $row["Id"] . "'>
                                    <button type='submit' name='borrarProducto' class='btn-delete' onclick='return confirm(\"¿Está seguro de que desea eliminar este producto?\")'>Borrar</button>
                                </form>
                            </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No se encontraron productos.</td></tr>";
                    }
                    ?>
                </tbody>

					</table>
				</div>
			<div class="table-carga">
				<div class="todo">
					<div class="head">
						<h3>Cargar Producto</h3>
					</div>
					<table>
						<tr>
							<td>
								<label for="codigo" require>Cod Producto:</label>
							</td>
							<td>
								<input style="border: 0px" type="text" id="codigo" placeholder="Ingrese el codigo">
							</td>
						</tr>
						<tr>
							<td>
								<label for="producto" require>Producto:</label>
							</td>
							<td>
								<input style="border: 0px" type="text" id="producto" placeholder="Ingrese el nombre del producto">
							</td>
						</tr>
						<tr>
							<td>
								<label for="precio">Precio</label>
							</td>
							<td>
								<input style="border: 0px" type="number" id="precio" placeholder="Ingrese el precio del producto">
							</td>
						</tr>
						<tr>
							<td>
								<label for="stock" require>Stock:</label>
							</td>
							<td>
								<input style="border: 0px" type="number" id="stock" placeholder="Ingrese el stock">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<br><br>
								<button class="btn-modify">Cargar</button>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</main>
	</section>
	
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Modificar Producto</h2>
            <form id="modifyForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" id="productoID" name="productoID">
                <label for="newProductName">Nuevo Nombre:</label>
                <input type="text" id="newProductName" name="newProductName">
                <button type="submit">Aceptar</button>
            </form>
        </div>
    </div>


	<script src="script.js"></script>
</body>
</html>
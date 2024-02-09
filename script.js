// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})

const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})

const panelLink = document.getElementById('panel-link');
const clientesLink = document.getElementById('clientes-link');
const ventasLink = document.getElementById('ventas-link');
const productosLink = document.getElementById('productos-link');

panelLink.addEventListener('click', function () {
    window.location.href = 'index.php';
});

clientesLink.addEventListener('click', function () {
    window.location.href = 'clientes.php';
});

ventasLink.addEventListener('click', function () {
    window.location.href = 'ventas.php';
});

productosLink.addEventListener('click', function () {
    window.location.href = 'productos.php';
});

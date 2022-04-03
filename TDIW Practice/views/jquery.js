
function loadProductos(id){
	$('section').load("./index.php?accio=lista_productos&categoria="+id);
}

function loadDetalles(id){
	$('section').load("./index.php?accio=detalle_producto&producto="+id);
}

function loadCarrito(){
	$('section').load("./index.php?accio=ver_carrito");
}

function vaciarCarrito(){
	$('body').load("./index.php?accio=vaciar_carrito");
    actualizar_Carrito();
}
function gotoLogin(){
    $('body').load("./index.php?accio=login");
}

function actualizar_Carrito(){
    $.ajax({
        url: "index.php?accio=actualizar_carrito", context: document.body
    }).done(function(data){$('#carrito').html(data);});
}

function addcarrito(id){

    var cantidad = document.getElementById(("Cantidad_"+id)).value;
    
    $.ajax({
        url: "index.php?accio=añadir_carrito&id="+id+"&cantidad="+cantidad, context: document.body
    }).done(function(data){$('body').html(data); actualizar_Carrito();});
}

function confirmarCompra(){
    $('body').load("./index.php?accio=confirmar_compra");
    actualizar_Carrito();
}

function menu_desplegable(){
    document.getElementById("myDropdown").classList.toggle("show");
}

function menu_desplegable_carrito(){
    document.getElementById("myDropdownCarrito").classList.toggle("show");
}
window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
        if (!event.target.matches('.dropbtnc')) {           
            var myDropdown = document.getElementById("myDropdownCarrito");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
}
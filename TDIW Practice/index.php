<?php
session_start();

if (isset($_GET['accio']))
{	
	$accio = $_GET['accio'];
}else{
    if (isset($_POST['accio']))
    {   
        $accio = $_POST['accio'];
    }else{
        $accio = null;
    }
}

switch($accio){
    case 'categories':
        include __DIR__.'/categories_recurs.php';
        break;
    case 'lista_productos':
        $categoria = null;

        if(isset($_GET['categoria'])){
            $categoria = $_GET['categoria'];
        }

        include __DIR__.'/productos_recurs.php';
        break;
    case 'detalle_producto':
        $producto = null;

        if(isset($_GET['producto'])){
            $producto = $_GET['producto'];
        }
        include __DIR__.'/detall_producto_recurs.php';
        break;
    case 'registro':
        include __DIR__.'/registro_recurs.php';
        break;
    case 'login':
        include __DIR__.'/login_recurs.php';    
        break;
    case 'edita_perfil':
        include __DIR__.'/edita_perfil_recurs.php';
        break;
    case 'hist_pedidos':
        include __DIR__.'/hist_pedidos_recurs.php';
        break;
    case 'logout':
        include __DIR__.'/logout_recurs.php';
        break;
    case 'ver_carrito':
        include __DIR__.'/ver_carrito_recurs.php';
        break;
    case 'añadir_carrito':
        $pID = null;

        if(isset($_GET['id'])){
            $pID = $_GET['id'];
        }

        $cantidad = null;

        if(isset($_GET['cantidad'])){
            $cantidad = $_GET['cantidad'];
        }
        include __DIR__.'/añadir_carrito_recurs.php';
        break;
    case 'actualizar_carrito':
        include __DIR__.'/actualizar_carrito_recurs.php';
        break;
    case 'vaciar_carrito':
        include __DIR__.'/vaciar_carrito_recurs.php';
        break;
    case 'confirmar_compra':
        include __DIR__.'/confirmar_compra_recurs.php';
        break;
    default:
        include __DIR__.'/categories_recurs.php';
        break;
    }
?>
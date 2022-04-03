<?php

require __DIR__.'/../model/connectaBD.php';

function getCategories(){
    try {
    	// Conectamos con la base de datos.
        $conn = connectaBD(); 
        // Realizamos una consulta para guardar las categorias.
        $consulta = $conn->prepare("SELECT * FROM Categoria");
        $consulta->execute();
        $categories = $consulta->fetchAll(PDO::FETCH_ASSOC);
        // Cerramos la conexion de la bd.
        $conn = null; 
    } catch (PDOException $e) { 
    	echo "Error: " . $e->getMessage(); 
    }
    
    return $categories;
}

function getProductosDeCategoria($categoria){
    try {   
        $conn = connectaBD();
        $consulta = $conn->prepare("SELECT * FROM Producto WHERE Categoria_ID = $categoria");
        $consulta->execute();
        $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }

    return $productos;
}

function getDetall_Producte($id){
    try {
        $conn = connectaBD();
        $consulta = $conn->prepare("SELECT * FROM Producto WHERE ID_Producto = $id");
        $consulta->execute();
        $producto = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    return $producto;
}

?>
<?php

require __DIR__.'/../model/connectaBD.php';

function getPedidos($id){

    try {

        $conn = connectaBD();
        $consulta = $conn->prepare("SELECT * FROM Pedido WHERE Usuario_ID = $id");
        $consulta->execute();
        $factura = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    return $factura;
}

function getLineas($id){

    try {

        $conn = connectaBD();

        $sql= 'SELECT * FROM Linea_Pedidos WHERE Pedido_ID = :id';
        $consulta = $conn->prepare($sql);
        $consulta->bindParam('id', $id);
        $consulta->execute();
        $datos = $consulta->fetchAll();
        $conn = null;


    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    return $datos;

}


?>
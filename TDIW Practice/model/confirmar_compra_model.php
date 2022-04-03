<?php

require __DIR__.'/../model/connectaBD.php';

function guardar_Pedido($fecha, $n_elementos, $precio_total, $user_id){

    try {

        $conn = connectaBD();

        $datos = [

            'fecha' => $fecha,
            'elementos' => $n_elementos,
            'precio' => $precio_total,
            'id' => $user_id,
        ];


        $sql = "INSERT INTO Pedido (Fecha_Pedido, Numero_Elementos, Precio, Usuario_ID) VALUES (:fecha, :elementos, :precio, :id)";
        $consulta = $conn->prepare($sql);
        $consulta->execute($datos);

        $conn = null;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}
function getPedidosID ($user_id){

    try {

        $conn = connectaBD();

        $sql= 'SELECT max(ID_Pedido) as ID_Pedido FROM Pedido WHERE Usuario_ID = :id';
        $consulta = $conn->prepare($sql);
        $consulta->bindParam('id', $user_id);
        $consulta->execute();
        $datos = $consulta->fetchAll();


    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    return $datos;
}



function guardar_Linia_Pedido($cant, $pedido_id, $prod_id, $prod_name, $precio_unitario, $precio_ptotal){

    try {

        $conn = connectaBD();

        $datos = [

            'cantidad' => $cant,
            'pedido_id' => $pedido_id,
            'producto_id' => $prod_id,
            'nombre' => $prod_name,
            'precio_uni'=> $precio_unitario,
            'total' => $precio_ptotal,
        ];


        $sql = "INSERT INTO Linea_Pedidos (Cantidad, Pedido_ID, Producto_ID, Nombre, Precio_Unitario, Precio_Total) VALUES (:cantidad, :pedido_id, :producto_id, :nombre, :precio_uni, :total)";
        $consulta = $conn->prepare($sql);
        $consulta->execute($datos);
        $conn = null;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}


?>
<?php
require __DIR__.'/../model/connectaBD.php';

function comprobar($mail)
{

    try {

        $conn = connectaBD();

        $sql = $conn->prepare("SELECT * FROM Usuario WHERE Correo = :mail");
        $sql->bindParam('mail', $mail);
        $sql->execute();
        $conn = null;

    } catch (PDOException $e) {

        echo "Error: " . $e->getMessage();

    }

    return $sql;
}

?>
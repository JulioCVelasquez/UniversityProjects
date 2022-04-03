<?php 	
function connectaBD(){
    
            $servidor = "localhost"; 
     	    $dbname = "tdiwm10";
   			$usuari = "tdiw-m10";
   			$clau = "1_siGZMc";

            try {
                  $conn = new PDO("mysql:host=$servidor;dbname=$dbname;charset=UTF8", $usuari, $clau);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) { echo "Error: " . $e->getMessage();}

            return ($conn);
}
?>
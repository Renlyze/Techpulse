<?php
    include 'db_connection.php';

    $prodID = $_GET['id'];
    $query = "DELETE FROM inventory WHERE ProdID = '$prodID'";

    $data = mysqli_query($connection, $query);
    
    if($data){
        header("Location: ../landingpage.php");
    }

?>
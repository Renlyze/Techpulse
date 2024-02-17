<?php 
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $productname = $_POST['product-name'];
    $productid = $_POST['product-id'];
    $stock = $_POST['stock'];
    $price = $_POST['prices'];

    $sql = "SELECT * FROM inventory WHERE 'ProdID' = ? ";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "s", $productid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    

        $sql = "UPDATE inventory SET `ProdName` = ?, `Stock` = ?, `Price ($)` = ? WHERE `ProdID` = ?";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "sids", $productname, $stock, $price, $productid);
        $result = mysqli_stmt_execute($stmt);

    if($result) {
        header('Location: ../landingpage.php');
        exit();
    } else {
        header('Location: ../updateitem.php?error=insertion_failed');
        exit();
    }

} else {
    header('Location: ../updateitem.php');
}

?>
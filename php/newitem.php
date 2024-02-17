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
    

    if (mysqli_num_rows ($result) > 0) {
        header('Location: ../newitem.html?error=duplicate_product_id');
        exit();
    } else {
        $sql = "INSERT INTO inventory (`ProdName`, `ProdID`, `Stock`, `Price ($)`) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "ssii", $productname, $productid, $stock, $price);
        $result = mysqli_stmt_execute($stmt);
    }

    if($result) {
        header('Location: ../landingpage.html');
        exit();
    } else {
        header('Location: ../newitem.hmtl?error=insertion_failed');
        exit();
    }

} else {
    header('Location: ../newitem.html');
}

?>
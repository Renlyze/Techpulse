<?php
include 'db_connection.php';

$username = $_POST['uname'];
$password = $_POST['psw']; 



$sql = "SELECT Password FROM logintable WHERE Username = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    session_start();
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['Password'];

    if (password_verify($password, $hashed_password)){
        session_start();
        $_SESSION["username"] = $username;
        header("Location: ../landingpage.php");
        exit();
    }
}

header("Location: ../login.html?error=1");
exit();

?>

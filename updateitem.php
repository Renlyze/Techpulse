<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/update.css">
        <title>Inventory System - Update Item</title>
    </head>
    <script>
        function navigateTo(url) {
            window.location.href = url;
        }
    </script>
</head>
<body class="body">
    <div class="header">

        <div class="right">
            <div class="logo-name" onclick="navigateTo('index.html')">TechPulse</div>
        </div>
        <div class="left">
            <div class="home" onclick="navigateTo('index.html')">Home</div>
            <div class="login" onclick="navigateTo('login.html')">Login</div>
        </div>
    </div>
    <div class="top-text">
        

        <?php
    include 'php/db_connection.php';

    if(isset($_GET['id'])) {
      $prodID = mysqli_real_escape_string($connection, $_GET['id']);
    

      $query = "SELECT * FROM inventory WHERE `ProdID` = '$prodID'";
      $result = mysqli_query($connection, $query);

      if (!$result){
        die("Query Failed".  mysqli_error($connection));
      } else {
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
          die("No data found for the given Product ID: " . $prodID);
        }
      } 
    }else {
  die("Product ID is not provided.");
}
    ?>
        <div class="top-title">Update Item: value="<?php echo $row['ProdName']?>"</div>
        <div class="form">
          <form action="php/save.php" method = "post">
            <div class="container">
              <label for="item-name"><b>Product Name</b></label>
              <input type="text" name="product-name" required value="<?php echo $row['ProdName']?>">
            </div>
            <div class="container">
              <label for="product-id"><b>Product Id</b></label>
              <input type="text" name="product-id" required readonly value="<?php echo $row['ProdID']?>">
            </div>
            <div class="container">
                <label for="stock"><b>Stock</b></label>
                <input type="text" name="stock" required value="<?php echo $row['Stock']?>">
              </div>
              <div class="container">
                <label for="prices"><b>Prices ($)</b></label>
                <input type="text" name="prices" required value= "<?php echo $row['Price ($)']?>">
              </div>
            
            <div class="bottom-form">
              <button type = "submit" class="save">Save</button>
              <button class="cancel" onclick="navigateTo('index.html')">Cancel</but>
            </div>
          </form>
        </div>
    </div>
    <div class="footer">
      <div class="text-footer" onclick="navigateTo('index.html')">© TechPulse 2024</div>
  </div>
</body>
</html>
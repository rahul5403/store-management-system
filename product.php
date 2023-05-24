<?php
    $con = mysqli_connect("localhost","root","","nstore") or die ("Connection Failed: ". $con->connect_error);               
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="productc.css">
    <title>Product | Details</title>
</head>
<body>
    <div class="cont">
        <a class="slg" href="index.html"><img src="logo.png" alt="logo"></a>
        <p><h1>Welcome to E-Mart</h1></p>
        <div class="main">
            <p><h2>Product Details</h2></p>
            <div class="tab">
                <span class="add"><button class="addbtn"><a href="addproduct.html">ADD PRODUCT</a></button></span>
                <?php
                $sql = "SELECT * FROM product";
                $result = $con->query($sql);
                ?>
                <table cellpadding = "100px" cellspacing ="0px" padding = "20px">
                    <tr>
                      <th>Product Id</th>
                      <th>Product Name</th>
                      <th>Product Type</th>
                      <th>Quantity</th>
                      <th>Price per unit</th>
                      <th>Expiry Date</th>
                      <th colspan="2">Actions</th>
                    </tr>

                    <?php 
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row["productId"]. "</td>
                        <td>" . $row["productName"]. "</td>
                        <td>" . $row["type"]. "</td>
                        <td>" . $row["quantity"]. "</td>
                        <td>" . $row["price"]. "</td>
                        <td>" . $row["expiryDate"]. "</td>";
                    ?>
                        <td><button class = "edit"><a href="editproduct.php?productId=<?php echo $row['productId'];?>">EDIT</a></button></td>
                        <td><button class = "delete"><a onclick ="return confirm('Are You sure, you want to delete the product')" href="deleteproduct.php?productId=<?php echo $row['productId'];?>">DELETE</a></button></td>
                        </tr>
                        <?php 
                    }
                        ?>
                  </table>
                  <?php             
                    $con->close();
                ?>
                  
            </div>
        </div>


        <div class="sold">
                <p><h2>
                    Sold Item Details:

                </h2></p>

        </div>
        <div class="soldbtn">
            Click here to access transaction Page:               
            <button class="manage"><a href="soldproduct.php">Manage</a></button>
            Clink here to see sold items detail:
            <button class="detail"><a href="soldproductdetails.php">Detail</a></button>
        </div>


    </div>

</body>
</html>
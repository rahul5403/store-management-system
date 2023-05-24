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
    <title>Sold Product | Details</title>
</head>
<body>
    <div class="cont">
    <a class="slg" href="product.php"><img src="logo.png" alt="logo"></a>
        <p><h1>Welcome to E-Mart</h1></p>
        <div class="main">
            <p><h2>Sold Product Details</h2></p>
            <div class="tab">
                <?php
                $sql = "SELECT * FROM soldproduct";
                $result = $con->query($sql);
                ?>
                <table cellpadding = "100px" cellspacing ="0px" padding = "20px">
                    <tr>
                      <th>Customer Id</th>
                      <th>Customer Name</th>
                      <th>Product Id</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Totoal Amount</th>
                      <th>Date</th>
                    </tr>

                    <?php 
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row["cid"]. "</td>
                        <td>" . $row["cname"]. "</td>
                        <td>" . $row["pid"]. "</td>
                        <td>" . $row["pname"]. "</td>
                        <td>" . $row["quantity"]. "</td>
                        <td>" . $row["price"]. "</td>
                        <td>" . $row["date"]. "</td>";
                    }
                        ?>
                  </table>
                  <?php             
                    $con->close();
                ?>
                  
            </div>
        </div>
    </div>

</body>
</html>
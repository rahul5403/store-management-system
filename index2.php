<?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "nStore";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
?>
<html>
  <head>
    <title>Product Table</title>
    <link rel="stylesheet" href="styless.css">
  </head>
  <body class="clr">
    <div>
        <nav>
            <ul>
                <li><h1><a href="https://www.w3schools.com/css/css_dimension.asp">Store</a></h1></li>
            </ul>
        </nav>
        <hr>
        <br>
        <br>
        <br>
        <br>
        <div class="monthly-sales">
            <table id="productTable">
                <caption><h3>Total Monthly Sales</h3></caption>
                    <?php
                    $sql = "SELECT SUM(quantity) FROM product";
                    $result = $conn->query($sql);

                    // $result = mysqli_query($conn, $sql);

                    $row = $result->fetch_assoc();
                    echo "<tr><td>" . $row["SUM(quantity)"] . "</td></tr>";
                    ?>
            </table>  
        </div>
        <br>
        <br>
        <br>
        <div class="table-container">
        <?php
                $sql = "SELECT * FROM product";
                $result = $conn->query($sql);
                ?>
                    <table id='productTable'>
                    <caption><h2>Product</h2></caption>
                    <tr>
                        <th class='product-id'>Product ID</th>
                        <th class='product-name'>Product Name</th>
                        <th class='product-type'>Type</th>
                        <th class='product-quantity'>Quantity</th>
                        <th class='product-price'>Price/unit</th>
                        <th class='product-expiry-date'>Expiry Date</th>
                    </tr>
                    <?php 
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["productId"]. "</td><td>" . $row["productName"]. "</td><td>" . $row["type"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["price"]. "</td><td>" . $row["expiryDate"]. "</td></tr>";
                    }
                    ?>
                    </table>
                <?php             
                    $conn->close();
                ?>
        </div>
</div>
</body>
</html>
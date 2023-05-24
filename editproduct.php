<?php
$con = new mysqli("localhost", "root", "", "nstore") or die("connection to this database failed due to ". mysqli_connect_error());
$id=$_GET['productId'];
$select = "SELECT * FROM product WHERE productId = '$id'";
$data=mysqli_query($con, $select);
$row=mysqli_fetch_array($data);
?>
    <link rel="stylesheet" href="editproductc.css">
    <div class="cont">
    <p><h1>Welcome to the E Mart</h1></p>
    <p>Enter the product details to add product</p>
    <form action="" method="post">
        <label for="idid">Product Id:</label>
        <input type="text" name="nid" id="idid" value="<?php echo $id ?>" >
        <label for="idname">Product Name:</label>
        <input type="text" name="nname" id="idname" value="<?php echo $row['productName']; ?>" >
        <label for="idtype">Product Type:</label>
        <input type="text" name="ntype" id="idtype" value="<?php echo $row['type']; ?>" >
        <label for="idquantity">Quantity:</label>
        <input type="number" name="nquantity" id="idquantity" value="<?php echo $row['quantity']; ?>" >
        <label for="idprice">Price:</label>
        <input type="number" name="nprice" id="idprice" value="<?php echo $row['price']; ?>" >
        <label for="iddate">Expirydate:</label>
        <input type="date" name="ndate" id="iddate" value="<?php echo $row['expiryDate']; ?>" >
        <div class="btn">
        <input type="submit" value="Update" name="update">
        </div>
    </form>
</div>

<?php
if(isset($_POST['update'])){


$name = $_POST['nname'] ;
$ntype = $_POST['ntype'] ;
$quantity = $_POST['nquantity'] ;
$price = $_POST['nprice'] ;
$date = $_POST['ndate'];

$sql = "UPDATE `nstore`.`product` SET `productName` = '$name', `type` = '$ntype', `quantity` = '$quantity', `price` = '$price', `expiryDate` = '$date' WHERE `product`.`productId` = $id;";

if($con->query($sql) == true){
    echo "Registered Successfully";
    header("Location: product.php");
    exit;
}
else{ echo "ERROR: $sql <br> $con->error";
}
$con->close();
    
}

?>


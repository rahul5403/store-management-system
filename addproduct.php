<?php
if(isset($_POST['nname'])){

$con = new mysqli("localhost", "root", "", "nstore") or die("connection to this database failed due to ". mysqli_connect_error());

$id = $_POST['nid'] ;
$name = $_POST['nname'] ;
$ntype = $_POST['ntype'] ;
$quantity = $_POST['nquantity'] ;
$price = $_POST['nprice'] ;
$date = $_POST['ndate'];


$sql= "INSERT INTO `nstore`. `product` (`productId`, `productName`, `type`, `quantity`, `price`, `expiryDate`) VALUES ('$id', '$name', '$ntype', '$quantity', '$price', '$date');";


if($con->query($sql) == true){
    // echo "Registered Successfully";
    ?>
    <script type="text/javascript">
        alert("Product Added Successfully");
    </script>
    <?php
    header("Location: product.php");
    exit;
}
else{ echo "ERROR: $sql <br> $con->error";
}
$con->close();
    
}

?>
<?php
$con = new mysqli("localhost", "root", "", "nstore") or die("connection to this database failed due to ". mysqli_connect_error());
$id=$_GET['productId'];
$select = "DELETE FROM product WHERE productId = '$id'";
$data = mysqli_query($con, $select);
if($data){
    ?>
    <script type="text/javascript">
        alert("Product Deleted Successfully");
        // window.open("http://localhost/project/product.php",_self);
        <?php
        header("Location: product.php");
        ?>

    </script>
    <?php
}
else{
    ?>
    <script type="text/javascript">
        alert("Try again later");
    </script>
    <?php
}
?>
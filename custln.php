<?php
$email = $_POST['nemail'];
$password = $_POST['npassword'];

$con = new mysqli("localhost", "root", "", "nstore");

if($con->connect_error){
    die("Failed to connect: ".$con->connect_error);
}
else{

    $stmt = $con->prepare("select * from customer where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password']=== $password){
            ?>
            <script type="text/javascript">
                alert("Logged in Successfully");
            </script>
            <?php
            header("Location: slist.php?email=".urlencode($email));
            exit;
        }
        else{
            echo "<script>alert('Invaild Email or Password');</script>";
            header("Location: index.html");
        }
    }
    else{
        echo "<script>alert('Invaild Email or Password');</script>";
        header("Location: index.html");
    }

}
// <a href="editproduct.php?productId=<?php echo $row['productId'];?>">EDIT</a>
?>



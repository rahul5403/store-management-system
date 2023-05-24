<?php
$email = $_POST['nemail'];
$password = $_POST['npassword'];

$con = new mysqli("localhost", "root", "", "nstore");

if($con->connect_error){
    die("Failed to connect: ".$con->connect_error);
}
else{

    $stmt = $con->prepare("select * from manager where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password']=== $password){
            // echo"Login Successfull";
            echo "<script>alert('Hello World');</script>"; 
            header("Location: product.php");

            // exit;
        }
        else{
            ?>
            <script type="text/javascript">
                alert("Invaid Email or password");
                </script>
            <?php
            header("Location: index.html");

        }
    }
    else{
        ?>
        <script type="text/javascript">
            alert("Invaid Email or password");
            // exit;
            </script>
        <?php
        header("Location: index.html");
    }

}

?>



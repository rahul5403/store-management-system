<?php

if(isset($_POST['nname'])){

$con = new mysqli("localhost", "root", "", "nstore") or die("connection to this database failed due to ". mysqli_connect_error());

$name = $_POST['nname'] ;
$gender = $_POST['ngender'] ;
$age = $_POST['nage'] ;
$email = $_POST['nemail'] ;
$phoneno = $_POST['nphone'] ;
$id = $_POST['nid'];
$password = $_POST['npassword'];

$sql = "INSERT INTO `nstore`.`customer` (`name`, `cid`, `password`, `phone`, `email`, `age`, `gender`, `date`) VALUES ('$name', '$id', '$password', '$phoneno', '$email', '$age', '$gender', current_timestamp())";

if($con->query($sql) == true){
    echo "Registered Successfully";
    sleep(1);
    header("Location: index.html");
    exit;
}
else{ echo "ERROR: $sql <br> $con->error";
}
$con->close();
    
}
?>
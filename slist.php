<?php
$email = $_GET['email'];
$con = mysqli_connect("localhost","root","","nstore") or die ("Connection Failed: ". $con->connect_error);
$ipl = "SELECT cid,name FROM customer WHERE email = '$email'";
$result = $con->query($ipl);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $ci= $row["cid"];
      $nn = $row["name"];
  } 
} else {
  echo "0 results";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="slistcss.css">
  <title>Customer Page</title>
</head>
<body>
  <div class="cont">
    <div class="head">
      <a class="slg" href="index.html"><img src="logo.png" alt="logo"></a>
      <p><h1>Welcome to the E Mart</h1></p>
    </div>
    <div class="nt">
      <p><?php echo $nn?>,<br>Click here to logout</p>
      <p><button><a href="?logout=true">Logout</a></button></p>
    </div>
    <div class="parent">
      <div class="first">
        <div id="myDIV" class="header">
          <h2 style="margin:5px">My Cart</h2>
        </div>
        <div class="ct">
          <input type="text" id="myInput" placeholder="Title...">
          <span id="addBtn" class="addBtn">Add</span>
        </div>
        <div class="cart"><ul id="myUL"></ul></div>
      </div>
      <div class="second">
        <div class="main">
          <p><h2>Sold Product Details</h2></p>
        </div>
        <div class="tab">
          <?php
            $sql = "SELECT * FROM soldproduct where cid = '$ci' ";
            $result = $con->query($sql);
          ?>
          <table cellpadding="100px" cellspacing="0px" padding="20px">
            <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price per unit</th>
            <th>Date</th>
            </tr>
            <?php 
              while($row = $result->fetch_assoc()) {
                        echo "<tr>
                <td>" . $row["pname"]. "</td>
                <td>" . $row["quantity"]. "</td>
                <td>" . $row["price"]. "</td>
                <td>" . $row["date"]. "</td>";
                    }
            ?>
            </table>
        </div>
        <div class="beta">
          <div class="be">Give Feedback:</div><br>
          <form action="" method="post">
          <textarea class="fd"name="nfeedback" id="idfeedback" cols="30" rows="10" placeholder=""></textarea>
          <input type="submit" value="Send" name="nsubmit">
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="slistj.js"></script>
</body>
</html>


<?php
if(isset($_POST['nsubmit'])){

$feedback = $_POST['nfeedback'] ;
$zzz = "UPDATE `nstore`.`customer` SET feedback='$feedback' WHERE cid = $ci";


if($con->query($zzz) == true){
    ?>
    <script type="text/javascript">
        alert(" Feedback sent Successfully");
    </script>
    <?php
    exit;
}
else{ echo "ERROR: $zzz <br> $con->error";
}
$con->close();
    
}
?>

<?php
session_start();

if(isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.html');
    exit;
}
?>

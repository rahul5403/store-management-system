<?php
$con = new mysqli("localhost", "root", "", "nstore") or die("Connection Failed due to ".mysqli_connect_error());

if(isset($_POST['submit'])){
    for($i=0;$i<count($_POST['slno']);$i++){
            $custid = $_POST['ncustid'][$i];
            $custname = $_POST['ncustname'][$i];
            $prdtid = $_POST['nprdtid'][$i];
            $prdtname = $_POST['nprdtname'][$i];
            $quantity = $_POST['nquantity'][$i];
            $price = $_POST['nprice'][$i];

            if($custid!==NULL && $prdtid!=='' && $custname!=='' && $prdtname!==''  && $price!=='' && $quantity!==''){
        $sql = "INSERT INTO `nstore`.`soldproduct` (`cid`, `cname`, `pid`, `pname`, `price`, `quantity`, `date`) VALUES ('$custid', '$custname', '$prdtid', '$prdtname', '$price', '$quantity', current_timestamp())";
        $stmt=$con->prepare($sql);
                $stmt->execute();
                // $ne = "SELECT quantity from table product where `product`.`productId` = $prdtid";
                // $pp = $con->prepare($ne);
                // $pp->execute();
                // echo $pp;

            $ipl = "UPDATE `nstore`.`product` SET `quantity` = quantity-$quantity WHERE `product`.`productId` = $prdtid";
            $itm=$con->prepare($ipl);
            $itm->execute();

                echo "<script type='text/javascript'>"; 
                echo "alert('Submitted successfully')";
                echo "</script>";
            }
            else{
                 
                echo '<div class="alert alert-danger" role="alert">Error Submitting in Data</div>';
            }
        }

    }
    ?>

<html>

<head>
    <title>ajax example</title>
    <link rel="stylesheet" href="soldproductc.css">
</head>

<body>
    <div class="container">
        <div class="hd">
        <a class="slg" href="product.php"><img src="logo.png" alt="logo"></a>
        <h1 align="center">Transaction Management Page</h1>
        </div>
        <br /><br /><br />
        <form class="form-horizontal" action="#" method="post">
            <span class="row">
                <div class="col-sm-1">
                    <label for="sl">S. No:</label>
                    <input type="text" class="form-control sl" name="slno[]" id="slno" value="1" readonly="">
                </div>

                <div class="col-sm-3">
                    <label for="idcustid">Customer Id:</label>
                    <input type="number" class="form-control" name="ncustid[]" id="idcustid"
                        placeholder="Enter Customer Id" required>
                </div>

                <div class="col-sm-3">
                    <label for="idcustname">Customer Name</label>
                    <input type="text" class="form-control" name="ncustname[]" id="idcustname"
                        placeholder="Enter Customer Name">
                </div>
                <div class="col-sm-1">
                    <label for="idprdtid">Product Id</label>
                    <input type="text" class="form-control" id="idprdtid" name="nprdtid[]" placeholder="Enter Product Id">
                </div>
                <div class="col-sm-3">
                    <label for="idprdtname">Product Name</label>
                    <input type="text" id="idprdtname" name="nprdtname[]" class="form-control" placeholder="Enter Product Name"/>
                </div>
                <div class="col-sm-3">
                    <label for="idquantity">Quantity:</label>
                    <input type="number" id="idquantity" name="nquantity[]" class="form-control" placeholder="Enter Quantity" />
                </div>
                <div class="col-sm-3">
                    <label for="idprice">Price:</label>
                    <input type="number" id="idprice" name="nprice[]" class="form-control" placeholder="Enter Price"/>
                </div>
</span><br />
            <div id="next"></div>
            <br />
            <button type="button" name="addrow" id="addrow" class="btn btn-success pull-right">Add New Product</button>
            <br /><br />
            <div class="sum">
            <button type="submit" name="submit" class="submit">Submit</button>
            </div>
        </form>
    </div>
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        $('#addrow').click(function () {
            var length = $('.sl').length;
            var i = parseInt(length) + parseInt(1);
            var newrow = $('#next').append('<div class ="new"><div class="row"><div class="col-sm-1"><label for="Sno' + i + '">Sl No:</label><input type="text" class="form-control sl" name="slno[]" id="slno" value="' + i + '" readonly=""></div><div class="col-sm-3"><label for="idcustid' + i + '">Customer Id:</label><input type="number" class="form-control" name="ncustid[]" id="idcustid' + i + '"placeholder="Enter Customer Id"></div><div class="col-sm-3"><label for="idcustname' + i + '">Customer Name</label><input type="text" class="form-control" name="ncustname[]" id="idcustname' + i + '" placeholder="Enter Customer Name"></div><div class="col-sm-1"><label for="idprdtid' + i + '">Product Id</label><input type="text" class="form-control" id="idprdtid' + i + '" name="nprdtid[]" placeholder="Enter Product Id"></div><div class="col-sm-3"><label for="idprdtname' + i + '">Product Name</label><input type="text" id="idprdtname' + i + '" name="nprdtname[]" class="form-control" placeholder="Enter Product Name" ></div><div class="col-sm-3"><label for="idquantity' + i + '">Quantity:</label><input type="number" id="idquantity' + i + '" name="nquantity[]" class="form-control" Placeholder = "Enter Quantity" /></div><div class="col-sm-3"><label for="idprice' + i + '">Price:</label><input type="number" id="idprice' + i + '" name="nprice[]" class="form-control" Placeholder = "Enter Price"/></div></div><input type="button" class="btnRemove" value="Remove"/></div></div>');
        });
        $('body').on('click', '.btnRemove', function () {
            $(this).closest('div').remove()

        });

    </script>
</body>

</html>
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
        $sql = "INSERT INTO `soldproduct` (`cid`, `cname`, `pid`, `pname`, `price`, `quantity`, `date`) VALUES ('$custid', '$custname', '$prdtid', '$prdtname', '$price', '$quantity', current_timestamp())";
        $stmt=$con->prepare($sql);
                $stmt->execute();
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
        <h1 align="center">Welcome to Emart</h1>
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
                        placeholder="Enter Student Name" required>
                </div>

                <div class="col-sm-3">
                    <label for="idcustname">Customer Name</label>
                    <input type="text" class="form-control" name="ncustname[]" id="idcustname"
                        placeholder="Enter Phone No">
                </div>
                <div class="col-sm-1">
                    <label for="idprdtid">Product Id</label>
                    <input type="text" class="form-control" id="idprdtid" name="nprdtid[]" placeholder="Enter Age">
                </div>
                <div class="col-sm-3">
                    <label for="idprdtname">Product Name</label>
                    <input type="text" id="idprdtname" name="nprdtname[]" class="form-control" />
                </div>
                <div class="col-sm-3">
                    <label for="idquantity">Quantity:</label>
                    <input type="number" id="idquantity" name="nquantity[]" class="form-control" />
                </div>
                <div class="col-sm-3">
                    <label for="idprice">Price:</label>
                    <input type="number" id="idprice" name="nprice[]" class="form-control" />
                </div>
                <hr>

</span><br />
            <div id="next"></div>
            <br />
            <button type="button" name="addrow" id="addrow" class="btn btn-success pull-right">Add New Product</button>
            <br /><br />
            <button type="submit" name="submit" class="btn btn-info pull-left">Submit</button>
        </form>
    </div>
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        $('#addrow').click(function () {
            var length = $('.sl').length;
            var i = parseInt(length) + parseInt(1);
            var newrow = $('#next').append('<div><div class="row"><div class="col-sm-1"><label for="Sno">Sl No:</label><input type="text" class="form-control sl" name="slno[]" id="slno" value="' + i + '" readonly=""></div><div class="col-sm-3"><label for="idcustid">Customer Id:</label><input type="number" class="form-control" name="ncustid[]" id="idcustid' + i + '"placeholder="Enter Student Name"></div><div class="col-sm-3"><label for="Phone">Customer Name</label><input type="text" class="form-control" name="ncustname[]" id="idcustname' + i + '" placeholder="Enter Phone No"></div><div class="col-sm-1"><label for="idprdtid">Product Id</label><input type="text" class="form-control" id="idprdtid' + i + '" name="nprdtid[]" placeholder="Enter Age"></div><div class="col-sm-3"><label for="idprdtname">Product Name</label><input type="text" id="idprdtname' + i + '" name="nprdtname[]" class="form-control" ></div><div class="col-sm-3"><label for="idQuantity">Quantity:</label><input type="number" id="idquantity' + i + '" name="nquantity[]" class="form-control" /></div><label for="idprice">Price:</label><input type="number" id="idprice' + i + '" name="nprice[]" class="form-control" /></div><input type="button" class="btnRemove btn-danger" value="Remove"/></div></div>');
        });
        $('body').on('click', '.btnRemove', function () {
            $(this).closest('div').remove()

        });

    </script>
</body>

</html>
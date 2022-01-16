<?php
include "header.php";
include "../user/connection.php";

$id=$_GET['id'];
$product_company ='';
$product_name ='';
$product_unit ='';
$product_qty ='';
$product_selling_price ='';


$res = mysqli_query($link,"select * from stock_master where id=$id");

while ($row=mysqli_fetch_assoc($res)){

    $product_company =$row["product_company"];
    $product_name =$row["product_name"];
    $product_unit =$row["product_unit"];
    $product_qty =$row["product_qty"];
    $product_selling_price =$row["product_selling_price"];

}

?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <p class="card-description"> Edit stock master  </p>
                        <form class="forms-sample" action="" method="post" name="form1">

                            <div class="form-group">
                                <label> Product Company </label>
                                <input type="text" class="form-control" name="product_name" value="<?php echo $product_company; ?>" placeholder="Enter Product Company" readonly>
                            </div>

                            <div class="form-group">
                                <label> Product Name</label>
                                <input type="text" class="form-control" name="product_name" value="<?php echo $product_name; ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label> Product Unit  </label>
                                <input type="text" class="form-control" name="product_unit" value="<?php echo $product_unit; ?>"  readonly>
                            </div>
                            <div class="form-group">
                                <label> Product Qty  </label>
                                <input type="text" class="form-control" name="product_qty" value="<?php echo $product_qty; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label> Product Selling Price  </label>
                                <input type="text" class="form-control" name="product_selling_price" value="<?php echo $product_selling_price; ?>" >
                            </div>

                            <button type="submit" class="btn btn-primary mr-2" name="submit1">Submit</button>

                            <div class="alert alert-success mt-2" id="success" style="display:none">
                                Record  updated successfully ...
                            </div>
                        </form>


                    </div>
                </div>
            </div>

        </div>
        <?php
        if(isset($_POST['submit1'])){
            mysqli_query($link,"update stock_master set product_selling_price ='$_POST[product_selling_price]' where id=$id") or die(mysqli_error($link));

            ?>

            <script type="text/javascript">
                document.getElementById("success").style.display="block"
                setTimeout(function(){
                    window.location= "stock_master.php";
                },3000)
            </script>

        <?php  } ?>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->



<?php "footer.php"; ?>


<?php
include "header.php";
include "../user/connection.php";

$id=$_GET['id'];
$company_name ='';
$unit ='';
$product_name ='';
$packing_size ='';

$res = mysqli_query($link,"select * from products where id=$id");

while ($row=mysqli_fetch_assoc($res)){

    $company_name =$row["company_name"];
    $unit =$row["unit"];
    $product_name =$row["product_name"];
    $packing_size =$row["packing_size"];

}

?>


    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-description"> Edit User </p>
                            <form class="forms-sample" action="" method="post" name="form1">

                                <div class="form-group">
                                    <label> Select Company </label>
                                    <select class="form-control" name="company_name">
                                        <?php
                                        $res = mysqli_query($link,"select * from company_name");
                                        while($row=mysqli_fetch_assoc($res)){ ?>

                                            <option <?php if($row['company_name']==$company_name){ echo "selected"; } ?> > <?php echo $row['company_name'] ;?> </option>

                                        <?php    }  ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label> Select Unit </label>
                                    <select class="form-control" name="unit">
                                        <?php
                                        $res = mysqli_query($link,"select * from unit");

                                        while($row=mysqli_fetch_assoc($res)){ ?>
                                            <option <?php if($row['unit']==$unit){ echo "selected"; } ?>> <?php echo $row['unit'] ;?> </option>
                                        <?php    }  ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label> Product Name</label>
                                    <input type="text" class="form-control" name="product_name" value="<?php echo $product_name; ?>" placeholder="Enter Product Name">
                                </div>

                                <div class="form-group">
                                    <label> Packing Size </label>
                                    <input type="text" class="form-control" name="packing_size" value="<?php echo $packing_size; ?>" placeholder="Enter Packing Size">
                                </div>

                                <button type="submit" class="btn btn-primary mr-2" name="submit1">Submit</button>

                                <div class="alert alert-success mt-2" id="success" style="display:none">
                                    Product  updated successfully ...
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

            </div>
            <?php
            if(isset($_POST['submit1'])){
                mysqli_query($link,"update products set company_name='$_POST[company_name]',unit='$_POST[unit]',product_name='$_POST[product_name]',packing_size='$_POST[packing_size]' where id=$id") or die(mysqli_error($link));
                ?>

                <script type="text/javascript">
                    document.getElementById("success").style.display="block"
                    setTimeout(function(){
                        window.location= "add_products.php";
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


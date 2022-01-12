<?php
include "header.php";
include "../user/connection.php";
?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">


        <div class="row">
            add new product ...
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-description"> Add new product </p>
                        <form class="forms-sample" action="" method="post" name="form1">


                            <div class="form-group">
                              <label> Select Company </label>
                                <select class="form-control" name="company_name">
                                    <?php
                                       $res = mysqli_query($link,"select * from company_name");

                                       while($row=mysqli_fetch_assoc($res)){ ?>

                                           <option> <?php echo $row['company_name'] ;?> </option>

                                        <?php    }  ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label> Select Unit </label>
                                <select class="form-control" name="unit">
                                    <?php
                                    $res = mysqli_query($link,"select * from unit");

                                    while($row=mysqli_fetch_assoc($res)){ ?>
                                        <option> <?php echo $row['unit'] ;?> </option>
                                    <?php    }  ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label> Product Name</label>
                                <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name">
                            </div>

                            <div class="form-group">
                                <label> Packing Size </label>
                                <input type="text" class="form-control" name="packing_size" placeholder="Enter Packing Size">
                            </div>

                            <button type="submit" class="btn btn-primary mr-2" name="submit1">Submit</button>

                            <div class="alert alert-success mt-2" id="success" style="display:none">
                                Product inserted successfully ...
                            </div>
                        </form>


                    </div>
                </div>
            </div>


        </div>

        <?php
        if(isset($_POST['submit1'])){
            mysqli_query($link,"INSERT INTO products VALUES (NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]')") or die (mysqli_error($link));

            ?>
                <script type="text/javascript">
                    document.getElementById("success").style.display="block"
                    setTimeout(function(){
                        window.location.href= window.location.href;
                    },3000)
                </script>

            <?php   }  ?>
    </div>


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Products </h4>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th> Id </th>
                            <th> Product Company </th>
                            <th> Product Unit </th>
                            <th> Product Name </th>
                            <th> Product Size </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $res=mysqli_query($link,"select * from products");
                        //                            $row=mysqli_fetch_assoc($res);

                        //   echo "<pre>";
                        //   print_r($row);
                        //   echo "</pre>";

                        while($row=mysqli_fetch_assoc($res)){ ?>
                            <tr>
                                <td> <?= $row['id'];?> </td>
                                <td> <?= $row['company_name'];?> </td>
                                <td> <?= $row['unit'];?> </td>
                                <td> <?= $row['product_name'];?> </td>
                                <td> <?= $row['packing_size'];?> </td>
                                <td> <a href="edit_product.php?id=<?php echo $row['id'];?>"> Edit </a></td>
                                <td> <a href="delete_product.php?id=<?php echo $row['id'];?>"> Delete </a></td>
                            </tr>

                        <?php }  ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
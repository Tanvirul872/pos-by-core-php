<?php
include "header.php";
include "../user/connection.php";
?>

<!-- partial -->
<div class="main-panel">


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All stocks </h4>
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th> Id </th>
                            <th> Product Company </th>
                            <th> Product Name </th>
                            <th> Product Unit </th>
                            <th> Product Qunatity </th>
                            <th> Product Selling Price </th>
                            <th> Edit </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $res=mysqli_query($link,"select * from stock_master");

                        //   $row=mysqli_fetch_assoc($res);
                        //   echo "<pre>";
                        //   print_r($row);
                        //   echo "</pre>";

                        while($row=mysqli_fetch_assoc($res)){ ?>
                            <tr>
                                <td> <?= $row['id'];?> </td>
                                <td> <?= $row['product_company'];?> </td>
                                <td> <?= $row['product_name'];?> </td>
                                <td> <?= $row['product_unit'];?> </td>
                                <td> <?= $row['product_qty'];?> </td>
                                <td> <?= $row['product_selling_price'];?> </td>
                                <td> <a href="edit_stock_master.php?id=<?php echo $row['id'];?>"> Edit </a></td>
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
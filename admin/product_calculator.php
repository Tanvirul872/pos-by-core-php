<?php  
session_start();  
if(!isset($_SESSION["admin"])){
    ?> 
   <script type="text/javascript">
    window.location = "index.php" ; 
   </script>
   <?php
}
?>

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
                                    <label> Product name </label>
                                    <input type="text" class="form-control" name="product_name" placeholder="Product name">
                                </div>
                                <div class="form-group">
                                    <label> Product code </label>
                                    <input type="text" class="form-control" name="product_code" placeholder="Product Code">
                                </div>

                               <div class="form-group">
                                    <label> Buying Price </label>
                                    <input type="text" class="form-control" name="buying_price" placeholder="Buying Price">
                                </div>

                                <!-- <div class="form-group">
                                    <label> Shpping Cost </label>
                                    <input type="text" class="form-control" name="shipping_cost" placeholder="Shipping Cost">
                                </div> -->

                                <!-- <div class="form-group">
                                    <label> Staff Cost </label>
                                    <input type="text" class="form-control" name="staff_cost" placeholder="Staff Cost">
                                </div> -->

                                <div class="form-group">
                                    <label> Packaging Cost </label>
                                    <input type="text" class="form-control" name="packaging_cost" placeholder="Packaging Cost">
                                </div>
                                <div class="form-group">
                                    <label> Weight Cost </label>
                                    <input type="text" class="form-control" name="weight_cost" placeholder="Weight Cost">
                                </div>
                                <!-- <div class="form-group">
                                    <label> COD Charge </label>
                                    <input type="text" class="form-control" name="cod_cost" placeholder="COD Cost">
                                </div> -->
                                <!-- <div class="form-group">
                                    <label> Bkash Charge </label>
                                    <input type="text" class="form-control" name="bkash_cost" placeholder="Bkash Charge">
                                </div> -->

                                <!-- <div class="form-group">
                                    <label> Total Charge </label>
                                    <input type="text" class="form-control" name="total_cost" placeholder="Total cost">
                                </div> -->


                                <button type="submit" class="btn btn-primary mr-2" name="submit1">Submit</button>

                                <div class="alert alert-danger mt-2" id="error" style="display:none">
                                    This company already exists..!
                                </div>

                                <div class="alert alert-success mt-2" id="success" style="display:none">
                                    Company inserted successfully ...
                                </div>

                            </form>


                        </div>
                    </div>
                </div>


            </div>

            <?php
            if(isset($_POST['submit1'])){
                $product_name = $_POST['product_name']; 
                $product_code = $_POST['product_code']; 
                $buying_price = $_POST['buying_price']; 
                $shipping_cost =  $buying_price*0.1;                                      
                $staff_cost =$buying_price*0.05; 
                $packaging_cost = $_POST['packaging_cost']; 
                $weight_cost = $_POST['weight_cost']*0.02; 
                $cod_cost = $buying_price*0.01; 
                $bkash_cost = $buying_price*0.018; 
                $total_cost = $buying_price+$shipping_cost+$staff_cost+$packaging_cost+$weight_cost+$cod_cost+$bkash_cost ;
                $total_cost_1 = $total_cost*0.3 ;        
                $final_cost = $total_cost+$total_cost_1 ;        


                // echo "<pre>";
                // echo 'Product name ='.$product_name;
                // echo '<br>'; 
                // echo 'Product code ='.$product_code;
                // echo '<br>';
                // echo 'buying price ='.$buying_price;
                // echo '<br>'; 
                // echo 'shipping_cost ='.$shipping_cost;
                // echo '<br>'; 
                // echo 'staff_cost ='.$staff_cost;
                // echo '<br>'; 
                // echo 'packaging_cost ='.$packaging_cost;
                // echo '<br>'; 
                // echo 'weight_cost ='.$weight_cost;
                // echo '<br>'; 
                // echo 'cod_cost ='.$cod_cost;
                // echo '<br>'; 
                // echo 'bkash_cost ='.$bkash_cost;
                // echo '<br>'; 
                // echo 'total_cost ='.$total_cost;
                // echo '<br>'; 
                // echo '30% profit ='.$total_cost_1;
                // echo '<br>'; 
                // echo 'final_cost ='.$final_cost;
                // echo '<br>'; 
                // echo "</pre>";

                // exit; 


                mysqli_query($link,"INSERT INTO `product_calculator`(`id`, `product_name`, `product_code`, `buying_price`, `shipping_cost`, `staff_cost`, `packaging_cost`, `weight_cost`, `cod_cost`, `bkash_cost`, `total_cost`) VALUES (NULL,'$product_name','$product_code','$buying_price','$shipping_cost','$staff_cost','$packaging_cost','$weight_cost','$cod_cost','$bkash_cost','$total_cost')") or die (mysqli_error($link));

                            
            ?>

                <!-- <script>
                    alert('hello'); 
                </script> -->
                    <script type="text/javascript">
                        document.getElementById("error").style.display="none"
                        document.getElementById("success").style.display="block"
                        setTimeout(function(){
                            window.location.href= window.location.href;
                        },3000)
                    </script>

                <?php }   ?>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Product Calculation </h4>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th> Id </th>
                                <th> Product name </th>
                                <th> product code  </th>
                                <th> buying price  </th>
                                <th> shipping cost  </th>
                                <th> staff  cost  </th>
                                <th> packaging cost  </th>
                                <th> weight cost  </th>
                                <th> cod cost  </th>
                                <th> bkash cost  </th>
                                <th> total cost </th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res=mysqli_query($link,"select * from product_calculator");

                            //    $row=mysqli_fetch_assoc($res);
                            //   echo "<pre>";
                            //   print_r($row);
                            //   echo "</pre>";

                            while($row=mysqli_fetch_assoc($res)){ ?>

                                <tr>
                                    <td> <?= $row['id'];?> </td>
                                    <td> <?= $row['product_name'];?> </td>
                                    <td> <?= $row['product_code'];?> </td>
                                    <td> <?= $row['buying_price'];?> </td>
                                    <td> <?= $row['shipping_cost'];?> </td>
                                    <td> <?= $row['staff_cost'];?> </td>
                                    <td> <?= $row['packaging_cost'];?> </td>
                                    <td> <?= $row['weight_cost'];?> </td>

                                    <td> <?= $row['cod_cost'];?> </td>
                                    <td> <?= $row['bkash_cost'];?> </td>
                                    <td> <?= $row['total_cost'];?> </td>

                                    <td> <a href="edit_calculation.php?id=<?php echo $row['id'];?>"> Edit </a></td>
                                    <td> <a href="delete_calculation.php?id=<?php echo $row['id'];?>"> Delete </a></td>
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
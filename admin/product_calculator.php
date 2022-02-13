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
                                    <label> Buying Price </label>
                                    <input type="text" class="form-control" name="buying_price" placeholder="Buying Price">
                                </div>

                                <div class="form-group">
                                    <label> Shpping Cost </label>
                                    <input type="text" class="form-control" name="shipping_cost" placeholder="Shipping Cost">
                                </div>
                                <div class="form-group">
                                    <label> Staff Cost </label>
                                    <input type="text" class="form-control" name="staff_cost" placeholder="Staff Cost">
                                </div>

                                <div class="form-group">
                                    <label> Packaging Cost </label>
                                    <input type="text" class="form-control" name="packaging_cost" placeholder="Packaging Cost">
                                </div>
                                <div class="form-group">
                                    <label> Weight Cost </label>
                                    <input type="text" class="form-control" name="weight_cost" placeholder="Weight Cost">
                                </div>
                                <div class="form-group">
                                    <label> COD Charge </label>
                                    <input type="text" class="form-control" name="cod_cost" placeholder="COD Cost">
                                </div>
                                <div class="form-group">
                                    <label> Bkash Charge </label>
                                    <input type="text" class="form-control" name="bkash_cost" placeholder="Bkash Charge">
                                </div>


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

<!--            --><?php
//            if(isset($_POST['submit1'])){
//                $count =0;
//                $res = mysqli_query($link,"select * from company_name where company_name='$_POST[company_name]'");
//                $count=mysqli_num_rows($res);
//
//                if($count > 0){ ?>
<!--                    <script type="text/javascript">-->
<!---->
<!--                        document.getElementById("error").style.display="block"-->
<!--                        document.getElementById("success").style.display="none"-->
<!---->
<!--                    </script>-->
<!--                --><?php //}else{
//
//                mysqli_query($link,"INSERT INTO company_name VALUES (NULL,'$_POST[company_name]')") or die (mysqli_error($link));
//                ?>
<!--                    <script type="text/javascript">-->
<!--                        document.getElementById("error").style.display="none"-->
<!--                        document.getElementById("success").style.display="block"-->
<!--                        setTimeout(function(){-->
<!--                            window.location.href= window.location.href;-->
<!--                        },3000)-->
<!--                    </script>-->
<!---->
<!--                --><?php //}  }  ?>
        </div>


<!---->
<!--        <div class="col-lg-12 grid-margin stretch-card">-->
<!--            <div class="card">-->
<!--                <div class="card-body">-->
<!--                    <h4 class="card-title">All Company </h4>-->
<!--                    <div class="table-responsive">-->
<!--                        <table class="table table-dark">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <th> Id </th>-->
<!--                                <th> Company name </th>-->
<!--                                <th> Edit </th>-->
<!--                                <th> Delete </th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!---->
<!---->
<!--                            --><?php
//                            $res=mysqli_query($link,"select * from company_name");
//                            //                            $row=mysqli_fetch_assoc($res);
//
//                            //   echo "<pre>";
//                            //   print_r($row);
//                            //   echo "</pre>";
//
//                            while($row=mysqli_fetch_assoc($res)){ ?>
<!--                                <tr>-->
<!--                                    <td> --><?//= $row['id'];?><!-- </td>-->
<!--                                    <td> --><?//= $row['company_name'];?><!-- </td>-->
<!--                                    <td> <a href="edit_company.php?id=--><?php //echo $row['id'];?><!--"> Edit </a></td>-->
<!--                                    <td> <a href="delete_company.php?id=--><?php //echo $row['id'];?><!--"> Delete </a></td>-->
<!--                                </tr>-->
<!---->
<!--                            --><?php //}  ?>
<!---->
<!---->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->



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
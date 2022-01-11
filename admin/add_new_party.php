<?php
include "header.php";
include "../user/connection.php";
?>


    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">


            <div class="row">
                admin dashboard....

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-description"> Add new party  </p>
                            <form class="forms-sample" action="" method="post" name="form1">
                                <div class="form-group">
                                    <label> First Name</label>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label> Last Name</label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                </div>

                                <div class="form-group">
                                    <label> Business Name</label>
                                    <input type="text" class="form-control" name="businessname" placeholder="Business Name">
                                </div>

                                <div class="form-group">
                                    <label> Contact </label>
                                    <input type="text" class="form-control" name="contact" placeholder="Contact">
                                </div>
                                <div class="form-group">
                                    <label> City </label>
                                    <input type="text" class="form-control" name="city" placeholder="City">
                                </div>

                                <div class="form-group">

                                    <label> Address </label>
                                    <textarea class="form-control" name="address" placeholder="Address"></textarea>

                              </div>



                                <button type="submit" class="btn btn-primary mr-2" name="submit1">Submit</button>

                                <div class="alert alert-success mt-2" id="success" style="display:none">
                                    Party inserted successfully ...
                                </div>

                            </form>


                        </div>
                    </div>
                </div>


            </div>

            <?php
            if(isset($_POST['submit1'])){

                mysqli_query($link,"INSERT INTO `party_info` (`id`, `firstname`, `lastname`, `businessname`, `contact`,`city`, `address`) VALUES (NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[businessname]','$_POST[contact]','$_POST[city]','$_POST[address]')");
           ?>
                <script type="text/javascript">
                    document.getElementById("success").style.display="block"
                    setTimeout(function(){
                        window.location.href= window.location.href;
                    },3000)
                </script>

            <?php  }  ?>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Users </h4>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> First name </th>
                                <th> Last name </th>
                                <th> Business Name </th>
                                <th> Contact </th>
                                <th> City </th>
                                <th> Address </th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res=mysqli_query($link,"select * from party_info");
                            $row=mysqli_fetch_assoc($res);

//                               echo "<pre>";
//                               print_r($row);
//                               echo "</pre>";
//                               exit;

                            while($row=mysqli_fetch_assoc($res)){ ?>

                                <tr>
                                    <td> <?= $row['id'];?> </td>
                                    <td> <?= $row['firstname'];?> </td>
                                    <td> <?= $row['lastname'];?> </td>
                                    <td> <?= $row['businessname'];?> </td>
                                    <td> <?= $row['city'];?> </td>
                                    <td> <?= $row['contact'];?> </td>
                                    <td> <?= $row['address'];?> </td>
                                    <td> <a href="edit_party.php?id=<?php echo $row['id'];?>"> Edit </a></td>
                                    <td> <a href="delete_party.php?id=<?php echo $row['id'];?>"> Delete </a></td>
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
<?php
include "header.php";
include "../user/connection.php";

$id=$_GET['id'];
$firstname ='';
$lastname ='';
$businessname ='';
$city ='';
$contact ='';
$address='';

$res = mysqli_query($link,"select * from party_info where id=$id");

while ($row=mysqli_fetch_assoc($res)){

    $firstname =$row["firstname"];
    $lastname =$row["lastname"];
    $businessname =$row["businessname"];
    $city =$row["city"];
    $contact =$row["contact"];
    $address =$row["address"];

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
                                    <label> First Name </label>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $firstname; ?>" >
                                </div>
                                <div class="form-group">
                                    <label> Last Name</label>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>" >
                                </div>

                                <div class="form-group">
                                    <label> Business  Name</label>
                                    <input type="text" class="form-control" name="businessname" placeholder="Business Name" value="<?php echo $businessname ;?> ">
                                </div>

                                <div class="form-group">
                                    <label> City </label>
                                    <input type="text" class="form-control" name="city" placeholder="City Name" value="<?php echo $city ;?> ">
                                </div>

                                <div class="form-group">
                                    <label> Contact </label>
                                    <input type="text" class="form-control" name="contact" placeholder="Contact" value="<?php echo $contact ;?> ">
                                </div>

                                <div class="form-group">
                                    <label> Address  </label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $address ;?> ">
                                </div>


                                <button type="submit" class="btn btn-primary mr-2" name="submit1">Submit</button>


                                <div class="alert alert-success mt-2" id="success" style="display:none">
                                    Record updated successfully ...
                                </div>
                            </form>


                        </div>
                    </div>
                </div>


            </div>
            <?php
            if(isset($_POST['submit1'])){
                mysqli_query($link,"update party_info set firstname='$_POST[firstname]',lastname='$_POST[lastname]',businessname='$_POST[businessname]',city='$_POST[city]', contact='$_POST[contact]',address='$_POST[address]' where id=$id") or die(mysqli_error($link));

                ?>

                <script type="text/javascript">
                    document.getElementById("success").style.display="block"
                    setTimeout(function(){
                        window.location= "add_new_party.php";
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
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

$id=$_GET['id'];
$firstname ='';
$lastname ='';
$username ='';
$password ='';
$status ='';
$role='';

$res = mysqli_query($link,"select * from user_registration where id=$id");

while ($row=mysqli_fetch_assoc($res)){

    $firstname =$row["firstname"];
    $lastname =$row["lastname"];
    $username =$row["username"];
    $password =$row["password"];
    $status =$row["status"];
    $role=$row["role"];

}





?>


    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">


            <div class="row">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-description"> Edit User <?php echo $status; ?> </p>
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
                                    <label> User Name</label>
                                    <input type="text" class="form-control" name="username" placeholder="User Name" readonly value="<?php echo $username ;?> ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword4">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password" value="<?php echo $password; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelectGender">Role</label>
                                    <select class="form-control" name="role">
                                        <option <?php if($role=="admin"){ echo "selected"; }?>> admin </option>
                                        <option <?php if($role == "user"){ echo "selected"; }?>> user </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelectGender">Status</label>
                                    <select class="form-control" name="status">
                                        <option <?php if($status=="active"){ echo "selected"; }?> > active </option>
                                        <option <?php if($status=="inactive"){ echo "selected"; }?>> inactive </option>
                                    </select>
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
               mysqli_query($link,"update user_registration set firstname='$_POST[firstname]',lastname='$_POST[lastname]',password='$_POST[password]',role='$_POST[role]', status='$_POST[status]' where id=$id") or die(mysqli_error($link));
              ?>

                <script type="text/javascript">
                    document.getElementById("success").style.display="block"
                    setTimeout(function(){
                        window.location= "add_new_user.php";
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
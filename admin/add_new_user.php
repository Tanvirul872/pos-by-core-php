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
                    admin dashboard.... 

                    <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
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
                        <label> User Name</label>
                        <input type="text" class="form-control" name="username" placeholder="User Name">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div>


                      <div class="form-group">
                        <label for="exampleSelectGender">Role</label>
                        <select class="form-control" name="role">  
                          <option>Admin</option>
                          <option>User</option>  
                        </select>
                      </div>

                      <button type="submit" class="btn btn-primary mr-2" name="submit1">Submit</button>
                    
                       <div class="alert alert-danger mt-2" id="error" style="display:none">
                          This username already exists..!
                      </div> 

                      <div class="alert alert-success mt-2" id="success" style="display:none">
                          Record inserted successfully ... 
                      </div>
                    </form>

                   
                  </div>
                </div>
              </div>


                </div>

                <?php
              if(isset($_POST['submit1'])){
            $count =0; 
            $res = mysqli_query($link,"select * from user_registration where username='$_POST[username]'"); 
            $count=mysqli_num_rows($res); 
            if($count>0){ ?> 
                <script type="text/javascript">
                 document.getElementById("success").style.display="none"
                 document.getElementById("error").style.display="block"
                </script>
              <?php }else{

                  $role = lcfirst("$_POST[role]");
                  mysqli_query($link,"INSERT INTO `user_registration`(`id`, `firstname`, `lastname`, `username`, `password`, `role`, `status`) VALUES (NULL,'$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]','$role ','active')");
              }?> 
                <script type="text/javascript">
                   document.getElementById("success").style.display="block"
                   document.getElementById("error").style.display="none"
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
                            <th> Username </th>
                            <th> Role </th>
                            <th> Edit </th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody> 
                            <?php 
                              $res=mysqli_query($link,"select * from user_registration");
                              $row=mysqli_fetch_assoc($res); 

                            //   echo "<pre>";
                            //   print_r($row); 
                            //   echo "</pre>";
                     
                              while($row=mysqli_fetch_assoc($res)){ ?> 
                         
                         <tr>
                            <td> <?= $row['id'];?> </td>
                            <td> <?= $row['firstname'];?> </td>
                            <td> <?= $row['lastname'];?> </td>
                            <td> <?= $row['username'];?> </td>
                            <td> <?= $row['role'];?> </td>
                            <td> <a href="edit_user.php?id=<?php echo $row['id'];?>"> Edit </a></td>
                            <td> <a href="delete_user.php?id=<?php echo $row['id'];?>"> Delete </a></td>
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
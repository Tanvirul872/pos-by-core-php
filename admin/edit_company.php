<?php
include "header.php";
include "../user/connection.php";

$id=$_GET['id'];
$company_name ='';
$res = mysqli_query($link,"select * from company_name where id=$id");

while ($row=mysqli_fetch_assoc($res)){

    $company_name =$row["company_name"];
}

?>


    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-description"> Edit Comapny Name </p>
                            <form class="forms-sample" action="" method="post" name="form1">
                                <div class="form-group">
                                    <label> Company Name </label>
                                    <input type="text" class="form-control" name="company_name" placeholder="Company Name" value="<?php echo $company_name; ?>" >
                                </div>


                                <button type="submit" class="btn btn-primary mr-2" name="submit1">Submit</button>

                                <div class="alert alert-success mt-2" id="success" style="display:none">
                                    Company name  updated successfully ...
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

            </div>
            <?php
            if(isset($_POST['submit1'])){
                mysqli_query($link,"update company_name set company_name='$_POST[company_name]' where id=$id") or die(mysqli_error($link));
                ?>

                <script type="text/javascript">
                    document.getElementById("success").style.display="block"
                    setTimeout(function(){
                        window.location= "add_company.php";
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
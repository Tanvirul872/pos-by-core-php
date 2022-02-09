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
                See Purchase Report 
                <form class="form-inline" name="form1"  action="purchase_report.php" method="post">
                  <p>Start Date: <input type="date" id="startdate" name="startdate"></p>
                  <p>End Date: <input type="date" id="enddate" name="enddate"></p>
                  <button type="submit" name="submit1" class="btn btn-success">Show purchase from this dates</button>
                  <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href" >  Clear Searh  </button>

                </form>
                <div class="col-12 grid-margin stretch-card">                   

                <h2>Hello world </h2>
                <?php 
                  if(isset($_POST["submit1"])){   ?>           
                      <table class="table table-bordered">
                          <thead>
                          <tr>
                              <th>Sr No</th>
                              <th> Purchase By </th>
                              <th> Product Company </th>
                              <th> Product name </th>
                              <th> Product unit </th>
                              <th> Product Size </th>
                              <th> Product Qty </th>
                              <th> Product price </th>
                              <th> Party Name </th>
                              <th> Purchase type </th>
                              <th> Purchase Date </th>
                              <th> Expiry Date </th>
                            
                          </tr>
                          </thead>
                          <tbody>
                              <?php  
                                $count=0; 
                                $res=mysqli_query($link,"select * from purchase_master where(purchase_date>='$_POST[startdate]' && purchase_date<='$_POST[enddate]')"); 
                                while($row =mysqli_fetch_assoc($res)){
                                    $count=$count+1; 
                                    echo "<tr>";   
                                    echo "<td>";  echo $count ;    echo "</td>";
                                    echo "<td>";  echo $row["username"] ;    echo "</td>";
                                    echo "<td>";  echo $row["company_name"] ;    echo "</td>";
                                    echo "<td>";  echo $row["product_name"] ;    echo "</td>";
                                    echo "<td>";  echo $row["unit"] ;    echo "</td>";
                                    echo "<td>";  echo $row["packing_size"] ;   echo "</td>";
                                    echo "<td>";  echo $row["quantity"] ;   echo "</td>";
                                    echo "<td>";  echo $row["price"] ;    echo "</td>";
                                    echo "<td>";  echo $row["party_name"] ;    echo "</td>";
                                    echo "<td>";  echo $row["purchase_type"] ;    echo "</td>";
                                    echo "<td>";  echo $row["purchase_date"] ;    echo "</td>";
                                    echo "<td>";  echo $row["expiry_date"] ;    echo "</td>";
                                    echo "</tr>";

                                }
                             ?>
                          </tbody>
                          
                      </table> 
  

                <?php     }else{ ?> 
                      <table class="table table-bordered">
                          <thead>
                          <tr>
                              <th>Sr No</th>
                              <th> Purchase By </th>
                              <th> Product Company </th>
                              <th> Product name </th>
                              <th> Product unit </th>
                              <th> Product Size </th>
                              <th> Product Qty </th>
                              <th> Product price </th>
                              <th> Party Name </th>
                              <th> Purchase type </th>
                              <th> Purchase Date </th>
                              <th> Expiry Date </th>
                            
                          </tr>
                          </thead>
                          <tbody>
                              <?php  
                                $count=0; 
                                $res=mysqli_query($link,"select * from purchase_master"); 
                                while($row =mysqli_fetch_assoc($res)){
                                    $count=$count+1; 
                                    echo "<tr>";   
                                    echo "<td>";  echo $count ;    echo "</td>";
                                    echo "<td>";  echo $row["username"] ;    echo "</td>";
                                    echo "<td>";  echo $row["company_name"] ;    echo "</td>";
                                    echo "<td>";  echo $row["product_name"] ;    echo "</td>";
                                    echo "<td>";  echo $row["unit"] ;    echo "</td>";
                                    echo "<td>";  echo $row["packing_size"] ;   echo "</td>";
                                    echo "<td>";  echo $row["quantity"] ;   echo "</td>";
                                    echo "<td>";  echo $row["price"] ;    echo "</td>";
                                    echo "<td>";  echo $row["party_name"] ;    echo "</td>";
                                    echo "<td>";  echo $row["purchase_type"] ;    echo "</td>";
                                    echo "<td>";  echo $row["purchase_date"] ;    echo "</td>";
                                    echo "<td>";  echo $row["expiry_date"] ;    echo "</td>";
                                    echo "</tr>";

                                }
                             ?>
                          </tbody>
                          
                      </table> 
              <?php    }
                ?>

                    
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
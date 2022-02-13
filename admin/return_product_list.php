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
              View Return Products List  ...  
              <form class="form-inline" name="form1"  action="" method="post">
                  <p>Start Date: <input type="date" id="startdate" name="startdate"></p>
                  <p>End Date: <input type="date" id="enddate" name="enddate"></p>
                  <button type="submit" name="submit1" class="btn btn-success">Show purchase from this dates</button>
                  <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href" >  Clear Searh  </button>

             </form>

            </div>
            <?php
              if(isset($_POST["submit1"])){ ?> 
   <table class="table table-bordered">
                <tr>
                    <td> Bill No </td>
                    <td> Return Date </td>
                    <td> Product Company </td>
                    <td> Product Name </td>
                    <td> Product Unit </td>
                    <td> Packing Size </td>
                    <td> Product Price </td>
                    <td> Product Qty </td>
                    <td> Total</td>
                </tr>
                <?php
                  $res=mysqli_query($link,"select * from return_products where(return_date>='$_POST[startdate]' && return_date<='$_POST[enddate]') order by id asc");
                  while($row = mysqli_fetch_assoc($res)){
                      echo "<tr>";
                      echo "<td>"; echo $row["bill_no"];  echo "</td>";  
                      echo "<td>"; echo $row["return_date"];  echo "</td>";  
                      echo "<td>"; echo $row["product_company"];  echo "</td>";  
                      echo "<td>"; echo $row["product_name"];  echo "</td>";  
                      echo "<td>"; echo $row["product_unit"];  echo "</td>";  
                      echo "<td>"; echo $row["product_size"];  echo "</td>";  
                      echo "<td>"; echo $row["product_price"];  echo "</td>";  
                      echo "<td>"; echo $row["product_qty"];  echo "</td>";  
                      echo "<td>"; echo $row["total"];  echo "</td>";  
                      echo "</tr>"; 
                  }
                ?>
            </table>
                

              <?php }else{ ?> 
                <table class="table table-bordered">
                <tr>
                    <td> Bill No </td>
                    <td> Return Date </td>
                    <td> Product Company </td>
                    <td> Product Name </td>
                    <td> Product Unit </td>
                    <td> Packing Size </td>
                    <td> Product Price </td>
                    <td> Product Qty </td>
                    <td> Total</td>
                </tr>
                <?php
                  $res=mysqli_query($link,"select * from return_products order by id asc");
                  while($row = mysqli_fetch_assoc($res)){
                      echo "<tr>";
                      echo "<td>"; echo $row["bill_no"];  echo "</td>";  
                      echo "<td>"; echo $row["return_date"];  echo "</td>";  
                      echo "<td>"; echo $row["product_company"];  echo "</td>";  
                      echo "<td>"; echo $row["product_name"];  echo "</td>";  
                      echo "<td>"; echo $row["product_unit"];  echo "</td>";  
                      echo "<td>"; echo $row["product_size"];  echo "</td>";  
                      echo "<td>"; echo $row["product_price"];  echo "</td>";  
                      echo "<td>"; echo $row["product_qty"];  echo "</td>";  
                      echo "<td>"; echo $row["total"];  echo "</td>";  
                      echo "</tr>"; 
                  }
                ?>
            </table>

             <?php } ?>
           

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
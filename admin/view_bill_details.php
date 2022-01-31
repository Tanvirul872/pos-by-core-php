<?php
include "header.php";
include "../user/connection.php";

$id= $_GET['id']; 
$full_name=""; 
$bill_type="";
$date=""; 
$bill_no =""; 
$res = mysqli_query($link,"select * from billing_header where id=$id "); 
while($row=mysqli_fetch_assoc($res)){
    $full_name = $row["full_name"];
    $bill_type = $row["bill_type"];
    $date = $row["date"];
    $bill_no = $row["bill_no"];
}   


?>

    <!-- partial -->
  <div class="main-panel">
        <div class="content-wrapper">


            <div class="row">
              View Details Bill      
              
            </div>

            <table>
                <tr>
                    <td>Bill No:</td>
                    <td><?php echo $bill_no; ?></td>      
                </tr>
                <tr>
                    <td>Full Name:</td>
                    <td><?php echo $full_name; ?></td>      
                </tr>

                <tr>
                    <td>Bill Type:</td>
                    <td><?php echo $bill_type; ?></td>      
                </tr>

                <tr>
                    <td>Bill Date:</td>
                    <td><?php echo $date; ?></td>      
                </tr>
              
            </table>
            <br>
            <table class="table table-bordered">
                <tr>
                    <th> Product Company </th>
                    <th> Product Name </th>
                    <th> Product Unit </th>
                    <th> Packing Size </th>
                    <th> Price </th>
                    <th> Qty </th>
                    <th> Total </th>                     
                    <th> Return </th>                     
                </tr>
                <?php  
                   $total= 0; 
                  $res=mysqli_query($link,"select * from billing_details where bill_id = $id");
                  while($row=mysqli_fetch_assoc($res)){
                      echo "<tr>"; 
                      echo "<td>"; echo $row["product_company"];  echo"</td>";
                      echo "<td>"; echo $row["product_name"];  echo"</td>";
                      echo "<td>"; echo $row["product_unit"];  echo"</td>";
                      echo "<td>"; echo $row["packing_size"];  echo"</td>";
                      echo "<td>"; echo $row["price"];  echo"</td>";
                      echo "<td>"; echo $row["qty"];  echo"</td>";
                      echo "<td>"; echo $row["qty"]*$row["price"];  echo"</td>";
                          $total=$total+$row["qty"]*$row["price"];
                      echo "<td>"; ?><a href="return.php?id=<?php echo $row["id"]; ?>">Return</a> <?php  echo"</td>";
                      echo "</tr>"; 
                  }
                ?>

            </table>
              <h2> Grand Total = <?php echo $total;  ?></h2>
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
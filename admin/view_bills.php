<?php
include "header.php";
include "../user/connection.php";
?>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">


            <div class="row">
              View Bills
              
            </div>

            <table class="table table-borderd">
                <tr>
                    <th> Bill ID  </th>
                    <th> Full Name  </th>
                    <th> Bill Type  </th>
                    <th> Bill No  </th>
                    <th> Date  </th>
                    <th> Bill Total  </th>
                    <th> View Details  </th>     
                </tr>
                
                <?php 
                  $res = mysqli_query($link,"select * from billing_header order by id desc"); 
                  while($row=mysqli_fetch_assoc($res)){
                        echo "<tr>"; 
                        echo "<td>"; echo $row["id"];  echo "</td>"; 
                        echo "<td>"; echo $row["full_name"];  echo "</td>"; 
                        echo "<td>"; echo $row["bill_type"];   echo "</td>"; 
                        echo "<td>"; echo $row["bill_no"];    echo "</td>"; 
                        echo "<td>";  echo $row["date"];   echo "</td>"; 
                        echo "<td>";  echo get_total($row["id"],$link);    echo "</td>"; 
                        echo "<td>";?> <a href="view_bill_details.php?id=<?php echo $row["id"]; ?>"> View Details </a> <?php echo "</td>"; 
                        echo "</tr>"; 
                  }

                ?>

            </table>

            <?php 
       function get_total($bill_id,$link){
           $total =0; 
           $res2 = mysqli_query($link,"select * from billing_details where bill_id = $bill_id");  
           while($row2=mysqli_fetch_array($res2)){
               $total =$total+($row2['price']*$row2['qty']);            
           }
      
           return $total; 
      
        }
    ?>

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
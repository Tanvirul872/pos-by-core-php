<?php
include "header.php";
include "../user/connection.php";                
$id=$_GET["id"]; 
$bill_id= ""; 
$product_company = ""; 
$product_name = ""; 
$product_unit = ""; 
$packing_size = ""; 
$price = ""; 
$qty = ""; 
$total = 0; 

$res= mysqli_query($link,"select * from billing_details where id=$id");
while($row=mysqli_fetch_assoc($res)){
    $bill_id = $row["bill_id"]; 
    $product_company = $row["product_company"]; 
    $product_name = $row["product_name"]; 
    $product_unit = $row["product_unit"]; 
    $packing_size = $row["packing_size"]; 
    $price = $row["price"]; 
    $qty = $row["qty"]; 
    $total = $price*$qty ;                           
}
 
$bill_no =""; 

$res2 = mysqli_query($link,"select * from billing_header where id=$bill_id"); 
while($row2 =mysqli_fetch_assoc($res2)){
   $bill_no= $row2["bill_no"]; 
} 

$today_date =date('Y-m-d'); 
mysqli_query($link,"insert into return_products values(NULL,'$bill_no','$today_date','$product_company','$product_name','$product_unit','$packing_size','$price','$qty','$total')");     
mysqli_query($link,"update stock_master set product_qty=product_qty+$qty where product_company='$product_company' && product_name='$product_name' && product_unit='$product_unit' && packing_size ='$packing_size' ");
mysqli_query($link,"delete from billing_details where id=$id ");   

?> 
<script type="text/javascript">
    alert("Product take as a return successfully"); 
    window.location="view_bill_details.php?id=<?php echo $bill_id; ?>"
</script>                                                         

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
              View Return Products ...  
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
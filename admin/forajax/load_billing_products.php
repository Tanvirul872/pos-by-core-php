<?php 
session_start();  ?>

<div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th> Id </th>
                        <th> Product Category </th>
                        <th> Product Name </th>
                        <th> Product Unit </th>
                        <th> Product Size </th>
                        <th> Product Price </th>
                        <th> Product Quantity </th>
                        <th> Total </th>
                       
                        <th> Delete </th>
                    </tr>
                    </thead>
                    <tbody>


<?php

$qty_found =0;
$qty_session =0;
$max=0; 
if(isset($_SESSION['cart'])){
    $max=sizeof($_SESSION['cart']); 
}


//$max = sizeof($_SESSION['cart']);


for($i=0;$i<$max;$i++){

    $company_name_session = "";
    $product_name_session = "";
    $unit_session = "";
    $packing_size_session = "";
    $price_session =  "";  

    if(isset($_SESSION['cart'][$i])){
        foreach($_SESSION['cart'][$i] as $key=>$val){
            if($key=="company_name"){
                $company_name_session =$val ;
            }
            else if($key=="product_name"){
                $product_name_session=$val;
            }
            else if($key=="unit"){
                $unit_session=$val;
            }
            else if($key=="packing_size"){
                $packing_size_session=$val;
            }
            else if($key=="qty"){
                $qty_session=$val;
            }

            else if($key=="price"){
                $price_session =$val;
            }

        }  
        if($company_name_session != ""){
            ?>
  

        <tr>
        <td>  # </td>
        <td>  <?php echo $company_name_session;  ?> </td>
        <td>  <?php echo $product_name_session;  ?> </td>
        <td>  <?php echo $unit_session;  ?> </td>
        <td>  <?php echo $packing_size_session;  ?> </td> 
        <td>  <?php echo $price_session;  ?> </td>
        <td>  <input type="text" id="tt<?php echo $i; ?>" value="<?php echo $qty_session; ?>" > <i class="fa fa-refresh" aria-hidden="true"></i> <a class="btn btn-success" onclick="edit_qty(document.getElementById('tt<?php echo $i; ?>').value,'<?php echo $company_name_session ; ?>','<?php echo $product_name_session; ?>','<?php echo $unit_session; ?>','<?php echo $packing_size_session; ?>','<?php echo $price_session; ?>')">Refresh</a>  </td>
        <?php  $totalbill = $qty_session * $price_session; ?>
        <td>  <?php echo $totalbill;  ?> </td>
        <td style="color:red; cursor:pointer;" onclick="delete_qty(<?php echo $i; ?>)"> Delete </td>

    </tr>

    <?php

       }
    }
}
 

?>          


                    </tbody>
                </table>
            </div>

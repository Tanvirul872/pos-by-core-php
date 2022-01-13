
<?php
include "../../user/connection.php";

$company_name= $_GET['company_name'];
$product_name = $_GET['product_name'];
$unit = $_GET['unit'];

$res = mysqli_query($link,"SELECT * FROM `products` WHERE `company_name`='$company_name' && `product_name`='$product_name'  && `unit`='$unit'");

?>

<label> Select packing size  </label>
<select class="form-control" name="packing_size" id="packing_size" >
    <option> Select Unit </option>
    <?php

    while($row=mysqli_fetch_assoc($res)){
        echo "<option>";
        echo $row['packing_size'];
        echo "</option>";
    }
    echo "</select>";

    ?>


<?php
include "../../user/connection.php";

$company_name= $_GET['company_name'];
$product_name = $_GET['product_name'];

$res = mysqli_query($link,"SELECT * FROM `products` WHERE `company_name`='$company_name' && `product_name`='$product_name'");

?>

<label> Select unit </label>
<select class="form-control" name="unit" id="unit" onchange="select_unit(this.value,'<?php echo $company_name; ?>','<?php echo $product_name; ?>')">
    <option> Select Unit </option>
    <?php

    while($row=mysqli_fetch_assoc($res)){
        echo "<option>";
        echo $row['unit'];
        echo "</option>";
    }
    echo "</select>";

    ?>

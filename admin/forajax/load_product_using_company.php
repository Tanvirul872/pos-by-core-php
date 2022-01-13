<?php
include "../../user/connection.php";
$company_name= $_GET['company_name'];
//$res = mysqli_query($link,"select * from products where company_name='$company_name'");
$res = mysqli_query($link,"SELECT * FROM `products` WHERE `company_name`='$company_name'");
?>

<label> Select Product </label>
<select class="form-control" name="product_name" id="product_name" onchange="select_product(this.value,'<?php echo $company_name ?>')">
    <option> Select </option>
<?php

while($row=mysqli_fetch_assoc($res)){
  echo "<option>";
  echo $row['product_name'];
  echo "</option>";
}
echo "</select>";

?>







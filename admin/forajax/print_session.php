<?php
session_start();
$max = 0;
if(isset($_SESSION['cart'])){
    $max=sizeof($_SESSION['cart']);
}
for($i=0; $i<$max; $i++){
    if(isset($_SESSION['cart'][$i])){
        $company_name = "";
        $product_name = "";
        $unit = "";
        $packing_size = "";
        $qty = "";
        while(list ($key,$val)=each($_SESSION['cart'][$i])){
            if($key=="company_name"){
                $company_name = $val;
            }
            elseif($key=="product_name"){
                $product_name = $val;
            }
            elseif($key=="unit"){
                $unit = $val;
            }
            elseif($key=="packing_size"){
                $packing_size = $val;
            }
            elseif($key=="qty"){
                $qty = $val;
            }
        }
        echo $company_name." ".$product_name." ".$unit." ".$packing_size." ".$qty;
        echo "<br>";
    }
}



?>
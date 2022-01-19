<?php 
session_start();
?>

<?php

$qty_session =0;
$max=0; 
 $gtotal = 0;

if(isset($_SESSION['cart'])){
    $max=sizeof($_SESSION['cart']); 
}

for($i=0;$i<$max;$i++){  

    $price_session =  "";  

    if(isset($_SESSION['cart'][$i])){
        foreach($_SESSION['cart'][$i] as $key=>$val){
            if($key=="qty"){
                $qty_session =$val ;
            }
            else if($key=="price"){
                $price_session =$val;
            }

        } 

        $gtotal=($qty_session*$price_session);

    }
}
 
echo $gtotal;

?>          
          
          
      

                  
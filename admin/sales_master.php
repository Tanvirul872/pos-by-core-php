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
session_start(); 
include "header.php";
include "../user/connection.php";
$bill_id = 0; 
$res = mysqli_query($link,"select * from billing_header order by id desc limit 1"); 
while($row = mysqli_fetch_assoc($res)){
    $bill_id = $row["id"]; 
}

?>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

        <form class="form-sample" name="form1" action="" method="post">
            <div class="row">
                Sales master              
                <div class="col-12 grid-margin">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Horizontal Two column</h4>
                            
                                <p class="card-description"> Personal info </p>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Full  Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="full_name" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-form-label"> Bill Type </label>

                                                <select class="form-control" name="bill_type_header">
                                                    <option> bill 1 </option>
                                                    <option> bill 2</option>

                                                </select>

                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Date</label>
                                            <div class="col-sm-12">
                                                <input type="date" name="bill_date" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Bill No</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="bill_no" class="form-control" value="<?php echo generate_bill_no($bill_id); ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                      <h2 class="text-center">Select a product </h2>
                                  </div>

                                        <div class="form-group row">

                                            <div class="form-group col-md-3">
                                                <label> Select Company </label>
                                                <select class="form-control" name="company_name" id="company_name" onchange="select_company(this.value)"  >
                                                    <option>Select</option>
                                                    <?php
                                                    $res = mysqli_query($link,"select * from company_name");
                                                    while($row=mysqli_fetch_assoc($res)){ ?>
                                                        <option> <?php echo $row['company_name'] ;?> </option>
                                                    <?php   }  ?>

                                                </select>
                                            </div>

                                            <div class="form-group col-md-3" id="product_name_div">
                                                <label> Select Product </label>
                                                <select class="form-control" >
                                                    <option>Select</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3" id="unit_div">
                                                <label> Select Unit </label>
                                                <select class="form-control" >
                                                    <option>Select</option>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-3" id="packing_size_div">
                                                <label> Select Packing Size </label>
                                                <select class="form-control" >
                                                    <option>Select</option>
                                                </select>
                                            </div>

                                        </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-form-label"> Price</label>
                                            <div class="col-sm-12">
                                                <input type="number" name="price" id="price" class="form-control" value="0" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-form-label"> Qty</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" autocomplete="off" id="qty" name="qty" onkeyup="generate_total(this.value)" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group row">
                                            <label class="col-form-label"> Total </label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="total" id="total">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">

                                        <div class="form-group row">
                                            <label class="col-form-label">  Button </label>
                                            <div class="col-sm-12">
                                                <input type="submit" class="btn btn-success" value="Add" onclick="add_session();">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Taken Products </h4>
                            <div id="bill_products">  </div>


                            <h4 class="card-title"> Total Price <span id="totalbill"> 0  </span> </h4>
                              <div class="col-lg-12 grid-margin stretch-card">
                             <input type="submit" name="submit1" value="Generate Bill" class="btn btn-success">   
                           </div>
                        </div>
                    </div>
                </div>
               
            </div>  
         </form>
    </div>

<script type="text/javascript">

    function select_company(company_name){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange =function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
                document.getElementById("product_name_div").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_product_using_company.php?company_name="+company_name,true);
        xmlhttp.send();
    }

    function select_product(product_name,company_name){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange =function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
                document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_using_using_products.php?product_name="+product_name+"&company_name="+company_name,true);
        xmlhttp.send();
    }

    function select_unit(unit,company_name,product_name){

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange =function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
                document.getElementById("packing_size_div").innerHTML=xmlhttp.responseText;

                $('#packing_size').on('change',function(){

                    load_price(document.getElementById("packing_size").value);

                });
            }
        };
        xmlhttp.open("GET","forajax/load_using_unit.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name,true);
        xmlhttp.send();

    }

    function load_price(packing_size){
        var company_name=document.getElementById("company_name").value;
        var product_name=document.getElementById("product_name").value;
        var unit=document.getElementById("unit").value;

        // console.log(company_name);
        // console.log(product_name);
        // console.log(unit);
        // console.log(packing_size);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange =function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
                document.getElementById("price").value=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_price.php?company_name="+company_name+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size,true);
        xmlhttp.send();

    }

    function generate_total(qty){
        document.getElementById("total").value = eval(document.getElementById("price").value) * eval(document.getElementById("qty").value);
    }


   function add_session(){
        var product_company = document.getElementById("company_name").value;
        var product_name = document.getElementById("product_name").value;
        var unit = document.getElementById("unit").value;
        var packing_size = document.getElementById("packing_size").value;
        var price = document.getElementById("price").value;
        var qty = document.getElementById("qty").value;
        var total = document.getElementById("total").value;

       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange =function(){
           if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){

               if(xmlhttp.responseText==""){
                   load_billing_products();
                   load_total_bill();
                   alert("product added successfully");
               }else{
                   load_billing_products();
                   load_total_bill();
                   alert(xmlhttp.responseText);
               }

           }
       };
       xmlhttp.open("GET","forajax/save_in_session.php?company_name="+product_company+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size+"&price="+price+"&qty="+qty+"&total="+total,true);
       xmlhttp.send();

   }

   function load_billing_products(){
       
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange =function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
                document.getElementById("bill_products").innerHTML=xmlhttp.responseText;
                load_total_bill();
            }
        };
        xmlhttp.open("GET","forajax/load_billing_products.php",true);
        xmlhttp.send(); 

   }

   function load_total_bill(){ 
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange =function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
                document.getElementById("totalbill").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_billing_amount.php",true);
        xmlhttp.send(); 

   }

   load_billing_products(); 

function edit_qty(qty1,company_name1,product_name1,unit1,packing_size1,price1){

    // alert(qty1+company_name1+product_name1+unit1+packing_size1+price1); 

        var product_company = company_name1; 
        var product_name = product_name1;
        var unit = unit1;
        var packing_size = packing_size1;
        var price = price1;
        var qty = qty1;
        var total = eval(price)*eval(qty);  

       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange =function(){
           if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){

               if(xmlhttp.responseText==""){
                   load_billing_products();
                
                   alert("product updated successfully");
               }else{
                   load_billing_products();
                   alert(xmlhttp.responseText);
               }

           }
       };
       xmlhttp.open("GET","forajax/update_in_session.php?company_name="+product_company+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size+"&price="+price+"&qty="+qty+"&total="+total,true);
       xmlhttp.send();

}

function delete_qty(sessionid){
  

       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange =function(){
           if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){

               if(xmlhttp.responseText==""){
                   load_billing_products();
                
                   alert("product updated successfully");
               }else{
                   load_billing_products();
                   alert(xmlhttp.responseText);
               }

           }
       };
       xmlhttp.open("GET","forajax/delete_in_session.php?sessionid="+sessionid,true);
       xmlhttp.send(); 
}

</script>

<?php  

  function generate_bill_no($id){
      if($id==""){
        $id1 = 0; 
      }else{
        $id1= $id; 
      }

      $id1 = $id1+1; 
      $len = strlen($id);  
     if($len=="1"){
         $id1="0000".$id1; 
     }
     if($len=="2"){
        $id1="000".$id1; 
     }
     if($len=="3"){
        $id1="00".$id1; 
     }
     if($len=="4"){
        $id1="0".$id1; 
     }
     if($len=="5"){
        $id1= $id1; 
     }
     return $id1; 

  }

  if (isset($_POST["submit1"])){
      
    $lastbillno = 0; 
    mysqli_query($link,"insert into billing_header values (NULL,'$_POST[full_name]', '$_POST[bill_type_header]','$_POST[bill_date]', '$_POST[bill_no]','$_SESSION[admin]')") or die(mysqli_error($link));     
     $res = mysqli_query($link,"select * from billing_header order by id desc limit 1"); 
     while($row =mysqli_fetch_assoc($res)){
         $lastbillno = $row['id']; 
     }

     $max=sizeof($_SESSION['cart']);
     
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
            mysqli_query($link,"insert into billing_details values(NULL,'$lastbillno','$company_name_session','$product_name_session','$unit_session','$packing_size_session','$price_session','$qty_session')") or die(mysqli_error($link));  
            mysqli_query($link,"update stock_master set product_qty=product_qty-$qty_session where product_company= '$company_name_session' && product_name = '$product_name_session'  && product_unit='$unit_session' ");
        }
    }
}
 
unset($_SESSION['cart']);
?> 

<script type="text/javascript">
   alert('Bill Generated Successfully'); 
   window.location.href = window.location.href; 

</script>

<?php
  }

?>


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

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

<?php "footer.php"; ?>
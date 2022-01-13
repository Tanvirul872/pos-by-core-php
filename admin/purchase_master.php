<?php
include "header.php";
include "../user/connection.php";
?>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">


            <div class="row">
                Purchase master
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-description"> Add Purchase </p>
                            <form class="forms-sample" action="" method="post" name="form1">


                                <div class="form-group" id="company_name">
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

                                <div class="form-group" id="product_name_div">
                                    <label> Select Product </label>
                                    <select class="form-control" >
                                        <option>Select</option>
                                    </select>
                                 </div>

                                <div class="form-group" id="unit_div">
                                    <label> Select Unit </label>
                                    <select class="form-control" >
                                        <option>Select</option>
                                    </select>
                                </div>


                                <div class="form-group" id="packing_size_div">
                                    <label> Select Packing Size </label>
                                    <select class="form-control" >
                                        <option>Select</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Enter quantity </label>
                                    <input type="text" name="qty" value="0" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label> Enter Price </label>
                                    <input type="text" name="price" value="0" class="form-control" >
                                </div>

                                <div class="form-group" id="packing_size">
                                    <label> Select party name </label>
                                    <select class="form-control" name="party_name" >
                                        <option>Select</option>
                                        <?php
                                           $res=mysqli_query($link,"select * from party_info");
                                           while($row=mysqli_fetch_assoc($res)){
                                                  echo "<option>";
                                                  echo $row['businessname'];
                                                  echo "</option>";
                                           }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label> Select purchase type</label>
                                    <select class="form-control" name="purchase_type" >
                                        <option>Select</option>
                                        <option>Debit</option>
                                        <option>Credit</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Enter Expiry Date </label>
                                    <input type="text" name="expiry_date" placeholder="YYYY-MM-dd" required pattern="\d{4}-d{2}\d{2}"  class="form-control" >
                                </div>



                                <button type="submit" class="btn btn-primary mr-2" name="submit1">Purchase Now</button>

                                <div class="alert alert-success mt-2" id="success" style="display:none">
                                    Product inserted successfully ...
                                </div>
                            </form>


                        </div>
                    </div>
                </div>


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
                        }
                    };
                    xmlhttp.open("GET","forajax/load_using_unit.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name,true);
                    xmlhttp.send();

                }
            </script>

            <?php
            if(isset($_POST['submit1'])){
                mysqli_query($link,"INSERT INTO products VALUES (NULL,'$_POST[company_name]','$_POST[product_name]','$_POST[unit]','$_POST[packing_size]')") or die (mysqli_error($link));

                ?>
                <script type="text/javascript">
                    document.getElementById("success").style.display="block"
                    setTimeout(function(){
                        window.location.href= window.location.href;
                    },3000)
                </script>

            <?php   }  ?>
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
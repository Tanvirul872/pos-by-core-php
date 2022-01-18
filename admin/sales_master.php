<?php
include "header.php";
include "../user/connection.php";
?>

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">


            <div class="row">
                Sales master


                <div class="col-12 grid-margin">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Horizontal Two column</h4>
                            <form class="form-sample">
                                <p class="card-description"> Personal info </p>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Full  Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-form-label"> Bill Type </label>

                                                <select class="form-control">
                                                    <option> bill 1 </option>
                                                    <option> bill 2</option>

                                                </select>

                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Last Name</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" />
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


                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Sales </h4>
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
                                        <th> Edit </th>
                                        <th> Delete </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>  # </td>
                                        <td>  Product Category </td>
                                        <td> Name  </td>
                                        <td> Unit </td>
                                        <td>Size  </td>
                                        <td> Price  </td>
                                        <td> Quantity</td>
                                        <td> Total</td>
                                        <td> <a href="edit_stock_master.php?id=<?php echo $row['id'];?>"> Edit </a></td>
                                        <td> <a href="edit_stock_master.php?id=<?php echo $row['id'];?>"> Delete </a></td>

                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                   alert("product added successfully");
               }else{
                   alert(xmlhttp.responseText);
               }

           }
       };
       xmlhttp.open("GET","forajax/save_in_session.php?company_name="+product_company+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size+"&price="+price+"&qty="+qty+"&total="+total,true);
       xmlhttp.send();

   }

</script>


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
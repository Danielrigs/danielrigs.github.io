<?php

    $active='Cart';
  
    include("includes/header.php");

    ?>

   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Kezdőlap</a>
                   </li>
                   <li>
                       Kosár
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="row">
        <div id="basket" class="col-lg-9">
          <div class="box">
          <form action="cart.php" method="post" enctype="multipart/form-data">

          <?php 
                       
                       $ip_add = getRealIpUser();
                       
                       $select_cart = "select * from cart where ip_add='$ip_add'";
                       
                       $run_cart = mysqli_query($conn,$select_cart);
                       
                       $count = mysqli_num_rows($run_cart);
                       
                       ?>


              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Termék</th>
                      <th>Mennyiség</th>
                      <th>Egységár</th>
                      <th>Méret</th>
                      <th colspan="2">Ára</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                                   
                                   $total = 0;
                                   
                                   while($row_cart = mysqli_fetch_array($run_cart)){
                                       
                                     $pro_id = $row_cart['p_id'];
                                       
                                     $pro_size = $row_cart['size'];
                                       
                                     $pro_qty = $row_cart['qty'];
                                       
                                       $get_products = "select * from products where product_id='$pro_id'";
                                       
                                       $run_products = mysqli_query($conn,$get_products);
                                       
                                       while($row_products = mysqli_fetch_array($run_products)){
                                           
                                           $product_title = $row_products['product_title'];
                                           
                                           $product_img1 = $row_products['product_img1'];
                                           
                                           $only_price = $row_products['product_price'];
                                           
                                           $sub_total = $row_products['product_price']*$pro_qty;
                                           
                                           $total += $sub_total;

                                           $shipping = $total*0.1;

                                           $totalship = $total+$shipping;
                                           
                                   ?>
                                   


                    <tr> 
                      <td><a href="detail.html"><img class="img-responsive" src="admin_area/product_images/<?php echo $product_img1; ?>"  alt=<?php echo $product_title; ?>></a></td>
                      <td><a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a></td>
                      
                      <td><?php echo $pro_qty; ?></td>
                      <td><?php echo $only_price; ?></td>
                      <td><?php echo $pro_size; ?></td>
                      <td><?php echo $sub_total; ?></td>
                      
                      <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                    </tr>
                    
                    <?php } } ?>

                  </tbody>
                </table>
              </div>
              <div class="box-footer"><!-- box-footer Begin -->
                           
                           <div class="pull-left"><!-- pull-left Begin -->
                               
                               <a href="index.php" class="btn btn-redsec"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-chevron-left"></i> Folytatom a vásárlást
                                   
                               </a><!-- btn btn-default Finish -->
                               
                           </div><!-- pull-left Finish -->
                           
                           <div class="pull-right"><!-- pull-right Begin -->
                               
                               <button type="submit" name="update" value=update class="btn btn-red"><!-- btn btn-default Begin -->
                                   
                                   <i class="fa fa-refresh"></i> Kosár frissítése
                                   
                               </button><!-- btn btn-default Finish -->
                               
                               <a href="checkout.php" class="btn btn-red">
                                   
                                   Fizetek <i class="fa fa-chevron-right"></i>
                                   
                               </a>
                               
                           </div><!-- pull-right Finish -->
                           
                       </div><!-- box-footer Finish -->
            </form>
          </div>


          <?php 
               
               function update_cart(){
                   
                   global $conn;
                   
                   if(isset($_POST['update'])){
                       
                       foreach($_POST['remove'] as $remove_id){
                           
                           $delete_product = "delete from cart where p_id='$remove_id'";
                           
                           $run_delete = mysqli_query($conn,$delete_product);
                           
                           if($run_delete){
                               
                               echo "<script>window.open('cart.php','_self')</script>";
                               
                           }
                           
                       }
                       
                   }
                   
               }
              
              echo @$up_cart = update_cart();
              
              ?>
              






          <!-- similar products-->
          <section class="products-similar">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <h3>Ez a termékek is érdekelhetik</h3>
              </div>

              <?php 
                   
                   $get_products = "select * from products order by rand() LIMIT 0,3";
                   
                   $run_products = mysqli_query($conn,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                       $pro_id = $row_products['product_id'];
                       
                       $pro_title = $row_products['product_title'];
                       
                       $pro_price = $row_products['product_price'];
                       
                       $pro_img1 = $row_products['product_img1'];
                      
                      
                       echo "

                        <!-- product-->
                        <center>
                        <div class='col-lg-3 col-md-6'>
                          <div class='product'> 
                            <div class='image'><a href='details.php?pro_id=$pro_id'><img src='img/$pro_img1' alt='TermékAjánló' class='img-fluid'></a>
                             
                            </div>
                            <div class='text'>
                              <p class='brandv><a href='#'></a></p>
                              <h3> <a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                              <p class='price'>$pro_price FT</p>
                            </div>
                          </div>
                        </div>
                        <!-- /product-->
                        <!-- product-->
                        </center>
                        ";
                      }
                        ?>
            </div>
          </section>
          <!-- /similar products-->
        </div>
        <div class="col-lg-3" id="order-summary">
          <div id="order-summary" class="box">
            <div class="box-header">
              <h3 class="mb-0">Összesítés</h3>
            </div>
            <p class="text-muted">A csomagolás és a szállítás ára a rendelt termék mennyiségétől függ.<br><br>Az árak forintban értendők, és tartalmazzák az áfa értékét!</p>
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Vásárlás öszzege</td>
                    <th><?php echo $total; ?> Ft</th>
                  </tr>
                  <tr>
                    <td>Szállítás és csomagolás</td>

                    <th>
                      <?php 
                      if($total==0){
                       
                       echo "0 Ft";
                       }
                      else{
                         echo "$shipping Ft ";
                      }
                      ?>
                      </th>
                  </tr>
                 
                  <tr class="total">
                    <td>Végösszeg</td>
                    <th>
                    <?php 
                      if($total==0){
                       
                       echo "0 Ft";
                       }
                      else{
                        echo "$totalship Ft ";
                      }
                      ?>
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
              <h4 class="mb-0">Kupon kód</h4>
            </div>
            <p class="text-muted">Ha rendelkezik kupon kóddal kérjük ide írja be </p>
            <form>
              <div class="input-group">
                <input  type="text" class="form-control">
                <div class="input-group-append">
                  <div class="input-group-text p-0 bg-white">
                    <button type="button" class="btn btn-red"><i class="fa fa-gift"></i></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</body>
</html>
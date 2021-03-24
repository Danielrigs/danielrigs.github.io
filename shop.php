<?php
   
  
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
                       Termékek
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
           <?php 
               
                if(!isset($_GET['p_cat'])){
                    
                    if(!isset($_GET['cat'])){
              
                      echo "

                       <div class='box'><!-- box Begin -->
                           <h1>Termékek</h1>
                           <p>
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!
                           </p>
                       </div><!-- box Finish -->

                       ";
                        
                    }
                   
                   }
               
               ?>





                <div class="row"><!-- row Begin -->
               
               <?php 
               
                    if(!isset($_GET['p_cat'])){
                        
                     if(!isset($_GET['cat'])){
                        
                        $per_page=6; 
                         
                        if(isset($_GET['page'])){
                            
                            $page = $_GET['page'];
                            
                        }else{
                            
                            $page=1;
                            
                        }
                        
                        $start_from = ($page-1) * $per_page;
                         
                        $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                         
                        $run_products = mysqli_query($conn,$get_products);
                         
                        while($row_products=mysqli_fetch_array($run_products)){
                            
                            $pro_id = $row_products['product_id'];
        
                            $pro_title = $row_products['product_title'];

                            $pro_price = $row_products['product_price'];

                            $pro_img1 = $row_products['product_img1'];

                            //$pro_rating= $row_products['product_rating'];
                            
            echo "
            
                <div class='col-md-4 col-sm-6 center-responsive'>
        <center>
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        

                        <a href='details.php?pro_id=$pro_id'> $pro_title </a>

                        
                    
                    </h3>

                  
                    <p class='price'>
                    
                         $pro_price  Ft
                    
                    </p>
                    
                    
                
                </div>
            
            </div>
            </center>
        
        </div>
            
            ";
                            
                    }
                    
               ?>
           
           </div><!-- row Finish -->
           

           <div class="page-btn">    
                 <?php
                         
                $query = "select * from products";
                         
                $result = mysqli_query($conn,$query);
                         
                $total_records = mysqli_num_rows($result);
                         
                $total_pages = ceil($total_records / $per_page);
                         
                    echo "
                    <span><a href='shop.php?page=1'>".'<<'."</a></span>
                       
                    
                    ";
                         
                    for($i=1; $i<=$total_pages; $i++){
                        
                          echo "
                          <span><a href='shop.php?page=".$i."'>".$i."</a></span>
                        
                    ";  
                        
                    };
                         
                    echo "
                         <span><a href='shop.php?page=$total_pages'>".'>>'."</a></span>
                       
                    
                    ";
                         
                        }
                        
                    }
                 
                 ?> 
                   
                   </div>
          
            
            <?php 
            getpcatpro();
            getcatpro();
            
            ?>  
           
       </div><!-- col-md-9 Finish -->
       
   </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php 

include("includes/footer.php");

?>


    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

   
</body>
</html>
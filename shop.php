<?php

    session_start();
    require("PHP/connect.php");
    require("PHP/functions.php");
    require("PHP/rating.php");
   


    ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RockWebshop</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css v=42.5.0">
   
    
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   
    
    
</head>
<body>
   
<div class="navbar navbar-inverse" id="navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="navbar-header">
                            <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                            <a href="#" class="navbar-brand">RockWebshop</a>
                        </div>

                        <div class="navbar-collapse collapse" id="mobile_menu">
                            <ul class="nav navbar-nav">
                            <li ><a href="index.php">Kezdőlap</a></li>
                            <li class="active"><a href="shop.php">Termékek</a></li>
                                <li><a href="#">Rólunk</a></li>
                                <li><a href="contact.php">Kapcsolat</a></li>
                                
                            </ul>
                            <ul class="nav navbar-nav">
                                <li>
                                    <form action="" class="navbar-form">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="search" name="search" id="" placeholder="Keresés" class="form-control">
                                                <span class="input-group-addon" ><span style="color:black;" class="glyphicon glyphicon-search"></span></span>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                            <li><a href="cart.php"><span class="glyphicon glyphicon-th-list"></span> Kosár</a></li>
                                <li><a href="customer/my_account.php"><span class="glyphicon glyphicon-user"></span> Profilom</a></li>
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Bejelentkezés/Regisztráció <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Bejelentkezés</a></li>
                                        <li><a href="customer_register.php">Regisztráció</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                           <h1>Shop</h1>
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
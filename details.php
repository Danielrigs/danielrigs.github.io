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
    <link rel="stylesheet" href="css/style.css v=1.0.0">
    
   
    
    
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
                            <li class="active"><a href="index.php">Kezdőlap</a></li>
                            <li ><a href="shop.php">Termékek</a></li>
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
    <div id="content">
       <div class="container">
           <div class="col-md-12">
               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Kezdőlap</a>
                   </li>
                   <li>
                   <a href="shop.php">Termékek</a>
                   </li>
                   <li>
                       Product
                   </li>
               </ul>
           </div>
           <div class="col-md-3">
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div>
            <!------------ Product szekció ------------>
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                    <img src="" alt="">
                    </div>
                    <div class="col-2">
                    <h1>Cipo</h1>
                    <h4>kyx Ft</h4>
                    <select >
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                        <option>XXL</option>
                    </select>
                    <input type="number" value="1">
                    </div>
                </div>
            </div>

        








           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               
               
                   <div class="row">
       <?php 
        $get_product=get_product($conn,'latest',3);
        foreach($get_product as $list){
                    ?>
           <div class="col-sm-4 col-sm-6 center-responsive">
               <div class="product">
                   <a href="details.php">
                       <img class="img-responsive" src="admin_area/product_images/product-1.jpg" alt="Product 1">
                   </a>
                   <div class="text">
                       <h3>
                           <?php echo $list['product_title']?>
                       </h3>
                       <div class="rating">
                            <?php
                            switch ($list['product_rating']) {
                                case 1:
                                    echo $rating1;
                                    break;
                                case 2:
                                    echo $rating2;
                                    break;
                                case 3:
                                    echo $rating3;
                                    break;
                                case 4:
                                    echo $rating4;
                                    break;
                                case 5:
                                    echo $rating5;
                                    break;
                            }
                            ?>
                            </div>
                       <p class="price"><?php echo $list['product_price']?> Ft</p>
                       
                   </div>
               </div>
           </div>
           <?php } ?>
       </div>
   </div>
               
        
           </div>
           
       </div>
   </div>
  

<!-------------Footer szekció----------------->
<?php 
            include("includes/footer.php");
            
            ?>


    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

   
</body>
</html>
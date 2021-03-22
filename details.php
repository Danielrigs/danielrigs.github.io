
<?php
        session_start();
        require("PHP/connect.php");
        require("PHP/functions.php");
        require("PHP/rating.php");

    if(isset($_GET['pro_id'])){
        
        $product_id = $_GET['pro_id'];
        
        $get_product = "select * from products where product_id='$product_id'";
        
        $run_product = mysqli_query($conn,$get_product);
        
        $row_product = mysqli_fetch_array($run_product);
        
        $p_cat_id = $row_product['p_cat_id'];
        
        $pro_title = $row_product['product_title'];
        
        $pro_price = $row_product['product_price'];
        
        $pro_desc = $row_product['product_desc'];
        
        $pro_img1 = $row_product['product_img1'];
        
        $pro_img2 = $row_product['product_img2'];
        
        $pro_img3 = $row_product['product_img3'];
        
        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
        
        $run_p_cat = mysqli_query($conn,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        
    }
   


    ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RockWebshop</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css v=1.0.5">
    
   
    
    
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
                   <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                   </li>
                   <li> <?php echo $pro_title; ?> </li>
               </ul>
           </div>
           <div class="col-md-3">
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div>
            <!------------ Product szekció ------------>
            <div class="col-md-9">
               <div id="productMain" class="row">
                   <div class="col-sm-6">
                       <div id="mainImage">
                           <div id="myCarousel" class="carousel slide" data-ride="carousel">
                               <ol class="carousel-indicators">
                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li>
                               </ol>
                               <div class="carousel-inner">
                                   <div class="item active">
                                       <img class="img-responsive" src="admin_area/product_images/Product-3a.jpg" alt="Product 3-a">
                                   </div>
                                   <div class="item">
                                      <img class="img-responsive" src="admin_area/product_images/Product-3b.jpg" alt="Product 3-b">
                                   </div>
                                   <div class="item">
                                       <img class="img-responsive" src="admin_area/product_images/Product-3c.jpg" alt="Product 3-c">
                                   </div>
                               </div>
                               <div class="row" id="thumbs">
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="0"  href="#" class="thumb">
                                   <img src="admin_area/product_images/Product-3a.jpg" alt="product 1" class="img-responsive">
                               </a>
                           </div>
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="1"  href="#" class="thumb">
                                   <img src="admin_area/product_images/Product-3b.jpg" alt="product 2" class="img-responsive">
                               </a>
                           </div>
                           <div class="col-xs-4">
                               <a data-target="#myCarousel" data-slide-to="2"  href="#" class="thumb">
                                   <img src="admin_area/product_images/Product-3c.jpg" alt="product 4" class="img-responsive">
                               </a>
                           </div>
                       </div>
                               
                               <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                   <span class="glyphicon glyphicon-chevron-left"></span>
                                   <span class="sr-only">Previous</span>
                               </a>
                               <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                   <span class="glyphicon glyphicon-chevron-right"></span>
                                   <span class="sr-only">Previous</span>
                               </a>
                           </div>
                       </div>
                   </div>
                   <div class="col-sm-6" id="productform">
                       <div class="box">
                           <h1 class="product-title" class="text-center"><?php echo $pro_title; ?></h1>

                           <?php add_cart(); ?>

                           <p class="price"><?php echo $pro_price; ?> Ft</p>
                           
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">
                               <div class="form-group">
                                   <label for="" class="col-md-5 control-label">Mennyiség</label>
                                   
                                   <div class="col-md-7" >
                                          <select name="product_qty" id="" class="form-control" >
                                           <option style="color:black;">1</option>
                                           <option style="color:black;">2</option>
                                           <option style="color:black;">3</option>
                                           <option style="color:black;">4</option>
                                           <option style="color:black;">5</option>
                                           </select>
                                    </div>
                               </div>
                               <div class="form-group">
                                   <label class="col-md-5 control-label">Termék mérete</label>
                                   <div class="col-md-7">
                                       <select name="product_size" class="form-control" required  oninvalid="this.setCustomValidity('Méret kiválasztása kötelező')" oninput="setCustomValidity('')">
                                           <option value="" disabled selected style="color:black;">Válaszon méretet</option>
                                           <option value="S"style="color:black;">S(small)</option>
                                           <option value="M"style="color:black;">M(medium)</option>
                                           <option value="L"style="color:black;">L(large)</option>
                                           <option value="XL" style="color:black;">XL</option>
                                       </select>
                                   </div>
                               </div>
                               <p class="text-center buttons">
                               <button type="submit" name="register" class="btn btn-red">
                               
                               <i class="fa fa-shopping-cart"></i> Kosárba
                               
                               </button>
                               </p>
                               
                               
                           </form>
                       </div>
                       
                   </div>
               </div>
               <div class="box" id="details">
                       <h4>Termék leírás</h4>
                   
                   <p>
                       
                   <?php echo $pro_desc; ?>
                       
                   </p>
                   
                       <h4>Méretek</h4>
                       
                       <ul>
                           <li>Small</li>
                           <li>Medium</li>
                           <li>Large</li>
                       </ul>  
                       
                       <hr>
                   
               </div>
           <div class="col-md-9">
           <h2 class="title-hot">További népszerű termékeink</h2>
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
<?php

session_start();
if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

    
    require("../PHP/connect.php");
    require("../PHP/functions.php");
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RockWebshop</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css v=42.5.2">
   
    
    
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
                            <li class="active"><a href="../index.php">Kezdőlap</a></li>
                            <li ><a href="../shop.php">Termékek</a></li>
                                <li><a href="../contact.php">Kapcsolat</a></li>
                                
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
                            <li><a href="../cart.php"><span class="glyphicon glyphicon-th-list"></span> Kosár</a></li>
                            <?php 
                   
                                if(!isset($_SESSION['customer_email'])){
                       
                                    echo "<li><a href=''><span class='glyphicon glyphicon-user'></span> Profilom</a></li>";
                       
                                     }else{
                       
                                    echo "<li><a href='my_account.php'><span class='glyphicon glyphicon-user'></span> " . $_SESSION['customer_email'] . "</a></li>";
                       
                                         }
                   
                                 ?>
                                


                                <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<li><a href='checkout.php' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-log-in'></span> Bejelentkezés/Regisztráció <span class='caret'></span></a>
                                <ul class='dropdown-menu'>
                                    <li><a href='checkout.php'>Bejelentkezés</a></li>
                                    <li><a href='customer_register.php'>Regisztráció</a></li>
                                </ul>
                            </li>";

                               }else{

                                echo "<li><a href='../logout.php'><span class='glyphicon glyphicon-user'></span> Kijelentkezés</a></li> ";

                               }
                           
                           ?>
                                
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
                       Profilom
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
           <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <?php
                   
                   if (isset($_GET['my_orders'])){
                       include("my_orders.php");
                   }
                   
                   ?>
                   
                   <?php
                   
                   if (isset($_GET['pay_offline'])){
                       include("pay_offline.php");
                   }
                   
                   ?>
                   
                   <?php
                   
                   if (isset($_GET['edit_account'])){
                       include("edit_account.php");
                   }
                   
                   ?>
                   
                   <?php
                   
                   if (isset($_GET['change_pass'])){
                       include("change_pass.php");
                   }
                   
                   ?>
                   
                   <?php
                   
                   if (isset($_GET['delete_account'])){
                       include("delete_account.php");
                   }
                   
                   ?>
                   
               </div><!-- box Finish -->
               
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
<?php } ?>
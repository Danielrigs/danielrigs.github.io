<?php

    session_start();
    require("../PHP/connect.php");
    require("../PHP/functions.php");
    require("../PHP/rating.php");
    ?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RockWebshop</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css v=1.0.0">
   
    
    
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
                            <li ><a href="../index.php">Kezdőlap</a></li>
                            <li ><a href="../shop.php">Termékek</a></li>
                                <li><a href="#">Rólunk</a></li>
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
                                <li><a href="customer/my_account.php"><span class="glyphicon glyphicon-user"></span> Profilom</a></li>
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Bejelentkezés/Regisztráció <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Bejelentkezés</a></li>
                                        <li><a href="../customer_register.php">Regisztráció</a></li>
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
                   
                   <h1 align="center"> Please confirm your payment</h1>
                   
                   <form action="confirm.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Invoice No: </label>
                          
                          <input type="text" class="form-control" name="invoice_no" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Amount Sent: </label>
                          
                          <input type="text" class="form-control" name="amount_sent" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Select Payment Mode: </label>
                          
                          <select name="payment_mode" class="form-control"><!-- form-control Begin -->
                              
                              <option> Select Payment Mode </option>
                              <option> Back Code </option>
                              <option> UBL / Omni Paisa </option>
                              <option> Easy Paisa </option>
                              <option> Western Union </option>
                              
                          </select><!-- form-control Finish -->
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Transaction / Reference ID: </label>
                          
                          <input type="text" class="form-control" name="ref_no" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Omni Paisa / East Paisa: </label>
                          
                          <input type="text" class="form-control" name="code" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Payment Date: </label>
                          
                          <input type="text" class="form-control" name="date" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="text-center"><!-- text-center Begin -->
                           
                           <button class="btn btn-primary btn-lg"><!-- tn btn-primary btn-lg Begin -->
                               
                               <i class="fa fa-user-md"></i> Confirm Payment
                               
                           </button><!-- tn btn-primary btn-lg Finish -->
                           
                       </div><!-- text-center Finish -->
                       
                   </form><!-- form Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
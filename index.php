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
        <div id="front">
    <div class="row ">
                <div class="col-2 ">
                        <h1>Légy igazi lázadó!<br>A te stílusod!</h1>
                        <p>„Élj a pillanatnak! A pillanatok alkotják a történelmet!” <br>– Nikki Sixx</p>
                </div>
                <div class="col-2 ">
                    <img src="images/header_pic.png" alt="Fejléc Kép" class="headerpic">
                </div>
            </div>
        </div>

    <div id="advantages">
        <div class="container">
            <div class="same-height-row">
                <div class="col-sm-4">
                    <div class="box same-height">
                    <img src="images/featured-1.jpg" alt="Ajánló-1">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                    <img src="images/featured-2.jpg" alt="Ajánló-2">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                    <img src="images/featured-3.jpg" alt="Ajánló-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
    

        <!-------------About us szekció----------------->
        <div id="about">
            <a class="anchor" id="rolunk"></a>
            <div class="row">
                <div class="col-2">
                    <img src="images/exclusive.jpg" alt="PárosRock" class="exclusive">
                </div>
                <div class="col-2 text">
                    <h2>Nekünk ti vagytok a legfontosabbak.</h2>
                    <h1>Ez a ti világotok</h1>
                    Ez több mint egy stílus......ez egy közösség és egy életérzés.
                    Ezért alkottuk ezt az oldalt.Itt mindenki megtalálhatja önmegát és egyedi lehet.
                    Legyél te Punk, Goth, Emo, Rocker, Metalhead....neked itt a helyed.
                    <br><br>
                    <p>
                    "Ők röhögnek rajtam mert más vagyok, èn röhögök rajtuk mert egyformák"-Kurt Cobain
                    </p>
                </div>
            </div>          
        </div> 
        <div id="content" class="container">
            <h2 class="title">Legújabb termékeink</h2>
            <div class="row">
        <?php 
            $get_product=get_product($conn,'latest',3);
            foreach($get_product as $list){
                        ?>
            <div class="col-sm-4 col-sm-6 single">
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
        <!-------------Footer szekció----------------->
                <?php 
                include("includes/footer.php");
                
                ?>


        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        

</body>
</html>
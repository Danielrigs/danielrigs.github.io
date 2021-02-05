<?php

    session_start();
    require("../PHP/connect.php");
    require("../PHP/functions.php");
    ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RockWebshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="">
                </div>
            <nav>
                <ul>
                        <li><a href="Kezdőlap"></a>Kezdőlap</li>
                        <li><a href="Termékek"></a>Termékek</li>
                        <li><a href="Rólunk"></a>Rólunk</li>
                        <li><a href="Kapcsolat"></a>Kapcsolat</li>
                        <li><a href="Fiók"></a>Fiók</li>
                </ul>
            </nav>
            <img src="../images/shopping_cart.png" width="30px"height="30px"alt="Bevásárló kosár">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                    <h1>Légy igazi lázadó!<br>A te stílusod!</h1>
                    <p>„Élj a pillanatnak! A pillanatok alkotják a történelmet!” <br>– Nikki Sixx</p>
                    <a href="" class="btn">Vigyáz! Kész! Rock 'n Roll! &#8594;</a>
            </div>
            <div class="col-2">
                <img src="../images/header_pic.png" alt="Fejléc Kép">
            </div>
        </div>
    </div>

    <!------ajánló-------->

    <div class="categories">
        <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src="../images/featured-1.jpg" alt="Ajánló-1">
            </div>
            <div class="col-3">
                <img src="../images/featured-2.jpg" alt="Ajánló-2">
            </div>
            <div class="col-3">
                <img src="../images/featured-3.jpg" alt="Ajánló-3">
            </div>
        </div>
        </div>
    </div>


    <!------termék ajánló PHP-------->

   
    <!------termék ajánló HTML-------->

    <div class="small-container">
        <h2 class="title">Ajánlott termékek</h2>
        <div class="row">
        <?php 
        $get_product=get_product($conn,'latest',1);
        foreach($get_product as $list){
        ?>


            <div class="col-4">
                <img src="" alt="">
                <h4><?php $list['product_title']?></h4>
                    <div class="rating">
                    </div>
                    <p></p>
            </div>
        <?php } ?>
        </div>
    </div>

</body>
</html>
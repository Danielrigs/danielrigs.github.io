<?php


include("includes/header.php");

    ?>
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
                <center>

                <?php 
                   
                   $get_products = "select * from products order by rand() LIMIT 0,4";
                   
                   $run_products = mysqli_query($conn,$get_products);
                   
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                       $pro_id = $row_products['product_id'];
                       
                       $pro_title = $row_products['product_title'];
                       
                       $pro_price = $row_products['product_price'];
                       
                       $pro_img1 = $row_products['product_img1'];
                      
                       
                       echo "

                        <!-- product-->
                        <div class='col-sm-4 col-sm-6 single'>
                          <div class='product'> 
                            <div class='image'><a href='details.php?pro_id=$pro_id'><img src='img/$pro_img1' alt='TermékAjánló' class='img-fluid'></a>
                             
                            </div>
                            <div class='text'>
                              
                              <h3> <a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                              <p class='price'>$pro_price FT</p>
                            </div>
                          </div>
                        </div>
                        <!-- /product-->
                        <!-- product-->
                        ";
                      }
                        ?>
        
            </center>
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
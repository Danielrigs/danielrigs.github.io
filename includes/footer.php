<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
               <h4>Oldalak</h4>
                <ul>
                    <li><a href="cart.php">Kosár</a></li>
                    <li><a href="contact.php">Kapcsolat</a></li>
                    <li><a href="shop.php">Termékek</a></li>
                    <li><a href="customer/my_account.php">Fiókom</a></li>
                </ul>
                <hr>
                <h4>Adataim</h4>
                <ul><!-- ul Begin -->
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='customer/customer_login.php.php'>Bejelentkezés</a>";
                               
                           }else{
                               
                              echo"<a href='customer/my_account.php?my_orders'>Profilom</a>"; 
                               
                           }
                           
                           ?>
                    
                    <li>
                    
                            <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='customer_register.php'>Regisztráció</a>";
                               
                           }else{
                               
                              echo"<a href='my_account.php?edit_account'>Profil szerkeztése</a>"; 
                               
                           }
                           
                           ?>
                    
                    </li>
                </ul><!-- ul Finish -->
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>
            <div class="com-sm-6 col-md-3">
                <h4>Top Kategóriák</h4>
                <ul>
                <?php 
                    
                    $get_p_cats = "select * from product_categories";
                
                    $run_p_cats = mysqli_query($conn,$get_p_cats);
                
                    while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                        
                        $p_cat_id = $row_p_cats['p_cat_id'];
                        
                        $p_cat_title = $row_p_cats['p_cat_title'];
                        
                        echo "
                        
                            <li>
                            
                                <a href='shop.php?p_cat=$p_cat_id'>
                                
                                    $p_cat_title
                                
                                </a>
                            
                            </li>
                        
                        ";
                        
                    }
                
                ?>
                </ul>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>Elérhetőségek</h4>
                <p>
                    <strong>RockWebshop</strong>
                    <br/>Magyarország
                    <br/>Budapest
                    <br/>06303919408
                    <br/>therockwebshop@gmail.com
                    <br/><strong>Springmann Dániel</strong>
                </p>
                <a href="contact.php">Lépj kapcsolatba velünk</a>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-sm-6 col-md-3">
                <h4>Értelsülj</h4>
                <p class="text-muted">
                    Ne hagyd ki a legújabb termékeinket.
                </p>

               


                <form action=" " method="POST" >
                    <div class="input-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="xyz@minta.com">
                        <span class="input-group-btn">
                            <button type="submit" name="subscribe" style="color:black;" value="Feliratkozás" class="btn">Feliratkozás</button>
                        </span>
                    </div>
                    <?php 
                $userEmail = ""; //first we leave email field blank
                if(isset($_POST['subscribe'])){ //if subscribe btn clicked
                 $userEmail = $_POST['email']; //getting user entered email
                 if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //validating user email
                 $subject = "Köszönjük hogy feliratkozott!";
                 $message = "Thanks for subscribing to our blog. You'll always receive updates from us. And we won't share and sell your information.";
                 $sender = "From: rockwebshopsubn@gmail.com";
        //php function to send mail
        if(mail($userEmail, $subject, $message, $sender)){
          ?>
           <!-- show sucess message once email send successfully -->
          <div class="alert success-alert">
            <?php echo "Köszönjük hogy feliratkozott" ?>
          </div>
          <?php
          $userEmail = "";
        }else{
          ?>
          <!-- show error message if somehow mail can't be sent -->
          <div class="alert error-alert">
          <?php echo "Sajnáljuk de hiba lépett fel,Próbálja ujra később" ?>
          </div>
          <?php
        }
      }else{
        ?>
        <!-- show error message if user entered email is not valid -->
        <div class="alert error-alert">
          <?php echo "$userEmail nem egy érvényes email cím !" ?>
        </div>
        <?php
      }
    }
    ?>
                </form>

                <hr>
                <h4>Kövess minket</h4>
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>
            </div>
        </div>
    </div>
    <hr id="copyright">
    <p class="copyright">Copyright © 2020 Springmann Dániel</a></p>
</div><!-- #footer Finish -->


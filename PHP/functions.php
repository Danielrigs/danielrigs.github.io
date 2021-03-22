<?php

 require("connect.php");


 function get_product($conn,$type='',$limit=''){
    $sql="SELECT * FROM products";
    if($type=='latest'){
        $sql.=" ORDER BY product_id DESC";
                    }
            if($limit!=''){
                $sql.=" limit $limit";
                    }
            $res=mysqli_query($conn,$sql);
            $data=array();
            while($row = mysqli_fetch_assoc($res)){
                $data[]=$row;
                }
                return $data;
}
 


function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

/// begin add_cart functions ///

function add_cart(){
    
    global $conn;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();
        
        $p_id = $_GET['add_cart'];
        
        $product_qty = $_POST['product_qty'];
        
        $product_size = $_POST['product_size'];
        
        $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
        
        $run_check = mysqli_query($conn,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            

            echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 


           
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into cart (p_id,ip_add,qty,size) values ('$p_id','$ip_add','$product_qty','$product_size')";
            
            $run_query = mysqli_query($conn,$query);
            
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }
        
    }
    
}









function getPCats(){
                    
global $conn;
                
$get_p_cats = "SELECT * FROM product_categories";
                
$run_p_cats = mysqli_query($conn,$get_p_cats);
                
while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                    
    $p_cat_id = $row_p_cats['p_cat_id'];
                    
    $p_cat_title = $row_p_cats['p_cat_title'];
                    
    echo "
                    
        <li>
                        
        <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>
                        
        </li>
                    
        ";
                    
    }
                
}


function getCats(){

    global $conn;
    
    $get_cats = "SELECT * FROM categories";
    
    $run_cats = mysqli_query($conn,$get_cats);
    
    while($row_cats=mysqli_fetch_array($run_cats)){
        
        $cat_id = $row_cats['cat_id'];
        
        $cat_title = $row_cats['cat_title'];
        
        echo "
        
            <li>
            
                <a href='shop.php?cat=$cat_id'> $cat_title </a>
            
            </li>
        
        ";
        
    }
    
}






function getpcatpro(){
    
    global $conn;
    
    if(isset($_GET['p_cat'])){
        
        $p_cat_id = $_GET['p_cat'];
        
        $get_p_cat ="SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";
        
        $run_p_cat = mysqli_query($conn,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        
        $get_products ="SELECT * FROM products WHERE p_cat_id='$p_cat_id'";
        
        $run_products = mysqli_query($conn,$get_products);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            
            echo "
            
                <div class='box'>
                
                    <h1> Nincs ilyen termékünk </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box'>
                
                    <h1> $p_cat_title </h1>
                    
                    <p> $p_cat_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_products=mysqli_fetch_array($run_products)){
            
            $pro_id = $row_products['product_id'];
        
            $pro_title = $row_products['product_title'];

            $pro_price = $row_products['product_price'];

            $pro_img1 = $row_products['product_img1'];

           // $pro_rating= $row_products['product_rating'];
            
            echo "
            
                <div class='col-md-4 col-sm-6 center-responsive'>
                <center>
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                  
                    
                    <p class='price'>
                    
                         $pro_price Ft
                    
                    </p>
                    
                    
                
                </div>
                
            
            </div>
            <center>
        
        </div>
            
            ";
            
        }
        
    }
    
}



function getcatpro(){
    
    global $conn;
    
    if(isset($_GET['cat'])){
        
        $cat_id = $_GET['cat'];
        
        $get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id'";
        
        $run_cat = mysqli_query($conn,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_title = $row_cat['cat_title'];
        
        $cat_desc = $row_cat['cat_desc'];
        
        $get_cat = "SELECT * FROM products WHERE cat_id='$cat_id'";
        
        $run_products = mysqli_query($conn,$get_cat);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            
            
            echo "
            
                <div class='box'>
                
                    <h1> Nincs termék ebben a kategóriában </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box'>
                
                    <h1> $cat_title </h1>
                    
                    <p> $cat_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_products=mysqli_fetch_array($run_products)){
            
            $pro_id = $row_products['product_id'];
            
            $pro_title = $row_products['product_title'];
            
            $pro_price = $row_products['product_price'];
        
            
            $pro_img1 = $row_products['product_img1'];
            $pro_rating= $row_products['product_rating'];
            
            echo "
            
                <div class='col-md-4 col-sm-6 center-responsive'>
            <center>
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                            
                    
                    <p class='price'>
                    
                         $pro_price Ft
                    
                    </p>
                    
                    
                
                </div>
            
            </div>
            </center>
        
        </div>
            
            ";
            
        }
        
    }
    
}

?>
    
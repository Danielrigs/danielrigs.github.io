<?php
 require("../PHP/connect.php");

function get_product($conn,$type='',$limit=''){
    $sql="SELECT * FROM products";
    if($type=='latest'){
        $sql.=" ORDER BY product_id DESC";
    }
    /*if($limit!=''){
        $sql.=" limit $limit";
    }*/
    $res=mysqli_query($conn,$sql);
    $data=array();
    while($row = mysqli_fetch_assoc($res)){
        $data[]=$row;
    }
    return $data;
}
?>
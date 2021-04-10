<html>
</body>
<head>
<link rel="stylesheet" type="text/css" href="style_pro.css">
<link href="https://fonts.googleapis.com/css2?family=Archivo&family=Cairo:wght@200;300&family=Hind:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
</head>
<?php

$con = mysqli_connect("localhost","zorana","test","projekat");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL db: " .mysqli_connect_errno();
}

function getCategory(){

    global $con;

    $get_category = "select * from category";

    $run_category = mysqli_query($con, $get_category);

    while ($row_category = mysqli_fetch_array($run_category)){
       
        $category_id = $row_category['category_id'];
        $category_title = $row_category['category_title'];

        echo "<li><a href='index.php?cat=$category_id'>$category_title</a></li>";

    }

}
function getBrand(){

    global $con;

    $get_brand = "select * from brand";

    $run_brand = mysqli_query($con, $get_brand);

    while ($row_brand = mysqli_fetch_array($run_brand)){
       
        $brand_id = $row_brand['brand_id'];
        $brant_title = $row_brand['brant_title'];

        echo "<li><a href='index.php?brand=$brand_id'>$brant_title</a></li>";

    }

}

function  getPro() {

    if(!isset($_GET['cat'])){

        if(!isset($_GET['brand'])){

        global $con;

        $get_pro = "select * from product order by RAND() LIMIT 0,12";

        $run_pro = mysqli_query($con, $get_pro);

        while($row_pro = mysqli_fetch_array($run_pro)){

            $pro_id = $row_pro['product_id'];
            $pro_cat = $row_pro['product_category'];
            $pro_brand = $row_pro['product_brand'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_image = $row_pro['product_image'];
            $pro_desc = $row_pro['product_desc'];
            
            echo "
            <div id='single_product'>
          
                <img src='admin/product_images/$pro_image'  id='pro_img' />
                <h3 id='pro_title'>$pro_title</h3>
                <p id='pro_price'><b> $ $pro_price</b></p>
                
                
                <a href='index.php?add_cart=$pro_id'><button id='btn_addToCart'><i class='fa fa-shopping-cart cart'></i><span>Add to Cart</span></button></a><br>
                <a href='details.php?pro_id=$pro_id'><button id='details'>Details</button></a>

                
            </div>
        ";


    }
    }
    }
    }

    function  getAllPro() {

  

        
    
            global $con;
    
            $get_pro = "select * from product";
    
            $run_pro = mysqli_query($con, $get_pro);
    
            while($row_pro = mysqli_fetch_array($run_pro)){
    
                $pro_id = $row_pro['product_id'];
                $pro_cat = $row_pro['product_category'];
                $pro_brand = $row_pro['product_brand'];
                $pro_title = $row_pro['product_title'];
                $pro_price = $row_pro['product_price'];
                $pro_image = $row_pro['product_image'];
                $pro_desc = $row_pro['product_desc'];
                
                echo "
                <div id='single_product'>
              
                    <img src='admin/product_images/$pro_image'  id='pro_img' />
                    <h3 id='pro_title'>$pro_title</h3>
                    <p id='pro_price'><b> $ $pro_price</b></p>
                    
                    
                    <a href='index.php?add_cart=$pro_id'><button id='btn_addToCart'><i class='fa fa-shopping-cart cart'></i><span>Add to Cart</span></button></a><br>
                    <a href='details.php?pro_id=$pro_id'><button id='details'>Details</button></a>

                    
                </div>
            ";
    
    
        }
       
        
    }


    

    function  getCatPro() {

        if(isset($_GET['cat'])){
    
           $cat_id = $_GET['cat'];
    
            global $con;
    
            $get_cat_pro = "select * from product where product_category='$cat_id'";
    
            $run_cat_pro = mysqli_query($con, $get_cat_pro);

            $count_cats = mysqli_num_rows($run_cat_pro);

            if($count_cats == 0){
                echo "<h2>There is no products in this categoty.</h2>";
                exit();
            }

            
    
            while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
    
                $pro_id = $row_cat_pro['product_id'];
                $pro_cat = $row_cat_pro['product_category'];
                $pro_brand = $row_cat_pro['product_brand'];
                $pro_title = $row_cat_pro['product_title'];
                $pro_price = $row_cat_pro['product_price'];
                $pro_image = $row_cat_pro['product_image'];
                $pro_desc = $row_cat_pro['product_desc'];

               
                 
                echo "
                <div id='single_product'>
              
                    <img src='admin/product_images/$pro_image'  id='pro_img' />
                    <h3 id='pro_title'>$pro_title</h3>
                    <p id='pro_price'><b> $ $pro_price</b></p>
                    
                    
                    <a href='index.php?add_cart=$pro_id'><button id='btn_addToCart'><i class='fa fa-shopping-cart cart'></i><span>Add to Cart</span></button></a><br>
                    <a href='details.php?pro_id=$pro_id'><button id='details'>Details</button></a>

                    
                </div>
            ";
    
    
        }
    }
        }
         
     
    
        function  getBrandPro() {

            if(isset($_GET['brand'])){
        
               $brand_id = $_GET['brand'];
        
                global $con;
        
                $get_brand_pro = "select * from product where product_brand='$brand_id'";
        
                $run_brand_pro = mysqli_query($con, $get_brand_pro);
    
                $count_brand = mysqli_num_rows($run_brand_pro);
    
                if($count_brand == 0){
                    echo "<h2>There is no products of this brand.</h2>";
                    exit();
                }
    
                
        
                while($row_brand_pro = mysqli_fetch_array($run_brand_pro)){
        
                    $pro_id = $row_brand_pro['product_id'];
                    $pro_cat = $row_brand_pro['product_category'];
                    $pro_brand = $row_brand_pro['product_brand'];
                    $pro_title = $row_brand_pro['product_title'];
                    $pro_price = $row_brand_pro['product_price'];
                    $pro_image = $row_brand_pro['product_image'];
                    $pro_desc = $row_brand_pro['product_desc'];
    
                   
                     
                    echo "
                <div id='single_product'>
              
                    <img src='admin/product_images/$pro_image'  id='pro_img' />
                    <h3 id='pro_title'>$pro_title</h3>
                    <p id='pro_price'><b> $ $pro_price</b></p>
                    
                    
                    <a href='index.php?add_cart=$pro_id'><button id='btn_addToCart'><i class='fa fa-shopping-cart cart'></i><span>Add to Cart</span></button></a><br>
                    <a href='details.php?pro_id=$pro_id'><button id='details'>Details</button></a>

                    
                </div>
            ";
                    
        
        
            }
        }
            }

            function getIp() {
                $ip = $_SERVER['REMOTE_ADDR'];
             
                if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }
             
                return $ip;
            }           
             
         
    function cart(){
            if(isset($_GET['add_cart'])){

                global $con;
                $ip= getIp();    
                $pro_id = $_GET['add_cart'];

                $check_pro = "SELECT * FROM cart WHERE ip_add='$ip' AND ip_id='$pro_id'";
                $run_check = mysqli_query($con, $check_pro);

                if(mysqli_num_rows($run_check)>0){
                    echo "";
                }else {
                    $insert_pro = "INSERT INTO cart (ip_id,ip_add) VALUES ('$pro_id','$ip')";

                    $run_pro = mysqli_query($con, $insert_pro);
                    echo "<script>window.open('index.php','self')</script>";
                }
            }
    }     

    function totalItems(){

        if(isset($_GET['add_cart'])){

            global $con;
            $ip=getIp();

            $get_items = "SELECT * FROM cart WHERE ip_add='$ip'";
            $run_items = mysqli_query($con, $get_items);

            $count_items = mysqli_num_rows($run_items);

            


        }else{

            global $con;
            $ip=getIp();

            $get_items = "SELECT * FROM cart WHERE ip_add='$ip'";
            $run_items = mysqli_query($con, $get_items);

            $count_items = mysqli_num_rows($run_items);


        }

        echo $count_items;

    }

    function total_price(){

        $total=0;

        global $con;

        $ip= getIp();
        $sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";
        $run_price = mysqli_query($con, $sel_price);

        while($p_price=mysqli_fetch_array($run_price)){

            $pro_id = $p_price['ip_id'];

            $pro_price = "SELECT * FROM product WHERE product_id='$pro_id'";
            $run_pro_price = mysqli_query($con,$pro_price);

            while($pp_price = mysqli_fetch_array($run_pro_price)){

                $product_price = array($pp_price['product_price']);
                $values = array_sum($product_price);

                $total +=$values;

            }

        }

        echo $total;

    }

   
    



?>
</body>
</html>
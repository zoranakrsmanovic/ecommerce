<!DOCTYPE html>
<?php
session_start();
include ("action.php");
?>
<html>
<head>
<title>Online shop </title>
<link rel="stylesheet" type="text/css" href="style.css" media="all">
<link rel="stylesheet" type="text/css" href="style_details.css" media="all">
<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>
<body>
<div id="wrapper">
    <div id="navbar">
        <div id="logo">
            <img id="logo-img" alt="logo" src="logo123.png">
            
        </div>

        <div id="meni">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="customer/my_account.php">Account</a></li>
                <li><a href="all_products.php">All products</a></li>
                <li><a href="cart.php">Cart</a></li>
                
            </ul> 

           
            
            
        </div>
            <form id="search">
               <input type="text" placeholder="Search.." name="search">
               <button type="submit"><i class="fa fa-search"></i></button>
             </form>  
             <div id="buttons">
            <a href="checkout.php"> <button id="myBtn" class="myBtnn">Login</button></a>
            
             
            <a href="customer_register.php"> <button class="myBtnn">SignUp</button></a>
            </div>
            

    </div>
    
    
    
    <div id="maincontent1" >
        <div id="middle-part1">
       <div id="shopping_cart"></div>
        <div id="products_box">
        <?php

         
        if(isset($_GET['pro_id'])){
        
        $product_id = $_GET['pro_id'];

        $get_pro = "SELECT * FROM `product` WHERE product_id ='$product_id'";

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
                        <div id='left'>
                        
                        <img src='admin/product_images/$pro_image' id='productImg' />
                        </div>
                        <div id='details'>
                        <h3 id='productTitle'>$pro_title</h3>
                        <div id='desc'><p>$pro_desc</p></div>
                        <p id='productPrice'> Price: $ $pro_price</p>
                    
                        <a href='index.php?add_cart=$pro_id'><button id='btn_addToCart'><i class='fa fa-shopping-cart cart'></i><span>Add to Cart</span></button></a><br>
                        <a href='index.php'><button id='goBack'>Go Back</button></a>
                        </div>
                        
                    
                ";


}
        }
        

        ?>
         <div id="shopping_cart">
        <span style="float:center; font-size:17px; padding:5px; line-height:40px;">
					
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b>Your</b>" ;
					}
					else {
					echo "<b>Welcome:</b> &nbsp You are quest &nbsp";
					}
					?>
					
					<a href="cart.php" ><b><i class='fa fa-shopping-cart icon'></i>&nbspShopping Cart &nbsp </b><i class="fa fa-long-arrow-alt-right" ></a></i>&nbsp Total Items&nbsp: <?php totalItems();?> Total Price : <?php total_price(); ?> 
					
					
					<?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php'><button class='myLoginBtn'>Login</button></a>";
					
					}
					else {
					echo "<a href='logout.php'><button class='myLoginBtn'>Logout</button></a>";
					}
					
					
					
					?>
        </div>

       

        </div>

        </div>






</div>


</body>
</html>
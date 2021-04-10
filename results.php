<!DOCTYPE html>
<?php
session_start();
include ("action.php");
?>
<html>
<head>
<title>Online shop </title>
<link rel="stylesheet" type="text/css" href="style.css" media="all">
<link rel="stylesheet" type="text/css" href="style_pro.css" media="all">
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
                <li><a href="customer/my_account.php"> My Account</a></li>
                <li><a href="all_products.php">All products</a></li>
                <li><a href="cart.php">Cart</a></li>
                
            </ul> 

           
            
            
        </div>
        <form id="search" method="GET" action="results.php" enctype="multipart/form-data">
               <input type="text" placeholder="Search.." name="user_query">
               <button type="submit" name="search"><i class="fa fa-search"></i></button>
             </form>  
             <div id="buttons">
            <a href="checkout.php"> <button id="myBtn" class="myBtnn">Login</button></a>
            
             
            <a href="customer_register.php"> <button class="myBtnn">SignUp</button></a>
            </div>

    </div>
    
    <div id="slider">
        
        <div class="options">
         
            <div class="option option1">
            
            <i class="fa fa-chevron-circle-left prev"></i>
            <i class="fa fa-chevron-circle-right next"></i>
            
            </div>
            <div class="option option2">
          
            <i class="fa fa-chevron-circle-left prev"></i>
            <i class="fa fa-chevron-circle-right next"></i>

            </div>
            <div class="option option3">

            <i class="fa fa-chevron-circle-left prev"></i>
            <i class="fa fa-chevron-circle-right next"></i>

            </div>
                    
        </div>
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
       $('.options').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 1,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            responsive: [
                {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
                },
                {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
                }
            ]
            });
    </script>

 

</script>
    <div id="maincontent">
        <div id="side-bar">
            <div class="category">
              <h3>Category</h3>
             <ul>
              <?php getCategory(); ?>
              
        </ul>
            </div>
            <div class="brands">
            <h3>Brands</h3>
              <ul>
               <?php getBrand(); ?>
                
            </ul> 

            
            </div>
        </div>
        <div id="middle-part">
        <div id="shopping_cart">
        <span style="float:right; font-size:17px; padding:5px; line-height:40px;">
					
					<?php 
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . '&nbsp' ;
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
					echo "<a href='logout.php'>Logout</a>";
					}
					
					
					
					?>
        </div>
        <div id="products_box">
        <?php
        
        if(isset($_GET['search'])){

            $search_query = $_GET['user_query'];

                $get_pro = "select * from product where product_keywords like '%$search_query%'";

                $run_pro = mysqli_query($con, $get_pro);

                while($row_pro = mysqli_fetch_array($run_pro)){

                    $pro_id = $row_pro['product_id'];
                    $pro_cat = $row_pro['product_category'];
                    $pro_brand = $row_pro['product_brand'];
                    $pro_title = $row_pro['product_title'];
                    $pro_price = $row_pro['product_price'];
                    $pro_image = $row_pro['product_image'];
                    
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
        
        
        ?>       

            
            
 
        
        </div>

        </div>

    </div>
    <div id="footerspace">

</div>
<div id="footer">
       <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by 
         <a href="#">Zorana Krsmanovic</a>.
            </p>
        </div>





</div>


</body>


</html>
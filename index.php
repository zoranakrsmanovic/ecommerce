<!DOCTYPE html>
<?php
session_start();
include_once("action.php");
?>
<html>
<head>
<title>Online shop </title>
<link rel="stylesheet" type="text/css" href="style.css"/>

<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Jaldi&family=Michroma&family=Open+Sans:wght@300&family=Questrial&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
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
               <button type="submit" name="search" value="Search"><i class="fa fa-search"></i></button>
             </form> 
             <div id="buttons">
            <a href="checkout.php"> <button id="myBtn" class="myBtnn">Login</button></a>
            
             
            <a href="customer_register.php"> <button class="myBtnn">SignUp</button></a>
            </div>
            

    </div>
    <div class="space"></div>
    <div id="slider">
        
        <div class="options">
         
            <div class="option option1">
            
            <i class="fa fa-chevron-circle-left prev"></i>
            
            <i class="fa fa-chevron-circle-right next"></i>
            <a href="index.php?brand=2"><button class="buy_now1">Check out</button></a>
            
            </div>
            <div class="option option2">
           
            <i class="fa fa-chevron-circle-left prev"></i>
          
            <i class="fa fa-chevron-circle-right next"></i>
            <button class="buy_now2">Check out</button>

            </div>
            <div class="option option3">
            
            <i class="fa fa-chevron-circle-left prev"></i>
            
            <i class="fa fa-chevron-circle-right next"></i>
            <button class="buy_now3">Check out</button>

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
        <?php cart(); ?>
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
        <?php getIp(); ?>
        <div id="products_box">
        
       
        <?php getPro();?>

        <?php getCatPro(); ?>
        <?php getBrandPro(); ?>

        </div>
        
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

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>   
</body>


</html>
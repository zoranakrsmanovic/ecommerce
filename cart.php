<!DOCTYPE html>
<?php
session_start();
include ("action.php");
include("admin/includes/db.php");
?>
<html>
<head>
<title>Online shop </title>

<link rel="stylesheet" type="text/css" href="style.css" media="all">
<link rel="stylesheet" type="text/css" href="style_cart.css" media="all">
<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Jaldi&family=Michroma&family=Montserrat:wght@300;400&family=Open+Sans:wght@300&family=Questrial&display=swap" rel="stylesheet"> 
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
               <button type="submit" name="search" value="Search"><i class="fa fa-search"></i></button>
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
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "&nbsp" ;
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
        <?php getIp(); ?>
        <div id="products_box">
        <form action="" method="post" enctype="multipart/form-data">
			
            <table id="cart_table" align="center" >
                
                <tr align="center">
                    <th class="th1"><p>Remove</p></th>
                    <th class="th1"><p>Product</p></th>
                    <th class="th1"><p>Quantity</p></th>
                    <th class="th1" ><p>Price</p></th>
                </tr>
                
                            <?php 
                            $total = 0;
                            
                            global $con; 
                            
                            $ip = getIp(); 
                            
                            $sel_price = "select * from cart where ip_add='$ip'";
                            
                            $run_price = mysqli_query($con, $sel_price); 
                            
                            while($p_price=mysqli_fetch_array($run_price)){
                                
                                $pro_id = $p_price['ip_id']; 
                                
                                $pro_price = "select * from product where product_id='$pro_id'";
                                
                                $run_pro_price = mysqli_query($con,$pro_price); 
                                
                                while ($pp_price = mysqli_fetch_array($run_pro_price)){
                                
                                $product_price = array($pp_price['product_price']);
                                
                                $product_title = $pp_price['product_title'];
                                
                                $product_image = $pp_price['product_image']; 
                                
                                $single_price = $pp_price['product_price'];
                                
                                $values = array_sum($product_price); 
                                
                                $total += $values; 
                                        
                                        ?>
                
                <tr align="center">
                    <td><input type="checkbox" name="remove[]" class="checkbox-custom" value="<?php echo $pro_id;?>"/></td>
                    
                    <td><?php echo "<p> $product_title </p>"; ?><br>
                    <img src="admin/product_images/<?php echo $product_image;?>" width="60" height="60"/>
                    </td>
                   
                    <td><input type="text" size="4" name="qty" value="<?php $qty?>"/></td> <!-- later session --> 
                    <?php 

                            if(isset($_POST['update_cart'])){

                                $qty = $_POST['qty'];
                                
                                $update_qty = "UPDATE cart SET qty='$qty'";
                                
                                $run_qty = mysqli_query($con, $update_qty); 
                                
                                $_SESSION['qty']=$qty;
                                
                                $total = $total*$qty;
                            }


                            ?>
                    
                    
                    <td><?php echo "<p>$ $single_price</p>"; ?></td>
                </tr>
                
                
            <?php } } ?>
            
            <tr>
                    <td colspan="4" align="right"><p style="color:green;"><b>Total Price:</p></b></td>
                    <td><?php echo "<p style='color:green;'>$ $total</p>";?></td>
                </tr>
                
                <tr align="center">
                    <td colspan="1"><input class="btnCart" type="submit" name="update_cart" value="Update Cart"/></td>
                    <td><input class="btnCart" type="submit" name="continue" value="Continue Shopping" /></td>
                    <td><button class="btnCart" ><a href="checkout.php" style="text-decoration:none; color:#246ca8;">Buy</a></button></td>
                </tr>
                
            </table> 
        
        </form>
        
<?php 
    
function updatecart(){
    
    global $con; 
    
    $ip = getIp();
    
    if(isset($_POST['update_cart'])){
    
        foreach($_POST['remove'] as $remove_id){
        
        $delete_product = "delete from cart where ip_id='$remove_id' AND ip_add='$ip'";
        
        $run_delete = mysqli_query($con, $delete_product); 
        
        if($run_delete){
        
        echo "<script>window.open('cart.php','_self')</script>";
        
        }
        
        }
    
    }
    if(isset($_POST['continue'])){
    
    echo "<script>window.open('index.php','_self')</script>";
    
    }

}
echo @$up_cart = updatecart();

?>
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

</body>


</html>
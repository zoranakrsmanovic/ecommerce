<html>
	<head>
	<link rel="stylesheet" type="text/css" href="customer/style_login.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Abel&family=Lobster&family=Michroma&family=Monoton&family=Montserrat:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet"> 
			<link href="https://fonts.googleapis.com/css2?family=Abel&family=Michroma&family=Monoton&family=Montserrat:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet"> 
			</head>

<body>

<?php 
include("admin/includes/db.php");


?>

<div> 
	
	<form id="forma1" method="post" action=""> 
		
		<table style="margin:auto;"> 
			
			<tr align="center">
				<td colspan="3"><h2>Login or Register to Buy!</h2></td>
			</tr>
			
			<tr>
				<td align="right"><p>Email:</p></td>
				<td><input type="text" name="email" placeholder="enter email" required/></td>
			</tr>
			
			<tr>
				<td align="right"><p>Password:</p></td>
				<td><input type="password" name="pass" placeholder="enter password" required/></td>
			</tr>
			
			
			
			<tr align="center">
				<td colspan="3"><input id="submit_login" type="submit" name="login" value="Login" /></td>
			</tr>
			
		
		
		</table> 
	        <button  id="border_new">
			<p><a href="customer_register.php" style="text-decoration:none; color:white;">New? Register Here</a></p>
</button>
	
	</form>
	
	
	<?php 
	if(isset($_POST['login'])){
	
		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];
		
		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
		
		$run_c = mysqli_query($con, $sel_c);
		
		$check_customer = mysqli_num_rows($run_c); 
		
		if($check_customer==0){
		
		echo "<script>alert('Password or email is incorrect, plz try again!')</script>";
		exit();
		}
		$ip = getIp(); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_customer>0 AND $check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}
	}
	
	
	?>
	
	
	

</div>

</body>
</html>
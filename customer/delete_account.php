<html>
</body>
<head>
<link rel="stylesheet" type="text/css" href="style_edit_account.css"/>
			<link href="https://fonts.googleapis.com/css2?family=Abel&family=Lobster&family=Michroma&family=Monoton&family=Montserrat:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet"> 
			<link href="https://fonts.googleapis.com/css2?family=Abel&family=Michroma&family=Monoton&family=Montserrat:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet"> 
</head>

<br>



<form id="forma" action="" method="post">

<h2 style="text-align:center; margin-top:550px; font-family: 'Lobster', cursive; font-weight:lighter; ">Do you really want to <u style="color:#3499d6;">delete</u> your account?</h2>
<br>
<input type="submit" id="update" name="yes" value="Yes I want" style="margin-left:-170px;" /> 
<input type="submit" id="update" name="no" value="No I was Joking" />


</form>

<?php 
include_once("../action.php"); 

	$user = $_SESSION['customer_email']; 
	
	if(isset($_POST['yes'])){
	
	$delete_customer = "delete from customers where customer_email='$user'";
	
	$run_customer = mysqli_query($con,$delete_customer); 
	
	echo "<script>alert('We are really sorry, your account has been deleted!')</script>";
	echo "<script>window.open('../index.php','_self')</script>";
	}
	if(isset($_POST['no'])){
	
	echo "<script>alert('oh! do not joke again!')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
	
	}
	


?>

</body>
</html>
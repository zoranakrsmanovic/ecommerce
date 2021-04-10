<html>
<head>
	<link rel="stylesheet" type="text/css" href="style_insert_pro.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Jaldi&family=Michroma&family=Open+Sans:wght@300&family=Questrial&display=swap" rel="stylesheet"> 
            
	</head>
	<body>
<form action="" method="post" style="padding:80px;">

<h2 style="font-size:25px;font-family: 'Montserrat', sans-serif; font-weight:lighter; margin-left:50px; ">Insert New Brand:</h2>
<input style="margin-left:430px; margin-top:30px; background-color:transparent; border:3px solid #00a1df; padding:3px 5px; box-shadow: 0px 11px 23px -10px rgba(0,0,0,0.75);"  type="text" name="new_brand" required/> 
<input style="border:none; background-color: #00a1df; color:white; font-family: 'Montserrat', sans-serif;padding:7px 6px; cursor:pointer; box-shadow: 0px 11px 23px -10px rgba(0,0,0,0.75);" type="submit" name="add_brand" value="Add Brand" /> 

</form>

<?php 
include("includes/db.php"); 

	if(isset($_POST['add_brand'])){
	
	$new_brand = $_POST['new_brand'];
	
	$insert_brand = "insert into brand (brant_title) values ('$new_brand')";

	$run_brand = mysqli_query($con, $insert_brand); 
	
	if($run_brand){
	
	echo "<script>alert('New Brand has been inserted!')</script>";
	echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
	}

?>
</body>
</html>

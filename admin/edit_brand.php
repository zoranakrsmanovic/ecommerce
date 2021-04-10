<html>
<head>
	<link rel="stylesheet" type="text/css" href="style_insert_pro.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Jaldi&family=Michroma&family=Open+Sans:wght@300&family=Questrial&display=swap" rel="stylesheet"> 
            
	</head>
	<body>
<?php 
include("includes/db.php"); 

if(isset($_GET['edit_brand'])){

	$brand_id = $_GET['edit_brand']; 
	
	$get_brand = "select * from brand where brand_id='$brand_id'";

	$run_brand = mysqli_query($con, $get_brand); 
	
	$row_brand= mysqli_fetch_array($run_brand); 
	
	$brand_id = $row_brand['brand_id'];
	
	$brand_title = $row_brand['brant_title'];
}


?>
<form action="" method="post" style="padding:80px;">

<h2 style="font-size:25px;font-family: 'Montserrat', sans-serif; font-weight:lighter; margin-left:50px; ">Update Brand</h2>
<input style="margin-left:430px; margin-top:30px; background-color:transparent; border:3px solid #00a1df; padding:3px 5px; box-shadow: 0px 11px 23px -10px rgba(0,0,0,0.75);"  type="text" name="new_brand" value="<?php echo $brand_title;?>"/> 
<input style="border:none; background-color: #00a1df; color:white; font-family: 'Montserrat', sans-serif;padding:7px 6px; cursor:pointer; box-shadow: 0px 11px 23px -10px rgba(0,0,0,0.75);"  type="submit" name="update_brand" value="Update Brand" /> 

</form>

<?php  

	if(isset($_POST['update_brand'])){
	
	$update_id = $brand_id; 
	
	$new_brand = $_POST['new_brand'];
	
	$update_brand = "update brand set brant_title='$new_brand' where brand_id='$update_id'";

	$run_update = mysqli_query($con, $update_brand); 
	
	if($run_update){
	
	echo "<script>alert('Brand has been updated!')</script>";
	echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
	}

?>
</body>
</html>
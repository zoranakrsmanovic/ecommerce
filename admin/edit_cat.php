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

if(isset($_GET['edit_cat'])){

	$cat_id = $_GET['edit_cat']; 
	
	$get_cat = "select * from category where category_id='$cat_id'";

	$run_cat = mysqli_query($con, $get_cat); 
	
	$row_cat = mysqli_fetch_array($run_cat); 
	
	$cat_id = $row_cat['category_id'];
	$cat_title = $row_cat['category_title'];
}


?>
<form action="" method="post" style="padding:80px;">

<h2 style="font-size:25px;font-family: 'Montserrat', sans-serif; font-weight:lighter; margin-left:50px; "> Update Category:</h2>
<input style="margin-left:430px; margin-top:30px; background-color:transparent; border:3px solid #00a1df; padding:3px 5px; box-shadow: 0px 11px 23px -10px rgba(0,0,0,0.75);"  type="text" name="new_cat" value="<?php echo $cat_title;?>"/> 
<input style="border:none; background-color: #00a1df; color:white; font-family: 'Montserrat', sans-serif;padding:7px 6px; cursor:pointer; box-shadow: 0px 11px 23px -10px rgba(0,0,0,0.75);"  type="submit" name="update_cat" value="Update Category" /> 

</form>

<?php 


	if(isset($_POST['update_cat'])){
	
	$update_id = $cat_id;
	
	$new_cat = $_POST['new_cat'];
	
	$update_cat = "update category set category_title='$new_cat' where category_id='$update_id'";

	$run_cat = mysqli_query($con, $update_cat); 
	
	if($run_cat){
	
	echo "<script>alert(' Category has been updated!')</script>";
	echo "<script>window.open('index.php?view_cats','_self')</script>";
	}
	}


?>
</body>
</html>
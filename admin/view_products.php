

<?php 
if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style_insert_pro.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Jaldi&family=Michroma&family=Open+Sans:wght@300&family=Questrial&display=swap" rel="stylesheet"> 
            
	</head>
	<body>
<table width="700" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="5"><h2 style="font-size:25px;color:white;font-family: 'Montserrat', sans-serif; font-weight:lighter; margin-left:50px; ">View All Products Here</h2></td>
	</tr>
	
	<tr align="center" style="color:white;  font-family: 'Montserrat', sans-serif; font-weight:lighter;  ">
		<th>S.N</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_pro = "select * from product";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	$i = 0;
	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_image = $row_pro['product_image'];
		$pro_price = $row_pro['product_price'];
		$i++;
	
	?>
	<tr align="center" style="color:white;font-family: 'Montserrat', sans-serif;">
		<td><?php echo $i;?></td>
		<td><?php echo $pro_title;?></td>
		<td><img src="product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
		<td><?php echo "$" . $pro_price;?></td>
		<td ><a style="color:white;font-family: 'Montserrat', sans-serif; text-decoration:none; padding: 5px 8px; border:1px solid white; " href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
		<td ><a style="color:white;font-family: 'Montserrat', sans-serif; text-decoration:none; padding: 5px 5px; border:1px solid white; "  href="delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>
</table>

<?php } ?>
	</body>
	</html>
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
		<td colspan="6"><h2 style="font-size:25px;color:white;font-family: 'Montserrat', sans-serif; font-weight:lighter; margin-left:50px; " >View All Categories Here</h2></td>
	</tr>
	
	<tr align="center"  style="color:white;  font-family: 'Montserrat', sans-serif; font-weight:lighter;  ">
		<th>Category ID</th>
		<th>Category Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_cat = "select * from category";
	
	$run_cat = mysqli_query($con, $get_cat); 
	
	$i = 0;
	
	while ($row_cat=mysqli_fetch_array($run_cat)){
		
		$cat_id = $row_cat['category_id'];
		$cat_title = $row_cat['category_title'];
		$i++;
	
	?>
	<tr align="center" style="color:white;font-family: 'Montserrat', sans-serif;">
		<td><?php echo $i;?></td>
		<td><?php echo $cat_title;?></td>
		<td><a style="color:white;font-family: 'Montserrat', sans-serif; text-decoration:none; padding: 5px 8px; border:1px solid white; " href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
		<td><a style="color:white;font-family: 'Montserrat', sans-serif; text-decoration:none; padding: 5px 8px; border:1px solid white; " href="delete_cat.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>




</table>

	</body>
	</html>
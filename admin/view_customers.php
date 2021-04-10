<html>
<head>
	<link rel="stylesheet" type="text/css" href="style_insert_pro.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Jaldi&family=Michroma&family=Open+Sans:wght@300&family=Questrial&display=swap" rel="stylesheet"> 
            
	</head>
	<body>
<table width="700" align="center" > 

	
	<tr align="center">
		<td colspan="6"><h2 style="font-size:25px;color:white;font-family: 'Montserrat', sans-serif; font-weight:lighter; margin-left:50px; ">View All Customers Here</h2></td>
	</tr>
	
	<tr align="center" style="color:white;  font-family: 'Montserrat', sans-serif; font-weight:lighter;  ">
		<th>S.N</th>
		<th>Name</th>
		<th>Email</th>
		<th>Image</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_c = "select * from customers";
	
	$run_c = mysqli_query($con, $get_c); 
	
	$i = 0;
	
	while ($row_c=mysqli_fetch_array($run_c)){
		
		$c_id = $row_c['customer_id'];
		$c_name = $row_c['customer_name'];
		$c_email = $row_c['customer_email'];
		$c_image = $row_c['customer_image'];
		$i++;
	
	?>
	<tr align="center" style="color:white;font-family: 'Montserrat', sans-serif;" >
		<td><?php echo $i;?></td>
		<td><?php echo $c_name;?></td>
		<td><?php echo $c_email;?></td>
		<td><img src="../customer/customer_images/<?php echo $c_image;?>" width="50" height="50"/></td>
		<td><a style="color:white;font-family: 'Montserrat', sans-serif; text-decoration:none; padding: 5px 8px; border:1px solid white; " href="delete_c.php?delete_c=<?php echo $c_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>




</table>

	</body>
	</html>
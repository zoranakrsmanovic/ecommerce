<!DOCTYPE hmtl>
<?php
include("includes/db.php");
?>
<html>
    <head>
        <title>Inserting product</title>
        <link rel="stylesheet" type="text/css" href="style_insert_pro.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Jaldi&family=Michroma&family=Open+Sans:wght@300&family=Questrial&display=swap" rel="stylesheet"> 
            
        </head>

    <body bgcolor="skyblue">

    <form action="insertProduct.php" method="POST" enctype="multipart/form-data" >

        <table align="center" width="750" >
            <tr align="center">
                <td colspan="8" ><h2 style="color:white; font-size:20px; margin-bottom:20px;" >Insert new post here</h2></td>

            </tr>
            <tr>
                <td>Product title:</td>
                <td><input type="text" name="product_title" required/> </td>

            </tr>
            <tr>
                <td>Product category:</td>
                <td>
                    <select name="product_cat" required>
                        <option>Select a category</option>
                        <?php

                            $get_category = "select * from category";

                            $run_category = mysqli_query($con, $get_category);
                        
                            while ($row_category = mysqli_fetch_array($run_category)){
                                
                                $category_id = $row_category['category_id'];
                                $category_title = $row_category['category_title'];
                        
                                echo "<option value='$category_id'>$category_title</option>";
                        
                            }
                        ?>

                   </select>
                </td>

            </tr>
            <tr>
                <td>Product brand:</td>
                <td>
                    <select name="product_brand" required>
                    <option>Select a brand</option>
                        <?php

                                $get_brand = "select * from brand";

                                $run_brand = mysqli_query($con, $get_brand);

                                while ($row_brand = mysqli_fetch_array($run_brand)){
                                
                                    $brand_id = $row_brand['brand_id'];
                                    $brant_title = $row_brand['brant_title'];

                                    echo "<option value='$brand_id'>$brant_title</option>";

                                }
                        ?>

                   </select> 
                </td>

            </tr>
            <tr>
                <td>Product image:</td>
                <td><input type="file" name="product_img" required/> </td>

            </tr>
            <tr>
                <td>Product price:</td>
                <td><input type="text" name="product_price" required/> </td>

            </tr>
            <tr>
                <td>Product description:</td>
                <td><textarea name="product_description" cols="40" rows="6"> </textarea></td>

            </tr>
            <tr>
                <td>Product keywords:</td>
                <td><input type="text" name="product_keywords" required/> </td>

            </tr>
           
            <tr>
                
                <td colspan="8"><input id="submit_login" type="submit" name="insert_post" value="Insert now"/> </td>

            </tr>
            </table>

    </form>
    


</body>
</html>
<?php
    if(isset($_POST['insert_post'])){

        $product_title = $_POST['product_title'];
        $product_category = $_POST['product_cat'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_description = $_POST['product_description'];
        $product_keywords = $_POST['product_keywords'];

        $product_img = $_FILES['product_img']['name'];
        $product_img_tmp = $_FILES['product_img']['tmp_name'];

        move_uploaded_file($product_img_tmp,"product_images/$product_img");


         $insert_product = "INSERT INTO product
         (product_category, product_brand, product_price, product_desc, product_image, product_keywords,product_title)
          values ('$product_category','$product_brand','$product_price','$product_description','$product_img',' $product_keywords','$product_title')";
        
        $insert_pro = mysqli_query($con, $insert_product);

        if($insert_pro){
            echo "<script>alert('Product has been inserted.')</script>";
           
        }else{
            echo "<script>alert('Product has not been inserted.')</script>";
        }
    }
    

?>
<!DOCTYPE html>

<?php 
    include("includes/db.php");
?>

<html>
<head>
	<title>Insert Product</title>

	<script src="//tinymce.cachfly.net/4.1/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({selector:'textarea'});
</script>
</head>
<body bgcolor="black">




<form action="insert_product.php" method="post" enctype="multipart/form-data">

	<table align="center" width="55%" border="2" bgcolor="orange">
		
		<tr align="center">
			<td><h2>Insert new Product</h2></td>
		</tr>

		<tr>
			<td align="right">Product Title:</td>
			<td><input type="text" name="product_title" required/></td>
		</tr>

		<tr>
			<td align="right">Product Category:</td>
			<td>
				<select name="product_cat" required>
					<option>Select a Category</option>

					<?php

					$get_cats = "select * from categories";

	$run_cats = mysqli_query($con, $get_cats);

	while($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];

					echo "<option value='$cat_id'>$cat_title</option>";
					}


					?>
				</select>
			</td>
		</tr>

		<!--<tr>
			<td align="right">Product Brand:</td>
			<td><input type="text" name="product_brand"/></td>
		</tr>-->

		<tr>
			<td align="right">Product Image:</td>
			<td><input type="file" name="product_image" required/></td>
		</tr>

		<tr>
			<td align="right">Product Price:</td>
			<td><input type="text" name="product_price" required/></td>
		</tr>

		<tr>
			<td align="right">Product Description:</td>
			<td><textarea name="product_desc" cols="50" rows="10" ></textarea></td>
		</tr>

		<tr>
			<td align="right">Product Keywords:</td>
			<td><input type="text" name="product_keywords" required/></td>
		</tr>

		<tr align="center">
			<td colspan="8"><input type="submit" name="insert_post" value="Insert Now" /></td>
		</tr>

	</table>	

</form>





</body>
</html>
<?php

 if(isset($_POST['insert_post'])){

 	//getting the text data from the fields
 	$product_title = $_POST['product_title'];
 	$product_cat = $_POST['product_cat'];
 	$product_desc = $_POST['product_desc'];
 	$product_price = $_POST['product_price'];
 	$product_keywords = $_POST['product_keywords'];

//getting image
 	$product_image = $_FILES['product_image']['name'];
 	$product_image_tmp = $_FILES['product_image']['tmp_name'];

 	move_uploaded_file($product_image_tmp, "product_images/$product_image");

 	$insert_product = "insert into products (product_cat,product_title, product_price, product_desc, product_image, product_keywords) values ('$product_cat','$product_title', '$product_price', '$product_desc', '$product_image', '$product_keywords')";

 	$insert_pro = mysqli_query($con, $insert_product);

 	if($insert_pro){
 		echo"<script>alert('Product has been added!')</script>";
 		echo"<script>window.open('insert_product.php','_self')</script>";
 	}



 }

?>
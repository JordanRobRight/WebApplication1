<?php
//getting categories

$con = mysqli_connect("localhost","ewddowne_admin","991100378","ewddowne_wehr");
//$con=mysqli_connect ("localhost", "ewddowne_wehr", "") or die ('I cannot connect to the database because: '.mysql_error());
//mysql_select_db ("ewddowne_wehr");



echo $mysqli->host_info . "\n";

function getCats(){
	global $con;

	$get_cats = "select * from categories";

	$run_cats = mysqli_query($con, $get_cats);

	while($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];

		echo "<li><a href='#'>$cat_title</a></li>";
	}

}

function getPro (){
	
	global $con;

	$get_pro = "select * from products order by RAND() LIMIT 0,6";

	$run_pro = mysqli_query($con, $get_pro);

	while($row_pro=mysqli_fetch_array($run_pro)){

		 $pro_id = $row_pro['product_id'];
		 $pro_cat = $row_pro['product_cat'];
		 $pro_title = $row_pro['product_title'];
		 $pro_price = $row_pro['product_price'];
		 $pro_image = $row_pro['product_image'];
		 
		 
		 echo "
		 	
		 	<div id='single_product' class='col-md-4'>

		 	<h3 style='color:black';>$pro_title</h3>
		 	<img src = '../shop/resources/$pro_image' width='300px' height='300px'>
		 	<p>$ $pro_price</p>
		 	
		 	<a href='itemdetails.php?pro_id=$pro_id' class='shopDetails' style='float:left;'>Details</a>

		 	<a href='index.php?pro_id=$pro_id'><button class='addToCart'>Add to Cart</button></a>
		 	</div>
		 	
		 ";

	}
}

?>
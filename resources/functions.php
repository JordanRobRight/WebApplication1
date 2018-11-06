<?php
//getting categories

$con = mysqli_connect("localhost","ewddowne_admin","991100378","ewddowne_wehr");


if(mysqli_connect_errno()){
	echo "Failed to connect to the database".mysqli_connect_errno();
}

function getIp(){
	$ip = $_SERVER['REMOTE_ADDR'];

	if(!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	return $ip;
}

function cart(){
	if(isset($_GET['add_cart']))
	{
		global $con;

		$ip = getIp();

		$pro_id = $_GET['add_cart'];

		$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
		$run_check = mysqli_query($con, $check_pro);

		if(mysqli_num_rows($run_check>0))
		{
			echo"";
		}
		else
		{
			$insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";
			$run_pro = mysqli_query($con, $insert_pro);	

			echo "<script>window.open('index.php','_self')</script>";
		}
	}
}

//getting the total added items
function total_items(){
	if(isset($_GET['add_cart']))
	{
		global $con;

		$ip=getIp();

		$get_items = "select * all from cart where ip_add='$ip'";

		run_items = mysqli_query($con, $get_items);

		$count_items = mysqli_num_rows($run_items);
	}
	else
	{
		global $con;
		
		$ip=getIp();

		$get_items = "select * all fromcart where ip_add='$ip'";

		run_items = mysqli_query($con, $get_items);

		$count_items = mysqli_num_rows($run_items);
	}

	echo $count_items;
}


echo $mysqli->host_info . "\n";

function getCats()
{
	global $con;

	$get_cats = "select * from categories";

	$run_cats = mysqli_query($con, $get_cats);

	while($row_cats=mysqli_fetch_array($run_cats))
	{

		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];

		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}

function getPro (){
	
	if(!isset($_GET['cat']))
	{
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
}

function getCatPro (){
	
	if(isset($_GET['cat']))
	{
		$cat_id = $_GET['cat'];
		global $con;

		$get_cat_pro = "select * from products where product_cat='$cat_id'";

		$run_cat_pro = mysqli_query($con, $get_cat_pro);

		$count_cats = mysqli_num_rows($run_cat_pro);

		if($count_cats==0)
		{
			echo"<h2>There are no products in this category</h2>";			
		}
			while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
			{
				 $pro_id = $row_cat_pro['product_id'];
				 $pro_cat = $row_cat_pro['product_cat'];
				 $pro_title = $row_cat_pro['product_title'];
				 $pro_price = $row_cat_pro['product_price'];
				 $pro_image = $row_cat_pro['product_image'];
				 

			     
					echo "
					 	
					 	<div id='single_product' class='col-md-4'>

					 	<h3 style='color:black';>$pro_title</h3>
					 	<img src = '../shop/resources/$pro_image' width='300px' height='300px'>
					 	<p>Price:$ $pro_price</p>
					 	
					 	<a href='itemdetails.php?pro_id=$pro_id' class='shopDetails' style='float:left;'>Details</a>

					 	<a href='index.php?add_cart=$pro_id'><button class='addToCart'>Add to Cart</button></a>
					 	</div>
					 	
					";
			}
	}
}

?>
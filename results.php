<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatEverHotRods</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="ewdd.ico" />
    <!-- HTML5 shim for IE backwards compatibility -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container">
    <?php
	$myFile = "resources/header.html";
	$fh = fopen($myFile, 'r');
	$theData = fread($fh, filesize($myFile));
	fclose($fh);
	echo $theData;
     ?>
       
        <div class="col-sm-12" id="topper">
                <iframe width="100%" height="500em" src="https://www.youtube.com/watch?v=nV3HEdzUPwo" frameborder="0" allowfullscreen></iframe>
        </div>

        <div id="content_area">
            
            <div id="products_box">

                <?php
                if(isset($_GET['search']))

                {
                    $search_query = $_GET['user_query'];

                    $get_cat_pro = "select * from products where product_keywords like '%$search_query%'";

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
                            <p>$ $pro_price</p>
                            
                            <a href='itemdetails.php?pro_id=$pro_id' class='shopDetails' style='float:left;'>Details</a>

                            <a href='index.php?pro_id=$pro_id'><button class='addToCart'>Add to Cart</button></a>
                            </div>                           
                        ";
                        } 
                    }
            ?>
            </div>
        </div>
    </div>

<?php
	$myFile = "resources/footer.html";
	$fh = fopen($myFile, 'r');
	$theData = fread($fh, filesize($myFile));
	fclose($fh);
	echo $theData;
     ?>

</body>
</html>
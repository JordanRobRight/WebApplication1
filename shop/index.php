<!DOCTYPE html>

<?php 

    include("../resources/functions.php");
    
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatEverHotRods</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
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
    <div>
    
        <?php
    $myFile = "../resources/header.html";
    $fh = fopen($myFile, 'r');
    $theData = fread($fh, filesize($myFile));
    fclose($fh);
    echo $theData;
     ?>
    
    </div>
       
        <div class="col-sm-12">
            <div class="col-md-12">
            <h1 id="sidebar_title">Categories</h1>

                <ul id="cats" st>
                    <?php getCats(); ?>

                </ul>
            </div>

            <div class="col-md-12" id="content_area">
                <div id="shopping_cart" class="col-md-7 col-md-offset-5" style="margin-top:5px;">
                    <span class="welcome">Welcome Guest!
                    <b class="shoppingCart" ">Shopping Cart - </b> Total Items: Total Price:
                    <a href="cart.php">Go to Cart</a>
                    </span>
                </div>
            
                <div id="products_box" class="col-md-12">
                    <?php getPro(); ?>
                    <?php getCatPro(); ?>

                </div>
                
            </div>
        </div>

        
    </div>

<?php
    $myFile = "../resources/footer.html";
    $fh = fopen($myFile, 'r');
    $theData = fread($fh, filesize($myFile));
    fclose($fh);
    echo $theData;
     ?>

</body>
</html>
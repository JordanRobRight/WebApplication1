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
                <iframe width="100%" height="500em" src="https://www.youtube.com/embed/qVACkQ7_LbA?start=6" frameborder="0" allowfullscreen></iframe>
        </div>

        <div id="content_area">
            
            <div id="products_box">

                <?php getPro(); ?>
                
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
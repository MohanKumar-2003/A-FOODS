<?php include('config/constants.php');
include('loginuser-check.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
           <a style="font-size:30px;color:crimson;font-weight:bold;">A-FOODS</a>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?> " style="color:black;opacity:0.8;">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php" style="color:black;opacity:0.8;">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php" style="color:black;opacity:0.8;">Foods</a>
                    </li>
                    <li>
                        <a href="#" style="color:black;opacity:0.8;">Contact</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>logoutuser.php" style="color:black;opacity:0.8;">Logout</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <style>
 .menu text-right ul li a{
    color:black;
 }
        </style>
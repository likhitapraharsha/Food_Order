<?php include('config/constants.php'); ?>

<!DOCTYPE html>
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
        <div style="background-color:black;">
        <div class="container">
            <div class="logo ">
                <a href="#" title="Logo">
                    <img src="images/logo.jpg" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
            
            <div class="menu text-right">
                <div style=" color: #fff;
        text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #39234a, 0 0 20px #39234a, 0 0 25px #39234a, 0 0 30px #0073e6, 0 0 35px #0073e6 ">
            
                <ul>
                    
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    
                </ul>
               
            </div>    
            </div>
            <section class="food-search text-center">
                <div class="container">
                    
                    <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                        <input type="search" name="search" placeholder="Search for Food.." required>
                        <input type="submit" name="submit" value="Search" class="btn btn-primary">
                    </form>
        
                </div>
            </section>

            <div class="clearfix"></div>
        </div>
    </div>
    </section>
    <!-- Navbar Section Ends Here -->

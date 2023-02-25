<?php include('partials-front/menu.php'); ?>
<?php
if(isset($_SESSION['order']))
{
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}

            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
           <div style=" color: #fff;
        text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #39234a, 0 0 20px #39234a, 0 0 25px #39234a, 0 0 30px #0073e6, 0 0 35px #0073e6 ">
            <h2 class="text-center">Explore Foods</h2>
        </div>

            <?php
            //create sql query to display categories from database
            $sql = "SELECT * FROM category WHERE active = 'Yes' AND featured = 'Yes'";

            //execute the query
            $res = mysqli_query($conn, $sql);

            //count rows to check if the category is available or not
            $count = mysqli_num_rows($res);

            if($count>0){
                //CAtegories Available 
                while($row=mysqli_fetch_assoc($res)){
                    //Get the values like id, title, image_name

                        $id = $row['id']; 
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                        
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php
                                //check if image is available or not
                                    if($image_name==""){
                                        //display message
                                        echo "<div class='error'>Image not available</div>";
                                    }

                                    else{
                                        //image available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">

                                        <?php
                                    }
                                ?>

                                 
                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                         </a>

                        <?php
                    } 
                }
                else{

                    //Categories not Available 
                    echo "<div class='error'>Category not Added.</div>";

                }

            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php  

            //getting the foods from database that are active
            //sql query

            $sql2 = "SELECT * FROM food WHERE active = 'Yes' LIMIT 6";

            //execute the query
            $res2 = mysqli_query($conn, $sql2);

            //count rows
            $count2 = mysqli_num_rows($res2);

            //check if food available or not
            if($count2>0){
                //food available
                while($row=mysqli_fetch_assoc($res2)){
                    //Get the values 
                    $id = $row['id']; 
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                            if($image_name==""){
                                //image not available
                                echo "<div class='error'>Image not found.</div>";
                            }
                            else{
                                //image available
                                ?>
                                 <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Dark Chocolate Icecream" class="img-responsive img-curve">
                                <?php
                            }
                            ?>
                                  </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">₹<?php echo $price; ?></p>
                            <p class="food-detail"> 
                                <?php echo $description; ?>
                                 </p>
                            <br>

                            <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                    <?php
                }

            }
            else{
                //food not available
                echo "<div class='error'>Food not available</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
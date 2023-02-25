<?php include('partials-front/menu.php'); ?>

    <?php
    //Check weather food id is set or not
    if(isset($_GET['food_id'])){
        //get the details of selected food and food id
        $food_id = $_GET['food_id'];
        //get the details of selected food
        $sql="SELECT * FROM food WHERE id=$food_id";
        //execute the Query
        $res=mysqli_query($conn,$sql);
        //count the rows
        $count = mysqli_num_rows($res);
        //check weather the data is availlable or not
        if($count==1){
            //we have data
            //get the data from database
            $row=mysqli_fetch_assoc($res);

            $title=$row['title'];
            $price=$row['price'];
            $image_name=$row['image_name'];

        }
        else{
            //food not availlabele
            //redirect to home page
            header('location:'.SITEURL);
        }
    }
    else{
        //redirect to home page
        header('location:'.SITEURL);
    }
    ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        //check whether image is available or not
                      //  if($image_name==""){
                        //    echo "<div class="error">Image not Available.</div>";
                        //}
                        //else{
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        //}
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <p class="food-price">₹<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Enter name " class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9999xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Enter valid email adress" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="H.No, Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="submit" class="btn btn-primary">
                </fieldset>

            </form>
          
            <?php 
            if(isset($_POST['submit'])){
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $order_date=date("Y-m-d h:i:sa");
                $status="Ordered";
                $customer_name=$_POST['full-name'];
                $customer_contact=$_POST['contact'];
                $customer_email=$_POST['email'];
                $customer_address=$_POST['address'];

//$sql="INSERT INTO temp set value=1";                /*
                $sql2="INSERT INTO `order` SET
                food='$food',
                price=$price,
                qty=$qty,
                total=$total,
                order_date='$order_date',
                status='$status',
                customer_name='$customer_name',
                customer_contact='$customer_contact',
                customer_email='$customer_email',
                customer_address='$customer_address'
                ";
             // echo $sql2;die();

                $res2=mysqli_query($conn,$sql2);

               

                if($res2==TRUE){
                    $_SESSION['order']="<div class='success text-center'>Food Ordered Successfully</div>";
                   // header('location:'.SITEURL.'index.php');
                  echo "Ordered Successfully!";
                  die();
                }
                else{
                    //$_SESSION['order']="<div class='error text-center'>Failed to Order Food</div>";
                   echo "Failed to Order Food";
                    //header('location:'.SITEURL.);
                }

            }
            ?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
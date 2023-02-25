<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Food</h1>
    <br/><br>
            <!--Button to add admin-->
            <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
           <br/><br>
           <?php

            if(isset($_SESSION['add'])){
             echo $_SESSION['add'];
             unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['unauthorize'])){
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }
            if(isset($_SESSION['remove'])){
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['no-category-found'])){
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            if(isset($_SESSION['failed-remove'])){
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
            ?>

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //create sql query  to get all the food
                    $sql = "SELECT * FROM food";

                    //execute the query
                    $res = mysqli_query($conn, $sql);
                    //count rows to check if we have foods or not
                    $count = mysqli_num_rows($res);
                    //create serial number variable and set value to 1
                    $sn=1;
                    if($count>0){
                        //we have food in database
                        //get number of rows from database and display

                        while($row=mysqli_fetch_assoc($res)){
                            //get values from individual columns
                            $id = $row['id']; 
                            $title = $row['title'];
                            $price = $row['price'];
                            $description=$row['description'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>
                        <tr>

                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php 
                            if($image_name==""){
                                echo "<div class='error'>Image not added.</div>";
                            }
                            else{
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px" >
                                <?php
                            }
                        ?>
                        </td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a> 
                        <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a> 
                     </td>
                    </tr>
                    <?php
                        }
                    }
                    else{
                        ?>
                        <tr><td colspan='7' class='error'>Food not added yet.</td></tr>
                        <?php
                    }
                ?>
            </table>   
</div>
</div>
<?php include('partials/footer.php');?>

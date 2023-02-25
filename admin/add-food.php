<?php include('partials/menu.php');?>

<div class="main-content">  
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
          <tr>
          <td>Title:</td>
          <td>
            <input type="text" name="title" placeholder="Title of Food">
          </td>
            </tr>
        <tr>
        <td>Description: </td>
        <td><textarea name="description"  cols="30" rows="5" placeholder="Descripton of Food"></textarea></td>
        </tr>

        <tr>
        <td>Price: </td>
        <td><input type="number" name="price"></td>
        </tr>
  
        <tr>
        <td>Select Image: </td>
        <td>
            <input type="file" name="image">
        </td>
        </tr>

         <tr>
        <td>Category:</td>
        <td>
            <select name="category">

                <?php

                //create php code to display ctegories from database
                //1. create sql to get all active categories from database
                $sql = "SELECT * FROM category WHERE active='Yes'";

                //executing query
                $res = mysqli_query($conn,$sql);

                //count rows to check if we have categories or not
                
                $count = mysqli_num_rows($res);
                
                if($count>0){

                    while($row=mysqli_fetch_assoc($res)){
                        //get details of categories

                        $id = $row['id'];
                        $title = $row['title'];
                        ?>

                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                        <?php

                    }
                }
                else{
                    //we dont have category
                    ?>
                    <option value="1">No category found</option>
                    <?php
                }
                ?>

                
            </select>
        </td>
    </tr>
    <tr>
        <td>Featured: </td>
        <td>
            <input type="radio" name="featured" value="Yes"> Yes
            <input type="radio" name="featured" value="No"> No
        </td>
    </tr>

    <tr>
        <td>Active:</td>
        <td>
            <input type="radio" name="active" value="Yes"> Yes
            <input type="radio" name="active" value="No"> No
        </td>
    </tr>
    
    <tr>
        <td colspan ="2">
            <input type ="submit" name="submit" value="Add Food" class="btn-secondary">
        </td>
    </tr>

</table>

</form>

 <?php
    
    //check if button is clicked or not
    if(isset($_POST['submit'])){
        //add food in database

        //1. get data from database
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        //check whether radion button for featured and act
        if(isset($_POST['featured'])){
            $featured = $_POST['featured'];
        }
        else{
            $featured = "No"; //setting the default value
        }
        if(isset($_POST['active'])){
            $active=$_POST['active'];
        }
        else{
            $active ="No";
        }

        //2.upload the image if selected

        if(isset($_FILES['image']['name'])){
            
$image_name = $_FILES['image']['name'];

            //check if the image is selected or not and upload image only if selected
            if($image_name!=""){

                //image is selected
                //rename the image
                //get the extension of our image eg.specialfood1.jpg
                $ext = end(explode('.',$image_name));

                //rename the image
                $image_name = "Food-Name-".rand(000, 999).'.'.$ext; //Food-Name-834.jpg


                $src = $_FILES['image']['tmp_name'];

                $dst = "../images/food/".$image_name;

                //Finally upload the image
                $upload = move_uploaded_file($src, $dst);

                //check whether the image is uploaded or not
                //and if the image is not uploaded then we will stop the process and redirect the error message
                if($upload==false)
                {
                    //set message
                    $_SESSION['upload'] = "<div class='error'>Failed to upload Image</div>";
                    //redirect to add food page with error message
                    header('location:'.SITEURL.'admin/add-food.php');
                    //stop the process
                    die();
                }
            }

        }
        else {
            $image_name = ""; //setting default value as blank
        }
        
        //3.insert into database

        //create a sql query to save or add food
        $sql2 = "INSERT INTO food SET
            title = '$title',
            description = '$description',
            price='$price',
            image_name ='$image_name',
            category_id = '$category',
            featured = '$featured',
            active = '$active'                   
            ";

            //execute the query
            $res2 = mysqli_query($conn, $sql2);

            //check if data is inserted or not
            //4.redirect with message to manage food page

            if($res2 == true){
                //data inserted successfully
                $_SESSION['add'] = "<div class='success'>Food added successfully.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');

            }
            else{
                //failed to insert data
                $_SESSION['add'] = "<div class='error'>Failed to add food.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            }
    }
    ?>
</div>
</div>
<?php include('partials/footer.php'); ?>
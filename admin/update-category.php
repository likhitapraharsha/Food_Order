<?php
include('partials/menu.php');    
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>
        <?php
        if(isset($_GET['id'])){
            //echo "Getting Data";
            $id=$_GET['id'];
            $sql="SELECT * FROM category WHERE id=$id";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count==1){
                $row=mysqli_fetch_assoc($res);
                $title=$row['title'];
                $current_image=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];                   
            }
            else{
                $_SESSION['no-category-found']="<div class='error'>Category not Found</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        }
        else{
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title: </td>
                <td>
                    <input type="text" name="title" value="<?php echo $title;?>">
                </td>
            </tr>
            <tr>
                <td>Current Image:</td>
                <td>
                    <?php
                    if($current_image!=""){
                        //display image
                        ?>
                        <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image; ?>"width="150px">
                        <?php
                    }
                    else{
                        //dis. message
                        echo "<div class='error'>Image not added</div>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>New Image</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                    <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No"> No
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No"> No
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                </td>
                
            </tr>
        </table>
        </form>
        <?php
         if(isset($_POST['submit'])){
            //1.get all values from form
            $id=$_POST['id'];
            $title=$_POST['title'];
            $current_image=$_POST['current$current_image'];
            $featured=$_POST['featured'];
            $active=$_POST['active'];

            //2.updating new image if selected
            if(isset($_FILES['image']['name'])){
                $image_name=$_FILES['image']['name'];
                if($image_name!=""){
                    //img availlable
                    //a.upload new image
                //auto rename our image
                //get the extension of our image eg.specialfood1.jpg
                $ext = end(explode('.',$image_name));

                //rename the image
                $image_name = "Food_Category_".rand(000, 999).'.'.$ext; //Food_Category_834.jpg

                
                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../images/category/".$image_name;

                //Finally upload the image
                $upload = move_uploaded_file($source_path, $destination_path);

                //check whether the image is uploaded or not
                //and if the image is not uploaded then we will stop the process and redirect the error message
                if($upload==false)
                {
                    //set message
                    $_SESSION['upload'] = "<div class='error'>Failed to upload Image</div>";
                    //redirect to add category page
                    header('location:'.SITEURL.'admin/manage-category.php');
                    //stop the process
                    die();
                }
                //b.remove current image
                if($current_image!=""){
                $remove_path="../images/category/".$current_image;

                $remove =unlink($remove_path);
                //check weather image is removed or not
                if($remove==false){
                    $_SESSION['failed-remove']="<div class='error'>Failed to remove current image</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                    die();//stop the process
                }
                }
                }
                else{
                    $image_name=$current_image;
                }
            }
            else{
                $image_name=$current_image;
            }
            //3. update the database
            $sql2="UPDATE category SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active',
            id='$id'
            WHERE id=$id
            ";
            //execute query
            $res2=mysqli_query($conn,$sql2);
            //4.redirect to manage category with message
            if($res2==true){
                $_SESSION['update']="<div class='success'>Category Updated</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
            else{
                $_SESSION['update']="<div class='error'>Failed to update Category</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
         }
        ?>
    </div>
</div>
<?php
include('partials/footer.php');    
?>
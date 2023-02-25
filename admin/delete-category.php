<?php
include('../config/constants.php');
//check weather the id and image_mane value is set or not
 if(isset($_GET['id'])){
    //Get the value and delete
    //echo "Get Value and Delete"
    $id=$_GET['id'];
   
    $sql ="DELETE FROM category WHERE id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $_SESSION['delete']="<div class='success'>Category Deleted Successfully</div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
    else{
        $_SESSION['delete']="<div class='error'>Failed to Delete Category </div>";
        header('location:'.SITEURL.'admin/manage-category.php');
    }
 }
 else{
    //redirect to manage category page
    header('location:'.SITEURL.'admin/manage-category.php');
 }
?>
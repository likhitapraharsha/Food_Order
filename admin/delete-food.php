<?php
include('../config/constants.php');
//check weather the id and image_mane value is set or not
 if(isset($_GET['id'])){
    //Get the value and delete
    //echo "Get Value and Delete"
    $id=$_GET['id'];
    
    $sql ="DELETE FROM food WHERE id=$id";
   //execute query
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $_SESSION['delete']="<div class='success'>Deleted Food Successfully</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
    else{
        $_SESSION['delete']="<div class='error'>Failed to Delete Food </div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
 }
 else{
    //redirect to manage category page
    //$_SESSION['delete']="<div class='error'>Unauthorized Access.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
 }
?>
<?php

   include('../config/constants.php');
   //1. get the ID of admin to be deleted
    $id = $_GET['id'];

    //2. create DQL Query to delete admin
    $sql = "DELETE FROM admin WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn, $sql);

    //check whether the query is executed sucessfully or not
    if($res==true){
        //create session variable to display message
        $_SESSION['delete'] = "<div class ='success'>Admin Deleted Successfully.</div>";
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');

    }
    else{
        $_SESSION['delete'] = "<div class='error'>Failed to delete admin.Try again later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');

    }

   //3. Redirect to manage admin page with message(success/error)

?>
<?php include('partials/menu.php');?>
        <!--Main Content starts here-->
        <div class=main-content>
            <div class=wrapper>
           
            <h1>Manage Admin</h1>
            <br/>

            <?php
                if(isset($_SESSION['add'])){
                      echo $_SESSION['add'];
                       unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                
            ?>
            <br><br><br>

            <!--Button to add admin-->
            <a href="add-admin.php" class=btn-primary>Add Admin</a>
           <br/><br><br>
            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                <?php
                //query to get all admin
                $sql="SELECT * FROM admin";
                //execute query
                $res=mysqli_query($conn,$sql);
                //check if query executed or not
                if($res==TRUE){
                    //check whether we have data in database
                    $count=mysqli_num_rows($res);//fun to get all rows in db
                    $sn=1;//create variable and assgin value
                    //check no of rows
                    if($count>0){
                        //we have data in db
                        while($rows=mysqli_fetch_assoc($res)){
                            //using while loop to get all data in db
                            //while loop will execute as long as data is in db
                            //get individual data
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];
                            //display values in our table
                            ?>
                            <tr>
                    <td><?php echo $sn++;?> </td>
                    <td><?php echo $full_name;?> </td>
                    <td><?php echo $username;?></td>
                    <td>
                       <a href="<?php echo SITEURL; ?>admin/change-password.php?id=<?php echo $id; ?>" class="btn-cpass">Change Password</a> 
                       <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a> 
                       <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a> 
                    </td>
                </tr>
                            <?php 
                        }
                    }
                    else{
                        //we dont have data in db 
                    }
                }
                ?>                
            </table>
            <div class="clearfix"></div>
            </div>
        </div>
        <!--Main content ends here-->
<?php include('partials/footer.php');?>
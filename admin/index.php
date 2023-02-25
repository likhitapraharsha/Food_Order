<?php include('partials/menu.php');?>
        <!--Main Content starts here-->
        <div class=main-content>
            <div class=wrapper>
            <?php
                if(isset($_SESSION['login'])){
                      echo $_SESSION['login'];
                       unset($_SESSION['login']);
                }
                ?>
                <br><br>
            <div class=" text-center">
                <h1>Welcome to Hakuna Matata Food Place</h1>
                <h2>Have a wonderful Day!! :)</h2>
                <img src="pic2.jpeg" alt="">
                <br />
            </div>
           
            <div class="clearfix"></div>
          
            </div>
           
        </div>
        <!--Main content ends here-->

       <?php include('partials/footer.php')?>
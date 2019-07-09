<?php require "header.php"?>





<div class="container">
    <div class="jumbotron">
        <div class="header mb-lg-0">
            <?php

                if (!isset($_SESSION['loggedin'])){
                    echo "You dont have an account<a href='signup.php'>Signup</a> to visit this page";
                }else{
                    echo ' <h3 style="text-align: center">You have the credentials to acess this page</h3>';
                }

            ?>

        </div>

    </div>
</div>
<?php require "footer.php"?>

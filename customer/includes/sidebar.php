<div class="panel panel-default sidebar-menu">
    <div class="panel-heading"> 
        <?php
        $session_customer=$_SESSION['customer_email'];
        $get_cust="select * from customers where customer_email='$session_customer'";
        $run_query=mysqli_query($con, $get_cust);
        $row_customer=mysqli_fetch_array($run_query);
        $customer_image=$row_customer['customer_image'];
        $customer_name=$row_customer['customer_name'];
            echo "
        <center>
            <img src='customer_images/$customer_image' class='img-responsive'>
        </center>
        <br>
        <h3 align='center' class='panel-title'>Name : $customer_name</h3>";

        ?>


    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li class = "<?php if(isset($_GET['my_order'])){echo "active";}?>">
                <a href="my_account.php?my_order">
                <i class="fa fa-list"></i>    
                My Orders</a>
            </li>
            <li class = "<?php if(isset($_GET['pay_offline'])){echo "active";}?>">
                <a href="my_account.php?pay_offline">
                    <i class="fa fa-bolt"></i>Pay Offline
                </a>
            </li>
            <li class = "<?php if(isset($_GET['my_address'])){echo "active";}?>">
                <a href="my_account.php?my_address">
                    <i class="fa fa-user"></i>My Addresses
                </a>
            </li>
            <li class = "<?php if(isset($_GET['edit_act'])){echo "active";}?>">
                <a href="my_account.php?edit_act">
                    <i class="fa fa-pencil"></i>Edit Account
                </a>
            </li>
            <li class = "<?php if(isset($_GET['change_pswd'])){echo "active";}?>">
                <a href="my_account.php?change_pswd">
                    <i class="fa fa-user"></i>Change Password
                </a>
            </li>
            <li class = "<?php if(isset($_GET['my_wishlist'])){echo "active";}?>">
                <a href="my_account.php?my_wishlist">
                    <i class="fa fa-heart"></i>My Wishlist
                </a>
            </li>
            <li class = "<?php if(isset($_GET['delete_ac'])){echo "active";}?>">
                <a href="my_account.php?delete_ac">
                    <i class="fa fa-trash"></i>Delete Account
                </a>
            </li>
            <li class = "<?php if(isset($_GET['logout'])){echo "active";}?>">
                <a href="my_account.php?dlogout">
                    <i class="fa fa-signout"></i>Logout
                </a>
            </li>
        </ul>
    </div>
    
</div>
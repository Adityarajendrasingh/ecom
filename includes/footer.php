<!-- foooter starts -->
<div id = "footer">
    <div class="container">
        <div class="row">

            <!-- col-md-3 col-sm-6 starts -->
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>
                <ul>
                    <li>
                        <a href="cart.php">Shopping Cart</a>
                    </li>
                    <li>
                        <a href="contactus.php">Contact Us</a>
                    </li>
                    <li>
                        <a href="shop.php">Shop</a>
                    </li>
                    <li>
                    <?php
                        if(!isset($_SESSION['customer_email'])) echo "<a href='checkout.php'>My Account</a>";
                        else echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                    ?>
                    </li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
                    <li>
                        <a href="checkout.php">Login</a>
                    </li>
                    <li>
                        <a href="customer_registration.php">Register</a>
                    </li>
                </ul>
                <hr class = "hidden-md hidden-lg hidden-sm">
            </div>
            <!-- col-md-3 col-sm-6 ends-->



            <!-- col-md-3 col-sm-6 starts -->
            <div class="col-md-3 col-sm-6">
                <h4>Top Product Manegement</h4>
                <ul>
                    <?php
                        $get_p_cats="select * from product_category";
                        $run_p_cats=mysqli_query($con, $get_p_cats);
                        while($row_p_cat=mysqli_fetch_array($run_p_cats)) {
                            $p_cat_id = $row_p_cat['p_cat_id'];
                            $p_cat_title = $row_p_cat['p_cat_title'];
                            echo"
                            <li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>
                            ";
                        }
                    
                    ?>

                </ul>
                <hr class = "hidden-md hidden-lg">
            </div>

            <!-- col-md-3 col-sm-6 ends -->


            <!-- col-md-3 col-sm-6 starts -->
            <div class="col-md-3 col-sm-6">
                <h4>Where to find us</h4>
                <p>
                    <strong>hp.com</strong>
                    <br>Locality
                    <br>City/Town
                    <br>State
                    <br>Email
                    <br>Phone
                </p>
                <a href="contact.php">Goto contact us page</a>
                <hr class = "hidden-md hidden-lg">
            </div>

            <!-- col-md-3 col-sm-6 ends -->

            <!-- col-md-3 col-sm-6 starts -->
            <div class="col-md-3 col-sm-6">
                <h4>Get the news</h4>
                <p class = "text-muted">
                    subscribe and save our page!!
                </p>
                <form action="" method = "post">
                    <div class="input-group">
                        <input type="text" name="email" class="form-control">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-default" value="subscribe">
                        </span>
                    </div>
                </form>
                <hr>
                <h4>Stay In Touch</h4>
                <p class = "social">
                    <a href="#"><i class="fa-brands fa-google"></i></a>
                    <a href="#"><i class="fa-brands fa-meta"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </p>
            </div>
            <!-- col-md-3 col-sm-6 ends -->
        </div>
    </div>
</div>
<!-- footer ends -->


<!-- copyright starts -->

<div id = "copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">
                &copy; 2019 Aditya
            </p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">
                Template By: <a href="www.hp.com">Hp</a>
            </p>
        </div>
    </div>
</div>


<!-- compyright ends -->
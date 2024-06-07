<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i> Aditya <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="index.php?user_profile">
                            <i class="fa fa-fw fa-user"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a href="index.php?user_product">
                            <i class="fa fa-fw fa-envelope"></i> Products
                        </a>
                    </li>
                    <li>
                        <a href="index.php?view_customer">
                            <i class="fa fa-fw fa-users"></i> Customers
                        </a>
                    </li>
                    <li>
                        <a href="index.php?pro_cat">
                            <i class="fa fa-fw fa-gear"></i> Product Categories
                        </a>
                    </li>
                    <li class="divider">

                    </li>
                    <li>
                        <a href="logout.php">Logout
                            <i class="fa fa-fw fa-power-off"></i>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="index.php?dashboard">
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                    </a>
                </li>
                <!-- start here -->
                <li>
                    <a href="#" data-toggle="collapse" data-target="#products">
                        <i class="fa fa-fw fa-table"></i>
                        Product <i class="fa fa-fw fa-caret-down"></i>
                    </a>

                    <ul class="collapse" id="products">
                        <li>
                            <a href="index.php?insert_product">Insert Product</a>
                        </li>
                        <li>
                            <a href="index.php?view_product">View Product</a>
                        </li>
                    </ul>
                </li>  
                <!-- end here -->
                <!-- start here -->
                <li>
                    <a href="#" data-toggle="collapse" data-target="#product_cat">
                        <i class="fa fa-fw fa-table"></i>
                        Product Categories<i class="fa fa-fw fa-caret-down"></i>
                    </a>

                    <ul class="collapse" id="product_cat">
                        <li>
                            <a href="index.php?insert_product_cat">Insert Product Categories</a>
                        </li>
                        <li>
                            <a href="index.php?view_product_cat">View Product Categories</a>
                        </li>
                    </ul>
                </li>  
                <!-- end here -->
                <!-- start here -->
                <li>
                    <a href="#" data-toggle="collapse" data-target="#categories">
                        <i class="fa fa-fw fa-table"></i>
                        Categories <i class="fa fa-fw fa-caret-down"></i>
                    </a>

                    <ul class="collapse" id="categories">
                        <li>
                            <a href="index.php?insert_categories">Insert Categories</a>
                        </li>
                        <li>
                            <a href="index.php?view_categories">View Categories</a>
                        </li>
                    </ul>
                </li>  
                <!-- end here -->
                <!-- start here -->
                <li>
                    <a href="#" data-toggle="collapse" data-target="#slider">
                        <i class="fa fa-fw fa-table"></i>
                        Slider <i class="fa fa-fw fa-caret-down"></i>
                    </a>

                    <ul class="collapse" id="slider">
                        <li>
                            <a href="index.php?insert_slider">Insert Slider</a>
                        </li>
                        <li>
                            <a href="index.php?view_slider">View Slider</a>
                        </li>
                    </ul>
                </li>  
                <!-- end here -->



                 <li>
                    <a href="index.php?view_customer">
                        <i class="fa fa-fw fa-edit"></i>View Customer
                    </a>
                 </li>
                 <li>
                    <a href="index.php?view_order">
                        <i class="fa fa-fw fa-list"></i>View Order
                    </a>
                 </li>
                 <li>
                    <a href="index.php?view_payments">
                        <i class="fa fa-fw fa-pencil"></i>View Payments
                    </a>
                 </li>
                 <!-- start here -->
                 <li>
                    <a href="#" data-toggle="collapse" data-target="#users">
                        <i class="fa fa-fw fa-table"></i>
                        Users <i class="fa fa-fw fa-caret-down"></i>
                    </a>

                    <ul class="collapse" id="users">
                        <li>
                            <a href="index.php?insert_users">Insert User</a>
                        </li>
                        <li>
                            <a href="index.php?view_user">View User</a>
                        </li>
                        <li>
                            <a href="index.php?user_profile">Edit Profile</a>
                        </li>
                    </ul>
                </li>  
                <!-- end here -->
                
            </ul>
        </div>
    </div>
</nav>

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Product Category</h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu" id = "category_checked">
            <?php getCat(); ?>
        </ul>
        <br>
        <!-- <a href="shop.php">  -->
            <button id="apply-filter-category" class="btn btn-primary">Apply Category Filter</button>
        <!-- </a> -->
       </div>
       
</div>
<div class="panel panel-default sidebar-menu" id="show_sub_cat">
    
    
</div>
<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Price Range</h3>
    </div>
    <div class="panel-body">
        <div class="price-range-input">
            <label for="min-price">Min Price (INR):</label>
            <input type="number" id="min-price" value="0">
            <br>
            <label for="max-price">Max Price (INR):</label>
            <input type="number" id="max-price" value="100000000">
            <br><br>
            <!-- <button id="apply-filter-price" class="btn btn-primary">Apply Price Filter</button> -->
        </div>
    </div>
</div>


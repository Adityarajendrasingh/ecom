<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $live_search = isset($_POST['live_search']) ? $_POST['live_search'] : '';
    $categories = isset($_POST['categories']) ? $_POST['categories'] : [];

    $subcategories = isset($_POST['subcategories']) ? $_POST['subcategories'] : [];
    $min_price = isset($_POST['min_price']) ? floatval($_POST['min_price']) : 0;
    $max_price = isset($_POST['max_price']) ? floatval($_POST['max_price']) : PHP_INT_MAX;

    $live_search = htmlspecialchars($live_search, ENT_QUOTES, 'UTF-8');
    $categories = array_map('intval', $categories);


    $categories_list = implode(',', $categories);

    // $subcategories = array_map(function($subcategory) {
    //     return "'". htmlspecialchars($subcategory, ENT_QUOTES, 'UTF-8') ."'";
    // }, $subcategories);
    $subcategories_list = implode(',', $subcategories);
    
    $query = "SELECT * FROM products WHERE 1=1";

    if (!empty($live_search)) {
        $live_search = "%" . $live_search . "%";
        $query .= " AND product_title LIKE '$live_search'";
    }
    if (!empty($categories)) {
        $query .= " AND cat_id IN ($categories_list)";
    }
    if (!empty($subcategories)) {
        $query .= " AND sub_cat_id IN ($subcategories_list)";
    }
    if ($min_price > 0) {
        $query .= " AND product_price >= $min_price";
    }
    if ($max_price < PHP_INT_MAX) {
        $query .= " AND product_price <= $max_price";
    }
    $results = executeQuery($query);

    if($results && count($results) > 0) {
        foreach ($results as $row) {
            $pro_id = $row['product_id'];
            $pro_img1 = $row['product_img1'];
            $pro_title = $row['product_title'];
            $pro_price = $row['product_price'];
            ?>

            <div class='col-md-4 col-sm-6 center-responsive' id='responsiveproducts'>
                <div class='product'>
                    <a href='details.php?pro_id=<?php echo $pro_id; ?>'>
                        <img src='admin_area/product_images/<?php echo $pro_img1; ?>' class='img-responsive'>
                    </a>
                    <div class='text'>
                        <h3>
                            <a href='details.php?pro_id=<?php echo $pro_id; ?>'><?php echo $pro_title; ?></a>
                        </h3>
                        <p class='price'>
                            INR <?php echo $pro_price; ?>
                        </p>
                        <p class='buttons'>
                            <a href='details.php?pro_id=<?php echo $pro_id; ?>' class='btn btn-default'>View Details</a>
                            <a href='details.php?pro_id=<?php echo $pro_id; ?>' class='btn btn-primary'>
                                <i class='fa fa-shopping-cart'></i> Add to cart
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <?php
        }
    } 
    else {
        ?>
        <h3 class="no_products">
            Found No products
    </h3>
        <?php
    }   

}

function executeQuery($query) {
    $conn = mysqli_connect("localhost", "root", "", "ecom");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $data = [];
    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    mysqli_close($conn);
    return $data;
}
?>

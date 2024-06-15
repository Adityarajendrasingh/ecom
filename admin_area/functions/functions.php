<?php
    $db = mysqli_connect("localhost", "root", "", "ecom");

    function getPro() {
        global $db;
        $get_product = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0, 6";
        $run_products = mysqli_query($db, $get_product);
        while ($row_product = mysqli_fetch_array($run_products)) {
            $pro_id = $row_product['product_id'];
            $pro_title = $row_product['product_title'];
            $pro_price = $row_product['product_price'];
            $pro_img1 = $row_product['product_img1'];
            // $pro_img2 = $row_product['product_img2'];
            // $pro_img3 = $row_product['product_img3'];
            echo "
                <div class='col-md-4 col-sm-6'>
                    <div class='product'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img src='admin_area/product_images/$pro_img1' alt='' class='img-responsive'>
                        </a>
                        <div class='text'>
                            <h3>
                                <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                            </h3>
                            <p class='price'>INR $pro_price</p>
                            <p class='buttons'>
                                <a href='details.php?pro_id=$pro_id' class='btn btn-deafult'>View Details</a>
                                <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                            </p>
                        </div>
                    </div>
                </div>
            ";

        }
    }

    function get_table($sql, $headers, $key, $has_img) {
        global $db;

        $o = "";
        $o = '<table class="table table-bordered table-hover table-scripted">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                ';
                                for($i = 0; $i < count($headers); $i++) {
                                    $o .= '<th>'.$headers[$i].'</th>';
                                }
                                $o .= '
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>

                        <tbody>
        ';
        
                                // $sql = "select product_id, product_title, product_price, product_img1, product_keywords, date from products";
                                $i = 0;
                                $run_product=mysqli_query($db, $sql);
                                while($row = mysqli_fetch_array($run_product)) {
                                    $id = $row[0];
                                    $i++;
$o .= '                                

                            <tr>                                
                            <td>'.$i.'</td>


                                    ';
                                    for($j = 0; $j < count($headers); $j++) {
                                       if($j != count($headers) - 1 || $has_img == 0) $o .= '<td>'.$row[$j].'</td>';
                                       else $o .= '<td><img src="product_images/'.$row[$j].'"height="50"></td>';
                                    }
$o .= '
                                <td><a href="index.php?delete_'.$key.'='.$id.'">
                                    <i class="fa fa-trash"></i> Delete
                                </a></td>
                                <td><a href="index.php?edit_'.$key.'='.$id.'">
                                    <i class="fa fa-pencil"></i> Edit
                                </a></td>
                            </tr>

';

                            }
                            $o .= '
                        </tbody>
                    </table>';
                    return $o;
    }
?>

<?php


include("functions/functions.php");
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cat_sub = isset($_POST['cat_sub']) ? $_POST['cat_sub'] : [];
    $cat_sub = array_map('intval', $cat_sub);
    $par_id = implode(',', $cat_sub);
    if(!empty($par_id)) {
        getSubCats($par_id);
    }
}
?>
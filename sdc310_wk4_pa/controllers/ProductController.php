<!--------------
Gaby Malaka
5.2.2026
SDC 310 WK 4 PA
--------------->
<?php
require_once "../models/ProductModel.php";
require_once "../config/db.php";

class ProductController {

    public function displayProducts() {
        $db = new Database();
        $conn = $db->connect();

        $model = new ProductModel();
        $products = $model->getAllProducts($conn);

        include "../views/ProductView.php";
    }
}
?>
<!--------------
Gaby Malaka
5.2.2026
SDC 310 WK 4 PA
--------------->
<?php
class ProductModel {

    public function getAllProducts($conn) {
        $sql = "SELECT * FROM products";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
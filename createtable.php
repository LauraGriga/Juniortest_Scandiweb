<?php 
require_once 'connectdb.php';

try {
    $sql = "CREATE TABLE IF NOT EXISTS productlist (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        sku TEXT NOT NULL UNIQUE,
        name TEXT NOT NULL,
        price INT NOT NULL,
        productType TEXT NOT NULL, 
        dvd_attributes INT NOT NULL, 
        book_attributes INT NOT NULL, 
        furniture_attributes INT NOT NULL

    )";

    $conn->exec($sql);
// for development process
    echo "Table created!</p>";

} catch (PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

$conn = null;
?>

<?php 
require_once 'connectdb.php';

try {
    $sql = "CREATE TABLE IF NOT EXISTS productlist (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        sku TEXT NOT NULL,
        name TEXT NOT NULL,
        price DECIMAL NOT NULL,
        productType TEXT NOT NULL, 
        attributes TEXT
    )";

    $conn->exec($sql);
// for development process
    echo "Table created!</p>";

} catch (PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

$conn = null;
?>

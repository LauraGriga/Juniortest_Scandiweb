<?php 
require_once 'connectdb.php';

//Need to run only once(manually) to create table in database

try {
    $sql = "CREATE TABLE IF NOT EXISTS productlist (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        sku TEXT NOT NULL,
        name TEXT NOT NULL,
        price TEXT NOT NULL,
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

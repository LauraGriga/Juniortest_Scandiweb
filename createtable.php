<?php 

require_once 'connectdb.php';


try {
    $sql = "CREATE TABLE IF NOT EXISTS productlist (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        sku VARCHAR(30) NOT NULL UNIQUE,
        name LONGTEXT NOT NULL,
        price VARCHAR(50),
        productType LONGTEXT NOT NULL, 
        attributes LONGTEXT NOT NULL

    )";

    $conn->exec($sql);
// for development process
    echo "Table created!</p>";

} catch (PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

$conn = null;
?>

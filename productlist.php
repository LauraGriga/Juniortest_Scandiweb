<html>
    <head>
        <title>Product list</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <div>
        <h1>Product list</h1>
        <div class = "buttonposition">
        
        <button type="button" onclick="window.location.href='add-product.php'">ADD</button>
        <button id="delete-product-btn" onclick=""> MASS DELETE</button>
        </div>
    </div>
    <hr>
    <body>

    <?php

require_once 'connectdb.php';

try {
    $stmt = $conn->prepare("SELECT * FROM productlist");
    $stmt->execute();
    $productlist = $stmt->fetchAll();

    echo "<table border='1' cellpading='4' style='border-collapse: collapse;'>";
    
        echo "<tr>";
            echo "<th>SKU</th>";
            echo "<th>Name</th>";
            echo "<th>Price</th>";
            echo "<th>Product type</th>";
            echo "<th>DVD Attribute</th>";
            echo "<th>Book Attribute</th>";
            echo "<th>Furniture Attribute</th>";
            
        echo "</tr>";
    
        foreach ($productlist as $pl) {
            echo "<tr>";
                //echo "<td>" . $pl[0] . "</td>"; 
                echo "<td>" . $pl['sku'] . "</td>"; 
                echo "<td>" . $pl['name'] . "</td>";
                echo "<td>" . $pl['price'] . "</td>";
                echo "<td>" . $pl['productType'] . "</td>";
                echo "<td>" . $pl['dvd_attributes'] . "</td>";
                echo "<td>" . $pl['book_attributes'] . "</td>";
                echo "<td>" . $pl['furniture_attributes'] . "</td>";
                
            echo "</tr>";
        }
    echo "</table>";

} catch (PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

$conn = null;
?>

    </body>
    <hr>
    <footer>Scandiweb Test assigment</footer>
</html>
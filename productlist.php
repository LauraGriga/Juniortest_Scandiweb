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
    
        foreach ($productlist as $pl) {
            
            echo "<div class='flex-container'>"; 
                echo "<div class='flex-div'>". "<input type='checkbox' id='delete-checkbox' class='delete-checkbox'>" . "<br>". $pl['sku'] ."<br>". $pl['name'] . "<br>". $pl['price'] ."<br>". $pl['productType'] . "<br>". $pl['dvd_attributes'] ."<br>". $pl['book_attributes'] ."<br>". $pl['furniture_attributes'] . "</div>";
            echo "</div>";
        
        }
    
} catch (PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

$conn = null;
?>

    </body>
    <hr>
    <footer>Scandiweb Test assigment</footer>
</html>
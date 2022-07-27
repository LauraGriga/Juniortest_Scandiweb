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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ids = array_keys($_POST['deleteId']);

    $mainigais = implode(" OR ", $ids);

    $sql_query = "DELETE * FROM ${mainigais}";
}

try {
    $stmt = $conn->prepare("SELECT * FROM productlist");
    $stmt->execute();
    $productlist = $stmt->fetchAll(); ?>
    <form id="product_form" action="productlist.php" method="post" name="massdelete" >
        <button type="submit">Submit</button>
        <div class="flex-container">
            <?php foreach ($productlist as $pl) : ?>
                <div class="flex-div">
                    <input type="checkbox" id="delete-checkbox" class="delete-checkbox" name="deleteId[<?=$pl['id']?>]"><br>
                    <?=$pl['sku']?><br>
                    <?=$pl['name']?><br>
                    <?=$pl['price']?> $<br>
                    <?=$pl['productType']?><br>
                    <?=$pl['attributes']?>
                </div>
            <?php endforeach; ?>
        </div>
    </form>
    <?php
} catch (PDOException $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

$conn = null;
?>

    </body>
    <hr>
    <footer>Scandiweb Test assigment</footer>
</html>
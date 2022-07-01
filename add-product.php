<html>
    <head>
        <title>Product Add</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    
        <h1>Product Add</h1>
        <div class = "buttonposition">
        <button type="submit" >Save</button> <!--(onclick="window.location.href='productlist.php'")Need to add function which after submiting send data to server and redirects to productict list page-->
        <button onclick="window.location.href='productlist.php'">Cancel</button></div>
    <hr>
    
    <body>

    <?php 
    require_once 'connectdb.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $stmt = $conn->prepare("INSERT INTO productlist
        (sku, name, price, productType, dvd_attributes, book_attributes, furniture_attributes)
        VALUES(:sku, :name, :price, :productType, :dvd_attributes, book_attributes, furniture_attributes)");
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':productType', $productType);
        $stmt->bindParam(':dvd_attributes', $dvd_attributes);
        $stmt->bindParam(':book_attributes', $book_attributes);
        $stmt->bindParam(':furniture_attributes', $furniture_attributes);

        $sku = $_POST['sku']; 
        $name = $_POST['name']; 
        $price = $_POST['price']; 
        $productType = $_POST['productType']; 
        $dvd_attributes = $_POST['dvd_attributes']; 
        $book_attributes = $_POST['book_attributes']; 
        $furniture_attributes = $_POST['furniture_attributes']; 

        $stmt->execute();

        echo "<p>Data is succesfully saved!</p>";

    } catch (PDOException $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

?>

           <form id="product_form" action="add-product.php" method="post" name="productform" >
            <label for="sku" id="sku">SKU</label>
            <input type="text" id="sku" name="sku" required>
            <br>
            <label for="name" id="name">Name</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="price" id="price">Price($)</label>
            <input type="number" id="price" name="price" required>
            <br>
            <label for="productType">Type Switcher</label>
            <select name="productType" id="productType" required onchange="prodTypeSelection(this.value)">
                <option value="">Type Switcher</option>
                <option value="dvd" class="dvd">DVD</option>
                <option value="book" class="book">Book</option>
                <option value="furniture" class="furniture">Furniture</option>
            </select>
            <br>
            <!-- How to get information from fields bellow to database-->
                <div class="fieldbox" id="dvd_attributes">
                <label>Size (MB)</label>
                <input type="number" name="size" id="size" value="" required>
                <div id="description">Please, provide size!</div>
                </div>

                <div class="fieldbox" id="book_attributes">
                <label>Weight(KG)</label>
                <input type="number" id="weight" name="weight" value=""required>
                <div id="description">Please, provide weight!</div>
                </div>

                <div class="fieldbox" id="furniture_attributes">
                <label for="height">Height (CM)</label>
                <input type="number" id="height" required>
                <br>
                <label for="width">Width (CM)</label>
                <input type="number" id="width" required>
                <br>
                <label for="length">Length (CM)</label>
                <input type="number" id="length" required>
                <div id="description">Please, provide dimensions!</div>
                </div>
            
        </form>

    </body>
    <script src="addproducts.js"></script>
    <hr>
    <footer>Scandiweb Test assigment</footer>
</html>


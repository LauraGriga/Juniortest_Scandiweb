<html>
    <head>
        <title>Product Add</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>

    <!--Need to format with css that text and buttons is in one line-->
    <nav>
        <h3>Product Add</h3>
        <div class = "buttonposition">
        <button type="submit" onclick="save()" >Save</button> 
        <button onclick="window.location.href='productlist.php'">Cancel</button>
        </div>
    </nav>
    <hr>
    <body>

    <?php 
    require_once 'connectdb.php';

   //Information for testing
    if ($_SERVER['REQUEST_METHOD'] == "POST__") {
        var_dump($_POST);
    }
    // Posting data in to db table productlist

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $stmt = $conn->prepare("INSERT INTO productlist
        (sku, name, price, productType, attributes) 
        VALUES(:sku, :name, :price, :productType, :attributes)");
        $stmt->bindParam(':sku', $sku);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':productType', $productType);
        $stmt->bindParam(':attributes', $attributes);  
    
        $sku = $_POST['sku']; 
        $name = $_POST['name']; 
        $price = $_POST['price']; 
        $productType = $_POST['productType']; 
        
        $dvd_attributes = $_POST['dvd_attributes']; 
        $book_attributes = $_POST['book_attributes']; 
        $furniture_attributes = $_POST['furniture_attributes'];
       
        $attributes = $dvd_attributes; 
        if (empty($attributes)){
            if (!empty($book_attributes)) {
                $attributes = $book_attributes;
            } else if (!empty($furniture_attributes)) {
                $attributes = "{$furniture_attributes[0]}x{$furniture_attributes[1]}x{$furniture_attributes[2]}";
            }
        }

        $stmt->execute();
        
        header("Location: productlist.php"); /*Redirects to productlist page*/ 

    } catch (PDOException $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

?>
        <!--Visual side(structure) of Add product form-->

           <form id="product_form" action="add-product.php" method="post" name="productform" >
            <label for="sku" id="sku">SKU</label>
            <input type="text" id="sku" name="sku" required="required" maxlength="30" oninvalid="this.setCustomValidity('Please, submit required data')"
            oninput="this.setCustomValidity('')">
            <br>
            <label for="name" id="name">Name</label>
            <input type="text" id="name" name="name" required="required" maxlength="30">
            <br>
            <label for="price" id="price">Price($)</label>
            <input type="number" id="price" step="0.01" name="price" required="required" maxlength="30">
            <br>
            <label for="productType">Type Switcher</label>
            <select name="productType" id="productType" required="required" onchange="prodTypeSelection(this.value)">
                <option value="">Type Switcher</option>
                <option value="dvd" class="dvd">DVD</option>
                <option value="book" class="book">Book</option>
                <option value="furniture" class="furniture">Furniture</option>
            </select>
            <br>
             
                <div class="fieldbox" id="dvd_attributes">
                <label>Size (MB)</label>
                <input type="number" name="dvd_attributes" id="size" step="0.01" value="" maxlength="30">
                <div id="description">Please, provide size!</div>
                </div>

                <div class="fieldbox" id="book_attributes">
                <label>Weight (KG)</label>
                <input type="number" id="weight" name="book_attributes" step="0.01" value="" maxlength="30">
                <div id="description">Please, provide weight!</div>
                </div>

                <div class="fieldbox" id="furniture_attributes">
                <label for="height">Height (CM)</label>
                <input type="number" name="furniture_attributes[0]" id="height" step="0.01" maxlength="30">
                <br>
                <label for="width">Width (CM)</label>
                <input type="number" name="furniture_attributes[1]" id="width" step="0.01" maxlength="30">
                <br>
                <label for="length">Length (CM)</label>
                <input type="number" name="furniture_attributes[2]" id="length" step="0.01" maxlength="30">
                <div id="description">Please, provide dimensions!</div>
                </div>
           
            
        </form>

    </body>
    <script src="javascriptfunc.js"></script>
    <br>
    <hr>
    <footer>Scandiweb Test assigment</footer>
</html>


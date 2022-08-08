<html>
    <head>
        <title>Product Add</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">

        <!--Stylesheets-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    
    </head>

    <!--Need to format with css that text and buttons is in one line-->
    <div id="title">
                <nav class="navbar">
                    <div class="container-fluid">
                    <a class="navbar-brand">Product list</a>
                    <span class="navbar-item">
                    <button class="btn btn-light btn-style" type="submit" onclick="save()" >Save</button>
                    <button class="btn btn-light btn-style" onclick="window.location.href='productlist.php'">Cancel</button>
                    </div>
                </nav>
            </div>
    <hr>
    <body>
    
    <div id="body">

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
                <div class="mb-3">
                <label for="sku" id="sku">SKU</label>
                <input type="text" id="sku" name="sku" maxlength="30" oninvalid="this.setCustomValidity('Please, submit required data')"
                oninput="this.setCustomValidity('')">
                </div>

                <div class="mb-3">
                <label for="name" id="name">Name</label>
                <input type="text" id="name" name="name" maxlength="30">
                </div>

                <div class="mb-3">
                <label for="price" id="price">Price($)</label>
                <input type="number" id="price" step="0.01" name="price" maxlength="30">
                </div>
                
                <div class="input-group mb-3">
                <label for="productType">Type Switcher</label>
                <select name="productType" class="form-select" id="productType" onchange="prodTypeSelection(this.value)">
                        <option value="">Type Switcher</option>
                        <option value="dvd" class="dvd">DVD</option>
                        <option value="book" class="book">Book</option>
                        <option value="furniture" class="furniture">Furniture</option>
                    </select>
                </div>
             
                <div class=" mb-3 fieldbox" id="dvd_attributes">
                <label>Size (MB)</label>
                <input type="number" name="dvd_attributes" id="size" step="0.01" value="" maxlength="30">
                <div id="description">Please, provide size!</div>
                </div>

                <div class=" mb-3 fieldbox" id="book_attributes">
                <label>Weight (KG)</label>
                <input type="number" id="weight" name="book_attributes" step="0.01" value="" maxlength="30">
                <div id="description">Please, provide weight!</div>
                </div>

                <div class="mb-3 fieldbox" id="furniture_attributes">
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
</div>

    </body>
    <script src="javascriptfunc.js"></script>
    <!-- Footer -->
     <hr>   
    <div id="footer">
        <footer>Scandiweb Test assigment</footer>
        <p>© Copyright Laura Griga 2022</p>
    </div>
</html>


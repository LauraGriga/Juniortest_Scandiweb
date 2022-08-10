<html>
    <head>
        <title>Product list</title>
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

    <body>

        <!-- Mass delete section-->
        <?php 
        require_once 'connectdb.php';
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                try {
                    $ids = array_keys($_POST['deleteId']);
                    $selected = implode(", ", $ids);
                    $stmt = $conn->prepare("DELETE FROM productlist WHERE id in ($selected)");
                        
                    $stmt->execute();

                    } catch (PDOException $e) {
                        echo "<p>Error: " . $e->getMessage() . "</p>";
                    }
                }
        ?>

        <!-- Productlist -->
        <?php 
        require_once 'connectdb.php';

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
        }

        try {
            $stmt = $conn->prepare("SELECT * FROM productlist");
            $stmt->execute();
            $productlist = $stmt->fetchAll(); ?>
            <form id="product_form" action="productlist.php" method="post" name="massdelete" >

            <div id="title">
                <nav class="navbar">
                    <div class="container-fluid">
                    <a class="navbar-brand">Product list</a>
                    <span class="navbar-item">
                    <button class="btn btn-light btn-style" type="button" onclick="window.location.href='add-product.php'">ADD</button>
                    <button class="btn btn-light btn-style" type="submit" id="delete-product-btn"> MASS DELETE</button>
                    </div>
                </nav>
            </div>

        <hr>

            <div id="body">
                    <div class="row">
                        <?php foreach ($productlist as $pl) : ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                    <input type="checkbox" id="delete-checkbox" class="delete-checkbox" name="deleteId[<?=$pl['id']?>]"><br>
                                    <?=$pl['sku']?><br>
                                    <?=$pl['name']?><br>
                                    <?=$pl['price']?> $<br>

                                    <!--Need to add information before and after attribute depending of ProductType 
                                    this kind of logic: 

                                     if (productType=='dvd'){
                                        echo "Size: "+$pl['attributes']+" MB"
                                    } elseif (($pl['productType'])=='book'){
                                        echo "Weight: "+ $pl['attributes']+ " KG"
                                    } else {
                                        echo "Dimension: "+$pl['attributes']
                                    } -->

                                    <?=$pl['attributes']?>

                                    </div>
                                </div>
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
            </div>
    </body>
    <hr>

    <script src="javascriptfunc.js"></script>
   
    <!-- Footer -->
        
        <div id="footer">
        <footer>Scandiweb Test assigment</footer>
        <p>© Copyright Laura Griga 2022</p>
    </div>
</html>
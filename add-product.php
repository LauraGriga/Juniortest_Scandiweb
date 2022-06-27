<html>
    <head>
        <title>Product Add</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
    <div>
        <h1>Product Add</h1>
        <button type="submit">Save</button> <!--Need to add function which after submiting send data to server and redirects to productict list page-->
        <button onclick="window.location.href='productlist.php'">Cancel</button>
    <hr>
    
    </div>
    
    <body>
        <form id="product_form">
            <label for="sku" id="sku">SKU</label>
            <input type="text" id="sku" name="sku" required>
            <br><br>
            <label for="name" id="name">Name</label>
            <input type="text" id="name" name="name" required>
            <br><br>
            <label for="price" id="price">Price($)</label>
            <input type="text" id="price" name="price" required>
            <br><br>
            <label for="productType">Type Switcher</label>
            <select name="productType" id="productType" required onselect="prodTypeSelection()">
                <option value="">Type Switcher</option>
                <option value="dvd">DVD</option>
                <option value="book">Book</option>
                <option value="furniture">Furniture</option>
             </select>
             <br><br>

             <div id="prodTypeSelection">
            <!--
                Maybe there I need JS function add
             Selection DVD
             /* 
             <label for="size">Size (MB)</label>
             <input type="text" id="size">
             
             !!!! Need to add description section "Please, provide size"
             
             <br><br>

             Selection Furniture
             <label for="height">Height (CM)</label>
             <input type="text" id="height">
             <br><br>
             <label for="width">Width (CM)</label>
             <input type="text" id="width">
             <br><br>
             <label for="length">Length (CM)</label>
             <input type="text" id="length">
            !!!! Need to add description section "Please, provide dimensions"
             <br><br>

             Selection books
             <label for="weight">Weight (KG)</label>
             <input type="text" id="weight">
             !!!! Need to add description section "Please, provide weight"-->
             <br><br>
            

            </div>
        </form>
        
        


    </body>
    <script src="javascript.js"></script>
    <hr>
    <footer>Scandiweb Test assigment</footer>
</html>
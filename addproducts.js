const map = {
       "dvd": "dvd_attributes",
       "book": "book_attributes",
       furniture: "furniture_attributes"
     };
     
     function prodTypeSelection(value) {
       document
         .querySelectorAll(".fieldbox")
         .forEach((node) => (node.style.display = "none"));
     
       document.getElementById(map[value]).style.display = "block";
     }

function save() {
       document.getElementById("product_form").submit();       
}

function redirect(){
       window.location.href = "productlist.php";
}

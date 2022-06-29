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
       //There should add function that will send data to database
}

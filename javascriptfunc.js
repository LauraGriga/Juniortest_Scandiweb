const map = {
       "dvd": "dvd_attributes",
       "book": "book_attributes",
       furniture: "furniture_attributes"
     };
     
     function prodTypeSelection(value) {
       document
         .querySelectorAll(".fieldbox")
         .forEach((node) => {
            node.style.display = "none";
            node.removeAttribute("required");
         });
     
         var formElement = document.getElementById(map[value]);
         formElement.style.display = "block";
         formElement.setAttribute("required", "required");
     }

function save() {
       document.getElementById("product_form").submit();       
}





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
            //Need to change that required removes from input field
            node.removeAttribute("required");
         });
     
         var formElement = document.getElementById(map[value]);
         formElement.style.display = "block";
         //Need to change that required adds to input field
         formElement.setAttribute("required", "required");
     }

function save() {
       document.getElementById("product_form").submit();       
}





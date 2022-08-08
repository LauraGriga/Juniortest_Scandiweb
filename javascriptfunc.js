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
         });
     
         var formElement = document.getElementById(map[value]);
         formElement.style.display = "block";
        
     }

function validateForm() {
    var sku = document.forms.product_form.sku.value;
    var name = document.forms.product_form.name.value;
    var price = document.forms.product_form.price.value;
    var productType = document.forms.product_form.productType.value;
    // var dvd_attributes = document.forms.product_form.dvd_attributes.value;
    // var book_attributes = document.forms.product_form.book_attributes.value;
    // var furniture_attributes0 = document.forms.product_form.furniture_attributes[0].value;
    // var furniture_attributes1 = document.forms.product_form.furniture_attributes[1].value;
    // var furniture_attributes2 = document.forms.product_form.furniture_attributes[2].value;

    if (sku == "") {
      window.alert("Please, submit required data!");
      sku.focus();
      return false;
    }

    if (name == "") {
      window.alert("Please, submit required data!");
      name.focus();
      return false;
    }

    if (price == "") {
      window.alert("Please, submit required data!");
      price.focus();
      return false;
    }

    if (productType == "") {
      window.alert("Please, submit required data!");
      productType.focus();
      return false;
    }
  return document.getElementById("product_form").submit();


  // let x = document.forms["productform"]["sku"].value;
  // if (x == "") {
  //   alert("Please, submit required data!");
  //   return false;
  // } else {
  //   document.getElementById("product_form").submit(); 
  // }
}





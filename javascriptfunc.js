// function prodTypeSelection(value) {
//   document
//     .querySelectorAll(".fieldbox")
//     .forEach((fieldBox) => {
//       if (value + '_attributes' != fieldBox.id) {
//         fieldBox.style.display = "none";
//         fieldBox.querySelectorAll("input").forEach((input) => {
//           input.required = false;
//         });
//       } else {
//         fieldBox.style.display = '';
//         fieldBox.querySelectorAll("input").forEach((input) => {
//           input.required = true;
//         });
//       }
//     });

// }

const map = {
  "dvd": "DVD",
  "book": "Book",
  furniture: "Furniture"
};

function prodTypeSelection(value) {
  document
    .querySelectorAll(".fieldbox")
    .forEach((node) => (node.style.display = "none"));

  document.getElementById(map[value]).style.display = "block";
}


function validateForm() {
  var inputs = document.getElementsByTagName("input");
  var selects = document.getElementsByTagName("select");
  var allFileds = [...inputs, ...selects];

  // loop through all inputs and check if they are empty
  for (var i = 0; i < allFileds.length; i++) {
    var field = allFileds[i];
    if (field.required && field.value == "") {
      alert("Please, submit required data!");
      document. getElementById("product_form"). className = "was-validated"

      field.focus();
      return false; 
      break; 
    } 

  }
  return document.getElementById("product_form").submit();
}

window.onload = function () {
  prodTypeSelection(document.getElementById("productType").value);
}

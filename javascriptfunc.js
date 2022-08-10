function prodTypeSelection(value) {
  document
    .querySelectorAll(".fieldbox")
    .forEach((fieldBox) => {
      if (value + '_attributes' != fieldBox.id) {
        fieldBox.style.display = "none";
        fieldBox.querySelectorAll("input").forEach((input) => {
          input.required = false;
        });
      } else {
        fieldBox.style.display = '';
        fieldBox.querySelectorAll("input").forEach((input) => {
          input.required = true;
        });
      }
    });

}

function validateForm() {
  var inputs = document.getElementsByTagName("input");
  var selects = document.getElementsByTagName("select");
  var allFileds = [...inputs, ...selects];
  var kļūdas = 0;

  // loop through all inputs and check if they are empty
  // 1. Saskaitīt, cik kopā ir vajadzīgie (required) lauki
  for (var i = 0; i < allFileds.length; i++) {
    var field = allFileds[i];
    if (field.required && field.value == "") {
      // 2. Saskaitīt, cik ir kļūdas
      alert("Please, submit required data!");
      kļūdas++;
      field.focus();
      return false; // Iespējams arī jānovāc, ja grib skaitīt laukus
      break; // Jānovāc, ja grib skaitīt laukus
    } else {
      // skaita laukus, ja nav tukši
    }
  }

  // 3. Pārbaudīt, vai kļūdas un lauku skaits sakrīt

  return true; // jāpārbauda, vai ir kļūdas vai nav un attiecīgi jāatgriež true vai false
}

window.onload = function () {
  prodTypeSelection(document.getElementById("productType").value);
}





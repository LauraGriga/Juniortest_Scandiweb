<?php
// define variables and set to empty values
$sku_error = $name_error = $price_error = $protype_error = $size_error = $weight_error = /*$height_error = $width_error = $length_error = */ "";;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sku = test_input($_POST["sku"]);
  $name = test_input($_POST["name"]);
  $price = test_input($_POST["price"]);
  $productType = test_input($_POST["productType"]);
  $dvd_attributes = test_input($_POST["dvd_attributes"]);
  $book_attributes = test_input($_POST["book_attributes"]);
  //$furniture_attributes = test_input($_POST["furniture_attributes"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
  $sku_error = $name_error = $price_error = $protype_error = $size_error = $weight_error = /* $height_error = $width_error = $length_error =*/ "";
  $sku = $name = $price = $productType = $dvd_attributes = $book_attributes = /*$furniture_attributes = */"";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["sku"])) {
      $sku_error = "Please, provide the data of indicated type";
    } else {
      $sku = test_input($_POST["sku"]);
    }

    if (empty($_POST["name"])) {
      $name_error = "Please, provide the data of indicated type";
    } else {
      $name = test_input($_POST["name"]);
    }

    if (empty($_POST["price"])) {
      $price_error = "Please, provide the data of indicated type";
    } else {
      $price = test_input($_POST["price"]);
    }

    if (empty($_POST["productType"])) {
      $protype_error = "Please, provide the data of indicated type";
    } else {
      $productType = test_input($_POST["productType"]);
    }

    if (empty($_POST["dvd_attributes"])) {
        $size_error = "Please, provide the data of indicated type";
      } else {
        $dvd_attributes = test_input($_POST["dvd_attributes"]);
      }

    if (empty($_POST["book_attributes"])) {
      $weight_error = "Please, provide the data of indicated type";
    } else {
      $book_attributes = test_input($_POST["book_attributes"]);
    }
/*
    if (empty($_POST["furniture_attributes"])) {
        $height_error = $width_error = $length_error = ""Please, provide the data of indicated type"";
      } else {
        $furniture_attributes = test_input($_POST["furniture_attributes"]);
      }
      */
  }
?>
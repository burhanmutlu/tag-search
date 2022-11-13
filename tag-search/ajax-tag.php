<?php require_once("tags.php") ?>
<?php
    /*$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "canbus_canbus";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Bağlantı Hatası: " . $conn->connect_error); */
   /* $sql = "SELECT * from mufm8_virtuemart_product_customfields WHERE virtuemart_custom_id = 8 GROUP by customfield_value";
    $table = $conn->query($sql);
    while ($row = $table->fetch_assoc()) {
      $a[] = $row['customfield_value'];
    }   */   
?>

<?php

$q = $_REQUEST["q"];

$hint = "";

if ($q !== "") {
  $q = strtolower($q);
  foreach($a as $name) {
    if ( stristr($name, $q)!== false ) {
      $link = "https://www.canbusemulator.com/en/tags/productslist/";
      $modal = strtolower($name);
      $link .= $modal;
      if ($hint === "") {
        $hint = "<a class='tc-a-link' href='". $link . "'><div class='tc-col-3-tag'>" .$name . "</div></a>";
      } else {
        $hint .= "<a class='tc-a-link' href='". $link . "'><div class='tc-col-3-tag'>" . $name. "</div></a>";
      }
    }
  }
}

echo $hint === "" ? "No Suggestion" : $hint;
?>
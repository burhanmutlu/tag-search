<?php require_once("tags.php") ?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Markalar</title>
  <script>
    function showHint(str) {
      if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("GET", "ajax-tag.php?q="+str, true);
        xmlhttp.send();
      }
    }
  </script>
<style> 

.tc-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  width: 80%;
  margin-left: 10%;
}

.tc-col-1 {
  width: 50%;
}

.tc-col-2 {
  width: 50%;
  text-align: end;
} 

.tc-col-3 {
  width: 100%;
  background: #f5f5f5;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 23px 0px;
  margin-top: 3px;
  border-radius: 8px;
  box-shadow: 0px 0px 9px 1px #00000033
}

#tc-small {
  font-size: 23px;
  font-weight: 900;
}

#tc-big {
  font-size: 28px;
  font-weight: 900;
}

.tc-col-1-border {
  border: 1px solid black;
  width: max-content;
  border-radius: 5px;
  margin-left: 2px;
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
  padding: 6px 9px;
}

#tc-search {
  border: 0px;
  padding: 7px 0px;
  outline: -webkit-focus-ring-color auto 0px;
  font-size: 20px;
  font-weight: 400;
}

#tc-search-icon {
  width: 30px;
}

#tc-icon-div {
  height: 30px;
}

.tc-col-3-tag {
  width: max-content;
  background: white;
  padding: 5px 9px;
  margin-left: 5px;
  font-weight: 900;
  margin-bottom: 5px;
  border-radius: 5px;
  font-size: 21px;
  font-family: arial;
}

.tc-a-link {
  text-decoration: none;
  color: black;
}

@media screen and (max-width: 650px) {

  .tc-container {
    width: 90%;
    margin-left: 5%;
  }


  .tc-col-1 {
    width: 50%;
    text-align: end;
  }

  .tc-col-2 {
    width: 50%;
    text-align: end;
  }

  .tc-col-3 {
    justify-content: space-evenly;
  }

  #tc-small {
    font-size: 14px;
  }

  #tc-big {
    font-size: 12px;
  }

  #tc-search {
    font-size: 13px;
    font-weight: 400;
  }

  #tc-search-icon {
    width: 25px;
  }

  #tc-icon-div {
    height: 25px;
  }
}

</style>
</head>
<body>

<?php
    /*$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "canbus_canbus";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Bağlantı Hatası: " . $conn->connect_error); 

    $sql = "SELECT * from mufm8_virtuemart_product_customfields WHERE virtuemart_custom_id = 8 GROUP by customfield_value";
    $table = $conn->query($sql);*/
?> 

<div class="tc-container">
  <div class="tc-col-1">
    <div class="tc-col-1-border">
      <div>
        <form action="">
          <input type="text" id="tc-search" name="fname" placeholder="Brand name" onkeyup="showHint(this.value), getAllTags()">
        </form>
      </div>
      <div id="tc-icon-div">
        <img id="tc-search-icon" src="search.png" alt="search">
      </div>
    </div>
  </div>
  <div class="tc-col-2">
    <span id="tc-small">BY BRAND</span> <br> <span id="tc-big">FIND EMULATOR</span>
  </div>
  <div class="tc-col-3" id="txtHint">
    <?php
      //while ($row = $table->fetch_assoc()) {
        foreach($a as $name) {
        $link = "https://www.canbusemulator.com/en/tags/productslist/";
        //$modal = strtolower($row['customfield_value']);
        $modal = strtolower($name);
        $link .= $modal;
        echo '<a class="tc-a-link" href="'. $link . '">';
        echo '<div class="tc-col-3-tag">';
       // echo $row['customfield_value'];
        echo $name;
        echo "</div>";
        echo '</a>';
      }    
    ?>
  </div>
</div>

<script>

function getAllTags() {
  if (!document.getElementById("tc-search").value) { // boşsa çalışsın
    var value;
    <?php 
    /*$sql = "SELECT * from mufm8_virtuemart_product_customfields WHERE virtuemart_custom_id = 8 GROUP by customfield_value";
    $table = $conn->query($sql);
      while ($row = $table->fetch_assoc()) {*/
      foreach($a as $name) {
        $link = "https://www.canbusemulator.com/en/tags/productslist/";
        $modal = strtolower($name);
        $link .= $modal;
    ?>
    value =  '<?php echo '<a class="tc-a-link" href="'. $link . '">'; ?>';
    value += '<?php echo '<div class="tc-col-3-tag">'; ?>';
    value += '<?php echo $name; ?>';
    value += '<?php echo "</div>"; ?>';
    value += '<?php echo '</a>'; ?>';
    document.getElementsByClassName("tc-col-3")[0].innerHTML += value;
    <?php
      } 
    ?>
  } 
}

</script>
    
</body>
</html>
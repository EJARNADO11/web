<script>
function showResults(str) {
  if (str.length == 0) {
    document.getElementById("search-result").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "inventory-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<div id="third-submenu"> 
    Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'result':
                    require_once 'inventory-module/search-user.php';
                break;
                default:
                    require_once 'inventory-module/main.php';
                break; 
            }
    ?>
  </div>
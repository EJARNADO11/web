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
    xmlhttp.open("GET", "release-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<div id="third-submenu">
    <a href="index.php?page=transaction&subpage=real"><i class="fa-sharp fa-regular fa-pen-to-square"></i>Releasing List</a> | 
    <a href="index.php?page=transaction&subpage=real&action=create"><i class="fa-regular fa-square-plus"></i>New Transaction</a> 
    | Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">    
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'release-module/create-transaction.php';
                break; 
                case 'release':
                    require_once 'release-module/release-products.php';
                break; 
                default:
                    require_once 'release-module/main.php';
                break; 
            }
    ?>
  </div>
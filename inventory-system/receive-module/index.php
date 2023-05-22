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
    xmlhttp.open("GET", "receive-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<div id="third-submenu">
  <a href="index.php?page=transaction&subpage=receive"><i class="fa-sharp fa-regular fa-pen-to-square"></i>Receiving List</a> | 
  <?php
  if($user->get_user_access($user_id) != "Staff"){
  ?>
    <a href="index.php?page=transaction&subpage=receive&action=create"><i class="fa-regular fa-square-plus"></i>New Transaction</a> |
  <?php
  }
  ?>
  Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
</div>
<div id="subcontent">
  <?php
    switch($action){
      case 'create':
        if($user->get_user_access($user_id) != "Staff"){
          require_once 'receive-module/create-transaction.php';
        }
        break; 
      case 'receive':
        require_once 'receive-module/receive-products.php';
        break; 
      case 'profile':
        require_once 'receive-module/view-product.php';
        break;
      case 'types':
        require_once 'receive-module/list-product-types.php';
        break;
      case 'upload':
        require_once 'receive-module/imageupload.php';
        break;
      default:
        require_once 'receive-module/main.php';
        break; 
    }
  ?>
</div>

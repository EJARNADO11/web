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
    xmlhttp.open("GET", "products-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<div id="third-submenu">
    <a href="index.php?page=products&subpage=products"><i class="fa-sharp fa-regular fa-pen-to-square"></i>List of Products</a> | 
    <?php
    if ($user->get_user_access($user_id) != "Staff" && $id != $user_id) {
        ?>
    <a href="index.php?page=products&subpage=products&action=create"><i class="fa-regular fa-square-plus"></i>Add Product</a> | 
   <?php
  }
  ?>
    <a href="index.php?page=products&subpage=products&action=types"><i class="fa-solid fa-keyboard"></i>Product Types</a> |
       Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'products-module/create-product.php';
                break; 
                case 'modify':
                    require_once 'products-module/modify-product.php';
                break; 
                case 'profile':
                    require_once 'products-module/view-product.php';
                break;
                case 'types':
                    require_once 'products-module/list-product-types.php';
                break;
                case 'upload':
                    require_once 'products-module/imageupload.php';
                break;
                 case 'delete':
                    require_once 'products-module/index.php';
                break;
                default:
                    require_once 'products-module/main.php';
                break; 
            }
    ?>
  </div>
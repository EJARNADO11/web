<div id="fifth-submenu">
    <a href="index.php?page=products"><i class="fa-solid fa-list"></i>List Products</a>  
    <a href="index.php?page=products&subpage=products&action=create"><i class="fa-solid fa-plus"></i>Add Products</a>  
    <a href="index.php?page=product&subpage=product&action=update"><i class="fa-sharp fa-regular fa-pen-to-square"></i>Update Products</a>  
</div>
<div id="subcontent1">
    <?php

      switch($action){

                case 'create':
                    require_once 'create-product.php';
                break; 
                case 'read':
                    require_once 'product.php';
                break;
                case 'update':
                    require_once 'update-product.php';
                break; 
                case 'delete':
                    require_once 'delete.php';
                break;
                default:
                    require_once 'product.php';
                break; 
            }
    ?>
  </div>
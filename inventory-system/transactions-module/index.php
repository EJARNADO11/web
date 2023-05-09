<div id="forth-submenu">
 <a href="index.php?page=transaction&subpage=receive"><i class="fa-sharp fa-solid fa-registered"></i>Receiving</a>
 <a href="index.php?page=transaction&subpage=real"><i class="fa-solid fa-tent-arrow-left-right"></i>Releasing</a>
</div>

<div id="content">

    <?php
      switch($subpage){
                case 'transaction':
                    require_once 'transactions-module/index.php';
                break; 
                case 'real':
                    require_once 'release-module/index.php';
                break;
                    
                case 'view':
                   require_once 'receive-module/main.php';
                break;
                case 'receive':
                     require_once 'receive-module/index.php';
                break;
                case 'products':
                    require_once 'products-module/index.php';
                break; 
                case 'module_xxx':
                    require_once 'module-folder/';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
            </div>
    </div>
</div>
<div id="second-submenu">
    <a href="index.php?page=settings&subpage=users"><i class="fa-solid fa-users"></i>Users</a> |
    <a href="index.php?page=settings&subpage=systems"><i class="fa-solid fa-bars"></i>System Settings</a>
</div>
<div id="content">
    <?php
      switch($subpage){
                case 'users':
                    require_once 'users-module/index.php';
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
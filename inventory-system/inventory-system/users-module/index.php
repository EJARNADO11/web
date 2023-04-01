<div id="third-submenu">
    <a href="index.php?page=settings&subpage=users"><i class="fa-sharp fa-regular fa-pen-to-square"></i>List Users</a> | <a href="index.php?page=settings&subpage=users&action=create"><i class="fa-regular fa-square-plus"></i>New User</a> 
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'users-module/create-user.php';
                break; 
                case 'modify':
                    require_once 'users-module/modify-user.php';
                break; 
                case 'profile':
                    require_once 'users-module/view-profile.php';
                break;
                case 'result':
                    require_once 'users-module/search-user.php';
                break;
                default:
                    require_once 'users-module/main.php';
                break; 
            }
    ?>
  </div>
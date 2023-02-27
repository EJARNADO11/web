<html>
    <head>
        <title>settings</title>
        <link rel="stylesheet" href="css/login.css?<?php echo time();?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    </head>

<body>
    <div id="second-submenu">
    <a href="index.php?page=settings&subpage=users"><i class="fa-solid fa-users"></i>Users</a> |
    <a href="index.php?page=settings&subpage=systems"><i class="fa-solid fa-bars"></i>Settings</a>
</div>

<div id="content">
    <?php
      switch($subpage){
                case 'users':
                    require_once 'users-module/index.php';
                break; 
                case 'module_two':
                    require_once 'module-folder/';
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
</body>
</html>
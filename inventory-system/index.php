<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include_once 'classes/class.product.php';
include_once 'classes/class.receive.php';
include_once 'classes/class.release.php';
include_once 'classes/class.inventory.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
$product = new Product();
$receive = new Receive();
$release = new Release();
$inventory = new Inventory();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>26TH CAFE INVENTORY SYSTEM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;1,100;1,300&display=swap" rel="stylesheet">
</head>
    <body>
        <div id="container">
            <div id="header">
      <h2>26TH CAFE INVENTORY SYSTEM</h2>
    </div>
        <div id="wrapper">
     <nav>
         <ul class="menu"> 
            <li> <a class="active" href="index.php"><i class="fa-solid fa-house-chimney"></i>Home</a> </li>
            <li> <a href="index.php?page=products"><i class="fa-brands fa-product-hunt"></i>Product</a>  </li>
            <li> <a href="index.php?page=transaction"><i class="fa-solid fa-hand-holding-dollar"></i>Transactions</a> </li>
            <li> <a href="index.php?page=inventory"> <i class="fa-sharp fa-solid fa-warehouse"></i>Inventory</a>  </li>
            <li> <a href="index.php?page=settings"> <i class="fa-solid fa-gear"> </i>Settings</a>  </li>
            <a href="logout.php" class="move-right"><i class="fa-solid fa-right-from-bracket"></i>Log Out</a>
            <span class="move-right"></span> 
 </ul>
</nav>
            <div id="content">
                <?php
                switch($page){
                            case 'settings':
                                require_once 'settings-module/index.php';
                            break; 
                            case 'products':
                                require_once 'products-module/index.php';
                            break; 
                            case 'receive':
                                require_once 'transactions-module/index.php';
                            break; 
                            case 'inventory':
                                require_once 'inventory-module/index.php';
                            break; 
                            case 'release':
                                require_once 'transactions-module/index.php';
                            break; 
                            case 'transaction':
                                  require_once 'transactions-module/index.php';
                            break;
                            default:
                                require_once 'main.php';
                            break; 
                        }
                ?>
            </div>
    </div>
</div>
</body>
</html>
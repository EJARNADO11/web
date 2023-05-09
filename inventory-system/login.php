<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail,$password);
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
	}
	
}
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
</head>
<body>
	
<div id="login-block">
	<form method="POST" action="" name="login">

		<div class="input-group">
    <div class="login-box">
  <p>Login</p>
  <form>
    <div class="user-box">
      <input autocomplete="off" class="input" required name="useremail"placeholder=""/>
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" class="input" required name="password" placeholder=""/>
      <label>Password</label>
    </div>
     <span>
		<input type="submit" name="submit" value="Submit"/>
	</span>
	</div>
	</form>
</div>
</body>
</html>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Lobster&display=swap" rel="stylesheet">
<link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css>

</head>
<body>
<div id="brand-block">
	<h2>26TH CAFE INVENTORY SYSTEM</h2>
</div>
<div id="login-block">
	<i class="fa-sharp fa-solid fa-mug-saucer"></i>
	<form method="POST" action="" name="login">
	<div>
		<h4> Enter </h4>
		<input type="email" class="input" required name="useremail" placeholder=" E-mail"/>
	</div>
	<div>
		<h5> Enter </h5>
		<input type="password" class="input" required name="password" placeholder="Password"/>
	</div>
	<div>
		<input type="submit" name="submit" value="Log In"/>
	</div>
	</form>
</div>
</body>
</html>
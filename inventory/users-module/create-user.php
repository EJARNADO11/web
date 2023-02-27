<html>
    <head>
        <title>REGISTRATION</title>
        <link rel="stylesheet" href="css/login.css?<?php echo time();?>">
    </head>
<div id="wrapper">
    <h3>REGISTRATION</h3>
    <form method="POST" action="processes/process.user.php?action=new">
        <div class="inputBox">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">

            <label for="access">Access Level</label> <br>
            <select id="access" name="access">
              <option value="staff">Staff</option>
              <option value="supervisor">Supervisor</option>
              <option value="Manager">Manager</option>
            </select>
            <br>
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email..">

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password..">

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password..">
            
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>
</body>
</html>
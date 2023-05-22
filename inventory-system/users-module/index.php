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
    xmlhttp.open("GET", "users-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}

</script>
<div id="third-submenu">
     <?php
    if ($user->get_user_access($user_id) != "Staff" && $id != $user_id) {
        ?>
    <a href="index.php?page=settings&subpage=users"><i class="fa-sharp fa-regular fa-pen-to-square"></i>List Users</a> | 
    <?php
    }
    ?> 
    <?php
    if ($user->get_user_access($user_id) != "Staff" && $id != $user_id) {
        ?>
        <a href="index.php?page=settings&subpage=users&action=create">New User</a> | 
        <?php
    }
    ?> 
    <?php
    if ($user->get_user_access($user_id) != "Staff" && $id != $user_id) {
        ?>
    <br> <br>Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
    <?php
    ?>
    <?php
    }
    ?> 
</div>
<div id="subcontent">
    <?php
    switch ($action) {
        case 'create':
            if ($user->get_user_access($user_id) == "Manager" || $user->get_user_access($user_id) == "Supervisor") {
                require_once 'users-module/create-user.php';
            } else {
                header("location: index.php?page=settings&subpage=users");
            }
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

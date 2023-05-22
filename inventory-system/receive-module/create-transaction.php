<?php
 if($user == 'Staff' && $user_id_login != $id){
    header("location: index.php?page=settings&subpage=users");
 }
?>
<h3>Provide the Required Information</h3>
<p> Complete the form below and press the create button!</p>
<div id="form-block">
    <form method="POST" action="processes/process.receive.php?action=create">
        <div id="form-block-center">
            <label for="sname">Supplier Name</label>
            <input type="text" id="sname" class="input" name="sname" placeholder="Supplier name..">

            <label for="desc">Product Description</label>
            <textarea id="desc" class="input" name="desc" placeholder="Description.."></textarea>
        
              </div>
        <div id="button-block">
        <input type="submit" value="Create">
        </div>
  </form>
</div>
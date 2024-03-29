<?php
if($user == 'Staff' && $user_id_login != $id) {
    // Redirect to a page indicating unauthorized access or display an error message
    header("location: index.php?page=unauthorized");
    exit();
}
?>
<h3>Provide the Required Information</h3>
<p>Complete the form below and press the save button!</p>
<div id="form-block">
    <form method="POST" action="processes/process.product.php?action=newproduct">
        <div id="form-block-center">

            <label for="fname">Product Name</label>
            <input type="text" id="pname" class="input" name="pname" placeholder="Product name..">

            <label for="lname">Description</label>
            <textarea id="desc" class="input" name="desc" placeholder="Description.."></textarea>

            <label for="price">Product Price</label>
            <input type="number" id="price" class="input" name="price" placeholder="Product Price.."> 
           

            <label for="ptype">Product Type</label>
            <select id="ptype" name="ptype">
    
              <?php
              if($product->list_types() != false){
                foreach($product->list_types() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $type_id;?>"><?php echo $type_name;?></option>
              <?php
                }
              }
              ?>
            </select>
        </div>
        <div id="button-block">

            <input type="submit" value="Save">
        </div>
    </form>
</div>

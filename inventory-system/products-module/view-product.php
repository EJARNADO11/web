<h3>Product Details</h3>
<?php
  $id = $_GET['id']; 
?>
<div class="btn-box">
<a href="index.php?page=products&subpage=products&action=upload&id=<?php echo $id ?>" class="btn-jsactive">Upload Image</a> | 
</div>
<br/>
<div id="form-block">
    <form method="POST" action="processes/process.product.php?action=updateproduct">
        <div id="form-block-center">
            <label for="fname">Product Name</label>
            <input type="text" id="pname" class="input" name="pname" value="<?php echo $product->get_prod_name($id);?>" placeholder="Product name..">

            <label for="lname">Description</label>
            <textarea id="desc" class="input" name="desc" placeholder="Description.."><?php echo $product->get_prod_desc($id);?></textarea>
          <label for="price">Product Price</label>
            <input type="number" id="price" class="input" name="price" placeholder="Product Price.."> 
            <input type="hidden" id="prodid" name="prodid" value="<?php echo $id;?>"/>
            <label for="ptype">Type</label>
            <select id="ptype" name="ptype">
              <?php
              if($product->list_types() != false){
                foreach($product->list_types() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $type_id;?>" <?php if($product->get_prod_type($id) == $type_id){ echo "selected";};?>><?php echo $type_name;?></option>
              <?php
                }
              }
              ?>
        </select>
              </div>
        <div id="button-block">
        <input type="submit" value="Update">
  </form>
  <form method="POST" action="processes/process.product.php?action=delete">
        <button type="submit" name="prod_id" value="<?php echo $product->get_prod_id($id);?>"><a>Delete</a></button>
    </form>
</div>

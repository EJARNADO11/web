<?php
include_once 'config/config.php';
include_once 'classes/class.product.php';

$product = new Product();

if(isset($_REQUEST['submit'])){
    extract($_REQUEST);
    $product = $product->new_product($product_name,$brand, $product_type, $price, $quantity);
    if($product){
        echo "<script>alert('Added Successfully')</script>";
    }  
}
?>

<html>
    <head>
        <title>Add Product</title>
        <link rel="stylesheet" href="css/product.css?<?php echo time();?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300&display=swap" rel="stylesheet">
        
    </head>
 <body>
     <div id="product">
        <form action="" method="post">
         <div class="product2">
            <h4> ADD PRODUCTS </h4>
            <label for="fname">Product Name</label>
            <input type="text" id="product_name" class="input" name="product_name" placeholder="Product Name">

            <label for="lname">Brand</label>
            <input type="text" id="brand" class="input" name="brand" placeholder="Brand">

             <label for="lname">Product Type</label>
            <input type="text" id="type" class="input" name="product_type" placeholder="Product Type">

             <label for="lname">Price</label>
            <input type="text" id="price" class="input" name="price" placeholder="Price">

             <label for="lname">Quantity</label>
            <input type="text" id="qty" class="input" name="quantity" placeholder="Quantity">

        </div>
        <div id="button-block">
               <input type="submit" class="btn" name="submit"> </button>
           </form>
      </div>
   </body>
 </html>

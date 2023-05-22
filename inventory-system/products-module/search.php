<?php
require_once '../classes/class.product.php';
include_once '../classes/class.inventory.php';

$product = new Product();
$inventory = new Inventory();

if (isset($_GET['q'])) {
  $q = $_GET['q'];
  $count = 1;
  $hint = '<h3>Search Result(s)</h3><table id="data-list">
    <tr>
      <th>#</th>
      <th>Product Details</th>
      <th>Name</th>
      <th>Description</th>
      <th>Type</th>
      <th>QOH</th>
    </tr>';
  
  $data = $product->list_product_search($q);

  if ($data !== false) {
    foreach ($data as $value) {
      $prod_id = $value['prod_id'];
      $prod_name = $value['prod_name'];
      $prod_description = $value['prod_description'];
      $prod_image = $value['prod_image'];
      $prod_type_id = $product->get_prod_type($prod_id);
      $prod_type_name = $product->get_prod_type_name($prod_type_id);
      $qoh = $inventory->get_product_receive_inv($prod_id) - $inventory->get_product_release_inv($prod_id);

      $hint .= '<tr>
          <td>' . $count . '</td>
          <td><img src="img/' . $prod_image . '" class="tmbnail"/></td>
          <td><a href="index.php?page=settings&subpage=products&action=profile&id=' . $prod_id . '">' . $prod_name . '</a></td>
          <td>' . $prod_description . '</td>
          <td>' . $prod_type_name . '</td>
          <td>' . $qoh . '</td>
        </tr>';
        
      $count++;
    }

    $hint .= '</table>';
  } else {
    // If no results are found, display a message
    $hint = '<p>No results found.</p>';
  }
} else {
  // If no search query is provided, display a message
  $hint = '<p>Please enter a search query.</p>';
}

echo $hint;
?>

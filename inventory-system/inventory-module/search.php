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
      <th>Product Name </th>
        <th>Received</th>
        <th>Released</th>
        <th>In stock</th>
    </tr>';
  
  $data = $inventory->list_inventory_search($q);

  if ($data !== false) {
    foreach ($data as $value) {
      $prod_name = $value['prod_name'];
      $prod_id = $value['prod_id'];
      $prod_id = $value['prod_id'];
      $prod_qty = $value['prod_qty'];

      $hint .= '<tr>
          <td>' . $count . '</td>
          <td><a href="index.php?page=inventory' . $prod_id . '">' . $prod_name . '</a></td>
          <td>' . $prod_id . '</td>
          <td>' . $prod_qty . '</td>
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

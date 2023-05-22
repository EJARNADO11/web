<?php
require_once '../classes/class.receive.php';
include_once '../classes/class.inventory.php';

$receive = new Receive();
$inventory = new Inventory();

if (isset($_GET['q'])) {
  $q = $_GET['q'];
  $count = 1;
  $hint = '<h3>Search Result(s)</h3><table id="data-list">
    <tr>
      <th>#</th>
      <th>ID</th>
      <th>Receive Date</th>
      <th>Supplier</th>
      <th>Product Description</th>
      <th>Status</th>
    </tr>';
  
  $data = $receive->list_receive_search($q);

  if ($data !== false) {
    foreach ($data as $value) {
      $rec_id = $value['rec_id'];
      $rec_date = $value['rec_date_added'];
      $rec_supp = $value['rec_supplier'];
      $rec_description = $value['rec_description'];
      $rec_status = $value['rec_status'];
      
      $hint .= '<tr>
          <td>' . $count . '</td>          
          <td><a href="index.php?page=inventory&subpage=receives&action=profile&id=' . $rec_id . '">' . $rec_id . '</a></td>
          <td>' . $rec_date . '</td>
          <td>' . $rec_supp . '</td>
          <td>' . $rec_description . '</td>
          <td>' . $rec_status . '</td>
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

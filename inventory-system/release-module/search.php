<?php
require_once '../classes/class.release.php';
include_once '../classes/class.inventory.php';

$release = new Release();
$inventory = new Inventory();

if (isset($_GET['q'])) {
  $q = $_GET['q'];
  $count = 1;
  $hint = '<h3>Search Result(s)</h3><table id="data-list">
    <tr>
      <th>#</th>
        <th>Release Date</th>
        <th> Release ID </th>
        <th>Staff Name</th>
        <th> Release Description </th>
        <th>Status</th>
    </tr>';
  
  $data = $release->list_release_search($q);

  if ($data !== false) {
    foreach ($data as $value) {
      $rel_id = $value['rel_id'];
      $rel_date = $value['rel_date_added'];
      $rel_supp = $value['rel_customer'];
      $rel_description = $value['rel_description'];
      $rel_status = $value['rel_status'];
      
      $hint .= '<tr>
          <td>' . $count . '</td>          
          <td><a href="index.php?page=transaction&subpage=real' . $rel_id . '">' . $rel_id . '</a></td>
          <td>' . $rel_date . '</td>
          <td>' . $rel_supp . '</td>
          <td>' . $rel_description . '</td>
          <td>' . $rel_status . '</td>
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

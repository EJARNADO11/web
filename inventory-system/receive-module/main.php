<span id="search-result">
<h3>Receiving List</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>ID</th>
        <th>Receive Date</th>
        <th>Supplier</th>
        <th> Product Description</th>
        <th>Status</th>
      </tr>
<?php
$count = 1;
if($receive->list_receive() != false){
foreach($receive->list_receive() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=transaction&subpage=receive&action=receive&id=<?php echo $rec_id;?>"><?php echo $rec_id?></a></td>
        <td><?php echo $rec_date_added?></td>
        <td><?php echo $rec_supplier?></td>
        <td><?php echo $rec_description?></td>
        <td><?php if($rec_saved == 0){
            echo "Open Transaction";
          }else{
            echo "Saved Transaction";
          }
          ?>
          </td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>

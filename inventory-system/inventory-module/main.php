<span id="search-result">
<h3>Inventory</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>Product Name </th>
        <th>Received</th>
        <th>Released</th>
        <th>In stock</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($inventory->list_instock() != false){
foreach($inventory->list_instock() as $value){
   extract($value);
  
?>
      <tr>
        <td><a href="index.php?page=settings&subpage=products&action=profile&id=<?php echo $prod_id;?>"><?php echo $prod_name;?></a></td>
        <td style="text-align: center;"><?php echo $inventory->get_product_receive_inv($prod_id);?></td>
        <td style="text-align: center;"><?php echo $inventory->get_product_release_inv($prod_id);?></td>
        <td style="text-align: center;"><?php echo $inventory->get_product_receive_inv($prod_id) - $inventory->get_product_release_inv($prod_id);?></td>
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
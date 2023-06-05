<?php
require_once 'classes/class.product.php';
$product = new Product();

$data = $product->list_product();
$dataPoints = array();
foreach($data as $row) {
    $dataPoints[] = array("label" => $row['prod_name'], "y" => $row['prod_price']);
}
?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title:{
        text: "Revenue Chart of 26th Cafe"
    },
    axisY: {
        title: "Revenue (in PHP)",
        includeZero: true,
        prefix: "₱",
        suffix:  "k"
    },
    data: [{
        type: "bar",
        yValueFormatString: "₱#,##0K",
        indexLabel: "{y}",
        indexLabelPlacement: "inside",
        indexLabelFontWeight: "bolder",
        indexLabelFontColor: "white",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>             

<!DOCTYPE html>
<html>
<head>
  <title>Inventory Chart</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  <canvas id="inventoryChart"></canvas>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: "get_data.php",
        dataType: "json",
        success: function(data) {
          var ctx = document.getElementById('inventoryChart').getContext('2d');
          var inventoryChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: data.map(function(item) {
                return item.product;
              }),
              datasets: [{
                label: 'Inventory',
                data: data.map(function(item) {
                  return item.inventory;
                }),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              },
              legend: {
                display: false
              }
            }
          });
        }
      });
    });
  </script>
</body>
</html>

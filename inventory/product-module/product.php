<!DOCTYPE html>
<html>
    <head>
        <title>26th Cafe Inventory</title>
        <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                    
                    <table id="table">
                        <thead>
                            <th>Product ID &nbsp&nbsp&nbsp</th> 
                            <th>Product Name &nbsp&nbsp&nbsp</th> 
                            <th>Brand &nbsp&nbsp&nbsp</th> 
                            <th>Product Type &nbsp&nbsp&nbsp</th>
                            <th>Price &nbsp&nbsp&nbsp</th>
                            <th>Quantity &nbsp&nbsp&nbsp</th> 
                            <th>Operations &nbsp&nbsp&nbsp</th>  

                        </thead>
                        <tbody>

                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "db_wbapp");

                            $query = "SELECT * FROM tbl_product";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                        <tr>
                                            <td><?= $row['prod_id']; ?></td>
                                            <td><?= $row['product_name']; ?></td>
                                            <td><?= $row['brand']; ?></td>
                                            <td><?= $row['product_type']; ?></td>
                                            <td><?= $row['price']; ?></td>
                                            <td><?= $row['quantity']; ?></td>
                                            <td>    
                                                    <a class="btn-delete" href="product-module/delete.php?prod_id=<?php echo $row['prod_id']; ?>">
                                                        <i class="fa-sharp fa-solid fa-trash"></i></a></td>
                                        </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>
                                        <td colspan="7"No Record Found</td>     
                                    </tr>
                                <?php
                            }
                                        
                            ?>
                        </tbody>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php error_reporting(0);
    $name = $_POST['product_name'];
    $brand = ucfirst($_POST['brand']);
    $type = ucfirst($_POST['product_type']);
    $price = ucfirst($_POST['price']);
    $qty = ucfirst($_POST['quantity']);

    //DB_Connection
    $conn = new mysqli('localhost', 'root', '', 'db_wbapp');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("Insert into tbl_product(product_name, brand,product_type, price, quantity) values(?, ?, ?, ?,? )");
        $stmt->bind_param("ssssi", $name, $brand,$product_type, $price, $qty);
        $stmt->execute();
        echo "Added Successfully";
        $stmt->close();
        $conn->close();
    }
?>
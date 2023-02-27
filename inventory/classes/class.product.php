<?php
class Product{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_wbapp';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_product($product_name,$brand,$product_type,$price,$quantity){
		

		$data = [
			[$product_name,$brand,$product_type,$price,$quantity],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_product (product_name, brand,product_type, price, quantity) VALUES (?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return true;

	}

	public function update_product($product_name,$brand,$product_type,$price,$quantity, $prod_id){
		
		
		$sql = "UPDATE tbl_product SET product_name=:product_name, brand=:brand,product_type=:product_type, price=:price, quantity=:quantity WHERE prod_id=:prod_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':product_name'=>$product_name,':brand'=>$brand, ':product_type'=>$product_type, ':price'=>$price, ':quantity'=>$quantity,
	          ':prod_id'=>$prod_id));
		return true;
	}

	public function list_products(){
		$sql="SELECT * FROM tbl_product";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
    }
}
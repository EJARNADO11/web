<?php
class Product{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='db_file';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_product_type($tname){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$data = [
			[$tname,$NOW,$NOW,'1'],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_type (type_name, type_date_added, type_time_added, type_status) VALUES (?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}

		return $id;

	}

	public function new_product($pname,$desc, $price, $type)
{
    // Setting Timezone for DB
    $timezone = new DateTimeZone('Asia/Manila');
    $now = new DateTime('now', $timezone);
    $now = $now->format('Y-m-d H:i:s');

    $data = [
        [$pname,$desc, $price, '1', $type],
    ];
    $stmt = $this->conn->prepare("INSERT INTO tbl_product(prod_name, prod_description,prod_price, prod_status, type_id) VALUES (?,?,?,?,?)");
    try {
        $this->conn->beginTransaction();
        foreach ($data as $row) {
            $stmt->execute($row);
        }
        $id = $this->conn->lastInsertId();	
        $this->conn->commit();
    } catch (PDOException $e) {
        $this->conn->rollBack();
        throw $e;
    }

    return $id;
}


	public function list_product_type(){
		$sql="SELECT * FROM tbl_type";
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
	public function list_product_search($keyword){
		
		//$keyword = "%".$keyword."%";

		$q = $this->conn->prepare('SELECT * FROM `tbl_product` WHERE `prod_name` LIKE ?');
		$q->bindValue(1, "%$keyword%", PDO::PARAM_STR);
		$q->execute();

		while($r = $q->fetch(PDO::FETCH_ASSOC)){
			$data[]= $r;
		}
		if(empty($data)){
			return false;
		}else{
			return $data;	
		}
	}
	public function list_product(){
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
	public function update_product_img($fname,$id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_product SET prod_image=:prod_image,prod_date_updated=:prod_date_updated,prod_time_updated=:prod_time_updated WHERE prod_id=:prod_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':prod_image'=>$fname, ':prod_date_updated'=>$NOW,':prod_time_updated'=>$NOW,':prod_id'=>$id));
		return true;
	}
	public function list_types(){
		$sql="SELECT * FROM tbl_type";
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
	public function update_product($pname,$desc,$price, $ptype, $id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');

		$sql = "UPDATE tbl_product SET prod_name=:prod_name,prod_description=:prod_description,:prod_price=prod_price,prod_date_updated=:prod_date_updated,prod_time_updated=:prod_time_updated,type_id=:type_id WHERE prod_id=:prod_id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':prod_name'=>$pname, ':prod_description'=>$desc,'
            :prod_price'=>$price,'
			:prod_date_updated'=>$NOW,':prod_time_updated'=>$NOW,':type_id'=>$ptype,':prod_id'=>$id));
		return true;
	}
	public function delete_product($id){
		$sql = "DELETE FROM tbl_product WHERE prod_id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
	function get_prod_id($id){
		$sql="SELECT prod_id FROM tbl_product WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$prod_name = $q->fetchColumn();
		return $prod_name;
	}
	function get_prod_name($id){
		$sql="SELECT prod_name FROM tbl_product WHERE prod_id = :id";
    	$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$prod_name = $q->fetchColumn();
		return $prod_name;
	}
	function get_prod_desc($id){
		$sql="SELECT prod_description FROM tbl_product WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$prod_description = $q->fetchColumn();
		return $prod_description;
	}
	function get_prod_type($id){
		$sql="SELECT type_id FROM tbl_product WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}

	function get_prod_type_name($id){
		$sql="SELECT type_name FROM tbl_type WHERE type_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_name = $q->fetchColumn();
		return $type_name;
	}
	function get_prod_price($id)
	{
		$sql = "SELECT prod_price FROM tbl_product WHERE prod_id = :id";
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$prod_price = $q->fetchColumn();
		return $prod_price;
	}
	function get_prod_image($id){
		$sql="SELECT prod_image FROM tbl_product WHERE prod_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$prod_image = $q->fetchColumn();
		return $prod_image;
	}
}

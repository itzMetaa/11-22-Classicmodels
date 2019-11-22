<?php
class adatbazis{
	public	$servername = "localhost:3307";
	public	$username = "root";
	public	$password = "";
	public	$dbname = "classicmodels";
	public $conn = NULL;
	public $sql = NULL;
	public $result = NULL;
	public $row = NULL;
	
	public function kapcsolodas(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}	
		$this->conn->query("SET NAMES 'UTF8';");
	}

	public function select_by_order_number(){
		if(isset($_GET["input_order_number"]))
		{
			$this->sql = 	"SELECT *
						FROM orders os
						LEFT JOIN orderdetails od ON os.orderNumber = od.orderNumber
						LEFT JOIN products ps ON od.productCode = ps.productCode
						WHERE os.orderNumber ='".$_GET["input_order_number"]."'";
			$this->result = $this->conn->query($this->sql);
			if ($this->result->num_rows > 0) {
				while($this->row = $this->result->fetch_assoc()) {
					echo "<p>";
						echo $this->row["productName"] . " ";
						echo $this->row["orderNumber"] . " ";
						echo $this->row["shippedDate"] . " ";
						echo $this->row["requiredDate"] . " ";
						echo $this->row["status"] . " ";
						echo $this->row["quantityOrdered"] . " ";
						echo $this->row["priceEach"] . " ";
						
						echo "<form method='POST'>";
						echo "</form>";
					echo "</p>";
				}
			} else {
				echo "No results";
			}		
		}
		
	}
	public function kapcsolat_bontas(){
		$this->conn->close();
	}
}
?>
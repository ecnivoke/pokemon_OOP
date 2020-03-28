<?php 

class Database {

	// define properties
	private $connection;
	private $servername;
	private $database_name;
	private $username;
	private $password;

	public function __construct($conf){

		$this->servername 		= $conf['servername'];
		$this->database_name 	= $conf['database_name'];
		$this->username 		= $conf['username'];
		$this->password 		= $conf['password'];
		$this->connection 		= $this->connect();	
	}

	private function connect(){
		// Define connection
		$conn = '';

		// Make connection
		try {
		    $conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->database_name, $this->username, $this->password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		// Connection failed
		catch(PDOException $e) {
		    echo "Connection failed: " . $e->getMessage();
		}

		// Return connection
		return $conn;
	}

	public function getRows($sql){

		// Prepare SQL query
		$query = $this->connect()->prepare($sql);

		// Execute SQL query
		$query->execute();

		// Fetch results
		$results = $query->fetchAll();

		// Output
		return $results;
	}

	public function insert($table, $values){

		// Build SQL
		$sql = "INSERT INTO ";
		$sql .= '`'.$table.'`';
		$sql .= " VALUES(NULL";

		// Set values
		foreach($values as $value){
			// Check for int
			if(is_numeric($value)){
				$sql .= ",".$value;
			}
			else {
				$sql .= ",'".$value."'";
			}

		}

		// End of sql
		$sql .= ");";

		// Prepare SQL query
		$query = $this->connect()->prepare($sql);

		// Execute SQL query
		$query->execute();
	}

}


 ?>
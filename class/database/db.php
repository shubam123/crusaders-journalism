<?php #this script contains the class for database connection and passing queries ?>
<?php
	class Database
	{
		public $host;
		public $user;
		public $password;
		public $database;
		public $connection;

		function __construct()
		{
			switch($_SERVER['HTTP_HOST'])
			{
				case "localhost:8080":
					$this->host="localhost";
					$this->user="root";
					$this->password="1q2w3e";
					$this->database="crusaders";
				break;
				case "":
				case "":
					$this->host="ec2-52-66-4-99.ap-south-1.compute.amazonaws.com";
					$this->user="shubam01";
					$this->password="1q2w3e";
					$this->database="crusaders";
				break;
				
			}
		}

		//function to connect to database	
		function connect()
		{
			$this->connection=mysqli_connect($this->host,$this->user,$this->password,$this->database) or die(mysql_error());
			//mysql_select_db() or die(mysql_error());
		}

		//function to insert data in database
		function makeQuery($insertQuery)
		{
			return mysqli_query($this->connection,$insertQuery);
		}
		

		//function to disconnect the current connection from database
		function disconnect()
		{
			mysqli_close($this->connection);
		}
	}
	 
?>

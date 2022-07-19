<?php
	include_once 'Config.php';
	class Database extends Config{
		private $dsn;
		private $stmt;
		private $error;

		public function __construct(){
			$config  = new Config();
			$dsn     = 'mysql:host='.$config->hostname.'; dbname='.$config->dbname;
			$options = [
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			];

			try{
				$this->dsn = new PDO($dsn, $config->username, $config->password);
			}catch(PDOException $e){
				$this->error = $e->getMessage();
				echo $this->error;
			}
		}

		public function query($query){
			$this->stmt = $this->dsn->prepare($query);
		}

		public function bind($param, $value, $type = null){
			if(is_null($type)){
				switch(true){
					case is_int($value):
						$type = PDO::PARAM_INT;
						break;
					case is_bool($value):
						$type = PDO::PARAM_BOOL;
						break;
					case is_null($value):
						$type = PDO::PARAM_NULL;
						break;
					default:
						$type = PDO::PARAM_STR;
				}
			}
			$this->stmt->bindValue($param,$value,$type);
		}

		public function execute(){
			return $this->stmt->execute();
		}

		public function resultSet(){
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		public function single(){
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_ASSOC);
		}

		public function rowCount(){
			return $this->stmt->rowCount();	
		}
	}

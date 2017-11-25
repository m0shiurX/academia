<?php
	class Semister
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}
		public function exists( $name ){
			$request = $this->dbh->prepare("SELECT name FROM semisters WHERE name = ?");
			$request->execute([$name]);
			$semisterData = $request->fetchAll();
			return sizeof($semisterData) != 0;
		}
        
        public function addSemister($name){
			$request = $this->dbh->prepare("INSERT INTO semisters (name) VALUES(?)");
			return $request->execute([$name]);
		}
		
		public function fetchSemisters($limit = 10){
			$request = $this->dbh->prepare("SELECT * FROM semisters  ORDER BY id  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchSemisterByID($id){
			$request = $this->dbh->prepare("SELECT * FROM semisters  WHERE id = ?  LIMIT 1");
			if ($request->execute([$id])) {
				return $request->fetch();
			}
			return false;
		}
		
		public function updateSemister($id, $name){
			$request = $this->dbh->prepare("UPDATE semisters SET name =? WHERE id =?");
			return $request->execute([$name, $id]);
		}

		public function deleteSemister($id){
			$request = $this->dbh->prepare("DELETE FROM semisters WHERE id = ?");
			return $request->execute([$id]);
		}
    }
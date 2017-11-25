<?php
	class Notebook
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}
		public function exists( $name ){
			$request = $this->dbh->prepare("SELECT name FROM notebook WHERE name = ?");
			$request->execute([$name]);
			$semisterData = $request->fetchAll();
			return sizeof($semisterData) != 0;
		}
        
        public function addNotebook($name){
			$request = $this->dbh->prepare("INSERT INTO notebook (name) VALUES(?)");
			return $request->execute([$name]);
		}
		
		public function fetchNotebooks($limit = 100){
			$request = $this->dbh->prepare("SELECT * FROM notebook  ORDER BY id  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchNotebookById($id){
			$request = $this->dbh->prepare("SELECT * FROM notebook WHERE account_id = ? ORDER BY id");
			if ($request->execute([$id])) {
				return $request->fetchAll();
			}
			return false;
		}
		
		public function updateNotebook($id, $note){
			$request = $this->dbh->prepare("UPDATE notebook SET note =? WHERE id =?");
			return $request->execute([$note, $id]);
		}

		public function deleteSubject($id){
			$request = $this->dbh->prepare("DELETE FROM notebook WHERE id = ?");
			return $request->execute([$id]);
		}
    }
<?php
	class Subject
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}
		public function exists( $name ){
			$request = $this->dbh->prepare("SELECT name FROM subjects WHERE name = ?");
			$request->execute([$name]);
			$semisterData = $request->fetchAll();
			return sizeof($semisterData) != 0;
		}
        
        public function addSubject($semister_id, $name){
			$request = $this->dbh->prepare("INSERT INTO subjects (semister_id, name) VALUES(?,?)");
			return $request->execute([$semister_id, $name]);
		}
		
		public function fetchSubjects($limit = 100){
			$request = $this->dbh->prepare("SELECT * FROM subjects  ORDER BY id  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchSubjectById($id){
			$request = $this->dbh->prepare("SELECT name FROM subjects  WHERE id = ?");
			if ($request->execute([$id])) {
				return $request->fetch();
			}
			return false;
		}
		public function fetchSubjectsBySemister($semister_id){
			$request = $this->dbh->prepare("SELECT * FROM subjects WHERE semister_id = ? ORDER BY id");
			if ($request->execute([$semister_id])) {
				return $request->fetchAll();
			}
			return false;
		}
		
		public function updateSubject($id, $name){
			$request = $this->dbh->prepare("UPDATE subjects SET name =? WHERE id =?");
			return $request->execute([$name, $id]);
		}

		public function deleteSubject($id){
			$request = $this->dbh->prepare("DELETE FROM subjects WHERE id = ?");
			return $request->execute([$id]);
		}
    }
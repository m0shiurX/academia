<?php
	class Answer
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}
		public function exists( $name ){
			$request = $this->dbh->prepare("SELECT name FROM answers WHERE name = ?");
			$request->execute([$name]);
			$semisterData = $request->fetchAll();
			return sizeof($semisterData) != 0;
		}
        
        public function addAnswer($semister_id, $name){
			$request = $this->dbh->prepare("INSERT INTO answers (semister_id, name) VALUES(?,?)");
			return $request->execute([$semister_id, $name]);
		}
		
		public function fetchAnswer($id){
			$request = $this->dbh->prepare("SELECT * FROM answers  WHERE q_id = ?");
			if ($request->execute([$id])) {
				return $request->fetch();
			}
			return false;
		}
		public function fetchQbychapter($chapter_id){
			$request = $this->dbh->prepare("SELECT * FROM answers WHERE chapter_id = ? ORDER BY id");
			if ($request->execute([$chapter_id])) {
				return $request->fetchAll();
			}
			return false;
		}
		
		public function updateQuestion($id, $name){
			$request = $this->dbh->prepare("UPDATE answers SET name =? WHERE id =?");
			return $request->execute([$name, $id]);
		}

		public function deleteQuestion($id){
			$request = $this->dbh->prepare("DELETE FROM answers WHERE id = ?");
			return $request->execute([$id]);
		}
    }
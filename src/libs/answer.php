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
        public function addAnswer($q_id, $data, $author){
			$request = $this->dbh->prepare("INSERT INTO answers (q_id, answer, answered_by) VALUES(?,?,?)");
			return $request->execute([$q_id, $data, $author]);
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
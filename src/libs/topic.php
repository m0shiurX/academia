<?php
	class Topic
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}
		public function exists( $name ){
			$request = $this->dbh->prepare("SELECT name FROM topics WHERE name = ?");
			$request->execute([$name]);
			$semisterData = $request->fetchAll();
			return sizeof($semisterData) != 0;
		}
        
		public function addTopic($subject_id, $chapter_id, $name, $description){
			$request = $this->dbh->prepare("INSERT INTO topics (subject_id, chapter_id, name, description) VALUES(?, ?, ?, ?)");
			return $request->execute([$subject_id, $chapter_id, $name, $description]);
		}
		
		public function fetchTopic($limit = 10){
			$request = $this->dbh->prepare("SELECT * FROM topics  ORDER BY id  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchTopicByChapter($chapter_id){
			$request = $this->dbh->prepare("SELECT * FROM topics WHERE chapter_id = ? ORDER BY id");
			if ($request->execute([$chapter_id])) {
				return $request->fetchAll();
			}
			return false;
		}
		
		public function updateChapter($id, $chapter_id, $name){
			$request = $this->dbh->prepare("UPDATE topics SET chapter_id = ?, name = ? WHERE id =?");
			return $request->execute([$chapter_id, $name, $id]);
		}

		public function deleteChapter($id){
			$request = $this->dbh->prepare("DELETE FROM topics WHERE id = ?");
			return $request->execute([$id]);
		}
    }
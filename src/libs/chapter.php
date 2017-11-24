<?php
	class Chapter
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}
		public function exists( $name ){
			$request = $this->dbh->prepare("SELECT name FROM chapters WHERE name = ?");
			$request->execute([$name]);
			$semisterData = $request->fetchAll();
			return sizeof($semisterData) != 0;
		}
        
        public function addSubjcet($name){
			$request = $this->dbh->prepare("INSERT INTO chapters (chapter_id, name) VALUES(?, ?)");
			return $request->execute([$chapter_id, $name]);
		}
		
		public function fetchChapters($limit = 10){
			$request = $this->dbh->prepare("SELECT * FROM chapters  ORDER BY id  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchChapterBySubject($subject_id){
			$request = $this->dbh->prepare("SELECT * FROM chapters WHERE subject_id = ? ORDER BY id");
			if ($request->execute([$subject_id])) {
				return $request->fetchAll();
			}
			return false;
		}
		
		public function updateChapter($id, $chapter_id, $name){
			$request = $this->dbh->prepare("UPDATE chapters SET chapter_id = ?, name = ? WHERE id =?");
			return $request->execute([$chapter_id, $name, $id]);
		}

		public function deleteChapter($id){
			$request = $this->dbh->prepare("DELETE FROM chapters WHERE id = ?");
			return $request->execute([$id]);
		}
    }
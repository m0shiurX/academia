<?php
	class Question
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}
		public function exists( $name ){
			$request = $this->dbh->prepare("SELECT name FROM questions WHERE name = ?");
			$request->execute([$name]);
			$semisterData = $request->fetchAll();
			return sizeof($semisterData) != 0;
		}
        
        public function addQuestion($subject, $chapter, $topic, $article_id, $questioned_by, $data){
			$request = $this->dbh->prepare("INSERT INTO questions (subject_id, chapter_id, topic_id, article_id, questioned_by, question) VALUES(?,?,?,?,?,?)");
			return $request->execute([$subject, $chapter, $topic, $article_id, $questioned_by, $data]);
		}
		
		public function fetchQuestions($limit = 100){
			$request = $this->dbh->prepare("SELECT * FROM questions  ORDER BY id  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchQuestionById($id){
			$request = $this->dbh->prepare("SELECT name FROM questions  WHERE id = ?");
			if ($request->execute([$id])) {
				return $request->fetch();
			}
			return false;
		}
		public function fetchQbychapter($chapter_id){
			$request = $this->dbh->prepare("SELECT * FROM questions WHERE chapter_id = ? ORDER BY id");
			if ($request->execute([$chapter_id])) {
				return $request->fetchAll();
			}
			return false;
		}
		
		public function updateQuestion($id, $name){
			$request = $this->dbh->prepare("UPDATE questions SET name =? WHERE id =?");
			return $request->execute([$name, $id]);
		}

		public function deleteQuestion($id){
			$request = $this->dbh->prepare("DELETE FROM questions WHERE id = ?");
			return $request->execute([$id]);
		}
    }
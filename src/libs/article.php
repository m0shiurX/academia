<?php
	class Article
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}
		public function exists( $name ){
			$request = $this->dbh->prepare("SELECT name FROM articles WHERE name = ?");
			$request->execute([$name]);
			$semisterData = $request->fetchAll();
			return sizeof($semisterData) != 0;
		}
        
        public function addArticle($subject, $chapter, $author, $name, $data){
			$request = $this->dbh->prepare("INSERT INTO articles (subject_id, chapter_id, author_id, name, data) VALUES(?, ?, ?, ?, ?)");
			return $request->execute([$subject, $chapter, $author, $name, $data]);
		}
		
		public function fetchArticle($limit = 10){
			$request = $this->dbh->prepare("SELECT * FROM articles  ORDER BY id  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchArticleByID($id){
			$request = $this->dbh->prepare("SELECT * FROM articles WHERE  id = ?");
			if ($request->execute([$id])) {
				return $request->fetch();
			}
			return false;
		}
		public function fetchArticleByAccountID($id){
			$request = $this->dbh->prepare("SELECT * FROM articles WHERE  author_id = ?");
			if ($request->execute([$id])) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchArticleByTopic($topic_id){
			$request = $this->dbh->prepare("SELECT * FROM articles WHERE  topic_id = ? ORDER BY id");
			if ($request->execute([$topic_id])) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchArticleByChapter($topic_id){
			$request = $this->dbh->prepare("SELECT * FROM articles WHERE  chapter_id = ? ORDER BY id");
			if ($request->execute([$topic_id])) {
				return $request->fetchAll();
			}
			return false;
		}
		
		public function updateArticle($id, $chapter_id, $name){
			$request = $this->dbh->prepare("UPDATE articles SET chapter_id = ?, name = ? WHERE id =?");
			return $request->execute([$chapter_id, $name, $id]);
		}

		public function deleteArticle($id){
			$request = $this->dbh->prepare("DELETE FROM articles WHERE id = ?");
			return $request->execute([$id]);
		}
    }
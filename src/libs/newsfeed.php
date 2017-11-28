<?php
	class Newsfeed
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}
        public function addNews($account_id, $article_id){
			$request = $this->dbh->prepare("INSERT INTO newsfeed (account_id, article_id) VALUES(?,?)");
			return $request->execute([$account_id, $article_id]);
		}
		
		public function fetchNews($limit = 10){
			$request = $this->dbh->prepare("SELECT * FROM newsfeed  ORDER BY id DESC LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
        }
        
		public function fetchNewsByTeacher($role){
			$request = $this->dbh->prepare("SELECT name FROM newsfeed  WHERE role = ?");
			if ($request->execute([$role])) {
				return $request->fetch();
			}
			return false;
		}
		public function fetchNewsBySemister($semister_id){
			$request = $this->dbh->prepare("SELECT * FROM newsfeed WHERE semister_id = ? ORDER BY id");
			if ($request->execute([$semister_id])) {
				return $request->fetchAll();
			}
			return false;
		}

		public function deleteNews($id){
			$request = $this->dbh->prepare("DELETE FROM newsfeed WHERE id = ?");
			return $request->execute([$id]);
		}
    }
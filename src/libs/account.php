<?php
	class Account
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}

		public function login($user_name, $user_pwd){
			$request = $this->dbh->prepare("SELECT username, password FROM accounts WHERE username = ?");
	        if($request->execute( array($user_name) ))
	        {
	        	$data = $request->fetchAll();
	        	$data = $data[0];
	        	return session::passwordMatch($user_pwd, $data->password) ? true : false;
	        }else{
	        	return false;
	        }
		}

		public function exists( $user_name ){
			$request = $this->dbh->prepare("SELECT username FROM accounts WHERE user_name = ?");
			$request->execute([$user_name]);
			$Admindata = $request->fetchAll();
			return sizeof($Admindata) != 0;
		}

		public function ArepasswordSame( $user_pwd1, $user_pwd2 ){
			return strcmp( $user_pwd1, $user_pwd2 ) == 0;
        }
        
        public function addAccount($fullname, $username, $password, $contact, $address, $role, $gender){
			$request = $this->dbh->prepare("INSERT INTO accounts (fullname, username, password, contact, address, role, gender) VALUES(?,?,?,?,?,?,?)");
			return $request->execute([$fullname, $username, session::hashPassword($password), $contact, $address, $role, $gender]);
		}
		
		public function fetchAllAccounts($limit = 10){
			$request = $this->dbh->prepare("SELECT * FROM accounts where status = 1  ORDER BY id DESC  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchAllStudents($limit = 10){
			$request = $this->dbh->prepare("SELECT * FROM accounts where status = 1 AND role='student'  ORDER BY id DESC  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetchAllTeachers($limit = 10){
			$request = $this->dbh->prepare("SELECT * FROM accounts where status = 1 AND role='teacher'  ORDER BY id DESC  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		
		public function fetchAccountDetails($username){
			$request = $this->dbh->prepare("SELECT * FROM accounts  where username = ? AND status = 1 LIMIT 1");
			if ($request->execute([$username])) {
				return $request->fetch();
			}
			return false;
		}

		public function updateAccount($id, $user_name, $email, $full_name, $address, $contact){
			$request = $this->dbh->prepare("UPDATE accounts SET username =?, email =?, fullname =?, address= ?, contact =? WHERE user_id =?");
			return $request->execute([$user_name, $email, $full_name, $address, $contact, $id]);
		}

		public function deleteAdmin($id){
			$request = $this->dbh->prepare("DELETE FROM accounts WHERE id = ?");
			return $request->execute([$id]);
		}
    }
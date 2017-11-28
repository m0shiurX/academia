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
		public function fetchAccountByID($id){
			$request = $this->dbh->prepare("SELECT * FROM accounts WHERE id = ?");
			if ($request->execute([$id])) {
				return $request->fetch();
			}
			return false;
		}
		public function fetcStudentsbySemister($semister_id){
			$request = $this->dbh->prepare("SELECT COUNT(*) as studentsNumber FROM accounts WHERE role = 'student' and status = 1 and semister_id = ?");
			if ($request->execute([$semister_id])) {
				return $request->fetch();
			}
			return false;
		}
		public function fetcStudentsInfobySemister($semister_id){
			$request = $this->dbh->prepare("SELECT id, fullname, address, contact, gender  FROM accounts WHERE role = 'student' and status = 1 and semister_id = ?");
			if ($request->execute([$semister_id])) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetcDeactivatedStudents(){
			$request = $this->dbh->prepare("SELECT id, fullname, address, contact, gender  FROM accounts WHERE role = 'student' and status = 0");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function fetcDeactivatedTeachers(){
			$request = $this->dbh->prepare("SELECT id, fullname, address, contact, gender  FROM accounts WHERE role = 'teacher' and status = 0");
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

		public function updateStudentSemister($new_semister, $present_semister){
			$request = $this->dbh->prepare("UPDATE accounts SET semister_id = ? WHERE semister_id = ? AND status = 1 AND role = 'student'");
			return $request->execute([$new_semister, $present_semister]);
		}
		public function activateStudent($id){
			$request = $this->dbh->prepare("UPDATE accounts SET status = 1, semister_id = 1 WHERE id = ? AND role = 'student'");
			return $request->execute([$id]);
		}
		public function activateTeacher($id){
			$request = $this->dbh->prepare("UPDATE accounts SET status = 1, semister_id = 0 WHERE id = ? AND role = 'teacher'");
			return $request->execute([$id]);
		}

		public function deleteAdmin($id){
			$request = $this->dbh->prepare("DELETE FROM accounts WHERE id = ?");
			return $request->execute([$id]);
		}
    }
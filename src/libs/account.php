<?php
	class Account
	{
		private $dbh = null;

		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}

		public function loginAdmin($user_name, $user_pwd)
		{
			$request = $this->dbh->prepare("SELECT name, password FROM accounts WHERE name = ?");
	        if($request->execute( array($user_name) ))
	        {
	        	$data = $request->fetchAll();
	        	$data = $data[0];
	        	return session::passwordMatch($user_pwd, $data->password) ? true : false;
	        }else{
	        	return false;
	        }

		}
		public function adminExists( $user_name )
		{
			$request = $this->dbh->prepare("SELECT user_name FROM kp_dist WHERE user_name = ?");
			$request->execute([$user_name]);
			$Admindata = $request->fetchAll();
			return sizeof($Admindata) != 0;
		}
		public function ArepasswordSame( $user_pwd1, $user_pwd2 )
		{
			return strcmp( $user_pwd1, $user_pwd2 ) == 0;
        }
        

        public function addNewAdmin($user_name, $user_pwd, $email, $full_name, $address, $contact)
		{
			$request = $this->dbh->prepare("INSERT INTO kp_user (user_name, user_pwd, email, full_name, address, contact) VALUES(?,?,?,?,?,?) ");
			return $request->execute([$user_name, session::hashPassword($user_pwd), $email, $full_name, $address, $contact]);
		}
		public function fetchAdmin($limit = 10)
		{
			$request = $this->dbh->prepare("SELECT * FROM kp_user  ORDER BY user_id DESC  LIMIT $limit");
			if ($request->execute()) {
				return $request->fetchAll();
			}
			return false;
		}
		public function updateAdmin($id, $user_name, $email, $full_name, $address, $contact)
		{
			$request = $this->dbh->prepare("UPDATE kp_user SET user_name =?, email =?, full_name =?, address= ?, contact =? WHERE user_id =?");
			return $request->execute([$user_name, $email, $full_name, $address, $contact, $id]);
		}
		public function deleteAdmin($id)
		{
			$request = $this->dbh->prepare("DELETE FROM kp_user WHERE user_id = ?");
			return $request->execute([$id]);
		}
    }
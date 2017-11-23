<?php

	class Commons
	{

		private $dbh = null;
		public function __construct($db)
		{
			$this->dbh = $db->dbh;
		}

	    public function isAvailableuser_name($user_name)
	    {
	        $request = $this->dbh->prepare("SELECT user_name FROM kp_user WHERE user_name = ?");
	        return $request->execute( array($user_name) );
	    }

	    public function isFieldEmpty($field)
	    {
	    	if ( isset($field) && ( empty($field) || trim($field)  == '' ) )
	    	{
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }

	    public function redirectTo($url)
	    {
	    	if (!headers_sent())
	    	{
	    		header('location:'.$url);
	    		exit;
	    	}else{
	    		print '<script type="text/javascript">';
	            print 'window.location.href="'.$url.'";';
	            print '</script>';

	            print '<noscript>';
	            print '<meta http-equiv="refresh" content="0;url='.$url.'" />';
	            print '</noscript>'; exit;
	    	}
	    }
	}
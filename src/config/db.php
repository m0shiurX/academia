<?php

        class Dbconnect extends PDO
        {
            private $dbengine   = 'mysql';
            private $dbhost     = 'localhost';
            private $dbuser     = 'root';
            private $dbpassword = '';
            private $dbname     = 'academia';

        	public $dbh = null;

        	function __construct()
        	{
        		try{
	                $this->dbh = new PDO("".$this->dbengine.":host=$this->dbhost; dbname=$this->dbname", $this->dbuser, $this->dbpassword);
	                $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                    $this->dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, FALSE);
	            }
	            catch (PDOException $e){
	                $e->getMessage();
	            }
        	}


        }

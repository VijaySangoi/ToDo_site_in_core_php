<?php

namespace DbConn;
use \PDO;
require_once "../constant/constants.php";



class DataBase{
	private $conn;
	function __construct()
	{
		#$this->conn=new mysqli(sn_name,us_name,pass);
		try{
			#$this->conn=new mysqli(sn_name,us_name,pass,db);
			$tt="mysql:host=".sn_name.";dbname=".db;
			$this->conn = new PDO($tt, us_name, pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			#echo "connected successfully";
			#var_dump($this->conn);
			}
	    catch(Exception $e)
	        {
	        echo "failed";
	        }
    }
    function exec_con($sql)
    {
        try {
            $this->conn->exec($sql);
        }
        catch (Exception $e)
        {
            echo $e;
        }

    }
    function execute_con($sql)
    {
        $out = $this->conn->prepare($sql);
        $out->execute();
        return $out;
    }
    function ret_con()
    {
		return $this->conn;
	}
	function close_con(){
		$this->conn->close();
	}
}



?>
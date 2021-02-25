<?php

namespace QXB;
require_once "../autoload.php";

use DXB\DataBase as DataBase ;
use \PDO;


class Query
{
	private $y;
	private $z;
	private $sql;


	function __construct()
	{
		
		$this->y=new Database();

	}
	public function updateConditionTB($upd,$clname1,$value1)
	{
	$sql=" UPDATE ".tb." SET ".$upd." WHERE ".$clname1." = ".$value1 ;
	$this->y->execute_con($this->sql);


	}

	function insert_table($query1,$query2)
	{
        $this->sql="INSERT INTO test_table ".$query1." VALUES ".$query2;
        $this->y->exec_con($this->sql);

	}
		function insert_user($query)
        {
            $this->sql="INSERT INTO ".ub." (user_name,pass_word) VALUES ".$query;
		    $this->y->exec_con($this->sql);

		}
	
	function update_table($query1,$query2){
		$this->sql="UPDATE ".tb." SET ".$query1." WHERE ".$query2;
		$this->y->execute_con($this->sql);

	}
	function select_table($p1,$p2){
		
		$this->sql="SELECT * FROM ".tb." WHERE user_ID = '".$p1."' AND Is_Completed = '".$p2."'";
		$out=$this->y->execute_con($this->sql);
        $out->setFetchMode(PDO::FETCH_ASSOC);
        return($out->fetchAll());

		#$v=$out->fetchAll();
		#return $v;
	}
	function select_ub($param)
	{
		
		$this->sql="SELECT * FROM ".ub." WHERE user_name= ".$param;
		#echo $this->sql;
        $out=$this->y->execute_con($this->sql);
		$out->setFetchMode(PDO::FETCH_ASSOC);
		return($out->fetchAll());
		#return $v;
	}
	function get_mail($p1)
    {

    #echo 'reached here';
        $this->sql="SELECT email FROM ".tb." WHERE user_ID = ".$p1;
        $out=$this->y->execute_con($this->sql);
        $out->setFetchMode(PDO::FETCH_ASSOC);
        $x=$out->fetchAll();
        $y= $x[0]['email'];
        #var_dump($y);
        return($y);

        #return($out->setFetchMode(PDO::FETCH_All));*/

    }
}

?>
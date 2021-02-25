<?php
namespace auth;
session_start();
require_once "../database/Query.php";

use Query\QueryBase as qb;

class auth
{

    private $q;
    private $un;
    private $pw;
    function __construct($un,$pw)
    {

        $this->q = new qb();
        $this->un=$_POST['username'];
        $this->pw=$_POST['pass'];
    }
    function auth()
    {   $sign=false;
        $zx = $this->q->select_ub("'" . $this->un . "'");
        for ($i = 0; $i < count($zx); $i++) {
            #echo ' dbid='.$zx[$i]['user_name']." dbpass=".$zx[$i]['pass_word'];
            #echo " id= ".$user_name." pass=".$pass_word;
            if ($zx[$i]['user_name'] == $this->un && $zx[$i]['pass_word'] == $this->pw)
            {
                $_SESSION['UID'] = $zx[$i]['ID'];
                $this->un=NULL;
                $this->pw=NULL;
                $sign=true;

            }
        }

        return $sign;
    }
}
?>
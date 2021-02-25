<?php

namespace Axb;
use QXB\Query as Query;

require_once "../autoload.php";

#$uid=NULL;
class auth
{

    private $q;
    private $un;
    private $pw;
    public static $uid;
    function __construct()
    {

        $this->q = new Query();

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
                $uid=$_SESSION['UID'];
                $this->un=NULL;
                $this->pw=NULL;
                $sign=true;
            }
        }

        return $sign;
    }
    public static function ret_uid()
    {
    return $_SESSION['UID'];
    }

}

?>
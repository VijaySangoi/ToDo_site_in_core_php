<?php

session_start();

require_once "../autoload.php";

use QXB\Query  as Query;
use Axb\auth as auth;


class loginController{
    public $q;

    function __construct()
    {

        $this->q = new Query();
    }
    function sign_in()
    {

        $aut=new auth($_POST['username'],$_POST['pass']);
        $divert=$aut->auth();
        if($divert==true){

            header('Location:../html/Front.php');
            #require_once "../html/Front.php";
        }
        else{
            header('Location:../html/Login.php');
            #require_once  "../html/Login.php";
        }
    }

    function create_user()
    {
        $x = "('" . $_POST['username1'] . "',' " . $_POST['pass1'] . "')";
        #echo $x;
        $this->q->insert_user($x);
        require_once "../html/Login.php";
    }
}
$lg = new loginController();


if (isset($_POST['createuser'])) {
    #echo"creating new user";
    $lg->create_user();
    header('Location:../html/Login.php');
}
elseif (isset($_POST['sign-in'])) {
    $lg->sign_in();
    #echo "reached @ sign-in";

} elseif (isset($_POST['sign-up'])) {
    #echo "reached @ sign-up";
    header('Location:../html/sign-up.php');
    #require_once '../html/sign-up.php';
}
?>
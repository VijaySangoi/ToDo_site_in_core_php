<?php
namespace master;

session_start();
require_once "../autoload.php";


use awsx\exmail;
use Axb\auth;

use QXB\Query as Query;


class masterController
{
    public $msg;
    public $q;
    public $em;

    #public $flg='test string';
    function __construct()
    {

        $this->em=new exmail();
        $this->q = new Query();

    }

    function send_data()
    {
        #echo "send_data";
        $str = $_POST["task"];
        $time_critical = $_POST["time"];
        $time_now = date('Y-m-d H:i:s');
        #echo $time_now;
        $time_critical = str_replace("T", " ", $time_critical);


        if ($time_critical !== "") {
            $ITS = 1;
            $time_critical = $time_critical . ":00";
        } else {
            $ITS = 0;
        }
        $colm = "(user_ID,Task,add_date,IsTimeSensitive,deadline)";
        $values = "( '" . $_SESSION['UID']. "','" . $str . "','" . $time_now . "'," . $ITS . ",'" . $time_critical . "')";


        try {
            $this->q->insert_table($colm, $values);
            try {
                $msg = wordwrap($str, 10);
                $maeil=$this->q->get_mail($this->uid);
                $this->msg=$maeil;
                $this->em->eemail([$maeil],'new task added',$msg);
            } catch (Exception $e) {
                echo $e;
            }
        } catch (Exception $f) {
            echo $f;
        }


    }

    function update_data($x)
    {


        $str1 = 'Is_Completed=1,completed_on="' . date('Y-m-d H:i:s') . '"';
        $str2 = 'ID=' . $x;
        $maeil=$this->q->get_mail($x);
        $this->msg=$maeil;
        $this->em->eemail([$maeil],'task completed','updated');
        $this->q->update_table($str1, $str2);
        #echo 'reached here';

    }

    function reset_data($x)
    {


        $str1 = 'Is_Completed=0,completed_on="0000-00-00 00:00:00"';
        $str2 = 'ID=' . $x;
        $this->q->update_table($str1, $str2);
        $maeil=$this->q->get_mail($x);
        $this->msg=$maeil;
        $this->em->eemail([$maeil],'task reset','reset');
        #echo 'reached here';

    }

    function get_data($UID, $param, $mark)
    {

        $v = $this->q->select_table($UID, $param);
        $z = count($v);

        for ($i = 0; $i < $z; $i++) {

            $id = $v[$i]['ID'];
            $name = $v[$i]['TASK'];
            echo "<form action='../controller/Front_Controller.php' method='post'>
			<div class='container' style='height:50px;width=100%;margin:1px;'>
			 <input type='hidden' name= 'id' value=" . $id . ">
				<button type='submit' name=" . $mark . " style='border:none;background-color:#303030;height:50px;width:100%;'class='btn btn-dark'>
				" . $name . "
			 </button>
			</div>
			</form>";
        }
    }
}
#echo
#$ax= new auth();

if ($_SESSION['UID']==NULL)
{
    header('Location:../html/Login.php');
}
else{
    $control = new masterController($_SESSION['UID']/*$ax->ret_uid()*/);
}


if (isset($_POST['markcompleted']))
{
    #echo'mark completed';
    $x = $_POST['id'];
    $control->update_data($x);

    echo '<div>reached markcompleted</div>';
    #echo $_SESSION['UID'];
    header('Location:../html/Front.php');
    #require_once '../html/Front.php';
}
elseif (isset($_POST['deleted']))
{
    #echo 'deleted';
    $x = $_POST['id'];
    $control->reset_data($x);

    echo '<div>reached deleted</div>';
    #echo $_SESSION['UID'];
    header('Location:../html/Front.php');
    #require_once '../html/Front.php';

}elseif (isset($_POST['submit']))
{
    #echo'reached here';
    $control->send_data();

    header('Location:../html/Front.php');
    #require_once 'html/Front.php';
}elseif(isset($_POST['Logout']))
{
   session_destroy();
   header('Location:../html/Login.php');
}

?>
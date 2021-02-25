
<?php
require_once "constant/constants.php";
require_once "database/Query.php";
require_once "database/DbConn.php";
session_start();
class masterController
{
	public $q;

	function __construct($UID)
	{
		$this->q=new QueryBase();
		$_SESSION['UID']=$UID;
	}
	function send_data()
	{
	#echo "send_data";
 	$str = $_POST["task"];
 	$time_critical = $_POST["time"];
 	$time_now=date('Y-m-d H:i:s');
 	#echo $time_now;
 	$time_critical=str_replace("T"," ", $time_critical);
 	#$str=str_replace('"','\"',$str);
 	#echo $str;die();

 	#Create_TB($conn);
 	#$time_critical=date('Y-m-d H:i:s',$time_critical);

 	if ($time_critical!=="")
 	{
 		$ITS=1;
 		$time_critical=$time_critical.":00";
 	}
 	else{
 		$ITS=0;
 	}
 	$colm="(user_ID,Task,add_date,IsTimeSensitive,deadline)";
 	$values="( '".$_SESSION['UID']."','".$str."','".$time_now."',".$ITS.",'".$time_critical."')";
 	

 	try{
 		$this->q->insert_table($colm,$values);
 		try{
 			$msg=wordwrap($str,10);
 			#mail("vijaysangoi29@gmail.com","New task added",$str); 	
 			}
 		catch(Exception $e)
 			{
 			echo $e;
 			}
 		}
 	catch(Exception $f)
 		{
 			echo $f;
 		}


	}
	function update_data($x)
	{
		
	$str1='Is_Completed=1,completed_on="'.date('Y-m-d H:i:s').'"';
	$str2='ID='.$x;
	
	$this->q->update_table($str1,$str2);

	}
	function reset_data($x)
	{
		$str1='Is_Completed=0,completed_on="0000-00-00 00:00:00"';
		$str2='ID='.$x;
	    $this->q->update_table($str1,$str2);



	}
	function get_data($UID,$param,$mark)
	{

		$v=$this->q->select_table($UID,$param);
		$z=count($v);
		
		for ($i=0;$i<$z;$i++)
		{

			$id=$v[$i]['ID'];
			$name=$v[$i]['TASK'];
			echo "<form action='Index.php' method='post'>
			<div class='container' style='height:50px;width=100%;margin:1px;'>
			 <input type='hidden' name= 'id' value=".$id.">
				<button type='submit' name=".$mark." style='border:none;background-color:#303030;height:50px;width:100%;'class='btn btn-dark'>
				".$name."
			 </button>
			</div>
			</form>";
			
		}
		
	}
	function sign_in()
	{
	    $sign=0;
        $user_name= $_POST['username'];
        $pass_word= $_POST['pass'];
        $zx=$this->q->select_ub("'".$user_name."'");
        #echo'<pre>';
        #var_dump($zx);
        #echo(count($zx));

        	for ($i=0;$i<count($zx);$i++)
        	{
        		#echo ' dbid='.$zx[$i]['user_name']." dbpass=".$zx[$i]['pass_word'];
        		#echo " id= ".$user_name." pass=".$pass_word;
        		if($zx[$i]['user_name']==$user_name && $zx[$i]['pass_word']==$pass_word)
        			{
        				$_SESSION['UID']=$zx[$i]['ID'];
        				#echo $_SESSION['UID'];
        			    require_once"html/Front.php";
        			    $sign = 1;
        			    #echo 'match found';
        			}
        		#echo "loop :".$i;
			}
        	if ($sign==0){
                require_once"html/Login.php";
            }


       }
	function create_user()
	{
		$x="('".$_POST['username1']."',' ".$_POST['pass1']."')";
		#echo $x;
		$this->q->insert_user($x);


	}
        	

}


$control = new masterController($_SESSION['UID']);



	if(isset($_POST['createuser']))
	{
		#echo"creating new user";
		$control->create_user();
	}
	if (isset($_POST['sign-in']))
	{
        $control->sign_in();
		#echo "reached here";
		
	}
	elseif(isset($_POST['sign-up']))
    {
        require_once 'html/sign-up.php';
	}
	elseif (isset($_POST['submit']) == "addnew")
	{
		#echo'reached here';
		$control->send_data();
        require_once 'html/Front.php';
	}
	elseif (isset($_POST['markcompleted']) )
	{
	    #echo 'executing markcompleted';
		$x=$_POST['id'];
		#var_dump($_SESSION['UID']);
		#echo'executing update '.$x;
		$control->update_data($x);
        require_once 'html/Front.php';
	}
	elseif (isset($_POST['deleted']) )
	{
        #echo 'executing Deleted';
	    #var_dump($_SESSION['UID']);
		$x=$_POST['id'];
		#echo'executing reset '.$x;
		$control->reset_data($x);
        require_once 'html/Front.php';

	}
	else
	{
	    require_once "html/Login.php";
	}
	#echo "reached here";

?>
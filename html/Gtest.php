<html>
<head>
<title>
Gtest	
</title>
<head>
		<meta charset="utf-8">
		<meta name="screen" content="width=device-width,initial-scale=1">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
        </script>
    <?php
    require_once "../controller/Front_Controller.php";
?>
</head>
<body>
	<div class="container h-100"  >
		<div class="row" style="border: none;margin-top:30px;height: 50px;">
				<?php
				$day=array("Task","SUN","MON","TUE","WED","THU","FRI","SAT");
				for ($i=0;$i<8;$i++)
				{
					echo "<div 
							class='col' 
							style='border:none;
								  '>";
					echo "<div style='text-align:center;'>".$day[$i]."</div>";
					echo"</div>";
				}
				

				?>

		</div>
		<?php
		for ($j=0;$j<4;$j++)
				{	
					$a=rand(0,22);
					$b=rand(0,87.5-$a);
					$c=rand(0,87.5-($a+$b));
					echo '<div class="row" >
							<div class="progress" 
								 style="background-color:#ffffff; 
								 height:40px;
								 margin:2px;
								 margin-left:12.5%;">
							<div class="progress-bar " 
								 role="progressbar"
								 style="width:'.$a.'%;
								 background-color:#ffffff;
								">
							
							</div>
							<div class="progress-bar " role="progressbar"
								style="width:'.$b.'%;
								background-color:#00bbcc;
								">
							test2
							</div>
							<div class="progress-bar " 
							     role="progressbar"
								 style="width:'.$c.'%;
								        background-color:#ffffff;"
								>
							</div>
							</div>
						  </div>';
				}
		?>
	</div>	
</body>
</html>
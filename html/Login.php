<html>
<head>
<title>front</title>
			<meta charset="utf-8">
			<meta name="screen" content="width=device-width,initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</head>
<body>
<?php
session_start();
#echo $_SESSION['UID'];
?>
	<div style="margin-top:100px;margin-left:40%;">
	<form action='../controller/Login_Controller.php'method='post'>
		<div >
			<label >
			User-Name:
			</label>
			<input class="w3-input" 
					type="text" 
					name="username"
					style=
					"
					 
					border:none;
					border-bottom:1px solid;
					border-bottom-color:#888;
					margin: 3px; 
					">
			</input>
		</div>
		<div style="text-align: left;">
			<label>
				Password:
			</label>
			<input class="w3-input" 
					type="password" 
					name="pass"
					style=
					"
					border:none;
					border-bottom:1px solid;
					border-bottom-color:#888;
					">
			</input>
		</div>
		<div style="margin-top:20px;">
		<button class="btn"
				style="background-color:#404040;
					   color:white;
                        margin-left: 70px;"
				name="sign-in" 
				value="sign-in">
			Sign-in
		</button>
		<button class="btn"
				style="background-color:#404040;
					   color:white;margin-left:15px;"
				name="sign-up" 
				value="sign-up">
		Sign-up
		</button>
		</div>
		</form>
	</div>
	
</body>
</html>

<html>
		
		<head>
			<title>front</title>
			<meta charset="utf-8">
			<meta name="screen" content="width=device-width,initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
		
		<?php

		require_once "../controller/Front_Controller.php";
		use master\masterController as ms;
		?>
		</head>
	<body>
		
		<div style="height:80%; background-color:#868686;">
		<div class="container" >
            <div class="row" >
            <div class="col" style="margin-left: 550px;">
			<h2 >TODO list</h2>
			<p>This is a test Project </p>
            </div>
            <div class="col">
                <form action="../controller/Front_Controller.php"method="post">
            <button name="Logout" class="btn btn-dark" style="text-align: center;margin-top: 25px;margin-left:200px;">
                Logout
            </button>
                </form>
            </div>
            </div>
		</div>
		<!---navigation bar--->

		
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 90%; margin-left: 5%;" >
			<a class="navbar-brand" href="#"" style="margin-left: 20px;">
				Home
			</a>
			<a class="navbar-brand" href="./Gtest.php" style="margin-left: 20px;">
				Gtest
			</a>
		
		</nav>

		
		<!---main body--->
		
		<div class="container " style="height:100%; ">
			
			<div class="row align-items-start ">
				<div class="col overflow-auto" style="direction:rtl;margin-top: 15px;height:500px">
					
					<?php
                    #echo $control->flg;

					$data=new ms($_SESSION['UID']);
					$data->get_data($_SESSION['UID'],0,"markcompleted");
					?>
					

					
				</div>
				<div class="col overflow-auto"style="height:500px; margin-top: 15px;"id="insert_row_here">
						<?php

						$data=new ms($_SESSION['UID']);
						$data->get_data($_SESSION['UID'],1,"deleted");
						?>

				</div>
			</div>			
		</div>

		
			<div class="position-relative" >
				<div class="position-absolute bottom-0 " style="margin-left: 37%;" >
					<form action="../controller/Front_Controller.php" method="post">
                        <div style="margin-left: 0px;">
                            <label name="status" >
                            <?php
                            #echo $data->q->get_mail($_SESSION['UID']);

                            ?>
                            </label>
                        </div>
					<label >
						Task:
					</label>
					<input 
					class="w3-input" 
					type="text" 
					name="task"
					style=
					"
					border:none;
					border-bottom:1px solid;
					border-bottom-color:#888;
					margin: 3px; 
					"
					>
					</input>
					
					<button 
					name="submit"
					class="btn btn-dark"
					value="addnew">
						Enter
					</button>

					<a 
					class="btn btn-primary" 
					data-bs-toggle="collapse"
					href="#collapseExample"
					role="button"
					aria-expanded="false";
					aria-controls="collapseExample"
					>
					is time critical???
					</a>
					<div class="collapse" id="collapseExample">
						<div>
							<input 
							type="datetime-local"
							id="time"
							name="time"
							>
							
						</div>
					</div>
		</form>
				</div>
			</div>
		</div>
	</body>

</html>
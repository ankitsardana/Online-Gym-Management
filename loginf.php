<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>logintrainer</title>
<link type="text/css" rel="stylesheet" href="style2.css" />
</head>
<body>
<header class = "class1">
						<span style="color: white"><h1>FITNESS CLUB</h1></span>
				</header>

				<nav class="nav1">
						<a href="index.html" >HOME</a> 
						<a href="about_s.txt" >ABOUT US</a> 
						<a href="check.txt" >TIPS</a> 
						<a href="check.txt" >CONTACT US</a> 
						<a href="check.txt" >F.A.Q.</a> 
				</nav>

				
					<?php
					$username="";
					$password="";
					$con=new mysqli("localhost","root","","gym_management");
					if($con->connect_error)
					{
					die("could not connect:".$con->connect_error);
					}
					$username=mysqli_real_escape_string($con,$_POST['username']);
					$password=mysqli_real_escape_string($con,$_POST['password']);
					$password=md5('$password');
					$sql="SELECT * FROM user WHERE login_id LIKE '{$username}' AND password LIKE '{$password}'";
					$result=$con->query($sql);
					if(!$result->num_rows==1){
						$message = "Invalid Username OR Password";
						echo "<script>
						alert('$message');
						window.location.href='index.html';
						</script>";
					}	
					else
					{	
						$row = $result->fetch_assoc();
						if($row["role"]=="trainer")
						{
							$sql1="SELECT * FROM user NATURAL JOIN trainer WHERE login_id LIKE '{$username}' ";
							$result1=$con->query($sql1);
							$row1=$result1->fetch_assoc();
										
						}
						else
						{
							$sql1="SELECT * FROM user NATURAL JOIN member WHERE login_id LIKE '{$username}' ";
							$result1=$con->query($sql1);
							$row1=$result1->fetch_assoc();
						}
					}
					$con->close();
					?>
					<div class = "div1" >
        
					<div  style="float:right ; width: 138px">
						<img src="image2.jpg" style="height: 200px; width: 150px;">	
						<p ><?php   echo  $row1["fname"] ." ". $row1["lname"] ?></p>
					</div>
					<div id = "menu" style = "width:20%;height: 500px;float:left;">
						<ul>
							<li><a href="#">Payment Options</a></li><br>
							<li><a href="#" >Update Info</a></li><br>
							<li><a href="#" >Gym Plan</a></li><br>
							<li><a href="#" >Notification</a></li><br>
							<li><a href="#" >Nutrition Chart</a></li><br>
							<li><a href="#" >Growth Chart</a></li><br>
							<li><a href="#" >Chat</a></li><br>
							<li><a href="#" >Settings</a></li><br>
							<li><a href="index.html" >Logout</a></li><br>
						</ul>
					</div>
					<div style="width: 65%; height: 500px;float:right;color: black ;line-height: 35px;">  <h2 style="text-align-last: center;"><?php if($row["role"]=="trainer"){echo "TRAINER";}else{echo "MEMBER";} ?></h2>
						<p>
							<b>User name</b> : <i><?php   echo  $row1["login_id"] ?></i><br>
							<b>Name</b> : <i><?php   echo  $row1["fname"] ." ". $row1["lname"] ?></i><br>
							<b>Email Address</b> : <i><?php   echo  $row1["email"] ?></i><br>
							<b>Address</b> : <i><?php   echo $row1["address"] ?></i><br>
							<b>D.O.B </b>: <i><?php   echo $row1["date_of_birth"] ?></i><br>
							<b>Height</b> : <i><?php   echo $row1["height"] ?></i> <br>
							<b>Weight</b>: <i><?php   echo $row1["weight"] ?></i><br>
						</p>
					</div>	
				</div>
			</div>
			//</body>
			//</html>
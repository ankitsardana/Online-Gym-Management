<?php

	$firstname="";
	$middlename="";
	$lastname="";
	$Address="";
	$Email="";
	$ContactNo="";
	$username="";
	$password="";
	$confirmpassword="";
	$dateofbirth="";
	$height="";
	$weight="";
	$recommandedby="";
	$condition="";
	$role="member";
	$sex="";
	if($_POST["password"]===$_POST["confirmpassword"])
	{
	
	$con=new mysqli("localhost","root","","gym_management");
	if($con->connect_error)
	{
	die("could not connect:".$con->connect_error);
	}
	echo"connection successful";
	$firstname=mysqli_real_escape_string($con,$_POST['firstname']);
	$middlename=mysqli_real_escape_string($con,$_POST['middlename']);
	$lastname=mysqli_real_escape_string($con,$_POST['lastname']);
	$ContactNo=mysqli_real_escape_string($con,$_POST['ContactNo']);
	$Email=mysqli_real_escape_string($con,$_POST['Email']);
	$Address=mysqli_real_escape_string($con,$_POST['Address']);	
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$condition=mysqli_real_escape_string($con,$_POST['condition']);
	$height=mysqli_real_escape_string($con,$_POST['height']);
	$weight=mysqli_real_escape_string($con,$_POST['weight']);
	$dateofbirth=mysqli_real_escape_string($con,$_POST['dateofbirth']);
	$sex=mysqli_real_escape_string($con,$_POST['sex']);
	$recommandedby=mysqli_real_escape_string($con,$_POST['recommandedby']);
		$password=md5('$password');//hash password before storing for security purpose)
		$query1="INSERT INTO user VALUES ('$username','$password','$firstname','$lastname','$dateofbirth','$Address','$sex','$Email','$role')";
		$query2="INSERT INTO member(login_id,m_id,height,weight) VALUES ('$username','$username','$height','$weight')";
		if($con->query($query1)==TRUE)
		{
			$con->query($query2);
			$message = "You are registered successfuly.";
  			echo "<script>
			alert('$message');
			window.location.href='index.html';
			</script>";
			
			

		}
		else{
			echo"Error:".$query1."<br>".$con->error;
		}
	
	
	$con->close();						
	}
	else
		echo"invalid password";
?>

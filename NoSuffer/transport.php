<?php
	$mot=$_POST['mot'];
	$source=$_POST['source'];
	$destination=$_POST['destination'];
	$name=$_POST['Name'];
	$age=$_POST['Age'];
	$gender=$_POST['Gender'];
	$email=$_POST['Email'];
	$seats=$_POST['Seats'];
	
	if(!empty($mot) || !empty($source) || !empty($destination)|| !empty($name) || !empty($age) || !empty($gender) || !empty($email) || !empty($seats)){
		$host= "localhost";
		$dbusername= "root";
		$dbpassword= "";
		$dbname= "service";
		
	$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
	
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else{
		$sql="INSERT INTO transport(ModeofTransport,Source,Destination,Name,Age,Gender,Email,Seats) values('$mot','$source','$destination','$name','$age','$gender','$email','$seats')";
		if($conn->query($sql)){
			echo "Congratualtions...Your Request is being processed";
		}
		else{
			echo "Error:" .$sql. "<br>". $conn->error;
		}
	$conn->close();
	}
	}
	else{
		echo "All Fields to be filled";
	    die();
	}
	header('Location:success.html');
	exit;
?>
	
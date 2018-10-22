<html>
<head>
<title>log in</title>
<style>
body {
       background-image: url("http://www.pptbackgrounds.org/uploads/ice--sky-powerpoint-templates.jpg");
	   background-size:cover;
     }
</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "service";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
$user_id=$_POST['user_id'];
$password=$_POST['password'];
if($user_id!=''&& $password!='')
{
 $query="select * from signin where user_id='".$user_id."' and password='".$password."'";

 $result=mysqli_query($conn,$query); 

 if(!$result)
    die("Query Failed: " .  mysqli_error($conn));
 else{
     if(mysqli_num_rows($result)>0)
     {
        $_SESSION['user_id']=$user_id;
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
        echo "<center><h1>WELCOME</h1><h3>Enjoy Our Special Services and Offers</h3></center>";
     }
    else
    {
	   echo "<br>";
	   echo "<br>";
	   echo "<br>";
	   echo "<br>";
       echo'<center><font size="5" color="red"><b>ERROR:</b>USER_ID OR PASSWORD IS INCORRECT</font></center>';
     }
 }
}
?>
</body>
</html>
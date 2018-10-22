<html>
<head>
<title>sign_in</title>
<style>
body {
       background-image: url("http://www.pptbackgrounds.org/uploads/ice--sky-powerpoint-templates.jpg");
	   background-size:cover;
     }
</style>
</head>
<body>
<?php
if(isset($_POST['submit']))
{
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$address=$_POST['address'];
$country=$_POST['country'];
$state=$_POST['state'];
$phone=$_POST['phone'];
$e_mail=$_POST['e_mail'];
$user_id=$_POST['user_id'];
$password=$_POST['password'];
$connection=mysqli_connect('localhost','root','','service');
if($connection)
{
	echo "<h3><center><b>THANK YOU FOR SIGNING IN</b></center></h3>";
}
else
{
	echo "oops something is wrong in connecting";
}
$selected=mysqli_select_db($connection,'service');
	if(isset($user_id) && isset($password))
	{
	   $query="SELECT user_id FROM signin WHERE user_id='$user_id'";
	   $query_1=mysqli_query($connection,$query);
	
	 if(mysqli_num_rows($query_1)>0)
	  {
		echo "<br>";
		echo '<font size="5" color="red"><center><b>ERROR:</b>user_id already exists please set a different user_id</center></font>';
		echo "\r\n";
	  }
     else
      {
          $query="INSERT INTO signin(first_name,last_name,address,country,state,phone,e_mail,user_id,password)";
          $query .="VALUES('$first_name','$last_name','$address','$country','$state','$phone','$e_mail','$user_id','$password')";
          $result=mysqli_query($connection,$query);
		  echo "<br>";
		  echo "<h1><b><center>we are connected</center></b></h1>";
		  echo "<br>";
		  echo '<font size="5" color="black"><center><b>welcome</b></center></font>';
       if(!$result)
        {
	       die('failed' .mysqli_error($connection));
        }
      }
	}
echo "<br>";
if($user_id && $password)
{
	echo '';
}
else {
	echo "please enter user_id and password";
}
echo "<br>";
}

?>
</body>
</html>


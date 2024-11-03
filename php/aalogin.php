<?php
	$error="";
	if(isset($_POST['submit']))
    {
		$username=$_POST['username'];
		$password=$_POST['password'];
		if($username=="admin")
        {
			if($password=="admin")
            {
				echo "<script>window.location='../html/Dashboard.html'</script>";
			}
			else
            {
				echo"<script>alert('Invalid Password')</script>";
				echo "<script>window.location='../html/alogin.html'</script>";
			}
		}
		else
        {
			echo "<script>alert('Invalid Username')</script>";
			echo "<script>window.location='../html/alogin.html'</script>";
		}
	}
?>
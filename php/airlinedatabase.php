<?php
    require_once "dbconnection.php";

    if(isset($_POST['submit']))
	{
        $flightcode=$_POST['flightcode'];
        $airlinesid=$_POST['airlinesid'];
        $airlinename=$_POST['airlinename'];

        $sql="INSERT INTO `airline`(`FLIGHT_CODE`, `AIRLINE_ID`, `AIRLINE_NAME`) VALUES ('$flightcode','$airlinesid','$airlinename')";

        $res=mysqli_query($con,$sql);
            echo "<script>alert('Inserted successfully')</script>";
            echo "<script>window.location='../html/airlinedatabase.html'</script>";
    }
?>

<?php 
	$flag=0;
	require_once "dbconnection.php";
	if(isset($_POST['submit']))
	{
        $flightcode=$_POST['flightcode'];
        $airlinesid=$_POST['airlinesid'];
        $airlinename=$_POST['airlinename'];
        $country=$_POST['country'];
		$state=$_POST['state'];
        $airportname=$_POST['airportname'];
        $source=$_POST['source'];
        $destination=$_POST['destination'];
        $departure=$_POST['departure'];
		$arrival=$_POST['arrival'];
		$duration=$_POST['duration'];
		$date=$_POST['date'];
        $economyclass=$_POST['economy'];
		$businessclass=$_POST['business'];
		$students=$_POST['student'];
		$diff=$_POST['disable'];

        $sql="select * from airline where FLIGHT_CODE='$flightcode'";
       
        $res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0){
            $sql="select * from flight where FLIGHT_CODE='$flightcode'";
			$res=mysqli_query($con,$sql);
			if(mysqli_num_rows($res)==0){
				if(strlen($flightcode)==4){
				    $sql1="insert into city(C_NAME,STATE,COUNTRY) values ('$source','$state','$country')";
				    if(mysqli_query($con,$sql1)){
				        $flag=$flag+1;
                    }
                    $sql2="insert into airport(A_NAME,STATE,COUNTRY,C_NAME) values ('$airportname','$state','$country','$source')";
                    if(mysqli_query($con,$sql2)){
                        $flag=$flag+1;
                    }
                    $sql4="insert into contains(A_NAME,AIRLINE_ID) values('$airportname','$airlinesid')";
                    if(mysqli_query($con,$sql4)){
                        $flag=$flag+1;
                    }
                    $sql5="insert into flight(SOURCE,DESTINATION,DEPARTURE,ARRIVAL,DURATION,FLIGHT_CODE,AIRLINE_ID,PRICE_BUSINESS,PRICE_ECONOMY,PRICE_STUDENTS,PRICE_DIFFERENTLYABLED,DATE) values('$source','$destination','$departure','$arrival','$duration','$flightcode','$airlinesid','$businessclass','$economyclass','$students','$diff','$date')";
                    if(mysqli_query($con,$sql5)){
                        $flag=$flag+1;
                    }
                    if($flag=4){
                        echo "<script>alert('Inserted successfully')</script>";
                        echo "<script>window.location='../home.html'</script>";
                    }else{
                        echo "<script>alert('Insertion Failed')</script>";
                    }
                }else{
                    echo "<script>alert('Flight Code should be of length 4')</script>";
                    echo "<script>window.location='../html/addflight.html'</script>";
                }
            }else{
                echo "<script>alert('Duplicate Flight Code !')</script>";
                echo "<script>window.location='../html/addflight.html'</script>";
            }
        }else{
            echo "<script>alert('Airline is not update in database.')</script>";
            echo "<script>window.location='../html/addflight.html'</script>";
        }
    }
?>
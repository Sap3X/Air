<?php 
	require_once "dbconnection.php";
	if(isset($_POST['submit'])){
		$count=0;
		$catch=$_POST['flightcode'];
		
		$sql="select * from flight where FLIGHT_CODE='$catch'";
		$res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0){
			while($row=mysqli_fetch_assoc($res)){
				if($catch==$row['FLIGHT_CODE']){
					$duration=$row['DURATION'];
					$arrival=$row['ARRIVAL'];
					$departure=$row['DEPARTURE'];
					$economyclass=$row['PRICE_ECONOMY'];
					$businessclass=$row['PRICE_BUSINESS'];
					$students=$row['PRICE_STUDENTS'];
					$diff=$row['PRICE_DIFFERENTLYABLED'];
					$count+=1;
				}
				else{
					$count=0;
				}
			}
		}
		if($count==0){
			echo "<script>alert('Flight Code not in database')</script>";
			echo "<script>window.location='../html/modifyflight.html'</script>";
		}
		$sql="insert into selected(FLIGHT_CODE) values('$catch')";
		$res=mysqli_query($con,$sql);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/utility.css">
    <link rel="stylesheet" href="../css/dashboard.css">
	<script src="../js/addflight.js" defer></script>
	<style>
		.title{
			position: absolute;
			top: 15%;
			left: 50%;
			transform: translate(-50%,-50%);	
		}

		table.a{
            position: absolute;
			top: 20%;
            bottom: 20%;
			border: 1px solid #fff;
			padding: 5px 5px;
            padding-top: 50px;
			color: #fff;
			text-decoration: none;
			transition: 0.6s ease;
			font-size: 30px;
            margin-top: 100px;
            margin-left: 300px;
		}

		input[type=submit]{
			border: 1px solid #fff;
			padding: 10px 30px;
			text-decoration: none;
			transition: 0.6s ease;
            border-radius: 20px;
            border: 3px solid #00FFFF;
			color: #000;
		}

		input[type=submit]:hover{
			background-color: black;
			color: white;
		}

		input[type=text]{
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		}

		input[type=number]{
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  box-sizing: border-box;
		}
	</style>
    <title>Modify Flights | Airline Management System</title>
</head>
<body>
    <header class="main">
        <ul>
            <li class="active"><a href="modifyflight.php">modifyflight</a></li>
            <li><a href="../home.html">Home</a></li>
        </ul>
    </header>
    <nav class="nav">
        <div class="flight">
            <h1>Flight Details</h1>
            <div class="flight-details">
                <a href="../html/Dashboard.html">Dashboard</a>
                <a href="viewflight.php">View Flights</a>
                <a href="../html/addflight.html">Add Flights</a>
                <a href="../html/deleteflight.html">Delete Flights</a>
                <a href="../html/modifyflight.html">Modify Flights</a>			
            </div>
        </div>
        <div class="employee">
            <h1>Employees Details</h1>
            <div class="employee-details">
                <a href="../html/viewemployee.html">View Emoloyee</a>
                <a href="../html/addemployee">Add Employee</a>
            </div>
        </div>
    </nav>
	<div class="title">
		<h1>Modify Flight Details</h1>
	</div>
	<form action="modifyflightdetails.php" method="post">
		<table class='a' cellspacing="30">
			<tr>
				<td>Departure</td>
				<td><input type="text" placeholder=<?php echo $departure ?> name="departure"></td>
				<td>Arrival</td>
				<td><input type="text" placeholder=<?php echo $arrival ?> name="arrival"></td>
				<td>Duration</td>
				<td><input type="text" placeholder=<?php echo $duration ?> name="duration"></td>
			</tr>
			<tr>
				<td><h3>PRICE</h3></td>
			</tr>
			<tr>
				<td>Economy Class</td>
				<td><input type="number" placeholder=<?php echo $economyclass ?> onfocusOut="sum()" id="economy" name="economyclass"></td>
				<td>Business Class</td>
				<td><input type="number" placeholder=<?php echo $businessclass ?> id="business" name="businessclass"></td>
				<td>For Students</td>
				<td><input type="number" placeholder=<?php echo $students ?> id="student" name="students"></td>
			</tr>
			<tr>
				<td>For Differently Abled</td>
				<td><input type="number" placeholder=<?php echo $diff ?> id="disable" name="diff"></td>
			</tr>
			<tr>
				<td><input type="Submit" value="Modify" name="submit"></td>
			</tr>
		</table>
</body>
</html>
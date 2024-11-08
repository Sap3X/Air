<?php 
	require_once "dbconnection.php";
	if(isset($_POST['search']))
	{
		if(isset($_POST['source']) && !empty($_POST['source']))
		{	
			if(isset($_POST['destination']) && !empty($_POST['destination']))
			{
				if(isset($_POST['date']) && !empty($_POST['date']))
				{
					$source=$_POST['source'];
					$destination=$_POST['destination'];
					$date=$_POST['date'];
					$query=mysqli_query($con,("select ARRIVAL,DEPARTURE,DURATION,FLIGHT_CODE,AIRLINE_ID,PRICE_BUSINESS,PRICE_ECONOMY,PRICE_STUDENTS,PRICE_DIFFERENTLYABLED from flight where SOURCE='$source' && DESTINATION='$destination' && DATE='$date'"));
					$rowscount=mysqli_num_rows($query);
					if ($rowscount==0){
						echo "<script>alert('No Flights available')</script>";
						echo "<script>window.location='../html/searchflight.html'</script>";
					}
				}
				else{
					echo "<script>alert('Please Enter the details correctly')</script>";
					echo "<script>window.location='../home.html'</script>";
				}
			}
			else{
				echo "<script>alert('Please Enter the details correctly')</script>";
				echo "<script>window.location='../home.html'</script>";
			}
		}
		else{
			echo "<script>alert('Please Enter the details correctly')</script>";
			echo "<script>window.location='../home.html'</script>";
		}
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
    <link rel="stylesheet" href="../css/cdashboard.css">
	<style>
		header{
			padding-left: 83%;
		}

		.title{
			position: absolute;
			top: 15%;
			left: 35%;
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
			font-size: 25px;
            margin-top: 100px;
            margin-left: 300px;	
		}

		button[type="submit"]{
			border: 1px solid #fff;
			padding: 10px 30px;
			text-decoration: none;
			transition: 0.6s ease;
		}

		button[type="submit"]:hover{
			background-color: #fff;
			color: #000;
		}
	</style>
    <title>Dashboard | Airline Management System</title>
</head>
<body>
    <header class="main">
        <ul>
            <li class="active"><a href="searchflight.php">Select Seat</a></li>
			<li><a href="../html/searchflight.html">Back</a></li>
            <li><a href="../home.html">Home</a></li>
        </ul>
    </header>
	
	<div class="title">
		<h1>Available Flights</h1>
	</div>
	<table class="a">
		<tr>
			<th>DEPARTURE&emsp;</th>
			<th>ARRIVAL&emsp;</th>
			<th>DURATION&emsp;</th>
			<th>FLIGHT_CODE&emsp;</th>
			<th>AIRLINE_ID&emsp;</th>
			<th>PRICE&emsp;</th>
			<th>TYPE&emsp;</th>
		</tr>

		<form method="post">
			<?php 
				for($i=1;$i<=$rowscount;$i++){
					$rows=mysqli_fetch_array($query);
			?>
				<tr>
					<td><?php echo $rows['DEPARTURE'] ?></td>
					<td><?php echo $rows['ARRIVAL'] ?></td>
					<td><?php echo $rows['DURATION'] ?></td>
					<td><?php echo $rows['FLIGHT_CODE']?></td>
					<td><?php echo $rows['AIRLINE_ID']?></td>
					<td><?php echo $rows['PRICE_BUSINESS']?></td>
					<td><?php echo "BUSINESS";?></td>
					<td>&nbsp;<button type="submit"><a href="business.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
				</tr>
				<tr>
					<td><?php echo $rows['DEPARTURE'] ?></td>
					<td><?php echo $rows['ARRIVAL'] ?></td>
					<td><?php echo $rows['DURATION'] ?></td>
					<td><?php echo $rows['FLIGHT_CODE']?></td>
					<td><?php echo $rows['AIRLINE_ID']?></td>
					<td><?php echo $rows['PRICE_ECONOMY']?></td>
					<td><?php echo "ECONOMY";?></td>
					<td>&nbsp;<button type="submit"><a href="economy.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
				</tr>
				<tr>
					<td><?php echo $rows['DEPARTURE'] ?></td>
					<td><?php echo $rows['ARRIVAL'] ?></td>
					<td><?php echo $rows['DURATION'] ?></td>
					<td><?php echo $rows['FLIGHT_CODE']?></td>
					<td><?php echo $rows['AIRLINE_ID']?></td>
					<td><?php echo $rows['PRICE_STUDENTS']?></td>
					<td><?php echo "STUDENTS";?></td>
					<td>&nbsp;<button type="submit"><a href="students.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
				</tr>
				<tr>
					<td><?php echo $rows['DEPARTURE'] ?></td>
					<td><?php echo $rows['ARRIVAL'] ?></td>
					<td><?php echo $rows['DURATION'] ?></td>
					<td><?php echo $rows['FLIGHT_CODE']?></td>
					<td><?php echo $rows['AIRLINE_ID']?></td>
					<td><?php echo $rows['PRICE_DIFFERENTLYABLED']?></td>
					<td><?php echo "DIFFERENTLY ABLED";?></td>
					<td>&nbsp;<button type="submit"><a href="diff.php?id=<?php echo $rows['FLIGHT_CODE'] ?>">Select</a></button></td>
				</tr>
			<?php	
				}
			?>
		</form>
	</table>
</body>
</html>
<?php
    require_once "dbconnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/utility.css">
    <link rel="stylesheet" href="../css/dashboard.css">
	<style>
		.title{
			position: absolute;
			top: 18%;
			left: 40%;
			/* transform: translate(-50%,-50%);	 */
		}
		
		table.a{
			position: absolute;
			top: 27%;
			left: 7%;
			/* transform: translate(-50%,-50%); */
			border: 1px solid #fff;
			padding: 10px 30px;
			color: #fff;
			text-decoration: none;
			transition: 0.6s ease;
			font-size: 18px;
		}
	</style>
    <title>View Flight | Airline Management System</title>
</head>
<body>
    <header class="main">
        <ul>
            <li class="active"><a href="viewflight.html">View Flights</a></li>
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
    </nav>
    <div class="title">
		<h1>ALL FLIGHTS</h1>
	</div>
	<table class="a">
		<tr>
			<th>SOURCE&emsp;</th>
			<th>DESTINATION&emsp;</th>
			<th>DEPARTURE&emsp;</th>
			<th>ARRIVAL&emsp;</th>
			<th>DURATION&emsp;</th>
			<th>FLIGHT_CODE&emsp;</th>
			<th>AIRLINE_ID&emsp;</th>
			<th>PRICE(BUSINESS)&emsp;</th>
			<th>PRICE(ECONOMY)&emsp;</th>
			<th>PRICE(STUDENT)&emsp;</th>
			<th>PRICE(DIFF)&emsp;</th>
			<th>DATE&emsp;</th>
			<th></th>
		</tr>
		<tr></tr>
		<form>
		<?php
			$query=mysqli_query($con,"select * from flight");
			$rowscount=mysqli_num_rows($query);
			for($i=1;$i<=$rowscount;$i++)
			{
				$rows=mysqli_fetch_array($query);
		?>
				<tr>
						<td><?php echo $rows['SOURCE'] ?></td>
						<td><?php echo $rows['DESTINATION'] ?></td>
						<td><?php echo $rows['DEPARTURE'] ?></td>
						<td><?php echo $rows['ARRIVAL'] ?></td>
						<td><?php echo $rows['DURATION'] ?></td>
						<td><?php echo $rows['FLIGHT_CODE']?></td>
						<td><?php echo $rows['AIRLINE_ID']?></td>
						<td><?php echo $rows['PRICE_BUSINESS']?></td>
						<td><?php echo $rows['PRICE_ECONOMY']?></td>
						<td><?php echo $rows['PRICE_STUDENTS']?></td>
						<td><?php echo $rows['PRICE_DIFFERENTLYABLED']?></td>
						<td><?php echo $rows['DATE'] ?></td>
				</tr>
		<?php	
			}
		?>
	</table>
</body>
</html>
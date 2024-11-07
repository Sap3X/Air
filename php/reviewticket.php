<?php
	require_once "dbconnection.php";
	$query=mysqli_query($con,("select * from selected"));
	$rows=mysqli_fetch_array($query);
	$flight=$rows['FLIGHT_CODE'];
	$query=mysqli_query($con,("select * from pass"));
	$rows=mysqli_fetch_array($query);
	$passportno=$rows['PASSPORT_NO'];
	$query=mysqli_query($con,("select * from ticket where PASSPORT_NO='$passportno'"));
	$rows=mysqli_fetch_array($query);
	$ticketno=$rows['TICKET_NO'];
	$source=$rows['SOURCE'];
	$destination=$rows['DESTINATION'];
	$date=$rows['DATE_OF_TRAVEL'];
	$query=mysqli_query($con,("select * from passenger where PASSPORT_NO='$passportno'"));
	$rows=mysqli_fetch_array($query);
	$fname=$rows['FNAME'];
	$lname=$rows['LNAME'];
	$age=$rows['AGE'];
	$sex=$rows['SEX'];
	$phone=$rows['PHONE'];
	$address=$rows['ADDRESS'];
	$query=mysqli_query($con,("select * from flight where FLIGHT_CODE='$flight'"));
	$rows=mysqli_fetch_array($query);
	$arrival=$rows['ARRIVAL'];
	$departure=$rows['DEPARTURE'];
	$duration=$rows['DURATION'];
	$airlineid=$rows['AIRLINE_ID'];
	$query=mysqli_query($con,("select * from airline where AIRLINE_ID='$airlineid'"));
	$rows=mysqli_fetch_array($query);
	$airlinename=$rows['AIRLINE_NAME'];
	$query=mysqli_query($con,("select PRICE,TYPE from price"));
	$rows=mysqli_fetch_array($query);
	$price=$rows['PRICE'];
	$type=$rows['TYPE'];
	$sql1=mysqli_query($con,"DELETE FROM selected WHERE FLIGHT_CODE='$flight'");
	$sql2=mysqli_query($con,"DELETE FROM pass WHERE PASSPORT_NO='$passportno'");
	$sql3=mysqli_query($con,"DELETE FROM price WHERE PRICE='$price'");
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
    <title>Dashboard | Airline Management System</title>
</head>
<body>
    <header class="main">
        <ul>
            <li class="active"><a href="cdashboard.html">Dashboard</a></li>
            <li><a href="../home.html">Home</a></li>
        </ul>
    </header>
    <div class="a"><h1>E-Ticket</h1></div>
	<div class="b">
		<?php echo "First Name  :".$fname ?></br>
		<?php echo "Last Name  :".$lname ?></br>
		<?php echo "Age  :".$age ?></br>
		<?php echo "Sex  :".$sex ?></br>
		<?php echo "Phone  :".$phone ?></br>
		<?php echo "Address  :".$address ?></br>
		<?php echo "Passport Number  :".$passportno ?></br>
		<?php echo "Source  :".$source ?></br>
		<?php echo "Destination  :".$destination ?></br>
		<?php echo "Arrival  :".$arrival ?></br>
		<?php echo "Departure  :".$departure ?></br>
		<?php echo "Duration  :".$duration ?></br>
		<?php echo "Date  :".$date ?></br>
		<?php echo "Price  :".$price ?></br>
		<?php echo "Type 	:".$type ?></br>
		<?php echo "Airline Name  :".$airlinename ?></br>
		<?php echo "Flight Code  :".$flight ?></br>
		<?php echo "Ticket Number  :".$ticketno ?></br>
	</div>
    <div class="print">
         <button onclick="window.print()"><h1>Print Ticket</h1></button>
    </div>
</body>
</html>
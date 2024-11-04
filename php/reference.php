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
        header{
            padding-left: 83%;
        }

        .title{
			position: absolute;
			top: 15%;
			left: 40%;
			/*transform: translate(-50%,-50%);*/
		}

		.title h1{
			color: #fff;
			font-size: 50px;
            text-align: center;
		}

        table.a{
			position: absolute;
			top: 27%;
			left: 37%;
			/*transform: translate(-50%,-50%);*/
			border: 1px solid #fff;
			padding: 10px 30px;
			color: #fff;
			text-decoration: none;
			transition: 0.6s ease;
			font-size: 25px;
		}
    </style>
    <title>Dashboard | Airline Management System</title>
</head>
<body>
    <header class="main">
        <ul>
            <li class="active"><a href="reference.php">Reference</a></li>
            <li><a href="../html/addflight.html">Back</a></li>
            <li><a href="../home.html">Home</a></li>
        </ul>
    </header>
    <nav class="nav">
        <div class="flight">
            <h1>Flight Details</h1>
            <div class="flight-details">
                <a href="Dashboard.html">Dashboard</a>
                <a href="viewflight.html">View Flights</a>
                <a href="addflight.html">Add Flights</a>
                <a href="continueflight.html">Continue flight</a>
                <a href="../deletedetails.html">Delete Flights</a>
                <a href="../modifyadmindetails.html">Modify Flights</a>			
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
	    <h1>Airlines ID</h1>
	</div>
	<table class="a">
	    <tr>
			<th>Airlines ID&emsp;</th>
		    <th>Airlines Name&emsp;</th>
        </tr>
	    <form>
		    <?php
			    $query=mysqli_query($con,"select * from airline");
			    $rowscount=mysqli_num_rows($query);
			    for($i=1;$i<=$rowscount;$i++)
		    	{
			    	$rows=mysqli_fetch_array($query);
		    ?>
			<tr>
				<td><?php echo $rows['AIRLINE_ID'] ?></td>
				<td><?php echo $rows['AIRLINE_NAME'] ?></td>	
			</tr>
		    <?php	
			    }
		    ?>
	    </form>
    </table>
</body>
</html>
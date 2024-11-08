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
            padding-left: 74%;
        }

        .title{
			position: absolute;
			top: 15%;
			left: 40%;
		}

		.title h1{
			color: #fff;
			font-size: 50px;
            text-align: center;
		}

        table.a{
			position: absolute;
			top: 27%;
			left: 32%;
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
            <li><a href="../html/airlinedatabase.html">Airline Database</a></li>
            <li><a href="../html/addflight.html">Back</a></li>
            <li><a href="../home.html">Home</a></li>
        </ul>
    </header>
    <div class="title">
	    <h1>Airlines ID</h1>
	</div>
	<table class="a">
	    <tr>
            <th>Flight code&emsp;</th>
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
                <td><?php echo $rows['FLIGHT_CODE']?></td>
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
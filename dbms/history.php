<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $conn = mysqli_connect('localhost', 'id20545063_root', 'ggLU1R88c$-ih{2r', 'id20545063_login') or die("connection failed:" . mysqli_connect_error());

    $_SESSION['id']=$id = $_GET['id'];

}?>
<!DOCTYPE html>
<html>
<head>
	<title>Transaction History</title>
	<style>
		table {
		  border-collapse: collapse;
		  width: 100%;
		  margin-top: 120px;
		}

		th, td {
		  text-align: left;
		  padding: 8px;
		  border-bottom: 1px solid #ddd;
		}

		th {
		  background-color: #4CAF50;
		  color: white;
		}

		tr:hover {background-color: #f5f5f5;}

		td:first-child {
		  font-weight: bold;
		}

		td:nth-child(2), td:nth-child(3) {
		  font-style: italic;
		}

		td:nth-child(4) {
		  font-family: monospace;
		}
        /* CSS for header */
header {
	background-color: #333;
	color: #fff;
	padding: 10px 0;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
}

.container {
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin: 0 auto;
	max-width: 1200px;
	padding: 0 20px;
}

#branding {
	font-size: 1.5rem;
}

nav ul {
	display: flex;
	list-style: none;
	margin: 0;
	padding: 0;
}

nav li {
	margin-left: 20px;
}

nav a {
	color: #fff;
	text-decoration: none;
	transition: all 0.3s ease;
}

nav a:hover {
	color: #ffd700;
}

	</style>
</head>
<body>
<header>
		<div class="container">
			<div id="branding">
				<h1><span class="highlight">Bank</span> Management System</h1>
			</div>
			<nav>
				<ul>
					<li><a href="main.php?id=<?php echo $id ?>">Home</a></li>
					<li><a href="login.php">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<h1>Transaction History</h1>
	<table>
		<thead>
			<tr>
				<th>Sender Email</th>
				<th>Receiver Email</th>
				<th>Amount</th>
				<th>Time</th>
				<th>Type</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Database connection
				$conn = mysqli_connect('localhost', 'id20545063_root', 'ggLU1R88c$-ih{2r', 'id20545063_login');
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
                $id=$_SESSION['id'];
				// SQL query to select all rows from the history table
				$sql = "SELECT h.sender_id, h.receiver_id, h.amount, h.time, h.type, a1.email AS sender_email, a2.email AS receiver_email FROM history h
                INNER JOIN account a1 ON h.sender_id = a1.id
                INNER JOIN account a2 ON h.receiver_id = a2.id
                WHERE sender_id=$id or receiver_id=$id";

				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
				    
					// Loop through each row and display the data in the table
					while ($row = mysqli_fetch_assoc($result)) {
					    
						echo "<tr>";
						echo "<td>" . $row['sender_email'] . "</td>";
						echo "<td>" . $row['receiver_email'] . "</td>";
						echo "<td>" . $row['amount'] . "</td>";
						echo "<td>" . $row['time'] . "</td>";
						echo "<td>" . $row['type'] . "</td>";
						echo "</tr>";
					}
				} else {
					echo "<tr><td colspan='5'>No transaction history found</td></tr>";
				}
                $sql1 = "SELECT h.sender_id, h.receiver_id, h.amount, h.time, h.type,  a2.email AS receiver_email FROM history h
                
                INNER JOIN account a2 ON h.receiver_id = a2.id
                WHERE h.type = 'loan' and receiver_id=$id";
       $result1 = mysqli_query($conn, $sql1);
       if (mysqli_num_rows($result1) > 0) {
           // Loop through each row and display the data in the table
           while ($row = mysqli_fetch_assoc($result1)) {
               echo "<tr>";
               echo "<td>" . 'NULL' . "</td>";
               echo "<td>" . $row['receiver_email'] . "</td>";
               echo "<td>" . $row['amount'] . "</td>";
               echo "<td>" . $row['time'] . "</td>";
               echo "<td>" . $row['type'] . "</td>";
               echo "</tr>";
           }
       } else {
           echo "<tr><td colspan='5'>No loan transactions found</td></tr>";
       }
       

				// Close database connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>
    <h2>
     
<?php
$conn = mysqli_connect('localhost', 'id20545063_root', 'ggLU1R88c$-ih{2r', 'id20545063_login');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql2 = "SELECT balance FROM account WHERE id = {$_SESSION['id']}";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
echo "Balance is " . $row2['balance'];
?>

</h2>

</body>
</html>

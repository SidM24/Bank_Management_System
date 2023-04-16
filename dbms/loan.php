<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $conn = mysqli_connect('localhost', 'id20545063_root', 'ggLU1R88c$-ih{2r', 'id20545063_login') or die("connection failed:" . mysqli_connect_error());

    $_SESSION['id']=$id = $_GET['id'];

}
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $conn = mysqli_connect('localhost', 'id20545063_root', 'ggLU1R88c$-ih{2r', 'id20545063_login') or die("connection failed:" . mysqli_connect_error());
    $amount = $_POST['loan_amount'];
    $months = $_POST['total_months'];
    $years=$months/12;
    $rate = $_POST['rate'];
    $final=$amount*((1+($rate/2))**(2*$years));

    $id=$_SESSION['id'];
    $sql = "INSERT INTO loan (`id`, `l_amount`, `months`, `rate`, `final`) VALUES 
    ('$id','$amount','$months','$rate','$final')";
    $result=mysqli_query($conn, $sql);
    if($result){
        $sql2 = "SELECT email,balance FROM account WHERE id='$id'";
        $result2=mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $balance = $row2['balance'];
        $new_balance = $balance + $amount;
        $sql3 = "UPDATE account SET balance='$new_balance' WHERE id='$id'";
        mysqli_query($conn, $sql3);
        $sql4 = "INSERT INTO history (`sender_id`, `receiver_id`, `amount`, `time`, `type`) VALUES 
                ('', '$id', '$amount', NOW(), 'loan')";
        mysqli_query($conn, $sql4);
        echo "transaction successful";
        echo "new balance : $new_balance";
        $_SESSION['balance']=$new_balance;
        
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Loan Calculator</title>
	<link rel="stylesheet" type="text/css" href="styles4.css">
</head>
<body>
<header>
		<div class="container">
			<div id="branding">
				<h1><span class="highlight">LOAN</span>APPLICATION</h1>
			</div>
			<nav>
				<ul>
					<li><a href="main.php?id=<?php echo $id ?>">Home</a></li>
					<li><a href="login.php">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="container2">
		
		<form action="loan.php" method="POST">
			<label for="loan_amount">Loan Amount:</label>
			<input type="number" id="loan_amount" name="loan_amount" required>

			<label for="total_months">Total Months:</label>
			<input type="number" id="total_months" name="total_months" required>
            <label for="rate">Rate of Interest:</label>
			<input type="number" id="rate" name="rate" required>
			<input type="submit" name="submit" value="SUBMIT">
            <h3><?php echo "your current balance: " . $_SESSION['balance']; ?></h3>

		</form>
	</div>
</body>
</html>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $conn = mysqli_connect('localhost', 'id20545063_root', 'ggLU1R88c$-ih{2r', 'id20545063_login') or die("connection failed:" . mysqli_connect_error());

    $_SESSION['id']=$id = $_GET['id'];

    $sql = "SELECT firstname, lastname, balance FROM account WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        
        $_SESSION['balance'] = $balance = $row['balance'];
        if ($balance == NULL) {
            echo "account not yet configured by the admin";
            //exit();
        }
    } else {
        echo 'User not found';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_3'])) {
    $conn = mysqli_connect('localhost', 'id20545063_root', 'ggLU1R88c$-ih{2r', 'id20545063_login') or die("connection failed:" . mysqli_connect_error());

    $email = $_POST['email'];
    $amount = $_POST['amount'];

    $sql = "SELECT id, balance FROM account WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $receiver_id = $row['id'];
        $receiver_balance = $row['balance'];
        $balance = $_SESSION['balance'];
        $id=$_SESSION['id'];
        if ($amount > $balance) {
            echo "Error: Insufficient balance";
        } else {
            $sender_balance = $balance - $amount;
            $receiver_balance = $receiver_balance + $amount;

            $sql1 = "UPDATE account SET balance='$sender_balance' WHERE id='$id'";
            $sql2 = "UPDATE account SET balance='$receiver_balance' WHERE id='$receiver_id'";
            if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
                $sql3 = "INSERT INTO history (`sender_id`, `receiver_id`, `amount`, `time`, `type`) VALUES 
                ('$id', '$receiver_id', '$amount', NOW(), 'transaction')";

            mysqli_query($conn, $sql3);
                header("Location: confirmation.php?id=$id");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        echo 'Error: Email address not found';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles5.css">
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
    <section id="search">
		<div class="container">
			<h1>Transfer Money</h1>
			<form method="post" action="bankt.php">
				<label for="email">Enter Email:</label>
				<input type="text" name="email" required>
				<label for="amount">Enter Amount:</label>
				<input type="number" name="amount" min="0" required>
				<button type="submit" class="button_1" name="submit_3">Transfer</button>
			</form>
		</div>
	</section>
	</main>
    </body>
    </html>
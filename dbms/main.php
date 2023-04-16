<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $conn = mysqli_connect('localhost', 'id20545063_root', 'ggLU1R88c$-ih{2r', 'id20545063_login') or die("connection failed:" . mysqli_connect_error());

    $id = $_GET['id'];

    $sql = "SELECT firstname, lastname FROM login WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        
    } else {
        echo 'User not found';
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Bank Management System</title>
    <link rel="stylesheet" type="text/css" href="styles3.css">
  </head>
  <body>
  <div class="homepage">
  <div class="container">
    <h1>Welcome to Bank Management System </h1>
    <h2><?php echo "    $firstname  $lastname" ?></h2>
    <p>We provide various banking services to our customers</p>
    <a href="#services" class="btn">Get Started</a>
  </div>
</div>
<section id ="services"class="services">
    <h1>OUR BANKING SERVICES</h1>
<div class="row">
				<div class="campus-column">
                <a href="bankt.php?id=<?php echo $id ?>">
					<img src="transfer.jpg">
					<div class="layer">
						<h3>BANK TRANSFER</h3>
					</div>
				</div>
				<div class="campus-column">
        <a href="loan.php?id=<?php echo $id ?>">
					<img src="loan.jpg">
					<div class="layer">
						<h3>LOAN</h3>
					</div>
				</div>
				<div class="campus-column">
        <a href="history.php?id=<?php echo $id ?>">
					<img src="history.jpg">
					<div class="layer">
						<h3>HISTORY</h3>
					</div>
				</div>
			</div>
</section>


  </body>
</html>

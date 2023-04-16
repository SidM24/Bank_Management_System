<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $conn = mysqli_connect('localhost', 'id20545063_root', 'ggLU1R88c$-ih{2r', 'id20545063_login') or die("connection failed:" . mysqli_connect_error());

    $id = $_GET['id'];

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>transaction successfull</h1>
    <h1><a href="main.php?id=<?php echo $id ?>"> HOME</h1>
</body>
</html>
<!-- Signip php -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $conn = mysqli_connect('localhost', 'id20545063_root', 'ggLU1R88c$-ih{2r', 'id20545063_login') or die("connection failed:" . mysqli_connect_error());

    if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["first_name"]) && isset($_POST["last_name"])
        && isset($_POST["mobile_number"]) && isset($_POST["street"]) && isset($_POST["city"])) {

        $email = $_POST["email"];
        $password = $_POST["password"];
        $mobile_number = $_POST["mobile_number"];
        $street = $_POST["street"];
        $city = $_POST["city"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $type = "customer";

        $sql = "INSERT INTO `login` (`email`, `password`, `firstname`, `lastname`, `mobile`, `street`, `city`, `type`) 
        VALUES ('$email', '$password', '$first_name', '$last_name', '$mobile_number', '$street', '$city', '$type')";
$query = mysqli_query($conn, $sql);

$sql2 = "SELECT `ID` FROM `login` WHERE `email`='$email'";
$query2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($query2);
$id = $row['ID'];

$sql1 = "INSERT INTO `account` (`id`, `email`, `firstname`, `lastname`)
        VALUES ('$id', '$email', '$first_name', '$last_name')";
$query1 = mysqli_query($conn, $sql1);


        if ($query) {
            echo 'Entry Success';
        } else {
            echo 'Error';
        }
    }
    else{
        echo 'ERROR';
    }
}
?>

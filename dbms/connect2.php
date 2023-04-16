<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit1'])) {
    $conn = mysqli_connect('localhost', 'id20545063_root', 'ggLU1R88c$-ih{2r', 'id20545063_login') or die("connection failed:" . mysqli_connect_error());

    if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["login-as"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $type = $_POST["login-as"];

        $sql = "select * from login where email='$email' and password='$password' and type='$type'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                // Redirect to another page
                $row = mysqli_fetch_assoc($result);
                header("Location: main.php?id=".$row['ID']);
                exit();
            } else {
                echo 'Invalid email/password/account type';
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo 'ERROR';
    }
}

?>

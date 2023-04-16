<?php require_once "connect2.php"?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        LOGIN
    </title>
    <link rel="stylesheet" type="text/css" href="styles1.css">  
</head>
<body>
    <div  class="log-prompt">
                <div class="log-box">
                        <form method="post" action="">
                            <label for="email">email:</label>
                            <input type="text" id="email" name="email"required><br>
        
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password"required><br>
                            <label for="login-as">Login as:</label>
                            <select id="login-as" name="login-as"required>
                            <option value="customer">Customer</option>
                             <option value="admin">Admin</option>
                             </select><br>
                             <button class="log-button" type="submit" name="submit1">Submit</button>
                        </form>
                        <p class="register"><a href="register.php">register new account</a></p>
                    </div>


</div>

<script>
    // Focus on the email input when the page loads
    window.onload = function() {
        document.getElementById("email").focus();
    }
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Materilize -->
    <link rel="stylesheet" href="css/materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">

    <!-- My Style -->
    <link rel="stylesheet" href="css/signin.css">
</head>

<body class="login-body">
    <div class="container">
        <div class="row login-box">
            <h2 class="logo-title center white-text">Company Logo</h2>
            <div class="col s12 card">
                <h4 class="center">ثبت نام</h4>
                <?php
                    require('db.php');
                    // When form submitted, insert values into the database.
                    if (isset($_REQUEST['username'])) {
                        // removes backslashes
                        $username = stripslashes($_REQUEST['username']);
                        //escapes special characters in a string
                        $username = mysqli_real_escape_string($con, $username);
                        $email    = stripslashes($_REQUEST['email']);
                        $email    = mysqli_real_escape_string($con, $email);
                        $password = stripslashes($_REQUEST['password']);
                        $password = mysqli_real_escape_string($con, $password);
                        $create_datetime = date("Y-m-d H:i:s");
                        $query    = "INSERT into `users` (username, password, email, create_datetime)
                                    VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
                        $result   = mysqli_query($con, $query);
                        if ($result) {
                            echo "<div class='form'>
                                <h3>You are registered successfully.</h3><br/>
                                <p class='link'>Click here to <a href='login.php'>Login</a></p>
                                </div>";
                        } else {
                            echo "<div class='form'>
                                <h3>Required fields are missing.</h3><br/>
                                <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                                </div>";
                        }
                    } else {
                ?>
                <form method="post">
                    <label for="fullname">نام کاربری</label>
                    <input name="username" class="login" type="text" id="fullname" placeholder="نام کاربری" required>
                    <br>
                    <label for="email">ایمیل</label>
                    <input name="email" class="login" type="email" id="email" placeholder="ایمیل" required>
                    <br>
                    <label for="password">گذرواژه</label>
                    <input name="password" class="login" type="password" id="password" placeholder="گذرواژه" required>
                    <br>
                    <input type="submit" name="submit" value="ثبت نام" class="btn blue">
                </form>
                <?php
    }
?>
                <div class="center">
                    <p></p><a class="grey-text" href="login.php"> قبلا حساب ساختم <i
                            class="fa fa-arrow-alt-circle-left"></i></a></p>
                </div>
                <div class="center login-with">
                    <button class="btn-floating red"><i class="fab fa-google"></i></button>
                    <button class="btn-floating blue"><i class="fab fa-facebook"></i></button>
                    <button class="btn-floating black"><i class="fab fa-github"></i></button>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery -->
    <script src="js/jquery-3.5.1.js"></script>
    <!-- Materilize -->
    <script src="css/materialize/js/materialize.min.js"></script>
    <!-- Font Awesome -->
    <script src="css/fontawesome/js/all.js"></script>
</body>

</html>
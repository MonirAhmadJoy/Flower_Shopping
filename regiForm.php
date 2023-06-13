<?php
session_start();
require_once './dbconn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require('phpMailer/Exception.php');
require('phpMailer/PHPMailer.php');
require('phpMailer/SMTP.php');


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if (isset($_POST['sign_up'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $birthdate = $_POST['birthdate'];

    $email_check = mysqli_query($link, "SELECT * FROM user WHERE email='$email';");
    if (mysqli_num_rows($email_check) == 0) {
        if (strlen($password) > 5) {
            if ($password == $c_password) {
                $password = md5($password);
                $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                $query = "INSERT INTO `user`(`name`, `email`, `password`,`verification_code`,`email_verified_at`) VALUES ('$name','$email','$password','$verification_code',NULL);";
                $result = mysqli_query($link, $query);
                if ($result) {
                    $q = mysqli_query($link, "SELECT * FROM `user` WHERE `email`='$email';");
                    $rr = mysqli_fetch_assoc($q);
                    $user_id = $rr['user_id'];
                    $_SESSION['user_login'] = $user_id;
                    try {
                        //Server settings                    //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'ahmadmonir7394@gmail.com';                     //SMTP username
                        $mail->Password   = 'ftwczoecuuioakak';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('ahmadmonir7394@gmail.com', 'Flower Shop Authority');
                        $mail->addAddress($email);     //Add a recipient

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'About the email verificaton code';
                        $mail->Body    = '<h2>Thanks for registration.</h2> <br> click <a href="http://localhost/Flower_Shopping/verifyemail.php?id=' . base64_encode($email) . ';">here</a> to verify the email address';

                        $mail->send();
                        $_SESSION = array();
                        session_destroy();
                        $encodedId = base64_encode("a");
                        header("location: verifyemail.php?id=" . $encodedId);
                        exit();
                    } catch (Exception $e) {
                        echo "<script>alert('Message could not be sent. Mailer Error')</script>";
                    }
                    // header('location:index.php');
                } else {
                    echo "<script>alert('There is an error to insert data to database')</script>";
                }
            } else {
                $password_not_match = "password doesn't matched";
            }
        } else {
            $password_l = "password should be more than 5 character";
        }
    } else {
        $email_error = "This email address is already exists";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/signupFormSt.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        #submit:disabled {
            background-color: red;
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <div class="loginForm">
        <div class="login-main">
            <div class="login-header">
                <h3>Register Here</h3>
            </div>
            <!--<form action="wel.php" method="post">-->
            <div class="row">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- <div class="login-text">-->
                    <!-- <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php if (isset($name)) {
                                                                                                            echo $name;
                                                                                                        } ?>" required>
                    </div> -->
                    <div class="form-outline">
                        <span id="check-username"></span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" onInput="checkUsername()" />
                        <!-- <label class="form-label" for="username">Username</label>      -->
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if (isset($email)) {
                                                                                                                echo $email;
                                                                                                            } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if (isset($password)) {
                                                                                                                        echo $password;
                                                                                                                    } ?>" required>


                    </div>
                    <div class="form-group">
                        <input type="password" name="c_password" class="form-control" placeholder="Confirm Password" value="<?php if (isset($c_password)) {
                                                                                                                                echo $c_password;
                                                                                                                            } ?>" required>

                    </div>

                    <div class="form-group">
                        <input type="text" name="birthdate" id="birthdate" class="form-control" placeholder="Birthdate" readonly required>
                    </div>

                    <div class="form-group">
                        <input id="submit" type="submit" name="sign_up" value="Sign Up" class="btn btn-primary" />
                    </div>
                </form>

                <div class="error">
                    <?php
                    if (isset($email_error)) {
                        echo $email_error;
                    } else {
                        if (isset($password_l)) {
                            echo $password_l;
                        } else {
                            if (isset($password_not_match)) {
                                echo $password_not_match;
                            }
                        }
                    }

                    ?>

                </div>

            </div>

            <div class="login-signup-option">
                <h6>Already have an account? <a href="login.php">Log in</a></h6>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        function checkUsername() {

            jQuery.ajax({
                url: "check_availability.php",
                data: 'username=' + $("#username").val(),
                type: "POST",
                success: function(data) {
                    $("#check-username").html(data);
                },
                error: function() {}
            });
        }
        $(document).ready(function() {
        $("#birthdate").datepicker({
            dateFormat: "yy-mm-dd",
            // Add any other options you need
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
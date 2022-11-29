<?php
session_start();
require_once './dbconn.php';
if (isset($_POST['sign_up'])) {
    
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    

    $email_check = mysqli_query($link, "SELECT * FROM user WHERE email='$email';");
    if (mysqli_num_rows($email_check) == 0) {
        if (strlen($password) > 5) {
            if ($password == $c_password) {
                $password = md5($password);
                $query = "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$name','$email','$password');";
                $result = mysqli_query($link, $query);
                if ($result) {
                    $q=mysqli_query($link,"SELECT * FROM `user` WHERE `email`='$email';");
                    $rr=mysqli_fetch_assoc($q);
                    $user_id=$rr['user_id'];
                    $_SESSION['user_login'] = $user_id;
                    header('location:index.php');
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
    <style>
        #submit:disabled{
       background-color: red;
      opacity:0.5;   
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
                      <input type="text" name="username" id="username" class="form-control" placeholder="Username" onInput="checkUsername()"/>
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

<script>
function checkUsername() {
    
    jQuery.ajax({
    url: "check_availability.php",
    data:'username='+$("#username").val(),
    type: "POST",
    success:function(data){
        $("#check-username").html(data);
    },
    error:function (){}
    });
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
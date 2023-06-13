<?php
 require_once './dbconn.php'; 
    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];
 
        // mark email as verified
        $query = mysqli_query($link,"UPDATE user SET 'email_verified_at' = NOW() WHERE 'email' = '$email' AND 'verification_code' = '$verification_code';");
        
        if (mysqli_affected_rows($link) == 0)
        {
            die("Verification code failed.");
        }
 
        echo "<p>You can login now.</p>";
        exit();
    }
 
?>
<form method="POST">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="text" name="verification_code" placeholder="Enter verification code" required />
 
    <input type="submit" name="verify_email" value="Verify Email">
</form>
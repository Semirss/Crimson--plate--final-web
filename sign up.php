<?php
require_once 'session.php';
require_once 'signupview.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    
    <link rel="stylesheet" href="sign up.css">
</head>
<body>
    <!-- <video src="BLÜ_EYES_-_you'd_never_know_(Official_Music_Video)(480p).mp4" muted autoplay loop></video> -->
    <div class="container">
        <div class="sign-up-box">
            <h1>Sign Up</h1>
            <form action="function.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Sign Up</button>
            </form><?php

check_signup_errors();
?>
            <div class="delete-box">
            <h1>delete account</h1>
            <form action="userdelete.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                
                <button >Delete</button>
            </form>
        </div>
    </div>
    
</body>
</html>

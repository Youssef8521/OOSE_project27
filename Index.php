<?php

class loginView{
<!DOCTYPE html>
<html>
    <head>
        <title> Login </title>
    </head>
    <body>
        <center>
            <h1>Welcome</h1>
            <div class ="floating-box"></div>
            <form name = "form1" method="post" action="login/run"></form>
            <label for = "user_name"> Username </label>
            <input type="text" id="user_name" name="user_name"><br><br>
            <label for="password">Password</label>
            <input type="text" id="password" name ="password"><br><br>
            <input type="submit" id="submit" name ="submit" value="login"><br><br>
            <p>New User <a href="signup.php">Register Here</a></p>
        </center>
    </body>
</html>
}
?>
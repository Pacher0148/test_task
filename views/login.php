<?php
    header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/views/css/style.css">
    </head>

    <body>
        <div class="loginForm">
            <form action="/config/routing.php?file=loginController&action=loginAction" method="POST">
                <div class="col-xs-10">
                    <h2> Hello there! </h2>
                </div>
                <div class="col-xs-4">
                    <label for="login">Login</label>
                    <input id="login" type="text" name="username" class="form-group">
                </div>
                <div class="col-xs-6">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="userpass" class="form-group">
                </div>
                <div class="col-xs-10">
                    <button class="btn btn-success" type="submit">LogIn</button>
                    <span class="errorData"><?php if ($error != 'none') { echo $error; } ?></span>
                </div>
            </form>
        </div>
        <div class="userData">
            <ul>
                <li>user1 -> pass1</li>
                <li>user2 -> pass2</li>
                <li>user3 -> pass3</li>
            </ul>
        </div>
    </body>
</html>
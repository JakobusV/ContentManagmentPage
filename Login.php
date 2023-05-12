<?php
include_once "header.php";
include_once "loginCSS";
include_once "utility.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HTML, CSS and JavaScript demo</title>
        <link rel="stylesheet" href="loginCSS.php"/>
    </head>

    <body class="background">
        <div class="loginBlock">
            <h1>Login</h1>
            <p class="loginBlockItem">Email</p>
            <input id="emailId" class="loginBlockItem" type="text" placeholder="✉️Type your email here" />
            <p class="loginBlockItem">Password</p>
            <input id="passwordId" class="loginBlockItem passwordBottom" type="text" placeholder="🔒Type your password here" />
            <button class="loginBtn" onclick="LoginFunc()">Login</button>
        </div>
    </body>

    <script>
        var request = new XMLHttpRequest();

        function LoginFunc() {
            #console.log(document.getElementById("emailId").value)
            #console.log(document.getElementById("passwordId").value)
            var email = document.getElementById("emailId").value;
            var password = document.getElementById("passwordId").value;

        }
    </script>

    <?php
        function LoggedInConfirmed($email, $password, $auth) {
            if(!isset($_SESSION[$email])){
                CreateSession("current_user", array('email'=>$email, 'password'=>$password, 'auth'=>$auth));
            } else {
                //TODO: Handle re-login
            }
        }

        function GetUserPreferences() {
            //TODO: Get user preference style from endpoint
            $styleName = "user_preferences";
            CreateCookie("user_style_pref", $styleName, 100000);
        }

        function LoggedOut(){
            if(isset($_SESSION["current_user"])){
                DestroySession("current_user");
            }

            if(isset($_COOKIE["user_style_pref"])){
                KillCookie("user_style_pref");
            }
        }
    ?>

</html>
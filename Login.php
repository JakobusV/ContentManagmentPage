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
            <input id="passwordId" class="loginBlockItem passwordBottom" type="password" placeholder="🔒Type your password here" />
            <button class="loginBtn" onclick="LoginFunction()">Login</button>
            <p class="loginBlockItem" id="loginMessage">Fucker<p/>
        </div>
    </body>
</html>

<script>
    var request = new XMLHttpRequest();

    function LoginFunction(){
        console.log(document.getElementById("emailId").value)
        console.log(document.getElementById("passwordId").value)

        var email = document.getElementById("emailId").value;
        var password = document.getElementById("passwordId").value;
        var body = '{"userEmail":"'+email+'", "userPassword":"'+password+'"}'

        request.open('POST', '../Backend/endpoints/sqlGetMatchingUser.php')
        request.send(body)
        request.onload = OnLoadJson

    }

    function OnLoadJson(evt) {
        var response;
        var data;

        response = request.responseText;

        if (response == "No Mathing Users") {
            const loginMessagePTag = document.getElementById('loginMessage');
            loginMessagePTag.innerHTML = 'Login Failed!';
        }
        else {
            window.location.href = 'contentPage.php';
        }    
    }

</script>
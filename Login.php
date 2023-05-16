<?php
include_once "header.php";
include_once "loginCSS";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Content Management Login</title>
        <link rel="stylesheet" href="loginCSS.php"/>
    </head>

    <body>
        <div class="loginBlock">
            <h1>Login</h1>
            <p class="loginBlockItem">Email</p>
            <input id="emailId" class="loginBlockItem" type="text" placeholder="✉️Type your email here" />
            <p class="loginBlockItem">Password</p>
            <input id="passwordId" class="loginBlockItem passwordBottom" type="password" placeholder="🔒Type your password here" />
            <button class="loginBtn" onclick="LoginFunction()">Login</button>
            <p class="loginBlockItem" id="loginMessage"></p>
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

        var response = request.responseText;

        if (response === "No Matching Users") {
            const loginMessagePTag = document.getElementById('loginMessage');
            loginMessagePTag.innerHTML = 'Login Failed!';
        } else {
            var json = JSON.parse(response)
            var email = json[0].email
            var password = json[0].password
            var isAdmin = json[0].isAdmin

            var body = '{"userEmail":"'+email+'", "userPassword":"'+password+'", "isAdmin":"'+isAdmin+'"}'

            request.open('POST', '../Backend/endpoints/LoginHelper.php')
            request.send(body)

            window.location.href = "contentPage.php"
        }
    }

</script>
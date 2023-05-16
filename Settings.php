<?php
include_once "header.php";
include_once "SettingCSS";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Content Management Login</title>
    <link rel="stylesheet" href="SettingCSS.php" />
</head>

<body>
    <div class="settingBlock">
        <h1>Style Settings</h1>
        <button class="StyleButton1 SettingBlockItem" onclick="SetPreferance(this)">Style 1</button>
        <button class="StyleButton2 SettingBlockItem" onclick="SetPreferance(this)">Style 2</button>
        <button class="StyleButton3 SettingBlockItem" onclick="SetPreferance(this)">Style 3</button>
        <button class="ApplyButton" onclick="Back()">Content Page</button>
        <p class="SettingBlockItem" id="MessageOutput"></p>
    </div>
</body>
</html>

<script>
    var request = new XMLHttpRequest();

    function SetPreferance(button) {
        var body;

        switch (button.innerHTML) {
            case "Style 1":
                body = '{"styleFilePath":"styleVariant1.php"}'
                SendChanges(body)
                break;
            case "Style 2":
                body = '{"styleFilePath":"styleVariant2.php"}'
                SendChanges(body)
                break;
            case "Style 3":
                body = '{"styleFilePath":"styleVariant3.php"}'
                SendChanges(body)
                break;
            default:
                body = '{"styleFilePath":"styleDefault.php"}'
                SendChanges(body)
                break;
        }
        return body
    }

    function SendChanges(body) {
        const messageOutput = document.getElementById('MessageOutput');
        messageOutput.innerHTML = 'Style Changed!';

        request.open('POST', '../Backend/endpoints/styleHelper.php')
        request.send(body)
    }

    function Back() {
        window.location.href = "contentPage.php"
    }
</script>
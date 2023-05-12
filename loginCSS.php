<?php
header("Content-type: text/css");
?>

.loginBlock {
    display: flex;
    flex-direction: column;
    width: 300px;
    height: fit-content;
}

body {
    background-image: url(https://c4.wallpaperflare.com/wallpaper/46/800/989/skull-fire-flame-dark-wallpaper-preview.jpg);
    display: flex;
    align-content: center;
    justify-content: center;
    align-items: center;
}

h1 {
    align-self: center;
    color: #F5F5F5;
    font: 50px Arial, sans-serif;
    margin: 10px;
    margin-bottom: 0px;
}

p {
    font: 18px Arial, sans-serif;
    color: #F5F5F5;
}

.loginBtn {
    align-self: center;
    border-radius: 20px;
    border: 0px;
    color: Black;
    font-size: 20px;
    margin: 10px;
    width: 200px;
    background: rgb(236, 255, 47);
    background: linear-gradient(0deg, rgba(236, 255, 47, 1) 0%, rgba(255, 141, 0, 1) 50%, rgba(255, 0, 0, 1) 100%);
}

.loginBtn:hover {
    background: rgb(0,255,249);
    background: linear-gradient(0deg, rgba(0,255,249,1) 0%, rgba(29,49,253,1) 50%, rgba(76,0,182,1) 100%);
    cursor: pointer;
}

.loginBlockItem {
    align-self: center;
    border-left: 0;
    border-right: 0;
    border-top: 0;
    margin-bottom: 10px;
    width: 200px;
    color: #F5F5F5
}

input {
    background: #FFFFFF00;
}
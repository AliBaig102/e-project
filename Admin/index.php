<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Admin</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="container">
    <form action="">
        <abbr>
            <img src="images/logo.png" alt="">
        </abbr>
        <div>
            <iconify-icon icon="mingcute:user-2-fill"></iconify-icon>
            <input type="text" placeholder="Enter Username or Email">
        </div>
        <div>
            <iconify-icon icon="material-symbols:lock"></iconify-icon>
            <input type="password" placeholder="Enter Password">
            <iconify-icon icon="iconoir:eye" class="showPassword"></iconify-icon>
        </div>
        <a href="#forgetPassword" class="forgetPassword">Forgot Password?</a>
        <button>
            <iconify-icon icon="material-symbols:login"></iconify-icon>
            Login
        </button>
    </form>
</div>
<div class="popup_container">
    <div class="popup">
        <div class="popup_head">
            <h1>Forgot Password</h1>
            <iconify-icon icon="material-symbols:close"></iconify-icon>
        </div>
        <div class="popup_body">
            <form>
                <div class="input-group">
                    <iconify-icon icon="material-symbols:mail"></iconify-icon>
                    <input type="text" id="category_name" placeholder="Enter Your Email">
                </div>
                <div class="button-group">
                    <button id="send_email">
                        <iconify-icon icon="ic:round-send"></iconify-icon>
                        <span>Send</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<ul class="notifications"></ul>
</body>
</html>
<?php
require_once "_partials/iconfiy-icon.php";
?>
<script src="js/_partials/theme.js"></script>
<script type="module">
    import {showPopup,hidePopup} from "./js/_partials/popup.js";
    import {notifications} from "./js/_partials/error.js";
    import togglePassword from "./js/_partials/togglePassword.js";

    const forgetPasswordBtn=document.querySelector(".forgetPassword");
    const popupContainer=document.querySelector(".popup_container");
    forgetPasswordBtn.addEventListener("click",()=>{
        showPopup(popupContainer);
    })
    const closePopup=document.querySelector(".popup_head > iconify-icon");
    closePopup.addEventListener("click",()=>{
        hidePopup(popupContainer);
    })
    popupContainer.addEventListener("click",(e)=>{
        if(e.target===e.currentTarget)hidePopup(popupContainer);
    })
    const sendEmailBtn=document.querySelector("#send_email");
    sendEmailBtn.addEventListener("click",(e)=>{
        e.preventDefault();
        notifications("Check your email for password reset link","info");
    })
    const showPassword=document.querySelector(".showPassword");
    togglePassword(showPassword);
</script>

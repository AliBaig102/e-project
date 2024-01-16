<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="logo">
            <strong>LOGO</strong>
        </div>
        <form action="">
            <iconify-icon icon="ic:round-search"></iconify-icon>
            <input type="text" id="navbar-search-input" placeholder="Search">
            <iconify-icon  icon="uil:times" class="nav_search_times"></iconify-icon>
            <button class="dflex"><iconify-icon icon="mingcute:arrow-right-fill"></iconify-icon></button>
        </form>
        <ul>
            <li class="navbar-cart">
                <iconify-icon icon="bitcoin-icons:cart-outline" data-cart-count="0"></iconify-icon>
            </li>
            <li class="login">
                <iconify-icon icon="solar:login-broken"></iconify-icon>
                <span>Login</span>
            </li>
            <li class="signup">
                <iconify-icon icon="ic:outline-person-add"></iconify-icon>
                <span>Sign Up</span>
            </li>
<!--            <li class="navbar-user">-->
<!--                <iconify-icon icon="solar:user-broken"></iconify-icon>-->
<!--                <ul>-->
<!--                    <li class="navbar-user-info">-->
<!--                        <img src="https://images.unsplash.com/photo-1639149888905-fb39731f2e6c?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">-->
<!--                        <h2>Ali Baig</h2>-->
<!--                        <span>baiga8424@gmail.com</span>-->
<!--                    </li>-->
<!--                    <li class="theme-btn">-->
<!--                        <iconify-icon icon="akar-icons:moon"></iconify-icon>-->
<!--                        <span>Dark Mode</span>-->
<!---->
<!--                    </li>-->
<!--                    <li class="theme-btn">-->
<!--                        <iconify-icon icon="akar-icons:sun"></iconify-icon>-->
<!--                        <span>Light Mode</span>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <iconify-icon icon="solar:delivery-broken"></iconify-icon>-->
<!--                        <span>Delivery Address</span>-->
<!--                    </li>-->
<!--                    <li class="logout">-->
<!--                        <iconify-icon icon="ic:outline-logout"></iconify-icon>-->
<!--                        <span>Logout</span>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
        </ul>
    </nav>
    <div class="popup_container loginPopup">
        <div class="popup">
            <div class="popup_head">
                <h1>Login</h1>
                <iconify-icon icon="material-symbols:close"></iconify-icon>
            </div>
            <div class="popup_body">
                <form>
                    <div class="input-group">
                        <iconify-icon icon="material-symbols:mail"></iconify-icon>
                        <input type="text" id="username-login-input" placeholder="Enter username or email">
                    </div>
                    <div class="input-group">
                        <iconify-icon icon="material-symbols:lock"></iconify-icon>
                        <input type="password" id="password-login-input" placeholder="Enter password">
                        <iconify-icon icon="iconoir:eye" class="show-password show-password-login-icon"></iconify-icon>
                    </div>
                    <div class="button-group">
                        <button>
                            <iconify-icon icon="material-symbols:login"></iconify-icon>
                            <span>login</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="popup_container signupPopup">
        <div class="popup">
            <div class="popup_head">
                <h1>Sign Up</h1>
                <iconify-icon icon="material-symbols:close"></iconify-icon>
            </div>
            <div class="popup_body">
                <form>
                    <label for="signup-file-input">
                        <img src="" alt="">
                    </label>
                    <input type="file" id="signup-file-input" hidden>
                    <div class="input-group">
                        <iconify-icon icon="solar:user-bold"></iconify-icon>
                        <input type="text" id="username-signup-input" placeholder="Enter username">
                    </div>
                    <div class="input-group">
                        <iconify-icon icon="material-symbols:mail"></iconify-icon>
                        <input type="text" id="email-signup-input" placeholder="Enter email">
                    </div>
                    <div class="input-group">
                        <iconify-icon icon="material-symbols:lock"></iconify-icon>
                        <input type="password" id="password-signup-input" placeholder="Enter password">
                        <iconify-icon icon="iconoir:eye" class="show-password show-password-signup-icon"></iconify-icon>
                    </div>
                    <div class="input-group">
                        <iconify-icon icon="material-symbols:lock"></iconify-icon>
                        <input type="password" id="confirm-password-signup-input" placeholder="Enter password again">
                        <iconify-icon icon="iconoir:eye" class="show-password show-password-signup-icon"></iconify-icon>
                    </div>
                    <div class="button-group">
                        <button>
                            <iconify-icon icon="material-symbols:login"></iconify-icon>
                            <span>sign in</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<script src="Admin/js/_partials/theme.js"></script>
<script type="module">
    import {showPopup,hidePopup} from "./Admin/js/_partials/popup.js";
    import togglePassword from "./Admin/js/_partials/togglePassword.js";
    togglePassword(document.querySelector(".show-password-login-icon"));
    document.querySelectorAll(".show-password-signup-icon").forEach(icon=>{
        togglePassword(icon);
    })
    const navbarSearchInput = document.querySelector('#navbar-search-input');
    const navbarSearchInputClear = document.querySelector('.nav_search_times');
    navbarSearchInput.addEventListener('input', e=>{
        if (e.target.value.length > 0){
            navbarSearchInputClear.style.display = 'block';
        }else {
            navbarSearchInputClear.style.display = 'none';
        }
    })
    navbarSearchInputClear.addEventListener('click', e=>{
        navbarSearchInput.value = '';
        navbarSearchInputClear.style.display = 'none';
    })
    const loginPopup = document.querySelector('.popup_container.loginPopup');
    const loginPopupClose = document.querySelector('.popup_container.loginPopup .popup_head > iconify-icon');
    const  loginButton=document.querySelector(".login");
    const signupPopup = document.querySelector('.popup_container.signupPopup');
    const signupPopupClose = document.querySelector('.popup_container.signupPopup .popup_head > iconify-icon');
    const signupButton=document.querySelector(".signup");
    const popupContainer=document.querySelectorAll(".popup_container");
    popupContainer.forEach(container=>{
        container.addEventListener('click', e=>{
            if (e.target.classList.contains('popup_container')){
                hidePopup(container);
            }
        })
    })
    loginButton.addEventListener('click', e=>{
        showPopup(loginPopup);
    })
    signupButton.addEventListener('click', e=>{
        showPopup(signupPopup);
    })
    loginPopupClose.addEventListener('click', e=>{
        hidePopup(loginPopup);
    })
    signupPopupClose.addEventListener('click', e=>{
        hidePopup(signupPopup);
    })
</script>
<?php
require_once "Admin/_partials/iconfiy-icon.php";
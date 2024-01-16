<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php

    if ($title!=null){
   echo $title." E-commerce";
    }else{
        echo "E-commerce";
    }
    ?>
    </title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/<?php echo $css_file ?>">
    <script src="js/_partials/table-action-btn.js" defer></script>
</head>
<body>
<header>
    <div class="logo">
        <span class="dflex"><iconify-icon class="side_bar_btn" icon="heroicons:bars-3-center-left-16-solid"></iconify-icon></span>
        <!-- <img src="" alt=""> -->
        <strong>LOGO</strong>
    </div>
    <ul>
        <li>
            <form action="">
                <iconify-icon icon="ic:round-search"></iconify-icon>
                <!--suppress HtmlFormInputWithoutLabel -->
                <input type="text" placeholder="Search..." id="searchInput"/>
                <iconify-icon  icon="uil:times" class="nav_search_times"></iconify-icon>
                <button class="dflex"><iconify-icon icon="mingcute:arrow-right-fill"></iconify-icon></button>
            </form>
        </li>
<!--        <li class="nav_setting dflex" title="Setting"><iconify-icon icon="lets-icons:setting-alt-line"></iconify-icon></li>-->
        <li class="nav_user nav_setting">
            <img src="images/logo.png" alt="">
            <ul>
                <li>
                    <img src="images/logo.png" alt="">
                    <span>baiga2424@gmail.com</span>
                </li>
                <li class="theme-btn">
                    <iconify-icon icon="akar-icons:moon"></iconify-icon>
                    <span>Dark Mode</span>

                </li>
                <li class="theme-btn">
                    <iconify-icon icon="akar-icons:sun"></iconify-icon>
                    <span>Light Mode</span>
                </li>
                <li class="logout">
                    <iconify-icon icon="ic:outline-logout"></iconify-icon>
                    <span>Logout</span>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- Side Bar And Content -->
<main class="main_container">

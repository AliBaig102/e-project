<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-COMMERCE</title>
    <link rel="stylesheet" href="css/global.css">
</head> 
<body>
    <header>
        <div class="logo">
            <span class="dflex"><iconify-icon icon="heroicons:bars-3-center-left-16-solid"></iconify-icon></span>
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
            <li class="nav_setting dflex" title="Setting"><iconify-icon icon="lets-icons:setting-alt-line"></iconify-icon></li>
            <li class="nav_user nav_setting">
                <img src="images/logo.png" alt="">
            </li>
        </ul>
    </header>
    <!-- Side Bar And Content -->
    <main class="main_container">
        <!-- Side Bar -->
        <section class="side_bar">
            <ul class="side_bar_shop_profile">
                <li>
                    <!-- Shop Avtar -->
                    <img src="images/logo.png" alt="">
                </li>
                <li>Shop Name</li>
            </ul>

            <nav class="side_bar_navigation">
                <a href="#" class="active">
                <iconify-icon icon="humbleicons:dashboard"></iconify-icon>
                <span>Dashboard</span>
                </a>
                <a href="#">
                <iconify-icon icon="ic:round-dashboard"></iconify-icon>
                <span>Dashboard</span>
                </a>
            </nav>
        </section>
        <!-- Content -->
        <section class="content_area">
           <div class="overview_container">
            <div class="child"></div>
            <div class="child"></div>
            <div class="child"></div>
            <div class="child"></div>
           </div>
           <main>
            <div class="table">
                <h1>Recent Orders</h1>
                <form action="">
                <iconify-icon icon="ic:round-search"></iconify-icon>
                    <input type="text" placeholder="Search...">
                </form>
                <table>
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                     <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td><img src="images/logo.png" alt=""></td>
                            <td id="title">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, enim, ea fugit deserunt vel ratione consequatur amet tempora possimus optio error porro voluptatum illum nostrum culpa harum impedit reprehenderit temporibus?</td>
                            <td>Rs:2000</td>
                            <td>2</td>
                            <td>12 Dec 20223</td>
                            <td>In progress</td>
                        </tr>
                    </tbody>
                 </table>
    </div>
    </main>
        </section>
    </main>
</body>
</html>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
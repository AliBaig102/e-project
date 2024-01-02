<section class="side_bar">
    <ul class="side_bar_shop_profile">
        <li>
            <!-- Shop Avtar -->
            <img src="images/logo.png" alt="">
        </li>
        <li>Shop Name</li>
    </ul>

    <nav class="side_bar_navigation">
        <a href="dasboard.php" class="<?php if ($title=="Dashboard") echo "active"?>">
            <iconify-icon icon="humbleicons:dashboard"></iconify-icon>
            <span>Dashboard</span>
        </a>
        <a href="products.php" class="<?php if ($title=="Products") echo "active"?>">
            <iconify-icon icon="ic:round-dashboard"></iconify-icon>
            <span>Products</span>
        </a>
        <a href="orders.php" class="<?php if ($title=="Orders") echo "active"?>">
            <iconify-icon icon="ic:round-dashboard"></iconify-icon>
            <span>Orders</span>
        </a>
        <a href="categories.php" class="<?php if ($title=="Categories") echo "active"?>">
            <iconify-icon icon="ic:round-dashboard"></iconify-icon>
            <span>Categories</span>
        </a>
    </nav>
</section>
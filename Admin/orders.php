<?php
$title="Orders";
$css_file="orders.css";
require "Layout/navbar.php";
require "Layout/sidebar.php";
?>
<div class="content_area">
    <div class="products_container">
        <h1>Orders List</h1>
        <div class="head_container">
<!--            <div class="table_view_container">-->
<!--                <iconify-icon class="active" icon="solar:list-broken"></iconify-icon>-->
<!--                <iconify-icon  icon="mingcute:grid-line"></iconify-icon>-->
<!--            </div>-->
            <form>
                <iconify-icon icon="ic:round-search"></iconify-icon>
                <input type="text" placeholder="Search Orders...">
            </form>
            <select>
                <option selected disabled>All Orders</option>
                <option>Pending</option>
            </select>
<!--            <button>-->
<!--                <iconify-icon icon="ic:round-plus"></iconify-icon>-->
<!--                Add Product-->
<!--            </button>-->
        </div>
        <div class="table">
            <div class="thead">
                <div class="tr">
<!--                    <div class="th"><input type="checkbox"></div>-->
                    <div class="th ">#Product Details</div>
                    <div class="th">#User Name</div>
                    <div class="th">#Address</div>
                    <div class="th">#Price</div>
                    <div class="th">#Date</div>
                    <div class="th">#Quantity</div>
                    <div class="th">#Status</div>
                    <div class="th">#Action</div>
                </div>
            </div>
            <div class="tbody">
                <?php
                for ($i=0;$i<20;$i++){
                    echo '<div class="tr">
                                
                                <div class="td details">
                                <img src="images/logo.png" alt="">
                                 <p id="title">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, enim, ea fugit deserunt vel ratione consequatur amet tempora possimus optio error porro voluptatum illum nostrum culpa harum impedit reprehenderit temporibus?</p>               
                                </div>
                                <div class="td details">
                                <img src="images/logo.png" alt="">
                                 <p id="title">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, enim, ea fugit deserunt vel ratione consequatur amet tempora possimus optio error porro voluptatum illum nostrum culpa harum impedit reprehenderit temporibus?</p>               
                                </div>
                                <div class="td details" id="title">Fb Area Block 16 Karachi</div>
                                <div class="td">Rs:2000</div>
                                <div class="td">12-23-2023</div>
                                <div class="td">03</div>
                                <div class="td">Pending</div>
                                <div class="td action" >
                                    <iconify-icon icon="mi:options-vertical"></iconify-icon>
                                    <ul>
                                        <li>
                                            <iconify-icon icon="tabler:edit"></iconify-icon>
                                            Edit Status
                                        </li>
                                        <li>
                                           <iconify-icon icon="mdi:eye-outline"></iconify-icon>
                                            View Details
                                        </li>

                                    </ul>
                                </div>
                            </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
$js_file="orders.js";
require "Layout/footer.php"
?>

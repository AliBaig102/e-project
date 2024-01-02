<?php
$title="Categories";
$css_file="categories.css";
require "Layout/navbar.php";
require "Layout/sidebar.php";
?>
<div class="content_area">
    <div class="products_container">
        <h1>Categories List</h1>
        <div class="head_container">
            <!--            <div class="table_view_container">-->
            <!--                <iconify-icon class="active" icon="solar:list-broken"></iconify-icon>-->
            <!--                <iconify-icon  icon="mingcute:grid-line"></iconify-icon>-->
            <!--            </div>-->
            <form>
                <iconify-icon icon="ic:round-search"></iconify-icon>
                <input type="text" placeholder="Search Orders...">
            </form>
<!--            <select>-->
<!--                <option selected disabled>All Orders</option>-->
<!--                <option>Pending</option>-->
<!--            </select>-->
                        <button>
                            <iconify-icon icon="ic:round-plus"></iconify-icon>
                            Add Category
                        </button>
        </div>
        <div class="table">
            <div class="thead">
                <div class="tr">
                    <div class="th"><input type="checkbox"></div>
                    <div class="th ">#Category Name</div>
                    <div class="th">#Number of Products</div>
                    <div class="th">#Action</div>
                </div>
            </div>
            <div class="tbody">
                <?php
                for ($i=0;$i<20;$i++){
                    echo '<div class="tr">
                                <div class="td"><input type="checkbox"></div>
                                <div class="td">Mens</div>
                                <div class="td">00</div>
                                <div class="td action" >
                                            <iconify-icon style="color: blue" class="action_icon" icon="tabler:edit"></iconify-icon>
                                           <iconify-icon style="color: red" class="action_icon" icon="ic:baseline-delete"></iconify-icon>
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

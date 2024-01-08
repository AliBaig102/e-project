<?php
$title="Shops";
$css_file="shops.css";
require "Layout/navbar.php";
require "Layout/sidebar.php";
?>
<div class="content_area">
    <div class="products_container">
        <h1>Shops List</h1>
        <div class="head_container">
            <!--            <div class="table_view_container">-->
            <!--                <iconify-icon class="active" icon="solar:list-broken"></iconify-icon>-->
            <!--                <iconify-icon  icon="mingcute:grid-line"></iconify-icon>-->
            <!--            </div>-->
            <form>
                <iconify-icon icon="ic:round-search"></iconify-icon>
                <input type="text" id="search_input" placeholder="Search shops...">
            </form>
                        <select>
                            <option selected disabled>verified</option>
                            <option>unverified</option>
                        </select>
<!--            <button id="popup_add">-->
<!--                <iconify-icon icon="ic:round-plus"></iconify-icon>-->
<!--                Add Category-->
<!--            </button>-->
        </div>
        <div class="shops_container">
            <?php
            for ($i = 0; $i < 10; $i++) {
                echo '<div class="shop_card">
                <div class="shop_img">
                    <img src=https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </div>
                <div class="shop_info">
                    <div class="shop_avatar">
                        <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?q=80&w=1760&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                    </div>
                    <h1>Shop Name</h1>
                    <p id="title">Shop Description</p>
                    <div>
                        <button class="verified">
                            <iconify-icon icon="material-symbols:verified-outline"></iconify-icon>
                            verified
                        </button>
                        <button class="unverified active">
                            <iconify-icon icon="material-symbols:verified-outline"></iconify-icon>
                            unverified
                        </button>
                    </div>
                </div>
            </div> ';
            }
            ?>
        </div>
    </div>
    <div class="pagination_container">
    </div>
</div>

<div class="popup_container">
    <div class="popup">
        <div class="popup_head">
            <h1>Add Category</h1>
            <iconify-icon icon="material-symbols:close"></iconify-icon>
        </div>
        <div class="popup_body">
            <form>
                <input type="hidden" id="category_id" hidden>
                <div class="input-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" id="category_name" placeholder="Enter Category Name">
                </div>
                <div class="button-group">
                    <button id="add_category" data-button="add">
                        <iconify-icon icon="ic:round-add"></iconify-icon>
                        <span>Add Category</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="popup_container delete_popup">
        <div class="popup">
            <div class="popup_head">

                <h1>Delete Category</h1>
                <iconify-icon icon="material-symbols:close"></iconify-icon>
            </div>
            <div class="popup_body">
                <iconify-icon icon="ic:outline-delete"></iconify-icon>
                <h1>Are you sure ?</h1>
                <h3> you would like to delete this category from the database? </h3>
                <h3> This action cannot be restored.</h3>
                <div class="button-group">
                    <button id="cancel-btn">
                        <iconify-icon icon="material-symbols:close"></iconify-icon>
                        <span>Cancel</span>
                    </button>
                    <button id="delete-btn">
                        <iconify-icon icon="ic:round-delete"></iconify-icon>
                        <span>Delete</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$js_file="shops.js";
require "Layout/footer.php"
?>

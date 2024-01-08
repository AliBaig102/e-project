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
                <input type="text" id="search_input" placeholder="Search Categories...">
            </form>
<!--            <select>-->
<!--                <option selected disabled>All Orders</option>-->
<!--                <option>Pending</option>-->
<!--            </select>-->
                        <button id="popup_add">
                            <iconify-icon icon="ic:round-plus"></iconify-icon>
                            Add Category
                        </button>
        </div>
        <div class="delete_container">
            <span>4 Categories Selected </span>
            <button class="delete_button">
                <iconify-icon icon="ic:round-delete"></iconify-icon>
                Delete
            </button>
        </div>
        <div class="table">
            <div class="thead">
                <div class="tr">
                    <div class="th"><input type="checkbox" id="check_all"></div>
                    <div class="th ">#Category Name</div>
                    <div class="th">#Number of Products</div>
                    <div class="th">#Action</div>
                </div>
            </div>
            <div class="tbody">
                <?php
//                for ($i=0;$i<20;$i++){
//                    echo '<div class="tr">
//                                <div class="td"><input type="checkbox"></div>
//                                <div class="td">Mens</div>
//                                <div class="td">00</div>
//                                <div class="td action" >
//                                            <iconify-icon style="color: blue" class="action_icon" icon="tabler:edit"></iconify-icon>
//                                           <iconify-icon style="color: red" class="action_icon" icon="ic:baseline-delete"></iconify-icon>
//                                </div>
//                            </div>';
//                }
//                ?>
            </div>
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
$js_file="categories.js";
require "Layout/footer.php"
?>

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
                        <button id="popup_add">
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
                <div>
                    <label for="category_name">Category Name</label>
                    <input type="text" id="category_name" placeholder="Enter Category Name">
                </div>
                <button id="add_category">
                    <iconify-icon icon="ic:round-add"></iconify-icon>
                    Add Category
                </button>
            </form>
        </div>
    </div>
</div>
<script type="module">
    import {hidePopup,showPopup} from "./js/_partials/popup.js";
    const popup = document.querySelector(".popup_container");
    const popup_close = document.querySelector(".popup_container .popup .popup_head iconify-icon");
    const popup_add = document.querySelector("#popup_add");
    popup_add.addEventListener("click",()=>{
        showPopup(popup)
    });
    popup.addEventListener("click",e=>{
        if (e.target===e.currentTarget){
            hidePopup(popup)
        }
    })
    popup_close.addEventListener("click",()=>{
        hidePopup(popup)
    });

</script>
<?php
$js_file="categories.js";
require "Layout/footer.php"
?>

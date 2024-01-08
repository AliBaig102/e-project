<?php
$title="Messages";
$css_file="messages.css";
require "Layout/navbar.php";
require "Layout/sidebar.php";
?>
<div class="content_area">
    <div class="products_container">
        <h1>Messages List</h1>
        <div class="messages_container">
            <div class="products_list_container">
                <div class="product_list">
                    <div>
                        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                    </div>
                    <h3>Product Title</h3>
                </div>
            </div>
            <div class="message_box_container">
                <div class="message_box">
                    <div class="message_head">
                        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                        <h1>Product Title</h1>  
                    </div>
                    <div class="message_body">
                        <div>
                            <div>
                                <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                <h4>username</h4>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>
                </div>
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
$js_file="shops.js";
require "Layout/footer.php"
?>

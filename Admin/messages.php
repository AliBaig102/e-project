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
                <?php
                for ($j = 0; $j < 30; $j++) {
                    echo '<div class="product_list">
                    <div>
                        <img src="images/logo.png" alt="">
                    </div>
                    <h3>Product Title</h3>
                    <span class="message"><iconify-icon icon="lets-icons:message-fill"></iconify-icon>2</span>
                    
                </div>';
                }
                ?>
                <div class="product_list">
                    <div>
                        <img src="images/logo.png" alt="">
                    </div>
                    <h3>Product Title</h3>
                </div>
            </div>
            <div class="message_box_container">
                <div class="message_box">
                    <div class="message_head">
                        <img src="images/logo.png" alt="">
                        <h1>Product Title</h1>  
                    </div>
                    <div class="message_body">
                        <?php
                        for ($i = 0; $i < 30; $i++) {
                            echo ' <div class="userMessage">
                            <div>
                                <img src="images/logo.png" alt="">
                                <h4>username</h4>
                                <i>12/12/23</i>
                                <b>
                                <iconify-icon icon="mingcute:close-fill"></iconify-icon>                                
                                </b>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Doloremque, magni! 
                            </p>
                            <hr>
                            <span>
                               <p>
                                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, asperiores debitis excepturi exercitationem nesciunt 
                               </p>
                            </span>
                            <button>
                                <iconify-icon icon="material-symbols:reply"></iconify-icon>
                                Reply
                            </button>
                            <form action="">
                                <input type="text" placeholder="Write Message">
                                <button>
                                    <iconify-icon icon="material-symbols:send"></iconify-icon>
                                </button>
                            </form>
                        </div>';
                        }
                        ?>
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
$js_file="messages.js";
require "Layout/footer.php"
?>

<?php
$title="Products";
$css_file="products.css";
require "Layout/navbar.php";
require "Layout/sidebar.php";
?>
<div class="content_area">
    <div class="products_container">
    <h1>Products List</h1>
        <div class="head_container">
            <div class="table_view_container">
                <iconify-icon class="active" icon="solar:list-broken"></iconify-icon>
                <iconify-icon  icon="mingcute:grid-line"></iconify-icon>
            </div>
            <form>
                <iconify-icon icon="ic:round-search"></iconify-icon>
                <input type="text" placeholder="Search Products...">
            </form>
            <select>
                <option selected disabled>All Products</option>
                <option>Mens</option>
            </select>
            <button>
                <iconify-icon icon="ic:round-plus"></iconify-icon>
                Add Product
            </button>
        </div>
        <div class="table">
            <div class="thead">
                <div class="tr">
                    <div class="th"><input type="checkbox"></div>
                    <div class="th">Image</div>
                    <div class="th">Title</div>
                    <div class="th">Stock</div>
                    <div class="th">Price</div>
                    <div class="th">Category</div>
                    <div class="th">Brand</div>
                    <div class="th">Date</div>
                    <div class="th">Sold</div>
                    <div class="th">Action</div>
                </div>
            </div>
            <div class="tbody">
                <?php
                for ($i=0;$i<20;$i++){
                    echo '<div class="tr">
                                <div class="td"><input type="checkbox"></div>
                                <div class="td"><img src="images/logo.png" alt=""></div>
                                <div class="td" id="title">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, enim, ea fugit deserunt vel ratione consequatur amet tempora possimus optio error porro voluptatum illum nostrum culpa harum impedit reprehenderit temporibus?</div>
                                <div class="td">in Stock(20)</div>
                                <div class="td">Rs:2000</div>
                                <div class="td">Files</div>
                                <div class="td">No Brand</div>
                                <div class="td">12/12/23</div>
                                <div class="td">03</div>
                                <div class="td action" >
                                    <iconify-icon icon="mi:options-vertical"></iconify-icon>
                                    <ul>
                                        <li>
                                            <iconify-icon icon="tabler:edit"></iconify-icon>
                                            Edit Product
                                        </li>
                                        <li>
                                            <iconify-icon icon="ic:baseline-delete"></iconify-icon>
                                            Delete Product
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
$js_file="products.js";
require "Layout/footer.php"
?>

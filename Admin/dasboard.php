<?php
$title="Dashboard";
$css_file="Dashboard";
require "Layout/navbar.php";
require "Layout/sidebar.php";
?>
        <!-- Side Bar -->

        <!-- Content -->
        <section class="content_area">
           <div class="overview_container">
            <div class="child"></div>
            <div class="child"></div>
            <div class="child"></div>
            <div class="child"></div>
           </div>
           <main>
                <div class="table_container">
                    <h1>Recent Orders</h1>
                    <form action="">
                    <iconify-icon icon="ic:round-search"></iconify-icon>
                        <input type="text" placeholder="Search...">
                    </form>
                    <div class="table">
                        <div class="thead">
                            <div class="tr">
<!--                                <div class="th"><input type="checkbox"></div>-->
    <!--                            <div class="th">Order ID</div>-->
                                <div class="th">Image</div>
                                <div class="th">Title</div>
                                <div class="th">Price</div>
                                <div class="th">Quantity</div>
                                <div class="th">Date</div>
                                <div class="th">Status</div>
                                <div class="th">Action</div>
                            </div>
                        </div>
                         <div class="tbody">
                             <?php
                             for ($i=0;$i<20;$i++){
                                 echo '<div class="tr">
    <!--                            <div class="td">1</div>-->
                                <div class="td"><img src="images/logo.png" alt=""></div>
                                <div class="td" id="title">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, enim, ea fugit deserunt vel ratione consequatur amet tempora possimus optio error porro voluptatum illum nostrum culpa harum impedit reprehenderit temporibus?</div>
                                <div class="td">Rs:2000</div>
                                <div class="td">2</div>
                                <div class="td">12/12/23</div>
                                <div class="td">In progress</div>
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
               <div class="latest_products_container">
                   <h1>Recent Products</h1>
                   <div class="container">
                       <?php
                       for ($j = 0; $j < 15; $j++) {
                           echo ' <div class="child">
                           <div>
                               <img src="images/logo.png">
                           </div>
                           <div>
                               <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, est quae reprehenderit perspiciatis officia architecto odio impedit in, aliquid quam doloribus ad quo laudantium, iusto porro saepe. Eos, ipsam natus?</h5>
                               <span>Rs:2000</span>
                           </div>
                       </div>';
                       }
                       ?>

                   </div>
               </div>
        </main>
        </section>

<?php
require "Layout/footer.php"
?>
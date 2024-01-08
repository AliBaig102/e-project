</main>
<ul class="notifications">

</ul>
</body>
</html>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="<?php echo "js/".$js_file?>" type="module"></script>
<script>
    const sideBarBtn=document.querySelector(".side_bar_btn");
    const root=document.querySelector(":root");
    let is300=true;
    sideBarBtn.addEventListener("click",()=>{
        document.querySelector(".side_bar").classList.toggle("active");
        if (is300){
            root.style.setProperty("--300px","60px");
            is300=false;
        }else {
            root.style.setProperty("--300px","clamp(200px,16vw,20rem)");
            is300=true;
        }

    })
</script>
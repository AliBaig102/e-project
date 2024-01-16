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
    document.addEventListener("click",ev => {
        if (ev.target.closest(".nav_user > img")){
            document.querySelector(".nav_user > ul").classList.toggle("active");
        }else if (!ev.target.closest(".nav_user > ul")){
            document.querySelector(".nav_user > ul").classList.remove("active");
        }
    })
    const handleColorTheme=(con,theme)=>{
        document.body.classList.toggle("dark",con);
        if(theme!=null){
            localStorage.clear();
            localStorage.setItem("theme",theme);
        }
    }
    const theme_buttons=document.querySelectorAll(".theme-btn");
    theme_buttons.forEach((btn,i)=>{
        btn.addEventListener("click",e=>{
            // document.body.classList.toggle("dark");
            theme_buttons.forEach(btn=>btn.classList.remove("active"));
            e.currentTarget.classList.add("active");
            i===0?handleColorTheme(true,"dark") : handleColorTheme(false,"light");
        })
    })

    let whatTheme=window.matchMedia("(prefers-color-scheme: dark)");
    whatTheme.addEventListener("change",e=>{
        theme_buttons.forEach(btn=>btn.classList.remove("active"));
        whatTheme.matches?handleColorTheme(true,"dark") : handleColorTheme(false,"light");
    });
    const theme=localStorage.getItem("theme");
    if(theme===null){
        if(whatTheme.matches){
           theme_buttons[0].classList.add("active");
            handleColorTheme(true,"dark");
        }else {
            theme_buttons[1].classList.add("active");
            handleColorTheme(false,"light");
        }
    }else {
        if(theme==="dark"){
            theme_buttons[0].classList.add("active");
            handleColorTheme(true,"dark");
        }else {
            theme_buttons[1].classList.add("active");
            handleColorTheme(false,"light");
        }
    }


</script>
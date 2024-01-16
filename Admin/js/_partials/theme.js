const handleColorTheme=(con,theme)=>{
    document.body.classList.toggle("dark",con);
    if(theme!=null){
        localStorage.clear();
        localStorage.setItem("theme",theme);
    }
}
let whatTheme=window.matchMedia("(prefers-color-scheme: dark)");
whatTheme.addEventListener("change",e=>{
    theme_buttons.forEach(btn=>btn.classList.remove("active"));
    whatTheme.matches?handleColorTheme(true,"dark") : handleColorTheme(false,"light");
});
const theme=localStorage.getItem("theme");
if(theme===null){
    if(whatTheme.matches){
        handleColorTheme(true,"dark");
    }else {
        theme_buttons[1].classList.add("active");
    }
}else {
    if(theme==="dark"){
        handleColorTheme(true,"dark");
    }else {
        handleColorTheme(false,"light");
    }
}
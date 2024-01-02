const table=document.querySelector(".table");
const table_view_btns=document.querySelectorAll(".table_view_container iconify-icon");
table_view_btns.forEach((btn,i)=>{
    btn.addEventListener("click",e=>{
        table_view_btns.forEach(bt=>bt.classList.remove("active"));
        if (i==0){
            e.currentTarget.classList.add("active");
            table.classList.remove("active");
        }else {
            e.currentTarget.classList.add("active");
            table.classList.add("active");
        }
    })
})
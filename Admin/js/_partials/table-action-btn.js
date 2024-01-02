
const action_btn=document.querySelectorAll(".td.action > iconify-icon");
const showAction=document.querySelectorAll(".td.action > ul");

action_btn.forEach((btn)=>{
    btn.addEventListener("click",e=>{
    showAction.forEach(ul=>{
        if (ul.previousElementSibling !=e.currentTarget){
            ul.classList.remove("active");
        }
    });
        console.log(e.target);

        e.currentTarget.nextElementSibling.classList.toggle("active");
    })
})
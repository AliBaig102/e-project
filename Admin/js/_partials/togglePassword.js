

let isShowPassword=false;

function togglePassword(element){
    element.addEventListener("click",(e)=>{
        const passwordInput=e.currentTarget.parentElement.querySelector("input");
        if(isShowPassword){
            passwordInput.setAttribute("type","password");
            e.currentTarget.setAttribute("icon","iconoir:eye");
            isShowPassword=false;
        }else {
            passwordInput.setAttribute("type","text");
            e.currentTarget.setAttribute("icon","iconoir:eye-closed");
            isShowPassword=true;
        }
    })
}
export default togglePassword
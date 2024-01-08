let isAdd=true;
function inputError(element,errorMessage,isShow=true,time=500) {
    let tag = "<error>"

    if (isAdd) {
        tag+=errorMessage + "</error>";
        element.insertAdjacentHTML("afterend", tag);
        isAdd = false;
    }else {
        if (document.querySelector("error")){
            document.querySelector("error").textContent=errorMessage;
        }
    }
    setTimeout(()=>{
        if (document.querySelector("error")){
            document.querySelector("error").textContent="";
        }
    },time);
}
function notifications(message,type="success"){
    const notification=document.querySelector(".notifications");
    let toast=document.createElement("li");
    if (type=="success"){
        toast.className="toasts success";
        toast.innerHTML=`<div>
            <iconify-icon icon="ic:round-check-circle"></iconify-icon>
            <div>
                <h3>Success</h3>
                <p>${message}</p>
            </div>
        </div>
        <button onclick="closeNotification(this)"><iconify-icon icon="material-symbols:close"></iconify-icon></button>`;
    }else if (type=="error"){
        toast.className="toasts errors";
        toast.innerHTML=`<div>
            <iconify-icon icon="material-symbols-light:error"></iconify-icon>
            <div>
                <h3>Error</h3>
                <p>${message}</p>
            </div>
        </div>
        <button onclick="closeNotification(this)"><iconify-icon icon="material-symbols:close"></iconify-icon></button>`;
    }
    notification.append(toast);
    setTimeout(()=>{
        if (document.querySelector(".toasts")){
            document.querySelector(".toasts").classList.add("hide");
            // document.querySelector(".toasts").remove();
            setTimeout(()=>{
                document.querySelector(".toasts").remove();
            },1000);
        }
    },5000)
}
function closeNotification(element){
    element.parentElement.classList.add("hide");
    element.classList.add("active");
    setTimeout(()=>{
        element.parentElement.remove();
    },1000);
}
window.closeNotification=closeNotification
export {inputError,notifications};
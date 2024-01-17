function inputError(element,errorMessage,time=5000) {
    let tag = "<error class='error'>"
    let isErrorExist = element.nextElementSibling.classList.contains("error");
    if (!isErrorExist) {
        tag+=errorMessage + "</error>";
        element.insertAdjacentHTML("afterend", tag);
    }else {
        element.nextElementSibling.innerHTML=errorMessage;
    }
    setTimeout(()=>{
        if (isErrorExist) {
            element.nextElementSibling.remove();
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
    }else if(type=="info"){
        toast.className="toasts info";
        toast.innerHTML=`<div>
            <iconify-icon icon="material-symbols-light:info"></iconify-icon>
            <div>
                <h3>Info</h3>
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
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
export {inputError};
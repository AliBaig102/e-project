
function hidePopup(element){
    element.style.background="transparent";
    setTimeout(()=>{
        element.classList.remove("active");
    },1600)
}
function showPopup(element){
    element.style.background="rgba(0, 0, 0, 0.29)";
    element.classList.add("active")
}

export {hidePopup,showPopup}
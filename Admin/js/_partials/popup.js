
function hidePopup(element){
    element.style.background="transparent";
    setTimeout(()=>{
        element.classList.remove("active");
    },1600)
}
function showPopup(element){
    element.style.background="var(--black-shadow)";
    element.classList.add("active")
}
export {hidePopup,showPopup}
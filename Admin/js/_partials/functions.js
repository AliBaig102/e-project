function Qs(selector) {
    return document.querySelector(selector);
}
function QsAll(selector) {
    return document.querySelectorAll(selector);
}
function Qs_id(selector) {
    return document.getElementById(selector);
}
function Qs_class(selector) {
    return document.getElementsByClassName(selector);
}
function log(value) {
    console.log(value);
}
const mediaQueryMax= (max)=>{
    return  window.matchMedia('(max-width:'+ max +')').matches;
}
const mediaQueryMin= (min)=>{
    return  window.matchMedia('(min-width:'+ min +')').matches;
}

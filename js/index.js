import {showPopup,hidePopup} from "../Admin/js/_partials/popup.js";
import togglePassword from "../Admin/js/_partials/togglePassword.js";
import {inputError,notifications} from "../Admin/js/_partials/error.js";
togglePassword(document.querySelector(".show-password-login-icon"));
document.querySelectorAll(".show-password-signup-icon").forEach(icon=>{
    togglePassword(icon);
})
const navbarSearchInput = document.querySelector('#navbar-search-input');
const navbarSearchInputClear = document.querySelector('.nav_search_times');
navbarSearchInput.addEventListener('input', e=>{
    if (e.target.value.length > 0){
        navbarSearchInputClear.style.display = 'block';
    }else {
        navbarSearchInputClear.style.display = 'none';
    }
})
navbarSearchInputClear.addEventListener('click', e=>{
    navbarSearchInput.value = '';
    navbarSearchInputClear.style.display = 'none';
})
const popupContainer=document.querySelectorAll(".popup_container");
const popupOpenButtons=document.querySelectorAll(".login, .signup");
const popupCloseButtons=document.querySelectorAll(".popup_container  .popup_head > iconify-icon");
popupOpenButtons.forEach((button,i)=>{
    button.addEventListener('click', e=>{
        showPopup(popupContainer[i]);
    })
})
popupContainer.forEach(container=>{
    container.addEventListener('click', e=>{
        if (e.target.classList.contains('popup_container'))hidePopup(container)
    })
})
popupCloseButtons.forEach((button,i)=>{
    button.addEventListener('click', e=>{
        hidePopup(popupContainer[i]);
    })
})
document.querySelector('#signup-popup-submit').addEventListener('click', e=>{
    e.preventDefault();
    signupFormSubmit();
})
const signupFileInput = document.querySelector('#signup-file-input');
const signupFileImage = document.querySelector('#signup-file-input-label img');

signupFileInput.addEventListener('change', e=>{
    const file = e.target.files[0];
    // Check if a file is selected
    if (file) {
        // Check if the file type is an image
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.addEventListener('load', (e) => {
                signupFileImage.src = e.target.result;
            });
        } else {
            inputError(signupFileImage.parentElement,"Please select an image file",5000);
            // Optionally, you can clear the file input or show an error message to the user.
            signupFileInput.value = '';
        }
    }
})

function signupFormSubmit(){
    let error = false;
    const username = document.querySelector('#username-signup-input');
    const email = document.querySelector('#email-signup-input');
    const password = document.querySelector('#password-signup-input');
    const confirmPassword = document.querySelector('#confirm-password-signup-input');
    if (username.value==""){
        inputError(username.parentElement,"Please enter username",5000);
        error=true;
    }else if (!username.value.match(/^[a-z]{3,16}$/)) {
        inputError(username.parentElement,"Please enter valid username username must be 3-16 characters and alphanumeric only",5000);
        error=true;
    }
    if (email.value==""){
        inputError(email.parentElement,"Please enter email",5000);
        error=true;
    }else if (!email.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
        inputError(email.parentElement,"Please enter valid email",5000);
        error=true;
    }
    if (password.value==""){
        inputError(password.parentElement,"Please enter password",5000);
        error=true;
    }else if (password.value.length < 6){
        inputError(password.parentElement,"Password must be at least 6 characters",5000);
        error=true;
    }
    if (confirmPassword.value==""){
        inputError(confirmPassword.parentElement,"Please enter password again",5000);
        error=true;
    }else if (confirmPassword.value != password.value){
        inputError(confirmPassword.parentElement,"Password does not match",5000);
        error=true;
    }
    if (signupFileInput.files.length == 0){
        inputError(signupFileImage.parentElement,"Please upload profile picture",5000);
        error=true;
    }
    if (!error){
        popupContainer[1].querySelector("form").submit();
    }

}

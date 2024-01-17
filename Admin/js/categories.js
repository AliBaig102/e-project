import crud from "./class/crud.js";
import {inputError,notifications} from "./_partials/error.js";
import {hidePopup,showPopup} from "./_partials/popup.js";

const popup = document.querySelectorAll(".popup_container");
const popup_close = document.querySelectorAll(".popup_container .popup .popup_head iconify-icon");
const popup_add = document.querySelector("#popup_add");
popup_add.addEventListener("click",()=>{
    popup[0].querySelector(".popup_head h1").innerText="Add Category";
    popup[0].querySelector(".popup_container #category_name").value="";
    let button=popup[0].querySelector(".popup_container #add_category");
    button.querySelector("span").innerText="Add Category";
    button.querySelector("iconify-icon").setAttribute("icon","ic:round-add");
    button.setAttribute("data-button","Add");
    showPopup(popup[0])
});
popup.forEach((pop,i)=>{
    pop.addEventListener("click",e=>{
        if (e.target===e.currentTarget){
            hidePopup(popup[i])
        }
    })
})
popup_close.forEach((btn,i)=>{
    btn.addEventListener("click",()=>{
        hidePopup(popup[i])
    })
})

const loadData = async (search="",page=1) => {
let tr="";
    const body=document.querySelector(".table .tbody");
    const paginationContainer=document.querySelector(".pagination_container");
    let data=await crud.selectAll("categories/selectAll.php",search,false,page);
    let categories= JSON.parse(data.split("^")[0]);
    let pagination= data.split("^")[1];
    if (categories.length > 0){
    body.innerHTML="";
        for (const category of categories) {
            tr+=`
            <div class='tr'>
                    <div class="td"><input type="checkbox" value="${category.Category_Id}" onclick="check(this)"></div>
                    <div class="td">${category.Category_Name}</div>
                    <div class="td">00</div>
                    <div class="td action" >
                            <iconify-icon onclick="editPopup(this,event,${category.Category_Id})" style="color: blue" class="action_icon" icon="tabler:edit">Edit</iconify-icon>
                           <iconify-icon onclick="deletePopup(this,event,${category.Category_Id})" style="color: red" class="action_icon" icon="ic:baseline-delete"></iconify-icon>
                    </div>
            </div>`
        }
    }else {
        tr+="<div class='tr'> <h1 style='grid-column:span 4;'>No Category Found</h1> </div>";
    }
    body.innerHTML=tr;
    paginationContainer.innerHTML=pagination;
}
loadData("",1);
const addCategory = document.querySelector("#add_category");
addCategory.addEventListener("click",async (e)=>{
    e.preventDefault();
    let isAddButton=e.currentTarget.getAttribute("data-button");
    const category_name=document.querySelector("#category_name");
    if(isAddButton==="Add"){
        if (category_name.value===""){
            inputError(category_name,category_name,"Category Name Required",true,2000);
        }else if (category_name.value.length < 3){
            inputError(category_name,category_name,"Category Name must be at least 3 characters",true,2000);
        }else {
            let data=await crud.insert("categories/insert.php",{Category_Name:category_name.value});
            if (data){
                loadData("",1);
                notifications("Category Added Successfully","success");
                hidePopup(document.querySelector(".popup_container"));
            }else {
                notifications("Error to Add Category","error");s
            }
        }
    }else if(isAddButton=="Edit"){
        const id=document.querySelector(".popup_container #category_id");
        if (category_name.value===""){
            inputError(category_name,category_name,"Category Name Required",true,2000);
        }else if (category_name.value.length < 3){
            inputError(category_name,category_name,"Category Name must be at least 3 characters",true,2000);
        }else {
            let data=await crud.update("categories/update.php",id.value,{Category_Name:category_name.value});
            if (data){
                loadData("",1);
                notifications("Category Edited Successfully","success");
                hidePopup(document.querySelector(".popup_container"));
            }else {
                notifications("Error to Edit Category","error");
            }

        }
    }
})

const search_input=document.querySelector("#search_input");
search_input.addEventListener("input",async ()=>{
    let search=search_input.value;
    loadData(search,1);
})
const editPopup = async (element,event,id)=>{
    const popup=document.querySelector(".popup_container");
    let button=popup.querySelector(".popup_container #add_category");
    const result= await crud.select("categories/select.php",{id});
    popup.querySelector(".popup_head h1").innerText="Edit Category";
    popup.querySelector(".popup_container #category_name").value=result[0].Category_Name;
    popup.querySelector(".popup_container #category_id").value=result[0].Category_Id;
    button.querySelector("span").innerText="Edit Category";
    button.querySelector("iconify-icon").setAttribute("icon","ic:round-edit");
    button.setAttribute("data-button","Edit");
    showPopup(popup);
}
window.editPopup=editPopup
const deletePopup = (element,event,id)=>{
    const popup=document.querySelector(".delete_popup");
    popup.querySelector("#delete-btn").setAttribute("data-id",id);
    showPopup(popup);
}
document.querySelector(".delete_popup #delete-btn").addEventListener("click",async (e)=>{
    const id=e.currentTarget.getAttribute("data-id");
    const result=await crud.delete("categories/delete.php",{id});
    if (result){
        hidePopup(document.querySelector(".delete_popup"));
        notifications("Category Deleted Successfully","success");
        loadData("",1);
    }else {
        notifications("Error to Delete Category","error");
    }
});
window.deletePopup=deletePopup

const pagination = (el) => {
    const start=el.getAttribute("data-pagination")
    loadData("",start);
}
window.pagination=pagination
let a=0;

const checkAll = document.querySelector("#check_all");
const delete_container=document.querySelector(".delete_container");
checkAll.addEventListener("click",()=>{
    const checks=document.querySelectorAll(".tr .td input[type=\"checkbox\"]");
    if (checkAll.checked){
        delete_container.classList.add("active");

        delete_container.querySelector("span").innerText=checks.length+" Categories Selected";
        checks.forEach(el=>{
            el.checked=true;
            a=checks.length;
        })
    }else {
        delete_container.classList.remove("active");
        checks.forEach(el=>{
            el.checked=false;
            a=0;
        })
    }
})
function check(el){
    const checks=document.querySelectorAll(".tr .td input[type=\"checkbox\"]");
    if (el.checked){
        a++;
        delete_container.classList.add("active");
    }else {
        a--;
        if (a===0){
            delete_container.classList.remove("active");
        }
    }
        delete_container.querySelector("span").innerText=a+" Categories Selected";
}
const delete_button=document.querySelector(".delete_button");
delete_button.addEventListener("click",async ()=>{
    const checks=document.querySelectorAll(".tr .td input[type=\"checkbox\"]");
    let data=[];
    checks.forEach(el=>{
        if (el.checked){
            data.push(el.value);
        }
    })
    if (data.length>0){
    const result=await crud.delete("categories/deleteAll.php",{data});
        if (result){
            delete_container.classList.remove("active");
            a=0;
            checkAll.checked=false;
            notifications("Categories Deleted Successfully","success");
            loadData("",1);
        }else {
            notifications("Error to Delete Categories","error");
        }
    }
})
window.check=check
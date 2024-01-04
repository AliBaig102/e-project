import crud from "./class/crud.js";
import {inputError} from "./_partials/error.js";
import {hidePopup,showPopup} from "./_partials/popup.js";

const loadData = async (search="",page=1) => {
let tr="";
    const body=document.querySelector(".table .tbody");
    const paginationContainer=document.querySelector(".pagination_container");
    let data=await crud.selectAll("categories/selectAll.php",search,false,page);
    let categories= JSON.parse(data.split("%")[0]);
    let pagination= data.split("%")[1];
    if (categories.length > 0){
    body.innerHTML="";
    // categories.forEach((category,i)=>{
    //     tr+=`
    //         <div class='tr'>
    //                 <div class="td"><input type="checkbox"></div>
    //                 <div class="td">${category.Category_Name}</div>
    //                 <div class="td">00</div>
    //                 <div class="td action" >
    //                         <iconify-icon data-id="${category.Category_ID}" style="color: blue" class="action_icon" icon="tabler:edit"></iconify-icon>
    //                        <iconify-icon style="color: red" class="action_icon" icon="ic:baseline-delete"></iconify-icon>
    //                 </div>
    //         </div>`
    // });
        for (const category of categories) {
            tr+=`
            <div class='tr'>
                    <div class="td"><input type="checkbox"></div>
                    <div class="td">${category.Category_Name}</div>
                    <div class="td">00</div>
                    <div class="td action" >
                            <iconify-icon onclick="editPopup(this,event,${category.Category_Id})" style="color: blue" class="action_icon" icon="tabler:edit">Edit</iconify-icon>
                           <iconify-icon style="color: red" class="action_icon" icon="ic:baseline-delete"></iconify-icon>
                    </div>
            </div>`
        }
    }else {
        tr+="<div class='tr'> <h1>No Category Found</h1> </div>";
    }
    body.innerHTML=tr;
    paginationContainer.innerHTML=pagination;
}
loadData("",1);
const addCategory = document.querySelector("#add_category");
addCategory.addEventListener("click",async (e)=>{
    e.preventDefault();
    const category_name=document.querySelector("#category_name");
    if (category_name.value===""){
        inputError(category_name,"Category Name Required",true,2000);
    }else if (category_name.value.length < 3){
        inputError(category_name,"Category Name must be at least 3 characters",true,2000);
    }else {
        let data=await crud.insert("categories/insert.php",{Category_Name:category_name.value});
        if (data){
            loadData("",1);
            hidePopup(document.querySelector(".popup_container"));
        }
    }
})
const editPopup = (element,event,id)=>{
    console.log(id);
}
const editIcon = document.querySelectorAll(".action iconify-icon:first-child");
console.log(editIcon)
import crud from "./class/crud.js";

const loadData = async (search="",page=1) => {
    let data=await crud.selectAll("categories/selectAll.php",search,false,page);
    let res= data.split("%");
    console.log(res)
}
loadData("",1);
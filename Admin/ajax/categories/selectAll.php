<?php
include "../../../Class/crud.php";
$data=json_decode(file_get_contents("php://input"),true);
if (@$data["search"] !== null && @$data["search"] !== "" &&  @$data["page"] !== null) {
$search=$data['search'];
$page=$data['page'];
}else{
    $page=1;
}
$obj = new \crudClass\crud();
$obj->select("categories","*",null,null,null,null,10,$page);
print_r($obj->stored_data);
echo "%";
$obj->advancePaginationJS("categories",null,null,null,10,$page);

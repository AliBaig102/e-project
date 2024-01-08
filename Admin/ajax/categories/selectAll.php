<?php
include "../../../Class/crud.php";
$data=json_decode(file_get_contents("php://input"),true);
if ($data["search"] !== null) {
$search=$data['search'];
$page=$data['page'];
$obj = new \crudClass\crud();
$obj->select("categories","*",null,null,"Category_Name like '%{$search}%'",null,5,$page);
$result=$obj->stored_data;
echo json_encode($result);
echo "^";
$obj->advancePaginationJS("categories",null,null,"Category_Name like '%{$search}%'",5,$page);
}

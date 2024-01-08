<?php
include "../../../Class/crud.php";
$data=json_decode(file_get_contents("php://input"),true);

if ($data["id"] !=null && $data["id"]!="" && $data["data"]["Category_Name"] !=null && $data["data"]["Category_Name"]) {
    $category_name = $data["data"]['Category_Name'];
    $id=$data["id"];
    $obj = new \crudClass\crud();
    $obj->update("categories", ["Category_Name" => $category_name],"Category_Id = $id");
    $result = $obj->stored_data[0];
    echo json_encode($result);
}
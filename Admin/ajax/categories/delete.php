<?php
include "../../../Class/crud.php";
$data=json_decode(file_get_contents("php://input"),true);
if ($data["id"] !=null && $data["id"]!="") {
    $id=$data["id"];
    $obj = new \crudClass\crud();
    $obj->delete("categories", "Category_Id = $id");
    $result = $obj->stored_data;
    echo json_encode($result);
}
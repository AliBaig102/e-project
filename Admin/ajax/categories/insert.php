<?php
include "../../../Class/crud.php";
$data=json_decode(file_get_contents("php://input"),true);
if ($data["Category_Name"] !== null && $data["Category_Name"] !== "") {
    $category_name = $data['Category_Name'];

    $obj = new \crudClass\crud();
    $obj->insert("categories", ["Category_Name" => $category_name]);
    $result = $obj->stored_data;
    echo json_encode($result);
}
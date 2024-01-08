<?php
include "../../../Class/crud.php";
$data=json_decode(file_get_contents("php://input"),true);
if ($data["data"] !== null) {
$ids=$data['data'];
$obj = new \crudClass\crud();
foreach ($ids as $id) {
$obj->delete("categories","Category_Id={$id}");
}
echo json_encode($obj->stored_data);
}

<?php
include "dbconect.php";
$id = $_GET["id"];
$query = "SELECT * FROM tododbtabel WHERE id = ?";


$users = $database->prepare($query);
$data = array($id);
$users->execute($data);
$row = $users->fetch();
$afgerond = $row['afgerond'] ;
if($afgerond==1){
    $afgerond = 0;
}else{
    $afgerond = 1;
}

$query = "UPDATE tododbtabel SET afgerond=:afgerond WHERE ID=:ID";
$insert = $database->prepare($query);
$insert->bindParam(':afgerond', $afgerond);

 $insert->bindParam(':ID', $id);
$insert->execute();
header("Location: ToDo.php");
?>
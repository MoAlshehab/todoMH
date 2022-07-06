<?php
include "dbconect.php";
//1
$incomplete = $_POST["incomplete-tasks"];
$complete = $_POST["complete-tasks"];


//3
$query = "INSERT INTO tododbtabel (Taak, Datum) values (:Taak, :Datum)";
$insert = $database->prepare($query);
$insert->bindParam(':Taak',$incomplete);
$insert->bindParam(':Datum', $complete);

//4
$insert->execute();
header("Location: ToDo.php");

?>
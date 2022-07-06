<?php
include "dbconect.php";
$id = $_GET["id"];
$query = "SELECT * FROM tododbtabel WHERE id = ?";


$users = $database->prepare($query);
$data = array($id);
$users->execute($data);
$row = $users->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Taken Wijzigen</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    

<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
    <form method = "post" action = "ToDo.php">
      <div class="container">
        <p>
      <label for="new-task">Taak Wijzigen</label>
      <input id="new-task"  name="incomplete-tasks" value="<?php echo $row['Taak'] ?>" type="text">
        </p>
 
     <div>
     <br><br><br>
        <input type="date" id="myDate"  name="complete-tasks"  value="<?php echo $row['Datum'] ?>">
<br><br>       
     </div>
     </form> 
    <input type="submit" name="edit" value="Opslaan">
</form>

</body>
</html>




<?php


if(isset($_POST['edit'])){
    $id = $_POST["id"];
    $incomplete= $_POST["incomplete-tasks"];
    $complete= $_POST["complete-tasks"];


    
    
    $query = "UPDATE tododbtabel SET Taak=:Taak, Datum=:Datum WHERE ID=:ID";
    $insert = $database->prepare($query);
    $insert->bindParam(':Taak', $incomplete);
    $insert->bindParam(':Datum', $complete);
     $insert->bindParam(':ID', $id);
    $insert->execute();
    header("Location: ToDo.php");
    //Insert query
/*
    $query = "UPDATE users SET voornaam=?, achternaam=?, email=? WHERE id=?";
	$update = $database->prepare($query);
	$data = array($voornaam, $achternaam, $email, $id);
	$update->execute($data);
    header('Location: index.php');
*/
}


?>
<!DOCTYPE html>

<html lang="en" >
  <head>
    <title>Todo App</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">  
  </head>
  <body>
    <form method = "post" action = "tododb.php">
      <div class="container">
        <p>
      <label for="new-task"><h1>TO DO APP</h1></label>
      <input id="new-task"  name="incomplete-tasks" type="text"placeholder="Voeg een item toe..."  required/> <button class="add"><input type="submit" value="Voeg"></button>
        </p>
 
     <div>
        <input type="date" id="myDate"  name="complete-tasks"  value="date"   required>
        <br/> <br/>
        <h5 id="demo"></h5>   
     </div>
     </form> 
      
      <h2>TO DO ITEMS</h2>
      
<div>
 <table>

      <?php
          include "dbconect.php";
          $query = "SELECT * FROM tododbtabel";
          $tododb = $database->prepare($query);
          $tododb->execute(array());
          $tododb->setFetchMode(PDO::FETCH_ASSOC);


          foreach($tododb as $user){
          $afgerond =  $user["afgerond"];
          $checkedAfgerond = "";
          if($afgerond==1){
           $checkedAfgerond = "checked"; 
          }

          echo "<ul>";
         // echo "<ul>" .$user["ID"]. "</ul>";
          echo "<hr>"; 
          echo "<li class='taak ".$checkedAfgerond."'>" .$user["Taak"]. "</li>";

          echo "<p class='date'>" .$user["Datum"]. "</p>";
          echo "<form method='POST'><button name='deleteTask' value='" .$user['ID']. "type='submit' class='delete' >Verwijderen</button>";

          if($afgerond==0){
            echo "<button class='edit' ><a class='btn btn-success' href='jero.php? id=".$user["ID"]."'>Wijzigen</a></button>";
          }
        
          echo "<button class='afronden' ><a class='btn btn-success' href='update.php? id=".$user["ID"]."'>Afronden</a></button>";

        }
          if(isset($_POST['deleteTask'])){
          $removetaak = $database->prepare("DELETE FROM tododbtabel WHERE Id = :id");
          $getid = $_POST['deleteTask'];
          $removetaak->bindParam("id",$getid);
          if($removetaak->execute()){
          echo '<script>alert("Weet je zeker dat je dit item wilt verwijderen?")</script>';
          header("refresh: 0");


          }else{
          echo '<script>alert("het is fout")</script>';
          }
       }

      ?>
      <br>
 </table>
</div>
    

    <br><br><br>

    <div class= "footer">
      <h4>ToDo Lijstje (HTML, CSS, Javascript) gemaakt door: <a href="http://hdabbah.nl">Hisham Dabbah</a></h4>
      <h4>Database en PHP gemaakt door: Mo. Alshehb </h4>
      <script src="scripts.js"></script>

  </body>
</html>

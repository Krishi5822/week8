<?php

require_once 'database.php';
$conn = new PDO('mysql:host=172.31.22.43;dbname=Krishi200470386', 'Krishi200470386', 'l9LG2AaPic');
?>

<?php
include_once
'shared/top.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //save form inputs into variables
$firstname = trim(filter_var($_POST['firstname'], FILTER_SANITIZE_STRING));
$lastname = trim(filter_var($_POST['lastname'], FILTER_SANITIZE_STRING));

$category = trim(filter_var($_POST['category'],FILTER_SANITIZE_STRING));
$team = trim(filter_var($_POST['team'], FILTER_SANITIZE_STRING));
$debut = trim(filter_var($_POST['debut'], FILTER_SANITIZE_NUMBER_INT));
$id = trim(filter_var($_POST['player_id'], FILTER_SANITIZE_NUMBER_INT));

//-run UPDATE statement
$sql = "UPDATE player SET firstname=:firstname, ";
$sql .= "lastname=:lastname, category=:category, team=:team, debut=:debut ";
$sql .= "WHERE player_id=:id";


    //create a command object and fill the parameters with the form VALUES

$cmd = $conn->prepare($sql);
$cmd -> bindParam(':firstname', $firstname, PDO::PARAM_STR, 50);
$cmd -> bindParam(':lastname', $lastname, PDO::PARAM_STR, 50);
$cmd -> bindParam(':category', $category, PDO::PARAM_STR, 32);
$cmd -> bindParam(':team', $team, PDO::PARAM_STR, 20);
$cmd -> bindParam(':debut', $debut, PDO::PARAM_INT);
$cmd -> bindParam(':id', $id, PDO::PARAM_INT);
//execute the command
$cmd -> execute();

header("Location: table.php");


}else if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $id = filter_var($_GET['player_id'], FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM player WHERE player_id=" . $id;
    $player = db_queryOne($sql, $conn);

    $firstname = $player['firstname'];
    $lastname = $player['lastname'];
    $category = $player['category'];
    $team = $player['team'];
    $debut = $player['debut'];
}
?>

  <h1 class="text-center mt-5">Edit data <i class="bi bi-joystick"></i></h1>

  <div class ="row mt-5 justify-content-center">
  <form class="col-6 mb-5" action="data-edit.php" method="POST">

    
  <div class="row mb-4">
    <label class="col-2 col-form-label fs-4" for="firstname">firstname</label>
    <div class="col-10">
    <input  class="form-control form-control-lg" type="text" name="firstname" value ="<?php echo $firstname;?>">
    </div>
  </div>

  <div class="row mb-4">
  <label class="col-2 col-form-label fs-4" for="lastname">lastname</label>
  <div class="col-10">
  <input  class="form-control form-control-lg" type="text" name="lastname" value ="<?php echo $lastname;?>">
  </div>
</div>

<div class="row mb-4">
<label class="col-2 col-form-label fs-4" for="category">Category</label>
<div class="col-10">
<select name="category" id="null" class="form-select form-select-lg">
<?php
        $sql = "SELECT category FROM category ORDER BY category";
        $category = db_queryAll($sql, $conn);
       
        foreach ($category as $category)
        {
            echo "<option value=" . $category["category"] . ">" . ucfirst($category["category"]);
        }
    
      ?> 
</select>
</div>
</div>

<div class="row mb-4">
<label class="col-2 col-form-label fs-4" for="team">team</label>
<div class="col-10">
<input class="form-control form-control-lg" type="text" name="team" value ="<?php echo $team;?>">
</div>
</div>

<div class="row mb-4">
<label class="col-2 col-form-label fs-4" for="debut">debut</label>
<div class="col-10">
  <input  class="form-control form-control-lg" type="text" name="debut" value ="<?php echo $debut;?>">
</div>
</div>

<div class="d-grid">
<input   class="form-control form-control-lg" type="hidden" name="player_id" value ="<?php echo $id;?>">
    <button class="btn btn-success btn-lg">Update Game</button>
</div>
</form>
</div> 
<?php
include_once
'shared/footer.php';
?>

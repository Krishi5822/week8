<?php
include_once
'shared/top.php';
$conn = new PDO('mysql:host=172.31.22.43;dbname=Krishi200470386', 'Krishi200470386', 'l9LG2AaPic');
require_once'database.php';

 ?>
  <h1 class="text-center mt-5"> Add a new game <i class="bi bi-joystick"></i></h1>

  <div class ="row mt-5 justify-content-center">
  <form class="col-6 mb-5" action="save-game.php" method="POST" novalidate>

    <div class="row mb-4">
    <label class="col-2 col-form-label fs-4" for="title">Title</label>
    <div class="col-10">
      <input required class="form-control form-control-lg" type="text" name="title">
    </div>
  </div>

  <div class="row mb-4">
  <label class="col-2 col-form-label fs-4" for="year">Year</label>
  <div class="col-10">
    <input inputmode="numeric" pattern="[0-9]{4}"class="form-control form-control-lg" type="text" name="year">
  </div>
</div>

<div class="row mb-4">
<label class="col-2 col-form-label fs-4" for="genre">Genre</label>
<div class="col-10">
  <select name="genre" id="null" class="form-select form-select-lg">
    <?php
        $sql = "SELECT genre FROM genres ORDER BY genre";
        $genres = db_queryAll($sql, $conn);
       
        foreach ($genres as $genre)
        {
          echo "<option value=" . $genre["genre"] . ">" . ucfirst($genre["genre"]);
        }
        
      ?> 
  </select>
</div>
</div>

<div class="row mb-4">
<label class="col-2 col-form-label fs-4" for="url">Url</label>
<div class="col-10">
  <input pattern="https?:\/\/.+\..+"title="Please enter a url beginning with http:// or https://" class="form-control form-control-lg" type="text" name="url">
</div>
</div>

<div class="d-grid">
    <button class="btn btn-success btn-lg">Submit</button>
</div>
</form>
</div> 
<?php
include_once
'shared/footer.php';
?>

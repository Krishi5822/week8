<?php

require_once 'database.php';
$conn = db_connect();

include_once 'shared/top.php';
 ?>


 <main class="container">
  <div class="row">
  <div class="col">
        <h1 class="mt-5 pt-5"> We are Sorry</h1>
        <p> Something unexpected just happened, Our support Team has been informed.</p>
        <a href="main.php" class="btn btn-outline-secondary">Back to Home Page</a>
  </div>
  <div class="col">
    <img src="img/3.png" alt="404 error" style="width: 700px">
  </div>
 </main>

<?php
 include_once 'shared/footer.php';
  ?>

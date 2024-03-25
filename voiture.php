<?php
    include("include/header.php");
    include("include/footer.php");
    include("include/fonction.php");

    PrintHeader(); 
    $req = requetBDD("SELECT * FROM voiture");

  foreach ($req as $v) : ?>

  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="img/<?= $v['image_path'] ?>" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?= $v['nom'] ?></h5>
      <p class="card-text">Prix : <?= $v['prix']?></p>
      <a href="#" class="btn btn-primary">Test</a>
    </div>
  </div>

<?php endforeach; 

    PrintFooter();

?>

<?php
    include("include/header.php");
    include("include/footer.php");

    PrintHeader();
    /* Connexion à une base MySQL */
    $dsn = 'mysql:dbname=projet devweb;host=localhost';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échoué : ' . $e->getMessage();
    }

    $req = "SELECT * FROM voiture";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $voiture = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php foreach ($voiture as $v) : ?>

  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="img/<?= $v['image_path'] ?>" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $v['nom'] ?></h5>
    <p class="card-text">J'aime Adrien</p>
    <a href="#" class="btn btn-primary">Test</a>
  </div>
</div>

<?php endforeach; ?>

<?php 

    PrintFooter();

?>

<?php
    include("include/header.php");
    include("include/footer.php");
    include("include/fonction.php");

    PrintHeader(); 
    $req = requetBDD("SELECT * FROM voiture");?>

<table class="voiture">  
<thead>
    <tr>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($req as $v) : ?>
      <tr>
        <td>
          <figure>
            <img src="./img/<?= $v['image_path'] ?>" alt="<?= $v['nom']?>">
            <figcaption> <?= $v['nom']?> </figcaption>
          </figure> 
        </td>
        <td><?= $v['prix'] ?>€</td>
        <td><?= $v['stock'] ?> unité(s)</td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
    PrintFooter();
?>
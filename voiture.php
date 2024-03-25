<?php
    include("include/header.php");
    include("include/footer.php");
    include("include/fonction.php");

    PrintHeader(); 
    $req = requetBDD("SELECT * FROM voiture");
?>

<script src="js/compteur.js"></script>

<table class="voiture">  
  <tbody>
    <?php foreach ($req as $v) : ?>
      <tr>
        <td>
          <a href="./img/<?= $v['image_path'] ?>" target="_blank">
            <figure>
              <img src="./img/<?= $v['image_path'] ?>" alt="<?= $v['nom']?>">
              <figcaption> <?= $v['nom']?> </figcaption>
            </figure> 
          </a>
        </td>
        <td><?= $v['prix'] ?>€</td>
        <td><?= $v['stock'] ?> unité(s)</td>
        <td>
          <div class="compteur" data-stock="<?= $v['stock'] ?>">
            <button class="btn-decre">-</button>
            <button class="btn-incre">+</button>
               <div class="quantite">0</div>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>



<?php
    PrintFooter();
?>
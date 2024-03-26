<?php
    include("include/header.php");
    include("include/footer.php");
    include("include/fonction.php");
    //TODO Faire afficher le stock que quand on clic sur le mot stock
    PrintHeader(); 
    $req = requetBDD("SELECT * FROM voiture");
?>

<script src="js/compteur.js"></script>
<script src="js/stock_restant.js"></script>

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
        <td></td> 
        <td>
          <div class="compteur" data-stock="<?= $v['stock'] ?>">
            <button class="btn-decre">-</button>
            <button class="btn-incre">+</button>
              <div class="quantite">0</div>
          </div>
          <button type="submit" class="btn">
            <span class="btn__visible">Ajouter au panier</span>
            <span class="btn__invisible"><?= $v['stock'] ?> Restant</span>
          </button>
        </td>
      </tr>  
    <?php endforeach; ?>
  </tbody>
</table>



<?php
    PrintFooter();
?>
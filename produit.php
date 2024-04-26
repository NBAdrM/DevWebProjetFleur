<?php
    include("include/header.php");
    include("include/footer.php");
    include_once("include/fonction.php");


    PrintHeader();
    
    if(isset($_GET['cat'])) {
        $categorie = $_GET['cat'];
        if($categorie === 'voiture') {
            $req = requetBDD("SELECT * FROM marchandise WHERE type='1'");
        } else if ($categorie === 'piece') {
            $req = requetBDD("SELECT * FROM marchandise WHERE type='2'");
        } else if ($categorie === 'goodies') {
            $req = requetBDD("SELECT * FROM marchandise WHERE type='3'");
        }
    }
?>

<script src="js/compteur.js"></script>
<form action="" method="POST">
  <table class="voiture">  
    <tbody>
      <?php foreach ($req as $v) : ?>
        <tr>
          <td>
            <div class=zoom>
                <a href="./img/<?= $v['image_path'] ?>" target="_blank">
                  <figure>
                    <img src="./img/<?= $v['image_path'] ?>" alt="<?= $v['nom']?>">
                    <figcaption> <?= $v['nom']?> </figcaption>
                  </figure>
                </a>
              </div>
            </div>
          </td>
          <td><?= $v['prix'] ?>€</td>
          <td></td> 
          <td>
            <div class="compteur" data-stock="<?= $v['stock'] ?>">
              <button type="button" class="btn-decre">-</button>
              <button type="button" class="btn-incre">+</button>
              <div class="quantite">0</div>
                <input class="quantite2" name="quantite" type="number" value="0" disabled/>
              </div>
            <button name="voiture" type="submit" class="btn" value="<?= $v['id'] ?>">
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
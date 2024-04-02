<?php
    include("include/header.php");
    include("include/footer.php");
    include_once("include/fonction.php");

    PrintHeader(); 

    $panier = '';
    if(isset($_POST['goddies'])){
      if(empty($_SESSION['id'])){
        header('Location: connection.php');
      }
      else{
        $result = requetBDD("INSERT INTO panier (id_user,id_ref,nb) VALUE ('".$_SESSION['id']."','".$_POST['goodies']."','".$_POST['quantite']."')");
        if ($result) {
          $panier = "<h2 class=\"conf_panier\">L'article a été ajouter a votre panier</h2>";
        }
        else{
          $panier = "<h2 class=\"conf_panier\">Un probleme est survenue</h2>";
        }
      }
    }
    $req = requetBDD("SELECT * FROM marchandise WHERE type='3'");
?>

<script src="js/compteur.js"></script>
<?= $panier ?>
<form action="" method="POST">
  <table class="voiture">  
    <tbody>
      <?php foreach ($req as $g) : ?>
        <tr>
          <td>
            <a href="./img/<?= $g['image_path'] ?>" target="_blank">
              <figure>
                <img src="./img/<?= $g['image_path'] ?>" alt="<?= $g['nom']?>">
                <figcaption> <?= $g['nom']?> </figcaption>
              </figure> 
            </a>
          </td>
          <td><?= $g['prix'] ?>€</td>
          <td></td> 
          <td>
            <div class="compteur" data-stock="<?= $g['stock'] ?>">
              <button type="button" class="btn-decre">-</button>
              <button type="button" class="btn-incre">+</button>
                <div class="quantite">0</div>
                <input class="quantite2" name="quantite" type="number" value="0" disabled/>
            </div>
            <button name="piece" type="submit" class="btn" value="<?= $g['id'] ?>">
              <span class="btn__visible">Ajouter au panier</span>
              <span class="btn__invisible"><?= $g['stock'] ?> Restant</span>
            </button>
          </td>
        </tr>  
      <?php endforeach; ?>
    </tbody>
  </table>

<?php
    PrintFooter();
?>
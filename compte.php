<?php
    include("include/header.php");
    include("include/footer.php");
    include_once("include/fonction.php");
    PrintHeader();
    if (empty($_SESSION["id"])) {
        header('Location: connection.php');
    }
    if(isset($_POST["deco"])){
        session_destroy();
        header('Location: connection.php');
    }
    $result=requetBDD("SELECT * FROM user WHERE id=".$_SESSION['id'].";");
    $row = $result->fetch_array(MYSQLI_NUM);
    $nom=$row[1];

    $result_panier=requetBDD("SELECT * FROM marchandise AS m JOIN panier AS p ON id_user='".$_SESSION['id']."' AND m.id=id_ref;");
?>
    <h2 class="bvn-compte">Bienvenue <?= $nom?></h2>

    

    <table class="voiture">
        <tbody>
            <?php foreach ($result_panier as $l) : ?>
                <tr>
                    <td>
                        <a href="./img/<?= $l['image_path'] ?>" target="_blank">
                        <figure>
                            <img src="./img/<?= $l['image_path'] ?>" alt="<?= $l['nom']?>">
                            <figcaption> <?= $l['nom']?> </figcaption>
                        </figure> 
                        </a>
                    </td>
                    <td><?= $l['prix'] ?>€</td>
                    <td><?= $l['nb'] ?></td>
                </tr>  
            <?php endforeach; ?>
        </tbody>
    </table>

    <form action="" method="POST" class="deco">
        <input type="submit" name="deco" value="deco"/>
    </form>
<?php
    PrintFooter();
?>
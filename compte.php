<?php
    include("include/header.php");
    include("include/footer.php");
    include_once("include/fonction.php");

    session_start();

    $conf="";

    if (empty($_SESSION["id"])) {
        header('Location: connection.php');
    }
    elseif(isset($_POST["deco"])){
        session_destroy();
        header('Location: connection.php');
    }
    elseif (isset($_POST["achat"])) {

        requetBDD("INSERT INTO achat (id_user, id_ref, nb, date)
        SELECT id_user, id_ref, nb, NOW()
        FROM  panier AS p
        WHERE id_user = '".$_SESSION['id']."';");

        requetBDD("UPDATE marchandise
        JOIN (
            SELECT id_ref, SUM(nb) AS total
            FROM panier
            WHERE id_user = '".$_SESSION['id']."'
            GROUP BY id_ref
        ) AS r1 ON marchandise.id = r1.id_ref
        SET marchandise.stock = marchandise.stock - r1.total;");

        requetBDD("DELETE FROM panier WHERE id_user = '".$_SESSION['id']."';");
        $conf = "<h2 class=\"conf_panier\">Votre achat est confirmer</h2>";
    }

    PrintHeader();

    $result=requetBDD("SELECT * FROM user WHERE id=".$_SESSION['id'].";");
    $row = $result->fetch_array(MYSQLI_NUM);
    $nom=$row[1];

    $result_panier=requetBDD("SELECT * FROM marchandise AS m 
    JOIN panier AS p ON id_user='".$_SESSION['id']."' AND m.id=id_ref;");
?>
    <h2 class="bvn-compte">Bienvenue <?= $nom?></h2>
    <?=$conf?>
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
                    <td>
                        <form action="" method="POST">
                            <button class="btn_sup" type="submit" name="sup" value="<?=$l['id']?>">X</button>
                        </form>
                    </td>
                </tr>  
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="btn_compte">
    <?php
        if ($result_panier->num_rows) {
            echo "
        <form action=\"\" method=\"POST\" class=\"achat\">
            <button class=\"btn_achat\" type=\"none\" name=\"achat\" value=\"true\">Acheter</button>
        </form>";
        }
    ?>

        <form action="" method="POST" class="deco">
            <button class="btn_deco" type="submit" name="deco" value="deco">Déconnexion</button>
        </form>
        <?php
        if ($row[5]) {
            echo "
            <a href=\"admin.php\">
                <button class=\"btn_deco\" type=\"submit\" name=\"deco\" value=\"deco\">Acces Commande</button>
            </a>";
        }
        ?>
    </div>

<?php
    PrintFooter();
?>

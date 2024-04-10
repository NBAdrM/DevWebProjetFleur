<?php
    include("include/header.php");
    include("include/footer.php");

    session_start();
    if (empty($_SESSION["id"])) {
        header('Location: connection.php');
    }
    $req=requetBDD("SELECT admin FROM user WHERE id='".$_SESSION['id']."';");
    $row = $req->fetch_array(MYSQLI_NUM);
    if(!$row[0]){
        header('Location: compte.php');
    }
    $_SESSION['admin']=true;
    PrintHeader();

    $result=requetBDD("SELECT a.id AS aid,a.id_user,u.nom AS unom,u.email,a.id_ref,m.nom,m.prix,a.date FROM achat AS a 
    LEFT JOIN user AS u ON u.id=a.id_user
    LEFT JOIN marchandise AS m ON m.id=a.id_ref;");
    
?>
    <script src="js/telechargementJson.js"></script>
    <table class="tab_achat">
        <thead>
            <tr>
                <td>Id commande</td>
                <td>Id utilisateur</td>
                <td>Nom utilisateur</td>
                <td>Email utilisateur</td>
                <td>Id marchandise</td>
                <td>Nom marchandise</td>
                <td>Prix</td>
                <td>Date commande</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $l) : ?>
                <tr>
                    <td>
                        <?=$l['aid']?>
                    </td>
                    <td>
                        <?=$l['id_user']?>
                    </td>
                    <td>
                        <?=$l['unom']?>
                    </td>
                    <td>
                        <?=$l['email']?>
                    </td>
                    <td>
                        <?=$l['id_ref']?>
                    </td>
                    <td>
                        <?=$l['nom']?>
                    </td>
                    <td>
                        <?=$l['prix']?>
                    </td>
                    <td>
                        <?=$l['date']?>
                    </td>
                </tr>  
            <?php endforeach; ?>
        </tbody>
    </table>
    <div align="center">
        <button class="btn_json" id="telechargerJson">Télécharger le fichier JSON</button>
    </div>
<?php
    PrintFooter();
?>
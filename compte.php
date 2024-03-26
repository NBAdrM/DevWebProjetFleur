<?php
    include("include/header.php");
    include("include/footer.php");
    include("include/fonction.php");
    PrintHeader();
    if (empty($_SESSION["id"])) {
        header('Location: connection.php');
    }
    if(isset($_POST["deco"])){
        session_destroy();
    }
    $result=requetBDD("SELECT * FROM user WHERE id=".$_SESSION['id'].";");
    $row = $result->fetch_array(MYSQLI_NUM);
    $nom=$row[1];
?>
    <h2 class="bvn-compte">Bienvenue <?php  echo $nom;?></h2>

    <form action="" method="POST" class="deco">
        <input type="submit" name="deco" value="deco"/>
    </form>
<?php

    PrintFooter();
?>
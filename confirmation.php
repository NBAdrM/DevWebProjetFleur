<?php
	if(empty($_GET['token'])){
		header('Location: connexion.php');
	}
    else{
        include "include/fonction.php";
        $token=$_GET['token'];
        //retirer les caratere speciaux 
        //$token = str_replace( array( '%', '@', '\'', ';', '<', '>', '\"',' ' ), '', $str);
	    $result = requetBDD("SELECT token FROM user WHERE token=\"".$token."\";");
        if (!empty($result)) {
            requetBDD("UPDATE user SET token = NULL WHERE token = \"".$token."\";");
            $confirmation = "Votre compte a bien été valider";
        }
    }
	include "include/header.php";
	include "include/footer.php";
    
    PrintHeader();
?>
    <h2>
        <?php 
            echo $confirmation;
        ?>
    </h2>
<?php

    PrintFooter();

?>
<?php
    include "fonction.php";
    function PrintHeader(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    

        $panier = checkPanier();

        if (empty($_SESSION['id'])) {
            $connexion="<ul class=\"connexion\">
                <li><a href=\"connection.php\">Connexion</a></li>
            </ul>";
        }
        else {
            $nb_panier='';
            include_once("fonction.php");
            $req=requetBDD("SELECT * FROM marchandise AS m JOIN panier AS p ON id_user='".$_SESSION['id']."' AND m.id=id_ref;");
            if($req->num_rows>0){
                $nb_panier="<span class=\"nb_panier\">$req->num_rows</span>";
            }
            $connexion="<ul class=\"connexion\">
                <li><a href=\"compte.php\">Panier".$nb_panier."</a></li>
            </ul>";
        }
        echo"
        <!DOCTYPE html> 
        <html>
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <link rel=\"stylesheet\" href=\"style.css\"/>
                <link rel=\"icon\" type=\"image/x-icon\" href=\"./img/logopetit.png\">
                <title>Projet</title>
            </head>
            <body>
                <header>
                    <a href=\"index.php\">
                        <h1>PORSCHE</h1>
                    </a>
                    <nav>
                        <ul>
                            <li><a href=\"index.php\">Accueil</a></li>
                            <li><a href=\"produit.php?cat=voiture\">Voiture</a></li>
                            <li><a href=\"produit.php?cat=piece\">Pièce</a></li>
                            <li><a href=\"produit.php?cat=goodies\">Goodies</a></li>
                            <li><a href=\"contact.php\">Contact</a></li>
                        </ul>
                        ".$connexion."
                    </nav>
                </header>
                <main>
                <div class=\"menu_gauche\">
                    <h2>Porsche</h2>
                    <a href=\"index.php\">Accueil</a>
                    <h3>Nos produit</h3>
                    <ul>
                    <li><a href=\"produit.php?cat=voiture\">Voiture</a></li>
                    <li><a href=\"produit.php?cat=piece\">Pièce</a></li>
                    <li><a href=\"produit.php?cat=goodies\">Goodies</a></li>
                        <li><a href=\"contact.php\">Contact</a></li>
                    </ul>
                </div>
        ".$panier;
    }

?>
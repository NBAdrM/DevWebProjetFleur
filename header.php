<?php

    function PrintHeader(){
        echo"
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <link rel=\"stylesheet\" href=\"style.css\"/>
                <title>Projet</title>
            </head>
            <body>
                <header>
                    <h1>PORSCHE</h1>
                    <nav>
                        <ul>
                            <li><a href=\"index.php\">Accueil</a></li>
                            <li><a href=\"voiture.php\">Voiture</a></li>
                            <li><a href=\"piece.php\">Pièce</a></li>
                            <li><a href=\"goodis.php\">Goodis</a></li>
                            <li><a href=\"contact.php\">Contact</a></li>
                        </ul>
                        <ul class=\"connection\">
                            <li><a href=\"connection.php\">Connection</a></li>
                        </ul>
                    </nav>
                    
                </header>
                <main>
                <div class=\"menu_gauche\">
                    <h2>Porsche</h2>
                    <a href=\"index.php\">Accueil</a>
                    <h3>Nos produit</h3>
                    <ul>
                        <li><a href=\"voiture.php\">Voiture</a></li>
                        <li><a href=\"piece.php\">Pièce</a></li>
                        <li><a href=\"goodis.php\">Goodis</a></li>
                        <li><a href=\"contact.php\">Contact</a></li>
                    </ul>
                </div>
        ";
    }

?>
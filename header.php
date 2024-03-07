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
                    <h1>Société LaFleur</h1>
                    <nav>
                        <ul>
                            <li><a href=\"index.php\">Accueil</a></li>
                            <li><a href=\"bulbes.php\">Bulbes</a></li>
                            <li><a href=\"rosiers.php\">Rosiers</a></li>
                            <li><a href=\"massifs.php\">Plantes a massif</a></li>
                            <li><a href=\"contact.php\">Contact</a></li>
                        </ul>
                    </nav>
                </header>
                <main>
                <div class=\"menu_gauche\">
                    <h2>Sté Lafleur</h2>
                    <a href=\"index.php\">Accueil</a>
                    <h3>Nos produit</h3>
                    <ul>
                        <li><a href=\"bulbes.php\">Bulbes</a></li>
                        <li><a href=\"rosiers.php\">Rosiers</a></li>
                        <li><a href=\"massifs.php\">Plantes a massif</a></li>
                        <li><a href=\"contact.php\">Contact</a></li>
                    </ul>
                </div>
        ";
    }

?>
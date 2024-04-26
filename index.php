<?php
    include("include/header.php");
    include("include/footer.php");

    PrintHeader();
?>
<div class="tete_index">
    <h1>Bienvenue sur le site officiel de</h1>
    <img src="./img/banniere" alt="bannière porsche">
</div>
<div class="index">
    <h2>Nos voitures</h2>
        <p>Explorez notre collection de voitures de sport, y compris les légendaires Porsche 911, Cayman et Panamera.</p>
        <a href="produit.php?cat=voiture">
            <button class="button">Découvrir nos voitures</button>
        </a>
    <h2>Pièces détachées</h2>
        <p>Retrouvez les pièces détachées d'origine pour entretenir votre Porsche.</p>
        <a href="produit.php?cat=voiture">
            <button class="button">Découvrir nos pièces détachées</button>
        </a>
    <h2>Goodies</h2>
        <p>Découvrez notre sélection de goodies Porsche.</p>
        <a href="produit.php?cat=voiture">
            <button class="button">Découvrir nos goodies</button>
        </a>
</div>

<?php
    PrintFooter();
?>
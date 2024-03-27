<?php
    include("include/header.php");
    include("include/footer.php");

    PrintHeader();
?>
<?php
    echo"
            <h2>Contactez-nous</h2>
            <form action=\"\" method=\"GET\">
            <div class=\"\">
                <label for=\"nom\">Nom :</label>
                <input type=\"text\" id=\"nom\" name=\"nom\">
            </div>
            <label for=\"nom\">Prénom :</label>
            <input type=\"text\" id=\"nom\" name=\"nom\"><br>
            <p>Genre :
                <input type=\"radio\">
                <label for=\"nom\">Feminin </label>
                <input type=\"radio\">
                <label for=\"nom\">Masculin </label>
                
            </p>
            <label for=\"email\">Date de naissance :</label>
            <input type=\"date\" id=\"email\" name=\"email\"><br>
            <p>Fonction :
                <select name=\"classe\" id=\"classe\">
                    <option value=\"\">--Veuillez choisir une option--</option>
                    <option value=\"Enseignant\">Enseignant</option>
                    <option value=\"Cadre\">Cadre</option>
                    <option value=\"Etudiant\">Etudiant</option>
                    <option value=\"Retraité\">Retraité</option>
                    <option value=\"Sans emploi\">Sans emploi</option>
                    <option value=\"Technicien\">Technicien</option>
                    <option value=\"Autre\">Autre</option>
                </select>
            </p>
            <label for=\"email\">Email :</label>
            <input type=\"email\" id=\"email\" name=\"email\"><br>
            <label for=\"nom\">Sujet :</label>
            <input type=\"text\" id=\"nom\" name=\"nom\"><br>
            <label for=\"message\">Contenu :</label>
            <textarea id=\"message\" name=\"message\" rows=\"4\" cols=\"50\"></textarea><br>
            <input type=\"submit\" value=\"Envoyer\">
        </form>";
?> 
<?php
    PrintFooter();
?>
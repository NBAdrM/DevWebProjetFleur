<?php
    include("include/header.php");
    include("include/footer.php");

    PrintHeader();
?>
<?php
    echo"<h2 class=\"titre\">Contacter nous</h2>
    <form action=\"\" method=\"GET\">
        <div class=\"form_contact\">
            <label for=\"nom\">Nom</label>
            <input type=\"text\" placeholder=\"Nom*\">
        </div>
        <div class=\"form_contact\">
            <label for=\"nom\">Prénom</label>
            <input type=\"text\" placeholder=\"Prénom*\">
        </div>
        <br>
        <div class=\"form_contact\">
            <label>Genre</label>
            <input type=\"radio\" name=\"genre\">
            <label for=\"nom\">Féminin</label>
            <input type=\"radio\" name=\"genre\">
            <label for=\"nom\">Masculin</label>
        </div>
        <br>
        <div class=\"form_contact\">
            <label for=\"email\">Date de naissance</label>
            <input type=\"date\">
        </div>
        <div class=\"form_contact\">
            <label>Fonction</label>
                <select>
                    <option value=\"\">--Veuillez choisir une option--</option>
                    <option value=\"Etudiant\">Etudiant</option>
                    <option value=\"Sans emploi\">Sans emploi</option>
                    <option value=\"Technicien\">Technicien</option>
                    <option value=\"Cadre\">Cadre</option>
                    <option value=\"Retraité\">Retraité</option>
                    <option value=\"Autre\">Autre</option>
                </select>
        </div>
        <div class=\"form_contact\">
            <label for=\"email\">Email</label>
            <input type=\"email\" placeholder=\"Email*\">
        </div>
        <div class=\"form_contact\">
            <label for=\"nom\">Sujet</label>
            <input type=\"text\" placeholder=\"Sujet*\">
        </div>
        <div class=\"form_contact\">
            <textarea rows=\"4\" cols=\"50\" placeholder=\"Contenu*\"></textarea>
        </div>
        <br>
        <div class=\"form_contact\">
            <span type=\"submit\">Envoyer</span>
        </div>
    </form>";
?> 
<?php
    PrintFooter();
?>
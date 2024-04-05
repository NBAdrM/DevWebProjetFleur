<?php
    include("include/header.php");
    include("include/footer.php");
    include("include/fonction.contact.php");

    PrintHeader();

    // Utilisation de la fonction sendContactEmail avec les données soumises par le formulaire HTML
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
        $nom = $_GET["nom"];
        $prenom = $_GET["prenom"];
        $genre = isset($_GET["genre"]) ? $_GET["genre"] : "";
        $date_naissance = $_GET["date_naissance"];
        $fonction = $_GET["fonction"];
        $email = $_GET["email"];
        $sujet = $_GET["sujet"];
        $contenu = $_GET["contenu"];
        sendContactEmail($nom, $prenom, $genre, $date_naissance, $fonction, $email, $sujet, $contenu);
    }

    echo"
    <div class=\"global\">;
    <h2 class=\"titre\">Contacter nous</h2>
    <form action=\"\" method=\"GET\">
        <div class=\"form_contact\">
            <label for=\"nom\">Nom</label>
            <input type=\"text\" placeholder=\"Nom*\" required value=\"nom\">
        </div>
        <div class=\"form_contact\">
            <label for=\"nom\">Prénom</label>
            <input type=\"text\" placeholder=\"Prénom*\" required value=\"prenom\">
        </div>
        <br>
        <div class=\"form_contact\">
            <label>Genre</label>
            <input type=\"radio\" name=\"genre\" value=\"genre\">
            <label>Féminin</label>
            <input type=\"radio\" name=\"genre\" value=\"genre\">
            <label>Masculin</label>
        </div>
        <br>
        <div class=\"form_contact\">
            <label for=\"email\">Date de naissance</label>
            <input type=\"date\" value=\"date\">
        </div>
        <div class=\"form_contact\">
            <label >Fonction</label>
                <select value=\"fonction\">
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
            <input type=\"email\" placeholder=\"Email*\" required value=\"email\">
        </div>
        <div class=\"form_contact\">
            <label>Sujet</label>
            <input type=\"text\" placeholder=\"Sujet*\" required value=\"sujet\">
        </div>
        <div class=\"form_contact\">
            <textarea rows=\"4\" cols=\"50\" placeholder=\"Contenu*\" required value=\"contenu\"></textarea>
        </div>
        <br>
        <div class=\"form_contact\">
            <span type=\"submit\" name=\"submit\">Envoyer</span>
        </div>
    </form>
    </div>";

    PrintFooter();
?>
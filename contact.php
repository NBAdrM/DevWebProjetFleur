<?php
    include("include/header.php");
    include("include/footer.php");
    include("include/fonction.contact.php");

    PrintHeader();

    echo "
    <div class=\"global\">
    <h2 class=\"titre\">Contacter nous</h2>
    <form action=\"\" method=\"GET\">
        <div class=\"form_contact\">
            <label for=\"nom\">Nom</label>
            <input type=\"text\" name=\"nom\" placeholder=\"Nom*\" required>
        </div>
        <div class=\"form_contact\">
            <label for=\"prenom\">Prénom</label>
            <input type=\"text\" name=\"prenom\" placeholder=\"Prénom*\" required>
        </div>
        <br>
        <div class=\"form_contact\">
            <label>Genre</label>
            <input type=\"radio\" name=\"genre\" value=\"Féminin\">
            <label>Féminin</label>
            <input type=\"radio\" name=\"genre\" value=\"Masculin\">
            <label>Masculin</label>
        </div>
        <br>
        <div class=\"form_contact\">
            <label for=\"date_naissance\">Date de naissance</label>
            <input type=\"date\" name=\"date_naissance\">
        </div>
        <div class=\"form_contact\">
            <label>Fonction</label>
                <select name=\"fonction\">
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
            <input type=\"email\" name=\"email\" placeholder=\"Email*\" required>
        </div>
        <div class=\"form_contact\">
            <label for=\"sujet\">Sujet</label>
            <input type=\"text\" name=\"sujet\" placeholder=\"Sujet*\" required>
        </div>
        <div class=\"form_contact\">
            <textarea name=\"contenu\" rows=\"4\" cols=\"50\" placeholder=\"Contenu*\" required></textarea>
        </div>
        <br>
        <div class=\"form_contact\">
            <span type=\"submit\" name=\"submit\">Envoyer</span>
        </div>
    </form>
    </div>";
    
    // Utilisation de la fonction sendContactEmail avec les données soumises par le formulaire HTML
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submit'])) {
        $nom = isset($_GET["nom"]) ? $_GET["nom"] : "";
        $prenom = isset($_GET["prenom"]) ? $_GET["prenom"] : "";
        $genre = isset($_GET["genre"]) ? $_GET["genre"] : "";
        $date_naissance = isset($_GET["date_naissance"]) ? $_GET["date_naissance"] : "";
        $fonction = isset($_GET["fonction"]) ? $_GET["fonction"] : "";
        $email = isset($_GET["email"]) ? $_GET["email"] : "";
        $sujet = isset($_GET["sujet"]) ? $_GET["sujet"] : "";
        $contenu = isset($_GET["contenu"]) ? $_GET["contenu"] : "";
    
        sendContactEmail($nom, $prenom, $genre, $date_naissance, $fonction, $email, $sujet, $contenu);
    }
    
    PrintFooter();
?>
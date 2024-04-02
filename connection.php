<?php
    include("include/header.php");
    include("include/footer.php");
    include_once("include/fonction.php");
    include("include/fonction.inscription.php");

    PrintHeader();
    $nom="";
    $email="";
    $error="";

    if(! empty($_GET["inscription"])) {
        if(isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["pwd"]) && isset($_POST["cpwd"])){
            $nom = $_POST["nom"];
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];
            $cpwd = $_POST["cpwd"];
            if($pwd != $cpwd){
                $error="<h3 class=\"login-error\">Votre confirmation de mot de passe ne correspond pas</h3>";
            }
            else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $error="<h3 class=\"login-error\">Votre email n'est pas valable</h3>";
            }
            else{
                $result = requetBDD("SELECT * FROM user WHERE email=\"".$email."\";");
                if($result->num_rows > 0){
                    $error= "<h3 class=\"login-error\">Cette email est déjà asocier a un compte</h3>";
                }
                else{
                    $token = random_string(20);
                    echo requetBDD("INSERT INTO User (nom,email,pwd,token) VALUES('".$nom."','".$email."',SHA1('".$pwd."'),'".$token."' );");
                    emailInscription($email,$nom,$token);
                }
            }
        }
        
        echo $error."
        <div class=\"login-box inscription\">
            <h2>Inscription</h2>
            <form action=\"\" method=\"POST\">
                <div class=\"user-box\">
                    <input type=\"text\" name=\"nom\" required=\"\" value=\"".$nom."\"/>
                    <label>Nom d'utilisateur</label>
                </div>
                <div class=\"user-box\">
                    <input type=\"email\" name=\"email\" required=\"\" value=\"$email\"/>
                    <label>Email</label>
                </div>
                <div class=\"user-box\">
                    <input type=\"password\" name=\"pwd\" required=\"\"/>
                    <label>Mot de passe</label>
                </div>
                <div class=\"user-box\">
                    <input type=\"password\" name=\"cpwd\" required=\"\"/>
                    <label>Confirmation Mot de passe</label>
                </div>
                <div class=\"switch-con\">
                    <a href=\"connection.php\">
                        Deja inscrit ?
                    </a>
                </div>
                <button>
                        SEND
                    <span></span>
                </button>
            </form>
        </div>";
    }
    else {
        echo checkConnexion();
        echo "<div class=\"login-box\">
        <h2>Connection</h2>
        <form action=\"\" method=\"POST\">
            <div class=\"user-box\">
                <input type=\"email\" name=\"email\" required=\"\"/>
                <label>Email</label>
            </div>
            <div class=\"user-box\">
                <input type=\"password\" name=\"pwd\" required=\"\"/>
                <label>Mot de passe</label>
            </div>
            <div class=\"switch-con\">
                <a href=\"connection.php?inscription=true\">
                    Pas encore inscrit ?
                </a>
            </div>
            <button>
                    SEND
                <span></span>
            </button>
        </form>
    </div>
";
    }

?>

    

<?php
    
    PrintFooter();

?>
<?php ob_start();
$titre = "Catalogue de voiture";
?>

<?php
    include("include/header.php");
    include("include/footer.php");

    PrintHeader();
    /* Connexion à une base MySQL */
    $dsn = 'mysql:dbname=projet devweb;host=localhost';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échoué : ' . $e->getMessage();
    }

    $req = "Select * FROM voiture";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo"<pre>";
    print_r($result);
    

    PrintFooter();
?>

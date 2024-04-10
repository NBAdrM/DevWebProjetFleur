<?php
include "../include/fonction.php";

session_start();

if (isset($_SESSION['admin'])) {
    $result=requetBDD("SELECT a.id AS aid,a.id_user,u.nom AS unom,u.email,a.id_ref,m.nom,m.prix,a.date FROM achat AS a 
    LEFT JOIN user AS u ON u.id=a.id_user
    LEFT JOIN marchandise AS m ON m.id=a.id_ref;");
    
    $contacts=array();
    while ($achat = mysqli_fetch_assoc($result)) {
        $contacts[] = $achat;
    }
    $json = json_encode($contacts, JSON_PRETTY_PRINT);
    echo $json;
}
?>
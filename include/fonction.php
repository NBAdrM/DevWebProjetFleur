<?php
    
    function requetBDD($requete){
        $mysqli = new mysqli("localhost", "root", "", "porsche",3308);
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        $result = $mysqli->query($requete);
        return $result;
    }

    function random_string($length) {
        $str = random_bytes($length);
        $str = base64_encode($str);
        $str = str_replace(["+", "/", "="], "", $str);
        $str = substr($str, 0, $length);
        return $str;
    }

?>
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

    function checkConnexion(){
		if(!empty($_POST['email']) && !empty($_POST['pwd'])){
			$email = $_POST['email'];
			$pwd = $_POST['pwd'];
			$requete = "SELECT * FROM user WHERE email = '".$email."' AND pwd = SHA1('".$pwd."');";
			$resultat = requetBDD($requete);
			$email='';
			if (empty($resultat)) {
				return "L'email ou le mot de passe ne correspond pas";
			}
			while ($row = mysqli_fetch_assoc($resultat)) {
				$id .= $row['id'].' ';
			}
			if(isset($id)){
					session_start();
					$_SESSION['id']=$id;
					header('Location: index.php');
			}
			else{
				return "L'email ou le mot de passe ne correspond pas 2";
			}
		}
	}

?>
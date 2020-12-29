<?php 
	
	function getDatabaseConnexion() {
		try {
		    $user = "root";
			$pass = "";
			$pdo = new PDO('mysql:host=localhost;dbname=challenge', $user, $pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
			
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}
	}

	// creer un argonote
	function createArgonote($nom) {
		try {
			$con = getDatabaseConnexion();
			$sql = "INSERT INTO argonotes (nom) 
					VALUES ('$nom')";
	    	$con->exec($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
	
	// récupere tous les argonotes
	function readAllArgonotes() {
		$con = getDatabaseConnexion();
		$requete = 'SELECT * from argonotes';
		$rows = $con->query($requete);
		return $rows;
	}

	// suprime un argonote
	function deleteArgonote($id) {
		try {
			$con = getDatabaseConnexion();
			$requete = "DELETE from argonotes where id = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $stmt . "<br>" . $e->getMessage();
	    }
	}

	// retourne le nombre totale d'argonotes
	function numberOfArgonotes() {
		$con = getDatabaseConnexion();
		$result= ("SELECT count(*) as total from argonotes");
		$rows = $con->query($result);
		$total = $rows->fetch();
		return $total;
	}

?>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST");
    $Name = $_POST['nom'];
    $Prenom = $_POST['prenom'];
    $Email = $_POST['email'];
    $Password = $_POST['mot_de_passe'];
       
    echo"<h2>FORMULAIRE DE CONNEXION<h2>"."<br>";
echo "votre nom est:".$_POST['nom']."<br>";
echo "votre prenom est:".$_POST['prenom']."<br>";
echo "votre email est:".$_POST['email']."<br>";
echo "votre mot de passe est:".$_POST['mot_de_passe'];

// Informations de connexion à la base de données

$SERVER="localhost";
$USER="root";
$Password='';
$dbname="osiec";
// on se connecte à la base de donnée

    $con=mysqli_connect($SERVER,$USER,$Password,$dbname);

     // Vérification de la connexion

    if(!$con){
    die("erreur de connexion".mysqli_connect_error());
    echo "connexion reussie avec succee !!";
    }
    echo "<br>";

//requête SQL pour créer une table

    $sql = "CREATE TABLE connexion (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        prenom INT(3),
        email VARCHAR(255),
        mot_de_passe VARCHAR(255)
    )";
    
    // Exécution de la requête

    if (mysqli_query($con, $sql)) {
        echo "La table a été créée avec succès.";
    } else {
        echo "Erreur lors de la création de la table : ".mysqli_error($con);
    }
        echo "<br>";
    // Données à insérer
    $Name = $_POST['nom'];
    $Prenom = $_POST['prenom'];
    $Email = $_POST['email'];
    $Password = $_POST['mot_de_passe'];;

// Requête SQL pour insérer les données
$sql = "INSERT INTO connexion (nom, prenom, email, mot_de_passe) VALUES ('$Name', '$Prenom', '$Email', '$Password')";

// Exécution de la requête
if (mysqli_query($con, $sql)) {
    echo "Les données ont été insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données : "."<br>".mysqli_error($con);
}
    
    try{
        $con=new PDO("mysql:localhost=$SERVER,osiec=$dbname",$USER,$Password);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       }
    catch(PDOException $e){
        echo "erreur :".$e->getMessage();
        exit();
    }


?>
    
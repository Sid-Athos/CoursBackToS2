<?php

$dbUsername = "root";

    $dbPassword = "root"; // None for windows
    $dbHost = "localhost";
    $dbName = "jeux_video";
    /* PDO EN FR OU EN ARABE C ISSI */
    $dbOptions = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", 
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET lc_time_names = 'fr_FR'"
        );
        try {
            $db = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8", $dbUsername, $dbPassword, $dbOptions);
        } catch(PDOException $ex) {
            die("Failed to connect to the database: " . $ex->getMessage());
        }
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

var_dump($db);
$_POST['nom'] = "dsjkhqg";
$_POST['possesseur'] = "Sdsqdsqdqdsdqqd";
$_POST['console'] = "xbox";
$_POST['prix'] = "150";
$_POST['nbre_joueurs_max'] = "12";
$_POST['commentaires'] = "dsjkhqg";



// On ajoute une entrée dans la table jeux_video
/*$bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUE (\'Battlefield 1942\', \'Patrick\', \'PC\', 45, 50, \'2nde guerre mondiale\')');

echo 'Le jeu a bien été ajouté !';
*/

// Version requète préparé //////////////////////////////////////////
var_dump($_POST);

$query = 
"INSERT INTO jeux_video(ID, nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
VALUES (NULL, :nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)";
$req = $db->prepare($query);
try {
$req->execute(array(
    ':nom' => $_POST['nom'],
    ':possesseur' => $_POST['possesseur'],
    ':console' => $_POST['console'],
    ':prix' => $_POST['prix'],
    ':nbre_joueurs_max' => $_POST['nbre_joueurs_max'],
    ':commentaires' => $_POST['commentaires']
));
echo 'Le jeu a bien été ajouté !<br/>';
}catch (PDOException $ex){
    die($ex->getMessage());
}

?>

<a href="entre_jeux.php"><button>Ajouter un autre jeu</button></a>
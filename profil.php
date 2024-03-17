<?php

include 'core.php';

$_TITRE_PAGE = 'Page profil';
$activePage = "profil";


if (!empty($_SESSION['compte'])) {
    $idEtu = $_SESSION['compte'];
    $sql = "SELECT nom, prenom FROM Etudiant
            WHERE id_etudiant = $idEtu";
    $result = $mysqli->query($sql);
    if (!$result) {
        exit($mysqli->error);
    }
    $nb = $result->num_rows;
    if ($nb) {
        //récupération de l’id de l’étudiant
        $row = $result->fetch_assoc();

?>
        <!DOCTYPE html>

        <head>
            <meta charset="utf-8">
            <title><?php echo $_TITRE_PAGE ?></title>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <link rel="stylesheet" href="css/style.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

        </head>
        <html lang="fr">

        <body>
            <?php include "navbar.php" ?>
            <div class="container">
                <h3 class="name"><?php echo $row['nom']; ?></h3>
            </div>
            <div class="container">
                <h2 class="title">Bienvenue dans votre espace personnel !</h3>
                    <button class="button" onclick="window.location.href='http://192.168.56.80/pwnd?logout=1'" name="deconnexion" value="1" id="button3">Se déconnecter</button>
                    <button class="button" onclick="window.location.href='http://192.168.56.80/pwnd/Notification/notifications.php'" name="notification" value="1" id="button4">Mes notifications</button>
                    <button class="button" onclick="window.location.href='http://192.168.56.80/pwnd/Amis/amis.php'" name="amis" value="1" id="button5">Mes amis</button>
                    <button class="button" name="parametres" value="1" id="button6">Paramètres</button>
            </div>
    <?php
    } // fin if info requete
} else echo "probleme connexion retour index.php" ?>

</body>

</html>
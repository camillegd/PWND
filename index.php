<?php
include 'core.php';


$activePage = 'accueil';

$_TITRE_PAGE = 'Accueil projet RS ESEO';
$compte = false;
if (isset($_POST['connexion_submit']) && $_POST['connexion_submit'] == 1) {

    $mail_escaped = $mysqli->real_escape_string(trim($_POST['mail']));
    $password_escaped = $mysqli->real_escape_string(trim($_POST['password']));
    $sql = "SELECT id_etudiant
            FROM Etudiant
            WHERE email = '" . $mail_escaped . "'
            AND motDePasse = '" . $password_escaped . "'";

    $result = $mysqli->query($sql);

    if (!$result) {
        exit($mysqli->error);
    }

    $nb = $result->num_rows;
    if ($nb) {
        //récupération de l’id de l’étudiant
        $row = $result->fetch_assoc();
        $_SESSION['compte'] = $row['id_etudiant'];
    }
}

if (isset($_POST['inscription_submit']) && $_POST['inscription_submit'] == 1 && $_POST['mdp'] == $_POST['confirme']) {
    $sql = "INSERT INTO Etudiant(nom, prenom, id_anneeScolaire, motDePasse, email)
            VALUES( '" . trim($_POST['nom']) . "' , 
                    '" . trim($_POST['prenom']) . "',
                    '" . trim($_POST['annee']) . "',
                    '" . trim($_POST['mdp']) . "',
                    '" . trim($_POST['mail']) . "'
            )";
    $result = $mysqli->query($sql);
    if (!$result) {
        exit($mysqli->error);
    }
    $mail_escaped = $mysqli->real_escape_string(trim($_POST['mail']));
    $password_escaped = $mysqli->real_escape_string(trim($_POST['mdp']));
}

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
    <div>
        <h2>Bienvenue sur RS ESEO</h2>
        <?php
        if (empty($_SESSION['compte'])) {
        ?>
            <table>
                <tr>
                    <td>
                        <div id="case1" class="case">
                            <h2 class="text-white">Connexion</h2>
                            <form method="POST">
                                <label for="idmail">Email</label>
                                <input type="text" id="idmail" name="mail" required minlength="4" maxlength="50">
                                <label for="defaultLoginFormPassword">Mot de passe</label>
                                <input name="password" type="password" id="defaultLoginFormPassword" required minlength="4" maxlength="50">
                                <button name="connexion_submit" value="1" id="button1">Connexion</button>
                            </form>
                        </div>
                    </td>

                    <td>
                        <div id="case2" class="case">

                            <h2 class="text-white"> Inscription</h2>
                            <form method="POST">
                                <label for="nom"> Nom</label>
                                <input name="nom" type="text" id="nom" required minlength="4" maxlength="50">
                                <label for="prenom"> Prénom</label>
                                <input name="prenom" type="text" id="prenom" required minlength="4" maxlength="50">
                                <label>Année scolaire</label>
                                <select name="annee">
                                    <option value="1">E1</option>
                                    <option value="2">E2</option>
                                    <option value="3">E3</option>
                                    <option value="4">E4</option>
                                    <option value="5">E5</option>
                                </select>
                                <label for="email"> Email</label>
                                <input name="mail" type="text" id="email" required minlength="4" maxlength="50">
                                <label for="mdp">Mot de passe</label>
                                <input name="mdp" type="password" id="mdp" required minlength="4" maxlength="50">
                                <label for="confirme">Confirmez votre password</label>
                                <input name="confirme" type="password" id="confirme" required minlength="4" maxlength="50">
                                <button name="inscription_submit" value="1" id="button2">Inscription</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </table>
        <?php
        } else {
        ?>
        <?php
            header("Location: profil.php");
            $mysqli->close();
        }
        ?>
    </div>
</body>

</html>
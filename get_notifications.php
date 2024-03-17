<?php
include '../core.php';

if (!empty($_POST['idEtudiant'])) {
    $idEtu = (int)$_POST['idEtudiant']; // récupère idEtudiant
    $sql = "SELECT * FROM Notification
            WHERE id_etudiantRec = $idEtu";

    $result = $mysqli->query($sql); // exécuter la requête sql

    /*while ($row = $result->fetch_assoc()) {
        echo "<h2>".$row['typeNotif']."</h2>";
        echo "<p>envoyé par étudiant id : ".$row['id_etudiantRec']."</p>";
        echo "<hr>";
    }*/
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="notification.css">
</head>

<body>
    <?php
    include '../Menu/menu.php';
    ?>
    <h1>Notifications</h1>
    <table>
        <tr>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
        <tr>
            <div class="notification-box">
                <h2 class="notification-title"><?php echo $row['typeNotif']; ?></h2>
                <p class="notification-sender">Envoyé par l'étudiant ID : <?php echo $row['id_etudiantRec']; ?></p>
                <hr>
            </div>
        </tr>
    <?php
            }
    ?>
    </tr>
    </table>
    <h2 id="titleNotif">Pas de notification pour le moment</h2>
</body>

</html>
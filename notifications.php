<!DOCTYPE html>
<html>

<head>
    <title>Notifications</title>
    <link rel="stylesheet" href="notification.css">
</head>

<body>
    <!-- Ajouter ci-dessous votre div avec l’id contenuNotifications -->
    <div id="contenuNotification"></div>
    <script>
        // déclarer ici votre fonction javascript updateNotifications
        function updateNotifications(url, cFunction) {
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("contenuNotification").innerHTML =
                        this.responseText;
                }
            }
            xhttp.open("POST", "get_notifications.php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("idEtudiant=2");
        }
        updateNotifications();
        // Mettez à jour les notifications initiales lors du chargement de la page
        // en appelant votre fonction updateNotifications
        // Mettez en place une boucle pour mettre à jour les notifications toutes les 10 secondes
        // ci-dessous (étape 5)
        setInterval(updateNotifications, 10000);
    </script>
</body>

</html>
<nav class="navbar navbar-expand-lg" style="background-color: #fbf9fd;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="img/eseo.svg" width="30" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($activePage == "accueil") echo "active" ?> button"  href="http://192.168.56.80/pwnd/index.php">Index</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($activePage == "profil") echo "active" ?> button" href="http://192.168.56.80/pwnd/profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link button" href="http://192.168.56.80/pwnd/amis.php">Amis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link button" aria-current="page" href="#">Paramètres</a>
                </li>
                <a class="navbar-brand" href="#">
                    <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Bootstrap
                </a>
            </ul>
        </div>
    </div>
</nav>
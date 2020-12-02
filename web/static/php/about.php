<?php 
    include '../../includes/database.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>About</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Smartphone Ranking</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="test.php">Test</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">À propos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Aide</a>
            </li>
            </ul>
        </div>
    </nav>
    </header>

    <section>
        <div style="width: 80%; text-align: center; color: #345; padding: 10px; margin: 30px auto 30px auto; border: 2px solid black;">
            <h1 style="color: #317399;">&Agrave; propos</h1>
            <p style="text-align: center;">PhoneHub est une plateforme de recherche de smartphone fond&eacute;e lors d'un projet &agrave; l'ETML &agrave; Lausanne. Elle vous permet de rechercher un smartphone par son nom ou alors par une s&eacute;rie de filtre et d'obtenir les caract&eacute;ristiques fondamentales du smartphone recherch&eacute;.</p>
            <p>&nbsp;</p>
            <p>Ce projet s'est d&eacute;roul&eacute; en 2020 (ao&ucirc;t-janvier) en 2&egrave;me ann&eacute;e de formation d'informatique par Alessandro D'Angelo, Cl&eacute;ment Sartoni, Th&eacute;o Bensaci et Manuel Oro. L'objectif du projet &eacute;tait d'&eacute;tablir une base de donn&eacute;e contenant +30 smartphones et leurs caract&eacute;ristiques. Puis, de les afficher &agrave; travers diff&eacute;rentes requ&ecirc;tes. Ici, nous avons opter pour une barre de recherche combin&eacute; avec quelques filtres pour obtenir le r&eacute;sultat le plus pr&eacute;cis possible.</p>
        </div>
    </section>

    <footer class="text-center alert alert-secondary">
        <p>Développé par Alessandro D'Angelo et Manuel Oro - ETML</p>
    </footer>
</body>
</html>
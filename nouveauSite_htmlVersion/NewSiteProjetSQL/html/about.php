<!DOCTYPE html>
<html lang="fr">
    <head>
        <!--
            By      : Alessandro D'Angelo
            Date        : 09.12.2020
            Desc : About Page for PhoneHub
        -->
        <title>PhoneHub Home</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="../js/GenGlobalEllement.js"></script>
        <script src="../js/HomeFunction.js"></script> 
        <script src="../js/PhoneSlotClass.js"></script>
    </head>
    <body onload="GenEllement();">
        <div id="Container">
            <div id="FirstView">
            <div class="Menu">
                    <img id="ShortLogo" src="../oder/Image/LogoShort.png" alt="PhoneHub short logo">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="search.php">Search</a></li>
                        <li><a id="Selected" href="about.php">About</a></li>
                    </ul>
                    <div id="SearchMenu">
                        <button><img id="MenuIcon" src="../oder/Image/SearchIcon.png" alt="Menu icon"></button>
                            <form id="SearchMenu" method="POST">
                                <button type="submit" name="littleSearchModel" value=""><img id="MenuIcon" src="../oder/Image/SearchIcon.png" alt="Menu icon"></button>
                                <div id="SearchContent">
                                <div class="Search">
                                    <input id="littleText" name="littleText" type="text" onchange="document.getElementById('littleSearchedText').value=this.value">
                                    <input type="hidden" name="littleSearchedText" id="littleSearchedText" value=""/>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div id="SearchTitle">
                    <img id="LongLogo" src="../oder/Image/LogoLong.png" width="50%" alt="PhoneHub long logo">
                    <h2 id="SubTitle">FIND THE PHONE YOU NEED</h2>
                </div>
                <div id="Shadow"></div>
            </div>
            </div>
            <div id="HomeAbout">
                <div class="AboutParagraphe">
                    <div id="Image">
                        <img style="width: 600px; height: auto;" id="EtmlLogo" src="../oder/Image/etml.png" alt="ETML logo">
                    </div>
                    <div id="Text">
                        <div id="AboutTitle">
                            <h1 id ="AboutTitle" style="color: #317399;">&Agrave; propos</h1>
                        </div>
                        <p"><br>PhoneHub est une plateforme de recherche de smartphone fond&eacute;e lors d'un projet &agrave; l'&Eacute;cole Technique des m&eacute;tiers &agrave; Lausanne (ETML).<br>Elle permet de rechercher un smartphone avec par exemple son nom ou alors par une s&eacute;rie de filtres et d'obtenir les caract&eacute;ristiques fondamentales du smartphone recherch&eacute;.</p>
                        <p>&nbsp;</p>
                    </div>
                </div>
                <div class="AboutParagraphe">
                    <div id="TextLeft">
                        <h1></h1>
                        <div id="Txt">
                            <p>
                                Ce projet s'est d&eacute;roul&eacute; en 2020 (ao&ucirc;t-janvier) en 2&egrave;me ann&eacute;e de formation d'informatique en fillière Développement d'application, par Alessandro D'Angelo, Cl&eacute;ment Sartoni, Manuel Oro et Th&eacute;o Bensaci.<br>L'objectif du projet &eacute;tait d'&eacute;tablir une base de donn&eacute;e contenant +30 smartphones (42 dans notre cas) et leurs caract&eacute;ristiques afin de les afficher &agrave; travers diff&eacute;rentes requ&ecirc;tes. Ici, nous avons opt&eacute;s pour une barre de recherche combin&eacute; avec quelques filtres pour obtenir le r&eacute;sultat le plus pr&eacute;cis possible.
                            </p>
                        <p>&nbsp;</p>
                        </div>
                    </div>
                    <div id="Image">
                        <img src="../oder/Image/LogoShort.png" alt="Logo">
                    </div>
                </div>
            </div>
            <footer>
            </footer>
        </div>
    </body>
</html>

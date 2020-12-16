<?php
    include '../php/database.php';
    include '../php/searchFunction.php';
    include '../php/addPhone.php';

    function Get5BestSmartphoneByBatteryLife($db){
        $sql = ("select smaName from t_smartphone order by smaBatteryLife desc limit 5");
        $result = $db->query($sql);
        while($row = $result->fetch()) {
            AddPhoneToShowSlot($row["smaName"], $db);
        }
    }

    function Get15BestSmartphoneByCpu($db){
        $sql = ("select cpuName, smaName from t_smartphone join t_cpu on t_smartphone.fkCpu = t_cpu.idCpu order by (cpuNbCores * cpuClockFreq) desc limit 15");
        $result = $db->query($sql);
        while($row = $result->fetch()) {
            AddPhoneToSlot($row["smaName"], $db);
        }
    }

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <!--
            By      : Theo Bensaci
            Date        : 12.11.2020
            Desc : Home Page for PhoneHub
        -->
        <title>PhoneHub Home</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="../js/HomeFunction.js"></script> 
        <script src="../js/PhoneSlotClass.js"></script>
        <script src="../js/GenGlobalEllement.js"></script>
    </head>
    <body onload=" GenEllement();">
        <div id="Container">
            <div id="FirstView">
                <div class="Menu">
                    <img id="ShortLogo" src="../oder/Image/LogoShort.png" alt="PhoneHub short logo">
                    <ul>
                        <li><a id="Selected" href="home.php">Home</a></li>
                        <li><a href="search.php">Search</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>
                    <div id="SearchMenu">
                        <button><img id="MenuIcon" src="../oder/Image/SearchIcon.png" alt="Menu icon"></button>
                        <div id="SearchContent">
                            <form class="Search" id="littleSearchModel" method="POST">
                                <input id="text" name="searchedText" type="text" onchange="document.getElementById('littleSearchedText').value=this.value">
                                <button type="submit" name="littleSearchModel" value=""><img src="../oder/Image/SearchIcon.png" alt="search icon"></button>
                                <input type="hidden" name="littleSearchedText" id="littleSearchedText" value=""/>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="SearchTitle">
                    <img id="LongLogo" src="../oder/Image/LogoLong.png" width="50%" alt="PhoneHub long logo">
                    <h2 id="SubTitle">FIND THE PHONE YOU NEED</h2>
                    <form class="Search" id="searchModel" method="POST">
                        <input id="text" name="searchedText" type="text" onchange="document.getElementById('searched_text').value=this.value">
                        <button type="submit" name="searchModel" value=""><img src="../oder/Image/SearchIcon.png" alt="search icon"></button>
                        <input type="hidden" name="searched_text" id="searched_text" value=""/>
                    </form>
                </div>
                <div id="Shadow"></div>
            </div>
            <div id="PhoneShow">
                <div id="PhoneWindow">
                    <button class="switch" onclick="SupstractShowIndex()"><div class="arrow-left"></div></button>
                        <div id="PhoneInfo">
                            <a href=""><img id="PhoneImage" src="../oder/Image/13.png"></a>
                            <div id="Desc">
                                <h1 id="Phone Title">Phone Name</h1>
                                <h2>126 GB</h2>
                                <h2>16 MPX</h2>
                                <h2>16 GB Ram</h2>
                                <h2>3200x1440 px</h2>
                            </div>
                        </div>
                    <button class="switch" onclick="IncrementShowIndex()"><div class="arrow-right"></div></button>
                </div>
                <div id="PageView">
                    <button class="PageBnt" id="Selected" onclick="SwitchShowSlot(0)"></button>
                    <button class="PageBnt" onclick="SwitchShowSlot(1)"></button>
                    <button class="PageBnt" onclick="SwitchShowSlot(2)"></button>
                    <button class="PageBnt" onclick="SwitchShowSlot(3)"></button>
                    <button class="PageBnt" onclick="SwitchShowSlot(4)"></button>
                </div>
                <h1 id="Price">909.-</h1>
            </div>
            <div id="PhoneList">
                <div id="PhoneSwitch">
                    <button class="switch" onclick="SupstractIndex()"><div class="arrow-left"></div></button>
                    <div id="PhoneContender">
                    </div>  
                    <button class="switch" onclick="IncrementIndex()"><div class="arrow-right"></div></button>
                </div>
                <div id="PageView">
                    <button class="PageBnt" id="Selected" onclick="SwitchSlot(0)"></button>
                    <button class="PageBnt" onclick="SwitchSlot(1)"></button>
                    <button class="PageBnt" onclick="SwitchSlot(2)"></button>
                    <button class="PageBnt" onclick="SwitchSlot(3)"></button>
                    <button class="PageBnt" onclick="SwitchSlot(4)"></button>
                </div>
                <div id="Wave"></div>
            </div>
            <div id="HomeAbout">
                <div class="AboutParagraphe">
                    <div id="Image">
                        <img src="../oder/Image/LogoShort.png" alt="Logo">
                    </div>
                    <div id="Text">
                        <h1>Qui sommes nous</h1>
                        <div id="Txt">
                            <p>consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a,
                                consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a,
                            </p>
                        </div>
                    </div>
                </div>
                <div class="AboutParagraphe">
                    <div id="TextLeft">
                        <h1>{Inserer un titre}</h1>
                        <div id="Txt">
                            <p>consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a,
                                consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a,
                            </p>
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

<?php
    Get5BestSmartphoneByBatteryLife($db);
    Get15BestSmartphoneByCpu($db);
    RefreshOne();
    RefreshTwo();
?>
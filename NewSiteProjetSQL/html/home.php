<!DOCTYPE html>
<?php
    include "../php/database.php";
    function AddPhoneToShowSlot(&$smartphoneName){
        $sql = ("select smaName, braName, cpuName from t_smartphone join t_os on fkOS = idOs join t_brand on fkBrand = idBrand join t_cpu on fkCpu = idCpu join t_hardware on fkHardware = idHardware join t_price on idSmartphone+90 = idPrice");
        $result = $db->query($sql);
        $row = $result->fetch();

        echo $row["smaName"];
    }

    AddPhoneToShowSlot("iPhone 11");
?>
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
    <body onload="genPhoneListe(); GenEllement();">
        <div id="Container">
            <div id="FirstView">
                <div class="Menu">
                    <img id="ShortLogo" src="../oder/Image/LogoShort.png" alt="PhoneHub short logo">
                    <ul>
                        <li><a id="Selected" href="../html/home.html">Home</a></li>
                        <li><a href="../html/Search.html">Search</a></li>
                        <li><a href="">About</a></li>
                    </ul>
                    <button><img id="MenuIcon" src="../oder/Image/MenuIcon.png" alt="Menu icon"></button>
                </div>
                <div id="SearchTitle">
                    <img id="LongLogo" src="../oder/Image/LogoLong.png" width="50%" alt="PhoneHub long logo">
                    <h2 id="SubTitle">FIND THE PHONE YOU NEED</h2>
                    <div id="Search">
                        <input type="text">
                        <button><img src="../oder/Image/SearchIcon.png" alt="search icon"></button>
                    </div>
                </div>
                <div id="Shadow"></div>
            </div>
            <div id="PhoneShow">
                <div id="PhoneWindow">
                    <button class="switch" onclick="SupstractShowIndex()"><div class="arrow-left"></div></button>
                        <div id="PhoneInfo">
                            <a href=""><img id="PhoneImage" src="../oder/Image/PhoneDefaultImage.png"></a>
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
                    <button class="PageBnt" id="Selected" onclick="switchShowSlot(0)"></button>
                    <button class="PageBnt" onclick="switchShowSlot(1)"></button>
                    <button class="PageBnt" onclick="switchShowSlot(2)"></button>
                    <button class="PageBnt" onclick="switchShowSlot(3)"></button>
                    <button class="PageBnt" onclick="switchShowSlot(4)"></button>
                </div>
                <h1 id="Price">909.-</h1>
            </div>
            <div id="PhoneList">
                <div id="PhoneSwitch">
                    <button class="switch" onclick="SupstractIndex()"><div class="arrow-left"></div></button>
                    <div id="PhoneContender">
                        <div class="PhoneSlots">
                            <h2>Phone Name</h2>
                            <img src="../oder/Image/PhoneDefaultImage.png" alt="Phone Image">
                            <h3>330.-</h3>
                            <a href=""><h2>More</h2></a>
                        </div>
                        <div class="PhoneSlots">
                            <h2>Phone Name</h2>
                            <img src="../oder/Image/PhoneDefaultImage.png" alt="Phone Image">
                            <h3>330.-</h3>
                            <a href=""><h2>More</h2></a>
                        </div>
                        <div class="PhoneSlots">
                            <h2>Phone Name</h2>
                            <img src="../oder/Image/PhoneDefaultImage.png" alt="Phone Image">
                            <h3>330.-</h3>
                            <a href=""><h2>More</h2></a>
                        </div>
                    </div>  
                    <button class="switch" onclick="IncrementIndex()"><div class="arrow-right"></div></button>
                </div>
                <div id="PageView">
                    <button class="PageBnt" id="Selected" onclick="switchSlot(0)"></button>
                    <button class="PageBnt" onclick="switchSlot(1)"></button>
                    <button class="PageBnt" onclick="switchSlot(2)"></button>
                    <button class="PageBnt" onclick="switchSlot(3)"></button>
                    <button class="PageBnt" onclick="switchSlot(4)"></button>
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
<!DOCTYPE html>
<?php
    include "../php/database.php";
    include "../php/searchFunction.php";
    include "../php/addPhone.php";

    function SearchPhone($phone, $db){
        $sql = ("select smaName, braName, cpuName from t_smartphone join t_os on fkOS = idOs join t_brand on fkBrand = idBrand join t_cpu on fkCpu = idCpu join t_hardware on fkHardware = idHardware join t_price on idSmartphone = idPrice");
        $result = $db->query($sql);
        while($row = $result->fetch()) {
            if(substr_count(strtolower($row["smaName"]), strtolower($phone)) > 0){
                AddPhoneToSlot($row["smaName"], $db);
            }
        }
        Refresh();
    }

    function Refresh(){
        echo "<script>
            ShowPhones(phonelist);
            </script>
        ";
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
        <script src="../js/PhoneSlotClass.js"></script>
        <script src="../js/GenGlobalEllement.js"></script>
        <script src="../js/SearchFunction.js"></script>
    </head>
    <body onload="GenEllement();">
        <div id="Container">
            <div class="Menu">
                <img id="ShortLogo" src="../oder/Image/LogoShort.png" alt="PhoneHub short logo">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a id="Selected" href="search.php">Search</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
                <div id="SearchMenu">
                    <button><img id="MenuIcon" src="../oder/Image/SearchIcon.png" alt="Menu icon"></button>
                    <div id="SearchContent">
                        <div class="Search">
                            <input type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div id="SearchView">
                <div id="FilterAndSearch">
                        <form class="Search" id="searchModel" method="POST">
                            <input id="text" name="searchedText" type="text" onchange="document.getElementById('searched_text').value=this.value">
                            <input type="hidden" name="searched_text" id="searched_text" value=""/>
                            <button type="submit" name="searchModel" value=""><img src="../oder/Image/SearchIcon.png" alt="search icon"></button>
                        </form>
                    <button id="Filltrer">+ Filltrer</button>
                </div>
            </div>
            <div id="PhoneResult">

            </div>
            <footer>
            </footer>
        </div>
    </body>
</html>

<?php
    if(isset($_GET["model"])){
        SearchPhone($_GET["model"], $db);
    }
?>
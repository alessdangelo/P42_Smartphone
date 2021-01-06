<!DOCTYPE html>
<?php
    include "../php/database.php";
    include "../php/searchFunction.php";
    include "../php/addPhone.php";

    function getElementFromDb($sqlLine, $rowName, $db){
        $array = array();
        $result = $db->query($sqlLine);
        while($row = $result->fetch()) {
            array_push($array, $row[$rowName]);
        }
        return $array;
    }

    function SearchPhone($phone, $db){
        $sql = ("select smaName, braName, cpuName, osName from t_smartphone join t_os on fkOS = idOs join t_brand on fkBrand = idBrand join t_cpu on fkCpu = idCpu join t_hardware on fkHardware = idHardware join t_price on idSmartphone = idPrice");
        $result = $db->query($sql);
        while($row = $result->fetch()) {
            if(substr_count(strtolower($row["smaName"]), strtolower($phone)) > 0){
                AddPhoneToSlot($row["smaName"], $db);
            }
            else if (substr_count(strtolower($row["braName"]), strtolower($phone)) > 0){
                AddPhoneToSlot($row["smaName"], $db);                       
            }
            else if (substr_count(strtolower($row["cpuName"]), strtolower($phone)) > 0){
                AddPhoneToSlot($row["smaName"], $db);                      
            }
            else if (substr_count(strtolower($row["osName"]), strtolower($phone)) > 0){
                AddPhoneToSlot($row["smaName"], $db);                      
            }
        }
        Refresh();
    }

    function ExecuteSql($sql, $db){
        $result = $db->query($sql);
        while($row = $result->fetch()) {
                AddPhoneToSlot($row["smaName"], $db);
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
    <body onload="GenEllement(); AddDefaultText();">
        <div id="Container">
            <div class="Menu">
                <img id="ShortLogo" src="../oder/Image/LogoShort.png" alt="PhoneHub short logo">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a id="Selected" href="search.php">Search</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>       
                <span></span>      
            </div>
            <div id="SearchView">
                <div id="FilterAndSearch">
                    <form class="Search" id="searchModel" method="POST">
                            <input id="text" name="searchedText" type="text" onchange="document.getElementById('searched_text').value=this.value">
                            <input type="hidden" name="searched_text" id="searched_text" value=""/>
                            <button type="submit" name="searchModel" value=""><img src="../oder/Image/SearchIcon.png" alt="search icon"></button>
                    </form>

                <div id="filltrer-Div">
                        <button id="Filltrer" class="filltrer-bnt">+ Filters</button>
                        <div id="filltrer-content">
                            <div id="fillter-div-os">
                                <button id="filltrer-os" class="filltrer-bnt">OS</button>
                                <div id="filltrer-content-os">
                                    <?php
                                        foreach (getElementFromDb("select osName from t_os", "osName", $db) as $key => $value){
                                        ?>
                                            <a href="search.php?model=<?php echo $value?>"><?php echo $value?></a>
                                            <?php 
                                        }  
                                    ?>
                                </div>
                            </div>
                            <div id="fillter-div-const">
                                <button id="filltrer-const" class="filltrer-bnt">Constructeur</button>
                                <div id="filltrer-content-const">
                                    <?php
                                        foreach (getElementFromDb("select braName from t_brand", "braName", $db) as $key => $value){
                                        ?>
                                            <a href="search.php?model=<?php echo $value?>"><?php echo $value?></a>
                                            <?php 
                                        }  
                                        ?>
                                </div>
                            </div>
                            <div id="fillter-div-oder">
                                <button id="filltrer-oder" class="filltrer-bnt">Recherche rapide</button>
                                <div id="filltrer-content-oder">
                                    <a href="search.php?sql=select smaName from t_smartphone order by smaScreenSize desc;">Grande taille d'écran</a>
                                    <a href="search.php?sql=select smaName from t_smartphone order by smaBatteryLife desc limit 5 ;">Top 5 Autonomie</a>
                                    <a href="search.php?sql=select cpuName, smaName from t_smartphone join t_cpu on t_smartphone.fkCpu = t_cpu.idCpu order by (cpuNbCores * cpuClockFreq) desc limit 10;">Top 10 CPU</a>
                                    <a href="search.php?sql=select smaName from t_smartphone join t_cpu on t_smartphone.fkCpu = t_cpu.idCpu join t_hardware on t_smartphone.fkHardware = t_hardware.idHardware order by ((cpuNbCores*cpuClockFreq)*smaScreenSize*harRam) desc limit 5;">Top 5 Smartphones</a>
                                    <a href="search.php?sql=select smaName from t_smartphone join t_price on t_smartphone.idSmartphone = t_price.fkSmartphone order by priPrice desc limit 3;">Top 3 Les plus chers</a>
                                    <a href="search.php?sql=select smaName from t_smartphone join t_price on t_smartphone.idSmartphone = t_price.fkSmartphone join t_brand on t_smartphone.fkBrand = t_brand.idBrand join t_os on t_smartphone.fkOS = t_os.idOs group by braname order by priPrice asc;">Le smartphone le moins cher par marque</a>
                                </div>

                            </div>
                        </div>
                    </div>
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
        if($_GET["model"] != ''){
            SearchPhone($_GET["model"], $db);
        }
    }

    if(isset($_GET["sql"])){
        if($_GET["sql"] != ''){
            ExecuteSql($_GET["sql"], $db);
        }
    }
?>
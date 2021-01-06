<?php 
    include '../php/database.php';
    include '../php/searchFunction.php';

    $smaName = $_GET["model"];
    $sql = ("select idSmartphone, smaName, smaScreenSize, smaHeight, smaWidth, smaThick, smaWeight, smaBatteryLife, smaBatteryCapacity, braName, osName, cpuName, cpuNbCores, cpuClockFreq, harStorage, harRam from t_smartphone join t_os on fkOS = idOs join t_brand on fkBrand = idBrand join t_cpu on fkCpu = idCpu join t_hardware on fkHardware = idHardware join t_price on idSmartphone = idPrice where smaName='". $smaName."'");
    $result = $db->query($sql);
    $properties = $result->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <!--
            By      : Theo Bensaci
            Date        : 12.11.2020
            Desc : phone Page for PhoneHub
        -->
        <title>PhoneHub <?php echo $properties["smaName"]?></title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="../js/PhonePageFunction.js"></script> 
        <script src="../js/PhoneSlotClass.js"></script>
        <script src="../js/GenGlobalEllement.js"></script>
    </head>
    <body onload="GenEllement(); GetNewWallpaper();">
        <div id="Container">
            <div class="Menu">
                <img id="ShortLogo" src="../oder/Image/LogoShort.png" alt="PhoneHub short logo">
                <ul style="padding: 0px;">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="search.php">Search</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
                <form id="SearchMenu" method="POST">
                    <button type="submit" name="littleSearchModel" value=""><img id="MenuIcon" src="../oder/Image/SearchIcon.png" alt="Menu icon"></button>
                    <div id="SearchContent">
                        <div class="Search">
                            <input id="littleText" name="littleText" type="text" onchange="document.getElementById('littleSearchedText').value=this.value">
                            <input type="hidden" name="littleSearchedText" id="littleSearchedText" value=""/>
                        </div>
                    </div>
                </form>
            </div>
            <div id="PhoneSceen">
                <h1 id="PhoneTitle"><?php echo $properties["smaName"]?></h1>
                <img id="PhoneImage" src="../oder/Image/PhonesImages/<?php echo $properties["idSmartphone"]?>.png">
                <div id="Wave"></div>
            </div>
            <div id="Info">
                <div id="Right">
                    <h1 style="text-align: center;">Caractéristiques</h1>
                    <table id="Caracteristique">
                        <tbody>
                            <tr>
                                <th>Modèle: </th>
                                <td><?php echo $properties["smaName"]?></td>
                            </tr>
                            <tr>
                                <th>Constructeur:</th>
                                <td><?php echo $properties["braName"]?></td>
                            </tr>
                            <tr>
                                <th>System d'exploitation: </th>
                                <td><?php echo $properties["osName"]?></td>
                            </tr>
                            <tr>
                                <th>&emsp;</th>
                            </tr>       
                            <tr>
                                <th>Taille d'écran: </th>
                                <td><?php echo $properties["smaScreenSize"]?>"</td>
                            </tr>
                            <tr>
                                <th>Hauteur: </th>
                                <td><?php echo $properties["smaHeight"]?> mm</td>
                            </tr>
                            <tr>
                                <th>Largeur: </th>
                                <td><?php echo $properties["smaWidth"]?> mm</td>
                            </tr>
                            <tr>
                                <th>Épaisseur: </th>
                                <td><?php echo $properties["smaThick"]?> mm</td>
                            </tr>
                            <tr>
                                <th>Poids: </th>
                                <td><?php echo $properties["smaWeight"]?> g</td>
                            </tr>
                            <tr>
                                <th>Autonomie: </th>
                                <td><?php echo $properties["smaBatteryLife"]?> h</td>
                            </tr>
                            <tr>
                                <th>Capacité de la batterie: </th>
                                <td><?php echo $properties["smaBatteryCapacity"]?> mAh</td>
                            </tr>
                            <tr>
                                <th>&emsp;</th>
                            </tr>
                            <tr>
                                <th>Modèle du CPU: </th>
                                <td><?php echo $properties["cpuName"]?></td>
                            </tr>
                            <tr>
                                <th>Nombre de coeurs: </th>
                                <td><?php echo $properties["cpuNbCores"]?></td>
                            </tr>
                            <tr>
                                <th>Fréquence horloge: </th>
                                <td><?php echo $properties["cpuClockFreq"]?> GHz</td>
                            </tr>
                            <tr>
                                <th>&emsp;</th>
                            </tr>
                            <tr>
                                <th>Stockage: </th>
                                <td><?php echo $properties["harStorage"]?> GB</td>
                            </tr>
                            <tr>
                                <th>Mémoire vive: </th>
                                <td><?php echo $properties["harRam"]?> GB</td>
                            </tr>
                        </tbody>
                      </table> 
                </div>
                <div id="Left">
                    <canvas style="width: 500px; height: 400px;" id="myChart"></canvas>
                </div>

                <?php
                $prices = array();
                $dates = array();
                $sql = ("select priDate, priPrice from t_price join t_smartphone on idSmartphone = fkSmartphone where smaName='".$smaName."'");
                $result = $db->query($sql);
                while($row = $result->fetch()) {
                    array_push($prices, $row["priPrice"]);
                }

                $sql = ("select priDate, priPrice from t_price join t_smartphone on idSmartphone = fkSmartphone where smaName='".$smaName."'");
                $result = $db->query($sql);
                while($row = $result->fetch()) {
                    array_push($dates, $row["priDate"]);
                }  
                ?>
                
                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var chart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'line',

                        // The data for our dataset
                        data: {
                            labels: ['<?php echo $dates[0]?>','<?php echo $dates[1]?>', '<?php echo $dates[2]?>', '<?php echo $dates[3]?>'],
                            datasets: [{
                                label: 'Évolution du prix',
                                backgroundColor: 'rgb(110, 196, 253)',
                                borderColor: 'rgb(50, 163, 255)',
                                fill: false,
                                data: ['<?php echo $prices[0]?>', '<?php echo $prices[1]?>', '<?php echo $prices[2]?>', '<?php echo $prices[3]?>']
                            }]
                        },

                        // Configuration options go here
                        options: {responsive: false}
                    });
                </script>
            </div>
            <footer>
            </footer>
        </div>
    </body>
</html>
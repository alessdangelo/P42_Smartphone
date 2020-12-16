<?php 
include '../php/database.php';
            $smaName = $_GET["model"];
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
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
                                <input id="littleSearchedText" name="littleSearchedText" type="text" onchange="document.getElementById('littleSearchedText').value=this.value">
                                <button type="submit" name="littleSearchModel" value=""></button>
                                <input type="hidden" name="littleSearchedText" id="littleSearchedText" value=""/>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <section style="display: flex; flex-direction: row; justify-content: center;">
                    <div style="margin: 0 20px 0 20px;">
                        
                        <?php
                            $sql = ("select idSmartphone from t_smartphone where smaName='". $smaName."'");
                            $result = $db->query($sql);
                            $row = $result->fetch();

                            $imagePath = "../oder/Image/".$row["idSmartphone"].".png";
                        ?>

                        <img src="<?php echo $imagePath; ?>" alt="Error loading smartphone image" style="width: 400px;">
                    </div>
                    <div style="margin-right: 20px;">
                    <?php            
                            $sql = ("select idSmartphone, smaName, smaScreenSize, smaBatteryCapacity, braName, cpuName, cpuNbCores, cpuClockFreq, harStorage, harRam from t_smartphone join t_os on fkOS = idOs join t_brand on fkBrand = idBrand join t_cpu on fkCpu = idCpu join t_hardware on fkHardware = idHardware join t_price on idSmartphone = idPrice where smaName='". $smaName."'");
                            $result = $db->query($sql);
                                $row = $result->fetch();
                                ?>
                                    <table>
                                        <tr>
                                            <th>Nom: </th>
                                            <th><?php echo $row["smaName"];?></th>
                                        </tr>
                                        <tr>
                                            <th>Marque: &emsp; </th>
                                            <th><?php echo $row["braName"];?></th>
                                        </tr>
                                        <tr>
                                            <th>Taille écran ["]: &emsp; </th>
                                            <th><?php echo $row["smaScreenSize"];?></th>
                                        </tr>
                                        <th>&nbsp;</th>
                                        <tr>
                                            <th>Cpu: &emsp; </th>
                                            <th><?php echo $row["cpuName"];?></th>
                                        </tr>
                                        <tr>
                                            <th>Coeur: &emsp; </th>
                                            <th><?php echo $row["cpuNbCores"];?></th>
                                        </tr>
                                        <tr>
                                            <th>Fréquence [GHz]: &emsp; </th>
                                            <th><?php echo $row["cpuClockFreq"];?></th>
                                        </tr>
                                        <th>&nbsp;</th>
                                        <tr>
                                            <th>Stockage: &emsp; </th>
                                            <th><?php echo $row["harStorage"];?></th>
                                        </tr>
                                        <tr>
                                            <th>Ram: &emsp; </th>
                                            <th><?php echo $row["harRam"];?></th>
                                        </tr>
                                        <tr>
                                            <th>Capacité batterie: &emsp; </th>
                                            <th><?php echo $row["smaBatteryCapacity"];?></th>
                                        </tr>
                                    </table>
                                <?php
                        ?>
                    </div>
                    <div>
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
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    fill: false,
                    data: ['<?php echo $prices[0]?>', '<?php echo $prices[1]?>', '<?php echo $prices[2]?>', '<?php echo $prices[3]?>']
                }]
            },

            // Configuration options go here
            options: {responsive: false}
        });
    </script>
    </section>
            <footer>
            </footer>
        </div>
    </body>
</html>
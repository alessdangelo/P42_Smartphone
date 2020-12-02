<?php include '../../includes/database.php';
            $smaName = $_GET["model"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <title>Result</title>
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
            <li class="nav-item active">
                <a class="nav-link" href="#">Test<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">À propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Aide</a>
            </li>
            </ul>
        </div>
    </nav>
    </header>

    <section style="display: flex; flex-direction: row; justify-content: center;">
    <div style="margin: 0 20px 0 20px;">
        <?php
            $sql = ("select idSmartphone from t_smartphone where smaName='". $smaName."'");
            $result = $db->query($sql);
            $row = $result->fetch();

            $imagePath = "../../../Ressource/Image/".$row["idSmartphone"].".jpg";
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
</body>
</html>
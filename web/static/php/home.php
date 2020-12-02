<?php 
    include '../../includes/database.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Home</title>
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
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="test.php">Test</a>
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

    <section>
        <h3>Requêtes #1a</h3>
        <form method="POST" >
            <select id="os" name="choosenOS" onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
                <option value="0">Choisir OS</option>
                <option value="1">IOS</option>
                <option value="2">Android</option>
            </select>
            <input type="hidden" name="selected_text" id="selected_text" value="" />
            <input type="submit" name="search" value="Valider"/>
        </form>
        <?php 
            if(isset($_POST['search']))
            {            
                $osValue = $_POST['choosenOS'];
            
                $os = ($_POST['selected_text']);
                $sql = ("select smaName from t_smartphone join t_os on t_smartphone.fkOS = t_os.idOs where osName='".$os."'");
                
                $result = $db->query($sql);
                while($row = $result->fetch()) {
                    echo  $row["smaName"] . "<br>";
                }
            }
        ?>

        <h3>Requête #2</h3>
        <form method="POST" >
            <select id="order" name="orderOne" onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
                <option value="0">Choisir ordre</option>
                <option value="1">Ascendant</option>
                <option value="2">Descendant</option>
            </select>
            <input type="hidden" name="selected_text" id="selected_text" value="" />
            <input type="submit" name="searchOne" value="Valider"/>
        </form>
        <?php 
            if(isset($_POST['searchOne']))
            {            
                $orderValue = $_POST['orderOne'];
                $order = ($_POST['selected_text']);
                
                if($orderValue == 1){
                    $order = "asc";
                }
                else if ($orderValue == 2){
                    $order = "desc";
                }
                $sql = ("select smaName, smaScreenSize from t_smartphone order by smaScreenSize " . $order);
                
                $result = $db->query($sql);
                while($row = $result->fetch()) {
                    echo  $row["smaName"] ."---->". $row["smaScreenSize"] .'"'."<br>";
                }
            }
        ?>

        <h3>Requête #3</h3>
                <form method="POST" >
                    <input type="submit" name="searchTwo" value="Valider"/>
                </form>
                <?php 
                    if(isset($_POST['searchTwo']))
                    {                    
                        $sql = ("select smaName, priPrice, priDate from t_smartphone join t_price on t_smartphone.idSmartphone = t_price.fkSmartphone where priDate = '2020-07-13' union select smaName, priPrice, priDate from t_smartphone join t_price on t_smartphone.idSmartphone = t_price.fkSmartphone where priDate = '2020-08-13' union select smaName, priPrice, priDate from t_smartphone join t_price on t_smartphone.idSmartphone = t_price.fkSmartphone where priDate = '2020-09-13'");
                        
                        $result = $db->query($sql);
                        while($row = $result->fetch()) {
                            echo  $row["smaName"] ."---->". $row["priPrice"] ."---->". $row["priDate"] ."<br>";
                        }
                    }
                ?>

        <h3>Requête #4</h3>
                <form method="POST" >
                    <input type="submit" name="searchThree" value="Valider"/>
                </form>
                <?php 
                    if(isset($_POST['searchThree']))
                    {                    
                        $sql = ("select braName, smaName from t_smartphone join t_brand on t_smartphone.fkBrand = t_brand.idBrand");
                        
                        $result = $db->query($sql);
                        while($row = $result->fetch()) {
                            echo  $row["braName"] ." ----> ". $row["smaName"] . "<br>";
                        }
                    }
                ?>

        <h3>Requête #5</h3>
        <form method="POST" >
            <input type="hidden" name="selected_text" id="selected_text" value="" />
            <input type="submit" name="searchFour" value="Valider"/>
        </form>
        <?php 
            if(isset($_POST['searchFour']))
            {            
                $sql = ("select smaName from t_smartphone order by smaBatteryLife desc limit 5");
                
                $result = $db->query($sql);
                while($row = $result->fetch()) {
                    echo  $row["smaName"] . "<br>";
                }
            }
        ?>

        <h3>Requête #6</h3>
        <form method="POST" >
            <input type="hidden" name="selected_text" id="selected_text" value="" />
            <input type="submit" name="searchFive" value="Valider"/>
        </form>
        <?php 
            if(isset($_POST['searchFive']))
            {            
                $sql = ("select cpuName, smaName from t_smartphone join t_cpu on t_smartphone.fkCpu = t_cpu.idCpu order by (cpuNbCores * cpuClockFreq) desc limit 10");
                
                $result = $db->query($sql);
                while($row = $result->fetch()) {
                    echo  $row["smaName"] . " ----> " . $row["cpuName"] . "<br>";
                }
            }
        ?>

        <h3>Requête #7</h3>
        <form method="POST" >
            <input type="hidden" name="selected_text" id="selected_text" value="" />
            <input type="submit" name="searchSix" value="Valider"/>
        </form>
        <?php 
            if(isset($_POST['searchSix']))
            {            
                $sql = ("select smaName from t_smartphone join t_cpu on t_smartphone.fkCpu = t_cpu.idCpu join t_hardware on t_smartphone.fkHardware = t_hardware.idHardware order by (cpuNbCores*cpuClockFreq + smaScreenSize + harRam) desc limit 5");
                
                $result = $db->query($sql);
                while($row = $result->fetch()) {
                    echo  $row["smaName"] . "<br>";
                }
            }
        ?>

        <h3>Requête #8</h3>
        <form method="POST" >
            <input type="hidden" name="selected_text" id="selected_text" value="" />
            <input type="submit" name="searchSeven" value="Valider"/>
        </form>
        <?php 
            if(isset($_POST['searchSeven']))
            {            
                $sql = ("select smaName from t_smartphone join t_price on t_smartphone.idSmartphone = t_price.fkSmartphone order by priPrice desc limit 3");
                
                $result = $db->query($sql);
                while($row = $result->fetch()) {
                    echo  $row["smaName"] . "<br>";
                }
            }
        ?>

        <h3>Requête #9</h3>
        <form method="POST" >
            <input type="hidden" name="selected_text" id="selected_text" value="" />
            <input type="submit" name="searchHeight" value="Valider"/>
        </form>
        <?php 
            if(isset($_POST['searchHeight']))
            {            
                $sql = ("select osName, braName, smaName, priPrice from t_smartphone join t_price on t_smartphone.idSmartphone = t_price.fkSmartphone join t_brand on t_smartphone.fkBrand = t_brand.idBrand join t_os on t_smartphone.fkOS = t_os.idOs order by priPrice asc limit 1");
                
                $result = $db->query($sql);
                while($row = $result->fetch()) {
                    echo  $row["smaName"] . " ----> " . $row["osName"] . " ----> " . $row["braName"] . " ----> " . $row["priPrice"] . "<br>";
                }
            }
        ?>
    </section>

    <footer class="text-center alert alert-secondary">
        <p>Développé par Alessandro D'Angelo et Manuel Oro - ETML</p>
    </footer>
</body>
</html>
<?php 
    include '../../includes/database.php';

    function getElementFromDb($sqlLine, $rowName, $db){
        $array = array();
        $result = $db->query($sqlLine);
        while($row = $result->fetch()) {
            array_push($array, $row[$rowName]);
        }
        return $array;
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Test</title>
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

    <section>
    <h3>Search</h3>
        <form method="POST" >
            <input id="text" name="searchedText" type="text" onchange="document.getElementById('searched_text').value=this.value">

            <select id="os" name="choosenOS" onchange="document.getElementById('selected_os').value=this.options[this.selectedIndex].text">
                <option value="0">Choisir OS</option>
                <option value="1">IOS</option>
                <option value="2">Android</option>
            </select>

            <select id="brand" name="choosenBrand" onchange="document.getElementById('selected_brand').value=this.options[this.selectedIndex].text">
                <option value="0">Choisir Marque</option>
                <?php                
                    foreach (getElementFromDb("select braName from t_brand", "braName", $db) as $key => $value){
                        ?>
                        <option value="<?php echo ++$key; ?>"><?php echo $value; ?></option>
                        <?php 
                    }
                ?>
            </select>

            <select id="cpu" name="choosenCPU" onchange="document.getElementById('selected_cpu').value=this.options[this.selectedIndex].text">
                <option value="0">Choisir CPU</option>
                <?php 
                    foreach (getElementFromDb("select cpuName from t_cpu", "cpuName", $db) as $key => $value){
                        ?>
                        <option value="<?php echo ++$key; ?>"><?php echo $value; ?></option>
                        <?php 
                    }
                ?>
            </select>

            <select id="priceO" name="priceOrder" onchange="document.getElementById('selected_priceOrder').value=this.options[this.selectedIndex].text">
                <option value="0">Choisir ordre</option>
                <option value="1">Ascendant</option>
                <option value="2">Descendant</option>
            </select>

            <input type="hidden" name="selected_priceOrder" id="selected_priceOrder" value="" />            
            <input type="hidden" name="searched_text" id="searched_text" value=""/>
            <input type="hidden" name="selected_os" id="selected_os" value="" />
            <input type="hidden" name="selected_brand" id="selected_brand" value="" />
            <input type="hidden" name="selected_cpu" id="selected_cpu" value="" />

            <input type="submit" name="search" value="Valider"/>
        </form>

        <?php
            
            if(isset($_POST['search']))
            {                        
                $os = ($_POST['selected_os']);
                $brand = ($_POST['selected_brand']);
                $cpu = ($_POST['selected_cpu']);
                $text = ($_POST['searched_text']);
                $price = ($_POST['selected_priceOrder']);

                $sql = ("select smaName, braName, cpuName from t_smartphone join t_os on fkOS = idOs join t_brand on fkBrand = idBrand join t_cpu on fkCpu = idCpu join t_hardware on fkHardware = idHardware join t_price on idSmartphone+90 = idPrice");


                if($_POST['choosenOS'] != 0){
                    addAttr($sql);
                    $sql .= ("osName='".$os."'");
                }

                if($_POST['choosenBrand'] != 0){
                    addAttr($sql);
                    $sql .= ("braName='".$brand."'");
                }

                if($_POST['choosenCPU'] != 0){
                    addAttr($sql);
                    $sql .= ("cpuName='".$cpu."'");
                }

                if($_POST['priceOrder'] != 0){
                    $orderValue = ($_POST['priceOrder']);

                    if($orderValue == 1){
                        $sql .= " order by priPrice asc";
                    }
                    else if ($orderValue == 2){
                        $sql .= " order by priPrice desc";
                    }
                }


                $result = $db->query($sql);
                while($row = $result->fetch()) {
                    $smaName = $row["smaName"];
                    if(!empty($text)){
                        if(substr_count(strtolower($smaName), strtolower($text)) > 0){
                            ?>
                            <a href="result.php?model=<?php echo $smaName; ?>"><?php echo $smaName; ?></a>
                            <br>
                            <?php
                        }
                        else if (substr_count(strtolower($row["braName"]), strtolower($text)) > 0){
                            ?>
                            <a href="result.php?model=<?php echo $smaName; ?>"><?php echo $smaName; ?></a>
                            <br>
                            <?php                        
                        }
                        else if (substr_count(strtolower($row["cpuName"]), strtolower($text)) > 0){
                            ?>
                            <a href="result.php?model=<?php echo $smaName; ?>"><?php echo $smaName; ?></a>
                            <br>
                            <?php                        
                        }
                    }
                    else{
                        ?>
                        <a href="result.php?model=<?php echo $smaName; ?>"><?php echo $smaName; ?></a>
                        <br>
                        <?php                    
                        }
                    }
            }

            function addAttr(&$sql){
                if(substr_count($sql, 'where') == 0){
                    $sql .= " where ";
                }
                else{
                    $sql .= " and ";
                }
            }
        ?>
    </section>

    <footer class="text-center alert alert-secondary">
        <p>Développé par Alessandro D'Angelo et Manuel Oro - ETML</p>
    </footer>
</body>
</html>
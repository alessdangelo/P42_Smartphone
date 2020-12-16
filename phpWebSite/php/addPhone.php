<?php
    function AddPhoneToShowSlot($smartphoneName, $db){
        $sql = ("select smaName, idSmartphone, harStorage, harRam, smaScreenSize, priPrice from t_smartphone join t_os on fkOS = idOs join t_brand on fkBrand = idBrand join t_cpu on fkCpu = idCpu join t_hardware on fkHardware = idHardware join t_price on idSmartphone = idPrice where smaName='".$smartphoneName."'");
        $result = $db->query($sql);
        $row = $result->fetch();

        $name = $row["smaName"];
        $imagesource = '../oder/Image/'.$row["idSmartphone"].".png";
        $background = '"../oder/Image/PhoneShowBackground"+(phoneShowSlots.length+1)+".jpg"';
        $storage = $row["harStorage"];
        $ram = $row["harRam"];
        $price = $row["priPrice"];
        $url = 'result.php?model='.$name;

        echo "<script> 
            AddPhoneShowSlot('PhoneShow', '$name', '$imagesource', '$background', ['$storage GB', '$ram GB RAM'], '$price', '$url');
        </script>
        ";
    }

    function AddPhoneToSlot($smartphoneName, $db){
        $sql = ("select smaName, idSmartphone, harStorage, harRam, smaScreenSize, priPrice from t_smartphone join t_os on fkOS = idOs join t_brand on fkBrand = idBrand join t_cpu on fkCpu = idCpu join t_hardware on fkHardware = idHardware join t_price on idSmartphone = idPrice where smaName='".$smartphoneName."'");
        $result = $db->query($sql);
        $row = $result->fetch();

        $name = $row["smaName"];
        $imagesource = '../oder/Image/'.$row["idSmartphone"].".png";
        $price = $row["priPrice"];
        $url = 'result.php?model='.$name;

        echo "<script> 
            AddPhoneSlot('$name', '$imagesource', '$price', '$url');
        </script>
        ";
    }

    function RefreshOne(){
        echo "<script>
            SwitchSlot(0);
            </script>
        ";
    }

    function RefreshTwo(){
        echo "<script>
            SwitchShowSlot(0);
            </script>
        ";
    }

?>
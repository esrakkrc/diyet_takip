<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bir Haftalık Diyet Takip Listesi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Bir Haftalık Diyet Takip Listesi</h1>
    <table>
        <tr>
            <th>Gün</th>
            <th>Kahvaltı</th>
            <th>Öğle Yemeği</th>
            <th>Akşam Yemeği</th>
        </tr>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mysql";
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Bağlantı kontrolü
            if ($conn->connect_error) {
                die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
            }

            // Veriyi çekme
            $sql = "SELECT kilo FROM kisibilgi";
            $result = $conn->query($sql);
            // Veri kontrolü ve işleme
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $kiloAraligi = $row["kilo"];
                }
            } else {
                echo "Veritabanında hiç kayıt bulunamadı.";
            }
            $jsonString = file_get_contents('kisibilgi.json');
            $data = json_decode($jsonString, true);

            $gunler = ['pazartesi', 'salı','çarsamba','persembe','cuma','cumartesi','pazar'];
            
            if ($kiloAraligi == "60" || $kiloAraligi == "80"|| $kiloAraligi == "150"|| $kiloAraligi == "200"){
                foreach ($gunler as $gun) {
                    $veri = $data[$kiloAraligi][$gun];
                    
                    echo $gun . ":<br>";
                    echo "Sabah: " . $veri['sabah'] . "<br>";
                    echo "Öğle: " . $veri['öğle'] . "<br>";
                    echo "Ara 1: " . $veri['ara1'] . "<br>";
                    echo "Ara 2: " . $veri['ara2'] . "<br>";
                    echo "Akşam: " . $veri['akşam'] . "<br>";
                    
                    echo "<br>";
                }
            } else {
            echo "Geçersiz kilo aralığı.";
            }
            // Veritabanı bağlantısını kapatma
            $conn->close();
        ?>
       
        
    </table>

</body>
</html>
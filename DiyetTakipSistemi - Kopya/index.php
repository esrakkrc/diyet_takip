<?php
    $Tarih = $_POST["Tarih"];
    $Yas = $_POST["Yas"];
    $Boy = $_POST["Boy"];
    $Kilo = $_POST["Kilo"];
    $vt_sunucu= "localhost";
    $vt_kullanici= "root";
    $vt_sifre= "";
    $vt_adi= "mysql";
    $baglanti= new mysqli($vt_sunucu, $vt_kullanici, $vt_sifre ,$vt_adi);
    // Bağlantıyı Kontrol Et
    if ($baglanti->connect_error) {
        die("Veri Tabanı Bağlantısı Başarısız: " . $baglanti->connect_error);
    }
    

    $ekle= "INSERT INTO kisibilgi (Tarih,Yas,Boy,Kilo)  VALUES ('$Tarih','$Yas','$Boy','$Kilo')";
    
    if ($baglanti->query($ekle) === TRUE) 
    {
        echo "Veritabanına veri eklendi";
    } 
    else 
    {
        echo "Hata: " . $ekle. "<br>" . $baglanti->error;
    }
?>
<?php
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$TIME = date("h:i:s");
$DATE = date("y-m-d");

$DATA = $DATE.' '.$TIME;
if (isset($_POST["kirim"])){
    $kepuasan = $_POST["kepuasan"];
    $pilihan = $_POST["pilihan"];
    $komentar = $_POST["komentar"];

    $q="INSERT INTO pelayananofline VALUES('','$kepuasan','$pilihan','$komentar','$DATA')";
    mysqli_query($koneksi,$q);

    if(mysqli_affected_rows($koneksi)>0){
        echo "<script>
        
            alert('Data Berhasil Disimpan');
            document.location.herf='tampil.php';
            </script>" ;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BANK ARIP</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="comp">
        <div class="container">
            <h1>BANK ARIP INDONESIA</h1>
            <h2>Bagaimana Pelayanan Kami?</h2>
            <form action="" method="POST">
                <div class="radio-buttons">
                    <label class="custom-radio buruk">
                        <input type="radio" name="kepuasan" value="buruk" />
                        <span class="radio-btn buruk-btn">
                            <div class="hobbies-icon">
                                <!-- <i class="las la-biking"></i> -->
                            </div>
                        </span>
                        <h3>Buruk</h3>
                    </label>
                    <label class="custom-radio biasa">
                        <input type="radio" name="kepuasan" value="biasa" />
                        <span class="radio-btn biasa-btn">
                            <div class="hobbies-icon">
                                <!-- <i class="las la-biking"></i> -->
                            </div>
                        </span>
                        <h3>Biasa</h3>
                    </label>
                    <label class="custom-radio baik">
                        <input type="radio" name="kepuasan" value="baik" />
                        <span class="radio-btn baik-btn">
                            <div class="hobbies-icon">
                                <!-- <i class="las la-biking"></i> -->
                            </div>
                        </span>
                        <h3>Baik</h3>
                    </label>
                    <label class="custom-radio sangatbaik">
                        <input type="radio" name="kepuasan" value="sangat baik" />
                        <span class="radio-btn sangatbaik-btn">
                            <div class="hobbies-icon">
                                <!-- <i class="las la-biking"></i> -->
                            </div>
                        </span>
                        <h3>Sangat Baik</h3>
                    </label>
                </div>
                <select name="pilihan" id="">
                    <option value="">-- Pilih Pelayanan --</option>
                    <option value="Pelayanan">Pelayanan</option>
                    <option value="Kenyamanan">Kenyamanan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <br />
                <textarea name="komentar" id="" cols="30" rows="10" placeholder="Tulis Komentar Anda.."></textarea>
                <button name="kirim">Kirim</button>
            </form>
        </div>
    </div>
</body>

</html>
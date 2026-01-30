<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <title>Fungsi</title> 
</head> 
<body> 
    <h1>Berlatih Fungsi PHP</h1> 
    <?php 
        echo "<h3>Soal No 1 Salam</h3>"; 
        
        function salam($nama) {
            $namaFormatted = ucfirst($nama);
            return "Halo $namaFormatted, Selamat Datang di Sanbercode!";
        }
        
        echo salam("Bagas") . "<br>";
        echo salam("Wahyu") . "<br>";
        echo salam("Rezky") . "<br>";
        
        echo "<br>";
        
        echo "<h3>Soal String Terbalik No 2</h3>"; 
        
        function reverseString($str) {
            $reversed = "";
            $length = strlen($str);
            
            for($i = $length - 1; $i >= 0; $i--) {
                $reversed .= $str[$i];
            }
            
            return $reversed;
        }
        
        echo reverseString("nama peserta") . "<br>";
        echo reverseString("Sanbercode") . "<br>";
        echo reverseString("Kami Adalah Pengembang Sanbers") . "<br>";
        
        echo "<br>";
        
        echo "<h3>Soal No 3 Tentukan Nilai</h3>"; 
        
        function tentukan_nilai($nilai) {
            if($nilai >= 85 && $nilai <= 100) {
                return "Sangat Baik";
            } elseif($nilai >= 70 && $nilai < 85) {
                return "Baik";
            } elseif($nilai >= 60 && $nilai < 70) {
                return "Cukup";
            } else {
                return "Kurang";
            }
        }
        
        echo tentukan_nilai(98) . "<br>";
        echo tentukan_nilai(76) . "<br>";
        echo tentukan_nilai(67) . "<br>";
        echo tentukan_nilai(43) . "<br>";
        
    ?> 
</body> 
</html>
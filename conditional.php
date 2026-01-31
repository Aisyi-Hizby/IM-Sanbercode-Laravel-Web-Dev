<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Function</title>
</head>

<body>

<h1>Berlatih Function PHP</h1>

<?php
echo "<h3>Soal No 1 Greetings</h3>";

function greetings($nama) {
    echo "Halo " . ucfirst($nama) . ", Selamat Datang di Sanbercode!<br>";
}

// greetings("Bagas");
// greetings("Wahyu");
// greetings("nama peserta");

echo "<br>";

echo "<h3>Soal No 2 Reverse String</h3>";

function reverseString($str) {
    $hasil = "";
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $hasil .= $str[$i];
    }
    echo $hasil . "<br>";
}

// reverseString("nama peserta");
// reverseString("Sanbercode");
// reverseString("We Are Sanbers Developers");

echo "<br>";

echo "<h3>Soal No 3 Tentukan Nilai</h3>";

function tentukan_nilai($nilai) {
    if ($nilai >= 85 && $nilai <= 100) {
        return "Sangat Baik";
    } elseif ($nilai >= 70 && $nilai < 85) {
        return "Baik";
    } elseif ($nilai >= 60 && $nilai < 70) {
        return "Cukup";
    } else {
        return "Kurang";
    }
}

// echo tentukan_nilai(98);
// echo tentukan_nilai(76);
// echo tentukan_nilai(67);
// echo tentukan_nilai(43);

?>

</body>
</html>

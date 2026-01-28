<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String PHP</title>
</head>
<body>
    <h1>Berlatih String PHP</h1>
    <?php   
        echo "<h3> Soal No 1</h3>";
        $first_sentence = "Halo PHP!" ; 
        $second_sentence = "Saya siap menghadapi tantangan"; 

        echo "Kalimat 1: \"$first_sentence\" <br>";
        echo "Panjang string: " . strlen($first_sentence) . ", jumlah kata: " . str_word_count($first_sentence) . "<br><br>";

        echo "Kalimat 2: \"$second_sentence\" <br>";
        echo "Panjang string: " . strlen($second_sentence) . ", jumlah kata: " . str_word_count($second_sentence) . "<br>";

        echo "<h3> Soal No 2</h3>";
        $string2 = "Saya suka PHP";
        echo "String: \"$string2\" <br>";
        echo "Kata pertama: " . substr($string2, 0, 4) . "<br>" ; 
        echo "Kata kedua: " . substr($string2, 5, 4) . "<br>" ;
        echo "Kata Ketiga: " . substr($string2, 10, 3) . "<br>" ;

        echo "<h3> Soal No 3 </h3>";
        $string3 = "PHP sudah tua tapi seksi!";
        echo "String awal: \"$string3\" <br>"; 
        $string3_new = str_replace("seksi", "mengagumkan", $string3);
        echo "String baru: \"$string3_new\" "; 
    ?>
</body>
</html>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <title>Looping</title> 
</head> 
<body> 
    <h1>Berlatih Looping</h1>     
    <?php 
        echo "<h3>Soal Perulangan No 1 Saya Suka PHP</h3>"; 
        
        echo "LOOPING PERTAMA<br>";
        for($i = 2; $i <= 20; $i += 2) {
            echo "$i - Saya Suka PHP<br>";
        }
        
        echo "<br>";
        
        echo "LOOPING KEDUA<br>";
        for($i = 20; $i >= 2; $i -= 2) {
            if($i <= 10) {
                echo "$i - I Love PHP<br>";
            } else {
                echo "$i - Saya Suka PHP<br>";
            }
        }
        
        echo "<h3>Soal No 2 Loop Associative Array</h3>"; 
        
        $items = [ 
            ['001', 'Keyboard Logitek', 60000, 'Keyboard yang mantap untuk kantoran', 'logitek.jpeg'], 
            ['002', 'Keyboard MSI', 300000, 'Keyboard gaming MSI mekanik', 'msi.jpeg'], 
            ['003', 'Mouse Genius', 50000, 'Mouse Genius biar lebih pinter', 'genius.jpeg'], 
            ['004', 'Mouse Jerry', 30000, 'Mouse yang disukai kucing', 'jerry.jpeg'] 
        ]; 
        
        $itemsAssoc = [];
        foreach($items as $item) {
            $itemsAssoc[] = [
                'id' => $item[0],
                'nama' => $item[1],
                'harga' => $item[2],
                'keterangan' => $item[3],
                'sumber' => $item[4]
            ];
        }
        
        foreach($itemsAssoc as $item) {
            print_r($item);
            echo "<br>";
        }
        
        echo "<h3>Soal No 3 Asterix</h3>"; 
        
        echo "Asterix: <br>";
        $asterixPattern = [1, 2, 2, 3, 7];
        
        foreach($asterixPattern as $stars) {
            for($i = 0; $i < $stars; $i++) {
                echo "* ";
            }
            echo "<br>";
        }
        
    ?>
</body> 
</html>
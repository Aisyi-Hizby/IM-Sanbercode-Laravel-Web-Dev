<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hari ke-9 - OOP PHP</title>
    <style>
        body {
            font-family: Verdana, sans-serif;
            background-color: #e9eef3;
        }
        .card {
            width: 680px;
            margin: 40px auto;
            background: #fff;
            padding: 24px;
            border-radius: 12px;
        }
        h2 { text-align: center; }
        hr { margin: 16px 0; }
    </style>
</head>
<body>

<div class="card">
    <h2>Tugas Hari ke-9 – OOP PHP</h2>

<?php
class Kendaraan
{
    private $jumlahRoda = 2;
    protected $warna = "Hitam";
    public $nama;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    public function bergerak()
    {
        echo "Kendaraan {$this->nama} sedang bergerak<br>";
    }

    public function tampilkanRoda()
    {
        echo "Jumlah roda: {$this->jumlahRoda}<br>";
    }

    protected function getWarna()
    {
        return $this->warna;
    }
}

class MotorSport extends Kendaraan
{
    public $topSpeed;

    public function __construct($nama, $topSpeed)
    {
        parent::__construct($nama);
        $this->topSpeed = $topSpeed;
    }

    public function detailMotor()
    {
        echo "Motor Sport: {$this->nama}<br>";
        echo "Top Speed: {$this->topSpeed} km/jam<br>";
        echo "Warna: " . $this->getWarna() . "<br>";
    }
}

$vespa = new Kendaraan("Vespa");
$vespa->bergerak();
$vespa->tampilkanRoda();

echo "<hr>";

$ducati = new MotorSport("Ducati Panigale", 320);
$ducati->bergerak();
$ducati->detailMotor();
?>

</div>

</body>
</html>
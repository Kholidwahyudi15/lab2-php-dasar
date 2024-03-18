<!DOCTYPE html>
<html>
<head>
    <title>Form Input PHP</title>
</head>
<body>

<h2>Form Input</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nama: <input type="text" name="nama"><br><br>
    Tanggal Lahir: <input type="date" name="tgl_lahir"><br><br>
    Pekerjaan:
    <select name="pekerjaan">
        <option value="Programmer">Programmer</option>
        <option value="Designer">Designer</option>
        <option value="Manager">Manager</option>
    </select><br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
// Fungsi untuk menghitung umur berdasarkan tanggal lahir
function hitungUmur($tanggal_lahir) {
    $tanggal_lahir = new DateTime($tanggal_lahir);
    $today = new DateTime('today');
    $umur = $today->diff($tanggal_lahir);
    return $umur->y;
}

// Array gaji sesuai dengan pekerjaan
$gaji = array(
    "Programmer" => 10000000,
    "Designer" => 8000000,
    "Manager" => 12000000
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $pekerjaan = $_POST['pekerjaan'];

    $umur = hitungUmur($tgl_lahir);
    $gaji_pilihan = $gaji[$pekerjaan];

    echo "<h2>Output:</h2>";
    echo "Nama: $nama <br>";
    echo "Umur: $umur tahun <br>";
    echo "Pekerjaan: $pekerjaan <br>";
    echo "Gaji: Rp " . number_format($gaji_pilihan, 0, ",", ".") . "<br>";
}
?>

</body>
</html>
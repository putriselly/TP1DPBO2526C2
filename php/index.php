<?php

session_start();

class Bioskop
{
    private $idBioskop;
    private $popcorn;
    private $softdrink;
    private $waktuBuka;
    private $gambar;

    // constructor
    public function __construct($idBioskop, $popcorn, $softdrink, $waktuBuka, $gambar)
    {
        $this->idBioskop = $idBioskop;
        $this->popcorn = $popcorn;
        $this->softdrink = $softdrink;
        $this->waktuBuka = $waktuBuka;
        $this->gambar = $gambar;
    }

    // getter
    public function getIdBioskop()
    {
        return $this->idBioskop;
    }

    public function getPopcorn()
    {
        return $this->popcorn;
    }

    public function getSoftdrink()
    {
        return $this->softdrink;
    }

    public function getWaktuBuka()
    {
        return $this->waktuBuka;
    }

    public function getGambar()
    {
        return $this->gambar;
    }

    // setter
    public function setIdBioskop($idBioskop)
    {
        $this->idBioskop = $idBioskop;
    }

    public function setPopcorn($popcorn)
    {
        $this->popcorn = $popcorn;
    }

    public function setSoftdrink($softdrink)
    {
        $this->softdrink = $softdrink;
    }

    public function setWaktuBuka($waktuBuka)
    {
        $this->waktuBuka = $waktuBuka;
    }

    public function setGambar($gambar)
    {
        $this->gambar = $gambar;
    }
}


// membuat session daftar bioskop
if (!isset($_SESSION['daftarBioskop'])) {
    $_SESSION['daftarBioskop'] = [];

    // 3 object awal
    $_SESSION['daftarBioskop'][] = new Bioskop(
        "001",
        "Popcorn Balado",
        "Milo",
        "8.00",
        "gambar/bioskop1.jpg"
    );

    $_SESSION['daftarBioskop'][] = new Bioskop(
        "002",
        "Popcorn Caramel",
        "Coca-Cola",
        "12.00",
        "gambar/bioskop2.jpg"
    );

    $_SESSION['daftarBioskop'][] = new Bioskop(
        "003",
        "Popcorn Original",
        "Fanta",
        "9.00",
        "gambar/bioskop3.jpg"
    );
}


// TAMBAH DATA
if (isset($_POST['tambah'])) {

    $idBaru = $_POST['idBioskop'];
    $popcornBaru = $_POST['popcorn'];
    $softdrinkBaru = $_POST['softdrink'];
    $waktuBukaBaru = $_POST['waktuBuka'];
    $gambarBaru = $_POST['gambar'];

    $bioskopBaru = new Bioskop(
        $idBaru,
        $popcornBaru,
        $softdrinkBaru,
        $waktuBukaBaru,
        $gambarBaru
    );

    $_SESSION['daftarBioskop'][] = $bioskopBaru;
}

// CARI DATA
$hasilCari = null;

if (isset($_POST['cari'])) {

    $idCari = $_POST['idCari'];

    foreach ($_SESSION['daftarBioskop'] as $bioskop) {

        if ($bioskop->getIdBioskop() == $idCari) {

            $hasilCari = $bioskop;

            break;
        }
    }
}

// HAPUS DATA
if (isset($_GET['hapus'])) {

    $idHapus = $_GET['hapus'];

    foreach ($_SESSION['daftarBioskop'] as $index => $bioskop) {

        if ($bioskop->getIdBioskop() == $idHapus) {

            unset($_SESSION['daftarBioskop'][$index]);

            break;
        }
    }

    $_SESSION['daftarBioskop'] = array_values($_SESSION['daftarBioskop']);
}


// UPDATE DATA
if (isset($_POST['update'])) {

    $idCari = $_POST['idBioskop'];
    $popcornBaru = $_POST['popcorn'];
    $softdrinkBaru = $_POST['softdrink'];
    $waktuBukaBaru = $_POST['waktuBuka'];
    $gambarBaru = $_POST['gambar'];

    foreach ($_SESSION['daftarBioskop'] as $bioskop) {

        if ($bioskop->getIdBioskop() == $idCari) {

            $bioskop->setPopcorn($popcornBaru);
            $bioskop->setSoftdrink($softdrinkBaru);
            $bioskop->setWaktuBuka($waktuBukaBaru);
            $bioskop->setGambar($gambarBaru);

            break;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Bioskop</title>
</head>

<body>

<h2>Tambah Data Bioskop</h2>

<form method="POST">

    <label>ID Bioskop:</label>
    <input type="text" name="idBioskop" required>
    <br><br>

    <label>Rasa Popcorn:</label>
    <input type="text" name="popcorn" required>
    <br><br>

    <label>Jenis Soft Drink:</label>
    <input type="text" name="softdrink" required>
    <br><br>

    <label>Waktu Buka:</label>
    <input type="text" name="waktuBuka" required>
    <br><br>

    <label>Path Gambar:</label>
    <input type="text" name="gambar" placeholder="gambar/nama.jpg" required>
    <br><br>

    <button type="submit" name="tambah">Tambah Data</button>

</form>

<h2>Cari Data Bioskop</h2>

<form method="POST">

    <label>ID Bioskop:</label>
    <input type="text" name="idCari" required>

    <button type="submit" name="cari">
        Cari
    </button>

</form>

<?php if ($hasilCari != null) { ?>

    <h3>Data Ditemukan</h3>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID Bioskop</th>
            <th>Popcorn</th>
            <th>Soft Drink</th>
            <th>Waktu Buka</th>
            <th>Gambar</th>
        </tr>

        <tr>

            <td>
                <?php echo $hasilCari->getIdBioskop(); ?>
            </td>

            <td>
                <?php echo $hasilCari->getPopcorn(); ?>
            </td>

            <td>
                <?php echo $hasilCari->getSoftdrink(); ?>
            </td>

            <td>
                <?php echo $hasilCari->getWaktuBuka(); ?>
            </td>

            <td>
                <img
                    src="<?php echo $hasilCari->getGambar(); ?>"
                    width="100"
                >
            </td>

        </tr>

    </table>

<?php } elseif (isset($_POST['cari'])) { ?>

    <p>Data tidak ditemukan.</p>

<?php } ?>


<h2>Daftar Bioskop</h2>

<table border="1" cellpadding="10">

    <tr>
        <th>ID Bioskop</th>
        <th>Popcorn</th>
        <th>Soft Drink</th>
        <th>Waktu Buka</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($_SESSION['daftarBioskop'] as $bioskop) { ?>

        <tr>

            <td>
                <?php echo $bioskop->getIdBioskop(); ?>
            </td>

            <td>
                <?php echo $bioskop->getPopcorn(); ?>
            </td>

            <td>
                <?php echo $bioskop->getSoftdrink(); ?>
            </td>

            <td>
                <?php echo $bioskop->getWaktuBuka(); ?>
            </td>

            <td>
                <img
                    src="<?php echo $bioskop->getGambar(); ?>"
                    width="100"
                >
            </td>

            <td>
                <a href="?hapus=<?php echo $bioskop->getIdBioskop(); ?>">
                    Hapus
                </a>
            </td>

        </tr>

    <?php } ?>

</table>


<h2>Update Data Bioskop</h2>

<form method="POST">

    <label>ID Bioskop yang ingin diubah:</label>
    <input type="text" name="idBioskop" required>
    <br><br>

    <label>Rasa Popcorn Baru:</label>
    <input type="text" name="popcorn" required>
    <br><br>

    <label>Jenis Soft Drink Baru:</label>
    <input type="text" name="softdrink" required>
    <br><br>

    <label>Waktu Buka Baru:</label>
    <input type="text" name="waktuBuka" required>
    <br><br>

    <label>Path Gambar Baru:</label>
    <input type="text" name="gambar" required>
    <br><br>

    <button type="submit" name="update">
        Update Data
    </button>

</form>

</body>
</html>
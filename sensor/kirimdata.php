<?php 
// Koneksi database
$konek = mysqli_connect("localhost", "root", "", "sensor_data");

// Periksa apakah parameter 'suhu', 'kelembaban', dan 'soil' ada dalam GET request
if(isset($_GET['suhu']) && isset($_GET['kelembaban']) && isset($_GET['soil'])) {
    // Ambil data dari GET
    $suhu = $_GET['suhu'];
    $kelembaban = $_GET['kelembaban'];
    $soil = $_GET['soil'];

    // Auto increment
    mysqli_query($konek, "ALTER TABLE sensor_readings AUTO_INCREMENT=1");

    // Simpan data ke database
    $simpan = mysqli_query($konek, "INSERT INTO sensor_readings(suhu, kelembaban, soil) VALUES('$suhu', '$kelembaban', '$soil')");

    // Respon jika data berhasil disimpan
    if($simpan) {
        echo "Berhasil dikirim";
    } else {
        echo "Gagal terkirim";
    }
} else {
    echo "Parameter tidak lengkap!";
}
?>

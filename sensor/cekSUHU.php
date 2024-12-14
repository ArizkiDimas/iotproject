<?php  
    // Koneksi ke database
    $konek = mysqli_connect("localhost", "root", "", "sensor_data");

    // Pengecekan koneksi database
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    // Ambil semua data dari tabel sensor_readings, urutkan berdasarkan ID terlama
    $sql = mysqli_query($konek, "SELECT * FROM sensor_readings ORDER BY id ASC");

    // Pengecekan query
    if (!$sql) {
        echo "Error: " . mysqli_error($konek);
        exit();
    }

    // Ambil data dari query
    $data = mysqli_fetch_array($sql);

    // Ambil nilai SUHU dari data
    $TDS = $data['SUHU'];

    // Jika nilai SUHU kosong atau NULL, set nilai default menjadi 0
    if (empty($SUHU)) {
        $SUHU = 0;
    }

    // Format nilai SUHU untuk menggunakan koma sebagai pemisah desimal
    $formattedSUHU = number_format($SUHU, 2, ',', '');  // Menggunakan dua digit setelah koma

    // Tampilkan nilai SUHU yang sudah diformat
    echo $formattedSUHU;
?>

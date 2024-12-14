<?php
// sambungkan ke database
include("koneksi.php");

// Ambil data dari tabel
$query = "SELECT * FROM sensor_data ORDER BY TIME DESC LIMIT 10"; // contoh query
$result = mysqli_query($conn, $query);

// Cek apakah ada data
if (mysqli_num_rows($result) > 0) {
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;  // masukkan data ke array
    }
    echo json_encode($data); // Mengirimkan data dalam format JSON
} else {
    echo json_encode([]); // jika tidak ada data, kirimkan array kosong
}
?>

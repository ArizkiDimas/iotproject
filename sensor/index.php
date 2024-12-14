<?php 
// Koneksi database
$konek = mysqli_connect("localhost", "root", "", "sensor_data");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Query untuk mengambil data dari database
$query = "SELECT * FROM sensor_readings ORDER BY id DESC"; // Mengambil data dari yang terbaru
$result = mysqli_query($konek, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Monitor Data Sensor</title>
  </head>
  <body>
    <div class="container mt-4">
      <h2 class="text-center">Monitoring Data Sensor</h2>
      <table class="table table-bordered table-striped mt-3">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Suhu (°C)</th>
            <th scope="col">Kelembaban (%)</th>
            <th scope="col">Soil Moisture (%)</th>
            <th scope="col">Waktu</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          // Cek apakah data ada
          if (mysqli_num_rows($result) > 0) {
              // Loop data dan tampilkan dalam tabel
              while($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['SUHU'] . "</td>";
                  echo "<td>" . $row['KELEMBABAN'] . "</td>";
                  echo "<td>" . $row['SOIL'] . "</td>";
                  echo "<td>" . $row['TIME'] . "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='5' class='text-center'>Tidak ada data tersedia</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhQ/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

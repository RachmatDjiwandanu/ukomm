<?php
// Asumsi: Sudah ada koneksi ke database $conn
include '.koneksi.php';

if (isset($_POST['id_foto'])) {
  $idFoto = $_POST['id_foto'];

  // Query untuk mengambil komentar sesuai id foto
  $queryKomentar = "SELECT * FROM komentar WHERE Id_Foto = '$idFoto'";
  $resultKomentar = mysqli_query($conn, $queryKomentar);

  // Membuat HTML untuk menampilkan komentar
  $htmlKomentar = '';
  while ($komentar = mysqli_fetch_assoc($resultKomentar)) {
    $htmlKomentar .= '<div class="komentar-item">';
    $htmlKomentar .= '<p>' . $komentar['Isi_Komen'] . '</p>';
    $htmlKomentar .= '</div>';
  }

  echo $htmlKomentar; // Mengembalikan HTML komentar
}
?>

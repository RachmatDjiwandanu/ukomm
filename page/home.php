<div class="container mt-4">
  <div class="masonry">
    <?php
    // tambah komentar
    // tambah komentar
    if (isset($_POST['submit'])) {
      $id_foto = $_POST['id_foto']; // Mendapatkan id foto dari formulir
      $id_user = $_SESSION['user_id'];
      $isi_komen = $_POST['komentar'];
      $tgl_komen = date('Y-m-d');

      $query = "INSERT INTO komentar (Id_Foto, Id_User, Isi_Komen, Tgl_Komen) VALUES ('$id_foto','$id_user','$isi_komen','$tgl_komen')";
      $result = mysqli_query($conn, $query);

      if (!$result) {
        echo "Error: " . mysqli_error($conn);
      } else {
        header("Location: index.php");
        exit();
      }
    }

    // end komentar

    // tampil foto
    $tampil = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.id_user=user.id_user");
    foreach ($tampil as $t) :
    ?>
      <!-- end -->

      <div class="mItem" data-bs-toggle="modal" data-bs-target="#exampleModal" data-photo-src="uploadss/<?= $t['Lokasi_File'] ?>" data-deskripsi="<?= $t['Deskripsi'] ?>" data-tanggal-unggah="<?= $t['Tgl_Unggah'] ?>" data-id-foto="<?= $t['Id_Foto'] ?>">
        <img src="uploadss/<?= $t['Lokasi_File'] ?>">
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Image</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <img src="" class="img-fluid">
          </div>
          <div class="col">
            <h3><?= $t['Username'] ?></h3>

            <h5>Deskripsi</h5>
            <h4 style="margin-bottom: 50px"></h4> <!-- This is where the description will be displayed -->
            <!-- Menampilkan Komentar -->
            <div class="komentar-container">
              <!-- Loop komentar disini -->
              <?php
              // Query untuk mengambil komentar sesuai id foto
              $idFoto = $t['Id_Foto'];
              $queryKomentar = "SELECT * FROM komentar WHERE Id_Foto = '$idFoto'";
              $resultKomentar = mysqli_query($conn, $queryKomentar);
              while ($komentar = mysqli_fetch_assoc($resultKomentar)) :
              ?>
                <div class="komentar-item">
                  <p><?= $komentar['Isi_Komen'] ?></p>
                </div>
              <?php endwhile; 
              echo $idFoto
              ?>
              
              <!-- Akhir loop komentar -->
            </div>

            <!-- Akhir Menampilkan Komentar -->
            <p class="tanggal-unggah"></p> <!-- This is where the upload date will be displayed -->
            <form action="" method="post" id="komentar-form">
              <input type="hidden" id="id_foto" name="id_foto">
              <input type="text" class="form-control" placeholder="Tambahkan Komentar" name="komentar"><br>
              <input type="submit" value="submit" name="submit" class="btn btn-danger">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://unpkg.com/htmx.org@1.9.11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    // Pass photo source, description, upload date, and id_foto to modal when an image is clicked
    $('.mItem').on('click', function() {
      var photoSrc = $(this).data('photo-src');
      var deskripsi = $(this).data('deskripsi');
      var tanggalUnggah = $(this).data('tanggal-unggah');
      var idFoto = $(this).data('id-foto');

      $('#exampleModal .modal-body img').attr('src', photoSrc);
      $('#exampleModal .modal-body h4').text(deskripsi);
      $('#exampleModal .modal-body .tanggal-unggah').text(' ' + tanggalUnggah);
      $('#id_foto').val(idFoto);

    });

    // Load komentar sesuai id_foto
    $.ajax({
      url: '../aksi/komen.php', // Ganti dengan file yang menangani query database untuk komentar
      type: 'POST',
      data: {
        id_foto: idFoto
      },
      success: function(response) {
        $('.komentar-container').html(response);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });

    // Submit the form with id_foto value
    $('#komentar-form').on('submit', function(e) {
      e.preventDefault();
      var idFoto = $('#id_foto').val();
      $(this).append('<input type="hidden" name="id_foto" value="' + idFoto + '">');
      $(this).off('submit').submit();
    });
  });
</script>
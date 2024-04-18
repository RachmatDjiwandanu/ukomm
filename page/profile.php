<?php
$user_id = @$_SESSION['user_id'];
$get = mysqli_query($conn, "SELECT * FROM foto WHERE id_user='$user_id'");
$count = mysqli_num_rows($get); // Count the number of rows fetched



?>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="container  mt-4">
  <div class="row">
    <div class="col col-lg-5 text-center">
      <img class="rounded-circle w-25 p-0" src="asset/avatar.png" alt="">
    </div>
    <div class="col-md-auto">
      <h4 class="d-flex justify-content-between align-items-center">
        <?= ucwords($_SESSION['username']) ?>
        <button type="button" class="btn btn-primary ms-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Edit Profile
        </button>
      </h4>
      <p> <b><?= $count ?></b> Postingan</p>
    </div>

    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-secondary" id="post-tab" data-bs-toggle="tab" data-bs-target="#post-tab-pane" type="button" role="tab" aria-controls="post-tab-pane" aria-selected="true">Postingan <i class="fa-solid fa-table-cells"></i></button>
      </li>
      <li class="nav-item ms-5" role="presentation">
        <button class="nav-link text-secondary" id="album-tab" data-bs-toggle="tab" data-bs-target="#album-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Album <i class="fa-regular fa-images"></i></button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="post-tab-pane" role="tabpanel" aria-labelledby="post-tab" tabindex="0">
        <div class="container mt-4">
          <div class="masonry">
            <?php
            // Lakukan autentikasi pengguna di sini dan dapatkan id pengguna yang login
            $id_user_login = $_SESSION['user_id']; // Contoh pengambilan id pengguna dari session

            // Lakukan kueri untuk menampilkan foto sesuai dengan id pengguna yang login
            $tampil = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.id_user=user.id_user WHERE foto.id_user = $id_user_login");
            foreach ($tampil as $t) :
            ?>
              <!-- end -->

              <img src="uploadss/<?= $t['Lokasi_File'] ?>">

            <?php endforeach; ?>
          </div>
        </div>
      </div>


      <div class="tab-pane fade" id="album-tab-pane" role="tabpanel" aria-labelledby="album-tab" tabindex="0">
      <div class="card" style="width: 18rem;">
  <img src="uploadss/<?= $t['Lokasi_File'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    
    <h5 class="card-title"><?= $t['Id_Album'] ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Kapan Kapan</a>
  </div>
</div>

      </div>
    </div>
  </div> <!-- Closing div for the row -->
</div> <!-- Closing div for the container -->
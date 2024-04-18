<?php  
 $detail = mysqli_query($conn, "SELECT * FROM foto INNER JOIN user ON foto.id_user=user.id_user WHERE foto.id_foto='$_GET[id]'");
 $data = mysqli_fetch_array($detail);
?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <img src="uploadss/<?= $data['Lokasi_File']?>" alt="">
        </div>
    </div>
</div>
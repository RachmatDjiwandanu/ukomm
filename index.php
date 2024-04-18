<?php include 'koneksi.php';
session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ukom</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/alpinejs@3.3.4/dist/cdn.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <link rel="stylesheet" href="asset/css/style.css">
    <style>
        img {
        width: 100%;
        }

        .masonry {
            column-count: 4;
            column-gap: 16px;
        }

        .masonry .mItem {
        display: inline-block;
        margin-bottom: 16px;
        width: 100%;
        }

        @media (max-width: 1199px) {
        .masonry {
            column-count: 3;
        }
        }

        @media (max-width: 991px) {
        .masonry {
            column-count: 2;
        }
        }

        @media (max-width: 767px) {
        .masonry {
            column-count: 1;
        }
        }
    </style>
</head>

<body>

    <!-- Start Navbar -->
<div class="pinterest">
    <div class="left">
        <a href="#" class="logo"><i class="fab fa-pinterest"></i></a>
        <a class="nav-link home" href="?url=home">Home</a>
        <?php if (isset ($_SESSION['user_id'])): ?>
            <!-- User is logged in, so hide Login and Register links -->
            <a class="nav-link for-logged-in" href="?url=upload">Upload</a>
            <a class="nav-link for-logged-in" href="?url=album">Album</a>
            <?php else: ?>
            <!-- User is not logged in, so show Login and Register links -->
            <a class="nav-link for-not-logged-in" href="login.php">Login</a>
            <a class="nav-link for-not-logged-in" href="register.php">Register</a>
            <?php endif; ?>`
    </div>
    <div class="right">
        <div class="search">
            <i class="fas fa-search"></i>
            <input type="search" name="" placeholder="Search..." id="">
        </div>
        <?php if (isset($_SESSION['username'])): ?>
            <a href="#" class="items"><i class="fas fa-bell"></i></a>
        <?php endif; ?>
        <?php if (isset($_SESSION['username'])): ?>
            <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= ucwords($_SESSION['username']) ?>
            </a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="?url=logout">Logout</a></li>
        <li><a class="dropdown-item" href="?url=profile">Profile</a></li>                        
    </ul>
</div>
        <?php endif; ?>
    </div>
</div>
<!-- End Navbar -->



    <?php
    // Check if the 'url' key is set in the $_GET array
    if (isset($_GET['url'])) {
        $url = $_GET['url'];

        if ($url == 'home') {
            include 'page/home.php';
        } elseif ($url == 'profile') {
            include 'page/profile.php';
        } elseif ($url == 'upload') {
            include 'page/upload.php';
        } elseif ($url == 'album') {
            include 'page/album.php';
        } elseif ($url == 'logout') {
            session_destroy();
            header("Location: ?url=home");
        } else {
            include 'page/home.php';
        }
    } else {
        // If 'url' is not set, include the default page (home.php)
        include 'page/home.php';
    }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Xr2EAgHtP9b3hTPCvAg/J2IwL2oTOU9ulBy+1CKWwSX5C1ojA0JfAZLmZhp4z3Xr" crossorigin="anonymous"></script>

    <script src="asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
session_start();
require_once "../koneksi.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    exit('Unauthorized');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_foto'])) {
   $id_foto = $_POST['id_foto'];
    $id_user = $_SESSION['user_id'];
    $tgl_like = date("Y-m-d");

    try {
        // Check if the user has already liked the photo
        $checkLikeQuery = "SELECT * FROM likes WHERE id_foto = :id_foto AND user_id = :user_id";
        $stmt = $conn->prepare($checkLikeQuery);
        $stmt->bind_param('ii',$id_foto, $id_user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User has already liked the photo, remove the like
            $deleteLikeQuery = "DELETE FROM likes WHERE id_foto = :id_foto AND user_id = :user_id";
            $stmt = $conn->prepare($deleteLikeQuery);
            $stmt->bind_param('ii',$id_foto, $id_user);
            $stmt->execute();

            echo 'unliked';
        } else {
            // User has not liked the photo yet, add the like
            $addLikeQuery = "INSERT INTO likes (id_foto, user_id, tgl_like) VALUES (:id_foto,  :user_id, :tgl_like)";
            $stmt = $conn->prepare($addLikeQuery);
            $stmt->bind_param('iis',$id_foto, $id_user, $tglLike);
            $stmt->execute();

            echo 'liked';
        }
    } catch (Exception $e) {
        // Handle any database errors
        http_response_code(500);
        exit('Database error: ' . $e->getMessage());
    }
} else {
    http_response_code(400);
    exit('Bad request');
}
?>

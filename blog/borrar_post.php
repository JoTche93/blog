<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "blog_db");
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para obtener los posts
$result = mysqli_query($conn, "SELECT * FROM posts ORDER BY fecha DESC");


if (isset($_GET['id'])) {
    include 'crear_post.php';
    $id = intval($_GET['id']);
    $sql = "DELETE FROM posts WHERE id = $id";
    mysqli_query($conn, $sql);
}

header('Location: index.php');
exit;
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST['titulo']);
    $contenido = trim($_POST['contenido']);

    if (!empty($titulo) && !empty($contenido)) {
        $conn = mysqli_connect("localhost", "root", "", "blog_db");
        if (!$conn) {
            die("Conexión fallida: " . mysqli_connect_error());
        }

        $titulo = mysqli_real_escape_string($conn, $titulo);
        $contenido = mysqli_real_escape_string($conn, $contenido);

        $sql = "INSERT INTO posts (titulo, contenido) VALUES ('$titulo', '$contenido')";
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Por favor completa todos los campos.";
    }
}
?>

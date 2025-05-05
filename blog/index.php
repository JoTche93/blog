<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "blog_db");
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Consulta para obtener los posts
$result = mysqli_query($conn, "SELECT * FROM posts ORDER BY fecha DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Blog</title>
    <link rel="stylesheet" href="./assets/style/styles.css">
</head>
<body>

    <!-- Logo -->
    <div class="logo-container">
        <img id="logoImg" src="https://raw.githubusercontent.com/gianmazzoran/mecha-01/main/images/mecha-01-logo.png" alt="logo">
    </div>

    <header>
        <h1>Mi Blog</h1>
        
        <!-- Botón para cambiar al modo EVA-02 -->
        <button id="modoEva02">EVA-02</button>
    </header>

    <section>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <article class="post">
                <h3><?php echo htmlspecialchars($row['titulo']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($row['contenido'])); ?></p>
                <small>Publicado el <?php echo $row['fecha']; ?></small>
                <form action="borrar_post.php" method="GET" onsubmit="return confirm('¿Estás seguro de borrar esta publicación?');">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn-borrar">Borrar</button>
                </form>
            </article>
        <?php endwhile; ?>
    </section>

    <section id="crear">
        <h2>Crear nueva publicación</h2>
        <form action="crear_post.php" method="POST">
            <input type="text" name="titulo" placeholder="Título" required>
            <textarea name="contenido" placeholder="Contenido" required></textarea>
            <button type="submit">Publicar</button>
        </form>
    </section>

    <br> 
    <footer>
        <p>Blog creado por JoTche</p>
    </footer>

    <script src="./assets/script/script.js"></script>
    
</body>
</html>

<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2> Bienvenido</h2>

<div class="card p-4">
    <h4>Hola, <?php echo $_SESSION['usuario']['nombre']; ?> 👋</h4>
    <p>Bienvenido a la plataforma educativa.</p>

    <div class="mt-3">
        <a href="/PlataformaEducativa/index.php" class="btn btn-primary"> Ver Tareas</a>
        <a href="/PlataformaEducativa/index.php?action=calificaciones" class="btn btn-success"> Ver Calificaciones</a>
    </div>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
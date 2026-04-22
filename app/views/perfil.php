<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2> Mi Perfil</h2>

<div class="card p-4" style="max-width:500px;">

    <p><strong>Nombre:</strong> <?php echo $_SESSION['usuario']['nombre']; ?></p>
    <p><strong>Email:</strong> <?php echo $_SESSION['usuario']['email']; ?></p>
    <p><strong>Rol:</strong> <?php echo $_SESSION['usuario']['rol']; ?></p>

</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
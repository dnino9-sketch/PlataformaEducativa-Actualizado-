<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4"> Mis Calificaciones</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Materia</th>
            <th>Curso</th>
            <th>Tarea</th>
            <th>Nota</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($calificaciones as $c): ?>
        <tr>
            <td><?php echo $c->materia; ?></td>
            <td><?php echo $c->curso; ?></td>
            <td><?php echo $c->descripcion; ?></td>
            <td>
                <?php if ($c->nota): ?>
                    <span class="badge bg-success"> <?php echo $c->nota; ?></span>
                <?php else: ?>
                    <span class="badge bg-secondary">Sin calificar</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
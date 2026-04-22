<?php
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/../models/Entrega.php';

// Verificar si el alumno ya entregó
$yaEntrego = false;
if (isset($_SESSION['usuario'])) {
    $yaEntrego = Entrega::yaEntrego($tarea->id, $_SESSION['usuario']['id']);
}
?>

<div class="mt-4" style="max-width: 600px;">
    <h2 class="mb-4">Detalle de Tarea</h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="mb-3">
                <label class="fw-bold">Materia:</label>
                <p><?php echo htmlspecialchars($tarea->materia); ?></p>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Curso:</label>
                <p><?php echo htmlspecialchars($tarea->curso); ?></p>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Descripción:</label>
                <p><?php echo htmlspecialchars($tarea->descripcion); ?></p>
            </div>

            
            <div class="mb-3">
                <label class="fw-bold">Estado:</label>
                <p>
                    <?php if ($yaEntrego): ?>
                        <span class="badge bg-success"> Entregada</span>
                    <?php else: ?>
                        <span class="badge bg-warning text-dark">Pendiente</span>
                    <?php endif; ?>
                </p>
            </div>

        </div>

        <div class="card-footer d-flex gap-2">
            <a href="/PlataformaEducativa/" class="btn btn-secondary">
                 Volver
            </a>

            
            <?php if ($_SESSION['usuario']['rol'] === 'docente' || $_SESSION['usuario']['rol'] === 'admin'): ?>
                <a href="/PlataformaEducativa/index.php?action=editar_tarea&id=<?php echo $tarea->id; ?>" 
                   class="btn btn-warning">
                    Editar Tarea
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/templates/footer.php';
?>
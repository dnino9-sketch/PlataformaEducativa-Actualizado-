<?php
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/../models/Entrega.php';

// VERIFICAR ENTREGA
$yaEntrego = false;

if (isset($_SESSION['usuario'])) {

    $yaEntrego = Entrega::yaEntrego(
        $tarea->id,
        $_SESSION['usuario']['id']
    );
}
?>

<div class="container-fluid">

    <!-- ENCABEZADO -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h2 class="fw-bold mb-2">

                        <i class="bi bi-book-half text-primary me-2"></i>
                        Detalle de Tarea

                    </h2>

                    <p class="text-muted mb-0">

                        Consulta la información completa de la tarea.

                    </p>

                </div>

                <!-- ESTADO -->
                <div class="mt-3 mt-md-0">

                    <?php if ($yaEntrego): ?>

                        <span class="badge bg-success fs-6 px-4 py-3">

                            <i class="bi bi-check-circle-fill me-2"></i>
                            Entregada

                        </span>

                    <?php else: ?>

                        <span class="badge bg-warning text-dark fs-6 px-4 py-3">

                            <i class="bi bi-clock-fill me-2"></i>
                            Pendiente

                        </span>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

    <!-- INFORMACION -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="row g-4">

                <!-- MATERIA -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-icon bg-primary">

                            <i class="bi bi-journal-bookmark-fill"></i>

                        </div>

                        <div>

                            <small class="text-muted d-block">
                                Materia
                            </small>

                            <h5 class="fw-bold mb-0">

                                <?php echo htmlspecialchars($tarea->materia); ?>

                            </h5>

                        </div>

                    </div>

                </div>

                <!-- CURSO -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-icon bg-success">

                            <i class="bi bi-mortarboard-fill"></i>

                        </div>

                        <div>

                            <small class="text-muted d-block">
                                Curso
                            </small>

                            <h5 class="fw-bold mb-0">

                                <?php echo htmlspecialchars($tarea->curso); ?>

                            </h5>

                        </div>

                    </div>

                </div>

            </div>

            <!-- DESCRIPCION -->
            <div class="mt-5">

                <h5 class="fw-bold mb-3">

                    <i class="bi bi-card-text text-primary me-2"></i>
                    Descripción

                </h5>

                <div class="description-box">

                    <?php echo nl2br(htmlspecialchars($tarea->descripcion)); ?>

                </div>

            </div>

        </div>

    </div>

    <!-- BOTONES -->
    <div class="d-flex flex-wrap gap-3">

        <!-- VOLVER -->
        <a href="/PlataformaEducativa/"
           class="btn btn-secondary px-4 py-2">

            <i class="bi bi-arrow-left me-2"></i>
            Volver

        </a>

        <!-- EDITAR -->
        <?php if ($_SESSION['usuario']['rol'] === 'docente' || $_SESSION['usuario']['rol'] === 'admin'): ?>

            <a href="/PlataformaEducativa/index.php?action=editar_tarea&id=<?php echo $tarea->id; ?>"
               class="btn btn-warning px-4 py-2 text-dark">

                <i class="bi bi-pencil-square me-2"></i>
                Editar Tarea

            </a>

        <?php endif; ?>

    </div>

</div>

<style>

.info-box {

    display: flex;

    align-items: center;

    gap: 18px;

    background: #f8f9fa;

    padding: 20px;

    border-radius: 18px;
}

.info-icon {

    width: 65px;

    height: 65px;

    border-radius: 18px;

    display: flex;

    align-items: center;

    justify-content: center;

    color: white;

    font-size: 1.8rem;
}

.description-box {

    background: #f8f9fa;

    border-radius: 18px;

    padding: 25px;

    line-height: 1.8;

    font-size: 1rem;
}

.card {

    border-radius: 20px;
}

.badge {

    border-radius: 12px;
}

</style>

<?php
require_once __DIR__ . '/templates/footer.php';
?>
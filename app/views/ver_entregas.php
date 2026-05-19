<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container-fluid">

    <!-- ENCABEZADO -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h2 class="fw-bold mb-2">

                        <i class="bi bi-folder-check text-primary me-2"></i>
                        Entregas de la Tarea

                    </h2>

                    <p class="text-muted mb-0">

                        Revisa archivos, estados y calificaciones de los alumnos.

                    </p>

                </div>

                <div class="mt-3 mt-md-0">

                    <span class="badge bg-primary fs-6 px-4 py-3">

                        <?php echo count($entregas); ?>
                        Entregas

                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- INFORMACION TAREA -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="row g-4">

                <!-- TAREA -->
                <div class="col-md-6">

                    <div class="info-box">

                        <div class="info-icon bg-primary">

                            <i class="bi bi-journal-text"></i>

                        </div>

                        <div>

                            <small class="text-muted d-block">
                                Tarea
                            </small>

                            <h5 class="fw-bold mb-0">

                                <?php echo htmlspecialchars($tarea->descripcion); ?>

                            </h5>

                        </div>

                    </div>

                </div>

                <!-- MATERIA -->
                <div class="col-md-3">

                    <div class="info-box">

                        <div class="info-icon bg-success">

                            <i class="bi bi-book-fill"></i>

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
                <div class="col-md-3">

                    <div class="info-box">

                        <div class="info-icon bg-warning">

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

        </div>

    </div>

    <!-- TABLA -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <?php if (empty($entregas)): ?>

                <div class="text-center py-5">

                    <i class="bi bi-inbox fs-1 text-muted"></i>

                    <h4 class="mt-3 text-muted">
                        Nadie ha entregado aún
                    </h4>

                </div>

            <?php else: ?>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>
                                Alumno
                            </th>

                            <th>
                                Archivo
                            </th>

                            <th>
                                Fecha
                            </th>

                            <th>
                                Estado
                            </th>

                            <th>
                                Calificación
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach ($entregas as $e): ?>

                        <tr>

                            <!-- ALUMNO -->
                            <td>

                                <div class="d-flex align-items-center gap-3">

                                    <div class="avatar-circle">

                                        <i class="bi bi-person-fill"></i>

                                    </div>

                                    <div>

                                        <span class="fw-semibold">

                                            <?php echo htmlspecialchars($e->alumno); ?>

                                        </span>

                                    </div>

                                </div>

                            </td>

                            <!-- ARCHIVO -->
                            <td>

                                <a href="/PlataformaEducativa/uploads/<?php echo $e->archivo; ?>"
                                   target="_blank"
                                   class="btn btn-primary btn-sm">

                                    <i class="bi bi-file-earmark-arrow-down me-1"></i>
                                    Ver Archivo

                                </a>

                            </td>

                            <!-- FECHA -->
                            <td>

                                <span class="text-muted">

                                    <?php echo $e->fecha_entrega; ?>

                                </span>

                            </td>

                            <!-- ESTADO -->
                            <td>

                                <span class="badge bg-success px-3 py-2">

                                    <i class="bi bi-check-circle-fill me-1"></i>

                                    <?php echo $e->estado; ?>

                                </span>

                            </td>

                            <!-- CALIFICACION -->
                            <td style="min-width: 260px;">

                                <?php if ($_SESSION['usuario']['rol'] === 'docente' || $_SESSION['usuario']['rol'] === 'admin'): ?>

                                    <?php if (!empty($e->nota)): ?>

                                        <!-- CALIFICADO -->
                                        <div>

                                            <span class="badge bg-success fs-6 mb-2">

                                                Nota:
                                                <?php echo $e->nota; ?>

                                            </span>

                                            <div class="small text-muted">

                                                <?php echo htmlspecialchars($e->retroalimentacion); ?>

                                            </div>

                                        </div>

                                    <?php else: ?>

                                        <!-- FORMULARIO -->
                                        <form method="POST"
                                              action="/PlataformaEducativa/index.php?action=calificar"
                                              class="d-flex flex-column gap-2">

                                            <input type="hidden"
                                                   name="entrega_id"
                                                   value="<?php echo $e->id; ?>">

                                            <input type="number"
                                                   name="nota"
                                                   step="0.1"
                                                   min="0"
                                                   max="5"
                                                   class="form-control form-control-sm"
                                                   placeholder="Ingrese nota"
                                                   required>

                                            <input type="text"
                                                   name="comentario"
                                                   class="form-control form-control-sm"
                                                   placeholder="Retroalimentación">

                                            <button class="btn btn-success btn-sm">

                                                <i class="bi bi-check2-circle me-1"></i>
                                                Calificar

                                            </button>

                                        </form>

                                    <?php endif; ?>

                                <?php else: ?>

                                    <?php if (!empty($e->nota)): ?>

                                        <span class="badge bg-success fs-6">

                                            <?php echo $e->nota; ?>

                                        </span>

                                        <div class="small text-muted mt-2">

                                            <?php echo htmlspecialchars($e->retroalimentacion); ?>

                                        </div>

                                    <?php else: ?>

                                        <span class="badge bg-secondary">

                                            Sin calificar

                                        </span>

                                    <?php endif; ?>

                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

            <?php endif; ?>

        </div>

        <!-- FOOTER -->
        <div class="card-footer bg-white border-0 p-4">

            <a href="/PlataformaEducativa/"
               class="btn btn-secondary px-4">

                <i class="bi bi-arrow-left me-2"></i>
                Volver

            </a>

        </div>

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

    font-size: 1.7rem;
}

.avatar-circle {

    width: 50px;

    height: 50px;

    border-radius: 50%;

    background: #0d6efd;

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 1.2rem;
}

.card {

    border-radius: 20px;
}

.table tbody tr {

    transition: 0.2s ease;
}

.table tbody tr:hover {

    transform: scale(1.003);

    background-color: rgba(13,110,253,0.03);
}

.badge {

    border-radius: 10px;
}

</style>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container-fluid">

    <!-- ENCABEZADO -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h2 class="fw-bold mb-2">

                        <i class="bi bi-bar-chart-fill text-success me-2"></i>
                        Mis Calificaciones

                    </h2>

                    <p class="text-muted mb-0">

                        Consulta tus notas y el estado académico de tus tareas.

                    </p>

                </div>

                <!-- PROMEDIO -->
                <div class="mt-3 mt-md-0">

                    <?php
                    $total = 0;
                    $cantidad = 0;

                    foreach ($calificaciones as $c) {

                        if (!empty($c->nota)) {

                            $total += $c->nota;
                            $cantidad++;
                        }
                    }

                    $promedio = $cantidad > 0
                        ? round($total / $cantidad, 1)
                        : 0;
                    ?>

                    <div class="average-box">

                        <small class="d-block text-muted">
                            Promedio
                        </small>

                        <h3 class="fw-bold mb-0 text-success">

                            <?php echo $promedio; ?>

                        </h3>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- TABLA -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <?php if (!empty($calificaciones)): ?>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>
                                Materia
                            </th>

                            <th>
                                Curso
                            </th>

                            <th>
                                Tarea
                            </th>

                            <th>
                                Estado
                            </th>

                            <th>
                                Nota
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach ($calificaciones as $c): ?>

                        <tr>

                            <!-- MATERIA -->
                            <td>

                                <div class="d-flex align-items-center gap-3">

                                    <div class="subject-icon">

                                        <i class="bi bi-book-fill"></i>

                                    </div>

                                    <span class="fw-semibold">

                                        <?php echo htmlspecialchars($c->materia); ?>

                                    </span>

                                </div>

                            </td>

                            <!-- CURSO -->
                            <td>

                                <span class="badge bg-secondary px-3 py-2">

                                    <?php echo htmlspecialchars($c->curso); ?>

                                </span>

                            </td>

                            <!-- TAREA -->
                            <td style="max-width: 300px;">

                                <?php echo htmlspecialchars($c->descripcion); ?>

                            </td>

                            <!-- ESTADO -->
                            <td>

                                <?php if ($c->nota): ?>

                                    <span class="badge bg-success px-3 py-2">

                                        <i class="bi bi-check-circle-fill me-1"></i>
                                        Calificada

                                    </span>

                                <?php else: ?>

                                    <span class="badge bg-warning text-dark px-3 py-2">

                                        <i class="bi bi-clock-fill me-1"></i>
                                        Pendiente

                                    </span>

                                <?php endif; ?>

                            </td>

                            <!-- NOTA -->
                            <td>

                                <?php if ($c->nota): ?>

                                    <?php
                                    $color = 'bg-danger';

                                    if ($c->nota >= 4) {

                                        $color = 'bg-success';

                                    } elseif ($c->nota >= 3) {

                                        $color = 'bg-warning text-dark';
                                    }
                                    ?>

                                    <span class="badge <?php echo $color; ?> fs-6 px-3 py-2">

                                        <?php echo $c->nota; ?>

                                    </span>

                                <?php else: ?>

                                    <span class="badge bg-secondary">

                                        Sin calificar

                                    </span>

                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

            <?php else: ?>

                <!-- VACIO -->
                <div class="text-center py-5">

                    <i class="bi bi-journal-x fs-1 text-muted"></i>

                    <h4 class="mt-3 text-muted">

                        No tienes calificaciones registradas

                    </h4>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<style>

.average-box {

    background: #f8f9fa;

    padding: 18px 30px;

    border-radius: 18px;

    text-align: center;

    min-width: 140px;
}

.subject-icon {

    width: 50px;

    height: 50px;

    border-radius: 14px;

    background: linear-gradient(135deg, #198754, #157347);

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 1.2rem;
}

.card {

    border-radius: 22px;
}

.table tbody tr {

    transition: 0.2s ease;
}

.table tbody tr:hover {

    transform: scale(1.003);

    background-color: rgba(25,135,84,0.04);
}

.badge {

    border-radius: 10px;

    font-weight: 500;
}

</style>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
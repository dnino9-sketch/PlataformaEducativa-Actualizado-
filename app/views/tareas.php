<?php
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/../models/Entrega.php';
?>

<div class="container-fluid">

    <!-- ENCABEZADO -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>

                    <h2 class="fw-bold mb-1">
                        <i class="bi bi-journal-text text-primary me-2"></i>
                        Mis Tareas
                    </h2>

                    <p class="text-muted mb-0">
                        Consulta, entrega y administra tareas del sistema.
                    </p>

                </div>

                <!-- BOTON CREAR -->
                <?php if ($_SESSION['usuario']['rol'] === 'docente' || $_SESSION['usuario']['rol'] === 'admin'): ?>

                    <div class="mt-3 mt-md-0">

                        <a href="/PlataformaEducativa/index.php?action=crear_tarea"
                           class="btn btn-success px-4">

                            <i class="bi bi-plus-circle me-2"></i>
                            Crear Tarea

                        </a>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

    <!-- FILTROS -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Materia
                    </label>

                    <select class="form-select">

                        <option selected>
                            Todas las Materias
                        </option>

                        <option>
                            Matemática
                        </option>

                        <option>
                            Ciencias
                        </option>

                        <option>
                            Español
                        </option>

                    </select>

                </div>

                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Curso
                    </label>

                    <select class="form-select">

                        <option selected>
                            Todos los Cursos
                        </option>

                        <option>
                            Curso A
                        </option>

                        <option>
                            Curso B
                        </option>

                    </select>

                </div>

                <div class="col-md-4">

                    <label class="form-label fw-semibold">
                        Estado
                    </label>

                    <select class="form-select">

                        <option selected>
                            Todos los Estados
                        </option>

                        <option>
                            Pendiente
                        </option>

                        <option>
                            Entregada
                        </option>

                        <option>
                            Calificada
                        </option>

                    </select>

                </div>

            </div>

        </div>

    </div>

    <!-- TABLA -->
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead class="table-light">

                        <tr>

                            <th>
                                Materia
                            </th>

                            <th>
                                Curso
                            </th>

                            <th>
                                Descripción
                            </th>

                            <th>
                                Estado
                            </th>

                            <th>
                                Nota
                            </th>

                            <th class="text-center">
                                Acciones
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach ($tareas as $tarea): ?>

                        <?php
                        $entrega = Entrega::obtenerEntrega(
                            $tarea->id,
                            $_SESSION['usuario']['id']
                        );

                        $yaEntrego = $entrega ? true : false;
                        ?>

                        <tr>

                            <!-- MATERIA -->
                            <td>

                                <span class="fw-semibold">

                                    <?php echo htmlspecialchars($tarea->materia); ?>

                                </span>

                            </td>

                            <!-- CURSO -->
                            <td>

                                <span class="badge bg-secondary">

                                    <?php echo htmlspecialchars($tarea->curso); ?>

                                </span>

                            </td>

                            <!-- DESCRIPCION -->
                            <td style="max-width: 350px;">

                                <?php echo htmlspecialchars($tarea->descripcion); ?>

                            </td>

                            <!-- ESTADO -->
                            <td>

                                <?php if ($entrega && !empty($entrega->nota)): ?>

                                    <span class="badge bg-primary px-3 py-2">

                                        <i class="bi bi-check-circle me-1"></i>
                                        Calificada

                                    </span>

                                <?php elseif ($yaEntrego): ?>

                                    <span class="badge bg-success px-3 py-2">

                                        <i class="bi bi-upload me-1"></i>
                                        Entregada

                                    </span>

                                <?php else: ?>

                                    <span class="badge bg-warning text-dark px-3 py-2">

                                        <i class="bi bi-clock me-1"></i>
                                        Pendiente

                                    </span>

                                <?php endif; ?>

                            </td>

                            <!-- NOTA -->
                            <td>

                                <?php if ($entrega && !empty($entrega->nota)): ?>

                                    <span class="badge bg-success fs-6">

                                        <?php echo $entrega->nota; ?>

                                    </span>

                                <?php else: ?>

                                    <span class="text-muted">

                                        —

                                    </span>

                                <?php endif; ?>

                            </td>

                            <!-- ACCIONES -->
                            <td class="text-center">

                                <div class="d-flex flex-wrap gap-2 justify-content-center">

                                    <!-- VER -->
                                    <a href="/PlataformaEducativa/index.php?action=ver_tarea&id=<?php echo $tarea->id; ?>"
                                       class="btn btn-primary btn-sm">

                                        <i class="bi bi-eye-fill me-1"></i>
                                        Ver

                                    </a>

                                    <!-- ENTREGAS -->
                                    <?php if ($_SESSION['usuario']['rol'] === 'docente' || $_SESSION['usuario']['rol'] === 'admin'): ?>

                                        <a href="/PlataformaEducativa/index.php?action=ver_entregas&id=<?php echo $tarea->id; ?>"
                                           class="btn btn-info btn-sm text-white">

                                            <i class="bi bi-folder-check me-1"></i>
                                            Entregas

                                        </a>

                                    <?php endif; ?>

                                    <!-- ALUMNO -->
                                    <?php if ($_SESSION['usuario']['rol'] === 'alumno'): ?>

                                        <?php if (!$yaEntrego): ?>

                                            <form method="POST"
                                                  action="index.php?action=entregar_tarea"
                                                  enctype="multipart/form-data"
                                                  class="d-flex flex-wrap gap-2 justify-content-center">

                                                <input type="hidden"
                                                       name="tarea_id"
                                                       value="<?php echo $tarea->id; ?>">

                                                <input type="file"
                                                       name="archivo"
                                                       accept=".pdf,.jpg,.png"
                                                       class="form-control form-control-sm"
                                                       required>

                                                <button type="submit"
                                                        class="btn btn-success btn-sm">

                                                    <i class="bi bi-upload me-1"></i>
                                                    Entregar

                                                </button>

                                            </form>

                                        <?php else: ?>

                                            <span class="badge bg-success px-3 py-2">

                                                ✔ Entregada

                                            </span>

                                        <?php endif; ?>

                                    <?php endif; ?>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<style>

.table tbody tr {

    transition: 0.2s ease;
}

.table tbody tr:hover {

    transform: scale(1.005);

    background-color: rgba(13,110,253,0.03);
}

.card {

    border-radius: 18px;
}

.badge {

    border-radius: 10px;
}

</style>

<?php
require_once __DIR__ . '/templates/footer.php';
?>
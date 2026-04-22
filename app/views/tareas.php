<?php
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/../models/Entrega.php';
?>

<h2 class="mb-4">Mis Tareas</h2>

<div class="d-flex justify-content-between mb-3">
    <div>
        <select class="form-select d-inline-block w-auto me-2">
            <option selected>Todas las Materias</option>
            <option>Matemática</option>
            <option>Ciencias</option>
            <option>Español</option>
        </select>

        <select class="form-select d-inline-block w-auto me-2">
            <option selected>Todos los Cursos</option>
            <option>Curso A</option>
            <option>Curso B</option>
        </select>

        <select class="form-select d-inline-block w-auto">
            <option selected>Todos los Estados</option>
            <option>Pendiente</option>
            <option>Entregada</option>
            <option>Calificada</option>
        </select>
    </div>

    <!-- Solo docente y admin -->
    <?php if ($_SESSION['usuario']['rol'] === 'docente' || $_SESSION['usuario']['rol'] === 'admin'): ?>
        <a href="/PlataformaEducativa/index.php?action=crear_tarea" class="btn btn-success">
            + Crear Tarea
        </a>
    <?php endif; ?>
</div>

<table class="table table-hover align-middle">
    <thead class="table-light">
        <tr>
            <th>Materia</th>
            <th>Curso</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Nota</th> <!--  NUEVA -->
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($tareas as $tarea): ?>
            
            <?php 
            $entrega = Entrega::obtenerEntrega($tarea->id, $_SESSION['usuario']['id']); 
            $yaEntrego = $entrega ? true : false;
            ?>

        <tr>
            <td><?php echo htmlspecialchars($tarea->materia); ?></td>
            <td><?php echo htmlspecialchars($tarea->curso); ?></td>
            <td><?php echo htmlspecialchars($tarea->descripcion); ?></td>

            <!--  ESTADO INTELIGENTE -->
            <td>
                <?php if ($entrega && !empty($entrega->nota)): ?>
                    <span class="badge bg-primary">Calificada</span>
                <?php elseif ($yaEntrego): ?>
                    <span class="badge bg-success">Entregada</span>
                <?php else: ?>
                    <span class="badge bg-warning text-dark">Pendiente</span>
                <?php endif; ?>
            </td>

            <!--  NOTA -->
            <td>
                <?php if ($entrega && !empty($entrega->nota)): ?>
                    <span class="badge bg-success"> <?php echo $entrega->nota; ?></span>
                <?php else: ?>
                    <span class="text-muted">—</span>
                <?php endif; ?>
            </td>

            <td>

                <!-- Ver tarea -->
                <a href="/PlataformaEducativa/index.php?action=ver_tarea&id=<?php echo $tarea->id; ?>" 
                   class="btn btn-primary btn-sm">
                   Ver
                </a>

                <!-- VER ENTREGAS (DOCENTE/ADMIN) -->
                <?php if ($_SESSION['usuario']['rol'] === 'docente' || $_SESSION['usuario']['rol'] === 'admin'): ?>
                    <a href="/PlataformaEducativa/index.php?action=ver_entregas&id=<?php echo $tarea->id; ?>" 
                       class="btn btn-info btn-sm ms-1">
                        Entregas
                    </a>
                <?php endif; ?>

                <!-- ENTREGAR TAREA (ALUMNO) -->
                <?php if ($_SESSION['usuario']['rol'] === 'alumno'): ?>

                    <?php if (!$yaEntrego): ?>

                        <form method="POST" action="index.php?action=entregar_tarea" enctype="multipart/form-data" style="display:inline-flex; gap:5px; align-items:center;">
                            
                            <input type="hidden" name="tarea_id" value="<?php echo $tarea->id; ?>">

                            <input type="file" name="archivo" accept=".pdf,.jpg,.png" class="form-control form-control-sm" required>

                            <button type="submit" class="btn btn-success btn-sm">
                                 Entregar
                            </button>

                        </form>

                    <?php else: ?>

                        <span class="badge bg-success ms-2">✔ Entregada</span>

                    <?php endif; ?>

                <?php endif; ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?php
require_once __DIR__ . '/templates/footer.php';
?>
<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4"> Entregas de la Tarea</h2>

<div class="card shadow-sm">
    <div class="card-body">

        <h5><strong>Tarea:</strong> <?php echo htmlspecialchars($tarea->descripcion); ?></h5>
        <p><strong>Materia:</strong> <?php echo htmlspecialchars($tarea->materia); ?></p>
        <p><strong>Curso:</strong> <?php echo htmlspecialchars($tarea->curso); ?></p>

        <hr>

        <?php if (empty($entregas)): ?>
            <p class="text-muted"> Nadie ha entregado aún.</p>
        <?php else: ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Alumno</th>
                        <th>Archivo</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Calificación</th> <!-- NUEVA -->
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($entregas as $e): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($e->alumno); ?></td>

                        <td>
                            <a href="/PlataformaEducativa/uploads/<?php echo $e->archivo; ?>" target="_blank" class="btn btn-sm btn-primary">
                                 Ver Archivo
                            </a>
                        </td>

                        <td><?php echo $e->fecha_entrega; ?></td>

                        <td>
                            <span class="badge bg-success">
                                <?php echo $e->estado; ?>
                            </span>
                        </td>

                        <!--  NUEVA COLUMNA CALIFICACIÓN -->
                        <td>

                            <?php if ($_SESSION['usuario']['rol'] === 'docente' || $_SESSION['usuario']['rol'] === 'admin'): ?>

                                <?php if (!empty($e->nota)): ?>

                                    <!-- YA CALIFICADO -->
                                    <span class="badge bg-success"> <?php echo $e->nota; ?></span>
                                    <br>
                                    <small><?php echo htmlspecialchars($e->retroalimentacion); ?></small>

                                <?php else: ?>

                                    <!-- FORMULARIO DE CALIFICACIÓN -->
                                    <form method="POST" action="/PlataformaEducativa/index.php?action=calificar" style="display:flex; flex-direction:column; gap:5px;">

                                        <input type="hidden" name="entrega_id" value="<?php echo $e->id; ?>">

                                        <input type="number" name="nota" step="0.1" min="0" max="5" 
                                               class="form-control form-control-sm" 
                                               placeholder="Nota" required>

                                        <input type="text" name="comentario" 
                                               class="form-control form-control-sm" 
                                               placeholder="Comentario">

                                        <button class="btn btn-success btn-sm">
                                             Calificar
                                        </button>

                                    </form>

                                <?php endif; ?>

                            <?php else: ?>

                                <!-- VISTA ALUMNO / PADRE -->
                                <?php if (!empty($e->nota)): ?>
                                    <span class="badge bg-success"> <?php echo $e->nota; ?></span>
                                    <br>
                                    <small><?php echo htmlspecialchars($e->retroalimentacion); ?></small>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Sin calificar</span>
                                <?php endif; ?>

                            <?php endif; ?>

                        </td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        <?php endif; ?>

    </div>

    <div class="card-footer">
        <a href="/PlataformaEducativa/" class="btn btn-secondary">
             Volver
        </a>
    </div>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>